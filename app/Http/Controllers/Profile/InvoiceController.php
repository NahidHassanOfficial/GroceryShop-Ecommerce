<?php

namespace App\Http\Controllers\Profile;

use App\Helper\SSLCOMMERZ;
use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\InvoiceOrder;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class InvoiceController extends Controller
{
    public function createInvoice(Request $request)
    {
        $validatedRequest = $request->validate([
            'products' => 'required|array',
            'payment_method' => 'required|string',
        ]);

        $user_id = $request->header('id');
        $cartList = $validatedRequest['products'];

        DB::beginTransaction();
        try {
            $transaction_id = uniqid();
            $profile = User::with('addresses')->where('id', $user_id)->first();
            // dd(vars: $profile->addresses->first()->city);

            $totalAmmount = 0;
            $products = [];
            foreach ($cartList as $cart) {
                // $totalAmmount += Product::where("id", $cart['id'])->value('price') * $cart['quantity'];
                $product = Product::where("id", $cart['id'])->where('status', 1)->where('stock', '>=', 1)->first();
                $totalAmmount += $product->select(DB::raw('IF(sale_price > 0, sale_price, price) as final_price'))
                    ->value('final_price') * $cart['quantity'];

                //store product name and categoryname
                $products[] = ['name' => $product->name, 'category' => $product->category->name];
            }

            $invoice = Invoice::create([
                'user_id' => $user_id,
                'total' => $totalAmmount,
                'discount' => 0,
                'payable' => $totalAmmount,
                'transaction_id' => $transaction_id,
                'val_id' => null,
                'payment_status' => 'pending',
                'payment_method' => $request->payment_method,
                'order_status' => 'pending',
                'refund_status' => null,
                'refund_trans_id' => null,
            ]);
            foreach ($cartList as $cart) {
                InvoiceOrder::create([
                    'invoice_id' => $invoice->id,
                    'product_id' => $cart['id'],
                    'user_id' => $user_id,
                    'quantity' => $cart['quantity'],
                    'amount' => Product::where("id", $cart['id'])->where('status', 1)->where('stock', '>=', 1)
                        ->select(DB::raw('IF(sale_price > 0, sale_price, price) as final_price'))
                        ->value('final_price') * $cart['quantity'],
                ]);

                //update the stocks
                Product::where("id", $cart['id'])
                    ->where('status', 1)
                    ->where('stock', '>=', $cart['quantity'])
                    ->decrement('stock', $cart['quantity']);

            };

            if ($request->payment_method != 'cod') {

                $paymentMethod = SSLCOMMERZ::InitiatePayment($profile, $totalAmmount, $transaction_id, $products);

                DB::commit();

                // $filteredGateway = [];
                // foreach ($paymentMethod as $gateway) {
                //     if (str_contains($gateway['name'], "BKash") || str_contains($gateway['name'], "DBBL")) {
                //         $filteredGateway[] = $gateway;
                //     }
                // }

                return Inertia::render("Frontend/Checkout", ['paymentOptions' => $paymentMethod]);

            } else {
                DB::commit();
                return back();
            }

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['message' => 'Something Wrong!']);
        }
    }

    public function paymentSuccess(Request $request)
    {
        SSLCommerz::InitiateSuccess(tran_id: $request->query('tran_id'));
        return redirect('/profile');
    }

    public function paymentCancel(Request $request)
    {
        SSLCommerz::InitiateCancel($request->query('tran_id'));
        $this->updateStocksOnCancel($request->query('tran_id'));

        return redirect('/profile');
    }

    public function paymentFail(Request $request)
    {
        SSLCommerz::InitiateFail($request->query('tran_id'));
        $this->updateStocksOnCancel($request->query('tran_id'));

        return redirect('/profile');
    }

    public function paymentIPN(Request $request)
    {
        dd($request->input('val_id'));
        return SSLCommerz::InitiateIPN($request->input('tran_id'), $request->input('status'), $request->input('val_id'));
    }

    public function updateStocksOnCancel($tran_id)
    {
        $invoice_id = Invoice::where('transaction_id', $tran_id)->value('id');
        $invoiceOrders = InvoiceOrder::where('invoice_id', $invoice_id)->select('product_id', 'quantity')->get();

        foreach ($invoiceOrders as $item) {
            Product::where('id', $item['product_id'])
                ->increment('stock', $item['quantity']);
        };

        return true;
    }
}

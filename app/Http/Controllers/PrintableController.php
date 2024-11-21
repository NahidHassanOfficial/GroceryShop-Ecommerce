<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Profile\InvoiceController;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Spatie\LaravelPdf\Facades\Pdf;

class PrintableController extends Controller
{
    public function downloadInvoice()
    {
        $invoiceID = request()->invoiceID;
        $invoice = Invoice::findOrFail($invoiceID);

        $request = new Request(['invoiceID' => $invoiceID]);
        $request->headers->set('id', request()->header('id'));
        $request->headers->set('role', request()->header('role'));

        $response = app(InvoiceController::class)->invoiceInfo($request);
        if ($response == false) {
            return abort(404);
        }

        $user = $response->getData()->user;
        $invoiceOrders = $response->getData()->invoiceOrders;

        return Pdf::view('invoice.invoice', compact('user', 'invoice', 'invoiceOrders'))
            ->format('a4')
            ->name('invoice-' . '#FC' . request()->invoiceID . '.pdf');
    }

    public function printInvoice()
    {

        $invoiceID = request()->invoiceID;
        $invoice = Invoice::findOrFail($invoiceID);

        $request = new Request(['invoiceID' => $invoiceID]);
        $request->headers->set('id', request()->header('id'));
        $request->headers->set('role', request()->header('role'));

        $response = app(InvoiceController::class)->invoiceInfo($request);
        if ($response == false) {
            return abort(404);
        }
        $user = $response->getData()->user;
        $invoiceOrders = $response->getData()->invoiceOrders;

        // return view('invoice.invoice', compact('user', 'invoice', 'invoiceOrders'));
        return Inertia::render('Printable/Invoice', ['invoice' => $invoice, 'user' => $user, 'invoiceOrders' => $invoiceOrders]);
    }
}

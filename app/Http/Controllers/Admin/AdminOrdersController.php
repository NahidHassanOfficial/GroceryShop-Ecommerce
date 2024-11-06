<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AdminOrdersController extends Controller
{
    public function ordersPage(Request $request)
    {
        $orders = Order::orderByDesc('id')->paginate(10);
        return Inertia::render("Backend/Orders", ['orders' => $orders]);
    }
}

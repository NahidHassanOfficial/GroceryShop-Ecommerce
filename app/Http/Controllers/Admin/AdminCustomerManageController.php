<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AdminCustomerManageController extends Controller
{
    public function customerspage(Request $request)
    {
        $customers = User::orderByDesc('id')->paginate(10);
        return Inertia::render("Backend/Customers", ['customers' => $customers]);
    }

    public function editCustomerPage(Request $request)
    {
        return Inertia::render("Backend/EditCustomer");
    }
}

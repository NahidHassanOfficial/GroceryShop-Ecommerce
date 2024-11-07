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

    public function editCustomerPage($id)
    {
        $customer = User::findOrFail($id)->makeVisible('created_at');
        return Inertia::render("Backend/EditCustomer", ["customer" => $customer]);
    }
}

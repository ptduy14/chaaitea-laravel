<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class CustomerController extends Controller
{
    public function indexCustomer() {
        $customers = User::where('role', 0)->get();

        return view('admin.customer.index', compact('customers'));
    }

    public function handleSearchCustomer($type, $content) {
        switch ($type) {
            case 'tên khách hàng':
                $customers = User::where('name', 'like', '%' . $content . '%')->where('role', 0)->get();
                break;
            
            default:
                # code...
                break;
        }
    
        return view('admin.customer.customer-table', compact('customers'));
    }
}

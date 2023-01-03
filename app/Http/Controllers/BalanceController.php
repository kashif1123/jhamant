<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BalanceController extends Controller
{
    public function supplierbalance(){
        return view('admin.supplier.supplier_balance');
    }

    public function customerbalance(){
        return view('admin.supplier.supplier_balance');
    }
}

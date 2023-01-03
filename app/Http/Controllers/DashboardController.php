<?php

namespace App\Http\Controllers;

use App\AccountTopup;
use App\BankAccount;
use App\Customer;
use App\CustomerInvoice;
use App\ExpenseDetail;
use App\Ledger;
use App\Munshi;
use App\PayAmount;
use App\Product;
use App\Purchase;
use App\ReceiveAmount;
use App\Supplier;
use App\SupplierInvoice;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(){
        $totalamount=BankAccount::sum('current_balance');
        $data = SupplierInvoice::all();
        $minusData = 0;
        if (count($data) > 0) {
            foreach ($data as $key => $item) {
                $minusData += $item->munshiana + $item->withholding_tax;
            }
        }
        $productsworth=Purchase::where('quantity_remaining','>',0)->sum(DB::raw('purchase_price * quantity_remaining'));
        $productsworth-=$minusData;
//        $productsworth=Product::where('total_qty','>',0)->sum(DB::raw('purchase_price * total_qty'));
        $suppliers=Supplier::all();
        $customers=Customer::where('id','<>',1)->get();
        $munshis=Munshi::all();
        $payable=0;
        $receivable=0;
        foreach ($suppliers as $sup) {
            $suppp = Ledger::where('person_type', '=', 'supplier')->where('person_id', '=', $sup->id)->get()->last();
            if ($suppp->balance < 0) {
                $payable += $suppp->balance;
            }else{
                $receivable += $suppp->balance;
            }
        }
        if ($customers){
        foreach ($customers as $cuss) {
            $cussss = Ledger::where('person_type', '=', 'customer')->where('person_id', '=', $cuss->id)->get()->last();
            if ($cussss->balance < 0) {
                $payable += $cussss->balance;
            } else {
                $receivable += $cussss->balance;
            }
        }
        }
        if ($munshis){
        foreach ($munshis as $munshi) {
            $munshi_ledger = Ledger::where('person_type', '=', 'munshi')->where('person_id', '=', $munshi->id)->get()->last();
            if ($munshi_ledger->balance < 0) {
                $payable += $munshi_ledger->balance;
            } else {
                $receivable += $munshi_ledger->balance;
            }
        }
        }
//        dd($receivable);
//        return response($payable);
        return view('admin.dashboard.dashboard',compact('productsworth','receivable','payable','totalamount'));
    }
    public function getChartData(){
        $mainArray=[];
        $carbon = Carbon::now();
        for ($i=1;$i<=12;$i++) {
            $year=$carbon->year;
            $month=$carbon->month;

            //expanse calculations
            $expense=ExpenseDetail::whereYear('expense_date','=', $year)
                ->whereMonth('expense_date','=', $month)
                ->sum('amount');
            $paid=PayAmount::whereYear('date','=', $year)
                ->whereMonth('date','=', $month)
                ->sum('paying_amount');
            $supplier_invoices=SupplierInvoice::whereYear('date_of_purchase','=', $year)
                ->whereMonth('date_of_purchase','=', $month)
                ->sum('paid');
            $total_expanses=$expense+$paid+$supplier_invoices;



            //income calculations
            $customer_invoices=CustomerInvoice::whereYear('date','=', $year)
                ->whereMonth('date','=', $month)
                ->sum('paid');
            $receives=ReceiveAmount::whereYear('date','=', $year)
                ->whereMonth('date','=', $month)
                ->sum('receiving_amount');
            $topup=AccountTopup::whereYear('topup_date','=', $year)
                ->whereMonth('topup_date','=', $month)
                ->sum('topupamount');
            $total_income=$customer_invoices+$receives+$topup;

            $carbon->subMonth();
//            return response(["data"=>$supplier_invoices]);
            $temp['year']=$carbon->englishMonth.'-'.$carbon->year;
//            $temp['income']=rand(10,100);
            if ($total_expanses) {
                $temp['expenses'] = $total_expanses;
            } else{
                $temp['expenses'] = 0;
            }
            if ($total_income){
                $temp['income']=$total_income;
            } else{
                $temp['income']= 0;
            }
            array_push($mainArray,$temp);
        }
        return $mainArray;



    }
}

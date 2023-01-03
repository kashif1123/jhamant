<?php

namespace App\Http\Controllers;

use App\BankAccount;
use App\CustomerInvoice;
use App\Dayclose;
use App\DayCloseBalance;
use App\DaycloseStock;
use App\Dip;
use App\ExpenseDetail;
use App\MonthClose;
use App\MonthCloseBalance;
use App\MonthcloseStock;
use App\PayAmount;
use App\Product;
use App\Purchase;
use App\PurchaseReturn;
use App\ReceiveAmount;
use App\Sale;
use App\SaleReturn;
use App\SupplierInvoice;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MonthCloseController extends Controller
{
        public function report(){
//        $last_date=Dayclose::select('closing_date')->get()->last();
        $products=Product::all();
        $date=date("Y-m-d H:i:s");
        $date=MonthClose::select('closing_date_from','closing_date_to')->get()->last();
            $cash_in_hand = BankAccount::all();
            $expected_profit = CustomerInvoice::where('date', '=', $date)->select()
                ->join('sales', 'sales.customer_invoices_id', '=', 'customer_invoices.id')
                ->join('products', 'products.id', '=', 'sales.product_id')
                ->get();
            $add = 0;
            foreach ($expected_profit as $result) {
                $add += $result->sale_price - $result->purchase_price;
            }
        if ($date) {
            $product_wise_profit=CustomerInvoice::select('sales.id','products.name as p_name','categories.name as cc_name','companies.company_name',
                'sales.sale_price',DB::raw(' sum(sales.quantity) as quantity'),
                DB::raw('sum(sales.margin_profit) as p_amount'),
                'sales.sale_date as date')
                ->join('sales','sales.customer_invoices_id','=','customer_invoices.id')
                ->join('products','products.id','=','sales.product_id')
                ->join('categories','categories.id','=','products.category_id')
                ->join('companies','companies.id','=','products.company_id')
                ->groupBy('sales.product_id')->get();

            $expenses = ExpenseDetail::select('expense_heads.expense_head',DB::raw(' sum(expense_details.amount) as amount'))
//                ->whereBetween('expense_date', [date('Y-m-d H:i:s', strtotime($date->closing_date_from)), date('Y-m-d H:i:s', strtotime($date->closing_date_to))])
                ->join('expense_heads', 'expense_heads.id', '=', 'expense_details.expense_id')
                ->groupBy('expense_heads.id')->get();
            $s_receiving = ReceiveAmount::where('person_type', '=', 'supplier')
                ->whereBetween('date', [date('Y-m-d H:i:s', strtotime($date->closing_date_from)), date('Y-m-d H:i:s', strtotime($date->closing_date_to))])
                ->select('receive_amounts.id', 'suppliers.name', 'receive_amounts.description', 'receiving_amount')
                ->join('suppliers', 'suppliers.id', '=', 'receive_amounts.person_id')
                ->get();
            $c_receiving = ReceiveAmount::where('person_type', '=', 'customer')
                ->whereBetween('date', [date('Y-m-d H:i:s', strtotime($date->closing_date_from)), date('Y-m-d H:i:s', strtotime($date->closing_date_to))])
                ->select('receive_amounts.id', 'customers.name', 'receive_amounts.description', 'receiving_amount')
                ->join('customers', 'customers.id', '=', 'receive_amounts.person_id')
                ->get();
            $s_paying = PayAmount::where('person_type', '=', 'supplier')
                ->whereBetween('date', [date('Y-m-d H:i:s', strtotime($date->closing_date_from)), date('Y-m-d H:i:s', strtotime($date->closing_date_to))])
                ->select('pay_amounts.id', 'suppliers.name', 'pay_amounts.description', 'paying_amount')
                ->join('suppliers', 'suppliers.id', '=', 'pay_amounts.person_id')
                ->get();
            $c_paying = PayAmount::where('person_type', '=', 'customer')->whereBetween('date', [date('Y-m-d H:i:s', strtotime($date->closing_date_from)), date('Y-m-d H:i:s', strtotime($date->closing_date_to))])
                ->select('pay_amounts.id', 'customers.name', 'pay_amounts.description', 'paying_amount')
                ->join('customers', 'customers.id', '=', 'pay_amounts.person_id')
                ->get();
            $c_stock = MonthcloseStock::select('closing_stock', 'name', 'closing_s_rate', 'closing_p_rate')->where('closing_date_from','=',$date->closing_date_fromt)->where('closing_date_to','=',$date->closing_date_to)
                ->join('month_closes', 'month_closes.id', '=', 'monthclose_stocks.month_id')
                ->join('products', 'products.id', '=', 'monthclose_stocks.product_id')->get();
            $month_dates=MonthClose::select('closing_date_from','closing_date_to','id')->get();
            return view('admin.monthclose.month_close', compact('c_stock','month_dates', 'cash_in_hand',
                'add','product_wise_profit' ,
                 'expenses', 's_receiving', 'c_receiving', 's_paying', 'c_paying', 'date'));
        }
        else{
            return view('admin.monthclose.month_close',compact('date', 'cash_in_hand'));
        }
        }
        public function databydate(Request $request){
//            dd($request->dates);
//        $last_date=Dayclose::select('closing_date')->get()->last();
        $products=Product::all();
        $petrol=Product::find(1);
        $diesel=Product::find(2);

        $date=date("Y-m-d H:i:s");
//        $date_to=date("Y-m-d H:i:s");
//        $prev_stock=Product::find($request->id);
        $p_prev_analysed=Dip::where('product_id','=',1)->get()->last();
        $p_opening_stock=DaycloseStock::where('product_id','=',1)->get()->last();
        if ($p_opening_stock){
            $p_prev_date=$p_opening_stock->created_at->subDays(1);
        }else{
            $p_prev_date=Carbon::now()->subDays(1);
        }
        $p_sales=Sale::select('quantity')->where('product_id','=',1)
            ->whereBetween('created_at',[date('Y-m-d H:i:s',strtotime($p_prev_date)),date('Y-m-d H:i:s',strtotime($date))])
            ->sum('quantity');
        $p_purchases=Purchase::where('product_id','=',1)
            ->whereBetween('created_at',[date('Y-m-d H:i:s',strtotime($p_prev_date)),date('Y-m-d H:i:s',strtotime($date))])
            ->sum('quantity');

        $d_opening_stock=DaycloseStock::where('product_id','=',2)->get()->last();
        if ($d_opening_stock){
            $d_prev_date=$d_opening_stock->created_at->subDays(1);
        }else{
            $d_prev_date=Carbon::now()->subDays(1);
        }
        $d_sales=Sale::select('quantity')->where('product_id','=',2)
            ->whereBetween('created_at',[date('Y-m-d H:i:s',strtotime($d_prev_date)),date('Y-m-d H:i:s',strtotime($date))])
            ->sum('quantity');
        $d_purchases=Purchase::where('product_id','=',2)
            ->whereBetween('created_at',[date('Y-m-d H:i:s',strtotime($d_prev_date)),date('Y-m-d H:i:s',strtotime($date))])
            ->sum('quantity');

//        $date=date("Y/m/d");
        $date=MonthClose::select('closing_date_from','closing_date_to')->where('id','=',$request->dates)->get()->last();


            $cash_in_hand = BankAccount::all();
//        $expected_profit=CustomerInvoice::all();
            $expected_profit = CustomerInvoice::where('date', '=', $date)->select()
                ->join('sales', 'sales.customer_invoices_id', '=', 'customer_invoices.id')
                ->join('products', 'products.id', '=', 'sales.product_id')
                ->get();
            $add = 0;
            foreach ($expected_profit as $result) {
                $add += $result->sale_price - $result->purchase_price;
            }
        if ($date) {
            $sales_credit = CustomerInvoice::whereRaw('paid < grand_total')
                ->whereBetween('date', [date('Y-m-d H:i:s', strtotime($date->closing_date_from)), date('Y-m-d H:i:s', strtotime($date->closing_date_to))])
//        ->whereBetween('date','=',$date)
                ->join('customers', 'customers.id', '=', 'customer_invoices.customer_id')
                ->get();
            $sales_cash = CustomerInvoice::whereRaw('paid = grand_total')
                ->whereBetween('date', [date('Y-m-d H:i:s', strtotime($date->closing_date_from)), date('Y-m-d H:i:s', strtotime($date->closing_date_to))])
                ->join('customers', 'customers.id', '=', 'customer_invoices.customer_id')
                ->get();
//dd($sales_cash);
            $purchase_credit = SupplierInvoice::whereRaw('paid < grand_total')
                ->whereBetween('date_of_purchase', [date('Y-m-d H:i:s', strtotime($date->closing_date_from)), date('Y-m-d H:i:s', strtotime($date->closing_date_to))])
                ->join('suppliers', 'suppliers.id', '=', 'supplier_invoices.supplier_id')
                ->get();
//        dd($purchase_credit);
            $purchase_cash = SupplierInvoice::whereRaw('paid = grand_total')
                ->whereBetween('date_of_purchase', [date('Y-m-d H:i:s', strtotime($date->closing_date_from)), date('Y-m-d H:i:s', strtotime($date->closing_date_to))])
                ->join('suppliers', 'suppliers.id', '=', 'supplier_invoices.supplier_id')
                ->get();
            $purchase_return = PurchaseReturn::whereRaw('received_amount = total_receiving_amount')
                ->whereBetween('return_date', [date('Y-m-d H:i:s', strtotime($date->closing_date_from)), date('Y-m-d H:i:s', strtotime($date->closing_date_to))])
                ->join('suppliers', 'suppliers.id', '=', 'purchase_returns.supplier_id')
                ->get();
            $purchase_return2 = PurchaseReturn::whereRaw('received_amount < total_receiving_amount')
                ->whereBetween('return_date', [date('Y-m-d H:i:s', strtotime($date->closing_date_from)), date('Y-m-d H:i:s', strtotime($date->closing_date_to))])
                ->join('suppliers', 'suppliers.id', '=', 'purchase_returns.supplier_id')
                ->get();
            $sale_return = SaleReturn::whereRaw('paid_amount = total_paying_amount')->whereBetween('return_date', [date('Y-m-d H:i:s', strtotime($date->closing_date_from)), date('Y-m-d H:i:s', strtotime($date->closing_date_to))])
                ->join('customers', 'customers.id', '=', 'sale_returns.customer_id')
                ->get();
            $sale_return2 = SaleReturn::whereRaw('paid_amount < total_paying_amount')->whereBetween('return_Date', [date('Y-m-d H:i:s', strtotime($date->closing_date_from)), date('Y-m-d H:i:s', strtotime($date->closing_date_to))])
                ->join('customers', 'customers.id', '=', 'sale_returns.customer_id')
                ->get();
            $expenses = ExpenseDetail::whereBetween('expense_date', [date('Y-m-d H:i:s', strtotime($date->closing_date_from)), date('Y-m-d H:i:s', strtotime($date->closing_date_to))])
                ->join('expense_heads', 'expense_heads.id', '=', 'expense_details.expense_id')
                ->get();
            $s_receiving = ReceiveAmount::where('person_type', '=', 'supplier')
                ->whereBetween('date', [date('Y-m-d H:i:s', strtotime($date->closing_date_from)), date('Y-m-d H:i:s', strtotime($date->closing_date_to))])
                ->select('receive_amounts.id', 'suppliers.name', 'receive_amounts.description', 'receiving_amount')
                ->join('suppliers', 'suppliers.id', '=', 'receive_amounts.person_id')
                ->get();
            $c_receiving = ReceiveAmount::where('person_type', '=', 'customer')
                ->whereBetween('date', [date('Y-m-d H:i:s', strtotime($date->closing_date_from)), date('Y-m-d H:i:s', strtotime($date->closing_date_to))])
                ->select('receive_amounts.id', 'customers.name', 'receive_amounts.description', 'receiving_amount')
                ->join('customers', 'customers.id', '=', 'receive_amounts.person_id')
                ->get();
            $s_paying = PayAmount::where('person_type', '=', 'supplier')
                ->whereBetween('date', [date('Y-m-d H:i:s', strtotime($date->closing_date_from)), date('Y-m-d H:i:s', strtotime($date->closing_date_to))])
                ->select('pay_amounts.id', 'suppliers.name', 'pay_amounts.description', 'paying_amount')
                ->join('suppliers', 'suppliers.id', '=', 'pay_amounts.person_id')
                ->get();
            $c_paying = PayAmount::where('person_type', '=', 'customer')->whereBetween('date', [date('Y-m-d H:i:s', strtotime($date->closing_date_from)), date('Y-m-d H:i:s', strtotime($date->closing_date_to))])
                ->select('pay_amounts.id', 'customers.name', 'pay_amounts.description', 'paying_amount')
                ->join('customers', 'customers.id', '=', 'pay_amounts.person_id')
                ->get();
            $c_stock = MonthcloseStock::select('closing_stock', 'name', 'closing_s_rate', 'closing_p_rate')->where('closing_date_from','=',$date->closing_date_fromt)->where('closing_date_to','=',$date->closing_date_to)
                ->join('month_closes', 'month_closes.id', '=', 'monthclose_stocks.month_id')
                ->join('products', 'products.id', '=', 'monthclose_stocks.product_id')->get();
            $month_dates=MonthClose::select('closing_date_from','closing_date_to','id')->get();
            return view('admin.monthclose.month_close', compact('c_stock', 'petrol', 'p_sales','month_dates','p_purchases', 'p_opening_stock', 'diesel', 'd_sales', 'd_purchases', 'd_opening_stock', 'cash_in_hand', 'add', 'sales_credit', 'sales_cash', 'purchase_cash', 'purchase_credit', 'expenses', 'purchase_return', 'purchase_return2', 'sale_return', 'sale_return2', 's_receiving', 'c_receiving', 's_paying', 'c_paying', 'date'));
        }
        else{
            return view('admin.monthclose.month_close',compact('petrol','date', 'p_sales', 'p_purchases', 'p_opening_stock', 'diesel', 'd_sales', 'd_purchases', 'd_opening_stock', 'cash_in_hand'));
        }
        }
        public function close_month(Request $request){
            $date=MonthClose::select('closing_date_from','closing_date_to')->get()->last();
            //        return response('message');
//        $date=date("Y-m-d H:i:s a");
            $dayclose= new MonthClose();
            $dayclose->person_id=Auth::user()->id;
            $dayclose->closing_date_from=date('Y-m-d H:i:s',strtotime($request->dayclose_date_from));
            $dayclose->closing_date_to=date('Y-m-d H:i:s',strtotime($request->dayclose_date_to));
            $dayclose->save();
            $products=Product::all();
            $accounts=BankAccount::all();
            foreach ($products as $product){
                $dayclose_stock= new MonthcloseStock();
                $dayclose_stock->product_id=$product->id;
                $dayclose_stock->month_id=$dayclose->id;
                $dayclose_stock->closing_stock=$product->total_qty;
                $dayclose_stock->closing_p_rate=$product->purchase_price;
                $dayclose_stock->closing_s_rate=$product->sale_price;
                $dayclose_stock->save();
            }
            foreach ($accounts as $account){
                $dayclose_balance=new MonthCloseBalance();
                $dayclose_balance->month_close_id=$dayclose->id;
                $dayclose_balance->account_id=$account->id;
                $dayclose_balance->account_name=$account->branch_name;
                $dayclose_balance->closing_balance=$account->current_balance;
                $dayclose_balance->save();
            }


        }
        public function mini_monthly_close(Request $request){
            if (isset($request->id)){
                $monthclose=MonthClose::find($request->id);
            }else{
                $monthclose=MonthClose::get()->last();
            }
//            dd($monthclose);
            if (!$monthclose){
                $no_data_found="No Data Found";
                dd($no_data_found);
                return view('admin.monthclose.mini_month_close',compact('no_data_found'));
            }
            $total_sale=Sale::whereBetween('sale_date',[date('Y-m-d H:i:s',strtotime($monthclose->closing_date_from)),date('Y-m-d H:i:s',strtotime($monthclose->closing_date_to))])
                ->sum('quantity');
            $total_sales=Sale::whereBetween('sale_date',[date('Y-m-d H:i:s',strtotime($monthclose->closing_date_from)),date('Y-m-d H:i:s',strtotime($monthclose->closing_date_to))])
                ->get();
            $total_sale_amount=0;
            foreach ($total_sales as $sale_amount){
                $total_sale_amount+=($sale_amount->quantity * $sale_amount->sale_price);
            }
            $sales_credit=CustomerInvoice::whereRaw('paid < grand_total')
                ->whereBetween('date',[date('Y-m-d H:i:s',strtotime($monthclose->closing_date_from)),date('Y-m-d H:i:s',strtotime($monthclose->closing_date_to))])
                ->sum('paid');
            $sales_cash=CustomerInvoice::whereRaw('paid = grand_total')
                ->whereBetween('date',[date('Y-m-d H:i:s',strtotime($monthclose->closing_date_from)),date('Y-m-d H:i:s',strtotime($monthclose->closing_date_to))])
                ->sum('paid');
            $receive_amounts=ReceiveAmount::whereBetween('date',[date('Y-m-d H:i:s',strtotime($monthclose->closing_date_from)),date('Y-m-d H:i:s',strtotime($monthclose->closing_date_to))])
                ->sum('receiving_amount');
            $total_expanses=ExpenseDetail::
                whereBetween('expense_date',[date('Y-m-d H:i:s',strtotime($monthclose->closing_date_from)),date('Y-m-d H:i:s',strtotime($monthclose->closing_date_to))])
                ->sum('amount');
            $products_worth=0;
            $products=Product::all();
            foreach ($products as $product){
                $products_worth+=($product->total_qty*$product->purchase_price);
            }
            $month_closes=MonthClose::all();
            return view('admin.monthclose.mini_month_close',compact('month_closes','monthclose','total_sale','sales_credit','sales_cash',
                'receive_amounts','total_expanses','products_worth','total_sale_amount'));
        }
}
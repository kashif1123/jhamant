<?php

namespace App\Http\Controllers;

use App\BankAccount;
use App\BankTransfer;
use App\CustomerInvoice;
use App\Dayclose;
use App\DayCloseBalance;
use App\DaycloseStock;
use App\Dip;
use App\EmployeeCommission;
use App\ExpenseDetail;
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

class DayCloseController extends Controller
{
    public function report(){
        $last_date=Dayclose::select('closing_date')->get()->last();
        $products=Product::all();
        $petrol=Product::find(1);
        $diesel=Product::find(2);

        $date=date("Y-m-d H:i:s");
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



        $date=date("Y/m/d");
        $cash_in_hand=BankAccount::all();
//        $expected_profit=CustomerInvoice::all();
        $expected_profit=CustomerInvoice::whereDate('date','=',$date)->select()
            ->join('sales','sales.customer_invoices_id','=','customer_invoices.id')
            ->join('products','products.id','=','sales.product_id')
            ->get();
        $add=0;
        foreach ($expected_profit as $result){
            $add+=$result->sale_price-$result->purchase_price;
        }
        $margin_profit=Sale::whereDate('sales.sale_date','=',$date)->select('products.name','sales.quantity','sales.sale_price','sales.purchase_price','sales.margin_profit')
            ->join('products','products.id','=','sales.product_id')
            ->get();
        $sum_margin=Sale::whereDate('sales.sale_date','=',$date)->sum('margin_profit');


        $sales_credit_customers=CustomerInvoice::whereRaw('paid < grand_total')->whereDate('date','=',$date)->where('customer_person','customer')
            ->join('customers','customers.id','=','customer_invoices.customer_id')
            ->get();
        $sales_credit_suppliers=CustomerInvoice::whereRaw('paid < grand_total')->whereDate('date','=',$date)->where('customer_person','supplier')
            ->join('suppliers','suppliers.id','=','customer_invoices.customer_id')
            ->get();


        $sales_cash_customers=CustomerInvoice::whereRaw('paid = grand_total')->whereDate('date','=',$date)->where('customer_person','customer')
            ->join('customers','customers.id','=','customer_invoices.customer_id')
            ->get();
        $sales_cash_suppliers=CustomerInvoice::whereRaw('paid = grand_total')->whereDate('date','=',$date)->where('customer_person','supplier')
            ->join('suppliers','suppliers.id','=','customer_invoices.customer_id')
            ->get();


        $purchase_credit_suppliers=SupplierInvoice::whereRaw('paid < grand_total')->where('date_of_purchase','=',$date)->where('supplier_person','supplier')
            ->join('suppliers','suppliers.id','=','supplier_invoices.supplier_id')
            ->get();
        $purchase_credit_customers=SupplierInvoice::whereRaw('paid < grand_total')->where('date_of_purchase','=',$date)->where('supplier_person','customer')
            ->join('customers','customers.id','=','supplier_invoices.supplier_id')
            ->get();


        $purchase_cash_suppliers=SupplierInvoice::whereRaw('paid = grand_total')->where('date_of_purchase','=',$date)->where('supplier_person','supplier')
            ->join('suppliers','suppliers.id','=','supplier_invoices.supplier_id')
            ->get();
        $purchase_cash_customers=SupplierInvoice::whereRaw('paid = grand_total')->where('date_of_purchase','=',$date)->where('supplier_person','customer')
            ->join('customers','customers.id','=','supplier_invoices.supplier_id')
            ->get();



        $purchase_return=PurchaseReturn::whereRaw('received_amount = total_receiving_amount')->where('return_date','=',$date)
            ->join('suppliers','suppliers.id','=','purchase_returns.supplier_id')
            ->get();
        $purchase_return2=PurchaseReturn::whereRaw('received_amount < total_receiving_amount')->where('return_date','=',$date)
            ->join('suppliers','suppliers.id','=','purchase_returns.supplier_id')
            ->get();
        $sale_return=SaleReturn::whereRaw('paid_amount = total_paying_amount')->where('return_date','=',$date)
            ->join('customers','customers.id','=','sale_returns.customer_id')
            ->get();
        $sale_return2=SaleReturn::whereRaw('paid_amount < total_paying_amount')->where('return_date','=',$date)
            ->join('customers','customers.id','=','sale_returns.customer_id')
            ->get();
        $expenses=ExpenseDetail::where('expense_date','=',$date)
            ->join('expense_heads','expense_heads.id','=','expense_details.expense_id')
            ->get();
        $s_receiving=ReceiveAmount::where('person_type','=','supplier')->where('date','=',$date)->select('receive_amounts.id','suppliers.name','receive_amounts.description','receiving_amount')
            ->join('suppliers','suppliers.id','=','receive_amounts.person_id')
            ->get();
        $c_receiving=ReceiveAmount::where('person_type','=','customer')->where('date','=',$date)->select('receive_amounts.id','customers.name','receive_amounts.description','receiving_amount')
            ->join('customers','customers.id','=','receive_amounts.person_id')
            ->get();
        $o_receiving=ReceiveAmount::where('person_type','=','owner')->where('date','=',$date)->select('receive_amounts.id','owners.name','receive_amounts.description','receiving_amount')
            ->join('owners','owners.id','=','receive_amounts.person_id')
            ->get();
        $m_receiving=ReceiveAmount::where('person_type','=','munshi')->where('date','=',$date)->select('receive_amounts.id','munshis.name','receive_amounts.description','receiving_amount')
            ->join('munshis','munshis.id','=','receive_amounts.person_id')
            ->get();
        $s_paying=PayAmount::where('person_type','=','supplier')->where('date','=',$date)->select('pay_amounts.id','suppliers.name','pay_amounts.description','paying_amount')
            ->join('suppliers','suppliers.id','=','pay_amounts.person_id')
            ->get();
        $c_paying=PayAmount::where('person_type','=','customer')->where('date','=',$date)->select('pay_amounts.id','customers.name','pay_amounts.description','paying_amount')
            ->join('customers','customers.id','=','pay_amounts.person_id')
            ->get();
        $o_paying=PayAmount::where('person_type','=','owner')->where('date','=',$date)->select('pay_amounts.id','owners.name','pay_amounts.description','paying_amount')
            ->join('owners','owners.id','=','pay_amounts.person_id')
            ->get();
        $m_paying=PayAmount::where('person_type','=','munshi')->where('date','=',$date)->select('pay_amounts.id','munshis.name','pay_amounts.description','paying_amount')
            ->join('munshis','munshis.id','=','pay_amounts.person_id')
            ->get();
        $bank_trnsfers=BankTransfer::select('bank_transfers.id','bank_transfers.amount','bank_transfers.description',
            'bank_from.branch_name as transfer_from','bank_to.branch_name as transfer_to')->where('bank_transfers.date','=',$date)
            ->join('bank_accounts as bank_from', 'bank_from.id', '=', 'bank_transfers.account_from')
            ->join('bank_accounts as bank_to', 'bank_to.id', '=', 'bank_transfers.account_to')
            ->get();
        $c_stock=DaycloseStock::select('closing_stock','name','closing_s_rate','closing_p_rate')->whereDate('daycloses.closing_date','=',$date)
            ->join('daycloses','daycloses.id','=','dayclose_stocks.day_id')
            ->join('products','products.id','=','dayclose_stocks.product_id')->get();
        $employee_commission=EmployeeCommission::select('name')->whereDate('employee_commissions.created_at','=',$date)
            ->join('employees','employees.id','=','employee_commissions.employee_id')->groupBy('employee_id')->selectRaw('sum(employee_commission) as sum')->get();
        $total_employee_commission=EmployeeCommission::whereDate('employee_commissions.created_at','=',$date)->sum('employee_commission');
        $total_expanses=ExpenseDetail::where('expense_date','=',$date)->select('amount')
            ->sum('amount');
        $withholding_profit=SupplierInvoice::where('date_of_purchase','=',$date)->sum('withholding_tax');
        $net_profit=$sum_margin+$withholding_profit-$total_expanses;
        return view('admin.dayclose.dayclosereport',compact('margin_profit','sum_margin','c_stock','petrol','total_expanses','net_profit'
            ,'p_sales','p_purchases','p_opening_stock','diesel','d_sales','d_purchases','d_opening_stock','withholding_profit',
            'cash_in_hand','add','bank_trnsfers','o_paying','m_paying','o_receiving','m_receiving',
            'sales_credit_customers','sales_credit_suppliers','sales_cash_customers','sales_cash_suppliers',
            'purchase_cash_suppliers','purchase_cash_customers','purchase_credit_suppliers','purchase_credit_customers',
            'expenses','purchase_return','employee_commission','total_employee_commission',
            'purchase_return2','sale_return','sale_return2','s_receiving','c_receiving','s_paying','c_paying','date','last_date'));
    }

    public function databydate(Request $request){
        $date=date("Y-m-d H:i:s");
        $petrol=Product::find(1);
        $diesel=Product::find(2);
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



        $last_date=Dayclose::select('closing_date')->get()->last();
        $date=$request->date;
//        $cash_in_hand=BankAccount::all();
        $cash_in_hand_date=DayCloseBalance::select('closing_balance','account_name')->whereDate('daycloses.closing_date','=',$date)
//            ->join('bank_accounts','bank_accounts.id','=','day_close_balances.account_id')
            ->join('daycloses','daycloses.id','=','day_close_balances.day_close_id')
            ->get();
//        $expected_profit=CustomerInvoice::all();
        $expected_profit=CustomerInvoice::whereDate('date','=',$date)->select()
            ->join('sales','sales.customer_invoices_id','=','customer_invoices.id')
            ->join('products','products.id','=','sales.product_id')
            ->get();
        $add=0;
        foreach ($expected_profit as $result){
            $add+=$result->sale_price-$result->purchase_price;
        }
        $sales_credit_customers=CustomerInvoice::whereRaw('paid < grand_total')->whereDate('date','=',$date)->where('customer_person','customer')
            ->join('customers','customers.id','=','customer_invoices.customer_id')
            ->get();
        $sales_credit_suppliers=CustomerInvoice::whereRaw('paid < grand_total')->whereDate('date','=',$date)->where('customer_person','supplier')
            ->join('suppliers','suppliers.id','=','customer_invoices.customer_id')
            ->get();


        $sales_cash_customers=CustomerInvoice::whereRaw('paid = grand_total')->whereDate('date','=',$date)->where('customer_person','customer')
            ->join('customers','customers.id','=','customer_invoices.customer_id')
            ->get();
        $sales_cash_suppliers=CustomerInvoice::whereRaw('paid = grand_total')->whereDate('date','=',$date)->where('customer_person','supplier')
            ->join('suppliers','suppliers.id','=','customer_invoices.customer_id')
            ->get();


        $purchase_credit_suppliers=SupplierInvoice::whereRaw('paid < grand_total')->where('date_of_purchase','=',$date)->where('supplier_person','supplier')
            ->join('suppliers','suppliers.id','=','supplier_invoices.supplier_id')
            ->get();
        $purchase_credit_customers=SupplierInvoice::whereRaw('paid < grand_total')->where('date_of_purchase','=',$date)->where('supplier_person','customer')
            ->join('customers','customers.id','=','supplier_invoices.supplier_id')
            ->get();


        $purchase_cash_suppliers=SupplierInvoice::whereRaw('paid = grand_total')->where('date_of_purchase','=',$date)->where('supplier_person','supplier')
            ->join('suppliers','suppliers.id','=','supplier_invoices.supplier_id')
            ->get();
        $purchase_cash_customers=SupplierInvoice::whereRaw('paid = grand_total')->where('date_of_purchase','=',$date)->where('supplier_person','customer')
            ->join('customers','customers.id','=','supplier_invoices.supplier_id')
            ->get();
        $purchase_return=PurchaseReturn::whereRaw('received_amount = total_receiving_amount')->where('return_date','=',$date)
            ->join('suppliers','suppliers.id','=','purchase_returns.supplier_id')
            ->get();
        $purchase_return2=PurchaseReturn::whereRaw('received_amount < total_receiving_amount')->where('return_date','=',$date)
            ->join('suppliers','suppliers.id','=','purchase_returns.supplier_id')
            ->get();
        $sale_return=SaleReturn::whereRaw('paid_amount = total_paying_amount')->where('return_date','=',$date)
            ->join('customers','customers.id','=','sale_returns.customer_id')
            ->get();
        $sale_return2=SaleReturn::whereRaw('paid_amount < total_paying_amount')->where('return_date','=',$date)
            ->join('customers','customers.id','=','sale_returns.customer_id')
            ->get();
        $expenses=ExpenseDetail::where('expense_date','=',$date)
            ->join('expense_heads','expense_heads.id','=','expense_details.expense_id')
            ->get();
        $s_receiving=ReceiveAmount::where('person_type','=','supplier')->where('date','=',$date)->select('receive_amounts.id','suppliers.name','receive_amounts.description','receiving_amount')
            ->join('suppliers','suppliers.id','=','receive_amounts.person_id')
            ->get();
        $c_receiving=ReceiveAmount::where('person_type','=','customer')->where('date','=',$date)->select('receive_amounts.id','customers.name','receive_amounts.description','receiving_amount')
            ->join('customers','customers.id','=','receive_amounts.person_id')
            ->get();
        $o_receiving=ReceiveAmount::where('person_type','=','owner')->where('date','=',$date)->select('receive_amounts.id','owners.name','receive_amounts.description','receiving_amount')
            ->join('owners','owners.id','=','receive_amounts.person_id')
            ->get();
        $m_receiving=ReceiveAmount::where('person_type','=','munshi')->where('date','=',$date)->select('receive_amounts.id','munshis.name','receive_amounts.description','receiving_amount')
            ->join('munshis','munshis.id','=','receive_amounts.person_id')
            ->get();
        $s_paying=PayAmount::where('person_type','=','supplier')->where('date','=',$date)->select('pay_amounts.id','suppliers.name','pay_amounts.description','paying_amount')
            ->join('suppliers','suppliers.id','=','pay_amounts.person_id')
            ->get();
        $c_paying=PayAmount::where('person_type','=','customer')->where('date','=',$date)->select('pay_amounts.id','customers.name','pay_amounts.description','paying_amount')
            ->join('customers','customers.id','=','pay_amounts.person_id')
            ->get();
        $o_paying=PayAmount::where('person_type','=','owner')->where('date','=',$date)->select('pay_amounts.id','owners.name','pay_amounts.description','paying_amount')
            ->join('owners','owners.id','=','pay_amounts.person_id')
            ->get();
        $m_paying=PayAmount::where('person_type','=','munshi')->where('date','=',$date)->select('pay_amounts.id','munshis.name','pay_amounts.description','paying_amount')
            ->join('munshis','munshis.id','=','pay_amounts.person_id')
            ->get();
        $bank_trnsfers=BankTransfer::select('bank_transfers.id','bank_transfers.amount','bank_transfers.description',
            'bank_from.branch_name as transfer_from','bank_to.branch_name as transfer_to')->where('bank_transfers.date','=',$date)
            ->join('bank_accounts as bank_from', 'bank_from.id', '=', 'bank_transfers.account_from')
            ->join('bank_accounts as bank_to', 'bank_to.id', '=', 'bank_transfers.account_to')
            ->get();
        $employee_commission=EmployeeCommission::select('name')->whereDate('employee_commissions.created_at','=',$date)
            ->join('employees','employees.id','=','employee_commissions.employee_id')->groupBy('employee_id')->selectRaw('sum(employee_commission) as sum')->get();
        $total_employee_commission=EmployeeCommission::whereDate('employee_commissions.created_at','=',$date)->sum('employee_commission');
        $margin_profit=Sale::whereDate('sales.sale_date','=',$date)->select('products.name','sales.quantity','sales.sale_price','sales.purchase_price','sales.margin_profit')
            ->join('products','products.id','=','sales.product_id')
            ->get();

        $sum_margin=Sale::whereDate('sales.sale_date','=',$date)->sum('margin_profit');
        $c_stock=DaycloseStock::select('closing_stock','name','closing_s_rate','closing_p_rate')->whereDate('daycloses.closing_date','=',$date)
            ->join('daycloses','daycloses.id','=','dayclose_stocks.day_id')
            ->join('products','products.id','=','dayclose_stocks.product_id')->get();
        $total_expanses=ExpenseDetail::where('expense_date','=',$date)->select('amount')
            ->sum('amount');
        $withholding_profit=SupplierInvoice::where('date_of_purchase','=',$date)->sum('withholding_tax');
        $net_profit=$sum_margin+$withholding_profit-$total_expanses;
        return view('admin.dayclose.dayclosereport',compact('withholding_profit','margin_profit','sum_margin','net_profit','total_expanses','c_stock','petrol','p_sales','p_purchases','p_opening_stock','diesel','d_sales','d_purchases','d_opening_stock','cash_in_hand_date','add',
            'sales_credit_customers','sales_credit_suppliers','sales_cash_customers','sales_cash_suppliers','bank_trnsfers','o_receiving','m_receiving',
            'purchase_cash_suppliers','purchase_cash_customers','purchase_credit_suppliers','purchase_credit_customers','o_paying','m_paying','employee_commission','total_employee_commission',
            'expenses','purchase_return','purchase_return2','sale_return','sale_return2','s_receiving','c_receiving','s_paying','c_paying','date','last_date'));
    }

    public function closeday(Request $request){
        $date=date('Y-m-d H:i:s',strtotime($request->dayclose_date));
        $dayclose= new Dayclose();
        $dayclose->person_id=Auth::user()->id;
        $dayclose->closing_date=$date;
        $dayclose->save();
        $products=Product::all();
        $accounts=BankAccount::all();
        foreach ($products as $product){
            $dayclose_stock= new DaycloseStock();
            $dayclose_stock->product_id=$product->id;
            $dayclose_stock->day_id=$dayclose->id;
            $dayclose_stock->closing_stock=$product->total_qty;
            $dayclose_stock->closing_p_rate=$product->purchase_price;
            $dayclose_stock->closing_s_rate=$product->sale_price;
            $dayclose_stock->save();
        }
        foreach ($accounts as $account){
            $dayclose_balance=new DayCloseBalance();
            $dayclose_balance->day_close_id=$dayclose->id;
            $dayclose_balance->account_id=$account->id;
            $dayclose_balance->account_name=$account->branch_name;
            $dayclose_balance->closing_balance=$account->current_balance;
            $dayclose_balance->save();
        }
        return response("success") ;
    }
}

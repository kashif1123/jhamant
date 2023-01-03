<?php

namespace App\Http\Controllers;

use App\BankAccount;
use App\ExpenseDetail;
use App\Ledger;
use App\MonthClose;
use App\MonthCloseBalance;
use App\MonthcloseStock;
use App\Owner;
use App\Product;
use App\ProfitReconciliation;
use App\Sale;
use App\SupplierInvoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class ProfitController extends Controller
{
    public function index(){
        $owners=Owner::all();
        return view('admin.profit_reconciliation.form',compact('owners'));
    }
    public function fetch_month_profit(Request $request){
        $dates=explode('-',$request->month);
        $sum_margin=Sale::where('sales.sale_date',[date('Y-m-d',strtotime($dates[0])),date('Y-m-d',strtotime($dates[1]))])->sum('margin_profit');
        $total_expanses=ExpenseDetail::whereBetween('expense_date',[date('Y-m-d',strtotime($dates[0])),date('Y-m-d',strtotime($dates[1]))])->select('amount')->sum('amount');
        $withholding_profit=SupplierInvoice::whereBetween('date_of_purchase',[date('Y-m-d',strtotime($dates[0])),date('Y-m-d',strtotime($dates[1]))])->sum('withholding_tax');
        $net_profit=$sum_margin+$withholding_profit-$total_expanses;
        return response($net_profit);
    }
    public function fetch_owner_balance(Request $request){
        $owner=Ledger::where('person_type','=','owner')->where('person_id','=',$request->owner)->get()->last();
        return response($owner);
    }
    public function close_month_and_reconcile_profit(Request $request){
        $dates=explode('-',$request->month);
        if ($request->total_profit < 0){
            $profit_loss="loss";
            $ledger_description="Loss Reconciled for Month:".date('Y-m-d',strtotime($dates[0]))."  -  ".date('Y-m-d H:i:s',strtotime($dates[1])).".";
        }else{
            $profit_loss = "profit";
            $ledger_description="Profit Reconciled for Month:".date('Y-m-d',strtotime($dates[0]))."  -  ".date('Y-m-d H:i:s',strtotime($dates[1])).".";
        }
        $dayclose= new MonthClose();
        $dayclose->person_id=Auth::user()->id;
        $dayclose->closing_date_from=date('Y-m-d H:i:s',strtotime($dates[0]));
        $dayclose->closing_date_to=date('Y-m-d H:i:s',strtotime($dates[1]));
        $dayclose->total_profit=$request->total_profit;
        $dayclose->total_reconciled=$request->total_reconciled;
        $dayclose->profit_loss=$profit_loss;
        $dayclose->reconciled='yes';
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

        //Reconcile Ledger
        foreach ($request->data as $data){
            $profit_reconcile=new ProfitReconciliation();
            $profit_reconcile->owner_id=$data['id'];
            $profit_reconcile->month_id=$dayclose->id;
            $profit_reconcile->amount_reconciled=$data['reconcile_amount'];
            $profit_reconcile->reconcile_description=$data['description'];
            $profit_reconcile->save();
            $owner_last_ledger=Ledger::where('person_type','=','owner')->where('person_id','=',$data['id'])->get()->last();

            $ledger=new Ledger();
            $ledger->person_type="owner";
            $ledger->transaction_type="profit_loss_reconcile";
            $ledger->person_id=$data['id'];
            $ledger->user_id=Auth::user()->id;
            $ledger->main_transaction_id=$profit_reconcile->id;
            $ledger->person_name=$data['owner_name'];
            $ledger->date=date('Y-m-d');
            $ledger->description=$ledger_description;
            if ($request->total_profit < 0){
                $ledger->debit=$data['reconcile_amount'];
                $ledger->balance=$owner_last_ledger->balance+$data['reconcile_amount'];
            }else{
                $ledger->credit=$data['reconcile_amount'];
                $ledger->balance=$owner_last_ledger->balance-$data['reconcile_amount'];
            }
            $ledger->save();
        }
        return response('Success');
    }
    public function profit_report(){
        return view('admin.profit_reconciliation.profit_reconciliation_report');
    }
    public function dt_get_all_reconciliations(){
        $data=ProfitReconciliation::select('profit_reconciliations.id','closing_date_from','closing_date_to','profit_loss',
            'month_closes.total_profit','month_closes.total_reconciled','profit_reconciliations.amount_reconciled',
            'reconcile_description','profit_reconciliations.created_at','owners.name')
            ->join('month_closes','month_closes.id','=','profit_reconciliations.month_id')
            ->join('owners','owners.id','=','profit_reconciliations.owner_id')
            ->get();
        try {
            return DataTables::of($data)->make(true);
        } catch (\Exception $e) {
        }
    }
}

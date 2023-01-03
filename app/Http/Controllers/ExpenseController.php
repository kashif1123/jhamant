<?php

namespace App\Http\Controllers;

use App\AccountTopup;
use App\BankAccount;
use App\DataTables\AccountTopupDataTablesEditor;
use App\DataTables\ExpenseDetailDataTablesEditor;
use App\DataTables\ExpenseHeadDataTablesEditor;
use App\ExpenseHead;
use App\ExpenseDetail;
use App\Ledger;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;



class ExpenseController extends Controller
{
    public function expense(){
        $accounts=BankAccount::all();
        $expensehead=ExpenseHead::all();
        return view('admin.expense.expense',compact('expensehead','accounts'));
    }
    public function showexpenses(){
        return view('admin.expense.allexpense');
    }
    public function showexpenseheads(){
        return view('admin.expense.allexpensehead');
    }
    public function fetch_account_balance(Request $request){
        $balance=BankAccount::find($request->account);
        return response(["data"=>$balance]);
    }
    public function insert_new_expensehead(Request $request){
        $expensehead= new ExpenseHead();
        $expensehead->expense_head=$request->name;
        $expensehead->save();
        $data=ExpenseHead::all();
        return response(["data"=>$data]);
    }
    public function insert_new_expensedetail(Request $request){
        $expense = ExpenseHead::find($request->expensehead);
        $expensehead= new ExpenseDetail();
        $expensehead->expense_id=$request->expensehead;
        $expensehead->expense_date=date('Y-m-d H:i:s',strtotime($request->date));
        $expensehead->amount=$request->amount;
        $expensehead->name=$request->e_name;
        $expensehead->description=$request->description;
        $expensehead->save();
        $account_last_balance=BankAccount::find($request->paying_account);
        $expense_ledger=Ledger::where('person_type','=','expense')->where('person_id','=',$request->expensehead)->get()->last();
        $ledger=new Ledger();
        $ledger->person_type='expense';
        $ledger->transaction_type='expense';
        $ledger->person_id=$request->expensehead;
        $ledger->main_transaction_id=$expensehead->id;
//        $ledger->transaction_account_id=$request->paying_account;
        $ledger->account_last_balance=$account_last_balance->current_balance;
        $ledger->person_name=$expense->expense_head;
        $ledger->date=date('Y-m-d H:i:s',strtotime($request->date));
        $ledger->description=$request->description;
        $ledger->debit=$request->amount;
        if ($expense_ledger) {
            $ledger->balance=$expense_ledger->balance+$request->mount;
        }else{
            $ledger->balance=$request->amount;
        }
        $ledger->save();

        $account=BankAccount::find($request->paying_account);
        $account->current_balance-=$request->amount;
        $account->update();

        $bank_desc = "Amount: $request->amount paid to Expense Head: $expense->expense_head from Bank Branch: $account->branch_name.";
        $bankLedger= new Ledger();
        $bankLedger->person_type='Bank';
        $bankLedger->transaction_type='expense';
        $bankLedger->main_transaction_id=$expensehead->id;
        $bankLedger->person_id=$request->expensehead;
        $bankLedger->transaction_account_id=$account->id;
        $bankLedger->account_last_balance=$account_last_balance->current_balance;
        $bankLedger->person_name=$expense->expense_head;
        $bankLedger->cnic=$account->account;
        $bankLedger->date=date('Y-m-d H:i:s',strtotime($request->date));
        $bankLedger->description=$bank_desc;
        $bankLedger->credit=$request->amount;
        $bankLedger->balance=$account->current_balance;
        $bankLedger->save();

        $data='success';
        return response(["data"=>$data]);
    }


    public function dtgetexpensedetails(Request $request){
        $data=ExpenseDetail::select('expense_details.id','expense_details.name','expense_head','expense_date','amount','expense_details.description')
            ->join('expense_heads','expense_heads.id','=','expense_details.expense_id')
           ->get();
        try {
            return DataTables::of($data)->make(true);
        } catch (\Exception $e) {
        }
    }
    public function dtgetexpensebydatedetails(Request $request){
        $data=ExpenseDetail::select('expense_details.id','expense_head','expense_date','amount','expense_details.description')
            ->join('expense_heads','expense_heads.id','=','expense_details.expense_id')
            ->whereBetween('expense_date',[date('Y-m-d H:i:s',strtotime($request->min)),date('Y-m-d H:i:s',strtotime($request->max))])->get();
        try {
            return DataTables::of($data)->make(true);
        } catch (\Exception $e) {
        }
    }
    public function dtpostexpensedetail(ExpenseDetailDataTablesEditor $editor){

        return $editor->process(\request());
    }


    public function dtgetexpenseheads(Request $request){
        $data=ExpenseHead::select('id','expense_head')
           ->get();
        try {
            return DataTables::of($data)->make(true);
        } catch (\Exception $e) {
        }
    }
    public function dtgetexpenseheadsbydate(Request $request){
        $data=ExpenseHead::select('id','name')
            ->whereBetween('created_at',[date('Y-m-d H:i:s',strtotime($request->min)),date('Y-m-d H:i:s',strtotime($request->max))]);
        try {
            return DataTables::of($data)->make(true);
        } catch (\Exception $e) {
        }
    }
    public function dtpostexpenseheads(ExpenseHeadDataTablesEditor $editor){

        return $editor->process(\request());
    }


}

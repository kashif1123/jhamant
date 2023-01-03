<?php

namespace App\Http\Controllers;

use App\BankAccount;
use App\Customer;
use App\DataTables\PayAmountDataTablesEditor;
use App\Employee;
use App\Ledger;
use App\Munshi;
use App\Owner;
use App\PayAmount;
use App\ReceiveAmount;
use App\Supplier;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;


class PayReceiveController extends Controller
{
    public function payamount(){
        $accounts=BankAccount::all();
        $customers=Customer::all();
        return view('admin.payamount.payamount',compact('accounts','customers'));
    }
    public function allpaiddamounts(){
        return view('admin.payamount.allpaidamounts');
    }
    public function allreceivedamounts(){
        return view('admin.receiveamount.allreceiveamounts');
    }
    public function receiveamount(){
        $accounts=BankAccount::all();
        $customers=Customer::all();
        return view('admin.receiveamount.receiveamount',compact('accounts','customers'));
    }
    public function fetch_customers(){
        $customers=Customer::all();
        return response(["data"=>$customers]);
    }
    public function fetch_suppliers(){
        $customers=Supplier::all();
        return response(["data"=>$customers]);
    }
    public function fetch_munshis(){
        $munshis=Munshi::all();
        return response(["data"=>$munshis]);
    }
    public function fetch_employees(){
        $munshis=Employee::all();
        return response(["data"=>$munshis]);
    }
    public function fetch_owners(){
        $owners=Owner::all();
        return response(["data"=>$owners]);
    }
    public function fetch_person_balance(Request $request){
        $person_balance=Ledger::where('person_type','=',$request->type)->where('person_id','=',$request->id)->get()->last();
        return response(["data"=>$person_balance]);
    }
    public function insert_payamount(Request $request){
        $payamount= new PayAmount();
        $payamount->person_type=$request->account_type;
        $payamount->person_id=$request->person_id;
        $payamount->account_id=$request->paying_account;
        $payamount->last_balance=$request->person_last_balance;
        $payamount->paying_amount=$request->paying_amount;
        $payamount->date=date('Y-m-d H:i:s',strtotime($request->paying_date));
        $payamount->description=$request->description;
        $payamount->save();
        if ($request->account_type == 'customer'){
            $person=Customer::find($request->person_id);
        } else if ($request->account_type == 'supplier'){
            $person=Supplier::find($request->person_id);
        }else if ($request->account_type == 'employee'){
            $person=Employee::find($request->person_id);
        }else if ($request->account_type == 'owner'){
            $person=Owner::find($request->person_id);
        }
        $person_ledger=Ledger::where('person_type','=',$request->account_type)->where('person_id','=',$request->person_id)->get()->last();
        $ledger=new Ledger();
        $ledger->person_type=$request->account_type;
        $ledger->transaction_type='paid';
        $ledger->main_transaction_id=$payamount->id;
        $ledger->person_id=$request->person_id;
        $ledger->person_name=$person->name;
        $ledger->cnic=$person->cnic;
        $ledger->date=date('Y-m-d H:i:s',strtotime($request->paying_date));
        $ledger->description=$request->description;
        $ledger->debit=$request->paying_amount;
        $ledger->balance=$person_ledger->balance+$request->paying_amount;
        $ledger->transaction_account_id=$request->person_id;
        $ledger->save();
        $account=BankAccount::find($request->paying_account);
        $account->current_balance-=$request->paying_amount;
        $account->update();

        $bank_desc = "Amount: $request->paying_amount paid to $person->name from Bank Account: $account->branch_name.";
        $bankLedger= new Ledger();
        $bankLedger->person_type='Bank';
        $bankLedger->transaction_type='paid';
        $bankLedger->main_transaction_id=$payamount->id;
        $bankLedger->person_id=$request->person_id;
        $bankLedger->person_name=$person->name;
        $bankLedger->cnic=$account->account;
        $bankLedger->transaction_account_id=$account->id;
        $bankLedger->date=date('Y-m-d H:i:s',strtotime($request->paying_date));
        $bankLedger->description=$bank_desc;
        $bankLedger->credit=$request->paying_amount;
        $bankLedger->balance=$account->current_balance;
        $bankLedger->save();

        $success='success';
        return response(["data"=>$success]);
    }
    public function dtgetshowallpaid(){
        $data=PayAmount::where('person_type','=','supplier')->select('pay_amounts.id','name','branch_name','paying_amount','branch_name','date','paying_amount','pay_amounts.last_balance','date','pay_amounts.description')
            ->join('bank_accounts','bank_accounts.id','=','pay_amounts.account_id')
            ->join('suppliers','suppliers.id','=','pay_amounts.person_id')
            ->get();
        try {
            return DataTables::of($data)->make(true);
        } catch (\Exception $e) {
        }
    }
    public function dtgetshowallpaid2(){
        $data=PayAmount::where('person_type','=','customer')->select('pay_amounts.id','name','branch_name','paying_amount','branch_name','date','paying_amount','pay_amounts.last_balance','date','pay_amounts.description')
            ->join('bank_accounts','bank_accounts.id','=','pay_amounts.account_id')
            ->join('customers','customers.id','=','pay_amounts.person_id')
            ->get();
        try {
            return DataTables::of($data)->make(true);
        } catch (\Exception $e) {
        }
    }
    public function dtgetshowallpaid3(){
        $data=PayAmount::where('person_type','=','employee')->select('pay_amounts.id','name','branch_name','paying_amount','branch_name','date','paying_amount','pay_amounts.last_balance','date','pay_amounts.description')
            ->join('bank_accounts','bank_accounts.id','=','pay_amounts.account_id')
            ->join('employees','employees.id','=','pay_amounts.person_id')
            ->get();
        try {
            return DataTables::of($data)->make(true);
        } catch (\Exception $e) {
        }
    }
    public function dtgetshowallpaid4(){
        $data=PayAmount::where('person_type','=','owner')->select('pay_amounts.id','name','branch_name','paying_amount','branch_name','date','paying_amount','pay_amounts.last_balance','date','pay_amounts.description')
            ->join('bank_accounts','bank_accounts.id','=','pay_amounts.account_id')
            ->join('owners','owners.id','=','pay_amounts.person_id')
            ->get();
        try {
            return DataTables::of($data)->make(true);
        } catch (\Exception $e) {
        }
    }
    public function dtpostshowallpaid(PayAmountDataTablesEditor $editor){

        return $editor->process(\request());
    }
    public function dtgetshowallreceived(){
        $data=ReceiveAmount::where('person_type','=','supplier')->select('receive_amounts.id','name','branch_name','date','receiving_amount','receive_amounts.last_balance','receive_amounts.description')
            ->join('bank_accounts','bank_accounts.id','=','receive_amounts.account_id')
            ->join('suppliers','suppliers.id','=','receive_amounts.person_id')
            ->get();
        try {
            return DataTables::of($data)->make(true);
        } catch (\Exception $e) {
        }
    }
    public function dtgetshowallreceived2(){
        $data=ReceiveAmount::where('person_type','=','customer')->select('receive_amounts.id','name','branch_name','date','receiving_amount','receive_amounts.last_balance','receive_amounts.description')
            ->leftJoin('bank_accounts','bank_accounts.id','=','receive_amounts.account_id')
            ->leftJoin('customers','customers.id','=','receive_amounts.person_id')
            ->get();
        try {
            return DataTables::of($data)->make(true);
        } catch (\Exception $e) {
        }
    }
    public function dtgetshowallreceived3(){
        $data=ReceiveAmount::where('person_type','=','owner')->select('receive_amounts.id','name','branch_name','date','receiving_amount','receive_amounts.last_balance','receive_amounts.description')
            ->leftJoin('bank_accounts','bank_accounts.id','=','receive_amounts.account_id')
            ->leftJoin('owners','owners.id','=','receive_amounts.person_id')
            ->get();
        try {
            return DataTables::of($data)->make(true);
        } catch (\Exception $e) {
        }
    }
    public function dtpostshowallreceived(PayAmountDataTablesEditor $editor){

        return $editor->process(\request());
    }

    public function insert_receiveamount(Request $request){
        $payamount= new ReceiveAmount();
        $payamount->person_type=$request->account_type;
        $payamount->person_id=$request->person_id;
        $payamount->account_id=$request->paying_account;
        $payamount->last_balance=$request->person_last_balance;
        $payamount->receiving_amount=$request->receiving_amount;
        $payamount->date=date('Y-m-d H:i:s',strtotime($request->paying_date));
        $payamount->description=$request->description;
        $payamount->save();
        if ($request->account_type == 'customer'){
            $person=Customer::find($request->person_id);
        } else if ($request->account_type == 'supplier'){
            $person=Supplier::find($request->person_id);
        }else if ($request->account_type == 'owner'){
            $person=Owner::find($request->person_id);
        }
        $person_ledger=Ledger::where('person_type','=',$request->account_type)->where('person_id','=',$request->person_id)->get()->last();
        $ledger=new Ledger();
        $ledger->person_type=$request->account_type;
        $ledger->transaction_type='received';
        $ledger->main_transaction_id=$payamount->id;
        $ledger->person_id=$request->person_id;
        $ledger->person_name=$person->name;
        $ledger->cnic=$person->cnic;
        $ledger->date=date('Y-m-d H:i:s',strtotime($request->paying_date));
        $ledger->description=$request->description;
        $ledger->credit=$request->receiving_amount;
        $ledger->balance=$person_ledger->balance-$request->receiving_amount;
        $ledger->transaction_account_id=$request->person_id;
        $ledger->save();
        $account=BankAccount::find($request->paying_account);
        $account->current_balance+=$request->receiving_amount;
        $account->update();

        $bank_desc = "Amount: $request->receiving_amount received from $person->name to Bank Branch:$account->branch_name.";
        $bankLedger= new Ledger();
        $bankLedger->person_type='Bank';
        $bankLedger->transaction_type='received';
        $bankLedger->main_transaction_id=$payamount->id;
        $bankLedger->person_id=$request->person_id;
        $bankLedger->person_name=$person->name;
        $bankLedger->cnic=$account->account;
        $bankLedger->transaction_account_id=$account->id;
        $bankLedger->date=date('Y-m-d H:i:s',strtotime($request->paying_date));
        $bankLedger->description=$bank_desc;
        $bankLedger->debit=$request->receiving_amount;
        $bankLedger->balance=$account->current_balance;
        $bankLedger->save();

        $success='success';
        return response(["data"=>$success]);
    }
    public function delete_customer_paid(Request $request){
        $paid_amount=PayAmount::find($request->id);
        $paid_laedger=Ledger::where('transaction_type','=','paid')->where('main_transaction_id','=',$request->id)->where('person_type','=',$paid_amount->person_type)->get()->last();
        $last_ledger=Ledger::get()->last();
        if ($paid_laedger->id == $last_ledger->id){
            $account=BankAccount::find($paid_amount->account_id);
            $account->current_balance+=$paid_amount->paying_amount;
            $account->update();
            $last_ledger->delete();
            $paid_amount->delete();
            return response(['success'=>'Transaction deleted successfully']);
        }else{
            return response(['message'=>'You Can not delete this transaction']);
        }
    }
    public function delete_supplier_paid(Request $request){
        $paid_amount=PayAmount::find($request->id);
        $paid_laedger=Ledger::where('transaction_type','=','paid')->where('main_transaction_id','=',$request->id)->where('person_type','=',$paid_amount->person_type)->get()->last();
        $last_ledger=Ledger::get()->last();
        if ($paid_laedger->id == $last_ledger->id){
            $account=BankAccount::find($paid_amount->account_id);
            $account->current_balance+=$paid_amount->paying_amount;
            $account->update();
            $last_ledger->delete();
            $paid_amount->delete();
            return response(['success'=>'Transaction deleted successfully']);
        }else{
            return response(['message'=>'You Can not delete this transaction']);
        }
    }
    public function delete_employee_paid(Request $request){
        $paid_amount=PayAmount::find($request->id);
        $paid_laedger=Ledger::where('transaction_type','=','paid')->where('main_transaction_id','=',$request->id)->where('person_type','=',$paid_amount->person_type)->get()->last();
        $last_ledger=Ledger::get()->last();
        if ($paid_laedger->id == $last_ledger->id){
            $account=BankAccount::find($paid_amount->account_id);
            $account->current_balance+=$paid_amount->paying_amount;
            $account->update();
            $last_ledger->delete();
            $paid_amount->delete();
            return response(['success'=>'Transaction deleted successfully']);
        }else{
            return response(['message'=>'You Can not delete this transaction']);
        }
    }
    public function delete_owner_paid(Request $request){
        $paid_amount=PayAmount::find($request->id);
        $paid_laedger=Ledger::where('transaction_type','=','paid')->where('main_transaction_id','=',$request->id)->where('person_type','=',$paid_amount->person_type)->get()->last();
        $last_ledger=Ledger::get()->last();
        if ($paid_laedger->id == $last_ledger->id){
            $account=BankAccount::find($paid_amount->account_id);
            $account->current_balance+=$paid_amount->paying_amount;
            $account->update();
            $last_ledger->delete();
            $paid_amount->delete();
            return response(['success'=>'Transaction deleted successfully']);
        }else{
            return response(['message'=>'You Can not delete this transaction']);
        }
    }
    public function delete_customer_received(Request $request){
        $receive_amount=ReceiveAmount::find($request->id);
        $receive_ledger=Ledger::where('transaction_type','=','received')->where('main_transaction_id','=',$request->id)->where('person_type','=',$receive_amount->person_type)->get()->last();
        $last_ledger=Ledger::get()->last();
        if ($receive_ledger->id == $last_ledger->id){
            $account=BankAccount::find($receive_amount->account_id);
            $account->current_balance-=$receive_amount->receiving_amount;
            $account->update();
            $last_ledger->delete();
            $receive_amount->delete();
            return response(['success'=>'Transaction deleted successfully']);
        }else{
            return response(['message'=>'You Can not delete this transaction']);
        }
    }


    public function delete_supplier_received(Request $request){
        $receive_amount=ReceiveAmount::find($request->id);
        $receive_ledger=Ledger::where('transaction_type','=','received')->where('main_transaction_id','=',$request->id)->where('person_type','=',$receive_amount->person_type)->get()->last();
        $last_ledger=Ledger::get()->last();
        if ($receive_ledger->id == $last_ledger->id){
            $account=BankAccount::find($receive_amount->account_id);
            $account->current_balance-=$receive_amount->receiving_amount;
            $account->update();
            $last_ledger->delete();
            $receive_amount->delete();
            return response(['success'=>'Transaction deleted successfully']);
        }else{
            return response(['message'=>'You Can not delete this transaction']);
        }
    }
    public function delete_owner_received(Request $request){
        $receive_amount=ReceiveAmount::find($request->id);
        $receive_ledger=Ledger::where('transaction_type','=','received')->where('main_transaction_id','=',$request->id)->where('person_type','=',$receive_amount->person_type)->get()->last();
        $last_ledger=Ledger::get()->last();
        if ($receive_ledger->id == $last_ledger->id){
            $account=BankAccount::find($receive_amount->account_id);
            $account->current_balance-=$receive_amount->receiving_amount;
            $account->update();
            $last_ledger->delete();
            $receive_amount->delete();
            return response(['success'=>'Transaction deleted successfully']);
        }else{
            return response(['message'=>'You Can not delete this transaction']);
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\AccountTopup;
use App\BankAccount;
use App\BankTransfer;
use App\DataTables\AccountTopupDataTablesEditor;
use App\DataTables\BankAccountDataTablesEditor;
use App\Ledger;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class BankController extends Controller
{
    public function newbank(){
        return view('admin.bank.newbank');
    }
    public function accounttopup(){
        $accounts=BankAccount::all();
        return view('admin.bank.accounttopup',compact('accounts'));
    }

    public function allbank(){
        return view('admin.bank.allbanks');
    }
    public function topupreport(){
        return view('admin.bank.accounttopupreport');
    }

    public function topup(Request $request){
        $topup= new AccountTopup();
        $topup->account_id=$request->paying_account;
        $topup->last_balance=$request->last_balance;
        $topup->topup_date=date('Y-m-d H:i:s',strtotime($request->date));
        $topup->topupamount=$request->amount;
        $topup->description=$request->description;
        $topup->save();
        $account=BankAccount::find($request->paying_account);
        $account->current_balance+=$request->amount;
        $account->update();

        $bank_desc = "Amount: $request->amount Deposited to Bank Account:$account->branch_name.";

        $bankLedger= new Ledger();
        $bankLedger->person_type='Bank';
        $bankLedger->transaction_type='topup';
        $bankLedger->main_transaction_id=$topup->id;
        $bankLedger->person_id=0;
        $bankLedger->person_name= 'Topup';
        $bankLedger->transaction_account_id=$account->id;
        $bankLedger->cnic=$account->account;
        $bankLedger->date=date('Y-m-d H:i:s',strtotime($request->date));
        $bankLedger->description=$bank_desc;
        $bankLedger->debit=$request->amount;
        $bankLedger->balance=$account->current_balance;
        $bankLedger->save();

        $success='success';
        return response(['data'=>$success]);
    }
    public function insert_newbank(Request $request){
        if ($request->description !== null){
            $description=$request->description;
        }else{
            $description="New Bank Account Registered with an opening amount of $request->opening_balance";
        }
        $bank=new BankAccount();
        $bank->branch_name=$request->name;
        $bank->branch_code=$request->code;
        $bank->contact=$request->contact;
        $bank->account=$request->account_number;
        $bank->opening_balance=$request->opening_balance;
        $bank->current_balance=$request->opening_balance;
        $bank->registration_date=date('Y-m-d H:i:s');
        $bank->description=$description;
        $bank->save();

        $bank_desc = "New Account has opened with opening balance: $request->opening_balance with the Account Name: $request->name.";

        $bankLedger= new Ledger();
        $bankLedger->person_type='Bank';
        $bankLedger->transaction_type='account opening';
//        $bankLedger->main_transaction_id=$bank->id;
        $bankLedger->person_id=$bank->id;
        $bankLedger->person_name= $request->name;
        $bankLedger->transaction_account_id = $bank->id;
        $bankLedger->cnic=$request->account_number;
        $bankLedger->date=date('Y-m-d H:i:s');
        $bankLedger->description=$bank_desc;
//        $bankLedger->debit=$request->amount;
        $bankLedger->balance=$request->opening_balance;
        $bankLedger->save();

        $data='success';
        return response(["data"=>$data]);
    }
    public function dtgetshowbank(){
        $data=BankAccount::select('id','branch_name','branch_code','contact','account','opening_balance','current_balance','registration_date','description')->get();
        try {
            return DataTables::of($data)->make(true);
        } catch (\Exception $e) {
        }
    }
    public function dtpostshowbank(BankAccountDataTablesEditor $editor){

        return $editor->process(\request());
    }
    public function dtgettopup(Request $request){
        $data=AccountTopup::select('account_topups.id','branch_name','last_balance','topup_date','topupamount','account_topups.description')
            ->join('bank_accounts','bank_accounts.id','=','account_topups.account_id')
            ->get();
        try {
            return DataTables::of($data)->make(true);
        } catch (\Exception $e) {
        }
    }
    public function dtgetshowtopup_date(Request $request){
        $data=AccountTopup::select('account_topups.id','branch_name','last_balance','topup_date','topupamount','account_topups.description')
            ->join('bank_accounts','bank_accounts.id','=','account_topups.account_id')
            ->whereBetween('topup_date',[date('Y-m-d H:i:s',strtotime($request->min)),date('Y-m-d H:i:s',strtotime($request->max))]);
        try {
            return DataTables::of($data)->make(true);
        } catch (\Exception $e) {
        }
    }

    public function dtposttopup(AccountTopupDataTablesEditor $editor){

        return $editor->process(\request());
    }


    public function transfermoney(){
        $accounts=BankAccount::all();
        return view('admin.bank.transfermoney',compact('accounts'));
    }

    public function postTransfer(Request $request){
        $newtransfer=new BankTransfer();
        $newtransfer->user_id=Auth::user()->id;
        $newtransfer->account_from=$request->account_from;
        $newtransfer->account_to=$request->account_to;
        $newtransfer->amount=$request->amount;
        $newtransfer->date=date('Y-m-d',strtotime($request->date));
        $newtransfer->description=$request->description;
        $newtransfer->save();

        $account_from=BankAccount::find($request->account_from);
        $account_from->current_balance-=$request->amount;
        $account_from->update();

        $account_to=BankAccount::find($request->account_to);
        $account_to->current_balance+=$request->amount;
        $account_to->update();
    }

    public function transfermoneyreport(){
        return view('admin.bank.transfermoneyreport');
    }
    public function dtgettransferreport(){
        $data=BankTransfer::select('bank_transfers.id','bank_transfers.amount','bank_transfers.date as transfer_date','bank_transfers.description',
            'bank_from.branch_name as transfer_from','bank_to.branch_name as transfer_to')
            ->join('bank_accounts as bank_from', 'bank_from.id', '=', 'bank_transfers.account_from')
            ->join('bank_accounts as bank_to', 'bank_to.id', '=', 'bank_transfers.account_to')
            ->get();
        try {
            return DataTables::of($data)->make(true);
        } catch (\Exception $e) {
        }
    }
}

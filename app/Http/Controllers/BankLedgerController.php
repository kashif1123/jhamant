<?php

namespace App\Http\Controllers;

use App\BankAccount;
use App\Customer;
use App\DataTables\LedgerDataTablesEditor;
use App\ExpenseHead;
use App\Ledger;
use App\Munshi;
use App\Owner;
use App\Supplier;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class BankLedgerController extends Controller
{
    public function ledger(){
//        $customers=Customer::all();
//        $suppliers=Supplier::all();
//        $owners=Owner::all();
//        $munshis=Munshi::all();
//        $expenses=ExpenseHead::all();
        $banks=BankAccount::all();
        return view('admin.Ledger.bank-ledger',compact('banks'));
    }
    public function dtgetledgerr(){
        $data=Ledger::select('ledgers.id','person_type','person_name','cnic','phone_no','bank_accounts.branch_name','date','ledgers.description','debit','credit','balance')
            ->leftJoin('bank_accounts','bank_accounts.id','=','ledgers.transaction_account_id')->get();
        try {
            return DataTables::of($data)->make(true);
        } catch (\Exception $e) {
        }
    }
    public function dtgetledgerbydatedetails(Request $request){
//        dd($request->all());
//        return response("thi is ledgerof ".$request->ledger_of."amd this is oterh".$request->ledger_of_label);
        if (isset($request->ledger_of_label) && !empty($request->ledger_of_label) ){
            $start=Carbon::parse($request->min);
            $end = Carbon::parse($request->max);
            if($request->ledger_of_label == "Banks"){
                $data=Ledger::select('ledgers.id','person_type','person_name','cnic','phone_no','bank_accounts.branch_name','date','ledgers.description','debit','credit','balance')
                    ->join('bank_accounts','bank_accounts.id','=','ledgers.transaction_account_id')
                    ->where('transaction_account_id','=',$request->ledger_of)
                    ->whereBetween('ledgers.date',[$start->startOfDay()->toDateTimeString(),$end->endOfDay()->toDateTimeString()]);
            }
//            else{
//                $data=Ledger::select('ledgers.id','person_type','person_name','cnic','phone_no','bank_accounts.branch_name','date','ledgers.description','debit','credit','balance')
//                    ->leftJoin('bank_accounts','bank_accounts.id','=','ledgers.transaction_account_id')
//                    ->whereBetween('ledgers.date',[$start->startOfDay()->toDateTimeString(),$end->endOfDay()->toDateTimeString()]);
//
//            }
        }
//        else{
//            $data=Ledger::select('ledgers.id','person_type','person_name','cnic','phone_no','bank_accounts.branch_name','date','ledgers.description','debit','credit','balance')
//                ->leftJoin('bank_accounts','bank_accounts.id','=','ledgers.transaction_account_id')
//                ->whereBetween('ledgers.date',[$start->startOfDay()->toDateTimeString(),$end->endOfDay()->toDateTimeString()]);
//        }
//        dd($data);



        try {
            return DataTables::of($data)->make(true);
        } catch (\Exception $e) {
        }
    }
    public function dtpostledger(LedgerDataTablesEditor $editor){

        return $editor->process(\request());
    }
    public function delete_last_entry(){
        $ledger_last_entry=Ledger::latest()->first();
        $ledger_last_entry->delete();
        return response(["ledger"=>"Done"]);
    }
}

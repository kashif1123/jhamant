<?php

namespace App\Http\Controllers;

use App\BankAccount;
use App\Customer;
use App\Employee;
use App\Ledger;
use App\Owner;
use App\PayAmount;
use App\Salary;
use App\Supplier;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class SalaryController extends Controller
{
    public function paySalary(){
        $employees=Employee::all();
//        dd($employees);
        $accounts=BankAccount::all();
        return view('admin.salary.pay_salary',compact('employees','accounts'));
    }
    public function insert_salary(Request $request){
        $payamount= new Salary();
        $payamount->employee_id=$request->person_id;
        $payamount->account_id=$request->paying_account;
        $payamount->last_balance=$request->person_last_balance;
        $payamount->salary=$request->paying_amount;
        $payamount->month=$request->salary_month;
        $payamount->date=date('Y-m-d H:i:s',strtotime($request->paying_date));
        $payamount->description=$request->description;
        $payamount->save();
        $person_ledger=Ledger::where('person_type','=','employee')->where('person_id','=',$request->person_id)->get()->last();
        $person=Employee::find($request->person_id);
        $ledger=new Ledger();
        $ledger->person_type='employee';
        $ledger->transaction_type='salary';
        $ledger->main_transaction_id=$payamount->id;
        $ledger->person_id=$request->person_id;
        $ledger->person_name=$person->name;
        $ledger->cnic=$person->cnic;
        $ledger->date=date('Y-m-d H:i:s',strtotime($request->paying_date));
        $ledger->description="Monthly Salary of Employee $person->name was analyzed. ";
        $ledger->credit=$request->paying_amount;
        $ledger->balance=$person_ledger->balance-$request->paying_amount;
        $ledger->transaction_account_id=$request->person_id;
        $ledger->save();
        $person_ledger2=Ledger::where('person_type','=','employee')->where('person_id','=',$request->person_id)->get()->last();

        $ledger2=new Ledger();
        $ledger2->person_type='employee';
        $ledger2->transaction_type='salary';
        $ledger2->main_transaction_id=$payamount->id;
        $ledger2->person_id=$request->person_id;
        $ledger2->person_name=$person->name;
        $ledger2->cnic=$person->cnic;
        $ledger2->date=date('Y-m-d H:i:s',strtotime($request->paying_date));
        $ledger2->description="Monthly Salary of Employee $person->name was paid. ";
        $ledger2->debit=$request->paying_amount;
        $ledger2->balance=$person_ledger2->balance+$request->paying_amount;
        $ledger2->transaction_account_id=$request->person_id;
        $ledger2->save();
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
    public function allpaidsalaries(){
        return view('admin.salary.all_salaries');
    }
    public function dtgetshowallpaidsalaries(){
        $data=Salary::select('salaries.id','name','branch_name','salaries.salary','branch_name','date','salaries.last_balance','month','salaries.date','salaries.description')
            ->join('bank_accounts','bank_accounts.id','=','salaries.account_id')
            ->join('employees','employees.id','=','salaries.employee_id')
            ->get();
        try {
            return DataTables::of($data)->make(true);
        } catch (\Exception $e) {
        }
    }
}

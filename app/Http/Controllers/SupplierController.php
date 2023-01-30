<?php

namespace App\Http\Controllers;

use App\BankAccount;
use App\Customer;
use App\CustomerContact;
use App\CustomerInvoice;
use App\DataTables\CustomerDataTablesEditor;
use App\DataTables\EmployeeContactDataTableEditor;
use App\DataTables\EmployeeEditorDataTableEditor;
use App\DataTables\SupplierContactDataTablesEditor;
use App\DataTables\SupplierDataTablesEditor;
use App\Employee;
use App\EmployeeCommission;
use App\EmployeeContact;
use App\Ledger;
use App\Munshi;
use App\MunshiContact;
use App\Owner;
use App\OwnerContact;
use App\Supplier;
use App\SupplierContact;
use App\SupplierInvoice;
use Cassandra\Custom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;


class SupplierController extends Controller
{
    public function newsupplier(){
        $accounts=BankAccount::all();
        return view('admin.supplier.newsupplier',compact('accounts'));
    }

    public function supplierinvoices(){
        return view('admin.supplier.supplierinvioices');
    }
    public function allsupplier(){
        $suppliers=Supplier::all();
        $data=[];
        foreach ($suppliers as $supplier){
            $temp_array['id']=$supplier->id;
            $temp_array['name']=$supplier->name;
            $temp_array['cnic']=$supplier->cnic;
            $temp_array['address']=$supplier->address;
            $temp_array['opening_balance']=$supplier->opening_balance;
            $temp_array['registration_date']=$supplier->registration_date;
            $temp_array['type']=$supplier->type;
            $temp_array['description']=$supplier->description;
            array_push($data,$temp_array);
        }
        return view('admin.supplier.allsupplier',compact('data'));
    }
    public function allcustomer(){
        $suppliers=Customer::all();
        $data=[];
        foreach ($suppliers as $supplier){
            $temp_array['id']=$supplier->id;
            $temp_array['name']=$supplier->name;
            $temp_array['cnic']=$supplier->cnic;
            $temp_array['address']=$supplier->address;
            $temp_array['opening_balance']=$supplier->opening_balance;
            $temp_array['registration_date']=$supplier->registration_date;
            $temp_array['type']=$supplier->type;
            $temp_array['description']=$supplier->description;
            array_push($data,$temp_array);
        }
        return view('admin.supplier.allcustomer',compact('data'));
    }
    public function allmunshi(){
        return view('admin.supplier.allmunshis');
    }
    public function allowners(){
        return view('admin.supplier.allowners');
    }
    public function allemployees(){
        return view('admin.supplier.allemployees');
    }
    public function employee_commission(){
        return view('admin.supplier.employee_commission');
    }
    public function dtget_employee_commission(){
        $data=EmployeeCommission::select('name','employee_commissions.id')
//            ->whereDate('employee_commissions.created_at','=',$date)
            ->join('employees','employees.id','=','employee_commissions.employee_id')->groupBy('employee_id')->selectRaw('sum(employee_commission) as sum')->get();
//        dd($data);
        try {
            return DataTables::of($data)->make(true);
        } catch (\Exception $e) {
        }
    }

    public function dtget_employee_commission_date(Request $request){
        $data=EmployeeCommission::select('name','employee_commissions.id')
            ->whereBetween('employee_commissions.created_at',[date('Y-m-d H:i:s',strtotime($request->min)),date('Y-m-d H:i:s',strtotime($request->max))])
            ->join('employees','employees.id','=','employee_commissions.employee_id')->groupBy('employee_id')->selectRaw('sum(employee_commission) as sum')->get();
        try {
            return DataTables::of($data)->make(true);
        } catch (\Exception $e) {
            return $e->getMessage();
        }

    }
    public function customerinvoices(){
        return view('admin.supplier.customerinvoices');

    }


//    public function dtgetshowsupplier(){
//        $data=Supplier::select('suppliers.id','suppliers.name','suppliers.cnic','suppliers.address','suppliers.opening_balance','suppliers.registration_date','suppliers.type','suppliers.description',
//            'ledgers.balance')->distinct()
//            ->leftjoin('ledgers','suppliers.id','=','ledgers.person_id')
//            ->where('ledgers.person_type','=','supplier')->groupby('ledgers.person_id')->orderby('ledgers.balance','asc')->get();
//        try {
//            return DataTables::of($data)->make(true);
//        } catch (\Exception $e) {
//        }
//    }
    public function dtgetshowsupplier(){
        $data=Supplier::select('suppliers.id','suppliers.name','suppliers.cnic','suppliers.address','suppliers.opening_balance','suppliers.registration_date','suppliers.type','suppliers.description',
//            'ledgers.balance',
//        db::raw('(select balance from ledgers order by ledgers.id as balance)')
        )
            ->join('ledgers', function($query)
            {
                $query->on('suppliers.id','=','ledgers.person_id')
                    ->where('ledgers.person_type','=','supplier');
//                    ->whereRaw('ledgers.id IN (select MAX(a2.id) from ledgers as a2 join suppliers as u2 on u2.id = a2.person_id group by u2.id)');
            })
//            ->where('ledgers.person_type','=','supplier')
            ->groupBy('ledgers.person_id')->get();
        try {
            return DataTables::of($data)->make(true);
        } catch (\Exception $e) {
        }
    }



    public function dtget_s_contacts(){
        $data=SupplierContact::select('supplier_contacts.id','suppliers.name','contact')
            ->join('suppliers','suppliers.id','supplier_contacts.supplier_id')
            ->get();
        try {
            return DataTables::of($data)->make(true);
        } catch (\Exception $e) {
        }
    }
    public function dtget_c_contacts(){
        $data=CustomerContact::select('customer_contacts.id','customers.name','contact')
            ->join('customers','customers.id','customer_contacts.supplier_id')
            ->get();
        try {
            return DataTables::of($data)->make(true);
        } catch (\Exception $e) {
        }
    }
    public function dtget_m_contacts(){
        $data=MunshiContact::select('munshi_contacts.id','munshis.name','contact')
            ->join('munshis','munshis.id','munshi_contacts.munshi_id')
            ->get();
        try {
            return DataTables::of($data)->make(true);
        } catch (\Exception $e) {
        }
    }
    public function dtget_e_contacts(){
        $data=EmployeeContact::select('employee_contacts.id','employees.name','contact')
            ->join('employees','employees.id','employee_contacts.employee_id')
            ->get();
        try {
            return DataTables::of($data)->make(true);
        } catch (\Exception $e) {
        }
    }
    public function dtget_o_contacts(){
        $data=OwnerContact::select('owner_contacts.id','owners.name','contact')
            ->join('owners','owners.id','owner_contacts.owner_id')
            ->get();
        try {
            return DataTables::of($data)->make(true);
        } catch (\Exception $e) {
        }
    }
    public function dtgetshowsupplierinvoices(){
        $data=SupplierInvoice::select('supplier_invoices.id','invoice','name','total','paid','due','discount','grand_total','date_of_purchase')
            ->join('suppliers','suppliers.id','=','supplier_invoices.supplier_id')
            ->get();
        try {
            return DataTables::of($data)->make(true);
        } catch (\Exception $e) {
        }
    }
    public function dtgetshowsupplierinvoices_date(Request $request){
        $data=SupplierInvoice::select('supplier_invoices.id','invoice','suppliers.name','total','paid','due','discount','grand_total','date_of_purchase')
            ->join('suppliers','suppliers.id','=','supplier_invoices.supplier_id')
            ->whereBetween('date_of_purchase',[date('Y-m-d H:i:s',strtotime($request->min)),date('Y-m-d H:i:s',strtotime($request->max))]);
        try {
            return DataTables::of($data)->make(true);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    public function delete_supplier(Request $request){
        $del_supp=Supplier::find($request->id);

        $sup_ledger=Ledger::where('person_id','=',$request->id)->where('person_type','=','supplier')->where('description','<>','New Supplier was registered with an opening amount of '.$request->opening_blance.'.')->get()->last();
        if (!$sup_ledger){
            $del_ledger=Ledger::where('description','=','New Supplier was Registered with an Opening amount of '.$request->opening_blance.'.')->get()->last();
            $del_ledger->delete();

            $del_supp->delete();
        }else{
            return response(['message'=>'You Can not delete this supplier']);
        }
            return response(['success'=>'Supplier deleted successfully']);
        }
    public function delete_munshi(Request $request){
        $del_supp=Munshi::find($request->id);
        $sup_ledger=Ledger::where('person_id','=',$request->id)->where('person_type','=','munshi')->where('description','<>','New Munshi was registered with an opening amount of '.$request->opening_blance.'.')->get()->last();
        if (!$sup_ledger){

            $del_ledger=Ledger::where('person_id','=',$request->id)->where('person_type','=','munshi')->where('description','=','New Munshi was Registered with an Opening amount of '.$request->opening_blance.'.')->get()->last();
            $del_ledger->delete();

            $del_supp->delete();
        }else{
        return response(['message'=>'You Can not delete this Munshi']);
        }
        return response(['success'=>'Munshi deleted successfully']);
        }

    public function delete_employee(Request $request){
        $del_supp=Employee::find($request->id);
        $sup_ledger=Ledger::where('person_id','=',$request->id)->where('person_type','=','employee')->where('description','<>','New Employee was registered with an opening amount of '.$request->opening_blance.'.')->get()->last();
        if (!$sup_ledger){

            $del_ledger=Ledger::where('person_id','=',$request->id)->where('person_type','=','employee')->where('description','=','New Employee was Registered with an Opening amount of '.$request->opening_blance.'.')->get()->last();
            $del_ledger->delete();

            $del_supp->delete();
        }else{
        return response(['message'=>'You Can not delete this Employee']);
        }
        return response(['success'=>'Employee deleted successfully']);
        }
    public function delete_customer(Request $request){
        $del_supp=Customer::find($request->id);
        $sup_ledger=Ledger::where('person_id','=',$request->id)->where('person_type','=','customer')
            ->where('description','<>','New Customer was Registered with an Opening amount of '.$request->opening_blance.'.')
            ->where('person_id','<>',1)->get()->last();
        if (!$sup_ledger){

            $del_ledger=Ledger::where('person_id','=',$request->id)->where('person_type','=','customer')->where('description','=','New Customer was Registered with an Opening amount of '.$request->opening_blance.'.')->get()->last();
            $del_ledger->delete();

            $del_supp->delete();
        }else{
        return response(['message'=>'You Can not delete this Customer']);
        }
        return response(['success'=>'Supplier deleted successfully']);
        }

    public function dtgetshowcustomerinvoices_date(Request $request){
        $data=CustomerInvoice::select('customer_invoices.id','invoice','customers.name','total','paid','due','discount','grand_total','date')
            ->join('customers','customers.id','=','customer_invoices.customer_id')
            ->whereBetween('date',[date('Y-m-d H:i:s',strtotime($request->min)),date('Y-m-d H:i:s',strtotime($request->max))]);
        try {
            return DataTables::of($data)->make(true);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    public function dtgetshowcustomerinvoices(){
        $data=CustomerInvoice::select('customer_invoices.id','invoice','name','total','paid','due','discount','grand_total','date')
            ->join('customers','customers.id','=','customer_invoices.customer_id')
            ->get();
        try {
            return DataTables::of($data)->make(true);
        } catch (\Exception $e) {
        }
    }
    public function dtgetshowsuppliercontacts(Request $request){
        $data=SupplierContact::where('supplier_id','=',$request->id)->get();
        return response(["data"=>$data]);
    }
    public function dtpostshowsupplier(SupplierDataTablesEditor $editor){

        return $editor->process(\request());
    }
    public function dtpost_s_contacts(SupplierContactDataTablesEditor $editor){

        return $editor->process(\request());
    }
    public function dtpost_c_contacts(SupplierContactDataTablesEditor $editor){

        return $editor->process(\request());
    }
    public function dtposteditemployee(EmployeeEditorDataTableEditor $editor){

        return $editor->process(\request());
    }
    public function dtpost_e_contacts(EmployeeContactDataTableEditor $editor){

        return $editor->process(\request());
    }


    public function dtgetshowcustomers(){
        $data=Customer::select('customers.id','customers.name','customers.cnic','customers.address','customers.opening_balance','customers.registration_date','customers.type','customers.description')
//        ->leftjoin('ledgers',function ($join){
//            $join->on('ledgers.person_id','=','customers.id')
//            ->whereRaw('ledgers.id IN (select MAX(a2.id) from ledgers as a2 join customers as u2 on u2.id = a2.person_id group by u2.id)');
//        })->where('ledgers.person_type','=','customer')
            ->get();
        try {
            return DataTables::of($data)->make(true);
        } catch (\Exception $e) {
        }
    }
//    public function dtgetshowmunshis(){
//        $data=Munshi::select('munshis.id','munshis.name','munshis.cnic','munshis.address','munshis.opening_balance','munshis.registration_date','munshis.type','munshis.description' ,
//            db::raw('ledgers.id IN (select MAX(u2.balance) from munshis as a2 join ledgers as u2 on u2.person_id = a2.id where u2.person_type = `munshi` group by u2.id)'))
////        ->join('ledgers',function ($join){
////            $join->on('ledgers.person_id','=','munshis.id')
////                ->whereRaw('ledgers.id IN (select MAX(a2.id) from ledgers as a2 join munshis as u2 on u2.id = a2.person_id group by u2.id)');
////                ->whereRaw('');
////        })
////                ->join('ledgers','ledgers.person_id','=','munshis.id')
////->where('ledgers.person_type','=','munshi')
//            ->get();
//        try {
//            return DataTables::of($data)->make(true);
//        } catch (\Exception $e) {
//        }
//    }
    public function dtgetshowmunshis(){
        $data=Munshi::select('munshis.id','munshis.name','munshis.cnic','munshis.address','munshis.opening_balance','munshis.registration_date','munshis.type','munshis.description',
//            DB::raw("ledgers.balance order by ledgers.id desc limit 1 ")
        )
            ->join('ledgers','ledgers.person_id','=','munshis.id')
            ->where('ledgers.person_type','=','munshi')->groupBy('munshis.id')
            ->get();
        try {
            return DataTables::of($data)->make(true);
        } catch (\Exception $e) {
        }
    }    public function dtgetshowemployees(){
        $data=Employee::select('employees.id','employees.status','employees.name','employees.cnic','salary','commission','employees.address','employees.opening_balance','employees.registration_date','employees.type','employees.description',
//            DB::raw("ledgers.balance order by ledgers.id desc limit 1 ")
        )
            ->join('ledgers','ledgers.person_id','=','employees.id')
            ->where('ledgers.person_type','=','employee')->groupBy('employees.id')
            ->get();
        try {
            return DataTables::of($data)->make(true);
        } catch (\Exception $e) {
        }
    }
    public function dtgetshowowners(){
        $data=Owner::select('owners.id','owners.name','owners.cnic','owners.address','owners.opening_balance','owners.registration_date','owners.type','owners.description')
//        ->leftjoin('ledgers',function ($join){
//            $join->on('ledgers.person_id','=','owners.id')
//                ->whereRaw('ledgers.id IN (select MAX(a2.id) from ledgers as a2 join owners as u2 on u2.id = a2.person_id group by u2.id)');
//        })->where('ledgers.person_type','=','owner')
            ->get();
        try {
            return DataTables::of($data)->make(true);
        } catch (\Exception $e) {
        }
    }
    public function dtpostshowcustomers(CustomerDataTablesEditor $editor){

        return $editor->process(\request());
    }
    public function insert_new_supplier(Request $request){
        if ($request->account_type == 'supplier'){
            $description="New Supplier was Registered with an Opening amount of $request->opening_balance.";
            $supplier=new Supplier();
            $supplier->name=$request->name;
            $supplier->cnic=$request->cnic;
            $supplier->address=$request->address;
            $supplier->opening_balance=$request->opening_balance;
            $supplier->type=$request->balance_type;
            $supplier->registration_date=date('Y-m-d',strtotime($request->registration_date));
            $supplier->description=$description;
            $supplier->save();
//            return response($request->contacts);
            $ledger2=new Ledger();
            foreach (explode(",", $request->contacts) as $contact){
                $savecontact= new SupplierContact();
                $savecontact->supplier_id=$supplier->id;
                $savecontact->contact=$contact;
                $savecontact->save();
            }
            $ledger2->person_type='supplier';
            $ledger2->person_id=$supplier->id;
            $ledger2->person_name=$request->name;
            $ledger2->cnic=$request->cnic;
            $ledger2->date=date('Y-m-d',strtotime($request->registration_date));
            $ledger2->description=$description;
            if ($request->balance_type == 'debit'){
                $ledger2->debit=$request->opening_balance;
                $ledger2->balance=$request->opening_balance;
            }
            else if ($request->balance_type == 'credit'){
                $ledger2->credit=$request->opening_balance;
                $ledger2->balance=-$request->opening_balance;
            }
            $ledger2->save();

        }
        elseif ($request->account_type == 'customer'){
            $description2="New Customer was registered with an opening amount of $request->opening_balance.";
            $customer=new Customer();
            $customer->name=$request->name;
            $customer->cnic=$request->cnic;
            $customer->address=$request->address;
            $customer->opening_balance=$request->opening_balance;
            $customer->type=$request->balance_type;
            $customer->registration_date=date('Y-m-d',strtotime($request->registration_date));
            $customer->description=$description2;
            $customer->save();
            foreach (explode(",", $request->contacts) as $contact){
                $savecontact= new CustomerContact();
                $savecontact->supplier_id=$customer->id;
                $savecontact->contact=$contact;
                $savecontact->save();
            }
            $ledger=new Ledger();
            $ledger->person_type='customer';
            $ledger->person_id=$customer->id;
            $ledger->person_name=$request->name;
            $ledger->cnic=$request->cnic;
            $ledger->date=date('Y-m-d',strtotime($request->registration_date));
            $ledger->description=$description2;

            if ($request->balance_type == 'debit'){
                $ledger->debit=$request->opening_balance;
                $ledger->balance=$request->opening_balance;
            }
            else if ($request->balance_type == 'credit'){
                $ledger->credit=$request->opening_balance;
                $ledger->balance=-$request->opening_balance;
            }
//            $ledger->debit=$request->opening_balance;
//            $ledger->balance=$request->opening_balance;
            $ledger->save();
        }
        elseif ($request->account_type == 'munshi'){
            $description2="New Munshi was registered with an opening amount of $request->opening_balance.";
            $customer=new Munshi();
            $customer->name=$request->name;
            $customer->cnic=$request->cnic;
            $customer->address=$request->address;
            $customer->opening_balance=$request->opening_balance;
            $customer->type=$request->balance_type;
            $customer->registration_date=date('Y-m-d',strtotime($request->registration_date));
            $customer->description=$description2;
            $customer->save();
            foreach (explode(",", $request->contacts) as $contact){
                $savecontact= new MunshiContact();
                $savecontact->munshi_id=$customer->id;
                $savecontact->contact=$contact;
                $savecontact->save();
            }
            $ledger=new Ledger();
            $ledger->person_type='munshi';
            $ledger->person_id=$customer->id;
            $ledger->person_name=$request->name;
            $ledger->cnic=$request->cnic;
            $ledger->date=date('Y-m-d',strtotime($request->registration_date));
            $ledger->description=$description2;

            if ($request->balance_type == 'debit'){
                $ledger->debit=$request->opening_balance;
                $ledger->balance=$request->opening_balance;
            }
            else if ($request->balance_type == 'credit'){
                $ledger->credit=$request->opening_balance;
                $ledger->balance=-$request->opening_balance;
            }
//            $ledger->debit=$request->opening_balance;
//            $ledger->balance=$request->opening_balance;
            $ledger->save();
        }
        elseif ($request->account_type == 'owner'){
            $description2="New Owner was registered with an opening amount of $request->opening_balance.";
            $owner=new Owner();
            $owner->name=$request->name;
            $owner->cnic=$request->cnic;
            $owner->address=$request->address;
            $owner->opening_balance=$request->opening_balance;
            $owner->type=$request->balance_type;
            $owner->registration_date=date('Y-m-d',strtotime($request->registration_date));
            $owner->description=$description2;
            $owner->save();
            foreach (explode(",", $request->contacts) as $contact){
                $savecontact= new OwnerContact();
                $savecontact->owner_id=$owner->id;
                $savecontact->contact=$contact;
                $savecontact->save();
            }
            $ledger=new Ledger();
            $ledger->person_type='owner';
            $ledger->person_id=$owner->id;
            $ledger->person_name=$request->name;
            $ledger->cnic=$request->cnic;
            $ledger->date=date('Y-m-d',strtotime($request->registration_date));
            $ledger->description=$description2;

            if ($request->balance_type == 'debit'){
                $ledger->debit=$request->opening_balance;
                $ledger->balance=$request->opening_balance;
            }
            else if ($request->balance_type == 'credit'){
                $ledger->credit=$request->opening_balance;
                $ledger->balance=-$request->opening_balance;
            }
//            $ledger->debit=$request->opening_balance;
//            $ledger->balance=$request->opening_balance;
            $ledger->save();
        }
        elseif ($request->account_type == 'employee'){
            $description2="New Employee was registered with an opening amount of $request->opening_balance.";
            $employee=new Employee();
            $employee->name=$request->name;
            $employee->cnic=$request->cnic;
            $employee->address=$request->address;
            $employee->opening_balance=$request->opening_balance;
            $employee->type=$request->balance_type;
            $employee->salary=$request->salary;
            $employee->commission=$request->commission;
            $employee->registration_date=date('Y-m-d',strtotime($request->registration_date));
            $employee->description=$description2;
            $employee->save();
            foreach (explode(",", $request->contacts) as $contact){
                $savecontact= new EmployeeContact();
                $savecontact->employee_id=$employee->id;
                $savecontact->contact=$contact;
                $savecontact->save();
            }
            $ledger=new Ledger();
            $ledger->person_type='employee';
            $ledger->person_id=$employee->id;
            $ledger->person_name=$request->name;
            $ledger->cnic=$request->cnic;
            $ledger->date=date('Y-m-d',strtotime($request->registration_date));
            $ledger->description=$description2;

            if ($request->balance_type == 'debit'){
                $ledger->debit=$request->opening_balance;
                $ledger->balance=$request->opening_balance;
            }
            else if ($request->balance_type == 'credit'){
                $ledger->credit=$request->opening_balance;
                $ledger->balance=-$request->opening_balance;
            }
//            $ledger->debit=$request->opening_balance;
//            $ledger->balance=$request->opening_balance;
            $ledger->save();
        }
    }

    public function suppliercontacts(){
        return view('admin.supplier.suppliercontacts');
    }

    public function customercontacts(){
        return view('admin.supplier.customercontacts');
    }

}

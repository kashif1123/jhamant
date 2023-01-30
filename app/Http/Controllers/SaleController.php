<?php

namespace App\Http\Controllers;

use App\BankAccount;
use App\Company;
use App\Customer;
use App\CustomerInvoice;
use App\Employee;
use App\EmployeeCommission;
use App\Ledger;
use App\Product;
use App\Purchase;
use App\Sale;
use App\Supplier;
use http\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use App\SupplierInvoice;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function saleproduct(){
        $customers=Customer::all();
        $suppliers=Supplier::all();
        $accounts=BankAccount::all();
        $companies=Company::all();
        $products=Product::where('total_qty','>',0)->get();
        $employees=Employee::where('status','=','enable')->get();
        return view('admin.sale.saleproduct',compact('customers','products','accounts','suppliers','companies','employees'));
    }
    public function randomnumber(Request $request){
        $data =date('dHs');
        return response(['data'=>$data]);
    }

    public function allsale(){
        return view('admin.sale.allsales');
    }
    public function salereport(){
        return view('admin.sale.salereport');
    }
    public function dtgetshowallsale(){
        $data=CustomerInvoice::select('sales.id','products.name as p_name','categories.name as cc_name','companies.company_name','sales.sale_price','sales.quantity','sales.invoice_no','customer_invoices.date')
            ->join('sales','sales.customer_invoices_id','=','customer_invoices.id')
            ->join('products','products.id','=','sales.product_id')
            ->join('categories','categories.id','=','products.category_id')
            ->join('companies','companies.id','=','products.company_id')
            ->get();
        try {
//            return DataTables::of($data)->make(true);
            return DataTables::of($data)->make(true);


        } catch (\Exception $e) {
        }
    }
    public function dtgetsale_report_subtable(Request $request){
        $data=Sale::where('invoice_no','=',$request->invoice)->select('sales.id','companies.company_name as c_name','sales.quantity','sales.sale_price','sales.p_discount','products.name')
            ->join('products','products.id','=','sales.product_id')
            ->join('companies','companies.id','=','products.company_id')
            ->get();
        return response(['subtable_data'=>$data]);
    }
    public function get_reprintdata(Request $request){
        $sale_products=Sale::where('customer_invoices_id','=',$request->invoice_id)->select('sales.id','sales.quantity','sales.sale_price','sales.p_discount','products.name')
            ->join('products','products.id','=','sales.product_id')
            ->get();
        return response(['s_products_data'=>$sale_products]);
    }
    public function dtgetallsale_customers(){
        $data=CustomerInvoice::select('customer_invoices.id','invoice','customers.name as name','users.name as user_name','total','paid','employee_commission','employees.name as employee','due','discount','grand_total','date')
            ->join('customers','customers.id','=','customer_invoices.customer_id')
            ->join('users','users.id','=','customer_invoices.user_id')
            ->leftJoin('employees','employees.id','=','customer_invoices.employee_id')
            ->where('customer_invoices.customer_person','=','customer')
            ->get();
        try {
//            return DataTables::of($data)->make(true);
            return DataTables::of($data)->addColumn('action', function () {
                return '<button class="btn btn-primary print_duplicate">Print Duplicate</button> ';
            })->make(true);
        } catch (\Exception $e) {
        }
    }
    public function dtgetallsale_suppliers(){
        $data=CustomerInvoice::select('customer_invoices.id','invoice','suppliers.name as name','users.name as user_name','total','paid','employee_commission','employees.name as employee','due','discount','grand_total','date')
            ->join('suppliers','suppliers.id','=','customer_invoices.customer_id')
            ->join('users','users.id','=','customer_invoices.user_id')
            ->leftJoin('employees','employees.id','=','customer_invoices.employee_id')
            ->where('customer_invoices.customer_person','=','supplier')
            ->get();
        try {
//            return DataTables::of($data)->make(true);
            return DataTables::of($data)->addColumn('action', function () {
                return '<button class="btn btn-primary print_duplicate_sup">Print Duplicate</button> ';
            })->make(true);
        } catch (\Exception $e) {
        }
    }
    public function dtgetallsale_by_date(){
        $data=CustomerInvoice::select('customer_invoices.id','invoice','commission','name','total','paid','due','discount','grand_total','date')
            ->join('customers','customers.id','=','customer_invoices.customer_id')
            ->get();
        try {
//            return DataTables::of($data)->make(true);
            return DataTables::of($data)->addColumn('action', function () {
                return '<button class="btn btn-primary print_duplicate">Print Duplicate</button> ';
            })->make(true);


        } catch (\Exception $e) {
        }
    }

    public function fetch_product_data(Request $request){
        $productdata=Product::find($request->id);
        return response(["data"=>$productdata]);
    }
    public function fetch_available_products(Request $request){
        $productdata=Purchase::where('product_id','=',$request->id)->where('quantity_remaining','>',0)->get();
        $discount=Sale::where('product_id','=',$request->id)->get()->last();
        return response(["data"=>$productdata,"discount"=>$discount]);
    }
    public function fetch_customer_balance(Request $request){
        if ($request->label=="Suppliers"){
            $person="supplier";
        }else{
            $person="customer";
        }
        $previous_balance=Ledger::where('person_type','=',$person)->where('person_id','=',$request->id)->get()->last();
        return response(["data"=>$previous_balance]);
    }
    public function fetch_customer_data(Request $request){
        if ($request->label=="Suppliers"){
        $customer=Supplier::find($request->id);
        }else{
        $customer=Customer::find($request->id);
        }
        return response(["data"=>$customer]);
    }
    public function fetch_company_products(Request $request){
        if ($request->id == 'defaultcompany'){
            $products=Product::where('total_qty','>',0)->get();
        } else{
            $products=Product::where('company_id','=',$request->id)->where('total_qty','>',0)->get();
        }
        return response(["data"=>$products]);
    }
    public function fetch_account_balance(Request $request){
        $account_balance=BankAccount::find($request->id);
        return response(["data"=>$account_balance]);
    }
    public function fetch_employee_commission(Request $request){
        $account_balance=Employee::find($request->id);
        return response(["data"=>$account_balance]);
    }



//    public function postsalecart(Request $request)
//    {
////        dd($request->all());
//        try {
//            DB::beginTransaction();
//
//            if ($request->customer_label == "Suppliers"){
//                $cus_person='supplier';
//            }else{
//                $cus_person='customer';
//            }
//            $customer = new CustomerInvoice();
//            $customer->customer_id = $request->customer;
//            $customer->customer_person = $cus_person;
//            $customer->invoice = $request->invoice;
//            $customer->total = $request->total;
//            $customer->date = date('Y-m-d H:i:s', strtotime($request->datetime));
//            $customer->paid = $request->paid;
//            $customer->due = $request->remaining;
//            $customer->discount = $request->discount;
//            $customer->grand_total = $request->grand_total;
//            $customer->employee_id = $request->employee;
//            $customer->employee_commission = $request->employee_commission;
//            $customer->save();
//            $total_sold_qty=0;
//            $for_desc="Product Rates=\n";
//            foreach ($request->data as $data) {
//                $total_sold_qty+=$data['qty'];
//                $for_desc.=$data['product'].":\n";
//                $for_desc.='('.$data['sale_price'].")\n";
////          $total_qty=Purchase::where('product_id','=',$data['id'])->sum('quantity');
////          $c_avg_p_price=0;
////          $w_average=Purchase::where('product_id','=',$data['id'])->get();
////          foreach ($w_average as $avg){
////          $c_avg_p_price+=$avg->purchase_price*$avg->quantity;
////          }
////          $average_p_price=$c_avg_p_price/$total_qty;
////          return response(["data"=>$average_p_price]);
//                $stock_sold=$data['qty'];
////            return response($stock_sold);
//                while($stock_sold !== 0){
////                return response("this is content from backend");
//                    $purchase_stock=Purchase::where('quantity_remaining','>',0)->where('product_id','=',$data['id'])->get()->first();
//                    if ($purchase_stock){
//                        if ($purchase_stock->quantity_remaining > $stock_sold) {
//                            $purchase_stock->quantity_remaining-= $stock_sold;
//                            $purchase_stock->update();
//                            $sold_products = new Sale();
//                            $sold_products->invoice_no = $request->invoice;
//                            $sold_products->customer_invoices_id = $customer->id;
//                            $sold_products->product_id = $data['id'];
//                            $sold_products->quantity = $stock_sold;
//                              $sold_products->p_discount = $data['p_discount'];
//                            $sold_products->sale_price = $data['sale_price'];
//                            $sold_products->sale_date = date('Y-m-d H:i:s', strtotime($request->datetime));
//                            $sold_products->purchase_price = $purchase_stock->purchase_price;
////                    $sold_products->expiry = $purchase_stock->expiry;
//                            $sold_products->margin_profit = ($data['sale_price']-$purchase_stock->purchase_price)*$stock_sold;
//                            $sold_products->save();
//                            $stock_sold=0;
//                        }
//                        elseif($purchase_stock->quantity_remaining < $stock_sold){
//                            $sss=$stock_sold-$purchase_stock->quantity_remaining;
//                            $purchase_stock->quantity_remaining=0;
//                            $purchase_stock->update();
//                            $sale_qty=$stock_sold-$sss;
//                            $sold_products = new Sale();
//                            $sold_products->invoice_no = $request->invoice;
//                            $sold_products->customer_invoices_id = $customer->id;
//                            $sold_products->product_id = $data['id'];
//                            $sold_products->quantity = $sale_qty;
////                    $sold_products->p_discount = $data['p_discount'];
//                            $sold_products->sale_price = $data['sale_price'];
//                            $sold_products->sale_date = date('Y-m-d H:i:s', strtotime($request->datetime));
//                            $sold_products->purchase_price = $purchase_stock->purchase_price;
////                    $sold_products->expiry = $purchase_stock->expiry;
//                            $sold_products->margin_profit = ($data['sale_price']-$purchase_stock->purchase_price)*$stock_sold;
//                            $sold_products->save();
//                            $stock_sold=$sss;
////                    return response(["stock_sold"=>$stock_sold]);
////                    return response(["data"=>$stock_sold]);
//                        }else{
//                            $purchase_stock->quantity_remaining-=$stock_sold;
//                            $purchase_stock->update();
//                            $sold_products = new Sale();
//                            $sold_products->invoice_no = $request->invoice;
//                            $sold_products->customer_invoices_id = $customer->id;
//                            $sold_products->product_id = $data['id'];
//                            $sold_products->quantity = $stock_sold;
////                    $sold_products->p_discount = $data['p_discount'];
//                            $sold_products->sale_price = $data['sale_price'];
//                            $sold_products->sale_date = date('Y-m-d H:i:s', strtotime($request->datetime));
//                            $sold_products->purchase_price = $purchase_stock->purchase_price;
//                            $sold_products->margin_profit = ($data['sale_price']-$purchase_stock->purchase_price)*$stock_sold;
//                            $sold_products->save();
//                            $stock_sold=0;
//                        }
//                    }
//                }
////            $purchase_stock=Purchase::where('quantity_remaining','>',0)->get()->first();
////            foreach ($purchase_stock as $p_s){
////                if ($p_s->quantity_remaining > $stock_sold)
////                $p_s->quantity_remaining-=$stock_sold
////            }
//                $products = Product::find($data['id']);
//                $products->total_qty -= $data['qty'];
//                $products->update();
//            }
//            if ($cus_person == "supplier"){
//                $customerrr = Supplier::find($request->customer);
//            }else{
//                $customerrr = Customer::find($request->customer);
//            }
//            $description = "Product(s) were Sold to $cus_person : $customerrr->name with a total bill of $request->grand_total against Invoice: $request->invoice.
//         \n$for_desc";
//
//
//            $customer_ledger = Ledger::where('person_type', '=', $cus_person)->where('person_id', '=', $customerrr->id)->get()->last();
//            $ledger = new Ledger();
//            $ledger->person_type = $cus_person;
//            $ledger->transaction_type = 'sale';
//            $ledger->main_transaction_id =$customer->id ;
//            $ledger->person_id = $request->customer;
//            $ledger->person_name = $customerrr->name;
//            $ledger->cnic = $customerrr->cnic;
//            $ledger->date = date('Y-m-d H:i:s', strtotime($request->datetime));
//            $ledger->description = $description;
//            $ledger->debit = $request->grand_total;
//            $ledger->balance = $customer_ledger->balance + $request->grand_total;
//            $ledger->save();
//            if ($request->paid <> 0) {
//                $customer_ledger2 = Ledger::where('person_type', '=', $cus_person)->where('person_id', '=', $customerrr->id)->get()->last();
//                $description2 = "$cus_person paid Rs.: $request->paid on spot.";
//                $ledger2 = new Ledger();
//                $ledger2->person_type = $cus_person;
//                $ledger->transaction_type = 'sale';
//                $ledger->main_transaction_id =$customer->id;
//                $ledger2->person_id = $request->customer;
//                $ledger2->person_name = $customerrr->name;
//                $ledger2->cnic = $customerrr->cnic;
//                $ledger2->date = date('Y-m-d H:i:s', strtotime($request->datetime));
//                $ledger2->description = $description2;
//                $ledger2->transaction_account_id = $customerrr->id;
//                $ledger2->credit = $request->paid;
//                $ledger2->balance = $customer_ledger2->balance - $request->paid;
//                $ledger2->save();
//                $account = BankAccount::find($request->account);
//                $account->current_balance += $request->paid;
//                $account->update();
//
//                $bank_desc = "Product(s) were Sold to $cus_person : $customerrr->name with a total bill of $request->grand_total to Bank Branch:$account->branch_name against Invoice: $request->invoice.";
//
//                $bankLedger= new Ledger();
//                $bankLedger->person_type='Bank';
//                $bankLedger->transaction_type='sale';
//                $bankLedger->main_transaction_id=$customer->id;
//                $bankLedger->person_id=$request->customer;
//                $bankLedger->person_name=$customerrr->name;
//                $bankLedger->transaction_account_id = $request->account;
//                $bankLedger->cnic=$account->account;
//                $bankLedger->date=date('Y-m-d H:i:s',strtotime($request->datetime));
//                $bankLedger->description=$bank_desc;
//                $bankLedger->debit=$request->paid;
//                $bankLedger->balance=$account->current_balance;
//                $bankLedger->save();
//            }
//
//            if ($request->employee !== 'default' and $request->employee !== null and $request->employee !== 'null') {
//                $employee = Employee::find($request->employee);
//                $employee_ledger_pre = Ledger::where('person_type', '=', 'employee')->where('person_id', '=', $request->employee)->get()->last();
//                $employee_ledger = new Ledger();
//                $employee_ledger->person_type = 'employee';
//                $employee_ledger->transaction_type = 'commission';
//                $employee_ledger->main_transaction_id = $customer->id;
//                $employee_ledger->person_id = $request->employee;
//                $employee_ledger->person_name = $employee->name;
//                $employee_ledger->cnic = $employee->cnic;
//                $employee_ledger->date = date('Y-m-d H:i:s', strtotime($request->datetime));
//                $employee_ledger->description = "Commission of $request->employee_commission was analyzed on sale Id: $request->invoice";
//                $employee_ledger->credit = $request->employee_commission;
//                $employee_ledger->balance = $employee_ledger_pre->balance - $request->employee_commission;
//                $employee_ledger->save();
//            }
//
//            DB::commit();
//            return response(['type' => 'success', 'message' => 'Sale created successfully....']);
//        } catch (\PDOException $e) {
//            DB::rollBack();
//            return response(['type' => 'error', 'message' => $e->getMessage()]);
//        }
//
//    }


    public function postsalecart(Request $request)
    {
        try {
            DB::beginTransaction();

            if ($request->customer_label == "Suppliers"){
                $cus_person='supplier';
            }else{
                $cus_person='customer';
            }
            $customer = new CustomerInvoice();
            $customer->customer_id = $request->customer;
            $customer->customer_person = $cus_person;
            $customer->user_id = Auth::id();
            $customer->invoice = Auth::id().$request->invoice;
            $customer->total = $request->total;
            $customer->date = date('Y-m-d H:i:s', strtotime($request->datetime));
            $customer->paid = $request->paid;
            $customer->due = $request->remaining;
            $customer->discount = $request->discount;
            $customer->grand_total = $request->grand_total;
            $customer->employee_id = $request->employee;
            $customer->employee_commission = $request->employee_commission;
            $customer->save();
            $total_sold_qty=0;
            $for_desc="Product Rates=\n";
            foreach ($request->data as $data) {
                $total_sold_qty+=$data['qty'];
                $for_desc.=$data['product'].":\n";
                $for_desc.='('.$data['sale_price'].")\n";
                $stock_sold=$data['qty'];

                while($stock_sold !== 0){
                    $purchase_stock=Purchase::where('quantity_remaining','>',0)->where('product_id','=',$data['id'])->get()->first();
                    if ($purchase_stock){
                        if ($purchase_stock->quantity_remaining > $stock_sold) {
                            $purchase_stock->quantity_remaining-= $stock_sold;
                            $purchase_stock->update();
                            $sold_products = new Sale();
                            $sold_products->invoice_no = Auth::id().$request->invoice;
                            $sold_products->customer_invoices_id = $customer->id;
                            $sold_products->product_id = $data['id'];
                            $sold_products->quantity = $stock_sold;
                            $sold_products->sale_price = $data['sale_price'];
                            $sold_products->sale_date = date('Y-m-d H:i:s', strtotime($request->datetime));
                            $sold_products->purchase_price = $purchase_stock->purchase_price;
                            $sold_products->margin_profit = ($data['sale_price']-$purchase_stock->purchase_price)*$stock_sold;
                            $sold_products->save();
                            $stock_sold=0;
                        }
                        elseif($purchase_stock->quantity_remaining < $stock_sold){
                            $sss=$stock_sold-$purchase_stock->quantity_remaining;
                            $purchase_stock->quantity_remaining=0;
                            $purchase_stock->update();
                            $sale_qty=$stock_sold-$sss;
                            $sold_products = new Sale();
                            $sold_products->invoice_no = Auth::id().$request->invoice;
                            $sold_products->customer_invoices_id = $customer->id;
                            $sold_products->product_id = $data['id'];
                            $sold_products->quantity = $sale_qty;
                            $sold_products->sale_price = $data['sale_price'];
                            $sold_products->sale_date = date('Y-m-d H:i:s', strtotime($request->datetime));
                            $sold_products->purchase_price = $purchase_stock->purchase_price;
                            $sold_products->margin_profit = ($data['sale_price']-$purchase_stock->purchase_price)*$stock_sold;
                            $sold_products->save();
                            $stock_sold=$sss;
                        }else{
                            $purchase_stock->quantity_remaining-=$stock_sold;
                            $purchase_stock->update();
                            $sold_products = new Sale();
                            $sold_products->invoice_no = Auth::id().$request->invoice;
                            $sold_products->customer_invoices_id = $customer->id;
                            $sold_products->product_id = $data['id'];
                            $sold_products->quantity = $stock_sold;
                            $sold_products->sale_price = $data['sale_price'];
                            $sold_products->sale_date = date('Y-m-d H:i:s', strtotime($request->datetime));
                            $sold_products->purchase_price = $purchase_stock->purchase_price;
                            $sold_products->margin_profit = ($data['sale_price']-$purchase_stock->purchase_price)*$stock_sold;
                            $sold_products->save();
                            $stock_sold=0;
                        }
                    }
                }


                $products = Product::find($data['id']);
                $products->total_qty -= $data['qty'];
                $products->update();
            }
            if ($cus_person == "supplier"){
                $customerrr = Supplier::find($request->customer);
            }else{
                $customerrr = Customer::find($request->customer);
            }
            $description = "Product(s) were Sold to $cus_person : $customerrr->name with a total bill of $request->grand_total against Invoice:". Auth::id().$request->invoice.
         "\nProduct Weight=$total_sold_qty || No. of bags=$request->no_of_bags  ||  Bardana Amount=$request->bardana  ||  Carriage=$request->carriage || Truck No.=$request->truck_no.
         \n$for_desc";


            $customer_ledger = Ledger::where('person_type', '=', $cus_person)->where('person_id', '=', $customerrr->id)->get()->last();
            $ledger = new Ledger();
            $ledger->person_type = $cus_person;
            $ledger->transaction_type = 'sale';
            $ledger->main_transaction_id =$customer->id ;
            $ledger->person_id = $request->customer;
            $ledger->person_name = $customerrr->name;
            $ledger->cnic = $customerrr->cnic;
            $ledger->date = date('Y-m-d H:i:s', strtotime($request->datetime));
            $ledger->description = $description;
            $ledger->debit = $request->grand_total;
            $ledger->balance = $customer_ledger->balance + $request->grand_total;
            $ledger->save();
            if ($request->paid <> 0) {
                $customer_ledger2 = Ledger::where('person_type', '=', $cus_person)->where('person_id', '=', $customerrr->id)->get()->last();
                $description2 = "$cus_person paid Rs.: $request->paid on spot.";
                $ledger2 = new Ledger();
                $ledger2->person_type = $cus_person;
                $ledger->transaction_type = 'sale';
                $ledger->main_transaction_id =$customer->id;
                $ledger2->person_id = $request->customer;
                $ledger2->person_name = $customerrr->name;
                $ledger2->cnic = $customerrr->cnic;
                $ledger2->date = date('Y-m-d H:i:s', strtotime($request->datetime));
                $ledger2->description = $description2;
                $ledger2->transaction_account_id = $customerrr->id;
                $ledger2->credit = $request->paid;
                $ledger2->balance = $customer_ledger2->balance - $request->paid;
                $ledger2->save();
                $account = BankAccount::find($request->account);
                $account->current_balance += $request->paid;
                $account->update();

                $bank_desc = "Product(s) were Sold to $cus_person : $customerrr->name with a total bill of $request->grand_total to Bank Branch:$account->branch_name against Invoice: $request->invoice.";

                $bankLedger= new Ledger();
                $bankLedger->person_type='Bank';
                $bankLedger->transaction_type='sale';
                $bankLedger->main_transaction_id=$customer->id;
                $bankLedger->person_id=$request->customer;
                $bankLedger->person_name=$customerrr->name;
                $bankLedger->transaction_account_id = $request->account;
                $bankLedger->cnic=$account->account;
                $bankLedger->date=date('Y-m-d H:i:s',strtotime($request->datetime));
                $bankLedger->description=$bank_desc;
                $bankLedger->debit=$request->paid;
                $bankLedger->balance=$account->current_balance;
                $bankLedger->save();
            }

            if ($request->employee !== 'default' and $request->employee !== null and $request->employee !== 'null') {
                $employee = Employee::find($request->employee);
                $employee_ledger_pre = Ledger::where('person_type', '=', 'employee')->where('person_id', '=', $request->employee)->get()->last();
                $employee_ledger = new Ledger();
                $employee_ledger->person_type = 'employee';
                $employee_ledger->transaction_type = 'commission';
                $employee_ledger->main_transaction_id = $customer->id;
                $employee_ledger->person_id = $request->employee;
                $employee_ledger->person_name = $employee->name;
                $employee_ledger->cnic = $employee->cnic;
                $employee_ledger->date = date('Y-m-d H:i:s', strtotime($request->datetime));
                $employee_ledger->description = "Commission of $request->employee_commission was analyzed on sale Id: $request->invoice";
                $employee_ledger->credit = $request->employee_commission;
                $employee_ledger->balance = $employee_ledger_pre->balance - $request->employee_commission;
                $employee_ledger->save();
                $employee_commission=new EmployeeCommission();
                $employee_commission->user_id=Auth::id();
                $employee_commission->employee_id=$request->employee;
                $employee_commission->invoice_no=Auth::id().$request->invoice;
                $employee_commission->employee_commission=$request->employee_commission;
                $employee_commission->save();
            }



            DB::commit();
            return response(['type' => 'success', 'message' => 'Sale created successfully....']);
        } catch (\PDOException $e) {
            DB::rollBack();
            return response(['type' => 'error', 'message' => 'Error While Saving Transactions...'.$e->getMessage()]);
        }

    }



}

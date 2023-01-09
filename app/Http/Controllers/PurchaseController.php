<?php

namespace App\Http\Controllers;

use App\BankAccount;
use App\Category;
use App\Company;
use App\Customer;
use App\CustomerInvoice;
use App\Employee;
use App\Ledger;
use App\Munshi;
use App\Product;
use App\Purchase;
use App\PurchaseReturn;
use App\Sale;
use App\SaleReturn;
use App\Supplier;
use App\SupplierInvoice;
use App\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PHPUnit\Runner\PhptTestCase;
use Yajra\DataTables\DataTables;

use PhpParser\Node\Expr\AssignOp\ShiftLeft;

class PurchaseController extends Controller
{
    public function purchaseproduct(){
        $suppliers=Supplier::all();
        $customers=Customer::all();
        $munshis=Munshi::all();
        $accounts=BankAccount::all();
        $products=Product::all();
        $companies=Company::all();
        $categories=Category::all();
        return view('admin.Purchase.purchase',compact('suppliers','customers','products','accounts','companies','categories','munshis'));
    }
    public function returnpurchase(){
        $banks=BankAccount::all();
        return view('admin.Purchase.returnpurchase',compact('banks'));
    }
    public function returnsale(){
        $banks=BankAccount::all();
        return view('admin.sale.returnsale',compact('banks'));
    }
    public function purchase_return_report(){
        return view('admin.Purchase.p_return_report');
    }
    public function purchasereport(){
        return view('admin.Purchase.purchasereport');
    }
    public function sale_return_report(){
        return view('admin.sale.s_return_report');
    }
    public function post_return_product(Request $request){
        $return= new PurchaseReturn();
        $return->user_id=Auth::id();
        $return->supplier_invoices_id=$request->sup_inv_id;
        $return->product_id=$request->p_id;
        $return->supplier_id=$request->s_id;
        $return->invoice=$request->invoice;
        $return->product=$request->product;
        $return->return_qty=$request->return_qty;
        $return->return_date=date('Y-m-d H:i:s', strtotime($request->return_date));
        $return->total_receiving_amount=$request->total_receiving_amount;
        $return->received_amount=$request->received_amount;
        $return->amount_due=$request->amount_due;
        $return->save();
        $product_return=Product::find($request->p_id);
        $product_return->total_qty-=$request->return_qty;
        $product_return->update();


        $stock_sold=$request->return_qty;
        while($stock_sold !== 0){
            $purchase_stock=Purchase::where('quantity_remaining','>',0)->where('product_id','=',$request->p_id)->get()->first();
            if ($purchase_stock->quantity_remaining > $stock_sold) {
                $purchase_stock->quantity_remaining-= $stock_sold;
                $purchase_stock->update();
                $stock_sold=0;
            }
            elseif($purchase_stock->quantity_remaining < $stock_sold){
                $sss=$stock_sold-$purchase_stock->quantity_remaining;
                $purchase_stock->quantity_remaining=0;
                $purchase_stock->update();
                $stock_sold=$sss;
            }
            else{
                $purchase_stock->quantity_remaining-=$stock_sold;
                $purchase_stock->update();
                $stock_sold=0;
            }
        }

        $supplier=Supplier::find($request->s_id);
        $previous_balance=Ledger::where('person_type','=','supplier')->where('person_id','=',$supplier->id)->get()->last();
        $description="You Returned Products of $request->total_receiving_amount amount.";
        $ledger= new Ledger();
        $ledger->person_type='supplier';
        $ledger->person_id=$request->s_id;
        $ledger->person_name=$supplier->name;
        $ledger->cnic=$supplier->cnic;
        $ledger->date=date('Y-m-d H:i:s', strtotime($request->return_date));
        $ledger->description=$description;
        $ledger->debit=$request->total_receiving_amount;
        $ledger->balance=$previous_balance->balance+$request->total_receiving_amount;
        $ledger->save();

        $account_balance2=BankAccount::find($request->account);
        $description2="Supplier Paid $request->received_amount at the spot against return_id $return->id .";
        $previous_balance2=Ledger::where('person_type','=','supplier')->where('person_id','=',$supplier->id)->get()->last();
        if ($request->received_amount !== '0'){
            $ledger2= new Ledger();
            $ledger2->person_type='supplier';
            $ledger2->person_id=$request->s_id;
            $ledger2->transaction_account_id=$supplier->id;
            $ledger2->account_last_balance=$account_balance2->current_balance;
            $ledger2->person_name=$supplier->name;
            $ledger2->cnic=$supplier->cnic;
            $ledger2->date=date('Y-m-d H:i:s', strtotime($request->return_date));
            $ledger2->description=$description2;
            $ledger2->credit=$request->received_amount;
            $ledger2->balance=$previous_balance2->balance-$request->received_amount;
            $ledger2->save();
        }
            if ($request->received_amount !== '0') {
                $bank = BankAccount::find($request->account);
                $bank->current_balance+=$request->received_amount;
                $bank->update();
            }
    }
    public function post_accept_return(Request $request){
        $sale_return= new SaleReturn();
        $sale_return->customer_invoices_id=$request->cus_inv_id;
        $sale_return->product_id=$request->p_id;
        $sale_return->customer_id=$request->c_id;
        $sale_return->invoice=$request->invoice;
        $sale_return->product=$request->product;
        $sale_return->return_qty=$request->return_qty;
        $sale_return->return_date=date('Y-m-d H:i:s', strtotime($request->return_date));;
        $sale_return->total_paying_amount=$request->total_paying_amount;
        $sale_return->paid_amount=$request->paid_amount;
        $sale_return->amount_due=$request->amount_due;
        $sale_return->save();

        $product_return=Product::find($request->p_id);
        $product_return->total_qty+=$request->return_qty;
        $product_return->update();
        $product_value=$product_return->sale_price*$request->return_qty;


        $stock_sold=$request->return_qty;
        while($stock_sold !== 0){
            $purchase_stock=Purchase::whereRaw('quantity_remaining <> quantity')->where('product_id','=',$request->p_id)->get()->last();
            $room=$purchase_stock->quantity - $purchase_stock->quantity_remaining;
            if ($room > $stock_sold) {
                $purchase_stock->quantity_remaining+= $stock_sold;
                $purchase_stock->update();
                $stock_sold=0;
            }
            elseif($room < $stock_sold){
                $sss=$stock_sold-$room;
                $purchase_stock->quantity_remaining=$purchase_stock->quantity;
                $purchase_stock->update();
                $stock_sold=$sss;
            }
            else{
                $purchase_stock->quantity_remaining+=$stock_sold;
                $purchase_stock->update();
                $stock_sold=0;
            }
        }




        $customer=Customer::find($request->c_id);
        $previous_balance=Ledger::where('person_type','=','customer')->where('person_id','=',$customer->id)->get()->last();
        $description="Customer returned Products of $request->total_paying_amount amount.";

        $ledger= new Ledger();
        $ledger->person_type='customer';
        $ledger->person_id=$request->c_id;
        $ledger->person_name=$customer->name;
        $ledger->cnic=$customer->cnic;
        $ledger->date=date('Y-m-d H:i:s', strtotime($request->return_date));
        $ledger->description=$description;
        $ledger->credit=$request->total_paying_amount;
        $ledger->balance=$previous_balance->balance-$request->total_paying_amount;
        $ledger->save();

        $account_balance2=BankAccount::find($request->account);
        $description2="You Paid $request->paid_amount at the spot against return_id $sale_return->id .";
        $previous_balance2=Ledger::where('person_type','=','customer')->where('person_id','=',$customer->id)->get()->last();
        if ($request->paid_amount !== '0'){
            $ledger2= new Ledger();
            $ledger2->person_type='customer';
            $ledger2->person_id=$request->c_id;
            $ledger2->transaction_account_id=$customer->id;
            $ledger2->account_last_balance=$account_balance2->current_balance;
            $ledger2->person_name=$customer->name;
            $ledger2->cnic=$customer->cnic;
            $ledger2->date=date('Y-m-d H:i:s', strtotime($request->return_date));
            $ledger2->description=$description2;
            $ledger2->debit=$request->paid_amount;
            $ledger2->balance=$previous_balance2->balance+$request->paid_amount;
            $ledger2->save();
        }
        if ($request->paid_amount !== '0') {
            $bank = BankAccount::find($request->account);
            $bank->current_balance-=$request->paid_amount;
            $bank->update();
        }
        if ($request->employee_id !== null){
            $employee=Employee::find($request->employee_id);
            $total_p_value=($employee->commission/100)*$product_value;
            $previous_balance3=Ledger::where('person_type','=','employee')->where('person_id','=',$request->employee_id)->get()->last();
            $ledger2= new Ledger();
            $ledger2->person_type='employee';
            $ledger2->person_id=$request->employee_id;
            $ledger2->person_name=$request->employee_name;
            $ledger2->date=date('Y-m-d H:i:s', strtotime($request->return_date));
            $ledger2->description="Amount of $total_p_value was deducted from employees balance on sale return.";
            $ledger2->debit=$total_p_value;
            $ledger2->balance=$previous_balance3->balance+$total_p_value;
            $ledger2->save();
        }
    }
    public function allpurchases(){
        return view('admin.Purchase.allpurchases');
    }
    public function fetch_product_data(Request $request){
        $productdata=Product::find($request->id);
        $unit=Unit::find($productdata->unit_id);
//        $purchases=Purchase::where('product_id','=',$request->id)->where('quantity_remaining','<>',0)->get();
        $total_purchase_price=0;
//        $total_qty=Purchase::where('product_id','=',$request->id)->where('quantity_remaining','<>',0)->sum('quantity_remaining');
//        foreach ($purchases as $purchase){
//            $total_purchase_price+=($purchase->purchase_price*$purchase->quantity_remaining);
//        }
//        if ($total_qty > 0 & $total_qty !== null & $total_qty!==""){
//            $avg_purchase_price=$total_purchase_price/$total_qty;
//        }else{
//            $avg_purchase_price="";
//        }
        $discount=Sale::where('product_id','=',$request->id)->get()->last();
        return response(["data"=>$productdata,"discount"=>$discount,"avg_purchase_price"=>$productdata->purchase_price,"unit"=>$unit]);
    }
    public function dtgetshowallpurchase(){
            $data=SupplierInvoice::select('purchases.id','products.name as p_name','suppliers.name','purchases.purchase_price','purchases.quantity','purchases.sale_price','products.total_qty','invoice','date_of_purchase')
                ->join('purchases','purchases.supplier_invoice_id','=','supplier_invoices.id')
                ->join('suppliers','suppliers.id','=','supplier_invoices.supplier_id')
                ->join('products','products.id','=','purchases.product_id')
                ->get();
            try {
                return DataTables::of($data)->make(true);
            }
            catch (\Exception $e) {
            }
    }
    public function dtgetallpurchaseforsuppliers(){
        $data=SupplierInvoice::select('supplier_invoices.id','invoice','suppliers.name as name','users.name as user_name','total','paid','due','discount','grand_total','date_of_purchase')
            ->join('suppliers','suppliers.id','=','supplier_invoices.supplier_id')
            ->join('users','users.id','=','supplier_invoices.user_id')
            ->where('supplier_invoices.supplier_person','=','supplier')
            ->get();
        try {
            return DataTables::of($data)->make(true);
        } catch (\Exception $e) {
        }
    }

    public function dtgetallpurchaseforcustomers(){
        $data=SupplierInvoice::select('supplier_invoices.id','invoice','customers.name as name','users.name as user_name','total','paid','due','discount','grand_total','date_of_purchase')
            ->join('customers','customers.id','=','supplier_invoices.supplier_id')
            ->join('users','users.id','=','supplier_invoices.user_id')
            ->where('supplier_invoices.supplier_person','=','customer')
            ->get();
        try {
            return DataTables::of($data)->make(true);
        } catch (\Exception $e) {
        }
    }




    public function dtgetpurchase_report_subtable(Request $request){
        $data=Purchase::where('supplier_invoice_id','=',$request->invoice)->select('purchases.id','companies.company_name as c_name','purchases.quantity','purchases.purchase_price','products.name')
            ->leftJoin('products','products.id','=','purchases.product_id')
            ->leftJoin('companies','companies.id','=','products.company_id')
            ->get();
        return response(['subtable_data'=>$data]);
    }

    public function dtgetreturnpurchase(){
            $data=SupplierInvoice::select('purchases.id','suppliers.id as s_id','supplier_invoices.id as purchase_invoice_id','products.id as p_id','products.name as p_name','suppliers.name','purchases.purchase_price','purchases.quantity','purchases.sale_price','products.total_qty','invoice','date_of_purchase')
                ->join('purchases','purchases.supplier_invoice_id','=','supplier_invoices.id')
                ->join('suppliers','suppliers.id','=','supplier_invoices.supplier_id')
                ->join('products','products.id','=','purchases.product_id')
                ->get();
            try {
                return DataTables::of($data)->make(true);
            } catch (\Exception $e) {
            }
    }
    public function dtgetreturnsale(){
            $data=CustomerInvoice::select('sales.id','customer_invoices.id as customer_invoices_id','employees.id as employee_id','employees.name as employee_name','customers.id as c_id','products.id as p_id','products.name as p_name','customers.name','sales.sale_price','sales.quantity','products.total_qty','invoice','date')
                ->join('sales','sales.customer_invoices_id','=','customer_invoices.id')
                ->join('customers','customers.id','=','customer_invoices.customer_id')
                ->leftJoin('employees','employees.id','=','customer_invoices.employee_id')
                ->join('products','products.id','=','sales.product_id')
                ->get();
            try {
                return DataTables::of($data)->make(true);
            } catch (\Exception $e) {
            }
    }
    public function dtgetshow_p_return(){
            $data=PurchaseReturn::select('purchase_returns.id','suppliers.name as name','users.name as user_name','invoice','product','return_qty','return_date','total_receiving_amount','received_amount')
                ->join('users','users.id','=','purchase_returns.user_id')
                ->join('suppliers','suppliers.id','=','purchase_returns.supplier_id')
                ->get();
            try {
                return DataTables::of($data)->make(true);
            } catch (\Exception $e) {
            }
    }
    public function dtgetshow_s_return(){
            $data=SaleReturn::select('sale_returns.id','name','invoice','product','return_qty','return_date','total_paying_amount','paid_amount')
                ->join('customers','customers.id','=','sale_returns.customer_id')
                ->get();
            try {
                return DataTables::of($data)->make(true);
            } catch (\Exception $e) {
            }
    }
    public function bank_balance(Request $request){
        $balance=BankAccount::find($request->id);
        return response(['data'=>$balance]);
    }
    public function after_product_save(Request $request){
        $data=Product::all();
        $last_product=Product::get()->last();
        return response(["data"=>$data,"last_product"=>$last_product]);
    }
    public function return_qty(Request $request){

        $data=PurchaseReturn::where('product_id','=',$request->id)->where('supplier_invoices_id','=',$request->s_invoices_id)->sum('return_qty');
        return response(['data'=>$data]);
    }
    public function get_returned_qty_sale(Request $request){

        $data=SaleReturn::where('product_id','=',$request->id)->where('customer_invoices_id','=',$request->c_invoices_id)->sum('return_qty');
        return response(['data'=>$data]);
    }
    public function fetch_supplier_balance(Request $request){
        if ($request->label=="Suppliers"){
            $person="supplier";
        }else{
            $person="customer";
        }
        $supplier_balance=Ledger::where('person_type','=',$person)->where('person_id','=',$request->id)->get()->last();
        return response(["data"=>$supplier_balance]);
    }
    public function fetch_account_balance(Request $request){
//        return response($request)
        if ($request->label == 'Suppliers'){
            $account_balance=Ledger::where('person_type','supplier')->where('person_id','=',$request->id)->get()->last();
        } else{
            $account_balance=BankAccount::find($request->id);
        }
        return response(["data"=>$account_balance]);
    }
    public function postpurchasecart(Request $request){
        try {
            DB::beginTransaction();
            if ($request->supplier_label=="Customers"){
                $sup_person="customer";
            }else{
                $sup_person="supplier";
            }

            $sup_invoices= new SupplierInvoice();
            $sup_invoices->supplier_id=$request->supplier;
            $sup_invoices->user_id=Auth::id();
            $sup_invoices->supplier_person=$sup_person;
            $sup_invoices->invoice=Auth::id()."".$request->invoice;
            $sup_invoices->total=$request->total;
            $sup_invoices->paid=$request->paid;
            $sup_invoices->date_of_purchase=date('Y-m-d H:i:s',strtotime($request->datetime));
            $sup_invoices->due=$request->remaining;
            $sup_invoices->discount=$request->discount;
            $sup_invoices->grand_total=$request->grand_total;
            $sup_invoices->save();
            foreach ($request->data as $data){
                $purchase= new Purchase();
                $purchase->product_id=$data['id'];
                $purchase->supplier_invoice_id=$sup_invoices->id;
                $purchase->purchase_price=$data['purchase_price'];
                $purchase->sale_price=$data['sale_price'];
                $purchase->quantity=$data['qty'];
                $purchase->quantity_remaining=$data['qty'];
//            if ($data['expiry'] !== null){
//            $purchase->expiry=date('Y-m-d',strtotime($data['expiry']));}
                $purchase->save();
                $product=Product::find($data['id']);
                $product->total_qty+=$data['qty'];
                $product->purchase_price=$data['purchase_price'];
                $product->sale_price=$data['sale_price'];
                $product->update();
            }
            if ($sup_person=="customer"){
                $supplier=Customer::find($request->supplier);
            }else{
                $supplier=Supplier::find($request->supplier);
            }
            $description="Product(s) were purchased with a total bill of $request->grand_total from $sup_person: $supplier->name against Invoice: $request->invoice.";

            $supplier_ledger=Ledger::where('person_type','=',$sup_person)->where('person_id','=',$supplier->id)->get()->last();
            $ledger= new Ledger();
            $ledger->person_type=$sup_person;
            $ledger->transaction_type='purchase';
            $ledger->main_transaction_id=$sup_invoices->id;
            $ledger->person_id=$request->supplier;
            $ledger->person_name=$supplier->name;
            $ledger->cnic=$supplier->cnic;
            $ledger->date=date('Y-m-d H:i:s',strtotime($request->datetime));
            $ledger->description=$description;
            $ledger->credit=$request->grand_total;
            $ledger->balance=$supplier_ledger->balance-$request->grand_total;
            $ledger->save();
//        dd($request->paid);
            if ($request->paid <> 0){
                $supplier_ledger2=Ledger::where('person_type','=',$sup_person)->where('person_id','=',$supplier->id)->get()->last();
                $description2="You paid Rs.: $request->paid to $sup_person: $supplier->name on spot of Purchase";
                $ledger2= new Ledger();
                $ledger2->person_type=$sup_person;
                $ledger2->transaction_type='purchase';
                $ledger2->main_transaction_id=$sup_invoices->id;
                $ledger2->person_id=$request->supplier;
                $ledger2->person_name=$supplier->name;
                $ledger2->cnic=$supplier->cnic;
                $ledger2->date=date('Y-m-d H:i:s',strtotime($request->datetime));
                $ledger2->description=$description2;
                $ledger2->transaction_account_id=$supplier->id;
                $ledger2->debit=$request->paid;
                $ledger2->balance=$supplier_ledger2->balance+$request->paid;
                $ledger2->save();

                $account=BankAccount::find($request->account);
                $account->current_balance-=$request->paid;
                $account->update();

//            dd($request->account, $request->all(), $account);
                $bank_desc = "Product(s) were purchased with a total bill of $request->grand_total from Bank Branch:$account->branch_name against Invoice: $request->invoice.";
                $bankLedger= new Ledger();
                $bankLedger->person_type='Bank';
                $bankLedger->transaction_type='purchase';
                $bankLedger->main_transaction_id=$sup_invoices->id;
                $bankLedger->person_id=$request->supplier;
                $bankLedger->person_name=$supplier->name;
                $bankLedger->cnic=$account->account;
                $bankLedger->transaction_account_id=$account->id;
                $bankLedger->date=date('Y-m-d H:i:s',strtotime($request->datetime));
                $bankLedger->description=$bank_desc;
                $bankLedger->credit=$request->paid;
                $bankLedger->balance=$account->current_balance;
                $bankLedger->save();
            }
            DB::commit();

        } catch (\PDOException $e) {
            dd($e);
            DB::rollBack();
            return response(['type' => 'error', 'message' => 'Error While Saving Transactions...']);
        }
    }

}

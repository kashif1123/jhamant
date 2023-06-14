<?php

namespace App\Http\Controllers;

use App\Category;
use App\Company;
use App\Credential;
use App\DataTables\CategoryDataTablesEditor;
use App\DataTables\CompanyDataTablesEditor;
use App\DataTables\ProductDataTablesEditor;
use App\Product;
use App\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class ProductController extends Controller
{
    public function newproduct(){
        $categories=Category::all();
        $companies=Company::all();
        $units=Unit::all();
        return view('admin.product.newproduct',compact('categories','companies','units'));
    }
    public function allcategories(){
        return view('admin.product.allcategories');
    }
    public function allcompany(){
        return view('admin.product.allCompanies');
    }
    public function allproducts(){
        $credentials=Credential::get()->first();
        return view('admin.product.allproducts',compact('credentials'));
    }
    public function product_sale(){
        return view('admin.product.product_sale');
    }
    public function insert_new_product(Request $request){
        $category= new Product();
        $category->name=$request->product;
        $category->barcode=$request->barcode;
        $category->category_id=$request->category;
        $category->company_id=$request->company;
        $category->purchase_price=$request->purchase;
        $category->sale_price=$request->sale;
        $category->unit_id=$request->unit;
        $category->unit="qty";
        $category->total_qty=0;
        $category->save();
        $data=Category::all();
        return response(["data2"=>$data]);
    }
    public function insert_new_unit(Request $request){
        $newunit=new Unit();
        $newunit->name=$request->name;
        $newunit->value=$request->value;
        $newunit->save();
        $units=Unit::all();
        return response($units);
    }
    public function insert_new_product_modal(Request $request){
        $category= new Product();
        $category->name=$request->product;
        $category->barcode=$request->barcode;
        $category->category_id=$request->category;
        $category->company_id=$request->company;
        $category->purchase_price=$request->purchase;
        $category->sale_price=$request->sale;
        $category->unit=$request->unit;
        $category->total_qty=0;
        $category->save();
        $data=Category::all();
        $products=Product::all();
        return response(["data2"=>$data,"product"=>$products,"last_id"=>$category->id]);
    }
    public function insert_new_company(Request $request){
        $company= new Company();
        $company->company_name=$request->name;
        $company->description=$request->description;
        $company->save();
        $data=Company::all();
        return response(["data2"=>$data]);
    }
    public function insert_new_category(Request $request){
        $category= new Category();
        $category->name=$request->name;
        $category->description=$request->description;
        $category->save();
        $data=Category::all();
        return response(["data2"=>$data]);
    }
    public function dtgetcategory(){
        $data=Category::select('id','name','description')->get();
        try {
            return DataTables::of($data)->make(true);
        } catch (\Exception $e) {
        }
    }
    public function dtgetcompany(){
        $data=Company::select('id','company_name','description')->get();
        try {
            return DataTables::of($data)->make(true);
        } catch (\Exception $e) {
        }
    }
    public function dtpostcategory(CategoryDataTablesEditor $editor){
        return $editor->process(\request());
    }
    public function dtpostcompany(CompanyDataTablesEditor $editor){
        return $editor->process(\request());
    }
    public function get_categories_for_products(Request $request){
        $data=Category::all();
        return response(['dat'=>$data]);
    }
    public function get_companies_for_products(Request $request){
        $data=Company::all();
        return response(['dat'=>$data]);
    }
    public function fetch_categories(Request $request){
        $categories=Category::all();
        return response(['category'=>$categories]);
    }
    public function dtgetshowproducts(){
        $data=Product::select('products.id','products.name','categories.name as c_name','products.category_id','products.company_id','companies.company_name as company','units.name as unit_name','products.purchase_price','products.sale_price','barcode','total_qty','sale_percentage',
            DB::raw('(sum(purchases.purchase_price*purchases.quantity_remaining)) / (sum(purchases.quantity_remaining)) as avg_purchase_price ')
//            DB::raw('(sum(purchases.purchase_price)) as avg_purchase_price')
        )
            ->Join('categories','categories.id','=','products.category_id')
            ->Join('companies','companies.id','=','products.company_id')
            ->Join('units','units.id','=','products.unit_id')
            ->leftjoin('purchases','purchases.product_id','=','products.id')
            ->groupBy('products.id')
            ->get();
        try {
//            return DataTables::of($data)->make(true);
            return DataTables::of($data)->addColumn('action', function ($user) {
                return '<button class="btn btn-xs btn-primary itemBarcode"><i class="fa fa-print"></i>Print Barcode</button>';
            })->make(true);

        } catch (\Exception $e) {
        }
    }
    public function dtpostshowproducts(ProductDataTablesEditor $editor){

        return $editor->process(\request());
    }
    public function fetch_sale_type_items(Request $request){
        if ($request->type == 'company'){
            $data=Company::all();
            return response(['data'=>$data]);
        }elseif ($request->type == 'category'){
            $data = Category::all();
            return response(['data'=>$data]);
        }else {
            $data=Product::all();
            return response(['data'=>$data]);
        }
    }
    public function insert_sale(Request $request){
        $sale_type=$request->sale_type;
        if ($sale_type == "company"){
            $products=Product::where('company_id','=',$request->sale_type_item)->update(['sale_percentage'=>$request->sale_percentage]);
        }elseif ($sale_type == "category"){
            $products=Product::where('category_id','=',$request->sale_type_item)->update(['sale_percentage'=>$request->sale_percentage]);
            $category=Category::where('id','=',$request->sale_type_item)->update([['sale_percentage'=>$request->sale_percentage,'on_sale'=>'yes']]);
        }else{
            $products=Product::where('id','=',$request->sale_type_item)->update(['sale_percentage'=>$request->sale_percentage]);
        }
        return response('success');
    }
}

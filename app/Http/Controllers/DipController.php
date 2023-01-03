<?php

namespace App\Http\Controllers;

use App\DaycloseStock;
use App\Dip;
use App\Product;
use App\Purchase;
use App\Http\Controllers\DayCloseController;
use App\Sale;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class DipController extends Controller
{
    public function newdispose(){
        $petrol=Product::find(1);
        $diesel=Product::find(1);
        return view('admin.dispose.dispose',compact('products'));
    }
    public function dispose_report(){
        return view('admin.dispose.disposereport');
    }
    public function fetch_prev_data(Request $request){
        $date=date("Y-m-d H:i:s");
        $prev_stock=Product::find($request->id);
        $prev_analysed=Dip::where('product_id','=',$request->id)->get()->last();
        $opening_stock=DaycloseStock::where('product_id','=',$request->id)->get()->last();
        if ($opening_stock){
            $prev_date=$opening_stock->created_at->subDays(1);
        }else{
            $prev_date=Carbon::now()->subDays(1);
        }
//        return response($prev_date);
        $sales=Sale::select('quantity')->where('product_id','=',$request->id)
        ->whereBetween('created_at',[date('Y-m-d H:i:s',strtotime($prev_date)),date('Y-m-d H:i:s',strtotime($date))])
        ->sum('quantity');
        $purchases=Purchase::where('product_id','=',$request->id)
        ->whereBetween('created_at',[date('Y-m-d H:i:s',strtotime($prev_date)),date('Y-m-d H:i:s',strtotime($date))])
        ->sum('quantity');
//        return response(['sale'=>$sales]);
        return response(['stock'=>$prev_stock,'analysed_date'=>$prev_analysed,'opening_stock'=>$opening_stock,'sale'=>$sales,'purchases'=>$purchases]);
    }
    public function insert_new_dispose(Request $request){
//        return response($request);
        $date=date("Y-m-d H:i:s");
        $newdespose= new Dip();
        $newdespose->product_id=$request->p_product;
        $newdespose->prev_stock=$request->p_prev_stock;
        $newdespose->opening_stock=$request->p_opening_stock;
        $newdespose->new_stock=$request->p_new_stock;
        $newdespose->sales=$request->p_prev_sales;
        $newdespose->purchases=$request->p_prev_purchases;
        $newdespose->product_testing=$request->p_product_testing;
        $newdespose->analysed_date=date('Y-m-d H:i:s',strtotime($request->dayclose_date));
        $newdespose->stock_disposed=$request->p_lost_stock;
        $newdespose->stock_value=$request->p_lost_stock_value;
        $newdespose->save();
        $newdespose2= new Dip();
        $newdespose2->product_id=$request->d_product;
        $newdespose2->prev_stock=$request->d_prev_stock;
        $newdespose2->opening_stock=$request->d_opening_stock;
        $newdespose2->new_stock=$request->d_new_stock;
        $newdespose2->sales=$request->d_prev_sales;
        $newdespose2->purchases=$request->d_prev_purchases;
        $newdespose2->product_testing=$request->d_product_testing;
        $newdespose2->analysed_date=date('Y-m-d H:i:s',strtotime($request->dayclose_date));
        $newdespose2->stock_disposed=$request->d_lost_stock;
        $newdespose2->stock_value=$request->d_lost_stock_value;
        $newdespose2->save();
        $update_product=Product::find($request->p_product);
        $update_product->total_qty=$request->p_new_stock;
        $update_product->update();

        $update_product2=Product::find($request->d_product);
        $update_product2->total_qty=$request->d_new_stock;
        $update_product2->update();
//        return response(["message"=>"success"]);
        $dayclose_obj=new DayCloseController();
       $tempdata= $dayclose_obj->closeday($request->dayclose_date);

        return response(['data'=>$tempdata]);
    }
    public function dtgetshowdispose(Request $request){
        $data=Dip::select('dips.id','dips.prev_stock','new_stock','analysed_date','opening_stock','sales','purchases','product_testing','stock_disposed','stock_value','products.name')
            ->join('products','products.id','=','dips.product_id')
            ->get();
        try {
            return DataTables::of($data)->make(true);
        } catch (\Exception $e) {
        }
    }
}

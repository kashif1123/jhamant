<?php

namespace App\Http\Controllers;

use App\User;
use App\UserPermissions;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    public function newUser(){
        return view('admin.user.createuser');
    }
    public function insert_new_user(Request $request){
        $newuser= new User();
        $newuser->cnic=$request->cnic;
        $newuser->email=$request->email;
        $newuser->name=$request->name;
        $newuser->contact=$request->contacts;
        $newuser->password=bcrypt($request->password);
        $newuser->address=$request->address;
        $newuser->description=$request->description;
        $newuser->save();
        $permissions= new UserPermissions();
        $permissions->user_id=$newuser->id;
        $permissions->access_type='standard';
        $permissions->standard_dashboard=$request->dashboard;
        $permissions->standard_sale=$request->sale;
        $permissions->standard_product=$request->product;
        $permissions->standard_account=$request->account;
        $permissions->standard_pay_receive=$request->pay_receive;
        $permissions->standard_purchase_sale=$request->purchase_sale;
        $permissions->standard_expenses=$request->expenses;
        $permissions->standard_ledger=$request->ledger;
        $permissions->standard_day_close=$request->dayclose;
        $permissions->standard_month_close=$request->monthclose;
        $permissions->standard_reports=$request->reports;
        $permissions->save();
//        $newuser->
        return response('success');
    }
    public function allusers(){
        return view('admin.user.allusers');
    }
    public function dtgetshowuser(){
        $data=User::select('id','cnic','created_at','name','email','contact','description','address')->get();
        try {
            return DataTables::of($data)->make(true);
        } catch (\Exception $e) {
        }
    }
}

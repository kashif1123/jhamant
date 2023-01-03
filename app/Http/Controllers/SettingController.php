<?php

namespace App\Http\Controllers;

use App\Credential;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function setting(){
        $credentials=Credential::get()->first();
        return view('admin.setting.setting',compact('credentials'));
    }
    public function apply_new_setting(Request $request){
        $settings=Credential::get()->first();
        $settings->company_name=$request->company_name;
        $settings->designation=$request->designation;
        $settings->owner_name=$request->owner;
        $settings->phone1=$request->phone1;
        $settings->phone2=$request->phone2;
        $settings->phone3=$request->phone3;
        $settings->address=$request->address;
        $settings->update();
        return response("Success");
    }
}

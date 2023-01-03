<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;

class RestController extends Controller
{
    public function reset_software_page(){
        return view('admin.setting.reset');
    }
    public function post_reset(Request $request){
        $admin=User::where('email','=',$request->email)->get()->last();
        $crypt_pass=$request->password;
        if ($admin){
            if(Hash::check($crypt_pass,$admin->password)) {
                Artisan::call("migrate:fresh");
                Artisan::call("DB:seed");
                return response(["done"=>"Success"]);
            }else{
                return response(["message"=>"Please Enter Correct Credentials"]);
            }
        }else{
            return response(["message"=>"Email not found"]);
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\SmsContact;
use App\SmsMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class sms_management extends Controller
{
    public function index(){
        $numbers=SmsContact::all();
        $messages=SmsMessage::all();
        return view('admin.sms_management.index',compact('numbers','messages'));
    }
    public function insert_new_contact_number(Request $request){
        $newnumber= new SmsContact();
        $newnumber->customer_name=$request->name;
        $newnumber->customer_number=$request->customer_number;
        $newnumber->save();
        $data=SmsContact::all();
        $selected=$request->selected;
        return response(["data"=>$data,"selected"=>$selected]);
    }
    public function sendsms(Request $request){
//        return response('dasadfadsf');
        if ($request->message_check == "no"){
            $newmessage=new SmsMessage();
            $newmessage->message=$request->sending_message;
            $newmessage->save();
            $sending_message=$newmessage;
        } elseif ($request->message_check == "yes"){
            $sending_message=SmsMessage::where('id','=',$request->selected_message)->select('message')->get()->last();
        }
        if ($request->send_check == "yes"){
            $send=SmsContact::select('customer_number')->get();
        }else{
            $send=SmsContact::where('id','=',$request->phone_numbers)->select('customer_number')->get();
        }
//        foreach ($send as $num){
//            return redirect()->away("https://cors-anywhere.herokuapp.com/https://sms.blazetcn.com/sms/api?action=send-sms&api_key=YnJhaW5pYWNjczpCcmFpbjc4Ng==&to=$num->customer_number&from=Blaze&sms=$sending_message->message");
//        }
        return response(["numbers"=>$send,"sending_message"=>$sending_message]);

    }
}

<?php
use Illuminate\Support\Facades\Auth;
//$credentials=;
function credentials(){
    $cr=\App\Credential::get()->last();
    return $cr;
}
function last_balance($id,$type){
    $last_balance=\App\Ledger::where('person_type','=',$type)->where('person_id','=',$id)->get()->last();
    if ($last_balance && isset($last_balance)){
        return $last_balance->balance;
    }else{
        return null;
    }
}
function user_name(){
    $user= \App\User::find(Auth::id());
    return $user->name;
}
?>
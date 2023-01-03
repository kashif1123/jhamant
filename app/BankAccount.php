<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BankAccount extends Model
{
    protected $fillable=['id','branch_name','branch_code','contact','account','opening_balance','current_balance','registration_date','description'];
}

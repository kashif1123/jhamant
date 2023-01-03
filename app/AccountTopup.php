<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccountTopup extends Model
{
    protected $fillable=['id','topup_date','description'];
}

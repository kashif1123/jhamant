<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PayAmount extends Model
{
    protected $fillable=['id','description','date','paying_amount','person_type'];
}

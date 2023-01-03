<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    public $fillable=['id','quantity','sale_price'];
}

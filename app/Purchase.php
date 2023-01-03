<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $fillable=['id','purchase_price','sale_price','quantity'];
}
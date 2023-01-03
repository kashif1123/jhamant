<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable=['id','name','purchase_price','sale_price','company_id','category_id','sale_percentage'];
}

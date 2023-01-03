<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerInvoice extends Model
{
    protected $fillable=['id','invoice','total','date','paid','due','discount','grand_total'];
}

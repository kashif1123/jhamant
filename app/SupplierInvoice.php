<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SupplierInvoice extends Model
{
    protected $fillable=['invoice','total','paid','due','wages','other_expenses','discount','grand_total','date_of_purchase'];
}

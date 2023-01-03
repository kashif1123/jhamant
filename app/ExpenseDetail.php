<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExpenseDetail extends Model
{
    protected $fillable=['id','name','amount','expense_date','description'];
}

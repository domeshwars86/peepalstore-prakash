<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductHistory extends Model
{
    use SoftDeletes;

    protected $table = "product_history";

    protected $fillable =[
        'product_id',
        'price',
        'mrp_price',
        'quantity'
    ];
}

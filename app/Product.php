<?php

namespace App;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\ProductHistory;

class Product extends Model
{
    use SoftDeletes;

    protected $table = "products";

    protected $fillable =[
        'product_name',
        'price',
        'detail',
        'quantity'
    ];
    public function rln_pro_cat()
    {
        return $this->hasOne('App\Rln_Product_Category','product_id','id');
    }
    public function productDetails() {
        return $this->hasOne(ProductHistory::class,'product_id');
    }
}

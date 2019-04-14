<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
      'product_name','product_type_id','product_M_price','product_L_price','product_image',
    ];

    public function ProductType(){
      return $this->belongsTo('App\ProductType');
    }

    public function Cart(){
      return  $this->hasOne('App\Cart');
    }

    public function Transaction(){
      return $this->hasOne('App\Transaction');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'carts';

    protected $fillable = [
      'user_id','product_id','quantity','total_price',
    ];

    public function User(){
      return $this->belongsTo('App\User');
    }

    public function Product(){
     return  $this->belongsTo('App\Product');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    protected $table = 'product_types';

    protected $fillable = [
      'type_name',
    ];

    public function Product(){
      return $this->hasMany('App\Product');
    }
}

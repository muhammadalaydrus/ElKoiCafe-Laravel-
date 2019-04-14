<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions';

    public function User(){
      return $this->belongsTo('App\User');
    }

    public function Product(){
      return $this->belongsTo('App\Product');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
  protected $table = 'payments';

  protected $fillable = [
    'name','bank','card_owner','payment_receipt','card_owner','buyer_email',

  ];

}

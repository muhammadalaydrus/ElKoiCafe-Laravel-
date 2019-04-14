<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ReceiptHistory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('receipt_history', function (Blueprint $table) {
          $table->increments('id');
          $table->unsignedinteger('user_id');
          $table->string('name');
          $table->string('email');
          $table->string('card_owner');
          $table->string('bank');
          $table->string('payment_receipt');
          $table->timestamps();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('receipt_history');
    }
}

<?php

use Illuminate\Database\Seeder;

class Product_type_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('product_types')->insert([
        'type_name' => 'Tea'
      ]);

      DB::table('product_types')->insert([
        'type_name' => 'Milk Tea'
      ]);

      DB::table('product_types')->insert([
        'type_name' => 'Fruit'
      ]);

      DB::table('product_types')->insert([
        'type_name' => 'Coffee'
      ]);

      DB::table('product_types')->insert([
        'type_name' => 'Bubble'
      ]);
    }
}

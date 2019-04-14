<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('products')->insert([
        'product_name' => 'Koi Original Tea',
        'product_type_id' => '1',
        'product_M_price' => '22000',
        'product_L_price' => '30000',
        'product_stock' => 'ready',
        'product_image' => 'Koi_tea.jpg',
        'created_at' => Carbon\Carbon::now(),
        'updated_at' => Carbon\Carbon::now(),
      ]);
      DB::table('products')->insert([
        'product_name' => 'Koi Jasmine Tea',
        'product_type_id' => '1',
        'product_M_price' => '30000',
        'product_L_price' => '36000',
        'product_stock' => 'ready',
        'product_image' => 'Koi_tea.jpg',
        'created_at' => Carbon\Carbon::now(),
        'updated_at' => Carbon\Carbon::now(),
      ]);
      DB::table('products')->insert([
        'product_name' => 'Koi oolong Tea',
        'product_type_id' => '1',
        'product_M_price' => '30000',
        'product_L_price' => '36000',
        'product_stock' => 'ready',
        'product_image' => 'Koi_tea.jpg',
        'created_at' => Carbon\Carbon::now(),
        'updated_at' => Carbon\Carbon::now(),
      ]);

      DB::table('products')->insert([
        'product_name' => 'Koi Milk Original Tea',
        'product_type_id' => '2',
        'product_M_price' => '22000',
        'product_L_price' => '30000',
        'product_stock' => 'ready',
        'product_image' => 'Koi_tea.jpg',
        'created_at' => Carbon\Carbon::now(),
        'updated_at' => Carbon\Carbon::now(),
      ]);

      DB::table('products')->insert([
        'product_name' => 'Koi Milk Green Tea',
        'product_type_id' => '2',
        'product_M_price' => '26000',
        'product_L_price' => '34000',
        'product_stock' => 'ready',
        'product_image' => 'Koi_tea.jpg',
        'created_at' => Carbon\Carbon::now(),
        'updated_at' => Carbon\Carbon::now(),
      ]);

      DB::table('products')->insert([
        'product_name' => 'Koi Milk Red Tea',
        'product_type_id' => '2',
        'product_M_price' => '26000',
        'product_L_price' => '34000',
        'product_stock' => 'ready',
        'product_image' => 'Koi_tea.jpg',
        'created_at' => Carbon\Carbon::now(),
        'updated_at' => Carbon\Carbon::now(),
      ]);

      DB::table('products')->insert([
        'product_name' => 'Koi Lychee Tea',
        'product_type_id' => '3',
        'product_M_price' => '22000',
        'product_L_price' => '30000',
        'product_stock' => 'ready',
        'product_image' => 'Koi_tea.jpg',
        'created_at' => Carbon\Carbon::now(),
        'updated_at' => Carbon\Carbon::now(),
      ]);

      DB::table('products')->insert([
        'product_name' => 'Koi Apple Tea',
        'product_type_id' => '3',
        'product_M_price' => '22000',
        'product_L_price' => '30000',
        'product_stock' => 'ready',
        'product_image' => 'Koi_tea.jpg',
        'created_at' => Carbon\Carbon::now(),
        'updated_at' => Carbon\Carbon::now(),
      ]);

      DB::table('products')->insert([
        'product_name' => 'Koi Orange Tea',
        'product_type_id' => '3',
        'product_M_price' => '22000',
        'product_L_price' => '30000',
        'product_stock' => 'ready',
        'product_image' => 'Koi_tea.jpg',
        'created_at' => Carbon\Carbon::now(),
        'updated_at' => Carbon\Carbon::now(),
      ]);

      DB::table('products')->insert([
        'product_name' => 'Koi Cappucino Mix',
        'product_type_id' => '4',
        'product_M_price' => '35000',
        'product_L_price' => '40000',
        'product_stock' => 'ready',
        'product_image' => 'Koi_tea.jpg',
        'created_at' => Carbon\Carbon::now(),
        'updated_at' => Carbon\Carbon::now(),
      ]);

      DB::table('products')->insert([
        'product_name' => 'Koi Vanilla Latte',
        'product_type_id' => '4',
        'product_M_price' => '37000',
        'product_L_price' => '43000',
        'product_stock' => 'ready',
        'product_image' => 'Koi_tea.jpg',
        'created_at' => Carbon\Carbon::now(),
        'updated_at' => Carbon\Carbon::now(),
      ]);

      DB::table('products')->insert([
        'product_name' => 'Koi Original Coffee',
        'product_type_id' => '4',
        'product_M_price' => '30000',
        'product_L_price' => '40000',
        'product_stock' => 'ready',
        'product_image' => 'Koi_tea.jpg',
        'created_at' => Carbon\Carbon::now(),
        'updated_at' => Carbon\Carbon::now(),
      ]);

      DB::table('products')->insert([
        'product_name' => 'Koi Bubble Choco',
        'product_type_id' => '5',
        'product_M_price' => '50000',
        'product_L_price' => '55000',
        'product_stock' => 'ready',
        'product_image' => 'Koi_tea.jpg',
        'created_at' => Carbon\Carbon::now(),
        'updated_at' => Carbon\Carbon::now(),
      ]);

      DB::table('products')->insert([
        'product_name' => 'Koi Bubble Green Tea',
        'product_type_id' => '5',
        'product_M_price' => '50000',
        'product_L_price' => '55000',
        'product_stock' => 'ready',
        'product_image' => 'Koi_tea.jpg',
        'created_at' => Carbon\Carbon::now(),
        'updated_at' => Carbon\Carbon::now(),
      ]);

      DB::table('products')->insert([
        'product_name' => 'Koi Bubble Milk Tea',
        'product_type_id' => '5',
        'product_M_price' => '50000',
        'product_L_price' => '55000',
        'product_stock' => 'ready',
        'product_image' => 'Koi_tea.jpg',
        'created_at' => Carbon\Carbon::now(),
        'updated_at' => Carbon\Carbon::now(),
      ]);
    }
}

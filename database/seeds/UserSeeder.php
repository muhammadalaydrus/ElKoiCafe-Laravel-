<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
        'name' => 'Admin',
        'email' => 'admin@mail.com',
        'password' => bcrypt('admin'),
        'phone' => '12345678',
        'gender' => 'Male',
        'address' => 'Jalan syahdan sbeleah syahdan',
        'image' => 'rqQEylX5Rz22.png',
        'role' => 'admin',
        'created_at' => Carbon\Carbon::now(),
        'updated_at' => Carbon\Carbon::now(),
      ]);
    }
}

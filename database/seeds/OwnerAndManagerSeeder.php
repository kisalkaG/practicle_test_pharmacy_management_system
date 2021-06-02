<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OwnerAndManagerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
              'name' => 'Owner',
              'user_name' => 'Owner1',
              'email' => 'Owner@gmail.com',
              'user_type' => 'Owner',
              'password' => bcrypt('123123')
            ],
            [
              'name' => 'Manager',
              'user_name' => 'Manager1',
              'email' => 'Manager@gmail.com',
              'user_type' => 'Manager',
              'password' => bcrypt('123123') 
            ]  
        ]);
    }
}

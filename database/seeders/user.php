<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class user extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
               'name'=>'Admin',
               'email'=>'admin@test.com',
               'password'=> bcrypt('123456'),
               'phone_number' => '3365131959',
               'role' => 1,
               'verified' => 1
            ],
            [
               'name'=>'User',
               'email'=>'user@test.com',
               'password'=> bcrypt('123456'),
               'phone_number' => '3365131959',
               'role' => 2,
               'verified' => 1
            ],
        ];
  
        foreach ($user as $key => $value) {
            DB::table('users')->insert($value);
        }
    }
}

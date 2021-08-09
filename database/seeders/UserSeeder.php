<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([

            [
              'name' => 'Abdullah',
              'email' => 'abdullah@gmail.com',
              'role_id' => '10',
              'password' => 'e10adc3949ba59abbe56e057f20f883e',
              'created_at' => now(),
              'updated_at' => now()
            ],
            [
              'name' => 'admin',
              'email' => 'adminh@gmail.com',
              'role_id' => '1',
              'password' => 'e10adc3949ba59abbe56e057f20f883e',
              'created_at' => now(),
              'updated_at' => now()
            ]
        ]);
    }
}

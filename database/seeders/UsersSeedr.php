<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UsersSeedr extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'password' => '1234',
            'address' => Str::random(16),
            'user_type' => 'admin',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'password' => '1234',
            'address' => Str::random(16),
            'user_type' => 'user',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
    }
}

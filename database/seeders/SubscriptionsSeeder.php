<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SubscriptionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subscriptions')->insert([
            'name' => Str::random(5),
            'info' => Str::random(5),
            'price' => '650',
            'duration' => '30',
            'project_limit' => '14',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('subscriptions')->insert([
            'name' => Str::random(5),
            'info' => Str::random(5),
            'price' => '750',
            'duration' => '30',
            'project_limit' => '16',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
    }
}

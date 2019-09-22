<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nowDatetime = Carbon::now()->toDateTimeString();

        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'email_verified_at' => $nowDatetime,
            'password' => bcrypt('password'),
            'created_at' => $nowDatetime,
            'updated_at' => $nowDatetime
        ]);
    }
}

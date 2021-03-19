<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            "name" => "Admin",
            "email" => "admin@Admin.com",
            "password" => Hash::make('password'),
            "is_enable" => 1,
            "role_id" => 2
        ];
        DB::table('users')->insert($data);
    }
}

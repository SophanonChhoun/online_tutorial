<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            "first_name" => "James",
            "last_name" => "Bond",
            "email" => "jamesbond@cia.com",
            "dob" => "2000-01-01",
            "gender" => "m",
            "identification_id" => 007,
            "street_address" => "1889 Buckingham Palace",
            "city" => "London",
            "country" => "Great Britain",
            "zip" => "10007",
            "phone_number" => "012007007",
            "identification_type_id" => 1,
            "password" => Hash::make('password'),
            "is_enable" => 1
        ];
        DB::table('customers')->insert($data);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                "name" => "Visa",
                "is_enable" => 1
            ],
            [
                "name" => "Mastercard",
                "is_enable" => 1
            ],
            [
                "name" => "Cash",
                "is_enable" => 1
            ]
        ];
        DB::table('payment_types')->insert($data);
    }
}

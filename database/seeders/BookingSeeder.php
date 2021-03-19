<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            "customer_id" => 1,
            "check_in_date" => "2020-12-08",
            "check_out_date" => "2020-12-12",
            "booking_type_id" => 1,
            "hotel_id" => 1,
            "payment_type_id" => 1,
            "is_enable" => 1
        ];
        DB::table('bookings')->insert($data);
    }
}

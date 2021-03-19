<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookingHasRoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            "booking_id" => 1,
            "room_id" => 1
        ];
        DB::table('booking_has_rooms')->insert($data);
    }
}

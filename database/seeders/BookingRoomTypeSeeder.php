<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookingRoomTypeSeeder extends Seeder
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
            "room_type_id" => 1
        ];
        DB::table('booking_room_type_maps')->insert($data);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomTypeSeeder extends Seeder
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
                "name" => "King's Court",
                "description" => "Discover a global collection of one-of-a-kind luxury hotels, resorts and residences, each inspired by our A Sense of Place® philosophy to reflect the local culture and spirit of a destination.",
                "price" => 138,
                "max" => 4,
                "hotel_id" => 1,
                "is_enable" => 1
            ],
            [
                "name" => "City View",
                "description" => "King's Court presents an ultra-luxury experience at the heart of the Cambodian capital. Soaring 188 meters above the heart of Phnom Penh.",
                "price" => 247,
                "max" => 2,
                "hotel_id" => 1,
                "is_enable" => 1
            ],
            [
                "name" => "Suite Sojourn",
                "description" => "Wherever you find yourself this festive season, Rosewood seeks to inspire your most memorable moments.",
                "price" => 207,
                "max" => 2,
                "hotel_id" => 2,
                "is_enable" => 1
            ]
        ];
        DB::table('room_types')->insert($data);
    }
}

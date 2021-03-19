<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomSeeder extends Seeder
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
                "name" => "Room 1",
                "hotel_id" => 1,
                "roomType_id" => 1,
                "status" => 1,
                "is_enable" => 1
            ],
            [
                "name" => "Room 2",
                "hotel_id" => 1,
                "roomType_id" => 2,
                "status" => 1,
                "is_enable" => 1
            ],
            [
                "name" => "Room 1",
                "hotel_id" => 2,
                "roomType_id" => 3,
                "status" => 1,
                "is_enable" => 1
            ]
        ];
        DB::table('rooms')->insert($data);
    }
}

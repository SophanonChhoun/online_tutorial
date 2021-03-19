<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookingTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'name' => 'Online',
            'is_enable' => 1
        ];
        DB::table('booking_types')->insert($data);
        $data = [
            'name' => 'Face to Face',
            'is_enable' => 1
        ];
        DB::table('booking_types')->insert($data);
    }
}

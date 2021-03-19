<?php

namespace Database\Seeders;

use App\Models\admin\Booking;
use App\Models\admin\Hotel;
use Illuminate\Database\Seeder;
use App\Models\admin\AboutUs;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
//        $this->call(AboutUsSeeder::class);
//        $this->call(BookingHasRoomSeeder::class);
//        $this->call(BookingRoomTypeSeeder::class);
//        $this->call(BookingSeeder::class);
//        $this->call(BookingTypesSeeder::class);
//        $this->call(CustomerSeeder::class);
//        $this->call(HotelSeeder::class);
//        $this->call(IdentificationTypeSeeder::class);
//        $this->call(PaymentTypeSeeder::class);
//        $this->call(RoomSeeder::class);
//        $this->call(RoomTypeSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
    }
}

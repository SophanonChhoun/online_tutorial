<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class HotelSeeder extends Seeder
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
                "name" => "Overlook One",
                "description" => "Overlook One presents an ultra-luxury experience at the heart of the Cambodian capital. Soaring 188 meters above the heart of Phnom Penh",
                "street_address" => "1449 Overlook Boulevard",
                "city" => "Phnom Penh",
                "country" => "Cambodia",
                "zip" => "12107",
                "is_enable" => 1
            ],
            [
                "name" => "The Grand Overlook",
                "description" => "Embark on a contemporary retreat at The Grand Overlook. Showcasing sleek, award-winning Khmer architecture and forward-thinking amenities, our hotel offers sophisticated comfort in the heart of one of the world's most inspiring locales.",
                "street_address" => "1889 Angkor Boulevard",
                "city" => "Siem Reap",
                "country" => "Cambodia",
                "zip" => "11921",
                "is_enable" => 1
            ],
            [
                "name" => "Overlook Resort",
                "description" => "One of the main Features of the resort is the impeccable grounds that border the ocean, including the beach, gardens, ponds, mangroves and walkways.",
                "street_address" => "178 Resort Street",
                "city" => "Kep",
                "country" => "Cambodia",
                "zip" => "11928",
                "is_enable" => 1
            ],
            [
                "name" => "The Royal Overlook",
                "description" => "Located 16 km from Kampot and nestled at the foothills of Bokor Mountain, The Royal Overlook provides something unique to fulfill every traveler’s dreams and desires.",
                "street_address" => "78 Royal Boulevard",
                "city" => "Sihanoukville",
                "country" => "Cambodia",
                "zip" => "19821",
                "is_enable" => 1
            ],
        ];
        DB::table('hotels')->insert($data);

    }
}

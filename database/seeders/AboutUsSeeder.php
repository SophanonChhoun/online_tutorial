<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\admin\AboutUs;
use Illuminate\Support\Facades\DB;

class AboutUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            "description" => "Hello world"
        ];
        DB::table('about_us')->insert($data);
    }
}

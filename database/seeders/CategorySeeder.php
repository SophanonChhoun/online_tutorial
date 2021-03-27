<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use App\Models\admin\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['name' => 'React', 'is_enable' => 1,],
            ['name' => 'Vue', 'is_enable' => 1,],
            ['name' => 'Cybersecurity', 'is_enable' => 1,],
            ['name' => 'Data Science', 'is_enable' => 1,],
            ['name' => 'Algorithms', 'is_enable' => 1,],
            ['name' => 'iOS', 'is_enable' => 1,],
            ['name' => 'Android', 'is_enable' => 1,],
            ['name' => 'Robotics', 'is_enable' => 1,],
            ['name' => 'Linguistics', 'is_enable' => 1,],
        ];

        DB::table('categories')->insert($categories);
    }
}

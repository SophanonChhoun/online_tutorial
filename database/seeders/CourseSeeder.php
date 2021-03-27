<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\admin\Course;
use DB;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $courses = [
            [
                'title' => 'Date Manipulation',
                'author_id' => 1,
                'category_id' => 4,
                'description' => 'This is the perfect place to start your journey as a front-end developer.',
                'is_enable' => 1,
            ],
            [
                'title' => 'OOP',
                'author_id' => 1,
                'category_id' => 6,
                'description' => 'Get your hands dirty writing and styling website front-ends using HTML and CSS',
                'is_enable' => 1,
            ],
            [
                'title' => 'Online Payment',
                'author_id' => 1,
                'category_id' => 3,
                'description' => 'Make your site interactive using JavaScript',
                'is_enable' => 1,
            ],
            [
                'title' => 'Cloud Technology',
                'author_id' => 1,
                'category_id' => 2,
                'description' => 'Build real-world projects including an image carousel and an infinitely scrolling list',
                'is_enable' => 1,
            ],
            [
                'title' => 'Architecture',
                'author_id' => 1,
                'category_id' => 2,
                'description' => 'Go beyond the basics: get introduced to TypeScript and React',
                'is_enable' => 1,
            ],
            [
                'title' => 'Cybersecurity',
                'author_id' => 1,
                'category_id' => 1,
                'description' => 'Learn all the React fundamentals you need to know to get you above the ground',
                'is_enable' => 1,
            ],
            [
                'title' => 'Data Visualization',
                'author_id' => 1,
                'category_id' => 3,
                'description' => 'Get your hands dirty writing and running real React code',
                'is_enable' => 1,
            ],
            [
                'title' => 'Compression',
                'author_id' => 1,
                'category_id' => 4,
                'description' => 'Learn to integrate your React frontend with a Firebase backend',
                'is_enable' => 1,
            ],
            [
                'title' => 'File Storage',
                'author_id' => 1,
                'category_id' => 6,
                'description' => 'See how React pairs with Typescript to make more possible',
                'is_enable' => 1,
            ],
            [
                'title' => 'Time Sharing',
                'author_id' => 1,
                'category_id' => 2,
                'description' => 'Use React Tracked to develop a small web app with global state',
                'is_enable' => 1,
            ],
            [
                'title' => 'Authentication',
                'author_id' => 1,
                'category_id' => 4,
                'description' => 'Brush up on data structures, algorithms, and important syntax',
                'is_enable' => 1,
            ],
            [
                'title' => 'Scaling',
                'author_id' => 1,
                'category_id' => 3,
                'description' => 'Learn the patterns that will help you answer any question you might face',
                'is_enable' => 1,
            ],
            [
                'title' => 'Memory',
                'author_id' => 1,
                'category_id' => 2,
                'description' => 'Practice answering hundreds of real interview questions',
                'is_enable' => 1,
            ],
            [
                'title' => 'Docker',
                'author_id' => 1,
                'category_id' => 5,
                'description' => 'Practice analysis of problems and application of object oriented design principles',
                'is_enable' => 1,
            ],
            [
                'title' => 'Writing Tests',
                'author_id' => 1,
                'category_id' => 6,
                'description' => 'Practice designing realistic large-scale systems',
                'is_enable' => 1,
            ],
            [
                'title' => 'Celebrate',
                'author_id' => 7,
                'category_id' => 1,
                'description' => 'Master the art of implementing microservices across a range of different tech stack',
                'is_enable' => 1,
            ],
        ];

        DB::table('courses')->insert($courses);
    }
}

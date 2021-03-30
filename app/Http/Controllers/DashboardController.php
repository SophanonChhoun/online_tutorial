<?php

namespace App\Http\Controllers;

use App\Models\admin\Category;
use App\Models\admin\Course;
use App\Models\admin\CourseLesson;
use App\Models\admin\Customer;
use App\Models\admin\CustomerCourse;
use App\Models\admin\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $users = User::all()->count();
        $customers = Customer::all()->count();
        $categories = Category::all()->count();
        $courses = Course::all()->count();
        $lessons = CourseLesson::all()->count();
        $enrollCourses = CustomerCourse::all()->count();


        return view("admin.dashboard.dashboard", compact('courses', 'customers', 'users', 'categories', 'enrollCourses', 'lessons'));
    }
}

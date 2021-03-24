<?php

namespace App\Http\Controllers;

use App\Http\Resources\CourseResource;
use App\Models\admin\Course;
use App\Models\admin\CustomerCourse;
use Illuminate\Http\Request;
use Exception;

class CustomerCourseController extends Controller
{

    public function index(){
        $customer_courses = CustomerCourse::where("customer_id", auth()->user()->id)->get();
        $courses = $customer_courses->pluck("course_id");
        $data = Course::with("category","lessons","media")->whereIn("id", $courses)->get();
        $data = $data->map(function($course) {
            $h = round($course->lessons->pluck("duration")->sum() / 60);
            $course['durations'] = $h." hour";
            $course['number_lessons'] = $course->lessons->count();
            return $course;
        });
        return $this->success(CourseResource::collection($data));

    }

    public function store(Request $request)
    {
        try {
            if (!Course::find($request->course_id)){
                return $this->fail("Cannot find this course");
            }

            CustomerCourse::create([
               "customer_id" => auth()->user()->id,
               "course_id" => $request->course_id,
            ]);

            return $this->success("Enroll Success");
        }catch (Exception $exception){
            return $this->fail($exception->getMessage());
        }
    }

    public function destroy(Request $request)
    {
        try {
            CustomerCourse::where("customer_id", auth()->user()->id)->where("course_id", $request->course_id)->delete();

            return $this->success("Unenroll Success");
        }catch (Exception $exception){
            return $this->fail($exception->getMessage());
        }
    }
}

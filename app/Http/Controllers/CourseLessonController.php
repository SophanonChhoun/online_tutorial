<?php

namespace App\Http\Controllers;

use App\Models\admin\Course;
use App\Models\admin\CourseLesson;
use App\Models\admin\CustomerCourse;
use App\Models\customer\UserLesson;
use Illuminate\Http\Request;

class CourseLessonController extends Controller
{
    public function index(Request $request)
    {
        $data = CourseLesson::with("course");
        if(isset($request->search))
        {
            $data = $data->where("title", "LIKE", "%".$request->search."%");
        }
        if(isset($request->course))
        {
            $data = $data->where("course_id", $request->course);
        }
        $data = $data->simplePaginate(10);
        $courses = Course::latest()->get();

        return view("admin.lesson.list", compact("data", "courses"));
    }

    public function show($id)
    {
        $lesson = CourseLesson::find($id);
        $userCourse = CustomerCourse::where("course_id", $lesson->course_id)->first();
        if($userCourse) {
           UserLesson::where("lesson_id", $id)->where("user_id", auth()->user()->id)->update([
               "done" => true
           ]);
        }
        if(!$lesson)
        {
            return $this->fail("Cannot find this lessson");
        }
        return $this->success([
            "course_id" => $lesson->course_id,
            "title" => $lesson->title,
            "duration" => $lesson->duration,
            "video_url" => $lesson->video_url,
            "video_content" => $lesson->video_content,
            "text_content" => $lesson->text_content,
        ]);
    }
}

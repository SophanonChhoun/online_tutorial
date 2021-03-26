<?php

namespace App\Http\Controllers;

use App\Core\MediaLib;
use App\Http\Resources\CourseResource;
use App\Http\Resources\LessonResource;
use App\Http\Resources\RecentCourseResource;
use App\Models\admin\Course;
use Illuminate\Http\Request;
use Exception;
use App\Models\admin\Category;
use DB;

class CourseController extends Controller
{
    public function index(Request $request){
        $data = Course::with("media", "lessons");
        if(isset($request->search))
        {
            $data = $data->where("title","LIKE","%".$request->search."%");
        }
        if(isset($request->is_enable))
        {
            $data = $data->where("is_enable", $request->is_enable);
        }
        $data = $data->latest()->paginate(10);
        $data->getCollection()->transform(function ($course) {
            $h = round($course->lessons->pluck("duration")->sum() / 60);
            $m = $course->lessons->pluck("duration")->sum() % 60;
            $course['durations'] = $h."h".$m."mn";
            return $course;
        });
        return view("admin.course.list", compact("data"));
    }

    public function create(){
        $categories = Category::where("is_enable",1)->get();
        return view("admin.course.create", compact("categories"));
    }

    public function store(Request $request){
        DB::beginTransaction();

        try {
            $course = [
                "title" => $request->title,
                "description" => $request->description,
                "author_id" => auth()->user()->id,
                "category_id" => $request->category_id,
                "is_enable" => $request->is_enable,
            ];

            if(isset($request['image']))
            {
                $course['media_id'] = MediaLib::generateImageBase64($request['image']);
            }


            $data = Course::create($course);
            Course::lesson($data->id, $request['lessons']);

            DB::commit();

            return $this->success($data);
        }catch (Exception $exception){
            DB::rollBack();
            return $this->fail($exception->getMessage());
        }
    }

    public function show($id){
        $categories = Category::where("is_enable",1)->get();
        $course =  Course::with("category", "lessons", "media")->find($id);
        return view("admin.course.edit", compact("course", "categories"));
    }

    public function update($id, Request $request){
        $course = Course::find($id);
        if(!$course)
        {
            return $this->fail("Course does not found");
        }
        DB::beginTransaction();

        try {
            $data = [
                "title" => $request->title,
                "description" => $request->description,
                "author_id" => auth()->user()->id,
                "category_id" => $request->category_id,
                "is_enable" => $request->is_enable,
            ];

            if(isset($request['image']))
            {
                $data['media_id'] = MediaLib::generateImageBase64($request['image']);
            }

            $course = $course->update($data);
            Course::lesson($id, $request['lessons']);

            DB::commit();

            return $this->success($data);
        }catch (Exception $exception){
            DB::rollBack();
            return $this->fail($exception->getMessage());
        }
    }

    public function updateStatus($id, Request $request){
        try {
            Course::find($id)->update([
                "is_enable" => $request->is_enable
            ]);
            return back();
        }catch (Exception $exception){
            return $this->fail($exception->getMessage());
        }
    }

    public function destroy($id){
        try {
            Course::find($id)->delete();
            return back();
        }catch (Exception $exception){
            return $this->fail($exception->getMessage());
        }
    }

    public function getAllCourse()
    {
        $courses = Course::with("category", "lessons", "media")->latest()->limit(10)->get();
        $courses = $courses->map(function($course) {
            $h = round($course->lessons->pluck("duration")->sum() / 60);
            $course['durations'] = $h." hour";
            $course['number_lessons'] = $course->lessons->count();
            return $course;
        });
        return $this->success(CourseResource::collection($courses));
    }

    public function searchCourse(Request $request)
    {
        try {
            $courses = Course::with("lessons", "media", "category")->latest();
            if(isset($request->search))
            {
                $courses = $courses->where("title", "LIKE", "%".$request->search."%");
            }
            $courses = $courses->get();
            $courses = $courses->map(function($course) {
                $h = round($course->lessons->pluck("duration")->sum() / 60);
                $course['durations'] = $h." hour";
                $course['number_lessons'] = $course->lessons->count();
                return $course;
            });
            return $this->success(CourseResource::collection($courses));
        }catch (Exception $exception){
            return $this->fail($exception->getMessage());
        }
    }

    public function allCourse()
    {
        try {
            $courses = Course::latest()->get();

            return $this->success(RecentCourseResource::collection($courses));
        }catch (Exception $exception){
            return $this->fail($exception->getMessage());
        }
    }

    public function getCourse($id)
    {
        $course = Course::with("category", "lessons", "media")->find($id);
        $h = round($course->lessons->pluck("duration")->sum() / 60);
        $course['durations'] = $h." hour";
        $course['number_lessons'] = $course->lessons->count();

        return $this->success([
            'id' => $course->id,
            'header_image' => $course->media->file_url ?? null,
            'title' => $course->title,
            'description' => $course->description,
            'author' => [
                "id" => $course->author->id,
                "first_name" => $course->author->first_name,
                "last_name" => $course->author->last_name,
            ],
            'duration' => $course->durations,
            'number_of_lessons' => $course->number_lessons,
            'lessons' => LessonResource::collection($course->lessons),
        ]);
    }
}

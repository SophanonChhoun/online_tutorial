<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Models\admin\Category;
use App\Models\admin\CourseLesson;
use App\Models\admin\CustomerCourse;
use Illuminate\Http\Request;
use DB;
use Exception;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $data = Category::latest();
        if(isset($request->search)){
            $data = $data->where("name","LIKE","%".$request->search."%");
        }
        if(isset($request->is_enable)){
            $data = $data->where("is_enable", $request->is_enable);
        }
        $data = $data->simplePaginate(10);

        return view("admin.category.list",compact("data"));
    }

    public function create(){
        return view("admin.category.create");
    }

    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            $data = Category::create($request->all());
            DB::commit();

            return $this->success($data);
        }catch (Exception $exception){
            DB::rollBack();
            return $this->fail($exception->getMessage());
        }
    }

    public function show($id)
    {
        $category = Category::find($id);

        return view("admin.category.edit", compact("category"));
    }

    public function update($id, Request $request)
    {
        $category = Category::find($id);
        if(!$category){
            return $this->fail("Cannot find category");
        }

        try {
            $category = $category->update($request->all());
            return $this->success("Update success");
        }catch (Exception $exception){
            DB::rollBack();
            return $this->fail($exception->getMessage());
        }
    }

    public function updateStatus($id, Request $request)
    {
        try {
            Category::find($id)->update([
                "is_enable" => $request->is_enable
            ]);
            return back();
        }catch (Exception $exception){
            return $this->fail($exception->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            Category::findOrFail($id)->delete();

            return back();
        }catch (Exception $e){
            return $this->fail($e->getMessage());
        }
    }

    public function listAllCourse()
    {
        $categories = Category::with("courses")->latest()->get();
        $categories = $categories->filter(function($category){
            $category->course = $category->courses->filter(function($course){
                $h = $course->lessons->pluck("duration")->sum() / 60;
                if($h >= 1){
                    $h = round($course->lessons->pluck("duration")->sum() / 60);
                    $course['durations'] = $h." hour";
                }else{
                    $h = $course->lessons->pluck("duration")->sum();
                    $course['durations'] = $h." min";
                }
                $course['number_lessons'] = $course->lessons->count();
                $exit = CourseLesson::where("course_id", $course->id)->first();
                if($exit){
                    return $course;
                }
            });
            if(count($category->course) > 0){
                return $category;
            }
        });

        return $this->success(CategoryResource::collection($categories));
    }

    public function listUserCourse()
    {
        $categories = Category::with("courses", "courses.lessons")->latest()->get();
        $user_courses = CustomerCourse::where("customer_id", auth()->user()->id)->get();
        $user_courses_id = array_pluck($user_courses, "course_id");
        $categories = $categories->filter(function ($category) use ($user_courses_id){
           if(count($category->courses) > 0){
               $category->course = $category->courses->filter(function ($course) use($user_courses_id){
                  if(in_array($course->id, $user_courses_id)){
                      $h = $course->lessons->pluck("duration")->sum() / 60;
                      if($h >= 1){
                          $h = round($course->lessons->pluck("duration")->sum() / 60);
                          $course['durations'] = $h." hour";
                      }else{
                          $h = $course->lessons->pluck("duration")->sum();
                          $course['durations'] = $h." min";
                      }
                      $course['number_lessons'] = $course->lessons->count();
                      return $course;
                  }
               })->values();
               if(count($category->course) > 0){
                   return $category;
               }
           }

        })->values();

        return $this->success(CategoryResource::collection($categories));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\admin\Category;
use Illuminate\Http\Request;
use DB;
use Exception;

class CategoryController extends Controller
{
    public function index(Request $request) {
        $data = Category::latest();
        if(isset($request->search)){
            $data = $data->where("name","LIKE","%".$request->search."%");
        }
        $data = $data->paginate(10);

        return view("admin.category.list",compact("data"));
    }

    public function create(){
        return view("admin.category.create");
    }

    public function store(Request $request){
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

    public function show($id){
        $category = Category::find($id);

        return view("admin.category.edit", compact("category"));
    }

    public function update($id, Request $request){
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

    public function updateStatus($id, Request $request){
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
}

<?php

namespace App\Http\Controllers;

use App\Core\MediaLib;
use App\Models\admin\User;
use Illuminate\Http\Request;
use DB;
use Exception;
use App\Models\admin\Role;
class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::with("media");

        if(isset($request->search))
        {
            $users = $users->where("name","LIKE","%".$request->search."%");
        }
        if(isset($request->is_enable))
        {
            $users = $users->where("is_enable",$request->is_enable);
        }

        $data = $users->orderByDesc("id")->paginate(10);

        return view("admin.user.list",compact("data"));
    }

    public function create()
    {
        $roles = Role::all();
        return view("admin.user.create",compact("roles"));
    }

    public function store(Request $request)
    {
        $user = User::where("email",$request->email)->first();
        if ($user)
        {
            return $this->fail("Please input another email",403);
        }

        DB::beginTransaction();
        try {
            $user = [
                "name" => $request->name,
                "first_name" => $request->first_name,
                "last_name" => $request->last_name,
                "email" => $request->email,
                "password" => $request->password,
                "gender" => $request->gender,
                "phone_number" => $request->phone_number,
                "address" => $request->address,
                "is_enable" => $request->is_enable,
                "role_id" => $request->role_id
            ];
            if(isset($request['image']))
            {
                $user['media_id'] = MediaLib::generateImageBase64($request['image']);
            }
            $data = User::create($user);

            DB::commit();
            return $this->success($data);
        }catch (Exception $exception){
            DB::rollBack();
            return $this->fail($exception,500);
        }
    }

    public function show($id)
    {
        try {
            $user = User::with('role',"media")->find($id);
            $roles = Role::all();

            return view("admin.user.edit",compact("user","roles"));
        }catch (Exception $exception){
            return $this->fail($exception->getMessage());
        }
    }

    public function update($id, Request $request)
    {
        DB::beginTransaction();
        try {
            $user = User::find($id);
            if(!$user)
            {
                return $this->fail("Cannot find this user");
            }
            $data = [
                "name" => $request->name,
                "first_name" => $request->first_name,
                "last_name" => $request->last_name,
                "email" => $request->email,
                "gender" => $request->gender,
                "phone_number" => $request->phone_number,
                "address" => $request->address,
                "is_enable" => $request->is_enable,
                "role_id" => $request->role_id
            ];
            if(isset($request['image']))
            {
                $data['media_id'] = MediaLib::generateImageBase64($request['image']);
            }
            $user = $user->update($data);

            if(!$user)
            {
                return $this->fail("Fail cannot update");
            }

            DB::commit();
            return $this->success($user);
        }catch (Exception $exception){
            DB::rollBack();
            return $this->fail($exception);
        }
    }

    public function updateStatus($id,Request $request)
    {
        try {
            User::find($id)->update([
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
            User::findOrFail($id)->delete();

            return back();
        }catch (Exception $e){
            return $this->fail($e->getMessage());
        }
    }
}

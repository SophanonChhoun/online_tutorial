<?php

namespace App\Http\Controllers;

use App\Core\MediaLib;
use App\Models\admin\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use DB;

class ProfileController extends Controller
{
    public function show()
    {
        $data = User::with("media")->find(auth()->user()->id);
        return view('admin.profile.information',compact('data'));
    }

    public function update(Request $request)
    {
        DB::beginTransaction();
        try {
            $user = User::find(auth()->user()->id);
            if(!$user)
            {
                return $this->fail("Cannot find this user");
            }
            $data = [
                "name" => $request->name,
                "first_name" => $request->first_name,
                "last_name" => $request->last_name,
                "email" => $request->email,
                "phone_number" => $request->phone_number,
            ];
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

    public function changePassword()
    {
        try {
            $data = User::with("media")->find(auth()->user()->id);
            return view("admin.profile.password",compact("data"));
        }catch (Exception $exception){
            return redirect('admin/profile/show');
        }
    }

    public function updatePassword(Request $request)
    {
        DB::beginTransaction();
        $data = User::with("media")->find(auth()->user()->id);
        try {
            $id = auth()->user()->id;
            if (!(Hash::check($request->old_password, Auth::user()->getAuthPassword())))
            {
                return $this->fail("Wrong old password. Please input a correct one.");
            }
            $request['password'] = $request['new_password'];

            $user=User::find($id)->update([
                "password" => $request['new_password']
            ]);
            $user = User::find($id);
            if (auth()->attempt([
                "email" => $user->email,
                "password" => $request['new_password'],
                "is_enable" => true
            ])){
                DB::commit();
                return $this->success("Success");
            }else{
                DB::rollback();
                return $this->fail("Something went wrong");
            }
        }catch (Exception $exception){
            DB::rollback();
            return $this->fail("Something went wrong");
        }
    }

    public function changeAvatar()
    {
        try {
            $data = User::with("media")->find(auth()->user()->id);
            return view("admin.profile.avatar",compact("data"));
        }catch (Exception $exception){
            return redirect('admin/profile/show');
        }
    }

    public function updateAvatar(Request $request)
    {
        DB::beginTransaction();
        try {
            if($request->image)
            {
                $media_id = MediaLib::generateImageBase64($request['image']);
                User::find(auth()->user()->id)->update([
                    "media_id" => $media_id
                ]);
            }
            DB::commit();
            return $this->success("Success");
        }catch (Exception $exception){
            DB::rollback();
            return $this->fail("Something went wrong");
        }
    }
}

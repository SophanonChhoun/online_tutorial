<?php

namespace App\Http\Controllers;

use App\Core\DateLib;
use App\Models\admin\Media;
use App\Models\admin\MediaFile;
use App\Models\admin\UserLoginAccess;
use App\Models\User;
use Illuminate\Http\Request;
use DB;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\AdminAuthRequest;
use Illuminate\Support\Facades\Redirect;
use Laravel\Socialite\Facades\Socialite;

class AdminAuthController extends Controller
{
    public function signin()
    {
        if(Session::get('auth'))
        {
            return \redirect('/admin/dashboard');
        }else{
            return view('layouts.login');

        }
    }

    public function getLoginAccess(Request $request,$credential_id)
    {
        DB::beginTransaction();
        try {
            $token = Password::getRepository()->createNewToken();
            $now = DateLib::getNow();
            $auth = UserLoginAccess::create([
                'user_id' => $credential_id,
                'access_token' => $token,
                'expired_at' => $now->addMinute(config('authentication.token_expiration_minute')),
                'revoked' => false,
            ]);
            $auth['expired_at'] = $now->timestamp;
            DB::commit();
            $user = User::where('id', $credential_id)->first();
            $result = [
                'access_token' => $auth['access_token'],
                'expired_at' => $auth['expired_at'],
                'user' => $user
            ];
            return $result;
        }catch (Exception $exception){
            DB::rollback();
            return $this->fail($exception->getMessage());
        }
    }

    public function login(Request $request)
    {
        DB::beginTransaction();
        try {
            if(auth()->attempt([
                'email' => $request['email'],
                'password' => $request['password'],
                'is_enable' => true,
            ])){
                $credential = auth()->user();
                $auth = self::getLoginAccess(
                    $request,
                    $credential->id
                );
                Session::put('auth', $auth);
                DB::commit();
                return redirect('/admin/dashboard');

            }else{
                return view('layouts.login', [
                    'errorMessageDuration' => 'Wrong login details',
                ]);
                return redirect()->back()->withErrors(['error','Wrong Login Details']);
            }
        }catch (Exception $exception){
            DB::rollback();
            return $this->fail($exception->getMessage());
        }
    }

    public function logout()
    {
        Session::forget("auth");
        return redirect("");
    }

    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }
    public function handleProviderCallback()
    {
        $user = Socialite::driver('google')->stateless()->user();
        $user_exist = User::where("email",$user->email)->where("is_enable",1)->first();
        if($user_exist)
        {
            $credential = Auth()->loginUsingId($user_exist->id);
            $token = Password::getRepository()->createNewToken();
            $now = DateLib::getNow();
            $auth = UserLoginAccess::create([
                'user_id' => $credential->id,
                'access_token' => $token,
                'expired_at' => $now->addMinute(config('authentication.token_expiration_minute')),
                'revoked' => false,
            ]);
            $auth['expired_at'] = $now->timestamp;
            $user = User::where('id', $credential->id)->first();
            $result = [
                'access_token' => $auth['access_token'],
                'expired_at' => $auth['expired_at'],
                'user' => $user
            ];
            Session::put('auth', $result);
            return redirect('/admin/dashboard');
        }else{
            if(User::where("email",$user['email'])->first())
            {
                return view('layouts.login', [
                    'errorMessageDuration' => 'Please wait for another record',
                ]);
            }
            $media = Media::create([
                'media_type'      => 'image'
            ]);
            $media_id= MediaFile::create([
                'media_id' 	=> $media['id'],
                'file_url'	=> $user->avatar_original,
                'file_name'	=> "image",
                'size'		=> 'Original'
            ]);
            $user = [
                "email" => $user->email,
                "name" => $user->name,
                "password" => bcrypt(str_random(8)),
                "media_id" => $media_id->media_id,
                "is_enable" => 0
            ];
            User::create($user);
            return view('layouts.login', [
                'errorMessageDuration' => 'Please wait for another record',
            ]);
        }
    }
}

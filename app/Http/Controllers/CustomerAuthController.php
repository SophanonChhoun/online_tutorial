<?php

namespace App\Http\Controllers;

use App\Core\DateLib;
use App\Http\Requests\CustomerRegisterRequest;
use App\Models\admin\Customer;
use App\Models\admin\User;
use App\Models\customer\CustomerLoginAccess;
use Illuminate\Http\Request;
use DB;
use Exception;
use Illuminate\Support\Facades\Password;
use Carbon\Carbon;

class CustomerAuthController extends Controller
{
    public function getLoginAccess(Request $request,$credential_id)
    {
        DB::beginTransaction();
        try {
            $token = Password::getRepository()->createNewToken();
            $now = DateLib::getNow();
            $auth = CustomerLoginAccess::create([
                'customer_id' => $credential_id,
                'access_token' => $token,
                'expired_at' => $now->addDay(config('authentication.token_expiration_minute')),
                'revoked' => false,
            ]);
            $auth['expired_at'] = $now->timestamp;
            DB::commit();
            $user = Customer::where('id', $credential_id)->first();
            $user["image"] = $user->media->file_url ?? null;
            $result = [
                'access_token' => $auth['access_token'],
                'expired_at' => $auth['expired_at'],
                'customer' => $user
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
            if(auth('customer')->attempt([
                'email' => $request['email'],
                'password' => $request['password'],
                'is_enable' => true,
            ])){
                $credential = auth('customer')->user();
                $auth = self::getLoginAccess(
                    $request,
                    $credential->id
                );
                DB::commit();
                return $this->success($auth);

            }else{
                return $this->fail("Wrong details");
            }
        }catch (Exception $exception){
            DB::rollback();
            return $this->fail($exception->getMessage());
        }
    }

    public function logout(Request $request)
    {
        DB::beginTransaction();
        try {
            $token = $request->header('Auth');
            CustomerLoginAccess::where('access_token', $token)->delete();
            DB::commit();
            return $this->success([
                'message' => 'You have logged out successfully.'
            ]);
        } catch (Exception $e) {
            DB::rollback();
            return $this->fail($e->getMessage(), 500);
        }
    }


    public function register(CustomerRegisterRequest $request)
    {

        DB::beginTransaction();
        try {
            $request->merge([
                'is_enable' => true,
            ]);
            $name_exit = Customer::where("email",$request->email)->first();
            if($name_exit){
                return $this->fail('Email already exist');
            }

            $customer=Customer::create(
                $request->only('first_name','last_name', 'email', 'password','is_enable'),
            );

            $credential = Auth("customer")->loginUsingId($customer->id);
            $auth = self::getLoginAccess(
                $request,
                $credential->id
            );
            DB::commit();
            return $this->success($auth);

        } catch (\Exception $e) {
            report($e);
            DB::rollback();
            return $this->fail($e->getMessage(), $e->getCode());
        }
    }

}

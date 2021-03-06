<?php

namespace App\Http\Controllers;
use App\Core\MediaLib;
use App\Http\Controllers\Input;
use App\Http\Resources\CustomerProfileResource;
use App\Http\Resources\CustomerResource;
use App\Models\admin\Customer;
use App\Models\admin\IdentificationType;
use Cassandra\Custom;
use Illuminate\Http\Request;
use Exception;
use DB;

class CustomerController extends Controller
{
    public function index(Request $request){
        $customer = Customer::with("media");
        if(isset($request->search))
        {
            $customer = $customer->where("email","LIKE","%".$request->search."%");
        }
        if(isset($request->is_enable))
        {
            $customer = $customer->where("is_enable",$request->is_enable);
        }

        $data = $customer->orderBy("id")->simplePaginate(10);

        return view("admin.customer.list",compact("data"));
    }

    public function create(){
        return view("admin.customer.create");
    }

    public function store(Request $request){
        $user = Customer::where("email",$request->email)->first();
        if ($user)
        {
            return $this->fail("Please input another email",403);
        }
        DB::beginTransaction();

        try {
            $customer = [
                "first_name" => $request->first_name,
                "last_name" => $request->last_name,
                "email" => $request->email,
                "password" => $request->password,
                "is_enable" => $request->is_enable,
            ];
            if(isset($request['image']))
            {
                $customer['media_id'] = MediaLib::generateImageBase64($request['image']);
            }
            $data = Customer::create($customer);
            DB::commit();

            return $this->success($data);
        }catch (Exception $exception){
            DB::rollBack();
            return $this->fail($exception->getMessage());
        }
    }

    public function updateStatus($id, Request $request) {
        try {
            Customer::find($id)->update([
                "is_enable" => $request->is_enable
            ]);
            return back();
        }catch (Exception $exception){
            return $this->fail($exception->getMessage());
        }
    }

    public function getProfile(){
        $user = Customer::find(auth()->user()->id);

        return $this->success([
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'email' => $user->email,
        ]);
    }

    public function updateProfile(Request $request){
        try {
            Customer::find(auth()->user()->id)->update($request->all());
            return $this->success("Update Success");
        }catch (Exception $exception){
            return $this->fail($exception->getMessage());
        }
    }

    public function updatePassword(Request $request)
    {
        DB::beginTransaction();
        try {
            $customer = Customer::find(auth()->user()->id);
            if(is_null($customer))
            {
                return $this->fail("Customer not found");
            }

            if(!auth('customer')->attempt([
                'email' => $customer->email,
                'password' => $request['old_password'],
                'is_enable' => true,
            ])){
                return $this->fail("Old password is not correct");
            }
            $customer->update([
                'password' => $request['new_password']
            ]);
            if(auth('customer')->attempt([
                "email" => $customer->email,
                "password" => $request['new_password'],
                "is_enable" => 1
            ])){
                DB::commit();
                return $this->success("Customer password update successfully");
            }
        }catch (Exception $exception){
            DB::rollback();
            return $this->fail($exception->getMessage());
        }
    }

}

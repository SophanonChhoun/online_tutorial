<?php

namespace App\Http\Controllers;
use App\Core\MediaLib;
use App\Http\Controllers\Input;
use App\Http\Resources\CustomerResource;
use App\Models\admin\Customer;
use App\Models\admin\IdentificationType;
use Illuminate\Http\Request;
use Exception;
use DB;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $customer = Customer::with("identification_type","media");
        if(isset($request->search))
        {
            $customer = $customer->where("email","LIKE",$request->search."%");
        }
        if(isset($request->is_enable))
        {
            $customer = $customer->where("is_enable",$request->is_enable);
        }
        $data = $customer->orderByDesc("id")->simplePaginate(10);
        return view("admin.customer.list",compact("data"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $identification_type = IdentificationType::where("is_enable",1)->get();
        return view('admin.customer.create',compact("identification_type"));
    }

    public function showCustomer(Request $request)
    {
        try {
            $customer = Customer::with("identification_type","media")->find($request['auth_id']);
            if(!$customer)
            {
                return $this->fail("This account is not exist");
            }
            return $this->success([
                "first_name" => $customer->first_name,
                "last_name" => $customer->last_name,
                "dob" => $customer->dob,
                "gender" => $customer->gender,
                "identification_id" => $customer->identification_id,
                "street_address" => $customer->street_address,
                "city" => $customer->city,
                "country" => $customer->country,
                "zip" => $customer->zip,
                "phone_number" => $customer->phone_number,
                "email" => $customer->email,
                "identification_type_id" => $customer->identification_type_id,
                "image" => $customer->media->file_url ?? null
            ]);
        }catch (Exception $exception){
            return $this->fail($exception->getMessage());
        }
    }

    public function updateCustomer(Request $request)
    {
        try {
            $customer = Customer::find($request['auth_id']);
            if(!$customer)
            {
                return $this->fail("Customer not found");
            }
            $customer = $customer->update($request->all());

            return $this->success("Customer update success");
        }catch (Exception $exception){
            return $this->fail($exception->getMessage());
        }
    }

    public function store(Request $request)
    {
        $customer = Customer::where("email",$request->email)->first();
        if($customer)
        {
            return $this->fail("Please input another email");
        }

        if(isset($request['image']))
        {
            $request['media_id'] = MediaLib::generateImageBase64($request['image']);
        }
        Customer::create($request->all());

        return $this->success('success');

    }

    public function changeAvatar(Request $request)
    {
        DB::beginTransaction();
        try {
            $customer = Customer::find($request['auth_id']);
            if(!$customer)
            {
                return $this->fail("Customer not found");
            }
            if(isset($request['image']))
            {
                $data['media_id'] = MediaLib::generateImageBase64($request['image']);
            }
            $customer = $customer->update([
                "media_id" => $data['media_id']
            ]);
            DB::commit();

            return $this->success("Profile update successfully");
        }catch (Exception $exception){
            DB::rollback();
            return $this->fail($exception->getMessage());
        }
    }

    public function updatePassword(Request $request)
    {
        DB::beginTransaction();
        try {
            $customer = Customer::find($request['auth_id']);
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\admin\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {

            // return view('admin.customer.edit');
            $data = Customer::with("identification_type","media")->find($id);
            return view('admin.customer.edit',compact('data'));
        }catch (Exception $exception){
            return redirect('/admin/customer/list');
        }
    }

    public function edit($id)
    {
        $customer = Customer::with("identification_type","media v")->find($id);
        return view("admin.customer.edit")->with('customer',$customer);

    }

    public function update(Request $request, $id)
    {

        DB::beginTransaction();
        try {

            $customer = Customer::find($id);
            if(!$customer)
            {
                return $this->fail("Cannot find this customer");
            }
            $data = [
                "first_name" => $request->first_name,
                "last_name" => $request->last_name,
                "email" => $request->email,
                "password" => $request->password,
                "phone_number" => $request->phone_number,
                "dob" => $request->dob,
                "gender" => $request->gender,
                "identification_type_id" => $request->identification_type_id,
                "identification_id" => $request->identification_id,
                "street_address" => $request->street_address,
                "city" => $request->city,
                "country" => $request->country,
                "zip" => $request->zip,
                "is_enable" => $request->is_enable,
            ];
            if(isset($request['image']))
            {
                $data['media_id'] = MediaLib::generateImageBase64($request['image']);
            }
            $customer = $customer->update($data);

            if(!$customer)
            {
                return $this->fail("Fail cannot update");
            }

            DB::commit();
            return $this->success($customer);
        }catch (Exception $exception){
            DB::rollBack();
            return $this->fail($exception);
        }

    }

    public function updateStatus($id,Request $request)
    {
        try {
            Customer::find($id)->update([
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
            $customer = Customer::find($id)->delete();
            return back();
        }catch (Exception $exception){
            return $this->fail($exception->getMessage());
        }
    }
}

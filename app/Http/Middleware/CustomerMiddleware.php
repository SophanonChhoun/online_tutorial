<?php

namespace App\Http\Middleware;

use App\Core\DateLib;
use App\Models\admin\Customer;
use App\Models\customer\CustomerLoginAccess;
use Closure;
use Illuminate\Http\Request;

class CustomerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $token = $request->header('Auth');

        if(!$token){
            return  response()->json(['success' => false, 'message' => 'The authorized is required'], 401);
        }

        $auth = CustomerLoginAccess::where('access_token', $token)
            ->join('customers', 'customers.id', 'customer_login_accesses.customer_id')
            ->where('customers.is_enable', true)
            ->where('customer_login_accesses.revoked', false)
            ->where('customer_login_accesses.expired_at', '>', DateLib::getNow()->toDateTimeString())
            ->get(['customers.id'])->first();

        if($auth){
            $customer = Customer::find($auth->id);
            auth()->login($customer);

            $request['auth_id'] = $customer['id'];
            $request['auth_type'] = Customer::REFERENCE_SLUG;
            $request['access_token'] = $token;

            return $next($request);
        }

        return  response()->json(['success' => false, 'message' => 'The authorized is invalid'], 401);
    }
}

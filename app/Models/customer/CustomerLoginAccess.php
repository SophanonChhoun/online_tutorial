<?php

namespace App\Models\customer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerLoginAccess extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'access_token',
        'customer_id',
        'revoked',
        'expired_at',
        'created_at',
        'updated_at',
    ];
}

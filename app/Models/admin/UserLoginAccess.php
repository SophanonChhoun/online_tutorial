<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserLoginAccess extends Model
{
    use HasFactory;
    protected $table = 'user_login_accesses';
    protected $fillable = [
        'id',
        'access_token',
        'user_id',
        'revoked',
        'expired_at',
        'created_at',
        'updated_at',
    ];

}

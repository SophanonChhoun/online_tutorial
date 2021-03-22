<?php

namespace App\Models\admin;

use App\Http\Middleware\Authenticate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Customer extends Authenticatable
{
    use HasFactory;
    const REFERENCE_SLUG = 'customer';

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'phone_number',
        'dob',
        'gender',
        'identification_id',
        'identification_type_id',
        'street_address',
        'city',
        'country',
        'zip',
        'is_enable',
        'media_id'
    ];

    protected $hidden = [
        'password',  'remember_token', 'card_number', 'card_name', 'card_cvc'
    ];


    /**
     * Add a mutator to ensure hashed passwords
     */
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);

    }

    public function media()
    {
        return $this->belongsTo(MediaFile::class,"media_id");
    }
}

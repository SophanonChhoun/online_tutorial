<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerCourse extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_id',
        'course_id'
    ];
}

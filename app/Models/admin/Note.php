<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $fillable = [
        "lesson_id",
        "user_id",
        "content"
    ];
    protected $hidden = [
        'created_at', 'updated_at'
    ];
    protected $table = 'notes';

    public function lesson() {
        return $this->belongsTo(CourseLesson::class);
    }

    public function user() {
        return $this->belongsTo(Customer::class);
    }
}

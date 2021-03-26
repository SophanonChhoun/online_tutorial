<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseLesson extends Model
{
    use HasFactory;
    protected $fillable = [
        "course_id",
        "title",
        "duration",
        "video_url",
        "text_content",
        "number",
        "video_content",
    ];

    public function course(){
        return $this->belongsTo(Course::class, "course_id", "id");
    }
}

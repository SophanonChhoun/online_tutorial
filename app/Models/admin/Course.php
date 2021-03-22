<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        "media_id",
        "title",
        "description",
        "author",
        "category_id",
        "is_enable"
    ];
    public function media()
    {
        return $this->hasOne(MediaFile::class,"media_id","media_id");
    }
    public function category()
    {
        return $this->hasOne(Category::class,"id","category_id");
    }
    public function lessons()
    {
        return $this->hasMany(CourseLesson::class,"course_id","id");

    }

    public static function lesson($id, $lessons){
        CourseLesson::where("course_id", $id)->delete();
        foreach($lessons as $lesson){
            CourseLesson::create([
               "course_id" => $id,
               "title" => $lesson['title'],
               "duration" => $lesson['duration'],
               "video_url" => $lesson['video_url'],
               "text_content" => $lesson['text_content']
            ]);
        }
    }
}

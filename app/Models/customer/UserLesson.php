<?php

namespace App\Models\customer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Exception;

class UserLesson extends Model
{
    use HasFactory;
    protected $fillable = [
        "user_id",
        "course_id",
        "lesson_id",
        "done"
    ];


    public static function registerCourse($user_id, $course_id, $lessons) {
        try {
            foreach ($lessons as $lesson) {
                UserLesson::create([
                    "course_id" => $course_id,
                    "user_id" => $user_id,
                    "lesson_id" => $lesson->id
                ]);
            }
            return true;
        }catch (Exception $exception){
            return false;
        }
    }
}

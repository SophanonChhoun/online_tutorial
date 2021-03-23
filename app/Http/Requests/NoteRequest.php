<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\DefaultFormRequest;

class NoteRequest extends DefaultFormRequest
{

    public function rules()
    {
        return [
            'lesson_id' => 'required|exists:course_lessons,id',
            'content' => 'required'
        ];
    }
}

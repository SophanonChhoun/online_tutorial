<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CourseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "header_img" => $this->media->file_url,
            "title" => $this->title,
            "description" => $this->description,
            "author" => [
                "id" => $this->author->id,
                "first_name" => $this->author->first_name,
                "last_name" => $this->author->last_name,
            ],
            "category" => $this->category->name ?? null,
            "duration" => $this->durations,
            "number_of_lessons" => $this->number_lessons
        ];
    }
}
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
            "header_img" => $this->media->file_url ?? null,
            "title" => $this->title,
            "description" => $this->description,
            "author" => [
                "id" => $this->author->id ?? null,
                "first_name" => $this->author->first_name ?? null,
                "last_name" => $this->author->last_name ?? null,
            ],
            "category" => $this->category->name ?? null,
            "duration" => $this->durations ?? null,
            "number_of_lessons" => $this->number_lessons ?? null
        ];
    }
}

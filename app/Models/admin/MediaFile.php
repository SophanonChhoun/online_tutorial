<?php

namespace App\Models\admin;

use App\Models\admin\Media;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MediaFile extends Model
{
    /**
     * @var string
     */
    protected $table = 'media_files';

    /**
     * @var array
     */
    protected $fillable = [
        'id', 'media_file', 'file_url', 'file_name', 'size', 'media_id'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    function getFileUrlAttribute($value) {
        return url('/') . $value;
    }


    public function media()
    {
        return $this->belongsTo(
            Media::class
        );
    }
}

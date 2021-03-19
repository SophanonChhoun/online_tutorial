<?php

namespace App\Models\admin;

use App\Models\MediaFile;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    /*
        Table Name
    */
    protected $table = 'medias';

    protected $fillable = [
        'media_type', 'created_at', 'updated_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at'
    ];

    /*
    |--------------------------------------------------------------------------
    | Relationship
    |--------------------------------------------------------------------------
    */

    public function file()
    {
        return $this->hasMany(
            'App\Models\MediaFile'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Database Access Function
    |--------------------------------------------------------------------------
    */
    public static function getMediaById($id)
    {
        return \App\Models\Media::where('media_id', $id)->with('file')->get()->first();
    }

    /**
     * get media id
     *
     * @param $id
     * @return mixed
     */
    public static function ID($id = null)
    {
        if ($id != null) {
            return Media::find($id)->id;
        }

        return null;

    }

    public static function getImageUrl($mediaId = null){
        if(is_null($mediaId)){
            return null;
        }

        return MediaFile::find($mediaId)->file_url??null;
    }
}

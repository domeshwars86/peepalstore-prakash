<?php

namespace App;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
// use Spatie\MediaLibrary\HasMedia;
// use Spatie\MediaLibrary\InteractsWithMedia;
// use Spatie\MediaLibrary\MediaCollections\Models\Media;


class Mst_Category extends Model
{
    use  SoftDeletes;
    // InteractsWithMedia;

    protected $table = "mst_categories";
    // protected $appends = ['image'];

    protected $fillable =[
        'cat_name',
        'level',
        'rel_id'
    ];

    // public function registerMediaConversions(Media $media = null): void
    // {
    //     $this->addMediaConversion('thumb')->keepOriginalImageFormat();
    // }

    // public function getImageAttribute()
    // {
    //     $file = $this->getMedia('image')->last();

    //     if ($file) {
    //         $file->url = $file->getUrl();
    //         $file->thumbnail = $file->getUrl('thumb');
    //     }
    //     return $file;
    // }
}

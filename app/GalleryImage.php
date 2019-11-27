<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GalleryImage extends Model
{
    //Table Name
    protected $table = 'gallery_images';
    //Primary Key
    public $primaryKey ='id';
    //Timestamps
    public $timestamps = false;
    
    public function user()
    {
        return $this->belongsTo('App\Admin');
    }
}

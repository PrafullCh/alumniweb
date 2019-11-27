<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    //Table Name
    protected $table = 'gallery';
    //Primary Key
    public $primaryKey ='album_id';
    //Timestamps
    public $timestamps = false;
    
    public function user()
    {
        return $this->belongsTo('App\Admin');
    }
}

<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class studentdirectory extends Model
{
    protected $table = 'studentdirectory';
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'rollno','firstname','lastname','dept','yearofgrad'
    ];

}

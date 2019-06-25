<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //

    protected $fillable = [ 'path' ];

    protected $uploads = "/larapro/public/images/";

    public function getPathAttribute($photo){
        return $this->uploads . $photo;
    }
}

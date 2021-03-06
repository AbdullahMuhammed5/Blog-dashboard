<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id', 'is_Active', 'img_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function photo(){
        return $this->belongsTo('App\Photo', 'id');
    }

    public function role(){
        return $this->belongsTo('App\Role');
    }

    public function setPasswordAttribute($password){
        if(!empty($password)){
            $this->attributes['password'] = bcrypt($password);
        }
    }
    
    public function isAdmin(){
        return $this->role->name === "Adminstrator" ? true : false; 
    }
    
    // public function post(){
    //     return $this->hasOne('App\Post');   
    // }
    
    public function posts(){
        return $this->hasMany('App\Post');
    }
    
    // public function roles(){
    //     return $this->belongsToMany('App\Role');
    // }
    
    // public function address(){
    //     return $this->hasOne('App\Address');
    // }
}

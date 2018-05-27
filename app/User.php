<?php

namespace App;

use Actuallymab\LaravelComment\CanComment;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use CanComment;

    protected $table = 'users';
    public $timestamps = true;
    protected $fillable = array('email', 'first_name', 'last_name', 'role', 'picture', 'remember_token');

    public function getPictureAttribute($value)
    {
        if(is_null($value)){
            return 'images/user.svg';
        }else{
            return $value;
        }
    }

    public function OwnedProjects()
    {
        return $this->hasMany('App\Project', 'user_id');
    }

    /**
     * Get all of favorite posts for the user.
     */
    public function Favorites()
    {
        return $this->belongsToMany('App\Project', 'favorites', 'user_id', 'project_id')->withTimeStamps();
    }

    public function reviews(){
        return $this->hasMany('App\Review', 'reviewer_id');
    }



}
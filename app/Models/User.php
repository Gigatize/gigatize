<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model 
{

    protected $table = 'users';
    public $timestamps = true;
    protected $fillable = array('sso', 'name', 'email', 'role', 'picture', 'remember_token');

    public function OwnedProjects()
    {
        return $this->hasMany('Project', 'user_id');
    }

}
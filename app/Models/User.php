<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{

    protected $table = 'users';
    public $timestamps = true;
    protected $fillable = array('email', 'first_name', 'last_name', 'role', 'picture', 'remember_token');

    public function OwnedProjects()
    {
        return $this->hasMany('Project', 'user_id');
    }

}
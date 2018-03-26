<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model 
{

    protected $table = 'skills';
    public $timestamps = true;
    protected $fillable = array('name');

    public function Projects()
    {
        return $this->belongsToMany('Project');
    }

}
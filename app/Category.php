<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model 
{

    protected $table = 'categories';
    public $timestamps = false;
    protected $fillable = array('name', 'icon_path');

    public function Projects()
    {
        return $this->hasMany('Project', 'category_id');
    }

}
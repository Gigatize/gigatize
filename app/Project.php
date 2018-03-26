<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model 
{

    protected $table = 'projects';
    public $timestamps = true;
    protected $fillable = array('name', 'company_id', 'user_id', 'category_id', 'potential_impact', 'additional_information', 'resources_requested', 'estimated_hours', 'on_site', 'renew', 'flexible_start', 'location', 'start_date', 'deadline', 'box_link', 'complete');

    public function Owner()
    {
        return $this->belongsTo('User', 'user_id');
    }

    public function Category()
    {
        return $this->belongsTo('Category', 'category_id');
    }

    public function ProjectUsers()
    {
        return $this->hasMany('User');
    }

    public function AcceptanceCriteria()
    {
        return $this->hasMany('App\AcceptanceCriteria', 'project_id');
    }

    public function Skills()
    {
        return $this->hasMany('App\Models\Skill', 'project_id');
    }

}
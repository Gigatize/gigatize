<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Project extends Model 
{

    protected $table = 'projects';
    public $timestamps = true;
    protected $fillable = array('title', 'user_id', 'category_id', 'description', 'start_date', 'deadline', 'location_id', 'timezone', 'impact', 'user_count', 'estimated_hours', 'resources_link', 'additional_info', 'flexible_start', 'on_site', 'renew','complete');
    protected $dates = [
        'created_at',
        'updated_at',
        'start_date',
        'deadline'
    ];

    static $rules = [
        'project_id' => 'sometimes|required',
        'title' => 'required',
        'category_id' => 'required',
        'description' => 'required',
        'acceptance_criteria' => 'required',
        'start_date' => 'required',
        'deadline' => 'required',
        'location_id' => 'required',
        'skills' => 'required',
        'user_count' => 'required|numeric|max:3',
        'estimated_hours' => 'required|numeric|max:20',
        'resources_link' => 'nullable|url',
    ];

    public function Owner()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function Category()
    {
        return $this->belongsTo('App\Category');
    }

    public function Location()
    {
        return $this->belongsTo('App\Location');
    }

    public function Users()
    {
        return $this->hasMany('App\User');
    }

    public function AcceptanceCriteria()
    {
        return $this->hasMany('App\AcceptanceCriteria');
    }

    public function Skills()
    {
        return $this->belongsToMany('App\Skill');
    }

    public function Favorites()
    {
        return $this->belongsToMany('App\User', 'favorites', 'project_id', 'user_id')->withTimeStamps();
    }


    /*
    |---------------------------------------------------------------|
    |Favorite Methods
    |---------------------------------------------------------------|
    */
    public function favorited()
    {
        return (bool) Favorite::where('user_id', Auth::id())
            ->where('project_id', $this->id)
            ->first();
    }

    public function favoriteCount(){
        return $this->Favorites()->count();
    }

}
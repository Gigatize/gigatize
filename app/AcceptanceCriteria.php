<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AcceptanceCriteria extends Model 
{

    protected $table = 'acceptance_criteria';
    public $timestamps = true;
    protected $fillable = array('project_id', 'criteria');

    public function Projects()
    {
        return $this->belongsTo('App\Project');
    }

}
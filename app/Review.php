<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    public function User()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function Reviewer()
    {
        return $this->belongsTo('App\User', 'reviewer_id');
    }

    public function Project()
    {
        return $this->belongsTo('App\Project', 'project_id');
    }
}

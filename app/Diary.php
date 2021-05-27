<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diary extends Model
{
    protected $fillable = [
		'today',
		'notes',
		'hours',
        'project_id',
		'user_id',
	];

	public function assignment() 
	{	
		return $this->belongsTo('App\Assignment');
	}

    public function project() 
	{	
		return $this->belongsTo('App\Project');
	}

    public function user() 
	{	
		return $this->belongsTo('App\User');
	}
}

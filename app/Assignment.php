<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Assignment extends Model
{
    protected $fillable = [
		'begins',
		'project_id',
		'user_id',
		'description',
	];

	public function project() 
	{	
		return $this->belongsTo('App\Project');
	}

	public function user() 
	{	
		return $this->belongsTo('App\User');
	}
}

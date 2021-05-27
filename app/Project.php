<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
	protected $fillable = [
		'name',
		'description',
		'note',
		'begins',
		'p_end',
		'd_end',
		'customer_id',
		'cost',
	];
    

    public function customer() 
	{	
		return $this->belongsTo('App\Customer');
	}

	public function user() 
	{	
		return $this->belongToMany('App\User');
	}

	public function assignment() 
	{	
		return $this->hasMany('App\Assignment');
	}

	public function diary() 
	{	
		return $this->hasMany('App\Diary');
	}
}

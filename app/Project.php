<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
	protected $fillable = [
		'name',
		'description',
		'note',
		'begin',
		'p_end',
		'd_end',
		'customer_id',
		'user_id',
		'cost',
	];
    

    public function customer() 
	{	
		return $this->belongsTo('App\Customer');
	}

	public function user() 
	{	
		return $this->hasMany('App\User');
	}
}

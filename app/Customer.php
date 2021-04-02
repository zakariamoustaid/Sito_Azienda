<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
  protected $fillable = [
		'ragione_sociale',
		'name_ref',
		'surname_ref',
		'email_ref',
	];
    public function projects()
    {
        return $this->hasMany('App\Project');
    }
}

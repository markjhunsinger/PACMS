<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AbilityType extends Model
{
	use SoftDeletes;
	
	protected $dates = ['deleted_at'];
	
	public function skill()
	{
		return $this->belongsTo('App\Skill');
	}
}

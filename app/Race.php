<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Race extends Model
{
	use SoftDeletes;
	
	protected $dates = ['deleted_at'];
	
	protected $fillable = ['race_name'];
	
	public function characters()
	{
		return $this->belongsTo('App\Character');
	}
}

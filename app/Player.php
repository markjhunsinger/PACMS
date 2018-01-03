<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Player extends Model
{
	use SoftDeletes;
	
	protected $dates = ['deleted_at'];
	
	protected $fillable = ['first_name', 'last_name', 'email', 'address1', 'address2', 'city', 'state', 'zip', 'home_phone', 'cell_phone', 'emergency_contact_name', 'emergency_contact_phone'];
	
	public function characters()
	{
		return $this->hasMany('App\Character');
	}
}

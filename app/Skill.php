<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Skill extends Model
{
	use SoftDeletes;
	
	protected $dates = ['deleted_at'];
	
	protected $fillable = ['skill_name', 'skill_description', 'build_cost', 'ability_type_id', 'ap_cost', 'is_base_skill', 'show_on_site'];
	
	public function ability_type()
	{
		return $this->hasOne('App\AbilityType');
	}
}

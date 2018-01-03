<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Character extends Model
{
	use SoftDeletes;
	
	protected $dates = ['deleted_at'];
	
	protected $fillable = ['player_id', 'character_name', 'race_id', 'build_unspent', 'body', 'deaths', 'pre', 'end', 'dex', 'ration', 'last_played', 'rp_points'];
	
	public function player()
	{
		return $this->belongsTo('App\Player');
	}
	
	public function race()
	{
		return $this->hasOne('App\Race', 'id', 'race_id');
	}
}

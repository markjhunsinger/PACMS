<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CharactersSkills extends Model
{
	use SoftDeletes;
	
	protected $table = 'characters_skills';
	protected $dates = ['deleted_at'];
	
	protected $fillable = ['character_id', 'skill_id', 'date_learned'];
	
	public static function getSkillsForCharacter($characterID)
	{
		$skills = DB::table('characters_skills')
			->select('character_id', 'skill_id', DB::raw('count(skill_id) as total'))
			->where('character_id', $characterID)
			->where('deleted_at', NULL)
			->groupBy('character_id', 'skill_id')
			->get();
		
		return $skills;
	}
	
	public static function saveSkillsForCharacter($characterID, $skills, $dateLearned)
	{
		if (isset($skills) and !empty($skills))
		{
			foreach ($skills as $skillID => $skillData)
			{
				if (isset($skillData['quantity']) and $skillData['quantity'] != null and $skillData['quantity'] > 0)
				{
					for ($i = 0; $i < $skillData['quantity']; $i++)
					{
						DB::table('characters_skills')->insertGetId(
							[
								'character_id' => $characterID,
								'skill_id' => $skillID,
								'date_learned' => $dateLearned,
								'created_at' => date("Y-m-d H:i:s"),
								'updated_at' => date("Y-m-d H:i:s"),
							]
						);
					}
				}
			}
		}
	}

}

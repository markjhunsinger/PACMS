<?php

namespace App\Http\Controllers;

use App\AbilityType;
use App\Character;
use App\CharactersSkills;
use App\Player;
use App\Race;
use App\Skill;
use App\Sphere;
use App\Http\Requests\StoreCharacter;
use App\Http\Requests\UpdateCharacter;
use Illuminate\Http\Request;
use Input;
use Redirect;
use mikehaertl\pdftk\Pdf;

class CharacterController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
	
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($playerID)
    {
        $player = Player::findOrFail($playerID);
        $races = Race::orderBy('race_name', 'asc')->get();
        $spheres = Sphere::orderBy('sphere_name', 'asc')->get();
        $apRatioArray = [
        	'1-1' => '1 AP for 1 Build', 
        	'2-1' => '2 AP for 1 Build',
        	'3-2' => '3 AP for 2 Build'
        ];
        
        $data = [
        	'player' => $player,
        	'races' => $races,
        	'spheres' => $spheres,
        	'apRatioArray' => $apRatioArray
        ];
        
        return view('createCharacter', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCharacter $request, Character $character)
    {
    	$character->fill(Input::all());
    	
    	// store empty array for character spheres
    	$characterSpheres = [];
    	for ($i = 0; $i < 3; $i++)
    	{
    		$characterSpheres[$i] = [
    				'sphere_id' => $request->spheres[$i],
    				'date' => $request->sphere_dates[$i]
    		];
    	}
    	$character->spheres = serialize($characterSpheres);
    	
    	$character->faith = 0; // TODO: faith is no longer an ability type, needs to be removed from table
    	
    	$abilityPointRatios = [
    		'dex' => $request->dex_ratio,
    		'end' => $request->end_ratio,
    		'pre' => $request->pre_ratio
    	];
    	$character->ability_point_ratios = serialize($abilityPointRatios);

    	$character->save();
    	
    	return Redirect::to('characters/' . $character->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    	$character = Character::findOrFail($id);
    	$characterSpheresArray = unserialize($character->spheres);
    	$characterKnownSkills = CharactersSkills::getSkillsForCharacter($character->id);
    	
    	// calculate build spent
    	$buildSpent = 0;
    	
    	// loop through skills and get skill names
    	$characterSkills = [];
    	if (isset($characterKnownSkills) and !empty($characterKnownSkills)) {
    		foreach ($characterKnownSkills as $characterKnownSkill)
    		{
    			$skillInfo = Skill::findOrFail($characterKnownSkill->skill_id);
    			
    			// get ability type if not 0
    			if ($skillInfo->ability_type_id != 0)
    			{
    				$abilityType = AbilityType::findOrFail($skillInfo->ability_type_id);
    			}
    			
    			$skillBuildCost = $this->getSkillBuildCost($skillInfo, $characterSpheresArray);
    			$skillBuildCost *= $characterKnownSkill->total;
    			
    			// add skill to array for displaying on character info page
    			$characterSkills[] = [
    				'skillID' => $skillInfo->id,
    				'total' => $characterKnownSkill->total,
    				'skill_name' => $skillInfo->skill_name,
    				'build_cost' => $skillBuildCost,
    				'ability_type_name' => (isset($abilityType) and !empty($abilityType)) ? $abilityType->ability_type_short : '',
    				'ability_type_cost' => (isset($abilityType) and !empty($abilityType)) ? $skillInfo->ap_cost : ''
    			];
    			
    			$buildSpent += $skillBuildCost;
    		}
    	}
    	
    	// sort character skills by name if we have any
    	$characterSkills = $this->sortCharacterSkillsByName($characterSkills);
    	
    	// format spheres for character info page
    	$characterSpheres = $this->formatCharacterSpheresForPlayerInfo($characterSpheresArray);
    	
    	$apRatios = unserialize($character->ability_point_ratios);
    	
    	// calculate build costs for ability points
    	$totalAbilityPointBuild = 0;
    	
    	if (isset($apRatios) and !empty($apRatios)) {
    		foreach ($apRatios as $apType => $apRatio)
    		{
    			$abilityPointBuild = $this->getAbilityPointBuild($character, $apType, $apRatio);
    			$totalAbilityPointBuild += $abilityPointBuild;
    		}
    	}
    	
    	$buildSpent += $totalAbilityPointBuild;
    	
    	$data = [
    		'character' => $character,
    		'characterSpheres' => $characterSpheres,
    		'abilityPointRatios' => $apRatios,
    		'skills' => $characterSkills,
    		'buildSpent' => $buildSpent
    	];
    	
    	return view('characterInfo', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	$character = Character::findOrFail($id);
    	$races = Race::orderBy('race_name', 'asc')->get();
    	$spheres = Sphere::orderBy('sphere_name', 'asc')->get();
    	$characterSpheres = unserialize($character->spheres);
    	$abilityPointRatios = unserialize($character->ability_point_ratios);
    	
    	$apRatioArray = [
    			'1-1' => '1 AP for 1 Build',
    			'2-1' => '2 AP for 1 Build',
    			'3-2' => '3 AP for 2 Build'
    	];
    	
    	$data = [
    		'character' => $character,
    		'races' => $races,
    		'spheres' => $spheres,
    		'characterSpheres' => $characterSpheres,
    		'apRatioArray' => $apRatioArray,
    		'abilityPointRatios' => $abilityPointRatios
    	];
    	
    	return view('editCharacter', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCharacter $request, $id)
    {
    	$character = Character::findOrFail($id);
    	$character->fill(Input::all());
    	
    	// TODO: format data for spheres and dates
    	$characterSpheres = [];
    	for ($i = 0; $i < 3; $i++)
    	{
    		$characterSpheres[$i] = [
    			'sphere_id' => $request->spheres[$i],
    			'date' => $request->sphere_dates[$i]
    		];
    	}
    	$character->spheres = serialize($characterSpheres);
    	$character->faith = 0; // TODO: faith is no longer an ability point, need to remove from database
    	
    	// ability point ratios
    	$abilityPointRatios = [
    			'dex' => $request->dex_ratio,
    			'end' => $request->end_ratio,
    			'pre' => $request->pre_ratio
    	];
    	$character->ability_point_ratios = serialize($abilityPointRatios);
    	
    	$character->save();
    	
    	return Redirect::to('characters/' . $character->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    public function addSkill($characterID)
    {
    	$character = Character::findOrFail($characterID);
    	$skills = Skill::orderBy('skill_name', 'asc')->get();
    	$spheres = Sphere::orderBy('sphere_name', 'asc')->get();
    	
    	$sphereSkillDataArray = [];
    	if (isset($spheres) and !empty($spheres))
    	{
    		foreach ($spheres as $sphere)
    		{
    			// set sphere data
    			$sphereSkillDataArray[$sphere->id]['data'] = $sphere;
    			
    			// loop through all skills if we have any
    			$sphereSkillDataArray[$sphere->id]['skills'] = [];
    			if (isset($skills) and !empty($skills))
    			{
    				foreach ($skills as $skill)
    				{
    					$skillSpheres = unserialize($skill->spheres);
    					if (!empty($skillSpheres))
    					{
    						if (in_array($sphere->id, $skillSpheres))
    						{
    							$sphereSkillDataArray[$sphere->id]['skills'][] = $skill;
    						}
    					}
    				}
    			}
    		}
    	}
    	
    	$data = [
    		'character' => $character,
    		'skills' => $skills,
    		'sphereSkillDataArray' => $sphereSkillDataArray
    	];
    	
    	return view('addSkillToCharacter', $data);
    }
    
    public function storeCharacterSkill()
    {
    	$characterID = Input::get('character_id');
    	$skills = Input::get('skills');
    	$dateLearned = Input::get('date_learned');
    	
    	CharactersSkills::saveSkillsForCharacter($characterID, $skills, $dateLearned);
    	
    	return Redirect::to('characters/' . $characterID);
    }
    
    public function deleteCharacterSkill()
    {
    	$characterID = Input::get('character_id');
    	$skillID = Input::get('skill_id');
    	
    	$characterSkill = CharactersSkills::where('character_id', $characterID)->where('skill_id', $skillID)->first();
    	$characterSkill->delete();
    	
    	return Redirect::to('characters/' . $characterID);
    }
    
    public function getSkillBuildCost($skillInfo, $characterSpheresArray)
    {
    	$skillBuildCost = 0;
    	if ($skillInfo->is_base_skill)
    	{
    		$skillBuildCost = $skillInfo->build_cost;
    	}
    	else
    	{
    		// check if the skill belongs to one of the characters spheres
    		$skillSpheresArray = unserialize($skillInfo->spheres);
    		
    		foreach ($characterSpheresArray as $characterSphereInfo)
    		{
    			if (in_array((int)$characterSphereInfo['sphere_id'], $skillSpheresArray))
    			{
    				// check when they picked the sphere and compare vs the skill
    				if (true)
    				{
    					$skillBuildCost = $skillInfo->build_cost;
    				}
    				else {
    					// character picked sphere after skill was purchased
    					$skillBuildCost = $skillInfo->build_cost * 2;
    				}
    				
    				break;
    			}
    			else
    			{
    				$skillBuildCost = $skillInfo->build_cost * 2;
    			}
    		}
    	}
    	
    	return $skillBuildCost;
    }
    
    public function formatCharacterSpheresForPlayerInfo($characterSpheresArray)
    {
    	foreach ($characterSpheresArray as $characterSphereInfo)
    	{
    		if ($characterSphereInfo['sphere_id'] != 0)
    		{
    			$sphereInfo = Sphere::findOrFail($characterSphereInfo['sphere_id']);
    			$characterSpheres[] = [
    					'sphere_name' => $sphereInfo['sphere_name'],
    					'date' => $characterSphereInfo['date']
    			];
    		}
    		else
    		{
    			$characterSpheres[] = [
    					'sphere_name' => 'None',
    					'date' => $characterSphereInfo['date']
    			];
    		}
    	}
    	
    	return $characterSpheres;
    }
    
    public function sortCharacterSkillsByName($characterSkills)
    {
    	if (isset($characterSkills) and !empty($characterSkills))
    	{
    		foreach ($characterSkills as $key => $characterSkill)
    		{
    			$skillName[$key] = $characterSkill['skill_name'];
    		}
    		array_multisort($skillName, SORT_ASC, $characterSkills);
    	}
    	
    	return $characterSkills;
    }
    
    public function getAbilityPointBuild($character, $apType, $apRatio)
    {
    	$build = 0;
    	
    	switch ($apRatio)
    	{
    		case '1-1':
    			$build = $character->$apType;
    			break;
    		case '2-1':
    			$build = $character->$apType / 2;
    			break;
    		case '3-2':
    			$build = ($character->$apType / 3) * 2;
    			break;
    		default:
    			break;
    	}
    	
    	return $build;
    }
    
    public function printCard($characterID)
    {
    	$character = Character::findOrFail($characterID);
    	$spheres = unserialize($character->spheres);
    	$apRatios = unserialize($character->ability_point_ratios);
    	
    	$sphereCardData = $this->formatSphereCardData($spheres);
    	
    	$characterSpheresArray = unserialize($character->spheres);
    	$characterKnownSkills = CharactersSkills::getSkillsForCharacter($character->id);
    	
    	// calculate build spent
    	$buildSpent = 0;
    	
    	// loop through skills and get skill names
    	$characterSkills = [];
    	if (isset($characterKnownSkills) and !empty($characterKnownSkills)) {
    		foreach ($characterKnownSkills as $characterKnownSkill)
    		{
    			$skillInfo = Skill::findOrFail($characterKnownSkill->skill_id);
    			
    			// get ability type if not 0
    			if ($skillInfo->ability_type_id != 0)
    			{
    				$abilityType = AbilityType::findOrFail($skillInfo->ability_type_id);
    			}
    			
    			$skillBuildCost = $this->getSkillBuildCost($skillInfo, $characterSpheresArray);
    			$skillBuildCost *= $characterKnownSkill->total;
    			
    			// add skill to array for displaying on character info page
    			$characterSkills[] = [
    				'skillID' => $skillInfo->id,
    				'total' => $characterKnownSkill->total,
    				'skill_name' => $skillInfo->skill_name,
    				'build_cost' => $skillBuildCost,
    				'ability_type_name' => (isset($abilityType) and !empty($abilityType)) ? $abilityType->ability_type_short : '',
    				'ability_type_cost' => (isset($abilityType) and !empty($abilityType)) ? $skillInfo->ap_cost : ''
    			];
    			
    			$buildSpent += $skillBuildCost;
    		}
    	}
    	
    	// sort character skills by name if we have any
    	$characterSkills = $this->sortCharacterSkillsByName($characterSkills);
    	
    	// format spheres for character info page
    	$characterSpheres = $this->formatCharacterSpheresForPlayerInfo($characterSpheresArray);
    	
    	$apRatios = unserialize($character->ability_point_ratios);
    	
    	// calculate build costs for ability points
    	$totalAbilityPointBuild = 0;
    	
    	if (isset($apRatios) and !empty($apRatios)) {
    		foreach ($apRatios as $apType => $apRatio)
    		{
    			$abilityPointBuild = $this->getAbilityPointBuild($character, $apType, $apRatio);
    			$totalAbilityPointBuild += $abilityPointBuild;
    		}
    	}
    	
    	$buildSpent += $totalAbilityPointBuild;
    	
    	$templatePDF = '/var/www/wr_ccdb/storage/app/public/card.pdf';
    	$fields = [
    		'player_name' => $character->player->first_name . ' ' . $character->player->last_name,
    		'character_name' => $character->character_name,
    		'race' => $character->race->race_name,
    		'deaths' => $character->deaths,
    		'rp_points' => $character->rp_points,
    		'sphere_1' => $sphereCardData[0],
    		'sphere_2' => $sphereCardData[1],
    		'sphere_3' => $sphereCardData[2],
    		'body' => $character->body,
    		'build_spent' => $buildSpent,
    		'build_unspent' => $character->build_unspent,
    		'dex_ratio' => $apRatios['dex'],
    		'end_ratio' => $apRatios['end'],
    		'pre_ratio' => $apRatios['pre'],
    		'dex' => $character->dex,
    		'end' => $character->end,
    		'pre' => $character->pre,
    		'ration' => $character->ration == 1 ? 'Yes' : 'No',
    		'last_played' => date('Y-m-d', strtotime($character->last_played))
    	];
    	
		for ($i = 1; $i <= count($characterSkills); $i++)
		{
			$fields['skill_' . $i] = $characterSkills[$i-1]['skill_name'];
			$fields['skill_' . $i] .= ($characterSkills[$i-1]['total']) > 1 ? ' (x' . $characterSkills[$i-1]['total'] . ')' : '';
			$fields['skill_' . $i] .= ($characterSkills[$i-1]['ability_type_cost'] != '' and $characterSkills[$i-1]['ability_type_name'] != '') ? (' [' . $characterSkills[$i-1]['ability_type_cost']  . ' ' . $characterSkills[$i-1]['ability_type_name'] . ']') : '';
			$fields['skill_build_' . $i] = $characterSkills[$i-1]['build_cost'];
		}
    	
    	$pdf = new Pdf($templatePDF, [
    		'command' => '/usr/bin/pdftk'
    	]);
    	$pdf->fillForm($fields);
    	$pdf->needAppearances();
    		
    	if (!$pdf->send())
    	{
    		echo $pdf->getError();
    	}
    	
    }
    
    public function formatSphereCardData($spheres)
    {
    	$sphereCardData = ['', '', ''];
    	
    	if (isset($spheres) and !empty($spheres))
    	{
    		// need to loop through 3 times
    		for ($i = 0; $i < 3; $i++)
    		{
    			if ($spheres[$i]['sphere_id'] != 0)
    			{
    				$sphereData = Sphere::findOrFail($spheres[$i]['sphere_id']);
    				$sphereCardData[$i] = isset($spheres[$i]) ? $sphereData->sphere_name : '';
    			}
    		}
    	}
    	
    	return $sphereCardData;
    }
}

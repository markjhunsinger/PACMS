<?php

namespace App\Http\Controllers;

use App\AbilityType;
use App\Character;
use App\CharactersSkills;
use App\Player;
use App\Race;
use App\Skill;
use App\Sphere;
use Illuminate\Http\Request;
use Khill\Lavacharts\Lavacharts;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	// get all characters
    	$characters = Character::all();
    	$races = Race::all();
    	
    	// make race count chart
    	$racesCountArray = $this->getRaceCounts();
		$racePopulation = \Lava::DataTable();
		$racePopulation->addStringColumn('Race');
		$racePopulation->addNumberColumn('#');
		foreach ($racesCountArray as $raceData)
		{
			$racePopulation->addRow([$raceData['race'], $raceData['count']]);
		}
    	\Lava::PieChart('Races', $racePopulation, [
    		'title' => 'Number of characters by race',
    	]);
    	
    	// make sphere count chart
    	$sphereCountArray = $this->getSphereCounts();
    	$spherePopulation = \Lava::DataTable();
    	$spherePopulation->addStringColumn('Sphere');
    	$spherePopulation->addNumberColumn('#');
    	foreach ($sphereCountArray as $sphereData)
    	{
    		$spherePopulation->addRow([$sphereData['sphere'], $sphereData['count']]);
    	}
    	\Lava::ColumnChart('Spheres', $spherePopulation, [
    		'title' => 'Number of characters by sphere',	
    	]);
    	
    	
    	
    	
    	
    	
    	
    	$data = [
    		
    	];
    	
        return view('home', $data);
    }
    
    public function getRaceCounts()
    {
    	$characters = Character::all();
    	$races = Race::orderBy('race_name')->get();
    	
    	$racesCountArray = [];
    	foreach ($races as $race)
    	{
    		$racesCountArray[$race->id]['race'] = $race->race_name;
    		$racesCountArray[$race->id]['count'] = 0;
    		foreach ($characters as $character)
    		{
    			if ($race->id == $character->race_id)
    			{
    				$racesCountArray[$race->id]['count'] += 1;
    			}
    		}
    	}
    	
    	return $racesCountArray;
    }
    
    public function getSphereCounts()
    {
    	$characters = Character::all();
    	$spheres = Sphere::orderBy('sphere_name')->get();
    	
    	$sphereCountArray = [];
    	foreach ($spheres as $sphere)
    	{
    		$sphereCountArray[$sphere->id]['sphere'] = $sphere->sphere_name;
    		$sphereCountArray[$sphere->id]['count'] = 0;
    		foreach ($characters as $character)
    		{
    			$characterSpheres = unserialize($character->spheres);
    			foreach ($characterSpheres as $characterSphere)
    			{
    				if ($sphere->id == $characterSphere['sphere_id'])
    				{
    					$sphereCountArray[$sphere->id]['count'] += 1;
    				}
    			}
    		}
    	}
    	
    	
    	return $sphereCountArray;
    }
}

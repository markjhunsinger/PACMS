<?php

namespace App\Http\Controllers;

use App\AbilityType;
use App\Skill;
use App\Sphere;
use App\Http\Requests\StoreSkill;
use App\Http\Requests\UpdateSkill;
use Illuminate\Http\Request;
use Input;
use Redirect;

class SkillController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	// get all skills from the database
    	$skills = Skill::orderBy('skill_name', 'asc')->get();
    	$spheres = Sphere::orderBy('sphere_name', 'asc')->get();
    	
    	$sphereSkillDataArray = [];
    	if (isset($spheres) and !empty($spheres))
    	{
    		foreach ($spheres as $sphere)
    		{
    			// set sphere data
    			$sphereSkillDataArray[$sphere->id]['data'] = $sphere;
    			$sphereSkillDataArray[$sphere->id]['skills'] = [];
    			
    			// loop through all skills if we have any
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
    		'skills' => $skills,
    		'sphereSkillDataArray' => $sphereSkillDataArray
    	];
    	
    	return view('skills', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$spheres = Sphere::orderBy('sphere_name', 'asc')->get();
    	$abilityTypes = AbilityType::orderBy('ability_type_name', 'asc')->get();

    	$data['spheres'] = $spheres;
    	$data['abilityTypes'] = $abilityTypes;
    	 
    	return view('createSkill', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StoreSkill  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSkill $request, Skill $skill)
    {
    	$skill->fill(Input::all());
    	
    	$spheresArray = [];
    	if (isset($request->spheres) and !empty($request->spheres))
    	{
    		foreach ($request->spheres as $index => $sphereID)
    		{
    			$spheresArray[] = (int) $sphereID;
    		}
    	}
    	$skill->spheres = serialize($spheresArray);
    	$skill->is_base_skill = isset($request->is_base_skill) ? 1 : 0;
    	$skill->show_on_site = isset($request->show_on_site) ? 1 : 0;
    	
    	$skill->save();
    	 
    	return Redirect::to('skills');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $skill = Skill::findOrFail($id);
        $spheres = Sphere::orderBy('sphere_name', 'asc')->get();
        $abilityTypes = AbilityType::orderBy('ability_type_name', 'asc')->get();
        
        $data = [
        	'skill' => $skill,
        	'spheres' => $spheres,
        	'abilityTypes' => $abilityTypes
        ];
        
        return view('editSkill', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSkill $request, $id)
    {
        $skill = Skill::findOrFail($id);
        
        $skill->fill(Input::all());
        
        $spheresArray = [];
        if (isset($request->spheres) and !empty($request->spheres))
        {
        	foreach ($request->spheres as $index => $sphereID)
        	{
        		$spheresArray[] = (int) $sphereID;
        	}
        }
        $skill->spheres = serialize($spheresArray);
        
        $skill->save();
        
        return Redirect::to('skills');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}

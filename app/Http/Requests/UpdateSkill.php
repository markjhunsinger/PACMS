<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use App\Skill;

class UpdateSkill extends FormRequest
{	
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
    	$skill = Skill::findOrFail($this->skill);

        return [
        	'skill_name' => 'required|unique:skills,skill_name,' . $skill->id,
        	'skill_description' => 'required',
        	'spheres' => 'required',
        	'build_cost' => 'required|numeric|regex:/^[0-9]\d*(?:\.[05])?$/',
        	'ability_type_id' => 'required',
        	'ap_cost' => 'required|integer'
        ];
    }
    
    public function messages()
    {
    	return [
    		'skill_name.required' => 'Skill Name is required.',
    		'skill_description.required' => 'Skill Description is required.',
    		'spheres.required' => 'At least one sphere is required.',
    		'build_cost.required' => 'Build Cost is required.',
    		'build_cost.numeric' => 'Build Cost must be numeric and an increment of 0.5.',
    		'build_cost.regex' => 'Build Cost must be an increment of 0.5.',
    		'ability_type_id.required' => 'Ability Type is required.',
    		'ap_cost.required' => 'Ability Cost is required.',
    		'ap_cost.integer' => 'Ability Cost must be an integer.'
    	];
    }
}

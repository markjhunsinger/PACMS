<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCharacter extends FormRequest
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
        return [
        	'character_name' => 'required',
        	'race_id' => 'required|integer',
        	'build_unspent' => 'required|numeric|regex:/^[0-9]\d*(?:\.[05])?$/',
        	'body' => 'required|integer',
        	'deaths' => 'required|integer',
        	'dex' => 'required|integer',
        	'end' => 'required|integer',
        	//'faith' => 'required|integer',
        	'pre' => 'required|integer',
        	'last_played' => 'date',
        	'rp_points' => 'required|integer',
        ];
    }
    
    public function messages()
    {
    	return [
    		'character_name.required' => 'Character Name is required.',
    		'race_id.required' => 'Race is required.',
    		'build_unspent.required' => 'Build Cost is required.',
    		'build_unspent.numeric' => 'Build Cost must be numeric and an increment of 0.5.',
    		'build_unspent.regex' => 'Build Cost must be an increment of 0.5.',
    		'body.required' => 'Ability Cost is required.',
    		'body.integer' => 'Ability Cost must be an integer.',
    		'deaths.required' => 'Ability Cost is required.',
    		'deaths.integer' => 'Ability Cost must be an integer.',
    		'dex.required' => 'Ability Cost is required.',
    		'dex.integer' => 'Ability Cost must be an integer.',
    		'end.required' => 'Ability Cost is required.',
    		'end.integer' => 'Ability Cost must be an integer.',
    		//'faith.required' => 'Ability Cost is required.',
    		//'faith.integer' => 'Ability Cost must be an integer.',
    		'pre.required' => 'Ability Cost is required.',
    		'pre.integer' => 'Ability Cost must be an integer.',
    		'last_played.date' => 'Last Played must be a valid date.',
    		'ap_cost.required' => 'Ability Cost is required.',
    		'ap_cost.integer' => 'Ability Cost must be an integer.'
    	];
    }
}

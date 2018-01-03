<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCharacter extends FormRequest
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
            'player_id' => 'required',
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
    		'build_unspent.required' => 'Build Unspent is required.',
    		'build_unspent.numeric' => 'Build Unspent must be numeric and an increment of 0.5.',
    		'build_unspent.regex' => 'Build Unspent must be an increment of 0.5.',
    		'body.required' => 'Body is required.',
    		'body.integer' => 'Body must be an integer.',
    		'deaths.required' => 'Deaths is required.',
    		'deaths.integer' => 'Deaths must be an integer.',
    		'dex.required' => 'Dexterity is required.',
    		'dex.integer' => 'Dexterity must be an integer.',
    		'end.required' => 'Endurance is required.',
    		'end.integer' => 'Endurance must be an integer.',
    		//'faith.required' => 'Faith is required.',
    		//'faith.integer' => 'Faith must be an integer.',
    		'pre.required' => 'Presence is required.',
    		'pre.integer' => 'Presence must be an integer.',
    		'last_played.date' => 'Last Played must be a valid date.',
    		'ap_cost.required' => 'Ability Cost is required.',
    		'ap_cost.integer' => 'Ability Cost must be an integer.'
    	];
    }
}

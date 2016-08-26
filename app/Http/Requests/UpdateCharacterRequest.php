<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UpdateCharacterRequest extends Request
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
            'character_name' => 'required|string',
            'character_number' => 'required|string',
            'last_played' => 'required',
            'build_unspent' => 'required|integer',
            'build_total' => 'required|integer',
            'body' => 'required|integer',
            'stress_level' => 'required|integer',
            'deaths' => 'required|integer',
            'pre' => 'required|integer',
            'end' => 'required|integer',
            'foc' => 'required|integer',
            'rp_points' => 'integer'
        ];
    }

    public function messages()
    {
        return [
            'character_name.required' => 'Character Name is required.',
            'character_name.string' => 'Character Name must be a string.',
            'character_number.required' => 'Badge Number is required.',
            'character_number.string' => 'Badge Number must be a string.',
            'last_played.required' => 'Last Played is required.',
            'build_unspent.required' => 'Unspent Build is required.',
            'build_unspent.integer' => 'Unspent Build must be a valid integer.',
            'build_total.required' => 'Total Build is required.',
            'build_total.integer' => 'Total Build must be a valid integer.',
            'body.required' => 'Body is required.',
            'body.integer' => 'Body must be a valid integer.',
            'stress_level.required' => 'Stress Level is required.',
            'stress_level.integer' => 'Stress Level must be a valid integer.',
            'deaths.required' => 'Deaths is required.',
            'deaths.integer' => 'Deaths must be a valid integer.',
            'pre.required' => 'Presence is required.',
            'pre.integer' => 'Presence must be a valid integer.',
            'end.required' => 'Endurance is required.',
            'end.integer' => 'Endurance must be a valid integer.',
            'foc.required' => 'Focus is required.',
            'foc.integer' => 'Focus must be a valid integer.',
            'rp_points.integer' => 'RP Points must be a valid integer.'
        ];
    }
}

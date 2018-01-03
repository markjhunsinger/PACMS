<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use App\Player;

class UpdatePlayer extends FormRequest
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
    	$player = Player::findOrFail($this->player);
    	
    	return [
    		'first_name' => 'required',
    		'last_name' => 'required'
    	];
    }
    
    public function messages()
    {
    	return [
    		'first_name.required' => 'First Name is required.',
    		'last_name.required' => 'Last Name is required.',
    	];
    }
}

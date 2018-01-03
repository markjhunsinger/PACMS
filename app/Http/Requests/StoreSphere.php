<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSphere extends FormRequest
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
            'sphere_name' => 'required|unique:spheres,sphere_name'
        ];
    }
    
    public function messages()
    {
    	return [
    		'sphere_name.required' => 'Sphere Name is required.',
    		'sphere_name.unique' => 'Sphere Name must be unique.'
    	];
    }
}

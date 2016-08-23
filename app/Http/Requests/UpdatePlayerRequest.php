<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UpdatePlayerRequest extends Request
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
            'last_name' => 'required|string',
            'first_name' => 'required|string',
            'email' => 'email',
            'zip' => 'digits:5',
            'service_points' => 'integer|between:0,1000',
            'event_credits' => 'integer|between:0,1000'
        ];
    }

    public function messages()
    {
        return [
            'last_name.required' => 'Last Name is required.',
            'last_name.string' => 'Last Name must be a string.',
            'first_name.required' => 'First Name is required.',
            'first_name.string' => 'First Name must be a string.',
            'email.email' => 'Email must be a valid email.',
            'zip' => 'Zip Code must be a valid Zip Code (5 digits).',
            'service_points.integer' => 'Service Points must be a valid integer.',
            'service_points.between' => 'Service Points must be an integer between 0 and 1000.',
            'event_credits.integer' => 'Event Credits must be a valid integer.',
            'event_credits.between' => 'Event Credits must be an integer between 0 and 1000.',
        ];
    }
}

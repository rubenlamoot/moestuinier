<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersEditRequest extends FormRequest
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
            //
            'email' => ['required', 'string', 'email', 'max:255'],
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'street' => ['required', 'string', 'max:255'],
            'house_nr' => ['required', 'max:10'],
            'zip_code' => ['required', 'string', 'max:20'],
            'city' => ['required', 'string', 'max:255'],
        ];
    }

    public function messages(){
        return [
            'email.required' => 'Email is verplicht',
            'first_name.required' => 'Voornaam is verplicht',
            'last_name.required' => 'Familienaam is verplicht',
            'street.required' => 'Straat is verplicht',
            'house_nr.required' => 'Huisnummer is verplicht',
            'zip_code.required' => 'Postcode is verplicht',
            'city.required' => 'Stad is verplicht',
        ];

    }
}

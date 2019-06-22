<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Step2Request extends FormRequest
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
            'street' => ['required', 'string', 'max:255'],
            'house_nr' => ['required', 'max:10'],
            'zip_code' => ['required', 'string', 'max:20'],
            'city' => ['required', 'string', 'max:255'],
        ];
    }

    public function messages(){
        return [
            'street.required' => 'Straat is verplicht',
            'house_nr.required' => 'Huisnummer is verplicht',
            'zip_code.required' => 'Postcode is verplicht',
            'city.required' => 'Stad is verplicht',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TypesRequest extends FormRequest
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
            'name' => 'required',
            'percentage' => 'numeric|min:0|max:99'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Naam is verplicht',
            'percentage.numeric' => 'Kortingspercentage moet een nummer zijn ',

        ];
    }
}

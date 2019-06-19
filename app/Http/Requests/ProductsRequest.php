<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductsRequest extends FormRequest
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
            'name' => 'required|string',
            'description' => 'required|string',
            'level2_category_id' => 'required',
            'price' => 'required|numeric',
            'stock' => 'integer',
            'sows' => 'required',
            'harvests' => 'required',
            'types' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Naam is verplicht',
            'description.required' => 'Beschrijving is verplicht',
            'level2_category_id.required' => 'Je moet een categorie kiezen',
            'price.required' => 'Prijs is verplicht',
            'price.numeric' => 'Prijs moet een nummer zijn',
            'stock.integer' => 'Stock moet een nummer zijn',
            'sows.required' => 'Kies minstens één maand',
            'harvests.required' => 'Kies minstens één maand',
            'types.required' => 'Kies minstens één type'
        ];
    }
}

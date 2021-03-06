<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostForm extends FormRequest
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
            'user_id' => 'required|integer',
            'image_01' => 'required|image',
            'image_02' => 'nullable|image',
            'image_03' => 'nullable|image',
            'pro_name' => 'required|string|max:40',
            'flavor' => 'required|string|max:20',
            'weight' => 'nullable|numeric',
            'price' => 'nullable|integer',
            'per_protein' => 'nullable|numeric',
            'made' => 'nullable',
            'type' => 'nullable',
            'taste_good' => 'required',
            'cost_paf' => 'required',
            'recomend' => 'required',
            'melt' => 'required',
            'foam' => 'required',
            'how_to_buy' => [
              'nullable',
              'string',
              'max:100',
              'not_regex:/(http)/',
            ],
            'how_to_drink' => [
              'nullable',
              'string',
              'max:100',
              'not_regex:/(http)/',
            ],
            'comment' => [
              'nullable',
              'string',
              'max:400',
              'not_regex:/(http)/',
            ],
        ];
    }
}

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
            'id' => 'required|integer',
            'image_01' => 'required|image',
            'image_02' => 'nullable|image',
            'image_03' => 'nullable|image',
            'pro_name' => 'required|string|max:30',
            'flavor' => 'required|string|max:20',
            'weight' => 'required|numeric',
            'price' => 'required|integer',
            'per_protein' => 'required|numeric',
            'made' => 'required',
            'type' => 'required',
            'taste_good' => 'required',
            'cost_paf' => 'required',
            'recomend' => 'required',
            'how_to_buy' => 'nullable|string|max:50',
            'how_to_drink' => 'nullable|string|max:100',
            'comment' => 'nullable|string|max:200',
        ];
    }
}

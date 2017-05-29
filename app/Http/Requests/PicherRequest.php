<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PicherRequest extends Request
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
            'name'            => 'required',
            'number'          => 'required|numeric',
            'club'            => 'required',
            'position'        => 'required',
            'speed'           => 'required|numeric|max:200',
            'control'         => 'required',
            'stamina'         => 'required',
            'breaking_ball'   => 'required|max:500',
            'special_ability' => 'max:500',
            'image'           => 'image|max:3000',
        ];
    }
}

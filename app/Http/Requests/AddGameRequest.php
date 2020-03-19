<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddGameRequest extends FormRequest
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
            'game_name' => 'required|string',
            'game_link' => 'required|active_url',
            'price' => 'required|min:1|numeric',
            'discount' => 'nullable|between:1,99',
            'photos_game' => 'required',
            'photos_game.*' => 'required|mimes:jpeg,jpg,png|max:5000',
            'categoriesDll' => 'not_in:1000|numeric',
            'genresChb' => 'required|array'
        ];
    }
}

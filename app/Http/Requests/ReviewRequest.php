<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
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
                'ratingValue' => 'required|min:1|max:5',
                'comment' => 'required|regex:/[0-9A-Za-z.,\n \r?!]*/',
                'idGame' => 'required|numeric'
        ];
    }
}

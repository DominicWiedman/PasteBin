<?php

namespace App\Http\Requests;

use http\Env\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePasteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return array
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
            'title' => 'required|max:255|string',
            'content' => 'required|max:5000|string',
            'visibility_id' => 'required|integer',
            'available_at' => [
                'nullable',
                'integer',
                Rule::in([
                    10,
                    60,
                    180,
                    24*60,
                    24*60*7,
                    24*60*30
                ])
            ]
        ];
    }
}

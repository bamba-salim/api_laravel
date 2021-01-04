<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PhotoFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|max:10',
            'description' => 'required|min:15'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'le titre est obligatoire',
            'description.required' => 'la description est obligatoire'
        ];
    }


}

<?php

namespace Modules\Person\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PersonUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:people',
            'height' => 'required|numeric',
            'mass' => 'required|numeric',
            'hair_color' => 'required',
            'birth_year' => 'required',
            'gender_id' => 'required|exists:genders,id',
            'homeworld_id' => 'required|exists:homeworlds,id',
            'films' => 'required|array',
            'created' => 'required',
            'url' => 'required|url',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}

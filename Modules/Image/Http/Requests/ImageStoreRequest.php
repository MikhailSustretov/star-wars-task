<?php

namespace Modules\Image\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImageStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'image' => 'required|array',
            'image.*' => 'mimes:jpeg,jpg,png,gif',
            'person' => 'required'
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

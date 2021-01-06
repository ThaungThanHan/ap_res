<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DishCreatedRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;        // default ka false, true htr pyy mha authorization error ma tat tar.
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',           // Rules for create form
            'category' => 'required',
            'dish_image' => 'required|image',
        ];
    }
}

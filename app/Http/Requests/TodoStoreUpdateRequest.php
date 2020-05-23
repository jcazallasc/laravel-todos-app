<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TodoStoreUpdateRequest extends FormRequest
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
            'name' => 'required|min:6|max:12',
            'description' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute is required',
            'min' => ':attribute must be at least :min characters',
            'max' => ':attribute may not be greater than :max characters',
        ];
    }    
 
    public function attributes()
    {
        return [
            'name' => 'Name',
            'description' => 'Description',
        ];
    }

}

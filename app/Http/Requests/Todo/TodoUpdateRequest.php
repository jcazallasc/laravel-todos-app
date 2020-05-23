<?php

namespace App\Http\Requests\Todo;


use App\Http\Requests\Todo\TodoStoreRequest;

class TodoUpdateRequest extends TodoStoreRequest
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

    protected function prepareForValidation()
    {
        $this->merge(['completed' => $this->completed == 'on']);
    }    

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return parent::rules() + [
            'completed' => 'required|boolean',
        ];
    }

    public function messages()
    {
        return parent::messages() + [
            'boolean' => ':attribute must be true or false',
        ];
    }   

    public function attributes()
    {
        return parent::attributes() + [
            'completed' => 'Completed',
        ];
    }

}

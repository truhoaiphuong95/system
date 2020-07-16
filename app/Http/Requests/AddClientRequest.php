<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AddClientRequest extends Request
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
            'phone' => 'required|regex:/(0)[0-9]{9}/'
        ];
    }
    
    public function messages()
    {
        return [
            'phone.required' => 'Hãy nhập vào số điện thoại',
            'phone.regex' => 'Số điện thoại không đúng'
        ];
    }
}

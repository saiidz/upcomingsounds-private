<?php

namespace App\Http\Requests;

use App\Http\Traits\RenderErrors;
use Illuminate\Foundation\Http\FormRequest;

class SignUp extends FormRequest
{
    use RenderErrors;

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
            'name'         => 'required|string|min:2|max:60',
            'email'        => 'required|string|email|unique:users|min:10|max:60',
            'password'     => 'required|string|confirmed',
//            'phone_number' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:11|unique:users',
            'address'      => 'required|string|min:3|max:255',
        ];
    }
}

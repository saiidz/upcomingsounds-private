<?php

namespace App\Http\Requests;

use App\Http\Traits\RenderErrors;
use Illuminate\Foundation\Http\FormRequest;

class Login extends FormRequest
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
            'email' => 'required_without:phone_number|string|email|min:10|max:60',
            'phone_number' => 'required_without:email|regex:/^([0-9\s\-\+\(\)]*)$/|min:11',
            'password'    => 'required_with:email|string|min:8|max:50',
        ];
    }
}

<?php

namespace App\Http\Requests;

use App\Http\Traits\RenderErrors;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateProfile extends FormRequest
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
        $id = auth()->user()->id;
        return [
            //
            'name'         => 'required|string|min:2|max:60',
            'email'        => 'required|string|email|min:10|max:60|unique:users,email,'. $id,
            'phone_number' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:11|unique:users,phone_number,'. $id,
            'address'      => 'required|string|max:255',
//            'document'     => 'required',
            'document.*'   => 'mimes:jpeg,jpg,png,gif|max:2048',
        ];
    }
}

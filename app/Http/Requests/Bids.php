<?php

namespace App\Http\Requests;

use App\Http\Traits\RenderErrors;
use Illuminate\Foundation\Http\FormRequest;

class Bids extends FormRequest
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
            'bid' => 'required|numeric|min:3|digits_between:1,11',
        ];
    }
}

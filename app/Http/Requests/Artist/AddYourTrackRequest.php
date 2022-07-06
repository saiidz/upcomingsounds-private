<?php

namespace App\Http\Requests\Artist;

use Illuminate\Foundation\Http\FormRequest;

class AddYourTrackRequest extends FormRequest
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
            'name' => 'required|string',
            'description' => 'required|string',
            'track_thumbnail' => 'required|file|mimes:jpeg,jpg,png,gif|max:2048',
            'audio' =>'required|file|mimes:mp3|max:15000',
            'tag'  => 'required',
        ];
    }
}

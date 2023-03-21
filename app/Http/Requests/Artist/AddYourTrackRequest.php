<?php

namespace App\Http\Requests\Artist;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class AddYourTrackRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'audio_cover'     => 'required',
            'audio'           => (request()->demo == "on") ? 'required|file|mimes:mp3|max:15000' :'file|mimes:mp3|max:15000',
            'tag'             => 'required',
            'track_pdf.*'     => 'file|mimes:pdf|max:2048',
            'track_images.*'  => 'required|file|mimes:jpeg,jpg,png|max:2048',
            'track_thumbnail' => 'required|file|mimes:jpeg,jpg,png,gif|max:2048',
            'link.*'          =>  'required',
            'release_type'    => 'required',
            'description'     => 'required|string',
            'name'            => 'required|string',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'audio.required' => 'Demo is on please upload mp3 music. it is required',
            'audio_cover.required' => 'Indicate whether the release is original,cover, or remix',
            'tag.required' => 'The tag field is required. please add your interests and the genres ---> You will need to specify your interests and genres in order to proceed',
        ];
    }

    /**
     * @param Validator $validator
     * @return array
     */
    protected function failedValidation(Validator $validator): array
    {
        throw new HttpResponseException(response()->json(['errors' => $validator->errors()->all()]));
    }
}

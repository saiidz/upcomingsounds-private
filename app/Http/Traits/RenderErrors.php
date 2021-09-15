<?php
namespace App\Http\Traits;

use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;

trait RenderErrors {
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(sendError(Request::wantsJson(),null, $validator->messages(), 422));
    }
}

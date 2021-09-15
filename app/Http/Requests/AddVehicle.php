<?php

namespace App\Http\Requests;

use App\Http\Traits\RenderErrors;
use Illuminate\Foundation\Http\FormRequest;

class AddVehicle extends FormRequest
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
            'brand'           => 'required|string|min:2|max:50',
            'model'           => 'required|string|min:2|max:50',
            'mileage'         => 'required|numeric|digits_between:1,11',
            'color'           => 'required',
            'chassis_number'  => 'required|unique:vehicles,chassis_number',
            'year'            => 'required',
            'transmission'    => 'required',
            'condition'       => 'required',
            'category_id'     => 'required',
            'specifications'  => 'required|string',
            'min_price'       => 'required|numeric',
            'country_name'    => 'required',
            'state_name'      => 'required',
            'city_name'       => 'required',
            'vehicle_image'   => 'required',
            'vehicle_image.*' => 'mimes:jpeg,jpg,png,gif,mp4|max:2048',
//            'vehicle_image.*' => 'mimes:jpeg,jpg,png,gif,mp4,x-flv,x-mpegURL,MP2T,3gpp,quicktime,x-msvideo,x-ms-wmv|max:2048',
            'tag'             => 'required',
            'engine_cc'       => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'category_id.required'   => 'Category is required',
            'min_price.required'     => 'Minimum Price is required',
            'vehicle_image.required' => 'Media is required',
        ];
    }
}

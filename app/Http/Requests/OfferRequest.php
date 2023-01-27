<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OfferRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name_ar'=>'required|max:200|unique:offers,name_ar',
            'name_en'=>'required|max:200|unique:offers,name_en',
            'price'=>'required|numeric',
            'details_ar'=>'required',
            'details_en'=>'required'
        ];
    }
    public function messages(){
        return [
            'name_ar.required'=>__('messages.offer name field is required ar'),
            'name_ar.unique'=>__('messages.offer name field must be unique ar'),
            'name_en.required'=>__('messages.offer name field is required en'),
            'name_en.unique'=>__('messages.offer name field must be unique en'),
            'price.required'=>__('messages.offer price field is required'),
            'price.numeric'=>__('messages.offer price field must be number'),
            'details_ar.required'=>__('messages.offer details field is required ar'),
            'details_en.required'=>__('messages.offer details field is required en')

        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchHotelRequest extends FormRequest
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
            'longitude' => ['required', 'regex:/\A[+-]?(?:180(?:\.0{1,18})?|(?:1[0-7]\d|\d{1,2})\.\d{1,18})\z/x'],
            'latitude'  => ['required', 'regex:/\A[+-]?(?:90(?:\.0{1,18})?|\d(?(?<=9)|\d?)\.\d{1,18})\z/x'],
            'orderBy'    => ['nullable', 'string']
        ];
    }
}

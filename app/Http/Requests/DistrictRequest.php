<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DistrictRequest extends FormRequest
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
        $rules = [
            'ar_name' => 'required|string|max:100|unique:districts,ar_name',
            'en_name' => 'required|string|max:100|unique:districts,en_name',
            'region_id' => 'required|exists:regions,id',
        ];
        if ($this->method() == 'PUT') {
            $rules = [
                'ar_name' => 'required|string|max:100|unique:districts,ar_name,' . $this->district->id,
                'en_name' => 'required|string|max:100|unique:districts,en_name,' . $this->district->id,
                'region_id' => 'required|exists:regions,id',
            ];
        }
        return $rules;
    }
}

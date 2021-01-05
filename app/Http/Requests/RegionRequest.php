<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegionRequest extends FormRequest
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
            'ar_name' => 'required|string|max:100|unique:regions,ar_name',
            'en_name' => 'required|string|max:100|unique:regions,en_name',
            'city_id' => 'required|exists:cities,id',
        ];
        if ($this->method() == 'PUT') {
            $rules = [
                'ar_name' => 'required|string|max:100|unique:regions,ar_name,' . $this->region->id,
                'en_name' => 'required|string|max:100|unique:regions,en_name,' . $this->region->id,
                'city_id' => 'required|exists:cities,id',
            ];
        }
        return $rules;
    }
}

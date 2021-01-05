<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CityRequest extends FormRequest
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
            'ar_name' => 'required|string|max:100|unique:cities,ar_name',
            'en_name' => 'required|string|max:100|unique:cities,en_name',
        ];
        if ($this->method() == 'PUT') {
            $rules = [
                'ar_name' => 'required|string|max:100|unique:cities,ar_name,' . $this->city->id,
                'en_name' => 'required|string|max:100|unique:cities,en_name,' . $this->city->id,
            ];
        }
        return $rules;
    }
}

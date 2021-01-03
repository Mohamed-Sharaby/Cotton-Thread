<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'ar_name' => 'required|string|unique:categories,ar_name',
            'en_name' => 'required|string|unique:categories,en_name' ,
            'image' => 'required|image',
            'parent_id' => 'nullable|integer|exists:categories,id',
            'slug' => 'required|unique:categories,slug',
            'ar_meta' => 'required|string',
            'en_meta' => 'required|string',
        ];
        if ($this->method() == 'PUT') {
            $rules = [
                'ar_name' => 'required|string|unique:categories,ar_name,' . optional($this->category)->id . ',id',
                'en_name' => 'required|string|unique:categories,en_name,' . optional($this->category)->id . ',id',
                'image' => 'nullable|image',
                'slug' => 'required|unique:categories,slug,'.optional($this->category)->id,
                'ar_meta' => 'required|string',
                'en_meta' => 'required|string',
            ];
        }
        return $rules;

    }
}

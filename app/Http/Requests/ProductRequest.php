<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'ar_name' => 'required|string',
            'en_name' => 'required|string',
            'slug' => 'required|unique:products,slug',
            'ar_description' => 'required|string',
            'en_description' => 'required|string',
            'ar_meta' => 'required|string',
            'en_meta' => 'required|string',
            'category_id' => 'required|string',
            'image' => 'required|image|max:2048',
            'price' => 'required|numeric',
            'sku' => 'required',
            'quantity' => 'required|numeric',
            'size_id' => 'required|exists:sizes,id',
            'sub_category_id' => 'nullable|string',
            'min_units_order' => 'nullable|string',
            'max_units_order' => 'nullable|string',
        ];
        if ($this->method() == 'PUT') {
            $rules['image'] = 'nullable|image|max:2048';
            $rules['quantity'] = 'nullable';
            $rules['slug'] = 'required|unique:products,slug,'.optional($this->product)->id;
        }
        return $rules;
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CouponRequest extends FormRequest
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
            'code' => 'required|string|unique:coupons,code,' . optional($this->coupon)->id . ',id',
            'discount' => 'required|numeric',
            'ar_name' => 'required|string',
            'en_name' => 'required|string',
        ];

    }
}

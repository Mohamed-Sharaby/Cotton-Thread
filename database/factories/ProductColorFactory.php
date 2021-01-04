<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\ProductColor;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductColorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProductColor::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $product = Product::where('is_ban',0)->get()->pluck('id')->toArray();
        return [
            'product_id'=>$product[array_rand($product)],
            'color'=> $this->randomColor(),
        ];
    }

    /**
     * @return string
     */
    private function randomColor()
    {
        $digitOne =  str_pad(dechex(mt_rand(0, 255)), 2, '0', STR_PAD_LEFT);
        $digitTwo =  str_pad(dechex(mt_rand(0, 255)), 2, '0', STR_PAD_LEFT);
        $digitThree =  str_pad(dechex(mt_rand(0, 255)), 2, '0', STR_PAD_LEFT);
        return $digitOne.$digitTwo.$digitThree;
    }
}

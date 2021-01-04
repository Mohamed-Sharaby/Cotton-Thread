<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\ProductSize;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductSizeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProductSize::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $product = Product::where('is_ban',0)->get()->pluck('id')->toArray();
        $sizes = ['XS','S','L','M','XL'];
        return [
            'product_id'=> $product[array_rand($product)],
            'size'=> $sizes[array_rand($sizes)],
        ];
    }
}

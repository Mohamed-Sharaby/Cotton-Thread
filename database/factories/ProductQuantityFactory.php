<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductQuantity;
use App\Models\ProductSize;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductQuantityFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProductQuantity::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $product = Product::where('is_ban',0)->get()->pluck('id')->toArray();
        $color = ProductColor::all()->pluck('id')->toArray();
        $size = ProductSize::all()->pluck('id')->toArray();
        return [
            'product_id'=>$product[array_rand($product)],
            'product_size_id'=>$size[array_rand($size)],
            'product_color_id'=>$color[array_rand($color)],
            'quantity'=>mt_rand(10,100),
            'is_ban'=>$this->faker->boolean,
        ];
    }
}

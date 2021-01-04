<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $subcategory = SubCategory::where('is_ban',0)->get()->pluck('id')->toArray();
        return [
            'ar_name'=>$this->faker->name,
            'en_name'=>$this->faker->name,
            'ar_details'=>$this->faker->name,
            'en_details'=>$this->faker->name,
            'price'=>$this->faker->numberBetween(100,959),
            'discount'=>$this->faker->numberBetween(0,180)/2,
            'subcategory_id'=>$subcategory[array_rand($subcategory)],
            'image'=>$this->faker->imageUrl(),
            'is_new'=>$this->faker->boolean,
        ];
    }
}

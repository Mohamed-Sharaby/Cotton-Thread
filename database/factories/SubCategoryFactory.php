<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubCategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SubCategory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $category = Category::where('is_ban',0)->get()->pluck('id')->toArray();
        return [
            'ar_name'=>$this->faker->name,
            'en_name'=>$this->faker->name,
            'image'=>$this->faker->imageUrl(),
            'category_id'=>$category[array_rand($category)]
        ];
    }
}

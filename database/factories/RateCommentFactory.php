<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\RateComment;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class RateCommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = RateComment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $users = User::where('is_ban',0)->get()->pluck('id')->toArray();
        $products = Product::where('is_ban',0)->get()->pluck('id')->toArray();
        return [
            'user_id'=>$users[array_rand($users)],
            'product_id'=>$products[array_rand($products)],
            'rate'=>mt_rand(1,10)/2,
            'comment'=> $this->faker->name,
            'is_ban'=>$this->faker->boolean
        ];
    }
}

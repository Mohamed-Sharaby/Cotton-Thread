<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\Region;
use Illuminate\Database\Eloquent\Factories\Factory;

class RegionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Region::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $cities = City::all()->pluck('id')->toArray();
        return [
            'ar_name' => $this->faker->name,
            'en_name' => $this->faker->name,
            'city_id' => $cities[array_rand($cities)],
        ];
    }
}

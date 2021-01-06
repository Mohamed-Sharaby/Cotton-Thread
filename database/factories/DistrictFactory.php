<?php

namespace Database\Factories;

use App\Models\District;
use App\Models\Region;
use Illuminate\Database\Eloquent\Factories\Factory;

class DistrictFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = District::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $regions = Region::all()->pluck('id')->toArray();
        return [
            'ar_name'=>$this->faker->name,
            'en_name'=>$this->faker->name,
            'region_id'=>$regions[array_rand($regions)],
        ];
    }
}

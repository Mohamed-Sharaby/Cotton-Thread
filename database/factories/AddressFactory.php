<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\District;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class AddressFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Address::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $users = User::where('is_ban',0)->get()->pluck('id')->toArray();
        $districts = District::all()->pluck('id')->toArray();
        return [
            'user_id'=>$users[array_rand($users)],
            'district_id'=>$districts[array_rand($districts)],
            'is_default'=>0,
            'name'=>$this->faker->name,
            'phone'=>'01'.$this->faker->numerify('#########'),
            'address'=>$this->faker->address,
            'lat'=>$this->faker->latitude,
            'lng'=>$this->faker->longitude,
        ];
    }
}

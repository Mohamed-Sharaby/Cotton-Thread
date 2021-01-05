<?php

namespace Database\Factories;

use App\Models\Gallery;
use Illuminate\Database\Eloquent\Factories\Factory;

class GalleryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Gallery::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $types = ['video','image'];
        $type = $types[array_rand($types)];
        return [
            'ar_name' => $this->faker->name,
            'en_name' => $this->faker->name,
            'ar_details' => $this->faker->text,
            'en_details' => $this->faker->text,
            'type' => $type,
            'url' => ($type == 'video')?$this->faker->url:$this->faker->imageUrl(),
            'is_ban' => $this->faker->boolean
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ad>
 */
class AdFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title = $this->faker->text(60);

        return [
            'title' => $title,
            'content' => $this->faker->text(500),
            'image' => 'https://1cars.org/wp-content/uploads/2016/09/Audi-80-800x450.jpg',
            'user_id' => rand(1, 1000),
            'slug' => Str::slug($title),
            'views' => rand(1,500),
            'category_id' => 1,
            'active' => 1,
            'vin' => Str::random(15),
            'price' => $this->faker->randomFloat(2, 120, 400),
            'model_id' => rand(1,4),
            'manufacturer_id' => rand(1, 4),
            'years' => rand(1987, 2003),
            'type_id' => rand(1, 4),
            'color_id' =>  rand(1, 10),
        ];
    }
}

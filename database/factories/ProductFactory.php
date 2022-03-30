<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'comment' => $this->faker->sentence(),
            'address' => rand(1, 47),
            'user_id' => rand(11, 51),
            'primary_category_id' => rand(1, 13)
        ];
    }
}

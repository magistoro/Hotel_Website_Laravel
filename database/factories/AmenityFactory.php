<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AmenityFactory extends Factory
{
    public function definition()
    {
        return [
            'title' => $this->faker->unique()->word,
        ];
    }
}

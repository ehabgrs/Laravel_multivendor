<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BrandFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'  		 => $this->faker->name(),
			'is_active' 	 => $this->faker->boolean(),
			'photo'          => $this->faker->image(),
        ];
    }
}

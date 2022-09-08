<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
use Faker\Generator as Faker;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' 		=> $this->faker->word(),
			'is_active' => $this->faker->boolean(),
			'slug' 		=> $this->faker->slug(),
			'parent_id' => $this->randomParent()
        ];
    }
	
	public function randomParent()
	{
		return Category::inRandomOrder()->whereNull('parent_id')->first();
	}
}

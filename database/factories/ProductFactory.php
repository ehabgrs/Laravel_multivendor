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
			'name' 					=> 	$this->faker->name(),
			'description' 			=>	$this->faker->paragraph(),
            'slug' 					=>	$this->faker->slug(),
			'price' 				=>  rand(5,1000),
			'selling_price' 		=> 	rand(5,1000),
			'sku' 					=>	$this->faker->word(),
			'manage_stock' 			=> 	false,
			'qty' 					=> 	$this->faker->numberBetween(0,100),
			'views' 				=> 	$this->faker->numberBetween(0,1000),
			'is_active' 			=>	$this->faker->boolean(),
		];
    }
	
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Admin;

use App\Models\Product;
use App\Models\Tag;
use App\Models\Brand;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       
		//to delete the old data if we seeded more than time , to not duplicate it
		Admin::truncate();
		
		\App\Models\Admin::factory(1)->create();
		
		/*Admin::create([
			'name' => 'ehab',
			'email' => 'h@h.com',
			'password' => bcrypt('123456789'),
		]);*/
		
		//call other seeding class
		$this->call(SettingDatabaseSeeder::class);
		
		\App\Models\Category::factory(5)->create();
		\App\Models\Category::factory(10)->create();
		Product::factory(10)->create();
		Brand::factory(10)->create();
		Tag::factory(10)->create();
    }
}

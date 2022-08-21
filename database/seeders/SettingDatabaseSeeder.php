<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Setting::setMany([
			'default_local' => 'ar',
			'default_timezone' => 'Africa/Cairo',
			'translatable' => [
				'store_name' => 'My store',
				'free_shipping' => 'Free shipping',
				'local_shipping' => 'Local shipping'
			],
	   ]);
    }
}

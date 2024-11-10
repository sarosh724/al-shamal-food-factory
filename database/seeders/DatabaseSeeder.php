<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@alshamalfoodfactory.com',
            'password' => Hash::make("admin")
        ]);

        $settingSeeder = new SettingSeeder();
        $settingSeeder->run();

        $pageSeeder = new PageSeeder();
        $pageSeeder->run();

        $sliderSeeder = new SliderSeeder();
        $sliderSeeder->run();

        $breadcrumbSeeder = new BreadCrumbSeeder();
        $breadcrumbSeeder->run();

    }
}

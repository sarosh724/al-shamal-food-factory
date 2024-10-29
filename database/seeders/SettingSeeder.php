<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            ['name' => 'Location', 'value' => NULL, 'slug' => 'location'],
            ['name' => 'Email', 'value' => NULL, 'slug' => 'email'],
            ['name' => 'Contact', 'value' => NULL, 'slug' => 'contact'],
            ['name' => 'Description', 'value' => NULL, 'slug' => 'description'],
            ['name' => 'Site Title', 'value' => NULL, 'slug' => 'site-title'],
            ['name' => 'Seo Keywords', 'value' => NULL, 'slug' => 'seo-keywords'],
            ['name' => 'Seo Description', 'value' => NULL, 'slug' => 'seo-description'],
        ];

        Setting::insert($settings);
    }
}

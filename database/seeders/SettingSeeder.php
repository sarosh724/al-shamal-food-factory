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
            ['name' => 'Contact 1', 'value' => NULL, 'slug' => 'contact-1'],
            ['name' => 'Contact 2', 'value' => NULL, 'slug' => 'contact-2'],
            ['name' => 'Working Days', 'value' => NULL, 'slug' => 'working-days'],
            ['name' => 'Closed Days', 'value' => NULL, 'slug' => 'closed-days'],
            ['name' => 'Map Iframe', 'value' => NULL, 'slug' => 'map-iframe'],
            ['name' => 'Years In Business', 'value' => NULL, 'slug' => 'years-in-business'],
            ['name' => 'Happy Clients', 'value' => NULL, 'slug' => 'happy-clients'],
            ['name' => 'Facebook Link', 'value' => NULL, 'slug' => 'facebook-link'],
            ['name' => 'Instagram Link', 'value' => NULL, 'slug' => 'instagram-link'],
            ['name' => 'Youtube Link', 'value' => NULL, 'slug' => 'youtube-link'],
            ['name' => 'Linkedin Link', 'value' => NULL, 'slug' => 'linkedin-link'],
            ['name' => 'Site Title', 'value' => NULL, 'slug' => 'site-title'],
            ['name' => 'Seo Keywords', 'value' => NULL, 'slug' => 'seo-keywords'],
            ['name' => 'Seo Description', 'value' => NULL, 'slug' => 'seo-description'],
        ];

        Setting::insert($settings);
    }
}

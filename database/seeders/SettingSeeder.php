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
            ['name' => 'Location', 'value' => 'New Industrial area, Zone 81, Street 15, Building 458', 'slug' => 'location', 'is_arabic_value' => 1],
            ['name' => 'Email', 'value' => 'info@alshamalfood.com', 'slug' => 'email', 'is_arabic_value' => 0],
            ['name' => 'Contact 1', 'value' => '+974 44880400', 'slug' => 'contact-1', 'is_arabic_value' => 0],
            ['name' => 'Contact 2', 'value' => '+974 44881400', 'slug' => 'contact-2', 'is_arabic_value' => 0],
            ['name' => 'Working Days', 'value' => 'Sat - Thu 8:00am - 5:00pm', 'slug' => 'working-days', 'is_arabic_value' => 1],
            ['name' => 'Closed Days', 'value' => 'Friday', 'slug' => 'closed-days', 'is_arabic_value' => 1],
            ['name' => 'Map Iframe', 'value' => NULL, 'slug' => 'map-iframe', 'is_arabic_value' => 0],
            ['name' => 'Map Link', 'value' => 'https://maps.app.goo.gl/imsAdbNR1Y6giH3W8', 'slug' => 'map-link', 'is_arabic_value' => 0],
            ['name' => 'Years In Business', 'value' => '15', 'slug' => 'years-in-business', 'is_arabic_value' => 0],
            ['name' => 'Happy Clients', 'value' => '500000', 'slug' => 'happy-clients', 'is_arabic_value' => 0],
            ['name' => 'Facebook Link', 'value' => NULL, 'slug' => 'facebook-link', 'is_arabic_value' => 0],
            ['name' => 'Instagram Link', 'value' => NULL, 'slug' => 'instagram-link', 'is_arabic_value' => 0],
            ['name' => 'Youtube Link', 'value' => NULL, 'slug' => 'youtube-link', 'is_arabic_value' => 0],
            ['name' => 'Linkedin Link', 'value' => NULL, 'slug' => 'linkedin-link', 'is_arabic_value' => 0],
            ['name' => 'Site Title', 'value' => NULL, 'slug' => 'site-title', 'is_arabic_value' => 0],
            ['name' => 'Seo Keywords', 'value' => NULL, 'slug' => 'seo-keywords', 'is_arabic_value' => 0],
            ['name' => 'Seo Description', 'value' => NULL, 'slug' => 'seo-description', 'is_arabic_value' => 0],
        ];

        Setting::insert($settings);
    }
}

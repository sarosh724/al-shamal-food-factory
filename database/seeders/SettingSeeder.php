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
            ['name' => 'Location', 'value' => 'New Industrial area, Zone 81, Street 15, Building 458', 'slug' => 'location'],
            ['name' => 'Email', 'value' => 'info@alshamalfood.com', 'slug' => 'email'],
            ['name' => 'Contact 1', 'value' => '+974 44880400', 'slug' => 'contact-1'],
            ['name' => 'Contact 2', 'value' => '+974 44881400', 'slug' => 'contact-2'],
            ['name' => 'Working Days', 'value' => 'Sat - Thu 8:00am - 5:00pm', 'slug' => 'working-days'],
            ['name' => 'Closed Days', 'value' => 'Friday', 'slug' => 'closed-days'],
            ['name' => 'Map Iframe', 'value' => NULL, 'slug' => 'map-iframe'],
            ['name' => 'Map Link', 'value' => 'https://maps.app.goo.gl/imsAdbNR1Y6giH3W8', 'slug' => 'map-link'],
            ['name' => 'Years In Business', 'value' => '15', 'slug' => 'years-in-business'],
            ['name' => 'Happy Clients', 'value' => '500000', 'slug' => 'happy-clients'],
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

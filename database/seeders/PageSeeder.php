<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pages = [
            ['title_english' => 'Who Are We ?', 'slug' => 'who-are-we'],
            ['title_english' => 'Company History', 'slug' => 'company-history'],
            ['title_english' => 'Our Mission', 'slug' => 'our-mission'],
            ['title_english' => 'Our Vision', 'slug' => 'our-vision'],
            ['title_english' => 'Why Us', 'slug' => 'why-us'],
            ['title_english' => 'Any Questions ?', 'slug' => 'any-question'],
            ['title_english' => 'See What Clients Are Saying', 'slug' => 'testimonial'],
            ['title_english' => 'Meet Our Team', 'slug' => 'meet-our-team'],
            ['title_english' => 'Contact', 'slug' => 'contact'],
            ['title_english' => 'Service', 'slug' => 'service'],
            ['title_english' => 'Appointment', 'slug' => 'appointment'],
            ['title_english' => 'Announcement Bar', 'slug' => 'announcement-bar']
        ];

        Page::insert($pages);
    }
}

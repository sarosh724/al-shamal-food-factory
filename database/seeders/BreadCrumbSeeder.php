<?php

namespace Database\Seeders;

use App\Models\BreadCrumb;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BreadCrumbSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $breadcrumbs = [
            ['slug' => 'about', 'subtitle_english' => 'about text comes here', 'subtitle_arabic' => 'about text comes here'],
            ['slug' => 'contact', 'subtitle_english' => 'contact text comes here', 'subtitle_arabic' => 'contact text comes here'],
            ['slug' => 'service', 'subtitle_english' => 'service text comes here', 'subtitle_arabic' => 'service text comes here'],
            ['slug' => 'product', 'subtitle_english' => 'product text comes here', 'subtitle_arabic' => 'product text comes here'],
            ['slug' => 'appointment', 'subtitle_english' => 'appointment text comes here', 'subtitle_arabic' => 'appointment text comes here']
        ];

        BreadCrumb::insert($breadcrumbs);
    }
}

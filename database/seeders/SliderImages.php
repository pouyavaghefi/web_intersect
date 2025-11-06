<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SliderImages extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('slider_images')->insert([
            [
                'title' => 'Professional IT Support Services',
                'subtitle' => 'Get expert help for all your technology needs. Available 24/7.',
                'image' => 'slide1.jpg',
                'button_text' => 'Explore Services',
                'button_link' => '/services',
                'order' => 1,
            ],
            [
                'title' => 'Custom Web Development',
                'subtitle' => 'Beautiful, responsive websites tailored to your business needs.',
                'image' => 'slide2.jpg',
                'button_text' => 'View Packages',
                'button_link' => '/packages',
                'order' => 2,
            ],
            [
                'title' => 'Cloud Solutions',
                'subtitle' => 'Secure and scalable cloud services for businesses of all sizes.',
                'image' => 'slide3.jpg',
                'button_text' => 'Learn More',
                'button_link' => '/cloud',
                'order' => 3,
            ],
        ]);
    }
}

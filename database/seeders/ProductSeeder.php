<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'name' => 'Chat Room',
                'price' => 10,
                'description' => 'Chat with your friends and family members, make private/public channels and groups.',
                'image' => 'chat-room.jpg',
            ],
            [
                'name' => 'File Manager',
                'price' => 12,
                'description' => 'A simple and friendly dashboard for you to save your important assets in any format.',
                'image' => 'file-manager.jpg',
            ],
            [
                'name' => 'Resume Maker',
                'price' => 5,
                'description' => 'Make your custom resume with our ready-to-use templates.',
                'image' => 'file-manager.jpg',
            ],
            [
                'name' => 'Survey Builder',
                'price' => 7,
                'description' => 'Tons of survey and quiz templates for you to get customized information.',
                'image' => 'survey-builder.jpg',
            ],
            [
                'name' => 'Code Reminder',
                'price' => 3,
                'description' => 'If you ever want to remember or save a custom code, script or command.',
                'image' => 'code-reminder.jpg',
            ],
        ]);
    }
}

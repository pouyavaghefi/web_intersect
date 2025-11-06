<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Pouya',
            'email' => 'vagefipouya@yahoo.com',
            'username' => 'vagefipouya',
            'email_verified_at' => now(),
            'password' => Hash::make('Slimshady123@#$'),
            'super_user' => 1
        ]);
    }
}

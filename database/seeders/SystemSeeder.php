<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SystemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Sample Users
        \App\Models\User::create([
            'name' => 'RightStar Admin',
            'email' => 'admin@rightstar.com',
            'password' => \Illuminate\Support\Facades\Hash::make('password'),
        ]);

        \App\Models\User::create([
            'name' => 'Sample User',
            'email' => 'user@example.com',
            'password' => \Illuminate\Support\Facades\Hash::make('password'),
        ]);

        // Sample Books
        \App\Models\Book::create([
            'title' => 'Holy Bible — Swahili (Habari Njema)',
            'category' => 'Bibles',
            'price' => 28000,
            'stock' => 320,
            'language' => 'Swahili',
            'description' => 'A Swahili translation of the Holy Bible.',
        ]);

        \App\Models\Book::create([
            'title' => 'Steps to Christ (Hatua za Kristo)',
            'category' => 'Adventist Publications',
            'price' => 12000,
            'stock' => 22,
            'language' => 'Swahili',
            'description' => 'A classic work on Christian living.',
        ]);

        \App\Models\Book::create([
            'title' => 'The Great Controversy',
            'category' => 'Adventist Publications',
            'price' => 18000,
            'stock' => 180,
            'language' => 'English',
            'description' => 'An analysis of history from a Christian perspective.',
        ]);
    }
}

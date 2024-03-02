<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Place;
use App\Models\Booking;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory()->create([
            'name' => 'Diandra Farel',
            'email' => 'diandra@gmail.com',
            'password' => '123456',
            'is_instructor' => 0,
        ]);

        User::factory()->create([
            'name' => 'Budiono Siregar',
            'email' => 'budi@gmail.com',
            'password' => '123456',
            'is_instructor' => 1,
        ]);

        Category::factory()->create([
            'name' => 'Wisata Alam',
        ]);
        Category::factory()->create([
            'name' => 'Budaya',
        ]);
        Category::factory()->create([
            'name' => 'Bersejarah',
        ]);

        Place::factory()->create([
            'instructor_id' => 1,
            'category_id' => 1,
            'name' => 'Danau Banda Neira',
            'price' => 10000,
            'description' => 'lorem ipsum',
            'image' => 'banda-neira.webp'
        ]);

    }
}

<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $authors = Author::factory(30)->create();
        Book::factory(100)->create()->each(function ($book) use ($authors) {
            $randomAuthors = $authors->random(rand(1, 3));
            $book->authors()->attach($randomAuthors->pluck('id')->toArray());
        });
    }
}

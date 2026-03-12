<?php

namespace App\Data\Book;

use Spatie\LaravelData\Data;

class BookStoreData extends Data
{
    public function __construct(
        public string $title,
        public ?string $description,
        public array $author_ids,
    ) {
    }
}

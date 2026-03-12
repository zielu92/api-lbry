<?php

namespace App\Data\Book;

use Spatie\LaravelData\Data;

class BookUpdateData extends Data
{
    public function __construct(
        public string $title,
        public ?string $description,
    ) {
    }
}

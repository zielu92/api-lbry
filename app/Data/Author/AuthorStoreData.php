<?php

namespace App\Data\Author;

use Spatie\LaravelData\Data;

class AuthorStoreData extends Data
{
    public function __construct(
        public string $name,
        public ?string $last_book_title = null,
    ) {
    }
}

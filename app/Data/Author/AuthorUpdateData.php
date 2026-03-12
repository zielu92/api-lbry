<?php

namespace App\Data\Author;

use Spatie\LaravelData\Data;

class AuthorUpdateData extends Data
{
    public function __construct(
        public ?string $name = null,
        public ?string $last_book_title = null,
    ) {
    }
}

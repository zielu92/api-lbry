<?php

namespace App\Data\Author;

use Spatie\LaravelData\Data;

class AuthorIndexData extends Data
{
    public function __construct(
        public ?string $search = null,
        public int $page = 1,
        public int $per_page = 10,
    ) {
    }
}

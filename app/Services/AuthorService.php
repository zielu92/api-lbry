<?php

namespace App\Services;

use App\Data\Author\AuthorIndexData;
use App\Data\Author\AuthorStoreData;
use App\Data\Author\AuthorUpdateData;
use App\Models\Author;
use Illuminate\Pagination\LengthAwarePaginator;

class AuthorService
{
    /**
     * Get all authors with optional search filtering.
     */
    public function getAll(AuthorIndexData $data): LengthAwarePaginator
    {
        return Author::query()
            ->with('books')
            ->searchByBookTitle($data->search)
            ->paginate($data->per_page);
    }

    /**
     * Get a single author by ID.
     */
    public function getById(Author $author): Author
    {
        return $author->load('books');
    }

    /**
     * Create a new author.
     */
    public function create(AuthorStoreData $data): Author
    {
        return Author::create($data->toArray());
    }

    /**
     * Update an author.
     */
    public function update(Author $author, AuthorUpdateData $data): Author
    {
        $author->update(array_filter($data->toArray()));

        return $author->refresh();
    }

    /**
     * Delete an author.
     */
    public function delete(Author $author): void
    {
        $author->delete();
    }
}

<?php

namespace App\Services;

use App\Data\Book\BookStoreData;
use App\Data\Book\BookUpdateData;
use App\Jobs\UpdateAuthorLastBook;
use App\Models\Book;
use Illuminate\Pagination\LengthAwarePaginator;

class BookService
{
    /**
     * Get all books with pagination.
     */
    public function getAll(int $perPage = 10): LengthAwarePaginator
    {
        return Book::with('authors')->paginate($perPage);
    }

    /**
     * Get a single book by ID.
     */
    public function getById(Book $book): Book
    {
        return $book->load('authors');
    }

    /**
     * Create a new book with associated authors.
     */
    public function create(BookStoreData $data): Book
    {
        $book = Book::create([
            'title'       => $data->title,
            'description' => $data->description,
        ]);

        $book->authors()->sync($data->author_ids);

        // Dispatch job to update author's last book
        UpdateAuthorLastBook::dispatch($book);

        return $book->load('authors');
    }

    /**
     * Update an existing book.
     */
    public function update(Book $book, BookUpdateData $data): Book
    {
        $book->update([
            'title'       => $data->title,
            'description' => $data->description,
        ]);

        return $book->load('authors');
    }

    /**
     * Delete a book.
     */
    public function delete(Book $book): bool
    {
        return $book->delete();
    }
}

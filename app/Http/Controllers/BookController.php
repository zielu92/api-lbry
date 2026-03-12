<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookStoreRequest;
use App\Http\Requests\BookUpdateRequest;
use App\Http\Resources\BookCollection;
use App\Http\Resources\BookResource;
use App\Services\BookService;
use App\Models\Book;
use Illuminate\Http\Response;

class BookController extends Controller
{
    public function __construct(private BookService $bookService)
    {
    }

    /**
     * Display a listing of the books.
     * @authenticated
     */
    public function index(): BookCollection
    {
        $books = $this->bookService->getAll();

        return new BookCollection($books);
    }

    /**
     * Store a newly created book in storage.
     * @unauthenticated
     */
    public function store(BookStoreRequest $request): BookResource
    {
        $book = $this->bookService->create($request->toDTO());

        return new BookResource($book);
    }

    /**
     * Display the specified book.
     * @unauthenticated
     */
    public function show(Book $book): BookResource
    {
        $book = $this->bookService->getById($book);

        return new BookResource($book);
    }

    /**
     * Update the specified book in storage.
     * @unauthenticated
     */
    public function update(BookUpdateRequest $request, Book $book): BookResource
    {
        $book = $this->bookService->update($book, $request->toDTO());

        return new BookResource($book);
    }

    /**
     * Remove the specified book from storage.
     * @unauthenticated
     */
    public function destroy(Book $book): Response
    {
        $this->bookService->delete($book);

        return response()->noContent();
    }
}

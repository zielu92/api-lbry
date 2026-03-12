<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthorIndexRequest;
use App\Http\Requests\AuthorStoreRequest;
use App\Http\Requests\AuthorUpdateRequest;
use App\Http\Resources\AuthorCollection;
use App\Http\Resources\AuthorResource;
use App\Models\Author;
use App\Services\AuthorService;
use Illuminate\Http\Response;

class AuthorController extends Controller
{
    public function __construct(private AuthorService $authorService)
    {
    }

    /**
     * Display a listing of the authors.
     * @unauthenticated
     */
    public function index(AuthorIndexRequest $request): AuthorCollection
    {
        $authors = $this->authorService->getAll($request->toDTO());

        return new AuthorCollection($authors);
    }

    /**
     * Store a newly created author in storage.
     * @unauthenticated
     */
    public function store(AuthorStoreRequest $request): AuthorResource
    {
        $author = $this->authorService->create($request->toDTO());

        return new AuthorResource($author);
    }

    /**
     * Display the specified author.
     * @unauthenticated
     */
    public function show(Author $author): AuthorResource
    {
        $author = $this->authorService->getById($author);

        return new AuthorResource($author);
    }

    /**
     * Update the specified author in storage.
     * @unauthenticated
     */
    public function update(AuthorUpdateRequest $request, Author $author): AuthorResource
    {
        $author = $this->authorService->update($author, $request->toDTO());

        return new AuthorResource($author);
    }

    /**
     * Remove the specified author from storage.
     * @unauthenticated
     */
    public function destroy(Author $author): Response
    {
        $this->authorService->delete($author);

        return response()->noContent();
    }
}

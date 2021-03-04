<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Http\Resources\BookResource;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \App\Http\Resources\BookResource
     */
    public function index()
    {
        return BookResource::collection(Book::with('authors')->paginate(25));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\BookRequest $request
     * @return \App\Http\Resources\BookResource
     */
    public function store(BookRequest $request)
    {
        $book = Book::create($request->validated());
        // $book->authors()->createMany($request->authors); // use for create new authors
        if (isset($request->authors))
            $book->authors()->attach($request->authors);
        return new BookResource($book);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \App\Http\Resources\BookResource
     */
    public function show(Book $book)
    {
        return new BookResource($book);
    }

    /**
     * Display the specified resource by author.
     *
     * @param int $authorId
     * @return \App\Http\Resources\BookResource
     */
    public function showByAuthor(int $authorId)
    {
        $author = Author::findOrFail($authorId);
        return BookResource::collection($author->books()->paginate(25));
    }
}

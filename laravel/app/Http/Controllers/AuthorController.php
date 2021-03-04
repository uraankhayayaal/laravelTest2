<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthorRequest;
use App\Http\Resources\AuthorResource;
use App\Models\Author;

class AuthorController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\AuthorRequest $request
     * @return \App\Http\Resources\AuthorResource
     */
    public function store(AuthorRequest $request)
    {
        $author = Author::create($request->validated());
        return new AuthorResource($author);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Author $author
     * @return \App\Http\Resources\AuthorResource
     */
    public function show(Author $author)
    {
        return new AuthorResource($author);
    }
}

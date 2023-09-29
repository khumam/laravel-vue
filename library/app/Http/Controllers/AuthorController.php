<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthorEditRequest;
use App\Http\Requests\AuthorStoreRequest;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $authors = Author::with('books')->latest()->filter(compact('request'))->paginate(10)->withQueryString();
        $data = [
            'title' => 'Author' 

        ];
        return view('author', compact('data', 'authors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AuthorStoreRequest $request)
    {

        Author::create($request->all());
        return redirect()->route('author.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Author $author)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AuthorEditRequest $request, Author $author)
    {
        $author->update($request->all());
        return redirect()->route('author.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
        $author->books()->delete();
        $author->delete();
        // return redirect()->route('author.index');
    }
}

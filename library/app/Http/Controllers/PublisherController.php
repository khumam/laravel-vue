<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use Illuminate\Http\Request;

class PublisherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $publishers = Publisher::with('books')->latest()->filter(compact('request'))->paginate(10)->withQueryString();
        $data = [
            'title' => 'Publisher' 

        ];
        return view('publisher', compact('data', 'publishers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // abort(404);
        // return view('admin.form_publisher');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Publisher $publisher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Publisher $publisher)
    {
        //
    }

    /**
     * Update the specified resource in storage.
    */
    public function update(Request $request, Publisher $publisher)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
    */
    public function destroy(Publisher $publisher)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use Illuminate\Http\Request;

class PublisherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $publishers = Publisher::with('books')->get();

        
        return view('admin.publisher.index' , compact('publishers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.publisher.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|string|max:64',
            'email' => 'required',
            'phone_number' => 'required|max:15',
            'address' => 'required|string',
        ]);
        $publisher = new Publisher;
        $publisher -> name = $request -> name;
        $publisher -> email = $request -> email;
        $publisher -> phone_number = $request -> phone_number;
        $publisher -> address = $request -> address;
        $publisher -> save();
        return redirect('/publishers');
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
    public function edit($id)
    {
        $publisher = Publisher::find($id);
        return view('admin.publisher.edit', compact('publisher'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required|string|max:64',
            'email' => 'required',
            'phone_number' => 'required|max:15',
            'address' => 'required|string',
        ]);
        $publisher = Publisher::find($id);
        $publisher -> name = $request -> name;
        $publisher -> email = $request -> email;
        $publisher -> phone_number = $request -> phone_number;
        $publisher -> address = $request -> address;
        $publisher -> update();
        return redirect('/publishers');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $publisher = Publisher::find($id);
        $publisher -> delete();
        return redirect('/publishers');
    }
}

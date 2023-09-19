<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        
        $catalogs = Catalog::with('books')->latest()->filter(compact('request'))->paginate(10)->withQueryString();
        $data = [
            'title' => 'Catalog' 
        ];
        return view('catalog', compact('data', 'catalogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.form_catalog');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $valid = $request->validate([
            "name" => 'required|max:255'
        ]);
        Catalog::create($valid);
        return redirect()->route('catalog.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Catalog $catalog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Catalog $catalog)
    {

        return view('admin.form_catalog', compact('catalog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Catalog $catalog)
    {

        $valid = $request->validate([
            "name" => 'required|max:255'
        ]);

        $catalog->update($valid);
        return redirect()->route('catalog.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Catalog $catalog)
    {
        // dd('masuk');
        $catalog->delete();
        return redirect()->route('catalog.index');
    }
}

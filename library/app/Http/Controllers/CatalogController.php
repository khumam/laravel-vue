<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $catalogs = Catalog::with('books')->get();

        //return $catalogs;
        return view('admin.catalog.index' , compact('catalogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.catalog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|string|max:64'
        ]);
        $catalog = new Catalog;
        $catalog -> name = $request -> name;
        $catalog -> save();
        return redirect('/catalogs');
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
    public function edit($id)
    {
        $catalog = Catalog::find($id);
        return view('admin.catalog.edit', compact('catalog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required|string|max:64'
        ]);
        $catalog = Catalog::find($id);
        $catalog -> name = $request -> name;
        $catalog -> update();
        return redirect('/catalogs');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $catalog = Catalog::find($id);
        $catalog -> delete();
        return redirect('/catalogs');
    }
}

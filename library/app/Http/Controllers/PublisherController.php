<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

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
        return view('admin.form_publisher');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $valid = $request->validate([
                "name" => 'required|max:255',
                "email"=> 'required|string|email|max:255|unique:publishers',
                "phone_number"=> 'required|numeric|digits_between:1,13',
                "address"=> 'required'
            ]);

            Publisher::create($valid);
            return redirect()->route('publisher.index');
    
            // Lakukan tindakan jika validasi berhasil
        } catch (ValidationException $e) {

            // dd($e);
            // Tangani validasi yang gagal di sini
            return redirect()->back()->withErrors($e->errors())->withInput();
        }
        
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
        return view('admin.form_publisher', compact('publisher'));
    }

    /**
     * Update the specified resource in storage.
    */
    public function update(Request $request, Publisher $publisher)
    {
        try {
            $valid = $request->validate([
                "name" => 'required|max:255',
                "email"=> ['required', 'string', 'email', 'max:255', Rule::unique('publishers')->ignore($publisher->id)],
                "phone_number"=> 'required|numeric|digits_between:1,13',
                "address"=> 'required'
            ]);

            $publisher->update($valid);
            return redirect()->route('publisher.index');
    
            // Lakukan tindakan jika validasi berhasil
        } catch (ValidationException $e) {

            // dd($e);
            // Tangani validasi yang gagal di sini
            return redirect()->back()->withErrors($e->errors())->withInput();
        }
        
    }

    /**
     * Remove the specified resource from storage.
    */
    public function destroy(Publisher $publisher)
    {
        $publisher->delete();
        return redirect()->route('publisher.index');
    }
}

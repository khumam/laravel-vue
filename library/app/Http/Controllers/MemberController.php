<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Member;
use App\Models\Publisher;
use App\Models\User;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'title' => 'Member' 

        ];

        // $books = Book::all();
        // $publishers = Publisher::with('books')->get();

        $query1 = User::selectRaw('*, users.id as user_id, users.name as user_name')->join('members', 'users.member_id', '=', 'members.id')->get();

        $query2 = User::selectRaw('*, users.id as user_id, users.name as user_name')->leftJoin('members', 'users.member_id', '=', 'members.id')->where('remember_token','!=', null)->get();

        $query3 = User::selectRaw('*, users.id as user_id, users.name as user_name')->leftJoin('members', 'users.member_id', '=', 'members.id')->orderBy('user_name', 'desc')->get();
        
        return $query3;

        return view('member', $data);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Member $member)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Member $member)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Member $member)
    {
        //
    }
}

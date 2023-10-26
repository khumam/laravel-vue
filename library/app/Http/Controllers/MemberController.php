<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Requests\MemberEditRequest;
use App\Http\Requests\MemberStoreRequest;
use App\Models\Book;
use App\Models\Member;
use App\Models\Publisher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function api(Request $request)
    {
        $members = Member::orderBy('id', 'desc')->filter(compact('request'))->get();
        $datatables = datatables()->of($members)->addIndexColumn()->editColumn('created_at', function(Member $member) {
            return convert_date($member->created_at);
        })->make(true);
        return $datatables;
    }

    public function index()
    {
        $data = [
            'title' => 'Member' 

        ];

        // $books = Book::all();
        // $publishers = Publisher::with('books')->get();

        // $query1 = User::selectRaw('*, users.id as user_id, users.name as user_name')->join('members', 'users.member_id', '=', 'members.id')->get();

        // $query2 = User::selectRaw('*, users.id as user_id, users.name as user_name')->leftJoin('members', 'users.member_id', '=', 'members.id')->where('remember_token','!=', null)->get();

        // $query3 = User::selectRaw('*, users.id as user_id, users.name as user_name')->leftJoin('members', 'users.member_id', '=', 'members.id')->orderBy('user_name', 'desc')->get();
        
        // return $query3;
        return view('member', compact('data'));
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
    public function store(MemberStoreRequest $request)
    {
        // dd($request);
        DB::transaction(function () use ($request) {
            try {
                $data = $request->all();

                $user = new User([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'password' => Hash::make($data['password'])
                ]);
            
                $member = new Member([
                    'name' => $data['name'],
                    'gender' => $data['gender'],
                    'phone_number' => $data['phone_number'],
                    'address' => $data['address'],
                    'email' => $data['email'],
                ]);
            
                // Simpan User dan Member dalam transaksi
                $member->save();
                $member->user()->save($user);
            
                // Jika semuanya berhasil, commit transaksi
                DB::commit();
            } catch (\Exception $e) {
                dd($e);
                // Jika terjadi kesalahan, rollback transaksi
                DB::rollback();
                // Handle kesalahan sesuai kebutuhan Anda
            }
        });
        // Member::create($request->all());
        // return redirect()->route('member.index');
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
    public function update(MemberEditRequest $request, Member $member)
    {

        DB::transaction(function () use ($request, $member) {
            try {
                $data = $request->all();

                $member->name = $data['name'];
                $member->gender = $data['gender'];
                $member->phone_number = $data['phone_number'];
                $member->address = $data['address'];
                $member->email = $data['email'];

                $member->user->name = $data['name'];
                $member->user->email = $data['email'];
                $member->user->password = Hash::make($data['password']);

                $member->user->save();
                
                $member->save();
            
                // Jika semuanya berhasil, commit transaksi
                DB::commit();
            } catch (\Exception $e) {
                dd($e);
                // Jika terjadi kesalahan, rollback transaksi
                DB::rollback();
                // Handle kesalahan sesuai kebutuhan Anda
            }
        });

        // return redirect()->route('member.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Member $member)
    {   
        

        DB::transaction(function () use ($member) {
            try {
                $user = Auth::user();

                if ($user->id == $member->user->id) {
                    throw new \Exception('User saat ini sedang login.');
                }

                $member->user()->delete();
                $member->delete();
            
                // Jika semuanya berhasil, commit transaksi
                DB::commit();
            } catch (\Exception $e) {
                dd($e);
                // Jika terjadi kesalahan, rollback transaksi
                DB::rollback();

                return response('An internal server error occurred.', 500);
                // Handle kesalahan sesuai kebutuhan Anda
            }
        });
        
    }
}

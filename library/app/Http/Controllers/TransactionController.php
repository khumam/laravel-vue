<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransactionEditRequest;
use App\Http\Requests\TransactionStoreRequest;
use App\Models\Book;
use App\Models\Member;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function api(Request $request)
    {
        $transactions = Transaction::with(['member','transactionDetail.book'])->orderBy('id', 'desc')->filter(compact('request'))->get();
        foreach ($transactions as $key => $transaction) {
            $transaction->namaPeminjam = $transaction->member->name;

            $startDate = new DateTime($transaction->date_start);
            $endDate = new DateTime($transaction->date_end);
            $interval = $startDate->diff($endDate);
            $days = $interval->days;
            $transaction->lamaPinjam = $days;

            $transaction->totalBuku = 0;
            $transaction->totalBayar = 0;
            foreach ($transaction->transactionDetail as $k => $detail) {
                $transaction->totalBuku += $detail->qty;
                $transaction->totalBayar += ($detail->book->price * $detail->qty);
            }
        }
        $datatables = datatables()->of($transactions)->editColumn('status', function(Transaction $transaction) {
            return $transaction->status == 'true' ? 'Sudah Dikembalikan' : 'Belum Dikembalikan';
        })->editColumn('totalBayar', function(Transaction $transaction) {
            return rupiah($transaction->totalBayar);
        })->editColumn('created_at', function(Transaction $transaction) {
            return convert_date($transaction->created_at);
        })->make(true);
        return $datatables;
    }
    public function index()
    {
        return view('peminjaman');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $members = Member::all();
        $books = Book::where('qty', '>', 0)->orderBy('title', 'asc')->get();       
        return view('admin.form_peminjaman', compact('members', 'books'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TransactionStoreRequest $request)
    {
        // dd($request->all());
        DB::transaction(function () use ($request) {
            try {
                $data = $request->all();

                $transaction = new Transaction([
                    'member_id' => $data['anggota'],
                    'date_start' => $data['date_start'],
                    'date_end'=> $data['date_end'],
                    'status' => "false"
                ]);

                $transaction->save();
                
                foreach($data['books'] as $book){

                    $detail = new TransactionDetail([
                        'book_id' => $book,
                        'qty'=> 1
                    ]);

                    $transaction->transactionDetail()->save($detail);

                    $get_book = Book::find($book);
                    $get_book->qty -=  1;
                    $get_book->save();
                }
                
                // Jika semuanya berhasil, commit transaksi
                DB::commit();
            } catch (\Exception $e) {
                dd($e);
                // Jika terjadi kesalahan, rollback transaksi
                DB::rollback();
                // Handle kesalahan sesuai kebutuhan Anda
            }
        });

        return redirect()->route('transaction.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        $transaction->load(['member', 'transactionDetail.book']);
        // data books yang dimiliki di transaksi ini
        $books = [];
        foreach ($transaction->transactionDetail as $key => $value) {
            array_push($books, $value->book);
        }

        return view('admin.detail_peminjaman', compact('transaction', 'books'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        $transaction->load('transactionDetail.book');
        
        // data books yang dimiliki di transaksi ini
        $selectedBooks = [];
        foreach ($transaction->transactionDetail as $key => $value) {
            array_push($selectedBooks, $value->book->id);
        }

        // return $selectedBooks;
        $members = Member::all();
        $books = Book::where('qty', '>', 0)->orderBy('title', 'asc')->get();
        return view('admin.form_peminjaman', compact('transaction', 'members','books', 'selectedBooks'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TransactionEditRequest $request, Transaction $transaction)
    {
        DB::transaction(function () use ($request, $transaction) {
            try {
                $transaction->load('transactionDetail');
                $data = $request->all();
                $transaction->member_id = $data['anggota'];
                $transaction->date_start = $data['date_start'];
                $transaction->date_end = $data['date_end'];
                

                $books = $data['books']??[];

                foreach ($transaction->transactionDetail as $key => $value) {
                    $index = array_search(strval($value->book_id),$books);
                    if (is_int($index)) {

                        // mengembalikan buku
                        if ($transaction->status == 'false' && $data['status'] == 'true') {
                            $update_book = Book::find($value->book_id);
                            $update_book->qty +=  1;
                            $update_book->save();
                        }

                        array_splice($books,$index,1);
                    }
                    else{
                        

                        DB::table('transaction_details')->where('id', $value->id)->delete();
                        
                        $update_book = Book::find($value->book_id);
                        $update_book->qty +=  1;
                        $update_book->save();

                    }
                }

                $transaction->status = $data['status'];
                $transaction->save();

                foreach($books as $book){

                    $detail = new TransactionDetail([
                        'book_id' => $book,
                        'qty'=> 1
                    ]);

                    $transaction->transactionDetail()->save($detail);

                    $get_book = Book::find($book);
                    $get_book->qty -=  1;
                    $get_book->save();
                }
                            
                // Jika semuanya berhasil, commit transaksi
                DB::commit();
            } catch (\Exception $e) {
                // dd($e);
                // Jika terjadi kesalahan, rollback transaksi
                DB::rollback();
                // Handle kesalahan sesuai kebutuhan Anda
            }
        });

        return redirect()->route('transaction.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        DB::transaction(function () use ($transaction) {
            try {

                $transaction->load('transactionDetail.book');

                foreach ($transaction->transactionDetail as $key => $value) {
                        $update_book = Book::find($value->book_id);
                        $update_book->qty +=  1;
                        $update_book->save();
                }

                $transaction->transactionDetail()->delete();
                $transaction->delete();
            
                // Jika semuanya berhasil, commit transaksi
                DB::commit();
            } catch (\Exception $e) {
                dd($e);
                // Jika terjadi kesalahan, rollback transaksi
                DB::rollback();
                // Handle kesalahan sesuai kebutuhan Anda

                return response($e, 500);
            }
        });
        
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Book;
use App\Models\Publisher;
use App\Models\Author;
use App\Models\Catalog;
use App\Models\Transaction;
use App\Models\TransactionDetail;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //$members = Member::with('user')->get();
        //$books = Book::with('publisher')->get();
        //$publishers = Publisher::with('books')->get();
        //$catalogs = Catalog::with('books')->get();
        //$authors = Author::with('books')->get();

        //return $authors;

        //data1
        $data1 = Member::select('*')
                    ->join('users', 'users.member_id', '=', 'members.id')
                    ->get();

        //data2
        $data2 = Member::select('*')
                    ->leftjoin('users', 'users.member_id', '=', 'members.id')
                    ->where('users.id', NULL)
                    ->get();

        //data3
        $data3 = Transaction::select('members.id','members.name')
                    ->rightjoin('members','members.id','=','transactions.member_id')
                    ->where('transactions.member_id',Null)
                    ->get();
        
        //data4
        $data4 = Member::select('members.id','members.name','members.phone_number')
                    ->join('transactions','transactions.member_id','=','members.id')
                    ->orderBy('members.id','asc')
                    ->get();

        //data5
       
        $data5 = Member::select('members.id', 'members.name', 'members.phone_number')
                    ->leftJoin('transactions', 'transactions.member_id', '=', 'members.id')
                    ->leftJoin('transaction_details', 'transaction_details.transaction_id', '=', 'transactions.id')
                    ->groupBy('members.id', 'members.name', 'members.phone_number')
                    ->havingRaw('count(transaction_details.transaction_id) > 1')
                    ->get();

        //data6
        $data6 = Member::select('members.name','members.phone_number', 'members.address', 'transactions.date_start','transactions.date_end')
                    ->leftJoin('transactions','transactions.member_id','=','members.id')
                    ->leftJoin('transaction_details', 'transaction_details.transaction_id', '=', 'transactions.id')
                    ->get();

                    
        //data7
        $data7 = Member::select('members.name','members.phone_number', 'members.address', 'transactions.date_start','transactions.date_end')
                    ->leftJoin('transactions','transactions.member_id','=','members.id')
                    ->leftJoin('transaction_details', 'transaction_details.transaction_id', '=', 'transactions.id')
                    ->whereMonth('date_end' ,'=' , '6')
                    ->get();

        //data8
        $data8 = Member::select('members.name','members.phone_number', 'members.address', 'transactions.date_start','transactions.date_end')
                    ->leftJoin('transactions','transactions.member_id','=','members.id')
                    ->leftJoin('transaction_details', 'transaction_details.transaction_id', '=', 'transactions.id')
                    ->whereMonth('date_start' ,'=' , '5')
                    ->get();

        //data9
        $data9 = Member::select('members.name','members.phone_number', 'members.address', 'transactions.date_start','transactions.date_end')
                    ->leftJoin('transactions','transactions.member_id','=','members.id')
                    ->leftJoin('transaction_details', 'transaction_details.transaction_id', '=', 'transactions.id')
                    ->whereMonth('date_start' ,'=' , '6')
                    ->whereMonth('date_end' ,'=' , '6')
                    ->get();

        //data10
        $data10 = Member::select('members.name','members.phone_number', 'members.address', 'transactions.date_start','transactions.date_end')
                    ->leftJoin('transactions','transactions.member_id','=','members.id')
                    ->leftJoin('transaction_details', 'transaction_details.transaction_id', '=', 'transactions.id')
                    ->where('members.address','LIKE','%Bandung%')
                    ->get();

        //data11
        $data11 = Member::select('members.name','members.phone_number', 'members.address', 'transactions.date_start','transactions.date_end')
                    ->leftJoin('transactions','transactions.member_id','=','members.id')
                    ->leftJoin('transaction_details', 'transaction_details.transaction_id', '=', 'transactions.id')
                    ->where('members.address','LIKE','%Bandung%')
                    ->where('members.gender','=','F')
                    ->get();

        //data12
        $data12 = Member::select('members.name','members.phone_number','members.address', 'transactions.date_start','transactions.date_end', 'transaction_details.book_id')
                    ->leftJoin('transactions','transactions.member_id','=','members.id')
                    ->leftJoin('transaction_details', 'transaction_details.transaction_id', '=', 'transactions.id')
                    ->where('transaction_details.qty','>','1')
                    ->get();

        //data13
        $data13 = Member::select('members.name','members.phone_number','members.address','transactions.date_start','transactions.date_end','books.isbn','transaction_details.qty','books.title','books.price')
                    ->selectRaw('transaction_details.qty * books.price AS total_price')
                    ->leftJoin('transactions','transactions.member_id','=','members.id')
                    ->leftJoin('transaction_details', 'transaction_details.transaction_id', '=', 'transactions.id')
                    ->leftJoin('books','books.id','=','transaction_details.book_id')
                    ->get();

        //data14
        $data14 = Member::select('members.name','members.phone_number', 'transactions.date_start','transactions.date_end','transaction_details.qty','books.title','authors.name','publishers.name','catalogs.name')
                    ->leftJoin('transactions','transactions.member_id','=','members.id')
                    ->leftJoin('transaction_details', 'transaction_details.transaction_id', '=', 'transactions.id')
                    ->leftJoin('books','books.id','=','transaction_details.book_id')
                    ->leftJoin('authors','authors.id','=','books.author_id')
                    ->leftJoin('catalogs','catalogs.id','=','books.catalog_id')
                    ->leftJoin('publishers','publishers.id','=','books.publisher_id')
                    ->get();

        //data15
        $data15 = Catalog::select('catalogs.*', 'books.title')
                    ->rightJoin('books','books.catalog_id','=','catalogs.id')
                    ->get();

        //data16
        $data16 = Book::select('books.*','publishers.name')
                    ->leftJoin('publishers','publishers.id','=','books.publisher_id')
                    ->get();
        
        //data17
        $data17 = Book::select('*')
                    ->where('publisher_id','=','2')->count();

        //data18
        $data18 = Book::select('*')
                    ->where('price','>',"80000")
                    ->get();
                    
        //data19
        $data19 = Book::select('books.*')
                    ->join('publishers','publishers.id','=','books.publisher_id')
                    ->where('publishers.name','=','Mitchell Group')
                    ->where('books.qty','>',15)
                    ->get();

        //data20
        $data20 = Member::select('*')
                    ->whereMonth('created_at','=',6)
                    ->get();

        return $data20; 
        return view('home');
    }
}

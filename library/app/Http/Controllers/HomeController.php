<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Member;
use App\Models\Publisher;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $total_anggota = Member::count();
        $total_buku = Book::count();
        $total_penerbit = Publisher::count();
        $total_peminjaman = Transaction::whereYear('date_start', date('Y'))->count();

        $data_donut = Publisher::select(['name as label'])->withCount(['books'])->having('books_count', '>', 0)->get();
        $labels = [];
        $total = [];
        foreach ($data_donut as $value) {
            array_push($labels, $value['label']);
            array_push($total, $value['books_count']);
        }

        $data_pinjam = []; 
        $data_pengembalian = [];
        $labels_bar = [];
        for ($i=1; $i <= 12 ; $i++) { 
            array_push($labels_bar, date('F', mktime(0, 0, 0, $i, 10)));
            array_push($data_pinjam, Transaction::whereYear('date_start', date('Y'))
            ->whereMonth('date_start', Carbon::create(date('Y'), $i, 1, 0, 0, 0)->month)->count());
            array_push($data_pengembalian, Transaction::whereYear('date_end', date('Y'))
            ->whereMonth('date_end', Carbon::create(date('Y'), $i, 1, 0, 0, 0)->month)->count());
        }
        

        $data = [
            'title' => 'Dashboard',
            'labels_donut' => $labels,
            'total_donut' => $total,
            'labels_bar' => $labels_bar,
            'data_pinjam' => json_encode($data_pinjam),
            'data_pengembalian' => json_encode($data_pengembalian)

        ];

        return view('home', compact('data','total_anggota', 'total_buku', 'total_penerbit', 'total_peminjaman'));
    }
}

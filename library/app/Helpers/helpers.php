<?php

use App\Models\Transaction;

function convert_date($date) {
    return date("j F Y, H:i:s", strtotime($date));
}

function rupiah($angka){
	$hasil_rupiah = "Rp " . number_format($angka, 0, ".", ".");
	return $hasil_rupiah;
}

function cekKeterlambatan(){
    $cek = Transaction::with('member')
            ->where('date_end', '<',now())
            ->where('status',  'false')->orderBy('date_end', 'desc')->paginate(5);

    foreach ($cek as $key => $value) {
        $startDate = new DateTime($value->date_end);
        $endDate = new DateTime();
        $interval = $startDate->diff($endDate);
        $days = $interval->days;
        $value->terlambat = $days;
    }

    return $cek;
}
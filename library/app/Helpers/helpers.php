<?php

function convert_date($date) {
    return date("j F Y, H:i:s", strtotime($date));
}

function rupiah($angka){
	$hasil_rupiah = "Rp " . number_format($angka, 0, ".", ".");
	return $hasil_rupiah;
}
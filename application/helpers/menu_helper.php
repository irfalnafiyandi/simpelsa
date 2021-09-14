<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('TglIndo')) {
	function TglIndo($tgl){
		$tanggal = substr($tgl,8,2);
		$bulan = GetMonth(substr($tgl,5,2));
		$tahun = substr($tgl,0,4);
		return $tanggal.' '.$bulan.' '.$tahun;
	}
}

if (!function_exists('GetMonth')) {
	function GetMonth($bln){
		switch ($bln){
			case 1:
				return "Januari";
				break;
			case 2:
				return "Februari";
				break;
			case 3:
				return "Maret";
				break;
			case 4:
				return "April";
				break;
			case 5:
				return "Mei";
				break;
			case 6:
				return "Juni";
				break;
			case 7:
				return "Juli";
				break;
			case 8:
				return "Agustus";
				break;
			case 9:
				return "September";
				break;
			case 10:
				return "Oktober";
				break;
			case 11:
				return "November";
				break;
			case 12:
				return "Desember";
				break;
		}
	}
}

if (!function_exists('terbilang')) {

	function terbilang($x) {
		$abil = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");
		if ($x < 12)
			return " " . $abil[$x];
		elseif ($x < 20)
			return terbilang($x - 10) . " Belas";
		elseif ($x < 100)
			return terbilang($x / 10) . " Puluh" . terbilang($x % 10);
		elseif ($x < 200)
			return " Seratus" . Terbilang($x - 100);
		elseif ($x < 1000)
			return terbilang($x / 100) . " Ratus" . terbilang($x % 100);
		elseif ($x < 2000)
			return " Seribu" . terbilang($x - 1000);
		elseif ($x < 1000000)
			return terbilang($x / 1000) . " Ribu" . terbilang($x % 1000);
		elseif ($x < 1000000000)
			return terbilang($x / 1000000) . " Juta" . terbilang($x % 1000000);
		elseif ($x < 1000000000000)
			return terbilang($x / 1000000000) . " Milyar" . terbilang($x % 1000000000);
	}

}

if (!function_exists('hariIndo')) {
	function hariIndo($hari){
		$w = date('w', strtotime($hari));
		$seminggu = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
		return $seminggu[$w];
	}
}

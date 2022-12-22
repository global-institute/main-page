<?php
	error_reporting(0);
	$base_link = "https://parcell.co.id/kel1/";
    $base_name = "Sistem Inventory";
	date_default_timezone_set('Asia/Jakarta'); 
	$conn = mysqli_connect("localhost", "parcellc_kel1", "!=ADlqcYS{p?", "parcellc_kel1");
	$operating_system = $_SERVER['HTTP_USER_AGENT'];
	$date = date("Y-m-d");
	$time = date("H:i:s");

	function format_datetime_to_date($string){
		$bulanIndo = ['', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September' , 'Oktober', 'November', 'Desember'];
	 
		$date = explode(" ", $string)[0];
		$time = explode(" ", $string)[1];
		
		$tanggal = explode("-", $date)[2];
		$bulan = explode("-", $date)[1];
		$tahun = explode("-", $date)[0];
		
		
	 
		return $tanggal . " " . $bulanIndo[abs($bulan)] . " " . $tahun;
	}
	function format_datetime($string){
		$bulanIndo = ['', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September' , 'Oktober', 'November', 'Desember'];
	 
		$date = explode(" ", $string)[0];
		$time = explode(" ", $string)[1];
		
		$tanggal = explode("-", $date)[2];
		$bulan = explode("-", $date)[1];
		$tahun = explode("-", $date)[0];
		
		
	 
		return $tanggal . " " . $bulanIndo[abs($bulan)] . " " . $tahun . " " . $time;
	}
?>
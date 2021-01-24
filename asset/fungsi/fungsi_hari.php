<center>
<?php
date_default_timezone_set('Asia/Jakarta');

$hari = date('w');
$tgl = date('d');
$bln = date('m');
$thn = date('Y');
	switch ($hari) {
		case 0 : {
			$hari = 'Minggu';
		} break;
		case 1 : {
			$hari = 'Senin';
		} break;
		case 2 : {
			$hari = 'Selasa';
		} break;
		case 3 : {
			$hari = 'Rabu';
		} break;
		case 4 : {
			$hari = 'Kamis';
		} break;
		case 5 : {
			$hari = "Jum'at";
		} break;
		case 6 : {
			$hari = 'Sabtu';
		} break;
		default : {
			$hari = 'UnKnown';
		} break;
	}

	switch ($bln) {
		case 1 : {
			$bln = 'Januari';
		} break;
		case 2 : {
			$bln = 'Februari';
		} break;
		case 3 : {
			$bln = 'Maret';
		} break;
		case 4 : {
			$bln = 'April';
		} break;
		case 5 : {
			$bln = 'Mei';
		} break;
		case 6 : {
			$bln = 'Juni';
		} break;
		case 7 : {
			$bln = 'Juli';
		} break;
		case 8 : {
			$bln = 'Agustus';
		} break;
		case 9 : {
			$bln = 'September';
		} break;
		case 10 : {
			$bln = 'Oktober';
		} break;
		case 11 : {
			$bln = 'November';
		} break;
		case 12 : {
			$bln = 'Desember';
		} break;
		default : {
			$bln = 'UnKnown';
		} break;
	}
$sekarang = $hari.", ".$tgl." ".$bln." ".$thn;

echo "<div class='clockStyle' style='text-decoration:none'>".$sekarang."</div>";
?>



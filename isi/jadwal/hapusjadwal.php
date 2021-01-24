<?php
include '../../config/koneksi.php';
$getkode = $_GET['kode'];

$query = mysqli_query($connect, "delete from jadwal_praktek where kode_jadwal='$getkode'");
if($query == 1){
	echo "<script>document.location.href='../../index.php?halaman=Jadwal-Praktek';</script>";
}else{
	echo "GAGAL Delete, ".mysqli_error($GLOBALS["___mysqli_ston"]);
}
?>
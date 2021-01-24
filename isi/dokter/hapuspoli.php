<?php
include '../../config/koneksi.php';
$getkode = $_GET['kode'];

$query = mysqli_query($connect, "delete from dokter where kode_dokter='$getkode'");
if($query == 1){
	echo "<script>document.location.href='../../index.php?halaman=Dokter';</script>";
}else{
	echo "GAGAL Delete, ".mysqli_error($GLOBALS["___mysqli_ston"]);
}
?>
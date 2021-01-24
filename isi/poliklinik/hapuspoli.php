<?php
include '../../config/koneksi.php';
$getkode = $_GET['kode'];

$query = mysqli_query($connect, "delete from poliklinik where kode_poliklinik='$getkode'");
if($query == 1){
	echo "<script>document.location.href='../../index.php?halaman=Poliklinik';</script>";
}else{
	echo "GAGAL Delete, ".mysqli_error();
}
?>
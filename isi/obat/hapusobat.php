<?php
include '../../config/koneksi.php';
$getkode = $_GET['kode'];

$query = mysqli_query($connect, "delete from obat where kode_obat='$getkode'");
if($query == 1){
	echo "<script>document.location.href='../../index.php?halaman=Obat';</script>";
}else{
	echo "GAGAL Delete, ".mysqli_error($query);
}
?>
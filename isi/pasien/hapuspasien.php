<?php
include '../../config/koneksi.php';
$getno = $_GET['no'];

$query = mysqli_query($connect, "delete from pasien where no_pasien='$getno'");
if($query == 1){
	echo "<script>document.location.href='../../index.php?halaman=Pasien';</script>";
}else{
	echo "GAGAL Delete, ".mysqli_error($query);
}
?>
<?php
include '../../config/koneksi.php';
$getno = $_GET['no'];

$query = mysqli_query($connect, "delete from pemeriksaan where no_pemeriksaan='$getno'");
if($query == 1){
	echo "<script>document.location.href='../../index.php?halaman=Pemeriksaan';</script>";
}else{
	echo "GAGAL Delete, ".mysqli_error($query);
}
?>
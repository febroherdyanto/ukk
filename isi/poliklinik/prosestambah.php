<?php
include '../../config/koneksi.php';

$kode = addslashes(trim($_POST['kode']));
$nama = addslashes(trim($_POST['nama']));

$query = mysqli_query($connect, "insert into poliklinik values('$kode','$nama')");
if($query == 1){
	echo "<script>document.location.href='../../index.php?halaman=Poliklinik'</script>";
}else{
	echo "ERROR, ".mysqli_error();
}
?>
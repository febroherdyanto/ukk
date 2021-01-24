<?php
include '../../config/koneksi.php';
$kode_dokter = addslashes(trim($_POST['kode_dokter']));
$kode_pl = addslashes(trim($_POST['kode_pl']));
$nama = addslashes(trim($_POST['nama']));
$alamat = addslashes(trim($_POST['jl']))."=".addslashes(trim($_POST['ds']))."=".addslashes(trim($_POST['kec']))."=".addslashes(trim($_POST['kabkot']))."=".addslashes(trim($_POST['kpos']))."=".addslashes(trim($_POST['prov']));
$telp = addslashes(trim($_POST['telp']));

$query = mysqli_query($connect, "insert into dokter values('$kode_dokter','$kode_pl','$nama',
	'$alamat','$telp')");
if($query == 1){
	echo "<script>document.location.href='../../index.php?halaman=Dokter'</script>";
}else{
	echo "ERROR, ".mysqli_error($GLOBALS["___mysqli_ston"]);
}
?>
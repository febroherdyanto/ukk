<?php
include '../../config/koneksi.php';

$qcek = mysqli_query($connect, "select * from jenis_biaya where ID_jenis_biaya='$_POST[id]'");
if(mysqli_num_rows($qcek) > 0){
	echo "<script>alert('Kode ID Jenis Biaya Sudah Ada');
	document.location.href='../../index.php?halaman=Jenis-Biaya';</script>";
}else{

$id = addslashes(trim($_POST['id']));
$nama = addslashes(trim($_POST['nama']));
$tarif = addslashes(trim($_POST['tarif']));

$query = mysqli_query($connect, "insert into jenis_biaya values('$id','$nama', '$tarif')");
if($query == 1){
	echo "<script>document.location.href='../../index.php?halaman=Jenis-Biaya'</script>";
}else{
	echo "ERROR, ".mysqli_error($query);
}

}
?>
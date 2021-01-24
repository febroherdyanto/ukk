<?php
include '../../config/koneksi.php';

$no_pemeriksaan = '';
$no_pendaftaran = addslashes(trim($_POST['no_pendaftaran']));
$keluhan = addslashes(trim($_POST['keluhan']));
$diagnosa = addslashes(trim($_POST['diagnosa']));
$perawatan = addslashes(trim($_POST['perawatan']));
$tindakan = addslashes(trim($_POST['tindakan']));
$berat_badan = addslashes(trim($_POST['berat_badan']));
$t_diastolik = addslashes(trim($_POST['t_diastolik']));
$t_sistolik = addslashes(trim($_POST['t_sistolik']));


$query = mysqli_query($connect, "insert into pemeriksaan values('$no_pemeriksaan','$no_pendaftaran','$keluhan','$diagnosa','$perawatan','$tindakan','$berat_badan','$t_diastolik','$t_sistolik') ");
$t1 = mysqli_query($connect, "select * from pemeriksaan order by no_pemeriksaan desc limit 1");
while($t2 = mysqli_fetch_array($t1)){
	$nnp = $t2['no_pemeriksaan'];


if($query == 1){

?>
<script type="text/javascript">
var r = confirm('Apakah Anda ingin melalukan Pendataan Resep ?');
if(r == true){ 
	<?php 
	$no_resep = '';
	$qi = mysqli_query($connect, "insert into resep (no_resep,no_pemeriksaan) values('$no_resep','$nnp')") or die("GAGAL ke Resep".mysqli_error());
	
	//--------------------------------------------------
	$qpd = mysqli_query($connect, "select * from resep order by no_resep desc limit 1");
	while($pd = mysqli_fetch_array($qpd)){
		$pdd = $pd['no_resep'];
	//--------------------------------------------------
	?>
	window.location='../../index.php?halaman=Tambah-Resep&nrs=<?php echo $pdd;  ?>';
	<?php } ?>
}else{
	document.location.href='../../index.php?halaman=Pemeriksaan';
}
</script>
<?php
}else{
	echo "ERROR, ".mysqli_error();
}
}
?>
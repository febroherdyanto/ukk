<?php session_start(); 
$user = "";
	if(isset($_SESSION['klinik'])){
		$ssnip = $_SESSION['klinik']['NIP'];
	}
?>
<script type="text/javascript" src="../../asset/js/jquery-2.0.0.js"></script>
<?php
include '../../config/koneksi.php';

$no_pas = '';
$nama = addslashes(trim($_POST['nama']));
$alamat = addslashes(trim($_POST['jl']))."=".addslashes(trim($_POST['ds']))."=".addslashes(trim($_POST['kec']))."=".addslashes(trim($_POST['kabkot']))."=".addslashes(trim($_POST['kpos']))."=".addslashes(trim($_POST['prov']));
$telp = addslashes(trim($_POST['telp']));
$tgl_lahir = addslashes(trim($_POST['tgl_lahir']));
$jenkel = addslashes(trim($_POST['jenkel']));
$tgl_reg = addslashes(trim($_POST['tgl_reg']));


$query = mysqli_query($connect, "insert into pasien values('$no_pas','$nama','$alamat','$telp',
	'$tgl_lahir','$jenkel','$tgl_reg')");
$t1 = mysqli_query($connect, "select * from pasien order by no_pasien desc limit 1");
while($t2 = mysqli_fetch_array($t1)){
	$nnp = $t2['no_pasien'];

if($query == 1){ ?>
<script type="text/javascript">
var r = confirm('Apakah Anda ingin melalukan Pendaftaran Pasien ?');
if(r == true){ 
	<?php 
	$no_pendaftaran = '';
	$qi = mysqli_query($connect, "insert into pendaftaran (no_pendaftaran,NIP,no_pasien,tgl_pendaftaran) values('$no_pendaftaran','$ssnip','$nnp','$tgl')") or die("GAGAL ke Pendaftaran".mysqli_error($GLOBALS["___mysqli_ston"]));
	 //qjj
	//--------------------------------------------------
	$qpd = mysqli_query($connect, "select * from pendaftaran order by no_pendaftaran desc limit 1");
	while($pd = mysqli_fetch_array($qpd)){
		$pdd = $pd['no_pendaftaran'];
	//--------------------------------------------------
	?>
	window.location='../../index.php?halaman=Edit-Pendaftaran&no=<?php echo $pdd;  ?>&back=pasien&np=<?php echo $nnp; ?>';
	<?php } ?>
}else{
	document.location.href='../../index.php?halaman=Pasien';
}
</script>
<?php }else{
	echo "ERROR, ".mysqli_error($GLOBALS["___mysqli_ston"]);
}
}
?>
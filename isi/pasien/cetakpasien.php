<?php
include '../../config/koneksi.php';
$getno = $_GET['np'];

header("Content-Type: application/force-download");
header("Cache-Control: no-cache, must-revalidate");
header("Content-type:image/jpeg");
header("Content-disposition:filename=pasien_".$getno.".jpeg");

$query = mysqli_query($connect, "select * from pasien where no_pasien='$getno'");
while($t = mysqli_fetch_array($query)){
	$exalamat = $t['alamat_pasien'];
	$pecah = explode("=", $exalamat);
	$xjl = $pecah[0];
	$xds = $pecah[1];
	$xkec = $pecah[2];
	$xkabkot = $pecah[3];
	$xkpos = $pecah[4];
	$xprov = $pecah[5];
 
$tgl_registrasi = $t['tgl_registrasi'];
if($t['jenkel_pasien'] == 'L'){
	$jk = 'Laki-Laki';
}else if($t['jenkel_pasien'] == 'P'){
	$jk = 'Perempuan';
}

 $image = @imagecreate(450,200);
 $background = imagecolorallocate($image,60,150,255);
 $text = imagecolorallocate($image,0,0,0);
 $qtext = imagecolorallocate($image,255,0,0);
 imagestring($image,5,110,10,"POLIKLINIK MEJAYAN SEHAT",$qtext);
 imagestring($image,4,12,40,"No Pasien       : ".$t['no_pasien'],$text);
 imagestring($image,4,12,60,"Nama Pasien     : ".$t['nama_pasien'],$text);
 imagestring($image,4,12,80,"No. Telp        : ".$t['telp_pasien'],$text);
 imagestring($image,4,12,100,"Jenis Kelamin   : ".$jk,$text);
 imagestring($image,4,12,120,"Alamat          : ".$xds.", ".$xkec,$text);
 imagestring($image,4,12,140,"Tgl Registrasi  : ".$tgl_registrasi,$text);
 imagestring($image,2,12,170,"* Harap Membawa Kartu ini ketika sedang periksa",$text);
 imagejpeg($image);
 imagedestroy($image);
}
?>
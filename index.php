<?php session_start();
include 'config/koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
<?php
if($level = 'admin'){
	echo "<title>Halaman Administrator Poliklinik Mejayan Sehat</title>";
	echo '<link rel="shortcut icon" href="asset/images/admin.png" type="image/x-icon" />';
}else if($level = 'pegawai'){
	echo "<title>Halaman Pegawai Poliklinik Mejayan Sehat</title>";
	echo '<link rel="shortcut icon" href="asset/images/logo.png" type="image/x-icon" />';
} ?>

<!--/ Pemanggilan CSS -->
<link rel="stylesheet" type="text/css" href="asset/css/bootstrap.css" media="screen">
<link rel="stylesheet" type="text/css" href="asset/css/dataTables.bootstrap.css">
<link href="asset/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="asset/css/bootstrap-datetimepicker.css">
<link rel="stylesheet" type="text/css" href="asset/css/bootstrap-timepicker.min.css">
<style type="text/css">
	.navbar-inverse{
		background-color: #2968D1;
		color: #FF0000;

	}
	.dropdown:hover .dropdown-menu {
    display: block;
	}
</style>


<!--/ Pemanggilan JS -->
<script type="text/javascript" src="asset/js/jquery-2.0.0.js"></script>
<script type="text/javascript" src="asset/js/bootstrap.js"></script>
<script type="text/javascript" src="asset/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="asset/js/dataTables.bootstrap.js"></script>
<script type="text/javascript" src="asset/js/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="asset/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="asset/js/bootstrap-timepicker.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$("#hidden").css('display','block');
		$("#progress-bar").animate({width:"65%"}, 1000);
	});
	$(window).bind('load',function(){
		
				$("#hidden").fadeOut(1000);
	});
</script>
<style type="text/css">
	#hidden{
		display: none;
	}
	#progress-bar{
		position: fixed;
		z-index: 9999;
		top: 0;
		left: 0;
		width: 0;
		height: 50px;
		background-color: #990000;
		/*background-color: #4aa6e7;*/
	}
	#loading{
		position: fixed;
		z-index: 999;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		background: #FFFFFF url('loading11.gif') center no-repeat;
	}
</style>

</head>
<body>
<?php
if(!isset($_SESSION['klinik'])){
	echo "<script>alert('Anda Belum Login...');
	document.location.href='login.php';</script>";
}else{
	//Mencatat Info User saat login
	$user = "";
	if(isset($_SESSION['klinik'])){
		$nip = $_SESSION['klinik']['NIP'];
		$username = $_SESSION['klinik']['username'];
		$level = $_SESSION['klinik']['level_user'];
	}
require 'asset/fungsi/tgl_indo.php';
?>
<div id="hidden">
	<div id="loading"></div>
</div>
<hr>




<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
			<nav class="navbar navbar-default navbar-fixed-top navbar-inverse" role="navigation">
				<div class="navbar-header">
					 <button type="button" class="navbar-toggle" data-toggle="collapse"
					 	data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation
					 	</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar">
					 	</span></button> <a class="navbar-brand" href="index.php?halaman=Utama"><font color="white">
					 	<b><i class="fa fa-home fa-fw"></i> HOME</b></a></font>
				</div>
				
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<?php include 'menu.php'; ?>
				</div>
			</nav>
		</div>
	</div>

<div class="row"><br>
<div class="col-lg-3">
	<img src="asset/images/logo.png" align="right" class="img-responsive" alt="Poliklinik Mejayan Sehat" 
	width="150px" height="150px" title="Poliklinik Mejayan Sehat">
</div>
<div class="col-lg-9">
	<h1 class="text-primary"><a href="index.php?halaman=Utama" style="text-decoration:none">
	POLIKLINIK MEJAYAN SEHAT</a></h1>
	<h4>Jl. Imam Bonjol No. 7, Pandean, Kec. Mejayan, Kab. Madiun</h4>
			
</div>
</div>
<div class="clearfix"></div>

<div class="row">
<?php
$hal = $_GET['halaman'];

if($hal == 'Utama'){
	require 'isi/utama.php';
}else if($hal == 'Pegawai'){
	require 'isi/pegawai/pegawai.php';
}else if($hal == 'Edit-Pegawai'){
	require 'isi/pegawai/editpegawai.php';
}

else if($hal == 'Poliklinik'){
	require 'isi/poliklinik/poliklinik.php';
}else if($hal == 'Edit-Poliklinik'){
	require 'isi/poliklinik/editpoliklinik.php';
}


else if($hal == 'Dokter'){
	require 'isi/dokter/dokter.php';
}else if($hal == 'Edit-Dokter'){
	require 'isi/dokter/editdokter.php';
}


else if($hal == 'Pasien'){
	require 'isi/pasien/pasien.php';
}else if($hal == 'Edit-Pasien'){
	require 'isi/pasien/editpasien.php';
}else if($hal == 'Reg-Ulang'){
	require 'isi/pasien/regulang.php';
}


else if($hal == 'Obat'){
	require 'isi/obat/obat.php';
}else if($hal == 'Edit-Obat'){
	require 'isi/obat/editobat.php';
}


else if($hal == 'Resep'){
	require 'isi/resep/resep.php';
}else if($hal == 'Tambah-Resep'){
	require 'isi/resep/tambahresep.php';
}else if($hal == 'Edit-Resep'){
	require 'isi/resep/editresep.php';
}


else if($hal == 'Jadwal-Praktek'){
	require 'isi/jadwal/jadwal.php';
}else if($hal == 'Edit-Jadwal-Praktek'){
	require 'isi/jadwal/editjadwal.php';
}

else if($hal == 'Pendaftaran'){
	require 'isi/pendaftaran/pendaftaran.php';
}else if($hal == 'Edit-Pendaftaran'){
	require 'isi/pendaftaran/editpendaftaran.php';
}

else if($hal == 'Jenis-Biaya'){
	require 'isi/jb/jb.php';
}else if($hal == 'Edit-Jenis-Biaya'){
	require 'isi/jb/editjb.php';
}


else if($hal == 'Pemeriksaan'){
	require 'isi/pemeriksaan/pemeriksaan.php';
}else if($hal == 'Edit-Pemeriksaan'){
	require 'isi/pemeriksaan/editpemeriksaan.php';
}


else{
	echo "<h1>MAAF, HALAMAN TIDAK TERSEDIA</h1>";
}
?>
</div><!-- ../row -->

</div>

<!--
<input type="text" id="tanggal">
<br>
<textarea id="editor1" name="teks"></textarea>-->


</body>
</html>
<script type="text/javascript">
//<![CDATA[
	CKEDITOR.replace( 'editor1',
	{
		filebrowserBrowseUrl : '../js/kcfinder/browse.php?type=files',
		filebrowserImageBrowseUrl : '../js/kcfinder/browse.php?type=images',
		filebrowserFlashBrowseUrl : '../js/kcfinder/browse.php?type=flash',
		filebrowserUploadUrl : '../js/kcfinder/upload.php?type=files',
		filebrowserImageUploadUrl : '../js/kcfinder/upload.php?type=images',
		filebrowserFlashUploadUrl : '../js/kcfinder/upload.php?type=flash'
	});
//]]>
</script>

<?php } ?>
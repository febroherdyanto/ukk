<?php session_start();
$user = "";
	if(isset($_SESSION['klinik'])){
		$nip = $_SESSION['klinik']['NIP'];
		$username = $_SESSION['klinik']['username'];
		$level = $_SESSION['klinik']['level_user'];
	} ?>
<body>
<div class="clearfix">

<div class="panel panel-primary">
<div class="panel-heading">
<h2 class="panel-title" align="center"><i class="fa fa-home"></i> HALAMAN UTAMA</h2>
</div>
<div class="panel-body">

<?php $q1 = mysqli_query($connect, "select * from pegawai where NIP='$nip'");
$t = mysqli_fetch_array($q1); ?>
<table width="100%">
<tr>
<?php 
if($level == 'admin'){?>
	<td><img src="asset/images/admin.png" class="img-responsive" width="130px" height="100px"></td>
	<td>
		<h2>Selamat Datang <font color="blue"><?php echo $t['nama_pegawai']; ?></font>
di Halaman Administrator 

<?php }else{?>
	<td align="right" width="15%"><img src="asset/images/pegawai.gif" class="img-responsive" width="80px" height="40px"></td>
	<td align="left" width="70%">
		<h2> &nbsp;Selamat Datang <font color="blue"><?php echo $t['nama_pegawai']; ?></font>
di Halaman Pegawai <?php } ?>

</h2>

	</td>
</tr>
</table>

<hr>
<div class="col-sm-12">
<table width="100%">
<tr>
<td width="60%" valign="top">
<div class="panel panel-info">
	<div class="panel-heading" align="center"><i class="fa fa-gears"></i> &nbsp;<b>INFORMASI SISTEM</b></div>
	<table class="table table-bordered">
		<?php
		function IPnya() {
		    $ipaddress = '';
		    if (getenv('HTTP_CLIENT_IP'))
		        $ipaddress = getenv('HTTP_CLIENT_IP');
		    else if(getenv('HTTP_X_FORWARDED_FOR'))
		        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
		    else if(getenv('HTTP_X_FORWARDED'))
		        $ipaddress = getenv('HTTP_X_FORWARDED');
		    else if(getenv('HTTP_FORWARDED_FOR'))
		        $ipaddress = getenv('HTTP_FORWARDED_FOR');
		    else if(getenv('HTTP_FORWARDED'))
		        $ipaddress = getenv('HTTP_FORWARDED');
		    else if(getenv('REMOTE_ADDR'))
		        $ipaddress = getenv('REMOTE_ADDR');
		    else
		        $ipaddress = 'IP Tidak Dikenali';
		 
		    return $ipaddress;
		}
		$ipaddress = $_SERVER['REMOTE_ADDR'];
		?>
		<tr>
			<td><b>IP Address</b></td>
			<td><?php echo IPnya(); ?></td>
		</tr>
		<tr>
			<td><b>Web Browser</b></td>
			<td><?php echo $_SERVER['HTTP_USER_AGENT']; ?></td>
		</tr>
		<tr>
			<td><b>Sistem Operasi</b></td>
			<td><?php echo php_uname(); ?></td>
		</tr>
		<tr>
			<td><b>Server Software</b></td>
			<td><?php echo $_SERVER['SERVER_SOFTWARE'] ?></td>
		</tr>
	</table>
</div>
</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td width="40%" valign="top">
<div class="panel panel-info">
	<div class="panel-heading" align="center">
		<h3 class="panel-title"><i class="fa fa-calendar"></i> <b>Informasi Waktu</b></h3>
	</div>
	<div class="panel-body">
		<?php
		include 'asset/fungsi/fungsi_hari.php';
		include 'asset/fungsi/fungsi_jam.php';
		?>
	</div>
</td>
</tr>
</table>
</div>
</div>
</div>



</div>
</body>
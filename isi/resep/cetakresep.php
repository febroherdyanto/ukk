<!DOCTYPE html> <?php $getnrs=$_GET['nrs']; include '../../config/koneksi.php'; ?>
<html>
<head>
	<title>Cetak Resep Obat [POLIKLINIK MEJAYAN SEHAT]</title>
	<link rel="shortcut icon" href="../../asset/images/print.png" type="image/x-icon" />
<link rel="stylesheet" type="text/css" href="../../asset/css/bootstrap.css" media="screen">
<link href="../../asset/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

<script type="text/javascript" src="../../asset/js/jquery-2.0.0.js"></script>
<script type="text/javascript" src="../../asset/js/bootstrap.js"></script>
<style type="text/css">
	body{
		font-family: Courier;
	}
	.header{
		font-family: Arial;
		font-style: bold;
	}
	.biodata{
		font-weight: bold;
	}
</style>
</head>
<body>

<script type="text/javascript">
	window.print();
</script>

<!-- ========================= HEADER =============== -->
<table width="50%">
<tr>
	<td width="20%" align="center"><img src="../../asset/images/pmi.jpg" width="130px" height="130px" alt="Palang Merah Indonesia"></td>
	<td width="60%" align="center" valign="top" class="header"><br><b><font size="3px">
		PEMERINTAHAN KABUPATEN MADIUN<br>
		DINAS KESEHATAN<br></font><font size="5px">
		POLIKLINIK MEJAYAN SEHAT</b></font><br><font size="2px">
		Jl. Imam Bonjol No. 7, Pandean, Kec. Mejayan, 63153 <br>
		Kab. Madiun, Telp. (0351) 388-490
		</font>
	</td>
	<td width="20%" align="center"><img src="../../asset/images/logo.png" width="130px" height="130px" alt="POLIKLINIK MEJAYAN SEHAT"></td>
</tr>
<tr>
	<td colspan="3"><hr></td>
</tr>
</table>




<!-- =================== BIODATA PASIEN ======================= -->
<?php
$q1 = mysqli_query($connect, "select * from resep where no_resep='$getnrs'");
while($t1 = mysqli_fetch_array($q1)){
$no_periksa1 = $t1['no_pemeriksaan'];
	
	//Query Pemeriksaan
	$q2 = mysqli_query($connect, "select * from pemeriksaan where no_pemeriksaan='$no_periksa1'");
	while($t2 = mysqli_fetch_array($q2)){
		$no_daftar1 = $t2['no_pendaftaran'];

		//Query Pendaftaran
		$q3 = mysqli_query($connect, "select * from pendaftaran where no_pendaftaran='$no_daftar1'");
		while($t3 = mysqli_fetch_array($q3)){
			$no_pasien1 = $t3['no_pasien'];
			$nip = $t3['NIP'] ;

			//Query Pegawai
			$qpeg = mysqli_query($connect, "select * from pegawai where NIP='$nip'");
			$peg=mysqli_fetch_array($qpeg);
			$nama_pegawai = $peg['nama_pegawai'];

			//Query Pasien
			$q4 = mysqli_query($connect, "select * from pasien where no_pasien='$no_pasien1'");
			while($t4 = mysqli_fetch_array($q4)){
				$nama_pasien = $t4['nama_pasien'];
				$exalamat = $t4['alamat_pasien'];
					$pecah = explode("=", $exalamat);
					$xjl = $pecah[0];
					$xds = $pecah[1];
					$xkec = $pecah[2];
					$xkabkot = $pecah[3];
					$xkpos = $pecah[4];
					$xprov = $pecah[5];
				$jenkel_pasien = $t4['jenkel_pasien'];
				$tgl_registrasi = $t4['tgl_registrasi'];?>
<table width="50%" class="biodata">
<tr>
	<td width="20%">No Pasien</td>
	<td width="2%">:</td>
	<td width="70%"><?php echo $no_pasien1; ?></td>
</tr>
<tr>
	<td width="20%">Nama Pasien</td>
	<td width="2%">:</td>
	<td width="70%"><?php echo $nama_pasien; ?></td>
</tr>
<tr>
	<td width="20%">Jenis Kelamin</td>
	<td width="2%">:</td>
	<td width="70%"><?php if($jenkel_pasien=='L'){echo "Laki-Laki"; }else{echo "Perempuan";}?></td>
</tr>
<tr>
	<td width="20%">Alamat</td>
	<td width="2%">:</td>
	<td width="70%"><?php echo $xjl.', '.$xds.', '.$xkec;?></td>
</tr>
<tr>
	<td width="20%">PETUGAS</td>
	<td width="2%">:</td>
	<td width="70%"><i><?php echo $nama_pegawai; ?></i></td>
</tr>
</table>
<?php
			}
		}
	}
}
?>



<br>
<!-- =================== DATA RESEP DAN OBAT ======================= -->
<table width="50%">
<tr>
	<td width="2%"><br></td>
	<td width="3%">No.</td>
	<td width="31%">Nama Obat</td>
	<td width="8%">Dosis</td>
	<td width="11%">Harga @</td>
	<td width="6%">Jumlah</td>
	<td width="15%" colspan="2">Total Harga</td>
</tr>
<?php 
$queryresep = mysqli_query($connect, "select * from detail_resep where no_resep='$getnrs'");
$no = 1;
while($resep = mysqli_fetch_array($queryresep)){
	$kode_obat = $resep['kode_obat'];	?>
<tr>
	<td width="2%"><br></td>
	<td><?php echo $no; ?></td>
	<td><?php $queryobat = mysqli_query($connect, "select * from obat where kode_obat='$kode_obat'");
		$obat = mysqli_fetch_array($queryobat); echo $obat['nama_obat']; ?></td>
	<td align="center"><?php echo $resep['dosis']; ?></td>
	<td align="right"><?php echo $obat['harga_jual']; ?></td>
	<td align="center"><?php echo $resep['jml_obat']; ?></td>
	<td width="3%">Rp. </td>
	<td align="right"><?php echo number_format($resep['total_awal'], 2, ',', '.'); ?></td>
</tr>
<?php $no++; } ?>
<tr>
	<td colspan="5"><br></td>
	<td colspan="2"><hr></td>
</tr>
<tr>
	<td colspan="5"><br></td>
	<td><b>Rp. </b></td>
	<td align="right"><b><?php $qtotal = mysqli_query($connect, "select * from resep where no_resep='$getnrs'");
	while($tot = mysqli_fetch_array($qtotal)){ echo number_format($tot['harga_akhir'], 2, ',', '.'); } ?></b></td>
</tr>

<tr>
	<td colspan="7"><br></td>
</tr>
<tr>
	<td colspan="5" align="center">* Terima Kasih sudah Melalukan Pengobatan di<br>
	<b>Poliklinik Mejayan Sehat</b></td>
</tr>

<tr>
	<td colspan="3"><a href="javascript:window.print()"><button class="btn-lg btn-primary"><i class="fa fa-print"></i> Cetak</button></a></td>
</tr>
</table>

</body>
</html>
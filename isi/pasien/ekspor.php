<?php
header("Content-Type: application/force-download");
 header("Cache-Control: no-cache, must-revalidate");
 header("content-disposition: attachment;filename=laporan_pasien.xls");
 
 
include "../../config/koneksi.php";

$query = mysqli_query($connect, "select * from pasien");
$no = 1;
echo '
<table width="100%">
<tbody>
	<tr>
		<td><b>No.</b></td>
		<td><b>No Pasien</b></td>
		<td><b>Nama</b></td>
		<td><b>Alamat</b></td>
		<td><b>No Telp</b></td>
		<td><b>Tgl Lahir</b></td>
		<td><b>Jenis Kelamin</b></td>
		<td><b>Tgl Registrasi</b></td>
	</tr>';

while($t = mysqli_fetch_array($query)){
	echo '
	<tr>
		<td align="center">'.$no.'</td>
		<td>'.$t['no_pasien'].'</td>
		<td>'.$t['nama_pasien'].'</td>
		<td>'.$t['alamat_pasien'].'</td>
		<td>'.$t['telp_pasien'].'</td>
		<td>'.$t['tgl_lahir_pasien'].'</td>
		<td align="center">'.$t['jenkel_pasien'].'</td>
		<td>'.$t['tgl_registrasi'].'</td>
	</tr>';
$no++; }
echo '</tbody></table>';
?>
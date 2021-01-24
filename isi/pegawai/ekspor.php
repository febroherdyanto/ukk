<?php
header("Content-Type: application/force-download");
 header("Cache-Control: no-cache, must-revalidate");
 header("content-disposition: attachment;filename=laporan_pegawai.xls");
 
 
include "../../config/koneksi.php";

$query = mysqli_query($connect, "select * from pegawai");
$no = 1;
echo '
<table width="100%">
<tbody>
	<tr>
		<td><b>No.</b></td>
		<td><b>NIP</b></td>
		<td><b>Nama</b></td>
		<td><b>Alamat</b></td>
		<td><b>No Telp</b></td>
		<td><b>Tgl Lahir</b></td>
		<td><b>Jenis Kelamin</b></td>
	</tr>';

while($t = mysqli_fetch_array($query)){
	echo '
	<tr>
		<td align="center">'.$no.'</td>
		<td>'.$t['NIP'].'</td>
		<td>'.$t['nama_pegawai'].'</td>
		<td>'.$t['alamat_pegawai'].'</td>
		<td>'.$t['telp_pegawai'].'</td>
		<td>'.$t['tgl_lahir_pegawai'].'</td>
		<td align="center">'.$t['jenkel_pegawai'].'</td>
	</tr>';
$no++; }
echo '</tbody></table>';
?>
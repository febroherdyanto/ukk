<div class="clearfix">

<div class="panel panel-primary">
<div class="panel-heading">
	<h2 class="panel-title" align="center"><i class="fa fa-medkit"></i> 
		HALAMAN RESEP</h2>
</div>
<div class="panel-body">

<font color="red">
<h4><i class="fa fa-warning"></i> Tidak dapat melakukan Tambah Resep kecuali melalui menu Pemeriksaan</h4>
</font>

<!--
<form method="post" action="">
<button type="submit" name="act" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Tambah Resep</button>
</form>
<?php
if(isset($_POST['act'])){
	$no_resep = '';
	$query = mysqli_query($connect, "insert into resep (no_resep) values('$no_resep')");
	if($query == 1){
		$qs = mysqli_query($connect, "select * from resep order by no_resep desc limit 1");
		while($s = mysqli_fetch_array($qs)){
			$nor = $s['no_resep'];
			echo "<script>document.location.href='index.php?halaman=Tambah-Resep&nrs=".$nor."'</script>";
		}
	}else{
		echo "GAGAL INSERT NO RESEP ".mysqli_error();
	}
}
?>
-->

<hr>
<!-- Datatable -->
<div class="row">
	<table id="resep" class="table table-bordered table-hover">
		<caption align="center"> </caption>
		<thead>
			<th align="center">No.</th>
			<th align="center">Nomor Resep</th>
			<th align="center">Kode Pemeriksaan</th>
			<th align="center">Aksi</th>
		</thead>
		<tbody>
	<?php $qtampil = mysqli_query($connect, "select * from resep order by no_resep asc");
		$no = 1;
		while($tm = mysqli_fetch_array($qtampil)){?>
		<tr>
			<td align="center"><?php echo $no; ?>.</td>
			<td><?php echo $tm['no_resep'] ;?></td>
			<td><?php echo $tm['no_pemeriksaan'] ;?></td>
			<td>
				<a href="index.php?halaman=Tambah-Resep&nrs=<?php 
					echo $tm['no_resep'] ;?>">
				<button class="btn-sm btn-warning"><i class="fa fa-edit"></i></button></a>
				| <a href="isi/resep/hapusresep.php?no=<?php echo 
				$tm['no_resep'] ;?>"
				onclick="return confirm('Anda Yakin untuk Mengahapus Data Resep?')">
				<button class="btn-sm btn-danger"><i class="fa fa-trash"></i></button></a>
			</td>
		</tr>
		<?php $no++; } ?>
		</tbody>
	</table>
</div>


<script type="text/javascript">
            $(function() {
                $("#resep").dataTable();
            });
</script>


</div> <!-- Panel Body -->
</div> <!-- Panel Primary -->

</div><!-- Clearfix -->
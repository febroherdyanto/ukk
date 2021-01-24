<div class="clearfix">

<div class="panel panel-primary">
<div class="panel-heading">
	<h2 class="panel-title" align="center"><i class="fa fa-edit"></i> 
		EDIT DATA JENIS BIAYA</h2>
</div>
<div class="panel-body">


<form class="form-horizontal" role="form" method="post" action="">
<?php $getid = $_GET['id'];
$qt = mysqli_query($connect, "select * from jenis_biaya where ID_jenis_biaya='$getid'");
while($t = mysqli_fetch_array($qt)){
?>
	
	<div class="row form-group">
		<label class="col-md-4 ">ID Jenis Biaya</label>
		<div class="col-md-8">
			<input class="form-control" type="text" name="id" readonly
			value="<?php echo $getid; ?>" required>
		</div>
	</div>
			<hr>
	<div class="row form-group">
		<label class="col-md-4 ">Nama Jenis Biaya</label>
		<div class="col-md-8">
			<input class="form-control" type="text" name="nama"
			value="<?php echo $t['nama_biaya']; ?>" required>
		</div>
	</div>
			<hr>
	<div class="row form-group">
		<label class="col-md-4 ">Tarif Jenis Biaya</label>
		<div class="col-md-8">
			<input class="form-control" type="text" name="tarif"
			value="<?php echo $t['tarif']; ?>" required>
		</div>
	</div>
			<hr>
	<div class="row form-group">
		<div class="col-md-9">
			<input type="submit" class="btn btn-success" name="edit" value="EDIT">
		</div>
	</div>
</form>
<?php } ?>



</div> <!-- Panel Body -->
</div> <!-- Panel Primary -->

</div><!-- Clearfix -->

<?php
if(isset($_POST['edit'])){
	$kode_dokter = addslashes(trim($_POST['kode_dokter']));
	$hari = addslashes(trim($_POST['hari']));
	$jam_mulai = addslashes(trim($_POST['jam_mulai']));
	$jam_selesai = addslashes(trim($_POST['jam_selesai']));

	$query = mysqli_query($connect, "update jadwal_praktek set kode_dokter='$kode_dokter',
	hari='$hari', jam_mulai='$jam_mulai', jam_selesai='$jam_selesai' where
	kode_jadwal='$getkode' ");
	if($query == 1){
		echo "<script>document.location.href='index.php?halaman=Jadwal-Praktek'</script>";
	}else{
		echo "ERROR, ".mysqli_error($query);
	}
}
?>
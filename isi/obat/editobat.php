<div class="clearfix">

<div class="panel panel-primary">
<div class="panel-heading">
	<h2 class="panel-title" align="center"><i class="fa fa-medkit"></i> 
		HALAMAN EDIT DATA OBAT</h2>
</div>
<div class="panel-body">

<?php
$getkode = $_GET['kode'];
$qtampil = mysqli_query($connect, "select * from obat where kode_obat='$getkode'");
while($tampil = mysqli_fetch_array($qtampil)){
?>
<form class="form-horizontal" role="form" method="post" action="">
	<div class="row form-group">
		<label class="col-md-4 ">Kode Obat</label>
		<div class="col-md-8">
			<input class="form-control" type="text" name="kode" 
			value="<?php echo $getkode ?>" readonly>
		</div>
	</div>
			<hr>
	<div class="row form-group">
		<label class="col-md-4 ">Nama Obat</label>
		<div class="col-md-8">
			<input class="form-control" type="text" name="nama" 
			value="<?php echo $tampil['nama_obat'] ?>" required>
		</div>
	</div>
		<hr>
	<div class="row form-group">
		<label class="col-md-4 ">Merk Obat</label>
		<div class="col-md-8">
			<input class="form-control" type="text" name="merk" 
			value="<?php echo $tampil['merk'] ?>" required>
		</div>
	</div>
		<hr>
	<div class="row form-group">
		<label class="col-md-4 ">Satuan Obat</label>
		<div class="col-md-8">
			<input class="form-control" type="text" name="satuan" 
			value="<?php echo $tampil['satuan'] ?>" required>
		</div>
	</div>
		<hr>
	<div class="row form-group">
		<label class="col-md-4 ">Harga Jual</label>
		<div class="col-md-8">
			<input class="form-control" type="text" name="harga_jual" 
			value="<?php echo $tampil['harga_jual'] ?>" required>
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
$nama = addslashes(trim($_POST['nama']));
$merk = addslashes(trim($_POST['merk']));
$satuan = addslashes(trim($_POST['satuan']));
$harga_jual = addslashes(trim($_POST['harga_jual']));

$query = mysqli_query($connect, "update obat set nama_obat='$nama', merk='$merk', satuan='$satuan',
	harga_jual='$harga_jual' where kode_obat='$getkode'");
if($query == 1){
	echo "<script>document.location.href='index.php?halaman=Obat'</script>";
}
}
?>
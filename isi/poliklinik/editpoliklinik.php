<div class="clearfix">

<div class="panel panel-primary">
<div class="panel-heading">
	<h2 class="panel-title" align="center"><i class="fa fa-edit"></i> 
		EDIT DATA POLIKLINIK</h2>
</div>
<div class="panel-body">


<form class="form-horizontal" role="form" method="post" action="">
<?php $getkode = $_GET['kode'];
$qt = mysqli_query($connect, "select * from poliklinik where kode_poliklinik='$getkode'");
while($t = mysqli_fetch_array($qt)){
?>
	<div class="row form-group">
		<label class="col-md-4 ">Kode Poliklinik</label>
		<div class="col-md-8">
			<input class="form-control" type="text" name="kode" readonly
			value="<?php echo $t['kode_poliklinik']; ?>" required>
		</div>
	</div>
			<hr>
	<div class="row form-group">
		<label class="col-md-4 ">Nama Poliklinik</label>
		<div class="col-md-8">
			<input class="form-control" type="text" name="nama" 
			value="<?php echo $t['nama_poliklinik']; ?>"	required>
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
	$nama = $_POST['nama'];

	$query = mysqli_query(, "update poliklinik set nama_poliklinik='$nama' where kode_poliklinik='$getkode'");
	if($query == 1){
		echo "<script>document.location.href='index.php?halaman=Poliklinik'</script>";
	}else{
		echo "ERROR, ".mysqli_error();
	}
}
?>
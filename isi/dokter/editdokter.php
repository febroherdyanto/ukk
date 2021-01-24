<div class="clearfix">

<div class="panel panel-primary">
<div class="panel-heading">
	<h2 class="panel-title" align="center"><i class="fa fa-stethoscope"></i> 
		HALAMAN DOKTER</h2>
</div>
<div class="panel-body">
<?php $getkode = $_GET['kode'];
$qtampil = mysqli_query($connect, "select * from dokter where kode_dokter='$getkode'");
while($tampil = mysqli_fetch_array($qtampil)){
	$exalamat = $tampil['alamat_dokter'];
	$pecah = explode("=", $exalamat);
	$xjl = $pecah[0];
	$xds = $pecah[1];
	$xkec = $pecah[2];
	$xkabkot = $pecah[3];
	$xkpos = $pecah[4];
	$xprov = $pecah[5];
?>
<form class="form-horizontal" role="form" method="post" action="">
	<div class="row form-group">
		<label class="col-md-3 ">Kode Dokter</label>
		<div class="col-md-9">
			<input class="form-control" type="text" name="kode_dokter" readonly
			value="<?php echo $tampil['kode_dokter']; ?>" required>
		</div>
	</div>
			<hr>
	<div class="row form-group">
		<label class="col-md-3 ">Pilih Poliklinik</label>
		<div class="col-md-9">
			<p>
          <span class='field'>
            <select name='kode_pl' class='form-control'><?php
              $qpl=mysqli_query($connect, "SELECT * FROM poliklinik ORDER BY kode_poliklinik ASC"); 
              while($pl=mysqli_fetch_array($qpl)){
               if ($tampil['kode_poliklinik']==$pl['kode_poliklinik']){
               echo "<option value='$pl[kode_poliklinik]' name='kode_pl' selected>$pl[nama_poliklinik]</option>";}
               else{
               echo "<option value='$pl[kode_poliklinik]' name='kode_pl'>$pl[nama_poliklinik]</option> </p> ";
                }
              } ?>
             </select></span>
        	</p>
		</div>
	</div>
		<hr>
	<div class="row form-group">
		<label class="col-md-3 ">Nama Dokter</label>
		<div class="col-md-9">
			<input class="form-control" type="text" name="nama" 
			value="<?php echo $tampil['nama_dokter']; ?>" required>
		</div>
	</div>
			<hr>
	<div class="row form-group">
		<label class="col-md-3 ">Alamat Dokter</label>
		<div class="col-md-9">
			<div class="col-sm-12">
			<input type="text" name="jl" class="form-control" value="<?php echo $xjl ?>" required></input>
			</div>
			<div class="col-sm-4">
			<input type="text" name="ds" class="form-control" value="<?php echo $xds ?>" required></input></div>
			<div class="col-sm-5">
			<input type="text" name="kec" class="form-control" value="<?php echo $xkec ?>" required></input></div>
			<div class="col-sm-3">
			<input type="text" name="kpos" class="form-control" value="<?php echo $xkpos ?>" required></input>
			</div>
			<div class="col-sm-6">
			<input type="text" name="kabkot" class="form-control" value="<?php echo $xkabkot ?>" required></input>
			</div>
			<div class="col-sm-6">
			<input type="text" name="prov" class="form-control" value="<?php echo $xprov ?>" required></input></div>
		</div>
	</div>
			<hr>
	<div class="row form-group">
		<label class="col-md-3 ">No. Telp Dokter</label>
		<div class="col-md-9">
			<input class="form-control" type="text" name="telp" 
			value="<?php echo $tampil['telp_dokter']; ?>" required>
		</div>
	</div>
			<hr>
	<div class="row form-group">
		<div class="col-md-9">
			<input type="submit" class="btn btn-success" name="edit" value="SIMPAN">
		</div>
	</div>
</form>
<?php } ?>

</div> <!-- Panel Body -->
</div> <!-- Panel Primary -->

</div><!-- Clearfix -->

<?php
if(isset($_POST['edit'])){
$kode_poliklinik = trim($_POST['kode_pl']);
$nama_dokter = addslashes(trim($_POST['nama']));
$alamat_dokter = addslashes(trim($_POST['jl']))."=".addslashes(trim($_POST['ds']))."=".addslashes(trim($_POST['kec']))."=".addslashes(trim($_POST['kabkot']))."=".addslashes(trim($_POST['kpos']))."=".addslashes(trim($_POST['prov']));
$telp_dokter = addslashes(trim($_POST['telp']));

$query = mysqli_query($connect, "update dokter set kode_poliklinik='$kode_poliklinik',
	nama_dokter='$nama_dokter', alamat_dokter='$alamat_dokter', telp_dokter='$telp_dokter'
	where kode_dokter='$getkode'");
if($query == 1){
	echo "<script>document.location.href='index.php?halaman=Dokter'</script>";
}else{
	echo "ERROR, ".mysqli_error($GLOBALS["___mysqli_ston"]);
}
}
?>
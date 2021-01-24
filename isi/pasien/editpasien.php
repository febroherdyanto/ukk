<div class="clearfix">

<div class="panel panel-primary">
<div class="panel-heading">
	<h2 class="panel-title" align="center"><i class="fa fa-wheelchair"></i> 
		EDIT DATA PASIEN</h2>
</div>
<div class="panel-body">

<?php
$getno = $_GET['no'];
$qtampil = mysqli_query($connect, "select * from pasien where no_pasien='$getno'");
while($tampil = mysqli_fetch_array($qtampil)){
	$exalamat = $tampil['alamat_pasien'];
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
		<label class="col-md-3 ">Nama Pasien</label>
		<div class="col-md-9">
			<input class="form-control" type="text" name="nama" 
			value="<?php echo $tampil['nama_pasien']; ?>" required>
		</div>
	</div>
			<hr>
	<div class="row form-group">
		<label class="col-md-3 ">Alamat Pasien</label>
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
		<label class="col-md-3 ">No Telp Pasien</label>
		<div class="col-md-9">
			<input class="form-control" type="text" name="telp" 
			value="<?php echo $tampil['telp_pasien']; ?>" required>
		</div>
	</div>
			<hr>
	<div class="row form-group">
		<label class="col-md-3 ">Tgl Lahir Pasien</label>
		<div class="col-md-9">
			<div class='input-group date form_date col-md-7' data-date="" data- date- 
			format="yyyy/mm/dd" data-link-field="dtp_input2" 	
			data-link-format="yyyy-mm-dd" id='tanggal'>
					<input type='text' class='form-control' name="tgl_lahir" id="tgl"
					 value="<?php echo $tampil['tgl_lahir_pasien']; ?>" required>
				</div><input type="hidden" id="dtp_input2" value="" />
    		<script type='text/javascript'>
			$(function(){
				$('#tgl').datetimepicker({
					altFormat:'yyyy/mm/dd'});
			});
		</script>
<script type="text/javascript">
	$('.form_date').datepicker({
		altFormat:'yyyy-mm-dd'
	});
</script>
	</div></div>
		<hr>
	<div class="row form-group">
		<label class="col-md-3 ">Jenis Kelamin Pasien</label>
		<div class="col-md-9">
			<?php if($tampil['jenkel_pasien'] == 'L'){
				echo '<input type="radio" name="jenkel" value="L" checked> Laki-Laki
				<input type="radio" name="jenkel" value="P"> Perempuan';
			}else{
				echo '<input type="radio" name="jenkel" value="L"> Laki-Laki
				<input type="radio" name="jenkel" value="P" checked> Perempuan';
			} ?>
		</div>
	</div>
		<hr>
	<div class="row form-group">
		<label class="col-md-3 ">Tanggal Registrasi</label>
		<div class="col-md-9">
			<div class='input-group date form_date col-md-7' data-date="" data- date- 
			format="yyyy/mm/dd" data-link-field="dtp_input2" 	
			data-link-format="yyyy-mm-dd" id='tanggal'>
					<input type='text' class='form-control' name="tgl_reg" id="tgl_reg"
					 value="<?php echo $tampil['tgl_registrasi']; ?>" required>
				</div><input type="hidden" id="dtp_input2" value="" />
    		<script type='text/javascript'>
			$(function(){
				$('#tgl_reg').datetimepicker({
					altFormat:'yyyy/mm/dd'});
			});
		</script>
<script type="text/javascript">
	$('.form_date').datepicker({
		altFormat:'yyyy-mm-dd'
	});
</script>
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
$nama_pasien = addslashes(trim($_POST['nama']));
$alamat_pasien = addslashes(trim($_POST['jl']))."=".addslashes(trim($_POST['ds']))."=".addslashes(trim($_POST['kec']))."=".addslashes(trim($_POST['kabkot']))."=".addslashes(trim($_POST['kpos']))."=".addslashes(trim($_POST['prov']));
$telp_pasien = addslashes(trim($_POST['telp']));
$tgl_lahir_pasien = addslashes(trim($_POST['tgl_lahir']));
$jenkel_pasien = addslashes(trim($_POST['jenkel']));
$tgl_registrasi = addslashes(trim($_POST['tgl_reg']));

$query = mysqli_query($connect, "update pasien set nama_pasien='$nama_pasien', 
	alamat_pasien='$alamat_pasien', telp_pasien='$telp_pasien', 
	tgl_lahir_pasien='$tgl_lahir_pasien', jenkel_pasien='$jenkel_pasien',
	tgl_registrasi='$tgl_registrasi' where no_pasien='$getno'");

if($query == 1){
	echo "<script>document.location.href='index.php?halaman=Pasien';</script>";
}else{
	echo "GAGAL EDIT DATA PASIEN ".mysqli_error($query);
}
}
?>
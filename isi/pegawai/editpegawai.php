<div class="clearfix">

<div class="panel panel-primary">
<div class="panel-heading">
	<h2 class="panel-title" align="center"><i class="fa fa-home"></i> 
		EDIT DATA PEGAWAI</h2>
</div>
<div class="panel-body">
<?php $getnip = $_GET['nip']; 
$qtampil = mysqli_query($connect, "select * from pegawai where NIP='$getnip'");
while($t = mysqli_fetch_array($qtampil)){
	$exalamat = $t['alamat_pegawai'];
	$pecah = explode("=", $exalamat);
	$xjl = $pecah[0];
	$xds = $pecah[1];
	$xkec = $pecah[2];
	$xkabkot = $pecah[3];
	$xkpos = $pecah[4];
	$xprov = $pecah[5];
?>
<form class="form-horizontal" id="FormTambah" role="form" method="post" action="">
	<div class="row form-group">
		<label class="col-md-3 ">NIP</label>
		<div class="col-md-9">
			<input class="form-control" type="text" name="nip" required readonly			value="<?php echo $getnip; ?>" >
		</div>
	</div>
			<hr>
	<div class="row form-group">
		<label class="col-md-3 ">Nama Pegawai</label>
		<div class="col-md-9">
			<input class="form-control" type="text" name="nama" required
			value="<?php echo $t['nama_pegawai']; ?>" >
		</div>
	</div>
			<hr>
	<div class="row form-group">
		<label class="col-md-3 ">Alamat Pegawai</label>
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
		<label class="col-md-3 ">No. Telp Pegawai</label>
		<div class="col-md-9">
			<input class="form-control" type="text" name="telp" required
			value="<?php echo $t['telp_pegawai']; ?>" >
		</div>
	</div>
			<hr>
	<div class="row form-group">
		<label class="col-md-3 ">Tanggal Lahir Pegawai</label>
		<div class="col-md-9">
			<div class='input-group date form_date col-md-4' data-date="" data- date- 
			format="yyyy/mm/dd" data-link-field="dtp_input2" 	
			data-link-format="yyyy-mm-dd" id='tanggal'>
					<input type='text' class='form-control' name="tgl_lahir" id="tgl"
					 placeholder="yyyy/mm/dd" required value="<?php echo 
					 $t['tgl_lahir_pegawai']; ?>">
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
		</div>
	</div>
			<hr>
	<div class="row form-group">
		<label class="col-md-3 ">Jenis Kelamin Pegawai</label>
		<div class="col-md-9">
			<?php if($t['jenkel_pegawai'] == 'L'){
				echo '<input type="radio" name="jenkel" value="L" checked> Laki-Laki
				<input type="radio" name="jenkel" value="P"> Perempuan';
			}else{
				echo '<input type="radio" name="jenkel" value="L"> Laki-Laki
				<input type="radio" name="jenkel" value="P" checked> Perempuan';
			} ?>
		</div>
	</div>
			<hr>
<?php } 
$qtu = mysqli_query($connect, "select * from user where NIP='$getnip'");
while($u = mysqli_fetch_array($qtu)){?>


	
	<div class="row form-group">
		<label class="col-md-3 ">Username Pegawai</label>
		<div class="col-md-9">
			<input class="form-control" type="text" name="username" required
			value="<?php echo $u['username']; ?>" readonly>
		</div>
	</div>
			<hr>
	<div class="row form-group">
		<label class="col-md-3 ">Password Pegawai</label>
		<div class="col-md-9">
			<input class="form-control" type="text" name="password" placeholder="Masukkan Ulang Password Anda"><br>
			<i>*Jika Password tidak dirubah, kosongkan kolom Password Pegawai</i>
		</div>
	</div> <input type="text" name="level" value="<?php echo $u['level_user']; ?>"
	hidden>
			<hr>	
	<div class="row form-group">
		<div class="col-md-12" align="center">
			<input type="submit" name="proses" class="btn btn-success" value="EDIT">
		</div>
	</div>
</form>
<?php } ?>

<?php
if(isset($_POST['proses'])){
$nama_pegawai = addslashes(trim($_POST['nama']));
$alamat_pegawai = addslashes(trim($_POST['jl']))."=".addslashes(trim($_POST['ds']))."=".addslashes(trim($_POST['kec']))."=".addslashes(trim($_POST['kabkot']))."=".addslashes(trim($_POST['kpos']))."=".addslashes(trim($_POST['prov']));
$telp_pegawai = addslashes(trim($_POST['telp']));
$tgl_lahir_pegawai = addslashes(trim($_POST['tgl_lahir']));
$jenkel_pegawai = addslashes(trim($_POST['jenkel']));

$username = $_POST['username'];
$password = md5($_POST['password']);
$level_user = $_POST['level'];

if($_POST['password'] == NULL){

	$q1 = mysqli_query($connect, "update pegawai set nama_pegawai='$nama_pegawai', 
		alamat_pegawai='$alamat_pegawai', telp_pegawai='$telp_pegawai',
		tgl_lahir_pegawai='$tgl_lahir_pegawai', jenkel_pegawai='$jenkel_pegawai'
		where NIP='$getnip'");
	$q2 = mysqli_query($connect, "update user set level_user='$level_user' where NIP='$getnip'");

	if(($q1 == 1) AND ($q2 == 1)){
		echo "<script>document.location.href='index.php?halaman=Pegawai';</script>";
	}else{
		echo "ERROR ".mysqli_error();
	}

}else if($_POST['password'] != NULL){
	$qe1 = mysqli_query($connect, "update pegawai set nama_pegawai='$nama_pegawai', 
		alamat_pegawai='$alamat_pegawai', telp_pegawai='$telp_pegawai',
		tgl_lahir_pegawai='$tgl_lahir_pegawai', jenkel_pegawai='$jenkel_pegawai'
		where NIP='$getnip'");
	$qe2 = mysqli_query($connect, "update user set password='$password',
		level_user='$level_user' where NIP='$getnip'");

	if(($qe1 == 1) AND ($qe2 == 1)){
		echo "<script>document.location.href='index.php?halaman=Pegawai';</script>";
	}else{
		echo "ERROR ".mysqli_error();
	}
}

}
?>

</div> <!-- Panel Body -->
</div> <!-- Panel Primary -->

</div><!-- Clearfix -->
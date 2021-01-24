<?php $getnp = $_GET['np']; ?>
<div class="clearfix">

<div class="panel panel-primary">
<div class="panel-heading">
	<h2 class="panel-title" align="center"><i class="fa fa-plus"></i> 
		TAMBAH PENDAFTARAN</h2>
</div>
<div class="panel-body">
<form class="form-horizontal" role="form" method="post" action="">

	<div class="row form-group">
		<label class="col-md-4 ">Pilih Pegawai</label>
		<div class="col-md-5">
			<p>
          <span class='field'><?php    $user = "";
			if(isset($_SESSION['klinik'])){
				$ssnip = $_SESSION['klinik']['NIP'];}?>
			<input type="text" name="nip" value="<?php echo $ssnip ?>" hidden></input>
			<?php $qnpeg = mysqli_query($connect, "select * from pegawai where NIP='$ssnip'");
			 while($npg = mysqli_fetch_array($qnpeg)){?>
			<input type="text" value="<?php  echo $npg['nama_pegawai']; } ?>" class="form-control" readonly></span>
        	</p>
		</div>
	</div>
		<hr>
	<div class="row form-group">
		<label class="col-md-4 ">Nama Pasien</label>
		<div class="col-md-5"><?php
              $qpas=mysqli_query($connect, "SELECT * FROM pasien where no_pasien='$getnp'"); 
              while($pas=mysqli_fetch_array($qpas)){
              	echo "<input type='text' value='$pas[nama_pasien]' class='form-control' readonly></input>";
              } ?>
		</div>
	</div>
		<hr>
	<div class="row form-group">
		<label class="col-md-4 ">Tanggal Pendaftaran</label>
		<div class="col-md-5">
			<input type='text' class='form-control' name="tgl_pendaftaran" value="<?php echo date('Y/m/d'); ?>" readonly>
		</div>
	</div>
			<hr>
	<div class="row form-group">
		<label class="col-md-4 ">No Urut</label>
		<div class="col-md-2">
			<input class="form-control" type="text" name="no_urut" 
			placeholder="Masukkan No Urut" required>
		</div>
	</div>
			<hr>
	<div class="row form-group">
		<div class="col-md-9">
			<input type="submit" class="btn btn-success" name="simpan" value="SIMPAN">
		</div>
	</div>
</form>

<?php
if(isset($_POST['simpan'])){
	$nop = '';
	$nip = $_POST['nip'];
	$tgl = $_POST['tgl_pendaftaran'];
	$no_urut = addslashes(trim($_POST['no_urut']));

	$query = mysqli_query($connect, "insert into pendaftaran values('$nop','$nip','$getnp','$tgl','$no_urut')");
	if($query == 1){
		echo "<script>document.location.href='index.php?halaman=Pendaftaran'</script>";
	}else{
		echo "ERROR, ".mysqli_error($query);
	}
}
?>



</div> <!-- Panel Body -->
</div> <!-- Panel Primary -->

</div><!-- Clearfix -->







</div>
<div class="clearfix">

<div class="panel panel-primary">
<div class="panel-heading">
	<h2 class="panel-title" align="center"><i class="fa fa-stethoscope"></i> 
		HALAMAN EDIT PEMERIKSAAN</h2>
</div>
<div class="panel-body">
<?php $getno = $_GET['no'];
$qtampil = mysqli_query($connect, "select * from pemeriksaan where no_pemeriksaan='$getno'");
while($tampil = mysqli_fetch_array($qtampil)){
?>
<form class="form-horizontal" role="form" method="post" action="">
	<div class="row form-group">
		<label class="col-md-4 ">Pilih No Pendaftaran</label>
		<div class="col-md-6">
			<p>
          <span class='field'>
            <select name='no_pendaftaran' class='form-control'><?php
              $qpl=mysqli_query($connect, "SELECT * FROM pendaftaran ORDER BY tgl_pendaftaran DESC"); 
              while($pl=mysqli_fetch_array($qpl)){
               if ($tampil['no_pendaftaran']==$pl['no_pendaftaran']){
               echo "<option value='$pl[no_pendaftaran]' selected>No. $pl[no_pendaftaran] # Tgl. $pl[tgl_pendaftaran]</option>";}
               else{
               echo "<option value='$pl[no_pendaftaran]'>No. $pl[no_pendaftaran] # Tgl. $pl[tgl_pendaftaran]</option> </p> ";
                }
              } ?>
             </select></span>
        	</p>
		</div>
	</div>
		<hr>
	<div class="row form-group">
		<label class="col-md-4 ">Keluhan</label>
		<div class="col-md-6">
			<textarea name="keluhan" class="form-control" rows="2" required><?php echo $tampil['keluhan'] ?></textarea>
		</div>
	</div>
			<hr>
	<div class="row form-group">
		<label class="col-md-4 ">Diagnosa</label>
		<div class="col-md-6">
			<textarea name="diagnosa" class="form-control" rows="2" required><?php echo $tampil['diagnosa'] ?></textarea>
		</div>
	</div>
			<hr>
	<div class="row form-group">
		<label class="col-md-4 ">Perawatan</label>
		<div class="col-md-6">
			<textarea name="perawatan" class="form-control" rows="2" required><?php echo $tampil['perawatan'] ?></textarea>
		</div>
	</div>
			<hr>
	<div class="row form-group">
		<label class="col-md-4 ">Tindakan</label>
		<div class="col-md-6">
			<textarea name="tindakan" class="form-control" rows="2" required><?php echo $tampil['tindakan'] ?></textarea>
		</div>
	</div>
			<hr>
	<div class="row form-group">
		<label class="col-md-4 ">Berat Badan</label>
		<div class="col-md-3">
			<input type="number" name="berat_badan" class="form-control" maxlength="3" value="<?php echo $tampil['berat_badan'] ?>" required="">
		</div>
		<div class="col-md-2">kg</div>
	</div>
			<hr>
	<div class="row form-group">
		<label class="col-md-4 ">Tensi Diastolik</label>
		<div class="col-md-3">
			<input type="number" name="t_diastolik" class="form-control" maxlength="3" value="<?php echo $tampil['tensi_diastolik']; ?>" required="">
		</div>
	</div>
			<hr>
	<div class="row form-group">
		<label class="col-md-4 ">Tensi Sistolik</label>
		<div class="col-md-3">
			<input type="number" name="t_sistolik" class="form-control" maxlength="3" value="<?php echo $tampil['tensi_sistolik']; ?>" required="">
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
$no_pendaftaran = addslashes(trim($_POST['no_pendaftaran']));
$keluhan = addslashes(trim($_POST['keluhan']));
$diagnosa = addslashes(trim($_POST['diagnosa']));
$perawatan = addslashes(trim($_POST['perawatan']));
$tindakan = addslashes(trim($_POST['tindakan']));
$berat_badan = addslashes(trim($_POST['berat_badan']));
$tensi_diastolik = addslashes(trim($_POST['t_diastolik']));
$tensi_sistolik = addslashes(trim($_POST['t_sistolik']));

$query = mysqli_query($connect, "update pemeriksaan set no_pendaftaran='$no_pendaftaran', keluhan='$keluhan', diagnosa='$diagnosa', perawatan='$perawatan', tindakan='$tindakan', berat_badan='$berat_badan', tensi_diastolik='$tensi_diastolik', tensi_sistolik='$tensi_sistolik' where no_pemeriksaan='$getno'");
if($query == 1){
	echo "<script>document.location.href='index.php?halaman=Pemeriksaan'</script>";
}else{
	echo "ERROR, ".mysqli_error($query);
}
}
?>
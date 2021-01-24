<?php
 $getno = $_GET['no'];
if($_GET['back'] == 'pasien'){ 
	$np = $_GET['np'];?>
	<script type="text/javascript">
	var r = confirm('Apakah Anda ingin Mencetak data Pasien');
	if(r == true){
		window.open('http://localhost/ukk/isi/pasien/cetakpasien.php?np=<?php echo $np; ?>','_blank');
		document.location.href='index.php?halaman=Edit-Pendaftaran&no=<?php echo $getno;?>';
	}else{
		document.location.href='<?php echo "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>';
	}
	</script>
<?php
}else{
?>
<div class="clearfix">

<div class="panel panel-primary">
<div class="panel-heading">
	<h2 class="panel-title" align="center"><i class="fa fa-edit"></i> 
		EDIT DATA PENDAFTARAN</h2>
</div>
<div class="panel-body">


<form class="form-horizontal" role="form" method="post" action="">
<?php
$qt = mysqli_query($connect, "select * from pendaftaran where no_pendaftaran='$getno'");
while($t = mysqli_fetch_array($qt)){
?>
	<div class="row form-group">
		<label class="col-md-4 ">Nama Pegawai</label>
		<div class="col-md-8">
			<input type="text" name="nip" value="<?php echo $t['NIP'] ?>" hidden></input>
			<?php $qnpeg = mysqli_query($connect, "select * from pegawai where NIP='$t[NIP]'");
			 while($npg = mysqli_fetch_array($qnpeg)){?>
			<input type="text" value="<?php  echo $npg['nama_pegawai']; } ?>" class="form-control" readonly>
		</div>
	</div>
		<hr>
	<div class="row form-group">
		<label class="col-md-4 ">Pilih Pasien</label>
		<div class="col-md-8">
			<select name='pasien' class='form-control'><?php
              $qdok=mysqli_query($connect, "SELECT * FROM pasien ORDER BY nama_pasien ASC"); 
              while($dok=mysqli_fetch_array($qdok)){
               if ($t['no_pasien']==$dok['no_pasien']){
               echo "<option value='$dok[no_pasien]'selected>$dok[nama_pasien]</option>";}
               else{
               echo "<option value='$dok[no_pasien]'>$dok[nama_pasien]</option> </p> ";
                }
              } ?>
             </select>
		</div>
	</div>
		<hr>
	<div class="row form-group">
		<label class="col-md-4 ">Tanggal Pendaftaran</label>
		<div class="col-md-8">
			<div class='input-group date form_date col-md-4' data-date="" data- date- 
			format="yyyy/mm/dd" data-link-field="dtp_input2" 	
			data-link-format="yyyy-mm-dd" id='tanggal'>
					<input type='text' class='form-control' name="tgl_pendaftaran" id="tgl"
					 placeholder="yyyy/mm/dd" required value="<?php echo 
					 $t['tgl_pendaftaran']; ?>">
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
		<label class="col-md-4 ">No Urut</label>
		<div class="col-md-1">
			<input class="form-control" type="text" name="no_urut" required
			value="<?php echo $t['no_urut']; ?>">
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
	$ID_jenis_biaya = addslashes(trim($_POST['jb']));
	$nip = addslashes(trim($_POST['nip']));
	$no_pasien = addslashes(trim($_POST['pasien']));
	$tgl_pendaftaran = addslashes(trim($_POST['tgl_pendaftaran']));
	$no_urut = addslashes(trim($_POST['no_urut']));

	$query = mysqli_query($connect, "update pendaftaran set NIP='$nip' , no_pasien='$no_pasien', tgl_pendaftaran='$tgl_pendaftaran', no_urut='$no_urut' where no_pendaftaran='$getno' ");
	if($query == 1){
		echo "<script>document.location.href='index.php?halaman=Pendaftaran'</script>";
	}else{
		echo "ERROR, ".mysqli_error($GLOBALS["___mysqli_ston"]);
	}
}
?>


<?php } ?>
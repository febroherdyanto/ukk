<div class="clearfix">

<div class="panel panel-primary">
<div class="panel-heading">
	<h2 class="panel-title" align="center"><i class="fa fa-edit"></i> 
		EDIT DATA POLIKLINIK</h2>
</div>
<div class="panel-body">


<form class="form-horizontal" role="form" method="post" action="">
<?php $getkode = $_GET['kode'];
$qt = mysqli_query($connect, "select * from jadwal_praktek where kode_jadwal='$getkode'");
while($t = mysqli_fetch_array($qt)){
?>
	<div class="row form-group">
		<label class="col-md-4 ">Kode Jadwal Praktek</label>
		<div class="col-md-8">
			<input class="form-control" type="text" name="kode_jadwal" readonly
			value="<?php echo $t['kode_jadwal']; ?>" required>
		</div>
	</div>
			<hr>
	<div class="row form-group">
		<label class="col-md-4 ">Nama Dokter</label>
		<div class="col-md-8">
			<select name='kode_dokter' class='form-control'><?php
              $qdok=mysqli_query($connect, "SELECT * FROM dokter ORDER BY kode_dokter ASC"); 
              while($dok=mysqli_fetch_array($qdok)){
               if ($t['kode_dokter']==$dok['kode_dokter']){
               echo "<option value='$dok[kode_dokter]'selected>$dok[nama_dokter]</option>";}
               else{
               echo "<option value='$dok[kode_dokter]'>$dok[nama_dokter]</option> </p> ";
                }
              } ?>
             </select>
		</div>
	</div>
		<hr>
	<div class="row form-group">
		<label class="col-md-4 ">Hari</label>
		<div class="col-md-8">
			<select name='hari' class='form-control'><?php
              $hari = $t['hari'];
               if ($hari == 'Senin'){
	               echo '<option value="Senin" selected>Senin</option>
					<option value="Selasa">Selasa</option>
					<option value="Rabu">Rabu</option>
					<option value="Kamis">Kamis</option>
					<option value="Jum\'at">Jum\'at</option>
					<option value="Sabtu">Sabtu</option>
					<option value="Minggu">Minggu</option>';
               }else if($hari == 'Selasa'){
	               echo '<option value="Senin">Senin</option>
					<option value="Selasa" selected>Selasa</option>
					<option value="Rabu">Rabu</option>
					<option value="Kamis">Kamis</option>
					<option value="Jum\'at">Jum\'at</option>
					<option value="Sabtu">Sabtu</option>
					<option value="Minggu">Minggu</option>';
              }else if($hari == 'Rabu'){
	               echo '<option value="Senin">Senin</option>
					<option value="Selasa">Selasa</option>
					<option value="Rabu" selected>Rabu</option>
					<option value="Kamis">Kamis</option>
					<option value="Jum\'at">Jum\'at</option>
					<option value="Sabtu">Sabtu</option>
					<option value="Minggu">Minggu</option>';
              }else if($hari == 'Kamis'){
	               echo '<option value="Senin">Senin</option>
					<option value="Selasa">Selasa</option>
					<option value="Rabu">Rabu</option>
					<option value="Kamis" selected>Kamis</option>
					<option value="Jum\'at">Jum\'at</option>
					<option value="Sabtu">Sabtu</option>
					<option value="Minggu">Minggu</option>';
              }else if($hari == 'Jum\'at'){
	               echo '<option value="Senin">Senin</option>
					<option value="Selasa">Selasa</option>
					<option value="Rabu">Rabu</option>
					<option value="Kamis">Kamis</option>
					<option value="Jum\'at" selected>Jum\'at</option>
					<option value="Sabtu">Sabtu</option>
					<option value="Minggu">Minggu</option>';
              }else if($hari == 'Sabtu'){
	               echo '<option value="Senin">Senin</option>
					<option value="Selasa">Selasa</option>
					<option value="Rabu">Rabu</option>
					<option value="Kamis">Kamis</option>
					<option value="Jum\'at">Jum\'at</option>
					<option value="Sabtu" selected>Sabtu</option>
					<option value="Minggu">Minggu</option>';
              }else if($hari == 'Minggu'){
	               echo '<option value="Senin">Senin</option>
					<option value="Selasa">Selasa</option>
					<option value="Rabu">Rabu</option>
					<option value="Kamis">Kamis</option>
					<option value="Jum\'at">Jum\'at</option>
					<option value="Sabtu">Sabtu</option>
					<option value="Minggu" selected>Minggu</option>';
			  }?>
             </select>
		</div>
	</div>
		<hr>
	<div class="row form-group">
		<label class="col-md-4 ">Jam Mulai Praktek</label>
		<div class="col-md-8">
			<div class="input-group bootstrap-timepicker timepicker">
				<input id="timepickermulai" type="text" class="form-control input-small"
				name="jam_mulai" value="<?php echo $t['jam_mulai'] ?>">
				<span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
			</div>
		    <script type="text/javascript">
		        $('#timepickermulai').timepicker({
		            minuteStep: 1,
		            secondStep: 5,
		            showInputs: false,
		            modalBackdrop: true,
		            showSeconds: true,
		            showMeridian: false
		        });
		    </script>
		</div>
	</div>
			<hr>
	<div class="row form-group">
		<label class="col-md-4 ">Jam Selesai Praktek</label>
		<div class="col-md-8">
			<div class="input-group bootstrap-timepicker timepicker">
				<input id="timepickerselesai" type="text" class="form-control input-small"
				name="jam_selesai" value="<?php echo $t['jam_selesai'] ?>">
				<span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
			</div>
		    <script type="text/javascript">
		        $('#timepickerselesai').timepicker({
		            minuteStep: 1,
		            secondStep: 5,
		            showInputs: false,
		            modalBackdrop: true,
		            showSeconds: true,
		            showMeridian: false
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
	$kode_dokter = addslashes(trim($_POST['kode_dokter']));
	$hari = addslashes(trim($_POST['hari']));
	$jam_mulai = addslashes(trim($_POST['jam_mulai']));
	$jam_selesai = addslashes(trim($_POST['jam_selesai']));

	$query = mysqli_query($connect, "update jadwal_praktek set kode_dokter='$kode_dokter', hari='$hari', jam_mulai='$jam_mulai', jam_selesai='$jam_selesai' where kode_jadwal='$getkode' ");
	if($query == 1){
		echo "<script>document.location.href='index.php?halaman=Jadwal-Praktek'</script>";
	}else{
		echo "ERROR, ".mysqli_error($GLOBALS["___mysqli_ston"]);
	}
}
?>
<div class="clearfix">

<div class="panel panel-primary">
<div class="panel-heading">
	<h2 class="panel-title" align="center"><i class="fa fa-stethoscope"></i> 
		HALAMAN JADWAL PRAKTEK</h2>
</div>
<div class="panel-body">

<a data-toggle="modal"  class="btn btn-info btn-sm" role="button" 
data-target="#ModalTambah" href="#"><i class="fa fa-plus"></i> Tambah Jadwal Praktek</a>




      <hr>
<!-- Datatable -->
<div class="row">
	<table id="jadwalpraktek" class="table table-bordered table-hover">
		<caption align="center"> </caption>
		<thead>
			<th align="center">No.</th>
			<th align="center">Kode Jadwal</th>
			<th align="center">Kode Dokter</th>
			<th align="center">Hari</th>
			<th align="center">Jam Mulai</th>
			<th align="center">Jam Selesai</th>
			<th align="center">Aksi</th>
		</thead>
		<tbody>
	<?php $qtampil = mysqli_query($connect, "select * from jadwal_praktek order by kode_jadwal asc");
		$no = 1;
		while($tm = mysqli_fetch_array($qtampil)){?>
		<tr>
			<td align="center"><?php echo $no; ?>.</td>
			<td><?php echo $tm['kode_jadwal'] ;?></td>
			<td><?php $qnama = mysqli_query($connect, "select * from dokter where 
				kode_dokter='$tm[kode_dokter]'");
				while($nama = mysqli_fetch_array($qnama)){
					echo $nama['nama_dokter'];}	?>
			</td>
			<td><?php echo $tm['hari'] ;?></td>
			<td><?php echo $tm['jam_mulai'] ;?></td>
			<td><?php echo $tm['jam_selesai'] ;?></td>
			<td>
				<a href="index.php?halaman=Edit-Jadwal-Praktek&kode=<?php 
					echo $tm['kode_jadwal'] ;?>">
				<button class="btn-sm btn-warning"><i class="fa fa-edit"></i></button></a>
				| <a href="isi/jadwal/hapusjadwal.php?kode=<?php echo 
				$tm['kode_jadwal'] ;?>"
				onclick="return confirm('Anda Yakin untuk Menghapus Jadwal Praktek?')">
				<button class="btn-sm btn-danger"><i class="fa fa-trash"></i></button></a>
			</td>
		</tr>
		<?php $no++; } ?>
		</tbody>
	</table>
</div>


<script type="text/javascript">
            $(function() {
                $("#jadwalpraktek").dataTable();
            });
</script>


</div> <!-- Panel Body -->
</div> <!-- Panel Primary -->

</div><!-- Clearfix -->


<!-- /********* MODAL TAMBAH ***********/ -->

             <div class="modal fade" id="ModalTambah" tabindex="-1" role="dialog" 
             aria-labelledby="myModalLabel" aria-hidden="true">
                 <div class="modal-dialog">
                     <div class="modal-content">
                         <div class="modal-header">
                             <button type="button" class="close" data-dismiss="modal" 
                             aria-hidden="true">&times;</button>
                             <h3 class="modal-title" id="myModalLabel">
							<center><b>Tambah Jadwal Praktek</b></center></h3>
                         </div>
                         <div class="modal-body">
<form class="form-horizontal" id="FormTambah" role="form" method="post" 
	action="isi/jadwal/prosestambah.php">
	<div class="row form-group">
		<label class="col-md-4 ">Kode Jadwal Praktek</label>
		<div class="col-md-8">
			<input class="form-control" type="text" name="kode_jadwal" 
			placeholder="Masukkan Kode Jadwal Praktek" required>
		</div>
	</div>
			<hr>
	<div class="row form-group">
		<label class="col-md-4 ">Pilih Dokter</label>
		<div class="col-md-8">
          <span class='field'>
            <select name='kode_dokter' class='form-control'><?php
              $qdok=mysqli_query($connect, "SELECT * FROM dokter ORDER BY kode_dokter ASC"); 
              while($dok=mysqli_fetch_array($qdok)){
               if ($dok['kode_dokter']){
               echo "<option value='$dok[kode_dokter]'>$dok[nama_dokter]</option>";}
               else{
               echo "<option value='$dok[kode_dokter]'>$dok[nama_dokter]</option>";
                }
              } ?>
             </select></span>
        	</p>
		</div>
	</div>
		<hr>
	<div class="row form-group">
		<label class="col-md-4 ">Hari Praktek</label>
		<div class="col-md-8">
			<select name="hari" class="form-control">
				<option value="Senin">Senin</option>
				<option value="Selasa">Selasa</option>
				<option value="Rabu">Rabu</option>
				<option value="Kamis">Kamis</option>
				<option value="Jum'at">Jum'at</option>
				<option value="Sabtu">Sabtu</option>
				<option value="Minggu">Minggu</option>
			</select>
		</div>
	</div>
			<hr>
	<div class="row form-group">
		<label class="col-md-4 ">Jam Mulai Praktek</label>
		<div class="col-md-8">

	<div class="input-group bootstrap-timepicker timepicker">
		<input id="timepicker4" type="text" class="form-control input-small"
		name="jam_mulai">
		<span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
	</div>

    <script type="text/javascript">
        $('#timepicker4').timepicker({
            minuteStep: 1,
            secondStep: 5,
            showInputs: false,
            template: 'modal',
            modalBackdrop: true,
            showSeconds: true,
            showMeridian: false
        });
    </script>
<!--
			<input class="form-control" type="text" name="jam_mulai" 
			placeholder="Masukkan Jam Mulai Praktek" required> -->
		</div>
	</div>
			<hr>
	<div class="row form-group">
		<label class="col-md-4 ">Jam Selesai Praktek</label>
		<div class="col-md-6">
			<input class="form-control" type="text" name="jam_selesai" 
			placeholder="Masukkan Jam Selesai Praktek" required>
		</div>
		<div class="col-md-2">*hh:mm:ss</div>
	</div>
			<hr>
	<div class="row form-group">
		<div class="col-md-9">
			<input type="submit" class="btn btn-success" name="simpan" value="SIMPAN">
		</div>
	</div>
</form>

</div>
                     </div>
                 </div>
             </div>
<!-- /********* MODAL ***********/ -->
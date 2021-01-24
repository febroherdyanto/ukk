<div class="clearfix">

<div class="panel panel-primary">
<div class="panel-heading">
	<h2 class="panel-title" align="center"><i class="fa fa-stethoscope"></i> 
		HALAMAN PEMERIKSAAN</h2>
</div>
<div class="panel-body">

<a data-toggle="modal"  class="btn btn-info btn-sm" role="button" 
data-target="#ModalTambah" href="#"><i class="fa fa-plus"></i> Lakukan Pemeriksaan</a>




<hr>
<!-- Datatable -->
<div class="row">
	<table id="dokter" class="table table-bordered table-hover">
		<caption align="center"> </caption>
		<thead>
			<th align="center">No.</th>
			<th align="center">No Pendaftaran</th>
			<th align="center">Keluhan</th>
			<th align="center">Diagnosa</th>
			<th align="center">Tindakan</th>
			<th align="center">Berat Badan</th>
			<th align="center">Aksi</th>
		</thead>
		<tbody>
	<?php $qtampil = mysqli_query($connect, "select * from pemeriksaan order by no_pemeriksaan desc");
		$no = 1;
		while($tm = mysqli_fetch_array($qtampil)){?>
		<tr>
			<td align="center"><?php echo $no; ?>.</td>
			<td><?php echo $tm['no_pendaftaran'] ;?></td>
			<td><?php echo $tm['keluhan'] ?></td>
			<td><?php echo $tm['diagnosa'] ;?></td>
			<td><?php echo $tm['tindakan'] ;?></td>
			<td><?php echo $tm['berat_badan'] ;?></td>
			<td>
				<a href="index.php?halaman=Edit-Pemeriksaan&no=<?php 
					echo $tm['no_pemeriksaan'] ;?>">
				<button class="btn-sm btn-warning"><i class="fa fa-edit"></i></button></a>
				| <a href="isi/pemeriksaan/hapuspemeriksaan.php?no=<?php echo 
				$tm['no_pemeriksaan'] ;?>"
				onclick="return confirm('Anda Yakin untuk Menghapus Data Pemeriksaan?')">
				<button class="btn-sm btn-danger"><i class="fa fa-trash"></i></button></a>
			</td>
		</tr>
		<?php $no++; } ?>
		</tbody>
	</table>
</div>


<script type="text/javascript">
            $(function() {
                $("#dokter").dataTable();
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
							<center><b>Tambah Data Dokter</b></center></h3>
                         </div>
                         <div class="modal-body">
<form class="form-horizontal" id="FormTambah" role="form" method="post" 
	action="isi/pemeriksaan/prosestambah.php">
	<div class="row form-group">
		<label class="col-md-4 ">Pilih No Pendaftaran</label>
		<div class="col-md-8">
			<p>
          <span class='field'>
            <select name='no_pendaftaran' class='form-control'><?php
              $qpl=mysqli_query($connect, "SELECT * FROM pendaftaran ORDER BY no_pendaftaran DESC"); 
              while($pl=mysqli_fetch_array($qpl)){
               if ($pl['no_pendaftaran']){
               echo "<option value='$pl[no_pendaftaran]'>No. $pl[no_pendaftaran] # Tgl. $pl[tgl_pendaftaran]</option>";}
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
		<div class="col-md-8">
			<textarea name="keluhan" class="form-control" rows="2" required></textarea>
		</div>
	</div>
			<hr>
	<div class="row form-group">
		<label class="col-md-4 ">Diagnosa</label>
		<div class="col-md-8">
			<textarea name="diagnosa" class="form-control" rows="2" required></textarea>
		</div>
	</div>
			<hr>
	<div class="row form-group">
		<label class="col-md-4 ">Perawatan</label>
		<div class="col-md-8">
			<textarea name="perawatan" class="form-control" rows="2" required></textarea>
		</div>
	</div>
			<hr>
	<div class="row form-group">
		<label class="col-md-4 ">Tindakan</label>
		<div class="col-md-8">
			<textarea name="tindakan" class="form-control" rows="2" required></textarea>
		</div>
	</div>
			<hr>
	<div class="row form-group">
		<label class="col-md-4 ">Berat Badan</label>
		<div class="col-md-3">
			<input type="number" name="berat_badan" class="form-control" maxlength="3" required="">
		</div>
		<div class="col-md-2">kg</div>
	</div>
			<hr>
	<div class="row form-group">
		<label class="col-md-4 ">Tensi Diastolik</label>
		<div class="col-md-3">
			<input type="number" name="t_diastolik" class="form-control" maxlength="3" required="">
		</div>
	</div>
			<hr>
	<div class="row form-group">
		<label class="col-md-4 ">Tensi Sistolik</label>
		<div class="col-md-3">
			<input type="number" name="t_sistolik" class="form-control" maxlength="3" required="">
		</div>
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
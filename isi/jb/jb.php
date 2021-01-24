<div class="clearfix">

<div class="panel panel-primary">
<div class="panel-heading">
	<h2 class="panel-title" align="center"><i class="fa fa-stethoscope"></i> 
		HALAMAN JENIS BIAYA</h2>
</div>
<div class="panel-body">

<a data-toggle="modal"  class="btn btn-info btn-sm" role="button" 
data-target="#ModalTambah" href="#"><i class="fa fa-plus"></i> Tambah Jenis Biaya</a>




      <hr>
<!-- Datatable -->
<div class="row">
	<table id="jb" class="table table-bordered table-hover">
		<caption align="center"> </caption>
		<thead>
			<th align="center">No.</th>
			<th align="center">ID Jenis Biaya</th>
			<th align="center">Nama Jenis Biaya</th>
			<th align="center">Tarif</th>
			<th align="center">Aksi</th>
		</thead>
		<tbody>
	<?php $qtampil = mysqli_query($connect, "select * from jenis_biaya order by ID_jenis_biaya asc");
		$no = 1;
		while($tm = mysqli_fetch_array($qtampil)){?>
		<tr>
			<td align="center"><?php echo $no; ?>.</td>
			<td><?php echo $tm['ID_jenis_biaya'] ;?></td>
			<td><?php echo $tm['nama_biaya'] ;?></td>
			<td><?php echo $tm['tarif'] ;?></td>
			<td>
				<a href="index.php?halaman=Edit-Jenis-Biaya&id=<?php 
					echo $tm['ID_jenis_biaya'] ;?>">
				<button class="btn-sm btn-warning"><i class="fa fa-edit"></i></button></a>
				| <a href="isi/jb/hapusjb.php?id=<?php echo 
				$tm['ID_jenis_biaya'] ;?>"
				onclick="return confirm('Anda Yakin untuk Menghapus Jenis Biaya?')">
				<button class="btn-sm btn-danger"><i class="fa fa-trash"></i></button></a>
			</td>
		</tr>
		<?php $no++; } ?>
		</tbody>
	</table>
</div>


<script type="text/javascript">
            $(function() {
                $("#jb").dataTable();
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
							<center><b>Tambah Jenis Biaya</b></center></h3>
                         </div>
                         <div class="modal-body">
<form class="form-horizontal" id="FormTambah" role="form" method="post" 
	action="isi/jb/prosestambah.php">
	<div class="row form-group">
		<label class="col-md-4 ">ID Jenis Biaya</label>
		<div class="col-md-8">
			<input class="form-control" type="text" name="id" 
			placeholder="Masukkan ID Jenis Biaya" required>
		</div>
	</div>
			<hr>
	<div class="row form-group">
		<label class="col-md-4 ">Nama Jenis Biaya</label>
		<div class="col-md-8">
			<input class="form-control" type="text" name="nama" 
			placeholder="Masukkan Nama Jenis Biaya" required>
		</div>
	</div>
			<hr>
	<div class="row form-group">
		<label class="col-md-4 ">Tarif Jenis Biaya</label>
		<div class="col-md-8">
			<input class="form-control" type="text" name="tarif" 
			placeholder="Masukkan Tarif Jenis Biaya" required>
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
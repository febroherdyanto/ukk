<div class="clearfix">

<div class="panel panel-primary">
<div class="panel-heading">
	<h2 class="panel-title" align="center"><i class="fa fa-medkit"></i> 
		HALAMAN OBAT</h2>
</div>
<div class="panel-body">

<a data-toggle="modal"  class="btn btn-info btn-sm" role="button" 
data-target="#ModalTambah" href="#"><i class="fa fa-plus"></i> Tambah Data Obat</a>




<hr>
<!-- Datatable -->
<div class="row">
	<table id="obat" class="table table-bordered table-hover">
		<caption align="center"> </caption>
		<thead>
			<th align="center">No.</th>
			<th align="center">Kode Obat</th>
			<th align="center">Nama Obat</th>
			<th align="center">Merk Obat</th>
			<th align="center">Harga Jual</th>
			<th align="center">Aksi</th>
		</thead>
		<tbody>
	<?php $qtampil = mysqli_query($connect, "select * from obat order by nama_obat asc");
		$no = 1;
		while($tm = mysqli_fetch_array($qtampil)){?>
		<tr>
			<td align="center"><?php echo $no; ?>.</td>
			<td><?php echo $tm['kode_obat'] ;?></td>
			<td><?php echo $tm['nama_obat'] ;?></td>
			<td><?php echo $tm['merk'] ;?></td>
			<td><?php echo $tm['harga_jual'] ;?></td>
			<td>
				<a href="index.php?halaman=Edit-Obat&kode=<?php 
					echo $tm['kode_obat'] ;?>">
				<button class="btn-sm btn-warning"><i class="fa fa-edit"></i></button></a>
				| <a href="isi/obat/hapusobat.php?kode=<?php echo 
				$tm['kode_obat'] ;?>"
				onclick="return confirm('Anda Yakin untuk Data Obat?')">
				<button class="btn-sm btn-danger"><i class="fa fa-trash"></i></button></a>
			</td>
		</tr>
		<?php $no++; } ?>
		</tbody>
	</table>
</div>


<script type="text/javascript">
            $(function() {
                $("#obat").dataTable();
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
							<center><b>Tambah Data Obat</b></center></h3>
                         </div>
                         <div class="modal-body">
<form class="form-horizontal" id="FormTambah" role="form" method="post" 
	action="isi/obat/prosestambah.php">
	<div class="row form-group">
		<label class="col-md-4 ">Kode Obat</label>
		<div class="col-md-8">
			<input class="form-control" type="text" name="kode" 
			placeholder="Masukkan Kode Obat" required>
		</div>
	</div>
			<hr>
	<div class="row form-group">
		<label class="col-md-4 ">Nama Obat</label>
		<div class="col-md-8">
			<input class="form-control" type="text" name="nama" 
			placeholder="Masukkan Nama Obat" required>
		</div>
	</div>
		<hr>
	<div class="row form-group">
		<label class="col-md-4 ">Merk Obat</label>
		<div class="col-md-8">
			<input class="form-control" type="text" name="merk" 
			placeholder="Masukkan Merk Obat" required>
		</div>
	</div>
		<hr>
	<div class="row form-group">
		<label class="col-md-4 ">Satuan Obat</label>
		<div class="col-md-8">
			<input class="form-control" type="text" name="satuan" 
			placeholder="Masukkan Satuan Obat" required>
		</div>
	</div>
		<hr>
	<div class="row form-group">
		<label class="col-md-4 ">Harga Jual</label>
		<div class="col-md-8">
			<input class="form-control" type="text" name="harga_jual" 
			placeholder="Masukkan Harga Jual Obat" required>
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
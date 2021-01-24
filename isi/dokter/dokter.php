<div class="clearfix">

<div class="panel panel-primary">
<div class="panel-heading">
	<h2 class="panel-title" align="center"><i class="fa fa-stethoscope"></i> 
		HALAMAN DOKTER</h2>
</div>
<div class="panel-body">

<a data-toggle="modal"  class="btn btn-info btn-sm" role="button" 
data-target="#ModalTambah" href="#"><i class="fa fa-plus"></i> Tambah Data Dokter</a>




<hr>
<!-- Datatable -->
<div class="row">
	<table id="dokter" class="table table-bordered table-hover">
		<caption align="center"> </caption>
		<thead>
			<th align="center">No.</th>
			<th align="center">Kode Dokter</th>
			<th align="center">Nama Poliklinik</th>
			<th align="center">Nama Dokter</th>
			<th align="center">Telp Dokter</th>
			<th align="center">Aksi</th>
		</thead>
		<tbody>
	<?php $qtampil = mysqli_query($connect, "select * from dokter order by kode_dokter asc");
		$no = 1;
		while($tm = mysqli_fetch_array($qtampil)){?>
		<tr>
			<td align="center"><?php echo $no; ?>.</td>
			<td><?php echo $tm['kode_dokter'] ;?></td>
			<td><?php $qnama = mysqli_query($connect, "select * from poliklinik where 
				kode_poliklinik='$tm[kode_poliklinik]'");
				while($nama = mysqli_fetch_array($qnama)){
					echo $nama['nama_poliklinik'];}	?>
			</td>
			<td><?php echo $tm['nama_dokter'] ;?></td>
			<td><?php echo $tm['telp_dokter'] ;?></td>
			<td>
				<a href="index.php?halaman=Edit-Dokter&kode=<?php 
					echo $tm['kode_dokter'] ;?>">
				<button class="btn-sm btn-warning"><i class="fa fa-edit"></i></button></a>
				| <a href="isi/dokter/hapuspoli.php?kode=<?php echo 
				$tm['kode_dokter'] ;?>"
				onclick="return confirm('Anda Yakin untuk Data Dokter?')">
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
	action="isi/dokter/prosestambah.php">
	<div class="row form-group">
		<label class="col-md-4 ">Kode Dokter</label>
		<div class="col-md-8">
			<input class="form-control" type="text" name="kode_dokter" 
			placeholder="Masukkan Kode Dokter" required>
		</div>
	</div>
			<hr>
	<div class="row form-group">
		<label class="col-md-4 ">Pilih Poliklinik</label>
		<div class="col-md-8">
			<p>
          <span class='field'>
            <select name='kode_pl' class='form-control'><?php
              $qpl=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM poliklinik ORDER BY kode_poliklinik ASC"); 
              while($pl=mysqli_fetch_array($qpl)){
               if ($a['kode_poliklinik']==$pl['kode_poliklinik']){
               echo "<option value='$pl[kode_poliklinik]' name='kode_pl'>$pl[kode_poliklinik] - $pl[nama_poliklinik]</option>";}
               else{
               echo "<option value='$pl[kode_poliklinik]' name='kode_pl'>$pl[kode_poliklinik] - $pl[nama_poliklinik]</option> </p> ";
                }
              } ?>
             </select></span>
        	</p>
		</div>
	</div>
		<hr>
	<div class="row form-group">
		<label class="col-md-4 ">Nama Dokter</label>
		<div class="col-md-8">
			<input class="form-control" type="text" name="nama" 
			placeholder="Masukkan Nama Dokter" required>
		</div>
	</div>
			<hr>
	<div class="row form-group">
		<label class="col-md-4 ">Alamat Dokter</label>
		<div class="col-md-8">
			<input type="text" name="jl" class="form-control" value="Jl. " required></input>
			<input type="text" name="ds" class="form-control" value="Ds. " required></input>
			<input type="text" name="kec" class="form-control" value="Kec. " required></input>
			<input type="text" name="kabkot" class="form-control" value="Kab. " required></input>
			<input type="text" name="kpos" class="form-control" value="Kode Pos. " required></input>
			<input type="text" name="prov" class="form-control" value="Prov. " required></input>
		</div>
	</div>
			<hr>
	<div class="row form-group">
		<label class="col-md-4 ">No. Telp Dokter</label>
		<div class="col-md-8">
			<input class="form-control" type="text" name="telp" 
			placeholder="Masukkan No Telp Dokter" required>
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
<div class="clearfix">

<div class="panel panel-primary">
<div class="panel-heading">
	<h2 class="panel-title" align="center"><i class="fa fa-wheelchair"></i> 
		HALAMAN PASIEN</h2>
</div>
<div class="panel-body">

<a data-toggle="modal" class="btn btn-info btn-sm" role="button" 
data-target="#ModalTambah" href="#"><i class="fa fa-plus"></i> Tambah Data Pasien</a>
<a href="isi/pasien/ekspor.php">Ekspor ke Excel</a>



<hr>
<!-- Datatable -->
<div class="row">
	<table id="dokter" class="table table-bordered table-hover">
		<caption align="center"> </caption>
		<thead>
			<th align="center">No.</th>
			<th align="center">Nama Pasien</th>
			<th align="center">Telp Pasien</th>
			<th align="center">Jenis Kelamin</th>
			<th align="center">Tgl Registrasi</th>
			<th align="center">Aksi</th>
		</thead>
		<tbody>
	<?php $qtampil = mysqli_query($connect, "select * from pasien order by nama_pasien asc");
		$no = 1;
		while($tm = mysqli_fetch_array($qtampil)){?>
		<tr>
			<td align="center"><?php echo $no; ?>.</td>
			<td><?php echo $tm['nama_pasien'] ;?></td>
			<td><?php echo $tm['telp_pasien'] ;?></td>
			<td><?php echo $tm['jenkel_pasien'] ;?></td>
			<td><?php echo $tm['tgl_registrasi'] ;?></td>
			<td><a href="isi/pasien/cetakpasien.php?np=<?php echo $tm['no_pasien'] ?>" target="_blank"><button class="btn-sm btn-info"><i class="fa fa-print"></i></button></a> | 
				<a href="index.php?halaman=Reg-Ulang&np=<?php echo $tm['no_pasien'] ;?>">
				<button class="btn-sm btn-success" title="Lakukan Pendaftaran untuk data yang sudah ada"><i class="fa fa-plus"></i></button></a> | 
				<a href="index.php?halaman=Edit-Pasien&no=<?php echo $tm['no_pasien'] ;?>">
				<button class="btn-sm btn-warning"><i class="fa fa-edit"></i></button></a>
				| <a href="isi/pasien/hapuspasien.php?no=<?php echo 
				$tm['no_pasien'] ;?>"
				onclick="return confirm('Anda Yakin untuk Data Pasien?')">
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
							<center><b>Tambah Data Pasien</b></center></h3>
                         </div>
                         <div class="modal-body">
<form class="form-horizontal" id="FormTambah" role="form" method="post" 
	action="isi/pasien/prosestambah.php">
	<div class="row form-group">
		<label class="col-md-4 ">Nama Pasien</label>
		<div class="col-md-8">
			<input class="form-control" type="text" name="nama" 
			placeholder="Masukkan Nama Pasien" required>
		</div>
	</div>
			<hr>
	<div class="row form-group">
		<label class="col-md-4 ">Alamat Pasien</label>
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
		<label class="col-md-4 ">No Telp Pasien</label>
		<div class="col-md-8">
			<input class="form-control" type="text" name="telp" 
			placeholder="Masukkan Telp Pasien" required>
		</div>
	</div>
			<hr>
	<div class="row form-group">
		<label class="col-md-4 ">Tgl Lahir Pasien</label>
		<div class="col-md-8">
			<div class='input-group date form_date col-md-7' data-date="" data- date- 
			format="yyyy/mm/dd" data-link-field="dtp_input2" 	
			data-link-format="yyyy-mm-dd" id='tanggal'>
					<input type='text' class='form-control' name="tgl_lahir" id="tgl"
					 placeholder="yyyy/mm/dd" required="required">
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
		<label class="col-md-4 ">Jenis Kelamin Pasien</label>
		<div class="col-md-8">
			<label>
			<input type="radio" name="jenkel" value="L" checked> Laki-Laki
			</label>
			<label>
			<input type="radio" name="jenkel" value="P"> Perempuan
			</label>
		</div>
	</div>
		<hr>
	<div class="row form-group">
		<label class="col-md-4 ">Tanggal Registrasi</label>
		<div class="col-md-8">
			<input type='text' class='form-control' name="tgl_reg"
					 value="<?php echo date('Y/m/d'); ?>" readonly>
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
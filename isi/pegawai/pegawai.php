<div class="clearfix">

<div class="panel panel-primary">
<div class="panel-heading">
	<h2 class="panel-title" align="center"><i class="fa fa-user-md"></i> HALAMAN PEGAWAI</h2>
</div>
<div class="panel-body">

<a data-toggle="modal"  class="btn btn-info btn-sm" role="button" 
	data-target="#ModalTambah" href="#"><i class="fa fa-plus"></i> Tambah Data Pegawai</a>
<a href="isi/pegawai/ekspor.php">Export ke Excel</a>




<hr>
<!-- Datatable -->
<div class="row">
	<table id="pegawai" class="table table-bordered table-hover">
		<caption align="center"> </caption>
		<thead>
			<th align="center">No.</th>
			<th align="center">NIP</th>
			<th align="center">Nama Pegawai</th>
			<th align="center">Jenis Kelamin</th>
			<th align="center">No. Telp</th>
			<th align="center">Aksi</th>
		</thead>
		<tbody>
		<?php $qtampil = mysqli_query($connect, "select * from pegawai where nip<>'' order by nama_pegawai asc");
		$no = 1;
		while($tm = mysqli_fetch_array($qtampil)){?>
		<tr>
			<td align="center"><?php echo $no; ?>.</td>
			<td><?php echo $tm['NIP'] ;?></td>
			<td><?php echo $tm['nama_pegawai'] ;?></td>
			<td><?php echo $tm['jenkel_pegawai'] ;?></td>
			<td><?php echo $tm['telp_pegawai'] ;?></td>
			<td>
				<a href="index.php?halaman=Edit-Pegawai&nip=<?php echo $tm['NIP'] ;?>">
				<button class="btn-sm btn-warning"><i class="fa fa-edit"></i></button></a>
				| <a href="isi/pegawai/hapuspegawai.php?nip=<?php echo $tm['NIP'] ;?>"
				onclick="return confirm('Anda Yakin untuk Data Pegawai?')">
				<button class="btn-sm btn-danger"><i class="fa fa-trash"></i></button></a>
			</td>
		</tr>
		<?php $no++; } ?>
		</tbody>
	</table>
</div>


<script type="text/javascript">
            $(function() {
                $("#pegawai").dataTable();
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
							<center><b>Tambah Data Pegawai Klinik</b></center></h3>
                         </div>
                         <div class="modal-body">
<form class="form-horizontal" id="FormTambah" role="form" method="post" action="isi/pegawai/prosestambah.php">
<div id="result"></div>
	<div class="row form-group">
		<label class="col-md-4 ">NIP</label>
		<div class="col-md-8">
			<input class="form-control" type="text" id="nip" name="nip" placeholder="Masukkan NIP Pegawai"
			required><span id='pesan'></span>
		</div>
	</div>
			<hr>
	<div class="row form-group">
		<label class="col-md-4 ">Nama Pegawai</label>
		<div class="col-md-8">
			<input class="form-control" type="text" name="nama" placeholder="Nama Lengkap Pegawai"
			required>
		</div>
	</div>
		<hr>
	<div class="row form-group">
		<label class="col-md-4 ">Alamat Pegawai</label>
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
		<label class="col-md-4 ">No. Telp Pegawai</label>
		<div class="col-md-8">
			<input type="text" class="form-control" name="telp" required
			placeholder="No Telp Pegawai">
		</div>
	</div>
		<hr>
	<div class="row form-group">
		<label class="col-md-4 ">Tgl Lahir Pegawai</label>
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
		<label class="col-md-4 ">Jenis Kelamin Pegawai</label>
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
		<label class="col-md-4 ">Username</label>
		<div class="col-md-8">
			<input type="text" class="form-control" name="username" id="username" required
			placeholder="Masukkan Username"><span id='pesan2'></span>
		</div>
	</div>
		<hr>
	<div class="row form-group">
		<label class="col-md-4 ">Password</label>
		<div class="col-md-8">
			<input type="text" class="form-control" name="password" required
			placeholder="Masukkan Password">
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













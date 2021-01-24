<div class="clearfix">

<div class="panel panel-primary">
<div class="panel-heading">
	<h2 class="panel-title" align="center"><i class="fa fa-wheelchair"></i> 
		HALAMAN PENDAFTARAN</h2>
</div>
<div class="panel-body">

<!--
<a data-toggle="modal"  class="btn btn-info btn-sm" role="button" 
data-target="#ModalTambah" href="#"><i class="fa fa-plus"></i> Lakukan Pendaftaran</a>
-->
<font color="red">
<h4><i class="fa fa-warning"></i> Tidak dapat melakukan pendaftaran kecuali melalui menu Pasien</h4>
</font>

<hr>
<!-- Datatable -->
<div class="row">
	<table id="pendaftaran" class="table table-bordered table-hover">
		<caption align="center"> </caption>
		<thead>
			<th align="center">No.</th>
			<th align="center">Pegawai</th>
			<th align="center">Nama Pasien</th>
			<th align="center">Tgl Pendaftaran</th>
			<th align="center">No Urut</th>
			<th align="center">Aksi</th>
		</thead>
		<tbody>
	<?php $qtampil = mysqli_query($connect, "select * from pendaftaran order by tgl_pendaftaran DESC");
		$no = 1;
		while($tm = mysqli_fetch_array($qtampil)){?>
		<tr>
			<td align="center"><?php echo $no; ?>.</td>
			<td><?php $qnpeg = mysqli_query($connect, "select * from pegawai where NIP='$tm[NIP]'");
			 while($npg = mysqli_fetch_array($qnpeg)){ echo $npg['nama_pegawai']; } ?></td>
			<td><?php $qnpas = mysqli_query($connect, "select * from pasien where no_pasien='$tm[no_pasien]'");
			 while($nps = mysqli_fetch_array($qnpas)){ echo $nps['nama_pasien']; } ?></td>
			<td><?php echo $tm['tgl_pendaftaran'] ;?></td>
			<td><?php echo $tm['no_urut'] ;?></td>
			<td>
				<a href="index.php?halaman=Edit-Pendaftaran&no=<?php 
					echo $tm['no_pendaftaran'] ;?>">
				<button class="btn-sm btn-warning"><i class="fa fa-edit"></i></button></a>
				| <a href="isi/pendaftaran/hapuspendaftaran.php?no=<?php echo 
				$tm['no_pendaftaran'] ;?>"
				onclick="return confirm('Anda Yakin untuk menghapus Data Pendaftaran?')">
				<button class="btn-sm btn-danger"><i class="fa fa-trash"></i></button></a>
			</td>
		</tr>
		<?php $no++; } ?>
		</tbody>
	</table>
</div>


<script type="text/javascript">
            $(function() {
                $("#pendaftaran").dataTable();
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
							<center><b>LAKUKAN PENDAFTARAN</b></center></h3>
                         </div>
                         <div class="modal-body">
<form class="form-horizontal" id="FormTambah" role="form" method="post" 
	action="isi/pendaftaran/prosestambah.php">

	<div class="row form-group">
		<label class="col-md-4 ">Pilih Pegawai</label>
		<div class="col-md-8">
			<p>
          <span class='field'><?php    $user = "";
			if(isset($_SESSION['klinik'])){
				$ssnip = $_SESSION['klinik']['NIP'];}?>
			<input type="text" name="nip" value="<?php echo $ssnip ?>" hidden></input>
			<?php $qnpeg = mysqli_query($connect, "select * from pegawai where NIP='$ssnip'");
			 while($npg = mysqli_fetch_array($qnpeg)){?>
			<input type="text" value="<?php  echo $npg['nama_pegawai']; } ?>" class="form-control" readonly></span>
        	</p>
		</div>
	</div>
		<hr>
	<div class="row form-group">
		<label class="col-md-4 ">Pilih Pasien</label>
		<div class="col-md-8">
			<p>
          <span class='field'>
            <select name='no_pasien' class='form-control'><?php
              $qpas=mysqli_query($connect, "SELECT * FROM pasien ORDER BY no_pasien DESC"); 
              while($pas=mysqli_fetch_array($qpas)){
               if ($pas['no_pasien']){
               echo "<option value='$pas[no_pasien]'>$pas[nama_pasien]</option>";}
               else{
               echo "<option value='$pas[no_pasien]'>$pas[nama_pasien]</option> </p> ";
                }
              } ?>
             </select></span>
        	</p>
		</div>
	</div>
		<hr>
	<div class="row form-group">
		<label class="col-md-4 ">Tanggal Pendaftaran</label>
		<div class="col-md-8">
			<input type='text' class='form-control' name="tgl_pendaftaran"
					 value="<?php echo date('Y/m/d'); ?>" readonly>
		</div>
	</div>
			<hr>
	<div class="row form-group">
		<label class="col-md-4 ">No Urut</label>
		<div class="col-md-8">
			<input class="form-control" type="text" name="no_urut" 
			placeholder="Masukkan No Urut" required>
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
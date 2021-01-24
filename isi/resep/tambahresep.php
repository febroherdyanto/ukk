<div class="clearfix">

<div class="panel panel-primary">
<div class="panel-heading">
	<h2 class="panel-title" align="center"><i class="fa fa-plus"></i> 
		TAMBAH DATA RESEP</h2>
</div>
<div class="panel-body">

<?php
$getnrs = $_GET['nrs'];
$urlsaatini = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

// ========================================================================================
// ========================================================================================
// ========================================================================================
?>

<div class="row">
<div class="col-sm-12">
<table class="table table-bordered table-hover">
<thead>
	<th colspan="2">No. Pemeriksaan <?php
		$cekpemeriksaan = mysqli_query($connect, "select * from resep where no_resep='$getnrs'");
		$cek = mysqli_fetch_array($cekpemeriksaan);
			$no_pem = $cek['no_pemeriksaan'];
		if(!empty($no_pem) == true){ ?>
			<input type="text" class="form-control" value="<?php echo $no_pem; ?>" disabled></input>
		<?php }else{?>
				<form method="post" action="">
					<div class="col-sm-8">
						<select name="no_pemeriksaan" class="form-control"><?php
			              $qpl=mysqli_query($connect, "SELECT * FROM pemeriksaan ORDER BY no_pemeriksaan DESC"); 
			              while($pl=mysqli_fetch_array($qpl)){
			               if ($pl['no_pemeriksaan']){
			               echo "<option value='$pl[no_pemeriksaan]' required>$pl[no_pemeriksaan]</option>";}
			               else{
			               echo "<option value='$pl[no_pemeriksaan]'>$pl[no_pemeriksaan]</option>";
			                }
			              } ?>
						</select>
					</div>
					<div class="col-sm-4">
						<button type="submit" name="cekpem" class="btn-sm btn-info">PILIH</button>
					</div>
				</form>
				<?php
				if(isset($_POST['cekpem'])){
					$no_pemeriksaan = $_POST['no_pemeriksaan'];
					$query = mysqli_query($connect, "update resep set no_pemeriksaan='$no_pemeriksaan' where no_resep='$getnrs'");
					if($query == 1){
						echo "<script>document.location.href='".$urlsaatini."'</script>";
					}else{
						echo "GAGAL EDIT NO PEMERIKSAAN DI RESEP".mysqli_error();
					}
				}
				?>
		<?php }  ?>
	</th>
	<th colspan="2">
	</th>
	<th colspan="3">
		<form method="post" action="" name="fcr">
		<div class="col-sm-8">
			<select name='cari' class='form-control'><?php
	            $qpl=mysqli_query($connect, "SELECT * FROM obat ORDER BY nama_obat ASC"); 
	         while($pl=mysqli_fetch_array($qpl)){
	            if ($pl['kode_obat']){
	             echo "<option value='$pl[kode_obat]'>$pl[nama_obat]</option>";}
	            else{
             echo "<option value='$pl[kode_obat]'>$pl[nama_obat]</option> </p> ";
	            }
           } ?>
       		</select>
		</div>
		<div class="col-sm-4">
			<input type="submit" name="scari" class="form-control btn btn-sm btn-info" value="PILIH">
		</div>
		</form>
	</th>
</thead>
<tbody>
<tr>
	<td width="3%" align="center"><b>No.</b></td>
	<td width="22%" align="center"><b>Obat</b></td>
	<td width="10%" align="center"><b>Dosis</b></td>
	<td width="20%" align="center"><b>Harga @</b></td>
	<td width="10%" align="center"><b>Jml Beli</b></td>
	<td width="20%" align="center"><b>Total Awal</b></td>
	<td width="10%" align="center"><b>Aksi</b></td>
</tr>
<?php
if(isset($_POST['scari'])){
	$cr = $_POST['cari'];
	$qt = mysqli_query($connect, "select * from obat where kode_obat like '%$cr%'");
	$t = mysqli_fetch_array($qt); 
}

$query = mysqli_query($connect, "select * from detail_resep where no_resep='$getnrs'");
$no = 1;
while($a = mysqli_fetch_array($query)){ ?>

<tr>
	<td><?php echo $no; ?></td>
	<td><?php $qprod = mysqli_query($connect, "select * from obat where kode_obat='$a[kode_obat]'");
		while($prod = mysqli_fetch_array($qprod)){
			echo $prod['nama_obat'];}?></td>
	<td><input type="text" name="dosis" class="form-control" value="<?php echo $a['dosis']; ?>"></input></td>
	<td><?php $qprod = mysqli_query($connect, "select * from obat where kode_obat='$a[kode_obat]'");
		while($prod = mysqli_fetch_array($qprod)){
			echo $prod['harga_jual'];}?>
	</td>
	<td align="center"><?php echo $a['jml_obat']; ?></td>
	<td align="right"><?php $tampiluang = number_format($a['total_awal'], 0, ',', '.');
			 echo "Rp. ".$tampiluang; ?></td>
	<td align="center">
		<a href="<?php echo $urlsaatini; ?>&del=HapusObat&kdobat=<?php echo $a['kode_obat']; ?>"
		onclick="return confirm('Anda Yakin untuk Menghapus Data Obat di Resep ini?')"><button class="btn-md btn-danger"><i class="fa fa-trash"></i></button></a>
	</td>
</tr>
<?php $no++; } 
if($_GET['del'] == 'HapusObat'){
	$gtdelobt = $_GET['kdobat'];
	$qh = mysqli_query($connect, "delete from detail_resep where kode_obat='$gtdelobt' and no_resep='$getnrs'");
	if($qh == 1){
	echo "<script>document.location.href='index.php?halaman=Tambah-Resep&nrs=".$getnrs."'</script>";
	}else{
		echo "GAGAL".mysqli_error();
	}
}
?>

<script type="text/javascript">
	function startCalculate(){
		interval=setInterval("Calculate()",10);
	}

	function Calculate(){
		var a=document.baris.hrg.value;
		var c=document.baris.jml.value;
		var total = document.baris.total.value=(a*c);
	}

	function stopCalc(){
		clearInterval(interval);
	}
</script>

<form method="post" action="" name="baris" id="baris">

	<tr>
		<td><?php echo $no; ?></td>
		<td><input type="text" name="kode_obat" value="<?php echo $t['kode_obat'];?>" hidden>
			<?php echo $t['nama_obat'];?></td>
		<td><input type="text" name="dosis" class="form-control" required></input></td>
		<td>
			<input type="text" name="hrg" class="form-control" id="hrg" onfocus="startCalculate()"
			 onblur="stopCalc()" value="<?php echo $t['harga_jual'];?>" readonly>
		</td>
		<td>
			<input type="text" name="jml_obat" id="jml" size="5" value="1"  class="form-control"
			onfocus="startCalculate()" onblur="stopCalc()">
		</td>
		<td>
			<input type="text" name="totalawal" id="total" class="form-control"
			onfocus="startCalculate()" onblur="stopCalc()" readonly>
		</td>
		<td align="center">
			<button class="btn btn-sm btn-info" type="submit" name="tmbobat"><i class="fa fa-save"></i> Simpan</button>
		</td>
	</tr>
</form>
<?php
if(isset($_POST['tmbobat'])){
	$kode_obat = addslashes(trim($_POST['kode_obat']));
	$dosis = addslashes(trim($_POST['dosis']));
	$jml_obat = addslashes(trim($_POST['jml_obat']));
	$total_awal = addslashes(trim($_POST['totalawal']));

	$query = mysqli_query($connect, "insert into detail_resep values('$getnrs','$kode_obat','$dosis','$jml_obat','$total_awal')");
	if($query == 1){
		echo "<script>document.location.href='".$urlsaatini."';</script>";
	}else{
		echo "GAGAL Tambah Obat".mysqli_error();
	}
}
// $$$$$$$$$$$$$$ FORM TAMBAH DATA OBAT
?>


<tr>
<?php $qh = mysqli_query($connect, "select total_awal, sum(total_awal) as jumlah from detail_resep where 
	no_resep='$getnrs'");
$c = mysqli_fetch_array($qh); ?>
	<td colspan="5" align="center">
	<form method="post" action=""><br>
		<button type="submit" name="akhiri" class="btn-lg btn-primary"><i class="fa fa-save"></i> Simpan</button>
	</form>
	<?php
	if(isset($_POST['akhiri'])){
		$hrgakhir = $c['jumlah'];
		$query = mysqli_query($connect, "update resep set harga_akhir='$hrgakhir' where no_resep='$getnrs'");
		if($query == 1){ ?>
			<script type="text/javascript">
			var r = confirm('Apakah Anda ingin Mencetak Resep tersebut ?');
			if(r == true){
				window.open('http://192.168.3.1/febro/isi/resep/cetakresep.php?nrs=<?php echo $getnrs; ?>','_blank');
				document.location.href='index.php?halaman=Resep';
			}else{
				document.location.href='<?php echo "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>';
			}
			</script>
		<?php }else{
			echo "GAGAL SIMPAN DATA AKHIR RESEP".mysqli_error();
		}
	}
	?>
	</td>
	
	<td colspan="2">
		<?php
			$tampil = number_format($c['jumlah'], 0, ',', '.');
				echo "<h5>Jumlah Harga Obat</h5>";
				echo "<h1>&nbsp;&nbsp;&nbsp;&nbsp;Rp. $tampil</h1>";
       		?>
	</td>
</tr>



</tbody>
</table>
</div>
</div>



<?php
// ========================================================================================
// ========================================================================================
// ========================================================================================
?>

</div> <!-- Panel Body -->
</div> <!-- Panel Primary -->

</div><!-- Clearfix -->
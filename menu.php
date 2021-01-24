<?php session_start();
$user = "";
	if(isset($_SESSION['klinik'])){
		$nip = $_SESSION['klinik']['NIP'];
		$username = $_SESSION['klinik']['username'];
		$level = $_SESSION['klinik']['level_user'];
	}

if ($level == 'admin'){
	 //Ketika Level yang Login adalah ADMIN
?>

	<ul class="nav navbar-nav">
		<li>
			<a href="index.php?halaman=Pegawai"><font color="white">
			<i class="fa fa-user-md"></i> Pegawai</font></a>
		</li>

		<li>
			<a href="index.php?halaman=Pasien"><font color="white">
			<i class="fa fa-wheelchair"></i> Pasien</font></a>
		</li>
		

		<li class="dropdown">
		 <a href="#" class="dropdown-toggle" data-toggle="dropdown"><font color="white">
	 		<i class="fa fa-user fa-fw"></i> Profile <strong class="caret"></strong></font></a>
			<ul class="dropdown-menu">
			<li>
			<a href="index.php?halaman=Edit-Pegawai&nip=<?php echo $nip; ?>"><i class="fa fa-edit fa-fw"></i> Edit Profil</a>
			<a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
			</li>
			</ul>
		</li>


		<li class="dropdown">
		 <a href="#" class="dropdown-toggle" data-toggle="dropdown"><font color="white">
	 		<i class="fa fa-users fa-fw"></i> Poliklinik <strong class="caret"></strong></font></a>
			<ul class="dropdown-menu">
			<li>
			<a href="index.php?halaman=Poliklinik"><i class="fa fa-ambulance fa-fw"></i> Daftar Poliklinik</a>
			<a href="index.php?halaman=Dokter"><i class="fa fa-stethoscope fa-fw"></i> Daftar Dokter</a>
			<a href="index.php?halaman=Jadwal-Praktek"><i class="fa fa-stethoscope fa-fw"></i> Jadwal Praktek</a>
			</li>
			</ul>
		</li>


		<li class="dropdown">
		 <a href="#" class="dropdown-toggle" data-toggle="dropdown"><font color="white">
	 		<i class="fa fa-users fa-fw"></i> Pendaftaran <strong class="caret"></strong></font></a>
			<ul class="dropdown-menu">
			<li>
			<a href="index.php?halaman=Pendaftaran"><i class="fa fa-ambulance fa-fw"></i> Pendaftaran</a>
			<a href="index.php?halaman=Pemeriksaan"><i class="fa fa-stethoscope fa-fw"></i> Pemeriksaan</a>
			<a href="index.php?halaman=Jenis-Biaya"><i class="fa fa-book fa-fw"></i> Jenis Biaya</a>
			</li>
			</ul>
		</li>


		<li class="dropdown">
		 <a href="#" class="dropdown-toggle" data-toggle="dropdown"><font color="white">
	 		<i class="fa fa-medkit fa-fw"></i> Obat & Resep <strong class="caret"></strong></font></a>
			<ul class="dropdown-menu">
		<li>
		<a href="index.php?halaman=Obat"><i class="fa fa-medkit fa-fw"></i> Obat</a>
		<a href="index.php?halaman=Resep"><i class="fa fa-medkit fa-fw"></i> Resep</a>
		</li>
			</ul>
		</li>
	</ul>







<?php
}else{
 //Ketika Level yang Login adalah KETUA
	?>

	<ul class="nav navbar-nav">

		<li>
			<a href="index.php?halaman=Pasien"><font color="white">
			<i class="fa fa-wheelchair"></i> Pasien</font></a>
		</li>
		

		<li class="dropdown">
		 <a href="#" class="dropdown-toggle" data-toggle="dropdown"><font color="white">
	 		<i class="fa fa-user fa-fw"></i> Profile <strong class="caret"></strong></font></a>
			<ul class="dropdown-menu">
			<li>
			<a href="index.php?halaman=Edit-Pegawai&nip=<?php echo $nip; ?>"><i class="fa fa-edit fa-fw"></i> Edit Profil</a>
			<a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
			</li>
			</ul>
		</li>


		<li class="dropdown">
		 <a href="#" class="dropdown-toggle" data-toggle="dropdown"><font color="white">
	 		<i class="fa fa-users fa-fw"></i> Poliklinik <strong class="caret"></strong></font></a>
			<ul class="dropdown-menu">
			<li>
			<a href="index.php?halaman=Poliklinik"><i class="fa fa-ambulance fa-fw"></i> Daftar Poliklinik</a>
			<a href="index.php?halaman=Dokter"><i class="fa fa-stethoscope fa-fw"></i> Daftar Dokter</a>
			<a href="index.php?halaman=Jadwal-Praktek"><i class="fa fa-stethoscope fa-fw"></i> Jadwal Praktek</a>
			</li>
			</ul>
		</li>


		<li class="dropdown">
		 <a href="#" class="dropdown-toggle" data-toggle="dropdown"><font color="white">
	 		<i class="fa fa-users fa-fw"></i> Pendaftaran <strong class="caret"></strong></font></a>
			<ul class="dropdown-menu">
			<li>
			<a href="index.php?halaman=Pendaftaran"><i class="fa fa-ambulance fa-fw"></i> Pendaftaran</a>
			<a href="index.php?halaman=Pemeriksaan"><i class="fa fa-stethoscope fa-fw"></i> Pemeriksaan</a>
			<a href="index.php?halaman=Jenis-Biaya"><i class="fa fa-book fa-fw"></i> Jenis Biaya</a>
			</li>
			</ul>
		</li>


		<li class="dropdown">
		 <a href="#" class="dropdown-toggle" data-toggle="dropdown"><font color="white">
	 		<i class="fa fa-medkit fa-fw"></i> Obat & Resep <strong class="caret"></strong></font></a>
			<ul class="dropdown-menu">
		<li>
		<a href="index.php?halaman=Obat"><i class="fa fa-medkit fa-fw"></i> Obat</a>
		<a href="index.php?halaman=Resep"><i class="fa fa-medkit fa-fw"></i> Resep</a>
		</li>
			</ul>
		</li>
	</ul>





<?php
} ?>
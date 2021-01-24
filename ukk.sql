-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 13, 2016 at 07:43 AM
-- Server version: 5.5.47-0ubuntu0.14.04.1
-- PHP Version: 5.5.34-1+deb.sury.org~trusty+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ukk`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_resep`
--

CREATE TABLE IF NOT EXISTS `detail_resep` (
  `no_resep` int(10) NOT NULL,
  `kode_obat` varchar(10) NOT NULL,
  `dosis` varchar(10) NOT NULL,
  `jml_obat` int(5) NOT NULL,
  `total_awal` bigint(11) NOT NULL,
  KEY `no_resep` (`no_resep`),
  KEY `kode_obat` (`kode_obat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_resep`
--

INSERT INTO `detail_resep` (`no_resep`, `kode_obat`, `dosis`, `jml_obat`, `total_awal`) VALUES
(1, 'Flu_001', '100 mg', 2, 10000),
(1, 'OB_003', '100 mg', 2, 3000),
(1, 'Flu_002', '100 mg', 2, 200000);

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE IF NOT EXISTS `dokter` (
  `kode_dokter` varchar(10) NOT NULL,
  `kode_poliklinik` varchar(10) NOT NULL,
  `nama_dokter` varchar(50) NOT NULL,
  `alamat_dokter` text NOT NULL,
  `telp_dokter` varchar(15) NOT NULL,
  PRIMARY KEY (`kode_dokter`),
  KEY `kode_poliklinik` (`kode_poliklinik`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`kode_dokter`, `kode_poliklinik`, `nama_dokter`, `alamat_dokter`, `telp_dokter`) VALUES
('DK_001', 'P_002', 'Dr. Febro Herdy''anto', 'Jl. Cempaka', '085736109698'),
('DK_002', 'P_001', 'Dr. Herdyanto', 'Jl. Cempaka no 7', '085736109698'),
('DK_003', 'P_002', 'Dr Aja2', 'Jl. Cempaka=Ds. Klecorejo=Kec. Mejayan=Kab. Madiun=Kode Pos. 63153=Prov. Jawa Timur', '085736109698');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_praktek`
--

CREATE TABLE IF NOT EXISTS `jadwal_praktek` (
  `kode_jadwal` varchar(10) NOT NULL,
  `kode_dokter` varchar(10) NOT NULL,
  `hari` varchar(10) NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  PRIMARY KEY (`kode_jadwal`),
  KEY `kode_dokter` (`kode_dokter`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal_praktek`
--

INSERT INTO `jadwal_praktek` (`kode_jadwal`, `kode_dokter`, `hari`, `jam_mulai`, `jam_selesai`) VALUES
('JD_002', 'DK_001', 'Rabu', '20:03:50', '22:30:16'),
('JD_006', 'DK_001', 'Rabu', '12:42:50', '22:28:11');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_biaya`
--

CREATE TABLE IF NOT EXISTS `jenis_biaya` (
  `ID_jenis_biaya` varchar(10) NOT NULL,
  `nama_biaya` varchar(50) NOT NULL,
  `tarif` bigint(11) NOT NULL,
  PRIMARY KEY (`ID_jenis_biaya`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_biaya`
--

INSERT INTO `jenis_biaya` (`ID_jenis_biaya`, `nama_biaya`, `tarif`) VALUES
('JB001', 'Check', 20000),
('JB002', 'Jenis BIaya 2', 100000);

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE IF NOT EXISTS `obat` (
  `kode_obat` varchar(10) NOT NULL,
  `nama_obat` varchar(50) NOT NULL,
  `merk` varchar(20) NOT NULL,
  `satuan` varchar(10) NOT NULL,
  `harga_jual` bigint(11) NOT NULL,
  PRIMARY KEY (`kode_obat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`kode_obat`, `nama_obat`, `merk`, `satuan`, `harga_jual`) VALUES
('Flu_001', 'Bodrex', 'Merk Obat', 'pil', 5000),
('Flu_002', 'Nama Obat 2 Edit', 'Merk 2', 'Satuan 2', 100000),
('OB_003', 'Paramex', 'INZA', 'Kaplet', 1500);

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE IF NOT EXISTS `pasien` (
  `no_pasien` int(10) NOT NULL AUTO_INCREMENT,
  `nama_pasien` varchar(50) NOT NULL,
  `alamat_pasien` text NOT NULL,
  `telp_pasien` varchar(15) NOT NULL,
  `tgl_lahir_pasien` date NOT NULL,
  `jenkel_pasien` text NOT NULL,
  `tgl_registrasi` date NOT NULL,
  PRIMARY KEY (`no_pasien`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`no_pasien`, `nama_pasien`, `alamat_pasien`, `telp_pasien`, `tgl_lahir_pasien`, `jenkel_pasien`, `tgl_registrasi`) VALUES
(3, 'Febro Herdyanto RPL', 'Jl. Cempaka=Ds. Klecorejo=Kec. Mejayan=Kab. Madiun=Kode Pos. 63153=Prov. Jawa Timur', '085736109698', '1998-02-20', 'L', '2016-02-10'),
(4, 'Pasien Febro', 'Jaldmwm', '085736109698', '2016-02-02', 'P', '2016-02-12'),
(9, 'Pasien lah', 'Jlaksnk', '085736109698', '1998-02-20', 'L', '2016-02-18'),
(15, 'Pasien Cetak', 'Ds. Klecorejo, Kec. Mejayan', '085736109698', '1998-02-20', 'L', '2016-02-18'),
(17, 'Febro Herdyanto', 'Jl. Cempaka=Ds. Klecorejo=Kec. Mejayan=Kab. Madiun=Kode Pos. 63153=Prov. Jawa Timur', '085736109698', '1998-02-20', 'L', '2016-02-18'),
(19, 'haha', 'Jl.=Ds.=Kec.=Kab.=Kode Pos.=Prov.', '17625', '1899-12-31', 'L', '2016-02-23'),
(20, 'Febro', 'Jl. Cempaka=Ds. Klecorejo=Kec. Mejayan=Kab. Madiun=Kode Pos. 63153=Prov. Jawa Timur', '085736109698', '1998-02-20', 'L', '2016-02-23');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE IF NOT EXISTS `pegawai` (
  `NIP` varchar(30) NOT NULL,
  `nama_pegawai` varchar(50) NOT NULL,
  `alamat_pegawai` text NOT NULL,
  `telp_pegawai` varchar(15) NOT NULL,
  `tgl_lahir_pegawai` date NOT NULL,
  `jenkel_pegawai` varchar(2) NOT NULL,
  PRIMARY KEY (`NIP`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`NIP`, `nama_pegawai`, `alamat_pegawai`, `telp_pegawai`, `tgl_lahir_pegawai`, `jenkel_pegawai`) VALUES
('-admin', 'Admin Febro Herdyanto', 'Jl. Cempaka=Ds. Klecorejo=Kec. Mejayan=Kab. Madiun=Kode Pos. 63153=Prov. Jawa Timur', '085736109698', '1990-02-20', 'L'),
('101', 'a Febroh', 'ra', '085736109698', '1998-02-20', 'L'),
('1010', 'Febro', 'ndwjln', '085736109698', '2016-02-23', 'L'),
('11', 'Pegawai 1', 'wihfwnkj', 'wjnj', '2016-02-08', 'L'),
('9090', 'Nama Pegawai Untuk Alamat', 'Jl. Cempaka=Ds. sss=Kec. Mejayan=Kab. eeee=Kode Pos. 63153=Prov. Jawa Timur', '085736109698', '1998-02-20', 'L');

-- --------------------------------------------------------

--
-- Table structure for table `pemeriksaan`
--

CREATE TABLE IF NOT EXISTS `pemeriksaan` (
  `no_pemeriksaan` int(10) NOT NULL AUTO_INCREMENT,
  `no_pendaftaran` int(10) NOT NULL,
  `keluhan` text NOT NULL,
  `diagnosa` text NOT NULL,
  `perawatan` text NOT NULL,
  `tindakan` text NOT NULL,
  `berat_badan` int(3) NOT NULL,
  `tensi_diastolik` int(5) NOT NULL,
  `tensi_sistolik` int(5) NOT NULL,
  PRIMARY KEY (`no_pemeriksaan`),
  KEY `no_pendaftaran` (`no_pendaftaran`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `pemeriksaan`
--

INSERT INTO `pemeriksaan` (`no_pemeriksaan`, `no_pendaftaran`, `keluhan`, `diagnosa`, `perawatan`, `tindakan`, `berat_badan`, `tensi_diastolik`, `tensi_sistolik`) VALUES
(1, 4, 'Kejang-Kejang loh.. :D', 'Sakit Jiwa :D', 'Rawat Inap 3 tahun', 'Operasi Otak', 90, 120, 120),
(3, 16, 'q', 'q', 'q', 'q', 70, 120, 120),
(4, 20, 'Sakit Kepala', 'Pusing', 'Istirahat Teratur', '-', 60, 120, 120);

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE IF NOT EXISTS `pendaftaran` (
  `no_pendaftaran` int(10) NOT NULL AUTO_INCREMENT,
  `NIP` varchar(20) NOT NULL,
  `no_pasien` int(10) NOT NULL,
  `tgl_pendaftaran` date NOT NULL,
  `no_urut` int(10) NOT NULL,
  PRIMARY KEY (`no_pendaftaran`),
  KEY `NIP` (`NIP`),
  KEY `no_pasien` (`no_pasien`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `pendaftaran`
--

INSERT INTO `pendaftaran` (`no_pendaftaran`, `NIP`, `no_pasien`, `tgl_pendaftaran`, `no_urut`) VALUES
(4, '9090', 3, '2016-02-18', 1),
(10, '-admin', 9, '1900-12-30', 2),
(16, '-admin', 15, '2016-02-18', 3),
(18, '-admin', 17, '2016-02-18', 4),
(20, '-admin', 17, '2016-02-19', 1),
(21, '-admin', 19, '2016-02-23', 3),
(23, '-admin', 3, '2016-02-23', 1);

-- --------------------------------------------------------

--
-- Table structure for table `poliklinik`
--

CREATE TABLE IF NOT EXISTS `poliklinik` (
  `kode_poliklinik` varchar(10) NOT NULL,
  `nama_poliklinik` varchar(50) NOT NULL,
  PRIMARY KEY (`kode_poliklinik`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `poliklinik`
--

INSERT INTO `poliklinik` (`kode_poliklinik`, `nama_poliklinik`) VALUES
('P_001', 'Poli Mata'),
('P_002', 'Poli Gigi');

-- --------------------------------------------------------

--
-- Table structure for table `resep`
--

CREATE TABLE IF NOT EXISTS `resep` (
  `no_resep` int(10) NOT NULL AUTO_INCREMENT,
  `no_pemeriksaan` int(10) NOT NULL,
  `harga_akhir` bigint(11) NOT NULL,
  PRIMARY KEY (`no_resep`),
  KEY `no_pemeriksaan` (`no_pemeriksaan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `resep`
--

INSERT INTO `resep` (`no_resep`, `no_pemeriksaan`, `harga_akhir`) VALUES
(1, 1, 213000);

-- --------------------------------------------------------

--
-- Table structure for table `rincian_biaya`
--

CREATE TABLE IF NOT EXISTS `rincian_biaya` (
  `no_pendaftaran` int(10) NOT NULL,
  `ID_jenis_biaya` varchar(10) NOT NULL,
  `tarif` bigint(11) NOT NULL,
  KEY `no_pendaftaran` (`no_pendaftaran`),
  KEY `ID_jenis_biaya` (`ID_jenis_biaya`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `NIP` varchar(20) NOT NULL,
  `level_user` varchar(10) NOT NULL,
  PRIMARY KEY (`username`),
  KEY `NIP` (`NIP`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `NIP`, `level_user`) VALUES
('9090', '38f629170ac3ab74b9d6d2cc411c2f3c', '9090', 'pegawai'),
('a', '0cc175b9c0f1b6a831c399e269772661', '-admin', 'admin'),
('r', '21232f297a57a5a743894a0e4a801fc3', '101', 'pegawai'),
('user', 'ee11cbb19052e40b07aac0ca060c23ee', '11', 'pegawai'),
('w', 'f1290186a5d0b1ceab27f4e77c0c5d68', '1010', 'pegawai');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_resep`
--
ALTER TABLE `detail_resep`
  ADD CONSTRAINT `detail_resep_ibfk_1` FOREIGN KEY (`no_resep`) REFERENCES `resep` (`no_resep`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_resep_ibfk_2` FOREIGN KEY (`kode_obat`) REFERENCES `obat` (`kode_obat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dokter`
--
ALTER TABLE `dokter`
  ADD CONSTRAINT `dokter_ibfk_1` FOREIGN KEY (`kode_poliklinik`) REFERENCES `poliklinik` (`kode_poliklinik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jadwal_praktek`
--
ALTER TABLE `jadwal_praktek`
  ADD CONSTRAINT `jadwal_praktek_ibfk_1` FOREIGN KEY (`kode_dokter`) REFERENCES `dokter` (`kode_dokter`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pemeriksaan`
--
ALTER TABLE `pemeriksaan`
  ADD CONSTRAINT `pemeriksaan_ibfk_1` FOREIGN KEY (`no_pendaftaran`) REFERENCES `pendaftaran` (`no_pendaftaran`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD CONSTRAINT `pendaftaran_ibfk_1` FOREIGN KEY (`NIP`) REFERENCES `pegawai` (`NIP`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pendaftaran_ibfk_2` FOREIGN KEY (`no_pasien`) REFERENCES `pasien` (`no_pasien`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `resep`
--
ALTER TABLE `resep`
  ADD CONSTRAINT `resep_ibfk_2` FOREIGN KEY (`no_pemeriksaan`) REFERENCES `pemeriksaan` (`no_pemeriksaan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rincian_biaya`
--
ALTER TABLE `rincian_biaya`
  ADD CONSTRAINT `rincian_biaya_ibfk_1` FOREIGN KEY (`no_pendaftaran`) REFERENCES `pendaftaran` (`no_pendaftaran`),
  ADD CONSTRAINT `rincian_biaya_ibfk_2` FOREIGN KEY (`ID_jenis_biaya`) REFERENCES `jenis_biaya` (`ID_jenis_biaya`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`NIP`) REFERENCES `pegawai` (`NIP`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

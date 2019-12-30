-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 30, 2019 at 03:53 PM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sekolah`
--

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `kode_guru` varchar(6) NOT NULL,
  `nama_guru` varchar(50) NOT NULL,
  `kode_mp` varchar(6) NOT NULL,
  `tempat_lahir` varchar(15) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(1) NOT NULL,
  `agama` varchar(10) NOT NULL,
  `alamat_guru` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`kode_guru`, `nama_guru`, `kode_mp`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `agama`, `alamat_guru`) VALUES
('GU-1', 'Bunda Ratih', 'MP0002', 'Malang', '1970-01-01', 'P', 'Islam', 'Malang');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `kode_jurusan` varchar(6) NOT NULL,
  `nama_jurusan` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`kode_jurusan`, `nama_jurusan`) VALUES
('JU0001', 'Rekayasa Perangkat Lunak'),
('JU0002', 'Teknik Pemesinan'),
('JU0003', 'Teknik Kendaraan Ringan'),
('JU0004', 'Teknik Sepeda Motor'),
('JU0005', 'Teknik Instalasi Tenaga Listrik'),
('JU0006', 'Teknik Gambar Bangunan'),
('JU0007', 'Multimedia'),
('JU0008', 'Teknik Komputer Dan Jaringan');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `type_user` varchar(5) NOT NULL,
  `kode_guru` varchar(6) NOT NULL,
  `nis` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`, `type_user`, `kode_guru`, `nis`) VALUES
('admin', 'admin', 'Admin', '', ''),
('bunda', 'ratih', 'Guru', 'GU-1', ''),
('greggygf', 'bluohazard', 'Siswa', '', 'SS-1');

-- --------------------------------------------------------

--
-- Table structure for table `mata_pelajaran`
--

CREATE TABLE `mata_pelajaran` (
  `kode_mp` varchar(6) NOT NULL,
  `nama_mp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mata_pelajaran`
--

INSERT INTO `mata_pelajaran` (`kode_mp`, `nama_mp`) VALUES
('MP-1', 'Pendidikan Kewarganegaraan'),
('MP-4', 'Web Dinamis'),
('MP-5', 'Bahasa Pemrograman'),
('MP-6', 'Sejarah'),
('MP0002', 'Matematika'),
('MP0003', 'Administrasi Basis Data');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `kode_nilai` varchar(6) NOT NULL,
  `nis` varchar(6) NOT NULL,
  `kode_guru` varchar(6) NOT NULL,
  `kode_sk` varchar(6) NOT NULL,
  `angka_nilai` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`kode_nilai`, `nis`, `kode_guru`, `kode_sk`, `angka_nilai`) VALUES
('NI-1', 'SS-1', 'GU-1', 'SK-1', 100),
('NI-11', 'SS-1', 'GU-1', 'SK-5', 95);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nis` varchar(6) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `kelas` varchar(3) NOT NULL,
  `kode_jurusan` varchar(6) NOT NULL,
  `tempat_lahir` varchar(15) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(1) NOT NULL,
  `agama` varchar(10) NOT NULL,
  `alamat_siswa` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nis`, `nama_siswa`, `kelas`, `kode_jurusan`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `agama`, `alamat_siswa`) VALUES
('SS-1', 'Greggy Gianini Firmansyah', 'XII', 'JU0001', 'Malang', '1999-03-22', 'L', 'Islam', 'Malang');

-- --------------------------------------------------------

--
-- Table structure for table `standar_kompetensi`
--

CREATE TABLE `standar_kompetensi` (
  `kode_sk` varchar(6) NOT NULL,
  `kode_mp` varchar(6) NOT NULL,
  `nama_sk` varchar(50) NOT NULL,
  `kelas_sk` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `standar_kompetensi`
--

INSERT INTO `standar_kompetensi` (`kode_sk`, `kode_mp`, `nama_sk`, `kelas_sk`) VALUES
('SK-1', 'MP0002', 'Mengetahui Garis Vektor', 'XII'),
('SK-2', 'MP-1', 'Pentingnya HAM di Indonesia', 'XII'),
('SK-3', 'MP0002', 'Mengetahui Bangun Ruang dan Datar', 'XII'),
('SK-4', 'MP0003', 'Operasi Insert,Update,Delete di Website', 'XII'),
('SK-5', 'MP0002', 'Statistika', 'XII'),
('SK-6', 'MP-6', 'Keadaan Indonesia Setelah Merdeka', 'XII');

-- --------------------------------------------------------

--
-- Table structure for table `wali_murid`
--

CREATE TABLE `wali_murid` (
  `kode_wali` varchar(6) NOT NULL,
  `nis` varchar(6) NOT NULL,
  `nama_ayah` varchar(50) NOT NULL,
  `pekerjaan_ayah` varchar(15) NOT NULL,
  `nama_ibu` varchar(50) NOT NULL,
  `pekerjaan_ibu` varchar(15) NOT NULL,
  `alamat_wali` varchar(50) NOT NULL,
  `no_telp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wali_murid`
--

INSERT INTO `wali_murid` (`kode_wali`, `nis`, `nama_ayah`, `pekerjaan_ayah`, `nama_ibu`, `pekerjaan_ibu`, `alamat_wali`, `no_telp`) VALUES
('WA-1', 'SS-1', 'Ayah Greggy', '-', 'Ibu Greggy', '-', 'Malang', '0000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`kode_guru`),
  ADD KEY `kode_mp` (`kode_mp`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`kode_jurusan`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  ADD PRIMARY KEY (`kode_mp`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`kode_nilai`),
  ADD KEY `nis` (`nis`),
  ADD KEY `kode_guru` (`kode_guru`),
  ADD KEY `kode_sk` (`kode_sk`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nis`),
  ADD KEY `kode_jurusan` (`kode_jurusan`);

--
-- Indexes for table `standar_kompetensi`
--
ALTER TABLE `standar_kompetensi`
  ADD PRIMARY KEY (`kode_sk`),
  ADD KEY `kode_mp` (`kode_mp`);

--
-- Indexes for table `wali_murid`
--
ALTER TABLE `wali_murid`
  ADD PRIMARY KEY (`kode_wali`),
  ADD KEY `nis` (`nis`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `guru`
--
ALTER TABLE `guru`
  ADD CONSTRAINT `guru_ibfk_1` FOREIGN KEY (`kode_mp`) REFERENCES `mata_pelajaran` (`kode_mp`);

--
-- Constraints for table `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `nilai_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_ibfk_2` FOREIGN KEY (`kode_guru`) REFERENCES `guru` (`kode_guru`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_ibfk_3` FOREIGN KEY (`kode_sk`) REFERENCES `standar_kompetensi` (`kode_sk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`kode_jurusan`) REFERENCES `jurusan` (`kode_jurusan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `standar_kompetensi`
--
ALTER TABLE `standar_kompetensi`
  ADD CONSTRAINT `standar_kompetensi_ibfk_1` FOREIGN KEY (`kode_mp`) REFERENCES `mata_pelajaran` (`kode_mp`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wali_murid`
--
ALTER TABLE `wali_murid`
  ADD CONSTRAINT `wali_murid_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

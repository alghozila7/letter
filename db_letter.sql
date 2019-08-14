-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2019 at 01:10 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_letter`
--

-- --------------------------------------------------------

--
-- Table structure for table `disposisi`
--

CREATE TABLE `disposisi` (
  `id_disposisi` int(11) NOT NULL,
  `id_surat` int(11) NOT NULL,
  `id_pegawai_pengirim` int(11) NOT NULL,
  `id_pegawai_penerima` int(11) NOT NULL,
  `tgl_disposisi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `keterangan` text NOT NULL,
  `mark` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `disposisi`
--

INSERT INTO `disposisi` (`id_disposisi`, `id_surat`, `id_pegawai_pengirim`, `id_pegawai_penerima`, `tgl_disposisi`, `keterangan`, `mark`) VALUES
(8, 6, 2, 1, '2019-08-07 10:58:06', 'Tanggal 12 Selesai', 0),
(9, 6, 2, 3, '2019-08-07 10:58:53', 'Buat Sebagus Mungkin', 0),
(10, 6, 2, 4, '2019-08-07 10:59:12', 'Buat Sebagus Mungkin', 1),
(11, 6, 2, 5, '2019-08-07 10:59:33', 'Buat Sebagus Mungkin', 0);

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(100) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`, `level`) VALUES
(1, 'Sekretaris', 1),
(2, 'Pimpinan', 2),
(3, 'Manajer', 3);

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nik` int(11) NOT NULL,
  `nama_pegawai` varchar(200) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `password` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nik`, `nama_pegawai`, `id_jabatan`, `password`, `status`) VALUES
(1, 111, 'Arlita Puspitaningrum', 1, '698d51a19d8a121ce581499d7b701668', 0),
(2, 222, 'Alrisda Satria Atmaja', 2, 'bcbe3365e6ac95ea2c0343a2395834dd', 0),
(3, 333, 'Jarkoni', 3, '310dcbbf4cce62f762a2aaa148d556bd', 0),
(4, 444, 'Sobirin', 3, '550a141f12de6341fba65b0ad0433500', 0),
(5, 555, 'Tono', 3, '15de21c670ae7c3f6f3f1f37029303c9', 0);

-- --------------------------------------------------------

--
-- Table structure for table `surat_keluar`
--

CREATE TABLE `surat_keluar` (
  `id_surat` int(11) NOT NULL,
  `nomor_surat` varchar(200) NOT NULL,
  `tgl_kirim` date NOT NULL,
  `tujuan` varchar(200) NOT NULL,
  `perihal` varchar(200) NOT NULL,
  `file_surat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_keluar`
--

INSERT INTO `surat_keluar` (`id_surat`, `nomor_surat`, `tgl_kirim`, `tujuan`, `perihal`, `file_surat`) VALUES
(6, 'SSA/142/AAK', '2019-08-06', 'PT. Baghdad Arab', 'Seminar Nasional', 'Pengumuman-Wisuda-62-Periode-Februari-20191.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `surat_masuk`
--

CREATE TABLE `surat_masuk` (
  `id_surat` int(11) NOT NULL,
  `nomor_surat` varchar(200) NOT NULL,
  `tgl_kirim` date NOT NULL,
  `tgl_terima` date NOT NULL,
  `pengirim` varchar(200) NOT NULL,
  `penerima` varchar(200) NOT NULL,
  `perihal` varchar(200) NOT NULL,
  `file_surat` text NOT NULL,
  `status` enum('proses','selesai') NOT NULL DEFAULT 'proses'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_masuk`
--

INSERT INTO `surat_masuk` (`id_surat`, `nomor_surat`, `tgl_kirim`, `tgl_terima`, `pengirim`, `penerima`, `perihal`, `file_surat`, `status`) VALUES
(6, 'JJA/888/IND', '2019-08-02', '2019-08-03', 'PT. Anusa Karma Indonesia', 'Satpam Anwar', 'Pesanan', 'Pengumuman-Wisuda-62-Periode-Februari-2019.pdf', 'proses');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `disposisi`
--
ALTER TABLE `disposisi`
  ADD PRIMARY KEY (`id_disposisi`),
  ADD KEY `id_surat` (`id_surat`),
  ADD KEY `id_pegawai_penerima` (`id_pegawai_penerima`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`),
  ADD KEY `id_jabatan` (`id_jabatan`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`),
  ADD KEY `id_pegawai` (`id_pegawai`),
  ADD KEY `id_jabatan` (`id_jabatan`);

--
-- Indexes for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD PRIMARY KEY (`id_surat`),
  ADD KEY `id_surat` (`id_surat`);

--
-- Indexes for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD PRIMARY KEY (`id_surat`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `disposisi`
--
ALTER TABLE `disposisi`
  MODIFY `id_disposisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  MODIFY `id_surat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  MODIFY `id_surat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `disposisi`
--
ALTER TABLE `disposisi`
  ADD CONSTRAINT `disposisi_ibfk_1` FOREIGN KEY (`id_surat`) REFERENCES `surat_masuk` (`id_surat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `disposisi_pegawai_id_pegawai_fk` FOREIGN KEY (`id_pegawai_penerima`) REFERENCES `pegawai` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `pegawai_jabatan_id_jabatan_fk` FOREIGN KEY (`id_jabatan`) REFERENCES `jabatan` (`id_jabatan`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

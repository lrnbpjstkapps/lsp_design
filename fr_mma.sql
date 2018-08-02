-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2018 at 02:45 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `lsp`
--

-- --------------------------------------------------------

--
-- Table structure for table `fr_mma`
--

CREATE TABLE IF NOT EXISTS `fr_mma` (
  `UUID_MMA` varchar(36) NOT NULL,
  `UUID_USER` varchar(36) DEFAULT NULL,
  `UUID_APL_01` varchar(36) DEFAULT NULL,
  `UUID_APL_02` varchar(36) DEFAULT NULL,
  `NO_DOKUMEN` varchar(50) DEFAULT NULL,
  `KELOMPOK_TARGET_1` varchar(50) DEFAULT NULL,
  `KELOMPOK_TARGET_2` varchar(50) DEFAULT NULL,
  `TUJUAN_ASESMEN` varchar(30) DEFAULT NULL,
  `KONTEKS_ASESMEN_1` varchar(50) DEFAULT NULL,
  `KONTEKS_ASESMEN_2` varchar(50) DEFAULT NULL,
  `PIHAK_RELEVAN` varchar(500) DEFAULT NULL,
  `ATURAN_LSP` varchar(500) DEFAULT NULL,
  `ATURAN_TEKNIS` varchar(500) DEFAULT NULL,
  `PENDEKATAN_ASESMEN` varchar(50) DEFAULT NULL,
  `STRATEGI_ASESMEN` varchar(500) DEFAULT NULL,
  `ACUAN_PEMBANDING` varchar(255) DEFAULT NULL,
  `ACUAN_PEMBANDING_KETERANGAN` varchar(2000) DEFAULT NULL,
  `BATASAN_VARIABEL` varchar(5) DEFAULT NULL,
  `PANDUAN_ASESMEN` varchar(5) DEFAULT NULL,
  `PERSETUJUAN_ASESOR` varchar(36) DEFAULT NULL,
  `PERSETUJUAN_ASESOR_DTM` datetime DEFAULT NULL,
  `PERSETUJUAN_PENYEDIA` varchar(36) DEFAULT NULL,
  `PERSETUJUAN_PENYEDIA_DTM` datetime DEFAULT NULL,
  `PERSETUJUAN_TUK` varchar(36) DEFAULT NULL,
  `PERSETUJUAN_TUK_DTM` datetime DEFAULT NULL,
  `TANGGAL_UJI_KOMPETENSI` date DEFAULT NULL,
  `DURASI_OBSERVASI_START` time DEFAULT NULL,
  `DURASI_OBSERVASI_END` time DEFAULT NULL,
  `DURASI_TES_LISAN_START` time DEFAULT NULL,
  `DURASI_TES_LISAN_END` time DEFAULT NULL,
  `LOKASI_ASESMEN` varchar(255) DEFAULT NULL,
  `_3_1_KARAKTERISTIK_PESERTA` varchar(500) DEFAULT NULL,
  `_3_1_PENYESUAIAN_KEBUTUHAN_SPESIFIK` varchar(500) DEFAULT NULL,
  `_3_2_PADA_BATASAN_VARIABEL` varchar(255) DEFAULT NULL,
  `_3_2_PADA_PANDUAN_PENILAIAN` varchar(255) DEFAULT NULL,
  `_3_3` varchar(50) DEFAULT NULL,
  `_3_3_CATATAN` varchar(255) DEFAULT NULL,
  `_3_4` varchar(50) DEFAULT NULL,
  `_3_4_CATATAN` varchar(255) DEFAULT NULL,
  `_3_5` varchar(50) DEFAULT NULL,
  `_3_5_CATATAN` varchar(255) DEFAULT NULL,
  `_3_6` varchar(50) DEFAULT NULL,
  `_3_6_CATATAN` varchar(255) DEFAULT NULL,
  `PENGATURAN_DUKUNGAN_SPESIALIS` varchar(255) DEFAULT NULL,
  `STRATEGI_KOMUNIKASI` varchar(500) DEFAULT NULL,
  `KOORDINATOR_TUK` varchar(36) DEFAULT NULL,
  `KOORDINATOR_TUK_DTM` datetime DEFAULT NULL,
  `MANAGER_SERTIFIKASI_LSP` varchar(36) DEFAULT NULL,
  `MANAGER_SERTIFIKASI_LSP_DTM` datetime DEFAULT NULL,
  `MANAGER_TEMPAT_KERJA` varchar(36) DEFAULT NULL,
  `MANAGER_TEMPAT_KERJA_DTM` datetime DEFAULT NULL,
  `PENYUSUN_RENCANA` varchar(36) DEFAULT NULL,
  `PENYUSUN_RENCANA_NO_REG` varchar(255) DEFAULT NULL,
  `PENYUSUN_RENCANA_DTM` datetime DEFAULT NULL,
  `MANAGER_SERTIFIKASI` varchar(36) DEFAULT NULL,
  `MANAGER_SERTIFIKASI_JABATAN` varchar(100) DEFAULT NULL,
  `MANAGER_SERTIFIKASI_DTM` datetime DEFAULT NULL,
  `UUID_ADM` varchar(36) DEFAULT NULL,
  `USR_CRT` varchar(50) DEFAULT NULL,
  `DTM_CRT` datetime DEFAULT NULL,
  `USR_UPD` varchar(50) DEFAULT NULL,
  `DTM_UPD` datetime DEFAULT NULL,
  `IS_ACTIVE` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`UUID_MMA`),
  KEY `UUID_APL_01` (`UUID_APL_01`),
  KEY `UUID_APL_02` (`UUID_APL_02`),
  KEY `UUID_USER` (`UUID_USER`),
  KEY `PERSETUJUAN_ASESOR` (`PERSETUJUAN_ASESOR`),
  KEY `PERSETUJUAN_PENYEDIA` (`PERSETUJUAN_PENYEDIA`),
  KEY `PERSETUJUAN_TUK` (`PERSETUJUAN_TUK`),
  KEY `KOORDINATOR_TUK` (`KOORDINATOR_TUK`),
  KEY `MANAGER_SERTIFIKASI_LSP` (`MANAGER_SERTIFIKASI_LSP`),
  KEY `MANAGER_TEMPAT_KERJA` (`MANAGER_TEMPAT_KERJA`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fr_mma`
--

INSERT INTO `fr_mma` (`UUID_MMA`, `UUID_USER`, `UUID_APL_01`, `UUID_APL_02`, `NO_DOKUMEN`, `KELOMPOK_TARGET_1`, `KELOMPOK_TARGET_2`, `TUJUAN_ASESMEN`, `KONTEKS_ASESMEN_1`, `KONTEKS_ASESMEN_2`, `PIHAK_RELEVAN`, `ATURAN_LSP`, `ATURAN_TEKNIS`, `PENDEKATAN_ASESMEN`, `STRATEGI_ASESMEN`, `ACUAN_PEMBANDING`, `ACUAN_PEMBANDING_KETERANGAN`, `BATASAN_VARIABEL`, `PANDUAN_ASESMEN`, `PERSETUJUAN_ASESOR`, `PERSETUJUAN_ASESOR_DTM`, `PERSETUJUAN_PENYEDIA`, `PERSETUJUAN_PENYEDIA_DTM`, `PERSETUJUAN_TUK`, `PERSETUJUAN_TUK_DTM`, `TANGGAL_UJI_KOMPETENSI`, `DURASI_OBSERVASI_START`, `DURASI_OBSERVASI_END`, `DURASI_TES_LISAN_START`, `DURASI_TES_LISAN_END`, `LOKASI_ASESMEN`, `_3_1_KARAKTERISTIK_PESERTA`, `_3_1_PENYESUAIAN_KEBUTUHAN_SPESIFIK`, `_3_2_PADA_BATASAN_VARIABEL`, `_3_2_PADA_PANDUAN_PENILAIAN`, `_3_3`, `_3_3_CATATAN`, `_3_4`, `_3_4_CATATAN`, `_3_5`, `_3_5_CATATAN`, `_3_6`, `_3_6_CATATAN`, `PENGATURAN_DUKUNGAN_SPESIALIS`, `STRATEGI_KOMUNIKASI`, `KOORDINATOR_TUK`, `KOORDINATOR_TUK_DTM`, `MANAGER_SERTIFIKASI_LSP`, `MANAGER_SERTIFIKASI_LSP_DTM`, `MANAGER_TEMPAT_KERJA`, `MANAGER_TEMPAT_KERJA_DTM`, `PENYUSUN_RENCANA`, `PENYUSUN_RENCANA_NO_REG`, `PENYUSUN_RENCANA_DTM`, `MANAGER_SERTIFIKASI`, `MANAGER_SERTIFIKASI_JABATAN`, `MANAGER_SERTIFIKASI_DTM`, `UUID_ADM`, `USR_CRT`, `DTM_CRT`, `USR_UPD`, `DTM_UPD`, `IS_ACTIVE`) VALUES
('c3784ee2-5b44-11e8-a5e5-a4c494eed0da', 'd8c702c5-4e7f-11e8-bf00-00ff0b0c062f', 'b12a2a81-469a-11e8-a478-a4c494eed0da', 'd06d6cbf-da7c-41cf-a985-d2037213ae78', '39D1275MMA00', NULL, 'belum', 'Sertifikasi Ulang', 'tempat kerja', 'tempat kerja', 'jawaban relevan', 'jawaban aturan bnsp', 'jawaban aturan teknis', 'Asesmen Uji Kompetensi', 'Acuan pembanding,Metode dan perangkat asesmen,Aturan pemaketan kompetensi,Mekanisme jaminan mutu', 'Standar produk,Regulasi teknis', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-07-13', '08:00:00', '11:00:00', '13:00:00', '15:00:00', NULL, 'jawaban karakteristik peserta', 'jawaban 	Penyesuaian kebutuhan spesifik peserta:', 'jawaban Pada batasan variabel: ', 'jawaban Pada panduan penilaian: ', 'sesuai', ' jawaban 3.3', 'ya', ' jawaban 3.4', 'ya', ' jawaban 3.5', 'ya', ' jawaban 3.6', 'jawaban 4.2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Super Admin', '2018-05-21 08:55:47', 'Karid Nurvenus', '2018-07-13 14:32:20', '1');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fr_mma`
--
ALTER TABLE `fr_mma`
  ADD CONSTRAINT `fr_mma_ibfk_1` FOREIGN KEY (`UUID_APL_01`) REFERENCES `fr_apl_01` (`UUID_APL01`),
  ADD CONSTRAINT `fr_mma_ibfk_10` FOREIGN KEY (`MANAGER_TEMPAT_KERJA`) REFERENCES `user` (`UUID_USER`),
  ADD CONSTRAINT `fr_mma_ibfk_2` FOREIGN KEY (`UUID_APL_02`) REFERENCES `fr_apl_02` (`UUID_APL02`),
  ADD CONSTRAINT `fr_mma_ibfk_3` FOREIGN KEY (`UUID_USER`) REFERENCES `user` (`UUID_USER`),
  ADD CONSTRAINT `fr_mma_ibfk_4` FOREIGN KEY (`PERSETUJUAN_ASESOR`) REFERENCES `user` (`UUID_USER`),
  ADD CONSTRAINT `fr_mma_ibfk_5` FOREIGN KEY (`PERSETUJUAN_PENYEDIA`) REFERENCES `user` (`UUID_USER`),
  ADD CONSTRAINT `fr_mma_ibfk_6` FOREIGN KEY (`PERSETUJUAN_TUK`) REFERENCES `user` (`UUID_USER`),
  ADD CONSTRAINT `fr_mma_ibfk_7` FOREIGN KEY (`KOORDINATOR_TUK`) REFERENCES `user` (`UUID_USER`),
  ADD CONSTRAINT `fr_mma_ibfk_8` FOREIGN KEY (`MANAGER_SERTIFIKASI_LSP`) REFERENCES `user` (`UUID_USER`),
  ADD CONSTRAINT `fr_mma_ibfk_9` FOREIGN KEY (`MANAGER_TEMPAT_KERJA`) REFERENCES `user` (`UUID_USER`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
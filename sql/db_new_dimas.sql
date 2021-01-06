-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2021 at 03:02 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_new_dimas`
--

-- --------------------------------------------------------

--
-- Table structure for table `mst_api`
--

CREATE TABLE `mst_api` (
  `ID` int(11) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_approval`
--

CREATE TABLE `tbl_approval` (
  `ID` int(11) NOT NULL,
  `id_revisi` int(11) NOT NULL,
  `id_pic` int(11) NOT NULL,
  `level` varchar(2) DEFAULT NULL,
  `name_level` varchar(100) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `comment` varchar(200) DEFAULT NULL,
  `created_at` varchar(100) NOT NULL,
  `updated_at` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_approval`
--

INSERT INTO `tbl_approval` (`ID`, `id_revisi`, `id_pic`, `level`, `name_level`, `status`, `comment`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '1', 'TEST1', 3, 'asd', '1609867697', '1609867920'),
(2, 1, 3, '2', 'TEST1', 3, 'asd', '1609867702', '1609867920');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_approval_log`
--

CREATE TABLE `tbl_approval_log` (
  `ID` int(11) NOT NULL,
  `id_revisi` int(11) NOT NULL,
  `id_pic` int(11) NOT NULL,
  `level` varchar(2) DEFAULT NULL,
  `name_level` varchar(100) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `comment` varchar(200) DEFAULT NULL,
  `created_at` varchar(100) NOT NULL,
  `updated_at` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_approval_log`
--

INSERT INTO `tbl_approval_log` (`ID`, `id_revisi`, `id_pic`, `level`, `name_level`, `status`, `comment`, `created_at`, `updated_at`) VALUES
(1, 1, 2, NULL, NULL, 2, 'asd', '', '1609867825'),
(2, 1, 3, NULL, NULL, 3, 'asd', '', '1609867921');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_document`
--

CREATE TABLE `tbl_document` (
  `ID` int(11) NOT NULL,
  `id_dept` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `number_document` varchar(100) NOT NULL,
  `deskripsi` text,
  `id_kategori` int(11) NOT NULL,
  `kode1` int(11) NOT NULL,
  `kode2` int(11) NOT NULL,
  `creator` int(11) NOT NULL,
  `submit` int(11) NOT NULL,
  `reminder` varchar(100) DEFAULT NULL,
  `created_at` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_document`
--

INSERT INTO `tbl_document` (`ID`, `id_dept`, `title`, `number_document`, `deskripsi`, `id_kategori`, `kode1`, `kode2`, `creator`, `submit`, `reminder`, `created_at`) VALUES
(1, 1, 'asd', 'PU-DDC-001', '', 3, 1, 3, 2, 0, '1612047600', '1609867686');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_document_log`
--

CREATE TABLE `tbl_document_log` (
  `ID` int(11) NOT NULL,
  `id_doc` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_document_log`
--

INSERT INTO `tbl_document_log` (`ID`, `id_doc`, `id_user`, `status`, `created_at`) VALUES
(1, 1, 2, 1, '1609867686');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_document_periode`
--

CREATE TABLE `tbl_document_periode` (
  `ID` int(11) NOT NULL,
  `id_doc` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status` int(11) DEFAULT '0',
  `created_at` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_document_periode`
--

INSERT INTO `tbl_document_periode` (`ID`, `id_doc`, `id_user`, `status`, `created_at`) VALUES
(1, 1, 2, 0, '1609867687');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_document_revisi`
--

CREATE TABLE `tbl_document_revisi` (
  `ID` int(11) NOT NULL,
  `id_doc` int(11) NOT NULL,
  `id_periode` int(11) NOT NULL,
  `revisi` varchar(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `comment` text,
  `file_doc` varchar(200) DEFAULT NULL,
  `file_pdf` varchar(200) DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `efektif` int(11) DEFAULT '0',
  `efektif_date` varchar(100) DEFAULT NULL,
  `created_at` varchar(100) DEFAULT NULL,
  `submit` int(11) NOT NULL DEFAULT '0',
  `level_approve` varchar(2) DEFAULT '0',
  `approved` int(11) NOT NULL,
  `type_publish` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_document_revisi`
--

INSERT INTO `tbl_document_revisi` (`ID`, `id_doc`, `id_periode`, `revisi`, `title`, `comment`, `file_doc`, `file_pdf`, `id_user`, `efektif`, `efektif_date`, `created_at`, `submit`, `level_approve`, `approved`, `type_publish`) VALUES
(1, 1, 1, '00', 'asd', '', NULL, NULL, 0, 1, '1612047600', '1609867687', 1, '3', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `ID` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `format` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`ID`, `name`, `format`) VALUES
(1, 'manual', 'MFG-M.MMS-ZZ'),
(2, 'formulir', 'WX-YYY-ZZZ'),
(3, 'prosedur dan instruksi kerja', 'FX-YYY-ZZZ-Rx');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori_kode`
--

CREATE TABLE `tbl_kategori_kode` (
  `ID` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_type` int(11) NOT NULL,
  `kode` varchar(10) NOT NULL,
  `arti` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kategori_kode`
--

INSERT INTO `tbl_kategori_kode` (`ID`, `id_kategori`, `id_type`, `kode`, `arti`) VALUES
(1, 3, 1, 'P', 'Dokumen Prosedur'),
(2, 3, 1, 'IK', 'Dokumen Instruksi Kerja'),
(3, 3, 2, 'U', 'Prosedur berlaku secara umum'),
(4, 3, 2, 'M', 'Prosedur Sistem Manajemen Mutu'),
(5, 3, 2, 'Q', 'Prosedur Sistem Manajemen Mutu'),
(6, 3, 2, 'L', 'Prosedur Sistem Manajemen Lingkungan'),
(7, 3, 2, 'K3', 'Prosedur sistem manajemen keselamatan & kesehatan kerja (SMK3)'),
(8, 3, 2, 'K3L', 'Prosedur SMK3 dan Sistem Manajemen Lingkungan'),
(9, 2, 2, 'U', 'Prosedur berlaku secara umum'),
(10, 2, 2, 'M', 'Prosedur sistem manajemen mutu'),
(11, 2, 2, 'Q', 'Prosedur Sistem Manajemen Mutu'),
(12, 2, 2, 'L', 'Prosedur Sistem Manajemen Lingkungan'),
(13, 2, 2, 'K3', 'Prosedur Sistem Manajemen Keselamatan & Kesehatan Kerja (SMK3)'),
(14, 2, 2, 'K3L', 'Prosedur SMK3 dan Sistem Manajemen Lingkungan');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori_type`
--

CREATE TABLE `tbl_kategori_type` (
  `id_type` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kategori_type`
--

INSERT INTO `tbl_kategori_type` (`id_type`, `name`) VALUES
(1, 'Jenis dokumen'),
(2, 'Jenis dokumen menurut proses');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_share_dept`
--

CREATE TABLE `tbl_share_dept` (
  `ID` int(11) NOT NULL,
  `id_rev` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_dept` int(11) NOT NULL,
  `created_at` varchar(200) NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_share_external`
--

CREATE TABLE `tbl_share_external` (
  `ID` int(11) NOT NULL,
  `id_rev` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `password` varchar(200) NOT NULL,
  `token` varchar(200) NOT NULL,
  `date_limit` varchar(200) NOT NULL,
  `confirm_mr` int(11) NOT NULL,
  `keperluan` varchar(200) NOT NULL,
  `is_active` int(11) NOT NULL,
  `created_at` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_share_external`
--

INSERT INTO `tbl_share_external` (`ID`, `id_rev`, `id_user`, `password`, `token`, `date_limit`, `confirm_mr`, `keperluan`, `is_active`, `created_at`) VALUES
(1, 1, 2, '122323213', '011839c3354ab6185a7ca82077891079b15a8e14', '01/06/2021 - 02/28/2021', 0, 'tester', 0, '1609868706');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_share_external_comment`
--

CREATE TABLE `tbl_share_external_comment` (
  `ID` int(11) NOT NULL,
  `id_ext_log` int(11) NOT NULL,
  `comment` varchar(200) DEFAULT NULL,
  `created_at` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_share_external_log`
--

CREATE TABLE `tbl_share_external_log` (
  `ID` int(11) NOT NULL,
  `id_share_external` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `created_at` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_share_user`
--

CREATE TABLE `tbl_share_user` (
  `ID` int(11) NOT NULL,
  `id_rev` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_user_receive` int(11) NOT NULL,
  `created_at` varchar(200) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_access_menu`
--

CREATE TABLE `tbl_user_access_menu` (
  `ID` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `id_menu` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_access_menu`
--

INSERT INTO `tbl_user_access_menu` (`ID`, `id_role`, `id_menu`) VALUES
(1, 1, '[\"1\",\"4\",\"5\"]'),
(3, 2, '[\"4\"]'),
(4, 3, '[\"4\",\"3\"]');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_login`
--

CREATE TABLE `tbl_user_login` (
  `ID` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `id_role` int(11) NOT NULL,
  `last_login` varchar(100) NOT NULL,
  `id_dept` int(11) DEFAULT NULL,
  `badge_number` varchar(200) DEFAULT NULL,
  `created_at` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_login`
--

INSERT INTO `tbl_user_login` (`ID`, `email`, `first_name`, `last_name`, `id_role`, `last_login`, `id_dept`, `badge_number`, `created_at`) VALUES
(1, 'admin@admin.com', 'Admin', 'Admin', 1, '1606639408', NULL, NULL, '1595842649'),
(2, 'rizky.musthofa@multifab.co.id', 'Rizky', 'Musthofa', 1, '1609868255', NULL, '83581', '1606660033'),
(3, 'zulkifli.nurdin@multifab.co.id', 'ZULKIFLI NURDIN', NULL, 2, '1609867915', 1, '83273', '1606881092'),
(4, 'aries.satriana@multifab.co.id', 'ARIES SATRIANA ', '', 2, '1609867836', NULL, NULL, '1609849374');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_menu`
--

CREATE TABLE `tbl_user_menu` (
  `ID` int(11) NOT NULL,
  `menu` varchar(100) NOT NULL,
  `created_at` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_menu`
--

INSERT INTO `tbl_user_menu` (`ID`, `menu`, `created_at`) VALUES
(1, 'Admin', '1595842649'),
(4, 'Document', '1595842649'),
(5, 'MR', '1598929936');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_role`
--

CREATE TABLE `tbl_user_role` (
  `ID` int(11) NOT NULL,
  `role` varchar(100) NOT NULL,
  `created_at` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_role`
--

INSERT INTO `tbl_user_role` (`ID`, `role`, `created_at`) VALUES
(1, 'Admin', '1595842649'),
(2, 'user', '1595842649'),
(3, 'management representative', '1595842649'),
(4, 'test', '1609391071');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_sub_menu`
--

CREATE TABLE `tbl_user_sub_menu` (
  `ID` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `link` varchar(100) NOT NULL,
  `created_at` varchar(100) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_sub_menu`
--

INSERT INTO `tbl_user_sub_menu` (`ID`, `id_menu`, `title`, `link`, `created_at`, `is_active`) VALUES
(1, 1, 'menu management', 'menu', '1595842649', 1),
(2, 1, 'role management', 'role', '1595842649', 1),
(6, 4, 'Dashboard Document', 'document', '1595842649', 1),
(9, 5, 'Monitoring Document', 'monitoring/document', '1600743614', 1),
(10, 4, 'Document Share', 'document/listShared', '1609868805', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mst_api`
--
ALTER TABLE `mst_api`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_approval`
--
ALTER TABLE `tbl_approval`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_approval_log`
--
ALTER TABLE `tbl_approval_log`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_document`
--
ALTER TABLE `tbl_document`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_document_log`
--
ALTER TABLE `tbl_document_log`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_document_periode`
--
ALTER TABLE `tbl_document_periode`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_document_revisi`
--
ALTER TABLE `tbl_document_revisi`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_kategori_kode`
--
ALTER TABLE `tbl_kategori_kode`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_kategori_type`
--
ALTER TABLE `tbl_kategori_type`
  ADD PRIMARY KEY (`id_type`);

--
-- Indexes for table `tbl_share_dept`
--
ALTER TABLE `tbl_share_dept`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_share_external`
--
ALTER TABLE `tbl_share_external`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_share_external_comment`
--
ALTER TABLE `tbl_share_external_comment`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_share_external_log`
--
ALTER TABLE `tbl_share_external_log`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_share_user`
--
ALTER TABLE `tbl_share_user`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_user_access_menu`
--
ALTER TABLE `tbl_user_access_menu`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_user_login`
--
ALTER TABLE `tbl_user_login`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_user_menu`
--
ALTER TABLE `tbl_user_menu`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_user_role`
--
ALTER TABLE `tbl_user_role`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_user_sub_menu`
--
ALTER TABLE `tbl_user_sub_menu`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mst_api`
--
ALTER TABLE `mst_api`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_approval`
--
ALTER TABLE `tbl_approval`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_approval_log`
--
ALTER TABLE `tbl_approval_log`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_document`
--
ALTER TABLE `tbl_document`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_document_log`
--
ALTER TABLE `tbl_document_log`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_document_periode`
--
ALTER TABLE `tbl_document_periode`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_document_revisi`
--
ALTER TABLE `tbl_document_revisi`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_kategori_kode`
--
ALTER TABLE `tbl_kategori_kode`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_kategori_type`
--
ALTER TABLE `tbl_kategori_type`
  MODIFY `id_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_share_dept`
--
ALTER TABLE `tbl_share_dept`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_share_external`
--
ALTER TABLE `tbl_share_external`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_share_external_comment`
--
ALTER TABLE `tbl_share_external_comment`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_share_external_log`
--
ALTER TABLE `tbl_share_external_log`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_share_user`
--
ALTER TABLE `tbl_share_user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_user_access_menu`
--
ALTER TABLE `tbl_user_access_menu`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_user_login`
--
ALTER TABLE `tbl_user_login`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_user_menu`
--
ALTER TABLE `tbl_user_menu`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_user_role`
--
ALTER TABLE `tbl_user_role`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_user_sub_menu`
--
ALTER TABLE `tbl_user_sub_menu`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

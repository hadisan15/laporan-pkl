-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2022 at 10:39 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pelatihan_digital_marketing`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `tbjoin_pesertakelas`
-- (See below for the actual view)
--
CREATE TABLE `tbjoin_pesertakelas` (
`id_peserta` int(11)
,`kode_partisipan` varchar(11)
,`nama_pendaftar` varchar(255)
,`nama_kelas` varchar(255)
,`tanggal_selesai` date
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `tbjoin_pesertakelasalumni`
-- (See below for the actual view)
--
CREATE TABLE `tbjoin_pesertakelasalumni` (
`id_alumni` int(11)
,`kode_partisipan` varchar(11)
,`nama_pendaftar` varchar(255)
,`tanggal_selesai` date
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `tbjoin_pesertapendaftar`
-- (See below for the actual view)
--
CREATE TABLE `tbjoin_pesertapendaftar` (
`id_peserta` int(11)
,`kode_partisipan` varchar(11)
,`nama_pendaftar` varchar(255)
,`nama_kelas` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `tb_alumni`
--

CREATE TABLE `tb_alumni` (
  `id_alumni` int(11) NOT NULL,
  `kode_partisipan` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_alumni`
--

INSERT INTO `tb_alumni` (`id_alumni`, `kode_partisipan`) VALUES
(18, 'PTP2201'),
(19, 'PTP2202'),
(20, 'PTP2203'),
(21, 'PTP2204'),
(23, 'PTP2205'),
(24, 'PTP2206'),
(22, 'PTP2207'),
(25, 'PTP2208'),
(26, 'PTP2209'),
(27, 'PTP2210');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jeniskelamin`
--

CREATE TABLE `tb_jeniskelamin` (
  `id_jeniskelamin` int(11) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_jeniskelamin`
--

INSERT INTO `tb_jeniskelamin` (`id_jeniskelamin`, `jenis_kelamin`) VALUES
(1, 'Laki-laki'),
(2, 'Perempuan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(25) NOT NULL,
  `nama_pengajar` varchar(255) NOT NULL,
  `jumlah_peserta` int(2) NOT NULL DEFAULT 0,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `waktu_pelaksanaan` time NOT NULL,
  `tempat_pelaksanaan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kelas`
--

INSERT INTO `tb_kelas` (`id_kelas`, `nama_kelas`, `nama_pengajar`, `jumlah_peserta`, `tanggal_mulai`, `tanggal_selesai`, `waktu_pelaksanaan`, `tempat_pelaksanaan`) VALUES
(15, 'A221', 'Muhammad Reza Fikri', 20, '2022-01-31', '2022-02-05', '12:00:00', 'Kantor Gedung Putih'),
(16, 'A222', 'Muhammad Saidi', 20, '2022-02-14', '2022-02-19', '12:00:00', 'Kantor Gedung Putih'),
(17, 'A223', 'Jordan Ahmad Riduan', 20, '2022-03-07', '2022-03-12', '12:00:00', 'Kantor Gedung Putih');

-- --------------------------------------------------------

--
-- Table structure for table `tb_level_pengguna`
--

CREATE TABLE `tb_level_pengguna` (
  `id_level` int(11) NOT NULL,
  `level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_level_pengguna`
--

INSERT INTO `tb_level_pengguna` (`id_level`, `level`) VALUES
(1, 'Admin'),
(3, 'Partisipan'),
(4, 'Pengajar'),
(2, 'Pimpinan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pendaftar`
--

CREATE TABLE `tb_pendaftar` (
  `id_pendaftar` int(11) NOT NULL,
  `kode_partisipan` varchar(11) NOT NULL,
  `nama_pendaftar` varchar(255) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `alamat_lengkap` varchar(255) NOT NULL,
  `bidang_usaha` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_telp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pendaftar`
--

INSERT INTO `tb_pendaftar` (`id_pendaftar`, `kode_partisipan`, `nama_pendaftar`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `alamat_lengkap`, `bidang_usaha`, `email`, `no_telp`) VALUES
(39, 'PTP2201', 'Ahmad Febrian Syabana', 'Banjarmasin', '2000-06-06', 'Laki-laki', 'Jl Kayu Tangi', 'Usaha Jual Sepeda Motor', 'ahmadfebriansyabana@gmail.com', '089512428905'),
(40, 'PTP2202', 'Ahmad Nazar', 'Banjarmasin', '1999-12-30', 'Laki-laki', 'Jl Pramuka', 'Usaha Distro Pakaian', 'ahmadnazar@gmail.com', '082183201238'),
(41, 'PTP2203', 'Adisty Bening Pratiwi', 'Banjarmasin', '2002-08-16', 'Perempuan', 'Jl S Parman', 'Usaha Butik Baju', 'adistybeningpratiwi@gmail.com', '089529320122'),
(42, 'PTP2204', 'Aisyah', 'Banjarbaru', '2001-05-25', 'Perempuan', 'Jl Kol Sugiono', 'Usaha Jual Handphone', 'aisyah@gmail.com', '08533292239'),
(43, 'PTP2205', 'Deni Hariadi', 'Banjarmasin', '1998-12-05', 'Laki-laki', 'Jl Belitung', 'Usaha Toko Obat', 'denihariyadi@gmail.com', '082230328420'),
(44, 'PTP2206', 'Albhuzar Algifari', 'Banjarmasin', '2000-07-13', 'Laki-laki', 'Jl Benua Anyar', 'Usaha Kuliner', 'albhuzaralgifari@gmail.com', '081283103203'),
(45, 'PTP2207', 'Raisya Fitria', 'Banjarmasin', '2001-11-22', 'Perempuan', 'Jl Veteran', 'Usaha Percetakan', 'raisyafitria@gmail.com', '0896012098302'),
(46, 'PTP2208', 'Rezeki Budiman Sambas', 'Martapura', '1997-01-02', 'Laki-laki', 'Jl Jafri Zam Zam', 'Usaha Toko Bangunan', 'rezekibudimansambas@gmail.com', '085409239023'),
(47, 'PTP2209', 'Syahrizal Kahfi', 'Kandangan', '1998-10-17', 'Laki-laki', 'Jl Kuripan', 'Usaha Kedai Kopi', 'syahrizalkahfi@gmail.com', '0878923892312'),
(48, 'PTP2210', 'Ibnu Alfiannoor Fikri', 'Buntok', '1999-05-10', 'Laki-laki', 'Jl Sultan Adam', 'Usaha Toko Komputer', 'ibnualfiannoorfikri@gmail.com', '0822290323893');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengajar`
--

CREATE TABLE `tb_pengajar` (
  `id_pengajar` int(11) NOT NULL,
  `kode_pengajar` varchar(11) NOT NULL,
  `nama_pengajar` varchar(255) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_telp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pengajar`
--

INSERT INTO `tb_pengajar` (`id_pengajar`, `kode_pengajar`, `nama_pengajar`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `email`, `no_telp`) VALUES
(16, 'PNG01', 'Muhammad Saidi', 'Banjarmasin', '1997-06-04', 'Laki-laki', 'muhammadsaidi@gmail.com', '082112030345'),
(17, 'PNG02', 'Jordan Ahmad Riduan', 'Palangkaraya', '1995-03-01', 'Laki-laki', 'jordanahmadriduan@gmail.com', '0899230034030'),
(18, 'PNG03', 'Muhammad Reza Fikri', 'Tanjung', '1999-09-18', 'Laki-laki', 'muhammadrezafikri@gmail.com', '0822023034405');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengguna_bio`
--

CREATE TABLE `tb_pengguna_bio` (
  `id_pengguna` int(11) NOT NULL,
  `kode_pengguna` varchar(11) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pengguna_bio`
--

INSERT INTO `tb_pengguna_bio` (`id_pengguna`, `kode_pengguna`, `nama_lengkap`, `email`, `password`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `alamat`, `no_telp`, `level`) VALUES
(12, 'PGN02', 'Partisipan', 'partisipan@gmail.com', '$2y$10$Zb12VbuBPwRhTZDHZJ6HXOWfUSiEIVVnVJU/d/9j5vKMY.3fkbRJa', 'BJM', '2022-01-21', 'Laki-laki', 'Jl Trans Kalimantan', '0895', 'Partisipan'),
(13, 'PGN03', 'Pengajar', 'pengajar@gmail.com', '$2y$10$AcfF2UjPFk.ToifhS9tDW.F6wx.FUsrO3r8P1GkRZ9VkMKbnHOCN2', 'BJM', '2022-01-21', 'Laki-laki', 'Jl Trans Kalimantan', '0895', 'Pengajar'),
(14, 'PGN04', 'Pimpinan', 'pimpinan@gmail.com', '$2y$10$y6gRMSoP.kX89sPMviQ/jOVGKpF7EAiPvjPogQ2zyKJDF3cnzAKKe', 'BJM', '2022-01-21', 'Laki-laki', 'Jl Trans Kalimantan', '0895', 'Pimpinan'),
(16, 'PGN01', 'Zul Fahmi', 'zulfahmi@gmail.com', '$2y$10$W8QWcN.skA.OVVVqgJPQ5eJiJdhvFKIhhxEeDFt7/3u6pqK4z3hym', 'Banjarmasin', '1995-11-23', 'Laki-laki', 'Jl A Yani', '08212103012', 'Pimpinan'),
(17, 'PGN05', 'Hadi Santoso', 'hadisnt15@gmail.com', '$2y$10$Th8as/9XyGkPe/iUkxhe/et4gSWMAsBkpfNgRVyIqu9no9plWOxgy', 'Banjarmasin', '2000-08-15', 'Laki-laki', 'Jl Trans Kalimantan', '089531488567', 'Admin'),
(18, 'PGN06', 'Eren Yeager', 'erenyeager@gmail.com', '$2y$10$UZY0ZFXLuFSCbWtpg/kM5ugGHdT6PTUtAvczsD1tz8H73tqAEr6Aa', 'Jakarta', '2000-09-11', 'Laki-laki', 'Jl P Antasari', '0822023944', 'Pengajar'),
(19, 'PGN07', 'Ahmad Febrian Syabana', 'ahmadfebriansyabana@gmail.com', '$2y$10$ShrXWxyzZSRfkAOmXmShr.ncTQSh/R3fesEJPhn1WJt2zLy/dzgc2', 'Banjarmasin', '2000-06-06', 'Laki-laki', 'Jl Kayu Tangi', '089512428905', 'Partisipan'),
(20, 'PGN08', 'Ahmad Nazar', 'ahmadnazar@gmail.com', '$2y$10$OiuMJvXcFqtIbTyN5ghnmukDduO81ZxFjdVyj2KBVS9QhZNlQw6Dm', 'Banjarmasin', '1999-12-30', 'Laki-laki', 'Jl Pramuka', '082183201238', 'Partisipan'),
(21, 'PGN09', 'Adisty Bening Pratiwi', 'adistybeningpratiwi@gmail.com', '$2y$10$ixgoqvuwqzNPd5RSt3b/NO1rUxOXtPppoOjxgykYya0fldM79t7E.', 'Banjarmasin', '2002-08-16', 'Perempuan', 'Jl S Parman', '089529320122', 'Partisipan'),
(22, 'PGN10', 'Aisyah', 'aisyah@gmail.com', '$2y$10$0X9OSZVfagJUslUroBn0cebTLP8l/8pYZARCyCH90z1YJfaZP7Noe', 'Banjarbaru', '2001-05-25', 'Perempuan', 'Jl Kol Sugiono', '08533292239', 'Partisipan'),
(23, 'PGN11', 'Deni Hariadi', 'denihariyadi@gmail.com', '$2y$10$GCZyaqwtMzL14gaAa4QmC.NJdM4PhW9sYEyQWGjdNN76/5vUf/48K', 'Banjarmasin', '1998-12-05', 'Laki-laki', 'Jl Belitung', '082230328420', 'Partisipan'),
(24, 'PGN12', 'Albhuzar Algifari', 'albhuzaralgifari@gmail.com', '$2y$10$fJP/tR31l2kpYzzQDzP5.OcRekeDb6ORLNi/K2uQMK3R0QNTQkhzC', 'Banjarmasin', '2000-07-13', 'Laki-laki', 'Jl Benua Anyar', '081283103203', 'Partisipan'),
(25, 'PGN13', 'Raisya Fitria', 'raisyafitria@gmail.com', '$2y$10$E8JO3nbptzpMcViuARpXwe3c9Le.enpNs3mlp/7JTsOkxW6iN1MMS', 'Banjarmasin', '2001-11-22', 'Perempuan', 'Jl Veteran', '0896012098302', 'Partisipan'),
(26, 'PGN14', 'Rezeki Budiman Sambas', 'rezekibudimansambas@gmail.com', '$2y$10$Zdj5xty.nw8/cGvX.FUoNuy/dgLimrRkvORS7JfCNCUOja5a2accy', 'Martapura', '1997-01-02', 'Laki-laki', 'Jl Jafri Zam Zam', '085409239023', 'Partisipan'),
(27, 'PGN15', 'Syahrizal Kahfi', 'syahrizalkahfi@gmail.com', '$2y$10$W.dJr08bpI4Unq8FQy6hTOErWCrSYQbxMCFnz.UF9QIBEfek.BvyK', 'Kandangan', '1998-10-17', 'Laki-laki', 'Jl Kuripan', '0878923892312', 'Partisipan'),
(28, 'PGN16', 'Ibnu Alfiannoor Fikri', 'ibnualfiannoorfikri@gmail.com', '$2y$10$EVYwocK./vl4dkPai8K92e34UPv8EMsEDdo/Qg6ybgoULlRVcN/eO', 'Buntok', '1999-05-10', 'Laki-laki', 'Jl Sultan Adam', '0822290323893', 'Partisipan'),
(29, 'PGN17', 'Muhammad Saidi', 'muhammadsaidi@gmail.com', '$2y$10$X3ISkUrxYUG.BDgI7mWH/Ou0N8sL97KpfbSqd3a/chEVMxB659ekC', 'Banjarmasin', '1997-06-04', 'Laki-laki', 'Jl Manggis', '082112030345', 'Pengajar'),
(30, 'PGN18', 'Jordan Ahmad Riduan', 'jordanahmadriduan@gmail.com', '$2y$10$.MNY6ylZ02HH.7a5gQY6muXq9oVRR7/KJrL9PCDIVLVS1SLu8emEy', 'Palangkaraya', '1995-03-01', 'Laki-laki', 'Jl Gatot Subroto', '0899230034030', 'Pengajar'),
(31, 'PGN19', 'Muhammad Reza Fikri', 'muhammadrezafikri@gmail.com', '$2y$10$xHDUwrNP92WUSXLlvo8DoepZHmAd6SCb3TjvyW8KeX.0icQKslMMe', 'Tanjung', '1999-09-18', 'Laki-laki', 'Jl Kelayan A', '0822023034405', 'Pengajar'),
(32, 'PGN20', 'Muhammad Fahmi', 'muhammadfahmi@gmail.com', '$2y$10$q7URVb9rScHgtshFwRzuw.Ccme3G.Hv6j8sV87525Elpi/Rgtizfq', 'Banjarmasin', '2000-06-15', 'Laki-laki', 'Jl Belitung', '0895232932', 'Partisipan'),
(33, 'PGN21', 'Muhammad Farid', 'muhammadfarid@gmail.com', '$2y$10$EHAAHop2FjBC6SkdH6dVP.mxepLw4gfnbHwbNB7p90RrNEdg9IRH6', 'Banjarmasin', '2001-11-28', 'Laki-laki', 'Jl Trans Kalimantan', '08320243', 'Pengajar'),
(34, 'hadisantoso', 'Hadi Santoso', 'hadisantoso@gmail.com', '$2y$10$mTj5z9KbxM.q96owH36cy.gFmdK1GvNk25pIuRdJ1tJ4QArJBkuma', 'Banjarmasin', '2000-08-15', 'Laki-laki', 'Jl Trans Kalimantan', '089531488567', 'Pengajar');

-- --------------------------------------------------------

--
-- Table structure for table `tb_peserta`
--

CREATE TABLE `tb_peserta` (
  `id_peserta` int(11) NOT NULL,
  `kode_partisipan` varchar(11) NOT NULL,
  `nama_kelas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_peserta`
--

INSERT INTO `tb_peserta` (`id_peserta`, `kode_partisipan`, `nama_kelas`) VALUES
(40, 'PTP2201', 'A221'),
(41, 'PTP2202', 'A221'),
(44, 'PTP2203', 'A222'),
(45, 'PTP2204', 'A222'),
(43, 'PTP2205', 'A221'),
(47, 'PTP2206', 'A223'),
(46, 'PTP2207', 'A222'),
(48, 'PTP2208', 'A223'),
(49, 'PTP2209', 'A223'),
(50, 'PTP2210', 'A223');

-- --------------------------------------------------------

--
-- Structure for view `tbjoin_pesertakelas`
--
DROP TABLE IF EXISTS `tbjoin_pesertakelas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tbjoin_pesertakelas`  AS SELECT `tb_peserta`.`id_peserta` AS `id_peserta`, `tb_peserta`.`kode_partisipan` AS `kode_partisipan`, `tb_pendaftar`.`nama_pendaftar` AS `nama_pendaftar`, `tb_peserta`.`nama_kelas` AS `nama_kelas`, `tb_kelas`.`tanggal_selesai` AS `tanggal_selesai` FROM ((`tb_peserta` join `tb_pendaftar` on(`tb_peserta`.`kode_partisipan` = `tb_pendaftar`.`kode_partisipan`)) join `tb_kelas` on(`tb_peserta`.`nama_kelas` = `tb_kelas`.`nama_kelas`)) ;

-- --------------------------------------------------------

--
-- Structure for view `tbjoin_pesertakelasalumni`
--
DROP TABLE IF EXISTS `tbjoin_pesertakelasalumni`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tbjoin_pesertakelasalumni`  AS SELECT `tb_alumni`.`id_alumni` AS `id_alumni`, `tb_alumni`.`kode_partisipan` AS `kode_partisipan`, `tbjoin_pesertakelas`.`nama_pendaftar` AS `nama_pendaftar`, `tbjoin_pesertakelas`.`tanggal_selesai` AS `tanggal_selesai` FROM (`tb_alumni` join `tbjoin_pesertakelas` on(`tb_alumni`.`kode_partisipan` = `tbjoin_pesertakelas`.`kode_partisipan`)) ;

-- --------------------------------------------------------

--
-- Structure for view `tbjoin_pesertapendaftar`
--
DROP TABLE IF EXISTS `tbjoin_pesertapendaftar`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tbjoin_pesertapendaftar`  AS SELECT `tb_peserta`.`id_peserta` AS `id_peserta`, `tb_peserta`.`kode_partisipan` AS `kode_partisipan`, `tb_pendaftar`.`nama_pendaftar` AS `nama_pendaftar`, `tb_peserta`.`nama_kelas` AS `nama_kelas` FROM (`tb_peserta` join `tb_pendaftar` on(`tb_peserta`.`kode_partisipan` = `tb_pendaftar`.`kode_partisipan`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_alumni`
--
ALTER TABLE `tb_alumni`
  ADD PRIMARY KEY (`id_alumni`),
  ADD KEY `kode_partisipan` (`kode_partisipan`);

--
-- Indexes for table `tb_jeniskelamin`
--
ALTER TABLE `tb_jeniskelamin`
  ADD PRIMARY KEY (`id_jeniskelamin`),
  ADD KEY `jenis_kelamin` (`jenis_kelamin`);

--
-- Indexes for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD KEY `nama_pengajar` (`nama_pengajar`),
  ADD KEY `nama_kelas` (`nama_kelas`);

--
-- Indexes for table `tb_level_pengguna`
--
ALTER TABLE `tb_level_pengguna`
  ADD PRIMARY KEY (`id_level`),
  ADD KEY `level` (`level`);

--
-- Indexes for table `tb_pendaftar`
--
ALTER TABLE `tb_pendaftar`
  ADD PRIMARY KEY (`id_pendaftar`),
  ADD UNIQUE KEY `nama_lengkap` (`nama_pendaftar`),
  ADD KEY `nama_lengkap_2` (`nama_pendaftar`),
  ADD KEY `jenis_kelamin` (`jenis_kelamin`),
  ADD KEY `kode_partisipan` (`kode_partisipan`);

--
-- Indexes for table `tb_pengajar`
--
ALTER TABLE `tb_pengajar`
  ADD PRIMARY KEY (`id_pengajar`),
  ADD UNIQUE KEY `nama_pengajar_2` (`nama_pengajar`),
  ADD KEY `jenis_kelamin` (`jenis_kelamin`),
  ADD KEY `nama_pengajar` (`nama_pengajar`),
  ADD KEY `kode_partisipan` (`kode_pengajar`);

--
-- Indexes for table `tb_pengguna_bio`
--
ALTER TABLE `tb_pengguna_bio`
  ADD PRIMARY KEY (`id_pengguna`),
  ADD KEY `jenis_kelamin` (`jenis_kelamin`,`level`),
  ADD KEY `level_pengguna` (`level`),
  ADD KEY `kode_pengguna` (`kode_pengguna`);

--
-- Indexes for table `tb_peserta`
--
ALTER TABLE `tb_peserta`
  ADD PRIMARY KEY (`id_peserta`),
  ADD KEY `kode_partisipan` (`kode_partisipan`,`nama_kelas`),
  ADD KEY `nama_kelas` (`nama_kelas`),
  ADD KEY `kode_partisipan_2` (`kode_partisipan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_alumni`
--
ALTER TABLE `tb_alumni`
  MODIFY `id_alumni` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tb_jeniskelamin`
--
ALTER TABLE `tb_jeniskelamin`
  MODIFY `id_jeniskelamin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tb_level_pengguna`
--
ALTER TABLE `tb_level_pengguna`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_pendaftar`
--
ALTER TABLE `tb_pendaftar`
  MODIFY `id_pendaftar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `tb_pengajar`
--
ALTER TABLE `tb_pengajar`
  MODIFY `id_pengajar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tb_pengguna_bio`
--
ALTER TABLE `tb_pengguna_bio`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tb_peserta`
--
ALTER TABLE `tb_peserta`
  MODIFY `id_peserta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_alumni`
--
ALTER TABLE `tb_alumni`
  ADD CONSTRAINT `tb_alumni_ibfk_2` FOREIGN KEY (`kode_partisipan`) REFERENCES `tb_peserta` (`kode_partisipan`);

--
-- Constraints for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD CONSTRAINT `tb_kelas_ibfk_1` FOREIGN KEY (`nama_pengajar`) REFERENCES `tb_pengajar` (`nama_pengajar`);

--
-- Constraints for table `tb_pendaftar`
--
ALTER TABLE `tb_pendaftar`
  ADD CONSTRAINT `tb_pendaftar_ibfk_1` FOREIGN KEY (`jenis_kelamin`) REFERENCES `tb_jeniskelamin` (`jenis_kelamin`);

--
-- Constraints for table `tb_pengajar`
--
ALTER TABLE `tb_pengajar`
  ADD CONSTRAINT `tb_pengajar_ibfk_1` FOREIGN KEY (`jenis_kelamin`) REFERENCES `tb_jeniskelamin` (`jenis_kelamin`);

--
-- Constraints for table `tb_pengguna_bio`
--
ALTER TABLE `tb_pengguna_bio`
  ADD CONSTRAINT `tb_pengguna_bio_ibfk_1` FOREIGN KEY (`jenis_kelamin`) REFERENCES `tb_jeniskelamin` (`jenis_kelamin`),
  ADD CONSTRAINT `tb_pengguna_bio_ibfk_2` FOREIGN KEY (`level`) REFERENCES `tb_level_pengguna` (`level`);

--
-- Constraints for table `tb_peserta`
--
ALTER TABLE `tb_peserta`
  ADD CONSTRAINT `tb_peserta_ibfk_2` FOREIGN KEY (`nama_kelas`) REFERENCES `tb_kelas` (`nama_kelas`),
  ADD CONSTRAINT `tb_peserta_ibfk_3` FOREIGN KEY (`kode_partisipan`) REFERENCES `tb_pendaftar` (`kode_partisipan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

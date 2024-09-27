-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2024 at 09:54 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_stokbarang`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(2, 'Alat Olahraga'),
(3, 'Alat Tulis Kantor'),
(4, 'Kendaraan'),
(5, 'Alat Makan'),
(7, 'Elektronik');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `kode_barang` varchar(50) DEFAULT NULL,
  `nama_barang` varchar(80) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `satuan` varchar(20) DEFAULT NULL,
  `keterangan` char(50) NOT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `kode_barang`, `nama_barang`, `stok`, `satuan`, `keterangan`, `id_kategori`, `created_at`) VALUES
(19, '47473979', 'Bendera FAPERTA', 0, 'pcs', '', NULL, '2024-09-24 15:56:53'),
(24, '15838270', 'Papan Besi Putih', 115, 'pcs', 'barang di perlengkapan', NULL, '2024-09-24 15:56:53'),
(26, '48748597', 'Sound Wireless kecil', 2, 'pcs', 'barang di Perlengkapan', NULL, '2024-09-24 15:56:53'),
(27, '80617713', 'Kabel Power', 0, 'pcs', '', NULL, '2024-09-24 15:56:53'),
(28, '25768190', 'Kabel Printer', 0, 'pcs', '', NULL, '2024-09-24 15:56:53'),
(29, '29402507', 'Baterai', 0, 'pcs', '', NULL, '2024-09-24 15:56:53'),
(30, '88131615', 'MIC Wireless', 1, 'pcs', 'barang di perlengkapan', NULL, '2024-09-24 15:56:53'),
(31, '71683465', 'MIC Kabel', 22, 'pcs', 'barang di perlengkapan', NULL, '2024-09-24 15:56:53'),
(32, '44979020', 'Stand Sound', 2, 'pcs', 'barang di perlengkapan', NULL, '2024-09-24 15:56:53'),
(33, '58270813', 'Layar LCD', 5, 'pcs', 'barang di perlengkapan', NULL, '2024-09-24 15:56:53'),
(36, '86435417', 'Stand MIC Meja', 0, 'pcs', '', NULL, '2024-09-24 15:56:53'),
(37, '35217235', 'Stand MIC Biasa', 4, 'pcs', 'barang di perlengkapan', NULL, '2024-09-24 15:56:53'),
(38, '76821934', 'Converter HDMI to VGA', 0, 'pcs', '', NULL, '2024-09-24 15:56:53'),
(39, '77233756', 'Converter HDMI', 0, 'pcs', '', NULL, '2024-09-24 15:56:53'),
(40, '20503732', 'Handy Talky (HT)', 6, 'pcs', 'barang di Perlengkapan lantai 1', NULL, '2024-09-24 15:56:53'),
(41, '41658529', 'Karpet Hambal besar', 4, 'pcs', '', NULL, '2024-09-24 15:56:53'),
(42, '74520659', 'Tikar', 0, 'pcs', '', NULL, '2024-09-24 15:56:53'),
(44, '46852192', 'Papan Tulis WhiteBoard', 0, 'pcs', '', NULL, '2024-09-24 15:56:53'),
(45, '90957706', 'splitter HDMI', 0, 'pcs', '', NULL, '2024-09-24 15:56:53'),
(46, '31523619', 'Lampu Bolam', 0, 'pcs', 'barang di perlengkapan lemari depan', NULL, '2024-09-24 15:56:53'),
(47, '49944773', 'lampu Inbow', 0, 'pcs', '', NULL, '2024-09-24 15:56:53'),
(48, '23340821', 'Lampu TL 18 Watt Putih', 2, 'pcs', 'Barang di Lantai 1 Perlengkapan', NULL, '2024-09-24 15:56:53'),
(49, '34693811', 'Stop IB', 0, 'pcs', '', NULL, '2024-09-24 15:56:53'),
(50, '29706302', 'Saklar single', 0, 'pcs', '', NULL, '2024-09-24 15:56:53'),
(51, '15323699', 'Pitingan Lampu Bolam', 26, 'pcs', 'Barang di Lantai 1 Perlengkapan', NULL, '2024-09-24 15:56:53'),
(52, '61321334', 'HT WLn', 16, 'pcs', '', NULL, '2024-09-24 15:56:53'),
(53, '36162331', 'LCD Proyektor', 3, 'pcs', 'Barang di Lantai 5 BAUPK', NULL, '2024-09-24 15:56:53'),
(54, '49766267', 'Gembok besar', 1, 'pcs', 'Barang dilantai 5', NULL, '2024-09-24 15:56:53'),
(57, '76818578', 'Laptop Lenovo', 108, 'unit', 'barang di lantai 5 lemari', 7, '2024-09-24 15:56:53'),
(58, '63859249', 'shower kran', 13, 'pcs', 'Barang di KRT lemari depan', NULL, '2024-09-24 15:56:53'),
(59, '98286053', 'Alat detektor ', 2, 'pcs', 'BAUPK lemari Kabag', NULL, '2024-09-24 15:56:53'),
(60, '71560828', 'Sivon', 2, 'pcs', 'barang di KRT lemari depan', NULL, '2024-09-24 15:56:53'),
(61, '22450437', 'Slot Pintu kayu', 4, 'pcs', 'barang di KRT bawah lemari depan', NULL, '2024-09-24 15:56:53'),
(62, '84978092', 'Slot pintu Almini', 0, 'pcs', 'barang di KRT lemari depan bawah', NULL, '2024-09-24 15:56:53'),
(63, '78789383', 'Kran shower T', 2, 'pcs', 'Barang di Perlengkapan Lemari Depan', NULL, '2024-09-24 15:56:53'),
(64, '87031804', 'Paku Cor 1,5', 1, 'pak', 'barang di perlengkapan lemari depan', NULL, '2024-09-24 15:56:53'),
(65, '49814214', 'Kran Shower single', 0, 'pcs', 'barang di perlengkapan lemari depan', NULL, '2024-09-24 15:56:53'),
(66, '70968360', 'Slang flexible 40 cm', 0, 'pcs', 'Habis', NULL, '2024-09-24 15:56:53'),
(68, '37844992', 'Lampu inbow 12 watt', 0, 'pcs', 'barang di perlengkapan lemari depan', NULL, '2024-09-24 15:56:53'),
(70, '36506137', 'kran 3/4', 0, 'pcs', 'barang di perlengkapan lemari depan', NULL, '2024-09-24 15:56:53'),
(72, '88878409', 'Raket Badminton', 0, 'pcs', 'Berada di ruang gym', 2, '2024-09-24 15:56:53'),
(77, '17366118', 'Treadmil', 0, 'pcs', 'Habis', 2, '2024-09-24 15:56:53'),
(79, '12940220', 'Tumbler Corkcicle', 175, 'pcs', 'Untuk Minum', 5, '2024-09-24 15:56:53'),
(80, '43242423', 'Tes seri number', 0, 'pcs', 'seri', 7, '2024-09-24 15:56:53'),
(81, '09876543', 'Mouse', 0, 'pcs', 'Habis', 7, '2024-09-24 15:56:53'),
(82, '42534534', 'Iphone 8', 69, 'pcs', 'hp operasional', 7, '2024-09-25 16:09:45'),
(85, '12', 'Laptop', 10, 'pcs', 'Normal', 7, '2024-09-26 14:45:36');

-- --------------------------------------------------------

--
-- Table structure for table `barang_rusak`
--

CREATE TABLE `barang_rusak` (
  `id` int(11) NOT NULL,
  `kode_barang` varchar(50) DEFAULT NULL,
  `nama_barang` varchar(255) DEFAULT NULL,
  `jumlah_rusak` int(11) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `id_barang` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

--
-- Dumping data for table `barang_rusak`
--

INSERT INTO `barang_rusak` (`id`, `kode_barang`, `nama_barang`, `jumlah_rusak`, `keterangan`, `tanggal`, `id_barang`) VALUES
(26, '12940220', 'Tumbler Corkcicle', 3, 'pecah', '2024-09-24', 79),
(31, '12940220', 'Tumbler Corkcicle', 2, '2', '2024-09-24', 79),
(32, '09876543', 'Mouse', 5, '5', '2024-09-24', 81),
(33, '09876543', 'Mouse', 5, '5', '2024-09-24', 81),
(36, '09876543', 'Mouse', 2, '2', '2024-09-25', 81),
(39, '36506137', 'kran 3/4', 1, '1', '2024-09-25', 70),
(41, '84978092', 'Slot pintu Almini', 1, '1', '2024-09-25', 62),
(42, '47473979', 'Bendera FAPERTA', 1, '1', '2024-09-25', 19),
(47, '42534534', 'Iphone 8', 3, '3', '2024-09-25', 82),
(49, '42534534', 'Iphone 8', 3, '3', '2024-09-25', 82),
(53, '42534534', 'Iphone 8', 6, '6', '2024-09-25', 82),
(57, '17366118', 'Treadmil', 5, '5', '2024-09-25', 77),
(59, '70968360', 'Slang flexible 40 cm', 10, '10', '2024-09-25', 66),
(60, '09876543', 'Mouse', 30, '30', '2024-09-26', 81),
(62, '12', 'Laptop', 5, 'Rusak 5 unit', '2024-09-26', 85);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `kode` varchar(20) DEFAULT NULL,
  `nama` varchar(80) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telepon` varchar(15) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `kode`, `nama`, `email`, `telepon`, `alamat`) VALUES
(4, 'CST410', 'Nizar', 'inventaris@gmail.com', '085000000000', 'Jogja'),
(5, 'CST224', 'Suyitno', NULL, '082244522600', NULL),
(7, 'CST861', 'Ainul Solihin, S.T.', NULL, '0', NULL),
(8, 'CST287', 'Riski Wijaya', NULL, '0', NULL),
(9, 'CST226', 'Very Adi Wijaya', NULL, '0', NULL),
(10, 'CST527', 'Hadi', NULL, '0', NULL),
(11, 'CST949', 'Zidan', NULL, '0', NULL),
(12, 'CST676', 'Wahyu Widodo', NULL, '0', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `data_toko`
--

CREATE TABLE `data_toko` (
  `id` int(11) NOT NULL,
  `nama_toko` varchar(80) DEFAULT NULL,
  `nama_pemilik` varchar(80) DEFAULT NULL,
  `no_telepon` varchar(15) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_toko`
--

INSERT INTO `data_toko` (`id`, `nama_toko`, `nama_pemilik`, `no_telepon`, `alamat`) VALUES
(1, 'Inventaris Barang', 'Jeje', '081234567890', 'Jalan Kaki');

-- --------------------------------------------------------

--
-- Table structure for table `detail_keluar`
--

CREATE TABLE `detail_keluar` (
  `no_keluar` varchar(25) DEFAULT NULL,
  `nama_barang` varchar(80) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `satuan` varchar(20) DEFAULT NULL,
  `keterangan` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_keluar`
--

INSERT INTO `detail_keluar` (`no_keluar`, `nama_barang`, `jumlah`, `satuan`, `keterangan`) VALUES
('TR1680493850', 'Pitingan Lampu Bolam', 1, 'pcs', 'Gedung F'),
('TR1680661543', 'Lampu TL 18 Watt Putih', 4, 'pcs', 'LP2RP'),
('TR1680661597', 'Gembok besar', 1, 'pcs', 'Ex Bookstore'),
('TR1725863927', 'Treadmil', 1, '', ''),
('TR1725983365', 'LCD Proyektor', 1, '', ''),
('TR1726375698', 'Raket Badminton', 2, '', 'Minjam'),
('TR1726495976', 'Lampu Bolam', 2, NULL, ''),
('TR1726496138', 'Bed Pingpong', 12, NULL, 'iya'),
('TR1726548579', 'Treadmil', 5, NULL, 'error'),
('TR1726556563', 'Slang flexible 40 cm', 2, NULL, ''),
('TR1726574606', 'Laptop Lenovo', 2, NULL, 'keluar'),
('TR1726758323', 'Slang flexible 40 cm', 1, NULL, ''),
('TR1727153649', 'Tumbler Corkcicle', 3, NULL, 'keluar'),
('TR1727158007', 'Mouse', 2, NULL, 'keluar'),
('TR1727170954', 'Mouse', 5, NULL, 'keluar lagi'),
('TR1727336770', 'Laptop', 12, NULL, 'Keluar');

-- --------------------------------------------------------

--
-- Table structure for table `detail_terima`
--

CREATE TABLE `detail_terima` (
  `no_terima` varchar(25) DEFAULT NULL,
  `nama_barang` varchar(80) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `satuan` varchar(20) DEFAULT NULL,
  `keterangan` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_terima`
--

INSERT INTO `detail_terima` (`no_terima`, `nama_barang`, `jumlah`, `satuan`, `keterangan`) VALUES
('TR1680749518', 'Gembok besar', 2, 'pcs', 'Barang dilantai 5'),
('TR1725783591', 'Kabel Roll', 2, '', 'ada di lantai 5'),
('TR1725783868', 'Raket Badminton', 2, '', 'tambah'),
('TR1725863881', 'Treadmil', 2, '', 'ada di lantai 5'),
('TR1725980584', 'LCD Proyektor', 1, '', 'ada di lantai 5'),
('TR1725981901', 'MIC Kabel', 20, '', 'baru'),
('TR1726548529', 'Treadmil', 16, '', 'Nambah cuy'),
('TR1726556531', 'Slang flexible 40 cm', 10, '', 'masuk'),
('TR1726569956', 'HT WLn', 10, '', 'masuk'),
('TR1726570302', 'Laptop Lenovo', 100, NULL, 'Gaming'),
('TR1727153632', 'Tumbler Corkcicle', 5, NULL, 'masuk'),
('TR1727157735', 'Mouse', 5, NULL, 'masuk'),
('TR1727170975', 'Mouse', 3, NULL, 'masuk 3'),
('TR1727336743', 'Laptop', 2, NULL, 'Masuk');

-- --------------------------------------------------------

--
-- Table structure for table `penerimaan`
--

CREATE TABLE `penerimaan` (
  `id` int(11) NOT NULL,
  `no_terima` varchar(25) DEFAULT NULL,
  `tgl_terima` varchar(25) DEFAULT NULL,
  `jam_terima` varchar(10) DEFAULT NULL,
  `nama_supplier` varchar(80) DEFAULT NULL,
  `nama_petugas` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penerimaan`
--

INSERT INTO `penerimaan` (`id`, `no_terima`, `tgl_terima`, `jam_terima`, `nama_supplier`, `nama_petugas`) VALUES
(23, 'TR1680749518', '06/04/2023', '09:51:58', 'Perlengkapan', 'Super Admin'),
(24, 'TR1725783591', '08/09/2024', '15:19:51', 'Kepala Keuangan Boss', 'Super Admin'),
(25, 'TR1725783868', '08/09/2024', '15:24:28', 'Kepala Keuangan Boss', 'Super Admin'),
(26, 'TR1725863881', '09/09/2024', '13:38:01', 'Kepala Keuangan Boss', 'Super Admin'),
(27, 'TR1725980584', '10/09/2024', '22:03:04', 'Kepala Keuangan Boss', 'Nanda Raditya'),
(28, 'TR1725981901', '10/09/2024', '22:25:01', 'Kepala Keuangan Boss', 'Nanda Raditya'),
(29, 'TR1726548529', '17/09/2024', '11:48:49', '', 'Super Admin'),
(30, 'TR1726556531', '17/09/2024', '14:02:11', '', 'Super Admin'),
(31, 'TR1726569956', '17/09/2024', '17:45:56', '', 'Super Admin'),
(32, 'TR1726570302', '17/09/2024', '17:51:42', NULL, 'Super Admin'),
(33, 'TR1727153632', '24/09/2024', '11:53:52', NULL, 'Jeje'),
(34, 'TR1727157735', '24/09/2024', '13:02:15', NULL, 'Jeje'),
(35, 'TR1727170975', '24/09/2024', '16:42:55', NULL, 'Jeje'),
(37, 'TR1727336743', '26/09/2024', '14:45:43', NULL, 'Super Admin');

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id` int(11) NOT NULL,
  `no_keluar` varchar(25) DEFAULT NULL,
  `tgl_keluar` varchar(25) DEFAULT NULL,
  `jam_keluar` varchar(10) DEFAULT NULL,
  `nama_customer` varchar(80) DEFAULT NULL,
  `nama_petugas` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengeluaran`
--

INSERT INTO `pengeluaran` (`id`, `no_keluar`, `tgl_keluar`, `jam_keluar`, `nama_customer`, `nama_petugas`) VALUES
(20, 'TR1680493850', '03/04/2023', '10:50:50', 'Ainul Solihin, S.T.', 'Super Admin'),
(22, 'TR1680661543', '05/04/2023', '09:25:43', 'Riski Wijaya', 'Super Admin'),
(23, 'TR1680661597', '05/04/2023', '09:26:37', 'Nizar', 'Super Admin'),
(26, 'TR1725863927', '09/09/2024', '13:38:47', 'Nizar', 'Super Admin'),
(27, 'TR1725983365', '10/09/2024', '22:49:25', 'Zidan', 'Nanda Raditya'),
(28, 'TR1726375698', '15/09/2024', '11:48:18', 'Riski Wijaya', 'Super Admin'),
(29, 'TR1726495976', '16/09/2024', '21:12:56', '', 'Super Admin'),
(30, 'TR1726496138', '16/09/2024', '21:15:38', NULL, 'Super Admin'),
(31, 'TR1726548579', '17/09/2024', '11:49:39', NULL, 'Super Admin'),
(32, 'TR1726556563', '17/09/2024', '14:02:43', NULL, 'Super Admin'),
(33, 'TR1726574606', '17/09/2024', '19:03:26', NULL, 'Super Admin'),
(34, 'TR1726758323', '19/09/2024', '22:05:23', NULL, 'Super Admin'),
(35, 'TR1727153649', '24/09/2024', '11:54:09', NULL, 'Jeje'),
(36, 'TR1727158007', '24/09/2024', '13:06:47', NULL, 'Jeje'),
(37, 'TR1727170954', '24/09/2024', '16:42:34', NULL, 'Jeje'),
(39, 'TR1727336770', '26/09/2024', '14:46:10', NULL, 'Super Admin');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `kode` varchar(20) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `kode`, `nama`, `username`, `password`) VALUES
(1, 'PGN17', 'Super Admin', 'admin', 'admin'),
(2, 'PENGGUNA - 35', 'Jeje', 'jeje', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id` int(11) NOT NULL,
  `kode` varchar(20) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id`, `kode`, `nama`, `username`, `password`) VALUES
(3, 'PETUGAS - 35', 'finance', 'faisol', 'finance'),
(4, 'PETUGAS - 43', 'IT', 'hadi', 'password'),
(6, 'PETUGAS - 61', 'Teknisi', 'teknisi', 'teknisi');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `kode` varchar(20) DEFAULT NULL,
  `nama` varchar(80) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telepon` varchar(15) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `kode`, `nama`, `email`, `telepon`, `alamat`) VALUES
(2, 'SPL118', 'Alvin Sanjaya', 'alvinsanjaya@gmail.com', '081234567890', 'Jakarta');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_kategori` (`id_kategori`);

--
-- Indexes for table `barang_rusak`
--
ALTER TABLE `barang_rusak`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_barang_rusak_id_barang` (`id_barang`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_toko`
--
ALTER TABLE `data_toko`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `penerimaan`
--
ALTER TABLE `penerimaan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `no_terima` (`no_terima`);

--
-- Indexes for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `no_keluar` (`no_keluar`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `barang_rusak`
--
ALTER TABLE `barang_rusak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `data_toko`
--
ALTER TABLE `data_toko`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `penerimaan`
--
ALTER TABLE `penerimaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `fk_kategori` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`);

--
-- Constraints for table `barang_rusak`
--
ALTER TABLE `barang_rusak`
  ADD CONSTRAINT `barang_rusak_ibfk_1` FOREIGN KEY (`id`) REFERENCES `barang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_barang_rusak_id_barang` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

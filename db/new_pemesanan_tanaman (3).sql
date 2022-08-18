-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2021 at 11:03 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `new_pemesanan_tanaman`
--

-- --------------------------------------------------------

--
-- Table structure for table `alamat`
--

CREATE TABLE `alamat` (
  `id_alamat` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nohp` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `alamat`
--

INSERT INTO `alamat` (`id_alamat`, `username`, `nohp`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 'admin', '08123456', 'Kota Padang', NULL, NULL),
(2, 'sarah', '081267578', 'Jl. Lubuk Minturun No.1, Lubuk Minturun, Kec. Koto Tangah, Kota Padang, Sumatera Barat 25586', '2021-09-08 16:42:19', '2021-09-08 16:42:19');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `histori`
--

CREATE TABLE `histori` (
  `id_histori` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) NOT NULL,
  `kode_tanaman` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stok` bigint(20) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `histori`
--

INSERT INTO `histori` (`id_histori`, `id_user`, `kode_tanaman`, `stok`, `tanggal`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 1, 'TPT001', 0, '2021-08-31', 'tambah_data', '2021-08-31 00:48:54', '2021-09-14 01:11:07'),
(2, 1, 'TPT002', 5, '2021-08-31', 'tambah_data', '2021-08-31 01:49:33', '2021-09-14 01:54:51'),
(3, 1, 'TSS003', 11, '2021-08-31', 'tambah_data', '2021-08-31 01:49:51', '2021-08-31 01:50:53'),
(4, 1, 'TPT003', 12, '2021-08-31', 'tambah_data', '2021-08-31 02:08:55', '2021-08-31 02:08:55'),
(5, 1, 'TPT004', 12, '2021-08-31', 'tambah_data', '2021-08-31 02:09:15', '2021-08-31 02:09:15'),
(6, 1, 'TPT005', 12, '2021-08-31', 'tambah_data', '2021-08-31 02:09:41', '2021-08-31 02:09:41'),
(7, 1, 'TSR001', 12, '2021-08-31', 'tambah_data', '2021-08-31 02:10:19', '2021-08-31 02:10:19'),
(8, 1, 'TSR002', 12, '2021-08-31', 'tambah_data', '2021-08-31 02:24:37', '2021-08-31 02:24:37'),
(9, 1, 'TSR002', 12, '2021-08-31', 'tambah_data', '2021-08-31 02:24:38', '2021-08-31 02:24:38'),
(10, 1, 'TSR003', 12, '2021-08-31', 'tambah_data', '2021-08-31 02:24:56', '2021-08-31 02:24:56'),
(11, 1, 'TSR004', 12, '2021-08-31', 'tambah_data', '2021-08-31 02:25:15', '2021-08-31 02:25:15'),
(12, 1, 'TSR005', 12, '2021-08-31', 'tambah_data', '2021-08-31 02:25:33', '2021-08-31 02:25:33'),
(13, 1, 'TSS001', 12, '2021-08-31', 'tambah_data', '2021-08-31 02:25:52', '2021-08-31 02:25:52'),
(14, 1, 'TSS002', 12, '2021-08-31', 'tambah_data', '2021-08-31 02:26:13', '2021-08-31 02:26:13'),
(15, 1, 'TSS003', 12, '2021-08-31', 'tambah_data', '2021-08-31 02:26:41', '2021-08-31 02:26:41'),
(16, 1, 'TSS004', 12, '2021-08-31', 'tambah_data', '2021-08-31 02:27:10', '2021-08-31 02:27:10'),
(17, 1, 'TSS005', 12, '2021-08-31', 'tambah_data', '2021-08-31 02:27:31', '2021-08-31 02:27:31'),
(18, 1, 'TPR001', 12, '2021-08-31', 'tambah_data', '2021-08-31 02:27:58', '2021-08-31 02:27:58'),
(19, 1, 'TPR002', 12, '2021-08-31', 'tambah_data', '2021-08-31 02:28:19', '2021-08-31 02:28:19'),
(20, 1, 'TPR001', 2, '2021-08-31', 'tambah_data', '2021-08-31 02:29:09', '2021-08-31 02:29:09'),
(21, 1, 'TPR002', 2, '2021-08-31', 'tambah_data', '2021-08-31 02:29:30', '2021-08-31 02:29:30'),
(22, 1, 'TPR003', 12, '2021-08-31', 'tambah_data', '2021-08-31 02:29:50', '2021-08-31 02:29:50'),
(23, 1, 'TPR004', 12, '2021-08-31', 'tambah_data', '2021-08-31 02:30:14', '2021-08-31 02:30:14'),
(24, 1, 'TPR005', 12, '2021-08-31', 'tambah_data', '2021-08-31 02:30:31', '2021-08-31 02:30:31'),
(25, 1, 'TST001', 12, '2021-08-31', 'tambah_data', '2021-08-31 02:30:54', '2021-08-31 02:30:54'),
(26, 1, 'TST002', 12, '2021-08-31', 'tambah_data', '2021-08-31 02:31:18', '2021-08-31 02:31:18'),
(27, 1, 'TST003', 12, '2021-08-31', 'tambah_data', '2021-08-31 02:31:35', '2021-08-31 02:31:35'),
(28, 1, 'TST004', 12, '2021-08-31', 'tambah_data', '2021-08-31 02:31:50', '2021-08-31 02:31:50'),
(29, 1, 'TST005', 12, '2021-08-31', 'tambah_data', '2021-08-31 02:32:07', '2021-08-31 02:32:07'),
(30, 1, 'TPT001', 12, '2021-08-31', 'Mengurangi Data', '2021-09-08 17:09:51', '2021-09-08 17:09:51');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_tanaman`
--

CREATE TABLE `jenis_tanaman` (
  `id_jenis` bigint(20) UNSIGNED NOT NULL,
  `jenis` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jenis_tanaman`
--

INSERT INTO `jenis_tanaman` (`id_jenis`, `jenis`, `created_at`, `updated_at`) VALUES
(1, 'Tanaman Penutup Tanah (groundcover plants)', '2021-08-31 00:47:25', '2021-08-31 00:47:25'),
(2, 'Tanaman Semak Rendah', '2021-08-31 01:34:26', '2021-08-31 01:34:26'),
(3, 'Tanaman Semak Sedang', '2021-08-31 01:34:44', '2021-08-31 01:34:44'),
(4, 'Tanaman Semak Tinggi', '2021-08-31 01:35:00', '2021-08-31 01:35:00'),
(5, 'Tanaman Perdu Rendah', '2021-08-31 01:35:14', '2021-08-31 01:35:14');

-- --------------------------------------------------------

--
-- Table structure for table `master_stok`
--

CREATE TABLE `master_stok` (
  `id_stok` bigint(20) UNSIGNED NOT NULL,
  `id_user` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_tanaman` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stok` bigint(20) NOT NULL,
  `tanggal` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `master_stok`
--

INSERT INTO `master_stok` (`id_stok`, `id_user`, `kode_tanaman`, `stok`, `tanggal`, `created_at`, `updated_at`) VALUES
(1, '1', 'TPT001', 8, '2021-08-31', '2021-08-31 00:48:54', '2021-09-14 01:11:07'),
(2, '1', 'TPT002', 5, '2021-08-31', '2021-08-31 01:49:33', '2021-09-14 01:54:51'),
(3, '1', 'TSS003', 23, '2021-08-31', '2021-08-31 01:49:51', '2021-08-31 02:26:41'),
(4, '1', 'TPT003', 12, '2021-08-31', '2021-08-31 02:08:55', '2021-08-31 02:08:55'),
(5, '1', 'TPT004', 12, '2021-08-31', '2021-08-31 02:09:15', '2021-08-31 02:09:15'),
(6, '1', 'TPT005', 12, '2021-08-31', '2021-08-31 02:09:41', '2021-08-31 02:09:41'),
(7, '1', 'TSR001', 12, '2021-08-31', '2021-08-31 02:10:19', '2021-08-31 02:10:19'),
(8, '1', 'TSR002', 24, '2021-08-31', '2021-08-31 02:24:37', '2021-08-31 02:24:38'),
(9, '1', 'TSR003', 12, '2021-08-31', '2021-08-31 02:24:56', '2021-08-31 02:24:56'),
(10, '1', 'TSR004', 12, '2021-08-31', '2021-08-31 02:25:15', '2021-08-31 02:25:15'),
(11, '1', 'TSR005', 12, '2021-08-31', '2021-08-31 02:25:33', '2021-08-31 02:25:33'),
(12, '1', 'TSS001', 12, '2021-08-31', '2021-08-31 02:25:52', '2021-08-31 02:25:52'),
(13, '1', 'TSS002', 12, '2021-08-31', '2021-08-31 02:26:13', '2021-08-31 02:26:13'),
(14, '1', 'TSS004', 12, '2021-08-31', '2021-08-31 02:27:10', '2021-08-31 02:27:10'),
(15, '1', 'TSS005', 12, '2021-08-31', '2021-08-31 02:27:31', '2021-08-31 02:27:31'),
(16, '1', 'TPR001', 14, '2021-08-31', '2021-08-31 02:27:57', '2021-08-31 02:29:09'),
(17, '1', 'TPR002', 14, '2021-08-31', '2021-08-31 02:28:19', '2021-08-31 02:29:30'),
(18, '1', 'TPR003', 12, '2021-08-31', '2021-08-31 02:29:50', '2021-08-31 02:29:50'),
(19, '1', 'TPR004', 12, '2021-08-31', '2021-08-31 02:30:14', '2021-08-31 02:30:14'),
(20, '1', 'TPR005', 12, '2021-08-31', '2021-08-31 02:30:31', '2021-08-31 02:30:31'),
(21, '1', 'TST001', 12, '2021-08-31', '2021-08-31 02:30:54', '2021-08-31 02:30:54'),
(22, '1', 'TST002', 12, '2021-08-31', '2021-08-31 02:31:18', '2021-08-31 02:31:18'),
(23, '1', 'TST003', 12, '2021-08-31', '2021-08-31 02:31:35', '2021-08-31 02:31:35'),
(24, '1', 'TST004', 12, '2021-08-31', '2021-08-31 02:31:50', '2021-08-31 02:31:50'),
(25, '1', 'TST005', 12, '2021-08-31', '2021-08-31 02:32:07', '2021-08-31 02:32:07');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_06_01_162218_create_tanaman_table', 1),
(5, '2021_06_01_163202_create_jenis_tanaman_table', 1),
(6, '2021_06_01_164042_create_master_stok_table', 1),
(7, '2021_06_01_165042_create_histori_table', 1),
(8, '2021_06_02_032006_create_alamat_table', 1),
(9, '2021_06_13_061130_create_penjualan_table', 1),
(10, '2021_06_13_081120_create_pembayaran_table', 1),
(12, '2021_09_13_043555_create_ukuran_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` bigint(20) UNSIGNED NOT NULL,
  `pembayaran` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_pembayaran` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `pembayaran`, `total_pembayaran`, `created_at`, `updated_at`) VALUES
(1, 'tunai', 200000, '2021-09-14 01:11:07', '2021-09-14 01:11:07'),
(2, 'tunai', 200000, '2021-09-14 01:54:51', '2021-09-14 01:54:51');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) NOT NULL,
  `id_stok` bigint(20) NOT NULL,
  `id_histori` bigint(20) NOT NULL,
  `pembayaran` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_tanaman` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stok_jual` bigint(20) NOT NULL,
  `ukuran` int(10) NOT NULL,
  `tanggal_jual` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `id_user`, `id_stok`, `id_histori`, `pembayaran`, `kode_tanaman`, `stok_jual`, `ukuran`, `tanggal_jual`, `created_at`, `updated_at`) VALUES
(1, 1, 10, 1, 'tunai', 'TPT001', 2, 2, '2021-09-14', '2021-09-14 01:11:07', '2021-09-14 01:11:07'),
(2, 1, 7, 2, 'tunai', 'TPT002', 2, 2, '2021-09-14', '2021-09-14 01:54:51', '2021-09-14 01:54:51');

-- --------------------------------------------------------

--
-- Table structure for table `tanaman`
--

CREATE TABLE `tanaman` (
  `id_tanaman` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) NOT NULL,
  `id_jenis` bigint(20) NOT NULL,
  `kode_tanaman` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_tanaman` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tanaman`
--

INSERT INTO `tanaman` (`id_tanaman`, `id_user`, `id_jenis`, `kode_tanaman`, `nama_tanaman`, `harga`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'TPT001', 'Adiantum sp (suplir)/5cm', 50000, '2021-08-31 00:48:24', '2021-09-13 00:08:51'),
(2, 1, 1, 'TPT002', 'Aglaonema sp (aglaonema)/30cm', 50000, '2021-08-31 01:36:07', '2021-08-31 01:36:07'),
(3, 1, 1, 'TPT003', 'Althernantera sp (Krokot)/5cm', 1500, '2021-08-31 01:36:38', '2021-08-31 01:36:38'),
(4, 1, 1, 'TPT004', 'Arachis pintoi (kacang - kacangan)/5cm', 1500, '2021-08-31 01:37:35', '2021-08-31 01:37:35'),
(5, 1, 1, 'TPT005', 'Axonopus compressus (rumput paetan)/1m', 15000, '2021-08-31 01:39:07', '2021-08-31 01:39:07'),
(6, 1, 2, 'TSR001', 'Adenium sp (kamboja jepang)/20cm', 50000, '2021-08-31 01:39:49', '2021-08-31 01:39:49'),
(7, 1, 2, 'TSR002', 'Agave attenuata (siklok)/30cm', 35000, '2021-08-31 01:40:38', '2021-08-31 01:40:38'),
(8, 1, 2, 'TSR003', 'Canna sp (kana)/40cm', 5000, '2021-08-31 01:41:21', '2021-08-31 01:41:21'),
(9, 1, 2, 'TSR004', 'Cleome hasslerana (bunga laba-laba)/20cm', 5000, '2021-08-31 01:42:01', '2021-08-31 01:42:01'),
(10, 1, 2, 'TSR005', 'Costus sp (pacing)/30cm', 8000, '2021-08-31 01:42:43', '2021-08-31 01:42:43'),
(11, 1, 3, 'TSS001', 'Acalypha wilkesiana (daun renda/acalipa)/30cm', 6000, '2021-08-31 01:43:43', '2021-08-31 01:43:43'),
(12, 1, 3, 'TSS002', 'Cycas revoluta (sikas) /50cm', 3500000, '2021-08-31 01:44:33', '2021-08-31 01:44:33'),
(13, 1, 3, 'TSS003', 'Eucalyptus gunni (daun perak)/30cm', 7500, '2021-08-31 01:46:19', '2021-08-31 01:46:19'),
(14, 1, 3, 'TSS004', 'Gardenia jasminoides (gardenia/kaca piring)/30cm', 5000, '2021-08-31 01:48:46', '2021-08-31 01:48:46'),
(15, 1, 3, 'TSS005', 'Hydrangea macrophylla (hortensia)/50cm', 35000, '2021-08-31 02:11:57', '2021-08-31 02:11:57'),
(16, 1, 5, 'TPR001', 'Brunfelsia calycina Benth (melati costa)/25cm', 7000, '2021-08-31 02:15:06', '2021-08-31 02:15:06'),
(17, 1, 5, 'TPR002', 'Codiaeum sp (puring)/25cm', 15000, '2021-08-31 02:15:44', '2021-08-31 02:15:44'),
(18, 1, 5, 'TPR003', 'Heliconia sp (pisang hias)/25cm', 5000, '2021-08-31 02:16:19', '2021-08-31 02:16:19'),
(19, 1, 5, 'TPR004', 'Nothopanax scutellarium (daun mangkokan)/25cm', 4000, '2021-08-31 02:17:03', '2021-08-31 02:17:19'),
(20, 1, 5, 'TPR005', 'Osmoxylum lineare (kaki laba-laba dan aralia)/25cm', 5000, '2021-08-31 02:17:55', '2021-08-31 02:17:55'),
(21, 1, 4, 'TST001', 'Acalypha macrophylla (teh-tehan)/20cm', 1500, '2021-08-31 02:19:28', '2021-08-31 02:19:28'),
(22, 1, 4, 'TST002', 'Alpinia purpurata (lengkuas merah)/25cm', 15000, '2021-08-31 02:20:04', '2021-08-31 02:20:04'),
(23, 1, 0, 'TST003', 'Arundinaria pumila (bambu jepang)/1m', 25000, '2021-08-31 02:20:40', '2021-08-31 02:21:11'),
(24, 1, 4, 'TST004', 'Rosa sp (mawar)/30cm', 15000, '2021-08-31 02:22:21', '2021-08-31 02:22:21'),
(25, 1, 4, 'TST005', 'Hibiscus sp (kembang sepatu/bunga raya)/25cm', 7500, '2021-08-31 02:23:05', '2021-08-31 02:23:05');

-- --------------------------------------------------------

--
-- Table structure for table `ukuran`
--

CREATE TABLE `ukuran` (
  `id_ukuran` bigint(20) UNSIGNED NOT NULL,
  `kode_tanaman` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ukuran` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ukuran`
--

INSERT INTO `ukuran` (`id_ukuran`, `kode_tanaman`, `ukuran`, `harga`, `created_at`, `updated_at`) VALUES
(3, 'TPT001', '5cm', 1000, NULL, NULL),
(4, 'TPT001', '7cm', 1500, NULL, NULL),
(5, 'TPT002', '5cm', 1500, NULL, NULL),
(6, 'TPT002', '7cm', 2000, NULL, NULL),
(7, 'TPT003', '5cm', 2000, NULL, NULL),
(8, 'TPT003', '7cm', 2500, NULL, NULL),
(9, 'TPT004', '5cm', 2000, NULL, NULL),
(10, 'TPT004', '7cm', 3000, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin.jpg',
  `status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email_verified_at`, `password`, `photo`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Darniwilis', 'admin', NULL, '$2y$10$BouUygjtPVMzyFZg5lQ0Ku7xpxH0UdzrxVggM84v29M18Ip5nEOw2', 'admin.jpg', 'admin', NULL, NULL, '2021-08-31 02:35:40'),
(2, 'sarah', 'sarah', NULL, '$2y$10$I0d2kqR1Bi1.bIegJbsABO.0vUsTRaVs1qQouUkvURZVGnl9uYhtC', 'admin.jpg', 'karyawan', NULL, '2021-09-08 16:42:19', '2021-09-08 16:42:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alamat`
--
ALTER TABLE `alamat`
  ADD PRIMARY KEY (`id_alamat`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `histori`
--
ALTER TABLE `histori`
  ADD PRIMARY KEY (`id_histori`);

--
-- Indexes for table `jenis_tanaman`
--
ALTER TABLE `jenis_tanaman`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `master_stok`
--
ALTER TABLE `master_stok`
  ADD PRIMARY KEY (`id_stok`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indexes for table `tanaman`
--
ALTER TABLE `tanaman`
  ADD PRIMARY KEY (`id_tanaman`);

--
-- Indexes for table `ukuran`
--
ALTER TABLE `ukuran`
  ADD PRIMARY KEY (`id_ukuran`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alamat`
--
ALTER TABLE `alamat`
  MODIFY `id_alamat` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `histori`
--
ALTER TABLE `histori`
  MODIFY `id_histori` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `jenis_tanaman`
--
ALTER TABLE `jenis_tanaman`
  MODIFY `id_jenis` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `master_stok`
--
ALTER TABLE `master_stok`
  MODIFY `id_stok` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tanaman`
--
ALTER TABLE `tanaman`
  MODIFY `id_tanaman` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `ukuran`
--
ALTER TABLE `ukuran`
  MODIFY `id_ukuran` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

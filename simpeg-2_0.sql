-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 03, 2025 at 03:49 AM
-- Server version: 8.0.30
-- PHP Version: 8.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simpeg-2.0`
--

-- --------------------------------------------------------

--
-- Table structure for table `bidangs`
--

CREATE TABLE `bidangs` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_bidang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_bidang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `status` enum('Aktif','Non-Aktif') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Aktif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bidangs`
--

INSERT INTO `bidangs` (`id`, `nama_bidang`, `kode_bidang`, `deskripsi`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Kepegawaian', 'KPG', 'Bidang yang menangani manajemen kepegawaian', 'Aktif', '2025-01-20 18:59:37', '2025-01-20 18:59:37'),
(2, 'Teknik', 'TKN', 'Bidang yang menangani aspek teknis', 'Aktif', '2025-01-20 18:59:37', '2025-01-20 18:59:37'),
(3, 'Keuangan', 'KEU', 'Bidang yang menangani aspek keuangan', 'Aktif', '2025-01-20 18:59:37', '2025-01-20 18:59:37'),
(4, 'Administrasi', 'ADM', 'Bidang yang menangani administrasi umum', 'Aktif', '2025-01-20 18:59:37', '2025-01-20 18:59:37');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cuti`
--

CREATE TABLE `cuti` (
  `id` bigint UNSIGNED NOT NULL,
  `pegawai_id` bigint UNSIGNED NOT NULL,
  `jenis_cuti` enum('Cuti Tahunan','Cuti Besar','Cuti Khusus','Cuti Sakit','Cuti Melahirkan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `jumlah_hari` int NOT NULL,
  `alasan` text COLLATE utf8mb4_unicode_ci,
  `status` enum('Proses','Disetujui','Ditolak') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Proses',
  `dokumen_pendukung` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cuti`
--

INSERT INTO `cuti` (`id`, `pegawai_id`, `jenis_cuti`, `tanggal_mulai`, `tanggal_selesai`, `jumlah_hari`, `alasan`, `status`, `dokumen_pendukung`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 'Cuti Khusus', '2025-01-10', '2025-01-21', 5, 'Alasan cuti 87', 'Disetujui', NULL, '2025-01-22 17:46:47', '2025-01-22 17:46:47', NULL),
(2, 3, 'Cuti Besar', '2025-01-12', '2025-01-20', 1, 'Alasan cuti 23', 'Disetujui', NULL, '2025-01-22 17:46:47', '2025-01-22 17:46:47', NULL),
(3, 4, 'Cuti Melahirkan', '2024-12-30', '2025-01-17', 3, 'Alasan cuti 6', 'Ditolak', NULL, '2025-01-22 17:46:47', '2025-01-22 17:46:47', NULL),
(4, 5, 'Cuti Sakit', '2025-01-17', '2025-01-13', 5, 'Alasan cuti 19', 'Ditolak', NULL, '2025-01-22 17:46:47', '2025-01-22 17:46:47', NULL),
(5, 6, 'Cuti Sakit', '2024-12-27', '2025-01-18', 2, 'Alasan cuti 80', 'Disetujui', NULL, '2025-01-22 17:46:47', '2025-01-22 17:46:47', NULL),
(6, 7, 'Cuti Tahunan', '2024-12-27', '2025-01-15', 5, 'Alasan cuti 73', 'Proses', NULL, '2025-01-22 17:46:47', '2025-01-22 17:46:47', NULL),
(7, 8, 'Cuti Sakit', '2025-01-05', '2025-01-16', 5, 'Alasan cuti 40', 'Disetujui', NULL, '2025-01-22 17:46:47', '2025-01-22 17:46:47', NULL),
(8, 9, 'Cuti Tahunan', '2024-12-31', '2025-01-14', 2, 'Alasan cuti 31', 'Ditolak', NULL, '2025-01-22 17:46:47', '2025-01-22 17:46:47', NULL),
(9, 10, 'Cuti Besar', '2024-12-26', '2025-01-19', 3, 'Alasan cuti 54', 'Proses', NULL, '2025-01-22 17:46:47', '2025-01-22 17:46:47', NULL),
(10, 11, 'Cuti Sakit', '2024-12-29', '2025-01-14', 5, 'Alasan cuti 82', 'Disetujui', NULL, '2025-01-22 17:46:47', '2025-01-22 17:46:47', NULL),
(11, 12, 'Cuti Besar', '2025-01-08', '2025-01-21', 3, 'Alasan cuti 57', 'Disetujui', NULL, '2025-01-22 17:46:47', '2025-01-22 17:46:47', NULL),
(12, 13, 'Cuti Khusus', '2025-01-15', '2025-01-19', 2, 'Alasan cuti 12', 'Proses', NULL, '2025-01-22 17:46:47', '2025-01-22 17:46:47', NULL),
(13, 14, 'Cuti Tahunan', '2025-01-12', '2025-01-18', 3, 'Alasan cuti 86', 'Proses', NULL, '2025-01-22 17:46:47', '2025-01-22 17:46:47', NULL),
(14, 15, 'Cuti Besar', '2024-12-28', '2025-01-22', 4, 'Alasan cuti 30', 'Ditolak', NULL, '2025-01-22 17:46:47', '2025-01-22 17:46:47', NULL),
(15, 16, 'Cuti Sakit', '2025-01-07', '2025-01-22', 1, 'Alasan cuti 36', 'Proses', NULL, '2025-01-22 17:46:47', '2025-01-22 17:46:47', NULL),
(16, 17, 'Cuti Tahunan', '2025-01-18', '2025-01-15', 4, 'Alasan cuti 12', 'Disetujui', NULL, '2025-01-22 17:46:47', '2025-01-22 17:46:47', NULL),
(17, 18, 'Cuti Melahirkan', '2025-01-13', '2025-01-17', 2, 'Alasan cuti 31', 'Ditolak', NULL, '2025-01-22 17:46:47', '2025-01-22 17:46:47', NULL),
(18, 19, 'Cuti Besar', '2025-01-22', '2025-01-22', 3, 'Alasan cuti 11', 'Ditolak', NULL, '2025-01-22 17:46:47', '2025-01-22 17:46:47', NULL),
(19, 20, 'Cuti Khusus', '2024-12-28', '2025-01-22', 1, 'Alasan cuti 23', 'Disetujui', NULL, '2025-01-22 17:46:47', '2025-01-22 17:46:47', NULL),
(20, 24, 'Cuti Tahunan', '2025-01-03', '2025-01-22', 2, 'Alasan cuti 25', 'Ditolak', NULL, '2025-01-22 17:46:47', '2025-01-22 17:46:47', NULL),
(21, 2, 'Cuti Tahunan', '2024-12-25', '2025-01-20', 3, 'Reason for leave 94', 'Disetujui', NULL, '2025-01-22 17:53:00', '2025-01-22 17:53:00', NULL),
(22, 3, 'Cuti Melahirkan', '2025-01-08', '2025-01-16', 3, 'Reason for leave 60', 'Proses', NULL, '2025-01-22 17:53:00', '2025-01-22 17:53:00', NULL),
(23, 4, 'Cuti Melahirkan', '2024-12-28', '2025-01-15', 5, 'Reason for leave 45', 'Ditolak', NULL, '2025-01-22 17:53:00', '2025-01-22 17:53:00', NULL),
(24, 5, 'Cuti Melahirkan', '2025-01-05', '2025-01-16', 3, 'Reason for leave 16', 'Ditolak', NULL, '2025-01-22 17:53:00', '2025-01-22 17:53:00', NULL),
(25, 6, 'Cuti Khusus', '2024-12-28', '2025-01-15', 5, 'Reason for leave 20', 'Proses', NULL, '2025-01-22 17:53:00', '2025-01-22 17:53:00', NULL),
(26, 7, 'Cuti Tahunan', '2025-01-10', '2025-01-20', 4, 'Reason for leave 10', 'Proses', NULL, '2025-01-22 17:53:00', '2025-01-22 17:53:00', NULL),
(27, 8, 'Cuti Melahirkan', '2025-01-19', '2025-01-17', 5, 'Reason for leave 39', 'Proses', NULL, '2025-01-22 17:53:00', '2025-01-22 17:53:00', NULL),
(28, 9, 'Cuti Besar', '2025-01-09', '2025-01-14', 2, 'Reason for leave 69', 'Disetujui', NULL, '2025-01-22 17:53:00', '2025-01-22 17:53:00', NULL),
(29, 10, 'Cuti Besar', '2025-01-04', '2025-01-21', 1, 'Reason for leave 4', 'Disetujui', NULL, '2025-01-22 17:53:00', '2025-01-22 17:53:00', NULL),
(30, 11, 'Cuti Tahunan', '2025-01-03', '2025-01-19', 3, 'Reason for leave 20', 'Ditolak', NULL, '2025-01-22 17:53:00', '2025-01-22 17:53:00', NULL),
(31, 12, 'Cuti Besar', '2024-12-30', '2025-01-18', 3, 'Reason for leave 87', 'Proses', NULL, '2025-01-22 17:53:00', '2025-01-22 17:53:00', NULL),
(32, 13, 'Cuti Tahunan', '2025-01-14', '2025-01-19', 1, 'Reason for leave 21', 'Proses', NULL, '2025-01-22 17:53:00', '2025-01-22 17:53:00', NULL),
(33, 14, 'Cuti Melahirkan', '2025-01-20', '2025-01-14', 4, 'Reason for leave 93', 'Ditolak', NULL, '2025-01-22 17:53:00', '2025-01-22 17:53:00', NULL),
(34, 15, 'Cuti Khusus', '2024-12-29', '2025-01-15', 5, 'Reason for leave 98', 'Ditolak', NULL, '2025-01-22 17:53:00', '2025-01-22 17:53:00', NULL),
(35, 16, 'Cuti Tahunan', '2025-01-07', '2025-01-19', 4, 'Reason for leave 97', 'Proses', NULL, '2025-01-22 17:53:00', '2025-01-22 17:53:00', NULL),
(36, 17, 'Cuti Khusus', '2024-12-29', '2025-01-17', 3, 'Reason for leave 77', 'Disetujui', NULL, '2025-01-22 17:53:00', '2025-01-22 17:53:00', NULL),
(37, 18, 'Cuti Tahunan', '2024-12-28', '2025-01-18', 2, 'Reason for leave 74', 'Ditolak', NULL, '2025-01-22 17:53:00', '2025-01-22 17:53:00', NULL),
(38, 19, 'Cuti Melahirkan', '2025-01-07', '2025-01-16', 4, 'Reason for leave 54', 'Proses', NULL, '2025-01-22 17:53:00', '2025-01-22 17:53:00', NULL),
(39, 20, 'Cuti Besar', '2024-12-29', '2025-01-22', 3, 'Reason for leave 32', 'Proses', NULL, '2025-01-22 17:53:00', '2025-01-22 17:53:00', NULL),
(40, 24, 'Cuti Besar', '2025-01-03', '2025-01-20', 4, 'Reason for leave 28', 'Disetujui', NULL, '2025-01-22 17:53:00', '2025-01-22 17:53:00', NULL),
(41, 2, 'Cuti Melahirkan', '2024-12-28', '2025-01-01', 5, 'Reason for leave 86', 'Proses', NULL, '2025-01-22 18:09:46', '2025-01-22 18:09:46', NULL),
(42, 3, 'Cuti Besar', '2025-01-21', '2025-01-25', 5, 'Reason for leave 7', 'Proses', NULL, '2025-01-22 18:09:46', '2025-01-22 18:09:46', NULL),
(43, 4, 'Cuti Besar', '2025-01-04', '2025-01-09', 6, 'Reason for leave 20', 'Proses', NULL, '2025-01-22 18:09:46', '2025-01-22 18:09:46', NULL),
(44, 5, 'Cuti Sakit', '2025-01-06', '2025-01-11', 6, 'Reason for leave 15', 'Proses', NULL, '2025-01-22 18:09:46', '2025-01-22 18:09:46', NULL),
(45, 6, 'Cuti Sakit', '2025-01-05', '2025-01-10', 6, 'Reason for leave 39', 'Proses', NULL, '2025-01-22 18:09:46', '2025-01-22 18:09:46', NULL),
(46, 7, 'Cuti Sakit', '2024-12-29', '2025-01-03', 6, 'Reason for leave 30', 'Proses', NULL, '2025-01-22 18:09:46', '2025-01-22 18:09:46', NULL),
(47, 8, 'Cuti Besar', '2025-01-05', '2025-01-10', 6, 'Reason for leave 56', 'Disetujui', NULL, '2025-01-22 18:09:46', '2025-01-22 18:09:46', NULL),
(48, 9, 'Cuti Melahirkan', '2025-01-07', '2025-01-12', 6, 'Reason for leave 82', 'Proses', NULL, '2025-01-22 18:09:46', '2025-01-22 18:09:46', NULL),
(49, 10, 'Cuti Khusus', '2024-12-28', '2024-12-30', 3, 'Reason for leave 81', 'Ditolak', NULL, '2025-01-22 18:09:46', '2025-01-22 18:09:46', NULL),
(50, 11, 'Cuti Khusus', '2025-01-17', '2025-01-20', 4, 'Reason for leave 64', 'Ditolak', NULL, '2025-01-22 18:09:46', '2025-01-22 18:09:46', NULL),
(51, 12, 'Cuti Melahirkan', '2025-01-03', '2025-01-08', 6, 'Reason for leave 65', 'Disetujui', NULL, '2025-01-22 18:09:46', '2025-01-22 18:09:46', NULL),
(52, 13, 'Cuti Melahirkan', '2024-12-27', '2024-12-28', 2, 'Reason for leave 4', 'Proses', NULL, '2025-01-22 18:09:46', '2025-01-22 18:09:46', NULL),
(53, 14, 'Cuti Sakit', '2025-01-16', '2025-01-18', 3, 'Reason for leave 65', 'Disetujui', NULL, '2025-01-22 18:09:46', '2025-01-22 18:09:46', NULL),
(54, 15, 'Cuti Khusus', '2024-12-26', '2024-12-28', 3, 'Reason for leave 88', 'Ditolak', NULL, '2025-01-22 18:09:46', '2025-01-22 18:09:46', NULL),
(55, 16, 'Cuti Tahunan', '2025-01-06', '2025-01-07', 2, 'Reason for leave 35', 'Proses', NULL, '2025-01-22 18:09:46', '2025-01-22 18:09:46', NULL),
(56, 17, 'Cuti Sakit', '2024-12-31', '2025-01-03', 4, 'Reason for leave 71', 'Ditolak', NULL, '2025-01-22 18:09:46', '2025-01-22 18:09:46', NULL),
(57, 18, 'Cuti Tahunan', '2025-01-18', '2025-01-20', 3, 'Reason for leave 24', 'Proses', NULL, '2025-01-22 18:09:46', '2025-01-22 18:09:46', NULL),
(58, 19, 'Cuti Khusus', '2025-01-12', '2025-01-14', 3, 'Reason for leave 20', 'Ditolak', NULL, '2025-01-22 18:09:46', '2025-01-22 18:09:46', NULL),
(59, 20, 'Cuti Sakit', '2025-01-03', '2025-01-08', 6, 'Reason for leave 28', 'Proses', NULL, '2025-01-22 18:09:46', '2025-01-22 18:09:46', NULL),
(60, 24, 'Cuti Sakit', '2025-01-01', '2025-01-04', 4, 'Reason for leave 33', 'Disetujui', NULL, '2025-01-22 18:09:46', '2025-01-22 18:09:46', NULL),
(61, 7, 'Cuti Besar', '2025-01-23', '2025-01-24', 2, 'asdad', 'Disetujui', 'dokumen_cuti/1737601407_RG-AP820-L(V3) Wireless Access Point Quick Installation Guide ROM.pdf', '2025-01-22 18:22:43', '2025-01-22 19:09:22', '2025-01-22 19:09:22'),
(62, 15, 'Cuti Sakit', '2025-01-23', '2025-01-24', 2, 'please', 'Disetujui', NULL, '2025-01-22 19:10:07', '2025-01-22 19:10:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_01_21_023159_create_bidangs_table', 1),
(5, '2025_01_21_025549_create_pegawais_table', 1),
(6, '2025_01_23_005906_create_cuti_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pegawais`
--

CREATE TABLE `pegawais` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bidang_id` bigint UNSIGNED DEFAULT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `status` enum('Aktif','Cuti','Non-Aktif') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Aktif',
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_telepon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pegawais`
--

INSERT INTO `pegawais` (`id`, `nama`, `nip`, `email`, `bidang_id`, `jabatan`, `tanggal_masuk`, `status`, `avatar`, `no_telepon`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `created_at`, `updated_at`) VALUES
(2, 'Ciaobella Shakila Laksmiwati S.E.I', 'PEG-7680-7441', 'ppertiwi@example.org', 2, 'Kondektur', '2023-08-31', 'Aktif', 'avatars/z5JKDiuBnWZXCFY7vNFTk1qWUpAvO35vu9JIItTA.jpg', '(+62) 897 9017 719', 'Laki-laki', 'Samarinda', '1984-05-20', 'Kpg. Reksoninten No. 166, Medan 83332, Sumbar', '2025-01-20 18:59:37', '2025-01-21 20:02:05'),
(3, 'Heru Iswahyudi M.Farm', 'PEG-3963-0569', 'tami.sudiati@example.com', 4, 'Penyelam', '2023-04-09', 'Aktif', 'avatars/kcmoFnCleTlB5Li10ybGw3LTN8cSNuvPmzLWNtGh.jpg', '(+62) 415 7746 618', 'Laki-laki', 'Surakarta', '1977-01-04', 'Kpg. Rajawali No. 218, Surabaya 21253, Sulsel', '2025-01-20 18:59:37', '2025-01-21 20:02:22'),
(4, 'Wardi Zulkarnain M.Ak', 'PEG-1068-7063', 'natalia77@example.com', 1, 'Dosen', '2022-08-15', 'Cuti', NULL, '0663 7453 457', 'Laki-laki', 'Bukittinggi', '2004-11-01', 'Dk. Aceh No. 980, Cilegon 80823, DKI', '2025-01-20 18:59:37', '2025-01-20 18:59:37'),
(5, 'Salsabila Mardhiyah', 'PEG-7846-6454', 'usamah.balidin@example.org', 4, 'Arsitek', '2025-01-07', 'Cuti', NULL, '(+62) 314 6190 4698', 'Perempuan', 'Tomohon', '1993-03-04', 'Jr. Yos Sudarso No. 65, Metro 46347, Sulbar', '2025-01-20 18:59:37', '2025-01-20 18:59:37'),
(6, 'Baktiadi Dabukke M.Ak', 'PEG-0714-5679', 'qmandala@example.com', 4, 'Konsultan', '2021-07-08', 'Cuti', NULL, '(+62) 29 0333 8915', 'Perempuan', 'Probolinggo', '1984-03-31', 'Ki. Bacang No. 563, Kupang 63614, Kalbar', '2025-01-20 18:59:37', '2025-01-20 18:59:37'),
(7, 'Sakura Pratiwi', 'PEG-2306-3785', 'kpadmasari@example.org', 3, 'Karyawan Swasta', '2023-07-10', 'Aktif', NULL, '(+62) 452 6117 8167', 'Laki-laki', 'Makassar', '1992-10-26', 'Gg. W.R. Supratman No. 987, Administrasi Jakarta Utara 30255, Sulut', '2025-01-20 18:59:37', '2025-01-20 18:59:37'),
(8, 'Jasmani Mustofa', 'PEG-0387-4986', 'indra68@example.com', 2, 'Bidan', '2020-02-22', 'Aktif', NULL, '(+62) 879 593 447', 'Laki-laki', 'Prabumulih', '1999-01-16', 'Ds. Kali No. 730, Metro 16823, Kalbar', '2025-01-20 18:59:37', '2025-01-20 18:59:37'),
(9, 'Warsa Prakosa Hutagalung', 'PEG-6864-6754', 'eluh.saragih@example.com', 2, 'Penulis', '2021-04-03', 'Cuti', NULL, '0845 1841 4607', 'Perempuan', 'Tanjungbalai', '1988-01-21', 'Gg. Bazuka Raya No. 20, Ternate 46827, Riau', '2025-01-20 18:59:37', '2025-01-20 18:59:37'),
(10, 'Salsabila Zahra Fujiati', 'PEG-0260-5551', 'zalindra.najmudin@example.org', 4, 'Nelayan / Perikanan', '2020-10-23', 'Cuti', NULL, '0988 6805 173', 'Laki-laki', 'Bogor', '1988-11-18', 'Jr. Tangkuban Perahu No. 75, Bengkulu 83785, Babel', '2025-01-20 18:59:37', '2025-01-20 18:59:37'),
(11, 'Cici Siska Wastuti S.Gz', 'PEG-7955-2722', 'permata.tania@example.com', 2, 'Perangkat Desa', '2021-08-11', 'Cuti', NULL, '0673 3044 0477', 'Perempuan', 'Surabaya', '1983-07-01', 'Gg. PHH. Mustofa No. 208, Bekasi 57230, Bengkulu', '2025-01-20 18:59:37', '2025-01-20 18:59:37'),
(12, 'Ika Nurdiyanti', 'PEG-2341-1030', 'uprabowo@example.net', 2, 'Sopir', '2022-09-20', 'Non-Aktif', NULL, '0825 836 202', 'Laki-laki', 'Administrasi Jakarta Pusat', '1980-11-10', 'Jln. Agus Salim No. 778, Parepare 30928, Kalsel', '2025-01-20 18:59:37', '2025-01-21 19:00:05'),
(13, 'Ani Michelle Astuti S.IP', 'PEG-4212-5417', 'carub02@example.com', 2, 'Pramusaji', '2020-01-25', 'Aktif', NULL, '0207 5423 0030', 'Perempuan', 'Tangerang', '1998-11-07', 'Psr. Rajawali Barat No. 888, Payakumbuh 91332, Kaltara', '2025-01-20 18:59:37', '2025-01-20 18:59:37'),
(14, 'Winda Ana Yolanda', 'PEG-8550-0387', 'xnuraini@example.org', 3, 'Juru Masak', '2020-09-05', 'Aktif', NULL, '(+62) 23 2403 0375', 'Laki-laki', 'Pontianak', '1985-09-03', 'Dk. Dipatiukur No. 443, Samarinda 50889, Jatim', '2025-01-20 18:59:37', '2025-01-20 18:59:37'),
(15, 'Dadap Banara Marpaung M.Pd', 'PEG-7234-2250', 'firmansyah.hani@example.net', 3, 'Atlet', '2021-07-18', 'Aktif', NULL, '(+62) 657 9577 837', 'Perempuan', 'Madiun', '1977-12-18', 'Psr. HOS. Cjokroaminoto (Pasirkaliki) No. 597, Banjarmasin 76263, Pabar', '2025-01-20 18:59:37', '2025-01-20 18:59:37'),
(16, 'Rahmi Rahayu M.Pd', 'PEG-2832-6829', 'uyulianti@example.net', 3, 'Biarawati', '2023-06-20', 'Non-Aktif', NULL, '(+62) 724 5399 380', 'Laki-laki', 'Cilegon', '1992-04-02', 'Gg. Ki Hajar Dewantara No. 251, Palopo 30077, Jateng', '2025-01-20 18:59:37', '2025-01-20 18:59:37'),
(17, 'Kamal Karman Winarno M.Ak', 'PEG-5874-8330', 'olailasari@example.org', 3, 'Pendeta', '2022-08-06', 'Non-Aktif', NULL, '(+62) 763 4386 354', 'Perempuan', 'Bima', '2000-01-14', 'Jln. Otista No. 977, Padangpanjang 48875, Riau', '2025-01-20 18:59:37', '2025-01-20 18:59:37'),
(18, 'Opung Santoso M.M.', 'PEG-3582-7296', 'jane22@example.org', 3, 'Dosen', '2021-08-01', 'Aktif', NULL, '(+62) 429 7814 3954', 'Perempuan', 'Langsa', '1983-04-02', 'Gg. Bara No. 77, Bukittinggi 49973, Sulut', '2025-01-20 18:59:37', '2025-01-20 18:59:37'),
(19, 'Cakrabuana Natsir S.I.Kom', 'PEG-9190-0366', 'devi.mardhiyah@example.net', 4, 'Pegawai Negeri Sipil (PNS)', '2024-05-20', 'Aktif', NULL, '0868 9776 1596', 'Perempuan', 'Banjar', '2000-06-03', 'Ki. Adisucipto No. 600, Subulussalam 48050, Aceh', '2025-01-20 18:59:37', '2025-01-20 18:59:37'),
(20, 'Maria Melinda Yuniar S.E.', 'PEG-9333-5263', 'irfan.halim@example.net', 1, 'Pelaut', '2022-12-30', 'Non-Aktif', NULL, '0744 0698 177', 'Perempuan', 'Subulussalam', '1981-06-08', 'Ki. Madrasah No. 414, Ambon 22570, DIY', '2025-01-20 18:59:37', '2025-01-20 18:59:37'),
(24, 'Jon Stewart Doe', '123', 'test@example.us', 2, 'asd', '2025-01-22', 'Aktif', 'avatars/sS8pFiCJ9BKJBR5yG1a3yOkbbCMBzRW15pdZGEpV.jpg', '6019521325', 'Perempuan', NULL, NULL, NULL, '2025-01-21 20:06:40', '2025-01-21 20:39:18');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('d8hU3TFp6rjEufj5aSkCGr3Aeot13HYKqe1BXAx7', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36 OPR/114.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoidGJocUdtTVJDd083ZXlWT0tUVUltbVVWYk5kMGUwZExyaVFyd255byI7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozMToiaHR0cDovL3NpbXBlZy50ZXN0OjgwODAvcGVnYXdhaSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1737684662),
('MioMnJeEZGEGqvnjm3ox7FraGT1Uk703j0L1aZRU', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36 OPR/114.0.0.0', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiT0tVSFptTmlnVjlaSTI2MnVnUmZ2R3pDMjVCT1p5cmJHN1VUcTZ3ZCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1737682183),
('MnlIUgHZkjXIXWc6ELvJmY0rtDuKwGLzhqDTJftc', 1, '127.0.0.1', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Mobile Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiMzU1SDdxWk5sM2lrTVpsNE1TYmlBd29wa3l0U2dtMGd1YkY2S0NNWCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly9zaW1wZWcudGVzdDo4MDgwL2N1dGkiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1737601822),
('NeWqpyepypMZ1nPZ4VcrLcCpgr8rS5wmGLC9fDi7', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoibVFBSU9MSlVFb29IeHQwVjV0RzZReVRDS1RpdWhNbnN4R2dGZkhIYiI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyNjoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2N1dGkiO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyNzoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1737596113),
('RtxDYdhxW1dvyhdnPvUAIUk8TTE44sTr2cDx0IGO', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiMHg5SkpKRGI2OWp3WHRsWnJmZ3Z3dDNSMEVsM2dQaUxGOE1iWEhrQiI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyNjoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2N1dGkiO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyNzoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1737596052),
('VMNhI9rAIXClNECGhV3aFJQ8tbFT6UqQztoqZNP7', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36 OPR/114.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiamNMM2R1enI5STNYanU4ZTZ5amVtUkxLaGhCaUFuNHl0aE9PeWZYeiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly9zaW1wZWcudGVzdDo4MDgwL2Rhc2hib2FyZCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1737704645),
('YnJAYInGncdYupR3aPkFFZQKn58uPeWLTqHicS8m', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiNzBqT1ViYThZRE9oOXdZYU1CaTJWdEJ3dEdGbUZ6UDhuUkpTbzM0UCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyNjoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2N1dGkiO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyNzoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1737595996);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `is_admin`, `created_at`, `updated_at`) VALUES
(1, 'Admin User', 'admin@example.com', NULL, '$2y$12$6sj.bqfFSUKje8zttebxlO3SjmRuJt10jJuRAA.72XqMjcfrXrkqS', 'dWFgooU4wdRj3cq9Mo5mb2pqq0wLwHMMKrbf16rzHfFZhRrvYO8lxgNjoZun', 0, '2025-01-20 18:59:37', '2025-01-20 18:59:37'),
(2, 'Test User', 'test@example.com', '2025-01-20 18:59:37', '$2y$12$CTunL3OVr.Qy41lmar/GL.E652UBvsX83ByrM/.R8258ichxYdrha', '7cRhx8rrsK', 0, '2025-01-20 18:59:38', '2025-01-20 18:59:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bidangs`
--
ALTER TABLE `bidangs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `bidangs_kode_bidang_unique` (`kode_bidang`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cuti`
--
ALTER TABLE `cuti`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cuti_pegawai_id_foreign` (`pegawai_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pegawais`
--
ALTER TABLE `pegawais`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pegawais_nip_unique` (`nip`),
  ADD UNIQUE KEY `pegawais_email_unique` (`email`),
  ADD KEY `pegawais_bidang_id_foreign` (`bidang_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bidangs`
--
ALTER TABLE `bidangs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cuti`
--
ALTER TABLE `cuti`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pegawais`
--
ALTER TABLE `pegawais`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cuti`
--
ALTER TABLE `cuti`
  ADD CONSTRAINT `cuti_pegawai_id_foreign` FOREIGN KEY (`pegawai_id`) REFERENCES `pegawais` (`id`);

--
-- Constraints for table `pegawais`
--
ALTER TABLE `pegawais`
  ADD CONSTRAINT `pegawais_bidang_id_foreign` FOREIGN KEY (`bidang_id`) REFERENCES `bidangs` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

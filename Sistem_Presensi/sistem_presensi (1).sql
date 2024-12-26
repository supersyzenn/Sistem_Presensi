-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 24, 2024 at 05:03 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistem_presensi`
--

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
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id`, `user_id`, `nip`, `jenis_kelamin`, `foto`, `created_at`, `updated_at`) VALUES
(9, 14, '548748650110052', 'Laki-laki', NULL, '2024-12-13 10:08:37', '2024-12-13 10:08:37'),
(10, 15, '1111111111111111111', 'Laki-laki', NULL, '2024-12-13 10:09:39', '2024-12-13 10:09:39'),
(11, 16, '22222222222222222', 'Perempuan', NULL, '2024-12-13 10:10:24', '2024-12-13 10:19:20'),
(12, 17, '3333333333333333', 'Laki-laki', NULL, '2024-12-13 10:11:21', '2024-12-13 10:11:21'),
(13, 18, '5449766666130092', 'Perempuan', NULL, '2024-12-13 10:12:43', '2024-12-13 10:12:43'),
(14, 19, '1840745657300000', 'Perempuan', NULL, '2024-12-13 10:14:25', '2024-12-13 10:14:25'),
(15, 20, '5956769670130092', 'Laki-laki', NULL, '2024-12-13 10:15:55', '2024-12-13 10:15:55'),
(16, 21, '2038773674130063', 'Laki-laki', NULL, '2024-12-13 10:17:09', '2024-12-13 10:17:09'),
(17, 22, '5133764665110043', 'Laki-laki', NULL, '2024-12-13 10:17:56', '2024-12-13 10:17:56'),
(18, 23, '444444444444444', 'Perempuan', NULL, '2024-12-13 10:19:10', '2024-12-13 10:19:10'),
(19, 25, '55555555555555', 'Laki-laki', NULL, '2024-12-13 10:21:31', '2024-12-13 10:21:31'),
(20, 26, '635774675230042', 'Perempuan', NULL, '2024-12-13 10:22:55', '2024-12-13 10:22:55');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id` bigint UNSIGNED NOT NULL,
  `guru_id` bigint UNSIGNED NOT NULL,
  `mapel_id` bigint UNSIGNED NOT NULL,
  `kelas_id` bigint UNSIGNED NOT NULL,
  `tahun_ajaran_id` bigint UNSIGNED NOT NULL,
  `hari` enum('Senin','Selasa','Rabu','Kamis','Jumat','Sabtu') COLLATE utf8mb4_unicode_ci NOT NULL,
  `jam` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jam_ke` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id`, `guru_id`, `mapel_id`, `kelas_id`, `tahun_ajaran_id`, `hari`, `jam`, `jam_ke`, `created_at`, `updated_at`) VALUES
(16, 17, 2, 3, 1, 'Sabtu', '07:00-07:45', 1, '2024-12-13 10:31:53', '2024-12-13 10:31:53'),
(17, 17, 3, 2, 1, 'Jumat', '07:00-07:45', 1, '2024-12-13 10:36:05', '2024-12-13 10:36:05'),
(18, 13, 2, 1, 1, 'Rabu', '07:00-07:45', 1, '2024-12-13 10:38:13', '2024-12-13 10:38:13'),
(19, 13, 2, 2, 1, 'Senin', '07:45-08:30', 2, '2024-12-13 10:38:55', '2024-12-13 10:38:55'),
(20, 13, 3, 3, 1, 'Selasa', '07:00-07:45', 1, '2024-12-13 10:39:56', '2024-12-13 10:39:56'),
(21, 13, 4, 3, 1, 'Kamis', '07:00-07:45', 1, '2024-12-13 10:40:48', '2024-12-13 10:40:48'),
(22, 9, 1, 1, 1, 'Senin', '07:00-07:45', 1, '2024-12-13 10:42:02', '2024-12-13 10:42:20'),
(23, 9, 1, 2, 1, 'Selasa', '08:30-09:15', 3, '2024-12-13 10:43:01', '2024-12-13 10:43:01'),
(24, 9, 1, 3, 1, 'Rabu', '09:15-10:00', 4, '2024-12-13 10:43:30', '2024-12-13 10:43:30'),
(25, 15, 5, 2, 1, 'Jumat', '07:00-07:45', 1, '2024-12-13 10:44:33', '2024-12-13 10:44:33'),
(26, 15, 5, 3, 1, 'Jumat', '07:45-08:30', 2, '2024-12-13 10:44:55', '2024-12-13 10:44:55'),
(27, 15, 6, 1, 1, 'Sabtu', '07:00-07:45', 1, '2024-12-13 10:45:37', '2024-12-13 10:45:37'),
(28, 15, 7, 2, 1, 'Jumat', '08:30-09:15', 3, '2024-12-13 10:46:19', '2024-12-13 10:46:19'),
(29, 20, 8, 2, 1, 'Senin', '10:15-11:00', 5, '2024-12-13 10:48:52', '2024-12-13 10:48:52'),
(30, 20, 8, 3, 1, 'Selasa', '11:00-11:45', 6, '2024-12-13 10:49:22', '2024-12-13 10:49:22'),
(31, 20, 9, 1, 1, 'Kamis', '09:15-10:00', 4, '2024-12-13 10:50:18', '2024-12-13 10:50:18'),
(32, 20, 10, 1, 1, 'Kamis', '10:15-11:00', 5, '2024-12-13 10:50:49', '2024-12-13 10:50:49');

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
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `nama_kelas`, `created_at`, `updated_at`) VALUES
(1, 'X', '2024-12-05 02:53:11', '2024-12-05 02:53:11'),
(2, 'XI', '2024-12-05 02:53:11', '2024-12-05 02:53:11'),
(3, 'XII', '2024-12-05 02:53:11', '2024-12-05 02:53:11');

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `id` bigint UNSIGNED NOT NULL,
  `kode_mapel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_mapel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`id`, `kode_mapel`, `nama_mapel`, `created_at`, `updated_at`) VALUES
(1, '001', 'Matematika', '2024-12-05 02:53:11', '2024-12-05 04:02:48'),
(2, '002', 'Bahasa Indonesia', '2024-12-05 02:53:11', '2024-12-05 04:03:50'),
(3, '003', 'Humas Keprotokolan', '2024-12-05 02:53:11', '2024-12-13 08:23:31'),
(4, '004', 'Kewirausahaan', '2024-12-05 02:53:11', '2024-12-13 08:24:55'),
(5, '005', 'Otomatisasi Tata Kelola Sarana Dan Prasarana', '2024-12-05 02:53:11', '2024-12-13 08:25:49'),
(6, '006', 'Pendidikan Jasmani, Olahraga & Kesehatan', '2024-12-05 02:53:11', '2024-12-13 08:26:24'),
(7, '007', 'Otomatisasi Tata Kelola Kepegawaian', '2024-12-05 02:53:11', '2024-12-13 08:26:55'),
(8, '008', 'Otomatisasi Tata Kelola Keuangan', '2024-12-05 02:53:11', '2024-12-13 08:27:33'),
(9, '009', 'Administrasi Umum', '2024-12-05 02:53:11', '2024-12-13 08:27:55'),
(10, '010', 'Kearsipan', '2024-12-05 02:53:11', '2024-12-13 08:28:11'),
(12, '011', 'Pendidikan Agama Dan Budi Pekerti', '2024-12-13 08:28:52', '2024-12-13 08:28:52'),
(13, '012', 'Sejarah Indonesia', '2024-12-13 08:29:08', '2024-12-13 08:29:08'),
(14, '013', 'Bahasa Inggris Dan Bahasa Asing Lainnya', '2024-12-13 08:29:34', '2024-12-13 08:29:34'),
(15, '014', 'Seni Budaya', '2024-12-13 08:29:46', '2024-12-13 08:29:46'),
(16, '015', 'Bahasa Sunda', '2024-12-13 08:31:14', '2024-12-13 08:31:14'),
(17, '016', 'Simulasi Digital', '2024-12-13 08:31:39', '2024-12-13 08:31:39'),
(18, '017', 'TP', '2024-12-13 08:32:22', '2024-12-13 08:32:50'),
(19, '018', 'Pendidikan Kewarganegaraan', '2024-12-13 08:33:31', '2024-12-13 08:33:31'),
(20, '019', 'Ilmu Pengetahuan Alam', '2024-12-13 08:33:56', '2024-12-13 08:33:56'),
(21, '020', 'Ekonomi Bisnis', '2024-12-13 08:34:20', '2024-12-13 08:34:20'),
(22, '021', 'Korespondensi', '2024-12-13 08:34:41', '2024-12-13 08:34:41');

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
(4, '2024_11_26_155125_add_username_to_users_table', 1),
(5, '2024_11_26_213245_add_role_to_users_table', 1),
(6, '2024_11_27_043324_create_user_admin_table', 1),
(7, '2024_11_27_052408_create_guru_table', 1),
(8, '2024_11_27_094135_create_kelas_table', 1),
(9, '2024_11_27_094135_create_mapel_table', 1),
(10, '2024_11_27_094135_create_semester_table', 1),
(11, '2024_11_27_094135_create_tahun_ajaran_table', 1),
(12, '2024_11_27_094136_create_jadwal_table', 1),
(13, '2024_11_27_094136_create_siswa_table', 1),
(14, '2024_11_27_094136_create_tendiks_table', 1),
(15, '2024_11_29_042526_create_presensis_table', 1),
(16, '2024_11_29_042527_create_presensi_details_table', 1),
(17, '2024_12_14_064421_create_pertemuans_table', 2);

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
-- Table structure for table `pertemuans`
--

CREATE TABLE `pertemuans` (
  `id` bigint UNSIGNED NOT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pertemuans`
--

INSERT INTO `pertemuans` (`id`, `number`, `created_at`, `updated_at`) VALUES
(1, 'Pertemuan 1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `presensis`
--

CREATE TABLE `presensis` (
  `id` bigint UNSIGNED NOT NULL,
  `jadwal_id` bigint UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `pertemuan` int NOT NULL,
  `materi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `presensis`
--

INSERT INTO `presensis` (`id`, `jadwal_id`, `tanggal`, `pertemuan`, `materi`, `created_at`, `updated_at`) VALUES
(1, 25, '2024-12-13', 1, 'Sarana', '2024-12-13 10:55:11', '2024-12-13 10:55:11'),
(2, 16, '2024-12-14', 1, '1', '2024-12-13 23:20:25', '2024-12-13 23:20:25'),
(3, 16, '2024-12-14', 2, '2', '2024-12-13 23:21:55', '2024-12-13 23:21:55'),
(4, 17, '2024-12-14', 1, '1', '2024-12-13 23:26:25', '2024-12-13 23:26:25');

-- --------------------------------------------------------

--
-- Table structure for table `presensi_details`
--

CREATE TABLE `presensi_details` (
  `id` bigint UNSIGNED NOT NULL,
  `presensi_id` bigint UNSIGNED NOT NULL,
  `siswa_id` bigint UNSIGNED NOT NULL,
  `status` enum('hadir','sakit','izin','alpa') COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `presensi_details`
--

INSERT INTO `presensi_details` (`id`, `presensi_id`, `siswa_id`, `status`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 1, 28, 'hadir', NULL, '2024-12-13 10:55:11', '2024-12-13 10:55:59'),
(2, 1, 11, 'hadir', NULL, '2024-12-13 10:55:11', '2024-12-13 10:55:59'),
(3, 1, 24, 'hadir', NULL, '2024-12-13 10:55:11', '2024-12-13 10:55:59'),
(4, 1, 27, 'sakit', 'Sakit', '2024-12-13 10:55:11', '2024-12-13 10:55:59'),
(5, 1, 30, 'hadir', NULL, '2024-12-13 10:55:11', '2024-12-13 10:55:59'),
(6, 1, 3, 'hadir', NULL, '2024-12-13 10:55:11', '2024-12-13 10:55:59'),
(7, 1, 23, 'hadir', NULL, '2024-12-13 10:55:11', '2024-12-13 10:55:59'),
(8, 1, 26, 'hadir', NULL, '2024-12-13 10:55:11', '2024-12-13 10:55:59'),
(9, 1, 4, 'hadir', NULL, '2024-12-13 10:55:11', '2024-12-13 10:55:59'),
(10, 1, 12, 'izin', 'Izin', '2024-12-13 10:55:11', '2024-12-13 10:55:59'),
(11, 1, 25, 'hadir', NULL, '2024-12-13 10:55:11', '2024-12-13 10:55:59'),
(12, 1, 29, 'hadir', NULL, '2024-12-13 10:55:11', '2024-12-13 10:55:59'),
(13, 2, 35, 'hadir', NULL, '2024-12-13 23:20:25', '2024-12-13 23:20:25'),
(14, 2, 31, 'hadir', NULL, '2024-12-13 23:20:25', '2024-12-13 23:20:25'),
(15, 2, 37, 'hadir', NULL, '2024-12-13 23:20:25', '2024-12-13 23:20:25'),
(16, 2, 33, 'hadir', NULL, '2024-12-13 23:20:25', '2024-12-13 23:20:25'),
(17, 2, 14, 'hadir', NULL, '2024-12-13 23:20:25', '2024-12-13 23:20:25'),
(18, 2, 32, 'hadir', NULL, '2024-12-13 23:20:25', '2024-12-13 23:20:25'),
(19, 2, 38, 'hadir', NULL, '2024-12-13 23:20:25', '2024-12-13 23:20:25'),
(20, 2, 5, 'hadir', NULL, '2024-12-13 23:20:25', '2024-12-13 23:20:25'),
(21, 2, 36, 'hadir', NULL, '2024-12-13 23:20:25', '2024-12-13 23:20:25'),
(22, 2, 34, 'alpa', 'Sakit', '2024-12-13 23:20:25', '2024-12-13 23:20:25'),
(23, 2, 6, 'hadir', NULL, '2024-12-13 23:20:25', '2024-12-13 23:20:25'),
(24, 2, 13, 'hadir', NULL, '2024-12-13 23:20:25', '2024-12-13 23:20:25'),
(25, 3, 35, 'hadir', NULL, '2024-12-13 23:21:55', '2024-12-13 23:21:55'),
(26, 3, 31, 'hadir', NULL, '2024-12-13 23:21:55', '2024-12-13 23:21:55'),
(27, 3, 37, 'hadir', NULL, '2024-12-13 23:21:55', '2024-12-13 23:21:55'),
(28, 3, 33, 'hadir', NULL, '2024-12-13 23:21:55', '2024-12-13 23:21:55'),
(29, 3, 14, 'hadir', NULL, '2024-12-13 23:21:55', '2024-12-13 23:21:55'),
(30, 3, 32, 'hadir', NULL, '2024-12-13 23:21:55', '2024-12-13 23:21:55'),
(31, 3, 38, 'hadir', NULL, '2024-12-13 23:21:55', '2024-12-13 23:21:55'),
(32, 3, 5, 'hadir', NULL, '2024-12-13 23:21:55', '2024-12-13 23:21:55'),
(33, 3, 36, 'hadir', NULL, '2024-12-13 23:21:55', '2024-12-13 23:21:55'),
(34, 3, 34, 'hadir', NULL, '2024-12-13 23:21:55', '2024-12-13 23:21:55'),
(35, 3, 6, 'hadir', NULL, '2024-12-13 23:21:55', '2024-12-13 23:21:55'),
(36, 3, 13, 'hadir', NULL, '2024-12-13 23:21:55', '2024-12-13 23:21:55'),
(37, 4, 28, 'hadir', NULL, '2024-12-13 23:26:25', '2024-12-13 23:26:25'),
(38, 4, 11, 'hadir', NULL, '2024-12-13 23:26:25', '2024-12-13 23:26:25'),
(39, 4, 24, 'hadir', NULL, '2024-12-13 23:26:25', '2024-12-13 23:26:25'),
(40, 4, 27, 'hadir', NULL, '2024-12-13 23:26:25', '2024-12-13 23:26:25'),
(41, 4, 30, 'hadir', NULL, '2024-12-13 23:26:25', '2024-12-13 23:26:25'),
(42, 4, 3, 'hadir', NULL, '2024-12-13 23:26:25', '2024-12-13 23:26:25'),
(43, 4, 23, 'hadir', NULL, '2024-12-13 23:26:25', '2024-12-13 23:26:25'),
(44, 4, 26, 'hadir', NULL, '2024-12-13 23:26:25', '2024-12-13 23:26:25'),
(45, 4, 4, 'hadir', NULL, '2024-12-13 23:26:25', '2024-12-13 23:26:25'),
(46, 4, 12, 'hadir', NULL, '2024-12-13 23:26:25', '2024-12-13 23:26:25'),
(47, 4, 25, 'hadir', NULL, '2024-12-13 23:26:25', '2024-12-13 23:26:25'),
(48, 4, 29, 'hadir', NULL, '2024-12-13 23:26:25', '2024-12-13 23:26:25');

-- --------------------------------------------------------

--
-- Table structure for table `semesters`
--

CREATE TABLE `semesters` (
  `id` bigint UNSIGNED NOT NULL,
  `semester` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `semesters`
--

INSERT INTO `semesters` (`id`, `semester`, `created_at`, `updated_at`) VALUES
(1, 'Genap', '2024-12-05 02:53:11', '2024-12-05 02:53:11'),
(2, 'Ganjil', '2024-12-05 02:53:11', '2024-12-05 02:53:11');

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
('aaUH6HUxLMUpC7JhFaFSoCAuas0l7CbhE72niFUq', 27, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiVk10SHZhb1R2UENOdlYzbVhlb2lKSHUwMUw0WXd1Q0dmT0pFYjZ5SCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9zaXN3YSI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI3O30=', 1734164116),
('Ssnp4XBLzJN0D2Si2kWKDVcL9OQmRTxICrlY6efC', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiRWZCVUw0MDJMTURHR01wd25yaUo1MEg0M3JzVkdlVTZNVnBpcU5zdiI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo0NToiaHR0cDovLzEyNy4wLjAuMTo4MDAwL3VzZXIvcHJlc2Vuc2k/amFkd2FsPTI2Ijt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC91c2VyL3ByZXNlbnNpP2phZHdhbD0yNiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1734156718),
('udVAhlv2Ae0Amg89PXfSfaJlEmBOxuzyX9kmBJ8l', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUFA3TE9LS3k4MUsyamdaV1Fja2dxclRTU3lnN013RTBFRnNvSVA1MCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1735015697);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` bigint UNSIGNED NOT NULL,
  `kelas_id` bigint UNSIGNED NOT NULL,
  `nis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_siswa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_angkatan` year NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `kelas_id`, `nis`, `nama_siswa`, `jenis_kelamin`, `tahun_angkatan`, `foto`, `created_at`, `updated_at`) VALUES
(1, 1, '2022001', 'Syahrul Anwar', 'Laki-laki', '2022', NULL, '2024-12-05 02:53:11', '2024-12-05 02:53:11'),
(2, 1, '2022002', 'Indah Permata', 'Perempuan', '2022', NULL, '2024-12-05 02:53:11', '2024-12-05 02:53:11'),
(3, 2, '2022003', 'Dwi Saputra', 'Laki-laki', '2022', NULL, '2024-12-05 02:53:11', '2024-12-05 02:53:11'),
(4, 2, '2022004', 'Putri Anggraini', 'Perempuan', '2022', NULL, '2024-12-05 02:53:11', '2024-12-05 02:53:11'),
(5, 3, '2022005', 'Rahmat Hidayat', 'Laki-laki', '2022', NULL, '2024-12-05 02:53:11', '2024-12-05 02:53:11'),
(6, 3, '2022006', 'Sri Hartini', 'Perempuan', '2022', NULL, '2024-12-05 02:53:11', '2024-12-05 02:53:11'),
(7, 1, '2023001', 'Ali Hasan', 'Laki-laki', '2023', NULL, '2024-12-05 02:53:11', '2024-12-05 02:53:11'),
(8, 1, '2023002', 'Aisyah Putri', 'Perempuan', '2023', NULL, '2024-12-05 02:53:11', '2024-12-05 02:53:11'),
(9, 1, '2023003', 'Fajar Ramadhan', 'Laki-laki', '2023', NULL, '2024-12-05 02:53:11', '2024-12-05 02:53:11'),
(10, 1, '2023004', 'Reni Kusuma', 'Perempuan', '2023', NULL, '2024-12-05 02:53:11', '2024-12-05 02:53:11'),
(11, 2, '2023005', 'Bagus Pratama', 'Laki-laki', '2023', NULL, '2024-12-05 02:53:11', '2024-12-05 02:53:11'),
(12, 2, '2023006', 'Rina Amalia', 'Perempuan', '2023', NULL, '2024-12-05 02:53:11', '2024-12-05 02:53:11'),
(13, 3, '2023007', 'Zaki Maulana', 'Laki-laki', '2023', NULL, '2024-12-05 02:53:11', '2024-12-05 02:53:11'),
(14, 3, '2023008', 'Lestari Dewi', 'Perempuan', '2023', NULL, '2024-12-05 02:53:11', '2024-12-05 02:53:11'),
(15, 1, '2024001', 'Ahmad Rizki', 'Laki-laki', '2024', NULL, '2024-12-05 02:53:13', '2024-12-05 02:53:13'),
(16, 1, '2024002', 'Siti Nur Aini', 'Perempuan', '2024', NULL, '2024-12-05 02:53:13', '2024-12-05 02:53:13'),
(17, 1, '2024003', 'Rudi Hermawan', 'Laki-laki', '2024', NULL, '2024-12-05 02:53:13', '2024-12-05 02:53:13'),
(18, 1, '2024004', 'Nina Marlina', 'Perempuan', '2024', NULL, '2024-12-05 02:53:13', '2024-12-05 02:53:13'),
(19, 1, '2024005', 'Dodi Pratama', 'Laki-laki', '2024', NULL, '2024-12-05 02:53:13', '2024-12-05 02:53:13'),
(20, 1, '2024006', 'Rina Wati', 'Perempuan', '2024', NULL, '2024-12-05 02:53:13', '2024-12-05 02:53:13'),
(21, 1, '2024007', 'Farhan Abdul', 'Laki-laki', '2024', NULL, '2024-12-05 02:53:13', '2024-12-05 02:53:13'),
(22, 1, '2024008', 'Maya Sari', 'Perempuan', '2024', NULL, '2024-12-05 02:53:13', '2024-12-05 02:53:13'),
(23, 2, '2024009', 'Muhammad Fariz', 'Laki-laki', '2024', NULL, '2024-12-05 02:53:13', '2024-12-05 02:53:13'),
(24, 2, '2024010', 'Dewi Sartika', 'Perempuan', '2024', NULL, '2024-12-05 02:53:13', '2024-12-05 02:53:13'),
(25, 2, '2024011', 'Rizal Ibrahim', 'Laki-laki', '2024', NULL, '2024-12-05 02:53:13', '2024-12-05 02:53:13'),
(26, 2, '2024012', 'Putri Andini', 'Perempuan', '2024', NULL, '2024-12-05 02:53:13', '2024-12-05 02:53:13'),
(27, 2, '2024013', 'Dimas Prakoso', 'Laki-laki', '2024', NULL, '2024-12-05 02:53:13', '2024-12-05 02:53:13'),
(28, 2, '2024014', 'Anisa Rahma', 'Perempuan', '2024', NULL, '2024-12-05 02:53:13', '2024-12-05 02:53:13'),
(29, 2, '2024015', 'Yoga Pratama', 'Laki-laki', '2024', NULL, '2024-12-05 02:53:13', '2024-12-05 02:53:13'),
(30, 2, '2024016', 'Dina Fitria', 'Perempuan', '2024', NULL, '2024-12-05 02:53:13', '2024-12-05 02:53:13'),
(31, 3, '2024017', 'Budi Santoso', 'Laki-laki', '2024', NULL, '2024-12-05 02:53:13', '2024-12-05 02:53:13'),
(32, 3, '2024018', 'Linda Permata', 'Perempuan', '2024', NULL, '2024-12-05 02:53:13', '2024-12-05 02:53:13'),
(33, 3, '2024019', 'Irfan Hakim', 'Laki-laki', '2024', NULL, '2024-12-05 02:53:13', '2024-12-05 02:53:13'),
(34, 3, '2024020', 'Siska Dewi', 'Perempuan', '2024', NULL, '2024-12-05 02:53:13', '2024-12-05 02:53:13'),
(35, 3, '2024021', 'Adi Nugroho', 'Laki-laki', '2024', NULL, '2024-12-05 02:53:13', '2024-12-05 02:53:13'),
(36, 3, '2024022', 'Rika Susanti', 'Perempuan', '2024', NULL, '2024-12-05 02:53:13', '2024-12-05 02:53:13'),
(37, 3, '2024023', 'Fadli Rahman', 'Laki-laki', '2024', NULL, '2024-12-05 02:53:13', '2024-12-05 02:53:13'),
(38, 3, '2024024', 'Nadia Putri', 'Perempuan', '2024', NULL, '2024-12-05 02:53:13', '2024-12-05 02:53:13');

-- --------------------------------------------------------

--
-- Table structure for table `tahun_ajaran`
--

CREATE TABLE `tahun_ajaran` (
  `id` bigint UNSIGNED NOT NULL,
  `tahun_ajar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tahun_ajaran`
--

INSERT INTO `tahun_ajaran` (`id`, `tahun_ajar`, `created_at`, `updated_at`) VALUES
(1, '2023/2024', '2024-12-05 02:53:11', '2024-12-05 02:53:11'),
(2, '2024/2025', '2024-12-14 01:13:39', '2024-12-14 01:13:39'),
(3, '2025/2026', '2024-12-14 01:13:49', '2024-12-14 01:13:49');

-- --------------------------------------------------------

--
-- Table structure for table `tendiks`
--

CREATE TABLE `tendiks` (
  `id` bigint UNSIGNED NOT NULL,
  `nuptk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_tendik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_kepegawaian` enum('PNS','Non-PNS') COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tendiks`
--

INSERT INTO `tendiks` (`id`, `nuptk`, `nama_tendik`, `jenis_kelamin`, `status_kepegawaian`, `foto`, `created_at`, `updated_at`) VALUES
(1, '1234567890123456', 'Ahmad Staff TU', 'Laki-laki', 'PNS', NULL, '2024-12-05 02:53:14', '2024-12-05 02:53:14'),
(2, '6543210987654321', 'Siti Staff Perpustakaan', 'Perempuan', 'Non-PNS', NULL, '2024-12-05 02:53:14', '2024-12-05 02:53:14'),
(3, '1227050011', 'Ahmad Juaeni Yunus', 'Laki-laki', 'PNS', '1734163824.jpg', '2024-12-14 01:10:24', '2024-12-14 01:10:24');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','user') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrator', 'admin@example.com', 'admin', NULL, '$2y$12$PzEGxEeQsiK/s5BHHcD.XO5pZ/AObAS9o6V1vQWM94jjODvaQ0C1m', NULL, '2024-12-05 02:53:07', '2024-12-05 02:53:07'),
(2, 'admin2', 'Admin Kedua', 'admin2@example.com', 'admin', NULL, '$2y$12$niXy8am.AO0V3hxnnmup9.ph.3WNLX439Ekx79j/qeqh1cHYvM.rG', NULL, '2024-12-05 02:53:07', '2024-12-05 02:53:07'),
(14, 'Agus', 'AGUS DARMAWAN, S.Pd.I', 'agusdarmawan@teacher.ac.id', 'user', NULL, '$2y$12$UCjk7i8.p0Ch5QZ3mA1h0OYD0aS3CNGLrr7aLNmVOweKpmQ7qzriW', NULL, '2024-12-13 10:08:37', '2024-12-13 10:08:37'),
(15, 'Dede', 'DEDE NURYANA,  S.Pd', 'dedenuryana@teacher.ac.id', 'user', NULL, '$2y$12$PQSyLVFWeai5YQdHjZUXk.XKZrH5AtODNWeqJ1RsQFJVifQ5msm2W', NULL, '2024-12-13 10:09:38', '2024-12-13 10:09:38'),
(16, 'Diana', 'DIANA FUNGKI,  S.Pd', 'dianafungki@teacher.ac.id', 'user', NULL, '$2y$12$8Umr4YA.sQ3VBo8yjrucKO5uVX3xF35ct9C8hTRhyAetZc1vBZeJK', NULL, '2024-12-13 10:10:24', '2024-12-13 10:10:24'),
(17, 'Eki', 'EKI NOPIANDI,  S.Pd.I', 'ekinopiandi@teacher.ac.id', 'user', NULL, '$2y$12$4AYuoNgWnYU/U3wavqA0/ePzmH9m.LEfsXOidV0fEwxjzx0.HkFBa', NULL, '2024-12-13 10:11:21', '2024-12-13 10:11:21'),
(18, 'Fiere', 'Fiere Dara Gemilang, S.Pd', 'fieregemilang@teacher.ac.id', 'user', NULL, '$2y$12$OVRnuSV.k9wzRiRqvk8QHOIz.X0NB0vyXho0Cjlphwk0TSnd5P8Y.', NULL, '2024-12-13 10:12:43', '2024-12-13 10:12:43'),
(19, 'Humaidah', 'Humaidah', 'humaidahhumaidah@teacher.ac.id', 'user', NULL, '$2y$12$6Gn3BWLM4nDyB71BKPoQpebif/ZpRuErxaAl1AUpCWpf/pOrLHAJK', NULL, '2024-12-13 10:14:25', '2024-12-13 10:14:25'),
(20, 'Indra', 'Indra Lesmana,  S.Pd', 'indralesmana@teacher.ac.id', 'user', NULL, '$2y$12$lovihWoTUqacChrD1sCPaeEy.Qn4TbmRf10QrljW/RQE7WPX9/FVu', NULL, '2024-12-13 10:15:55', '2024-12-13 10:15:55'),
(21, 'Iyad', 'Iyad Suryadi, S.Kom', 'iyadsuryadi@teacher.ac.id', 'user', NULL, '$2y$12$ywyjWET4IAp2bQFq.hdTPudDdwnefoIOIhJIEO4QAVG1Hedy12x.q', NULL, '2024-12-13 10:17:09', '2024-12-13 10:17:09'),
(22, 'Jupriadi', 'Jupriadi,  S.Pd', 'jupiardijupriadi@teacher.ac.id', 'user', NULL, '$2y$12$7RCD9mkD7bCxek9pxis21ObY27oDZs.XAZrY71G6jJO7LKEinfSqa', NULL, '2024-12-13 10:17:56', '2024-12-13 10:17:56'),
(23, 'Vanessa', 'VANESSA DWINANDA, S.Ap', 'vanessadwinanda@teacher.ac.id', 'user', NULL, '$2y$12$xLBv5IgdEljWlepZApNA0.cLMC.KfJ257uIGxLZPx8bTCsaq6YxTu', NULL, '2024-12-13 10:19:10', '2024-12-13 10:19:10'),
(25, 'Panca', 'Panca Rulyana, S.Pd', 'pancarulyana@tecaher.ac.id', 'user', NULL, '$2y$12$ZFYJd24SPOUBtM6WVglnd.qcnAlhncCdgqdCYTyDh4fKOGiXwkVTa', NULL, '2024-12-13 10:21:31', '2024-12-13 10:21:31'),
(26, 'Yanah', 'Yanah Pitriah,  S.Pd', 'yanahpitriah@teacher.ac.id', 'user', NULL, '$2y$12$8h3OPihXmHGaoIYlVbIltOsCyKzFKvuLQwdFvImFn7qEpBFWcHaDW', NULL, '2024-12-13 10:22:55', '2024-12-13 10:22:55'),
(27, '1227050011', 'Ahmad Juaeni Yunus', 'ahmadyunus200@gmail.com', 'admin', NULL, '$2y$12$XAdX8mHStq1K26bPlt.b9.kaW3UFrjALSwTrixc0L5VUVDAiGCjzS', NULL, '2024-12-13 10:25:05', '2024-12-13 10:25:05');

-- --------------------------------------------------------

--
-- Table structure for table `user_admin`
--

CREATE TABLE `user_admin` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_admin`
--

INSERT INTO `user_admin` (`id`, `user_id`, `jenis_kelamin`, `jabatan`, `foto`, `created_at`, `updated_at`) VALUES
(1, 1, 'Laki-laki', 'Admin', NULL, '2024-12-05 02:53:11', '2024-12-05 02:53:11'),
(2, 2, 'Perempuan', 'Admin', NULL, '2024-12-05 02:53:11', '2024-12-05 02:53:11'),
(7, 27, 'Laki-laki', 'Admin', '1734110704.jpg', '2024-12-13 10:25:05', '2024-12-13 10:25:05');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `guru_nip_unique` (`nip`),
  ADD KEY `guru_user_id_foreign` (`user_id`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jadwal_guru_id_foreign` (`guru_id`),
  ADD KEY `jadwal_mapel_id_foreign` (`mapel_id`),
  ADD KEY `jadwal_kelas_id_foreign` (`kelas_id`),
  ADD KEY `jadwal_tahun_ajaran_id_foreign` (`tahun_ajaran_id`);

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
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mapel_kode_mapel_unique` (`kode_mapel`);

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
-- Indexes for table `pertemuans`
--
ALTER TABLE `pertemuans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pertemuans_number_unique` (`number`);

--
-- Indexes for table `presensis`
--
ALTER TABLE `presensis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `presensis_jadwal_id_foreign` (`jadwal_id`);

--
-- Indexes for table `presensi_details`
--
ALTER TABLE `presensi_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `presensi_details_presensi_id_foreign` (`presensi_id`),
  ADD KEY `presensi_details_siswa_id_foreign` (`siswa_id`);

--
-- Indexes for table `semesters`
--
ALTER TABLE `semesters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `siswa_nis_unique` (`nis`),
  ADD KEY `siswa_kelas_id_foreign` (`kelas_id`);

--
-- Indexes for table `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tendiks`
--
ALTER TABLE `tendiks`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tendiks_nuptk_unique` (`nuptk`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- Indexes for table `user_admin`
--
ALTER TABLE `user_admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_admin_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `pertemuans`
--
ALTER TABLE `pertemuans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `presensis`
--
ALTER TABLE `presensis`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `presensi_details`
--
ALTER TABLE `presensi_details`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `semesters`
--
ALTER TABLE `semesters`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tendiks`
--
ALTER TABLE `tendiks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `user_admin`
--
ALTER TABLE `user_admin`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `guru`
--
ALTER TABLE `guru`
  ADD CONSTRAINT `guru_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_guru_id_foreign` FOREIGN KEY (`guru_id`) REFERENCES `guru` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `jadwal_kelas_id_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `jadwal_mapel_id_foreign` FOREIGN KEY (`mapel_id`) REFERENCES `mapel` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `jadwal_tahun_ajaran_id_foreign` FOREIGN KEY (`tahun_ajaran_id`) REFERENCES `tahun_ajaran` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `presensis`
--
ALTER TABLE `presensis`
  ADD CONSTRAINT `presensis_jadwal_id_foreign` FOREIGN KEY (`jadwal_id`) REFERENCES `jadwal` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `presensi_details`
--
ALTER TABLE `presensi_details`
  ADD CONSTRAINT `presensi_details_presensi_id_foreign` FOREIGN KEY (`presensi_id`) REFERENCES `presensis` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `presensi_details_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `siswa` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_kelas_id_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_admin`
--
ALTER TABLE `user_admin`
  ADD CONSTRAINT `user_admin_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

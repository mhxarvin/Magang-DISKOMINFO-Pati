-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 25, 2018 at 12:58 PM
-- Server version: 5.7.21-0ubuntu0.16.04.1
-- PHP Version: 7.0.25-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perijinan`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8_unicode_ci NOT NULL,
  `queue` text COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `irt`
--

CREATE TABLE `irt` (
  `id` int(11) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `nama` varchar(110) NOT NULL,
  `alamat` text NOT NULL,
  `kode_pos` varchar(10) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `nama_pemilik` varchar(225) NOT NULL,
  `penanggung_jawab` varchar(225) NOT NULL,
  `no_sertifikat` varchar(110) DEFAULT NULL,
  `status` enum('menunggu','proses','terbit','ditolak') NOT NULL DEFAULT 'menunggu',
  `keterangan` text,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `irt`
--

INSERT INTO `irt` (`id`, `user_id`, `nama`, `alamat`, `kode_pos`, `no_telp`, `nama_pemilik`, `penanggung_jawab`, `no_sertifikat`, `status`, `keterangan`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(11, 41, 'Irnovi', 'Bawen', '123', '123', 'irnovi', 'irnovi', '45234532', 'menunggu', 'keterangan', 41, '2017-11-09 10:59:37', '2017-11-09 12:10:26', NULL),
(18, 41, 'Irnovi', 'baweb', '123', '123', 'irnovi', 'irnovi', NULL, 'proses', NULL, 41, '2017-11-09 12:10:10', '2017-11-10 15:12:32', NULL),
(19, 41, 'nama irt', 'alamat irt', 'kodepos', 'telp', 'irnovi', 'irnovi', '653456465436', 'menunggu', 'keterangan', 41, '2017-11-30 19:05:30', '2017-12-24 07:35:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `irt_barang`
--

CREATE TABLE `irt_barang` (
  `id` int(11) NOT NULL,
  `irt_id` int(110) DEFAULT NULL,
  `nama` varchar(110) DEFAULT NULL,
  `jenis_pangan` varchar(110) DEFAULT NULL,
  `jenis_kemasan` varchar(50) DEFAULT NULL,
  `netto` double DEFAULT NULL,
  `satuan` enum('g','mg','kg','l','ml','kl','other') DEFAULT 'g',
  `komposisi` text,
  `proses_produksi` text,
  `kode_produksi` varchar(110) DEFAULT NULL,
  `masa_simpan` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `irt_barang`
--

INSERT INTO `irt_barang` (`id`, `irt_id`, `nama`, `jenis_pangan`, `jenis_kemasan`, `netto`, `satuan`, `komposisi`, `proses_produksi`, `kode_produksi`, `masa_simpan`) VALUES
(2, 11, 'Cethul', 'makanan', 'standing poach', 250, 'g', 'ikan, tepung, gula', 'digoreng', '123', '2017-11-16'),
(8, 18, 'Cendol lezat', 'makanan', 'standing poach', 240, 'g', 'tepung', 'produksi proses', '123', '2017-11-23'),
(9, 19, 'Cethul', 'makanan', 'standing poach', 250, 'g', 'ikan, tepung', 'fdsadf', '123', '2017-12-25');

-- --------------------------------------------------------

--
-- Table structure for table `irt_surat`
--

CREATE TABLE `irt_surat` (
  `id` int(11) NOT NULL,
  `irt_id` int(11) UNSIGNED NOT NULL,
  `waktu_penyuluhan` datetime DEFAULT NULL,
  `tempat_penyuluhan` varchar(110) DEFAULT NULL,
  `keterangan_penyuluhan` text,
  `pkp_no_sertifikat` varchar(110) DEFAULT NULL,
  `pkp_tanggal_terbit` date DEFAULT NULL,
  `pkp_tanggal_mulai` date DEFAULT NULL,
  `pkp_tanggal_selesai` date DEFAULT NULL,
  `rek_no` varchar(110) DEFAULT NULL,
  `rek_kepada` varchar(110) DEFAULT NULL,
  `rek_perihal` varchar(110) DEFAULT NULL,
  `rek_isi` text,
  `rek_tembusan` text,
  `rek_keterangan` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `irt_surat`
--

INSERT INTO `irt_surat` (`id`, `irt_id`, `waktu_penyuluhan`, `tempat_penyuluhan`, `keterangan_penyuluhan`, `pkp_no_sertifikat`, `pkp_tanggal_terbit`, `pkp_tanggal_mulai`, `pkp_tanggal_selesai`, `rek_no`, `rek_kepada`, `rek_perihal`, `rek_isi`, `rek_tembusan`, `rek_keterangan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(6, 19, '1980-02-29 12:00:00', 'bawen', 'keterangan', 'no sertifikat', '2018-01-17', '2018-01-12', '2018-01-26', NULL, 'Saya', 'perihal', 'isi', 'tembusan', NULL, '2017-12-24 02:00:59', '2017-12-24 04:14:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id` int(11) NOT NULL,
  `nama` varchar(110) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id`, `nama`) VALUES
(1, 'Kepala Sub'),
(2, 'Operator');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan_lampiran`
--

CREATE TABLE `jabatan_lampiran` (
  `jabatan_id` int(11) UNSIGNED NOT NULL,
  `lampiran_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan_lampiran`
--

INSERT INTO `jabatan_lampiran` (`jabatan_id`, `lampiran_id`) VALUES
(1, 17),
(1, 20),
(2, 17),
(2, 18),
(2, 19),
(2, 20),
(1, 18);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


-- --------------------------------------------------------

--
-- Table structure for table `kantor`
--

CREATE TABLE `kantor` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `alamat` text,
  `kode_pos` int(11) DEFAULT NULL,
  `telepon` varchar(20) DEFAULT NULL,
  `fax` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `website` varchar(50) DEFAULT NULL,
  `nip_kepala` varchar(50) DEFAULT NULL,
  `nama_kepala` varchar(50) DEFAULT NULL,
  `pangkat_kepala` varchar(50) DEFAULT NULL,
  `is_selected` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kantor`
--

INSERT INTO `kantor` (`id`, `nama`, `alamat`, `kode_pos`, `telepon`, `fax`, `email`, `website`, `nip_kepala`, `nama_kepala`, `pangkat_kepala`, `is_selected`, `created_at`, `updated_at`) VALUES
(4, 'Kantor Dinas Kesehatan', 'kabupaten Pati', 123456, '081234567788', '081234567789', 'dinkes@patikab.go.id', 'dinkes.patikab.go.id', '19611106 198901 1 004', 'dr. H. EDI SULISTYONO, MM', 'Pembina Utama Muda', 0, '2017-12-30 07:31:08', '2017-12-30 08:15:37'),
(5, 'Kantor Dinas Kesehatan', 'fdsa', 123456, '5423542354', '54535', 'dinkes@patikab.go.id', 'dinkes.patikab.go.id', '19611106 198901 1 004', 'ASIKIN NOOR, S.H.', 'PENATA I', 1, '2017-12-30 07:38:47', '2017-12-30 08:17:13');

-- --------------------------------------------------------

--
-- Table structure for table `lampiran`
--

CREATE TABLE `lampiran` (
  `id` int(10) UNSIGNED NOT NULL,
  `jenis` enum('sarkes','nakes','irt','ketenagaan','jabatan') COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sample` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_enabled` tinyint(1) DEFAULT '1',
  `jabatan_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lampiran`
--

INSERT INTO `lampiran` (`id`, `jenis`, `category_id`, `name`, `sample`, `is_enabled`, `jabatan_id`) VALUES
(25, 'nakes', 1, 'STR', 'sample_15168271761.jpg', 1, NULL),
(26, 'nakes', 2, 'STR', 'sample_15169775531.jpeg', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lampiran_polymorphic`
--

CREATE TABLE `lampiran_polymorphic` (
  `id` int(10) UNSIGNED NOT NULL,
  `attachment_id` int(11) NOT NULL,
  `lampiranable_id` int(11) NOT NULL,
  `lampiranable_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_enabled` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lampiran_polymorphic`
--

INSERT INTO `lampiran_polymorphic` (`id`, `attachment_id`, `lampiranable_id`, `lampiranable_type`, `name`, `is_enabled`, `created_at`, `updated_at`) VALUES
(1, 7, 1, 'App\\Models\\Nakes', 'nakes_15150012941.jpeg', 1, '2018-01-03 10:41:34', '2018-01-03 10:41:34'),
(2, 8, 1, 'App\\Models\\Nakes', 'nakes_15150012942.jpeg', 1, '2018-01-03 10:41:34', '2018-01-03 10:41:34'),
(3, 25, 3, 'App\\Models\\Nakes', 'nakes_15168278801.jpeg', 1, '2018-01-24 14:04:40', '2018-01-24 14:04:40'),
(4, 26, 4, 'App\\Models\\Nakes', 'nakes_15169775721.jpeg', 1, '2018-01-26 07:39:32', '2018-01-26 07:39:32'),
(5, 26, 5, 'App\\Models\\Nakes', 'nakes_15171957741.png', 1, '2018-01-28 20:16:15', '2018-01-28 20:16:15'),
(6, 26, 6, 'App\\Models\\Nakes', 'nakes_15171960461.jpeg', 1, '2018-01-28 20:17:24', '2018-01-28 20:20:46');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2017_10_14_142803_nakes_categories_create', 1),
(3, '2017_10_23_151521_attachment_create_table', 2),
(5, '2017_10_23_170404_lampiran_polymorphic_create_table', 3),
(6, '2017_10_23_180810_nakes_lampiran_create_table', 4),
(7, '2017_12_10_151713_create_failed_jobs_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `nakes`
--

CREATE TABLE `nakes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `category_id` int(11) UNSIGNED NOT NULL,
  `nama_tenaga` varchar(110) DEFAULT NULL,
  `tempat_lahir` varchar(20) DEFAULT NULL,
  `tanggal_lahir` varchar(11) DEFAULT NULL,
  `alamat` text,
  `no_str` varchar(225) DEFAULT NULL,
  `no_op` varchar(225) DEFAULT NULL,
  `str_masa_berlaku` date DEFAULT NULL,
  `tempat_kerja` varchar(225) DEFAULT NULL,
  `status` enum('menunggu','proses','terbit','disetujui','ditolak') NOT NULL DEFAULT 'menunggu',
  `alasan_ditolak` varchar(255) DEFAULT NULL COMMENT 'isi jika status ditolak!',
  `operator_id` int(11) DEFAULT NULL,
  `sip_no` varchar(110) DEFAULT NULL,
  `sip_jenis` enum('asli','sementara') DEFAULT NULL,
  `sip_berlaku` date DEFAULT NULL,
  `sip_tembusan` text,
  `petugas_nip` varchar(50) DEFAULT NULL,
  `petugas_nama` varchar(110) DEFAULT NULL,
  `petugas_jabatan` varchar(50) DEFAULT NULL,
  `petugas_pangkat` varchar(110) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nakes_categories`
--

CREATE TABLE `nakes_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(110) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nakes_categories`
--

INSERT INTO `nakes_categories` (`id`, `name`) VALUES
(1, 'Dokter'),
(2, 'Perawat'),
(3, 'Ahli Gizi'),
(4, 'Bidan'),
(5, 'Perawat Gigi'),
(6, 'Apoteker'),
(7, 'ATLM (Ahli Teknologi Laborat Medik )'),
(8, 'Tenaga Tehnik Kefarmasian (AA)'),
(9, 'Elektromedis'),
(10, 'REFRAKSIONIS OPTISIEN DAN OPTOMETRIS'),
(11, 'PSIKOLOG'),
(12, 'RADIOGRAFER'),
(13, 'FISOTERAPI'),
(14, 'PEREKAM MEDIS'),
(15, 'PENATA ANASTESI');

-- --------------------------------------------------------

--
-- Table structure for table `nakes_category_perpu`
--

CREATE TABLE `nakes_category_perpu` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sort` int(3) DEFAULT NULL,
  `is_enabled` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nakes_category_perpu`
--

INSERT INTO `nakes_category_perpu` (`id`, `category_id`, `name`, `sort`, `is_enabled`) VALUES
(1, 1, 'Undang-undang No. 36 Tahun 2009 tentang Kesehatan.', 1, 1),
(2, 1, 'Undang- undang tentang MTKI', 2, 1),
(3, 1, 'Peraturan Menteri Kesehatan No. 17 tahun 2013 tentang Perubahan atas Permenkes No HK.02.02/148/1/2010 tentang izin dan Penyelenggaraan Praktik Perawat.', 4, 1),
(4, 2, 'Peraturan Daerah Kabupaten Pati Nomor 15 Tahun 2003 tentang Izin, Sertifikat dan Rekomendasi Bidang Kesehatan.', 1, 1),
(5, 2, 'Peraturan Bupati no. 45 Tahun 2016 tentang Kedudukan, Susunan Organisasi, Tugas dan Fungsi serta Ketaatan Kerja Dinas Kesehatan.', 2, 1),
(6, 2, 'Keputusan Bupati Pati No.1 Tahun 2004 tentang Petunjuk Pelaksanaan Peraturan Daerah Nomor 15 Tahun 2003 dan Peraturan Daerah No. 16 Tahun 2003.', 1, 1),
(7, 3, 'Undang-undang No. 36 Tahun 2008 tentang Kesehatan.', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('huiralb@gmail.com', '$2y$10$L0/0fASbn4GxsI4MySx.8u2ezBtQ/lkNqILI4aXX.t6Qnu3/9aWVG', '2017-12-01 05:24:48');

-- --------------------------------------------------------

--
-- Table structure for table `pejabat`
--

CREATE TABLE `pejabat` (
  `id` int(11) NOT NULL,
  `kantor_id` int(11) DEFAULT NULL,
  `nip` varchar(20) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `jabatan` varchar(110) DEFAULT NULL,
  `pangkat` varchar(110) DEFAULT NULL,
  `is_enabled` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pejabat`
--

INSERT INTO `pejabat` (`id`, `kantor_id`, `nip`, `nama`, `jabatan`, `pangkat`, `is_enabled`, `created_at`, `updated_at`) VALUES
(6, NULL, '196104061986011004', 'de. Edit Sulistyono, MM', 'PLT Kepala Dinas Kesehatan Pati', 'Pembina Utama', 1, '2018-01-16 10:49:00', '2018-02-03 01:14:49');

-- --------------------------------------------------------

--
-- Table structure for table `perijinan`
--

CREATE TABLE `perijinan` (
  `id` int(11) NOT NULL,
  `perijinanable_type` varchar(225) DEFAULT NULL,
  `perijinanable_id` int(11) UNSIGNED DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `keterangan` varchar(225) DEFAULT NULL,
  `tanggal_kunjungan` date DEFAULT NULL,
  `surat_perihal` varchar(255) DEFAULT NULL,
  `surat_isi` text,
  `surat_tembusan` varchar(110) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perijinan`
--

INSERT INTO `perijinan` (`id`, `perijinanable_type`, `perijinanable_id`, `status`, `keterangan`, `tanggal_kunjungan`, `surat_perihal`, `surat_isi`, `surat_tembusan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(12, 'App\\Models\\Sarkes', 23, 2, NULL, NULL, '', '', '', '2017-10-20 08:23:26', '2017-11-23 14:52:05', NULL),
(13, 'App\\Models\\Sarkes', 24, 1, NULL, NULL, '', '', '', '2017-10-20 08:25:23', '2017-10-20 08:25:23', NULL),
(16, 'App\\Models\\Sarkes', 19, 2, '', NULL, '', '', '', '2017-11-20 14:44:38', '2017-11-28 06:31:58', NULL),
(17, 'App\\Models\\Irt', 11, 2, '', NULL, '', '', '', '2017-11-22 07:20:17', '2017-11-22 16:58:02', NULL),
(18, 'App\\Models\\Sarkes', 25, 2, NULL, '2017-12-16', 'perihal', 'isi', 'tembusan', '2017-12-01 08:41:56', '2017-12-13 15:19:34', NULL),
(19, 'App\\Models\\Sarkes', 26, 2, NULL, '1970-01-01', 'perihal', 'fgdsgfdsafsaaaaaaa', 'tembusan', '2017-12-02 15:04:34', '2017-12-09 07:10:28', NULL),
(20, 'App\\Models\\Sarkes', 29, 1, NULL, NULL, NULL, NULL, NULL, '2018-01-11 02:14:11', '2018-01-11 02:14:11', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `perijinan_ketenagaan`
--

CREATE TABLE `perijinan_ketenagaan` (
  `id` int(11) NOT NULL,
  `perijinan_id` int(11) NOT NULL,
  `jabatan_id` int(11) DEFAULT NULL,
  `nama` varchar(225) DEFAULT NULL,
  `jenis_kelamin` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=laki-laki, 2=perempuan',
  `tanggal_lahir` varchar(11) DEFAULT NULL,
  `alamat` text,
  `pendidikan` varchar(110) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perijinan_ketenagaan`
--

INSERT INTO `perijinan_ketenagaan` (`id`, `perijinan_id`, `jabatan_id`, `nama`, `jenis_kelamin`, `tanggal_lahir`, `alamat`, `pendidikan`, `created_at`, `updated_at`) VALUES
(12, 12, 1, 'Muhammad', 1, '11/10/2017', 'Semarang', 'S1 Keperawatan', NULL, NULL),
(17, 19, 1, 'IRNOVI', 1, '12/19/2017', 'fdasd', 'S1 kedokteran', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `perijinan_sarpras`
--

CREATE TABLE `perijinan_sarpras` (
  `id` int(11) NOT NULL,
  `perijinan_id` int(11) NOT NULL,
  `nama` varchar(225) DEFAULT NULL,
  `keterangan` varchar(225) NOT NULL,
  `foto` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perijinan_sarpras`
--

INSERT INTO `perijinan_sarpras` (`id`, `perijinan_id`, `nama`, `keterangan`, `foto`) VALUES
(13, 1, 'ghhj', 'fdasf43545', 'png/sarpras_fdf1507246677.png'),
(15, 13, 'cctv', 'fdsads', 'sarpras_cctv15085274401'),
(16, 13, 'cctv2', '', 'sarpras_cctv215085278711'),
(17, 12, 'muhammad', 'alfatih', 'sarpras_muhammad15108749411'),
(18, 12, 'IRNOVI', 'fdsadfsafd', 'sarpras_irnovi15110656481'),
(19, 16, 'Kamar Mandi', 'kamar mandi keterangan', 'sarpras_kamar-mandi15116784721.jpeg'),
(20, 18, 'Kamar Mandi', 'kamar mandi', 'sarpras_kamar-mandi15124293981.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'ADMIN', '2017-08-31 17:00:00', '2017-08-31 17:00:00'),
(2, 'SUPERADMIN', '2017-09-16 19:29:55', '2017-09-16 19:29:55'),
(3, 'OPERATOR', '2017-09-16 19:29:55', '2017-09-16 19:29:55'),
(4, 'MASYARAKAT', '2017-09-16 19:29:55', '2017-09-16 19:29:55');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(1, 2),
(56, 1),
(1, 1),
(1, 3),
(52, 2),
(60, 1),
(52, 1),
(61, 4),
(62, 4);

-- --------------------------------------------------------

--
-- Table structure for table `sarkes`
--

CREATE TABLE `sarkes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `category_id` int(60) DEFAULT NULL,
  `nama` varchar(110) DEFAULT NULL,
  `alamat` text,
  `penanggung_jawab` varchar(110) DEFAULT NULL,
  `keterangan` text,
  `status` enum('menunggu','proses','terbit','ditolak') NOT NULL DEFAULT 'menunggu',
  `no_sertifikat` varchar(110) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sarkes`
--

INSERT INTO `sarkes` (`id`, `user_id`, `category_id`, `nama`, `alamat`, `penanggung_jawab`, `keterangan`, `status`, `no_sertifikat`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(26, 1, 1, 'muhammad', 'rtetewrt', 'admin', 'fdadsaf', 'proses', NULL, 1, 1, '2017-12-02 15:04:33', '2017-12-06 16:28:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sarkes_categories`
--

CREATE TABLE `sarkes_categories` (
  `id` int(11) NOT NULL,
  `nama` varchar(110) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sarkes_categories`
--

INSERT INTO `sarkes_categories` (`id`, `nama`) VALUES
(1, 'rumah sakit'),
(2, 'puskesmas'),
(3, 'klinik'),
(4, 'jenis sarkes3');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `nik` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nip` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` tinyint(1) DEFAULT NULL COMMENT '1=laki-laki, 2=perempuan',
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nik`, `nip`, `name`, `username`, `gender`, `email`, `password`, `token`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '332211', '123456', 'Administrator', 'admin199', 1, 'ariyantoeko27@gmail.com', '$2y$10$uGkQC5R3LM9jUUPRTXAv5.vZPLlpY9VaIb16CvoBWz52lJ7wb.k8S', 'hF5FdF2awGDCsoUkZhflWUAjRjaK5nMtoGQksC6VkGO4aGmJjRuZ0wQNXGbLFpEA', 'zutvHJlyBU0xLCdHxks8GZYAdQZKbDvONwjOQLZBHJByxBErcJ45yyG5zl99', '2017-09-17 02:18:10', '2018-02-02 21:33:03'),
(52, NULL, '12345678', 'Umar Bin Khotob', 'umar', NULL, 'umarbk39@gmail.com', '$2y$10$doFzFL9DVgaFMinRl1C9Be6fYdaoMJolhRMXnD6yseaLDTKfTAmT.', NULL, 'x82kqXBsdHmRhT3oeFpE6fK8NcdmtsMWCvtWTJq9THc5BQ8VN1gDV250RLj6', '2018-01-27 08:49:32', '2018-02-02 21:37:16'),
(56, NULL, '197801052006042013', 'Agung tri hartanti', 'agunghartanti', NULL, 'agung_hartanti@yahoo.co.id', '$2y$10$832zp4XOqCRopX0uxIglPuey2/2S3rjHltz13Vc.0r1hj..buGG.G', NULL, 'pzWd6vKBOJJijJdV4TI8NYXgBHBLl4NSIYZ5iG47DlLwGpVv7kay2cJY7cAu', '2018-01-28 05:47:00', '2018-02-02 21:38:59'),
(60, NULL, '123456', 'Wahyu Raharjo', 'Wahyu', NULL, 'jojosagi@gmail.com', '$2y$10$FR3lZOGeDxp2Zqr6BeT0yu1fmNZlZuieNcEUfT52yY/Ob4QWKn/.q', NULL, '8u7ej0NrGL3yRXDzYNirb68GNz0H8XIoRbYR4JNB7RHME5CRTj554kRxoj1C', '2018-02-06 05:47:54', '2018-02-06 05:47:54'),
(61, '56145613613515654', '1', 'aweaw', 'susukantalmanis', 1, 'admin@email-temp.com', '$2y$10$TI8IhZzyHIbogDFI9SsmDeDD.qzUWSUVoAc8xGbpgXnBxFNbGkTnm', 'wrjt86aNjTw5hx1XuYp2xwsW11T40kRx7bNAZMtAKOMprV1HqtrTnfDZmhxAtazD', NULL, '2018-02-21 18:26:46', '2018-02-21 18:26:46'),
(62, '1234567890123400', '1', 'testter', 'tester', 1, 'ari_eko35@yahoo.co.id', '$2y$10$WJtHL7XLQdwdPFgXGJa4wOY4BbckUECTkospcLnm9ju6pjKO9ctJW', '8THUMpcK7RTMOGICSELVAQSmTEMXX5vE5CsYEymb1u2ojvKUlLIaJ61PFkeV1jdX', NULL, '2018-02-24 22:52:19', '2018-02-24 22:52:19');

-- --------------------------------------------------------

--
-- Table structure for table `user_biodatas`
--

CREATE TABLE `user_biodatas` (
  `id` int(11) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `kota_lahir` varchar(225) DEFAULT NULL,
  `alamat` text,
  `no_hp` varchar(20) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `pendidikan` varchar(255) DEFAULT NULL,
  `str_no` varchar(50) DEFAULT NULL,
  `str_berlaku` date DEFAULT NULL,
  `str_scan` varchar(110) DEFAULT NULL,
  `scan_ktp` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_biodatas`
--

INSERT INTO `user_biodatas` (`id`, `user_id`, `kota_lahir`, `alamat`, `no_hp`, `tanggal_lahir`, `pendidikan`, `str_no`, `str_berlaku`, `str_scan`, `scan_ktp`) VALUES
(8, 1, NULL, NULL, NULL, '2017-09-30', NULL, NULL, NULL, NULL, NULL),
(9, 61, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 62, 'pati', 'xxx', '0293428478', '2018-02-28', 's1', NULL, NULL, NULL, '5f95af98c9921472b2a797a526364630.png');

-- --------------------------------------------------------

--
-- Table structure for table `user_verifications`
--

CREATE TABLE `user_verifications` (
  `id` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `is_confirmed` tinyint(1) DEFAULT '0' COMMENT '0=menunggu, 1=ditolak, 2=disetujui',
  `confirmed_by` int(11) DEFAULT NULL,
  `alasan_penolakan` varchar(255) DEFAULT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_verifications`
--

INSERT INTO `user_verifications` (`id`, `user_id`, `is_confirmed`, `confirmed_by`, `alasan_penolakan`, `token`, `created_at`, `updated_at`) VALUES
(14, 1, 2, NULL, NULL, 'dlUnYWyBB882hZ4yd61C1lsm871jbW28p4TIGNLfSZGiyTFSxZXiQjbsrUD4UlIc', '2017-11-25 16:58:17', '2017-11-25 16:58:17'),
(15, 62, 0, NULL, NULL, 'F9aPYdftvpUZ3tGHt1pJmZRcLCUC27IwDC4y6nWN6RTnKFnQKrRJFsXpK8X6dOaQ', '2018-02-24 22:53:16', '2018-02-24 22:53:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `irt`
--
ALTER TABLE `irt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `irt_barang`
--
ALTER TABLE `irt_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `irt_surat`
--
ALTER TABLE `irt_surat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_reserved_at_index` (`queue`,`reserved_at`);

--
-- Indexes for table `kantor`
--
ALTER TABLE `kantor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lampiran`
--
ALTER TABLE `lampiran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lampiran_polymorphic`
--
ALTER TABLE `lampiran_polymorphic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nakes`
--
ALTER TABLE `nakes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nakes_categories`
--
ALTER TABLE `nakes_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nakes_category_perpu`
--
ALTER TABLE `nakes_category_perpu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pejabat`
--
ALTER TABLE `pejabat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perijinan`
--
ALTER TABLE `perijinan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `perijinanable_id` (`perijinanable_id`);

--
-- Indexes for table `perijinan_ketenagaan`
--
ALTER TABLE `perijinan_ketenagaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perijinan_sarpras`
--
ALTER TABLE `perijinan_sarpras`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD KEY `user_id` (`user_id`),
  ADD KEY `role_user_ibfk_2` (`role_id`);

--
-- Indexes for table `sarkes`
--
ALTER TABLE `sarkes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `sarkes_categories`
--
ALTER TABLE `sarkes_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_biodatas`
--
ALTER TABLE `user_biodatas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_verifications`
--
ALTER TABLE `user_verifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `irt`
--
ALTER TABLE `irt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `irt_barang`
--
ALTER TABLE `irt_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `irt_surat`
--
ALTER TABLE `irt_surat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3845;
--
-- AUTO_INCREMENT for table `kantor`
--
ALTER TABLE `kantor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `lampiran`
--
ALTER TABLE `lampiran`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `lampiran_polymorphic`
--
ALTER TABLE `lampiran_polymorphic`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `nakes`
--
ALTER TABLE `nakes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `nakes_categories`
--
ALTER TABLE `nakes_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `nakes_category_perpu`
--
ALTER TABLE `nakes_category_perpu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `pejabat`
--
ALTER TABLE `pejabat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `perijinan`
--
ALTER TABLE `perijinan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `perijinan_ketenagaan`
--
ALTER TABLE `perijinan_ketenagaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `perijinan_sarpras`
--
ALTER TABLE `perijinan_sarpras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `sarkes`
--
ALTER TABLE `sarkes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `sarkes_categories`
--
ALTER TABLE `sarkes_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
--
-- AUTO_INCREMENT for table `user_biodatas`
--
ALTER TABLE `user_biodatas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `user_verifications`
--
ALTER TABLE `user_verifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_user_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sarkes`
--
ALTER TABLE `sarkes`
  ADD CONSTRAINT `sarkes_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `sarkes_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sarkes_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_biodatas`
--
ALTER TABLE `user_biodatas`
  ADD CONSTRAINT `user_biodatas_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_verifications`
--
ALTER TABLE `user_verifications`
  ADD CONSTRAINT `user_verifications_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

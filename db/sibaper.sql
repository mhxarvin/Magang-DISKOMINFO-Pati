-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Feb 2020 pada 04.42
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sibaper`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_sub_unit_kerja`
--

CREATE TABLE `mst_sub_unit_kerja` (
  `SubUnitKerjaId` int(11) NOT NULL,
  `SubUnitKerjaIndukId` int(11) DEFAULT NULL,
  `SubUnitKerjaNama` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mst_sub_unit_kerja`
--

INSERT INTO `mst_sub_unit_kerja` (`SubUnitKerjaId`, `SubUnitKerjaIndukId`, `SubUnitKerjaNama`) VALUES
(1, 2, 'UMPEG'),
(2, 2, 'PROGRAM KEU'),
(3, 2, 'YANKES');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_unit_kerja`
--

CREATE TABLE `mst_unit_kerja` (
  `UnitKerjaId` int(11) NOT NULL,
  `UnitKerjaNama` varchar(200) DEFAULT NULL,
  `UnitKerjaKepala` varchar(100) DEFAULT NULL,
  `UnitKerjaPimpinan` varchar(200) DEFAULT NULL,
  `UnitKerjaNip` varchar(50) DEFAULT NULL,
  `UnitKerjaPangkat` varchar(100) DEFAULT NULL,
  `UnitKerjaIndukId` int(11) DEFAULT NULL,
  `UnitKerjaAktif` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mst_unit_kerja`
--

INSERT INTO `mst_unit_kerja` (`UnitKerjaId`, `UnitKerjaNama`, `UnitKerjaKepala`, `UnitKerjaPimpinan`, `UnitKerjaNip`, `UnitKerjaPangkat`, `UnitKerjaIndukId`, `UnitKerjaAktif`) VALUES
(1, 'Dinas Pendidikan dan Kebudayaan', 'Kepala Dinas Pendidikan dan Kebudayaan', 'Drs. SARPAN,SH,MM', '19580222 197701 1 002', NULL, NULL, 0),
(2, 'Dinas Kesehatan Kabupaten Pati', NULL, 'dr. H. EDI SULISTYONO, MM.', '19611106 198901 1 006', NULL, NULL, 1),
(3, 'UPT Perbekalan Farmasi', NULL, NULL, NULL, NULL, 2, 0),
(4, 'UPT Labkesda', NULL, NULL, NULL, NULL, 2, 0),
(5, 'BLUD UPT Puskesmas Sukolilo I', NULL, 'MOH.DIMYATI,S.Kep,MM', '196609231989031004', NULL, 2, 1),
(6, 'BLUD UPT Puskesmas Sukolilo II', NULL, 'ENY ARISTIYANI,SKM,MM', '196604061987032011', NULL, 2, 1),
(7, 'BLUD UPT Puskesmas Kayen', NULL, 'ACHMAD NADLIR,SKM,M.Kes', '196103131983031018', NULL, 2, 1),
(8, 'BLUD UPT Puskesmas Tambakromo', NULL, 'dr.RACHMAD JULYANTO', '197107102002121004', NULL, 2, 1),
(9, 'BLUD UPT Puskesmas Winong I', NULL, 'dr.AGUNG', '0', NULL, 2, 1),
(10, 'BLUD UPT Puskesmas Winong II', NULL, 'MUHADI,SKM,MM', '196807231989031007', NULL, 2, 1),
(11, 'BLUD UPT Puskesmas Pucakwangi I', NULL, 'dr.SUTOPO', '196705252002121001', NULL, 2, 1),
(12, 'BLUD UPT Puskesmas Pucakwangi II', NULL, 'dr.TOTOK SUDIHARTO', '197310242006041006', NULL, 2, 1),
(13, 'BLUD UPT Puskesmas Jaken', NULL, 'SRI UTAMI,SKM', '196604131985112001', NULL, 2, 1),
(14, 'BLUD UPT Puskesmas Batangan', NULL, 'dr.HERIANI RETNONINGSIH', '197603122005012008', NULL, 2, 1),
(15, 'BLUD UPT Puskesmas Juwana', NULL, 'dr.SETIYO RIYATNO', '198410172010011016', NULL, 2, 1),
(16, 'BLUD UPT Puskesmas Jakenan', NULL, 'dr.ALI MUSLIHIN,MM', '196708042002121005', NULL, 2, 1),
(17, 'BLUD UPT Puskesmas Pati I', NULL, 'dr.LUTHER SELAWA', '196302072002121002', NULL, 2, 1),
(18, 'BLUD UPT Puskesmas Pati II', NULL, 'PARTONO,SKM', '196206061988031012', NULL, 2, 1),
(19, 'BLUD UPT Puskesmas Gabus I', NULL, 'TEGUH WALUYO,SKM', '196111121983091002', NULL, 2, 1),
(20, 'BLUD UPT Puskesmas Gabus II', NULL, 'SUMARLAN,SKM,M.Kes', '0', NULL, 2, 1),
(21, 'BLUD UPT Puskesmas Margorejo', NULL, 'drg.ARDHIAN SUCAHYATI,MM', '196602031993032006', NULL, 2, 1),
(22, 'BLUD UPT Puskesmas Gembong', NULL, 'CAHYA WIBAWA,S.Kep', ' ', NULL, 2, 1),
(23, 'BLUD UPT Puskesmas Tlogowungu', NULL, 'MATHORI,SKM,MM', '196408031988031014', NULL, 2, 1),
(24, 'BLUD UPT Puskesmas Wedarijaksa I', NULL, 'BUDHO LEGOWO,SKM', '196402251987031009', NULL, 2, 1),
(25, 'BLUD UPT Puskesmas Wedarijaksa II', NULL, 'drg.SRI MURDIYANTI,MM', '196511141993032003', NULL, 2, 1),
(26, 'BLUD UPT Puskesmas Trangkil', NULL, 'MUNADI,SKM', '196104241986031012', NULL, 2, 1),
(27, 'BLUD UPT Puskesmas Margoyoso I', NULL, 'dr.PAMUJI DJOKO WIDODO', '196610112002121003', NULL, 2, 1),
(28, 'BLUD UPT Puskesmas Margoyoso II', NULL, 'dr.MOH.DANUR KHUSNA', '197004202005011006', NULL, 2, 1),
(29, 'BLUD UPT Puskemas Gunungwungkal', NULL, 'SUPRIYANTO,S.Kep,MM', '197911182003121004', NULL, 2, 1),
(30, 'BLUD UPT Puskesmas Cluwak', NULL, 'dr.BAMBANG SANTOSO', '197309282002121004', NULL, 2, 1),
(31, 'BLUD UPT Puskesmas Tayu I', NULL, 'MUSTAIN,SKM,MH.Kes', '196603151988031015', NULL, 2, 1),
(32, 'BLUD UPT Puskesmas Tayu II', NULL, 'IMBANG TRI HANEKOWATI,SKM,MM', '196907011994032006', NULL, 2, 1),
(33, 'BLUD UPT Puskesmas Dukuhseti', NULL, 'SANTOSO,S.Kep,MM', '197212101992031004', NULL, 2, 1),
(34, 'Rumah Sakit Umum Daerah \"RAA Soewondo\"', NULL, 'dr.SUWORO NURCAHYONO,M.Kes', '196009211988031007', NULL, NULL, 0),
(35, 'BLUD Rumah Sakit Umum Daerah \"RAA Soewondo\"', NULL, 'dr. SUWORO NURCAHYONO, M.Kes', '196009211988031007', NULL, NULL, 0),
(36, 'Rumah Sakit Umum Daerah \"Kayen\"', NULL, 'dr. Aviani Tritanti Venusia, MM', '197105182006042014', NULL, NULL, 0),
(37, 'Dinas Pekerjaan Umum dan Penataan Ruang', NULL, 'A. FAIZAL, ST, MT', '19670306 199803 1 005', 'Pembina', NULL, 0),
(38, 'Badan Perencanaan Pembangunan Daerah', NULL, 'Ir. PUJO WINARNO,MM', '19620808 198603 1 020', NULL, NULL, 0),
(39, 'Dinas Perhubungan', NULL, 'SUDARLAN, S.Pd, MM', '19600526 198111 1 002', NULL, NULL, 0),
(40, 'Dinas Lingkungan Hidup', NULL, 'Ir. PURWADI.MM', '196108281990031007', NULL, NULL, 0),
(41, 'Dinas Kependudukan dan Pencatatan Sipil', NULL, 'Drs.  RUBIYONO, SH. MM', '19630814 198503 1 005', NULL, NULL, 0),
(42, 'Dinas Sosial', NULL, 'SUDARLAN, S.Pd, MM', '19600526 198111 1 002', NULL, NULL, 0),
(43, 'Dinas Tenaga Kerja', NULL, 'Tri Hariyama, SH. MM', '19660511 199101 1 002', NULL, NULL, 0),
(44, 'Dinas Koperasi dan Usaha Mikro, Kecil dan Menengah', NULL, 'Ir. SLAMET SINGGIH PURNOMOJATI, M.Si.', '19601222 198603 1 010', NULL, NULL, 0),
(45, 'Kantor Kesatuan Bangsa dan Politik', NULL, 'Drs. SUDARTOMO', '195908131985031007', NULL, NULL, 0),
(46, 'Satuan Polisi Pamong Praja', NULL, 'Drs. RUBIYONO, SH. MM', '19630814 198503 1 005', NULL, NULL, 0),
(47, 'Dewan Perwakilan Rakyat Daerah', NULL, NULL, NULL, NULL, NULL, 0),
(48, 'Bupati dan Wakil Bupati', NULL, NULL, NULL, NULL, NULL, 0),
(49, 'Sekretariat Daerah', NULL, 'Drs. DESMON HASTIONO, MM', '196112081991031004', NULL, NULL, 0),
(50, 'Sekretariat DPRD', NULL, 'IFAN BUSTANUDDIN, SE, MM.', '19641213 199203 1 008', NULL, NULL, 0),
(51, 'Badan Pengelolaan Keuangan dan Aset Daerah', NULL, 'Ir. TURI ATMOKO, MM', '19670922 199603 1 002', NULL, NULL, 0),
(52, 'Badan Pengelolaan Keuangan dan Aset Daerah (PPKD)', NULL, NULL, NULL, NULL, NULL, 0),
(53, 'Inspektorat', 'Inspektur', 'Drs. SUMARSONO HADI, MM', '196101091984031006', NULL, NULL, 0),
(54, 'Badan Kepegawaian, Pendidikan dan Pelatihan', 'Kepala Badan Kepegawaian, Pendidikan dan Pelatihan', 'Drs.JUMANI,M.si', '197011141990111001', NULL, NULL, 0),
(55, 'Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu', NULL, 'SUGIYONO, AP., M. Si', '19740313 199311 1 001', NULL, NULL, 0),
(56, 'Kecamatan Pati', 'Camat Pati', 'CIPTO MANGUN ONENG, SH.MM.', '19651015 199003 1 014', NULL, NULL, 0),
(57, 'Kecamatan Margorejo', NULL, 'Drs. SUDARTO', '19651219 199303 1 012', NULL, NULL, 0),
(58, 'Kecamatan Tlogowungu', NULL, 'Drs. DIDIK RUSDIARTONO', '19680319 198803 1 003', NULL, NULL, 0),
(59, 'Kecamatan Gembong', NULL, 'KADAR TRISMOYO,S.Sos', '195904121986071002', NULL, NULL, 0),
(60, 'Kecamatan Tayu', NULL, 'SENTOT PURNOMO. SH', '195910191986031006', NULL, NULL, 0),
(61, 'Kecamatan Margoyoso', NULL, 'Drs. RUSMAN', '196109031986071001', NULL, NULL, 0),
(62, 'Kecamatan Gunungwungkal', NULL, 'Drs SUKARDI', '196810121990011001', NULL, NULL, 0),
(63, 'Kecamatan Cluwak', NULL, 'DWI NURYANTO, SH', '19650927 199102 1 001', NULL, NULL, 0),
(64, 'Kecamatan Dukuhseti', NULL, 'SLAMET EDI WALUYO, SH.', '19601205 198912 1 001', NULL, NULL, 0),
(65, 'Kecamatan Kayen', NULL, 'Drs. JABIR, MH', '196503121993031013', NULL, NULL, 0),
(66, 'Kecamatan Gabus', NULL, 'Dra. NIKEN SAVITRI, MM', '19610330 198403 2 004', NULL, NULL, 0),
(67, 'Kecamatan Tambakromo', NULL, 'SUDARTO, S.Sos', '19621227 198607 1 001', NULL, NULL, 0),
(68, 'Kecamatan Sukolilo', NULL, 'Drs. SUGIYONO, MM', '19670303 199310 1 001', NULL, NULL, 0),
(69, 'Kecamatan Juwana', NULL, 'TEGUH WIDYATMOKO, AP', '19760528 199412 1 002', NULL, NULL, 0),
(70, 'Kecamatan Trangkil', NULL, 'TEGUH SUWITO, SH.MM', '1961051819985031010', NULL, NULL, 0),
(71, 'Kecamatan Wedarijaksa', NULL, 'Drs. EDWIN RIYONO CHRIS INDIYANTO, MM.', '196106031981031001', NULL, NULL, 0),
(72, 'Kecamatan Batangan', NULL, 'SUPAT,SP.MM.', '19630607 198503 1019', NULL, NULL, 0),
(73, 'Kecamatan Jakenan', NULL, 'ARIS SOESETYO, SH, MM', '19600420 198503 1 008', NULL, NULL, 0),
(74, 'Kecamatan Jaken', NULL, 'Drs. RUSMAN', '19610903 198607 1 001', 'Pembina', NULL, 0),
(75, 'Kecamatan Winong', NULL, 'SUHARYANTO, SH', '196303271986071002', NULL, NULL, 0),
(76, 'Kecamatan Pucakwangi', NULL, 'M. BUDI PRASETYA, SSos.', '19690925 199001 1 002', NULL, NULL, 0),
(77, 'Kelurahan Pati Wetan', NULL, 'CIPTO MANGUN ONENG, SH.MM.', '19651015 199003 1 014', NULL, 57, 0),
(78, 'Kelurahan Pati Kidul', NULL, 'CIPTO MANGUN ONENG, SH.MM.', '19651015 199003 1 014', NULL, 57, 0),
(79, 'Kelurahan Pati Lor', NULL, 'CIPTO MANGUN ONENG, SH.MM.', '19651015 199003 1 014', NULL, 57, 0),
(80, 'Kelurahan Parenggan', NULL, 'CIPTO MANGUN ONENG, SH.MM.', '19651015 199003 1 014', NULL, 57, 0),
(81, 'Kelurahan Kalidoro', NULL, 'CIPTO MANGUN ONENG, SH.MM.', '19651015 199003 1 014', NULL, 57, 0),
(82, 'Badan Penanggulangan Bencana Daerah', NULL, 'SANUSI SISWOYO, SH, MH', '195909101986071004', NULL, NULL, 0),
(83, 'Dinas Ketahanan Pangan', NULL, 'drh. SILVINUS PELLO SIBABHOKA, MM', '19580605 198608 1 001', NULL, NULL, 0),
(84, 'Dinas Pemberdayaan Masyarakat dan Desa', NULL, 'Dr. MUHTAR, S.IP.,MM', '19660620 199603 1 003', NULL, NULL, 0),
(85, 'Dinas Kearsipan dan Perpustakaan', NULL, 'Drs. SOEHARTO DWI PURBOMO, MM', '19590915 199010 1 001', NULL, NULL, 0),
(86, 'Dinas Pertanian', NULL, 'Ir. MOKHTAR EFENDI, MM', '196012031989031005', NULL, NULL, 0),
(87, 'Dinas Kepemudaan, Olahraga, dan Pariwisata', NULL, 'SIGIT HARTOKO, SH', '19590901 198903 1 012', NULL, NULL, 0),
(88, 'Dinas Kelautan dan Perikanan', NULL, 'Ir. SUJONO, MM', '19590303 199103 1 003', NULL, NULL, 0),
(89, 'Dinas Perdagangan dan Perindustrian \r\n', NULL, 'RIYOSO, SSos. MM', '19711120 199203 1 004', NULL, NULL, 0),
(90, 'BLUD Rumah Sakit Umum Daerah \"Kayen\"', NULL, 'dr.SUPRIYADI,M.Kes', '19590727 198512 1 003', NULL, NULL, 0),
(91, 'Bagian Tata Pemerintahan', NULL, NULL, NULL, NULL, 49, 0),
(92, 'Bagian Hukum', NULL, NULL, NULL, NULL, 49, 0),
(93, 'Bagian Humas', NULL, NULL, NULL, NULL, 49, 0),
(94, 'Bagian Perekonomian', NULL, NULL, NULL, NULL, 49, 0),
(95, 'Bagian Pembangunan', NULL, 'Sujiyanto, SE', '196208231982111001', 'Pembina', 49, 0),
(96, 'Bagian Kesra', NULL, NULL, NULL, NULL, 49, 0),
(97, 'Bagian Organisasi dan Kepegawaian', NULL, NULL, NULL, NULL, 49, 0),
(98, 'Bagian Umum', NULL, NULL, NULL, NULL, 49, 0),
(99, 'Bagian Perlengkapan dan RT', 'Kepala Bagian Perlengkapan dan RT', NULL, NULL, NULL, 49, 0),
(100, 'Bagian Pengadaan Barang dan Jasa', 'Kepala Bagian Pengadaan Barang dan Jasa', 'SUJONO, SH, MM', NULL, 'Pembina', 49, 0),
(101, 'Dinas Perumahan dan Kawasan Permukiman\r\n', NULL, 'Ir. SUHARYONO, MM', '19610911 198903 1 008', NULL, NULL, 0),
(102, 'Dinas Komunikasi dan Informatika\r\n', NULL, 'Ir. EDY MARTANTO, MM', '19630324 198903 1 010', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `yk_aksi`
--

CREATE TABLE `yk_aksi` (
  `AksiId` int(3) NOT NULL,
  `AksiName` char(100) DEFAULT NULL,
  `AksiFungsi` char(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `yk_aksi`
--

INSERT INTO `yk_aksi` (`AksiId`, `AksiName`, `AksiFungsi`) VALUES
(1, 'Lihat', 'index'),
(2, 'Cari', 'search'),
(3, 'Tambah', 'add'),
(4, 'Ubah', 'update'),
(5, 'Hapus', 'delete'),
(6, 'Detail', 'detail'),
(7, 'Cetak', 'cetak'),
(8, 'Export', 'export');

-- --------------------------------------------------------

--
-- Struktur dari tabel `yk_group`
--

CREATE TABLE `yk_group` (
  `GroupId` int(3) NOT NULL,
  `GroupBidang` char(150) DEFAULT NULL,
  `GroupJabatan` char(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `yk_group`
--

INSERT INTO `yk_group` (`GroupId`, `GroupBidang`, `GroupJabatan`) VALUES
(1, 'Super Administrator', 'Responsible for technical systems'),
(2, 'Pengelola Barang', 'Unit Kerja'),
(3, 'TU', 'Pegawai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `yk_group_menu_aksi`
--

CREATE TABLE `yk_group_menu_aksi` (
  `GroupMenuMenuAksiId` int(3) DEFAULT NULL,
  `GroupMenuGroupId` int(3) DEFAULT NULL,
  `GroupMenuSegmen` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `yk_group_menu_aksi`
--

INSERT INTO `yk_group_menu_aksi` (`GroupMenuMenuAksiId`, `GroupMenuGroupId`, `GroupMenuSegmen`) VALUES
(1, 1, 'sistem/index'),
(2, 1, 'sistem/group/index'),
(3, 1, 'sistem/group/search'),
(4, 1, 'sistem/group/add'),
(5, 1, 'sistem/group/update'),
(6, 1, 'sistem/group/delete'),
(7, 1, 'sistem/user/index'),
(8, 1, 'sistem/user/search'),
(9, 1, 'sistem/user/add'),
(10, 1, 'sistem/user/update'),
(11, 1, 'sistem/user/delete'),
(12, 1, 'sistem/menu/index'),
(13, 1, 'sistem/menu/search'),
(14, 1, 'sistem/menu/add'),
(15, 1, 'sistem/menu/update'),
(16, 1, 'sistem/menu/delete'),
(17, 1, 'sistem/auth/index'),
(18, 1, 'sistem/auth/search'),
(19, 1, 'sistem/auth/update'),
(76, 1, 'laporan/rincian/index'),
(77, 1, 'laporan/rincian/search'),
(78, 1, 'laporan/rincian/add'),
(79, 1, 'laporan/rincian/update'),
(80, 1, 'laporan/rincian/delete'),
(81, 1, 'laporan/rincian/detail'),
(82, 1, 'laporan/rincian/cetak'),
(83, 1, 'laporan/rincian/export'),
(84, 1, 'master/index'),
(222, 1, 'persediaan/index'),
(223, 1, 'persediaan/penerimaan/index'),
(224, 1, 'persediaan/penerimaan/search'),
(225, 1, 'persediaan/penerimaan/add'),
(226, 1, 'persediaan/penerimaan/update'),
(227, 1, 'persediaan/penerimaan/delete'),
(228, 1, 'persediaan/penerimaan/detail'),
(229, 1, 'persediaan/penerimaan/cetak'),
(230, 1, 'persediaan/penerimaan/export');

-- --------------------------------------------------------

--
-- Struktur dari tabel `yk_menu`
--

CREATE TABLE `yk_menu` (
  `MenuId` int(3) NOT NULL,
  `MenuParentId` int(3) DEFAULT NULL,
  `MenuName` char(150) DEFAULT NULL,
  `MenuModule` char(150) DEFAULT NULL,
  `MenuHasSubmenu` tinyint(1) NOT NULL DEFAULT '0',
  `MenuIcon` char(50) DEFAULT NULL,
  `MenuOrder` int(2) DEFAULT NULL,
  `MenuIsShow` enum('1','0') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `yk_menu`
--

INSERT INTO `yk_menu` (`MenuId`, `MenuParentId`, `MenuName`, `MenuModule`, `MenuHasSubmenu`, `MenuIcon`, `MenuOrder`, `MenuIsShow`) VALUES
(1, 0, 'Sistem', 'sistem', 1, 'grid', 1, '1'),
(2, 1, 'Group', 'sistem/group', 0, '', 1, '1'),
(3, 1, 'User', 'sistem/user', 0, NULL, 2, '1'),
(4, 1, 'Menu', 'sistem/menu', 0, NULL, 3, '1'),
(5, 1, 'Hak Akses', 'sistem/auth', 0, '', 4, '1'),
(15, 0, 'Transaksi', 'transaksi', 1, 'tasks', 4, '1'),
(17, 23, 'Rincian Anggaran Belanja', 'laporan/rincian', 0, '', 4, '1'),
(18, 0, 'Master', 'master', 1, 'list', 2, '1'),
(42, 0, 'Persediaan', 'persediaan', 1, 'grid', 3, '1'),
(43, 42, 'Penerimaan', 'persediaan/penerimaan', 0, '', 1, '1'),
(44, 18, 'Kotak Masuk', 'master/kotak masuk', 0, '', 1, '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `yk_menu_aksi`
--

CREATE TABLE `yk_menu_aksi` (
  `MenuAksiId` int(6) NOT NULL,
  `MenuAksiMenuId` int(6) DEFAULT NULL,
  `MenuAksiAksiId` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `yk_menu_aksi`
--

INSERT INTO `yk_menu_aksi` (`MenuAksiId`, `MenuAksiMenuId`, `MenuAksiAksiId`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 2, 2),
(4, 2, 3),
(5, 2, 4),
(6, 2, 5),
(7, 3, 1),
(8, 3, 2),
(9, 3, 3),
(10, 3, 4),
(11, 3, 5),
(12, 4, 1),
(13, 4, 2),
(14, 4, 3),
(15, 4, 4),
(16, 4, 5),
(17, 5, 1),
(18, 5, 2),
(19, 5, 4),
(69, 15, 1),
(76, 17, 1),
(77, 17, 2),
(78, 17, 3),
(79, 17, 4),
(80, 17, 5),
(81, 17, 6),
(82, 17, 7),
(83, 17, 8),
(84, 18, 1),
(222, 42, 1),
(223, 43, 1),
(224, 43, 2),
(225, 43, 3),
(226, 43, 4),
(227, 43, 5),
(228, 43, 6),
(229, 43, 7),
(230, 43, 8),
(231, 44, 1),
(232, 44, 2),
(233, 44, 3),
(234, 44, 4),
(235, 44, 5),
(236, 44, 6),
(237, 44, 7),
(238, 44, 8),
(239, 2, 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `yk_user`
--

CREATE TABLE `yk_user` (
  `UserId` int(6) NOT NULL,
  `UserUnitKerjaId` int(11) DEFAULT NULL,
  `UserNip` varchar(20) DEFAULT NULL,
  `UserRealName` char(250) DEFAULT NULL,
  `UserName` char(150) DEFAULT NULL,
  `UserPassword` char(40) DEFAULT NULL,
  `UserActive` tinyint(1) DEFAULT '0',
  `UserHp` varchar(20) DEFAULT NULL,
  `UserEmail` varchar(250) DEFAULT '',
  `UserFoto` varchar(250) DEFAULT NULL,
  `UserExpired` date NOT NULL,
  `UserLastLogin` datetime DEFAULT NULL,
  `UserNote` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `yk_user`
--

INSERT INTO `yk_user` (`UserId`, `UserUnitKerjaId`, `UserNip`, `UserRealName`, `UserName`, `UserPassword`, `UserActive`, `UserHp`, `UserEmail`, `UserFoto`, `UserExpired`, `UserLastLogin`, `UserNote`) VALUES
(1, 0, NULL, 'Super Administrator', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1, NULL, '', NULL, '0000-00-00', NULL, NULL),
(2, NULL, '', 'Pengelola Barang', 'user', '', 1, '', '', NULL, '2020-02-22', NULL, ''),
(3, NULL, '', 'TU', 'budi123', '', 1, '', '', NULL, '2020-02-20', NULL, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `yk_user_group`
--

CREATE TABLE `yk_user_group` (
  `UserGroupUserId` int(10) NOT NULL,
  `UserGroupGroupId` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `yk_user_group`
--

INSERT INTO `yk_user_group` (`UserGroupUserId`, `UserGroupGroupId`) VALUES
(1, 1),
(2, 3),
(3, 3);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `mst_sub_unit_kerja`
--
ALTER TABLE `mst_sub_unit_kerja`
  ADD PRIMARY KEY (`SubUnitKerjaId`),
  ADD KEY `FK_SubUnitKerjaIndukId` (`SubUnitKerjaIndukId`);

--
-- Indeks untuk tabel `mst_unit_kerja`
--
ALTER TABLE `mst_unit_kerja`
  ADD PRIMARY KEY (`UnitKerjaId`);

--
-- Indeks untuk tabel `yk_aksi`
--
ALTER TABLE `yk_aksi`
  ADD PRIMARY KEY (`AksiId`);

--
-- Indeks untuk tabel `yk_group`
--
ALTER TABLE `yk_group`
  ADD PRIMARY KEY (`GroupId`);

--
-- Indeks untuk tabel `yk_group_menu_aksi`
--
ALTER TABLE `yk_group_menu_aksi`
  ADD KEY `FK_ci_group_menu_dummy_menu` (`GroupMenuMenuAksiId`),
  ADD KEY `FK_ci_group_menu_aksi` (`GroupMenuGroupId`),
  ADD KEY `segen` (`GroupMenuSegmen`);

--
-- Indeks untuk tabel `yk_menu`
--
ALTER TABLE `yk_menu`
  ADD PRIMARY KEY (`MenuId`);

--
-- Indeks untuk tabel `yk_menu_aksi`
--
ALTER TABLE `yk_menu_aksi`
  ADD PRIMARY KEY (`MenuAksiId`),
  ADD KEY `FK_ci_dummy_menu_aksi` (`MenuAksiMenuId`),
  ADD KEY `FK_ci_dummy_menu_aksi_aksi` (`MenuAksiAksiId`);

--
-- Indeks untuk tabel `yk_user`
--
ALTER TABLE `yk_user`
  ADD PRIMARY KEY (`UserId`),
  ADD UNIQUE KEY `NewIndex1` (`UserName`);

--
-- Indeks untuk tabel `yk_user_group`
--
ALTER TABLE `yk_user_group`
  ADD PRIMARY KEY (`UserGroupUserId`,`UserGroupGroupId`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `mst_sub_unit_kerja`
--
ALTER TABLE `mst_sub_unit_kerja`
  MODIFY `SubUnitKerjaId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `mst_unit_kerja`
--
ALTER TABLE `mst_unit_kerja`
  MODIFY `UnitKerjaId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT untuk tabel `yk_aksi`
--
ALTER TABLE `yk_aksi`
  MODIFY `AksiId` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `yk_group`
--
ALTER TABLE `yk_group`
  MODIFY `GroupId` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `yk_menu`
--
ALTER TABLE `yk_menu`
  MODIFY `MenuId` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT untuk tabel `yk_menu_aksi`
--
ALTER TABLE `yk_menu_aksi`
  MODIFY `MenuAksiId` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=240;

--
-- AUTO_INCREMENT untuk tabel `yk_user`
--
ALTER TABLE `yk_user`
  MODIFY `UserId` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `mst_sub_unit_kerja`
--
ALTER TABLE `mst_sub_unit_kerja`
  ADD CONSTRAINT `FK_SubUnitKerjaIndukId` FOREIGN KEY (`SubUnitKerjaIndukId`) REFERENCES `mst_unit_kerja` (`UnitKerjaId`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `yk_group_menu_aksi`
--
ALTER TABLE `yk_group_menu_aksi`
  ADD CONSTRAINT `FK_ci_group_menu_aksi` FOREIGN KEY (`GroupMenuGroupId`) REFERENCES `yk_group` (`GroupId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_ci_group_menu_aksi_aksi` FOREIGN KEY (`GroupMenuMenuAksiId`) REFERENCES `yk_menu_aksi` (`MenuAksiId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `yk_menu_aksi`
--
ALTER TABLE `yk_menu_aksi`
  ADD CONSTRAINT `FK_yk_menu_aksi` FOREIGN KEY (`MenuAksiAksiId`) REFERENCES `yk_aksi` (`AksiId`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_yk_menu_menu` FOREIGN KEY (`MenuAksiMenuId`) REFERENCES `yk_menu` (`MenuId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

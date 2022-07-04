-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 11 Jun 2022 pada 00.47
-- Versi server: 10.7.3-MariaDB-log
-- Versi PHP: 8.1.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gradial2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `art`
--

CREATE TABLE `art` (
  `kode` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `warna_kode` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `style_kode` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `art`
--

INSERT INTO `art` (`kode`, `warna_kode`, `style_kode`) VALUES
('SC-22001', 'BG001', 'AT0001'),
('SC-22002', 'BRS001', 'AT0002');

-- --------------------------------------------------------

--
-- Struktur dari tabel `brand`
--

CREATE TABLE `brand` (
  `kode_brand` int(10) UNSIGNED NOT NULL,
  `namabrand` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `brand`
--

INSERT INTO `brand` (`kode_brand`, `namabrand`) VALUES
(1, 'Gradial'),
(2, 'Enkai'),
(3, 'Bobux');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategoritoko`
--

CREATE TABLE `kategoritoko` (
  `kode_kate` int(10) UNSIGNED NOT NULL,
  `namakate` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diskon` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kategoritoko`
--

INSERT INTO `kategoritoko` (`kode_kate`, `namakate`, `diskon`) VALUES
(1, 'GROSIR SPESIAL', 35),
(2, 'GROSIR A', 32),
(3, 'GROSIR', 30),
(4, 'SEMI GROSIR', 27),
(5, 'RETAIL', 25),
(6, 'Big Patner', 40),
(7, 'Staff', 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_04_18_083201_create_brand_models_table', 1),
(6, '2022_04_18_091637_create_sepatu1_models_table', 1),
(7, '2022_04_18_094520_create_sepatu2_models_table', 1),
(8, '2022_04_18_103937_create_kategoritokos_table', 1),
(9, '2022_04_18_104845_create_tokos_table', 1),
(10, '2022_04_18_105843_create_sales1s_table', 1),
(11, '2022_04_18_110451_create_sales2s_table', 1),
(12, '2022_04_19_002701_create_sales3s_table', 1),
(13, '2022_04_20_053617_create_warnas_table', 1),
(14, '2022_04_20_053802_create_styles_table', 1),
(15, '2022_04_20_053803_create_art_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pabriks`
--

CREATE TABLE `pabriks` (
  `id` int(11) NOT NULL,
  `nama_pabrik` varchar(50) NOT NULL,
  `pemilik_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pabriks`
--

INSERT INTO `pabriks` (`id`, `nama_pabrik`, `pemilik_id`) VALUES
(1, 'Gradial Perdana Surabaya', 1),
(2, 'Gradial Perdana Pasuruan', 1),
(3, 'Gradial Perdana Lamongan', 2),
(4, 'Gradial Perdana Mojokerto', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemilik`
--

CREATE TABLE `pemilik` (
  `id` int(11) NOT NULL,
  `nama_pemilik` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemilik`
--

INSERT INTO `pemilik` (`id`, `nama_pemilik`) VALUES
(1, 'Pak Hartono'),
(2, 'Agustinus');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `purchase1s`
--

CREATE TABLE `purchase1s` (
  `id` int(10) NOT NULL,
  `tahun` int(11) NOT NULL,
  `noPo` int(11) NOT NULL,
  `lbnoPo` varchar(15) NOT NULL,
  `tanggal` date NOT NULL,
  `brand_id` int(11) NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `purchase1s`
--

INSERT INTO `purchase1s` (`id`, `tahun`, `noPo`, `lbnoPo`, `tanggal`, `brand_id`, `ket`) VALUES
(1, 2022, 1, 'E221', '2022-06-10', 1, 'po pertama bulan juli 2022');

-- --------------------------------------------------------

--
-- Struktur dari tabel `purchase2s`
--

CREATE TABLE `purchase2s` (
  `id` int(11) NOT NULL,
  `purchase1_id` int(11) NOT NULL,
  `sepatu2_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `purchase2s`
--

INSERT INTO `purchase2s` (`id`, `purchase1_id`, `sepatu2_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `purchase3s`
--

CREATE TABLE `purchase3s` (
  `id` int(11) NOT NULL,
  `purchase1_id` int(11) NOT NULL,
  `sepatu2_id` int(11) NOT NULL,
  `size` int(11) NOT NULL,
  `qty` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `purchase3s`
--

INSERT INTO `purchase3s` (`id`, `purchase1_id`, `sepatu2_id`, `size`, `qty`) VALUES
(1, 1, 1, 38, 100),
(2, 1, 1, 39, 100),
(3, 1, 1, 40, 100),
(4, 1, 1, 41, 100),
(5, 1, 2, 40, 100),
(6, 1, 2, 41, 200),
(7, 1, 3, 40, 100),
(8, 1, 3, 41, 100);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sales1`
--

CREATE TABLE `sales1` (
  `kode_sales1` int(10) UNSIGNED NOT NULL,
  `purchase1_id` int(11) DEFAULT NULL,
  `tahun` int(11) NOT NULL,
  `nosales` int(11) NOT NULL,
  `lbnosales` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date DEFAULT NULL,
  `kode_toko2` bigint(20) UNSIGNED DEFAULT NULL,
  `ketsales` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sales1`
--

INSERT INTO `sales1` (`kode_sales1`, `purchase1_id`, `tahun`, `nosales`, `lbnosales`, `tanggal`, `kode_toko2`, `ketsales`, `status`) VALUES
(1, NULL, 2022, 26, 'S22-026', '2022-05-23', 1, 'coba', ''),
(2, NULL, 2022, 27, 'S22-027', '2022-05-23', 2, '2', ''),
(3, NULL, 2022, 28, 'S22-028', '2022-05-23', 3, 'coba 3', ''),
(4, NULL, 2022, 18, 'S22-018', '2022-05-23', 4, 'proses', ''),
(5, NULL, 2022, 22, 'S22-022', '2022-05-24', 5, 'proses3', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sales2`
--

CREATE TABLE `sales2` (
  `idsales2` int(10) UNSIGNED NOT NULL,
  `kode_sales2` int(10) UNSIGNED NOT NULL,
  `idsepatu2` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sales2`
--

INSERT INTO `sales2` (`idsales2`, `kode_sales2`, `idsepatu2`) VALUES
(2, 1, 20),
(4, 1, 10),
(5, 1, 1),
(6, 2, 1),
(7, 3, 1),
(8, 3, 20),
(10, 4, 20),
(11, 4, 10),
(12, 4, 21),
(13, 4, 22),
(14, 5, 10),
(15, 5, 11),
(16, 5, 12),
(17, 5, 13),
(20, 1, 2),
(21, 1, 19);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sales3`
--

CREATE TABLE `sales3` (
  `idsales3` int(10) UNSIGNED NOT NULL,
  `kode_sales3` bigint(20) UNSIGNED NOT NULL,
  `idsepatu3` bigint(20) UNSIGNED NOT NULL,
  `size` int(11) NOT NULL,
  `qty` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sales3`
--

INSERT INTO `sales3` (`idsales3`, `kode_sales3`, `idsepatu3`, `size`, `qty`) VALUES
(7, 1, 20, 22, 100),
(8, 1, 20, 23, NULL),
(9, 1, 20, 24, 50),
(10, 1, 20, 25, NULL),
(11, 1, 20, 26, NULL),
(18, 1, 10, 38, 100),
(19, 1, 10, 39, 100),
(20, 1, 10, 40, 400),
(21, 1, 10, 41, 200),
(22, 1, 10, 42, NULL),
(23, 1, 10, 43, NULL),
(24, 1, 1, 38, NULL),
(25, 1, 1, 39, 100),
(26, 1, 1, 40, NULL),
(27, 1, 1, 41, 298),
(28, 1, 1, 42, NULL),
(29, 1, 1, 43, 1),
(30, 2, 1, 38, NULL),
(31, 2, 1, 39, NULL),
(32, 2, 1, 40, NULL),
(33, 2, 1, 41, 4),
(34, 2, 1, 42, NULL),
(35, 2, 1, 43, 1),
(36, 3, 1, 38, NULL),
(37, 3, 1, 39, NULL),
(38, 3, 1, 40, NULL),
(39, 3, 1, 41, 1),
(40, 3, 1, 42, NULL),
(41, 3, 1, 43, NULL),
(42, 3, 20, 22, NULL),
(43, 3, 20, 23, NULL),
(44, 3, 20, 24, NULL),
(45, 3, 20, 25, NULL),
(46, 3, 20, 26, 1),
(53, 4, 20, 22, NULL),
(54, 4, 20, 23, NULL),
(55, 4, 20, 24, NULL),
(56, 4, 20, 25, NULL),
(57, 4, 20, 26, 1),
(58, 4, 10, 38, 1),
(59, 4, 10, 39, NULL),
(60, 4, 10, 40, NULL),
(61, 4, 10, 41, NULL),
(62, 4, 10, 42, NULL),
(63, 4, 10, 43, NULL),
(64, 4, 21, 22, NULL),
(65, 4, 21, 23, NULL),
(66, 4, 21, 24, NULL),
(67, 4, 21, 25, NULL),
(68, 4, 21, 26, 1),
(69, 4, 22, 22, NULL),
(70, 4, 22, 23, NULL),
(71, 4, 22, 24, NULL),
(72, 4, 22, 25, NULL),
(73, 4, 22, 26, 1),
(74, 5, 10, 38, 1),
(75, 5, 10, 39, 1),
(76, 5, 10, 40, 1),
(77, 5, 10, 41, 1),
(78, 5, 10, 42, 1),
(79, 5, 10, 43, 2),
(80, 5, 11, 38, 2),
(81, 5, 11, 39, 2),
(82, 5, 11, 40, 2),
(83, 5, 11, 41, 2),
(84, 5, 11, 42, 2),
(85, 5, 11, 43, 2),
(86, 5, 12, 38, 3),
(87, 5, 12, 39, 3),
(88, 5, 12, 40, 3),
(89, 5, 12, 41, 3),
(90, 5, 12, 42, 3),
(91, 5, 12, 43, 3),
(92, 5, 13, 38, 4),
(93, 5, 13, 39, 4),
(94, 5, 13, 40, 4),
(95, 5, 13, 41, 4),
(96, 5, 13, 42, NULL),
(97, 5, 13, 43, 5),
(110, 1, 2, 38, NULL),
(111, 1, 2, 39, NULL),
(112, 1, 2, 40, NULL),
(113, 1, 2, 41, 30),
(114, 1, 2, 42, NULL),
(115, 1, 2, 43, 4),
(116, 1, 19, 22, NULL),
(117, 1, 19, 23, NULL),
(118, 1, 19, 24, 50),
(119, 1, 19, 25, 10),
(120, 1, 19, 26, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sepatu1`
--

CREATE TABLE `sepatu1` (
  `kode_sepatu1` int(10) UNSIGNED NOT NULL,
  `kode_brand2` bigint(20) UNSIGNED NOT NULL,
  `namastyle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sizemin` int(11) NOT NULL,
  `sizemax` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sepatu1`
--

INSERT INTO `sepatu1` (`kode_sepatu1`, `kode_brand2`, `namastyle`, `sizemin`, `sizemax`) VALUES
(1, 1, 'Gradial 1', 38, 43),
(2, 1, 'Gradial 2', 38, 43),
(3, 1, 'Gradial 3', 38, 43),
(4, 2, 'ATLANTIS IN', 38, 43),
(5, 2, 'BOURJOIS IN', 38, 43),
(6, 2, 'HYPNOTIZE IN', 38, 43),
(7, 3, 'IW Jodhpur', 22, 26),
(8, 3, 'IW Desert', 22, 26),
(9, 3, 'IW Port', 22, 26);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sepatu2`
--

CREATE TABLE `sepatu2` (
  `idsepatu` int(10) NOT NULL,
  `kode_sepatu2` int(11) NOT NULL,
  `kodeart` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `warna` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ketsepatu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sepatu2`
--

INSERT INTO `sepatu2` (`idsepatu`, `kode_sepatu2`, `kodeart`, `warna`, `ketsepatu`) VALUES
(1, 1, 'GD-88001', 'Mist + Dusk Pearl Rainbow', ''),
(2, 1, 'GD-88002', 'Seashell Shimmer + Silver Stripe', ''),
(3, 1, 'GD-88003', 'Sheashell Shimmer', ''),
(4, 2, 'GD-88004', 'Mist + Dusk Pearl Rainbow', ''),
(5, 2, 'GD-88005', 'Seashell Shimmer + Silver Stripe', ''),
(6, 2, 'GD-88006', 'Sheashell Shimmer', ''),
(7, 3, 'GD-88007', 'Mist + Dusk Pearl Rainbow', ''),
(8, 3, 'GD-88008', 'Seashell Shimmer + Silver Stripe', ''),
(9, 3, 'GD-88009', 'Sheashell Shimmer', ''),
(10, 4, 'FS-22001', 'DK. GREY RED STAR', ''),
(11, 4, 'FS-22002', 'BLACK GOLD', ''),
(12, 4, 'FS-22003', 'RED STAR SILVER', ''),
(13, 4, 'FS-22004', 'BLACK RED STAR', ''),
(14, 4, 'FS-22005', 'DIVA BLUE SILVER', ''),
(15, 4, 'FS-22006', 'RED STAR SILVER', ''),
(16, 5, 'FS-22007', 'BLACK GOLD', ''),
(17, 5, 'FS-22008', 'SILVER BLACK', ''),
(18, 5, 'FS-22009', 'DIVA BLUE WHITE', 'coba'),
(19, 7, '620825A', 'Navy', ''),
(20, 7, '620828A', 'Black', ''),
(21, 6, '620839', 'Rose Gold', 'coba'),
(22, 7, '620840', 'Copper', ''),
(23, 8, '620849', 'Midnight', ''),
(24, 8, '620856', 'Navy Metalic', ''),
(25, 8, '625207A', 'Caramel', ''),
(26, 1, '625217', 'Midnight', '111111');

-- --------------------------------------------------------

--
-- Struktur dari tabel `styles`
--

CREATE TABLE `styles` (
  `kode` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `namaStyle` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `styles`
--

INSERT INTO `styles` (`kode`, `namaStyle`) VALUES
('AT0001', 'ATLANTIS IN'),
('AT0002', 'ATLANTIS FG');

-- --------------------------------------------------------

--
-- Struktur dari tabel `toko`
--

CREATE TABLE `toko` (
  `kode_toko` int(10) UNSIGNED NOT NULL,
  `kode_kate2` bigint(20) UNSIGNED NOT NULL,
  `namatoko` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kota` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telp` bigint(15) DEFAULT NULL,
  `person` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `toko`
--

INSERT INTO `toko` (`kode_toko`, `kode_kate2`, `namatoko`, `alamat`, `kota`, `telp`, `person`) VALUES
(1, 1, 'Citra Abadi', 'komplek Semut Indah D-27', 'Surabaya', 1, ''),
(2, 4, 'Rebellindo', 'Abdul Wahab Siamin RA No. 8-9 Dukuh Pakis', 'Surabaya', 2, ''),
(3, 4, 'NICO', 'Jl. Panglima Sudirman', 'Batu', 3, ''),
(4, 4, 'Mitra Jaya Sport', 'Jl. Adi Sucipto 35', 'Tulungagung', 4, ''),
(5, 4, 'PRETTY', 'Jl. Jaksa Agung Suprapto 29', 'Tulungagung', 5, ''),
(6, 4, 'Cahaya Sport', 'Jl. Ahmad Yani 65-67', 'Jombang', 6, ''),
(7, 4, 'Izzul Sport', 'Jl. Kilisuci No.27 B', 'Kediri', 7, ''),
(8, 1, 'Arimbi', 'Ruko Dupak Megah Blok C No.3 Jl. Dupak 3-9', 'Surabaya', 8, ''),
(9, 4, 'Sidoarjo Sport', 'Jl. Dr. Cipto Mangunkusumo No. 12', 'Sidoarjo', 9, ''),
(10, 4, 'Toko12 Sport', 'Jl. Tanjung No. 41', 'Blitar', 10, ''),
(11, 3, 'Micro', 'Jl. Praban 12', 'Surabaya', 315321792, ''),
(12, 4, 'Jaya Makmur Sport', 'Ruko P. Sudirman B7-8', 'Probolinggo', 82341565757, ''),
(13, 4, 'Graha Sport', 'Jl. Kyai Ilyas No. 23', 'Lumajang', 13, ''),
(14, 4, 'Bali Mas', 'Jl. Untung Suropati No.19', 'Jember', 14, ''),
(15, 3, 'Borobudur Sport', 'Jl. Diponegoro 58', 'Jember', 15, ''),
(16, 4, 'Pemuda Sport', 'Jl. Pemuda 116', 'Situbondo', 83847770342, ''),
(17, 4, 'Omega Sport', 'Jl. Basuki Rahmat 134 B', 'Situbondo', 17, ''),
(18, 4, 'Suzanna', 'Jl. Ahmad Yani', 'Pandaan', 18, ''),
(19, 4, 'Toko Victory', 'Jl. Mastrip No. 68', 'Blitar', 19, ''),
(20, 4, 'GM Sport', 'Jl Gajah Mada Dusun Sawahan', 'Genteng', 20, ''),
(21, 4, 'FINA SPORT', 'Jl. Kaliurang', 'Yogyakarta', 21, ''),
(22, 4, 'KS Sport', 'Jl. Ringin Tirto 4', 'Purwokerto', 281623526, ''),
(23, 4, 'Langganan', 'Jl. Cihideung 44', 'Tasikmalaya', 23, ''),
(24, 4, 'Wongjoesport', 'Pekalongan Lampung Timur', 'Lampung', 24, ''),
(25, 3, 'Big Sport', 'Ruko Taman Palma Bunderan 2 Citra Raya Cikupa', 'Tangerang', 81282956519, ''),
(26, 3, 'Cemerlang', 'Gang Wiro Menggalan 19 Patukangan', 'Kendal', 26, ''),
(27, 4, 'Raya Sport', 'Jl Raya Gemah 22', 'Semarang', 27, ''),
(28, 3, 'Liga Sport', 'Jl. Yos Sudarso Majenang', 'Majenang', 28, ''),
(29, 3, 'Toko 88', 'Jl. Hassanudin 88', 'Makasar', 29, ''),
(30, 3, 'Kico sport', 'Jl. Letjend Suprapto 38 A Harapan mulya Kemayoran', 'Jakarta', 30, ''),
(31, 1, 'CV Arif Sport Solo', 'Jl. Sabang 12 Utara Pasar Legi', 'Surakarta', 31, ''),
(32, 3, 'Rejeki', 'Jl. Pulau Bengkulu no.3', 'Malang (Gudang)', 32, ''),
(33, 3, 'Toko Sneaker Zone', 'Jl. Sukarno Hatta No. 28 Jati Mulyo', 'Malang', 33, ''),
(34, 4, 'Toko Sepatu Jakarta', 'Jl. Trunojoyo no. 45', 'Pamekasan', 34, ''),
(35, 4, 'Gelora Sport', 'Jl. Kapten Dipta Sebelah Barat Lapangan Astira', 'Gianyar Denpasar', 35, ''),
(36, 3, 'Toko Perdana We Kiat', 'Jl Teuku Umar 108', 'Denpasar', 36, ''),
(37, 3, 'Djamin Sport', 'Jl. Kesatrian Karang Asem', 'Amlapura Bali', 37, ''),
(38, 5, 'Warung Bola', 'Jl Surapati 121 Singaraja', 'Bali', 38, ''),
(39, 3, 'Family', 'Jl. Komplek Pertokoan Bertais Mataram', 'Lombok', 39, ''),
(40, 4, 'Magenta Sport', 'Jl. Airlangga No. 5B', 'Mataram', 40, ''),
(41, 4, 'Cakar Mas', 'Jl. A.A Gede Ngurah No. 39-C Cakranegara', 'Lombok', 41, ''),
(42, 3, 'Toko Kawan', 'Jl. Ir. Soekarno No. 27', 'Tabanan', 42, ''),
(43, 2, 'Riks Sport', 'Taman Kopo Indah III Blok E 12B no.48', 'Bandung', 43, ''),
(44, 3, 'Niaga Sport', 'Perum Kirana Cibitung Jl Kirana Raya Blok C2 No. 1 RT 007/ RW 002 Wanajaya Cibitung', 'Bekasi', 81382535159, ''),
(45, 3, 'Sporty.id', 'Jl. Affandi Rt 06/ RW 03 No.29(selatan K24) Gejayan caturtunggal Depok Sleman', 'Yogyakarta', 8980050132, ''),
(46, 3, 'And1 Sport ', 'Jl. Pramuka gang Tanggul Desa Mlati Lor RT 03 RW 05 No.112 (belakang SD Kanisius)', 'Kudus', 82123311109, ''),
(47, 3, 'Sportaways', 'Ruko Graha Fernando No. 88E-F Jl. Komjen Pol M Yasin Kelapa Dua', 'Depok', 47, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `warnas`
--

CREATE TABLE `warnas` (
  `kode` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `namaWarna` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `warnas`
--

INSERT INTO `warnas` (`kode`, `namaWarna`) VALUES
('BG001', 'BLACK GOLD'),
('BRS001', 'BLACK RED STAR');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `art`
--
ALTER TABLE `art`
  ADD PRIMARY KEY (`kode`),
  ADD KEY `art_warna_kode_foreign` (`warna_kode`),
  ADD KEY `art_style_kode_foreign` (`style_kode`);

--
-- Indeks untuk tabel `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`kode_brand`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `kategoritoko`
--
ALTER TABLE `kategoritoko`
  ADD PRIMARY KEY (`kode_kate`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pabriks`
--
ALTER TABLE `pabriks`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `pemilik`
--
ALTER TABLE `pemilik`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `purchase1s`
--
ALTER TABLE `purchase1s`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `purchase2s`
--
ALTER TABLE `purchase2s`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `purchase3s`
--
ALTER TABLE `purchase3s`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sales1`
--
ALTER TABLE `sales1`
  ADD PRIMARY KEY (`kode_sales1`);

--
-- Indeks untuk tabel `sales2`
--
ALTER TABLE `sales2`
  ADD PRIMARY KEY (`idsales2`);

--
-- Indeks untuk tabel `sales3`
--
ALTER TABLE `sales3`
  ADD PRIMARY KEY (`idsales3`);

--
-- Indeks untuk tabel `sepatu1`
--
ALTER TABLE `sepatu1`
  ADD PRIMARY KEY (`kode_sepatu1`);

--
-- Indeks untuk tabel `sepatu2`
--
ALTER TABLE `sepatu2`
  ADD PRIMARY KEY (`idsepatu`);

--
-- Indeks untuk tabel `styles`
--
ALTER TABLE `styles`
  ADD PRIMARY KEY (`kode`);

--
-- Indeks untuk tabel `toko`
--
ALTER TABLE `toko`
  ADD PRIMARY KEY (`kode_toko`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indeks untuk tabel `warnas`
--
ALTER TABLE `warnas`
  ADD PRIMARY KEY (`kode`);
ALTER TABLE `warnas` ADD FULLTEXT KEY `namaWarna` (`namaWarna`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `brand`
--
ALTER TABLE `brand`
  MODIFY `kode_brand` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10005;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kategoritoko`
--
ALTER TABLE `kategoritoko`
  MODIFY `kode_kate` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `pabriks`
--
ALTER TABLE `pabriks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pemilik`
--
ALTER TABLE `pemilik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `purchase1s`
--
ALTER TABLE `purchase1s`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `purchase2s`
--
ALTER TABLE `purchase2s`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `purchase3s`
--
ALTER TABLE `purchase3s`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `sales1`
--
ALTER TABLE `sales1`
  MODIFY `kode_sales1` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `sales2`
--
ALTER TABLE `sales2`
  MODIFY `idsales2` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `sales3`
--
ALTER TABLE `sales3`
  MODIFY `idsales3` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT untuk tabel `sepatu1`
--
ALTER TABLE `sepatu1`
  MODIFY `kode_sepatu1` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1004;

--
-- AUTO_INCREMENT untuk tabel `sepatu2`
--
ALTER TABLE `sepatu2`
  MODIFY `idsepatu` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT untuk tabel `toko`
--
ALTER TABLE `toko`
  MODIFY `kode_toko` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `art`
--
ALTER TABLE `art`
  ADD CONSTRAINT `art_style_kode_foreign` FOREIGN KEY (`style_kode`) REFERENCES `styles` (`kode`),
  ADD CONSTRAINT `art_warna_kode_foreign` FOREIGN KEY (`warna_kode`) REFERENCES `warnas` (`kode`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

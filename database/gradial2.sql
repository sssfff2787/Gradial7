-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 22 Apr 2022 pada 00.44
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
(3, 'Spectra'),
(44, 'Rhumell');

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
  `kode_kat` int(10) UNSIGNED NOT NULL,
  `namakat` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diskon` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Struktur dari tabel `sales1`
--

CREATE TABLE `sales1` (
  `kode_sales1` int(10) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `kode_toko2` bigint(20) UNSIGNED NOT NULL,
  `ketsales` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sales1`
--

INSERT INTO `sales1` (`kode_sales1`, `tanggal`, `kode_toko2`, `ketsales`) VALUES
(1, '2022-01-01', 2, 'Request Seminggu jadi'),
(2, '2022-03-01', 1, 'Di kasih Tulisan New Brand');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sales2`
--

CREATE TABLE `sales2` (
  `idsales2` int(10) UNSIGNED NOT NULL,
  `kode_sales2` bigint(20) UNSIGNED NOT NULL,
  `idsepatu2` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sales2`
--

INSERT INTO `sales2` (`idsales2`, `kode_sales2`, `idsepatu2`) VALUES
(1, 1, 1),
(2, 2, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sales3`
--

CREATE TABLE `sales3` (
  `idsales` int(10) UNSIGNED NOT NULL,
  `kode_sales3` bigint(20) UNSIGNED NOT NULL,
  `idsepatu3` bigint(20) UNSIGNED NOT NULL,
  `size` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sales3`
--

INSERT INTO `sales3` (`idsales`, `kode_sales3`, `idsepatu3`, `size`, `qty`) VALUES
(1, 1, 1, 40, 10),
(2, 1, 1, 41, 15);

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
(1, 1, 'Diamond', 37, 45),
(2, 2, 'Alaska', 37, 45),
(3, 3, 'XPresi', 37, 45),
(1000, 1, 'maria', 27, 45);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sepatu2`
--

CREATE TABLE `sepatu2` (
  `idsepatu` int(10) UNSIGNED NOT NULL,
  `kode_sepatu2` bigint(20) UNSIGNED NOT NULL,
  `kodeart` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `warna` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ketsepatu` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sepatu2`
--

INSERT INTO `sepatu2` (`idsepatu`, `kode_sepatu2`, `kodeart`, `warna`, `ketsepatu`) VALUES
(1, 2, 'AL001', 'Hitam', 'Alaska Putih'),
(2, 2, 'DI001', 'Putih', 'Alaska Putih');

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
  `kode_kat2` bigint(20) UNSIGNED NOT NULL,
  `namatoko` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `kota` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` int(11) NOT NULL,
  `person` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `toko`
--

INSERT INTO `toko` (`kode_toko`, `kode_kat2`, `namatoko`, `alamat`, `kota`, `telp`, `person`) VALUES
(1, 1, 'Karunia Jaya', 'Jl. Merdeka No.5', 'Surabaya', 817878788, 'H. Mukidin'),
(2, 2, ' Jaya Baru Abadi', 'Jl. Mawar No.5', 'Surabaya', 817878974, 'H. Abidin');

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
  ADD PRIMARY KEY (`kode_kat`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
  ADD PRIMARY KEY (`idsales`);

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

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `brand`
--
ALTER TABLE `brand`
  MODIFY `kode_brand` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10003;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kategoritoko`
--
ALTER TABLE `kategoritoko`
  MODIFY `kode_kat` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `sales1`
--
ALTER TABLE `sales1`
  MODIFY `kode_sales1` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `sales2`
--
ALTER TABLE `sales2`
  MODIFY `idsales2` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `sales3`
--
ALTER TABLE `sales3`
  MODIFY `idsales` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `sepatu1`
--
ALTER TABLE `sepatu1`
  MODIFY `kode_sepatu1` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1002;

--
-- AUTO_INCREMENT untuk tabel `sepatu2`
--
ALTER TABLE `sepatu2`
  MODIFY `idsepatu` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `toko`
--
ALTER TABLE `toko`
  MODIFY `kode_toko` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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

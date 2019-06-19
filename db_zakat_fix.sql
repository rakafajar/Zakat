-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Jun 2019 pada 01.26
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_zakat`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cities`
--

CREATE TABLE `cities` (
  `id` char(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province_id` char(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `districts`
--

CREATE TABLE `districts` (
  `id` char(7) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_id` char(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_08_03_072729_create_provinces_table', 1),
(4, '2016_08_03_072750_create_cities_table', 1),
(5, '2016_08_03_072804_create_districts_table', 1),
(6, '2016_08_03_072819_create_villages_table', 1),
(7, '2019_06_19_090043_create_kartukeluarga_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `provinces`
--

CREATE TABLE `provinces` (
  `id` char(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kartukeluarga`
--

CREATE TABLE `tb_kartukeluarga` (
  `id_kk` int(10) UNSIGNED NOT NULL,
  `no_kk` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rt` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rw` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_pos` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provinces_id` char(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cities_id` char(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `districts_id` char(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `villages_id` char(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_cities`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_cities` (
`id_cities` char(4)
,`province_id` char(2)
,`name_cities` varchar(255)
,`id_provinces` char(2)
,`name_provinces` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_districts`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_districts` (
`id_cities` char(4)
,`province_id` char(2)
,`name_cities` varchar(255)
,`id_provinces` char(2)
,`name_provinces` varchar(255)
,`id_district` char(7)
,`city_id` char(4)
,`name_district` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_villages`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_villages` (
`id_villages` char(10)
,`district_id` char(7)
,`name_villages` varchar(255)
,`id_cities` char(4)
,`province_id` char(2)
,`name_cities` varchar(255)
,`id_provinces` char(2)
,`name_provinces` varchar(255)
,`id_district` char(7)
,`city_id` char(4)
,`name_district` varchar(255)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `villages`
--

CREATE TABLE `villages` (
  `id` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district_id` char(7) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_cities`
--
DROP TABLE IF EXISTS `view_cities`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_cities`  AS  select `a`.`id` AS `id_cities`,`a`.`province_id` AS `province_id`,`a`.`name` AS `name_cities`,`b`.`id` AS `id_provinces`,`b`.`name` AS `name_provinces` from (`cities` `a` join `provinces` `b`) where (`a`.`province_id` = `b`.`id`) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_districts`
--
DROP TABLE IF EXISTS `view_districts`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_districts`  AS  select `a`.`id_cities` AS `id_cities`,`a`.`province_id` AS `province_id`,`a`.`name_cities` AS `name_cities`,`a`.`id_provinces` AS `id_provinces`,`a`.`name_provinces` AS `name_provinces`,`b`.`id` AS `id_district`,`b`.`city_id` AS `city_id`,`b`.`name` AS `name_district` from (`view_cities` `a` join `districts` `b`) where (`a`.`id_cities` = `b`.`city_id`) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_villages`
--
DROP TABLE IF EXISTS `view_villages`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_villages`  AS  select `a`.`id` AS `id_villages`,`a`.`district_id` AS `district_id`,`a`.`name` AS `name_villages`,`b`.`id_cities` AS `id_cities`,`b`.`province_id` AS `province_id`,`b`.`name_cities` AS `name_cities`,`b`.`id_provinces` AS `id_provinces`,`b`.`name_provinces` AS `name_provinces`,`b`.`id_district` AS `id_district`,`b`.`city_id` AS `city_id`,`b`.`name_district` AS `name_district` from (`villages` `a` join `view_districts` `b`) where (`a`.`district_id` = `b`.`id_district`) ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cities_province_id_foreign` (`province_id`);

--
-- Indeks untuk tabel `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `districts_city_id_foreign` (`city_id`);

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
-- Indeks untuk tabel `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_kartukeluarga`
--
ALTER TABLE `tb_kartukeluarga`
  ADD PRIMARY KEY (`id_kk`),
  ADD KEY `tb_kartukeluarga_provinces_id_foreign` (`provinces_id`),
  ADD KEY `tb_kartukeluarga_cities_id_foreign` (`cities_id`),
  ADD KEY `tb_kartukeluarga_districts_id_foreign` (`districts_id`),
  ADD KEY `tb_kartukeluarga_villages_id_foreign` (`villages_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indeks untuk tabel `villages`
--
ALTER TABLE `villages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `villages_district_id_foreign` (`district_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_kartukeluarga`
--
ALTER TABLE `tb_kartukeluarga`
  MODIFY `id_kk` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_province_id_foreign` FOREIGN KEY (`province_id`) REFERENCES `provinces` (`id`);

--
-- Ketidakleluasaan untuk tabel `districts`
--
ALTER TABLE `districts`
  ADD CONSTRAINT `districts_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`);

--
-- Ketidakleluasaan untuk tabel `tb_kartukeluarga`
--
ALTER TABLE `tb_kartukeluarga`
  ADD CONSTRAINT `tb_kartukeluarga_cities_id_foreign` FOREIGN KEY (`cities_id`) REFERENCES `cities` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_kartukeluarga_districts_id_foreign` FOREIGN KEY (`districts_id`) REFERENCES `districts` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_kartukeluarga_provinces_id_foreign` FOREIGN KEY (`provinces_id`) REFERENCES `provinces` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_kartukeluarga_villages_id_foreign` FOREIGN KEY (`villages_id`) REFERENCES `villages` (`id`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `villages`
--
ALTER TABLE `villages`
  ADD CONSTRAINT `villages_district_id_foreign` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

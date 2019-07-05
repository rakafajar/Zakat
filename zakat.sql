-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Jul 2019 pada 01.21
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
(7, '2019_06_19_090043_create_kartukeluarga_table', 1),
(8, '2019_06_20_142547_create_agama_table', 1),
(9, '2019_06_20_145025_create_pendidikan_table', 1),
(10, '2019_06_20_145717_create_jenispekerjaan_table', 1),
(11, '2019_06_20_150014_create_statusperkawinan_table', 1),
(12, '2019_06_20_150142_create_hubkeluarga_table', 1),
(13, '2019_06_20_163738_create_anggotakk_table', 1),
(14, '2019_06_21_092323_create_golongan_table', 1),
(15, '2019_06_22_133245_create_mustahiq_table', 1),
(16, '2019_06_24_045816_create_muzakki_table', 1),
(17, '2019_06_24_054830_create_insha_table', 1),
(18, '2019_06_24_055217_create_fidyah_table', 1),
(19, '2019_06_25_180813_create_harga_table', 1),
(20, '2019_06_25_181219_create_jenis_wakaf_table', 1),
(21, '2019_06_25_181240_create_wakaf_table', 1),
(22, '2019_06_26_072552_create_zakat_fitrah_table', 1),
(23, '2019_06_27_142442_create_zakat_maal_table', 1);

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
-- Struktur dari tabel `tb_agama`
--

CREATE TABLE `tb_agama` (
  `id_agama` int(10) UNSIGNED NOT NULL,
  `nama_agama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_anggotakk`
--

CREATE TABLE `tb_anggotakk` (
  `id_anggotakk` int(10) UNSIGNED NOT NULL,
  `nama_lengkap` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` char(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kk` int(10) UNSIGNED NOT NULL,
  `jk` enum('Laki-laki','Perempuan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `tmp_lahir` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `id_agama` int(10) UNSIGNED NOT NULL,
  `id_pendidikan` int(10) UNSIGNED NOT NULL,
  `id_pekerjaan` int(10) UNSIGNED NOT NULL,
  `id_status_kawin` int(10) UNSIGNED NOT NULL,
  `id_status_hubkel` int(10) UNSIGNED NOT NULL,
  `kewarganegaraan` enum('WNI','WNA') COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_paspor` char(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_kitap` char(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ayah` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ibu` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_fidyah`
--

CREATE TABLE `tb_fidyah` (
  `id_fidyah` int(10) UNSIGNED NOT NULL,
  `id_anggotakk` int(10) UNSIGNED NOT NULL,
  `nominal_fidyah` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_golongan`
--

CREATE TABLE `tb_golongan` (
  `id_golongan` int(10) UNSIGNED NOT NULL,
  `nama_golongan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_harga`
--

CREATE TABLE `tb_harga` (
  `id_harga` int(10) UNSIGNED NOT NULL,
  `harga_beras` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_hubkeluarga`
--

CREATE TABLE `tb_hubkeluarga` (
  `id_hubkeluarga` int(10) UNSIGNED NOT NULL,
  `nama_hubkeluarga` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_insha`
--

CREATE TABLE `tb_insha` (
  `id_insha` int(10) UNSIGNED NOT NULL,
  `id_anggotakk` int(10) UNSIGNED NOT NULL,
  `nominal_insha` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jenispekerjaan`
--

CREATE TABLE `tb_jenispekerjaan` (
  `id_pekerjaan` int(10) UNSIGNED NOT NULL,
  `nama_pekerjaan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jeniswakaf`
--

CREATE TABLE `tb_jeniswakaf` (
  `id_jeniswakaf` int(10) UNSIGNED NOT NULL,
  `jenis_wakaf` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
  `villages_id` char(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_mustahiq`
--

CREATE TABLE `tb_mustahiq` (
  `id_mustahiq` int(10) UNSIGNED NOT NULL,
  `id_anggotakk` int(10) UNSIGNED NOT NULL,
  `id_golongan` int(10) UNSIGNED NOT NULL,
  `wilayah` enum('Internal','Eksternal') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_muzakki`
--

CREATE TABLE `tb_muzakki` (
  `id_muzakki` int(10) UNSIGNED NOT NULL,
  `id_anggotakk` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pendidikan`
--

CREATE TABLE `tb_pendidikan` (
  `id_pendidikan` int(10) UNSIGNED NOT NULL,
  `nama_pendidikan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_statusperkawinan`
--

CREATE TABLE `tb_statusperkawinan` (
  `id_status` int(10) UNSIGNED NOT NULL,
  `nama_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_wakaf`
--

CREATE TABLE `tb_wakaf` (
  `id_wakaf` int(10) UNSIGNED NOT NULL,
  `id_anggotakk` int(10) UNSIGNED NOT NULL,
  `id_jeniswakaf` int(10) UNSIGNED NOT NULL,
  `nominal_wakaf` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_zakat_fitrah`
--

CREATE TABLE `tb_zakat_fitrah` (
  `id_zfitrah` int(10) UNSIGNED NOT NULL,
  `id_muzakki` int(10) UNSIGNED NOT NULL,
  `harga_beras` int(11) NOT NULL,
  `nominal` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_zakat_maal`
--

CREATE TABLE `tb_zakat_maal` (
  `id_zmaal` int(10) UNSIGNED NOT NULL,
  `id_muzakki` int(10) UNSIGNED NOT NULL,
  `jml` int(11) NOT NULL,
  `harga_emas` int(11) NOT NULL,
  `nisab` int(11) NOT NULL,
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
-- Stand-in struktur untuk tampilan `view_anggotakk`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_anggotakk` (
`id_anggotakk` int(10) unsigned
,`nama_lengkap` varchar(191)
,`nik` char(191)
,`id_kk` int(10) unsigned
,`no_kk` varchar(20)
,`jk` enum('Laki-laki','Perempuan')
,`tmp_lahir` varchar(191)
,`tgl_lahir` date
,`id_agama` int(10) unsigned
,`nama_agama` varchar(191)
,`id_pendidikan` int(10) unsigned
,`nama_pendidikan` varchar(191)
,`id_pekerjaan` int(10) unsigned
,`nama_pekerjaan` varchar(191)
,`id_status_kawin` int(10) unsigned
,`nama_status` varchar(191)
,`id_status_hubkel` int(10) unsigned
,`nama_hubkeluarga` varchar(191)
,`kewarganegaraan` enum('WNI','WNA')
,`no_paspor` char(191)
,`no_kitap` char(191)
,`ayah` varchar(191)
,`ibu` varchar(191)
);

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
-- Stand-in struktur untuk tampilan `view_fidyah`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_fidyah` (
`id_fidyah` int(10) unsigned
,`id_anggotakk` int(10) unsigned
,`nominal_fidyah` int(11)
,`created_at` timestamp
,`updated_at` timestamp
,`nama_lengkap` varchar(191)
,`nik` char(191)
,`no_kk` varchar(20)
,`jk` enum('Laki-laki','Perempuan')
,`tmp_lahir` varchar(191)
,`tgl_lahir` date
,`nama_agama` varchar(191)
,`nama_pendidikan` varchar(191)
,`nama_pekerjaan` varchar(191)
,`nama_status` varchar(191)
,`nama_hubkeluarga` varchar(191)
,`kewarganegaraan` enum('WNI','WNA')
,`no_paspor` char(191)
,`no_kitap` char(191)
,`ayah` varchar(191)
,`ibu` varchar(191)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_kartukeluarga`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_kartukeluarga` (
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
,`id_kk` int(10) unsigned
,`no_kk` varchar(20)
,`alamat` text
,`rt` varchar(10)
,`rw` varchar(10)
,`kode_pos` varchar(10)
,`villages_id` char(191)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_mustahiq`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_mustahiq` (
`id_mustahiq` int(10) unsigned
,`id_anggotakk` int(10) unsigned
,`nik` char(191)
,`nama_lengkap` varchar(191)
,`id_golongan` int(10) unsigned
,`nama_golongan` varchar(191)
,`wilayah` enum('Internal','Eksternal')
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_muzakki`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_muzakki` (
`id_muzakki` int(10) unsigned
,`nama_lengkap` varchar(191)
,`id_kk` int(10) unsigned
,`no_kk` varchar(20)
,`id_anggotakk` int(10) unsigned
,`nik` char(191)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_total_kas_fidyah`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_total_kas_fidyah` (
`total_kas_fidyah` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_total_kas_insha`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_total_kas_insha` (
`total_kas_insha` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_total_kas_wakaf`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_total_kas_wakaf` (
`total_kas_wakaf` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_total_kas_zakat_fitrah`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_total_kas_zakat_fitrah` (
`total_kas_zakat_fitrah` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_total_kas_zakat_maal`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_total_kas_zakat_maal` (
`total_kas_zakat_maal` decimal(32,0)
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
-- Stand-in struktur untuk tampilan `view_wakaf`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_wakaf` (
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_wakaf_to_muzakki`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_wakaf_to_muzakki` (
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_zakat_fitrah`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_zakat_fitrah` (
`id_zfitrah` int(10) unsigned
,`id_muzakki` int(10) unsigned
,`harga_beras` int(11)
,`nominal` int(11)
,`created_at` timestamp
,`updated_at` timestamp
,`nama_lengkap` varchar(191)
,`no_kk` varchar(20)
,`nik` char(191)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_zakat_maal`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_zakat_maal` (
`id_zmaal` int(10) unsigned
,`id_muzakki` int(10) unsigned
,`jml` int(11)
,`harga_emas` int(11)
,`nisab` int(11)
,`created_at` timestamp
,`updated_at` timestamp
,`nama_lengkap` varchar(191)
,`no_kk` varchar(20)
,`nik` char(191)
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
-- Struktur untuk view `view_anggotakk`
--
DROP TABLE IF EXISTS `view_anggotakk`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_anggotakk`  AS  select `a`.`id_anggotakk` AS `id_anggotakk`,`a`.`nama_lengkap` AS `nama_lengkap`,`a`.`nik` AS `nik`,`a`.`id_kk` AS `id_kk`,`b`.`no_kk` AS `no_kk`,`a`.`jk` AS `jk`,`a`.`tmp_lahir` AS `tmp_lahir`,`a`.`tgl_lahir` AS `tgl_lahir`,`a`.`id_agama` AS `id_agama`,`c`.`nama_agama` AS `nama_agama`,`a`.`id_pendidikan` AS `id_pendidikan`,`d`.`nama_pendidikan` AS `nama_pendidikan`,`a`.`id_pekerjaan` AS `id_pekerjaan`,`e`.`nama_pekerjaan` AS `nama_pekerjaan`,`a`.`id_status_kawin` AS `id_status_kawin`,`f`.`nama_status` AS `nama_status`,`a`.`id_status_hubkel` AS `id_status_hubkel`,`g`.`nama_hubkeluarga` AS `nama_hubkeluarga`,`a`.`kewarganegaraan` AS `kewarganegaraan`,`a`.`no_paspor` AS `no_paspor`,`a`.`no_kitap` AS `no_kitap`,`a`.`ayah` AS `ayah`,`a`.`ibu` AS `ibu` from ((((((`tb_anggotakk` `a` join `tb_kartukeluarga` `b` on((`a`.`id_kk` = `b`.`id_kk`))) join `tb_agama` `c` on((`a`.`id_agama` = `c`.`id_agama`))) join `tb_pendidikan` `d` on((`a`.`id_pendidikan` = `d`.`id_pendidikan`))) join `tb_jenispekerjaan` `e` on((`a`.`id_pekerjaan` = `e`.`id_pekerjaan`))) join `tb_statusperkawinan` `f` on((`a`.`id_status_kawin` = `f`.`id_status`))) join `tb_hubkeluarga` `g` on((`a`.`id_status_hubkel` = `g`.`id_hubkeluarga`))) ;

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
-- Struktur untuk view `view_fidyah`
--
DROP TABLE IF EXISTS `view_fidyah`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_fidyah`  AS  select `a`.`id_fidyah` AS `id_fidyah`,`a`.`id_anggotakk` AS `id_anggotakk`,`a`.`nominal_fidyah` AS `nominal_fidyah`,`a`.`created_at` AS `created_at`,`a`.`updated_at` AS `updated_at`,`b`.`nama_lengkap` AS `nama_lengkap`,`b`.`nik` AS `nik`,`b`.`no_kk` AS `no_kk`,`b`.`jk` AS `jk`,`b`.`tmp_lahir` AS `tmp_lahir`,`b`.`tgl_lahir` AS `tgl_lahir`,`b`.`nama_agama` AS `nama_agama`,`b`.`nama_pendidikan` AS `nama_pendidikan`,`b`.`nama_pekerjaan` AS `nama_pekerjaan`,`b`.`nama_status` AS `nama_status`,`b`.`nama_hubkeluarga` AS `nama_hubkeluarga`,`b`.`kewarganegaraan` AS `kewarganegaraan`,`b`.`no_paspor` AS `no_paspor`,`b`.`no_kitap` AS `no_kitap`,`b`.`ayah` AS `ayah`,`b`.`ibu` AS `ibu` from (`tb_fidyah` `a` join `view_anggotakk` `b`) where (`a`.`id_anggotakk` = `b`.`id_anggotakk`) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_kartukeluarga`
--
DROP TABLE IF EXISTS `view_kartukeluarga`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_kartukeluarga`  AS  select `a`.`id_villages` AS `id_villages`,`a`.`district_id` AS `district_id`,`a`.`name_villages` AS `name_villages`,`a`.`id_cities` AS `id_cities`,`a`.`province_id` AS `province_id`,`a`.`name_cities` AS `name_cities`,`a`.`id_provinces` AS `id_provinces`,`a`.`name_provinces` AS `name_provinces`,`a`.`id_district` AS `id_district`,`a`.`city_id` AS `city_id`,`a`.`name_district` AS `name_district`,`b`.`id_kk` AS `id_kk`,`b`.`no_kk` AS `no_kk`,`b`.`alamat` AS `alamat`,`b`.`rt` AS `rt`,`b`.`rw` AS `rw`,`b`.`kode_pos` AS `kode_pos`,`b`.`villages_id` AS `villages_id` from (`view_villages` `a` join `tb_kartukeluarga` `b`) where (`a`.`id_villages` = `b`.`villages_id`) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_mustahiq`
--
DROP TABLE IF EXISTS `view_mustahiq`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_mustahiq`  AS  select `a`.`id_mustahiq` AS `id_mustahiq`,`a`.`id_anggotakk` AS `id_anggotakk`,`b`.`nik` AS `nik`,`b`.`nama_lengkap` AS `nama_lengkap`,`a`.`id_golongan` AS `id_golongan`,`c`.`nama_golongan` AS `nama_golongan`,`a`.`wilayah` AS `wilayah` from ((`tb_mustahiq` `a` join `tb_anggotakk` `b`) join `tb_golongan` `c`) where ((`a`.`id_anggotakk` = `b`.`id_anggotakk`) and (`a`.`id_golongan` = `c`.`id_golongan`)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_muzakki`
--
DROP TABLE IF EXISTS `view_muzakki`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_muzakki`  AS  select `a`.`id_muzakki` AS `id_muzakki`,`b`.`nama_lengkap` AS `nama_lengkap`,`b`.`id_kk` AS `id_kk`,`b`.`no_kk` AS `no_kk`,`b`.`id_anggotakk` AS `id_anggotakk`,`b`.`nik` AS `nik` from (`tb_muzakki` `a` join `view_anggotakk` `b`) where (`a`.`id_anggotakk` = `b`.`id_anggotakk`) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_total_kas_fidyah`
--
DROP TABLE IF EXISTS `view_total_kas_fidyah`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_total_kas_fidyah`  AS  select sum(`a`.`nominal_fidyah`) AS `total_kas_fidyah` from `tb_fidyah` `a` ;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_total_kas_insha`
--
DROP TABLE IF EXISTS `view_total_kas_insha`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_total_kas_insha`  AS  select sum(`a`.`nominal_insha`) AS `total_kas_insha` from `tb_insha` `a` ;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_total_kas_wakaf`
--
DROP TABLE IF EXISTS `view_total_kas_wakaf`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_total_kas_wakaf`  AS  select sum(`tb_wakaf`.`nominal_wakaf`) AS `total_kas_wakaf` from `tb_wakaf` ;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_total_kas_zakat_fitrah`
--
DROP TABLE IF EXISTS `view_total_kas_zakat_fitrah`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_total_kas_zakat_fitrah`  AS  select sum(`tb_zakat_fitrah`.`nominal`) AS `total_kas_zakat_fitrah` from `tb_zakat_fitrah` ;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_total_kas_zakat_maal`
--
DROP TABLE IF EXISTS `view_total_kas_zakat_maal`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_total_kas_zakat_maal`  AS  select sum(`tb_zakat_maal`.`nisab`) AS `total_kas_zakat_maal` from `tb_zakat_maal` ;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_villages`
--
DROP TABLE IF EXISTS `view_villages`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_villages`  AS  select `a`.`id` AS `id_villages`,`a`.`district_id` AS `district_id`,`a`.`name` AS `name_villages`,`b`.`id_cities` AS `id_cities`,`b`.`province_id` AS `province_id`,`b`.`name_cities` AS `name_cities`,`b`.`id_provinces` AS `id_provinces`,`b`.`name_provinces` AS `name_provinces`,`b`.`id_district` AS `id_district`,`b`.`city_id` AS `city_id`,`b`.`name_district` AS `name_district` from (`villages` `a` join `view_districts` `b`) where (`a`.`district_id` = `b`.`id_district`) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_wakaf`
--
DROP TABLE IF EXISTS `view_wakaf`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_wakaf`  AS  select `a`.`jenis_wakaf` AS `jenis_wakaf`,`b`.`id_wakaf` AS `id_wakaf`,`b`.`id_muzakki` AS `id_muzakki`,`b`.`id_jeniswakaf` AS `id_jeniswakaf`,`b`.`nominal_wakaf` AS `nominal_wakaf`,`b`.`created_at` AS `created_at`,`b`.`updated_at` AS `updated_at`,`b`.`nama_lengkap` AS `nama_lengkap`,`b`.`no_kk` AS `no_kk`,`b`.`nik` AS `nik` from (`tb_jeniswakaf` `a` join `view_wakaf_to_muzakki` `b`) where (`a`.`id_jeniswakaf` = `b`.`id_jeniswakaf`) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_wakaf_to_muzakki`
--
DROP TABLE IF EXISTS `view_wakaf_to_muzakki`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_wakaf_to_muzakki`  AS  select `a`.`id_wakaf` AS `id_wakaf`,`a`.`id_muzakki` AS `id_muzakki`,`a`.`id_jeniswakaf` AS `id_jeniswakaf`,`a`.`nominal_wakaf` AS `nominal_wakaf`,`a`.`created_at` AS `created_at`,`a`.`updated_at` AS `updated_at`,`b`.`nama_lengkap` AS `nama_lengkap`,`b`.`no_kk` AS `no_kk`,`b`.`nik` AS `nik` from (`tb_wakaf` `a` join `view_muzakki` `b`) where (`a`.`id_muzakki` = `b`.`id_muzakki`) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_zakat_fitrah`
--
DROP TABLE IF EXISTS `view_zakat_fitrah`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_zakat_fitrah`  AS  select `a`.`id_zfitrah` AS `id_zfitrah`,`a`.`id_muzakki` AS `id_muzakki`,`a`.`harga_beras` AS `harga_beras`,`a`.`nominal` AS `nominal`,`a`.`created_at` AS `created_at`,`a`.`updated_at` AS `updated_at`,`b`.`nama_lengkap` AS `nama_lengkap`,`b`.`no_kk` AS `no_kk`,`b`.`nik` AS `nik` from (`tb_zakat_fitrah` `a` join `view_muzakki` `b`) where (`a`.`id_muzakki` = `b`.`id_muzakki`) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_zakat_maal`
--
DROP TABLE IF EXISTS `view_zakat_maal`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_zakat_maal`  AS  select `a`.`id_zmaal` AS `id_zmaal`,`a`.`id_muzakki` AS `id_muzakki`,`a`.`jml` AS `jml`,`a`.`harga_emas` AS `harga_emas`,`a`.`nisab` AS `nisab`,`a`.`created_at` AS `created_at`,`a`.`updated_at` AS `updated_at`,`b`.`nama_lengkap` AS `nama_lengkap`,`b`.`no_kk` AS `no_kk`,`b`.`nik` AS `nik` from (`tb_zakat_maal` `a` join `view_muzakki` `b`) where (`a`.`id_muzakki` = `b`.`id_muzakki`) ;

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
-- Indeks untuk tabel `tb_agama`
--
ALTER TABLE `tb_agama`
  ADD PRIMARY KEY (`id_agama`);

--
-- Indeks untuk tabel `tb_anggotakk`
--
ALTER TABLE `tb_anggotakk`
  ADD PRIMARY KEY (`id_anggotakk`),
  ADD KEY `tb_anggotakk_id_kk_foreign` (`id_kk`),
  ADD KEY `tb_anggotakk_id_agama_foreign` (`id_agama`),
  ADD KEY `tb_anggotakk_id_pendidikan_foreign` (`id_pendidikan`),
  ADD KEY `tb_anggotakk_id_pekerjaan_foreign` (`id_pekerjaan`),
  ADD KEY `tb_anggotakk_id_status_kawin_foreign` (`id_status_kawin`),
  ADD KEY `tb_anggotakk_id_status_hubkel_foreign` (`id_status_hubkel`);

--
-- Indeks untuk tabel `tb_fidyah`
--
ALTER TABLE `tb_fidyah`
  ADD PRIMARY KEY (`id_fidyah`),
  ADD KEY `tb_fidyah_id_anggotakk_foreign` (`id_anggotakk`);

--
-- Indeks untuk tabel `tb_golongan`
--
ALTER TABLE `tb_golongan`
  ADD PRIMARY KEY (`id_golongan`);

--
-- Indeks untuk tabel `tb_harga`
--
ALTER TABLE `tb_harga`
  ADD PRIMARY KEY (`id_harga`);

--
-- Indeks untuk tabel `tb_hubkeluarga`
--
ALTER TABLE `tb_hubkeluarga`
  ADD PRIMARY KEY (`id_hubkeluarga`);

--
-- Indeks untuk tabel `tb_insha`
--
ALTER TABLE `tb_insha`
  ADD PRIMARY KEY (`id_insha`),
  ADD KEY `tb_insha_id_anggotakk_foreign` (`id_anggotakk`);

--
-- Indeks untuk tabel `tb_jenispekerjaan`
--
ALTER TABLE `tb_jenispekerjaan`
  ADD PRIMARY KEY (`id_pekerjaan`);

--
-- Indeks untuk tabel `tb_jeniswakaf`
--
ALTER TABLE `tb_jeniswakaf`
  ADD PRIMARY KEY (`id_jeniswakaf`);

--
-- Indeks untuk tabel `tb_kartukeluarga`
--
ALTER TABLE `tb_kartukeluarga`
  ADD PRIMARY KEY (`id_kk`),
  ADD KEY `tb_kartukeluarga_villages_id_foreign` (`villages_id`);

--
-- Indeks untuk tabel `tb_mustahiq`
--
ALTER TABLE `tb_mustahiq`
  ADD PRIMARY KEY (`id_mustahiq`),
  ADD KEY `tb_mustahiq_id_anggotakk_foreign` (`id_anggotakk`),
  ADD KEY `tb_mustahiq_id_golongan_foreign` (`id_golongan`);

--
-- Indeks untuk tabel `tb_muzakki`
--
ALTER TABLE `tb_muzakki`
  ADD PRIMARY KEY (`id_muzakki`),
  ADD KEY `tb_muzakki_id_anggotakk_foreign` (`id_anggotakk`);

--
-- Indeks untuk tabel `tb_pendidikan`
--
ALTER TABLE `tb_pendidikan`
  ADD PRIMARY KEY (`id_pendidikan`);

--
-- Indeks untuk tabel `tb_statusperkawinan`
--
ALTER TABLE `tb_statusperkawinan`
  ADD PRIMARY KEY (`id_status`);

--
-- Indeks untuk tabel `tb_wakaf`
--
ALTER TABLE `tb_wakaf`
  ADD PRIMARY KEY (`id_wakaf`),
  ADD KEY `tb_wakaf_id_jeniswakaf_foreign` (`id_jeniswakaf`),
  ADD KEY `tb_wakaf_id_anggotakk_foreign` (`id_anggotakk`);

--
-- Indeks untuk tabel `tb_zakat_fitrah`
--
ALTER TABLE `tb_zakat_fitrah`
  ADD PRIMARY KEY (`id_zfitrah`),
  ADD KEY `tb_zakat_fitrah_id_muzakki_foreign` (`id_muzakki`);

--
-- Indeks untuk tabel `tb_zakat_maal`
--
ALTER TABLE `tb_zakat_maal`
  ADD PRIMARY KEY (`id_zmaal`),
  ADD KEY `tb_zakat_maal_id_muzakki_foreign` (`id_muzakki`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `tb_agama`
--
ALTER TABLE `tb_agama`
  MODIFY `id_agama` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_anggotakk`
--
ALTER TABLE `tb_anggotakk`
  MODIFY `id_anggotakk` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_fidyah`
--
ALTER TABLE `tb_fidyah`
  MODIFY `id_fidyah` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_golongan`
--
ALTER TABLE `tb_golongan`
  MODIFY `id_golongan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_harga`
--
ALTER TABLE `tb_harga`
  MODIFY `id_harga` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_hubkeluarga`
--
ALTER TABLE `tb_hubkeluarga`
  MODIFY `id_hubkeluarga` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_insha`
--
ALTER TABLE `tb_insha`
  MODIFY `id_insha` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_jenispekerjaan`
--
ALTER TABLE `tb_jenispekerjaan`
  MODIFY `id_pekerjaan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_jeniswakaf`
--
ALTER TABLE `tb_jeniswakaf`
  MODIFY `id_jeniswakaf` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_kartukeluarga`
--
ALTER TABLE `tb_kartukeluarga`
  MODIFY `id_kk` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_mustahiq`
--
ALTER TABLE `tb_mustahiq`
  MODIFY `id_mustahiq` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_muzakki`
--
ALTER TABLE `tb_muzakki`
  MODIFY `id_muzakki` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_pendidikan`
--
ALTER TABLE `tb_pendidikan`
  MODIFY `id_pendidikan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_statusperkawinan`
--
ALTER TABLE `tb_statusperkawinan`
  MODIFY `id_status` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_wakaf`
--
ALTER TABLE `tb_wakaf`
  MODIFY `id_wakaf` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_zakat_fitrah`
--
ALTER TABLE `tb_zakat_fitrah`
  MODIFY `id_zfitrah` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_zakat_maal`
--
ALTER TABLE `tb_zakat_maal`
  MODIFY `id_zmaal` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

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
-- Ketidakleluasaan untuk tabel `tb_anggotakk`
--
ALTER TABLE `tb_anggotakk`
  ADD CONSTRAINT `tb_anggotakk_id_agama_foreign` FOREIGN KEY (`id_agama`) REFERENCES `tb_agama` (`id_agama`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_anggotakk_id_kk_foreign` FOREIGN KEY (`id_kk`) REFERENCES `tb_kartukeluarga` (`id_kk`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_anggotakk_id_pekerjaan_foreign` FOREIGN KEY (`id_pekerjaan`) REFERENCES `tb_jenispekerjaan` (`id_pekerjaan`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_anggotakk_id_pendidikan_foreign` FOREIGN KEY (`id_pendidikan`) REFERENCES `tb_pendidikan` (`id_pendidikan`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_anggotakk_id_status_hubkel_foreign` FOREIGN KEY (`id_status_hubkel`) REFERENCES `tb_hubkeluarga` (`id_hubkeluarga`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_anggotakk_id_status_kawin_foreign` FOREIGN KEY (`id_status_kawin`) REFERENCES `tb_statusperkawinan` (`id_status`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_fidyah`
--
ALTER TABLE `tb_fidyah`
  ADD CONSTRAINT `tb_fidyah_id_anggotakk_foreign` FOREIGN KEY (`id_anggotakk`) REFERENCES `tb_anggotakk` (`id_anggotakk`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_insha`
--
ALTER TABLE `tb_insha`
  ADD CONSTRAINT `tb_insha_id_anggotakk_foreign` FOREIGN KEY (`id_anggotakk`) REFERENCES `tb_anggotakk` (`id_anggotakk`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_kartukeluarga`
--
ALTER TABLE `tb_kartukeluarga`
  ADD CONSTRAINT `tb_kartukeluarga_villages_id_foreign` FOREIGN KEY (`villages_id`) REFERENCES `villages` (`id`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_mustahiq`
--
ALTER TABLE `tb_mustahiq`
  ADD CONSTRAINT `tb_mustahiq_id_anggotakk_foreign` FOREIGN KEY (`id_anggotakk`) REFERENCES `tb_anggotakk` (`id_anggotakk`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_mustahiq_id_golongan_foreign` FOREIGN KEY (`id_golongan`) REFERENCES `tb_golongan` (`id_golongan`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_muzakki`
--
ALTER TABLE `tb_muzakki`
  ADD CONSTRAINT `tb_muzakki_id_anggotakk_foreign` FOREIGN KEY (`id_anggotakk`) REFERENCES `tb_anggotakk` (`id_anggotakk`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_wakaf`
--
ALTER TABLE `tb_wakaf`
  ADD CONSTRAINT `tb_wakaf_id_anggotakk_foreign` FOREIGN KEY (`id_anggotakk`) REFERENCES `tb_anggotakk` (`id_anggotakk`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_wakaf_id_jeniswakaf_foreign` FOREIGN KEY (`id_jeniswakaf`) REFERENCES `tb_jeniswakaf` (`id_jeniswakaf`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_zakat_fitrah`
--
ALTER TABLE `tb_zakat_fitrah`
  ADD CONSTRAINT `tb_zakat_fitrah_id_muzakki_foreign` FOREIGN KEY (`id_muzakki`) REFERENCES `tb_muzakki` (`id_muzakki`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_zakat_maal`
--
ALTER TABLE `tb_zakat_maal`
  ADD CONSTRAINT `tb_zakat_maal_id_muzakki_foreign` FOREIGN KEY (`id_muzakki`) REFERENCES `tb_muzakki` (`id_muzakki`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `villages`
--
ALTER TABLE `villages`
  ADD CONSTRAINT `villages_district_id_foreign` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Jul 2024 pada 19.51
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `posyandu`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dataremajas`
--

CREATE TABLE `dataremajas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `NIK` varchar(255) NOT NULL,
  `Nama` varchar(255) NOT NULL,
  `TempatLahir` varchar(255) NOT NULL,
  `TanggalLahir` varchar(255) NOT NULL,
  `JenisKelamin` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `dataremajas`
--

INSERT INTO `dataremajas` (`id`, `NIK`, `Nama`, `TempatLahir`, `TanggalLahir`, `JenisKelamin`, `created_at`, `updated_at`) VALUES
(2, '121', 'TIo', 'bandung', '0001-12-12', 'Perempuan', '2024-07-09 08:44:44', '2024-07-09 08:44:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwalkonselings`
--

CREATE TABLE `jadwalkonselings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `TanggalKegiatan` varchar(255) NOT NULL,
  `NamaKegiatan` varchar(255) NOT NULL,
  `NamaBidan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jadwalkonselings`
--

INSERT INTO `jadwalkonselings` (`id`, `TanggalKegiatan`, `NamaKegiatan`, `NamaBidan`, `created_at`, `updated_at`) VALUES
(1, '2022-10-20', 'Neangan randa', 'udin', '2024-07-08 05:55:34', '2024-07-08 05:55:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kegiatankaders`
--

CREATE TABLE `kegiatankaders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Tanggal` date NOT NULL,
  `Nama` varchar(255) NOT NULL,
  `Jabatan` varchar(255) NOT NULL,
  `UraianKegiatan` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `caption` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kegiatankaders`
--

INSERT INTO `kegiatankaders` (`id`, `Tanggal`, `Nama`, `Jabatan`, `UraianKegiatan`, `image`, `caption`, `created_at`, `updated_at`) VALUES
(1, '2024-02-20', 'a', 'a', 'aa', '1720719457-669018613e288.jpg', NULL, '2024-07-08 06:00:39', '2024-07-11 10:37:37'),
(2, '2024-07-12', 'as', 'asa', 'asa', '1720718966-6690167669e57.jpg', '<p>asa</p>', '2024-07-11 10:29:26', '2024-07-11 10:29:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_11_20_023400_create_dataremajas_table', 1),
(6, '2023_12_01_132314_create_jadwalkonselings_table', 1),
(7, '2023_12_01_145313_create_prokerposyandus_table', 1),
(8, '2023_12_01_154303_create_kegiatankaders_table', 1),
(9, '2023_12_11_034333_create_riwayats_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesertakonselings`
--

CREATE TABLE `pesertakonselings` (
  `id` int(11) NOT NULL,
  `nik` varchar(55) NOT NULL,
  `nama` varchar(55) NOT NULL,
  `email` varchar(55) NOT NULL,
  `id_konselings` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pesertakonselings`
--

INSERT INTO `pesertakonselings` (`id`, `nik`, `nama`, `email`, `id_konselings`, `created_at`, `updated_at`) VALUES
(1, '3203012503770011', 'admin', 'muhammadsigit.hd@gmail.com', 1, '2024-07-21 10:02:05', '2024-07-21 10:02:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `prokerposyandus`
--

CREATE TABLE `prokerposyandus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Nama` varchar(255) DEFAULT NULL,
  `Tanggal` date DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `Kegiatan` varchar(255) DEFAULT NULL,
  `Caption` text DEFAULT NULL,
  `Status` enum('Proker','Edukasi','','') NOT NULL,
  `StatusLanding` enum('Bahaya Rokok','Bahaya Narkoba','Stunting','Bahaya Seks Bebas','Kesehatan Reproduksi') DEFAULT NULL,
  `StatusKegiatan` enum('Penyuluhan','Pembinaan Mental','Pemeriksaan Kesehatan','Kunjungan Ke Rumah') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `prokerposyandus`
--

INSERT INTO `prokerposyandus` (`id`, `Nama`, `Tanggal`, `image`, `Kegiatan`, `Caption`, `Status`, `StatusLanding`, `StatusKegiatan`, `created_at`, `updated_at`) VALUES
(14, NULL, '2024-07-21', '1721569479-669d10c72822c.jpg', 'Kegiatan A', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'Proker', NULL, 'Pembinaan Mental', '2024-07-21 06:44:39', '2024-07-21 06:47:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayats`
--

CREATE TABLE `riwayats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_dataremaja` bigint(20) NOT NULL,
  `Tanggal` varchar(255) DEFAULT NULL,
  `BB` varchar(255) DEFAULT NULL,
  `TB` varchar(255) DEFAULT NULL,
  `TTD` varchar(255) DEFAULT NULL,
  `LILA` varchar(255) DEFAULT NULL,
  `LP` varchar(255) DEFAULT NULL,
  `Anemia` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `riwayats`
--

INSERT INTO `riwayats` (`id`, `id_dataremaja`, `Tanggal`, `BB`, `TB`, `TTD`, `LILA`, `LP`, `Anemia`, `created_at`, `updated_at`) VALUES
(1, 1, '2024-07-08', '12', '12', '12', '12', '12', '12', NULL, NULL),
(2, 2, '2024-07-08', '31', '31', '31', '13', '13', '13', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `type`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin User', 'admin@gmail.com', NULL, '$2y$12$gm8wjEmmHddE38m5dwZBH.Aryo05DlWYfQXm40PixjS8x4S9Sxkxq', 1, NULL, '2024-07-08 05:54:33', '2024-07-08 05:54:33');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dataremajas`
--
ALTER TABLE `dataremajas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `jadwalkonselings`
--
ALTER TABLE `jadwalkonselings`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kegiatankaders`
--
ALTER TABLE `kegiatankaders`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `pesertakonselings`
--
ALTER TABLE `pesertakonselings`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `prokerposyandus`
--
ALTER TABLE `prokerposyandus`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `riwayats`
--
ALTER TABLE `riwayats`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `dataremajas`
--
ALTER TABLE `dataremajas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jadwalkonselings`
--
ALTER TABLE `jadwalkonselings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `kegiatankaders`
--
ALTER TABLE `kegiatankaders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pesertakonselings`
--
ALTER TABLE `pesertakonselings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `prokerposyandus`
--
ALTER TABLE `prokerposyandus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `riwayats`
--
ALTER TABLE `riwayats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

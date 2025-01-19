-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Jan 2025 pada 04.48
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tatio`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE `anggota` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `tgl_bergabung` date NOT NULL,
  `caption` longtext DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`id`, `nama`, `jabatan`, `tgl_bergabung`, `caption`, `photo`, `created_at`, `updated_at`) VALUES
(2, 'Tio Moreno Pratama Biagi', 'Ketua', '2004-02-20', '<p>Halo gais</p>', 'photo/9DVbUiSyUzLBC9WYnAIQxwZvl2graxYW8b7erkkU.png', '2024-11-12 14:00:11', '2024-11-12 14:08:37');

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
(101, '1234567890', 'Andi', 'Jakarta', '2005-01-01 00:00:00', 'Laki-Laki', '2025-01-08 01:26:57', '2025-01-08 01:26:57'),
(102, '9876543210', 'Siti', 'Surabaya', '2006-05-15 00:00:00', 'Perempuan', '2025-01-08 01:26:57', '2025-01-08 01:26:57'),
(103, '1122334455', 'Budi', 'Bandung', '2004-08-20 00:00:00', 'Laki-Laki', '2025-01-08 01:26:57', '2025-01-08 01:26:57'),
(104, '2233445566', 'Rina', 'Medan', '2005-11-11 00:00:00', 'Perempuan', '2025-01-08 01:26:57', '2025-01-08 01:26:57');

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
-- Struktur dari tabel `informasi`
--

CREATE TABLE `informasi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `lokasi` varchar(255) DEFAULT NULL,
  `galeri` longtext DEFAULT NULL,
  `kategori_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `informasi`
--

INSERT INTO `informasi` (`id`, `jenis`, `judul`, `deskripsi`, `start_date`, `end_date`, `lokasi`, `galeri`, `kategori_id`, `created_at`, `updated_at`) VALUES
(8, 'kegiatan', 'Sosialisasi Sehat', 'Ayo semua segera daftat', '2025-03-02', '2025-03-03', NULL, 'public/galeri/a5cdUXYpgGNuZyy1qMRZqUzkA3YnXChGv1SBuiI7.jpg', 6, '2024-11-12 20:37:17', '2024-12-29 01:48:11'),
(9, 'kegiatan', 'Sosialisasi Mental', 'Ayo segera daftar', '2024-12-02', '2024-12-03', NULL, 'galeri/CkXbLzekyw6veqo5YOYPTc0xMHHusbM0QfEKIG6i.png', 7, '2024-11-13 20:59:58', '2024-11-13 20:59:58'),
(13, 'edukasi', 'aaa', 'aaaa', '2024-12-29', '2024-12-30', NULL, 'public/galeri/oT7R1HBNnDb3ta9m6FzJjTmreKfzxfBYVWTOQSJM.jpg', 1, '2024-12-29 02:04:46', '2024-12-29 02:04:46'),
(14, 'kegiatan', 'Sosialisasi Anti-Bullying', 'aa', '2025-01-08', '2025-01-09', NULL, 'public/galeri/0JIcGlBXN3FC0pWWJ7jqF3CkstsbhR8Ra07s2uxQ.jpg', 7, '2025-01-08 01:29:16', '2025-01-08 01:29:16'),
(15, 'kegiatan', 'Sosialisasi Anti', 'aaa', '2025-01-08', '2025-01-09', NULL, 'public/galeri/ZMjSHSdqW7ZqVIUCDkzI2TslWwNj1C5dC1tZE1nq.png', 8, '2025-01-08 01:29:50', '2025-01-08 01:29:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwalkonselings`
--

CREATE TABLE `jadwalkonselings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `TanggalKegiatan` varchar(255) NOT NULL,
  `NamaKegiatan` varchar(255) NOT NULL,
  `NamaBidan` varchar(255) NOT NULL,
  `allow_extra` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jadwalkonselings`
--

INSERT INTO `jadwalkonselings` (`id`, `TanggalKegiatan`, `NamaKegiatan`, `NamaBidan`, `allow_extra`, `created_at`, `updated_at`) VALUES
(4, '2024-11-13', 'Sosialisasi Magang', 'Bidan Lisis S.pdhk', 1, '2024-11-12 13:32:18', '2024-11-12 13:32:18'),
(5, '2024-11-13', 'Sosialisasi Kerja', 'Bidan Lisis S.pdhk', 1, '2024-11-12 13:32:56', '2024-11-12 13:32:56'),
(6, '2025-01-08', 'Sosialisasi Kesehatan Mental', 'Bidan Lisis S.pdhk', 0, '2025-01-07 19:10:28', '2025-01-07 19:14:26'),
(7, '2025-02-13', 'Sosialisasi Pendidikan Seksual untuk Remaja', 'Bidan Lisis S.pdhk', 0, '2025-01-07 19:14:12', '2025-01-07 19:14:34'),
(8, '2025-03-02', 'Sosialisasi Anti-Bullying', 'Bidan Lisis S.pdhk', 0, '2025-01-07 19:15:37', '2025-01-07 19:15:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `nama`, `jenis`, `created_at`, `updated_at`) VALUES
(1, 'Bahaya Rokok', 'edukasi', NULL, NULL),
(2, 'Bahaya Narkoba', 'edukasi', NULL, NULL),
(3, 'Stunting', 'edukasi', NULL, NULL),
(4, 'Bahaya Seks Bebas', 'edukasi', NULL, NULL),
(5, 'Kesehatan Reproduksi', 'edukasi', NULL, NULL),
(6, 'Penyuluhan', 'kegiatan', NULL, NULL),
(7, 'Pembinaan Mental', 'kegiatan', NULL, NULL),
(8, 'Pemeriksaan Kesehatan', 'kegiatan', NULL, NULL),
(9, 'Kunjungan Ke Rumah', 'kegiatan', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kegiatankaders`
--

CREATE TABLE `kegiatankaders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `TanggalBergabung` date NOT NULL,
  `Nama` varchar(255) NOT NULL,
  `Jabatan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(9, '2023_12_11_034333_create_riwayats_table', 1),
(14, '2024_11_03_040715_create_anggotas_table', 2),
(15, '2024_11_07_010657_create_informasis_table', 2),
(16, '2024_11_07_020657_create_peserta_kegiatans_table', 3),
(17, '2024_11_07_210709_create_kategoris_table', 4),
(18, '2024_11_07_210826_add_field_kategori_id_to_informasi_table', 5);

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
(6, '3204320503020001', 'mONYET hURUNG', 'biagistore.id@gmail.com', 1, '2024-11-12 06:40:19', '2024-11-12 06:40:19'),
(7, '3204320503020007', 'Anonym', 'tiomoreno36@gmail.com', 1, '2024-11-12 06:40:28', '2024-11-12 06:40:28'),
(9, '3204320503020008', 'Hamzah Salman Kanata', 'tiomoreno562gmail.com', 5, '2024-11-12 20:34:03', '2024-11-12 20:34:03'),
(10, '32057402768988829', 'Biagi Pratama', 'hamzahasskduij@gmail.com', 4, '2024-11-12 20:34:53', '2024-11-12 20:34:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peserta_kegiatan`
--

CREATE TABLE `peserta_kegiatan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `nik` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `id_informasi` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `peserta_kegiatan`
--

INSERT INTO `peserta_kegiatan` (`id`, `nama`, `nik`, `email`, `id_informasi`, `created_at`, `updated_at`) VALUES
(1, 'Test', '23455588888', 'test@gmail.com', 1, NULL, NULL),
(2, 'Budi', '1234567890123456', 'test123@gmail.com', 1, '2024-11-10 15:49:24', '2024-11-10 15:49:24'),
(3, 'Tio Moreno Pratama Biagi', '3204320503020010', 'admin@gmail.com', 4, '2024-11-12 13:42:33', '2024-11-12 13:42:33'),
(4, 'Biagi', '3204320503020001', 'kanatahamzah37@gmail.com', 4, '2024-11-12 13:43:04', '2024-11-12 13:43:04'),
(5, 'Momotaro', '3204320503020010', 'biagistore.id@gmail.com', 5, '2024-11-12 14:01:59', '2024-11-12 14:01:59'),
(6, 'Anonym', '3204320503020005', 'hamzahsalmankanata@gmail.com', 4, '2024-11-12 14:02:15', '2024-11-12 14:02:15'),
(7, 'Raikage', '3204320503020014', 'biagistore.id@gmail.com', 7, '2024-11-12 14:02:32', '2024-11-12 14:02:32'),
(8, 'Hamzahsalman', '3204320503020007', 'hamzahsalmankanata@gmail.com', 8, '2024-11-12 20:37:39', '2024-11-12 20:37:39'),
(9, 'Tio Moreno Pratama Biagi', '3204320503020010', 'admin@gmail.com', 8, '2024-11-13 20:50:59', '2024-11-13 20:50:59'),
(10, 'Momotaro', '3204320503020010', 'kanatahamzah37@gmail.com', 9, '2024-11-13 21:00:22', '2024-11-13 21:00:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `prokerposyandus`
--

CREATE TABLE `prokerposyandus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Tanggal` date NOT NULL,
  `Kegiatan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, 1, '2024-10-27', '10', '110', 'diberikan', '24', '48', 'Flu', '2024-10-26 20:49:07', '2024-10-26 20:49:07'),
(2, 2, '2024-02-13', '67', '173', 'Tablet Tambah Darah', '89', '37', 'Flue', '2024-11-12 13:34:33', '2024-11-12 13:36:04'),
(3, 3, '2024-11-13', '67', '174', 'Udah', '76', '28', 'Sakit Perut', '2024-11-12 13:37:36', '2024-11-12 13:37:36'),
(4, 4, '2025-01-08', '55', '22', '11', '11', '11', 'A', '2025-01-07 19:42:40', '2025-01-07 19:42:40');

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
(1, 'Admin User', 'admin@gmail.com', NULL, '$2y$12$u4p1O0JgSmLww5VWkpTVPu7bHv13UPGbWmRi1WhVYFtdW5Qiq1dce', 1, NULL, '2024-10-26 20:39:37', '2024-10-26 20:39:37');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id`);

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
-- Indeks untuk tabel `informasi`
--
ALTER TABLE `informasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jadwalkonselings`
--
ALTER TABLE `jadwalkonselings`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
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
-- Indeks untuk tabel `peserta_kegiatan`
--
ALTER TABLE `peserta_kegiatan`
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
-- AUTO_INCREMENT untuk tabel `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `dataremajas`
--
ALTER TABLE `dataremajas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `informasi`
--
ALTER TABLE `informasi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `jadwalkonselings`
--
ALTER TABLE `jadwalkonselings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `kegiatankaders`
--
ALTER TABLE `kegiatankaders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pesertakonselings`
--
ALTER TABLE `pesertakonselings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `peserta_kegiatan`
--
ALTER TABLE `peserta_kegiatan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `prokerposyandus`
--
ALTER TABLE `prokerposyandus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `riwayats`
--
ALTER TABLE `riwayats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

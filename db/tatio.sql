/*
 Navicat Premium Dump SQL

 Source Server         : PHPMYADMINLOCAL
 Source Server Type    : MySQL
 Source Server Version : 100432 (10.4.32-MariaDB)
 Source Host           : localhost:3306
 Source Schema         : tatio

 Target Server Type    : MySQL
 Target Server Version : 100432 (10.4.32-MariaDB)
 File Encoding         : 65001

 Date: 21/01/2025 00:44:50
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for admin_access_logs
-- ----------------------------
DROP TABLE IF EXISTS `admin_access_logs`;
CREATE TABLE `admin_access_logs`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `accessed_at` timestamp NOT NULL DEFAULT current_timestamp,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `user_id`(`user_id` ASC) USING BTREE,
  CONSTRAINT `admin_access_logs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of admin_access_logs
-- ----------------------------
INSERT INTO `admin_access_logs` VALUES (1, 1, '160.19.227.182', '2025-01-19 15:18:33');
INSERT INTO `admin_access_logs` VALUES (2, 1, '160.19.227.182', '2025-01-19 17:11:19');
INSERT INTO `admin_access_logs` VALUES (3, 1, '160.19.227.182', '2025-01-20 16:12:18');
INSERT INTO `admin_access_logs` VALUES (4, 1, '160.19.227.216', '2025-01-20 21:32:42');
INSERT INTO `admin_access_logs` VALUES (5, 1, '160.19.227.216', '2025-01-20 21:33:06');
INSERT INTO `admin_access_logs` VALUES (6, 1, '160.19.227.216', '2025-01-20 23:56:31');
INSERT INTO `admin_access_logs` VALUES (7, 1, '160.19.227.216', '2025-01-21 00:19:39');

-- ----------------------------
-- Table structure for anggota
-- ----------------------------
DROP TABLE IF EXISTS `anggota`;
CREATE TABLE `anggota`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_bergabung` date NOT NULL,
  `caption` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `photo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of anggota
-- ----------------------------
INSERT INTO `anggota` VALUES (2, 'Tio Moreno Pratama Biagi', 'Ketua', '2004-02-20', '<p>Halo gais</p>', 'photo/9DVbUiSyUzLBC9WYnAIQxwZvl2graxYW8b7erkkU.png', '2024-11-12 21:00:11', '2024-11-12 21:08:37');

-- ----------------------------
-- Table structure for dataremajas
-- ----------------------------
DROP TABLE IF EXISTS `dataremajas`;
CREATE TABLE `dataremajas`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nik` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `Nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `TempatLahir` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `TanggalLahir` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `JenisKelamin` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 109 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dataremajas
-- ----------------------------
INSERT INTO `dataremajas` VALUES (101, '1234567890', NULL, 'Andi', 'Jakarta', '2005-01-01 00:00:00', 'Laki-Laki', '2025-01-08 08:26:57', '2025-01-08 08:26:57');
INSERT INTO `dataremajas` VALUES (102, '9876543210', NULL, 'Siti', 'Surabaya', '2006-05-15 00:00:00', 'Perempuan', '2025-01-08 08:26:57', '2025-01-08 08:26:57');
INSERT INTO `dataremajas` VALUES (103, '1122334455', NULL, 'Budi', 'Bandung', '2004-08-20 00:00:00', 'Laki-Laki', '2025-01-08 08:26:57', '2025-01-08 08:26:57');
INSERT INTO `dataremajas` VALUES (104, '2233445566', NULL, 'Rina', 'Medan', '2005-11-11 00:00:00', 'Perempuan', '2025-01-08 08:26:57', '2025-01-08 08:26:57');
INSERT INTO `dataremajas` VALUES (108, '1234567890123456', 'hemgila408@gmail.com', 'Sigit Hardianto', 'Bandung', '2002-04-07', 'Laki-laki', '2025-01-19 17:51:19', '2025-01-19 17:51:19');

-- ----------------------------
-- Table structure for dokumentasi
-- ----------------------------
DROP TABLE IF EXISTS `dokumentasi`;
CREATE TABLE `dokumentasi`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `jadwal_id` bigint UNSIGNED NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `file_path` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `jadwal_id`(`jadwal_id` ASC) USING BTREE,
  CONSTRAINT `dokumentasi_ibfk_1` FOREIGN KEY (`jadwal_id`) REFERENCES `jadwalkonselings` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dokumentasi
-- ----------------------------
INSERT INTO `dokumentasi` VALUES (1, 6, '<p>aaaa</p>', 'dokumentasi/rYepSWDCRqGIHwRjbevX13DgfcHg3dm1sQDdA3jy.jpg', '2025-01-21 00:22:07', '2025-01-21 00:22:07');
INSERT INTO `dokumentasi` VALUES (2, 6, '<p>bbbbb</p>', 'dokumentasi/oEfILHiVXhKbi3ndbynrvSP5R83pHK0aurbAKwe5.jpg', '2025-01-21 00:22:07', '2025-01-21 00:22:07');
INSERT INTO `dokumentasi` VALUES (3, 6, '<p>cccc</p>', 'dokumentasi/05grDRxz9RHqhJMLjdsPCvo8YZUJtS0IrPGkaXs0.jpg', '2025-01-21 00:22:07', '2025-01-21 00:22:07');

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for informasi
-- ----------------------------
DROP TABLE IF EXISTS `informasi`;
CREATE TABLE `informasi`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `jenis` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `start_date` date NULL DEFAULT NULL,
  `end_date` date NULL DEFAULT NULL,
  `lokasi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `galeri` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `kategori_id` bigint UNSIGNED NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of informasi
-- ----------------------------
INSERT INTO `informasi` VALUES (8, 'kegiatan', 'Sosialisasi Sehat', 'Ayo semua segera daftat', '2025-03-02', '2025-03-03', NULL, 'public/galeri/a5cdUXYpgGNuZyy1qMRZqUzkA3YnXChGv1SBuiI7.jpg', 6, '2024-11-13 03:37:17', '2024-12-29 08:48:11');
INSERT INTO `informasi` VALUES (9, 'kegiatan', 'Sosialisasi Mental', 'Ayo segera daftar', '2024-12-02', '2024-12-03', NULL, 'galeri/CkXbLzekyw6veqo5YOYPTc0xMHHusbM0QfEKIG6i.png', 7, '2024-11-14 03:59:58', '2024-11-14 03:59:58');
INSERT INTO `informasi` VALUES (13, 'edukasi', 'aaa', 'aaaa', '2024-12-29', '2024-12-30', NULL, 'public/galeri/oT7R1HBNnDb3ta9m6FzJjTmreKfzxfBYVWTOQSJM.jpg', 1, '2024-12-29 09:04:46', '2024-12-29 09:04:46');
INSERT INTO `informasi` VALUES (14, 'kegiatan', 'Sosialisasi Anti-Bullying', 'aa', '2025-01-08', '2025-01-09', NULL, 'public/galeri/0JIcGlBXN3FC0pWWJ7jqF3CkstsbhR8Ra07s2uxQ.jpg', 7, '2025-01-08 08:29:16', '2025-01-08 08:29:16');
INSERT INTO `informasi` VALUES (15, 'kegiatan', 'Sosialisasi Anti', 'aaa', '2025-01-08', '2025-01-09', NULL, 'public/galeri/ZMjSHSdqW7ZqVIUCDkzI2TslWwNj1C5dC1tZE1nq.png', 8, '2025-01-08 08:29:50', '2025-01-08 08:29:50');

-- ----------------------------
-- Table structure for jadwalkonselings
-- ----------------------------
DROP TABLE IF EXISTS `jadwalkonselings`;
CREATE TABLE `jadwalkonselings`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `TanggalKegiatan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `NamaKegiatan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `NamaBidan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `allow_extra` int NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of jadwalkonselings
-- ----------------------------
INSERT INTO `jadwalkonselings` VALUES (4, '2024-11-13', 'Sosialisasi Magang', 'Bidan Lisis S.pdhk', 1, '2024-11-12 20:32:18', '2024-11-12 20:32:18');
INSERT INTO `jadwalkonselings` VALUES (5, '2024-11-13', 'Sosialisasi Kerja', 'Bidan Lisis S.pdhk', 1, '2024-11-12 20:32:56', '2024-11-12 20:32:56');
INSERT INTO `jadwalkonselings` VALUES (6, '2025-01-20', 'Sosialisasi Kesehatan Mental', 'Bidan Lisis S.pdhk', 0, '2025-01-08 02:10:28', '2025-01-19 17:56:07');
INSERT INTO `jadwalkonselings` VALUES (7, '2025-02-13', 'Sosialisasi Pendidikan Seksual untuk Remaja', 'Bidan Lisis S.pdhk', 0, '2025-01-08 02:14:12', '2025-01-08 02:14:34');
INSERT INTO `jadwalkonselings` VALUES (8, '2025-03-02', 'Sosialisasi Anti-Bullying', 'Bidan Lisis S.pdhk', 0, '2025-01-08 02:15:37', '2025-01-08 02:15:37');

-- ----------------------------
-- Table structure for kategori
-- ----------------------------
DROP TABLE IF EXISTS `kategori`;
CREATE TABLE `kategori`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kategori
-- ----------------------------
INSERT INTO `kategori` VALUES (1, 'Bahaya Rokok', 'edukasi', NULL, NULL);
INSERT INTO `kategori` VALUES (2, 'Bahaya Narkoba', 'edukasi', NULL, NULL);
INSERT INTO `kategori` VALUES (3, 'Stunting', 'edukasi', NULL, NULL);
INSERT INTO `kategori` VALUES (4, 'Bahaya Seks Bebas', 'edukasi', NULL, NULL);
INSERT INTO `kategori` VALUES (5, 'Kesehatan Reproduksi', 'edukasi', NULL, NULL);
INSERT INTO `kategori` VALUES (6, 'Penyuluhan', 'kegiatan', NULL, NULL);
INSERT INTO `kategori` VALUES (7, 'Pembinaan Mental', 'kegiatan', NULL, NULL);
INSERT INTO `kategori` VALUES (8, 'Pemeriksaan Kesehatan', 'kegiatan', NULL, NULL);
INSERT INTO `kategori` VALUES (9, 'Kunjungan Ke Rumah', 'kegiatan', NULL, NULL);

-- ----------------------------
-- Table structure for kegiatankaders
-- ----------------------------
DROP TABLE IF EXISTS `kegiatankaders`;
CREATE TABLE `kegiatankaders`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `TanggalBergabung` date NOT NULL,
  `Nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Jabatan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kegiatankaders
-- ----------------------------

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 19 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_reset_tokens_table', 1);
INSERT INTO `migrations` VALUES (3, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (4, '2019_12_14_000001_create_personal_access_tokens_table', 1);
INSERT INTO `migrations` VALUES (5, '2023_11_20_023400_create_dataremajas_table', 1);
INSERT INTO `migrations` VALUES (6, '2023_12_01_132314_create_jadwalkonselings_table', 1);
INSERT INTO `migrations` VALUES (7, '2023_12_01_145313_create_prokerposyandus_table', 1);
INSERT INTO `migrations` VALUES (8, '2023_12_01_154303_create_kegiatankaders_table', 1);
INSERT INTO `migrations` VALUES (9, '2023_12_11_034333_create_riwayats_table', 1);
INSERT INTO `migrations` VALUES (14, '2024_11_03_040715_create_anggotas_table', 2);
INSERT INTO `migrations` VALUES (15, '2024_11_07_010657_create_informasis_table', 2);
INSERT INTO `migrations` VALUES (16, '2024_11_07_020657_create_peserta_kegiatans_table', 3);
INSERT INTO `migrations` VALUES (17, '2024_11_07_210709_create_kategoris_table', 4);
INSERT INTO `migrations` VALUES (18, '2024_11_07_210826_add_field_kategori_id_to_informasi_table', 5);

-- ----------------------------
-- Table structure for password_reset_tokens
-- ----------------------------
DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of password_reset_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for personal_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `personal_access_tokens_token_unique`(`token` ASC) USING BTREE,
  INDEX `personal_access_tokens_tokenable_type_tokenable_id_index`(`tokenable_type` ASC, `tokenable_id` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of personal_access_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for peserta_kegiatan
-- ----------------------------
DROP TABLE IF EXISTS `peserta_kegiatan`;
CREATE TABLE `peserta_kegiatan`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `nik` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `id_informasi` bigint UNSIGNED NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of peserta_kegiatan
-- ----------------------------
INSERT INTO `peserta_kegiatan` VALUES (1, 'Test', '23455588888', 'test@gmail.com', 1, NULL, NULL);
INSERT INTO `peserta_kegiatan` VALUES (2, 'Budi', '1234567890123456', 'test123@gmail.com', 1, '2024-11-10 22:49:24', '2024-11-10 22:49:24');
INSERT INTO `peserta_kegiatan` VALUES (3, 'Tio Moreno Pratama Biagi', '3204320503020010', 'admin@gmail.com', 4, '2024-11-12 20:42:33', '2024-11-12 20:42:33');
INSERT INTO `peserta_kegiatan` VALUES (4, 'Biagi', '3204320503020001', 'kanatahamzah37@gmail.com', 4, '2024-11-12 20:43:04', '2024-11-12 20:43:04');
INSERT INTO `peserta_kegiatan` VALUES (5, 'Momotaro', '3204320503020010', 'biagistore.id@gmail.com', 5, '2024-11-12 21:01:59', '2024-11-12 21:01:59');
INSERT INTO `peserta_kegiatan` VALUES (6, 'Anonym', '3204320503020005', 'hamzahsalmankanata@gmail.com', 4, '2024-11-12 21:02:15', '2024-11-12 21:02:15');
INSERT INTO `peserta_kegiatan` VALUES (7, 'Raikage', '3204320503020014', 'biagistore.id@gmail.com', 7, '2024-11-12 21:02:32', '2024-11-12 21:02:32');
INSERT INTO `peserta_kegiatan` VALUES (8, 'Hamzahsalman', '3204320503020007', 'hamzahsalmankanata@gmail.com', 8, '2024-11-13 03:37:39', '2024-11-13 03:37:39');
INSERT INTO `peserta_kegiatan` VALUES (9, 'Tio Moreno Pratama Biagi', '3204320503020010', 'admin@gmail.com', 8, '2024-11-14 03:50:59', '2024-11-14 03:50:59');
INSERT INTO `peserta_kegiatan` VALUES (10, 'Momotaro', '3204320503020010', 'kanatahamzah37@gmail.com', 9, '2024-11-14 04:00:22', '2024-11-14 04:00:22');

-- ----------------------------
-- Table structure for pesertakonselings
-- ----------------------------
DROP TABLE IF EXISTS `pesertakonselings`;
CREATE TABLE `pesertakonselings`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nik` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `nama` varchar(55) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(55) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_konselings` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pesertakonselings
-- ----------------------------
INSERT INTO `pesertakonselings` VALUES (6, '3204320503020001', 'mONYET hURUNG', 'biagistore.id@gmail.com', 1, '2024-11-12 13:40:19', '2024-11-12 13:40:19');
INSERT INTO `pesertakonselings` VALUES (7, '3204320503020007', 'Anonym', 'tiomoreno36@gmail.com', 1, '2024-11-12 13:40:28', '2024-11-12 13:40:28');
INSERT INTO `pesertakonselings` VALUES (9, '3204320503020008', 'Hamzah Salman Kanata', 'tiomoreno562gmail.com', 5, '2024-11-13 03:34:03', '2024-11-13 03:34:03');
INSERT INTO `pesertakonselings` VALUES (10, '32057402768988829', 'Biagi Pratama', 'hamzahasskduij@gmail.com', 4, '2024-11-13 03:34:53', '2024-11-13 03:34:53');
INSERT INTO `pesertakonselings` VALUES (11, '1234567890123456', 'Sigit Hardianto', 'hemgila408@gmail.com', 6, '2025-01-20 00:59:04', '2025-01-20 00:59:04');

-- ----------------------------
-- Table structure for prokerposyandus
-- ----------------------------
DROP TABLE IF EXISTS `prokerposyandus`;
CREATE TABLE `prokerposyandus`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `Tanggal` date NOT NULL,
  `Kegiatan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of prokerposyandus
-- ----------------------------

-- ----------------------------
-- Table structure for riwayats
-- ----------------------------
DROP TABLE IF EXISTS `riwayats`;
CREATE TABLE `riwayats`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_dataremaja` bigint NOT NULL,
  `Tanggal` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `BB` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `TB` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `TTD` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `LILA` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `LP` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `Anemia` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of riwayats
-- ----------------------------
INSERT INTO `riwayats` VALUES (1, 1, '2024-10-27', '10', '110', 'diberikan', '24', '48', 'Flu', '2024-10-27 03:49:07', '2024-10-27 03:49:07');
INSERT INTO `riwayats` VALUES (2, 2, '2024-02-13', '67', '173', 'Tablet Tambah Darah', '89', '37', 'Flue', '2024-11-12 20:34:33', '2024-11-12 20:36:04');
INSERT INTO `riwayats` VALUES (3, 3, '2024-11-13', '67', '174', 'Udah', '76', '28', 'Sakit Perut', '2024-11-12 20:37:36', '2024-11-12 20:37:36');
INSERT INTO `riwayats` VALUES (4, 4, '2025-01-08', '55', '22', '11', '11', '11', 'A', '2025-01-08 02:42:40', '2025-01-08 02:42:40');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nik` bigint NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` tinyint NOT NULL DEFAULT 0,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, NULL, 'Admin User', 'admin@gmail.com', NULL, '$2y$12$u4p1O0JgSmLww5VWkpTVPu7bHv13UPGbWmRi1WhVYFtdW5Qiq1dce', 1, NULL, '2024-10-27 03:39:37', '2024-10-27 03:39:37');
INSERT INTO `users` VALUES (2, 3203012503770025, 'User', '', NULL, '$2y$12$u4p1O0JgSmLww5VWkpTVPu7bHv13UPGbWmRi1WhVYFtdW5Qiq1dce', 0, NULL, '2024-10-27 03:39:37', '2024-10-27 03:39:37');
INSERT INTO `users` VALUES (7, 1234567890123456, 'Sigit Hardianto', 'hemgila408@gmail.com', NULL, '$2y$12$/y72sQGStKQIgcWuwDrWUu63GDKV5il7bBcu6KgapcNLUckhzswqa', 0, NULL, '2025-01-19 17:51:15', '2025-01-20 23:09:15');

SET FOREIGN_KEY_CHECKS = 1;

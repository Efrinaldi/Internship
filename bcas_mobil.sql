-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Waktu pembuatan: 03 Des 2022 pada 11.31
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bcas_mobil`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `activity_log`
--

CREATE TABLE `activity_log` (
  `id` int(11) UNSIGNED NOT NULL,
  `activity` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `atasan`
--

CREATE TABLE `atasan` (
  `id_divisi` int(11) NOT NULL,
  `atasan` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `userid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `divisi`
--

CREATE TABLE `divisi` (
  `id_divisi` int(11) NOT NULL,
  `divisi` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `divisi`
--

INSERT INTO `divisi` (`id_divisi`, `divisi`, `keterangan`) VALUES
(1, 'DEPARTEMEN LOGISTIK', ''),
(2, 'DEPARTEMEN SENTRA OPERASI PERBANKAN', ''),
(7, 'DEPARTEMEN SDM', ''),
(9, 'DEPARTEMEN KOMUNIKASI & KESEKRETARIATAN PERUSAHAAN', ''),
(12, 'DEPARTEMEN KEPATUHAN', ''),
(13, 'DEPARTEMEN SISTEM PROSEDUR & PENDUKUNG OPERASI', ''),
(14, 'DEPARTEMEN OPERASI TEKNOLOGI INFORMASI', ''),
(16, 'DEPARTEMEN ADMINISTRASI PEMBIAYAAN', ''),
(22, 'DEPARTEMEN MANAJEMEN RISIKO', ''),
(25, 'DEPARTEMEN PENDUKUNG BISNIS', ''),
(29, 'DEPARTEMEN HUKUM', ''),
(30, 'DEPARTEMEN PENGEMBANGAN TEKNOLOGI INFORMASI', ''),
(33, 'DEPARTEMEN PENGEMBANGAN DAN PEMBINAAN JARINGAN CABANG', ''),
(34, 'DEPARTEMEN AUDIT KANTOR PUSAT & ANTI FRAUD', ''),
(36, 'DEPARTEMEN AUDIT KANTOR CABANG', ''),
(37, 'SEKURITI TEKNOLOGI INFORMASI', ''),
(40, 'DEPARTEMEN PENGEMBANGAN BISNIS', ''),
(57, 'DEPARTEMEN AUDIT TEKNOLOGI INFORMASI', ''),
(60, 'PROJECT MANAGEMENT OFFICE', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(2, '2022-06-20-064544', 'App\\Database\\Migrations\\CreateTableReimburse', 'default', 'App', 1657532098, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mobil`
--

CREATE TABLE `mobil` (
  `id_mobil` int(11) NOT NULL,
  `plat_nomor` varchar(252) NOT NULL,
  `status_mobil` varchar(255) DEFAULT NULL,
  `keterangan_mobil` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `mobil`
--

INSERT INTO `mobil` (`id_mobil`, `plat_nomor`, `status_mobil`, `keterangan_mobil`) VALUES
(1, 'B 124 BG', 'Tersedia', 'Avanza Putih'),
(5, 'Git', NULL, 'shajhsja'),
(6, 'aaa', NULL, 'aaaa'),
(9, '', 'tersedia', 'Avanza Putih'),
(10, '', 'tersedia', 'Avanza Putih'),
(11, 'B 123 HQ', 'tersedia', 'Avanza Putih'),
(12, 'B 456 DUL', 'tersedia', 'Avanza Hitam');

-- --------------------------------------------------------

--
-- Struktur dari tabel `oauth_user`
--

CREATE TABLE `oauth_user` (
  `id_user` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `token_id` varchar(255) DEFAULT NULL,
  `nama_user` varchar(255) DEFAULT NULL,
  `unit_kerja` varchar(255) DEFAULT NULL,
  `nip` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `oauth_user`
--

INSERT INTO `oauth_user` (`id_user`, `first_name`, `last_name`, `email`, `password`, `username`, `token_id`, `nama_user`, `unit_kerja`, `nip`, `role`, `phone_number`) VALUES
(2, 'Gita', 'Refina', 'bcasyariah123@gmail.com', '$2y$10$EOQR5WSQG9oq8qkEfsDUY.SFbYfvCR6aGrwb1rc2ujbvtScxSrsgW', 'gitarefinaa', 'eRLyMZsKT5WJ2yZFeiwKD6:APA91bGmAPGDv6cJY42rakV8WnC6x1YUL1xMN_VaGViXZUYSa-Sa1pXk_1Hm4Gnz7KGvXydnzhdKTBQweAH21CIEL06y_-FZ3Urgmq0oD0AcAcWva142sU75SwwSZc9xhMPoALEJPiqO', NULL, 'BSIT', '20211101890', 'User', '081904763823'),
(5, 'Githa', 'Refina', 'gita.refina8@gmail.com', '123456789', 'gitarefinaa', 'eRLyMZsKT5WJ2yZFeiwKD6:APA91bGmAPGDv6cJY42rakV8WnC6x1YUL1xMN_VaGViXZUYSa-Sa1pXk_1Hm4Gnz7KGvXydnzhdKTBQweAH21CIEL06y_-FZ3Urgmq0oD0AcAcWva142sU75SwwSZc9xhMPoALEJPiqO', NULL, 'SKAI', '20211101890', 'Driver', '081904763823'),
(10, 'Githa ', 'Refina', 'gita.refina7@gmail.com', '$2y$10$aW1iaCvqo.je1Bsoayc.C.AcUUEY6EXA8Hh2xD/LKtrU3.qdKIe.6', 'gitarefinaa', NULL, NULL, 'BSIT', '20211101890', 'Supervisor', NULL),
(11, 'Githa', 'Refina', 'gita.refina9@gmail.com', '$2y$10$WZstQSwbuPHS8mE.Ksq4XOEPOJGkD.2VeBqAo8w/.rpD8ca3ZlKie', 'gitarefinaa', 'cY3ZZ24pTl6M_UYlS48f7n:APA91bEi6qfQ4ZhxR5Tch7UAHsQbIwYmDLCOBTr55Za7NUfGKdSjitCGo7rSoADZnR_3bJoZ1NrvfWNLaua7aHF16skQfaRy_bGdApGBLfodDeYspL4jEU41tjoZBRFlV7rffQg8Jv3D', NULL, 'BSIT', '20211101890', 'Operator', '081904763823'),
(12, 'Githa', 'Refina', 'gita.refina11@gmail.com', '$2y$10$iryxaVftKq0PAzhfhEj.m.1eaSuhLKGHQWYmLtMQTXGe56zZFLbGK', 'gitarefinaa', NULL, NULL, NULL, '20211101890', 'Admin Reimburse', NULL),
(13, 'Efrinaldi', 'Al-Zuhri', 'efrinaldi1@gmail.com', '$2y$10$UcO4ri2ZOA0ReV7TAYSHcu7K9Yfyn7rD3airwptqDpCB3nvlZcopy', 'efrinaldi1', 'dqBfKj5sSp2vDMlSKYgIgc:APA91bH4TJ5zcgTCetiOiascDqRm-syELCrVmafk0Gp9BbcrKmFpqFb_-f42CG944ySrlc9rdozfaT3v1sThw5LQowGUVoZ6U5ZeMSQnSjxdOKz0JN91sAvE3DPMGGIinsoFCYi4H9Qs', NULL, 'SKTILOG', '20211101891', 'Operator', '082122046476'),
(14, 'Afta', 'Asyad', 'aftaarsyad@gmail.com', '$2y$10$Vxc1YVUhiEXw3v3bK67kbOfXRySBTMZZHFI10yI1B.JrE2fKlgZ0G', 'afta', NULL, NULL, 'SKTILOG', '20211101890', 'Supervisor Logistik', NULL),
(15, 'Githa ', 'Refina', 'gita.refina7@gmail.com', '$2y$10$xbHc090hSAFfSNN61FqWnuQEViW4omaCa.cLGCLlq5c4CPDHN2NBK', 'gitarefinaa', NULL, NULL, 'BSIT', '20211101890', 'Driver', NULL),
(21, 'Githa', 'Refina', 'gita.refina3@gmail.com', '$2y$10$ww0FgLldSRPUUnE20Eltm.ZCY0DIWkxmu6NFfcgYLT2iecU1tGew2', 'gitarefinaa', NULL, NULL, 'Operator', '20211101890', 'Driver', NULL),
(30, 'Githa', 'Refina', 'gita.refina13@gmail.com', '$2y$10$GNGR0Vl6691jjfmC82m5Y.Mp09RSJA0SG/kgrNFW0cO60cdHmnkUy', 'gitarefinaa', 'eRLyMZsKT5WJ2yZFeiwKD6:APA91bGmAPGDv6cJY42rakV8WnC6x1YUL1xMN_VaGViXZUYSa-Sa1pXk_1Hm4Gnz7KGvXydnzhdKTBQweAH21CIEL06y_-FZ3Urgmq0oD0AcAcWva142sU75SwwSZc9xhMPoALEJPiqO', NULL, 'Operator', '20211101890', 'Driver', '081904763823'),
(31, 'Githa', 'Refina', 'gita.refina12@gmail.com', '$2y$10$F2YiwgD/jP0yvm8a.xO0OupMHOKOyQRMIwA2xC3Y8mJLuAtJ7hBJO', 'gitarefinaa', 'cY3ZZ24pTl6M_UYlS48f7n:APA91bEi6qfQ4ZhxR5Tch7UAHsQbIwYmDLCOBTr55Za7NUfGKdSjitCGo7rSoADZnR_3bJoZ1NrvfWNLaua7aHF16skQfaRy_bGdApGBLfodDeYspL4jEU41tjoZBRFlV7rffQg8Jv3D', NULL, 'Operator', '20211101890', 'Driver', '081904763823'),
(32, 'Eka', 'Ariefin', 'eka_ariefin@bcasyariah.co.id', '$2y$10$dakGQkvrx6NFMZ03Ay4ymuoQU/n4gygGa38.vFcmPfQqtFxShOSoS', 'ekaariefin', NULL, NULL, 'SKTILOG', '20211101890', 'User', NULL),
(33, 'Dhatu', 'Kertayuga', 'dhatu_kertayuga@bcasyariah.co.id', '$2y$10$bE4xr3kxK.2ISv4hSEIFF.t.MVsVsmCZzmC2pNjd.DdSIP/8eOotK', 'dhatu_kertayuga', NULL, NULL, 'SKTILOG', '20211101890', 'User', NULL),
(34, 'Efrinaldi', 'Al-Zuhri', 'efrinaldi_alzuhri@bcasyariah.co.id', '$2y$10$wlPMywq7Qg0xcEocWrJYlu5vunH6EQci2zSI22rYywZkhDuWmbMxu', 'efrinaldi_alzuhri', NULL, NULL, 'SKTILOG', '20211101891', 'Supervisor', NULL),
(35, 'Efrinaldi', 'Al-Zuhri', 'efrinaldi_alzuhri@gmail.com', '$2y$10$SfZBPP1lCnGeAQb2M9Pgx.gwFU4NUC4k3bvI/GJjZUXvuRXeVzvdm', 'efrinaldi_alzuhri', NULL, NULL, 'SKTILOG', '20211101891', 'Supervisor Logistik', NULL),
(36, 'muh', 'arsyad', 'muharsyad@gmail.com', '$2y$10$wXQmSYm/tQCEkD4SpvUldOcc1jM4JWXFyCoI1A4js3xz6.dr2r8wK', 'muharsyad', NULL, NULL, 'SKTILOG', '123140200', 'User', NULL),
(37, 'test', 'test', 'test@gmail.com', '$2y$10$ttTmYQPL83MZctpS5DB4ROz7383L5IDWacLax4oRyQ1t/w0ClIHnS', 'tester', NULL, NULL, 'SKTILOG', '12345678', 'User', NULL),
(38, 'security', 'security', 'security@gmail.com', '$2y$10$cwbp4xZs/ggEvgfzcqJ1dufdmYOvNDJmID10OQqHCKFeq0LsQ8iaO', 'security', NULL, NULL, 'BSIT', '12345678', 'Security', NULL),
(39, 'Abdul', 'abdul', 'abdul@gmail.com', '$2y$10$NC2nmhVPUBo5B7WEln/mcOJCShc6wt0vukGLPgO1kPhekM6Xvi05q', 'abdul', NULL, NULL, 'Operator', '1235688', 'Driver', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `tujuan` varchar(255) DEFAULT NULL,
  `asal` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `unit_kerja` varchar(255) DEFAULT NULL,
  `waktu` varchar(255) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `tanggal` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `tujuan_pakai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`id`, `tujuan`, `asal`, `nama`, `unit_kerja`, `waktu`, `id_user`, `tanggal`, `status`, `keterangan`, `tujuan_pakai`) VALUES
(3, 'null', 'null', 'Girha', 'SKTILOG', '0:6', 2, '07/07/2022', '1', 'Approve', ''),
(6, 'Jl. Kp. Jati Bening No.76, RT.6/RW.003, Jatibening Baru, Kec. Pd. Gede, Kota Bks, Jawa Barat 17412, Indonesia ,Kecamatan Pondok Gede ', 'Jl. Jatinegara Timur No.72, RT.6/RW.3, Bali Mester, Kecamatan Jatinegara, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13310, Indonesia ,Kecamatan Jatinegara ', 'gggg', 'SKTILOG', '18:47', 2, '07/11/2022', '1', 'Approve', ''),
(7, 'Jl. Kp. Jati Bening No.76, RT.6/RW.003, Jatibening Baru, Kec. Pd. Gede, Kota Bks, Jawa Barat 17412, Indonesia ,Kecamatan Pondok Gede ', 'Jl. Jatinegara Timur No.72, RT.6/RW.3, Bali Mester, Kecamatan Jatinegara, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13310, Indonesia ,Kecamatan Jatinegara ', 'Githa', 'SKTILOG', '15:16', 2, '07/12/2022', '1', 'Approve', ''),
(8, 'Jl. Kp. Jati Bening No.76, RT.6/RW.003, Jatibening Baru, Kec. Pd. Gede, Kota Bks, Jawa Barat 17412, Indonesia ,Kecamatan Pondok Gede ', 'Jl. Jatinegara Timur No.72, RT.6/RW.3, Bali Mester, Kecamatan Jatinegara, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13310, Indonesia ,Kecamatan Jatinegara ', 'Githa', 'BSIT', '4:44', 5, '07/13/2022', '1', 'Approve', ''),
(9, 'aaaaaaaaaaaaa', NULL, 'Githa Refina', 'SKAI', '17:01', 11, '2022-07-29', '1', 'Approve', ''),
(10, 'BCA Syariah Sunter', NULL, 'Efrinaldi', 'SKTILOG', '12:12', 13, '2022-07-18', '1', 'Approve', ''),
(11, 'Sunter Indah, Jl. Sunter Indah IX, RW.12, Sunter Jaya, Kota Jakarta Utara, Daerah Khusus Ibukota Jakarta, Indonesia', NULL, 'Githa Refina', 'SKTILOG', '01:05', 14, '2022-08-11', '1', 'Approve', ''),
(12, 'Mall Kelapa Gading, Kelapa Gading Timur, Kota Jakarta Utara, Daerah Khusus Ibukota Jakarta, Indonesia', NULL, 'Hatta', 'SKTILOG', '12:13', 13, '2022-07-19', '1', 'Approve', ''),
(13, 'Kafe Mainmain, Jalan Sukun Raya, Jaranan, Banguntapan, Kabupaten Bantul, Daerah Istimewa Yogyakarta, Indonesia', NULL, 'Eka P', 'SKTILOG', '13:15', 13, '2022-07-19', '1', 'Approve', 'Pergi ke kafe'),
(14, 'Jl. Kp. Jati Bening No.11, RT.6/RW.003, Jatibening Baru, Kec. Pd. Gede, Kota Bks, Jawa Barat 17412, Indonesia ,Kecamatan Pondok Gede ', NULL, 'Githa', 'SKTILOG', '15:8', 11, '07/19/2022', '1', 'Approve', ''),
(15, 'Grand Indonesia East Mall, Kebon Melati, Tanah Abang, Central Jakarta City, Jakarta 10230, Indonesia ,Tanah Abang ', NULL, 'Githa', 'SKTILOG', '16:16', 11, '07/19/2022', '0', 'Approve', ''),
(16, 'Jl. Kp. Jati Bening No.11, RT.6/RW.003, Jatibening Baru, Kec. Pd. Gede, Kota Bks, Jawa Barat 17412, Indonesia ,Kecamatan Pondok Gede ', NULL, 'Githa Refina', 'SKTILOG', '1:21', 11, '07/20/2022', '1', 'Approve', ''),
(17, 'Jl. Kp. Jati Bening No.11, RT.6/RW.003, Jatibening Baru, Kec. Pd. Gede, Kota Bks, Jawa Barat 17412, Indonesia ,Kecamatan Pondok Gede ', NULL, 'Githa Refina', 'SKTILOG', '21:29', 11, '07/20/2022', '1', 'Approve', ''),
(18, 'Jl. Kp. Jati Bening No.11, RT.6/RW.003, Jatibening Baru, Kec. Pd. Gede, Kota Bks, Jawa Barat 17412, Indonesia ,Kecamatan Pondok Gede ', NULL, 'Githa', 'SKTILOG', '17:41', 11, '07/20/2022', '1', 'Approve', ''),
(19, 'R2C9+4WH, Bahagia, Babelan, Bekasi Regency, West Java 17610, Indonesia ,Babelan ', NULL, 'Gita', 'SKTILOG', '18:25', 11, '07/20/2022', '0', 'Reject', ''),
(20, 'Jl. Kp. Jati Bening No.11, RT.6/RW.003, Jatibening Baru, Kec. Pd. Gede, Kota Bks, Jawa Barat 17412, Indonesia ,Kecamatan Pondok Gede ', NULL, 'Githa Refina', 'SKTILOG', '18:14', 11, '07/20/2022', '0', 'Reject', ''),
(21, 'Jl. Kp. Jati Bening No.11, RT.6/RW.003, Jatibening Baru, Kec. Pd. Gede, Kota Bks, Jawa Barat 17412, Indonesia ,Kecamatan Pondok Gede ', NULL, 'Githa Refina', 'SKTILOG', '20:53', 11, '07/20/2022', '0', 'Reject', ''),
(22, 'Jl. Kp. Jati Bening No.11, RT.6/RW.003, Jatibening Baru, Kec. Pd. Gede, Kota Bks, Jawa Barat 17412, Indonesia ,Kecamatan Pondok Gede ', NULL, 'Githa', 'SKTILOG', '3:2', 11, '07/20/2022', '0', 'Reject', ''),
(23, 'Depok Town Square, Jl. Margonda Raya No.1, Kemiri Muka, Kecamatan Beji, Kota Depok, Jawa Barat 16424, Indonesia ,Kecamatan Beji ', NULL, 'Efrinaldi', 'SKTILOG', '9:45', 13, '07/31/2022', '0', 'Reject', ''),
(24, 'VV2P+4RF, RT.10/RW.11, Sunter Jaya, Kec. Tj. Priok, Kota Jkt Utara, Daerah Khusus Ibukota Jakarta 14360, Indonesia ,Kecamatan Tanjung Priok ', NULL, 'Efrinaldi', 'SKTILOG', '10:0', 13, '07/31/2022', '1', 'Approve', ''),
(25, 'Jl. Kp. Jati Bening No.11, RT.6/RW.003, Jatibening Baru, Kec. Pd. Gede, Kota Bks, Jawa Barat 17412, Indonesia ,Kecamatan Pondok Gede ', NULL, 'Githa', 'SKTILOG', '12:3', 11, '07/21/2022', '0', 'Reject', ''),
(26, 'Jl. Margonda Raya No.182, Kemiri Muka, Kecamatan Beji, Kota Depok, Jawa Barat 16423, Indonesia ,Kecamatan Beji ', NULL, 'efrinaldi', 'SKTILOG', 'null', 13, '07/22/2022', '1', 'Approve', ''),
(27, 'Menara BCA Grand Indonesia 50th Floor, JL MH Thamrin, No. 1, RT.1/RW.5, Menteng, Kec. Menteng, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10310, Indonesia ,Kecamatan Menteng ', NULL, 'efrinaldi', 'SKTILOG', 'null', 13, '07/21/2022', '1', 'Approve', ''),
(28, 'Jl. Kp. Jati Bening No.11, RT.6/RW.003, Jatibening Baru, Kec. Pd. Gede, Kota Bks, Jawa Barat 17412, Indonesia ,Kecamatan Pondok Gede ', NULL, 'Githa', 'SKTILOG', '12:42', 11, '07/21/2022', '0', 'Reject', ''),
(29, 'Jl. Kp. Jati Bening No.11, RT.6/RW.003, Jatibening Baru, Kec. Pd. Gede, Kota Bks, Jawa Barat 17412, Indonesia ,Kecamatan Pondok Gede ', NULL, 'Githa', 'SKTILOG', '14:43', 11, '07/21/2022', '0', 'Reject', ''),
(30, 'Jl. Kp. Jati Bening No.11, RT.6/RW.003, Jatibening Baru, Kec. Pd. Gede, Kota Bks, Jawa Barat 17412, Indonesia ,Kecamatan Pondok Gede ', NULL, 'Githa', 'SKTILOG', '15:5', 11, '07/21/2022', '0', 'pending', ''),
(31, 'Sunter Mall Lantai 2, Jalan Danau Sunter Utara No. 3, Tanjung Priok, RT.14/RW.13, Sunter Agung, Kec. Tj. Priok, Kota Jkt Utara, Daerah Khusus Ibukota Jakarta 14350, Indonesia ,Kecamatan Tanjung Priok ', NULL, 'githa', 'SKTILOG', 'null', 11, '07/21/2022', '1', 'Approve', ''),
(32, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 'pending', ''),
(33, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 'pending', ''),
(34, 'Jl. Kp. Jati Bening No.11, RT.6/RW.003, Jatibening Baru, Kec. Pd. Gede, Kota Bks, Jawa Barat 17412, Indonesia ,Kecamatan Pondok Gede ', 'Jl. Jatinegara Timur No.72, RT.6/RW.3, Bali Mester, Kecamatan Jatinegara, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13310, Indonesia ,Kecamatan Jatinegara ', 'githa', 'SKTILOG', '12:42', 11, '07/22/2022', '1', 'Approve', 'ehhdhdhd'),
(35, 'Jl. Kp. Jati Bening No.11, RT.6/RW.003, Jatibening Baru, Kec. Pd. Gede, Kota Bks, Jawa Barat 17412, Indonesia ,Kecamatan Pondok Gede ', 'Jl. Jatinegara Timur No.72, RT.6/RW.3, Bali Mester, Kecamatan Jatinegara, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13310, Indonesia ,Kecamatan Jatinegara ', 'Githa', 'SKTILOG', '13:10', 11, '07/22/2022', '1', 'Approve', 'aaaaa'),
(36, 'Jl. Kp. Jati Bening No.11, RT.6/RW.003, Jatibening Baru, Kec. Pd. Gede, Kota Bks, Jawa Barat 17412, Indonesia ,Kecamatan Pondok Gede ', 'Jl. Jatinegara Timur No.72, RT.6/RW.3, Bali Mester, Kecamatan Jatinegara, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13310, Indonesia ,Kecamatan Jatinegara ', 'Githa', 'SKTILOG', '13:18', 11, '07/22/2022', '1', 'Approve', 'main '),
(37, 'Jl. Jatinegara Timur No.72, RT.6/RW.3, Bali Mester, Kecamatan Jatinegara, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13310, Indonesia ,Kecamatan Jatinegara ', 'Jl. Kp. Jati Bening No.11, RT.6/RW.003, Jatibening Baru, Kec. Pd. Gede, Kota Bks, Jawa Barat 17412, Indonesia ,Kecamatan Pondok Gede ', 'Githa', 'SKTILOG', '13:34', 11, '07/22/2022', '1', 'Approve', 'mauu makan'),
(38, 'Jl. Kp. Jati Bening No.11, RT.6/RW.003, Jatibening Baru, Kec. Pd. Gede, Kota Bks, Jawa Barat 17412, Indonesia ,Kecamatan Pondok Gede ', 'Jl. Jatinegara Timur No.72, RT.6/RW.3, Bali Mester, Kecamatan Jatinegara, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13310, Indonesia ,Kecamatan Jatinegara ', 'githa', 'SKTILOG', '14:56', 11, '07/22/2022', '1', 'Approve', 'makannn'),
(39, 'Jl. Kp. Jati Bening No.11, RT.6/RW.003, Jatibening Baru, Kec. Pd. Gede, Kota Bks, Jawa Barat 17412, Indonesia ,Kecamatan Pondok Gede ', 'Jl. Jatinegara Timur No.72, RT.6/RW.3, Bali Mester, Kecamatan Jatinegara, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13310, Indonesia ,Kecamatan Jatinegara ', 'Githa', 'SKTILOG', '15:10', 11, '07/22/2022', '0', 'pending', 'nau makan'),
(40, 'Jl. Kp. Jati Bening No.11, RT.6/RW.003, Jatibening Baru, Kec. Pd. Gede, Kota Bks, Jawa Barat 17412, Indonesia ,Kecamatan Pondok Gede ', 'Jl. Jatinegara Timur No.72, RT.6/RW.3, Bali Mester, Kecamatan Jatinegara, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13310, Indonesia ,Kecamatan Jatinegara ', 'githa', 'SKTILOG', '19:6', 11, '07/22/2022', '0', 'pending', 'makan'),
(41, 'Jl. Kp. Jati Bening No.11, RT.6/RW.003, Jatibening Baru, Kec. Pd. Gede, Kota Bks, Jawa Barat 17412, Indonesia ,Kecamatan Pondok Gede ', 'Jl. Jatinegara Timur No.72, RT.6/RW.3, Bali Mester, Kecamatan Jatinegara, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13310, Indonesia ,Kecamatan Jatinegara ', 'Githa', 'SKTILOG', '17:21', 11, '07/22/2022', '0', 'pending', 'makan'),
(42, 'Jl. Kp. Jati Bening No.11, RT.6/RW.003, Jatibening Baru, Kec. Pd. Gede, Kota Bks, Jawa Barat 17412, Indonesia ,Kecamatan Pondok Gede ', 'Jl. Jatinegara Timur No.72, RT.6/RW.3, Bali Mester, Kecamatan Jatinegara, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13310, Indonesia ,Kecamatan Jatinegara ', 'githa', 'SKTILOG', '16:22', 11, '07/22/2022', '0', 'pending', 'gajelas mau makan aja, jalan2'),
(43, 'Jl. Kp. Jati Bening No.11, RT.6/RW.003, Jatibening Baru, Kec. Pd. Gede, Kota Bks, Jawa Barat 17412, Indonesia ,Kecamatan Pondok Gede ', 'Jl. Jatinegara Timur No.72, RT.6/RW.3, Bali Mester, Kecamatan Jatinegara, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13310, Indonesia ,Kecamatan Jatinegara ', 'githa', 'SKTILOG', '16:22', 11, '07/22/2022', '0', 'pending', 'gajelas mau makan aja, jalan2'),
(44, 'Jl. Kp. Jati Bening No.11, RT.6/RW.003, Jatibening Baru, Kec. Pd. Gede, Kota Bks, Jawa Barat 17412, Indonesia ,Kecamatan Pondok Gede ', 'Jl. Jatinegara Timur No.72, RT.6/RW.3, Bali Mester, Kecamatan Jatinegara, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13310, Indonesia ,Kecamatan Jatinegara ', 'Githa', 'SKTILOG', '17:48', 11, '07/22/2022', '0', 'pending', 'jhhhjjj'),
(45, 'Jl. Kp. Jati Bening No.11, RT.6/RW.003, Jatibening Baru, Kec. Pd. Gede, Kota Bks, Jawa Barat 17412, Indonesia ,Kecamatan Pondok Gede ', 'Jl. Jatinegara Timur No.72, RT.6/RW.3, Bali Mester, Kecamatan Jatinegara, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13310, Indonesia ,Kecamatan Jatinegara ', 'Githa', 'SKTILOG', '22:12', 11, '07/24/2022', '0', 'pending', 'main'),
(46, 'Jl. Kp. Jati Bening No.11, RT.6/RW.003, Jatibening Baru, Kec. Pd. Gede, Kota Bks, Jawa Barat 17412, Indonesia ,Kecamatan Pondok Gede ', 'Jl. Jatinegara Timur No.72, RT.6/RW.3, Bali Mester, Kecamatan Jatinegara, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13310, Indonesia ,Kecamatan Jatinegara ', 'Githa', 'SKTILOG', '0:52', 11, '07/24/2022', '0', 'pending', 'mau makan makan'),
(47, 'PPRR+8FV Perum Ganda Asri 1, Jl. Cluster, Pd. Karya, Kec. Pd. Aren, Kota Tangerang Selatan, Banten 15225, Indonesia ,Kecamatan Pondok Aren ', 'Jl. Jatinegara Timur No.72, RT.6/RW.3, Bali Mester, Kecamatan Jatinegara, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13310, Indonesia ,Kecamatan Jatinegara ', 'ggggg', 'SKTILOG', 'null', 11, '07/26/2022', '1', 'Approve', 'hhhh'),
(48, 'R2C9+4WH, Bahagia, Babelan, Bekasi Regency, West Java 17610, Indonesia ,Babelan ', 'Jl. Jatinegara Timur No.72, RT.6/RW.3, Bali Mester, Kecamatan Jatinegara, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13310, Indonesia ,Kecamatan Jatinegara ', 'Githa', 'SKTILOG', '12:51', 11, '07/27/2022', '0', 'pending', 'hhhhh'),
(49, 'R2C9+4WH, Bahagia, Babelan, Bekasi Regency, West Java 17610, Indonesia ,Babelan ', 'Jl. Jatinegara Timur No.72, RT.6/RW.3, Bali Mester, Kecamatan Jatinegara, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13310, Indonesia ,Kecamatan Jatinegara ', 'Githa', 'SKTILOG', '12:51', 11, '07/27/2022', '1', 'Approve', 'hhhhh'),
(50, 'F92R+9GQ, Jl. Cipta Karya, Sidomulyo Bar., Kec. Tampan, Kota Pekanbaru, Riau, Indonesia ,Kecamatan Tampan ', 'Jl. Jatinegara Timur No.72, RT.6/RW.3, Bali Mester, Kecamatan Jatinegara, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13310, Indonesia ,Kecamatan Jatinegara ', 'githa', 'SKTILOG', 'null', 11, '07/27/2022', '0', 'Reject', 'ggshshhsha'),
(51, 'Jalan Penjernihan 1, RT.7/RW.6, Bendungan Hilir, Central Jakarta City, Jakarta, Indonesia', NULL, 'Budiari Ariyanto', 'SKTILOG', '09:00', 11, '2022-07-28', '1', 'Approve', 'meeting kordinasi'),
(52, 'Jl. Jatinegara Timur No.72, RT.6/RW.3, Bali Mester, Kecamatan Jatinegara, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13310, Indonesia ,Kecamatan Jatinegara ', 'Jl. Kp. Jati Bening No.11, RT.6/RW.003, Jatibening Baru, Kec. Pd. Gede, Kota Bks, Jawa Barat 17412, Indonesia ,Kecamatan Pondok Gede ', 'Githa', 'SKTILOG', '23:28', 11, '07/29/2022', '0', 'pending', 'hehehehe'),
(53, 'BCA Syariah - KC Sunter, Jalan Mitra Sunter Boulevard, RT.10/RW.11, Sunter Jaya, North Jakarta City, Jakarta, Indonesia', NULL, 'test', 'SKTILOG', '00:00', 37, '2022-08-18', '1', 'Approve', 'Maintenance Jaringan'),
(54, 'BCA Syariah - KC Sunter, Jalan Mitra Sunter Bulevar, RT.10/RW.11, Sunter Jaya, Kota Jakarta Utara, Daerah Khusus Ibukota Jakarta, Indonesia', NULL, 'test', 'SKTILOG', '15:00', 37, '2022-08-18', '0', 'Pending', 'betulin jaringan'),
(55, 'Sunter Mall, Jalan Danau Sunter Utara, RW.13, Sunter Agung, North Jakarta City, Jakarta, Indonesia', NULL, 'test', 'SKTILOG', '16:00', 37, '2022-08-18', '0', 'Pending', 'tester'),
(56, 'Jl. Kp. Jati Bening No.11, RT.6/RW.003, Jatibening Baru, Kec. Pd. Gede, Kota Bks, Jawa Barat 17412, Indonesia ,Kecamatan Pondok Gede ', 'Jl. Jatinegara Timur No.72, RT.6/RW.3, Bali Mester, Kecamatan Jatinegara, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13310, Indonesia ,Kecamatan Jatinegara ', 'gitja', 'SKTILOG', '22:25', 10, 'null', '0', 'pending', 'hshdjd'),
(57, 'Jl. Kp. Jati Bening No.11, RT.6/RW.003, Jatibening Baru, Kec. Pd. Gede, Kota Bks, Jawa Barat 17412, Indonesia ,Kecamatan Pondok Gede ', 'Jl. Jatinegara Timur No.72, RT.6/RW.3, Bali Mester, Kecamatan Jatinegara, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13310, Indonesia ,Kecamatan Jatinegara ', 'Githa', 'BSIT', '15:8', 10, '08/21/2022', '0', 'pending', 'shhdhd'),
(58, 'Jl. Kp. Jati Bening No.11, RT.6/RW.003, Jatibening Baru, Kec. Pd. Gede, Kota Bks, Jawa Barat 17412, Indonesia ,Kecamatan Pondok Gede ', 'Jl. Jatinegara Timur No.72, RT.6/RW.3, Bali Mester, Kecamatan Jatinegara, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13310, Indonesia ,Kecamatan Jatinegara ', 'gitga', 'BSIT', 'null', 10, '08/22/2022', '0', 'pending', 'hhhhhhhh'),
(59, 'Jl. Kp. Jati Bening No.11, RT.6/RW.003, Jatibening Baru, Kec. Pd. Gede, Kota Bks, Jawa Barat 17412, Indonesia ,Kecamatan Pondok Gede ', 'Jl. Jatinegara Timur No.72, RT.6/RW.3, Bali Mester, Kecamatan Jatinegara, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13310, Indonesia ,Kecamatan Jatinegara ', 'Githa', 'SKAI', 'null', 10, '08/25/2022', '0', 'pending', 'uueue'),
(60, 'Jl. Kp. Jati Bening No.11, RT.6/RW.003, Jatibening Baru, Kec. Pd. Gede, Kota Bks, Jawa Barat 17412, Indonesia ,Kecamatan Pondok Gede ', 'Jl. Jatinegara Timur No.72, RT.6/RW.3, Bali Mester, Kecamatan Jatinegara, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13310, Indonesia ,Kecamatan Jatinegara ', 'Githa', 'SKAI', 'null', 10, '08/25/2022', '0', 'pending', 'uueue'),
(61, 'Jl. Kp. Jati Bening No.11, RT.6/RW.003, Jatibening Baru, Kec. Pd. Gede, Kota Bks, Jawa Barat 17412, Indonesia ,Kecamatan Pondok Gede ', 'Jl. Jatinegara Timur No.72, RT.6/RW.3, Bali Mester, Kecamatan Jatinegara, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13310, Indonesia ,Kecamatan Jatinegara ', 'Githa', 'SKAI', 'null', 10, '08/25/2022', '0', 'pending', 'uueue'),
(62, 'Jl. Kp. Jati Bening No.11, RT.6/RW.003, Jatibening Baru, Kec. Pd. Gede, Kota Bks, Jawa Barat 17412, Indonesia ,Kecamatan Pondok Gede ', 'Jl. Jatinegara Timur No.72, RT.6/RW.3, Bali Mester, Kecamatan Jatinegara, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13310, Indonesia ,Kecamatan Jatinegara ', 'Githq', 'BSIT', '21:48', 10, '10/21/2022', '0', 'pending', 'untuk mengantad');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id` int(11) NOT NULL,
  `id_pemesanan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_pengemudi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengemudi`
--

CREATE TABLE `pengemudi` (
  `id_pengemudi` int(11) NOT NULL,
  `nama_pengemudi` varchar(255) NOT NULL,
  `status_pengemudi` varchar(255) DEFAULT NULL,
  `id_mobil` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `reimburse`
--

CREATE TABLE `reimburse` (
  `id` int(11) NOT NULL,
  `id_pemesanan` int(11) NOT NULL,
  `deskripsi` varchar(255) DEFAULT NULL,
  `nominal` int(11) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `status` enum('Requesting','Approved','Rejected') DEFAULT 'Requesting',
  `created_by` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `security`
--

CREATE TABLE `security` (
  `userid` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_divisi`
--

CREATE TABLE `user_divisi` (
  `userid` varchar(255) NOT NULL,
  `divisi` varchar(255) NOT NULL,
  `id_divisi` int(255) NOT NULL,
  `username` int(255) NOT NULL,
  `user_domain` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_divisi`
--

INSERT INTO `user_divisi` (`userid`, `divisi`, `id_divisi`, `username`, `user_domain`, `email`) VALUES
('githa_refina', '', 0, 0, 'githa_refina', ''),
('SCR001', '', 0, 0, 'SCR001', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`id_divisi`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mobil`
--
ALTER TABLE `mobil`
  ADD PRIMARY KEY (`id_mobil`);

--
-- Indeks untuk tabel `oauth_user`
--
ALTER TABLE `oauth_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengemudi`
--
ALTER TABLE `pengemudi`
  ADD PRIMARY KEY (`id_pengemudi`),
  ADD KEY `id_mobil` (`id_mobil`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `reimburse`
--
ALTER TABLE `reimburse`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reimburse_id_pemesanan_foreign` (`id_pemesanan`);

--
-- Indeks untuk tabel `security`
--
ALTER TABLE `security`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `divisi`
--
ALTER TABLE `divisi`
  MODIFY `id_divisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `mobil`
--
ALTER TABLE `mobil`
  MODIFY `id_mobil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `oauth_user`
--
ALTER TABLE `oauth_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `pengemudi`
--
ALTER TABLE `pengemudi`
  MODIFY `id_pengemudi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `reimburse`
--
ALTER TABLE `reimburse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `fk_pemesanan_id_pengemudi` FOREIGN KEY (`id_pengemudi`) REFERENCES `pengemudi` (`id_pengemudi`) ON DELETE CASCADE,
  ADD CONSTRAINT `pemesanan_ibfk_1` FOREIGN KEY (`id_pemesanan`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `pemesanan_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `oauth_user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `pengemudi`
--
ALTER TABLE `pengemudi`
  ADD CONSTRAINT `pengemudi_ibfk_1` FOREIGN KEY (`id_mobil`) REFERENCES `mobil` (`id_mobil`),
  ADD CONSTRAINT `pengemudi_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `oauth_user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `reimburse`
--
ALTER TABLE `reimburse`
  ADD CONSTRAINT `reimburse_id_pemesanan_foreign` FOREIGN KEY (`id_pemesanan`) REFERENCES `pemesanan` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

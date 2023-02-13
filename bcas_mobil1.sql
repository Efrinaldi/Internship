-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Waktu pembuatan: 13 Feb 2023 pada 12.16
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

--
-- Dumping data untuk tabel `activity_log`
--

INSERT INTO `activity_log` (`id`, `activity`, `date`) VALUES
(1, 'Menambahkan pesanan atas nama MBL001', '2022-12-06 11:26:32'),
(2, 'Menambahkan pesanan atas nama MBL001', '2022-12-06 11:35:00'),
(3, 'Menambahkan pesanan atas nama MBL001', '2022-12-06 11:37:18'),
(4, 'data order telah disetujui oleh otorisator departemen', '2022-12-06 11:51:10'),
(5, 'Menambahkan pesanan atas nama MBL001', '2022-12-06 12:14:13'),
(6, 'data order telah disetujui oleh otorisator departemen', '2022-12-06 12:14:24'),
(7, 'Menambahkan pesanan atas nama MBL001', '2022-12-06 12:27:29'),
(8, 'data order telah disetujui oleh otorisator departemen', '2022-12-06 12:27:35'),
(9, 'Menambahkan pesanan atas nama MBL001', '2022-12-06 12:34:09'),
(10, 'data order telah disetujui oleh otorisator departemen', '2022-12-06 12:35:28'),
(11, 'Menambahkan pesanan atas nama MBL001', '2022-12-06 12:35:57'),
(12, 'Menambahkan pesanan atas nama MBL004', '2022-12-07 04:18:40'),
(13, 'Menambahkan pesanan atas nama MBL004', '2022-12-07 07:27:27'),
(14, 'Menambahkan pesanan atas nama MBL004', '2022-12-07 07:27:56'),
(15, 'Menambahkan pesanan atas nama MBL004', '2022-12-07 07:34:00'),
(16, 'Menambahkan pesanan atas nama MBL004', '2022-12-07 07:35:10'),
(17, 'Menambahkan pesanan atas nama MBL004', '2022-12-07 07:38:56'),
(18, 'Menambahkan pesanan atas nama MBL004', '2022-12-07 07:45:00'),
(19, 'Menambahkan pesanan atas nama MBL004', '2022-12-07 07:46:44'),
(20, 'Menambahkan pesanan atas nama MBL003', '2022-12-08 03:51:09'),
(21, 'data order telah ditolak oleh otorisator departemen', '2022-12-08 04:26:16'),
(22, 'data order telah ditolak oleh otorisator departemen', '2022-12-08 04:26:20'),
(23, 'data order telah ditolak oleh otorisator departemen', '2022-12-08 04:26:23'),
(24, 'data order telah disetujui oleh otorisator departemen', '2022-12-08 04:26:25'),
(25, 'data order telah ditolak oleh otorisator departemen', '2022-12-08 04:27:01'),
(26, 'data order telah ditolak oleh otorisator departemen', '2022-12-08 04:27:03'),
(27, 'data order telah disetujui oleh otorisator departemen', '2022-12-08 04:27:06'),
(28, 'data order telah ditolak oleh otorisator departemen', '2022-12-08 04:27:12'),
(29, 'data order telah disetujui oleh otorisator departemen', '2022-12-08 04:28:33'),
(30, 'data order telah disetujui oleh otorisator departemen', '2022-12-08 04:28:36'),
(31, 'data order telah ditolak oleh otorisator departemen', '2022-12-08 04:28:38'),
(32, 'Menambahkan pesanan atas nama MBL003', '2022-12-08 08:35:31'),
(33, 'Menambahkan pesanan atas nama MBL003', '2022-12-08 08:36:50'),
(34, 'Menambahkan pesanan atas nama MBL003', '2022-12-08 08:38:14'),
(35, 'Menambahkan pesanan atas nama MBL003', '2022-12-08 08:38:58'),
(36, ' MBL003 sudah berhasil mendapatkan driver', '2022-12-07 20:56:54'),
(37, ' MBL003 sudah berhasil mendapatkan driver', '2022-12-07 20:57:54'),
(38, ' MBL003 sudah berhasil mendapatkan driver', '2022-12-07 20:58:15'),
(39, ' MBL003 sudah berhasil mendapatkan driver', '2022-12-07 20:58:22'),
(40, ' MBL003 sudah berhasil mendapatkan driver', '2022-12-07 21:43:22'),
(41, 'Menambahkan pesanan atas nama MBL003', '2022-12-08 11:34:54'),
(42, ' MBL003 sudah berhasil mendapatkan driver', '2022-12-08 00:33:10'),
(43, ' MBL003 sudah berhasil mendapatkan driver', '2022-12-08 00:53:19'),
(44, 'Menambahkan pesanan atas nama MBL001', '2022-12-08 12:54:55'),
(45, ' MBL003 sudah berhasil mendapatkan driver', '2022-12-08 02:03:45'),
(46, ' MBL003 sudah berhasil mendapatkan driver', '2022-12-08 02:04:37'),
(47, ' MBL003 sudah berhasil mendapatkan driver', '2022-12-08 02:04:42'),
(48, ' MBL003 sudah berhasil mendapatkan driver', '2022-12-08 02:05:07'),
(49, ' MBL003 sudah berhasil mendapatkan driver', '2022-12-09 01:46:34'),
(50, ' MBL003 sudah berhasil mendapatkan driver', '2022-12-09 02:09:02'),
(51, ' MBL003 sudah berhasil mendapatkan driver', '2022-12-09 03:20:58'),
(52, 'Menambahkan pesanan atas nama budiari_ariyanto', '2022-12-09 07:26:41'),
(53, 'Menambahkan pesanan atas nama MBL001', '2022-12-09 07:27:48'),
(54, 'Menambahkan pesanan atas nama MBL001', '2022-12-09 07:29:25'),
(55, 'Menambahkan pesanan atas nama MBL001', '2022-12-09 07:30:05'),
(56, 'Menambahkan pesanan atas nama MBL001', '2022-12-09 07:31:22'),
(57, 'Menambahkan pesanan atas nama budiari_ariyanto', '2022-12-09 07:42:24'),
(58, 'Menambahkan pesanan atas nama budiari_ariyanto', '2022-12-09 07:43:34'),
(59, 'Menambahkan pesanan atas nama MBL001', '2022-12-09 08:04:53'),
(60, ' MBL001 sudah berhasil mendapatkan driver', '2022-12-08 20:12:58'),
(61, 'Menambahkan pesanan atas nama budiari_ariyanto', '2022-12-09 08:16:32'),
(62, 'Menambahkan pesanan atas nama githa_refina', '2022-12-09 08:37:53'),
(63, 'Menambahkan pesanan atas nama githa_refina', '2022-12-09 08:39:49'),
(64, 'Menambahkan pesanan atas nama githa_refina', '2022-12-09 08:40:05'),
(65, 'Menambahkan pesanan atas nama githa_refina', '2022-12-09 08:40:31'),
(66, 'Menambahkan pesanan atas nama githa_refina', '2022-12-09 08:41:00'),
(67, 'Menambahkan pesanan atas nama githa_refina', '2022-12-09 08:41:40'),
(68, 'Menambahkan pesanan atas nama githa_refina', '2022-12-09 08:43:33'),
(69, 'Menambahkan pesanan atas nama githa_refina', '2022-12-09 08:46:15'),
(70, 'data order telah disetujui oleh otorisator departemen', '2022-12-09 08:47:50'),
(71, 'Menambahkan pesanan atas nama githa_refina', '2022-12-09 08:55:35'),
(72, 'Menambahkan pesanan atas nama githa_refina', '2022-12-09 10:08:44'),
(73, 'Menambahkan pesanan atas nama budiari_ariyanto', '2022-12-23 03:44:53'),
(74, 'Menambahkan pesanan atas nama DPTIOPR', '2022-12-30 08:18:16'),
(75, 'Menambahkan pesanan atas nama DPTIOPR ', '2022-12-30 08:24:49'),
(76, 'Menambahkan pesanan atas nama DPTIOPR', '2023-01-02 03:26:30'),
(77, 'data order telah disetujui oleh otorisator departemen', '2023-01-02 03:27:01'),
(78, 'Menambahkan pesanan atas nama DPTIOPR', '2023-01-02 07:20:40'),
(79, 'Menambahkan pesanan atas nama githa_refina', '2023-01-02 07:50:52'),
(80, 'Menambahkan pesanan atas nama githa_refina', '2023-01-02 08:33:05'),
(81, 'Menambahkan pesanan atas nama githa_refina', '2023-01-02 08:33:58'),
(82, 'Menambahkan pesanan atas nama githa_refina', '2023-01-02 08:34:28'),
(83, 'Menambahkan pesanan atas nama githa_refina', '2023-01-02 08:35:11'),
(84, 'Menambahkan pesanan atas nama githa_refina', '2023-01-02 08:35:50'),
(85, 'Menambahkan pesanan atas nama githa_refina', '2023-01-02 08:36:07'),
(86, 'Menambahkan pesanan atas nama githa_refina', '2023-01-02 08:50:52'),
(87, 'Menambahkan pesanan atas nama githa_refina', '2023-01-02 08:52:34'),
(88, 'Menambahkan pesanan atas nama githa_refina', '2023-01-02 08:54:03'),
(89, 'Menambahkan pesanan atas nama githa_refina', '2023-01-02 08:54:15'),
(90, 'Menambahkan pesanan atas nama githa_refina', '2023-01-02 08:55:38'),
(91, 'Menambahkan pesanan atas nama githa_refina', '2023-01-02 08:58:20'),
(92, 'Menambahkan pesanan atas nama githa_refina', '2023-01-02 09:04:19'),
(93, 'Menambahkan pesanan atas nama githa_refina', '2023-01-02 09:04:51'),
(94, 'Menambahkan pesanan atas nama githa_refina', '2023-01-02 09:49:08'),
(95, 'Menambahkan pesanan atas nama githa_refina', '2023-01-02 09:49:35'),
(96, 'Menambahkan pesanan atas nama githa_refina', '2023-01-02 09:52:19'),
(97, 'Menambahkan pesanan atas nama githa_refina', '2023-01-02 09:54:32'),
(98, 'Menambahkan pesanan atas nama githa_refina', '2023-01-02 09:55:11'),
(99, 'Menambahkan pesanan atas nama githa_refina', '2023-01-02 10:12:08'),
(100, 'Menambahkan pesanan atas nama githa_refina', '2023-01-02 10:14:41'),
(101, 'Menambahkan pesanan atas nama githa_refina', '2023-01-02 11:11:48'),
(102, 'Menambahkan pesanan atas nama githa_refina', '2023-01-02 11:33:09'),
(103, 'Menambahkan pesanan atas nama githa_refina', '2023-01-02 11:36:52'),
(104, 'Menambahkan pesanan atas nama githa_refina', '2023-01-02 11:50:09'),
(105, 'Menambahkan pesanan atas nama githa_refina', '2023-01-02 11:51:09'),
(106, 'Menambahkan pesanan atas nama githa_refina', '2023-01-02 11:51:55'),
(107, 'Menambahkan pesanan atas nama githa_refina', '2023-01-02 11:53:21'),
(108, 'Menambahkan pesanan atas nama githa_refina', '2023-01-02 11:53:54'),
(109, 'Menambahkan pesanan atas nama githa_refina', '2023-01-02 11:57:26'),
(110, 'Menambahkan pesanan atas nama githa_refina', '2023-01-02 12:00:58'),
(111, 'Menambahkan pesanan atas nama githa_refina', '2023-01-02 12:01:03'),
(112, 'Menambahkan pesanan atas nama githa_refina', '2023-01-02 12:01:07'),
(113, 'Menambahkan pesanan atas nama githa_refina', '2023-01-02 12:32:36'),
(114, 'Menambahkan pesanan atas nama githa_refina', '2023-01-02 12:33:37'),
(115, 'Menambahkan pesanan atas nama githa_refina', '2023-01-02 12:35:55'),
(116, 'Menambahkan pesanan atas nama githa_refina', '2023-01-02 12:36:41'),
(117, 'Menambahkan pesanan atas nama githa_refina', '2023-01-02 12:38:17'),
(118, 'Menambahkan pesanan atas nama githa_refina', '2023-01-02 12:41:59'),
(119, 'Menambahkan pesanan atas nama githa_refina', '2023-01-02 12:42:46'),
(120, 'Menambahkan pesanan atas nama DPTIOPR', '2023-01-03 01:47:21'),
(121, 'data order telah disetujui oleh otorisator departemen', '2023-01-03 01:47:37'),
(122, 'Menambahkan pesanan atas nama githa_refina', '2023-01-03 02:03:24'),
(123, 'Menambahkan pesanan atas nama githa_refina', '2023-01-03 02:07:01'),
(124, 'Menambahkan pesanan atas nama githa_refina', '2023-01-03 02:10:57'),
(125, ' githa_refina sudah berhasil mendapatkan driver', '2023-01-03 02:18:58'),
(126, ' DPTIOPR sudah berhasil mendapatkan driver', '2023-01-03 02:23:10'),
(127, 'Menambahkan pesanan atas nama githa_refina', '2023-01-03 02:33:46'),
(128, ' githa_refina sudah berhasil mendapatkan driver', '2023-01-03 02:40:54'),
(129, 'data order telah disetujui oleh otorisator departemen', '2023-01-03 03:31:25'),
(130, 'Menambahkan pesanan atas nama githa_refina', '2023-01-03 03:37:27'),
(131, 'Menambahkan pesanan atas nama DPTIOPR', '2023-01-03 03:38:23'),
(132, 'data order telah disetujui oleh otorisator departemen', '2023-01-03 03:38:34'),
(133, 'data order telah disetujui oleh otorisator departemen', '2023-01-03 03:38:40'),
(134, ' githa_refina sudah berhasil mendapatkan driver', '2023-01-03 03:39:10'),
(135, 'Menambahkan pesanan atas nama githa_refina', '2023-01-03 09:43:55'),
(136, 'Menambahkan pesanan atas nama githa_refina', '2023-01-04 08:09:55'),
(137, 'Menambahkan pesanan atas nama githa_refina', '2023-01-04 08:10:12'),
(138, 'Menambahkan pesanan atas nama githa_refina', '2023-01-04 08:12:22'),
(139, 'Menambahkan pesanan atas nama githa_refina', '2023-01-04 08:40:46'),
(140, 'Menambahkan pesanan atas nama githa_refina', '2023-01-04 09:03:06'),
(141, 'Menambahkan pesanan atas nama githa_refina', '2023-01-04 09:07:31'),
(142, 'Menambahkan pesanan atas nama githa_refina', '2023-01-04 09:50:04'),
(143, 'Menambahkan pesanan atas nama githa_refina', '2023-01-05 01:45:48'),
(144, 'Menambahkan pesanan atas nama githa_refina', '2023-01-05 01:47:47'),
(145, 'Menambahkan pesanan atas nama DPTIOPR', '2023-01-05 01:52:02'),
(146, 'data order telah disetujui oleh otorisator departemen', '2023-01-09 10:29:16'),
(147, 'Menambahkan pesanan atas nama githa_refina', '2023-01-10 04:41:15'),
(148, 'data order telah disetujui oleh otorisator departemen', '2023-01-10 06:09:58'),
(149, 'data order telah disetujui oleh otorisator departemen', '2023-01-10 06:10:20'),
(150, 'Menambahkan pesanan atas nama MBL001', '2023-01-10 06:17:51'),
(151, 'data order telah disetujui oleh otorisator departemen', '2023-01-10 06:18:27'),
(152, ' githa_refina sudah berhasil mendapatkan driver', '2023-01-09 18:35:39'),
(153, 'Menambahkan pesanan atas nama MBL001', '2023-01-11 03:21:38'),
(154, 'data order telah disetujui oleh otorisator departemen', '2023-01-11 03:22:01'),
(155, ' MBL001 sudah berhasil mendapatkan driver', '2023-01-11 03:23:08'),
(156, 'Menambahkan pesanan atas nama MBL001', '2023-01-11 03:38:29'),
(157, 'data order telah disetujui oleh otorisator departemen', '2023-01-11 03:39:30'),
(158, ' MBL001 sudah berhasil mendapatkan driver', '2023-01-10 18:46:49'),
(159, 'Menambahkan pesanan atas nama MBL0001', '2023-01-11 06:48:14'),
(160, 'data order telah disetujui oleh otorisator departemen', '2023-01-11 06:48:34'),
(161, ' MBL0001 sudah berhasil mendapatkan driver', '2023-01-10 18:49:12'),
(162, 'Menambahkan pesanan atas nama githa_refina', '2023-01-11 06:55:23'),
(163, 'data order telah disetujui oleh otorisator departemen', '2023-01-11 06:58:38'),
(164, ' githa_refina sudah berhasil mendapatkan driver', '2023-01-10 18:59:13'),
(165, 'Menambahkan pesanan atas nama MBL001', '2023-01-11 07:13:54'),
(166, 'data order telah disetujui oleh otorisator departemen', '2023-01-11 07:14:47'),
(167, ' MBL001 sudah berhasil mendapatkan driver', '2023-01-10 19:15:15'),
(168, 'Menambahkan pesanan atas nama githa_refina', '2023-01-13 03:26:01'),
(169, 'Menambahkan pesanan atas nama githa_refina', '2023-01-13 03:27:15'),
(170, 'Menambahkan pesanan atas nama githa_refina', '2023-01-13 03:29:13'),
(171, 'Menambahkan pesanan atas nama githa_refina', '2023-01-13 03:29:46'),
(172, 'Menambahkan pesanan atas nama githa_refina', '2023-01-13 03:32:41'),
(173, 'Menambahkan pesanan atas nama githa_refina', '2023-01-13 03:35:54'),
(174, 'Menambahkan pesanan atas nama githa_refina', '2023-01-13 03:36:17'),
(175, 'Menambahkan pesanan atas nama githa_refina', '2023-01-13 03:43:07'),
(176, 'Menambahkan pesanan atas nama githa_refina', '2023-01-13 03:49:11'),
(177, 'Menambahkan pesanan atas nama githa_refina', '2023-01-13 03:50:42'),
(178, 'Menambahkan pesanan atas nama githa_refina', '2023-01-13 03:50:53'),
(179, 'Menambahkan pesanan atas nama githa_refina', '2023-01-13 03:55:52'),
(180, 'Menambahkan pesanan atas nama githa_refina', '2023-01-13 03:56:53'),
(181, 'Menambahkan pesanan atas nama githa_refina', '2023-01-13 03:57:31'),
(182, 'Menambahkan pesanan atas nama githa_refina', '2023-01-13 03:57:41'),
(183, 'Menambahkan pesanan atas nama githa_refina', '2023-01-13 04:11:49'),
(184, 'Menambahkan pesanan atas nama githa_refina', '2023-01-13 07:38:50'),
(185, 'Menambahkan pesanan atas nama githa_refina', '2023-01-13 07:42:54'),
(186, 'Menambahkan pesanan atas nama githa_refina', '2023-01-13 07:43:23'),
(187, 'Menambahkan pesanan atas nama githa_refina', '2023-01-13 07:43:42'),
(188, 'Menambahkan pesanan atas nama githa_refina', '2023-01-13 07:44:03'),
(189, 'Menambahkan pesanan atas nama MBL0001', '2023-01-16 06:49:53'),
(190, 'Menambahkan pesanan atas nama MBL0001', '2023-01-16 06:50:17'),
(191, 'Menambahkan pesanan atas nama githa_refina', '2023-01-16 06:52:42'),
(192, 'Menambahkan pesanan atas nama MBL0001', '2023-01-16 06:53:59'),
(193, 'data order telah disetujui oleh otorisator departemen', '2023-01-16 07:14:12'),
(194, 'data order telah disetujui oleh otorisator departemen', '2023-01-16 07:14:50'),
(195, 'data order telah disetujui oleh otorisator departemen', '2023-01-16 07:15:28'),
(196, 'data order telah disetujui oleh otorisator departemen', '2023-01-16 07:15:30'),
(197, 'data order telah disetujui oleh otorisator departemen', '2023-01-16 07:16:39'),
(198, 'data order telah disetujui oleh otorisator departemen', '2023-01-16 07:16:41'),
(199, 'data order telah disetujui oleh otorisator departemen', '2023-01-16 07:16:43'),
(200, 'data order telah disetujui oleh otorisator departemen', '2023-01-16 07:17:07'),
(201, 'data order telah disetujui oleh otorisator departemen', '2023-01-16 07:17:08'),
(202, 'data order telah disetujui oleh otorisator departemen', '2023-01-16 07:18:47'),
(203, 'data order telah disetujui oleh otorisator departemen', '2023-01-16 07:18:49'),
(204, 'data order telah disetujui oleh otorisator departemen', '2023-01-16 07:18:51'),
(205, 'data order telah disetujui oleh otorisator departemen', '2023-01-16 07:18:54'),
(206, 'data order telah disetujui oleh otorisator departemen', '2023-01-16 07:18:58'),
(207, 'data order telah disetujui oleh otorisator departemen', '2023-01-16 07:19:02'),
(208, 'data order telah disetujui oleh otorisator departemen', '2023-01-16 07:27:27'),
(209, 'data order telah disetujui oleh otorisator departemen', '2023-01-16 07:27:30'),
(210, 'data order telah disetujui oleh otorisator departemen', '2023-01-16 07:27:54'),
(211, 'data order telah ditolak oleh otorisator departemen', '2023-01-16 07:27:57'),
(212, 'data order telah disetujui oleh otorisator departemen', '2023-01-16 07:30:11'),
(213, 'data order telah disetujui oleh otorisator departemen', '2023-01-16 07:30:16'),
(214, 'data order telah disetujui oleh otorisator departemen', '2023-01-16 07:30:18'),
(215, ' MBL0001 sudah berhasil mendapatkan driver', '2023-01-15 19:53:47'),
(216, 'Menambahkan pesanan atas nama MBL0001', '2023-01-16 09:25:21'),
(217, 'Menambahkan pesanan atas nama MBL0001', '2023-01-17 03:20:48'),
(218, ' MBL0001 sudah berhasil mendapatkan driver', '2023-01-17 04:24:01'),
(219, 'Menambahkan pesanan atas nama MBL0001', '2023-01-17 06:24:44'),
(220, 'Menambahkan pesanan atas nama MBL0001', '2023-01-17 06:30:15'),
(221, 'Menambahkan pesanan atas nama MBL0001', '2023-01-17 06:34:47'),
(222, ' MBL0001 sudah berhasil mendapatkan driver', '2023-01-16 20:41:18'),
(223, 'Menambahkan pesanan atas nama MBL0001', '2023-01-17 08:45:51'),
(224, 'Menambahkan pesanan atas nama MBL0001', '2023-01-17 08:53:59'),
(225, 'data order telah ditolak oleh otorisator departemen', '2023-01-17 08:55:45'),
(226, 'Menambahkan pesanan atas nama githa_refina', '2023-01-18 09:38:55'),
(227, 'Menambahkan pesanan atas nama githa_refina', '2023-01-18 09:39:07'),
(228, 'data order telah disetujui oleh otorisator departemen', '2023-01-18 10:02:58'),
(229, 'Menambahkan pesanan atas nama MBL0001', '2023-01-19 03:22:25'),
(230, 'Menambahkan pesanan atas nama MBL0001', '2023-01-19 03:23:16'),
(231, 'Menambahkan pesanan atas nama githa_refina', '2023-01-19 04:42:47'),
(232, 'Menambahkan pesanan atas nama githa_refina', '2023-01-19 05:14:11'),
(233, 'Menambahkan pesanan atas nama githa_refina', '2023-01-19 05:14:36'),
(234, 'Menambahkan pesanan atas nama githa_refina', '2023-01-19 05:30:32'),
(235, 'Menambahkan pesanan atas nama githa_refina', '2023-01-19 05:48:45'),
(236, 'Menambahkan pesanan atas nama githa_refina', '2023-01-19 05:53:34'),
(237, 'Menambahkan pesanan atas nama githa_refina', '2023-01-19 06:01:00'),
(238, 'Menambahkan pesanan atas nama githa_refina', '2023-01-19 06:02:09'),
(239, 'data order telah disetujui oleh otorisator departemen', '2023-01-19 06:07:12'),
(240, 'Menambahkan pesanan atas nama MBL0001', '2023-01-19 07:19:23'),
(241, 'data order telah disetujui oleh otorisator departemen', '2023-01-19 07:20:32'),
(242, 'Menambahkan pesanan atas nama Randa_prasetya', '2023-01-19 08:57:14'),
(243, 'Menambahkan pesanan atas nama SPVIT', '2023-01-19 10:13:38'),
(244, 'Menambahkan pesanan atas nama githa_refina', '2023-01-20 02:18:23'),
(245, 'data order telah ditolak oleh otorisator departemen', '2023-01-20 02:58:28'),
(246, 'Menambahkan pesanan atas nama SPVLOG', '2023-01-20 03:31:19'),
(247, 'Menambahkan pesanan atas nama SPVLOG', '2023-01-20 04:16:26'),
(248, 'Menambahkan pesanan atas nama SPVLOG', '2023-01-20 04:16:49'),
(249, 'Menambahkan pesanan atas nama SPVLOG', '2023-01-20 04:17:04'),
(250, 'Menambahkan pesanan atas nama SPVLOG', '2023-01-20 04:22:51'),
(251, 'Menambahkan pesanan atas nama SPVLOG', '2023-01-20 04:27:43'),
(252, 'data order telah disetujui oleh otorisator departemen', '2023-01-20 06:35:18'),
(253, 'Menambahkan pesanan atas nama SPVLOG', '2023-01-20 07:23:37'),
(254, 'Menambahkan pesanan atas nama SPVLOG', '2023-01-20 07:42:03'),
(255, 'data order telah disetujui oleh otorisator departemen', '2023-01-20 07:59:46'),
(256, ' SPVIT sudah berhasil mendapatkan driver', '2023-01-19 20:05:25'),
(257, ' SPVIT sudah berhasil mendapatkan driver', '2023-01-19 20:09:07'),
(258, ' SPVIT sudah berhasil mendapatkan driver', '2023-01-19 20:35:17'),
(259, 'Menambahkan pesanan atas nama Randa_prasetya', '2023-01-20 09:23:33'),
(260, 'Menambahkan pesanan atas nama Randa_prasetya', '2023-01-20 09:30:01'),
(261, 'Menambahkan pesanan atas nama Randa_prasetya', '2023-01-20 09:38:15'),
(262, 'Menambahkan pesanan atas nama SCR001', '2023-01-20 09:40:35'),
(263, 'Menambahkan pesanan atas nama Randa_prasetya', '2023-01-20 09:44:32'),
(264, 'Menambahkan pesanan atas nama Randa_prasetya', '2023-01-20 09:45:27'),
(265, 'Menambahkan pesanan atas nama githa_refina', '2023-01-20 09:45:40'),
(266, 'Menambahkan pesanan atas nama Randa_prasetya', '2023-01-20 09:47:46'),
(267, ' SPVIT sudah berhasil mendapatkan driver', '2023-01-19 21:54:34'),
(268, 'Menambahkan pesanan atas nama Randa_prasetya', '2023-01-20 10:27:42'),
(269, 'Menambahkan pesanan atas nama Randa_prasetya', '2023-01-20 10:32:13'),
(270, 'Menambahkan pesanan atas nama SPVLOG', '2023-01-20 10:37:03'),
(271, 'Menambahkan pesanan atas nama Randa_prasetya', '2023-01-20 10:43:17'),
(272, 'Menambahkan pesanan atas nama Randa_prasetya', '2023-01-20 10:49:16'),
(273, 'data order telah disetujui oleh otorisator departemen', '2023-01-20 10:54:25'),
(274, ' Randa_prasetya sudah berhasil mendapatkan driver', '2023-01-19 22:55:33'),
(275, ' Randa_prasetya sudah berhasil mendapatkan driver', '2023-01-19 22:56:55'),
(276, 'Menambahkan pesanan atas nama Randa_prasetya', '2023-01-24 01:33:15'),
(277, 'Menambahkan pesanan atas nama Randa_prasetya', '2023-01-24 01:49:22'),
(278, 'data order telah ditolak oleh otorisator departemen', '2023-01-24 02:06:37'),
(279, 'data order telah ditolak oleh otorisator departemen', '2023-01-24 02:06:49'),
(280, 'Menambahkan pesanan atas nama Randa_prasetya', '2023-01-24 02:11:50'),
(281, 'Menambahkan pesanan atas nama Randa_prasetya', '2023-01-24 02:47:09'),
(282, 'Menambahkan pesanan atas nama Randa_prasetya', '2023-01-24 03:18:03'),
(283, 'Menambahkan pesanan atas nama Randa_prasetya', '2023-01-24 03:20:45'),
(284, 'Menambahkan pesanan atas nama Randa_prasetya', '2023-01-24 03:39:42'),
(285, 'Menambahkan pesanan atas nama SPVLOG', '2023-01-25 05:13:18'),
(286, 'Menambahkan pesanan atas nama githa_refina', '2023-01-26 01:41:36'),
(287, 'Menambahkan pesanan atas nama githa_refina', '2023-01-26 02:59:59'),
(288, 'Menambahkan pesanan atas nama githa_refina', '2023-01-26 03:01:51'),
(289, 'Menambahkan pesanan atas nama githa_refina', '2023-01-26 03:39:28'),
(290, 'Menambahkan pesanan atas nama githa_refina', '2023-01-26 04:24:44'),
(291, 'Menambahkan pesanan atas nama githa_refina', '2023-01-26 04:28:42'),
(292, 'Menambahkan pesanan atas nama githa_refina', '2023-01-26 04:30:51'),
(293, 'Menambahkan pesanan atas nama githa_refina', '2023-01-26 04:36:25'),
(294, 'Menambahkan pesanan atas nama githa_refina', '2023-01-26 04:42:05'),
(295, 'Menambahkan pesanan atas nama githa_refina', '2023-01-26 04:44:10'),
(296, 'Menambahkan pesanan atas nama githa_refina', '2023-01-26 04:48:23'),
(297, 'Menambahkan pesanan atas nama githa_refina', '2023-01-26 04:51:30'),
(298, 'Menambahkan pesanan atas nama githa_refina', '2023-01-26 04:54:53'),
(299, 'Menambahkan pesanan atas nama githa_refina', '2023-01-26 04:56:31'),
(300, 'Menambahkan pesanan atas nama githa_refina', '2023-01-26 04:57:23'),
(301, 'Menambahkan pesanan atas nama githa_refina', '2023-01-26 04:58:34'),
(302, 'Menambahkan pesanan atas nama githa_refina', '2023-01-26 04:59:28'),
(303, 'Menambahkan pesanan atas nama githa_refina', '2023-01-26 06:05:55'),
(304, 'Menambahkan pesanan atas nama githa_refina', '2023-01-26 07:57:49'),
(305, 'Menambahkan pesanan atas nama githa_refina', '2023-01-26 07:58:38'),
(306, 'Menambahkan pesanan atas nama githa_refina', '2023-01-26 07:59:23'),
(307, ' SPVIT sudah berhasil mendapatkan driver', '2023-01-25 21:31:37'),
(308, ' SPVIT sudah berhasil mendapatkan driver', '2023-01-25 21:31:38'),
(309, ' SPVIT sudah berhasil mendapatkan driver', '2023-01-25 21:31:38'),
(310, ' SPVIT sudah berhasil mendapatkan driver', '2023-01-25 21:31:38'),
(311, ' SPVIT sudah berhasil mendapatkan driver', '2023-01-25 21:31:38'),
(312, ' SPVIT sudah berhasil mendapatkan driver', '2023-01-25 21:31:38'),
(313, 'Menambahkan pesanan atas nama githa_refina', '2023-01-26 09:41:27'),
(314, 'data order telah disetujui oleh otorisator departemen', '2023-01-26 10:04:36'),
(315, 'data order telah disetujui oleh otorisator departemen', '2023-01-26 10:04:38'),
(316, 'data order telah disetujui oleh otorisator departemen', '2023-01-26 10:04:40'),
(317, 'data order telah disetujui oleh otorisator departemen', '2023-01-26 10:12:24'),
(318, 'data order telah disetujui oleh otorisator departemen', '2023-01-27 02:03:20'),
(319, 'data order telah disetujui oleh otorisator departemen', '2023-01-27 06:42:03'),
(320, 'data order telah disetujui oleh otorisator departemen', '2023-01-27 07:25:56'),
(321, 'data order telah disetujui oleh otorisator departemen', '2023-01-27 07:25:59'),
(322, 'data order telah disetujui oleh otorisator departemen', '2023-01-27 07:26:05'),
(323, 'data order telah disetujui oleh otorisator departemen', '2023-01-27 07:26:11'),
(324, 'data order telah disetujui oleh otorisator departemen', '2023-01-27 07:34:46'),
(325, 'data order telah disetujui oleh otorisator departemen', '2023-01-27 07:34:50'),
(326, 'data order telah disetujui oleh otorisator departemen', '2023-01-27 07:34:53'),
(327, 'data order telah disetujui oleh otorisator departemen', '2023-01-27 07:34:56'),
(328, 'data order telah disetujui oleh otorisator departemen', '2023-01-27 07:35:19'),
(329, 'data order telah disetujui oleh otorisator departemen', '2023-01-27 07:35:22'),
(330, 'data order telah disetujui oleh otorisator departemen', '2023-01-27 07:37:03'),
(331, 'data order telah disetujui oleh otorisator departemen', '2023-01-27 07:37:07'),
(332, 'data order telah disetujui oleh otorisator departemen', '2023-01-27 07:37:29'),
(333, 'data order telah disetujui oleh otorisator departemen', '2023-01-27 07:37:35'),
(334, 'data order telah disetujui oleh otorisator departemen', '2023-01-27 07:37:40'),
(335, 'data order telah disetujui oleh otorisator departemen', '2023-01-27 07:37:46'),
(336, 'data order telah disetujui oleh otorisator departemen', '2023-01-27 07:37:52'),
(337, 'data order telah disetujui oleh otorisator departemen', '2023-01-27 07:38:41'),
(338, 'data order telah disetujui oleh otorisator departemen', '2023-01-27 07:39:21'),
(339, 'data order telah disetujui oleh otorisator departemen', '2023-01-27 07:39:26'),
(340, 'data order telah disetujui oleh otorisator departemen', '2023-01-27 07:39:36'),
(341, 'data order telah disetujui oleh otorisator departemen', '2023-01-27 07:40:48'),
(342, 'data order telah disetujui oleh otorisator departemen', '2023-01-27 07:44:10'),
(343, 'data order telah disetujui oleh otorisator departemen', '2023-01-27 07:44:14'),
(344, 'data order telah disetujui oleh otorisator departemen', '2023-01-27 07:46:07'),
(345, 'data order telah disetujui oleh otorisator departemen', '2023-01-27 07:47:56'),
(346, 'data order telah disetujui oleh otorisator departemen', '2023-01-27 09:22:53'),
(347, 'data order telah disetujui oleh otorisator departemen', '2023-01-27 09:23:01'),
(348, 'data order telah disetujui oleh otorisator departemen', '2023-01-27 09:23:09'),
(349, 'data order telah disetujui oleh otorisator departemen', '2023-01-30 07:03:46'),
(350, 'data order telah disetujui oleh otorisator departemen', '2023-01-30 10:23:05'),
(351, 'data order telah disetujui oleh otorisator departemen', '2023-01-30 10:23:09'),
(352, 'data order telah disetujui oleh otorisator departemen', '2023-01-30 10:26:04'),
(353, 'data order telah ditolak oleh otorisator departemen', '2023-01-30 10:26:11'),
(354, 'data order telah ditolak oleh otorisator departemen', '2023-01-30 10:26:16'),
(355, 'data order telah disetujui oleh otorisator departemen', '2023-01-31 02:16:34'),
(356, 'data order telah disetujui oleh otorisator departemen', '2023-01-31 02:16:38'),
(357, 'data order telah disetujui oleh otorisator departemen', '2023-01-31 02:16:42'),
(358, 'data order telah disetujui oleh otorisator departemen', '2023-01-31 04:01:38'),
(359, 'data order telah disetujui oleh otorisator departemen', '2023-01-31 06:17:42'),
(360, ' SPVIT sudah berhasil mendapatkan driver', '2023-01-30 21:19:54'),
(361, 'data order telah disetujui oleh otorisator departemen', '2023-01-31 10:57:03'),
(362, ' SPVIT sudah berhasil mendapatkan driver', '2023-01-30 22:58:03'),
(363, ' SPVIT sudah berhasil mendapatkan driver', '2023-01-30 23:03:44'),
(364, ' SPVIT sudah berhasil mendapatkan driver', '2023-01-30 23:06:01'),
(365, ' SPVIT sudah berhasil mendapatkan driver', '2023-01-30 23:10:20'),
(366, ' SPVIT sudah berhasil mendapatkan driver', '2023-02-01 01:40:20'),
(367, ' SPVIT sudah berhasil mendapatkan driver', '2023-02-01 01:48:30'),
(368, ' SPVIT sudah berhasil mendapatkan driver', '2023-02-01 02:19:58'),
(369, 'data order telah disetujui oleh otorisator departemen', '2023-02-01 02:22:00'),
(370, 'data order telah disetujui oleh otorisator departemen', '2023-02-01 02:25:30'),
(371, 'data order telah disetujui oleh otorisator departemen', '2023-02-01 02:32:57'),
(372, 'data order telah disetujui oleh otorisator departemen', '2023-02-01 03:27:29'),
(373, ' SPVIT sudah berhasil mendapatkan driver', '2023-02-01 04:06:02'),
(374, 'Menambahkan pesanan atas nama githa_refina', '2023-02-02 10:22:00'),
(375, 'Menambahkan pesanan atas nama githa_refina', '2023-02-02 10:32:19'),
(376, 'Menambahkan pesanan atas nama githa_refina', '2023-02-02 10:33:13'),
(377, 'Menambahkan pesanan atas nama githa_refina', '2023-02-02 10:36:59'),
(378, 'Menambahkan pesanan atas nama githa_refina', '2023-02-02 10:45:12'),
(379, 'Menambahkan pesanan atas nama Randa_prasetya', '2023-02-03 01:36:06'),
(380, 'Menambahkan pesanan atas nama githa_refina', '2023-02-03 01:42:29'),
(381, 'Menambahkan pesanan atas nama githa_refina', '2023-02-03 02:55:46'),
(382, 'Menambahkan pesanan atas nama githa_refina', '2023-02-03 04:49:26'),
(383, 'Menambahkan pesanan atas nama githa_refina', '2023-02-03 04:49:49'),
(384, 'Menambahkan pesanan atas nama githa_refina', '2023-02-03 04:52:58'),
(385, ' SPVIT sudah berhasil mendapatkan driver', '2023-02-02 19:46:01'),
(386, ' SPVIT sudah berhasil mendapatkan driver', '2023-02-02 20:16:23'),
(387, 'data order telah ditolak oleh otorisator departemen', '2023-02-03 08:42:09'),
(388, ' SPVLOG sudah berhasil mendapatkan driver', '2023-02-02 23:04:55'),
(389, 'data order telah ditolak oleh otorisator departemen', '2023-02-03 11:13:36'),
(390, 'data order telah ditolak oleh otorisator departemen', '2023-02-03 11:13:39'),
(391, ' SPVLOG sudah berhasil mendapatkan driver', '2023-02-06 01:35:24'),
(392, 'Menambahkan pesanan atas nama githa_refina', '2023-02-06 09:43:34'),
(393, 'Menambahkan pesanan atas nama githa_refina', '2023-02-06 09:44:33'),
(394, 'Menambahkan pesanan atas nama githa_refina', '2023-02-06 09:44:38'),
(395, 'Menambahkan pesanan atas nama githa_refina', '2023-02-06 09:44:40'),
(396, 'Menambahkan pesanan atas nama githa_refina', '2023-02-06 09:44:42'),
(397, 'Menambahkan pesanan atas nama githa_refina', '2023-02-06 09:44:44'),
(398, 'Menambahkan pesanan atas nama githa_refina', '2023-02-06 09:44:46'),
(399, 'Menambahkan pesanan atas nama githa_refina', '2023-02-06 09:44:47'),
(400, 'Menambahkan pesanan atas nama githa_refina', '2023-02-06 09:46:41'),
(401, 'Menambahkan pesanan atas nama githa_refina', '2023-02-06 09:46:55'),
(402, 'Menambahkan pesanan atas nama githa_refina', '2023-02-06 09:51:56'),
(403, 'Menambahkan pesanan atas nama githa_refina', '2023-02-06 09:52:15'),
(404, 'Menambahkan pesanan atas nama githa_refina', '2023-02-06 09:52:29'),
(405, 'Menambahkan pesanan atas nama githa_refina', '2023-02-06 09:54:38'),
(406, 'Menambahkan pesanan atas nama githa_refina', '2023-02-06 09:55:22'),
(407, 'Menambahkan pesanan atas nama githa_refina', '2023-02-06 10:01:22'),
(408, 'Menambahkan pesanan atas nama githa_refina', '2023-02-06 10:01:29'),
(409, 'Menambahkan pesanan atas nama githa_refina', '2023-02-06 10:01:50'),
(410, 'Menambahkan pesanan atas nama githa_refina', '2023-02-06 10:02:57'),
(411, 'Menambahkan pesanan atas nama githa_refina', '2023-02-06 10:11:34'),
(412, 'Menambahkan pesanan atas nama githa_refina', '2023-02-06 10:11:48'),
(413, 'Menambahkan pesanan atas nama githa_refina', '2023-02-06 10:13:31'),
(414, 'Menambahkan pesanan atas nama githa_refina', '2023-02-06 10:15:17'),
(415, 'Menambahkan pesanan atas nama githa_refina', '2023-02-06 10:15:26'),
(416, 'Menambahkan pesanan atas nama githa_refina', '2023-02-06 10:15:44'),
(417, 'Menambahkan pesanan atas nama githa_refina', '2023-02-06 10:15:59'),
(418, 'Menambahkan pesanan atas nama githa_refina', '2023-02-06 10:16:40'),
(419, 'Menambahkan pesanan atas nama githa_refina', '2023-02-06 10:16:42'),
(420, 'Menambahkan pesanan atas nama githa_refina', '2023-02-06 10:16:55'),
(421, 'Menambahkan pesanan atas nama githa_refina', '2023-02-06 10:17:06'),
(422, 'Menambahkan pesanan atas nama githa_refina', '2023-02-06 10:21:23'),
(423, 'Menambahkan pesanan atas nama githa_refina', '2023-02-06 10:23:16'),
(424, 'Menambahkan pesanan atas nama githa_refina', '2023-02-06 10:34:30'),
(425, 'Menambahkan pesanan atas nama githa_refina', '2023-02-06 10:34:39'),
(426, 'Menambahkan pesanan atas nama githa_refina', '2023-02-06 10:34:57'),
(427, 'Menambahkan pesanan atas nama githa_refina', '2023-02-06 10:36:15'),
(428, 'Menambahkan pesanan atas nama githa_refina', '2023-02-06 10:36:30'),
(429, 'Menambahkan pesanan atas nama githa_refina', '2023-02-06 10:37:29'),
(430, 'Menambahkan pesanan atas nama githa_refina', '2023-02-06 10:37:47'),
(431, 'Menambahkan pesanan atas nama githa_refina', '2023-02-06 10:39:03'),
(432, ' Randa_prasetya sudah berhasil mendapatkan driver', '2023-02-07 04:12:16'),
(433, ' SPVLOG sudah berhasil mendapatkan driver', '2023-02-07 04:27:43'),
(434, 'data order telah ditolak oleh otorisator departemen', '2023-02-07 04:28:18'),
(435, ' githa_refina sudah berhasil mendapatkan driver', '2023-02-08 03:36:37'),
(436, ' githa_refina sudah berhasil mendapatkan driver', '2023-02-07 19:02:16'),
(437, ' githa_refina sudah berhasil mendapatkan driver', '2023-02-07 20:54:42'),
(438, ' githa_refina sudah berhasil mendapatkan driver', '2023-02-07 21:38:35'),
(439, ' githa_refina sudah berhasil mendapatkan driver', '2023-02-07 22:29:28'),
(440, ' githa_refina sudah berhasil mendapatkan driver', '2023-02-07 22:29:58'),
(441, 'data order telah ditolak oleh otorisator departemen', '2023-02-09 07:38:55'),
(442, 'data order telah ditolak oleh otorisator departemen', '2023-02-09 07:38:55'),
(443, ' githa_refina sudah berhasil mendapatkan driver', '2023-02-08 19:39:00'),
(444, 'data order telah ditolak oleh otorisator departemen', '2023-02-09 09:42:22'),
(445, 'data order telah ditolak oleh otorisator departemen', '2023-02-09 10:15:27'),
(446, 'Menambahkan pesanan atas nama githa_refina', '2023-02-10 01:34:17'),
(447, 'Menambahkan pesanan atas nama githa_refina', '2023-02-10 01:39:11'),
(448, 'Menambahkan pesanan atas nama githa_refina', '2023-02-10 01:39:31'),
(449, 'Menambahkan pesanan atas nama githa_refina', '2023-02-10 01:40:45'),
(450, 'Menambahkan pesanan atas nama githa_refina', '2023-02-10 01:41:00'),
(451, 'Menambahkan pesanan atas nama githa_refina', '2023-02-10 01:48:07'),
(452, 'Menambahkan pesanan atas nama githa_refina', '2023-02-10 01:48:07'),
(453, 'Menambahkan pesanan atas nama githa_refina', '2023-02-10 02:13:57'),
(454, 'Menambahkan pesanan atas nama githa_refina', '2023-02-10 02:14:11'),
(455, 'Menambahkan pesanan atas nama githa_refina', '2023-02-10 02:14:25'),
(456, 'Menambahkan pesanan atas nama githa_refina', '2023-02-10 02:14:47'),
(457, 'Menambahkan pesanan atas nama githa_refina', '2023-02-10 02:14:58'),
(458, 'Menambahkan pesanan atas nama githa_refina', '2023-02-10 02:17:37'),
(459, 'Menambahkan pesanan atas nama githa_refina', '2023-02-10 02:17:50'),
(460, 'Menambahkan pesanan atas nama githa_refina', '2023-02-10 02:18:16'),
(461, 'Menambahkan pesanan atas nama githa_refina', '2023-02-10 02:18:29'),
(462, 'Menambahkan pesanan atas nama githa_refina', '2023-02-10 02:18:55'),
(463, 'Menambahkan pesanan atas nama githa_refina', '2023-02-10 02:19:38'),
(464, 'Menambahkan pesanan atas nama githa_refina', '2023-02-10 02:19:40'),
(465, 'Menambahkan pesanan atas nama githa_refina', '2023-02-10 02:19:53'),
(466, 'Menambahkan pesanan atas nama githa_refina', '2023-02-10 02:19:55'),
(467, 'Menambahkan pesanan atas nama githa_refina', '2023-02-10 02:19:58'),
(468, 'Menambahkan pesanan atas nama githa_refina', '2023-02-10 02:20:11'),
(469, 'Menambahkan pesanan atas nama githa_refina', '2023-02-10 02:20:29'),
(470, 'Menambahkan pesanan atas nama githa_refina', '2023-02-10 02:20:31'),
(471, 'Menambahkan pesanan atas nama githa_refina', '2023-02-10 03:19:18'),
(472, 'Menambahkan pesanan atas nama githa_refina', '2023-02-10 03:19:19'),
(473, 'Menambahkan pesanan atas nama githa_refina', '2023-02-10 03:19:19'),
(474, 'Menambahkan pesanan atas nama githa_refina', '2023-02-10 03:19:19'),
(475, 'Menambahkan pesanan atas nama githa_refina', '2023-02-10 03:19:19'),
(476, 'Menambahkan pesanan atas nama githa_refina', '2023-02-10 03:19:19'),
(477, 'Menambahkan pesanan atas nama githa_refina', '2023-02-10 03:19:20'),
(478, 'Menambahkan pesanan atas nama githa_refina', '2023-02-10 03:19:20'),
(479, 'Menambahkan pesanan atas nama githa_refina', '2023-02-10 03:19:20'),
(480, 'Menambahkan pesanan atas nama githa_refina', '2023-02-10 03:19:20'),
(481, 'Menambahkan pesanan atas nama githa_refina', '2023-02-10 03:19:20'),
(482, 'Menambahkan pesanan atas nama githa_refina', '2023-02-10 03:19:21'),
(483, 'Menambahkan pesanan atas nama githa_refina', '2023-02-10 03:19:21'),
(484, 'Menambahkan pesanan atas nama githa_refina', '2023-02-10 03:19:21'),
(485, 'Menambahkan pesanan atas nama githa_refina', '2023-02-10 03:19:21'),
(486, 'Menambahkan pesanan atas nama githa_refina', '2023-02-10 03:19:21'),
(487, 'Menambahkan pesanan atas nama githa_refina', '2023-02-10 03:19:21'),
(488, 'Menambahkan pesanan atas nama githa_refina', '2023-02-10 03:19:22'),
(489, 'Menambahkan pesanan atas nama githa_refina', '2023-02-10 03:19:22'),
(490, 'Menambahkan pesanan atas nama githa_refina', '2023-02-10 03:19:22'),
(491, 'Menambahkan pesanan atas nama githa_refina', '2023-02-10 03:19:22'),
(492, 'Menambahkan pesanan atas nama githa_refina', '2023-02-10 03:19:22'),
(493, 'Menambahkan pesanan atas nama githa_refina', '2023-02-10 03:19:22'),
(494, 'Menambahkan pesanan atas nama githa_refina', '2023-02-10 03:19:23'),
(495, 'Menambahkan pesanan atas nama githa_refina', '2023-02-10 03:19:24'),
(496, 'Menambahkan pesanan atas nama githa_refina', '2023-02-10 03:19:24'),
(497, 'Menambahkan pesanan atas nama githa_refina', '2023-02-10 03:22:58'),
(498, 'Menambahkan pesanan atas nama githa_refina', '2023-02-10 03:22:59'),
(499, 'Menambahkan pesanan atas nama githa_refina', '2023-02-10 03:22:59'),
(500, 'Menambahkan pesanan atas nama githa_refina', '2023-02-10 03:23:00'),
(501, 'Menambahkan pesanan atas nama githa_refina', '2023-02-10 03:23:00'),
(502, 'Menambahkan pesanan atas nama githa_refina', '2023-02-10 03:23:00'),
(503, 'Menambahkan pesanan atas nama githa_refina', '2023-02-10 03:23:01'),
(504, 'Menambahkan pesanan atas nama githa_refina', '2023-02-10 03:23:01'),
(505, 'Menambahkan pesanan atas nama githa_refina', '2023-02-10 03:23:01'),
(506, 'Menambahkan pesanan atas nama githa_refina', '2023-02-10 03:23:02'),
(507, 'Menambahkan pesanan atas nama githa_refina', '2023-02-10 03:28:04'),
(508, 'Menambahkan pesanan atas nama githa_refina', '2023-02-10 03:28:04'),
(509, 'Menambahkan pesanan atas nama githa_refina', '2023-02-10 03:28:05'),
(510, 'Menambahkan pesanan atas nama githa_refina', '2023-02-10 03:28:05'),
(511, 'Menambahkan pesanan atas nama githa_refina', '2023-02-10 03:28:05'),
(512, 'Menambahkan pesanan atas nama githa_refina', '2023-02-10 03:28:05'),
(513, 'Menambahkan pesanan atas nama githa_refina', '2023-02-10 03:28:05'),
(514, 'Menambahkan pesanan atas nama githa_refina', '2023-02-10 03:28:06'),
(515, 'Menambahkan pesanan atas nama githa_refina', '2023-02-10 03:28:06'),
(516, 'Menambahkan pesanan atas nama githa_refina', '2023-02-10 03:28:06'),
(517, 'Menambahkan pesanan atas nama githa_refina', '2023-02-10 03:28:06'),
(518, 'Menambahkan pesanan atas nama githa_refina', '2023-02-10 03:28:06'),
(519, 'Menambahkan pesanan atas nama githa_refina', '2023-02-10 03:28:06'),
(520, 'Menambahkan pesanan atas nama githa_refina', '2023-02-10 03:28:23'),
(521, 'Menambahkan pesanan atas nama githa_refina', '2023-02-10 03:35:48'),
(522, 'Menambahkan pesanan atas nama githa_refina', '2023-02-10 03:38:06'),
(523, 'Menambahkan pesanan atas nama githa_refina', '2023-02-10 04:22:08'),
(524, 'Menambahkan pesanan atas nama githa_refina', '2023-02-10 04:22:08'),
(525, 'Menambahkan pesanan atas nama githa_refina', '2023-02-10 04:22:11'),
(526, 'Menambahkan pesanan atas nama githa_refina', '2023-02-10 04:22:12'),
(527, 'Menambahkan pesanan atas nama githa_refina', '2023-02-10 04:22:13'),
(528, 'Menambahkan pesanan atas nama githa_refina', '2023-02-10 04:22:47'),
(529, 'Menambahkan pesanan atas nama githa_refina', '2023-02-10 04:23:28'),
(530, 'Menambahkan pesanan atas nama githa_refina', '2023-02-10 04:26:29'),
(531, 'Menambahkan pesanan atas nama githa_refina', '2023-02-10 04:26:30'),
(532, 'Menambahkan pesanan atas nama githa_refina', '2023-02-10 04:26:30'),
(533, 'Menambahkan pesanan atas nama githa_refina', '2023-02-10 04:26:30'),
(534, 'Menambahkan pesanan atas nama githa_refina', '2023-02-10 04:26:47'),
(535, 'Menambahkan pesanan atas nama githa_refina', '2023-02-10 04:27:34'),
(536, 'Menambahkan pesanan atas nama SPVIT', '2023-02-10 07:20:18'),
(537, 'Menambahkan pesanan atas nama SPVIT', '2023-02-10 07:20:19'),
(538, 'Menambahkan pesanan atas nama SPVIT', '2023-02-10 07:20:19'),
(539, 'Menambahkan pesanan atas nama SPVIT', '2023-02-10 07:20:19'),
(540, 'Menambahkan pesanan atas nama SPVIT', '2023-02-10 07:20:22'),
(541, 'Menambahkan pesanan atas nama SPVIT', '2023-02-10 07:20:22'),
(542, 'Menambahkan pesanan atas nama SPVIT', '2023-02-10 07:20:22'),
(543, 'Menambahkan pesanan atas nama SPVIT', '2023-02-10 07:20:24'),
(544, 'Menambahkan pesanan atas nama SPVIT', '2023-02-10 07:20:24'),
(545, 'Menambahkan pesanan atas nama SPVIT', '2023-02-10 07:27:30'),
(546, 'Menambahkan pesanan atas nama SPVIT', '2023-02-10 07:28:25'),
(547, 'Menambahkan pesanan atas nama SPVIT', '2023-02-10 07:29:03'),
(548, 'Menambahkan pesanan atas nama SPVIT', '2023-02-10 07:29:06'),
(549, 'Menambahkan pesanan atas nama SPVIT', '2023-02-10 07:30:35'),
(550, 'Menambahkan pesanan atas nama SPVIT', '2023-02-10 07:30:54'),
(551, 'Menambahkan pesanan atas nama SPVIT', '2023-02-10 07:31:15'),
(552, 'Menambahkan pesanan atas nama SPVIT', '2023-02-10 07:55:57'),
(553, 'Menambahkan pesanan atas nama SPVIT', '2023-02-10 07:57:09'),
(554, 'Menambahkan pesanan atas nama SPVIT', '2023-02-10 07:57:13'),
(555, 'Menambahkan pesanan atas nama SPVIT', '2023-02-10 08:12:00'),
(556, 'Menambahkan pesanan atas nama SPVIT', '2023-02-10 08:53:03'),
(557, 'Menambahkan pesanan atas nama SPVIT', '2023-02-10 09:24:52'),
(558, 'Menambahkan pesanan atas nama SPVIT', '2023-02-10 09:24:55'),
(559, 'Menambahkan pesanan atas nama SPVIT', '2023-02-10 09:24:57'),
(560, 'Menambahkan pesanan atas nama SPVIT', '2023-02-10 09:25:00'),
(561, 'Menambahkan pesanan atas nama SPVIT', '2023-02-10 09:25:07'),
(562, 'Menambahkan pesanan atas nama SPVIT', '2023-02-10 09:26:50'),
(563, 'Menambahkan pesanan atas nama SPVIT', '2023-02-10 09:28:55'),
(564, 'Menambahkan pesanan atas nama SPVIT', '2023-02-10 09:29:22'),
(565, 'Menambahkan pesanan atas nama SPVIT', '2023-02-10 09:29:34'),
(566, 'Menambahkan pesanan atas nama SPVIT', '2023-02-10 09:30:06'),
(567, 'Menambahkan pesanan atas nama SPVIT', '2023-02-10 09:30:36'),
(568, 'Menambahkan pesanan atas nama SPVIT', '2023-02-10 09:31:52'),
(569, 'Menambahkan pesanan atas nama SPVIT', '2023-02-10 09:32:31'),
(570, 'Menambahkan pesanan atas nama SPVIT', '2023-02-10 09:32:45'),
(571, 'Menambahkan pesanan atas nama SPVIT', '2023-02-10 09:33:17'),
(572, 'Menambahkan pesanan atas nama SPVIT', '2023-02-10 09:44:07'),
(573, 'Menambahkan pesanan atas nama SPVIT', '2023-02-10 09:48:07'),
(574, 'Menambahkan pesanan atas nama SPVIT', '2023-02-10 09:48:37'),
(575, 'Menambahkan pesanan atas nama SPVIT', '2023-02-10 09:49:34'),
(576, 'Menambahkan pesanan atas nama SPVIT', '2023-02-10 09:51:47'),
(577, 'Menambahkan pesanan atas nama SPVIT', '2023-02-10 09:52:01'),
(578, 'Menambahkan pesanan atas nama SPVIT', '2023-02-10 09:52:28'),
(579, 'Menambahkan pesanan atas nama SPVIT', '2023-02-10 09:53:43'),
(580, 'Menambahkan pesanan atas nama SPVIT', '2023-02-10 09:54:09'),
(581, 'Menambahkan pesanan atas nama SPVIT', '2023-02-10 09:54:23'),
(582, 'Menambahkan pesanan atas nama SPVIT', '2023-02-10 09:58:36'),
(583, 'Menambahkan pesanan atas nama SPVIT', '2023-02-10 10:00:27'),
(584, 'Menambahkan pesanan atas nama SPVIT', '2023-02-10 10:01:53'),
(585, 'Menambahkan pesanan atas nama SPVIT', '2023-02-10 10:07:04'),
(586, 'Menambahkan pesanan atas nama SPVIT', '2023-02-10 10:08:49'),
(587, 'Menambahkan pesanan atas nama SPVIT', '2023-02-10 10:09:41'),
(588, 'Menambahkan pesanan atas nama SPVIT', '2023-02-10 10:11:46'),
(589, 'Menambahkan pesanan atas nama SPVIT', '2023-02-10 10:12:41'),
(590, 'Menambahkan pesanan atas nama SPVLOG', '2023-02-10 10:35:25'),
(591, 'Menambahkan pesanan atas nama SPVLOG', '2023-02-10 10:36:48'),
(592, 'Menambahkan pesanan atas nama SPVLOG', '2023-02-10 10:36:58'),
(593, 'Menambahkan pesanan atas nama SPVLOG', '2023-02-10 10:38:48'),
(594, 'Menambahkan pesanan atas nama SPVLOG', '2023-02-10 10:40:35'),
(595, 'Menambahkan pesanan atas nama SPVLOG', '2023-02-10 10:40:50'),
(596, 'Menambahkan pesanan atas nama SPVLOG', '2023-02-10 10:41:22'),
(597, 'Menambahkan pesanan atas nama SPVLOG', '2023-02-13 01:48:56'),
(598, 'Menambahkan pesanan atas nama SPVLOG', '2023-02-13 01:49:06'),
(599, 'Menambahkan pesanan atas nama SPVLOG', '2023-02-13 01:50:43'),
(600, 'Menambahkan pesanan atas nama SPVLOG', '2023-02-13 01:51:28'),
(601, 'Menambahkan pesanan atas nama SPVLOG', '2023-02-13 01:51:46'),
(602, 'Menambahkan pesanan atas nama SPVLOG', '2023-02-13 01:53:47'),
(603, 'Menambahkan pesanan atas nama SPVLOG', '2023-02-13 01:54:26'),
(604, 'Menambahkan pesanan atas nama SPVLOG', '2023-02-13 01:54:39'),
(605, 'Menambahkan pesanan atas nama SPVLOG', '2023-02-13 01:54:58'),
(606, 'Menambahkan pesanan atas nama SPVLOG', '2023-02-13 01:55:15'),
(607, 'Menambahkan pesanan atas nama SPVLOG', '2023-02-13 01:55:52'),
(608, 'Menambahkan pesanan atas nama SPVLOG', '2023-02-13 01:56:07'),
(609, 'Menambahkan pesanan atas nama SPVLOG', '2023-02-13 01:57:54'),
(610, 'Menambahkan pesanan atas nama SPVLOG', '2023-02-13 01:59:50'),
(611, 'Menambahkan pesanan atas nama SPVLOG', '2023-02-13 02:00:43'),
(612, 'Menambahkan pesanan atas nama SPVLOG', '2023-02-13 02:01:05'),
(613, 'Menambahkan pesanan atas nama SPVLOG', '2023-02-13 02:02:01'),
(614, 'Menambahkan pesanan atas nama SPVLOG', '2023-02-13 02:09:32'),
(615, 'Menambahkan pesanan atas nama SPVLOG', '2023-02-13 02:09:36'),
(616, 'Menambahkan pesanan atas nama SPVLOG', '2023-02-13 02:11:33'),
(617, 'Menambahkan pesanan atas nama SPVLOG', '2023-02-13 02:12:04'),
(618, 'Menambahkan pesanan atas nama SPVLOG', '2023-02-13 02:24:13'),
(619, 'Menambahkan pesanan atas nama SPVLOG', '2023-02-13 02:24:20'),
(620, 'Menambahkan pesanan atas nama SPVLOG', '2023-02-13 02:24:45'),
(621, 'Menambahkan pesanan atas nama SPVLOG', '2023-02-13 02:24:49'),
(622, 'Menambahkan pesanan atas nama SPVLOG', '2023-02-13 02:38:20'),
(623, 'Menambahkan pesanan atas nama SPVLOG', '2023-02-13 02:39:21'),
(624, 'Menambahkan pesanan atas nama SPVLOG', '2023-02-13 02:40:04'),
(625, 'Menambahkan pesanan atas nama SPVLOG', '2023-02-13 02:40:30'),
(626, 'Menambahkan pesanan atas nama SPVLOG', '2023-02-13 02:42:21'),
(627, 'Menambahkan pesanan atas nama SPVLOG', '2023-02-13 02:43:27'),
(628, 'Menambahkan pesanan atas nama SPVLOG', '2023-02-13 02:43:57'),
(629, 'Menambahkan pesanan atas nama SPVLOG', '2023-02-13 02:44:04'),
(630, 'Menambahkan pesanan atas nama SPVLOG', '2023-02-13 02:44:12'),
(631, 'Menambahkan pesanan atas nama SPVLOG', '2023-02-13 02:45:01'),
(632, 'Menambahkan pesanan atas nama SPVLOG', '2023-02-13 02:47:37'),
(633, 'Menambahkan pesanan atas nama SPVIT', '2023-02-13 03:00:42'),
(634, 'Menambahkan pesanan atas nama SPVIT', '2023-02-13 03:00:49'),
(635, 'Menambahkan pesanan atas nama SPVIT', '2023-02-13 03:01:01'),
(636, 'Menambahkan pesanan atas nama SPVIT', '2023-02-13 03:01:54'),
(637, 'Menambahkan pesanan atas nama SPVIT', '2023-02-13 03:02:09'),
(638, 'Menambahkan pesanan atas nama SPVIT', '2023-02-13 03:03:30'),
(639, 'Menambahkan pesanan atas nama SPVIT', '2023-02-13 03:06:42'),
(640, 'Menambahkan pesanan atas nama SPVIT', '2023-02-13 03:06:55'),
(641, 'Menambahkan pesanan atas nama SPVIT', '2023-02-13 03:07:02'),
(642, 'Menambahkan pesanan atas nama SPVIT', '2023-02-13 03:07:17'),
(643, 'Menambahkan pesanan atas nama SPVIT', '2023-02-13 03:07:30'),
(644, 'Menambahkan pesanan atas nama SPVIT', '2023-02-13 03:08:35'),
(645, 'Menambahkan pesanan atas nama SPVIT', '2023-02-13 03:11:32'),
(646, 'Menambahkan pesanan atas nama SPVIT', '2023-02-13 03:12:43'),
(647, ' SPVIT sudah berhasil mendapatkan driver', '2023-02-13 03:15:11'),
(648, ' SPVLOG sudah berhasil mendapatkan driver', '2023-02-13 03:21:57'),
(649, ' SPVLOG sudah berhasil mendapatkan driver', '2023-02-13 03:35:35'),
(650, ' SPVLOG sudah berhasil mendapatkan driver', '2023-02-13 03:48:03'),
(651, ' SPVLOG sudah berhasil mendapatkan driver', '2023-02-13 04:00:45'),
(652, ' SPVLOG sudah berhasil mendapatkan driver', '2023-02-13 04:16:07'),
(653, ' SPVLOG sudah berhasil mendapatkan driver', '2023-02-13 04:30:20'),
(654, 'Menambahkan pesanan atas nama SPVLOG', '2023-02-13 04:30:40'),
(655, ' SPVLOG sudah berhasil mendapatkan driver', '2023-02-13 04:36:01'),
(656, ' SPVLOG sudah berhasil mendapatkan driver', '2023-02-12 19:42:36'),
(657, 'Menambahkan pesanan atas nama SPVLOG', '2023-02-13 07:42:50'),
(658, ' SPVLOG sudah berhasil mendapatkan driver', '2023-02-12 19:43:33'),
(659, ' SPVLOG sudah berhasil mendapatkan driver', '2023-02-12 21:25:19'),
(660, ' SPVLOG sudah berhasil mendapatkan driver', '2023-02-12 21:25:26'),
(661, ' SPVLOG sudah berhasil mendapatkan driver', '2023-02-12 21:33:32'),
(662, ' SPVLOG sudah berhasil mendapatkan driver', '2023-02-12 21:34:10'),
(663, ' SPVLOG sudah berhasil mendapatkan driver', '2023-02-12 21:34:43'),
(664, ' SPVIT sudah berhasil mendapatkan driver', '2023-02-12 21:35:13'),
(665, ' SPVLOG sudah berhasil mendapatkan driver', '2023-02-12 22:00:21'),
(666, 'Menambahkan pesanan atas nama SPVLOG', '2023-02-13 10:02:29'),
(667, 'Menambahkan pesanan atas nama SPVLOG', '2023-02-13 10:04:43'),
(668, 'Menambahkan pesanan atas nama SPVLOG', '2023-02-13 10:05:15'),
(669, 'Menambahkan pesanan atas nama SPVLOG', '2023-02-13 10:05:29'),
(670, 'Menambahkan pesanan atas nama SPVLOG', '2023-02-13 10:06:41'),
(671, 'Menambahkan pesanan atas nama SPVLOG', '2023-02-13 10:13:20'),
(672, 'Menambahkan pesanan atas nama SPVLOG', '2023-02-13 10:15:50'),
(673, 'Menambahkan pesanan atas nama SPVLOG', '2023-02-13 10:16:17');
INSERT INTO `activity_log` (`id`, `activity`, `date`) VALUES
(674, 'Menambahkan pesanan atas nama SPVLOG', '2023-02-13 10:17:28'),
(675, 'Menambahkan pesanan atas nama SPVLOG', '2023-02-13 10:17:29'),
(676, 'Menambahkan pesanan atas nama SPVLOG', '2023-02-13 10:17:29'),
(677, 'Menambahkan pesanan atas nama SPVLOG', '2023-02-13 10:17:29'),
(678, 'Menambahkan pesanan atas nama SPVLOG', '2023-02-13 10:17:29'),
(679, 'Menambahkan pesanan atas nama SPVLOG', '2023-02-13 10:17:29'),
(680, 'Menambahkan pesanan atas nama SPVLOG', '2023-02-13 10:17:29'),
(681, 'Menambahkan pesanan atas nama SPVLOG', '2023-02-13 10:17:31'),
(682, 'Menambahkan pesanan atas nama SPVLOG', '2023-02-13 10:17:31'),
(683, 'Menambahkan pesanan atas nama SPVLOG', '2023-02-13 10:17:32'),
(684, 'Menambahkan pesanan atas nama SPVLOG', '2023-02-13 10:17:48'),
(685, 'Menambahkan pesanan atas nama SPVLOG', '2023-02-13 10:17:49'),
(686, 'Menambahkan pesanan atas nama SPVLOG', '2023-02-13 10:19:33'),
(687, 'Menambahkan pesanan atas nama SPVLOG', '2023-02-13 10:19:46'),
(688, 'Menambahkan pesanan atas nama SPVLOG', '2023-02-13 10:20:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `atasan`
--

CREATE TABLE `atasan` (
  `id_divisi` int(11) NOT NULL,
  `userid` varchar(255) NOT NULL,
  `atasan` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `atasan`
--

INSERT INTO `atasan` (`id_divisi`, `userid`, `atasan`, `username`) VALUES
(30, 'DPTIOPR', 'user dpti', 'user dpti'),
(30, 'githa_refina', 'Githa Refina', 'Githa_refina'),
(1, 'MBL0001', 'Githa Refina', 'Githa Refina'),
(30, 'MBL001', '', 'Randa Prasetya'),
(30, 'SPVIT', 'Supervisor IT', 'Supervisor IT'),
(42, 'SPVLOG', 'Supervisor Logistik', 'Supervisor Logistik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `departemen`
--

CREATE TABLE `departemen` (
  `id_divisi` int(11) NOT NULL,
  `kode` int(11) NOT NULL,
  `divisi` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `id_satker` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `departemen`
--

INSERT INTO `departemen` (`id_divisi`, `kode`, `divisi`, `keterangan`, `id_satker`) VALUES
(1, 99, 'DEPARTEMEN LOGISTIK', '', 1),
(2, 99, 'DEPARTEMEN SENTRA OPERASI PERBANKAN', '', 2),
(7, 99, 'DEPARTEMEN SDM', '', 4),
(9, 99, 'DEPARTEMEN KOMUNIKASI & KESEKRETARIATAN PERUSAHAAN', '', 5),
(12, 99, 'DEPARTEMEN KEPATUHAN', '', 8),
(13, 99, 'DEPARTEMEN SISTEM PROSEDUR & PENDUKUNG OPERASI', '', 1),
(14, 99, 'DEPARTEMEN OPERASI TEKNOLOGI INFORMASI', '', 1),
(16, 99, 'DEPARTEMEN ADMINISTRASI PEMBIAYAAN', '', 2),
(20, 99, 'DEWAN PENGAWAS SYARIAH', '', 9),
(22, 99, 'DEPARTEMEN MANAJEMEN RISIKO', '', 10),
(25, 99, 'DEPARTEMEN PENDUKUNG BISNIS', '', 5),
(29, 99, 'DEPARTEMEN HUKUM', '', 4),
(30, 99, 'DEPARTEMEN TEKNOLOGI INFORMASI', '', 1),
(33, 99, 'DEPARTEMEN PENGEMBANGAN DAN PEMBINAAN JARINGAN CABANG', '', 5),
(34, 99, 'DEPARTEMEN AUDIT KANTOR PUSAT & ANTI FRAUD', '', 13),
(36, 99, 'DEPARTEMEN AUDIT KANTOR CABANG', '', 13),
(40, 99, 'DEPARTEMEN PENGEMBANGAN BISNIS', '', 5),
(42, 55, 'DISPATCHER', '', 6),
(44, 50, 'DRIVER', '', 3),
(45, 99, 'DIREKTUR', '', 9),
(47, 99, 'PENGEMBANGAN DAN LAYANAN BISNIS', '', 12),
(51, 99, 'SATUAN KERJA AUDIT INTERNAL', '', 13),
(52, 99, 'KOMISARIS', '', 9),
(53, 99, 'SATUAN KERJA KEUANGAN DAN PERENCANAAN PERUSAHAAN', '', 11),
(55, 99, 'SATUAN KERJA BISNIS DAN KOMUNIKASI', '', 5),
(56, 99, 'PRESIDEN DIREKTUR', '', 9),
(57, 99, 'SEKURITI TEKNOLOGI INFORMASI', '', 1);

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
  `keterangan_mobil` varchar(255) DEFAULT NULL,
  `userid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `mobil`
--

INSERT INTO `mobil` (`id_mobil`, `plat_nomor`, `status_mobil`, `keterangan_mobil`, `userid`) VALUES
(120, 'B 123 CD', 'Tidak Tersedia', NULL, 'gitaaa');

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
  `id_divisi` int(11) DEFAULT NULL,
  `waktu` varchar(255) DEFAULT NULL,
  `userid` varchar(100) DEFAULT NULL,
  `tanggal` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `tujuan_pakai` varchar(255) NOT NULL,
  `waktu_end` varchar(255) NOT NULL,
  `approval_userid` varchar(255) NOT NULL,
  `approval_domain` varchar(255) NOT NULL,
  `jumlah_orang` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`id`, `tujuan`, `asal`, `nama`, `id_divisi`, `waktu`, `userid`, `tanggal`, `status`, `keterangan`, `tujuan_pakai`, `waktu_end`, `approval_userid`, `approval_domain`, `jumlah_orang`) VALUES
(1, '1', '1', '1', 30, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1'),
(426, 'Republik Tiongkok, Kabupaten Taoyuan, Distrik Zhongli, Chunde Road, Xpark', 'BCA SYARIAH', 'SPVIT', 30, '05:11', 'SPVIT', '22/02/2023', '1', 'approve_departemen', 'c', '23:11', 'SPVIT', 'SPVIT', '1'),
(427, 'Valencia, Spanyol', 'BCA SYARIAH', 'SPVIT', 30, '05:12', 'SPVIT', '09/02/2023', '1', 'approve_departemen', 'c', '23:12', 'SPVIT', 'SPVIT', 'w'),
(428, 'Chicago, Illinois, Amerika Serikat', 'BCA SYARIAH', 'SPVLOG', 42, '05:40', 'SPVLOG', '23/02/2023', '1', 'approve_departemen', 'c', '21:40', 'SPVLOG', 'SPVLOG', '1'),
(429, 'eaaa', 'BCA SYARIAH', 'SPVLOG', 42, '02:48', 'SPVLOG', '10/02/2023', '1', 'approve', 'a', '08:48', 'SPVLOG', 'SPVLOG', '1'),
(430, '1', 'BCA SYARIAH', 'SPVIT', 30, '10:08', 'SPVIT', '16/02/2023', '1', 'approve', '1', '10:08', 'SPVIT', 'SPVIT', '1'),
(431, 'c', 'BCA SYARIAH', 'SPVIT', 30, '10:11', 'SPVIT', '02/02/2023', '0', 'approval_departemen', 'c', '16:11', 'SPVIT', 'SPVIT', '2'),
(432, 'c', 'BCA SYARIAH', 'SPVIT', 30, '10:12', 'SPVIT', '04/02/2023', '0', 'approval_departemen', '1', '22:12', 'SPVIT', 'SPVIT', '1'),
(433, 'c', 'BCA SYARIAH', 'SPVLOG', 42, '11:30', 'SPVLOG', '09/02/2023', '1', 'approve', 'c', '17:30', 'SPVLOG', 'SPVLOG', '1'),
(434, 'v', 'BCA SYARIAH', 'SPVLOG', 42, '14:42', 'SPVLOG', '22/02/2023', '1', 'approve_logistik', 'x', '19:42', 'SPVLOG', 'SPVLOG', '1'),
(435, 'c', 'BCA SYARIAH', 'SPVLOG', 42, '05:02', 'SPVLOG', '04/02/2023', '0', 'approval_departemen', 'd', '23:07', 'SPVLOG', 'SPVLOG', '1'),
(436, 'd', 'BCA SYARIAH', 'SPVLOG', 42, '05:04', 'SPVLOG', '15/02/2023', '0', 'approval_departemen', 'd', '23:04', 'SPVLOG', 'SPVLOG', '1'),
(437, 'c', 'BCA SYARIAH', 'SPVLOG', 42, '05:05', 'SPVLOG', '16/02/2023', '0', 'approval_departemen', 'd', '17:05', 'SPVLOG', 'SPVLOG', 'q'),
(438, 'c', 'BCA SYARIAH', 'SPVLOG', 42, '05:05', 'SPVLOG', '16/02/2023', '0', 'approval_departemen', 'd', '17:05', 'SPVLOG', 'SPVLOG', 'q'),
(439, 'c', 'BCA SYARIAH', 'SPVLOG', 42, '05:05', 'SPVLOG', '16/02/2023', '0', 'approval_departemen', 'd', '17:05', 'SPVLOG', 'SPVLOG', 'q'),
(440, 'c', 'BCA SYARIAH', 'SPVLOG', 42, '05:05', 'SPVLOG', '16/02/2023', '0', 'approval_departemen', 'd', '17:05', 'SPVLOG', 'SPVLOG', 'q'),
(441, 'c', 'BCA SYARIAH', 'SPVLOG', 42, '05:05', 'SPVLOG', '16/02/2023', '0', 'approval_departemen', 'd', '17:05', 'SPVLOG', 'SPVLOG', 'q'),
(442, 'c', 'BCA SYARIAH', 'SPVLOG', 42, '05:05', 'SPVLOG', '16/02/2023', '0', 'approval_departemen', 'd', '17:05', 'SPVLOG', 'SPVLOG', 'q'),
(443, 'c', 'BCA SYARIAH', 'SPVLOG', 42, '05:05', 'SPVLOG', '16/02/2023', '0', 'approval_departemen', 'd', '17:05', 'SPVLOG', 'SPVLOG', 'q'),
(444, 'c', 'BCA SYARIAH', 'SPVLOG', 42, '05:05', 'SPVLOG', '16/02/2023', '0', 'approval_departemen', 'd', '17:05', 'SPVLOG', 'SPVLOG', 'q'),
(445, 'c', 'BCA SYARIAH', 'SPVLOG', 42, '05:05', 'SPVLOG', '16/02/2023', '0', 'approval_departemen', 'd', '17:05', 'SPVLOG', 'SPVLOG', 'q'),
(446, 'z', 'BCA SYARIAH', 'SPVLOG', 42, '05:06', 'SPVLOG', '15/02/2023', '0', 'approval_departemen', 'd', '23:06', 'SPVLOG', 'SPVLOG', '1'),
(447, 'z', 'BCA SYARIAH', 'SPVLOG', 42, '05:06', 'SPVLOG', '15/02/2023', '0', 'approval_departemen', 'd', '23:06', 'SPVLOG', 'SPVLOG', '1'),
(448, 'z', 'BCA SYARIAH', 'SPVLOG', 42, '05:06', 'SPVLOG', '15/02/2023', '0', 'approval_departemen', 'd', '23:06', 'SPVLOG', 'SPVLOG', '1'),
(449, '-', 'BCA SYARIAH', 'SPVLOG', 42, '05:19', 'SPVLOG', '08/02/2023', '0', 'approval_departemen', '-', '17:19', 'SPVLOG', 'SPVLOG', '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan_mobil`
--

CREATE TABLE `pemesanan_mobil` (
  `id` int(11) NOT NULL,
  `id_pemesanan` int(11) NOT NULL,
  `id_pengemudi` varchar(255) CHARACTER SET utf8 NOT NULL,
  `id_mobil` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pemesanan_mobil`
--

INSERT INTO `pemesanan_mobil` (`id`, `id_pemesanan`, `id_pengemudi`, `id_mobil`) VALUES
(139, 433, 'gitaaa', 120);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengemudi`
--

CREATE TABLE `pengemudi` (
  `nama_pengemudi` varchar(255) NOT NULL,
  `status_pengemudi` varchar(255) DEFAULT NULL,
  `id_mobil` int(11) DEFAULT NULL,
  `userid` varchar(255) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `pengemudi`
--

INSERT INTO `pengemudi` (`nama_pengemudi`, `status_pengemudi`, `id_mobil`, `userid`) VALUES
('DPTI001', 'Tidak Tersedia', 120, 'gitaaa');

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
-- Struktur dari tabel `satuan_kerja`
--

CREATE TABLE `satuan_kerja` (
  `id` int(11) NOT NULL,
  `nama_satuan_kerja` varchar(255) NOT NULL,
  `userid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `satuan_kerja`
--

INSERT INTO `satuan_kerja` (`id`, `nama_satuan_kerja`, `userid`) VALUES
(1, 'SATUAN KERJA TI DAN LOGISTIK', ''),
(2, 'DIVISI OPERASI', ''),
(3, 'CABANG JABODETABEK', ''),
(4, 'SATUAN KERJA HUKUM DAN SDM', ''),
(5, 'SATUAN KERJA BISNIS DAN KOMUNIKASI', ''),
(6, 'CABANG NON JABODETABEK', ''),
(7, 'SATUAN KERJA ANALISA RISIKO PEMBIAYAAN', ''),
(8, 'KEPATUHAN', ''),
(9, 'PENGURUS BCA SYARIAH', ''),
(10, 'MANAJEMEN RISIKO ', ''),
(11, 'SATUAN KERJA KEUANGAN DAN PERENCANAAN PERUSAHAAN', ''),
(12, 'SATUAN KERJA BISNIS RITEL DAN KONSUMER', ''),
(13, 'SATUAN KERJA AUDIT INTERNAL', '');

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
  `username` varchar(255) NOT NULL,
  `user_domain` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `id_divisi` int(11) NOT NULL,
  `divisi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_divisi`
--

INSERT INTO `user_divisi` (`userid`, `username`, `user_domain`, `email`, `id_divisi`, `divisi`) VALUES
('Marcus', 'Marcus', '', '', 50, 'driver'),
('MBL0001', '0', 'randa_prasetya', '', 1, 'driver'),
('MBL001', 'Ginanjar Eka', 'ginanjar_eka ', '', 30, ''),
('MBL003', 'Githa Refina', 'githa_refina', '', 30, ''),
('MBL004', 'Budiari Ariyanto', 'githa_refina', '', 0, ''),
('Randa_prasetya', 'Randa', '', '', 50, 'driver'),
('SCR001', '', '', '', 57, ''),
('SPVIT', '', '', '', 30, ''),
('SPVLOG', '', '', '', 42, ''),
('tttttttt', '', '', '', 0, ''),
('yudhi_nurb', 'YUdhi', '', '', 50, 'driver');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `atasan`
--
ALTER TABLE `atasan`
  ADD PRIMARY KEY (`userid`),
  ADD KEY `id_divisi` (`id_divisi`);

--
-- Indeks untuk tabel `departemen`
--
ALTER TABLE `departemen`
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
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_ibfk_1` (`id_divisi`);

--
-- Indeks untuk tabel `pemesanan_mobil`
--
ALTER TABLE `pemesanan_mobil`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pemesanan` (`id_pemesanan`),
  ADD KEY `pemesanan_mobil_ibfk1` (`id_mobil`);

--
-- Indeks untuk tabel `pengemudi`
--
ALTER TABLE `pengemudi`
  ADD PRIMARY KEY (`userid`),
  ADD KEY `id_mobil` (`id_mobil`);

--
-- Indeks untuk tabel `reimburse`
--
ALTER TABLE `reimburse`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reimburse_id_pemesanan_foreign` (`id_pemesanan`);

--
-- Indeks untuk tabel `satuan_kerja`
--
ALTER TABLE `satuan_kerja`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `security`
--
ALTER TABLE `security`
  ADD PRIMARY KEY (`userid`);

--
-- Indeks untuk tabel `user_divisi`
--
ALTER TABLE `user_divisi`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=689;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `mobil`
--
ALTER TABLE `mobil`
  MODIFY `id_mobil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT untuk tabel `oauth_user`
--
ALTER TABLE `oauth_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=450;

--
-- AUTO_INCREMENT untuk tabel `pemesanan_mobil`
--
ALTER TABLE `pemesanan_mobil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT untuk tabel `reimburse`
--
ALTER TABLE `reimburse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT untuk tabel `satuan_kerja`
--
ALTER TABLE `satuan_kerja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `atasan`
--
ALTER TABLE `atasan`
  ADD CONSTRAINT `atasan_ibfk_3` FOREIGN KEY (`id_divisi`) REFERENCES `departemen` (`id_divisi`);

--
-- Ketidakleluasaan untuk tabel `departemen`
--
ALTER TABLE `departemen`
  ADD CONSTRAINT `departemen_ibfk_1` FOREIGN KEY (`id_satker`) REFERENCES `satuan_kerja` (`id`);

--
-- Ketidakleluasaan untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`id_divisi`) REFERENCES `departemen` (`id_divisi`);

--
-- Ketidakleluasaan untuk tabel `pemesanan_mobil`
--
ALTER TABLE `pemesanan_mobil`
  ADD CONSTRAINT `pemesanan_mobil_ibfk1` FOREIGN KEY (`id_mobil`) REFERENCES `mobil` (`id_mobil`) ON DELETE CASCADE,
  ADD CONSTRAINT `pemesanan_mobil_ibfk_1` FOREIGN KEY (`id_pemesanan`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `pemesanan_mobil_ibfk_2` FOREIGN KEY (`id_mobil`) REFERENCES `mobil` (`id_mobil`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `pengemudi`
--
ALTER TABLE `pengemudi`
  ADD CONSTRAINT `fk_id_mobil` FOREIGN KEY (`id_mobil`) REFERENCES `mobil` (`id_mobil`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `reimburse`
--
ALTER TABLE `reimburse`
  ADD CONSTRAINT `reimburse_id_pemesanan_foreign` FOREIGN KEY (`id_pemesanan`) REFERENCES `pemesanan` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

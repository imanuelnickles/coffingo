-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 01 Mei 2017 pada 20.48
-- Versi Server: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projecta`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `accessories`
--

CREATE TABLE `accessories` (
  `id_accessories` int(10) UNSIGNED NOT NULL,
  `name_accessories` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price_accessories` int(10) UNSIGNED NOT NULL,
  `picture_accessories` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `accessories`
--

INSERT INTO `accessories` (`id_accessories`, `name_accessories`, `price_accessories`, `picture_accessories`) VALUES
(1, 'Accessories 1', 100000, 'image/accessories_dummy.jpg'),
(2, 'Accessories 2', 120000, 'image/accessories_dummy.jpg'),
(3, 'Accessories 3', 100000, 'image/accessories_dummy.jpg'),
(4, 'Accessories 4\r\n', 120000, 'image/accessories_dummy.jpg'),
(5, 'Accessories 5', 120000, 'image/accessories/coffin.jpg'),
(7, 'Accessories Dummy', 10000000, 'image/accessories/coffin.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `coffin`
--

CREATE TABLE `coffin` (
  `id_coffin` int(10) UNSIGNED NOT NULL,
  `name_coffin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price_coffin` int(10) UNSIGNED NOT NULL,
  `picture_coffin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `coffin`
--

INSERT INTO `coffin` (`id_coffin`, `name_coffin`, `price_coffin`, `picture_coffin`) VALUES
(1, 'Peti 1', 2000000, 'image/coffin_dummy.jpeg'),
(3, 'Peti 2', 2500000, 'image/coffin_dummy.jpeg'),
(4, 'Peti 3', 2000000, 'image/coffin_dummy.jpeg'),
(5, 'Peti 4', 2500000, 'image/coffin/coffin.jpg'),
(6, 'Peti 5', 10000000, 'image/coffin/coffin.jpg'),
(8, 'Coffin Dummy', 900000, 'image/coffin/coffin.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `color`
--

CREATE TABLE `color` (
  `id_color` int(10) UNSIGNED NOT NULL,
  `name_color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price_color` int(10) UNSIGNED NOT NULL,
  `picture_color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `color`
--

INSERT INTO `color` (`id_color`, `name_color`, `price_color`, `picture_color`) VALUES
(1, 'Color 1', 100000, 'image/color_dummy.jpg'),
(2, 'Color 2', 100000, 'image/color_dummy.jpg'),
(3, 'Color 3', 200000, 'image/color_dummy.jpg'),
(4, 'Color 4', 200000, 'image/color_dummy.jpg'),
(5, 'Color Cklt', 300000, 'image/color/coffin.jpg'),
(7, 'Color Dummy', 90000, 'image/coffin/coffin.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_custom_transaction`
--

CREATE TABLE `detail_custom_transaction` (
  `id_detail_custom_transaction` int(10) UNSIGNED NOT NULL,
  `id_transaction` int(10) UNSIGNED NOT NULL,
  `id_coffin` int(10) UNSIGNED NOT NULL,
  `id_pattern` int(10) UNSIGNED NOT NULL,
  `id_color` int(10) UNSIGNED NOT NULL,
  `id_accessories` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `detail_custom_transaction`
--

INSERT INTO `detail_custom_transaction` (`id_detail_custom_transaction`, `id_transaction`, `id_coffin`, `id_pattern`, `id_color`, `id_accessories`) VALUES
(4, 45, 1, 1, 1, 1),
(6, 49, 4, 3, 3, 3),
(7, 53, 1, 1, 1, 1),
(8, 54, 1, 1, 1, 2),
(9, 60, 1, 2, 2, 2),
(10, 61, 1, 3, 3, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_transaction`
--

CREATE TABLE `detail_transaction` (
  `id_detail_transaction` int(10) UNSIGNED NOT NULL,
  `id_transaction` int(10) UNSIGNED NOT NULL,
  `id_product` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `detail_transaction`
--

INSERT INTO `detail_transaction` (`id_detail_transaction`, `id_transaction`, `id_product`) VALUES
(33, 44, 1),
(34, 47, 1),
(35, 48, 1),
(36, 50, 6),
(37, 51, 6),
(38, 52, 6),
(39, 55, 1),
(40, 56, 2),
(41, 57, 7),
(42, 58, 6),
(43, 59, 7),
(44, 62, 2),
(45, 63, 1),
(46, 64, 5);

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
(3, '2017_03_24_191245_create_product_table', 1),
(4, '2017_03_24_191329_create_coffin_table', 1),
(5, '2017_03_24_191338_create_pattern_table', 1),
(6, '2017_03_24_191348_create_color_table', 1),
(7, '2017_03_24_191358_create_accessories_table', 1),
(8, '2017_03_24_191413_create_transaction_table', 1),
(9, '2017_03_24_191440_create_detail_transaction_table', 1),
(10, '2017_03_24_191459_create_detail_custom_transaction_table', 1),
(11, '2017_03_24_191513_create_slider_table', 1);

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
-- Struktur dari tabel `pattern`
--

CREATE TABLE `pattern` (
  `id_pattern` int(10) UNSIGNED NOT NULL,
  `name_pattern` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price_pattern` int(10) UNSIGNED NOT NULL,
  `picture_pattern` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pattern`
--

INSERT INTO `pattern` (`id_pattern`, `name_pattern`, `price_pattern`, `picture_pattern`) VALUES
(1, 'Pattern 1', 200000, 'image/pattern_dummy.jpg'),
(2, 'Pattern 2', 250000, 'image/pattern_dummy.jpg'),
(3, 'Pattern 3', 200000, 'image/pattern_dummy.jpg'),
(4, 'Pattern 4', 250000, 'image/pattern_dummy.jpg'),
(5, 'Pattern 5', 250000, 'image/pattern_dummy.jpg'),
(7, 'Pattern Dummy', 780000, 'image/coffin/coffin.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `product`
--

CREATE TABLE `product` (
  `id_product` int(10) UNSIGNED NOT NULL,
  `name_product` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price_product` int(10) UNSIGNED NOT NULL,
  `picture_product` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `product`
--

INSERT INTO `product` (`id_product`, `name_product`, `price_product`, `picture_product`) VALUES
(1, 'Peti Keren', 2000000, 'image/peti_dummy.jpg'),
(2, 'Peti Mantap', 3500000, 'image/peti_dummy.jpg'),
(3, 'Peti Bagus', 5000000, 'image/peti_dummy.jpg'),
(4, 'Peti Raja', 5000000, 'image/peti_dummy.jpg'),
(5, 'Peti Kriz', 2500000, 'image/peti_dummy.jpg'),
(6, 'Peti Kraz', 2600000, 'image/peti_dummy.jpg'),
(7, 'Peti 1', 2000000, 'image/peti_dummy.jpg'),
(8, 'Peti 2', 3500000, 'image/peti_dummy.jpg'),
(9, 'Peti 3', 5000000, 'image/peti_dummy.jpg'),
(10, 'Peti 4', 5000000, 'image/product/peti_dummy.jpg'),
(11, 'Peti 5', 2500000, 'image/peti_dummy.jpg'),
(12, 'Peti 6', 2600000, 'image/peti_dummy.jpg'),
(13, 'Peti Keren', 2000000, 'image/peti_dummy.jpg'),
(14, 'Peti Mantap', 3500000, 'image/peti_dummy.jpg'),
(15, 'Peti Bagus', 5000000, 'image/peti_dummy.jpg'),
(16, 'Peti Raja', 5000000, 'image/peti_dummy.jpg'),
(17, 'Peti Kriz', 2500000, 'image/peti_dummy.jpg'),
(18, 'Peti Kraz', 2600000, 'image/peti_dummy.jpg'),
(19, 'Peti 1', 2000000, 'image/peti_dummy.jpg'),
(20, 'Peti 2', 3500000, 'image/peti_dummy.jpg'),
(21, 'Peti 3', 5000000, 'image/peti_dummy.jpg'),
(22, 'Peti 4', 5000000, 'image/peti_dummy.jpg'),
(23, 'Peti 5', 2500000, 'image/peti_dummy.jpg'),
(24, 'Peti 6', 2600000, 'image/peti_dummy.jpg'),
(26, 'Dummy', 8000000, 'image/product/Tekom (2).jpg'),
(27, 'asdd', 50000, 'image/product/Tekom (2).jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `slider`
--

CREATE TABLE `slider` (
  `id_slider` int(10) UNSIGNED NOT NULL,
  `id_users` int(10) UNSIGNED NOT NULL,
  `name_slider` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture_slider` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `slider`
--

INSERT INTO `slider` (`id_slider`, `id_users`, `name_slider`, `picture_slider`) VALUES
(1, 2, 'Slider X', 'image/slider/download3.jpg'),
(2, 2, 'Slider2', 'image/download2.jpg'),
(3, 2, 'tgthdg', 'image/slider/download2.jpg'),
(4, 2, 'Slider N', 'image/slider/download2.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaction`
--

CREATE TABLE `transaction` (
  `id_transaction` int(10) UNSIGNED NOT NULL,
  `id_users` int(10) UNSIGNED NOT NULL,
  `receiver_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `receiver_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `receiver_telp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` int(11) NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `payment_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reference_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `valid_until` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `transaction`
--

INSERT INTO `transaction` (`id_transaction`, `id_users`, `receiver_name`, `receiver_address`, `receiver_telp`, `total`, `status`, `payment_image`, `reference_code`, `created_at`, `updated_at`, `valid_until`) VALUES
(44, 3, 'Deadora', 'Harapan Jaya Blok A no 277', '081294568070', 2000000, 'Pending', NULL, 'CG-170404-001', '2017-04-04 14:29:25', '2017-04-04 14:29:25', '2017-04-06'),
(45, 3, 'Deadora', 'Harapan Jaya Blok A no 277', '081294568070', 2400000, 'Pending', NULL, 'CGC-170404-002', '2017-04-04 14:29:39', '2017-04-04 14:29:39', '2017-04-06'),
(46, 3, 'Deadora', 'Harapan Jaya Blok A no 277', '081294568070', 2600000, 'Pending', NULL, 'CGC-170404-003', '2017-04-04 14:32:24', '2017-04-04 14:32:24', '2017-04-06'),
(47, 3, 'Deadora', 'Harapan Jaya Blok A no 277', '081294568070', 2000000, 'Approved', NULL, 'CG-170404-004', '2017-04-04 14:38:54', '2017-04-04 18:14:38', '2017-04-06'),
(48, 3, 'Deadora', 'Harapan Jaya Blok A no 277', '081294568070', 2000000, 'Waiting for Approve', NULL, 'CG-170404-005', '2017-04-04 14:43:39', '2017-04-04 14:43:39', '2017-04-06'),
(49, 3, 'Deadora', 'Harapan Jaya Blok A no 277', '08129456807', 2500000, 'Waiting for Approve', NULL, 'CGC-170404-006', '2017-04-04 14:48:54', '2017-04-04 14:48:54', '2017-04-06'),
(50, 3, 'D', 'Harapan Jaya Blok A no 277', '081294568070', 2600000, 'Waiting for Approve', 'payment/3/Tekom (2).jpg', 'CG-170404-007', '2017-04-04 14:50:38', '2017-04-04 14:50:38', '2017-04-06'),
(51, 3, 'De', 'Harapan Jaya Blok A no 277', '081294568070', 2600000, 'Waiting for Approve', 'payment/3/Tekom (2).jpg', 'CG-170404-008', '2017-04-04 14:51:33', '2017-04-04 14:51:33', '2017-04-06'),
(52, 3, 'Deadora', 'Harapan Jaya', '081294568070', 2600000, 'Approved', 'payment/3/Tekom (2).jpg', 'CG-170404-009', '2017-04-04 14:56:07', '2017-04-07 09:15:55', '2017-04-06'),
(53, 3, 'Dea', 'Harapan Jaya Blok A no 277', '081294568070', 2400000, 'Approved', 'payment/3/Tekom (2).jpg', 'CGC-170404-010', '2017-04-04 14:57:09', '2017-04-04 09:03:31', '2017-04-06'),
(54, 3, 'Deadora', 'Harapan Jaya Blok A no 277', '081294568070', 2420000, 'Pending', NULL, 'CGC-170406-001', '2017-04-05 17:29:50', '2017-04-05 17:29:50', '2017-04-08'),
(55, 1, 'Imanuel Nickles Suharli', 'Harapan Jaya Blok A no 277 s', '081294568070', 2000000, 'Pending', NULL, 'CG-170406-002', '2017-04-05 17:37:48', '2017-04-05 17:37:48', '2017-04-08'),
(56, 3, 'Deadora', 'Harapan Jaya Blok A no 277', '0812932532423', 3500000, 'Pending', NULL, 'CG-170406-003', '2017-04-05 18:00:16', '2017-04-05 18:00:16', '2017-04-08'),
(57, 3, 'Deadora', 'Harapan Jaya Blok A no 277', '081294568070', 2000000, 'Pending', NULL, 'CG-170406-004', '2017-04-05 18:00:29', '2017-04-05 18:00:29', '2017-04-08'),
(58, 3, 'D', 'Harapan Jaya Blok A no 277', '081294568070', 2600000, 'Waiting for Approve', 'payment/3/pattern_dummy.jpg', 'CG-170406-005', '2017-04-05 18:09:46', '2017-04-07 13:50:53', '2017-04-08'),
(59, 1, 'Imanuel Nickles Suharli', 'Harapan Jaya Blok A no 277 shahah', '081294568070', 2000000, 'Pending', NULL, 'CG-170422-001', '2017-04-22 08:57:31', '2017-04-22 08:57:31', '2017-04-24'),
(60, 1, 'Imanuel Nickles Suharli', 'Harapan Jaya Blok A no 277 shahah', '081294568088', 2470000, 'Pending', NULL, 'CGC-170422-002', '2017-04-22 08:59:12', '2017-04-22 08:59:12', '2017-04-24'),
(61, 20, 'Asri', 'CRB CRB CRB CRB', '099090922321', 2520000, 'Waiting for Approve', 'payment/20/accessories_dummy.jpg', 'CGC-170423-001', '2017-04-23 16:29:26', '2017-04-23 16:30:08', '2017-04-25'),
(62, 1, 'Imanuel Nickles Suharli', 'Harapan Jaya Blok A no 277 shahah', '081294568070', 3500000, 'Approved', 'payment/1/color_dummy.jpg', 'CG-170425-001', '2017-04-25 13:41:28', '2017-04-25 13:42:44', '2017-04-27'),
(63, 1, 'Imanuel Nickles Suharli', 'Harapan Jaya Blok A no 277 shahah', '081294568070', 2000000, 'Pending', NULL, 'CG-170425-002', '2017-04-25 13:41:41', '2017-04-25 13:41:41', '2017-04-27'),
(64, 1, 'Imanuel Nickles Suharli', 'Harapan Jaya Blok A no 277 shahah', '081294568070', 2500000, 'Pending', NULL, 'CG-170425-003', '2017-04-25 15:12:50', '2017-04-25 15:12:50', '2017-04-27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(10) UNSIGNED NOT NULL DEFAULT '2',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `telp`, `address`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Imanuel Nickles Suharli', 'imanuelnickles@gmail.com', '081294568070', 'Harapan Jaya Blok A no 277 shahah', '$2y$10$UXzhk6MsqyHlIANpROxYl.RgrujiWEjf8pYxMzJlmPqW2HLyP/nDu', 2, 'KvOND61mBFSlqSB9LekAywuDNnLW1QWhLHLDmAR4DD1wgUOlAoqSTbUDPdwJ', '2017-03-28 12:19:36', '2017-04-25 08:12:33'),
(2, 'Admin', 'admin@gmail.com', '081294568070', 'Admin Admin Admin', '$2y$10$UXzhk6MsqyHlIANpROxYl.RgrujiWEjf8pYxMzJlmPqW2HLyP/nDu', 1, 'Rm9kzOWuqE7XpEbbX7QBIlEojbqizp1TR2ZsPyb3zaqvvpWJDY8midMDxyqc', '2017-03-30 07:19:26', '2017-03-30 07:19:26'),
(3, 'Deadora', 'deadoramalida@gmail.com', '081294568070', 'Harapan Jaya Blok A no 277', '$2y$10$qia1WMoN2A.77ZqWJPz5DeBu3uvBshBoJSUu5EdWAcDhwuwfgkjqK', 2, 'Mkiv70EoKjy93oW6UBHhvYJEyMqXx68W43OpUEE5ophXTitUgLfyQiUDyjk6', '2017-03-28 12:19:36', '2017-04-05 07:35:33'),
(5, 'Imanuel', 'B@gmail.com', '081294568070', 'Harapan Jaya Blok A no 277', '$2y$10$qia1WMoN2A.77ZqWJPz5DeBu3uvBshBoJSUu5EdWAcDhwuwfgkjqK', 2, NULL, '2017-03-28 12:19:36', '2017-03-28 12:19:36'),
(6, 'Deadora', 'C@gmail.com', '081294568070', 'Harapan Jaya Blok A no 277', '$2y$10$qia1WMoN2A.77ZqWJPz5DeBu3uvBshBoJSUu5EdWAcDhwuwfgkjqK', 2, NULL, '2017-03-28 12:19:36', '2017-03-28 12:19:36'),
(10, 'yaga', 'yaga@gmail.com', '081294568070', 'qwertyuiop asdasdsad', '$2y$10$UIluWx0kRSKtszRIYPj97uYEWiPUyTu7/OqS.zcZ3Hiq4d2DrO4r2', 2, 'Ja0LzuiGuhPIfkSUQPKLruGjTL79PSpXLsOo6GM3oe9yHao4xBxk2oVkN2D4', '2017-03-30 12:46:09', '2017-03-30 12:46:09'),
(11, 'alpin', 'alpin@gmail.com', '08129456807000', 'qwertyuiop', '$2y$10$93V193Tw1D3ZFMZZDmYac.fEgfqtIsPX1/QGmh65CRFZb4/u4/OHy', 2, 'Ld6yGTiSSga9rioRKzbkw2uhA2P2aWEbSpLmzmT8tN0BKDPvFaUHmTtHiHYy', '2017-03-30 12:55:58', '2017-03-30 12:55:58'),
(12, 'Imanuel', 'imanuel.suharli@binus.ac.id', '0812945680800', 'qwertyuiopqwertyuiop', '$2y$10$/KJ5Diidkm24JhWAzqmuleD046hEcGO7r/o78CPB4UciVBmULg9ne', 2, 'GT7jKp0mhVJTKGRJ7X1DtFnwiJE0y4xwWsfyIpAsSGOP2tcl0kWdsp69pGxC', '2017-03-30 12:57:56', '2017-03-30 12:57:56'),
(14, 'admin1', 'admin1@gmail.com', '08129963095', 'harapan indah blok G', '$2y$10$vJafg4tqXJPrQQLphYmevORhUmem2dzKFG.4p0YxodcQO.YtZ0SUu', 2, 'iGDec0e0Kg4fGgxUrfTcQfjIivoljQZX0dVA45H8mnWpFU6O6vySVCWLzm26', '2017-03-31 07:34:01', '2017-03-31 07:34:01'),
(15, 'admin2', 'admin2@gmail.com', '081294568070', 'harapan indah blok G', '$2y$10$tNR9tJ6w2ghw59bt27JWmuMcfA3iDxYdZuEM9/ZblDnABQ0VEZF/u', 2, '3C0ber6iHW7SkgkKOIjxfjcVdAy4MVfZNNLFFRMDZYVW5bc5FijoBdz8V1sc', '2017-03-31 07:34:32', '2017-03-31 07:34:32'),
(16, 'admin3', 'admin3@gmail.com', '0812945680700', 'harapan indah blok G', '$2y$10$2yUHSsFvfrrgAXYVfovHduoEZ/mvjHkLIjWepuJUm/0lFkvmRqnHm', 2, '7KoxKpka6JtrqUXCQr3NGrw1fTiIzmeisLUlyNSQp5JsJM4i0XWltBlAxYOU', '2017-03-31 07:35:02', '2017-03-31 07:35:02'),
(17, 'admin4', 'admin4@gmail.com', '08129456807000', 'harapan indah blok G', '$2y$10$qP7a6uNOOUAvENCGZg1lS.mPCkOzdMLvNTpAJ7KqHm0p1o/HijkCO', 2, NULL, '2017-03-31 07:35:40', '2017-03-31 07:35:40'),
(18, 'Dummy', 'dummy@gmail.com', '081294568888888', 'dummy@gmail.com', '$2y$10$VcrOFyqzbEnlvIkSgivbTuQFB6jnVsyX5FqupqGd6KV/DImbins7K', 2, 'f0OOf5OFGFCQKbU2YedeW461TiTWbgQmwFsnsBRi5zvj3XUKrdxnHMaGnZid', '2017-03-31 14:05:24', '2017-03-31 14:05:24'),
(19, 'Dummy1', 'dummy1@gmail.com', '08129456807', 'dummy1@gmail.com', '$2y$10$xsWMbnmRqsqsKuLwENjeYOm9el8tNWc8d2y3h1J99B38MqAEo5LS2', 2, 'aqL1jQcr9NLQBL598iW6MTebDkaRQMix5lrfcmX4kaRBSWbgswB9m4UZDU99', '2017-03-31 14:06:22', '2017-03-31 14:06:22'),
(20, 'Asri', 'asri@gmail.com', '099090922321', 'CRB CRB CRB CRB', '$2y$10$zFyh4of3DXg0TGAzbffi9e4SFGd8ACgxn3LiBbzO8IW6LNyzkwL6i', 2, 'KxFK5fohdXkNxOlOrHHGg6D6a1kWzbqqQfymY8lCM0xRCN1oJW9MmWZkwkmS', '2017-04-23 09:28:55', '2017-04-23 09:29:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accessories`
--
ALTER TABLE `accessories`
  ADD PRIMARY KEY (`id_accessories`);

--
-- Indexes for table `coffin`
--
ALTER TABLE `coffin`
  ADD PRIMARY KEY (`id_coffin`);

--
-- Indexes for table `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id_color`);

--
-- Indexes for table `detail_custom_transaction`
--
ALTER TABLE `detail_custom_transaction`
  ADD PRIMARY KEY (`id_detail_custom_transaction`),
  ADD KEY `detail_custom_transaction_id_transaction_foreign` (`id_transaction`),
  ADD KEY `detail_custom_transaction_id_coffin_foreign` (`id_coffin`),
  ADD KEY `detail_custom_transaction_id_pattern_foreign` (`id_pattern`),
  ADD KEY `detail_custom_transaction_id_color_foreign` (`id_color`),
  ADD KEY `detail_custom_transaction_id_accessories_foreign` (`id_accessories`);

--
-- Indexes for table `detail_transaction`
--
ALTER TABLE `detail_transaction`
  ADD PRIMARY KEY (`id_detail_transaction`),
  ADD KEY `detail_transaction_id_transaction_foreign` (`id_transaction`),
  ADD KEY `id_product` (`id_product`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pattern`
--
ALTER TABLE `pattern`
  ADD PRIMARY KEY (`id_pattern`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id_slider`),
  ADD KEY `slider_id_users_foreign` (`id_users`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id_transaction`),
  ADD KEY `transaction_id_users_foreign` (`id_users`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accessories`
--
ALTER TABLE `accessories`
  MODIFY `id_accessories` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `coffin`
--
ALTER TABLE `coffin`
  MODIFY `id_coffin` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `color`
--
ALTER TABLE `color`
  MODIFY `id_color` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `detail_custom_transaction`
--
ALTER TABLE `detail_custom_transaction`
  MODIFY `id_detail_custom_transaction` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `detail_transaction`
--
ALTER TABLE `detail_transaction`
  MODIFY `id_detail_transaction` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `pattern`
--
ALTER TABLE `pattern`
  MODIFY `id_pattern` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id_slider` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id_transaction` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_custom_transaction`
--
ALTER TABLE `detail_custom_transaction`
  ADD CONSTRAINT `detail_custom_transaction_id_accessories_foreign` FOREIGN KEY (`id_accessories`) REFERENCES `accessories` (`id_accessories`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_custom_transaction_id_coffin_foreign` FOREIGN KEY (`id_coffin`) REFERENCES `coffin` (`id_coffin`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_custom_transaction_id_color_foreign` FOREIGN KEY (`id_color`) REFERENCES `color` (`id_color`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_custom_transaction_id_pattern_foreign` FOREIGN KEY (`id_pattern`) REFERENCES `pattern` (`id_pattern`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_custom_transaction_id_transaction_foreign` FOREIGN KEY (`id_transaction`) REFERENCES `transaction` (`id_transaction`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `detail_transaction`
--
ALTER TABLE `detail_transaction`
  ADD CONSTRAINT `detail_transaction_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_transaction_id_transaction_foreign` FOREIGN KEY (`id_transaction`) REFERENCES `transaction` (`id_transaction`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `slider`
--
ALTER TABLE `slider`
  ADD CONSTRAINT `slider_id_users_foreign` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_id_users_foreign` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

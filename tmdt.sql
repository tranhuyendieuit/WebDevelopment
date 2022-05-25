-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2021 at 11:46 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tmdt`
--

-- --------------------------------------------------------

--
-- Table structure for table `chi_tiet_don_hangs`
--

CREATE TABLE `chi_tiet_don_hangs` (
  `id` int(11) NOT NULL,
  `id_hang_hoa` int(11) DEFAULT NULL,
  `so_luong` int(11) NOT NULL,
  `id_Don_hang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `id_hang_hoa` int(11) NOT NULL,
  `id_khach_hang` int(11) NOT NULL,
  `noi_dung` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `id_hang_hoa`, `id_khach_hang`, `noi_dung`) VALUES
(64, 74, 72, 'Áo đẹp, chất lượng tuyệt vời'),
(65, 74, 73, 'okela');

-- --------------------------------------------------------

--
-- Table structure for table `don_hangs`
--

CREATE TABLE `don_hangs` (
  `id` int(11) NOT NULL,
  `ten_khach_hang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `so_dien_thoai` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dia_chi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Ngay_Dat_Hang` date NOT NULL,
  `Trang_Thai` int(11) NOT NULL,
  `tong_tien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `don_hangs`
--

INSERT INTO `don_hangs` (`id`, `ten_khach_hang`, `so_dien_thoai`, `dia_chi`, `Ngay_Dat_Hang`, `Trang_Thai`, `tong_tien`) VALUES
(201, 'Linh My', '098764562', 'Khối 2_ Thị Trấn Yên Thành_ Nghệ An', '2021-11-30', 1, 840000);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hang_hoas`
--

CREATE TABLE `hang_hoas` (
  `id` int(11) NOT NULL,
  `Ten_hang_hoa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_search` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gia` int(11) NOT NULL,
  `so_luong_hang` int(11) NOT NULL,
  `hinh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mo_ta` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_loai` int(11) NOT NULL,
  `lvproduct` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hang_hoas`
--

INSERT INTO `hang_hoas` (`id`, `Ten_hang_hoa`, `name_search`, `gia`, `so_luong_hang`, `hinh`, `mo_ta`, `id_loai`, `lvproduct`) VALUES
(58, 'Áo thun tay lỡ HADE - BASIC WASHED', 'Áo-thun-tay-lỡ-HADES---BASIC-WASHED', 1099000, 12, 'public/uploads/80-a4.jpg', '<p>Chi tiết sản phẩm:</p>\r\n\r\n<p>- Chất liệu: Cotton 2 chiều 100%</p>\r\n\r\n<p>- Form unisex</p>\r\n\r\n<p>- Chất liệu in lụa</p>\r\n\r\n<p>- Made in Vietnam</p>\r\n\r\n<p>- Logo th&ecirc;u tr&ecirc;n tay &aacute;o</p>\r\n\r\n<p>SIZE CHART</p>\r\n\r\n<p><br />\r\nS: 1m5 - 1m6 / 45kg - 55kg</p>\r\n\r\n<p><br />\r\nM: 1m6 - 1m7 / 55kg - 70kg</p>\r\n\r\n<p><br />\r\nL: 1m7 - 1m8 / 70kg - 85kg</p>\r\n', 5, '0'),
(63, 'Quần lưng thun HADES - RAZOR', 'Quần-lưng-thun-HADES---RAZOR', 399000, 30, 'public/uploads/22-q1.jpg', '<p>Chi tiết sản phẩm:</p>\r\n\r\n<p><br />\r\n- Chất liệu: Nỉ cotton</p>\r\n\r\n<p><br />\r\n- Form unisex</p>\r\n\r\n<p><br />\r\n- Chất liệu in lụa</p>\r\n\r\n<p><br />\r\n- Made in Vietnam</p>\r\n\r\n<p><br />\r\nSIZE CHART</p>\r\n\r\n<p><br />\r\nS: 1m5 - 1m6 / 45kg - 55kg</p>\r\n\r\n<p><br />\r\nM: 1m6 - 1m7 / 55kg - 70kg</p>\r\n\r\n<p><br />\r\nL: 1m7 - 1m8 / 70kg - 85kg</p>\r\n', 6, '0'),
(64, 'Nón lưỡi trai đỏ HADES - LOGO ADS', 'Nón-lưỡi-trai-HADES---LOGO', 199000, 35, 'public/uploads/54-p1.jpg', '<p>- Chất liệu: Vải kaki</p>\r\n\r\n<p>- Made in Vietnam</p>\r\n\r\n<p>- H&igrave;nh th&ecirc;u tr&ecirc;n n&oacute;n</p>\r\n\r\n<p>- K&iacute;ch thước: freesize, c&oacute; d&acirc;y điều chỉnh</p>\r\n', 10, '0'),
(65, 'Áo khoác len HADES - ALPHABETIC CARDIGAN', 'Áo-khoác-len-HADES---ALPHABETIC-CARDIGAN', 3290000, 5, 'public/uploads/36-a6.jpg', '<p>Chi tiết sản phẩm:</p>\r\n\r\n<p><br />\r\n- Chất liệu: len</p>\r\n\r\n<p><br />\r\n- Form unisex</p>\r\n\r\n<p><br />\r\n- Chất liệu in lụa</p>\r\n\r\n<p><br />\r\n- Made in Vietnam</p>\r\n\r\n<p><br />\r\nSIZE CHART</p>\r\n\r\n<p><br />\r\nS: 1m5 - 1m6 / 45kg - 55kg</p>\r\n\r\n<p><br />\r\nM: 1m6 - 1m7 / 55kg - 70kg</p>\r\n\r\n<p><br />\r\nL: 1m7 - 1m8 / 70kg - 85kg</p>\r\n', 5, '0'),
(66, 'Túi tote đeo chéo HADES - SOUL TOTE BAG', 'Túi-tote-đeo-chéo-HADES---SOUL-TOTE-BAG', 250000, 15, 'public/uploads/95-p2.jpg', '<p>Chi tiết sản phẩm:</p>\r\n\r\n<p>- Chất liệu: vải canvas</p>\r\n\r\n<p>- K&iacute;ch thước: 33*44cm</p>\r\n\r\n<p>- Chất liệu in lụa / c&oacute; kh&oacute;a k&eacute;o</p>\r\n\r\n<p>- Made in Vietnam</p>\r\n\r\n<p>SIZE CHART</p>\r\n\r\n<p><br />\r\nS: 1m5 - 1m6 / 45kg - 55kg</p>\r\n\r\n<p><br />\r\nM: 1m6 - 1m7 / 55kg - 70kg</p>\r\n\r\n<p><br />\r\nL: 1m7 - 1m8 / 70kg - 85kg</p>\r\n', 10, '0'),
(69, 'Dép quai đen LOGO HADES bản giới hạn', 'Dép-quai-đen-LOGO-HADES-bản-giới-hạn', 420000, 3, 'public/uploads/92-p3.jpg', '<p>Chi tiết sản phẩm:</p>\r\n\r\n<p>- Chất liệu: Nỉ cotton<br />\r\n- Form unisex<br />\r\n- Chất liệu in lụa<br />\r\n- Made in Vietnam</p>\r\n\r\n<p>SIZE CHART<br />\r\nS: 1m5 - 1m6 / 45kg - 55kg<br />\r\nM: 1m6 - 1m7 / 55kg - 70kg<br />\r\nL: 1m7 - 1m8 / 70kg - 85kg</p>\r\n', 10, '0'),
(71, 'Quần dài lưng thun HADES / NEW BALANCE', 'Quần-dài-lưng-thun-HADES---NEW-BALANCE', 560000, 15, 'public/uploads/79-q3.jpg', '<p>Chi tiết sản phẩm:</p>\r\n\r\n<p>- Chất liệu: Nỉ cotton<br />\r\n- Form unisex<br />\r\n- Chất liệu in lụa<br />\r\n- Made in Vietnam</p>\r\n\r\n<p>SIZE CHART<br />\r\nS: 1m5 - 1m6 / 45kg - 55kg<br />\r\nM: 1m6 - 1m7 / 55kg - 70kg<br />\r\nL: 1m7 - 1m8 / 70kg - 85kg</p>\r\n', 6, '0'),
(72, 'Nón xám thêu DOCKER WASH HADES', 'Nón-xám-thêu-DOCKER-WASH-HADES', 199000, 25, 'public/uploads/34-p4.jpg', '<p>- Chất liệu: Vải coduroy wash</p>\r\n\r\n<p>- Made in Vietnam</p>\r\n\r\n<p>- Logo th&ecirc;u tr&ecirc;n n&oacute;n</p>\r\n\r\n<p>- K&iacute;ch thước: freesize, c&oacute; d&acirc;y điều chỉnh</p>\r\n', 10, '0'),
(73, 'Áo thun HADES - JOKER', 'Áo-thun-HADES---JOKER', 379000, 10, 'public/uploads/8-a9.jpg', '<p>Chi tiết sản phẩm:</p>\r\n\r\n<p>- Chất liệu: Nỉ cotton<br />\r\n- Form unisex<br />\r\n- Chất liệu in lụa<br />\r\n- Made in Vietnam</p>\r\n\r\n<p>SIZE CHART<br />\r\nS: 1m5 - 1m6 / 45kg - 55kg<br />\r\nM: 1m6 - 1m7 / 55kg - 70kg<br />\r\nL: 1m7 - 1m8 / 70kg - 85kg</p>\r\n', 5, '0'),
(74, 'Áo hoodie mũ trùm HADES - RANDOM LETTER', 'Áo-hoodie-mũ-trùm-HADES---RANDOM-LETTER', 450000, 14, 'public/uploads/3-a1.jpg', '<p>Chi tiết sản phẩm:</p>\r\n\r\n<p><br />\r\n- Chất liệu: Nỉ cotton</p>\r\n\r\n<p><br />\r\n- Form unisex</p>\r\n\r\n<p><br />\r\n- Chất liệu in lụa</p>\r\n\r\n<p><br />\r\n- Made in Vietnam</p>\r\n\r\n<p><br />\r\nSIZE CHART</p>\r\n\r\n<p><br />\r\nS: 1m5 - 1m6 / 45kg - 55kg</p>\r\n\r\n<p><br />\r\nM: 1m6 - 1m7 / 55kg - 70kg</p>\r\n\r\n<p><br />\r\nL: 1m7 - 1m8 / 70kg - 85kg</p>\r\n', 5, '0'),
(75, 'Áo hoodie mũ trùm HADES - TEMPTATION', 'Áo-hoodie-mũ-trùm-HADES---TEMPTATION', 799000, 16, 'public/uploads/37-a2.jpg', '<p>Chi tiết sản phẩm:</p>\r\n\r\n<p><br />\r\n- Chất liệu: Nỉ cotton</p>\r\n\r\n<p><br />\r\n- Form unisex</p>\r\n\r\n<p><br />\r\n- Chất liệu in lụa</p>\r\n\r\n<p><br />\r\n- Made in Vietnam</p>\r\n\r\n<p><br />\r\nSIZE CHART</p>\r\n\r\n<p><br />\r\nS: 1m5 - 1m6 / 45kg - 55kg</p>\r\n\r\n<p><br />\r\nM: 1m6 - 1m7 / 55kg - 70kg</p>\r\n\r\n<p><br />\r\nL: 1m7 - 1m8 / 70kg - 85kg</p>\r\n', 5, '0'),
(76, 'Balo HADES Camo BackPack', 'Balo-HADES-Camo-BackPack', 399000, 25, 'public/uploads/49-p5.jpg', '<p>Chi tiết sản phẩm:</p>\r\n\r\n<p><br />\r\n- Chất liệu: Nỉ cotton</p>\r\n\r\n<p><br />\r\n- Form unisex</p>\r\n\r\n<p><br />\r\n- Chất liệu in lụa</p>\r\n\r\n<p><br />\r\n- Made in Vietnam</p>\r\n\r\n<p><br />\r\nSIZE CHART</p>\r\n\r\n<p><br />\r\nS: 1m5 - 1m6 / 45kg - 55kg</p>\r\n\r\n<p><br />\r\nM: 1m6 - 1m7 / 55kg - 70kg</p>\r\n\r\n<p><br />\r\nL: 1m7 - 1m8 / 70kg - 85kg</p>\r\n', 10, '0'),
(77, 'Quần dài lưng thun HADES - BANDANA', 'Quần-dài-lưng-thun-HADES---BANDANA', 649000, 5, 'public/uploads/88-q4.jpg', '<p>Chi tiết sản phẩm:</p>\r\n\r\n<p><br />\r\n- Chất liệu: Nỉ cotton</p>\r\n\r\n<p><br />\r\n- Form unisex</p>\r\n\r\n<p><br />\r\n- Chất liệu in lụa</p>\r\n\r\n<p><br />\r\n- Made in Vietnam</p>\r\n\r\n<p><br />\r\nSIZE CHART</p>\r\n\r\n<p><br />\r\nS: 1m5 - 1m6 / 45kg - 55kg</p>\r\n\r\n<p><br />\r\nM: 1m6 - 1m7 / 55kg - 70kg</p>\r\n\r\n<p><br />\r\nL: 1m7 - 1m8 / 70kg - 85kg</p>\r\n', 6, '0'),
(78, 'Áo thun tay lỡ HADES - SNAKE TIEDYE', 'Áo-thun-tay-lỡ-HADES---SNAKE-TIEDYE', 349000, 20, 'public/uploads/88-a11.jpg', '<p>Chi tiết sản phẩm:</p>\r\n\r\n<p><br />\r\n- Chất liệu: Nỉ cotton</p>\r\n\r\n<p><br />\r\n- Form unisex</p>\r\n\r\n<p><br />\r\n- Chất liệu in lụa</p>\r\n\r\n<p><br />\r\n- Made in Vietnam</p>\r\n\r\n<p><br />\r\nSIZE CHART</p>\r\n\r\n<p><br />\r\nS: 1m5 - 1m6 / 45kg - 55kg</p>\r\n\r\n<p><br />\r\nM: 1m6 - 1m7 / 55kg - 70kg</p>\r\n\r\n<p><br />\r\nL: 1m7 - 1m8 / 70kg - 85kg</p>\r\n', 5, '0'),
(79, 'Quần dài lưng thun HADES - ESSENTIAL', 'Quần-dài-lưng-thun-HADES---ESSENTIAL', 299000, 10, 'public/uploads/39-q5.jpg', '<p>Chi tiết sản phẩm:</p>\r\n\r\n<p><br />\r\n- Chất liệu: Nỉ cotton</p>\r\n\r\n<p><br />\r\n- Form unisex</p>\r\n\r\n<p><br />\r\n- Chất liệu in lụa</p>\r\n\r\n<p><br />\r\n- Made in Vietnam</p>\r\n\r\n<p><br />\r\nSIZE CHART</p>\r\n\r\n<p><br />\r\nS: 1m5 - 1m6 / 45kg - 55kg</p>\r\n\r\n<p><br />\r\nM: 1m6 - 1m7 / 55kg - 70kg</p>\r\n\r\n<p><br />\r\nL: 1m7 - 1m8 / 70kg - 85kg</p>\r\n', 6, '0');

-- --------------------------------------------------------

--
-- Table structure for table `khach_hang`
--

CREATE TABLE `khach_hang` (
  `id` int(11) NOT NULL,
  `ten_khach_hang` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `so_dien_thoai` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `khach_hang`
--

INSERT INTO `khach_hang` (`id`, `ten_khach_hang`, `email`, `so_dien_thoai`) VALUES
(62, 'asdas', 'zzskillzzzz@gmail.com', '0123456789'),
(69, 'Võ Khánh Duy', 'zzskillzzzz@gmail.com', '0123456789'),
(72, 'Trang', 'trang@gmail.com', '0987654321'),
(73, 'Diệu', 'tthdieu.20it2@vku.udn.vn', '0453674938');

-- --------------------------------------------------------

--
-- Table structure for table `loai_hang_hoas`
--

CREATE TABLE `loai_hang_hoas` (
  `id` int(11) NOT NULL,
  `Ten_loai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `loai_hang_hoas`
--

INSERT INTO `loai_hang_hoas` (`id`, `Ten_loai`) VALUES
(5, 'Áo'),
(6, 'Quần'),
(10, 'Phụ kiện');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `tenSlider` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `tenSlider`, `image`) VALUES
(7, 'qwerftjk', 'public/uploads/6-banner3.jpg'),
(9, 'QƯNFVDCSZ', 'public/uploads/99-66-banner2.jpg'),
(10, 'azvxcvfvdc', 'public/uploads/91-banner.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `trang_thais`
--

CREATE TABLE `trang_thais` (
  `id` int(11) NOT NULL,
  `Ten_Trang_Thai` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trang_thais`
--

INSERT INTO `trang_thais` (`id`, `Ten_Trang_Thai`) VALUES
(1, 'Đã xác nhận'),
(2, 'Chưa xác nhân');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Dia_Chi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `So_Dien_Thoai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `Dia_Chi`, `So_Dien_Thoai`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(9, 'Trang', '123', '0966080602', 'trangadmin@gmail.com', NULL, '$2y$10$M2oG7onNuqOHGXY7SEgScu/3d5cULLc8teyCRM1pBGjFkJ54szOc.', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chi_tiet_don_hangs`
--
ALTER TABLE `chi_tiet_don_hangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_Don_hang` (`id_Don_hang`),
  ADD KEY `id_hang_hoa` (`id_hang_hoa`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_hang_hoa` (`id_hang_hoa`),
  ADD KEY `id_khach_hang` (`id_khach_hang`);

--
-- Indexes for table `don_hangs`
--
ALTER TABLE `don_hangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Trang_Thai` (`Trang_Thai`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hang_hoas`
--
ALTER TABLE `hang_hoas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_loai` (`id_loai`);

--
-- Indexes for table `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loai_hang_hoas`
--
ALTER TABLE `loai_hang_hoas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trang_thais`
--
ALTER TABLE `trang_thais`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `chi_tiet_don_hangs`
--
ALTER TABLE `chi_tiet_don_hangs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=342;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `don_hangs`
--
ALTER TABLE `don_hangs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=202;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hang_hoas`
--
ALTER TABLE `hang_hoas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `khach_hang`
--
ALTER TABLE `khach_hang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `loai_hang_hoas`
--
ALTER TABLE `loai_hang_hoas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `trang_thais`
--
ALTER TABLE `trang_thais`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chi_tiet_don_hangs`
--
ALTER TABLE `chi_tiet_don_hangs`
  ADD CONSTRAINT `chi_tiet_don_hangs_ibfk_1` FOREIGN KEY (`id_Don_hang`) REFERENCES `don_hangs` (`id`),
  ADD CONSTRAINT `chi_tiet_don_hangs_ibfk_2` FOREIGN KEY (`id_hang_hoa`) REFERENCES `hang_hoas` (`id`);

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`id_hang_hoa`) REFERENCES `hang_hoas` (`id`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`id_khach_hang`) REFERENCES `khach_hang` (`id`);

--
-- Constraints for table `don_hangs`
--
ALTER TABLE `don_hangs`
  ADD CONSTRAINT `don_hangs_ibfk_3` FOREIGN KEY (`Trang_Thai`) REFERENCES `trang_thais` (`id`);

--
-- Constraints for table `hang_hoas`
--
ALTER TABLE `hang_hoas`
  ADD CONSTRAINT `hang_hoas_ibfk_1` FOREIGN KEY (`id_loai`) REFERENCES `loai_hang_hoas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

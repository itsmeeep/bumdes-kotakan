-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2025 at 02:07 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_bumdes`
--

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `news_id` int(11) NOT NULL,
  `news_title` text NOT NULL,
  `news_description` text NOT NULL,
  `news_picture` text NOT NULL,
  `news_author` text NOT NULL,
  `news_created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `news_title`, `news_description`, `news_picture`, `news_author`, `news_created_date`) VALUES
(1, 'Mas Rio Optimistis Situbondo Jadi Eksportir Gula Tebu Terbesar Di Jawa Timur', '<b>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum \r\nquis dictum nisi. Phasellus molestie et enim a aliquam. In dolor sem, \r\nimperdiet posuere eros ut, facilisis finibus mauris. Vestibulum \r\ntristique pellentesque ex, eleifend pellentesque ex fermentum at.</b>', 'News-1.webp', 'rudi', '2025-10-12 05:00:00'),
(2, 'Pemkab Situbondo Dorong Produktivitas Pertanian Lewat Hibah Rp7,2 Miliar, Fokus pada Air dan Diversifikasi Tanaman', '<b>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum \r\nquis dictum nisi. Phasellus molestie et enim a aliquam. In dolor sem, \r\nimperdiet posuere eros ut, facilisis finibus mauris. Vestibulum \r\ntristique pellentesque ex, eleifend pellentesque ex fermentum at.</b>', 'News-2.jpg', 'rudi', '2025-10-11 19:00:00'),
(5, 'Kementerian Pertanian Tanam Perdana Tebu Bongkar Ratoon Di Situbondo', '<b>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum \r\nquis dictum nisi. Phasellus molestie et enim a aliquam. In dolor sem, \r\nimperdiet posuere eros ut, facilisis finibus mauris. Vestibulum \r\ntristique pellentesque ex, eleifend pellentesque ex fermentum at.</b>', 'News-3.webp', 'rudi', '2025-10-12 02:00:00'),
(6, 'Sejarah Baru, Situbondo Catat Pertumbuhan Ekonomi Tertinggi di Sekarkijang Tembus 5,95 Persen', '<b>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum \r\nquis dictum nisi. Phasellus molestie et enim a aliquam. In dolor sem, \r\nimperdiet posuere eros ut, facilisis finibus mauris. Vestibulum \r\ntristique pellentesque ex, eleifend pellentesque ex fermentum at.</b>', 'News-4.jpg', 'rudi', '2025-10-12 11:00:00'),
(8, 'Petani Situbondo Dapat Ilmu Baru! Pemkab Latih Pengelolaan Pasca Panen Tembakau dari DBHCHT', '<b>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum \r\nquis dictum nisi. Phasellus molestie et enim a aliquam. In dolor sem, \r\nimperdiet posuere eros ut, facilisis finibus mauris. Vestibulum \r\ntristique pellentesque ex, eleifend pellentesque ex fermentum at.</b>', 'News-5.jpg', 'rudi', '2025-10-12 16:00:00'),
(9, 'Polres Situbondo dan Dinas Pertanian Tanam Jagung Serentak, Dorong Ketahanan Pangan Daerah', '<b>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum \r\nquis dictum nisi. Phasellus molestie et enim a aliquam. In dolor sem, \r\nimperdiet posuere eros ut, facilisis finibus mauris. Vestibulum \r\ntristique pellentesque ex, eleifend pellentesque ex fermentum at.</b>', 'News-6.jpg', 'rudi', '2025-10-12 11:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `role_level` int(11) NOT NULL,
  `role_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_level`, `role_name`) VALUES
(1, 1, 'Direktur'),
(2, 2, 'Sekretaris'),
(3, 3, 'Bendahara');

-- --------------------------------------------------------

--
-- Table structure for table `role_structure`
--

CREATE TABLE `role_structure` (
  `role_structure_id` int(11) NOT NULL,
  `role_structure_fk_id` int(11) NOT NULL,
  `role_structure_person` text NOT NULL,
  `role_structure_picture` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role_structure`
--

INSERT INTO `role_structure` (`role_structure_id`, `role_structure_fk_id`, `role_structure_person`, `role_structure_picture`) VALUES
(1, 1, 'Ivan Novi Andrianto', 'team-1.jpg'),
(2, 2, 'Muhammad Hidayat', 'team-2.jpg'),
(3, 3, 'Yudis Hadi Wardana', 'team-3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(100) NOT NULL,
  `user_name` text NOT NULL,
  `user_password` text NOT NULL,
  `user_created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_deleted_by` text DEFAULT NULL,
  `user_deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_password`, `user_created_date`, `user_deleted_by`, `user_deleted_at`) VALUES
(1760249146, 'rudi', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', '2025-10-11 17:00:00', NULL, NULL),
(1760249147, 'hehe', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', '2025-10-11 17:00:00', NULL, '2025-10-12 02:18:36'),
(1760262322, 'kasoasjm', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '2025-10-12 09:45:22', '1760249146', '2025-10-12 02:45:26'),
(1760262497, 'qweda', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '2025-10-12 09:48:17', '1760249146', '2025-10-12 02:48:20'),
(1760263099, 'jwebkl', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '2025-10-12 09:58:19', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `role_structure`
--
ALTER TABLE `role_structure`
  ADD PRIMARY KEY (`role_structure_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `role_structure`
--
ALTER TABLE `role_structure`
  MODIFY `role_structure_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

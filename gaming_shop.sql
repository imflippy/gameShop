-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 08, 2020 at 01:01 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gaming_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id_category` int(100) NOT NULL,
  `category` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id_category`, `category`) VALUES
(1, 'Playstation 4'),
(2, 'XBOX One'),
(3, 'Playstation 3'),
(4, 'XBOX 360'),
(5, 'PC Gaming'),
(6, 'Nitendo SWITCH'),
(8, 'OnePlus'),
(9, 'Xaomi');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id_contact` int(100) NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `phone` text COLLATE utf8_unicode_ci NOT NULL,
  `crated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE `games` (
  `id_game` int(100) NOT NULL,
  `game_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `game_info` text COLLATE utf8_unicode_ci NOT NULL,
  `phone_link` text COLLATE utf8_unicode_ci NOT NULL,
  `availability` int(100) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `discount` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `id_category` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`id_game`, `game_name`, `game_info`, `phone_link`, `availability`, `price`, `discount`, `created_at`, `updated_at`, `id_category`) VALUES
(1, 'Filip', 'dasdasd', 'dasdasd', 1, '300', 20, '2020-03-27 01:40:27', '2020-02-28 15:11:42', 2),
(2, 'Petar', 'dasdad', 'dasdad', 123, '1000', 0, '2020-02-29 15:11:42', '2020-02-13 15:11:42', 4),
(3, 'dasd', 'asdas', 'ddd', 100, '100', 0, '2020-03-19 15:09:18', '2020-03-30 15:09:18', 5),
(4, 'dasdda', 'sdasads', 'dddddd', 111, '11111', 1, '2020-03-20 15:09:18', '2020-03-08 15:09:18', 8),
(5, 'dasd', 'asdas', 'ddd', 100, '100', 0, '2020-03-19 15:09:18', '2020-03-30 15:09:18', 5),
(6, 'dasdda', 'sdasads', 'dddddd', 111, '11111', 1, '2020-03-20 15:09:18', '2020-03-08 15:09:18', 8),
(7, 'dasd', 'asdas', 'ddd', 100, '100', 0, '2020-03-19 15:09:18', '2020-03-30 15:09:18', 5),
(8, 'dasdda', 'sdasads', 'dddddd', 111, '11111', 1, '2020-03-20 15:09:18', '2020-03-08 15:09:18', 8),
(9, 'dasd', 'asdas', 'ddd', 100, '100', 0, '2020-03-19 15:09:18', '2020-03-30 15:09:18', 5),
(10, 'dasdda', 'sdasads', 'dddddd', 111, '11111', 1, '2020-03-20 15:09:18', '2020-03-08 15:09:18', 8);

-- --------------------------------------------------------

--
-- Table structure for table `games_genres`
--

CREATE TABLE `games_genres` (
  `id_gg` int(100) NOT NULL,
  `id_game` int(100) NOT NULL,
  `id_genre` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `games_genres`
--

INSERT INTO `games_genres` (`id_gg`, `id_game`, `id_genre`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 7);

-- --------------------------------------------------------

--
-- Table structure for table `game_photos`
--

CREATE TABLE `game_photos` (
  `id_game_photos` int(100) NOT NULL,
  `id_game` int(100) NOT NULL,
  `single_photo` text COLLATE utf8_unicode_ci NOT NULL,
  `admin_photo` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `game_photos`
--

INSERT INTO `game_photos` (`id_game_photos`, `id_game`, `single_photo`, `admin_photo`) VALUES
(3, 1, 'assets/images/product/product-16.png', 'dadasd'),
(4, 2, 'assets/images/product/product-3.png', 'dadasd'),
(5, 1, 'assets/images/product/product-1.png', 'ddd'),
(7, 2, 'assets/images/product/product-4.png', 'ddd'),
(8, 2, 'assets/images/product/product-5.png', 'asdasdasa'),
(9, 3, 'assets/images/product/product-9.png', 'ddd'),
(10, 4, 'assets/images/product/product-3.png', 'dasda'),
(11, 5, 'assets/images/product/product-13.png', 'ddd'),
(12, 6, 'assets/images/product/product-19.png', 'dasda'),
(13, 7, 'assets/images/product/product-2.png', 'ddd'),
(14, 8, 'assets/images/product/product-5.png', 'dasda'),
(15, 9, 'assets/images/product/product-7.png', 'ddd'),
(16, 10, 'assets/images/product/product-9.png', 'dasda');

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `id_genre` int(100) NOT NULL,
  `genre` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id_genre`, `genre`) VALUES
(1, 'Action'),
(2, 'Adventure'),
(3, 'RPG'),
(4, 'Strategy'),
(5, 'Sports'),
(6, 'Horror'),
(7, 'Fighting');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id_role` int(100) NOT NULL,
  `role` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id_role`, `role`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(100) NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `token` text COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `id_role` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `email`, `password`, `token`, `active`, `created_at`, `updated_at`, `id_role`) VALUES
(1, 'aaa', 'sdaad@gmail.com', 'md5(pera123!)', 'dasdasdadaadaasdaa', 1, '2020-02-02 00:00:00', '0000-00-00 00:00:00', 2),
(2, 'marko', 'marko@gmail.com', 'a338d3c4251b370cfed943492750cbd6', 'd824c29e7a07cb8809127833cf69063efc2717bc1582979552', 1, '2020-02-29 12:32:32', '2020-02-29 12:32:32', 2),
(3, 'Test', 'test@gmail.com', '3b3e9bf9e01962fe4fb9ef658533392e', '9111d3b836ddb447fbbffb63866402f8db8371d21583090816', 1, '2020-03-01 19:26:56', '2020-03-01 19:26:56', 2),
(4, 'pera', 'per@gmail.com', '0c868855b9c448687c0f78f7045fb6e2', '8e433634b21823ce8a7028ed9bf9cd6a8fe975511583152315', 0, '2020-03-02 12:31:55', '2020-03-02 12:31:55', 2);

-- --------------------------------------------------------

--
-- Table structure for table `wishes`
--

CREATE TABLE `wishes` (
  `id_wish` int(100) NOT NULL,
  `id_user` int(100) NOT NULL,
  `id_game` int(100) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id_contact`);

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id_game`),
  ADD KEY `idCat_Phone` (`id_category`);

--
-- Indexes for table `games_genres`
--
ALTER TABLE `games_genres`
  ADD PRIMARY KEY (`id_gg`),
  ADD KEY `game___id` (`id_game`),
  ADD KEY `genre_id` (`id_genre`);

--
-- Indexes for table `game_photos`
--
ALTER TABLE `game_photos`
  ADD PRIMARY KEY (`id_game_photos`),
  ADD KEY `id_phone` (`id_game`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id_genre`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `useR_role` (`id_role`);

--
-- Indexes for table `wishes`
--
ALTER TABLE `wishes`
  ADD PRIMARY KEY (`id_wish`),
  ADD KEY `id_useR__` (`id_user`),
  ADD KEY `id_phne__` (`id_game`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id_category` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id_contact` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `id_game` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `games_genres`
--
ALTER TABLE `games_genres`
  MODIFY `id_gg` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `game_photos`
--
ALTER TABLE `game_photos`
  MODIFY `id_game_photos` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `id_genre` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id_role` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `wishes`
--
ALTER TABLE `wishes`
  MODIFY `id_wish` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `games`
--
ALTER TABLE `games`
  ADD CONSTRAINT `idCat_Phone` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id_category`);

--
-- Constraints for table `games_genres`
--
ALTER TABLE `games_genres`
  ADD CONSTRAINT `game___id` FOREIGN KEY (`id_game`) REFERENCES `games` (`id_game`),
  ADD CONSTRAINT `genre_id` FOREIGN KEY (`id_genre`) REFERENCES `genres` (`id_genre`);

--
-- Constraints for table `game_photos`
--
ALTER TABLE `game_photos`
  ADD CONSTRAINT `id_phone` FOREIGN KEY (`id_game`) REFERENCES `games` (`id_game`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `useR_role` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id_role`);

--
-- Constraints for table `wishes`
--
ALTER TABLE `wishes`
  ADD CONSTRAINT `id_phne__` FOREIGN KEY (`id_game`) REFERENCES `games` (`id_game`),
  ADD CONSTRAINT `id_useR__` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

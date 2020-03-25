-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 25, 2020 at 08:45 PM
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
  `category` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id_category`, `category`, `created_at`, `updated_at`) VALUES
(1, 'Playstation 4', '2020-03-18 12:47:31', '2020-03-18 12:47:31'),
(2, 'XBOX One', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Playstation 3', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'XBOX 360', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'PC Gaming', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Nitendo SWITCH', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id_comment` int(100) NOT NULL,
  `stars` int(10) NOT NULL,
  `comment` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_user` int(100) NOT NULL,
  `id_game` int(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id_comment`, `stars`, `comment`, `id_user`, `id_game`, `created_at`, `updated_at`) VALUES
(18, 5, 'Nice game!', 3, 40, '2020-03-22 19:25:15', '2020-03-22 19:25:15'),
(19, 4, 'Pera', 4, 40, '2020-03-24 09:57:50', '2020-03-24 09:57:50'),
(20, 4, 'dsada', 2, 40, '2020-03-24 09:58:46', '2020-03-24 09:58:46'),
(21, 4, 'dasdas', 16, 40, '2020-03-24 09:59:00', '2020-03-24 09:59:00'),
(22, 4, 'dsadas', 8, 40, '2020-03-24 09:59:22', '2020-03-24 09:59:22');

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE `games` (
  `id_game` int(100) NOT NULL,
  `game_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `game_link` text COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `discount` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `id_category` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`id_game`, `game_name`, `game_link`, `price`, `discount`, `created_at`, `updated_at`, `id_category`) VALUES
(29, 'Let\'s Sing 2020', 'https://www.games.rs/ps4-igre/16039-ps4-lets-sing-2020', '3000', 0, '2020-03-22 17:38:20', '2020-03-22 17:38:20', 1),
(30, 'Tour De France 2019', 'https://www.games.rs/ps4-igre/16035-ps4-tour-de-france-2019', '3000', 10, '2020-03-22 17:43:24', '2020-03-22 17:43:24', 1),
(31, 'Doctor Who - The Edge of Time', 'https://www.games.rs/ps4-igre/16034-ps4-doctor-who-the-edge-of-time', '4500', 30, '2020-03-22 17:46:42', '2020-03-22 17:46:42', 1),
(32, 'Gungrave VR - \'Loaded Coffin Edition\' (VR Required)', 'https://www.games.rs/ps4-igre/16033-ps4-gungrave-vr-loaded-coffin-edition-vr-required', '5000', 10, '2020-03-22 17:48:16', '2020-03-22 17:48:16', 1),
(33, 'Ghost of Tsushima Special Edition', 'https://www.games.rs/ps4-igre/16024-ps4-ghost-of-tsushima-special-edition', '10000', 5, '2020-03-22 17:50:28', '2020-03-22 17:50:28', 1),
(34, 'FIFA 15 Essentials', 'https://www.computerlandshop.rs/ps3/test-podloga.html', '3000', 0, '2020-03-22 17:55:31', '2020-03-22 17:55:31', 3),
(35, 'Pro Evolution Soccer 2015', 'https://www.computerlandshop.rs/ps3/ps3-pro-evolution-soccer-2015.html', '2500', 10, '2020-03-22 17:56:16', '2020-03-22 17:56:16', 3),
(36, 'Destiny Vanguard Presell', 'https://www.computerlandshop.rs/ps3/ps3-destiny-vanguard-presell.html', '1000', 50, '2020-03-22 17:57:41', '2020-03-22 17:57:41', 3),
(37, 'Falling Skies', 'https://www.computerlandshop.rs/ps3/ps3-falling-skies.html', '700', 0, '2020-03-22 17:58:56', '2020-03-22 17:58:56', 3),
(38, 'Call of Duty Advanced Warfare', 'https://www.computerlandshop.rs/ps3/ps3-call-of-duty-advanced-warfare.html', '800', 40, '2020-03-22 17:59:53', '2020-03-22 17:59:53', 3),
(39, 'Zumba Fitness Rush KINECT', 'https://www.gamecentar.rs/xbox-360/xbox-360-zumba-fitness-rush-kinect.html', '800', 0, '2020-03-22 18:01:41', '2020-03-22 18:01:41', 2),
(40, 'Yoostar 2 In The Movies KINECT', 'https://www.gamecentar.rs/xbox-360/xbox-360-yoostar-2-in-the-movies-kinect.html', '1000', 20, '2020-03-22 18:02:45', '2020-03-22 18:31:56', 4),
(41, 'Worms The Revolution Collection', 'https://www.gamecentar.rs/xbox-360/xbox-360-worms-the-revolution-collection.html', '1000', 5, '2020-03-22 18:03:49', '2020-03-22 18:03:49', 4),
(42, 'Grand Theft Auto V (GTA 5 )', 'https://www.gamecentar.rs/pc-gaming/pcg-grand-theft-auto-v-gta-5.html', '5000', 10, '2020-03-22 18:06:49', '2020-03-22 18:06:49', 5),
(43, 'Minecraft (Majkraft) igrica za PC', 'https://www.gamecentar.rs/pc-gaming/pcg-minecraft-cd-key.html', '2000', 90, '2020-03-22 18:07:49', '2020-03-22 18:07:49', 5),
(44, 'Agony', 'https://www.gamecentar.rs/pc-gaming/pcg-agony.html', '4000', 10, '2020-03-22 18:08:57', '2020-03-22 18:08:57', 5),
(45, 'Resident Evil 2', 'https://www.gamecentar.rs/pc-gaming/pcg-resident-evil-2.html', '4000', 0, '2020-03-22 18:09:40', '2020-03-22 18:09:40', 5);

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
(30, 29, 2),
(31, 30, 5),
(32, 31, 1),
(33, 32, 1),
(34, 33, 1),
(35, 33, 2),
(36, 34, 5),
(37, 35, 5),
(38, 36, 1),
(39, 36, 2),
(40, 37, 6),
(41, 38, 1),
(42, 39, 5),
(44, 41, 4),
(45, 42, 1),
(46, 42, 2),
(47, 43, 1),
(48, 44, 6),
(49, 45, 6),
(50, 40, 1);

-- --------------------------------------------------------

--
-- Table structure for table `game_photos`
--

CREATE TABLE `game_photos` (
  `id_game_photos` int(100) NOT NULL,
  `id_game` int(100) NOT NULL,
  `single_photo` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `game_photos`
--

INSERT INTO `game_photos` (`id_game_photos`, `id_game`, `single_photo`) VALUES
(1, 45, '1584900580_9977-resident-evil-2-igrica-cena-prodaja.jpg.jpg'),
(2, 44, '1584900537_9411-agony-pc-cena-prodaja.jpg.jpg'),
(3, 41, '1584900229_26133-worms-the-revolution-collection-igrica-cena-prodaja-xb360.jpg.jpg'),
(4, 40, '1584900165_6956-yoostar-2-in-the-movies-cena-prodaja.jpg.jpg'),
(37, 29, '1584898700_PS4938_800_1000px.jpg'),
(38, 30, '1584899004_PS4941_800_1000px.jpg'),
(39, 31, '1584899202_PS4940_800_1000px.jpg'),
(40, 32, '1584899296_PS4939_800_1000px.jpg'),
(41, 33, '1584899428_Ghost-OT_2D_SE_Packshot_ENG_800_1000px.jpg'),
(42, 33, '1584899428_PS4936_2_1_800_1000px.jpg'),
(43, 34, '1584899731_28134.jpg'),
(44, 35, '1584899776_21044.png'),
(45, 36, '1584899861_20521.jpg'),
(46, 37, '1584899936_18685.jpg'),
(47, 38, '1584899993_20215.jpg'),
(48, 39, '1584900101_1955-zumba-fitnes-framed-cover.jpg.jpg'),
(49, 39, '1584900101_1955-zumba-fitness-rush-cena-prodaja-xb360.jpg.jpg'),
(50, 39, '1584900101_1955-zumba-fitness-rush-kinect-xbox-360-igra-korisceno-igrica-2.jpg.jpg'),
(51, 40, '1584900165_6956-yoostar-2-in-the-movices-2.jpg.jpg'),
(54, 41, '1584900229_26133-worms-the-revolution-collection-igrica-cena-prodaja-2.jpg.jpg'),
(55, 41, '1584900229_26133-worms-the-revolution-collection-igrica-cena-prodaja-5.jpg.jpg'),
(57, 42, '1584900409_61-pc-igra-gta-5-cena-prodaja-srbija.jpg.jpg'),
(58, 43, '1584900469_9136-igra-pc-minecraft-cd-key-cena-prodaja-srbija.jpg.jpg'),
(59, 43, '1584900469_9136-minecraft-story-mode-ps3-igra-igrica-6.jpg.jpg'),
(62, 45, '1584900580_9977-resident-evil-2-5.jpg.jpg'),
(63, 40, '1584900165_6956-yoostar-2-in-the-movices-5.jpg.jpg'),
(102, 44, '1584900537_9411-agony-7.jpg.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `id_genre` int(100) NOT NULL,
  `genre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id_genre`, `genre`, `created_at`, `updated_at`) VALUES
(1, 'Action', '0000-00-00 00:00:00', '2020-03-19 20:27:22'),
(2, 'Adventure', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'RPG', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Strategy', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Sports', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Horror', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Fighting', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id_order` int(100) NOT NULL,
  `id_user` int(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id_order`, `id_user`, `created_at`, `active`) VALUES
(33, 5, '2020-03-22 18:17:31', 1),
(34, 5, '2020-03-22 18:17:42', 2),
(35, 5, '2020-03-22 18:32:50', 1),
(36, 5, '2020-03-22 19:23:56', 2),
(37, 5, '2020-03-23 16:59:23', 1),
(38, 5, '2020-03-24 11:23:11', 0),
(39, 5, '2020-03-24 11:23:23', 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id_od` int(100) NOT NULL,
  `id_order` int(100) NOT NULL,
  `id_game` int(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `price_with_discount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id_od`, `id_order`, `id_game`, `quantity`, `price_with_discount`) VALUES
(29, 33, 44, 1, 3600),
(30, 34, 40, 1, 700),
(31, 35, 43, 1, 200),
(32, 36, 45, 1, 4000),
(33, 37, 41, 1, 950),
(34, 38, 44, 1, 3600),
(35, 39, 45, 1, 4000),
(36, 39, 44, 2, 3600);

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
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id_sub` int(100) NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id_sub`, `email`) VALUES
(8, 'tijanaminic15@gmail.com'),
(9, 'filip.minic98@gmail.com'),
(11, 'dada@gmail.com');

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
(2, 'marko', 'marko@gmail.com', '10c4981bb793e1698a83aea43030a388', 'd824c29e7a07cb8809127833cf69063efc2717bc1582979552', 1, '2020-02-29 12:32:32', '2020-02-29 12:32:32', 2),
(3, 'Test', 'test@gmail.com', '10c4981bb793e1698a83aea43030a388', '9111d3b836ddb447fbbffb63866402f8db8371d21583090816', 1, '2020-03-01 19:26:56', '2020-03-01 19:26:56', 2),
(4, 'pera', 'per@gmail.com', '10c4981bb793e1698a83aea43030a388', '8e433634b21823ce8a7028ed9bf9cd6a8fe975511583152315', 0, '2020-03-02 12:31:55', '2020-03-02 12:31:55', 2),
(5, 'admin', 'filip.minic98@gmail.com', '10c4981bb793e1698a83aea43030a388', 'b48c2d2ba1aa498a6e9e16fd8e0234ca3fd7a7741583626059', 1, '2020-03-08 00:07:39', '2020-03-08 00:07:39', 1),
(8, 'kic', 'kica@gmail.com', '10c4981bb793e1698a83aea43030a388', '46d9cc87dfc9824ad5e054b9629df87c608f75b71584320380', 1, '2020-03-15 16:52:31', '2020-03-16 00:59:40', 2),
(10, 'Peraaa', 'peara@gmail.com', '10c4981bb793e1698a83aea43030a388', '1a40b455f0ebaf7be7590e41a2f7cae0f91adfc11584320670', 1, '2020-03-16 01:02:48', '2020-03-16 01:04:30', 2),
(13, 'peraa', 'pera@gmail.com', '10c4981bb793e1698a83aea43030a388', '5046501624accadb38ccb0f2608bc6d69f95fc451584650409', 1, '2020-03-19 20:40:09', '2020-03-19 20:40:09', 2),
(14, 'peraaaa', 'peric@gmail.com', '10c4981bb793e1698a83aea43030a388', '1e8e49a3a51b7ef3b343c72567bc21dde8073d901585043317', 0, '2020-03-24 09:48:37', '2020-03-24 09:48:37', 2),
(15, 'Mika', 'mikaaa@gmail.com', '10c4981bb793e1698a83aea43030a388', 'dc91419b79fa43d4bf03a242ce0f2d90a66d4a591585043480', 1, '2020-03-24 09:51:20', '2020-03-24 09:51:20', 1),
(16, 'Mikaaaaa', 'mikaaaa@gmail.com', '10c4981bb793e1698a83aea43030a388', '714f328156a8d360740aa4be1429b26a5d2780c11585054486', 1, '2020-03-24 09:51:40', '2020-03-24 12:54:46', 1),
(17, 'user', 'user@gmail.com', '10c4981bb793e1698a83aea43030a388', '9fa140b1d919088a8ff8293d05be23a93cefdd291585054872', 1, '2020-03-24 13:01:12', '2020-03-24 13:01:12', 2),
(18, 'pavle', 'pavle@gmail.com', '10c4981bb793e1698a83aea43030a388', 'e8e5c75d3142ad5a5ad47f65d9471943e836e4e81585054897', 1, '2020-03-24 13:01:37', '2020-03-24 13:01:37', 2),
(19, 'petar', 'petarr@gmail.com', '10c4981bb793e1698a83aea43030a388', '9f0d7d5310618ff7ff805da276ccfc52b4c1e0921585054920', 1, '2020-03-24 13:02:00', '2020-03-24 13:02:00', 2),
(20, 'Nikol', 'nikol@gmail.com', '10c4981bb793e1698a83aea43030a388', 'da3313cba765c8cd65d6dbcdc9eaa30a0b02d4f01585165464', 1, '2020-03-25 19:44:24', '2020-03-25 19:44:24', 1);

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
-- Dumping data for table `wishes`
--

INSERT INTO `wishes` (`id_wish`, `id_user`, `id_game`, `created_at`) VALUES
(40, 5, 41, '2020-03-23 16:59:01'),
(41, 5, 45, '2020-03-24 09:57:31'),
(42, 5, 40, '2020-03-24 10:18:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id_comment`),
  ADD KEY `id_game_comm` (`id_game`),
  ADD KEY `id_user_comm` (`id_user`);

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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_order`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id_od`),
  ADD KEY `id_gamee` (`id_game`),
  ADD KEY `id_ordrr` (`id_order`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id_sub`);

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
  MODIFY `id_category` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id_comment` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `id_game` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `games_genres`
--
ALTER TABLE `games_genres`
  MODIFY `id_gg` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `game_photos`
--
ALTER TABLE `game_photos`
  MODIFY `id_game_photos` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `id_genre` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id_order` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id_od` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id_role` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id_sub` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `wishes`
--
ALTER TABLE `wishes`
  MODIFY `id_wish` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `id_game_comm` FOREIGN KEY (`id_game`) REFERENCES `games` (`id_game`),
  ADD CONSTRAINT `id_user_comm` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

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
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `id_gamee` FOREIGN KEY (`id_game`) REFERENCES `games` (`id_game`),
  ADD CONSTRAINT `id_ordrr` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id_order`);

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

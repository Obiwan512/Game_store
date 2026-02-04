-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2024 at 02:06 AM
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
-- Database: `game_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`) VALUES
(4, 'Obiwan_512', 'Obiwankenobi2005');

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE `games` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(1000) NOT NULL,
  `genre` varchar(50) DEFAULT NULL,
  `rating` varchar(10) DEFAULT NULL,
  `purchased` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`id`, `title`, `price`, `image`, `genre`, `rating`, `purchased`) VALUES
(1, 'The Witcher 3: Wild Hunt', 29.99, 'https://images.gog-statics.com/ca20a040b7e7dbf11f954b4fa85e1ecdcf8f95eeba8ebf71f89455794eec80f2.jpg', 'RPG', '9.5', 1),
(2, 'Red Dead Redemption 2', 59.99, 'https://assets1.ignimgs.com/2018/10/25/rdr2-1280-1540463019272_160w.jpg?width=1280', 'Adventure', '9.8', 1),
(3, 'Minecraft', 19.99, 'https://static0.gamerantimages.com/wordpress/wp-content/uploads/2023/01/useful-redstone-contraptions-in-minecraft.jpg', 'Sandbox', '9.0', 1),
(4, 'Cyberpunk 2077', 49.99, 'https://www.cyberpunk.net/build/images/social-thumbnail-en-ddcf4d23.jpg', 'RPG', '8.0', 0),
(5, 'Fortnite', 0.00, 'https://cdn1.epicgames.com/offer/fn/Blade_2560x1440_2560x1440-95718a8046a942675a0bc4d27560e2bb', 'Battle Royale', '8.5', 1),
(6, 'Among Us', 4.99, 'https://cdn1.epicgames.com/salesEvent/salesEvent/amoguslandscape_2560x1440-3fac17e8bb45d81ec9b2c24655758075', 'Party', '8.0', 0),
(7, 'Call of Duty: Modern Warfare', 59.99, 'https://imgs.callofduty.com/content/dam/atvi/callofduty/cod-touchui/mw3/meta/reveal/jpt-reveal-meta.jpg', 'FPS', '9.2', 0),
(8, 'Assassin\'s Creed Valhalla', 59.99, 'https://cdn1.epicgames.com/400347196e674de89c23cc2a7f2121db/offer/AC%20KINGDOM%20PREORDER_STANDARD%20EDITION_EPIC_Key_Art_Wide_3840x2160-3840x2160-485fe17203671386c71bde8110886c7d.jpg', 'Action', '8.8', 0),
(9, 'Animal Crossing: New Horizons', 59.99, 'https://assets.nintendo.com/image/upload/c_fill,w_1200/q_auto:best/f_auto/dpr_2.0/ncom/software/switch/70010000027619/9989957eae3a6b545194c42fec2071675c34aadacd65e6b33fdfe7b3b6a86c3a', 'Simulation', '9.3', 0),
(10, 'DOOM Eternal', 39.99, 'https://image.api.playstation.com/vulcan/ap/rnd/202010/0114/b4Q1XWYaTdJLUvRuALuqr0wP.png', 'FPS', '9.0', 1),
(12, 'brothers in arms', 49.99, 'https://gamingbeasts.com/wp-content/uploads/2021/11/Brothers-In-Arms-Road-To-Hill-30.jpg', 'shooter', '9.8', 0),
(13, 'The Elder Scrolls V: Skyrim', 39.99, 'https://assets-prd.ignimgs.com/2021/08/19/elder-scrolls-skyrim-button-2017-1629409446732.jpg', 'Action', '9.3', 0),
(14, 'FIFA 22', 59.99, 'https://shared.akamai.steamstatic.com/store_item_assets/steam/apps/1506830/capsule_616x353.jpg?t=1712678728', 'Sports', '8.7', 1),
(15, 'The Legend of Zelda: Breath of the Wild', 59.99, 'https://assets.nintendo.com/image/upload/c_fill,w_1200/q_auto:best/f_auto/dpr_2.0/ncom/software/switch/70010000000025/7137262b5a64d921e193653f8aa0b722925abc5680380ca0e18a5cfd91697f58', 'Adventure', '9.7', 0),
(16, 'Overwatch', 39.99, 'https://www.nintendo.com/eu/media/images/10_share_images/games_15/nintendo_switch_download_software_1/2x1_NSwitchDS_Overwatch2_Season6_image1600w.png', 'FPS', '8.4', 0),
(17, 'Halo Infinite', 59.99, 'https://wpassets.halowaypoint.com/wp-content/2021/12/HaloInfinite_CampaignKeyArt_CLEAN_1920x1080.jpg', 'FPS', '8.6', 0),
(18, 'The Last of Us Part II', 49.99, 'https://image.api.playstation.com/vulcan/ap/rnd/202312/0117/315718bce7eed62e3cf3fb02d61b81ff1782d6b6cf850fa4.png', 'Adventure', '9.5', 0),
(19, 'Dark Souls III', 29.99, 'https://m.media-amazon.com/images/M/MV5BYzJhYTgzYzYtYjdjOC00ZDYyLTg0NjYtZDEwMDlkODA3OWI4XkEyXkFqcGdeQXVyMTk2OTAzNTI@._V1_.jpg', 'RPG', '9.2', 1),
(20, 'Monster Hunter: World', 39.99, 'https://cdn-ext.fanatical.com/production/product/1280x720/7f6e4bbc-69a4-4910-a424-8b4f14100c12.jpeg', 'RPG', '8.8', 0),
(21, 'Sekiro: Shadows Die Twice', 49.99, 'https://shared.akamai.steamstatic.com/store_item_assets/steam/apps/814380/capsule_616x353.jpg?t=1678991267', 'Action', '9.0', 0),
(22, 'Marvel\'s Spider-Man', 49.99, 'https://image.api.playstation.com/vulcan/ap/rnd/202009/3021/B2aUYFC0qUAkNnjbTHRyhrg3.png', 'Action', '9.7', 0),
(23, 'Ghost of Tsushima', 39.99, 'https://image.api.playstation.com/vulcan/ap/rnd/202010/0222/b3iB2zf2xHj9shC0XDTULxND.png', 'Adventure', '9.8', 0);

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `purchase_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `user_id`, `game_id`, `purchase_date`) VALUES
(1, 15, 2, '2024-06-06 20:25:24'),
(2, 15, 10, '2024-06-06 20:27:06'),
(3, 15, 5, '2024-06-06 20:27:55'),
(4, 15, 3, '2024-06-06 20:33:07'),
(8, 15, 19, '2024-06-06 21:33:52'),
(9, 15, 14, '2024-06-06 23:04:17'),
(10, 15, 1, '2024-06-06 23:08:43');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`) VALUES
(13, 'reg1', '12345678', 'reg1@gmail.com'),
(15, 'levani', '12345678', 'iraklikometiani@yahoo.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `game_id` (`game_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `purchases`
--
ALTER TABLE `purchases`
  ADD CONSTRAINT `purchases_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `purchases_ibfk_2` FOREIGN KEY (`game_id`) REFERENCES `games` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

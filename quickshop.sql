-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2024 at 05:46 PM
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
-- Database: `quickshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `credit`
--

CREATE TABLE `credit` (
  `id` int(11) NOT NULL,
  `money` decimal(11,0) NOT NULL,
  `number` varchar(16) NOT NULL,
  `cvv` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `credit`
--

INSERT INTO `credit` (`id`, `money`, `number`, `cvv`) VALUES
(1, 11430, '7938085457138144', '527');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `type` varchar(5) NOT NULL,
  `txt` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `type`, `txt`) VALUES
(1, 'XGP', 'Xbox Game Pass Test (ไอดีที่ 1)'),
(2, 'XGP', 'Xbox Game Pass Test (ไอดีที่ 2)'),
(3, 'XGP', 'Xbox Game Pass Test (ไอดีที่ 3)'),
(4, 'XGP', 'Xbox Game Pass Test (ไอดีที่ 4)'),
(5, 'MJB', 'Minecraft Bedrock & Java (ไอดีที่ 1)'),
(6, 'MJB', 'Minecraft Bedrock & Java (ไอดีที่ 2)'),
(7, 'MJB', 'Minecraft Bedrock & Java (ไอดีที่ 3)'),
(8, 'RE4R', 'RESIDENT EVIL 4 REMAKE (ไอดีที่ 1)'),
(9, 'RE4R', 'RESIDENT EVIL 4 REMAKE (ไอดีที่ 2)'),
(10, 'GIR', 'Genshin REROLL (ไอดีที่ 1)'),
(11, 'GIR', 'Genshin REROLL (ไอดีที่ 2)'),
(12, 'GIR', 'Genshin REROLL (ไอดีที่ 3)'),
(13, 'GIR', 'Genshin REROLL (ไอดีที่ 4)'),
(14, 'GIR', 'Genshin REROLL (ไอดีที่ 5)'),
(15, 'GIR', 'Genshin REROLL (ไอดีที่ 6)'),
(16, 'GIR', 'Genshin REROLL (ไอดีที่ 7)');

-- --------------------------------------------------------

--
-- Table structure for table `shop`
--

CREATE TABLE `shop` (
  `id` int(11) NOT NULL,
  `type` varchar(5) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `image` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shop`
--

INSERT INTO `shop` (`id`, `type`, `name`, `description`, `price`, `image`) VALUES
(1, 'XGP', 'Xbox Game Pass [GIFT CODE]', 'บริการเช่าเกมเล่นรายเดือน สำหรับผู้ใช้ Windows & Xbox', 440, 'https://xxboxnews.blob.core.windows.net/prod/sites/2/2023/02/2023_02-XGP_Europe_1PP-02-1920x1080-1-36e392a7f05abc62d76a.jpg'),
(2, 'MJB', 'Minecraft Java & Bedrock ID มือหนึ่ง GIFT CODE!', 'GIFT CODE สำหรับรับ Minecraft Java & Bedrock ใน Microsoft Store', 1230, 'https://www.minecraft.net/content/dam/games/minecraft/key-art/PC_Bundle_BaseGame_Desktop.jpg?imwidth=2401'),
(3, 'RE4R', 'RESIDENT EVIL 4 REMAKE - STEAM KEY [DELUXE]', 'เมื่อซื้อสามารถนำโค๊ดไปรับได้ใน STEAM ', 1025, 'https://image.api.playstation.com/vulcan/ap/rnd/202210/0712/BiS5QP6h4506JHyJlZlVzK9D.jpg'),
(4, 'GIR', 'GENSHIN IMPACT - REROLL [ASIA]', 'ไอดีรีโรล GENSHIN IMPACT ในเซิร์ฟ ASIA', 100, 'https://assetsio.reedpopcdn.com/Genshin-Impact-4.3-release-date%2C-4.3-Banner-and-event-details-cover.jpg?width=1200&height=1200&fit=bounds&quality=70&format=jpg&auto=webp');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `credit`
--
ALTER TABLE `credit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `credit`
--
ALTER TABLE `credit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `shop`
--
ALTER TABLE `shop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2024 at 12:17 PM
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

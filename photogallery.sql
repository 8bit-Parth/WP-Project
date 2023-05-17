-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: May 17, 2023 at 08:12 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `photogallery`
--

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `filepath` text NOT NULL,
  `uploaded_date` datetime NOT NULL DEFAULT current_timestamp(),
  `latitude` float(10,6) NOT NULL DEFAULT 0.000000,
  `longitude` float(10,6) NOT NULL DEFAULT 0.000000
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `title`, `description`, `filepath`, `uploaded_date`, `latitude`, `longitude`) VALUES
(1, 'Abandoned Building', 'Abandoned Building', 'images\\abandoned-building.jpg', '2023-05-10 22:16:14', 0.000000, 0.000000),
(2, 'Dog ', 'Dog Playing in Garden', 'images\\beach.jpg', '2023-05-10 22:16:47', 0.000000, 0.000000),
(3, 'City', 'A view down at the city.', 'images\\city.jpg', '2023-05-10 22:17:15', 0.000000, 0.000000),
(4, 'Mountain', 'Mountain', 'images\\mountain.jpg', '2023-05-10 22:19:04', 0.000000, 0.000000),
(6, 'Stars', 'Going down the only road I\'\'ve even known.', 'images\\stars.jpg', '2023-05-10 22:20:31', 0.000000, 0.000000),
(7, 'fish', 'Fish in the deep sea', 'images/fish.jpg', '2023-05-10 23:49:41', 0.000000, 0.000000),
(8, 'Wanderlust', 'Dumas sea side, Surat', 'images/Wanderlust.png', '2023-05-11 12:16:49', 0.000000, 0.000000),
(9, 'Waterfall', 'Gira Waterfall, Dang, Gujarat', 'images/Waterfall.png', '2023-05-11 12:19:19', 0.000000, 0.000000),
(10, 'Flower in the hand ', ' Quote with the flower', 'images/Flower.jpeg', '2023-05-11 12:34:32', 0.000000, 0.000000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

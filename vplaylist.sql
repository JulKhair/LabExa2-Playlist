-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2026 at 08:16 AM
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
-- Database: `playlist_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `vplaylist`
--

CREATE TABLE `vplaylist` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `artist` varchar(255) NOT NULL,
  `vsinger` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vplaylist`
--

INSERT INTO `vplaylist` (`id`, `title`, `artist`, `vsinger`, `created_at`) VALUES
(1, 'Butcher Vanity', 'FLAVOR FOLEY', 'Yi Xi', '2026-10-06 05:33:12'),
(2, 'Tell Your World', 'ryo', 'Hatsune Miku', '2026-10-06 05:33:39'),
(3, 'I\'m Sorry, I\'m Sorry', 'Kikuo', 'Hatsune Miku', '2026-10-06 05:34:08'),
(4, 'Machine Gun', 'KIRA', 'GUMI', '2026-10-06 05:34:58'),
(5, 'Girl-A', 'Siinamota', 'Hatsune Miku', '2026-10-06 05:35:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `vplaylist`
--
ALTER TABLE `vplaylist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `vplaylist`
--
ALTER TABLE `vplaylist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

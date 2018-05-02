-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2018 at 01:14 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dream`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`) VALUES
(1, 'admin', 'admin@admin', '1847eacfb7838013a78f08c4b27660b8', 'admin'),
(2, 'Robert Chigivara', 'Robert@mail.ua', '497740d0602268282a136310c5fda2a3', 'member'),
(4, 'Taras Piddubniy', 'Taras@mail.ua', '497740d0602268282a136310c5fda2a3', 'member'),
(5, 'Rodrigo Carlos', 'Rodrigo@mail.ua', '497740d0602268282a136310c5fda2a3', 'member'),
(6, 'Katerina Bilenko', 'Katerina@mail.ua', '497740d0602268282a136310c5fda2a3', 'accounter'),
(7, 'Lisa Paradox', 'Lisa@mail.ua', '497740d0602268282a136310c5fda2a3', 'member'),
(23, 'David Brown', 'David@mail.ua', '1847eacfb7838013a78f08c4b27660b8', 'worker'),
(41, 'Frank', 'Franky@m.ua', '497740d0602268282a136310c5fda2a3', 'admin'),
(43, 'Liza Malenio', 'MilaLiza@mail.com', '5470b5090b7fefb4d113373e2589ba36', 'manager'),
(49, 'asdf', 'admin@admin', '1847eacfb7838013a78f08c4b27660b8', 'asdf'),
(53, 'Tim Ferris', 'tim@week.us', '1847eacfb7838013a78f08c4b27660b8', 'partner'),
(54, 'Andriy Zubr', 'AndZi@gmail.com', '1847eacfb7838013a78f08c4b27660b8', 'member'),
(55, 'Delete me', 'admin@admin', '1847eacfb7838013a78f08c4b27660b8', 'test'),
(56, 'Delete MeToo', 'admin@admin', '1847eacfb7838013a78f08c4b27660b8', 'admin'),
(57, 'Albert Prescher', 'admin@admin', '1847eacfb7838013a78f08c4b27660b8', 'member'),
(59, 'Alexandr Spartanenko', 'admin@admin', '1847eacfb7838013a78f08c4b27660b8', 'member');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

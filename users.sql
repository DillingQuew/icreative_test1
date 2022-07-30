-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 31, 2022 at 12:07 AM
-- Server version: 10.3.22-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `users`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bdate` date NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `sname`, `bdate`, `email`, `password`, `is_admin`) VALUES
(28, 'Денис', 'Баздарев', '2022-07-06', 'admin@example.com', '$2y$10$iG5EtHNK6seeC96wE2XpOeRNp1KgD9xCCgj4SslzxB.EnbQse/29a', 1),
(29, '1234', 'asdfgsdfhgsd', '2021-01-12', 'qwerty@mail.ru', '$2y$10$m3q2YHZjgwlLv2rKG2W3TuqNnuQUEgTrc2sxHrddTGQ6lSbAWijl2', 0),
(30, '435623t', 'ertwertw4', '2022-07-06', 'admin2@mail.ru', '$2y$10$rtMtsBXthvkKVdvX/9Hqm.gE7ZspXJRVKcjPj.nqkMlMxROahf5vm', 0),
(31, 'thrwhtrsfgh', 'dfsgsdfhgsfd', '2022-07-12', 'ghfsdg@mail.ru', '$2y$10$XdpqScKrHgG2GSU4tfXpU.iI5cRRI841lcAVQw57Ie0ffioTIX0gS', 0),
(32, 'ghthrtyj', 'jk6uikvn', '2022-07-01', 'jhyltrjy@mail.ru', '$2y$10$3Pi4HIRWcaLEn4HQlSWMY.OFj6d70Jb3YCEAfEPizb3l.bpbrY9Ta', 0);

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
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

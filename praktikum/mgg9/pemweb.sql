-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Dec 17, 2024 at 11:04 PM
-- Server version: 8.0.35
-- PHP Version: 8.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pemweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_table`
--

CREATE TABLE `data_table` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `data_table`
--

INSERT INTO `data_table` (`id`, `name`, `email`, `date`) VALUES
(1, 'John Doe', 'john@example.com', '2024-01-01'),
(2, 'Jane Smith', 'jane@example.com', '2024-01-02'),
(3, 'Alice Brown', 'alice@example.com', '2024-01-03'),
(4, 'Bob White', 'bob@example.com', '2024-01-04'),
(5, 'Charlie Black', 'charlie@example.com', '2024-01-05'),
(6, 'David Green', 'david@example.com', '2024-01-06'),
(7, 'Eve Yellow', 'eve@example.com', '2024-01-07'),
(8, 'Frank Blue', 'frank@example.com', '2024-01-08'),
(9, 'Grace Red', 'grace@example.com', '2024-01-09'),
(10, 'Hank Orange', 'hank@example.com', '2024-01-10'),
(11, 'Ivy Purple', 'ivy@example.com', '2024-01-11'),
(12, 'Jack Gray', 'jack@example.com', '2024-01-12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_table`
--
ALTER TABLE `data_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_table`
--
ALTER TABLE `data_table`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2021 at 09:52 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `itehdomaci`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `book_id` int(10) NOT NULL,
  `book_name` varchar(100) NOT NULL,
  `writer` varchar(100) NOT NULL,
  `genre` varchar(100) NOT NULL,
  `edition` int(10) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `book_name`, `writer`, `genre`, `edition`, `user_id`) VALUES
(1, 'Robinson Crusoe', ' Daniel Defoe', 'novel', 7, 2),
(2, 'Harry Potter and the Chamber of Secrets', ' J. K. Rowling', 'novel', 17, 0),
(3, 'Harry Potter and the Prisoner of Azkaban', ' J. K. Rowling', 'novel', 2, 0),
(4, 'She A History of Adventure', ' H. Rider Haggard', 'novel ', 5, 0),
(5, 'The Da Vinci Code', 'Dan Brown', 'novel', 8, 0),
(6, 'l', 'l', 'l', 19, 2),
(7, 'The Hunger Games', 'Suzanne Collins', 'novel', 5, 0),
(8, 'To Kill a Mockingbird', 'Harper Lee', 'Classic', 10, 0),
(9, 'Pride and Prejudice', 'Jane Austen', 'novel', 10, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `is_admin` tinyint(1) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `email` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `is_admin`, `name`, `surname`, `email`) VALUES
(1, 'mixi', 'mixi', 1, 'Mihailo', 'Nisavic', 'email@email.com'),
(2, 'pavle23', 'pavle23', 0, 'Milan', 'Milanovic', 'milan@email.com'),
(3, 'marko21', 'marko21', 0, 'Marko', 'Markovic', 'marko@email.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `book_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

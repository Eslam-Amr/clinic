-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 17, 2023 at 02:56 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clinic`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int NOT NULL,
  `date` varchar(255) NOT NULL,
  `status` varchar(60) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(60) NOT NULL,
  `doctor_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `date`, `status`, `phone`, `email`, `name`, `doctor_id`) VALUES
(2, 'September 15, 2023, 9:50 pm', 'loading', '01091470769', 'm@m.com', 'bhnloo', 18),
(3, 'September 15, 2023, 9:51 pm', 'pending', '01091470769', 'm@m.com', 'eslam', 18),
(4, 'September 16, 2023, 11:53 am', 'pending', '01091470769', 'eslamamr537@gmail.com', 'eslam', 18),
(5, 'September 16, 2023, 11:53 am', 'pending', '01091470769', 'm@m.com', 'eslam', 21),
(6, 'September 17, 2023, 1:36 pm', 'pending', '01091470769', 'm@m.com', 'bhn', 19),
(7, 'September 17, 2023, 1:37 pm', 'pending', '01091470769', 'm@m.com', 'bhnloo', 17),
(8, 'September 17, 2023, 2:47 pm', 'pending', '01091470769', 'eslamamhr537@gmail.com', 'bhnloo', 21);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int NOT NULL,
  `name` varchar(60) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone`, `subject`, `message`) VALUES
(1, 'eslam amr', 'eslamamr537@gmail.com', '01091470769', 'gameed', 'gameed');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int NOT NULL,
  `name` varchar(60) NOT NULL,
  `major_id` int NOT NULL,
  `email` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `bio` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `name`, `major_id`, `email`, `image`, `bio`) VALUES
(17, 'eslam4', 4, 'eslam4@gmail.com', '1694691765.png', 'heart 10 years exp.'),
(18, 'eslam5', 4, 'eslam5@gmail.com', '1694691850.png', 'Heart 20 years exp.'),
(19, 'eslam6', 4, 'eslam6@gmail.com', '1694691879.jpeg', 'heart 30years exp.'),
(20, 'eslam', 5, 'eslam@gmail.com', '1694700153.jpeg', 'dentist 10 year exp.'),
(21, 'eslam2', 5, 'eslam2@gmail.com', '1694700181.jpeg', 'dentist 20 year exp.'),
(22, 'eslam3', 5, 'eslam3@gmail.com', '1694700213.jpeg', 'dentist'),
(23, 'eslam7', 4, 'eslam7@gmail.com', '1694952579.png', 'heart 40 year exp.'),
(24, 'eslam8', 4, 'eslam8@gmail.com', '1694953254.jpeg', 'heart doctor'),
(25, 'eslam9', 4, 'eslam9@gmail.com', '1694953275.png', 'heart'),
(26, 'eslam10', 4, 'eslam10@gmail.com', '1694954217.jpeg', 'hhh'),
(27, 'eslam11', 4, 'eslam11@gmail.com', '1694954232.png', 'hhhh'),
(28, 'eslam12', 4, 'eslam12@gmail.com', '1694954251.png', 'hhhhh');

-- --------------------------------------------------------

--
-- Table structure for table `majors`
--

CREATE TABLE `majors` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `majors`
--

INSERT INTO `majors` (`id`, `title`, `image`) VALUES
(4, 'heart', '1694642441.png'),
(5, 'dentist', '1694690461.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(60) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `password`, `phone`) VALUES
(2, 'eslam amr', 'eslamamr537@gmail.com', 'admin', '123456789', 1091470769),
(4, 'mario', 'mario@gmail.com', 'user', '123456789', 1091470769);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctor_id` (`doctor_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `major_id` (`major_id`);

--
-- Indexes for table `majors`
--
ALTER TABLE `majors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `majors`
--
ALTER TABLE `majors`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `doctors`
--
ALTER TABLE `doctors`
  ADD CONSTRAINT `doctors_ibfk_1` FOREIGN KEY (`major_id`) REFERENCES `majors` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

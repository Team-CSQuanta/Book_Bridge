-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 10, 2024 at 09:55 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `book_bridge`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `email` varchar(100) NOT NULL,
  `phone_number` varchar(11) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(25) NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `l_name` varchar(255) NOT NULL,
  `profile_img` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`email`, `phone_number`, `password`, `role`, `f_name`, `l_name`, `profile_img`, `address`) VALUES
('foyeznaeem@contact.me', '01965750798', 'admin', 'admin', 'Foyez Ahammed ', 'Naeem', '66163d97f05e84.88284642.png', 'Mouchak');

-- --------------------------------------------------------

--
-- Table structure for table `exchangerequest`
--

CREATE TABLE `exchangerequest` (
  `RequestID` int(11) NOT NULL,
  `SenderUserID` int(11) DEFAULT NULL,
  `ReceiverUserID` int(11) DEFAULT NULL,
  `RequestDate` date DEFAULT NULL,
  `Status` enum('Pending','Accepted','Declined','Completed') DEFAULT NULL,
  `Message` text DEFAULT NULL,
  `BookISBN` varchar(20) DEFAULT NULL,
  `ExchangeRequestDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exchange_post`
--

CREATE TABLE `exchange_post` (
  `Title` varchar(255) NOT NULL,
  `Author` varchar(255) DEFAULT NULL,
  `Genre` varchar(100) DEFAULT NULL,
  `ISBN` varchar(20) NOT NULL,
  `PublishedYear` int(11) DEFAULT NULL,
  `Description` text DEFAULT NULL,
  `Language` varchar(50) DEFAULT NULL,
  `Conditions` enum('Like New','Good','Acceptable','Antique') DEFAULT NULL,
  `OwnerUserID` int(11) DEFAULT NULL,
  `AvailabilityStatus` enum('Available','Unavailable') DEFAULT NULL,
  `BookImage` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `ReviewID` int(11) NOT NULL,
  `ReviewedUserID` int(11) DEFAULT NULL,
  `ReviewerUserID` int(11) DEFAULT NULL,
  `ExchangeRequestID` int(11) DEFAULT NULL,
  `Ratings` int(11) DEFAULT NULL,
  `ReviewText` text DEFAULT NULL,
  `Time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `Username` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `Email` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `Password` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `FirstName` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `LastName` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `PhoneNumber` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `UniversityAffiliation` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `UniversityCity` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `RegistrationDate` date DEFAULT NULL,
  `ProfilePicture` varchar(255) DEFAULT NULL,
  `Ratings` int(11) DEFAULT NULL,
  `Bio` text CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`email`,`phone_number`);

--
-- Indexes for table `exchangerequest`
--
ALTER TABLE `exchangerequest`
  ADD PRIMARY KEY (`RequestID`),
  ADD KEY `SenderUserID` (`SenderUserID`),
  ADD KEY `ReceiverUserID` (`ReceiverUserID`),
  ADD KEY `BookISBN` (`BookISBN`);

--
-- Indexes for table `exchange_post`
--
ALTER TABLE `exchange_post`
  ADD PRIMARY KEY (`ISBN`),
  ADD KEY `OwnerUserID` (`OwnerUserID`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`ReviewID`),
  ADD KEY `ReviewedUserID` (`ReviewedUserID`),
  ADD KEY `ReviewerUserID` (`ReviewerUserID`),
  ADD KEY `ExchangeRequestID` (`ExchangeRequestID`),
  ADD KEY `idx_ratings` (`Ratings`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `Username` (`Username`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD KEY `FK_Ratings` (`Ratings`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `exchangerequest`
--
ALTER TABLE `exchangerequest`
  MODIFY `RequestID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `ReviewID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `exchangerequest`
--
ALTER TABLE `exchangerequest`
  ADD CONSTRAINT `exchangerequest_ibfk_1` FOREIGN KEY (`SenderUserID`) REFERENCES `users` (`UserID`),
  ADD CONSTRAINT `exchangerequest_ibfk_2` FOREIGN KEY (`ReceiverUserID`) REFERENCES `users` (`UserID`),
  ADD CONSTRAINT `exchangerequest_ibfk_3` FOREIGN KEY (`BookISBN`) REFERENCES `exchange_post` (`ISBN`);

--
-- Constraints for table `exchange_post`
--
ALTER TABLE `exchange_post`
  ADD CONSTRAINT `exchange_post_ibfk_1` FOREIGN KEY (`OwnerUserID`) REFERENCES `users` (`UserID`);

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`ReviewedUserID`) REFERENCES `users` (`UserID`),
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`ReviewerUserID`) REFERENCES `users` (`UserID`),
  ADD CONSTRAINT `review_ibfk_3` FOREIGN KEY (`ExchangeRequestID`) REFERENCES `exchangerequest` (`RequestID`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK_Ratings` FOREIGN KEY (`Ratings`) REFERENCES `review` (`Ratings`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

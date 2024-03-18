-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 18, 2024 at 07:22 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- Database: `bookbridge`
--


----------------------------------------------------------


--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `email` varchar(100) NOT NULL,
  `phone_number` varchar(11) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`email`,`phone_number`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


--
-- Table structure for table `User`
--

CREATE TABLE User (
    UserID INT AUTO_INCREMENT PRIMARY KEY,
    Username VARCHAR(50) COLLATE latin1_general_ci UNIQUE NOT NULL,
    Email VARCHAR(100) COLLATE latin1_general_ci UNIQUE NOT NULL,
    Password VARCHAR(255) COLLATE latin1_general_ci NOT NULL,
    FirstName VARCHAR(50) COLLATE latin1_general_ci NOT NULL,
    LastName VARCHAR(50) COLLATE latin1_general_ci NOT NULL,
    PhoneNumber VARCHAR(20) COLLATE latin1_general_ci,
    UniversityAffiliation VARCHAR(100) COLLATE latin1_general_ci,
    UniversityCity VARCHAR(100) COLLATE latin1_general_ci,
    RegistrationDate DATE,
    ProfilePicture  VARCHAR(255),
    Ratings INT,
    Bio TEXT COLLATE latin1_general_ci,
    FOREIGN KEY (Ratings) REFERENCES Review(Ratings)
);

--
-- Table structure for table `Exchange_Post`
--

CREATE TABLE Exchange_Post (
    Title VARCHAR(255) NOT NULL,
    Author VARCHAR(255),
    Genre VARCHAR(100),
    ISBN VARCHAR(20) PRIMARY KEY,
    PublishedYear INT,
    Description TEXT,
    Language VARCHAR(50),
    Condition ENUM('Like New', 'Good', 'Acceptable', 'Antique'),
    OwnerUserID INT,
    AvailabilityStatus ENUM('Available', 'Unavailable'),
    BookImage VARCHAR(255),
    FOREIGN KEY (OwnerUserID) REFERENCES User(UserID)
);

--
-- Table structure for table `Review`
--

CREATE TABLE Review (
    ReviewID INT AUTO_INCREMENT PRIMARY KEY,
    ReviewedUserID INT,
    ReviewerUserID INT,
    ExchangeRequestID INT,
    Ratings INT,
    ReviewText TEXT,
    Time TIMESTAMP,
    FOREIGN KEY (ReviewedUserID) REFERENCES User(UserID),
    FOREIGN KEY (ReviewerUserID) REFERENCES User(UserID),
    FOREIGN KEY (ExchangeRequestID) REFERENCES ExchangeRequest(ExchangeRequestID)
);

--
-- Table structure for table `ExchangeRequest`
--

CREATE TABLE ExchangeRequest (
    RequestID INT AUTO_INCREMENT PRIMARY KEY,
    SenderUserID INT,
    ReceiverUserID INT,
    RequestDate DATE,
    Status ENUM('Pending', 'Accepted', 'Declined', 'Completed'),
    Message TEXT,
    BookISBN VARCHAR(20),
    ExchangeRequestDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (SenderUserID) REFERENCES User(UserID),
    FOREIGN KEY (ReceiverUserID) REFERENCES User(UserID)
     FOREIGN KEY (BookISBN) REFERENCES Exchange_Post(ISBN)
);




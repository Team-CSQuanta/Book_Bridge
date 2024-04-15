-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2024 at 08:21 PM
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
('foyez4m@gmail.com', '01965750798', 'admin', 'admin', 'Foyez Ahammed ', 'Naeem', '661647f5ab3064.76243598.png', 'Mouchak');

-- --------------------------------------------------------

--
-- Table structure for table `book_images`
--

CREATE TABLE `book_images` (
  `ImageID` int(11) NOT NULL,
  `ISBN` varchar(20) NOT NULL,
  `ImagePath` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryID` varchar(20) NOT NULL,
  `categoryName` varchar(50) DEFAULT NULL,
  `numAvailableBooks` int(11) DEFAULT 0,
  `numDesiredBooks` int(11) DEFAULT 0,
  `categoryDescription` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryID`, `categoryName`, `numAvailableBooks`, `numDesiredBooks`, `categoryDescription`) VALUES
('CAT-ACA-010', 'Academic', 0, 0, 'Academic books are publications that are written by scholars or experts in a particular field and are intended for an academic audience. These books typically cover specialized topics in depth, providing comprehensive analyses, theories, and findings related to the subject matter. They are often used as supplementary or primary sources in academic research, teaching, and learning. Academic books can be found across various disciplines, including but not limited to, the sciences, social sciences, humanities, and professional fields.'),
('CAT-BIO-005', 'Biography', 0, 0, 'The biography book genre offers readers a glimpse into the lives of fascinating individuals, spanning historical figures, cultural icons, political leaders, artists, scientists, athletes, and everyday people with remarkable stories. Biographies delve into the personal and professional journeys of their subjects, offering insights into their upbringing, experiences, challenges, achievements, and legacies.\r\n\r\nWhat sets biographies apart is their commitment to presenting a factual and comprehensive account of a person\'s life, often based on thorough research and interviews with people who knew the subject. Biographers strive to capture the essence of their subjects, providing readers with a deeper understanding of their motivations, struggles, triumphs, and impact on the world around them.'),
('CAT-COO-011', 'Cookbook', 0, 0, 'A cookbook or cookery book is a kitchen reference containing recipes. Cookbooks may be general, or may specialize in a particular cuisine or category of food. Recipes in cookbooks are organized in various ways: by course, by main ingredient, by cooking technique, alphabetically, by region or country, and so on.'),
('CAT-FAN-002', 'Fantasy', 0, 0, 'The fantasy book genre whisks readers away to magical realms filled with extraordinary creatures, mystical powers, and epic adventures. It\'s a genre characterized by imaginative storytelling that often incorporates elements such as magic, mythical creatures, and supernatural phenomena. '),
('CAT-GRA-012', 'Graphic novel', 0, 0, 'A graphic novel is a long-form work of sequential art. The term graphic novel is often applied broadly, including fiction, non-fiction, and anthologized work, though this practice is highly contested by comics scholars and industry professionals.'),
('CAT-HIS-001', 'History', 0, 0, 'The history book genre provides readers with a window into the past, offering insights into the events, people, and cultures that have shaped the world we live in today. '),
('CAT-HOR-006', 'Horror', 0, 0, NULL),
('CAT-MEM-007', 'Memoir', 0, 0, 'A memoir is any nonfiction narrative writing based on the author\'s personal memories. The assertions made in the work are thus understood to be factual. '),
('CAT-MYS-009', 'Mystery', 0, 0, 'Mystery is a fiction genre where the nature of an event, usually a murder or other crime, remains mysterious until the end of the story. Often within a closed circle of suspects, each suspect is usually provided with a credible motive and a reasonable opportunity for committing the crime.'),
('CAT-ROM-003', 'Romance', 0, 0, NULL),
('CAT-SCI-008', 'Science Fiction', 0, 0, 'Science fiction is a genre of speculative fiction, which typically deals with imaginative and futuristic concepts such as advanced science and technology, space exploration, time travel, parallel universes, and extraterrestrial life. It is related to fantasy, horror, and superhero fiction and contains many subgenres.'),
('CAT-THR-004', 'Thriller', 0, 0, NULL);

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
  `AvailabilityStatus` enum('Available','Unavailable') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `location_id` int(11) NOT NULL,
  `Country` varchar(100) DEFAULT NULL,
  `district` varchar(100) DEFAULT NULL,
  `upazila` varchar(100) DEFAULT NULL,
  `village` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`location_id`, `Country`, `district`, `upazila`, `village`) VALUES
(1, 'Bangladesh', 'desh', 'bari', 'jani'),
(2, 'Bangladesh', 'Dhaka', 'Khilgaon', 'North Goran'),
(3, 'Bangladesh', 'hello', 'dont know', 'hurh'),
(4, 'Bangladesh', 'hello', 'dont know', 'hurh'),
(5, 'Bangladesh', 'hello', 'dont know', 'hurh'),
(6, 'Bangladesh', 'hello', 'dont know', 'hurh'),
(7, 'Bangladesh', 'hello', 'dont know', 'hurh'),
(8, 'Bangladesh', 'hello', 'dont know', 'hurh'),
(9, 'Bangladesh', 'Dhaka', 'Khilgaon', 'North Goran'),
(10, 'Bangladesh', 'Dhaka', 'Khilgaon', 'North Goran'),
(11, 'Bangladesh', 'Dhaka', 'Khilgaon', 'North Goran'),
(12, 'Bangladesh', 'Dhaka', 'Khilgaon', 'North Goran'),
(13, '', '', '', ''),
(14, 'Bangladesh', 'barishal', 'amra', 'tomra');

-- --------------------------------------------------------

--
-- Table structure for table `request_to_set_up_hub`
--

CREATE TABLE `request_to_set_up_hub` (
  `RequestID` int(11) NOT NULL,
  `FullName` varchar(50) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `LocationID` int(11) DEFAULT NULL,
  `RequestStatus` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `request_to_set_up_hub`
--

INSERT INTO `request_to_set_up_hub` (`RequestID`, `FullName`, `email`, `LocationID`, `RequestStatus`) VALUES
(1, 'abul', 'abul@modon', 1, NULL),
(2, 'abul', 'abul@modon', 2, NULL),
(3, 'abul', 'abul@modon', 3, NULL),
(4, 'abul', 'abul@modon', 4, NULL),
(5, 'abul', 'abul@modon', 5, NULL),
(6, 'abul', 'abul@modon', 6, NULL),
(7, 'abul', 'abul@modon', 7, NULL),
(8, 'abul', 'abul@modon', 8, NULL),
(9, 'abul', 'abul@modon', 9, NULL),
(10, 'abul', 'abul@modon', 10, NULL),
(11, 'abul', 'abul@modon', 11, NULL),
(12, 'abul', 'abul@modon', 12, NULL),
(16, '', '', 13, NULL),
(17, '', '', 13, NULL),
(18, '', '', 13, NULL),
(19, '', '', 13, NULL),
(20, '', '', 13, NULL),
(21, '', '', 13, NULL),
(22, 'karin', '01521731081', 2, NULL),
(23, 'gvhbjn', 'hgvhbjnkm,', 14, NULL);

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
-- Indexes for table `book_images`
--
ALTER TABLE `book_images`
  ADD PRIMARY KEY (`ImageID`),
  ADD KEY `ISBN` (`ISBN`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryID`),
  ADD UNIQUE KEY `categoryID` (`categoryID`),
  ADD UNIQUE KEY `unique_category_name` (`categoryName`);

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
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`location_id`);

--
-- Indexes for table `request_to_set_up_hub`
--
ALTER TABLE `request_to_set_up_hub`
  ADD PRIMARY KEY (`RequestID`,`email`),
  ADD KEY `LocationID` (`LocationID`);

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
-- AUTO_INCREMENT for table `book_images`
--
ALTER TABLE `book_images`
  MODIFY `ImageID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exchangerequest`
--
ALTER TABLE `exchangerequest`
  MODIFY `RequestID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `request_to_set_up_hub`
--
ALTER TABLE `request_to_set_up_hub`
  MODIFY `RequestID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

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
-- Constraints for table `book_images`
--
ALTER TABLE `book_images`
  ADD CONSTRAINT `book_images_ibfk_1` FOREIGN KEY (`ISBN`) REFERENCES `exchange_post` (`ISBN`) ON DELETE CASCADE;

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
-- Constraints for table `request_to_set_up_hub`
--
ALTER TABLE `request_to_set_up_hub`
  ADD CONSTRAINT `request_to_set_up_hub_ibfk_1` FOREIGN KEY (`LocationID`) REFERENCES `location` (`location_id`);

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

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--

-- Host: localhost
-- Generation Time: Apr 23, 2024 at 03:31 AM

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
  `admin_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_number` varchar(11) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(25) NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `l_name` varchar(255) NOT NULL,
  `profile_img` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `location_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--


INSERT INTO `admin` (`admin_id`, `email`, `phone_number`, `password`, `role`, `f_name`, `l_name`, `profile_img`, `address`, `location_id`) VALUES
(1, 'foyez4m@gmail.com', '01965750798', 'admin', 'admin', 'Foyez Ahammed ', 'Naeem', '6626b030bab5a2.42704375.jpg', 'Mouchak', 1),
(10, 'rifat@gmail.com', '01936599274', '$2y$10$VDh.ILZQqaIrXmZwL9dPcu8Cxrr8VWwb4AqN9Gh6pQx/oIB7b9X5q', 'moderator', 'Rifat', 'Hossain', 'MODERATOR-66270f437de282.98001612.jpg', 'Mouchak, Kaliakair', 12);


-- --------------------------------------------------------

--
-- Table structure for table `bibliophile_club`
--

CREATE TABLE `bibliophile_club` (
  `club_id` int(11) NOT NULL,
  `club_name` varchar(250) DEFAULT NULL,
  `address_line` varchar(500) DEFAULT NULL,
  `location_id` int(11) DEFAULT NULL,
  `club_manager_id` int(11) DEFAULT NULL,
  `club_description` varchar(500) DEFAULT NULL,
  `club_img` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `country` varchar(20) NOT NULL,
  `division` varchar(100) DEFAULT NULL,
  `district` varchar(100) DEFAULT NULL,
  `upazila` varchar(20) NOT NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`location_id`, `country`, `division`, `district`, `upazila`) VALUES
(1, '', 'Dhaka', 'Dhaka', ''),
(2, '', 'Dhaka', 'Gazipur', ''),
(3, '', 'Dhaka', 'Kishoreganj', ''),
(4, '', 'Dhaka', 'Manikganj', ''),
(5, '', 'Dhaka', 'Munshiganj', ''),
(6, '', 'Dhaka', 'Narayanganj', ''),
(7, '', 'Dhaka', 'Narsingdi', ''),
(8, '', 'Dhaka', 'Tangail', ''),
(9, '', 'Dhaka', 'Faridpur', ''),
(10, '', 'Dhaka', 'Gopalganj', ''),
(11, '', 'Dhaka', 'Madaripur', ''),
(12, '', 'Dhaka', 'Rajbari', ''),
(13, '', 'Dhaka', 'Shariatpur', ''),
(17, '', 'Barisal', 'Barisal', ''),
(21, 'Bangladesh', 'dhaka', 'hello', 'mouchak'),
(22, 'Bangladesh', 'dfghj', 'fghj', 'fghj');

-- --------------------------------------------------------

--
-- Table structure for table `request_to_set_up_hub`
--

CREATE TABLE `request_to_set_up_hub` (
  `RequestID` int(11) NOT NULL,
  `FullName` varchar(50) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `LocationID` int(11) DEFAULT NULL,
  `Phone_Num` varchar(20) NOT NULL,
  `Add_Phn_Num` varchar(20) NOT NULL,
  `RequestStatus` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `request_to_set_up_hub`
--

INSERT INTO `request_to_set_up_hub` (`RequestID`, `FullName`, `email`, `LocationID`, `Phone_Num`, `Add_Phn_Num`, `RequestStatus`) VALUES
(0, 'foyezz', 'foyezz@gmail.com', 22, '234567', '', NULL);


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
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `f_name` varchar(255) DEFAULT NULL,
  `l_name` varchar(255) DEFAULT NULL,
  `reg_date` date DEFAULT current_timestamp(),
  `bio` varchar(500) DEFAULT '',
  `profile_img` varchar(500) DEFAULT 'defualt_profile.jpg',
  `book_wallet` int(11) DEFAULT 0,
  `street_address` varchar(300) DEFAULT NULL,
  `apartment_num` varchar(300) DEFAULT NULL,
  `postal_code` varchar(300) DEFAULT NULL,
  `location_id` int(11) DEFAULT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `phone_number`, `email`, `f_name`, `l_name`, `reg_date`, `bio`, `profile_img`, `book_wallet`, `street_address`, `apartment_num`, `postal_code`, `location_id`, `status`) VALUES
(1, '01715031376', 'sadia@gmail.com', 'Sadia Islam', 'Ema', '2024-04-15', '', 'defualt_profile.jpg', 0, 'Street Address', 'apartment number', '1751', 1, 'Active'),
(2, '01715031420', 'rakib@gmail.com', 'Rakibul Islam', 'Rakib', '2024-04-15', '', 'defualt_profile.jpg', 0, 'Street Address', 'apartment number', '1751', 1, 'Active'),
(6, '01795031420', 'motasim@gmail.com', 'Motasim Billah', '', '2024-04-15', '', 'defualt_profile.jpg', 0, 'Street Address', 'apartment number', '1751', 1, 'Active'),
(7, '017153431420', 'sakib@gmail.com', 'Sakibul Islam', 'Rakib', '2024-04-15', '', 'defualt_profile.jpg', 0, 'Street Address', 'apartment number', '1751', 1, 'Inactive'),
(8, '01715031820', 'somik@gmail.com', 'Somik hasan', 'oikko', '2024-04-15', '', 'defualt_profile.jpg', 0, 'Street Address', 'apartment number', '1751', 1, 'Active'),
(9, '01836923942', 'Tanvir@gmail.com', 'Tanvir', 'Ahmend', '2024-04-15', 'This is a bio for tanvir ahmed', 'defualt_profile.jpg', 0, 'Kawran Bazar', 'Apt-33', '2143', 2, 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),

  ADD UNIQUE KEY `unique_phone_name` (`email`,`phone_number`),
  ADD KEY `fk_location_id` (`location_id`);


--
-- Indexes for table `bibliophile_club`
--
ALTER TABLE `bibliophile_club`
  ADD PRIMARY KEY (`club_id`),
  ADD KEY `location_id` (`location_id`),
  ADD KEY `club_manager_id` (`club_manager_id`);

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
  ADD PRIMARY KEY (`location_id`),
  ADD UNIQUE KEY `district` (`district`);

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
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `phone_number` (`phone_number`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`

  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `bibliophile_club`
--
ALTER TABLE `bibliophile_club`
  MODIFY `club_id` int(11) NOT NULL AUTO_INCREMENT;

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

  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `ReviewID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--

-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `fk_location_id` FOREIGN KEY (`location_id`) REFERENCES `location` (`location_id`);

--
-- Constraints for table `bibliophile_club`
--
ALTER TABLE `bibliophile_club`
  ADD CONSTRAINT `bibliophile_club_ibfk_1` FOREIGN KEY (`location_id`) REFERENCES `location` (`location_id`),
  ADD CONSTRAINT `bibliophile_club_ibfk_2` FOREIGN KEY (`club_manager_id`) REFERENCES `admin` (`admin_id`);

--
-- Constraints for table `book_images`
--
ALTER TABLE `book_images`
  ADD CONSTRAINT `book_images_ibfk_1` FOREIGN KEY (`ISBN`) REFERENCES `exchange_post` (`ISBN`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

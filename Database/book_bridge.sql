-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 29, 2024 at 07:13 AM
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
  `f_name` varchar(255) NOT NULL,
  `l_name` varchar(255) NOT NULL,
  `profile_img` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `location_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `email`, `phone_number`, `password`, `f_name`, `l_name`, `profile_img`, `address`, `location_id`) VALUES
(1, 'foyeznaeem@gmail.com', '01965750792', 'admin', 'Foyez  Naeem', 'Ahammed ', '6629315dad94a7.57274626.png', 'Mouchak, Kaliakair', 1);

-- --------------------------------------------------------

--
-- Table structure for table `bibliophile_club`
--

CREATE TABLE `bibliophile_club` (
  `club_id` int(11) NOT NULL,
  `club_name` varchar(250) NOT NULL,
  `address_line` varchar(500) DEFAULT NULL,
  `district` varchar(100) NOT NULL,
  `club_manager_id` int(11) DEFAULT NULL,
  `club_description` varchar(500) DEFAULT NULL,
  `club_img` varchar(250) DEFAULT 'CLUB-IMG-Defualt.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bibliophile_club`
--

INSERT INTO `bibliophile_club` (`club_id`, `club_name`, `address_line`, `district`, `club_manager_id`, `club_description`, `club_img`) VALUES
(1, 'Gazipur Book Club', 'Mouchak Bazar, Kalikair', 'Gazipur', NULL, '\r\nA book club is a gathering of individuals who come together to discuss and engage with literature. Typically, members of a book club read the same book over a set period of time and then meet to discuss their thoughts, opinions, and insights about the book. Book clubs can be organized by friends, family, colleagues, or hosted by libraries, community centers, or online platforms.', 'CLUB-IMG-Defualt.jpg'),
(2, 'Dhaka Bibliophile Club', 'United City, Madani Avenue, Vatara', 'Dhaka', NULL, 'The Dhaka Book Club offers a vibrant community for book lovers in Dhaka, Bangladesh. With a focus on fostering a love for reading and intellectual engagement, our club organizes regular meetings, discussions, and events centered around diverse literary works. Join us to explore new books, exchange ideas, and connect with fellow book enthusiasts in Dhaka.', 'CLUB-IMG-Defualt.jpg'),
(4, 'Tangail Book Club', '123 ABC Road, Tangail West Akur Takur, Tangail Sadar', 'Tangail', NULL, 'The Tangail Book Club is a dynamic hub for bibliophiles and literary enthusiasts located in the heart of Tangail. Our club is dedicated to cultivating a vibrant reading culture and fostering intellectual engagement among members of all ages and backgrounds.', 'CLUB-IMG-662b44546f6443.90704513.jpeg'),
(5, 'Munshiganj Book Club', 'Street: 17/A, Gobindapur Road', 'Munshiganj', NULL, '&#13;&#10;The Munshiganj Book Club is a vibrant community of book enthusiasts dedicated to promoting a love for literature and intellectual exchange. Located in the heart of Munshiganj, Bangladesh, this club provides a platform for avid readers to come together, discuss literary works, share insights, and engage in meaningful conversations.', 'CLUB-IMG-662b451f49f516.61951131.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `bibliophile_club_admin`
--

CREATE TABLE `bibliophile_club_admin` (
  `club_admin_id` int(11) NOT NULL,
  `email` varchar(300) NOT NULL,
  `phone_number` varchar(300) NOT NULL,
  `password` varchar(500) NOT NULL,
  `f_name` varchar(200) NOT NULL,
  `l_name` varchar(200) NOT NULL,
  `bio` varchar(1000) DEFAULT NULL,
  `profile_img` varchar(300) DEFAULT NULL,
  `address_line` varchar(300) DEFAULT NULL,
  `location_id` int(11) NOT NULL,
  `club_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bibliophile_club_admin`
--

INSERT INTO `bibliophile_club_admin` (`club_admin_id`, `email`, `phone_number`, `password`, `f_name`, `l_name`, `bio`, `profile_img`, `address_line`, `location_id`, `club_id`) VALUES
(1, 'rifat@gmail.com', '01936566238', '$2y$10$mj8l1hrBY4Ccmre./06.8e/eZ93leCnoyo/wEWL6i3awcVghFRHyq', 'Rifat', 'Hossain', '', 'MODERATOR-66291a52028e10.49054479.jpg', 'Mouchak, Kaliakair', 2, NULL),
(2, 'mim@gmail.com', '01999483690', '$2y$10$OB4nf3ITjh4KZWsyGBSOdutzhVoU81EMLHBmpKHpT5kAcnkBYig2e', 'Khadiza Akter', 'Mim', NULL, 'defualt_profile.jpg', 'United City, Satarkul, vatara', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bibliophile_club_membership`
--

CREATE TABLE `bibliophile_club_membership` (
  `membership_id` int(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `club_id` int(11) NOT NULL,
  `membership_date` date DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bibliophile_club_membership`
--

INSERT INTO `bibliophile_club_membership` (`membership_id`, `user_id`, `club_id`, `membership_date`) VALUES
(1, 1, 2, '2024-04-26'),
(2, 2, 4, '2024-04-26'),
(3, 6, 1, '2024-04-26');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `book_id` int(11) NOT NULL,
  `isbn` varchar(20) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `authors` varchar(255) NOT NULL,
  `categoryID` varchar(20) DEFAULT NULL,
  `edition` varchar(50) DEFAULT NULL,
  `num_of_pages` int(11) DEFAULT NULL,
  `language` varchar(50) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `publisher` varchar(255) DEFAULT NULL,
  `publication_date` date DEFAULT NULL,
  `cover_img` varchar(255) DEFAULT 'default_cover.png',
  `additional_imgs` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_id`, `isbn`, `title`, `authors`, `categoryID`, `edition`, `num_of_pages`, `language`, `description`, `publisher`, `publication_date`, `cover_img`, `additional_imgs`) VALUES
(2, '978-0-575-40014-6', 'Norwegian Wood', 'Haruki Murakami', 'CAT-ROM-003', 'Vintage International Edition', 296, 'English', 'A coming-of-age novel set in 1960s Tokyo, exploring themes of love, loss, and mental health.', 'Vintage Books', '2000-09-12', 'default_cover.png', NULL),
(3, '978-0-446-51979-0', 'The Da Vinci Code', 'Dan Brown', 'CAT-MYS-009', 'Special Illustrated Edition', 597, 'English', 'A mystery thriller novel involving symbolism, conspiracy theories, and religious themes.', 'Doubleday', '2003-03-18', 'default_cover.png', NULL),
(4, '978-0-312-20613-9', 'Gone Girl', 'Gillian Flynn', 'CAT-MYS-009', 'Reprint Edition', 560, 'English', 'A psychological thriller novel about a woman who goes missing on her fifth wedding anniversary.', 'Crown Publishing Group', '2012-06-05', 'default_cover.png', NULL),
(5, '978-0-307-70164-8', 'The Martian', 'Andy Weir', 'CAT-SCI-008', 'Reprint Edition', 369, 'English', 'A science fiction novel following an astronaut stranded on Mars and his struggle for survival.', 'Crown Publishing Group', '2014-02-11', 'default_cover.png', NULL),
(6, '978-0-307-27787-4', 'Ready Player One', 'Ernest Cline', 'CAT-SCI-008', 'Reprint Edition', 374, 'English', 'A dystopian science fiction novel set in a future where people escape reality by entering a virtual reality universe called the OASIS.', 'Crown Publishing Group', '2011-08-16', 'default_cover.png', NULL),
(7, '978-0-307-88839-6', 'Jurassic Park', 'Michael Crichton', 'CAT-SCI-008', 'Reprint Edition', 464, 'English', 'A science fiction thriller novel about a theme park populated with genetically engineered dinosaurs.', 'Ballantine Books', '1991-05-14', 'default_cover.png', NULL),
(8, '978-0-345-47650-3', 'The Firm', 'John Grisham', 'CAT-MYS-009', 'Reprint Edition', 501, 'English', 'A legal thriller novel about a young attorney who becomes embroiled in a dangerous conspiracy at a prestigious law firm.', 'Doubleday', '1991-03-01', 'default_cover.png', NULL),
(9, '978-1-4197-3903-1', 'The Hate U Give', 'Angie Thomas', 'CAT-THR-004', 'Reprint Edition', 464, 'English', 'A young adult novel inspired by the Black Lives Matter movement, following the aftermath of a police shooting.', 'Balzer + Bray', '2017-02-28', 'default_cover.png', NULL),
(10, '978-0-553-57340-2', 'The Secret History', 'Donna Tartt', 'CAT-MYS-009', 'Reprint Edition', 559, 'English', 'A mystery novel centered around a group of elite college students who become involved in a murder.', 'Alfred A. Knopf', '1992-09-05', 'default_cover.png', NULL);

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
  `categoryDescription` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryID`, `categoryName`, `categoryDescription`) VALUES
('CAT-ACA-010', 'Academic', 'Academic books are publications that are written by scholars or experts in a particular field and are intended for an academic audience. These books typically cover specialized topics in depth, providing comprehensive analyses, theories, and findings related to the subject matter. They are often used as supplementary or primary sources in academic research, teaching, and learning. Academic books can be found across various disciplines, including but not limited to, the sciences, social sciences, humanities, and professional fields.'),
('CAT-BIO-005', 'Biography', 'The biography book genre offers readers a glimpse into the lives of fascinating individuals, spanning historical figures, cultural icons, political leaders, artists, scientists, athletes, and everyday people with remarkable stories. Biographies delve into the personal and professional journeys of their subjects, offering insights into their upbringing, experiences, challenges, achievements, and legacies.\r\n\r\nWhat sets biographies apart is their commitment to presenting a factual and comprehensive account of a person\'s life, often based on thorough research and interviews with people who knew the subject. Biographers strive to capture the essence of their subjects, providing readers with a deeper understanding of their motivations, struggles, triumphs, and impact on the world around them.'),
('CAT-COO-011', 'Cookbook', 'A cookbook or cookery book is a kitchen reference containing recipes. Cookbooks may be general, or may specialize in a particular cuisine or category of food. Recipes in cookbooks are organized in various ways: by course, by main ingredient, by cooking technique, alphabetically, by region or country, and so on.'),
('CAT-FAN-002', 'Fantasy', 'The fantasy book genre whisks readers away to magical realms filled with extraordinary creatures, mystical powers, and epic adventures. It\'s a genre characterized by imaginative storytelling that often incorporates elements such as magic, mythical creatures, and supernatural phenomena. '),
('CAT-GRA-012', 'Graphic novel', 'A graphic novel is a long-form work of sequential art. The term graphic novel is often applied broadly, including fiction, non-fiction, and anthologized work, though this practice is highly contested by comics scholars and industry professionals.'),
('CAT-HIS-001', 'History', 'The history book genre provides readers with a window into the past, offering insights into the events, people, and cultures that have shaped the world we live in today. '),
('CAT-HOR-006', 'Horror', NULL),
('CAT-MEM-007', 'Memoir', 'A memoir is any nonfiction narrative writing based on the author\'s personal memories. The assertions made in the work are thus understood to be factual. '),
('CAT-MYS-009', 'Mystery', 'Mystery is a fiction genre where the nature of an event, usually a murder or other crime, remains mysterious until the end of the story. Often within a closed circle of suspects, each suspect is usually provided with a credible motive and a reasonable opportunity for committing the crime.'),
('CAT-ROM-003', 'Romance', NULL),
('CAT-SCI-008', 'Science Fiction', 'Science fiction is a genre of speculative fiction, which typically deals with imaginative and futuristic concepts such as advanced science and technology, space exploration, time travel, parallel universes, and extraterrestrial life. It is related to fantasy, horror, and superhero fiction and contains many subgenres.'),
('CAT-THR-004', 'Thriller', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contribution_request`
--

CREATE TABLE `contribution_request` (
  `request_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `book_id` int(11) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL CHECK (`status` in ('pending','user is requested to send','received by the club member','quality checking of the book','published')),
  `date_of_request` date DEFAULT curdate(),
  `date_of_received` date DEFAULT NULL,
  `book_received_date` date DEFAULT NULL,
  `published_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Table structure for table `global_book_collection`
--

CREATE TABLE `global_book_collection` (
  `collection_id` bigint(20) UNSIGNED NOT NULL,
  `book_id` int(11) DEFAULT NULL,
  `owner_id` int(11) DEFAULT NULL,
  `book_condition` enum('like new','good','acceptable') DEFAULT NULL,
  `availability_status` enum('yes','no') DEFAULT 'yes',
  `club_id` int(11) DEFAULT NULL,
  `club_member_id` int(20) DEFAULT NULL,
  `date_added` date DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `global_book_collection`
--

INSERT INTO `global_book_collection` (`collection_id`, `book_id`, `owner_id`, `book_condition`, `availability_status`, `club_id`, `club_member_id`, `date_added`) VALUES
(2, 2, 2, 'good', 'no', 2, 2, '2024-04-27'),
(3, 3, 6, 'acceptable', 'yes', 4, 3, '2024-04-27'),
(5, 5, 8, 'good', 'no', 1, 2, '2024-04-27'),
(6, 6, 9, 'acceptable', 'yes', 2, 3, '2024-04-27');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `location_id` int(11) NOT NULL,
  `division` varchar(100) DEFAULT NULL,
  `district` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`location_id`, `division`, `district`) VALUES
(1, 'Dhaka', 'Dhaka'),
(2, 'Dhaka', 'Gazipur'),
(3, 'Dhaka', 'Kishoreganj'),
(4, 'Dhaka', 'Manikganj'),
(5, 'Dhaka', 'Munshiganj'),
(6, 'Dhaka', 'Narayanganj'),
(7, 'Dhaka', 'Narsingdi'),
(8, 'Dhaka', 'Tangail'),
(9, 'Dhaka', 'Faridpur'),
(10, 'Dhaka', 'Gopalganj'),
(11, 'Dhaka', 'Madaripur'),
(12, 'Dhaka', 'Rajbari'),
(13, 'Dhaka', 'Shariatpur'),
(17, 'Barisal', 'Barisal');

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
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `expiration_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `Username`, `Email`, `Password`, `FirstName`, `LastName`, `PhoneNumber`, `UniversityAffiliation`, `UniversityCity`, `RegistrationDate`, `ProfilePicture`, `Ratings`, `Bio`) VALUES
(1, 'w3se4d5rftygu', '4567gyuh', '$2y$10$KA//ivSbK3O46J4/NlrVl.uqomPaP58cOHn7SUeIuVjdBuTmsnZxu', '56tgyu', '56t7y', 'tyuh', 'ftyguh', '56t7y', '2024-04-14', NULL, NULL, '67y'),
(2, 'weryhefweiofj', 'ruwijwlrkjw', '$2y$10$hpllUfCfZQVzcbj9OiNPL.PTvsniav68EjbzXWDiCnEL6fpnOL0uW', 'uiwh', 'uh', 'hh', 'jjh', 'yuu', '2024-04-15', NULL, NULL, 'uu'),
(3, 'eruiirwe', 'wriowrj', '$2y$10$JOdThh93QcsdHOotD0k3hOjInkn.Aty/zspx1J3UT3WbGCx.zVYGi', 'fklrj', 'egiejr', 'ergj', 'rgje', 'ge', '2024-04-15', NULL, NULL, 'e'),
(4, 'jubairahmed13260', 'jubairahmed13260@gmail.com', '$2y$10$gpNi89.8kEQ4ndK6hdrGdepgFSmDnrSyz3tbxjChfQKwwYzji.mSG', 'Jubair', 'Ahmed', '01906901852', 'UIU', 'Dhaka', '2024-04-23', NULL, NULL, 'weiwhcnw'),
(5, 'twudyqidh', 'jubair010ahmed@gmail.com', '$2y$10$lpSF3Jk45.0CsUJg5z2cLu4WPgXy9XQMkVV8noNdIzBY55DYWrFYO', 'Ahmed', 'J', '35354', 'wuyw', 'wefuiweyd', '2024-04-29', NULL, NULL, 'weuiwy');

-- --------------------------------------------------------

--
-- Table structure for table `users_wishes`
--

CREATE TABLE `users_wishes` (
  `user_id` int(11) NOT NULL,
  `book_wishes_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_wishes`
--

INSERT INTO `users_wishes` (`user_id`, `book_wishes_id`) VALUES
(1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `wishes_list`
--

CREATE TABLE `wishes_list` (
  `book_wishes_id` int(11) NOT NULL,
  `book_id` int(11) DEFAULT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wishes_list`
--

INSERT INTO `wishes_list` (`book_wishes_id`, `book_id`, `date_added`) VALUES
(1, 2, '2024-04-29 02:52:45'),
(3, 4, '2024-04-29 02:52:45'),
(4, 5, '2024-04-29 02:52:45'),
(6, 7, '2024-04-29 03:36:14');

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
  ADD KEY `fk_bibliopile_club_district` (`district`),
  ADD KEY `fk_club_admin_id` (`club_manager_id`);

--
-- Indexes for table `bibliophile_club_admin`
--
ALTER TABLE `bibliophile_club_admin`
  ADD PRIMARY KEY (`club_admin_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone_number` (`phone_number`),
  ADD KEY `club_id` (`club_id`),
  ADD KEY `location_id` (`location_id`);

--
-- Indexes for table `bibliophile_club_membership`
--
ALTER TABLE `bibliophile_club_membership`
  ADD PRIMARY KEY (`membership_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `category_id` (`categoryID`);

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
  ADD UNIQUE KEY `unique_category_name` (`categoryName`);

--
-- Indexes for table `contribution_request`
--
ALTER TABLE `contribution_request`
  ADD PRIMARY KEY (`request_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `book_id` (`book_id`);

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
-- Indexes for table `global_book_collection`
--
ALTER TABLE `global_book_collection`
  ADD PRIMARY KEY (`collection_id`),
  ADD KEY `book_id` (`book_id`),
  ADD KEY `owner_id` (`owner_id`),
  ADD KEY `club_id` (`club_id`),
  ADD KEY `fk_membership_id` (`club_member_id`);

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
-- Indexes for table `users_wishes`
--
ALTER TABLE `users_wishes`
  ADD PRIMARY KEY (`user_id`,`book_wishes_id`),
  ADD KEY `book_wishes_id` (`book_wishes_id`);

--
-- Indexes for table `wishes_list`
--
ALTER TABLE `wishes_list`
  ADD PRIMARY KEY (`book_wishes_id`),
  ADD KEY `book_id` (`book_id`);

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
  MODIFY `club_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `bibliophile_club_admin`
--
ALTER TABLE `bibliophile_club_admin`
  MODIFY `club_admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bibliophile_club_membership`
--
ALTER TABLE `bibliophile_club_membership`
  MODIFY `membership_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `book_images`
--
ALTER TABLE `book_images`
  MODIFY `ImageID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contribution_request`
--
ALTER TABLE `contribution_request`
  MODIFY `request_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exchangerequest`
--
ALTER TABLE `exchangerequest`
  MODIFY `RequestID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `global_book_collection`
--
ALTER TABLE `global_book_collection`
  MODIFY `collection_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
-- AUTO_INCREMENT for table `wishes_list`
--
ALTER TABLE `wishes_list`
  MODIFY `book_wishes_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  ADD CONSTRAINT `fk_bibliopile_club_district` FOREIGN KEY (`district`) REFERENCES `location` (`district`),
  ADD CONSTRAINT `fk_club_admin_id` FOREIGN KEY (`club_manager_id`) REFERENCES `bibliophile_club_admin` (`club_admin_id`);

--
-- Constraints for table `bibliophile_club_admin`
--
ALTER TABLE `bibliophile_club_admin`
  ADD CONSTRAINT `bibliophile_club_admin_ibfk_1` FOREIGN KEY (`club_id`) REFERENCES `bibliophile_club` (`club_id`),
  ADD CONSTRAINT `bibliophile_club_admin_ibfk_2` FOREIGN KEY (`location_id`) REFERENCES `location` (`location_id`);

--
-- Constraints for table `bibliophile_club_membership`
--
ALTER TABLE `bibliophile_club_membership`
  ADD CONSTRAINT `bibliophile_club_membership_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`categoryID`) REFERENCES `category` (`categoryID`);

--
-- Constraints for table `book_images`
--
ALTER TABLE `book_images`
  ADD CONSTRAINT `book_images_ibfk_1` FOREIGN KEY (`ISBN`) REFERENCES `exchange_post` (`ISBN`) ON DELETE CASCADE;

--
-- Constraints for table `contribution_request`
--
ALTER TABLE `contribution_request`
  ADD CONSTRAINT `contribution_request_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `contribution_request_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `book` (`book_id`);

--
-- Constraints for table `global_book_collection`
--
ALTER TABLE `global_book_collection`
  ADD CONSTRAINT `fk_membership_id` FOREIGN KEY (`club_member_id`) REFERENCES `bibliophile_club_membership` (`membership_id`),
  ADD CONSTRAINT `global_book_collection_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `book` (`book_id`),
  ADD CONSTRAINT `global_book_collection_ibfk_2` FOREIGN KEY (`owner_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `global_book_collection_ibfk_3` FOREIGN KEY (`club_id`) REFERENCES `bibliophile_club` (`club_id`),
  ADD CONSTRAINT `global_book_collection_ibfk_4` FOREIGN KEY (`club_member_id`) REFERENCES `bibliophile_club_membership` (`membership_id`);

--
-- Constraints for table `users_wishes`
--
ALTER TABLE `users_wishes`
  ADD CONSTRAINT `users_wishes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `users_wishes_ibfk_2` FOREIGN KEY (`book_wishes_id`) REFERENCES `wishes_list` (`book_wishes_id`);

--
-- Constraints for table `wishes_list`
--
ALTER TABLE `wishes_list`
  ADD CONSTRAINT `wishes_list_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `book` (`book_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

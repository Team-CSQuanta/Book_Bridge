-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2024 at 01:35 AM
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
(10, '978-0-553-57340-2', 'The Secret History', 'Donna Tartt', 'CAT-MYS-009', 'Reprint Edition', 559, 'English', 'A mystery novel centered around a group of elite college students who become involved in a murder.', 'Alfred A. Knopf', '1992-09-05', 'default_cover.png', NULL),
(11, '9780143034902', 'Freakonomics: A Rogue Economist Explores the Hidden Side of Everything', 'Steven D. Levitt, Stephen J. Dubner', 'CAT-BIO-005', 'Revised and Expanded Edition', 336, 'English', 'A non-fiction book that combines economics with pop culture, offering insights into various societal phenomena.', 'William Morrow', '2005-05-01', 'default_cover.png', NULL),
(12, '9780140449235', 'The Picture of Dorian Gray', 'Oscar Wilde', 'CAT-HIS-001', 'Revised Edition', 253, 'English', 'A philosophical novel about a man who remains youthful while his portrait ages, exploring themes of beauty, morality, and the pursuit of pleasure.', 'Penguin Classics', '1890-07-01', 'default_cover.png', NULL),
(13, '978-1-846-14276-7', 'To Kill a Mockingbird', 'Harper Lee', 'CAT-MEM-007', 'Reprint Edition', 336, 'English', 'A classic novel set in the American South during the 1930s, addressing racial injustice and moral growth through the eyes of a young girl.', 'HarperCollins Publishers', '1960-07-11', 'default_cover.png', NULL),
(14, '9780143118756', 'Eat, Pray, Love', 'Elizabeth Gilbert', 'CAT-MEM-007', '10th Anniversary Edition', 400, 'English', 'A memoir chronicling the author\'s journey of self-discovery through travel, spirituality, and relationships.', 'Penguin Books', '2006-01-30', 'default_cover.png', NULL),
(15, '9780679410430', 'The Catcher in the Rye', 'J.D. Salinger', 'CAT-GRA-012', 'Reprint Edition', 277, 'English', 'A classic novel narrated by a troubled teenager, exploring themes of identity, alienation, and the transition to adulthood.', 'Little, Brown and Company', '1951-07-16', 'default_cover.png', NULL),
(102, '9781119015260', 'Fundamental of Calculus', 'Carla C. Morris, Robert M. Stark', 'CAT-ACA-010', 'N/A', 368, 'English', 'Features the techniques, methods, and applications of calculus using real-world examples from business and economics as well as the life and social sciences An introduction to differential and integral calculus, Fundamentals of Calculus presents key topics suited for a variety of readers in fields ranging from entrepreneurship and economics to environmental and social sciences. Practical examples from a variety of subject areas are featured throughout each chapter and step-by-step explanations for the solutions are presented. Specific techniques are also applied to highlight important information in each section, including symbols interspersed throughout to further reader comprehension. In addition, the book illustrates the elements of finite calculus with the varied formulas for power, quotient, and product rules that correlate markedly with traditional calculus. Featuring calculus as the “mathematics of change,” each chapter concludes with a historical notes section. Fundamentals of Calculus chapter coverage includes: Linear Equations and Functions The Derivative Using the Derivative Exponents and Logarithms Differentiation Techniques Integral Calculus Integrations Techniques Functions of Several Variables Series and Summations Applications to Probability Supplemented with online instructional support materials, Fundamentals of Calculus is an ideal textbook for undergraduate students majoring in business, economics, biology, chemistry, and environmental science.', 'John Wiley & Sons', '2015-08-10', '', ''),
(103, '9781317583660', 'Colloquial Bengali (eBook And MP3 Pack)', 'Mithun B. Nasrin, W.A.M van der Wurff', 'CAT-ACA-010', 'N/A', 289, 'English', 'First published in 2004. Routledge is an imprint of Taylor & Francis, an informa company.', 'Routledge', '2014-10-14', 'uploadedBooks/663241398d47d6.30774829_book-9.png', 'uploadedBooks/663241398d8ee9.31754898_book-10 (1).png,uploadedBooks/663241398dbc91.89594408_book-1 (1).png'),
(104, '8173711461', 'Wings of Fire', 'Avul Pakir Jainulabdeen Abdul Kalam, Arun Tiwari', 'CAT-ACA-010', 'N/A', 228, 'English', 'Avul Pakir Jainulabdeen Abdul Kalam, The Son Of A Little-Educated Boat-Owner In Rameswaram, Tamil Nadu, Had An Unparalled Career As A Defence Scientist, Culminating In The Highest Civilian Award Of India, The Bharat Ratna. As Chief Of The Country`S Defence Research And Development Programme, Kalam Demonstrated The Great Potential For Dynamism And Innovation That Existed In Seemingly Moribund Research Establishments. This Is The Story Of Kalam`S Rise From Obscurity And His Personal And Professional Struggles, As Well As The Story Of Agni, Prithvi, Akash, Trishul And Nag--Missiles That Have Become Household Names In India And That Have Raised The Nation To The Level Of A Missile Power Of International Reckoning.', 'Universities Press', '0000-00-00', 'uploadedBooks/663244ebdcf894.75795716_book-8.png', 'uploadedBooks/663244ebdd41c2.11878679_book-5 (1).png,uploadedBooks/663244ebdd7913.97885658_book-10 (1).png,uploadedBooks/663244ebde1ed8.80129238_book-1 (1).png');

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

--
-- Dumping data for table `contribution_request`
--

INSERT INTO `contribution_request` (`request_id`, `user_id`, `book_id`, `status`, `date_of_request`, `date_of_received`, `book_received_date`, `published_date`) VALUES
(1, 1, 5, 'pending', '2024-04-09', '2024-04-10', '2024-04-16', '2024-04-23'),
(2, 2, 4, 'pending', '2024-04-09', '2024-04-10', '2024-04-16', '2024-04-23'),
(6, 13, 5, 'published', '2024-05-28', NULL, NULL, NULL),
(7, 13, 6, 'published', '2024-05-28', NULL, NULL, NULL),
(9, 13, 10, 'published', '0000-00-00', NULL, NULL, NULL),
(56, 13, 3, 'published', '0000-00-00', NULL, NULL, NULL),
(67, 13, 8, 'published', '0000-00-00', NULL, NULL, NULL),
(69, 13, 9, 'published', '0000-00-00', NULL, NULL, NULL),
(100, 13, 4, 'published', '0000-00-00', NULL, NULL, NULL),
(101, 13, 102, 'published', '2024-05-01', NULL, NULL, NULL),
(102, 13, 103, 'published', '2024-05-01', NULL, NULL, NULL),
(103, 13, 104, 'pending', '2024-05-01', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `exchange_request`
--

CREATE TABLE `exchange_request` (
  `exchange_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `book_id` int(11) DEFAULT NULL,
  `date_of_request` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_of_delivery` timestamp NULL DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL CHECK (`status` in ('Pending','Processing','Delivered')),
  `notes` text DEFAULT NULL,
  `processed_by` int(11) DEFAULT NULL
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
(6, 6, 9, 'acceptable', 'yes', 2, 3, '2024-04-27'),
(7, 11, 10, 'good', 'yes', 3, 1, '2024-05-03'),
(8, 12, 10, 'acceptable', 'yes', 3, 4, '2024-05-03'),
(9, 13, 10, 'like new', 'yes', 3, 2, '2024-05-03'),
(10, 14, 12, 'good', 'yes', 1, 5, '2024-05-03'),
(11, 15, 12, 'acceptable', 'yes', 1, 1, '2024-05-03'),
(12, 16, 12, 'like new', 'yes', 1, 3, '2024-05-03'),
(13, 17, 15, 'good', 'yes', 2, 7, '2024-05-03'),
(14, 18, 15, 'acceptable', 'no', 2, 6, '2024-05-03'),
(15, 8, 8, 'acceptable', 'yes', 4, 9, '2024-05-03'),
(16, 9, 8, 'good', 'no', 4, 8, '2024-05-03'),
(17, 10, 8, 'like new', 'yes', 4, 5, '2024-05-03'),
(21, 7, 9, 'like new', 'yes', 3, 7, '2024-05-03'),
(22, 102, 3, 'good', 'yes', 2, 9, '2024-05-03'),
(23, 103, 3, 'acceptable', 'no', 2, 5, '2024-05-03'),
(24, 104, 3, 'like new', 'yes', 2, 2, '2024-05-03');

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
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `expiration_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
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
  `status` varchar(50) NOT NULL DEFAULT 'Active',
  `verifiedEmail` int(11) NOT NULL DEFAULT 0,
  `token` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Table structure for table `user_activity`
--

CREATE TABLE `user_activity` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `activity_description` text DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_activity`
--

INSERT INTO `user_activity` (`id`, `user_id`, `activity_description`, `timestamp`) VALUES
(1, 13, 'User logged in', '2024-05-02 14:28:06'),
(2, 13, 'User logged in', '2024-05-02 14:31:04'),
(3, 13, 'User logged in', '2024-05-02 14:55:35'),
(4, 13, 'User logged out', '2024-05-02 14:58:51'),
(5, 13, 'User logged in', '2024-05-02 14:59:14'),
(6, 13, 'User logged out', '2024-05-02 14:59:36'),
(7, 13, 'User logged in', '2024-05-02 14:59:46'),
(8, 13, 'User logged out', '2024-05-02 14:59:53'),
(9, 13, 'User logged in', '2024-05-02 15:00:01'),
(10, 13, 'User logged out', '2024-05-02 15:00:08'),
(11, 13, 'User logged in', '2024-05-02 15:00:15'),
(12, 13, 'User logged out', '2024-05-02 16:07:55');

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
-- Indexes for table `exchange_request`
--
ALTER TABLE `exchange_request`
  ADD PRIMARY KEY (`exchange_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `book_id` (`book_id`),
  ADD KEY `processed_by` (`processed_by`);

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
-- Indexes for table `user_activity`
--
ALTER TABLE `user_activity`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

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
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2024 at 03:19 PM
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
-- Database: `uniussd`
--

-- --------------------------------------------------------

--
-- Table structure for table `businesses`
--

CREATE TABLE `businesses` (
  `id` int(11) NOT NULL,
  `business_name` varchar(255) DEFAULT NULL,
  `business_type` varchar(255) DEFAULT NULL,
  `industry` varchar(255) DEFAULT NULL,
  `registration_number` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `lga` varchar(255) DEFAULT NULL,
  `contact_person_name` varchar(255) DEFAULT NULL,
  `contact_person_email` varchar(255) DEFAULT NULL,
  `contact_person_phone_number` varchar(255) DEFAULT NULL,
  `contact_person_position` varchar(255) DEFAULT NULL,
  `annual_revenue` varchar(255) DEFAULT NULL,
  `number_of_employees` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `business_description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `businesses`
--

INSERT INTO `businesses` (`id`, `business_name`, `business_type`, `industry`, `registration_number`, `address`, `state`, `lga`, `contact_person_name`, `contact_person_email`, `contact_person_phone_number`, `contact_person_position`, `annual_revenue`, `number_of_employees`, `website`, `business_description`, `created_at`, `updated_at`) VALUES
(1, 'FLOJONNIE NIGERIA LTD', 'Retail', '', '', '37 Ajayi Aina Street Ifako Gbagada Lagos', 'Ebonyi', 'Kosofe', 'wale', 'officialezekiel@gmail.com', '4444444', 'CEO', '', '', '', '', '2024-08-03 13:27:27', '2024-08-03 21:24:22');

-- --------------------------------------------------------

--
-- Table structure for table `business_information`
--

CREATE TABLE `business_information` (
  `id` int(11) NOT NULL,
  `business_name` varchar(255) DEFAULT NULL,
  `business_type` varchar(100) DEFAULT NULL,
  `industry` varchar(100) DEFAULT NULL,
  `registration_number` varchar(100) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `lga` varchar(100) DEFAULT NULL,
  `contact_person_name` varchar(255) DEFAULT NULL,
  `contact_person_email` varchar(255) DEFAULT NULL,
  `contact_person_phone_number` varchar(20) DEFAULT NULL,
  `contact_person_position` varchar(100) DEFAULT NULL,
  `annual_revenue` decimal(15,2) DEFAULT NULL,
  `number_of_employees` int(11) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `business_description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `id` int(11) NOT NULL,
  `partneremail` varchar(1000) DEFAULT NULL,
  `partner` varchar(1000) DEFAULT NULL,
  `reference_id` varchar(50) DEFAULT NULL,
  `banner_image` varchar(255) DEFAULT NULL,
  `content_video` varchar(1000) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `date` date DEFAULT NULL,
  `author` varchar(1000) DEFAULT NULL,
  `keyword` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `is_featured` tinyint(1) DEFAULT NULL,
  `status` enum('Draft','Published','Archived') DEFAULT 'Draft',
  `categories` varchar(255) DEFAULT NULL,
  `tags` varchar(255) DEFAULT NULL,
  `active_date` date DEFAULT NULL,
  `uploaded_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `summary` text DEFAULT NULL,
  `views_count` varchar(50) DEFAULT '0',
  `comments_count` varchar(50) DEFAULT '0',
  `likes_count` varchar(50) DEFAULT '0',
  `shares_count` varchar(50) DEFAULT '0',
  `last_accessed` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`id`, `partneremail`, `partner`, `reference_id`, `banner_image`, `content_video`, `title`, `content`, `date`, `author`, `keyword`, `slug`, `is_featured`, `status`, `categories`, `tags`, `active_date`, `uploaded_date`, `summary`, `views_count`, `comments_count`, `likes_count`, `shares_count`, `last_accessed`, `created_at`, `updated_at`) VALUES
(1, 'john.doe@example.com', 'Tech Solutions Inc.', '569b863d410e0c2558486a352347e2ca', './uploaded_files/66c497636ba84.png', './uploaded_videos/66c497636bdef.mp4', 'Why You must Code', '<p>In today\'s digital world, coding isn\'t just for tech professionals&mdash;it\'s a vital skill for anyone looking to thrive. Learning to code sharpens problem-solving abilities, fosters creativity, and opens doors to countless opportunities. Whether you want to build your own app, automate repetitive tasks, or simply understand the technology that drives our lives, coding empowers you to turn ideas into reality.</p>', '2024-08-28', '0', 'keyword', 'why-you-must-code', 0, 'Draft', 'Health', 'meat, fish', '2024-08-29', '2024-08-20 14:17:23', 'Plus, as technology continues to evolve, coding skills are becoming increasingly essential, ensuring you\'re not just a user of technology, but a creator.', '0', '0', '0', '0', NULL, '2024-08-20 13:17:23', '2024-08-20 13:17:23'),
(6, 'john.doe@example.com', 'Tech Solutions Inc.', '24fb80f3a78414fe9090a52156ca6648', './uploaded_files/66c4bc8b6b5ca.png', './uploaded_videos/66c4bc8b6bc41.mp4', 'Why You must Code Today', '<p>In today\'s digital world, coding is more than just a technical skill&mdash;it\'s a vital competency that opens doors to countless opportunities. Here&rsquo;s why learning to code is a smart choice:</p>\r\n<p>**1. <strong>Problem-Solving Skills</strong>: Coding teaches you to approach problems methodically. Breaking down complex issues into smaller, manageable tasks fosters analytical thinking and enhances problem-solving skills.</p>\r\n<p>**2. <strong>Career Opportunities</strong>: The tech industry is booming, with a growing demand for skilled programmers. Whether you&rsquo;re interested in web development, data science, or software engineering, coding skills are highly sought after.</p>\r\n<p>**3. <strong>Creativity and Innovation</strong>: Coding allows you to build and create. From developing apps to designing websites, coding empowers you to turn your ideas into reality, sparking innovation and creativity.</p>\r\n<p>**4. <strong>High Earning Potential</strong>: Tech jobs often come with lucrative salaries. The expertise you gain in coding can lead to well-paying positions and a rewarding career.</p>\r\n<p>**5. <strong>Understanding Technology</strong>: As technology continues to evolve, understanding the basics of coding helps you better grasp how the digital world operates. This knowledge is invaluable in an increasingly tech-driven society.</p>\r\n<p>**6. <strong>Global Community</strong>: Coding connects you with a global community of tech enthusiasts. Collaborating on projects, sharing knowledge, and participating in forums can expand your network and enrich your learning experience.</p>\r\n<p>Learning to code isn&rsquo;t just about writing lines of text; it\'s about thinking differently and embracing the future. Whether you\'re starting a new career or enhancing your current skills, coding is a powerful tool that can transform your personal and professional life.</p>\r\n<p>&nbsp;</p>', '2024-08-20', '0', 'keyword', 'why-you-must-code-today-1724169354', 0, 'Draft', 'Music', 'meat, fish', '2024-08-21', '2024-08-20 16:55:55', 'Learning to code isn’t just about writing lines of text; it\'s about thinking differently and embracing the future. Whether you\'re https://bit.ly/4dPAkiT', '0', '0', '0', '0', NULL, '2024-08-20 15:55:55', '2024-08-20 15:55:55'),
(7, 'gafar@gmail.com', 'Gafar Blog', '8275515a3a64af75f3facb26cbe333b6', './uploaded_files/66c653fe7d525.jpg', './uploaded_videos/66c653fe7dadd.mp4', 'Why is Yam Good For You', '<p><em><span class=\"ILfuVd\" lang=\"en\"><span class=\"hgKElc\"><strong>A single yam packs a whopping 369% of your daily vitamin A requirement</strong>. Yam vitamins and minerals also include vitamin C, calcium, and iron. Yams must be peeled and cooked before eating. Many types contain natural toxins that could make you ill.</span></span></em></p>\r\n<p><span class=\"ILfuVd\" lang=\"en\"><span class=\"hgKElc\"><strong>A single yam packs a whopping 369% of your daily vitamin A requirement</strong>. Yam vitamins and minerals also include vitamin C, calcium, and iron. Yams must be peeled and cooked before eating. Many types contain natural toxins that could make you ill.</span></span></p>', '2024-08-21', 'Gafar', 'keyword', 'why-is-yam-good-for-you', 0, 'Published', 'Music, Technology', 'meat, fish', '2024-08-22', '2024-08-21 21:54:22', 'A single yam packs a whopping 369% of your daily vitamin A requirement. Yam vitamins https://bit.ly/3WXUgsW', '37', '0', '0', '0', NULL, '2024-08-21 20:54:22', '2024-08-30 16:18:32'),
(8, 'gafar@gmail.com', 'Webhook Solutions', '652a7bfe3660f0b4fd87c29a58f9d4da', './uploaded_files/66c724cc1ed94.png', './uploaded_videos/66c724cc1f689.mp4', 'title', '<p>here</p>\r\n<blockquote>\r\n<p>here</p>\r\n</blockquote>\r\n<p><em>here</em></p>', '2024-08-29', 'Fabanatu', 'here', 'title', 0, 'Draft', 'Health', 'here', '2024-08-21', '2024-08-22 12:45:16', 'summary for me https://bit.ly/3T0nGFI', '44', '0', '0', '0', NULL, '2024-08-22 11:45:16', '2024-08-22 16:11:44'),
(9, 'john.doe@example.com', 'Tech Solutions Inc.', 'c8e2e0f7c90c6c780cd9d7c33e6c183c', './uploaded_files/66cdcc84b6a23.jpg', './uploaded_videos/66cdcc84b74b5.mp4', 'Ezekiel adodo title partner', '<p>chjuufhkfkfkfk</p>', '2024-08-12', 'Fabanatu', 'chjuufhkfkfkfk', 'ezekiel-adodo-title-partner', 0, 'Draft', 'Music, Sports', 'chjuufhkfkfkfk', '2024-08-29', '2024-08-27 13:54:28', 'summary https://bit.ly/3YZGsRo', '0', '0', '0', '0', NULL, '2024-08-27 12:54:28', '2024-08-27 12:54:28');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `dob` varchar(50) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `employee_id` varchar(50) DEFAULT NULL,
  `joining_date` varchar(50) DEFAULT NULL,
  `emergency_contact_name` varchar(255) DEFAULT NULL,
  `relationship` varchar(50) DEFAULT NULL,
  `emergency_contact_phone` varchar(20) DEFAULT NULL,
  `qualification` varchar(255) DEFAULT NULL,
  `previous_employer` varchar(255) DEFAULT NULL,
  `experience` varchar(50) DEFAULT NULL,
  `skills` varchar(255) DEFAULT NULL,
  `leave_days` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `first_name`, `last_name`, `dob`, `gender`, `email`, `phone`, `address`, `position`, `department`, `employee_id`, `joining_date`, `emergency_contact_name`, `relationship`, `emergency_contact_phone`, `qualification`, `previous_employer`, `experience`, `skills`, `leave_days`, `created_at`, `updated_at`) VALUES
(1, 'Ezekiel', 'Adodo', '2024-08-13', 'male', 'officialezekiel@gmail.com', '07033195773', '5 Oluwole Avenue', 'xxxxxx', 'xxxx', 'officialezekiel@gmail.com', '2024-08-14', 'maywa', 'father', '09090909090', '', '', '', '', '', '2024-08-03 14:01:12', '2024-08-03 14:01:12');

-- --------------------------------------------------------

--
-- Table structure for table `employee_information`
--

CREATE TABLE `employee_information` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `gender` enum('male','female','other') DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `position_title` varchar(100) DEFAULT NULL,
  `department` varchar(100) DEFAULT NULL,
  `employee_id` varchar(50) DEFAULT NULL,
  `date_of_joining` date DEFAULT NULL,
  `emergency_contact_name` varchar(100) DEFAULT NULL,
  `relationship` varchar(50) DEFAULT NULL,
  `emergency_contact_phone` varchar(20) DEFAULT NULL,
  `highest_qualification` varchar(100) DEFAULT NULL,
  `previous_employer` varchar(100) DEFAULT NULL,
  `years_of_experience` int(11) DEFAULT NULL,
  `skills` text DEFAULT NULL,
  `leave_days_granted` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

CREATE TABLE `partners` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(1000) DEFAULT NULL,
  `rawp` varchar(1000) DEFAULT NULL,
  `account_type` varchar(50) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `social_media_links` text DEFAULT NULL,
  `bio` text DEFAULT NULL,
  `intro_video` varchar(500) DEFAULT NULL,
  `intro_video_thumbnail` varchar(255) DEFAULT NULL,
  `video_thumbnail` varchar(1000) DEFAULT NULL,
  `logo` varchar(500) DEFAULT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `partner_id` varchar(255) DEFAULT NULL,
  `partner_directory` varchar(255) DEFAULT NULL,
  `subcode` varchar(255) DEFAULT NULL,
  `productname` varchar(255) DEFAULT NULL,
  `replymessage` varchar(255) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `validity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `partners`
--

INSERT INTO `partners` (`id`, `name`, `company_name`, `email`, `password`, `rawp`, `account_type`, `phone_number`, `address`, `website`, `social_media_links`, `bio`, `intro_video`, `intro_video_thumbnail`, `video_thumbnail`, `logo`, `profile_image`, `status`, `created_at`, `updated_at`, `partner_id`, `partner_directory`, `subcode`, `productname`, `replymessage`, `price`, `validity`) VALUES
(1, 'John Doe', 'Tech Solutions Inc.', 'john.doe@example.com', 'xxxxxx', NULL, 'SUPERADMIN', '+1234567890', '123 Tech Street, City', 'https://www.techsolutions.com', 'https://twitter.com/johndoe, https://linkedin.com/in/johndoe', 'Technology enthusiast and blogger.', 'uploads/The 30-Second Video (480p).mp4', 'uploads/videos/66c48316032e2_thumbnail.jpg', NULL, 'uploads/logos/66c48319d78ba.png', 'uploads/66c4831602df4.jpg', 'Active', '2024-08-07 15:44:29', '2024-08-20 16:17:29', NULL, 'tech-solutions', NULL, NULL, NULL, NULL, NULL),
(5, 'Ezekiel Adodo', 'Webhook Solutions', 'ddd@gmail.com', 'yyyy', NULL, 'ADMIN', '07033195773', '37 Ajayi Aina Street Ifako Gbagada Lagos', 'https://google.com', '', '', '', NULL, NULL, NULL, 'uploads/66b3eb2c3117a.png', 'Active', '2024-08-07 21:46:20', '2024-08-11 21:58:25', 'partner_66b3eb2c30ea9', 'webhook-solutions-1', NULL, NULL, NULL, NULL, NULL),
(6, 'Linda Iketa', 'Linda Ikeji', 'linda@gmail.com', '$2y$10$Kk6oqiy1Oy4Bvz0nAFur0OwAEy2iOSTr3AaNb5rNQE8TbGv1PqVBW', NULL, 'ADMIN', '07033195773', '37 Ajayi Aina Street Ifako Gbagada Lagos', 'https://google.go', 'ggg', 'Linda Ikeji, born on September 19, 1980, in Nkwerre, Imo State, Nigeria, is a renowned Nigerian blogger, writer, entrepreneur, and former model. She is widely recognized as one of Africa\'s most influential media entrepreneurs and a pioneer in the blogging industry in Nigeria.', '', NULL, NULL, NULL, 'uploads/66b524fd440a0.jpeg', 'Inactive', '2024-08-08 20:05:17', '2024-08-16 16:24:46', 'partner_66b524fd42de2', 'linda-ikeji', NULL, NULL, NULL, NULL, NULL),
(11, 'Ruth Francis', 'Ruze Jewels', 'ruth@gmailcom', '$2y$10$3YRZYy6L0vrIE3b7qUv8OeUukGqFN0f.ZL.S8kVuwaU360RfX4ks2', NULL, 'ADMIN', '07033195773', '37 Ajayi Aina Street Ifako Gbagada Lagos', 'https://google.com', 'ggg,ggg', '<p>Ruth is a dedicated professional with a passion for innovation and excellence, always striving to make a positive impact in every project she undertakes.</p>', 'uploads/The 30-Second Video (480p).mp4', 'uploads/videos/66c48316032e2_thumbnail.jpg', NULL, 'uploads/logos/66c48319d78ba.png', 'uploads/66c4831602df4.jpg', 'Active', '2024-08-20 11:50:49', '2024-08-20 12:13:51', 'partner_66c4831602b26', 'ruze-jewels', NULL, NULL, NULL, NULL, NULL),
(12, 'Lanre Gafari', 'Gafar Blog', 'gafar@gmail.com', '22222', NULL, 'ADMIN', '07033195773', '37 Ajayi Aina Street Ifako Gbagada Lagos', 'https://google.com', 'ggg,ggg', '<p>It is important to have a look at the basic ingredients that define quality in education. It has long been found that quality is never an accident; it has always been the result of high intentions, sincere efforts, intelligent mission statement and focused as well as skillful implementation.</p>', 'uploads/videos/66c6528f2d681.mp4', 'uploads/videos/66c6528f2d681_thumbnail.jpg', NULL, 'uploads/logos/66c65294b40c3.png', 'uploads/66c6528f2d29f.png', 'Active', '2024-08-21 20:48:20', '2024-08-29 21:01:17', 'partner_66c6528f2d169', 'gafar-blog', 'SUB001', 'Gafar Blog', NULL, 50, 7),
(13, 'Ruth Francis', 'Webhook Solutions', 'ddll@gmail.com', '$2y$10$L6m9Gh9ko0OdqXwJaAhRgO.ZuLVY3ePjXyQPviS7Eqo0Uv2wPlwhi', 'EJKWX1BS', 'SUPERADMIN', '07033195773', '37 Ajayi Aina Street Ifako Gbagada Lagos', 'https://google.com', '', NULL, 'uploads/videos/66cdc76c101ac.mp4', 'uploads/videos/66cdc76c101ac_thumbnail.jpg', NULL, 'uploads/logos/66cdc770e6f81.jpg', 'uploads/66cdc76c0f217.jpg', 'Active', '2024-08-27 12:32:48', '2024-08-27 12:32:48', 'partner_66cdc76c0eff3', 'webhook-solutions-2', 'SSS', 'Webhook Solutions', NULL, 100, 120),
(15, 'Ezekiel Adodo', 'Ruze Jewels', 'jerry@gmail.com', '$2y$10$kvmYB6SqsTaCUCloCYrnLeXkqVpCEap9TqyTRn0e2TlrD9yUNIkly', 'AQC53J5K', 'SUPERADMIN', '07033195773', '37 Ajayi Aina Street Ifako Gbagada Lagos', 'https://google.com', 'ggg,ggg', '<p>xgfhgxh</p>', 'uploads/videos/66cdca8cc3553.mp4', 'uploads/videos/66cdca8cc3553_thumbnail.jpg', NULL, 'uploads/logos/66cdca8db6c21.png', 'uploads/66cdca8cc3238.png', 'Active', '2024-08-27 12:46:05', '2024-08-27 12:46:05', 'partner_66cdca8cc300e', 'ruze-jewels-1', 'SSS', 'Ruze Jewels', NULL, 90, 120),
(16, 'Abiola', 'Abiola Kitchen', 'fff@gmail.com', '$2y$10$zGkq8ijS5V8a5UHU31M/guPGml5QNnP8nIM.ce3AmCOB0RPeV1I5a', 'XWYVLG29', 'ADMIN', '07033195773', '37 Ajayi Aina Street Ifako Gbagada Lagos', 'https://google.com', '', '<p>&nbsp;Bio</p>\r\n<p>TEST content</p>', 'uploads/videos/66d1ef7958923.mp4', 'uploads/videos/66d1ef7958923_thumbnail.jpg', NULL, 'uploads/logos/66d1ef7f92dc1.png', 'uploads/66d1ef79580d6.png', 'Active', '2024-08-30 16:12:47', '2024-08-30 16:12:47', 'partner_66d1ef7957ed9', 'abiola-kitchen', 'EAT', 'Abiola Kitchen', NULL, 100, 30);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `subcode` varchar(50) NOT NULL,
  `productname` varchar(100) NOT NULL,
  `replymessage` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `validity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `subcode`, `productname`, `replymessage`, `price`, `validity`) VALUES
(1, 'SUB001', 'Gafar Blog', 'Thank you for subscribing to the Daily Plan.', 50.00, 1),
(2, 'SUB002', 'Weekly Plan', 'Thank you for subscribing to the Weekly Plan.', 300.00, 7),
(3, 'SUB003', 'Monthly Plan', 'Thank you for subscribing to the Monthly Plan.', 1000.00, 30),
(4, 'SUB004', 'Yearly Plan', 'Thank you for subscribing to the Yearly Plan.', 10000.00, 365);

-- --------------------------------------------------------

--
-- Table structure for table `subscribe`
--

CREATE TABLE `subscribe` (
  `id` int(11) NOT NULL,
  `msisdn` varchar(15) NOT NULL,
  `subcode` varchar(50) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `start_date` int(255) DEFAULT NULL,
  `expiry_date` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subscribe`
--

INSERT INTO `subscribe` (`id`, `msisdn`, `subcode`, `status`, `start_date`, `expiry_date`, `created_at`, `updated_at`) VALUES
(2, '07033195774', 'SUB001', 1, 1724965290, 1725570090, '2024-08-29 21:01:30', '2024-08-29 21:01:30'),
(4, '07033195773', 'SUB001', 1, 1724966518, 1725571318, '2024-08-29 21:21:58', '2024-08-29 21:21:58'),
(5, '08032001343', 'SUB001', 1, 1725034495, 1725639295, '2024-08-30 16:14:55', '2024-08-30 16:14:55');

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

CREATE TABLE `subscription` (
  `id` int(11) NOT NULL,
  `msisdn` varchar(15) NOT NULL,
  `subcode` varchar(50) NOT NULL,
  `shortcode` varchar(10) DEFAULT NULL,
  `additional_field` varchar(255) DEFAULT NULL,
  `start_date` int(11) DEFAULT NULL,
  `expiry_date` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subscription`
--

INSERT INTO `subscription` (`id`, `msisdn`, `subcode`, `shortcode`, `additional_field`, `start_date`, `expiry_date`, `created_at`, `updated_at`) VALUES
(1, '07033195773', 'SUB001', '33070', 'Test', 1724625001, 1724711401, '2024-08-25 22:30:01', '2024-08-25 22:30:01'),
(2, '07033195773', 'SUB001', '33070', 'Test', 1724625531, 1724797801, '2024-08-25 22:38:51', '2024-08-25 22:38:51'),
(3, '07033195773', 'SUB001', '33070', 'Test', 1724625583, 1724884201, '2024-08-25 22:39:43', '2024-08-25 22:39:43'),
(4, '07033195773', 'SUB001', '33070', 'Test', 1724625685, 1724970601, '2024-08-25 22:41:25', '2024-08-25 22:41:25'),
(5, '07033195773', 'SUB001', '33070', 'Test', 1724625702, 1725057001, '2024-08-25 22:41:42', '2024-08-25 22:41:42'),
(6, '07033195773', 'SUB001', '33070', 'Test', 1724626591, 1725143401, '2024-08-25 22:56:31', '2024-08-25 22:56:31'),
(7, '07033195773', 'SUB001', '33070', 'Test', 1724626775, 1111197511, '2024-08-25 22:59:35', '2024-08-25 22:59:35'),
(8, '07033195773', 'SUB001', '33070', 'Test', 1724627216, 1724713616, '2024-08-25 23:06:56', '2024-08-25 23:06:56'),
(9, '07033195773', 'SUB001', '33070', 'Test', 1724877900, 1724800016, '2024-08-28 20:45:00', '2024-08-28 20:45:00'),
(10, '07033195774', 'SUB001', '33070', 'Test', 1724965290, 1725570090, '2024-08-29 21:01:30', '2024-08-29 21:01:30'),
(11, '07033195773', 'SUB001', '33070', 'Test', 1724966178, 1725570978, '2024-08-29 21:16:18', '2024-08-29 21:16:18'),
(12, '07033195773', 'SUB001', '33070', 'Test', 1724966518, 1725571318, '2024-08-29 21:21:58', '2024-08-29 21:21:58'),
(13, '08032001343', 'SUB001', '33070', 'Test', 1725034495, 1725639295, '2024-08-30 16:14:55', '2024-08-30 16:14:55');

-- --------------------------------------------------------

--
-- Table structure for table `user_logins`
--

CREATE TABLE `user_logins` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `account_type` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_logins`
--

INSERT INTO `user_logins` (`id`, `email`, `password`, `account_type`, `status`, `created_at`, `updated_at`) VALUES
(1, 'jerry@gmail.com', 'jerry', 'ADMIN', 'Active', '2024-07-24 11:44:18', '2024-07-24 11:44:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `businesses`
--
ALTER TABLE `businesses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `business_information`
--
ALTER TABLE `business_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `reference_id` (`reference_id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_information`
--
ALTER TABLE `employee_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subcode` (`subcode`);

--
-- Indexes for table `subscribe`
--
ALTER TABLE `subscribe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscription`
--
ALTER TABLE `subscription`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_logins`
--
ALTER TABLE `user_logins`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `businesses`
--
ALTER TABLE `businesses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `business_information`
--
ALTER TABLE `business_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employee_information`
--
ALTER TABLE `employee_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `partners`
--
ALTER TABLE `partners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subscribe`
--
ALTER TABLE `subscribe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subscription`
--
ALTER TABLE `subscription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user_logins`
--
ALTER TABLE `user_logins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

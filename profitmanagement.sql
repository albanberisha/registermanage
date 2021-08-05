-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2021 at 10:07 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `profitmanagement`
--

-- --------------------------------------------------------

--
-- Table structure for table `deactivation`
--

CREATE TABLE `deactivation` (
  `id` int(20) NOT NULL,
  `userid` int(20) NOT NULL,
  `reason` longtext DEFAULT NULL,
  `deacDateTime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(20) NOT NULL,
  `postId` int(20) NOT NULL,
  `path` varchar(320) DEFAULT NULL,
  `text` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `postId`, `path`, `text`) VALUES
(1, 6, 'trd1.jpg', 'asfas'),
(2, 6, 'trd1.jpg', 'asfas');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(20) NOT NULL,
  `userId` int(20) NOT NULL,
  `text` longtext DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `postDate` date NOT NULL,
  `postTime` time NOT NULL,
  `postStatus` tinyint(1) NOT NULL,
  `boldkeywords` longtext DEFAULT NULL,
  `underlinekeywords` longtext DEFAULT NULL,
  `bulletpoint` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `userId`, `text`, `description`, `postDate`, `postTime`, `postStatus`, `boldkeywords`, `underlinekeywords`, `bulletpoint`) VALUES
(6, 4, 'Currencies:', 'The USD has pulled back over the last few days, which is needed for us to continue the bullish run up. We have since hit an area of interest with the dollar, where we are anticipating the next leg up. We do need to be careful of FOMC, which is out later today. This could cause some volatility and movement across the board.\r\n\r\nGBP has been very strong as well. We have seen these pound pairs move a lot in the last week; GBP/AUD has done over 350 pips in the last 7 Days! Fundamentally, we are seeing the United Kingdom open up again as well as COVID-19 infection rates dropping. This is a positive for the GBP. However, as we have seen over the last 2 years, COVID could cause this picture to change if further outbreaks occur and lockdowns come into play again.\r\n\r\nWe do have a lot of high impact fundamentals this week, so we could see some nice moves in the market.\r\n\r\nUpcoming fundamental releases we have are:\r\nWednesday, July 28th\r\n\r\n(POINT)CAD, BoC Consumer Price Index Core (YoY)(Jun)\r\n(POINT)USD, Fed Interest Rate Decision\r\n(POINT)USD, Fed’s Monetary Policy Statement\r\n\r\nThursday, July 29th\r\n\r\n(POINT)EUR, Harmonized Index of Consumer Prices (YoY)\r\n(POINT)USD, Gross Domestic Product Annualized (Q2)\r\n\r\nFriday, July 30th\r\n\r\n(POINT)EUR, Consumer Price Index &#8211; Core (YoY) (Jul) PREL\r\n(POINT)EUR, Gross Domestic Product (QoQ) (Q2) PRE\r\n(POINT)EUR, Consumer Price Index (YoY) (Jul) PREL\r\n(POINT)EUR, Gross Domestic Product s.a. (YoY) (Q2) PREL', '2021-07-28', '14:24:00', 1, 'GBP  AUD  USD  CAD  EUR', '350  Upcoming fundamental releases we have are:  the board', '(POINT)');

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

CREATE TABLE `userlog` (
  `userId` int(20) NOT NULL,
  `email` varchar(320) NOT NULL,
  `loginDate` datetime NOT NULL,
  `loginTime` time NOT NULL,
  `status` tinyint(1) NOT NULL,
  `ipAddress` varchar(320) DEFAULT NULL,
  `continentCode` varchar(10) DEFAULT NULL,
  `continentName` varchar(320) DEFAULT NULL,
  `countryCode` varchar(10) DEFAULT NULL,
  `countryName` varchar(320) DEFAULT NULL,
  `stateProv` varchar(320) DEFAULT NULL,
  `city` varchar(320) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userlog`
--

INSERT INTO `userlog` (`userId`, `email`, `loginDate`, `loginTime`, `status`, `ipAddress`, `continentCode`, `continentName`, `countryCode`, `countryName`, `stateProv`, `city`) VALUES
(4, 'finanzefx@gmail.com', '2021-08-02 15:28:49', '15:28:49', 1, '154.28.188.222', 'EU', 'Europe', 'DE', 'Germany', 'Hesse', 'Frankfurt am Main'),
(4, 'finanzefx@gmail.com', '2021-08-02 15:32:32', '15:32:32', 1, '154.28.188.222', 'EU', 'Europe', 'DE', 'Germany', 'Hesse', 'Frankfurt am Main'),
(17, 'rocky2@gmail.com', '2021-08-03 13:38:40', '13:38:40', 1, '154.13.1.223', 'EU', 'Europe', 'DE', 'Germany', 'Berlin', 'Berlin'),
(26, 'jack1@gmail.com', '2021-08-03 14:18:54', '14:18:54', 1, '154.13.1.223', 'EU', 'Europe', 'DE', 'Germany', 'Berlin', 'Berlin'),
(26, 'jack1@gmail.com', '2021-08-03 14:20:17', '14:20:17', 1, '154.13.1.223', 'EU', 'Europe', 'DE', 'Germany', 'Berlin', 'Berlin'),
(4, 'finanzefx@gmail.com', '2021-08-03 14:27:11', '14:27:11', 1, '154.13.1.223', 'EU', 'Europe', 'DE', 'Germany', 'Berlin', 'Berlin'),
(4, 'finanzefx@gmail.com', '2021-08-03 15:03:40', '15:03:40', 1, '154.13.1.223', 'EU', 'Europe', 'DE', 'Germany', 'Berlin', 'Berlin'),
(5, 'user@gmail.com', '2021-08-03 15:06:16', '15:06:16', 1, '154.13.1.223', 'EU', 'Europe', 'DE', 'Germany', 'Berlin', 'Berlin'),
(4, 'finanzefx@gmail.com', '2021-08-03 15:08:03', '15:08:03', 1, '154.13.1.223', 'EU', 'Europe', 'DE', 'Germany', 'Berlin', 'Berlin'),
(5, 'user@gmail.com', '2021-08-03 15:15:28', '15:15:28', 1, '154.13.1.223', 'EU', 'Europe', 'DE', 'Germany', 'Berlin', 'Berlin'),
(4, 'finanzefx@gmail.com', '2021-08-03 15:36:32', '15:36:32', 1, '154.13.1.223', 'EU', 'Europe', 'DE', 'Germany', 'Berlin', 'Berlin'),
(5, 'user@gmail.com', '2021-08-03 15:36:52', '15:36:52', 1, '154.13.1.223', 'EU', 'Europe', 'DE', 'Germany', 'Berlin', 'Berlin'),
(4, 'finanzefx@gmail.com', '2021-08-03 15:52:34', '15:52:34', 1, '154.13.1.223', 'EU', 'Europe', 'DE', 'Germany', 'Berlin', 'Berlin'),
(4, 'finanzefx@gmail.com', '2021-08-04 10:32:24', '10:32:24', 1, '154.28.188.237', 'EU', 'Europe', 'DE', 'Germany', 'Hesse', 'Frankfurt am Main'),
(19, 'ricky@gmail.com', '2021-08-04 11:05:22', '11:05:22', 0, '154.28.188.237', 'EU', 'Europe', 'DE', 'Germany', 'Hesse', 'Frankfurt am Main'),
(19, 'ricky@gmail.com', '2021-08-04 11:05:38', '11:05:38', 0, '154.28.188.237', 'EU', 'Europe', 'DE', 'Germany', 'Hesse', 'Frankfurt am Main'),
(19, 'ricky@gmail.com', '2021-08-04 11:05:43', '11:05:43', 1, '154.28.188.237', 'EU', 'Europe', 'DE', 'Germany', 'Hesse', 'Frankfurt am Main'),
(30, 'campaign234@gmail.com', '2021-08-04 11:07:18', '11:07:18', 1, '154.28.188.237', 'EU', 'Europe', 'DE', 'Germany', 'Hesse', 'Frankfurt am Main'),
(4, 'finanzefx@gmail.com', '2021-08-04 11:07:28', '11:07:28', 1, '154.28.188.237', 'EU', 'Europe', 'DE', 'Germany', 'Hesse', 'Frankfurt am Main'),
(4, 'finanzefx@gmail.com', '2021-08-04 13:25:12', '13:25:12', 1, '154.28.188.237', 'EU', 'Europe', 'DE', 'Germany', 'Hesse', 'Frankfurt am Main'),
(4, 'finanzefx@gmail.com', '2021-08-04 13:40:55', '13:40:55', 1, '154.28.188.237', 'EU', 'Europe', 'DE', 'Germany', 'Hesse', 'Frankfurt am Main'),
(5, 'user@gmail.com', '2021-08-04 13:41:05', '13:41:05', 0, '185.191.166.126', 'EU', 'Europe', 'XK', 'Kosovo', 'Pristina', 'Pristina'),
(5, 'user@gmail.com', '2021-08-04 13:41:07', '13:41:07', 1, '185.191.166.126', 'EU', 'Europe', 'XK', 'Kosovo', 'Pristina', 'Pristina'),
(8, 'jon@gmail.com', '2021-08-04 14:00:05', '14:00:05', 0, '154.28.188.237', 'EU', 'Europe', 'DE', 'Germany', 'Hesse', 'Frankfurt am Main'),
(8, 'jon@gmail.com', '2021-08-04 14:00:07', '14:00:07', 0, '154.28.188.237', 'EU', 'Europe', 'DE', 'Germany', 'Hesse', 'Frankfurt am Main'),
(8, 'jon@gmail.com', '2021-08-04 14:00:10', '14:00:10', 0, '154.28.188.237', 'EU', 'Europe', 'DE', 'Germany', 'Hesse', 'Frankfurt am Main'),
(8, 'jon@gmail.com', '2021-08-04 14:00:22', '14:00:22', 0, '154.28.188.237', 'EU', 'Europe', 'DE', 'Germany', 'Hesse', 'Frankfurt am Main'),
(8, 'jon@gmail.com', '2021-08-04 14:00:27', '14:00:27', 1, '154.28.188.237', 'EU', 'Europe', 'DE', 'Germany', 'Hesse', 'Frankfurt am Main'),
(4, 'finanzefx@gmail.com', '2021-08-04 14:01:12', '14:01:12', 1, '154.28.188.237', 'EU', 'Europe', 'DE', 'Germany', 'Hesse', 'Frankfurt am Main'),
(11, 'kendy@gmail.com', '2021-08-04 14:02:49', '14:02:49', 1, '154.28.188.237', 'EU', 'Europe', 'DE', 'Germany', 'Hesse', 'Frankfurt am Main'),
(4, 'finanzefx@gmail.com', '2021-08-04 14:02:56', '14:02:56', 1, '154.28.188.237', 'EU', 'Europe', 'DE', 'Germany', 'Hesse', 'Frankfurt am Main'),
(5, 'user@gmail.com', '2021-08-04 14:06:03', '14:06:03', 1, '154.28.188.237', 'EU', 'Europe', 'DE', 'Germany', 'Hesse', 'Frankfurt am Main'),
(4, 'finanzefx@gmail.com', '2021-08-04 14:06:10', '14:06:10', 1, '154.28.188.237', 'EU', 'Europe', 'DE', 'Germany', 'Hesse', 'Frankfurt am Main'),
(11, 'kendy@gmail.com', '2021-08-04 14:06:30', '14:06:30', 1, '154.28.188.237', 'EU', 'Europe', 'DE', 'Germany', 'Hesse', 'Frankfurt am Main'),
(11, 'kendy@gmail.com', '2021-08-04 14:08:49', '14:08:49', 1, '154.28.188.237', 'EU', 'Europe', 'DE', 'Germany', 'Hesse', 'Frankfurt am Main'),
(4, 'finanzefx@gmail.com', '2021-08-04 14:08:58', '14:08:58', 1, '154.28.188.237', 'EU', 'Europe', 'DE', 'Germany', 'Hesse', 'Frankfurt am Main'),
(5, 'user@gmail.com', '2021-08-04 14:47:39', '14:47:39', 1, '154.28.188.237', 'EU', 'Europe', 'DE', 'Germany', 'Hesse', 'Frankfurt am Main'),
(4, 'finanzefx@gmail.com', '2021-08-04 15:04:12', '15:04:12', 1, '154.28.188.237', 'EU', 'Europe', 'DE', 'Germany', 'Hesse', 'Frankfurt am Main'),
(4, 'finanzefx@gmail.com', '2021-08-04 15:42:25', '15:42:25', 1, '154.28.188.237', 'EU', 'Europe', 'DE', 'Germany', 'Hesse', 'Frankfurt am Main');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(20) NOT NULL,
  `fname` varchar(200) NOT NULL,
  `lname` varchar(200) NOT NULL,
  `email` varchar(320) NOT NULL,
  `password` varchar(120) NOT NULL,
  `countrykey` varchar(320) NOT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `gender` char(1) DEFAULT NULL,
  `acctype` varchar(20) DEFAULT NULL,
  `regdate` datetime DEFAULT NULL,
  `ipAddress` varchar(320) DEFAULT NULL,
  `continentCode` varchar(10) DEFAULT NULL,
  `continentName` varchar(320) DEFAULT NULL,
  `countryCode` varchar(10) DEFAULT NULL,
  `countryName` varchar(320) DEFAULT NULL,
  `stateProv` varchar(320) DEFAULT NULL,
  `city` varchar(320) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `privilege` char(1) DEFAULT NULL,
  `lastupdated` datetime DEFAULT NULL,
  `photo` varchar(320) DEFAULT NULL,
  `coverphoto` varchar(320) DEFAULT NULL,
  `profit` decimal(10,2) DEFAULT NULL,
  `employeeCode` varchar(320) DEFAULT NULL,
  `myemployeeCode` varchar(320) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `password`, `countrykey`, `phone`, `gender`, `acctype`, `regdate`, `ipAddress`, `continentCode`, `continentName`, `countryCode`, `countryName`, `stateProv`, `city`, `status`, `privilege`, `lastupdated`, `photo`, `coverphoto`, `profit`, `employeeCode`, `myemployeeCode`) VALUES
(4, 'Finanzefx', '', 'finanzefx@gmail.com', '$2y$10$eOIYALzANJt936pWHrUpkOo3Bi.AkNY25qx9CEr91W9kg06G/N9f2', 'Tajikistan', '1235 76598', 'm', 'Business', '2021-07-27 15:38:43', '185', 'EU', 'Europe', 'XK', 'Kosovo', 'Pristina', 'Pristina', 1, '2', '2021-07-29 14:01:32', 'imgprof2021-07-30l3.png', NULL, NULL, NULL, NULL),
(5, 'User', 'User', 'user@gmail.com', '$2y$10$rWYJ0MJOpapo49yzFeLQ2O.t9xfPxi2MMBTp5Tb1ejiKt6cERYIA.', 'Andorra', '256 9862', 'm', 'Business Plus', '2021-07-27 15:40:00', '185', 'EU', 'Europe', 'XK', 'Kosovo', 'Pristina', 'Pristina', 1, '3', '2021-07-31 15:52:37', 'imgprof2021-07-30pexels-simon-robben-614810.jpg', NULL, '125.00', NULL, 'FINFX3LO5'),
(8, 'Jon', 'Olsson', 'jon@gmail.com', '$2y$10$Pyon/bxOvKNlksDfYyI4QeGVYi4vpQomgOYbvEDX8NsFlgid9vQAi', 'United States', '645 6452', 'm', 'Normal User', '2021-07-30 13:12:37', '185', 'EU', 'Europe', 'XK', 'Kosovo', 'Pristina', 'Pristina', 1, '3', '2021-07-30 14:03:47', 'imgprof2021-07-30tobey-maguire-face-blue-eyes.jpg', NULL, NULL, NULL, 'FINFX3LO8'),
(9, 'Made', 'Olsson', 'made@gmail.com', '$2y$10$1/.qYQBb9YBmSnecd7fMy..p5kRE3DwNVdKGpav4bgOay97wY7yym', 'Barbados', '1123123 213123', 'f', 'STANDARD', '2021-07-30 13:19:42', '185', 'EU', 'Europe', 'XK', 'Kosovo', 'Pristina', 'Pristina', 1, '3', NULL, NULL, NULL, '120.00', NULL, 'FINFX3LO9'),
(10, 'Lena', 'Scot', 'lena@gmail.com', '$2y$10$SCqe5wfUw5rhQV6ATp8jiuiCdZLDP6pNBWuKXkI5svzV/DklCWwwG', 'Solomon Islands', '421 124124', 'f', 'Professional', '2021-07-30 13:33:13', '185', 'EU', 'Europe', 'XK', 'Kosovo', 'Pristina', 'Pristina', 1, '3', NULL, NULL, NULL, NULL, NULL, 'FINFX3LO10'),
(11, 'Kendy', 'Shady', 'kendy@gmail.com', '$2y$10$mHlgIZn37lXsoMXbCVKThuu71dk1bWmpMDEZJtbszGk00lRzG3Vl2', 'Belize', '2312 12312', 'm', 'Business', '2021-07-30 13:34:05', '185', 'EU', 'Europe', 'XK', 'Kosovo', 'Pristina', 'Pristina', 1, '3', '2021-08-04 14:06:39', NULL, NULL, NULL, NULL, 'FINFX3LO11'),
(12, 'Bride', 'Mac', 'bride@gmail.com', '$2y$10$uvVjX.WtOLQuIwauoL1xDeMOe7sfCaKn72wV3jhsCMidFyy.Jls6i', 'Barbados', '213 123', 'm', 'Business Plus', '2021-07-30 13:34:38', '185', 'EU', 'Europe', 'XK', 'Kosovo', 'Pristina', 'Pristina', 3, '3', NULL, NULL, NULL, NULL, NULL, 'FINFX3LO12'),
(13, 'Rocky', 'Bradly', 'rocky@gmail.com', '$2y$10$Q1ACpPQiZ6MRRA824JihWeA8Ty6Ja56q8EmOpu5fVStUWqKkBEKWS', 'Belgium', '43324 3242', 'm', 'STANDARD', '2021-07-31 13:47:36', '154', 'EU', 'Europe', 'DE', 'Germany', 'Hesse', 'Frankfurt am Main', 1, '3', NULL, NULL, NULL, NULL, NULL, 'FINFX3LO13'),
(15, 'Phil', 'Jones', 'phil@gmail.com', '$2y$10$8vIrViNbTJYz.g8kUCyww.hoexWIC/reDuFVABnUUcAAX.TjHbIQi', 'Belarus', '12312 123123', 'm', 'Business Plus', '2021-07-31 13:50:37', '154.28.188.217', 'EU', 'Europe', 'DE', 'Germany', 'Hesse', 'Frankfurt am Main', 1, '3', NULL, NULL, NULL, NULL, NULL, 'FINFX3LO15'),
(16, 'Travis', 'Scot', 'travis@gmail.com', '$2y$10$txOVk4xdoMLXv0y7ky494eh0X9uGmakZV2CQotFi6HDJSiD79ivRy', 'American Samoa', '213 123123', 'm', 'Business Plus', '2021-07-31 14:19:07', 'undefined', 'undefined', 'undefined', 'undefined', 'undefined', 'undefined', 'undefined', 1, '3', '2021-07-31 15:26:15', NULL, NULL, '415.00', 'FINFX3LO19', 'FINFX3LO16'),
(17, 'Rocky', 'Adkins', 'rocky2@gmail.com', '$2y$10$u.81xmFO0GJAmWqifl92CeDzB4oNwFFxH77E4A..toneMABjvmQW6', 'Belgium', '3124 124124', 'm', 'Normal User', '2021-08-03 13:38:19', '154.13.1.223', 'EU', 'Europe', 'DE', 'Germany', 'Berlin', 'Berlin', 1, '3', NULL, NULL, NULL, NULL, 'FINFX3LO19', 'FINFX3LO17'),
(19, 'Ricky', 'Jon', 'ricky@gmail.com', '$2y$10$YG.3KMfPqLq5DDbuvABp5u4nqqLHxO1KguSgWuNwQXLFRCL9cbrd6', 'Belize', '124124 1244', 'm', 'Professional', '2021-08-03 13:50:29', '154.13.1.223', 'EU', 'Europe', 'DE', 'Germany', 'Berlin', 'Berlin', 1, '3', '2021-08-04 11:06:17', NULL, NULL, NULL, NULL, 'FINFX3LO19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `deactivation`
--
ALTER TABLE `deactivation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
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
-- AUTO_INCREMENT for table `deactivation`
--
ALTER TABLE `deactivation`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

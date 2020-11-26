-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2020 at 07:40 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `flywithus`
--

-- --------------------------------------------------------

--
-- Table structure for table `admintbl`
--

CREATE TABLE `admintbl` (
  `id` int(11) NOT NULL,
  `adminID` varchar(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admintbl`
--

INSERT INTO `admintbl` (`id`, `adminID`, `username`, `password`) VALUES
(1, '0001', 'admin', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `answertbl`
--

CREATE TABLE `answertbl` (
  `answerID` int(11) NOT NULL,
  `answer` varchar(500) NOT NULL,
  `questionID` int(11) NOT NULL,
  `tripPoints` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `answertbl`
--

INSERT INTO `answertbl` (`answerID`, `answer`, `questionID`, `tripPoints`) VALUES
(1, 'Adventurous', 1, 0),
(2, 'Party Animal', 1, 0.00083),
(3, 'Nature Lover', 1, 0.00056),
(4, 'Shopaholic', 1, 0.001245),
(5, 'Tropical', 2, 40),
(6, 'Spring', 2, 80),
(7, 'Summer', 2, 120),
(8, 'Autumn', 2, 180),
(9, 'Winter', 2, 250),
(10, 'Less than $100', 3, 1),
(11, '$100 - $200', 3, 2),
(12, '$201 - $400', 3, 3),
(13, 'More than $400', 3, 4),
(14, 'N/A', 3, 0),
(15, 'South East Asia', 4, 1),
(16, 'Asia', 4, 1),
(17, 'Europe', 4, 1),
(18, 'Australia/New Zealand', 4, 1),
(19, 'North America', 4, 1),
(20, 'South America', 4, 1),
(21, 'Africa', 4, 1),
(22, 'Middle East', 4, 1),
(23, 'Yes', 5, 1),
(24, 'No', 5, 0),
(25, 'Less than 10 minutes', 6, 1),
(26, '10 - 19 Minutes', 6, 2),
(27, '20 - 29 Minutes', 6, 3),
(28, '30 - 40 Minutes', 6, 4),
(29, 'More than 40 Minutes', 6, 5),
(30, 'Yes', 7, 1),
(31, 'No', 7, 2),
(32, 'Sometimes', 7, 3),
(33, 'Hang it out to dry', 8, 1),
(34, 'Electric Dryer', 8, 2),
(35, 'Both', 8, 3),
(36, 'Yes', 9, 2),
(37, 'No', 9, 0),
(38, 'Sometimes', 9, 1),
(42, 'Eating', 11, 1),
(43, 'Sightseeing', 11, 2),
(44, 'Cultural Experience', 11, 3),
(45, 'Nightlife', 11, 4),
(46, 'Shopping', 11, 5),
(51, '0 - 2', 13, 1),
(52, '3 - 4', 13, 2),
(53, '5 - 9', 13, 3),
(54, '10 or more', 13, 4),
(55, 'Yes', 14, 1),
(56, 'No', 14, 2),
(57, 'Sometimes', 14, 3),
(58, 'Local', 16, 1),
(59, 'South East Asia', 16, 2),
(60, 'Asia', 16, 3),
(61, 'Australia/New Zealand', 16, 4),
(62, 'America & Europe', 16, 5),
(63, '0%', 15, 0),
(64, '10%', 15, 1),
(65, '20%', 15, 2),
(66, '30%', 15, 3),
(67, '40%', 15, 4),
(68, '50%', 15, 5),
(69, 'Yes', 17, 1),
(70, 'No', 17, 2),
(71, 'Sometimes', 17, 3),
(72, 'Below $100', 18, 0.152),
(73, '$100 to $199', 18, 0.282),
(74, '$200 to $299', 18, 0.47),
(75, '$300 to $399', 18, 0.657),
(76, '$400 to $499', 18, 0.845),
(77, '$500 to $600', 18, 1.032),
(78, 'More than $600', 18, 1.22),
(79, 'Below $50', 19, 1),
(80, '$50 to $99', 19, 2),
(81, '$100 to $149', 19, 3),
(82, '$150 to $200', 19, 4),
(83, 'More than $200', 19, 5),
(84, 'N/A', 20, 0),
(85, 'Below $50', 20, 20),
(86, '$50 to $99', 20, 40),
(87, '$100 to $149', 20, 60),
(88, '$150 to $200', 20, 80),
(89, '< 19', 21, 1),
(90, '19 - 25', 21, 2),
(91, '26 - 35', 21, 3),
(92, '36 - 50', 21, 4),
(93, 'Friends', 22, 1),
(94, '', 23, 1),
(95, 'More than $200', 20, 100),
(96, '>50', 21, 4),
(97, 'Single', 24, 1),
(98, 'In a relationship', 24, 1),
(99, 'Married', 24, 0),
(101, 'Answer 1', 25, 0),
(102, 'Answer 2', 25, 0),
(103, 'Answer 3', 25, 0),
(104, 'Culturally Curious', 1, 0.001245),
(106, 'Romantic', 1, 0),
(107, 'Family', 22, 1),
(108, 'Partner', 22, 1),
(109, 'Solo', 22, 1),
(110, 'Answer 1', 26, 1),
(111, 'Answer 2', 26, 1),
(112, 'Answer 3', 26, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categorytbl`
--

CREATE TABLE `categorytbl` (
  `categoryID` int(11) NOT NULL,
  `categoryName` varchar(100) NOT NULL,
  `colorScheme` varchar(15) NOT NULL,
  `disabled` varchar(3) DEFAULT NULL,
  `common` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='							';

--
-- Dumping data for table `categorytbl`
--

INSERT INTO `categorytbl` (`categoryID`, `categoryName`, `colorScheme`, `disabled`, `common`) VALUES
(1, 'Travel', '#FFFFFF', 'no', 'no'),
(2, 'Accommodation', '#FFFFFF', 'no', 'no'),
(3, 'Eat', '#FFFFFF', 'no', 'no'),
(4, 'Misc.', '#FFFFFF', 'no', 'no'),
(5, 'Common', '#FFFFFF', 'no', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `dropdownchoicetbl`
--

CREATE TABLE `dropdownchoicetbl` (
  `id` int(11) NOT NULL,
  `dropdownchoice` varchar(45) NOT NULL,
  `dropdownchoicevalue` double NOT NULL,
  `answerID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dropdownchoicetbl`
--

INSERT INTO `dropdownchoicetbl` (`id`, `dropdownchoice`, `dropdownchoicevalue`, `answerID`) VALUES
(1, '0', 0, 15),
(2, '1', 0.08403, 15),
(3, '2', 0.16806, 15),
(4, '3', 0.25209, 15),
(5, '4', 0.33612, 15),
(6, '5', 0.42015, 15),
(7, '0', 0, 16),
(8, '1', 0.63239, 16),
(9, '2', 1.26478, 16),
(10, '3', 1.89717, 16),
(11, '4', 2.52956, 16),
(12, '5', 3.16195, 16),
(13, '0', 0, 17),
(14, '1', 1.50943, 17),
(15, '2', 3.01886, 17),
(16, '3', 4.52829, 17),
(17, '4', 6.03772, 17),
(18, '5', 7.54715, 17),
(19, '0', 0, 18),
(20, '1', 0.88664, 18),
(21, '2', 1.77328, 18),
(22, '3', 2.65992, 18),
(23, '4', 3.54656, 18),
(24, '5', 4.4332, 18),
(25, '0', 0, 19),
(26, '1', 2.13347, 19),
(27, '2', 4.26694, 19),
(28, '3', 6.40041, 19),
(29, '4', 8.53388, 19),
(30, '5', 10.66735, 19),
(31, '0', 0, 20),
(32, '1', 2.29902, 20),
(33, '2', 4.59804, 20),
(34, '3', 6.89706, 20),
(35, '4', 9.19608, 20),
(36, '5', 11.4951, 20),
(37, '0', 0, 21),
(38, '1', 1.23374, 21),
(39, '2', 2.46748, 21),
(40, '3', 3.70122, 21),
(41, '4', 4.93496, 21),
(42, '5', 6.1687, 21),
(43, '0', 0, 22),
(44, '1', 0.92479, 22),
(45, '2', 1.84958, 22),
(46, '3', 2.77437, 22),
(47, '4', 3.69916, 22),
(48, '5', 6.42395, 22),
(49, '1', 1, 93),
(50, '2', 2, 93),
(51, '3', 3, 93),
(52, '4', 4, 93),
(53, '5', 5, 93),
(54, '6', 6, 93),
(55, '7', 7, 93),
(56, '8', 8, 93),
(57, '9', 9, 93),
(58, '10', 10, 93),
(60, '1', 1, 94),
(61, '2', 2, 94),
(62, '3', 3, 94),
(63, '4', 4, 94),
(64, '5', 5, 94),
(65, '6', 6, 94),
(66, '7', 7, 94);

-- --------------------------------------------------------

--
-- Table structure for table `formulaetbl`
--

CREATE TABLE `formulaetbl` (
  `id` int(11) NOT NULL,
  `formulaeName` varchar(45) DEFAULT NULL,
  `formulae` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `formulaetbl`
--

INSERT INTO `formulaetbl` (`id`, `formulaeName`, `formulae`) VALUES
(1, 'EC', '(($_SESSION[\'Use02\'] * 12) / $_SESSION[\'ddCommon02[1]\'] ) + 0.6'),
(2, 'EV', '$_SESSION[\'Use03\']'),
(3, 'FC', '$_SESSION[\'Eat01\'] * 1.5'),
(4, 'TC', '($_SESSION[\'Travel02\'] / 10) * $_SESSION[\'Travel01\'] * 4'),
(5, 'FV', '$_SESSION[\'Eat01\']'),
(6, 'TV', '($_SESSION[\'Travel02\'])'),
(7, 'TrC', '$_SESSION[\'ddTravel04[1]\'] + $_SESSION[\'ddTravel04[2]\'] + $_SESSION[\'ddTravel04[3]\'] + $_SESSION[\'ddTravel04[4]\'] +\n$_SESSION[\'ddTravel04[5]\'] + \n$_SESSION[\'ddTravel04[6]\'] +\n$_SESSION[\'ddTravel04[7]\'] +\n$_SESSION[\'ddTravel04[8]\']'),
(8, 'TrV', '$_SESSION[\'ddTravel04[1]\'] + $_SESSION[\'ddTravel04[2]\'] + $_SESSION[\'ddTravel04[3]\'] + $_SESSION[\'ddTravel04[4]\'] +\n$_SESSION[\'ddTravel04[5]\'] + \n$_SESSION[\'ddTravel04[6]\'] +\n$_SESSION[\'ddTravel04[7]\'] +\n$_SESSION[\'ddTravel04[8]\']');

-- --------------------------------------------------------

--
-- Table structure for table `questiontbl`
--

CREATE TABLE `questiontbl` (
  `questionID` int(11) NOT NULL,
  `question` varchar(500) NOT NULL,
  `categoryID` int(11) NOT NULL,
  `inputType` varchar(1) DEFAULT 'r',
  `isDriver` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `questiontbl`
--

INSERT INTO `questiontbl` (`questionID`, `question`, `categoryID`, `inputType`, `isDriver`) VALUES
(1, 'What best describes yourself/group?', 1, 'r', ''),
(2, 'Which season would you like to experience?', 1, 'r', ''),
(3, 'My estimated budget is:', 1, 'r', ''),
(4, 'Have you flown overseas in the past year?', 1, 'd', ''),
(5, 'Do you have accommodation already booked?', 2, 'r', ''),
(7, 'Do you use the water heater when you shower?', 2, 'r', ''),
(8, 'How will you dry the laundry?', 2, 'r', ''),
(11, 'Which of these activities would you like to experience?', 2, 'c', ''),
(21, 'What is your age?', 5, 'r', ''),
(22, 'Who are you travelling with?', 5, 'r', ''),
(23, 'How many days is your trip?', 5, 'd', ''),
(24, 'Relationship Status?', 5, 'r', ''),
(25, 'Sample question about eating:', 3, 'r', ''),
(26, 'Sample misc. question:', 4, 'r', '');

-- --------------------------------------------------------

--
-- Table structure for table `resultstbl`
--

CREATE TABLE `resultstbl` (
  `id` int(11) NOT NULL,
  `eleV` varchar(100) NOT NULL,
  `eleC` varchar(100) NOT NULL,
  `fnLifeV` varchar(100) NOT NULL,
  `fnLifeC` varchar(100) NOT NULL,
  `tptV` varchar(100) NOT NULL,
  `tptC` varchar(100) NOT NULL,
  `traV` varchar(100) NOT NULL,
  `traC` varchar(100) NOT NULL,
  `totalC` varchar(100) NOT NULL,
  `totalEarth` varchar(100) NOT NULL,
  `userID` int(11) NOT NULL,
  `submissionTime` datetime NOT NULL,
  `refAware` varchar(100) DEFAULT NULL,
  `refFeed` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tipstbl`
--

CREATE TABLE `tipstbl` (
  `id` int(11) NOT NULL,
  `tips` varchar(5000) NOT NULL,
  `categoryID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tipstbl`
--

INSERT INTO `tipstbl` (`id`, `tips`, `categoryID`) VALUES
(1, 'Don&#39;t wait till the last minute to book your rooms! Prices normally rise closer to the date of booking.', 2),
(2, 'Travelling by bicycle or walking is healthy!', 1),
(3, 'Sample tip goes here!', 3),
(4, 'Hang on tight, we are planning the best trip for you!', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admintbl`
--
ALTER TABLE `admintbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `answertbl`
--
ALTER TABLE `answertbl`
  ADD PRIMARY KEY (`answerID`),
  ADD KEY `questiontbl_idx` (`questionID`);

--
-- Indexes for table `categorytbl`
--
ALTER TABLE `categorytbl`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indexes for table `dropdownchoicetbl`
--
ALTER TABLE `dropdownchoicetbl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `answerID_idx` (`answerID`);

--
-- Indexes for table `formulaetbl`
--
ALTER TABLE `formulaetbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questiontbl`
--
ALTER TABLE `questiontbl`
  ADD PRIMARY KEY (`questionID`),
  ADD KEY `categoryID_idx` (`categoryID`);

--
-- Indexes for table `resultstbl`
--
ALTER TABLE `resultstbl`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `userID_UNIQUE` (`userID`),
  ADD KEY `answer_idx` (`eleV`);

--
-- Indexes for table `tipstbl`
--
ALTER TABLE `tipstbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admintbl`
--
ALTER TABLE `admintbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `answertbl`
--
ALTER TABLE `answertbl`
  MODIFY `answerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `categorytbl`
--
ALTER TABLE `categorytbl`
  MODIFY `categoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `dropdownchoicetbl`
--
ALTER TABLE `dropdownchoicetbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `formulaetbl`
--
ALTER TABLE `formulaetbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `questiontbl`
--
ALTER TABLE `questiontbl`
  MODIFY `questionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `resultstbl`
--
ALTER TABLE `resultstbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4359;

--
-- AUTO_INCREMENT for table `tipstbl`
--
ALTER TABLE `tipstbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

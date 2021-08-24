-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 24, 2021 at 03:07 PM
-- Server version: 10.5.11-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ictctz_awards2021`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `phone`, `email`, `password`) VALUES
(1, 'admin', '0626808168', 'admin@ictc.tz', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `awards`
--

CREATE TABLE `awards` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `awards`
--

INSERT INTO `awards` (`id`, `name`) VALUES
(1, 'PREMIER AWARDS');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `sectorFK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `sectorFK`) VALUES
(1, 'Best ICT Incubation hub', 1),
(2, 'Best ICT Startup', 1),
(3, 'Best Innovative ICT Student (Female)', 1),
(4, 'Best Innovative ICT Student (Male)', 1),
(5, 'Best Mobile Network Operator', 2),
(6, 'Best Company Providing Services on IT', 3),
(7, 'Best Company In Software\r\nDevelopment', 4),
(8, 'Best ICT Transformative Training\r\nInstitution', 5),
(9, 'Best ICT Transformative Institution\r\nIn Provision Of Health Services', 6),
(10, 'BEST ICT INSTITUTION PROVIDING\r\nSERVICES IN FINANCIAL SECTOR', 7),
(11, 'BEST FINANCIAL TECHNOLOGY COMPANY', 13),
(12, 'Best Female ICT researcher', 8),
(13, 'Best Male ICT researcher', 8),
(14, 'Best Company In Digital Insurance\r\nServices', 9),
(15, 'Best LGA In Using ICT Applications', 10),
(16, 'Best ICT Solution In Agriculture', 11);

-- --------------------------------------------------------

--
-- Table structure for table `sector`
--

CREATE TABLE `sector` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `awardsFK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sector`
--

INSERT INTO `sector` (`id`, `name`, `awardsFK`) VALUES
(1, 'BEST ICT INNOVATION AWARDS', 1),
(2, 'BEST MOBILE NETWORK OPERATOR', 1),
(3, 'BEST COMPANY PROVIDING SERVICES\nON IT', 1),
(4, 'BEST COMPANY IN SOFTWARE\nDEVELOPMENT', 1),
(5, 'BEST ICT TRANSFORMATIVE TRAINING\nINSTITUTION', 1),
(6, 'BEST ICT TRANSFORMATIVE INSTITUTION\nIN PROVISION OF HEALTH SERVICES', 1),
(7, 'BEST ICT INSTITUTION PROVIDING\nSERVICES IN FINANCIAL SECTOR', 1),
(8, 'BEST ICT RESEARCHER AWARDS', 1),
(9, 'BEST COMPANY IN DIGITAL INSURANCE\nSERVICES', 1),
(10, 'BEST LGA IN USING ICT APPLICATIONS', 1),
(11, 'BEST ICT SOLUTION IN AGRICULTURE', 1),
(13, 'BEST FINANCIAL TECHNOLOGY COMPANY AWARD', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tmp`
--

CREATE TABLE `tmp` (
  `codes` varchar(6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tmp`
--

INSERT INTO `tmp` (`codes`) VALUES
('435918'),
('396349'),
('996108'),
('517364'),
('958727'),
('465353'),
('885149'),
('850624'),
('973756'),
('352319'),
('383088'),
('176115'),
('788209'),
('988059'),
('742540'),
('299247');

-- --------------------------------------------------------

--
-- Table structure for table `tmp2`
--

CREATE TABLE `tmp2` (
  `codes` varchar(6) NOT NULL,
  `email` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tmp2`
--

INSERT INTO `tmp2` (`codes`, `email`) VALUES
('548629', 'mayenganicholaus66@gmail.com'),
('390310', 'mayenganicholaus66@gmail.com'),
('478889', 'mayenganicholaus66@gmail.com'),
('530996', 'mayenganicholaus66@gmail.com'),
('559484', 'mayenganicholaus66@gmail.com'),
('597488', 'mayenganicholaus66@gmail.com'),
('771526', 'mayenganicholaus66@gmail.com'),
('288201', 'mayenganicholaus66@gmail.com'),
('661139', 'mayenganicholaus66@gmail.com'),
('698166', 'mayenganicholaus66@gmail.com'),
('286508', 'mayenganicholaus66@gmail.com'),
('813609', 'mayenganicholaus66@gmail.com'),
('197389', 'mayenganicholaus66@gmail.com'),
('714311', 'mayenganicholaus66@gmail.com'),
('382479', 'mayenganicholaus66@gmail.com'),
('364861', 'farajaneema5896@gmail.com'),
('321790', 'farajaneema5896@gmail.com'),
('817134', 'farajaneema5896@gmail.com'),
('823717', 'farajaneema5896@gmail.com'),
('979510', 'farajaneema5896@gmail.com'),
('746506', 'mayenganicholaus66@gmail.com'),
('690462', 'farajaneema5896@gmail.com'),
('981232', 'farajaneema5896@gmail.com'),
('422564', 'mayenganicholaus66@gmail.com'),
('578006', 'farajaneema5896@gmail.com'),
('760136', 'mayenganicholaus66@gmail.com'),
('268937', 'mayenganicholaus66@gmail.com'),
('910266', 'mayenganicholaus66@gmail.com'),
('542518', 'farajaneema5896@gmail.com'),
('163243', 'mayenganicholaus66@gmail.com'),
('401101', 'mayenganicholaus66@gmail.com'),
('786174', 'mayenganicholaus66@gmail.com'),
('117805', 'mwelasj@gmail.com'),
('947980', 'mayenganicholaus66@gmail.com'),
('487885', 'farajaneema5896@gmail.com'),
('708692', 'mayenganicholaus66@gmail.com'),
('839590', 'mayenganicholaus66@gmail.com'),
('752726', 'mayenganicholaus66@gmail.com'),
('923630', 'mwelasj@gmail.com'),
('701157', 'mwelasj@gmail.com'),
('515968', 'mayenganicholaus66@gmail.com'),
('523419', 'mayenganicholaus66@gmail.com'),
('613610', 'mayenganicholaus66@gmail.com'),
('830767', 'farajaneema5896@gmail.com'),
('490619', 'farajaneema5896@gmail.com'),
('815688', 'farajaneema5896@gmail.com'),
('648155', 'mayenganicholaus66@gmail.com'),
('386037', 'mayenganicholaus66@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `wapendekeza`
--

CREATE TABLE `wapendekeza` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `email` varchar(100) NOT NULL,
  `code` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wapendekeza`
--

INSERT INTO `wapendekeza` (`id`, `name`, `email`, `code`) VALUES
(66, 'Mayenga', 'mayenganicholaus66@gmail.com', '308819');

-- --------------------------------------------------------

--
-- Table structure for table `wapendekezanawapendekezwa`
--

CREATE TABLE `wapendekezanawapendekezwa` (
  `id` int(11) NOT NULL,
  `categoriesFK` int(11) NOT NULL,
  `pendekezaID` int(11) NOT NULL,
  `pendekezwaID` int(11) NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wapendekezanawapendekezwa`
--

INSERT INTO `wapendekezanawapendekezwa` (`id`, `categoriesFK`, `pendekezaID`, `pendekezwaID`, `status`) VALUES
(494, 1, 66, 137, 'not confirmed'),
(496, 3, 66, 138, 'not confirmed'),
(497, 4, 66, 139, 'not confirmed');

-- --------------------------------------------------------

--
-- Table structure for table `wapendekezwa`
--

CREATE TABLE `wapendekezwa` (
  `id` int(11) NOT NULL,
  `companyName` varchar(300) NOT NULL,
  `companyAddress` varchar(100) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `reason` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wapendekezwa`
--

INSERT INTO `wapendekezwa` (`id`, `companyName`, `companyAddress`, `contact`, `reason`) VALUES
(137, 'TIGO', 'www.tigo.go.tz', '234- 324 - 2', 'asdfvd'),
(138, 'Neema', 'University Of Dar es salaam', '098- 765 - 4321', 'rgeg'),
(139, 'Nicholaus Mayenga', 'IFM', '067- 875 - 6454', 'dfbdfbd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `adminEmail` (`email`);

--
-- Indexes for table `awards`
--
ALTER TABLE `awards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sector` (`sectorFK`);

--
-- Indexes for table `sector`
--
ALTER TABLE `sector`
  ADD PRIMARY KEY (`id`),
  ADD KEY `awards` (`awardsFK`);

--
-- Indexes for table `wapendekeza`
--
ALTER TABLE `wapendekeza`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `wapendekezanawapendekezwa`
--
ALTER TABLE `wapendekezanawapendekezwa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoriesPendekezaPendekezwa` (`categoriesFK`,`pendekezaID`,`pendekezwaID`),
  ADD KEY `pendekezaID` (`pendekezaID`),
  ADD KEY `pendekezwaID` (`pendekezwaID`);

--
-- Indexes for table `wapendekezwa`
--
ALTER TABLE `wapendekezwa`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `awards`
--
ALTER TABLE `awards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `sector`
--
ALTER TABLE `sector`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `wapendekeza`
--
ALTER TABLE `wapendekeza`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `wapendekezanawapendekezwa`
--
ALTER TABLE `wapendekezanawapendekezwa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=510;

--
-- AUTO_INCREMENT for table `wapendekezwa`
--
ALTER TABLE `wapendekezwa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_ibfk_1` FOREIGN KEY (`sectorFK`) REFERENCES `sector` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sector`
--
ALTER TABLE `sector`
  ADD CONSTRAINT `sector_ibfk_1` FOREIGN KEY (`awardsFK`) REFERENCES `awards` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wapendekezanawapendekezwa`
--
ALTER TABLE `wapendekezanawapendekezwa`
  ADD CONSTRAINT `wapendekezanawapendekezwa_ibfk_1` FOREIGN KEY (`categoriesFK`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wapendekezanawapendekezwa_ibfk_2` FOREIGN KEY (`pendekezaID`) REFERENCES `wapendekeza` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wapendekezanawapendekezwa_ibfk_3` FOREIGN KEY (`pendekezwaID`) REFERENCES `wapendekezwa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

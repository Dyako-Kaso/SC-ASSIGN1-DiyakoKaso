-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2022 at 06:07 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webpcr`
--

-- --------------------------------------------------------

--
-- Table structure for table `pcrpatients`
--

CREATE TABLE `pcrpatients` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(50) NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `date_of_test` date NOT NULL,
  `date_of_issue` date NOT NULL,
  `result` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



--
-- Table structure for table `bloodpatients`
--

CREATE TABLE `bloodpatients` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `blood_type` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(50) NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `date_of_test` date NOT NULL,
  `date_of_issue` date NOT NULL,
  `result` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


--
-- Indexes for table `pcrpatients` and `bloodpatients`
--
ALTER TABLE `pcrpatients` ADD PRIMARY KEY (`id`);
ALTER TABLE `bloodpatients` ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for table `pcrpatients` and `bloodpatients`
--
ALTER TABLE `pcrpatients` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
ALTER TABLE `bloodpatients` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;



INSERT INTO `bloodpatients`(`id`, `name`, `gender`, `blood_type`, `phone`, `date_of_birth`, `date_of_test`, `date_of_issue`, `result`)
VALUES ('1','hala abdul hakim','female','O+','077454545','2000-1-9','2022-1-8','2022-1-11','positive'),
       ('2','abdul hakim','male','A+','077012345','2005-2-9','2022-1-1','2022-1-11','negative'),
       ('3','zahraa mohammed','female','B-','077686868','2006-10-7','2022-1-2','2022-1-11','negative'),
       ('4','hevi ahmad','female','AB+','077099933','2001-11-25','2022-1-4','2022-1-11','positive'),
       ('5','zhir aras','male','O+','077992345','2002-5-5','2022-1-8','2022-1-11','positive'),
       ('6','sura neama','female','O-','077012399','2006-1-3','2022-1-9','2022-1-11','negative');

INSERT INTO `pcrpatients`(`id`, `name`, `gender`, `phone`, `date_of_birth`, `date_of_test`, `date_of_issue`, `result`)
VALUES ('1','sima hakim','female','077454545','2000-1-9','2022-1-8','2022-1-11','positive'),
       ('2','abd salam','male','077012345','2005-2-9','2022-1-1','2022-1-5','negative'),
       ('3','yaqin jihad','female','077686868','2006-10-7','2022-1-2','2022-1-6','negative'),
       ('4','sana ahmad','female','077099933','2001-11-25','2022-1-4','2022-1-8','positive'),
       ('5','luqman aras','male','077992345','2002-5-5','2022-1-8','2022-1-12','positive'),
       ('6','sura omer','female','077012399','2006-1-3','2022-1-9','2022-1-13','negative');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(11) PRIMARY KEY NOT NULL,
  `fullName` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user` MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;


--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `fullName`, `username`, `password`, `status`) VALUES
(1, 'guest', 'guest', '1234', 'Active');



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

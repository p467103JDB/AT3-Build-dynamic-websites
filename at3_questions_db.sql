-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2024 at 04:45 PM
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
-- Database: `at3_questions_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `Question_ID` int(11) NOT NULL,
  `Question` varchar(255) NOT NULL,
  `Description_ID` int(11) NOT NULL,
  `Answer_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`Question_ID`, `Question`, `Description_ID`, `Answer_ID`) VALUES
(1, 'Question 1.\r\nOrganisational Requirements <br>\r\n', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `q_answer`
--

CREATE TABLE `q_answer` (
  `Answer_ID` int(11) NOT NULL,
  `Answer` varchar(2047) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `q_answer`
--

INSERT INTO `q_answer` (`Answer_ID`, `Answer`) VALUES
(1, 'Code of Conduct: details acceptable organisational and ethical and professional behaviours that employees must follow.  This is important to ensure that team task \r\n\r\nCITE Corporate Social Responsibility:  details the organisations social responsibilities and what they consider is important for the community, the people within that community, sustainability and their accountability.  This determines the culture of the workplace environment \r\n\r\nThe Equity and Diversity Policy:  ensures that the employees of the organization are aware of their rights and responsibilities in creating and maintaining a work environment which encourages and respects equal employment opportunity and diversity and is free from discrimination, harassment, victimization and bullying.  This is fulfils the EEO Act 2000, Disability Opportunity Act 1984 and Age Discrimination Act 2004. \r\n\r\nThe OSH Policy – addresses the OSH of the employees by assisting them to understand their responsibilities and duties with regard to safety and health as well as identifying the responsibilities and duties of the organization as an employer. ');

-- --------------------------------------------------------

--
-- Table structure for table `q_description`
--

CREATE TABLE `q_description` (
  `Description_ID` int(11) NOT NULL,
  `Description` varchar(1023) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `q_description`
--

INSERT INTO `q_description` (`Description_ID`, `Description`) VALUES
(1, 'When working with teams from other Divisions, describe the organizational policies that you will refer to, to ensure that your project aligns with the organization’s requirements and the importance of each:\r\n\r\n    1. Workplace policies\r\n    2. Code of conduct\r\n    3. Reputation and culture\r\n    4. Legislative requirements (EEO, WHS).\r\n');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`Question_ID`),
  ADD KEY `FK_DESC` (`Description_ID`),
  ADD KEY `FK_ANSW` (`Answer_ID`);

--
-- Indexes for table `q_answer`
--
ALTER TABLE `q_answer`
  ADD PRIMARY KEY (`Answer_ID`);

--
-- Indexes for table `q_description`
--
ALTER TABLE `q_description`
  ADD PRIMARY KEY (`Description_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `Question_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `q_answer`
--
ALTER TABLE `q_answer`
  MODIFY `Answer_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `q_description`
--
ALTER TABLE `q_description`
  MODIFY `Description_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `FK_ANSW` FOREIGN KEY (`Answer_ID`) REFERENCES `q_answer` (`Answer_ID`),
  ADD CONSTRAINT `FK_DESC` FOREIGN KEY (`Description_ID`) REFERENCES `q_description` (`Description_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

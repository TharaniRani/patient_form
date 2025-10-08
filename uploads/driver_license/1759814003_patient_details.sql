-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2025 at 09:57 AM
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
-- Database: `patient_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `patient_details`
--

CREATE TABLE `patient_details` (
  `patient_id` int(11) NOT NULL,
  `Last_name` varchar(23) DEFAULT NULL,
  `First_name` varchar(45) DEFAULT NULL,
  `Dob` date DEFAULT NULL,
  `External_id` int(11) DEFAULT NULL,
  `Email` varchar(11) DEFAULT NULL,
  `Mobile_no` int(11) DEFAULT NULL,
  `Fax` varchar(23) DEFAULT NULL,
  `Address1` varchar(11) DEFAULT NULL,
  `Address2` varchar(87) DEFAULT NULL,
  `Ethnicity` varchar(11) DEFAULT NULL,
  `Gender` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient_details`
--

INSERT INTO `patient_details` (`patient_id`, `Last_name`, `First_name`, `Dob`, `External_id`, `Email`, `Mobile_no`, `Fax`, `Address1`, `Address2`, `Ethnicity`, `Gender`) VALUES
(19, 'M', 'manoj', '27-8-1988', '9', 'visnu@gmail.com' , '8778876', 'uyt','Anna nagar' , 'sakthi nagar' , 'hispanic' , 'male');
(1, 'P', 'Pandiyan', '-00-00', 0, '8976454677', 0, 'Sakthi nagar', 'Anna nagar', 'Hispanic', 'Male', NULL),
(2, 'P', 'maha', '0000-00-00', 0, '8756454677', 0, 'Anna nagar', 'Anna nagar', 'Non-Hispanic', 'Female', NULL),
(3, 'P', 'vishnu', '0000-00-00', 0, '8976454677', 0, 'Sakthi nagar', 'Anna nagar', 'Hispanic', 'Male', NULL),
(4, 'P', 'sutha', '0000-00-00', 0, '8756454677', 0, 'Anna nagar', 'Anna nagar', 'Non-Hispanic', 'Female', NULL),
(5, 'A', 'manaj', '0000-00-00', 0, '8976454677', 0, 'Sakthi nagar', 'Anna nagar', 'Hispanic', 'Male', NULL),
(6, 'B', 'priya', '0000-00-00', 0, '8756454677', 0, 'Anna nagar', 'Anna nagar', 'Hispanic', 'Female', NULL),
(7, 'O', 'ashwanth', '0000-00-00', 0, '8976454677', 0, 'Sakthi nagar', 'Anna nagar', 'Hispanic', 'Male', NULL),
(8, 'M', 'prabha', '0000-00-00', 0, '8756454677', 0, 'Anna nagar', 'Anna nagar', 'Hispanic', 'Female', NULL),
(9, 'S', 'arun', '0000-00-00', 0, '8976454677', 0, 'Sakthi nagar', 'Anna nagar', 'Hispanic', 'Male', NULL),
(10, 'R', 'vaishu', '0000-00-00', 0, '8756454677', 0, 'Anna nagar', 'Anna nagar', 'Non-Hispanic', 'Female', NULL),
(11, 'T', 'sakthi', '0000-00-00', 0, '8976454677', 0, 'Sakthi nagar', 'Anna nagar', 'Non-Hispanic', 'Male', NULL),
(12, 'J', 'uma', '0000-00-00', 0, '8756454677', 0, 'periyar nagar', 'Anna nagar', 'Non-Hispanic', 'Female', NULL),
(13, 'I', 'vishwa', '0000-00-00', 0, '8976454677', 0, 'Sakthi nagar', 'Anna nagar', 'Hispanic', 'Male', NULL),
(14, 'P', 'shobika', '0000-00-00', 0, '8756454677', 0, 'Anna nagar', 'gandhi naga', 'Hispanic', 'Female', NULL),
(15, 'E', 'thiru', '0000-00-00', 0, '8976454677', 0, 'Sakthi nagar', 'Anna nagar', 'Hispanic', 'Male', NULL),
(16, 'P', 'vidhya', '0000-00-00', 0, '8756454677', 0, 'Anna nagar', 'Anna nagar', 'Non-Hispanic', 'Female', NULL),
(17, 'A', 'madhan', '0000-00-00', 0, '8976454677', 0, 'gandhi nagar', 'Anna nagar', 'Non-Hispanic', 'Male', NULL),
(18, 'P', 'archana', '0000-00-00', 0, '8756454677', 0, 'Anna nagar', 'Anna nagar', 'Non-Hispanic', 'Female', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `patient_details`
--
ALTER TABLE `patient_details`
  ADD PRIMARY KEY (`patient_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

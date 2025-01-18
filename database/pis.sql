-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 21, 2023 at 08:56 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pis`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

DROP TABLE IF EXISTS `booking`;
CREATE TABLE IF NOT EXISTS `booking` (
  `booking_id` int NOT NULL AUTO_INCREMENT,
  `p_id` int NOT NULL,
  `booking_date` date NOT NULL,
  `selected_time` time NOT NULL,
  `approval_time` time NOT NULL,
  `doctor` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `approval` varchar(200) NOT NULL,
  `reason` varchar(200) NOT NULL,
  `staff_id` int NOT NULL,
  `status` varchar(200) NOT NULL,
  PRIMARY KEY (`booking_id`),
  KEY `p_id` (`p_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `p_id`, `booking_date`, `selected_time`, `approval_time`, `doctor`, `approval`, `reason`, `staff_id`, `status`) VALUES
(14, 1, '2023-03-01', '13:00:00', '11:00:00', 'Chest Clinic', '1', 'Chest pain', 1, 'Your selected time slot is approved. \r\n'),
(15, 1, '2023-04-21', '14:40:00', '15:00:00', 'Nutrition Clinic', '1', 'Appetite loss', 0, ''),
(16, 1, '2023-05-23', '10:15:00', '00:00:00', 'Dermatology Clinic', '1', 'Rash', 0, ''),
(17, 1, '2023-11-07', '13:00:00', '13:00:00', 'Forensic Psychatric Clinic', '1', 'Headache +', 0, 'Your time slot is approved'),
(18, 1, '2023-11-17', '08:30:00', '00:00:00', 'Cardiology clinic', '0', 'Chest Pain', 0, ''),
(19, 1, '2023-11-21', '10:25:00', '00:00:00', 'Medical Clinics', '0', 'Wound', 0, ''),
(20, 1, '2023-11-28', '13:30:00', '00:00:00', 'Eye Clinic', '0', 'Eye pain', 0, ''),
(21, 1, '2023-11-30', '14:30:00', '00:00:00', 'Breast Disease Clinic', '0', 'Pain', 0, ''),
(22, 25, '2023-11-29', '14:30:00', '00:00:00', 'Forensic Psychatric Clinic', '0', 'Checkup', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `checkup`
--

DROP TABLE IF EXISTS `checkup`;
CREATE TABLE IF NOT EXISTS `checkup` (
  `checkup_id` int NOT NULL AUTO_INCREMENT,
  `checkup_name` varchar(200) NOT NULL,
  `doctor_comment` varchar(500) NOT NULL,
  `nurse_comment` varchar(500) NOT NULL,
  `checkup_date` date NOT NULL,
  `diagnosis` varchar(200) NOT NULL,
  `p_id` int NOT NULL,
  `staff_id` int NOT NULL,
  PRIMARY KEY (`checkup_id`),
  KEY `p_id` (`p_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `checkup`
--

INSERT INTO `checkup` (`checkup_id`, `checkup_name`, `doctor_comment`, `nurse_comment`, `checkup_date`, `diagnosis`, `p_id`, `staff_id`) VALUES
(1, 'PCR Test', 'Within two weeks', 'ok', '2022-12-15', '', 1, 31),
(3, 'Scan', 'Within two days', 'checkup done', '2022-12-12', '', 2, 13),
(4, 'Blood ', 'urgent', 'Done', '2022-12-12', '', 4, 13),
(6, 'Eye checkup', 'within two weeks', 'checkup should be done', '2022-12-25', '', 6, 13),
(7, 'Blood Test', 'Within a day', 'ok', '2022-12-23', '', 3, 13),
(9, 'blood', 'rfuyuijgjkguiytupiy', '', '2023-11-17', '', 1, 31),
(11, 'FBC', 'If fever remain more than 3 days!', '', '0000-00-00', '', 24, 31);

-- --------------------------------------------------------

--
-- Table structure for table `diagnosis`
--

DROP TABLE IF EXISTS `diagnosis`;
CREATE TABLE IF NOT EXISTS `diagnosis` (
  `diagnosis_id` int NOT NULL AUTO_INCREMENT,
  `diagnosis` varchar(200) NOT NULL,
  `diagnosis_date` date NOT NULL,
  `p_id` int NOT NULL,
  `staff_id` int NOT NULL,
  PRIMARY KEY (`diagnosis_id`),
  KEY `p_id` (`p_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `diagnosis`
--

INSERT INTO `diagnosis` (`diagnosis_id`, `diagnosis`, `diagnosis_date`, `p_id`, `staff_id`) VALUES
(1, 'Covid', '2023-01-15', 1, 31),
(3, 'Apendicits', '2023-01-15', 2, 31),
(4, 'Dengue fever', '2021-01-30', 4, 13),
(5, 'Cold', '2021-01-30', 5, 13),
(6, 'Eye pain', '2021-01-30', 6, 13),
(9, 'Fever', '2023-01-15', 3, 31),
(11, 'Fever', '2023-01-15', 1, 31),
(13, 'Hand pain', '2023-11-17', 1, 31);

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

DROP TABLE IF EXISTS `doctor`;
CREATE TABLE IF NOT EXISTS `doctor` (
  `doc_id` int NOT NULL,
  `doc_fname` varchar(200) NOT NULL,
  `doc_lname` varchar(200) NOT NULL,
  `contact_no` varchar(200) NOT NULL,
  `specialist` varchar(200) NOT NULL,
  `qualifications` varchar(200) NOT NULL,
  `doc_fees` int NOT NULL,
  `available_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

DROP TABLE IF EXISTS `file`;
CREATE TABLE IF NOT EXISTS `file` (
  `file_id` int NOT NULL AUTO_INCREMENT,
  `file_name` varchar(200) NOT NULL,
  `file_size` int NOT NULL,
  `p_id` int NOT NULL,
  PRIMARY KEY (`file_id`),
  KEY `p_id` (`p_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `file`
--

INSERT INTO `file` (`file_id`, `file_name`, `file_size`, `p_id`) VALUES
(13, 'IMG_20210131_0004.pdf', 430299, 2);

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

DROP TABLE IF EXISTS `notification`;
CREATE TABLE IF NOT EXISTS `notification` (
  `recipient_id` int NOT NULL AUTO_INCREMENT,
  `message` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `p_id` int DEFAULT NULL,
  PRIMARY KEY (`recipient_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`recipient_id`, `message`, `p_id`) VALUES
(1, 'Dermatology Clinic    is scheduled for 2023-11-20   from 09:08   to 11:10', NULL),
(6, 'Rabies Treatment Clinic    is scheduled for 2023-11-26   from 14:36   to 16:38', NULL),
(3, 'You made an appoinment for  Eye Clinic   on    at 13:30 .    You will get a notification when your appoinment is approved mentioning your time slot.', NULL),
(4, 'You made an appoinment for  Breast Disease Clinic   on 2023-11-30   at 14:30 .    You will get a notification when your appoinment is approved mentioning your time slot.', NULL),
(5, 'You made an appoinment for  Forensic Psychatric Clinic   on 2023-11-29   at 14:30 .    You will get a notification when your appoinment is approved mentioning your time slot.', 25);

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

DROP TABLE IF EXISTS `patient`;
CREATE TABLE IF NOT EXISTS `patient` (
  `p_id` int NOT NULL AUTO_INCREMENT,
  `fname` varchar(500) NOT NULL,
  `lname` varchar(500) NOT NULL,
  `birth_date` date NOT NULL,
  `age` int NOT NULL,
  `id_number` varchar(300) NOT NULL,
  `address_line1` varchar(500) NOT NULL,
  `address_line2` varchar(500) NOT NULL,
  `contact_no` varchar(200) NOT NULL,
  `gender` varchar(200) NOT NULL,
  `civil_status` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `discharging_patient` varchar(50) NOT NULL,
  `staff_id` int NOT NULL,
  `w_id` int NOT NULL,
  `bed_number` int NOT NULL,
  `date` date NOT NULL,
  `time` time(6) NOT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`p_id`, `fname`, `lname`, `birth_date`, `age`, `id_number`, `address_line1`, `address_line2`, `contact_no`, `gender`, `civil_status`, `password`, `discharging_patient`, `staff_id`, `w_id`, `bed_number`, `date`, `time`) VALUES
(1, 'Maneesha', 'Karunanayake', '1988-02-17', 33, '881234567', 'Detagamuwa', 'Kataragama', '0707893456', 'female', 'married', '5c67279555894478a22a969cc19e40d5', 'Admit', 0, 6, 4, '2021-01-30', '10:47:00.000000'),
(2, 'Eranga', 'Weerakoon', '1991-12-22', 29, '918573267', 'Rohanapura', 'Tissamaharama', '0710407782', 'female', 'single', '09155826ed37a4a5bfcc412a547a9641', 'Admit', 0, 2, 4, '2021-04-24', '07:20:00.000000'),
(3, 'Kapila', 'Wijesinghe', '1986-11-20', 34, '867654321', 'Mayurapura', 'Hambantota', '0719435080', 'male', 'married', '439da46832b341f615bcf60d5204cba6', 'Discharge', 0, 5, 15, '2021-01-30', '11:00:00.000000'),
(7, 'Chithra  ', 'Nanayakkara ', '1953-07-06', 68, '531234567 ', 'Medawelana', 'Tissamaharama', '0709433080 ', 'female', 'married', 'e4dcf6688f4da800329a653b571c8b3b', 'Admit', 0, 1, 0, '2021-02-01', '05:34:00.000000'),
(10, 'Asela', 'Muhandiram', '1969-04-09', 52, '691234567', 'Kahawaththa', 'Rathnapura', '0776458906', 'male', 'married', '38f65e07431c64970ccefc9c7fe46734', '', 0, 0, 0, '2021-04-24', '09:34:00.000000'),
(13, 'Samanthi', 'Perera', '1975-05-07', 46, '759013339', 'Dikwella', 'Matara', '07767787900', 'female', 'married', '5bb2eab526642726b44b1c8b0dd325d9', '', 0, 0, 0, '2021-05-01', '07:07:00.000000'),
(18, 'kalana', 'minipuraarachchi', '1999-06-23', 23, '19996578123', '58', 'kegalle', '0756987523', 'male', 'single', 'b4cafc10b2f5be19373042d6088c122a', '', 0, 0, 0, '2023-01-15', '12:32:00.000000'),
(19, 'Nimal ', 'silva ', '1998-11-09', 25, '19986525741 ', 'cdhgfhjgjkg', 'fgdghkgjglkjkljjkj', '0245895666 ', 'male', 'married', 'e088f2a18812b8b90e235430874a0762', '', 0, 0, 0, '2023-11-09', '02:44:00.000000'),
(20, 'Pathum', 'Fernando', '1995-05-09', 28, '19956358955', 'dfdfgfdhfg', 'kykydgrtqqqqqqqq', '0745263651', 'male', 'married', 'd795b27467d80459010ef2fbbe505833', '', 0, 0, 0, '2023-11-09', '03:04:00.000000'),
(21, 'KaveeshA', 'mathew   ', '2000-01-09', 23, '20001457853   ', 'hkhgkdfhghsjgdk', 'dsfyfiyaisgypisdhygkhg', '0125456332   ', 'male', 'married', '6af35e204ba7e08cc5d10e3107319ecf', '', 0, 0, 0, '2023-11-09', '03:07:00.000000'),
(22, 'Sineth ', 'mendis ', '2000-03-09', 23, '200012523698 ', 'dhgdgdgjd', 'fhgsfddfsdhgfdhj', '0114569587 ', 'male', 'single', '13dad4df4689310d0bd6482568c0970d', '', 0, 0, 0, '2023-11-09', '03:20:00.000000'),
(23, 'sineth', 'mendis', '2000-03-09', 23, '200012523698', 'dhgdgdgjd', 'fhgsfddfsdhgfdhj', '0114569587', 'male', 'single', '13dad4df4689310d0bd6482568c0970d', '', 0, 0, 0, '2023-11-09', '03:24:00.000000'),
(24, 'darsha', 'mendis', '2001-07-24', 22, '200175822654', 'fysdfjkhdsf', 'fdouydfiyerikf', '0956852335', 'male', 'single', 'ebf7e5af15df77db19f5eda108e49a31', '', 0, 0, 0, '2023-11-09', '03:41:00.000000'),
(25, 'pethmi', 'sehara', '2001-10-23', 22, '20014569800', 'degoda rd', 'ambalangoda', '0745402366', 'female', 'single', 'bb355a872d873a16fa79bcab52977199', '', 0, 0, 0, '2023-11-20', '08:58:00.000000');

-- --------------------------------------------------------

--
-- Table structure for table `scheduleclinic`
--

DROP TABLE IF EXISTS `scheduleclinic`;
CREATE TABLE IF NOT EXISTS `scheduleclinic` (
  `clinicid` int NOT NULL AUTO_INCREMENT,
  `clinicname` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date` date NOT NULL,
  `starttime` time NOT NULL,
  `endtime` time NOT NULL,
  `doctorincharge` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`clinicid`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `scheduleclinic`
--

INSERT INTO `scheduleclinic` (`clinicid`, `clinicname`, `date`, `starttime`, `endtime`, `doctorincharge`) VALUES
(1, 'ENT Clinic', '2023-11-15', '10:50:08', '13:50:08', 'Dr. Kavindu'),
(2, 'Eye Clinic', '2023-11-15', '14:50:00', '16:50:00', 'shaleel'),
(4, 'Forensic Psychatric Clinic', '2023-12-12', '08:08:00', '10:05:00', 'kalana'),
(6, 'Neurology Clinic', '2023-11-16', '08:40:00', '10:42:00', 'Dr. ghdfgif'),
(7, 'Diabetes & Endocrine Clinic', '2023-11-17', '14:47:00', '17:47:00', 'fdgfhfgjygjhkjl'),
(8, 'Breast Disease Clinic', '2023-11-20', '08:30:00', '12:30:00', 'Dr. De Silva'),
(9, 'Speech Therapy Clinic', '2023-11-20', '09:30:00', '12:15:00', 'Dr. De Silva'),
(10, 'Nephrology Clinic', '2023-11-20', '10:20:00', '15:20:00', 'Dr.Perera'),
(11, 'Medical Clinics', '2023-11-20', '09:41:00', '11:42:00', 'Dr. Kalana'),
(12, 'Dermatology Clinic', '2023-11-20', '09:08:00', '11:10:00', 'Dr.Kavindu'),
(13, 'Rabies Treatment Clinic', '2023-11-26', '14:36:00', '16:38:00', 'DR.Nimal');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

DROP TABLE IF EXISTS `staff`;
CREATE TABLE IF NOT EXISTS `staff` (
  `staff_id` int NOT NULL AUTO_INCREMENT,
  `fname` varchar(500) NOT NULL,
  `lname` varchar(500) NOT NULL,
  `user_type` varchar(200) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  PRIMARY KEY (`staff_id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `fname`, `lname`, `user_type`, `user_name`, `password`, `email`) VALUES
(8, '', '', 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@gmail.com'),
(15, 'Prabath', 'WeerasiriWP', 'doctor', 'doctor', '075b3fa369bcd30706dca2b8505da02e', 'prabathweerasiri12@gmail.com'),
(17, 'SampathS', 'Hemachandra', 'doctor', 'doctor', 'c19a9475b9074c31d6e071a9f4222fe6', 'sampathhemchandra@gmail.com'),
(19, 'Nipuna', 'Ranaweera', 'doctor', 'doctor', 'f2581891633ed15a6517a1bb2f3f5c28', 'nipunaranaweera@gmail.com'),
(20, 'Chinthaka ', 'Gunarathne', 'doctor', 'doctor', '2df2d2c644b3597b56eb297e24719936', 'chinthakagunarathne1@gmail.com'),
(21, 'Nishantha', 'Gamage', 'doctor', 'doctor', '81a177dc6b65a514e8af9667508c0887', 'nishanthadgamage2@gmail.com'),
(22, 'Hiran', 'Hewage', 'doctor', 'doctor', '834c9df7553233a30b3f645850037df7', 'hiranhewage@gmail.com'),
(23, 'Mihira', 'Manamperi', 'doctor', 'doctor', '1e436494ac1fccc54fa3260bc85d44b6', 'mihiramanamperi@gmail.com'),
(25, 'Uditha', 'Hewavitharana', 'doctor', 'doctor', '5520d0da75a8557c30962c18bdff67a4', 'udithaihewavitharana@gmail.com'),
(26, 'Pradeep', 'Siriwardhane', 'doctor', 'doctor', 'febc8f8ac083f5fc27e032c81e7b536a', 'pradepsiriwardhane@gmail.com'),
(31, 'kavindu', 'maleesha', 'doctor', 'doctor', 'f9f16d97c90d8c6f2cab37bb6d1f1992', 'kavindu@gmail.com'),
(32, 'Ashan', 'Darsha', 'doctor', 'Ashan', '5c55ab772dd65f61e32ac3b03271e706', 'Ashan1@gmail.com'),
(33, 'dinusha', 'gamage', 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'dinusha@gmail.com'),
(34, 'sunimal', 'perera', 'doctor', 'doctor', 'f9f16d97c90d8c6f2cab37bb6d1f1992', 'avd12@gmail.com'),
(35, 'shaleel', 'S.sandeepa', 'doctor', 'shaleel', 'f9f16d97c90d8c6f2cab37bb6d1f1992', 'shaleel@gmail.com');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

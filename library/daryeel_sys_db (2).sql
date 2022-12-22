-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2022 at 05:27 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `daryeel_sys_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_numbers`
--

CREATE TABLE `account_numbers` (
  `rowNo` int(11) NOT NULL,
  `accountNoID` varchar(100) NOT NULL,
  `gatewayID` varchar(100) NOT NULL,
  `accountNoName` varchar(250) NOT NULL,
  `accountNumber` varchar(100) NOT NULL,
  `openingBalance` varchar(100) NOT NULL,
  `registeredBy` varchar(100) NOT NULL,
  `registerDate` varchar(200) NOT NULL,
  `updatedBy` varchar(100) NOT NULL,
  `updateDate` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `account_numbers`
--

INSERT INTO `account_numbers` (`rowNo`, `accountNoID`, `gatewayID`, `accountNoName`, `accountNumber`, `openingBalance`, `registeredBy`, `registerDate`, `updatedBy`, `updateDate`) VALUES
(1, 'ACC1-2022', 'BC1-2022', 'SOMALI TEACHERS SYNDICATE', ' 33759227', '209', 'US48-2022', '2022-09-20 10:47:38 00:00:00', '-', '-');

-- --------------------------------------------------------

--
-- Table structure for table `account_transactions`
--

CREATE TABLE `account_transactions` (
  `rowNo` int(11) NOT NULL,
  `transactionID` varchar(100) NOT NULL,
  `accountNoID` varchar(100) NOT NULL,
  `withdrawalAmount` varchar(100) NOT NULL,
  `depositedAmount` varchar(100) NOT NULL,
  `referenceID` varchar(100) NOT NULL,
  `transactionDescription` text NOT NULL,
  `transactionStatus` varchar(100) NOT NULL,
  `registeredBy` varchar(100) NOT NULL,
  `registerDate` varchar(100) NOT NULL,
  `cancelledBy` varchar(100) NOT NULL,
  `cancelDate` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `account_transactions`
--

INSERT INTO `account_transactions` (`rowNo`, `transactionID`, `accountNoID`, `withdrawalAmount`, `depositedAmount`, `referenceID`, `transactionDescription`, `transactionStatus`, `registeredBy`, `registerDate`, `cancelledBy`, `cancelDate`) VALUES
(1, 'TR1-2022', 'ACC1-2022', '0', '209', '0', 'Openning Balance', '1', 'US48-2022', '2022-09-20 10:47:38 00:00:00', '-', '-'),
(2, 'TR2-2022', 'ACC1-2022', '0', '48', 'PYMB98-2022', 'sanadka oo dhan', '1', 'US48-2022', '2022-09-20 10:50:53', '-', '-'),
(3, 'TR3-2022', 'ACC1-2022', '0', '48', 'PYMB99-2022', 'sanadka oo dhan', '1', 'US48-2022', '2022-09-20 10:51:44', '-', '-'),
(4, 'TR4-2022', 'ACC1-2022', '0', '48', 'PYMB100-2022', 'sanadka oo dhan', '1', 'US48-2022', '2022-09-20 10:52:42', '-', '-'),
(5, 'TR5-2022', 'ACC1-2022', '0', '32', 'PYMB101-2022', 'sideed bilood', '1', 'US48-2022', '2022-09-20 10:53:33', '-', '-'),
(6, 'TR6-2022', 'ACC1-2022', '0', '24', 'PYMB102-2022', 'sanad ka hafkiis', '1', 'US48-2022', '2022-09-20 10:54:20', '-', '-'),
(7, 'TR7-2022', 'ACC1-2022', '0', '20', 'PYMB103-2022', 'shan bilood', '1', 'US48-2022', '2022-09-20 10:58:14', '-', '-'),
(8, 'TR8-2022', 'ACC1-2022', '0', '48', 'PYMB104-2022', 'sanadka oo dhan', '1', 'US48-2022', '2022-09-20 10:59:57', '-', '-'),
(9, 'TR9-2022', 'ACC1-2022', '0', '48', 'PYMB105-2022', 'sanadka oo dhan', '1', 'US48-2022', '2022-09-20 11:00:44', '-', '-'),
(10, 'TR10-2022', 'ACC1-2022', '0', '20', 'PYMB106-2022', 'shan bil', '1', 'US48-2022', '2022-09-20 11:02:24', '-', '-'),
(11, 'TR11-2022', 'ACC1-2022', '0', '20', 'PYMB107-2022', 'shan bil', '1', 'US48-2022', '2022-09-20 11:03:53', '-', '-'),
(12, 'TR12-2022', 'ACC1-2022', '0', '16', 'PYMB108-2022', 'afar bil', '1', 'US48-2022', '2022-09-20 11:04:53', '-', '-'),
(13, 'TR13-2022', 'ACC1-2022', '0', '24', 'PYMB109-2022', 'sanad hafkiis', '1', 'US48-2022', '2022-09-20 11:08:55', '-', '-'),
(14, 'TR14-2022', 'ACC1-2022', '0', '32', 'PYMB110-2022', 'sideed bilood', '1', 'US48-2022', '2022-09-20 11:11:30', '-', '-'),
(15, 'TR15-2022', 'ACC1-2022', '0', '14', 'PYMB111-2022', 'Jan/Sept', '1', 'US48-2022', '2022-09-20 11:13:40', '-', '-'),
(16, 'TR16-2022', 'ACC1-2022', '0', '7', 'PYMB112-2022', 'Jan/march', '1', 'US48-2022', '2022-09-20 11:15:29', '-', '-'),
(17, 'TR17-2022', 'ACC1-2022', '0', '12', 'PYMB113-2022', 'Jan/Jun', '1', 'US48-2022', '2022-09-20 11:16:30', '-', '-'),
(18, 'TR18-2022', 'ACC1-2022', '0', '16', 'PYMB114-2022', 'Jan/Aug', '1', 'US48-2022', '2022-09-20 11:18:04', '-', '-'),
(19, 'TR19-2022', 'ACC1-2022', '0', '16', 'PYMB115-2022', 'Jan/Aug', '1', 'US48-2022', '2022-09-20 11:19:11', '-', '-'),
(20, 'TR20-2022', 'ACC1-2022', '0', '8', 'PYMB116-2022', 'Jan/Abr', '1', 'US48-2022', '2022-09-20 11:19:54', '-', '-'),
(21, 'TR21-2022', 'ACC1-2022', '0', '16', 'PYMB117-2022', 'Jan/Aug', '1', 'US48-2022', '2022-09-20 11:20:54', '-', '-'),
(22, 'TR22-2022', 'ACC1-2022', '0', '16', 'PYMB118-2022', 'Jan/Aug', '1', 'US48-2022', '2022-09-20 11:23:25', '-', '-'),
(23, 'TR23-2022', 'ACC1-2022', '0', '14', 'PYMB119-2022', 'Jan/July ', '1', 'US48-2022', '2022-09-20 11:24:04', '-', '-'),
(24, 'TR24-2022', 'ACC1-2022', '0', '10', 'PYMB120-2022', 'Jan/may', '1', 'US48-2022', '2022-09-20 11:25:19', '-', '-'),
(26, 'TR25-2022', 'ACC1-2022', '0', '28', 'PYMB122-2022', 'Jun/Dec2022', '1', 'US48-2022', '2022-09-22 22:18:22', '-', '-'),
(27, 'TR27-2022', 'ACC1-2022', '160', '0', 'EXP1-2022', 'hool =$100 boor =35 iyo qalabka xafiiska lacagihii lagu raray $25', '1', 'US48-2022', '2022-09-02 00:00:00', '-', '-'),
(28, 'TR28-2022', 'ACC1-2022', '100', '0', 'EXP2-2022', 'cameraman $40  ID= 15members iyo kulan fulinta =$15 ', '1', 'US48-2022', '2022-10-03 00:00:00', '-', '-'),
(29, 'TR29-2022', 'ACC1-2022', '110', '0', 'EXP3-2022', 'Kulan gudomiyaha ururka layeeshay masuliyiin sarsare =50\ngolaha fulinta shirarka bilihii udhaxeyay 10/03 -07/08 = $60', '1', 'US48-2022', '2022-07-08 00:00:00', '-', '-'),
(30, 'TR30-2022', 'ACC1-2022', '227', '0', 'EXP4-2022', 'REG SYSTEM =$100, MONTH FEE SYSTEM= $50 iyo WABSET = $77\n', '1', 'US48-2022', '2022-08-13 00:00:00', '-', '-'),
(31, 'TR31-2022', 'ACC1-2022', '133', '0', 'EXP5-2022', 'SOTES.SO=39, SYSTEM month fee=$50 , ID= 10members iyo fulinta $14', '1', 'US48-2022', '2022-09-07 00:00:00', '-', '-');

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `rowNo` int(11) NOT NULL,
  `appointment_id` varchar(250) DEFAULT NULL,
  `patient_id` varchar(250) DEFAULT NULL,
  `department_id` varchar(250) NOT NULL,
  `doctor_id` varchar(250) DEFAULT NULL,
  `appointment_number` int(11) DEFAULT NULL,
  `charged_appt_fee` varchar(250) DEFAULT NULL,
  `appt_discount_fee` varchar(250) DEFAULT NULL,
  `paid_appt_fee` varchar(250) DEFAULT NULL,
  `accountNumberID` varchar(250) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  `appointment_status` varchar(50) DEFAULT NULL,
  `registered_by` varchar(250) DEFAULT NULL,
  `register_date` varchar(250) DEFAULT NULL,
  `updated_by` varchar(250) DEFAULT NULL,
  `update_date` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`rowNo`, `appointment_id`, `patient_id`, `department_id`, `doctor_id`, `appointment_number`, `charged_appt_fee`, `appt_discount_fee`, `paid_appt_fee`, `accountNumberID`, `description`, `appointment_status`, `registered_by`, `register_date`, `updated_by`, `update_date`) VALUES
(1, 'APP1-2022', 'PT1-2022', 'DP2-2022', 'DOC2-2022', 1, '10', '0', '10', '33759227', 'Lacag Qabasho', '0', 'US2100002', '2022-10-06 16:54:53', '-', '-'),
(2, 'APP2-2022', 'PT3-2022', 'DP4-2022', 'DOC1-2022', 2, '15', '0', '15', '33759227', 'Lacag Qabasho', '0', 'US2100002', '2022-10-06 16:55:10', '-', '-'),
(3, 'APP3-2022', 'PT5-2022', 'DP4-2022', 'DOC1-2022', 1, '15', '0', '5', '33759227', 'Lacag Qabasho', '0', 'US2100002', '2022-10-08 08:49:10', '-', '-'),
(4, 'APP4-2022', 'PT6-2022', 'DP2-2022', 'DOC2-2022', 2, '10', '0', '10', '33759227', 'Lacag Qabasho', '0', 'US2100002', '2022-10-08 08:49:45', '-', '-'),
(5, 'APP5-2022', 'PT3-2022', 'DP2-2022', 'DOC2-2022', 3, '10', '0', '10', '33759227', 'yh', '0', 'US2100002', '2022-12-17 12:31:49', '-', '-');

-- --------------------------------------------------------

--
-- Stand-in structure for view `appointment_view`
-- (See below for the actual view)
--
CREATE TABLE `appointment_view` (
`rowNo` int(11)
,`appointment_id` varchar(250)
,`patient_id` varchar(250)
,`patient_name` varchar(250)
,`patient_age` varchar(250)
,`patient_sex` varchar(6)
,`doctor_id` varchar(250)
,`doctor_name` varchar(250)
,`appointment_number` int(11)
,`charged_appt_fee` varchar(250)
,`appt_discount_fee` varchar(250)
,`description` varchar(250)
,`Appointment_Status` varchar(8)
,`register_date` varchar(250)
);

-- --------------------------------------------------------

--
-- Table structure for table `charge_pay_contributions`
--

CREATE TABLE `charge_pay_contributions` (
  `rowNo` int(11) NOT NULL,
  `chargePayMemberID` varchar(100) NOT NULL,
  `memberID` varchar(100) NOT NULL,
  `accountNoID` varchar(100) NOT NULL,
  `contributionOf` varchar(100) NOT NULL,
  `chargedMonths` varchar(100) NOT NULL,
  `chargedAmount` varchar(100) NOT NULL,
  `paidAmount` varchar(100) NOT NULL,
  `transactionDescription` varchar(250) NOT NULL,
  `transactionType` varchar(100) NOT NULL,
  `transactionStatus` varchar(100) NOT NULL,
  `registeredBy` varchar(100) NOT NULL,
  `registerDate` varchar(100) NOT NULL,
  `cancelledBy` varchar(200) NOT NULL,
  `cancelDate` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `charge_pay_contributions`
--

INSERT INTO `charge_pay_contributions` (`rowNo`, `chargePayMemberID`, `memberID`, `accountNoID`, `contributionOf`, `chargedMonths`, `chargedAmount`, `paidAmount`, `transactionDescription`, `transactionType`, `transactionStatus`, `registeredBy`, `registerDate`, `cancelledBy`, `cancelDate`) VALUES
(1, 'PYMB1-2022', '042', 'N/A', '2022', '12', '24', '0', 'Charge of 2022 for 042', '0', '1', 'US48-2022', '2022-09-16 06:34:08', '-', '-'),
(2, 'PYMB2-2022', '044', 'N/A', '2022', '12', '24', '0', 'Charge of 2022 for 044', '0', '1', 'US48-2022', '2022-09-16 06:34:08', '-', '-'),
(3, 'PYMB3-2022', '045', 'N/A', '2022', '12', '24', '0', 'Charge of 2022 for 045', '0', '1', 'US48-2022', '2022-09-16 06:34:08', '-', '-'),
(4, 'PYMB4-2022', '046', 'N/A', '2022', '12', '24', '0', 'Charge of 2022 for 046', '0', '1', 'US48-2022', '2022-09-16 06:34:08', '-', '-'),
(5, 'PYMB5-2022', '047', 'N/A', '2022', '12', '24', '0', 'Charge of 2022 for 047', '0', '1', 'US48-2022', '2022-09-16 06:34:08', '-', '-'),
(6, 'PYMB6-2022', '048', 'N/A', '2022', '12', '24', '0', 'Charge of 2022 for 048', '0', '1', 'US48-2022', '2022-09-16 06:34:08', '-', '-'),
(7, 'PYMB7-2022', '049', 'N/A', '2022', '12', '24', '0', 'Charge of 2022 for 049', '0', '1', 'US48-2022', '2022-09-16 06:34:08', '-', '-'),
(8, 'PYMB8-2022', '050', 'N/A', '2022', '12', '24', '0', 'Charge of 2022 for 050', '0', '1', 'US48-2022', '2022-09-16 06:34:08', '-', '-'),
(9, 'PYMB9-2022', '052', 'N/A', '2022', '12', '24', '0', 'Charge of 2022 for 052', '0', '1', 'US48-2022', '2022-09-16 06:34:08', '-', '-'),
(10, 'PYMB10-2022', '053', 'N/A', '2022', '12', '24', '0', 'Charge of 2022 for 053', '0', '1', 'US48-2022', '2022-09-16 06:34:08', '-', '-'),
(11, 'PYMB11-2022', '054', 'N/A', '2022', '12', '24', '0', 'Charge of 2022 for 054', '0', '1', 'US48-2022', '2022-09-16 06:34:08', '-', '-'),
(12, 'PYMB12-2022', '055', 'N/A', '2022', '12', '24', '0', 'Charge of 2022 for 055', '0', '1', 'US48-2022', '2022-09-16 06:34:08', '-', '-'),
(13, 'PYMB13-2022', '056', 'N/A', '2022', '12', '24', '0', 'Charge of 2022 for 056', '0', '1', 'US48-2022', '2022-09-16 06:34:08', '-', '-'),
(14, 'PYMB14-2022', '057', 'N/A', '2022', '12', '24', '0', 'Charge of 2022 for 057', '0', '1', 'US48-2022', '2022-09-16 06:34:08', '-', '-'),
(15, 'PYMB15-2022', '058', 'N/A', '2022', '12', '24', '0', 'Charge of 2022 for 058', '0', '1', 'US48-2022', '2022-09-16 06:34:08', '-', '-'),
(16, 'PYMB16-2022', '059', 'N/A', '2022', '12', '24', '0', 'Charge of 2022 for 059', '0', '1', 'US48-2022', '2022-09-16 06:34:09', '-', '-'),
(17, 'PYMB17-2022', '060', 'N/A', '2022', '12', '24', '0', 'Charge of 2022 for 060', '0', '1', 'US48-2022', '2022-09-16 06:34:09', '-', '-'),
(18, 'PYMB18-2022', '061', 'N/A', '2022', '12', '24', '0', 'Charge of 2022 for 061', '0', '1', 'US48-2022', '2022-09-16 06:34:09', '-', '-'),
(19, 'PYMB19-2022', '062', 'N/A', '2022', '12', '24', '0', 'Charge of 2022 for 062', '0', '1', 'US48-2022', '2022-09-16 06:34:09', '-', '-'),
(20, 'PYMB20-2022', '063', 'N/A', '2022', '12', '24', '0', 'Charge of 2022 for 063', '0', '1', 'US48-2022', '2022-09-16 06:34:09', '-', '-'),
(21, 'PYMB21-2022', '064', 'N/A', '2022', '12', '24', '0', 'Charge of 2022 for 064', '0', '1', 'US48-2022', '2022-09-16 06:34:09', '-', '-'),
(22, 'PYMB22-2022', '065', 'N/A', '2022', '12', '24', '0', 'Charge of 2022 for 065', '0', '1', 'US48-2022', '2022-09-16 06:34:09', '-', '-'),
(23, 'PYMB23-2022', '066', 'N/A', '2022', '12', '24', '0', 'Charge of 2022 for 066', '0', '1', 'US48-2022', '2022-09-16 06:34:09', '-', '-'),
(24, 'PYMB24-2022', '067', 'N/A', '2022', '12', '24', '0', 'Charge of 2022 for 067', '0', '1', 'US48-2022', '2022-09-16 06:34:09', '-', '-'),
(25, 'PYMB25-2022', '068', 'N/A', '2022', '12', '24', '0', 'Charge of 2022 for 068', '0', '1', 'US48-2022', '2022-09-16 06:34:09', '-', '-'),
(26, 'PYMB26-2022', '069', 'N/A', '2022', '12', '24', '0', 'Charge of 2022 for 069', '0', '1', 'US48-2022', '2022-09-16 06:34:09', '-', '-'),
(27, 'PYMB27-2022', '070', 'N/A', '2022', '12', '24', '0', 'Charge of 2022 for 070', '0', '1', 'US48-2022', '2022-09-16 06:34:09', '-', '-'),
(28, 'PYMB28-2022', '071', 'N/A', '2022', '12', '24', '0', 'Charge of 2022 for 071', '0', '1', 'US48-2022', '2022-09-16 06:34:09', '-', '-'),
(29, 'PYMB29-2022', '072', 'N/A', '2022', '12', '24', '0', 'Charge of 2022 for 072', '0', '1', 'US48-2022', '2022-09-16 06:34:09', '-', '-'),
(30, 'PYMB30-2022', '073', 'N/A', '2022', '12', '24', '0', 'Charge of 2022 for 073', '0', '1', 'US48-2022', '2022-09-16 06:34:09', '-', '-'),
(31, 'PYMB31-2022', '074', 'N/A', '2022', '12', '24', '0', 'Charge of 2022 for 074', '0', '1', 'US48-2022', '2022-09-16 06:34:09', '-', '-'),
(32, 'PYMB32-2022', '075', 'N/A', '2022', '12', '24', '0', 'Charge of 2022 for 075', '0', '1', 'US48-2022', '2022-09-16 06:34:09', '-', '-'),
(33, 'PYMB33-2022', '076', 'N/A', '2022', '12', '24', '0', 'Charge of 2022 for 076', '0', '1', 'US48-2022', '2022-09-16 06:34:09', '-', '-'),
(34, 'PYMB34-2022', '077', 'N/A', '2022', '12', '24', '0', 'Charge of 2022 for 077', '0', '1', 'US48-2022', '2022-09-16 06:34:09', '-', '-'),
(35, 'PYMB35-2022', '078', 'N/A', '2022', '12', '24', '0', 'Charge of 2022 for 078', '0', '1', 'US48-2022', '2022-09-16 06:34:09', '-', '-'),
(36, 'PYMB36-2022', '079', 'N/A', '2022', '12', '24', '0', 'Charge of 2022 for 079', '0', '1', 'US48-2022', '2022-09-16 06:34:09', '-', '-'),
(37, 'PYMB37-2022', '080', 'N/A', '2022', '12', '24', '0', 'Charge of 2022 for 080', '0', '1', 'US48-2022', '2022-09-16 06:34:09', '-', '-'),
(38, 'PYMB38-2022', '081', 'N/A', '2022', '12', '24', '0', 'Charge of 2022 for 081', '0', '1', 'US48-2022', '2022-09-16 06:34:09', '-', '-'),
(39, 'PYMB39-2022', '082', 'N/A', '2022', '12', '24', '0', 'Charge of 2022 for 082', '0', '1', 'US48-2022', '2022-09-16 06:34:09', '-', '-'),
(40, 'PYMB40-2022', '083', 'N/A', '2022', '12', '24', '0', 'Charge of 2022 for 083', '0', '1', 'US48-2022', '2022-09-16 06:34:09', '-', '-'),
(41, 'PYMB41-2022', '084', 'N/A', '2022', '12', '24', '0', 'Charge of 2022 for 084', '0', '1', 'US48-2022', '2022-09-16 06:34:09', '-', '-'),
(42, 'PYMB42-2022', '085', 'N/A', '2022', '12', '24', '0', 'Charge of 2022 for 085', '0', '1', 'US48-2022', '2022-09-16 06:34:09', '-', '-'),
(43, 'PYMB43-2022', '086', 'N/A', '2022', '12', '24', '0', 'Charge of 2022 for 086', '0', '1', 'US48-2022', '2022-09-16 06:34:09', '-', '-'),
(44, 'PYMB44-2022', '087', 'N/A', '2022', '12', '24', '0', 'Charge of 2022 for 087', '0', '1', 'US48-2022', '2022-09-16 06:34:09', '-', '-'),
(45, 'PYMB45-2022', '088', 'N/A', '2022', '12', '24', '0', 'Charge of 2022 for 088', '0', '1', 'US48-2022', '2022-09-16 06:34:09', '-', '-'),
(46, 'PYMB46-2022', '089', 'N/A', '2022', '12', '24', '0', 'Charge of 2022 for 089', '0', '1', 'US48-2022', '2022-09-16 06:34:09', '-', '-'),
(47, 'PYMB47-2022', '090', 'N/A', '2022', '12', '24', '0', 'Charge of 2022 for 090', '0', '1', 'US48-2022', '2022-09-16 06:34:09', '-', '-'),
(48, 'PYMB48-2022', '091', 'N/A', '2022', '12', '24', '0', 'Charge of 2022 for 091', '0', '1', 'US48-2022', '2022-09-16 06:34:09', '-', '-'),
(49, 'PYMB49-2022', '092', 'N/A', '2022', '12', '24', '0', 'Charge of 2022 for 092', '0', '1', 'US48-2022', '2022-09-16 06:34:09', '-', '-'),
(50, 'PYMB50-2022', '093', 'N/A', '2022', '12', '24', '0', 'Charge of 2022 for 093', '0', '1', 'US48-2022', '2022-09-16 06:34:09', '-', '-'),
(51, 'PYMB51-2022', '094', 'N/A', '2022', '12', '24', '0', 'Charge of 2022 for 094', '0', '1', 'US48-2022', '2022-09-16 06:34:09', '-', '-'),
(52, 'PYMB52-2022', '095', 'N/A', '2022', '12', '24', '0', 'Charge of 2022 for 095', '0', '1', 'US48-2022', '2022-09-16 06:34:09', '-', '-'),
(53, 'PYMB53-2022', '096', 'N/A', '2022', '12', '24', '0', 'Charge of 2022 for 096', '0', '1', 'US48-2022', '2022-09-16 06:34:09', '-', '-'),
(54, 'PYMB54-2022', '097', 'N/A', '2022', '12', '24', '0', 'Charge of 2022 for 097', '0', '0', 'US48-2022', '2022-09-16 06:34:09', 'US48-2022', '2022-09-23 10:59:48'),
(55, 'PYMB55-2022', '001', 'N/A', '2022', '12', '48', '0', 'Charge of 2022 for 001', '0', '1', 'US48-2022', '2022-09-16 06:34:29', '-', '-'),
(56, 'PYMB56-2022', '002', 'N/A', '2022', '12', '48', '0', 'Charge of 2022 for 002', '0', '1', 'US48-2022', '2022-09-16 06:34:29', '-', '-'),
(57, 'PYMB57-2022', '003', 'N/A', '2022', '12', '48', '0', 'Charge of 2022 for 003', '0', '1', 'US48-2022', '2022-09-16 06:34:29', '-', '-'),
(58, 'PYMB58-2022', '004', 'N/A', '2022', '12', '48', '0', 'Charge of 2022 for 004', '0', '1', 'US48-2022', '2022-09-16 06:34:29', '-', '-'),
(59, 'PYMB59-2022', '005', 'N/A', '2022', '12', '48', '0', 'Charge of 2022 for 005', '0', '1', 'US48-2022', '2022-09-16 06:34:29', '-', '-'),
(60, 'PYMB60-2022', '006', 'N/A', '2022', '12', '48', '0', 'Charge of 2022 for 006', '0', '1', 'US48-2022', '2022-09-16 06:34:29', '-', '-'),
(61, 'PYMB61-2022', '007', 'N/A', '2022', '12', '48', '0', 'Charge of 2022 for 007', '0', '1', 'US48-2022', '2022-09-16 06:34:29', '-', '-'),
(62, 'PYMB62-2022', '008', 'N/A', '2022', '12', '48', '0', 'Charge of 2022 for 008', '0', '1', 'US48-2022', '2022-09-16 06:34:29', '-', '-'),
(63, 'PYMB63-2022', '009', 'N/A', '2022', '12', '48', '0', 'Charge of 2022 for 009', '0', '1', 'US48-2022', '2022-09-16 06:34:29', '-', '-'),
(64, 'PYMB64-2022', '010', 'N/A', '2022', '12', '48', '0', 'Charge of 2022 for 010', '0', '1', 'US48-2022', '2022-09-16 06:34:29', '-', '-'),
(65, 'PYMB65-2022', '011', 'N/A', '2022', '12', '48', '0', 'Charge of 2022 for 011', '0', '1', 'US48-2022', '2022-09-16 06:34:29', '-', '-'),
(66, 'PYMB66-2022', '012', 'N/A', '2022', '12', '48', '0', 'Charge of 2022 for 012', '0', '1', 'US48-2022', '2022-09-16 06:34:29', '-', '-'),
(67, 'PYMB67-2022', '013', 'N/A', '2022', '12', '48', '0', 'Charge of 2022 for 013', '0', '1', 'US48-2022', '2022-09-16 06:34:29', '-', '-'),
(68, 'PYMB68-2022', '014', 'N/A', '2022', '12', '48', '0', 'Charge of 2022 for 014', '0', '1', 'US48-2022', '2022-09-16 06:34:29', '-', '-'),
(69, 'PYMB69-2022', '015', 'N/A', '2022', '12', '48', '0', 'Charge of 2022 for 015', '0', '1', 'US48-2022', '2022-09-16 06:34:29', '-', '-'),
(70, 'PYMB70-2022', '016', 'N/A', '2022', '12', '48', '0', 'Charge of 2022 for 016', '0', '1', 'US48-2022', '2022-09-16 06:34:29', '-', '-'),
(71, 'PYMB71-2022', '017', 'N/A', '2022', '12', '48', '0', 'Charge of 2022 for 017', '0', '1', 'US48-2022', '2022-09-16 06:34:29', '-', '-'),
(72, 'PYMB72-2022', '018', 'N/A', '2022', '12', '48', '0', 'Charge of 2022 for 018', '0', '1', 'US48-2022', '2022-09-16 06:34:29', '-', '-'),
(73, 'PYMB73-2022', '019', 'N/A', '2022', '12', '48', '0', 'Charge of 2022 for 019', '0', '1', 'US48-2022', '2022-09-16 06:34:29', '-', '-'),
(74, 'PYMB74-2022', '020', 'N/A', '2022', '12', '48', '0', 'Charge of 2022 for 020', '0', '1', 'US48-2022', '2022-09-16 06:34:29', '-', '-'),
(75, 'PYMB75-2022', '021', 'N/A', '2022', '12', '48', '0', 'Charge of 2022 for 021', '0', '1', 'US48-2022', '2022-09-16 06:34:29', '-', '-'),
(76, 'PYMB76-2022', '022', 'N/A', '2022', '12', '48', '0', 'Charge of 2022 for 022', '0', '1', 'US48-2022', '2022-09-16 06:34:29', '-', '-'),
(77, 'PYMB77-2022', '023', 'N/A', '2022', '12', '48', '0', 'Charge of 2022 for 023', '0', '1', 'US48-2022', '2022-09-16 06:34:29', '-', '-'),
(78, 'PYMB78-2022', '024', 'N/A', '2022', '12', '48', '0', 'Charge of 2022 for 024', '0', '1', 'US48-2022', '2022-09-16 06:34:29', '-', '-'),
(79, 'PYMB79-2022', '025', 'N/A', '2022', '12', '48', '0', 'Charge of 2022 for 025', '0', '1', 'US48-2022', '2022-09-16 06:34:29', '-', '-'),
(80, 'PYMB80-2022', '026', 'N/A', '2022', '12', '48', '0', 'Charge of 2022 for 026', '0', '1', 'US48-2022', '2022-09-16 06:34:29', '-', '-'),
(81, 'PYMB81-2022', '027', 'N/A', '2022', '12', '48', '0', 'Charge of 2022 for 027', '0', '1', 'US48-2022', '2022-09-16 06:34:29', '-', '-'),
(82, 'PYMB82-2022', '028', 'N/A', '2022', '12', '48', '0', 'Charge of 2022 for 028', '0', '1', 'US48-2022', '2022-09-16 06:34:29', '-', '-'),
(83, 'PYMB83-2022', '029', 'N/A', '2022', '12', '48', '0', 'Charge of 2022 for 029', '0', '1', 'US48-2022', '2022-09-16 06:34:29', '-', '-'),
(84, 'PYMB84-2022', '030', 'N/A', '2022', '12', '48', '0', 'Charge of 2022 for 030', '0', '1', 'US48-2022', '2022-09-16 06:34:29', '-', '-'),
(85, 'PYMB85-2022', '031', 'N/A', '2022', '12', '48', '0', 'Charge of 2022 for 031', '0', '1', 'US48-2022', '2022-09-16 06:34:29', '-', '-'),
(86, 'PYMB86-2022', '032', 'N/A', '2022', '12', '48', '0', 'Charge of 2022 for 032', '0', '1', 'US48-2022', '2022-09-16 06:34:29', '-', '-'),
(87, 'PYMB87-2022', '033', 'N/A', '2022', '12', '48', '0', 'Charge of 2022 for 033', '0', '1', 'US48-2022', '2022-09-16 06:34:29', '-', '-'),
(88, 'PYMB88-2022', '034', 'N/A', '2022', '12', '48', '0', 'Charge of 2022 for 034', '0', '1', 'US48-2022', '2022-09-16 06:34:29', '-', '-'),
(89, 'PYMB89-2022', '035', 'N/A', '2022', '12', '48', '0', 'Charge of 2022 for 035', '0', '1', 'US48-2022', '2022-09-16 06:34:29', '-', '-'),
(90, 'PYMB90-2022', '036', 'N/A', '2022', '12', '48', '0', 'Charge of 2022 for 036', '0', '1', 'US48-2022', '2022-09-16 06:34:29', '-', '-'),
(91, 'PYMB91-2022', '037', 'N/A', '2022', '12', '48', '0', 'Charge of 2022 for 037', '0', '1', 'US48-2022', '2022-09-16 06:34:29', '-', '-'),
(92, 'PYMB92-2022', '038', 'N/A', '2022', '12', '48', '0', 'Charge of 2022 for 038', '0', '1', 'US48-2022', '2022-09-16 06:34:29', '-', '-'),
(93, 'PYMB93-2022', '039', 'N/A', '2022', '12', '48', '0', 'Charge of 2022 for 039', '0', '1', 'US48-2022', '2022-09-16 06:34:29', '-', '-'),
(94, 'PYMB94-2022', '040', 'N/A', '2022', '12', '48', '0', 'Charge of 2022 for 040', '0', '1', 'US48-2022', '2022-09-16 06:34:29', '-', '-'),
(95, 'PYMB95-2022', '041', 'N/A', '2022', '12', '48', '0', 'Charge of 2022 for 041', '0', '1', 'US48-2022', '2022-09-16 06:34:29', '-', '-'),
(96, 'PYMB96-2022', '043', 'N/A', '2022', '12', '48', '0', 'Charge of 2022 for 043', '0', '1', 'US48-2022', '2022-09-16 06:34:29', '-', '-'),
(97, 'PYMB97-2022', '051', 'N/A', '2022', '12', '48', '0', 'Charge of 2022 for 051', '0', '1', 'US48-2022', '2022-09-16 06:34:29', '-', '-'),
(98, 'PYMB98-2022', '030', 'ACC1-2022', 'N/A', 'N/A', '0', '48', 'sanadka oo dhan', '1', '1', 'US48-2022', '2022-09-20 10:50:53', '-', '-'),
(99, 'PYMB99-2022', '009', 'ACC1-2022', 'N/A', 'N/A', '0', '48', 'sanadka oo dhan', '1', '1', 'US48-2022', '2022-09-20 10:51:44', '-', '-'),
(100, 'PYMB100-2022', '016', 'ACC1-2022', 'N/A', 'N/A', '0', '48', 'sanadka oo dhan', '1', '1', 'US48-2022', '2022-09-20 10:52:42', '-', '-'),
(101, 'PYMB101-2022', '017', 'ACC1-2022', 'N/A', 'N/A', '0', '32', 'sideed bilood', '1', '1', 'US48-2022', '2022-09-20 10:53:33', '-', '-'),
(102, 'PYMB102-2022', '001', 'ACC1-2022', 'N/A', 'N/A', '0', '24', 'sanad ka hafkiis', '1', '1', 'US48-2022', '2022-09-20 10:54:20', '-', '-'),
(103, 'PYMB103-2022', '004', 'ACC1-2022', 'N/A', 'N/A', '0', '20', 'shan bilood', '1', '1', 'US48-2022', '2022-09-20 10:58:14', '-', '-'),
(104, 'PYMB104-2022', '019', 'ACC1-2022', 'N/A', 'N/A', '0', '48', 'sanadka oo dhan', '1', '1', 'US48-2022', '2022-09-20 10:59:57', '-', '-'),
(105, 'PYMB105-2022', '033', 'ACC1-2022', 'N/A', 'N/A', '0', '48', 'sanadka oo dhan', '1', '1', 'US48-2022', '2022-09-20 11:00:44', '-', '-'),
(106, 'PYMB106-2022', '013', 'ACC1-2022', 'N/A', 'N/A', '0', '20', 'shan bil', '1', '1', 'US48-2022', '2022-09-20 11:02:24', '-', '-'),
(107, 'PYMB107-2022', '003', 'ACC1-2022', 'N/A', 'N/A', '0', '20', 'shan bil', '1', '1', 'US48-2022', '2022-09-20 11:03:53', '-', '-'),
(108, 'PYMB108-2022', '028', 'ACC1-2022', 'N/A', 'N/A', '0', '16', 'afar bil', '1', '1', 'US48-2022', '2022-09-20 11:04:53', '-', '-'),
(109, 'PYMB109-2022', '008', 'ACC1-2022', 'N/A', 'N/A', '0', '24', 'sanad hafkiis', '1', '1', 'US48-2022', '2022-09-20 11:08:55', '-', '-'),
(110, 'PYMB110-2022', '043', 'ACC1-2022', 'N/A', 'N/A', '0', '32', 'sideed bilood', '1', '1', 'US48-2022', '2022-09-20 11:11:30', '-', '-'),
(111, 'PYMB111-2022', '042', 'ACC1-2022', 'N/A', 'N/A', '0', '14', 'Jan/Sept', '1', '1', 'US48-2022', '2022-09-20 11:13:40', '-', '-'),
(112, 'PYMB112-2022', '044', 'ACC1-2022', 'N/A', 'N/A', '0', '7', 'Jan/march', '1', '1', 'US48-2022', '2022-09-20 11:15:29', '-', '-'),
(113, 'PYMB113-2022', '049', 'ACC1-2022', 'N/A', 'N/A', '0', '12', 'Jan/Jun', '1', '1', 'US48-2022', '2022-09-20 11:16:30', '-', '-'),
(114, 'PYMB114-2022', '067', 'ACC1-2022', 'N/A', 'N/A', '0', '16', 'Jan/Aug', '1', '1', 'US48-2022', '2022-09-20 11:18:04', '-', '-'),
(115, 'PYMB115-2022', '083', 'ACC1-2022', 'N/A', 'N/A', '0', '16', 'Jan/Aug', '1', '1', 'US48-2022', '2022-09-20 11:19:11', '-', '-'),
(116, 'PYMB116-2022', '070', 'ACC1-2022', 'N/A', 'N/A', '0', '8', 'Jan/Abr', '1', '1', 'US48-2022', '2022-09-20 11:19:54', '-', '-'),
(117, 'PYMB117-2022', '073', 'ACC1-2022', 'N/A', 'N/A', '0', '16', 'Jan/Aug', '1', '1', 'US48-2022', '2022-09-20 11:20:54', '-', '-'),
(118, 'PYMB118-2022', '055', 'ACC1-2022', 'N/A', 'N/A', '0', '16', 'Jan/Aug', '1', '1', 'US48-2022', '2022-09-20 11:23:25', '-', '-'),
(119, 'PYMB119-2022', '069', 'ACC1-2022', 'N/A', 'N/A', '0', '14', 'Jan/July ', '1', '1', 'US48-2022', '2022-09-20 11:24:04', '-', '-'),
(120, 'PYMB120-2022', '071', 'ACC1-2022', 'N/A', 'N/A', '0', '10', 'Jan/may', '1', '1', 'US48-2022', '2022-09-20 11:25:19', '-', '-'),
(121, 'PYMB121-2022', '098', 'N/A', '2022', '12', '24', '0', 'Charge of 2022 for 098', '0', '1', 'US2100002', '2022-09-21 15:57:34', '-', '-'),
(123, 'PYMB122-2022', '004', 'ACC1-2022', 'N/A', 'N/A', '0', '28', 'Jun/Dec2022', '1', '1', 'US48-2022', '2022-09-22 22:18:22', '-', '-');

-- --------------------------------------------------------

--
-- Table structure for table `charge_pay_salaries`
--

CREATE TABLE `charge_pay_salaries` (
  `rowNo` int(11) NOT NULL,
  `salaryChargeID` varchar(50) NOT NULL,
  `empID` varchar(50) NOT NULL,
  `salaryMonth` varchar(100) NOT NULL,
  `accountNoID` varchar(100) NOT NULL,
  `chargedAmount` varchar(30) NOT NULL,
  `paidAmount` varchar(30) NOT NULL,
  `transactionType` varchar(200) NOT NULL,
  `transactionStatus` varchar(100) NOT NULL,
  `salaryDescription` text NOT NULL,
  `registeredBy` varchar(100) NOT NULL,
  `registerDate` varchar(200) NOT NULL,
  `cancelledBy` varchar(100) NOT NULL,
  `cancelDate` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `rowNo` int(11) NOT NULL,
  `department_id` varchar(250) DEFAULT NULL,
  `department_name` varchar(250) DEFAULT NULL,
  `appointment_fee` varchar(50) NOT NULL,
  `registered_by` varchar(250) DEFAULT NULL,
  `register_date` varchar(250) DEFAULT NULL,
  `updated_by` varchar(250) DEFAULT NULL,
  `update_date` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`rowNo`, `department_id`, `department_name`, `appointment_fee`, `registered_by`, `register_date`, `updated_by`, `update_date`) VALUES
(3, 'DP2-2022', 'General Diseases', '10', 'US2100002', '2022-10-01 08:54:00', 'US2100002', '2022-10-01 15:18:35'),
(4, 'DP4-2022', 'Qaliinada Guud', '15', 'US2100002', '2022-10-01 09:21:56', 'US2100002', '2022-12-21 19:36:11'),
(7, 'DP5-2022', 'General Surgery', '10', 'US2100002', '2022-10-06 08:49:28', 'US2100002', '2022-10-06 08:50:07'),
(8, 'DP8-2022', 'Cudurada Maqaarka', '5', 'US2100002', '2022-10-09 10:44:26', '-', '-'),
(9, 'DP9-2022', 'Aniko', '30', 'US2100002', '2022-12-20 12:03:56', 'US2100002', '2022-12-21 19:32:09'),
(10, 'DP10-2022', 'QQQ', '45', 'US2100002', '2022-12-21 18:57:03', 'US2100002', '2022-12-21 19:33:20'),
(11, 'DP11-2022', 'ENG', '2', 'US2100002', '2022-12-21 19:03:52', '-', '-'),
(12, 'DP12-2022', 'X-Ray', '20', 'US2100002', '2022-12-21 19:23:01', '-', '-'),
(13, 'DP13-2022', 'Aniko', '12', 'US2100002', '2022-12-21 19:28:28', 'US2100002', '2022-12-21 19:31:26');

-- --------------------------------------------------------

--
-- Table structure for table `diseases`
--

CREATE TABLE `diseases` (
  `rowNo` int(11) NOT NULL,
  `disease_id` varchar(250) DEFAULT NULL,
  `department_id` varchar(250) DEFAULT NULL,
  `disease_name` varchar(250) DEFAULT NULL,
  `disease_drug` varchar(250) NOT NULL,
  `registered_by` varchar(250) DEFAULT NULL,
  `register_date` varchar(250) DEFAULT NULL,
  `updated_by` varchar(250) DEFAULT NULL,
  `update_date` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `diseases`
--

INSERT INTO `diseases` (`rowNo`, `disease_id`, `department_id`, `disease_name`, `disease_drug`, `registered_by`, `register_date`, `updated_by`, `update_date`) VALUES
(1, 'DIS1-2022', 'DP2-2022', 'Cudurada haweenka', '10 Box Kapsol', 'US2100002', '2022-10-09 09:50:12', 'US2100002', '2022-10-09 12:00:23'),
(3, 'DIS2-2022', 'DP8-2022', 'Maqaarka Dhabarka', 'Bomato jjjj', 'US2100002', '2022-10-09 10:46:01', 'US2100002', '2022-10-09 11:58:26');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `rowNo` int(11) NOT NULL,
  `doctor_id` varchar(250) DEFAULT NULL,
  `doctor_name` varchar(250) DEFAULT NULL,
  `doctor_birth_place` varchar(250) DEFAULT NULL,
  `doctor_dob` varchar(250) DEFAULT NULL,
  `doctor_sex` varchar(250) DEFAULT NULL,
  `doctor_address` varchar(250) DEFAULT NULL,
  `doctor_tell` varchar(250) DEFAULT NULL,
  `doctor_email` varchar(250) DEFAULT NULL,
  `doctor_department` varchar(250) DEFAULT NULL,
  `registered_by` varchar(250) DEFAULT NULL,
  `register_date` varchar(250) DEFAULT NULL,
  `updated_by` varchar(250) DEFAULT NULL,
  `update_date` varchar(250) DEFAULT NULL,
  `doctor_photo` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`rowNo`, `doctor_id`, `doctor_name`, `doctor_birth_place`, `doctor_dob`, `doctor_sex`, `doctor_address`, `doctor_tell`, `doctor_email`, `doctor_department`, `registered_by`, `register_date`, `updated_by`, `update_date`, `doctor_photo`) VALUES
(1, 'DOC1-2022', 'Ali', 'Mogadishu', '1987-11-11', '1', 'Hodan', '7878', 'ali@gmail.com', 'DP4-2022', 'US2100002', '2022-10-01 11:20:56', '-', '-', 'uploads/photos/DOC1-2022_0.png'),
(2, 'DOC2-2022', 'Daud Hassan', 'Kismaayo', '1986-09-09', '1', 'Galmudug', '8989', 'daud@gmail.com', 'DP2-2022', 'US2100002', '2022-10-01 13:46:47', '-', '-', 'undefined');

-- --------------------------------------------------------

--
-- Stand-in structure for view `dp_doctor`
-- (See below for the actual view)
--
CREATE TABLE `dp_doctor` (
`doctor_photo` text
,`rowNo` int(11)
,`doctor_id` varchar(250)
,`doctor_name` varchar(250)
,`Gender` varchar(6)
,`doctor_address` varchar(250)
,`doctor_tell` varchar(250)
,`doctor_email` varchar(250)
,`department_name` varchar(250)
);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `rowNo` int(11) NOT NULL,
  `empID` varchar(50) NOT NULL,
  `empName` varchar(230) NOT NULL,
  `birthPlace` varchar(100) NOT NULL,
  `DOB` varchar(100) NOT NULL,
  `titlePosition` int(11) NOT NULL,
  `salary` varchar(50) NOT NULL,
  `hireDate` varchar(100) NOT NULL,
  `identificationDocType` varchar(100) NOT NULL,
  `address` varchar(250) NOT NULL,
  `telephoneNo` varchar(30) NOT NULL,
  `empEmail` varchar(100) NOT NULL,
  `empStatus` varchar(50) NOT NULL,
  `registeredBy` varchar(100) NOT NULL,
  `registerDate` varchar(100) NOT NULL,
  `updatedBy` varchar(200) NOT NULL,
  `updateDate` varchar(100) NOT NULL,
  `empPhoto` text NOT NULL,
  `identificationDocument` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`rowNo`, `empID`, `empName`, `birthPlace`, `DOB`, `titlePosition`, `salary`, `hireDate`, `identificationDocType`, `address`, `telephoneNo`, `empEmail`, `empStatus`, `registeredBy`, `registerDate`, `updatedBy`, `updateDate`, `empPhoto`, `identificationDocument`) VALUES
(3, 'EM2100001', 'Abdirazak Haji Rashid', 'Bule Burde', '1990-01-01', 0, '0', '2021-01-01', '1', 'Towfiq, Yaqshid, Mogadishu-SOMALIA', '615255925', 'axrashka@gmail.com', '1', '', '2021-09-04 10:28:00', '', '', 'uploads/photos/US2100001_UP.jpg', 'uploads/documents/no-file.png'),
(4, 'EM2100002', 'Ismail Mohamed Jamal', 'Afgoye', '1990-01-01', 0, '0', '2021-01-01', '2', 'Towfiq, Yaqshid, Mogadishu-SOMALIA', '619334444', 'engismailmj@gmail.com', '1', '', '2021-09-04 10:28:00', '', '', 'uploads/photos/EM2100002.png', 'uploads/documents/no-file.png'),
(23, 'EM23-2022', 'Abdirahman Ibrahim Abdi', 'Beled Weyne', '1991-01-01', 2, '0', '2022-08-01', '6', 'Towfiq, Yaaqshiid', '615221534', 'nankeey136@gmail.com', '1', 'US2100002', '2022-09-06 17:00:40', '-', '-', 'uploads/photos/EM23-2022_0.jpg', 'uploads/documents/EM23-2022_0.png'),
(24, 'EM24-2022', 'abdoirahman aweys abdi', 'Addan Yabaal', '1998-07-07', 1, '1000', '2022-09-26', '6', 'karaan', '615375971', 'abdirahman12@gmail.com', '1', 'US2100001', '2022-09-26 21:38:08', 'US2100001', '2022-09-26 21:41:38', 'uploads/photos/EM24-2022_0.jpeg', 'undefined');

-- --------------------------------------------------------

--
-- Table structure for table `exam_catagory`
--

CREATE TABLE `exam_catagory` (
  `rowNo` int(11) NOT NULL,
  `Ex_Cat_ID` varchar(250) NOT NULL,
  `Ex_Cat_Name` varchar(250) NOT NULL,
  `Ex_Cat_Description` varchar(250) NOT NULL,
  `RegisteredBy` varchar(250) NOT NULL,
  `RegisterDate` varchar(250) NOT NULL,
  `UpdatedBy` varchar(250) NOT NULL,
  `UpdateDate` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam_catagory`
--

INSERT INTO `exam_catagory` (`rowNo`, `Ex_Cat_ID`, `Ex_Cat_Name`, `Ex_Cat_Description`, `RegisteredBy`, `RegisterDate`, `UpdatedBy`, `UpdateDate`) VALUES
(1, 'EXC1-2022', 'Blood', 'Malaria', 'US2100002', '2022-12-21 19:57:43', '-', '-'),
(2, 'EXC2-2022', 'Blood', 'Sugar', 'US2100002', '2022-12-21 19:59:25', '-', '-'),
(3, 'EXC3-2022', '12', '43', 'US1-2022', '2022-12-21 21:10:06', '-', '-'),
(4, 'EXC4-2022', 'Blood', 'ahdh', 'US1-2022', '2022-12-21 21:10:06', '-', '-'),
(5, 'EXC5-2022', 'Dhifig', '129', 'US1-2022', '2022-12-21 21:10:06', 'US2100002', '2022-12-21 21:58:59'),
(6, 'EXC6-2022', 'Aniko', 'Koolllo', 'US1-2022', '2022-12-21 21:10:06', 'US2100002', '2022-12-21 21:59:39'),
(7, 'EXC7-2022', 'kfk', '30', 'US1-2022', '2022-12-21 21:10:06', '-', '-'),
(8, 'EXC8-2022', '23', '32', 'US1-2022', '2022-12-21 21:10:06', '-', '-'),
(11, 'EXC11-2022', 'Other', 'ded', 'US2100002', '2022-12-21 21:15:41', '-', '-'),
(12, 'EXC12-2022', 'Blood', '28', 'US2100002', '2022-12-21 21:15:41', '-', '-'),
(13, 'EXC13-2022', 'Amran', 'To', 'US2100002', '2022-12-21 22:00:28', '-', '-');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `rowNo` int(11) NOT NULL,
  `expenseID` varchar(50) NOT NULL,
  `expenseDescription` text NOT NULL,
  `expenseAmount` varchar(30) NOT NULL,
  `accountNoID` varchar(100) NOT NULL,
  `expenseRemarks` varchar(250) NOT NULL,
  `expenseStatus` varchar(200) NOT NULL,
  `registeredBy` varchar(200) NOT NULL,
  `registerDate` varchar(200) NOT NULL,
  `updatedBy` varchar(200) NOT NULL,
  `updateDate` varchar(200) NOT NULL,
  `cancelledBy` varchar(200) NOT NULL,
  `cancelDate` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`rowNo`, `expenseID`, `expenseDescription`, `expenseAmount`, `accountNoID`, `expenseRemarks`, `expenseStatus`, `registeredBy`, `registerDate`, `updatedBy`, `updateDate`, `cancelledBy`, `cancelDate`) VALUES
(1, 'EXP1-2022', 'SHIRKA WADATASHIGA EE URURKA	', '160', 'ACC1-2022', 'hool =$100 boor =35 iyo qalabka xafiiska lacagihii lagu raray $25', '1', 'US48-2022', '2022-09-02 00:00:00', '-', '-', '-', '-'),
(2, 'EXP2-2022', 'CAW/2723926 KULAMO FULINTA+ID IYO CAMERAMAN', '100', 'ACC1-2022', 'cameraman $40  ID= 15members iyo kulan fulinta =$15 ', '1', 'US48-2022', '2022-10-03 00:00:00', '-', '-', '-', '-'),
(3, 'EXP3-2022', 'CAW/2723927 KULAN MASULIYIN OOW LAKULMIY G', '110', 'ACC1-2022', 'Kulan gudomiyaha ururka layeeshay masuliyiin sarsare =50\ngolaha fulinta shirarka bilihii udhaxeyay 10/03 -07/08 = $60', '1', 'US48-2022', '2022-07-08 00:00:00', '-', '-', '-', '-'),
(4, 'EXP4-2022', 'CAW/2723928 REG SYSTEM +MONTH FEE +WABSET', '227', 'ACC1-2022', 'REG SYSTEM =$100, MONTH FEE SYSTEM= $50 iyo WABSET = $77\n', '1', 'US48-2022', '2022-08-13 00:00:00', '-', '-', '-', '-'),
(5, 'EXP5-2022', 'CAW/2723929  SOTES SO+SYSTEM+ID+FULINTA', '133', 'ACC1-2022', 'SOTES.SO=39, SYSTEM month fee=$50 , ID= 10members iyo fulinta $14', '1', 'US48-2022', '2022-09-07 00:00:00', '-', '-', '-', '-');

-- --------------------------------------------------------

--
-- Table structure for table `main_menus`
--

CREATE TABLE `main_menus` (
  `mainMenuID` int(11) NOT NULL,
  `mainMenuText` varchar(250) NOT NULL,
  `mainMenuIcon` varchar(200) NOT NULL,
  `mainMenuURL` varchar(200) NOT NULL,
  `mainMenuMode` varchar(200) NOT NULL,
  `mainMenuRank` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `main_menus`
--

INSERT INTO `main_menus` (`mainMenuID`, `mainMenuText`, `mainMenuIcon`, `mainMenuURL`, `mainMenuMode`, `mainMenuRank`) VALUES
(1, 'Dashboard', 'fa fa-desktop', 'dashboard', '1', 1),
(2, 'Administration', 'fa fa-wrench', '#', '1', 2),
(3, 'Registrations', 'fa fa-save', '#', '1', 3),
(4, 'Finance', 'fa fa-dollar', '#', '1', 6),
(5, 'Reports', 'fa fa-file-text-o', '#', '1', 9),
(6, 'Settings', 'fa fa-gear', '#', '1', 11),
(7, 'Logout', 'fa fa-power-off', 'logout', '1', 12),
(8, 'HRM', 'fa fa-user-secret', '#', '1', 8),
(9, 'Cancelled Actions', 'fa fa-times-rectangle', '#', '1', 10);

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `rowNo` int(11) NOT NULL,
  `patient_id` varchar(250) DEFAULT NULL,
  `patient_name` varchar(250) DEFAULT NULL,
  `patient_age` varchar(250) DEFAULT NULL,
  `patient_sex` varchar(250) DEFAULT NULL,
  `patient_address` varchar(250) DEFAULT NULL,
  `patient_tell` varchar(25) DEFAULT NULL,
  `registered_by` varchar(250) DEFAULT NULL,
  `register_date` varchar(250) DEFAULT NULL,
  `updated_by` varchar(250) DEFAULT NULL,
  `update_date` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`rowNo`, `patient_id`, `patient_name`, `patient_age`, `patient_sex`, `patient_address`, `patient_tell`, `registered_by`, `register_date`, `updated_by`, `update_date`) VALUES
(1, 'PT1-2022', 'Abdullahi Mohamed Hassan', '21', '0', 'Waaberi', '615787878', 'US2100002', '2022-09-29 13:49:58', 'US2100002', '2022-10-08 11:19:42'),
(3, 'PT3-2022', 'Shamso Hassan Ali', '27', '1', 'Hodan', '614897654', 'US2100002', '2022-09-29 13:53:35', '-', '-'),
(4, 'PT4-2022', 'Hassan Mohamed', '32', '0', 'Yaqshiid', '617212345', 'US2100002', '2022-10-05 11:33:15', '-', '-'),
(5, 'PT5-2022', 'Jamiilo Jacfar', '28', '1', 'Shibis', '615789021', 'US2100002', '2022-10-05 11:34:35', 'US2100002', '2022-10-08 11:08:30'),
(6, 'PT6-2022', 'Nuur Xuseen Aadan', '22', '0', 'Xamar Weyne', '618908765', 'US2100002', '2022-10-06 13:00:37', 'US2100002', '2022-10-06 16:19:01');

-- --------------------------------------------------------

--
-- Table structure for table `payment_gateways`
--

CREATE TABLE `payment_gateways` (
  `rowNo` int(11) NOT NULL,
  `gatewayID` varchar(100) NOT NULL,
  `gatewayType` varchar(100) NOT NULL,
  `gatewayName` varchar(250) NOT NULL,
  `registeredBy` varchar(100) NOT NULL,
  `registerDate` varchar(100) NOT NULL,
  `updatedBy` varchar(100) NOT NULL,
  `updateDate` varchar(100) NOT NULL,
  `gatewayLogo` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payment_gateways`
--

INSERT INTO `payment_gateways` (`rowNo`, `gatewayID`, `gatewayType`, `gatewayName`, `registeredBy`, `registerDate`, `updatedBy`, `updateDate`, `gatewayLogo`) VALUES
(1, 'BC1-2022', '1', 'Salaam Somali Bank', 'US2100002', '2022-08-16 16:46:15', '-', '-', 'uploads/photos/BC1-2022_0.jpg'),
(3, 'GTW3-2022', '2', 'Hormuud', 'US2100002', '2022-08-16 20:12:14', '-', '-', 'uploads/photos/GTW3-2022_0.png'),
(4, 'GTW4-2022', '1', 'Premier Bank', 'US2100002', '2022-08-16 20:41:11', '-', '-', 'uploads/photos/GTW4-2022_0.png'),
(5, 'GTW5-2022', '1', 'MyBank Limited', 'US2100002', '2022-08-16 20:41:47', '-', '-', 'uploads/photos/GTW5-2022_0.jpg'),
(6, 'GTW6-2022', '3', 'Cash Payment', 'US2100002', '2022-08-16 22:17:35', '-', '-', 'uploads/photos/GTW6-2022_0.jpg'),
(7, 'GTW7-2022', '2', 'Somtel ', 'US2100002', '2022-08-17 21:39:18', '-', '-', 'uploads/photos/GTW7-2022_0.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sub_menus`
--

CREATE TABLE `sub_menus` (
  `subMenuID` int(11) NOT NULL,
  `subMenuText` varchar(250) NOT NULL,
  `subMenuIcon` varchar(200) NOT NULL,
  `subMenuURL` varchar(200) NOT NULL,
  `mainMenuID` varchar(200) NOT NULL,
  `subMenuMode` varchar(200) NOT NULL,
  `subMenuRank` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sub_menus`
--

INSERT INTO `sub_menus` (`subMenuID`, `subMenuText`, `subMenuIcon`, `subMenuURL`, `mainMenuID`, `subMenuMode`, `subMenuRank`) VALUES
(1, 'System Menus', 'fa fa-angle-double-right', 'system-menus', '2', '0', 2),
(2, 'Users', 'fa fa-angle-double-right', 'system-users', '2', '1', 5),
(3, 'User Logins', 'fa fa-angle-double-right', 'user-logins', '2', '0', 6),
(4, 'Online Users', 'fa fa-angle-double-right', 'online-users', '2', '0', 7),
(5, 'User Privileges', 'fa fa-angle-double-right', 'user-privileges', '2', '1', 8),
(6, 'Employees', 'fa fa-angle-double-right', 'employees', '8', '1', 1),
(7, 'Charge Salaries', 'fa fa-angle-double-right', 'charge-salaries', '8', '1', 2),
(8, 'Charges Salaries List', 'fa fa-angle-double-right', 'charged-salaries-list', '8', '1', 3),
(9, 'Salary Payments', 'fa fa-angle-double-right', 'employee-salaries', '8', '1', 4),
(11, 'Employees Report', 'fa fa-angle-double-right', 'employees-report', '5', '1', 13),
(12, 'Salary Charges Report', 'fa fa-angle-double-right', 'charged-salaries-report', '5', '1', 14),
(13, 'Salary Payments Report', 'fa fa-angle-double-right', 'salary-payments-report', '5', '1', 15),
(14, 'Expenses Report', 'fa fa-angle-double-right', 'expenses-report', '5', '1', 16),
(22, 'Accounts', 'fa fa-angle-double-right', 'account-numbers', '2', '1', 4),
(29, 'Change Password', 'fa fa-angle-double-right', '#', '6', '1', 1),
(30, 'Backup', 'fa fa-angle-double-right', '#', '6', '1', 3),
(33, 'Members Report', 'fa fa-angle-double-right', 'members-report', '5', '1', 3),
(34, 'Member Payments Report', 'fa fa-angle-double-right', 'member-payments-report', '5', '1', 9),
(50, '2-Step Verification', 'fa fa-angle-double-right', '#', '6', '1', 2),
(65, 'Cancelled Expenses', 'fa fa-angle-double-right', 'cancelled-expenses', '9', '1', 7),
(66, 'Cancelled Salary Charges', 'fa fa-angle-double-right', 'cancelled-salary-charges', '9', '1', 5),
(67, 'Cancelled Salary Payment', 'fa fa-angle-double-right', 'cancelled-salary-payments', '9', '1', 6),
(68, 'Account Statement', 'fa fa-angle-double-right', 'account-statement', '5', '1', 11),
(70, 'Account Balances', 'fa fa-angle-double-right', 'account-balances', '5', '1', 10),
(71, 'Member Charges Report', 'fa fa-angle-double-right', 'member-charges-report', '5', '1', 8),
(73, 'Cancelled Transactions', 'fa fa-angle-double-right', 'cancelled-transactions', '9', '1', 2),
(75, 'Payment Gateways', 'fa fa-angle-double-right', 'payment-gateways', '2', '0', 3),
(76, 'Account Transactions', 'fa fa-angle-double-right', 'account-transactions', '4', '1', 17),
(77, 'System Configuration', 'fa fa-angle-double-right', 'system-configurations', '2', '0', 1),
(86, 'Member Payments', 'fa fa-angle-double-right', 'member-payments', '4', '1', 20),
(87, 'Contribution Charges', 'fa fa-angle-double-right', 'contribution-charges', '4', '1', 18),
(88, 'Charged Contributions', 'fa fa-angle-double-right', 'charged-contributions', '4', '1', 19),
(89, 'Expenses', 'fa fa-angle-double-right', 'expenses', '4', '1', 21),
(95, 'Cancelled Member Payments', 'fa fa-angle-double-right', 'cancelled-member-payments', '9', '1', 4),
(96, 'Cancelled Contributions ', 'fa fa-angle-double-right', 'cancelled-charged-contributions', '9', '1', 3),
(106, 'Patients', 'fa fa-angle-double-right', 'patients', '3', '1', 9),
(107, 'Doctors', 'fa fa-angle-double-right', 'doctors', '3', '1', 8),
(108, 'Departments', 'fa fa-angle-double-right', 'departments', '3', '1', 7),
(109, 'Appointments', 'fa fa-angle-double-right', 'appointments', '3', '1', 10),
(111, 'Patients-Report', 'fa fa-angle-double-right', 'patients_report', '5', '1', 17),
(113, 'Exam Catagories', 'fa fa-angle-double-right', 'exam_catagories', '3', '1', 11),
(114, 'Lab Test', 'fa fa-angle-double-right', 'lab_test', '3', '1', 12);

-- --------------------------------------------------------

--
-- Table structure for table `system_configurations`
--

CREATE TABLE `system_configurations` (
  `systemID` varchar(200) NOT NULL,
  `systemFavIcon` text NOT NULL,
  `systemName` varchar(250) NOT NULL,
  `loginPageImage` text NOT NULL,
  `headerLogo` text NOT NULL,
  `dashboardHeader` varchar(250) NOT NULL,
  `reportsHeaderImage` text NOT NULL,
  `footerCaption` varchar(250) NOT NULL,
  `systemVersion` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `system_configurations`
--

INSERT INTO `system_configurations` (`systemID`, `systemFavIcon`, `systemName`, `loginPageImage`, `headerLogo`, `dashboardHeader`, `reportsHeaderImage`, `footerCaption`, `systemVersion`) VALUES
('SYS2-2022', 'uploads/photos/SYS2-2022_0.png', 'Adeega Daryeel', 'uploads/photos/smallinst.png', 'img/al-abaadir.png', 'fa fa-ambulance*#*#*#ADEEGA DARYEEL ', 'img/reportHeader.png', '<strong>Adeega Daryeel</strong> (Hospital Management System)', 'Version 1.0');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `rowNo` int(11) NOT NULL,
  `userID` varchar(100) NOT NULL,
  `empID` varchar(100) NOT NULL,
  `userName` varchar(100) NOT NULL,
  `password` varchar(30) NOT NULL,
  `twoStepVerification` varchar(200) NOT NULL,
  `verificationCode` varchar(200) NOT NULL,
  `userStatus` varchar(100) NOT NULL,
  `registeredBy` varchar(200) NOT NULL,
  `registerDate` varchar(100) NOT NULL,
  `updatedBy` varchar(200) NOT NULL,
  `updateDate` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`rowNo`, `userID`, `empID`, `userName`, `password`, `twoStepVerification`, `verificationCode`, `userStatus`, `registeredBy`, `registerDate`, `updatedBy`, `updateDate`) VALUES
(1, 'US2100001', 'EM2100001', 'Haaji', '255925', 'Disabled', 'M-332158', 'Offline', '', '2021-09-04 10:28:00', '', 'Super Admin'),
(2, 'US2100002', 'EM2100002', 'Waaberi', '1122', 'Disabled', 'M-150971', 'Online', '', '2021-09-04 10:28:00', '', 'Super Admin'),
(48, 'US48-2022', 'EM23-2022', 'Maankeey', 'mankeey136143', 'Disabled', 'M-23CT6YH7', 'Offline', 'US2100002', '2022-09-06 17:04:02', '-', '-'),
(49, 'US49-2022', 'EM24-2022', 'Black', '1122', 'Disabled', 'M-286238', 'Online', 'US2100001', '2022-09-26 21:40:06', '-', '-'),
(50, 'US50-2022', 'EM23-2022', 'ibraahim', '2525', 'Disabled', 'M-23CT6YH7', 'Offline', 'US2100001', '2022-09-28 13:25:04', '-', '-'),
(53, 'US51-2022', 'EM23-2022', 'Osoble', '12', 'Disabled', 'M-23CT6YH7', 'Offline', 'US2100002', '2022-12-21 23:37:46', '-', '-'),
(56, 'US54-2022', 'EM24-2022', 'Niiniile', '12', 'Disabled', 'M-23CT6YH7', 'Offline', 'US2100002', '2022-12-21 23:51:34', '-', '-'),
(64, 'US57-2022', 'EM23-2022', 'Ahmed', '12', 'Disabled', 'M-23CT6YH7', 'Offline', 'US2100002', '2022-12-22 06:20:14', '-', '-');

-- --------------------------------------------------------

--
-- Table structure for table `user_logins`
--

CREATE TABLE `user_logins` (
  `loginID` int(11) NOT NULL,
  `userID` varchar(50) NOT NULL,
  `loginDateTime` varchar(200) NOT NULL,
  `logoutDateTime` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_logins`
--

INSERT INTO `user_logins` (`loginID`, `userID`, `loginDateTime`, `logoutDateTime`) VALUES
(1, 'US2100002', '2022-08-27 13:49:23', '2022-08-27 15:26:57'),
(2, 'US2100002', '2022-08-27 15:26:59', '2022-08-27 15:42:15'),
(3, 'US2100002', '2022-08-27 15:42:17', ''),
(4, 'US2100002', '2022-08-27 18:33:29', ''),
(5, 'US2100002', '2022-08-28 15:48:49', ''),
(6, 'US2100002', '2022-08-29 05:24:22', ''),
(7, 'US2100002', '2022-08-29 11:34:15', '2022-08-29 14:29:46'),
(8, 'US2100002', '2022-08-29 14:44:07', ''),
(9, 'US2100002', '2022-08-29 20:34:43', '2022-08-29 21:27:16'),
(10, 'US2100002', '2022-08-29 21:27:39', '2022-08-29 21:27:52'),
(11, 'US2100002', '2022-08-29 21:28:05', ''),
(12, 'US2100002', '2022-08-29 22:05:13', ''),
(13, 'US2100002', '2022-08-30 11:25:50', ''),
(14, 'US2100002', '2022-08-30 18:15:12', '2022-08-30 21:51:46'),
(15, 'US2100002', '2022-08-30 21:51:49', '2022-08-30 22:03:08'),
(16, 'US2100002', '2022-08-30 22:03:16', '2022-08-30 22:10:25'),
(17, 'US2100002', '2022-08-30 22:21:02', ''),
(18, 'US2100002', '2022-08-30 23:13:28', ''),
(19, 'US2100002', '2022-08-31 11:15:07', '2022-08-31 12:32:20'),
(20, 'US41-2022', '2022-08-31 11:18:44', '2022-08-31 11:18:44'),
(21, 'US41-2022', '2022-08-31 11:20:17', '2022-08-31 11:20:46'),
(22, 'US41-2022', '2022-08-31 11:20:55', '2022-08-31 11:20:57'),
(23, 'US3-2022', '2022-08-31 11:21:14', ''),
(24, 'US46-2022', '2022-08-31 11:28:50', '2022-08-31 11:33:24'),
(25, 'US47-2022', '2022-08-31 11:33:30', ''),
(26, 'US2100002', '2022-08-31 13:06:50', ''),
(27, 'US2100002', '2022-08-31 19:25:59', ''),
(28, 'US2100002', '2022-09-02 16:10:40', '2022-09-02 16:10:44'),
(29, 'US2100002', '2022-09-02 16:10:47', '2022-09-02 16:10:51'),
(30, 'US2100002', '2022-09-02 23:16:19', '2022-09-03 00:27:26'),
(31, 'US2100002', '2022-09-03 00:28:59', '2022-09-03 00:29:04'),
(32, 'US2100002', '2022-09-03 00:32:05', '2022-09-03 00:32:09'),
(33, 'US2100002', '2022-09-03 00:36:42', '2022-09-03 00:37:34'),
(34, 'US2100002', '2022-09-03 00:39:13', '2022-09-03 00:39:17'),
(35, 'US2100002', '2022-09-03 07:49:33', '2022-09-03 07:50:06'),
(36, 'US2100002', '2022-09-03 07:51:10', '2022-09-03 07:51:19'),
(37, 'US2100002', '2022-09-04 11:39:26', ''),
(38, 'US2100002', '2022-09-04 14:22:24', '2022-09-04 14:23:30'),
(39, 'US2100002', '2022-09-04 14:27:28', '2022-09-04 14:28:28'),
(40, 'US2100002', '2022-09-04 14:36:44', '2022-09-04 14:36:48'),
(41, 'US2100002', '2022-09-04 15:20:00', ''),
(42, 'US2100002', '2022-09-04 15:22:06', '2022-09-04 15:22:10'),
(43, 'US2100002', '2022-09-04 15:22:14', '2022-09-04 15:22:23'),
(44, 'US2100002', '2022-09-04 15:22:29', '2022-09-04 15:22:33'),
(45, 'US2100002', '2022-09-04 15:22:36', '2022-09-04 15:24:34'),
(46, 'US2100002', '2022-09-04 15:25:02', '2022-09-04 15:25:54'),
(47, 'US2100002', '2022-09-04 15:25:56', '2022-09-04 16:01:08'),
(48, 'US2100002', '2022-09-04 16:21:46', '2022-09-04 16:22:20'),
(49, 'US2100002', '2022-09-04 21:49:51', ''),
(50, 'US2100002', '2022-09-05 01:25:24', ''),
(51, 'US2100002', '2022-09-05 09:48:50', '2022-09-05 09:52:29'),
(52, 'US2100002', '2022-09-05 10:16:14', '2022-09-05 10:21:48'),
(53, 'US46-2022', '2022-09-05 12:42:01', '2022-09-05 12:42:06'),
(54, 'US46-2022', '2022-09-05 12:42:51', '2022-09-05 12:43:01'),
(55, 'US46-2022', '2022-09-05 12:44:28', '2022-09-05 12:47:53'),
(56, 'US2100002', '2022-09-05 12:48:13', ''),
(57, 'US2100002', '2022-09-06 15:42:49', '2022-09-06 16:16:37'),
(58, 'US2100002', '2022-09-06 16:58:47', '2022-09-06 17:07:21'),
(59, 'US48-2022', '2022-09-06 17:07:33', ''),
(60, 'US48-2022', '2022-09-07 14:22:06', '2022-09-07 15:02:34'),
(61, 'US48-2022', '2022-09-07 15:04:29', '2022-09-07 15:15:16'),
(62, 'US48-2022', '2022-09-07 15:17:52', '2022-09-07 15:59:34'),
(63, 'US2100002', '2022-09-08 12:54:17', ''),
(64, 'US2100001', '2022-09-08 13:07:16', ''),
(65, 'US2100001', '2022-09-08 13:08:13', ''),
(66, 'US2100001', '2022-09-08 13:22:24', '2022-09-08 13:22:54'),
(67, 'US48-2022', '2022-09-08 13:23:04', ''),
(68, 'US48-2022', '2022-09-08 13:31:42', ''),
(69, 'US48-2022', '2022-09-10 09:37:29', ''),
(70, 'US48-2022', '2022-09-12 10:45:19', '2022-09-12 10:46:10'),
(71, 'US48-2022', '2022-09-12 10:48:54', ''),
(72, 'US48-2022', '2022-09-12 10:56:45', ''),
(73, 'US48-2022', '2022-09-12 10:58:05', ''),
(74, 'US48-2022', '2022-09-12 13:59:02', '2022-09-12 14:16:28'),
(75, 'US48-2022', '2022-09-12 14:18:56', ''),
(76, 'US48-2022', '2022-09-13 10:02:37', ''),
(77, 'US2100001', '2022-09-13 16:03:44', '2022-09-13 16:06:26'),
(78, 'US48-2022', '2022-09-15 07:25:36', ''),
(79, 'US2100002', '2022-09-15 08:29:10', '2022-09-15 08:29:55'),
(80, 'US48-2022', '2022-09-15 08:30:05', '2022-09-15 08:43:17'),
(81, 'US2100002', '2022-09-15 08:43:32', '2022-09-15 08:45:38'),
(82, 'US2100002', '2022-09-15 08:45:52', ''),
(83, 'US2100002', '2022-09-15 15:29:00', '2022-09-15 15:29:15'),
(84, 'US2100002', '2022-09-15 20:01:53', '2022-09-16 06:31:55'),
(85, 'US48-2022', '2022-09-16 06:32:04', '2022-09-16 09:10:16'),
(86, 'US48-2022', '2022-09-16 09:10:18', '2022-09-16 16:00:00'),
(87, 'US2100002', '2022-09-16 16:00:05', ''),
(88, 'US2100002', '2022-09-17 19:04:18', '2022-09-17 19:04:33'),
(89, 'US48-2022', '2022-09-18 13:34:47', ''),
(90, 'US2100002', '2022-09-19 11:08:40', ''),
(91, 'US48-2022', '2022-09-19 16:26:59', ''),
(92, 'US48-2022', '2022-09-20 09:33:00', ''),
(93, 'US48-2022', '2022-09-20 10:41:10', ''),
(94, 'US2100002', '2022-09-20 16:36:27', ''),
(95, 'US48-2022', '2022-09-20 19:57:54', ''),
(96, 'US48-2022', '2022-09-21 08:52:28', '2022-09-21 08:57:23'),
(97, 'US2100002', '2022-09-21 11:22:17', ''),
(98, 'US2100002', '2022-09-21 11:36:16', '2022-09-21 14:46:43'),
(99, 'US48-2022', '2022-09-21 12:25:56', ''),
(100, 'US2100002', '2022-09-21 14:46:53', '2022-09-21 16:10:05'),
(101, 'US2100002', '2022-09-21 21:42:44', ''),
(102, 'US48-2022', '2022-09-22 07:01:13', ''),
(103, 'US48-2022', '2022-09-22 11:09:38', '2022-09-22 12:00:31'),
(104, 'US2100001', '2022-09-22 11:52:08', '2022-09-22 11:55:18'),
(105, 'US2100001', '2022-09-22 12:32:06', '2022-09-22 12:33:28'),
(106, 'US48-2022', '2022-09-22 12:56:59', ''),
(107, 'US2100001', '2022-09-22 13:04:20', '2022-09-22 13:06:30'),
(108, 'US2100001', '2022-09-22 13:22:33', '2022-09-22 14:26:53'),
(109, 'US48-2022', '2022-09-22 13:43:48', ''),
(110, 'US48-2022', '2022-09-22 13:58:51', '2022-09-22 14:44:02'),
(111, 'US2100002', '2022-09-22 15:33:31', ''),
(112, 'US2100002', '2022-09-22 15:54:50', '2022-09-22 16:08:43'),
(113, 'US48-2022', '2022-09-22 16:09:15', '2022-09-22 16:10:21'),
(114, 'US48-2022', '2022-09-22 22:12:15', ''),
(115, 'US48-2022', '2022-09-23 10:46:30', ''),
(116, 'US48-2022', '2022-09-23 13:06:16', ''),
(117, 'US48-2022', '2022-09-24 18:59:00', ''),
(118, 'US2100002', '2022-09-25 08:25:38', '2022-09-25 08:26:35'),
(119, 'US48-2022', '2022-09-26 08:58:12', '2022-09-26 08:58:13'),
(120, 'US2100001', '2022-09-26 08:58:15', ''),
(121, 'US48-2022', '2022-09-26 11:31:31', '2022-09-26 11:31:31'),
(122, 'US48-2022', '2022-09-26 11:32:20', '2022-09-26 11:32:20'),
(123, 'US2100002', '2022-09-26 11:33:35', ''),
(124, 'US2100001', '2022-09-26 11:35:11', ''),
(125, 'US2100001', '2022-09-26 13:14:42', ''),
(126, 'US2100001', '2022-09-26 13:22:25', ''),
(127, 'US2100001', '2022-09-26 21:32:24', ''),
(128, 'US2100001', '2022-09-27 08:53:04', ''),
(129, 'US2100001', '2022-09-27 10:29:21', '2022-09-27 10:48:43'),
(130, 'US2100001', '2022-09-27 10:51:41', ''),
(131, 'US2100001', '2022-09-27 12:54:25', '2022-09-28 11:10:12'),
(132, 'US2100001', '2022-09-28 11:10:15', '2022-09-28 12:49:33'),
(133, 'US2100001', '2022-09-28 12:49:35', '2022-09-28 13:00:28'),
(134, 'US2100001', '2022-09-28 13:02:56', ''),
(135, 'US2100001', '2022-09-28 13:11:24', '2022-09-28 13:26:04'),
(136, 'US50-2022', '2022-09-28 13:26:19', '2022-09-28 13:26:19'),
(137, 'US2100001', '2022-09-28 13:26:24', '2022-09-28 13:26:44'),
(138, 'US2100001', '2022-09-28 13:27:16', ''),
(139, 'US2100001', '2022-09-28 15:52:31', '2022-09-28 16:08:46'),
(140, 'US49-2022', '2022-09-28 15:55:36', '2022-09-28 15:55:41'),
(141, 'US49-2022', '2022-09-28 15:56:07', ''),
(142, 'US49-2022', '2022-09-28 16:08:51', '2022-09-28 16:42:41'),
(143, 'US2100001', '2022-09-28 16:42:45', '2022-12-21 23:25:45'),
(144, 'US49-2022', '2022-09-28 16:43:47', '2022-09-29 09:20:29'),
(145, 'US49-2022', '2022-09-29 09:20:32', ''),
(146, 'US49-2022', '2022-09-29 11:51:59', '2022-09-29 11:58:41'),
(147, 'US49-2022', '2022-09-29 11:59:52', ''),
(148, 'US49-2022', '2022-09-29 12:35:33', ''),
(149, 'US2100002', '2022-09-29 13:02:22', '2022-09-29 13:03:03'),
(150, 'US2100002', '2022-09-29 13:04:26', ''),
(151, 'US2100002', '2022-09-29 14:53:23', ''),
(152, 'US2100002', '2022-10-01 08:27:22', ''),
(153, 'US2100002', '2022-10-01 09:12:21', '2022-10-01 10:19:13'),
(154, 'US2100002', '2022-10-01 10:19:18', ''),
(155, 'US2100002', '2022-10-01 10:19:54', ''),
(156, 'US2100002', '2022-10-01 10:20:37', ''),
(157, 'US2100002', '2022-10-01 10:25:07', ''),
(158, 'US2100002', '2022-10-01 12:23:50', '2022-10-01 13:05:01'),
(159, 'US2100002', '2022-10-01 13:05:06', ''),
(160, 'US2100002', '2022-10-01 13:18:24', ''),
(161, 'US2100002', '2022-10-01 15:18:31', ''),
(162, 'US2100002', '2022-10-05 09:31:10', ''),
(163, 'US2100002', '2022-10-05 11:27:32', ''),
(164, 'US2100002', '2022-10-06 08:30:36', ''),
(165, 'US2100002', '2022-10-06 13:39:05', ''),
(166, 'US2100002', '2022-10-06 14:54:32', ''),
(167, 'US2100002', '2022-10-09 08:47:41', ''),
(168, 'US2100002', '2022-12-08 16:23:01', '2022-12-08 16:23:44'),
(169, 'US2100002', '2022-12-17 12:30:20', '2022-12-17 12:59:02'),
(170, 'US2100002', '2022-12-17 13:05:27', '2022-12-17 13:07:34'),
(171, 'US2100002', '2022-12-17 13:08:26', '2022-12-17 13:08:29'),
(172, 'US2100002', '2022-12-17 13:09:42', '2022-12-17 16:14:28'),
(173, 'US2100002', '2022-12-17 16:21:41', '2022-12-18 07:45:43'),
(174, 'US2100002', '2022-12-18 07:49:06', ''),
(175, 'US2100002', '2022-12-18 07:49:29', ''),
(176, 'US2100002', '2022-12-18 11:07:11', '2022-12-19 07:49:16'),
(177, 'US2100002', '2022-12-20 11:54:51', '2022-12-21 18:53:54'),
(178, 'US2100002', '2022-12-21 18:54:03', ''),
(179, 'US2100002', '2022-12-21 18:56:46', '2022-12-21 19:35:40'),
(180, 'US2100002', '2022-12-21 19:35:49', ''),
(181, 'US2100002', '2022-12-21 21:13:15', ''),
(182, 'US2100002', '2022-12-21 23:26:06', ''),
(183, 'US2100002', '2022-12-22 06:13:43', ''),
(184, 'US2100002', '2022-12-22 06:47:47', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_main_menus`
--

CREATE TABLE `user_main_menus` (
  `userMainMenuID` int(11) NOT NULL,
  `userID` varchar(50) NOT NULL,
  `mainMenuID` int(11) NOT NULL,
  `mainMenuMode` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_main_menus`
--

INSERT INTO `user_main_menus` (`userMainMenuID`, `userID`, `mainMenuID`, `mainMenuMode`) VALUES
(304, 'US48-2022', 1, '1'),
(305, 'US48-2022', 2, '1'),
(306, 'US48-2022', 3, '1'),
(307, 'US48-2022', 4, '1'),
(308, 'US48-2022', 5, '1'),
(309, 'US48-2022', 6, '1'),
(310, 'US48-2022', 7, '1'),
(311, 'US48-2022', 8, '1'),
(312, 'US48-2022', 9, '1'),
(314, 'US49-2022', 1, '1'),
(315, 'US49-2022', 2, '1'),
(316, 'US49-2022', 3, '1'),
(317, 'US49-2022', 4, '1'),
(318, 'US49-2022', 5, '1'),
(319, 'US49-2022', 6, '1'),
(320, 'US49-2022', 7, '1'),
(321, 'US49-2022', 8, '1'),
(322, 'US49-2022', 9, '1'),
(326, 'US50-2022', 1, '1'),
(327, 'US50-2022', 2, '1'),
(328, 'US50-2022', 3, '1'),
(329, 'US50-2022', 4, '1'),
(330, 'US50-2022', 5, '1'),
(331, 'US50-2022', 6, '1'),
(332, 'US50-2022', 7, '1'),
(333, 'US50-2022', 8, '1'),
(334, 'US50-2022', 9, '1'),
(337, 'US51-2022', 1, '1'),
(338, 'US51-2022', 2, '1'),
(339, 'US51-2022', 3, '1'),
(340, 'US51-2022', 4, '1'),
(341, 'US51-2022', 5, '1'),
(342, 'US51-2022', 6, '1'),
(343, 'US51-2022', 7, '1'),
(344, 'US51-2022', 8, '1'),
(345, 'US51-2022', 9, '1'),
(346, 'US54-2022', 1, '1'),
(347, 'US54-2022', 2, '1'),
(348, 'US54-2022', 3, '1'),
(349, 'US54-2022', 4, '1'),
(350, 'US54-2022', 5, '1'),
(351, 'US54-2022', 6, '1'),
(352, 'US54-2022', 7, '1'),
(353, 'US54-2022', 8, '1'),
(354, 'US54-2022', 9, '1'),
(355, 'US57-2022', 1, '1'),
(356, 'US57-2022', 2, '1'),
(357, 'US57-2022', 3, '1'),
(358, 'US57-2022', 4, '1'),
(359, 'US57-2022', 5, '1'),
(360, 'US57-2022', 6, '1'),
(361, 'US57-2022', 7, '1'),
(362, 'US57-2022', 8, '1'),
(363, 'US57-2022', 9, '1');

-- --------------------------------------------------------

--
-- Table structure for table `user_role_privileges`
--

CREATE TABLE `user_role_privileges` (
  `roleID` int(11) NOT NULL,
  `userID` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `roleName` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `insertRole` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `updateRole` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `deleteRole` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_role_privileges`
--

INSERT INTO `user_role_privileges` (`roleID`, `userID`, `roleName`, `insertRole`, `updateRole`, `deleteRole`) VALUES
(1, 'US3-2022', 'accounts_numbers', '1', '1', '1'),
(2, 'US3-2022', 'bookings', '1', '1', '1'),
(3, 'US3-2022', 'charge_pay_salaries', '1', '1', '1'),
(4, 'US3-2022', 'customer_payments', '1', '1', '1'),
(5, 'US3-2022', 'customers', '1', '1', '1'),
(6, 'US3-2022', 'employees', '1', '1', '1'),
(7, 'US3-2022', 'expenses', '1', '1', '1'),
(8, 'US3-2022', 'financial_transactions', '1', '1', '1'),
(9, 'US3-2022', 'users', '1', '1', '1'),
(10, 'US41-2022', 'accounts_numbers', '1', '1', '1'),
(11, 'US41-2022', 'bookings', '1', '1', '1'),
(12, 'US41-2022', 'charge_pay_salaries', '1', '1', '1'),
(13, 'US41-2022', 'customer_payments', '1', '1', '1'),
(14, 'US41-2022', 'customers', '1', '1', '1'),
(15, 'US41-2022', 'employees', '1', '1', '1'),
(16, 'US41-2022', 'expenses', '1', '1', '1'),
(17, 'US41-2022', 'financial_transactions', '1', '1', '1'),
(18, 'US41-2022', 'users', '1', '1', '1'),
(19, 'US41-2022', 'accounts_numbers', '1', '1', '1'),
(20, 'US41-2022', 'bookings', '1', '1', '1'),
(21, 'US41-2022', 'charge_pay_salaries', '1', '1', '1'),
(22, 'US41-2022', 'customer_payments', '1', '1', '1'),
(23, 'US41-2022', 'customers', '1', '1', '1'),
(24, 'US41-2022', 'employees', '1', '1', '1'),
(25, 'US41-2022', 'expenses', '1', '1', '1'),
(26, 'US41-2022', 'financial_transactions', '1', '1', '1'),
(27, 'US41-2022', 'payment_gateways', '1', '1', '1'),
(28, 'US41-2022', 'users', '1', '1', '1'),
(29, 'US43-2022', 'account_numbers', '1', '1', '1'),
(30, 'US43-2022', 'account_transactions', '1', '1', '1'),
(31, 'US43-2022', 'bookings', '1', '1', '1'),
(32, 'US43-2022', 'charge_pay_salaries', '1', '1', '1'),
(33, 'US43-2022', 'customer_payments', '1', '1', '1'),
(34, 'US43-2022', 'customers', '1', '1', '1'),
(35, 'US43-2022', 'employees', '1', '1', '1'),
(36, 'US43-2022', 'expenses', '1', '1', '1'),
(37, 'US43-2022', 'financial_transactions', '1', '1', '1'),
(38, 'US43-2022', 'users', '1', '1', '1'),
(39, 'US43-2022', 'account_numbers', '1', '1', '1'),
(40, 'US43-2022', 'account_transactions', '1', '1', '1'),
(41, 'US43-2022', 'branches', '1', '1', '1'),
(42, 'US43-2022', 'charge_pay_customers', '1', '1', '1'),
(43, 'US43-2022', 'charge_pay_salaries', '1', '1', '1'),
(44, 'US43-2022', 'customers', '1', '1', '1'),
(45, 'US43-2022', 'customer_terminations', '1', '1', '1'),
(46, 'US43-2022', 'employees', '1', '1', '1'),
(47, 'US43-2022', 'expenses', '1', '1', '1'),
(48, 'US43-2022', 'general_basic_rate', '1', '1', '1'),
(49, 'US43-2022', 'system_configurations', '1', '1', '1'),
(50, 'US43-2022', 'users', '1', '1', '1'),
(51, 'US43-2022', 'zones', '1', '1', '1'),
(52, 'US43-2022', 'account_numbers', '1', '1', '1'),
(53, 'US43-2022', 'account_transactions', '1', '1', '1'),
(54, 'US43-2022', 'charge_pay_contributions', '1', '1', '1'),
(55, 'US43-2022', 'charge_pay_salaries', '1', '1', '1'),
(56, 'US43-2022', 'contribution_types', '1', '1', '1'),
(57, 'US43-2022', 'customer_terminations', '1', '1', '1'),
(58, 'US43-2022', 'employees', '1', '1', '1'),
(59, 'US43-2022', 'expenses', '1', '1', '1'),
(60, 'US43-2022', 'members', '1', '1', '1'),
(61, 'US43-2022', 'member_logins', '1', '1', '1'),
(62, 'US43-2022', 'member_menus', '1', '1', '1'),
(63, 'US43-2022', 'member_privileges', '1', '1', '1'),
(64, 'US43-2022', 'system_configurations', '1', '1', '1'),
(65, 'US43-2022', 'users', '1', '1', '1'),
(66, 'US46-2022', 'account_numbers', '0', '0', '0'),
(67, 'US46-2022', 'account_transactions', '0', '0', '0'),
(68, 'US46-2022', 'charge_pay_contributions', '0', '0', '0'),
(69, 'US46-2022', 'charge_pay_salaries', '0', '0', '0'),
(70, 'US46-2022', 'contribution_types', '0', '0', '0'),
(71, 'US46-2022', 'customer_terminations', '0', '0', '0'),
(72, 'US46-2022', 'employees', '0', '0', '0'),
(73, 'US46-2022', 'expenses', '0', '0', '0'),
(74, 'US46-2022', 'members', '0', '0', '0'),
(75, 'US46-2022', 'member_logins', '0', '0', '0'),
(76, 'US46-2022', 'member_menus', '0', '0', '0'),
(77, 'US46-2022', 'member_privileges', '0', '0', '0'),
(78, 'US46-2022', 'system_configurations', '0', '0', '0'),
(79, 'US46-2022', 'users', '0', '0', '0'),
(80, 'US47-2022', 'account_numbers', '0', '0', '0'),
(81, 'US47-2022', 'account_transactions', '0', '0', '0'),
(82, 'US47-2022', 'charge_pay_contributions', '0', '0', '0'),
(83, 'US47-2022', 'charge_pay_salaries', '0', '0', '0'),
(84, 'US47-2022', 'contribution_types', '1', '1', '1'),
(85, 'US47-2022', 'employees', '0', '0', '0'),
(86, 'US47-2022', 'expenses', '0', '0', '0'),
(87, 'US47-2022', 'members', '0', '0', '0'),
(88, 'US47-2022', 'member_logins', '0', '0', '0'),
(89, 'US47-2022', 'member_menus', '0', '0', '0'),
(90, 'US47-2022', 'member_privileges', '0', '0', '0'),
(91, 'US47-2022', 'users', '0', '0', '0'),
(92, 'US48-2022', 'account_numbers', '1', '1', '1'),
(93, 'US48-2022', 'account_transactions', '1', '1', '1'),
(94, 'US48-2022', 'charge_pay_contributions', '1', '1', '1'),
(95, 'US48-2022', 'charge_pay_salaries', '1', '1', '1'),
(96, 'US48-2022', 'contribution_types', '1', '1', '1'),
(97, 'US48-2022', 'employees', '1', '1', '1'),
(98, 'US48-2022', 'events', '1', '1', '1'),
(99, 'US48-2022', 'expenses', '1', '1', '1'),
(100, 'US48-2022', 'member_logins', '1', '1', '1'),
(101, 'US48-2022', 'member_menus', '1', '1', '0'),
(102, 'US48-2022', 'member_privileges', '1', '1', '1'),
(103, 'US48-2022', 'members', '1', '1', '1'),
(104, 'US48-2022', 'users', '1', '1', '1'),
(105, 'US49-2022', 'account_numbers', '0', '0', '0'),
(106, 'US49-2022', 'account_transactions', '0', '0', '0'),
(107, 'US49-2022', 'charge_pay_contributions', '0', '0', '0'),
(108, 'US49-2022', 'charge_pay_salaries', '0', '0', '0'),
(109, 'US49-2022', 'contribution_types', '0', '0', '0'),
(110, 'US49-2022', 'employees', '0', '0', '0'),
(111, 'US49-2022', 'events', '0', '0', '0'),
(112, 'US49-2022', 'expenses', '0', '0', '0'),
(113, 'US49-2022', 'members', '0', '0', '0'),
(114, 'US49-2022', 'member_cv', '0', '0', '0'),
(115, 'US49-2022', 'member_logins', '0', '0', '0'),
(116, 'US49-2022', 'member_menus', '0', '0', '0'),
(117, 'US49-2022', 'member_privileges', '0', '0', '0'),
(118, 'US49-2022', 'member_qualifications', '0', '0', '0'),
(119, 'US49-2022', 'member_work_experiences', '0', '0', '0'),
(120, 'US49-2022', 'project_manager', '1', '1', '1'),
(121, 'US49-2022', 'users', '0', '0', '0'),
(122, 'US50-2022', 'account_numbers', '0', '0', '0'),
(123, 'US50-2022', 'account_transactions', '0', '0', '0'),
(124, 'US50-2022', 'charge_pay_contributions', '0', '0', '0'),
(125, 'US50-2022', 'charge_pay_salaries', '0', '0', '0'),
(126, 'US50-2022', 'contribution_types', '0', '0', '0'),
(127, 'US50-2022', 'employees', '0', '0', '0'),
(128, 'US50-2022', 'events', '0', '0', '0'),
(129, 'US50-2022', 'expenses', '0', '0', '0'),
(130, 'US50-2022', 'members', '0', '0', '0'),
(131, 'US50-2022', 'member_cv', '0', '0', '0'),
(132, 'US50-2022', 'member_logins', '0', '0', '0'),
(133, 'US50-2022', 'member_menus', '0', '0', '0'),
(134, 'US50-2022', 'member_privileges', '0', '0', '0'),
(135, 'US50-2022', 'member_qualifications', '0', '0', '0'),
(136, 'US50-2022', 'member_work_experiences', '0', '0', '0'),
(137, 'US50-2022', 'project_manager', '0', '0', '0'),
(138, 'US50-2022', 'task_list', '0', '0', '0'),
(139, 'US50-2022', 'users', '0', '0', '0'),
(140, 'US51-2022', 'account_numbers', '0', '0', '0'),
(141, 'US51-2022', 'account_transactions', '0', '0', '0'),
(142, 'US51-2022', 'appointments', '0', '0', '0'),
(143, 'US51-2022', 'appointment_view', '0', '0', '0'),
(144, 'US51-2022', 'charge_pay_contributions', '0', '0', '0'),
(145, 'US51-2022', 'charge_pay_salaries', '0', '0', '0'),
(146, 'US51-2022', 'departments', '0', '0', '0'),
(147, 'US51-2022', 'diseases', '0', '0', '0'),
(148, 'US51-2022', 'doctors', '0', '0', '0'),
(149, 'US51-2022', 'dp_doctor', '0', '0', '0'),
(150, 'US51-2022', 'employees', '0', '0', '0'),
(151, 'US51-2022', 'exam_catagory', '0', '0', '0'),
(152, 'US51-2022', 'expenses', '0', '0', '0'),
(153, 'US51-2022', 'patients', '0', '0', '0'),
(154, 'US51-2022', 'users', '0', '0', '0'),
(155, 'US54-2022', 'account_numbers', '0', '0', '0'),
(156, 'US54-2022', 'account_transactions', '0', '0', '0'),
(157, 'US54-2022', 'appointments', '0', '0', '0'),
(158, 'US54-2022', 'appointment_view', '0', '0', '0'),
(159, 'US54-2022', 'charge_pay_contributions', '0', '0', '0'),
(160, 'US54-2022', 'charge_pay_salaries', '0', '0', '0'),
(161, 'US54-2022', 'departments', '0', '0', '0'),
(162, 'US54-2022', 'diseases', '0', '0', '0'),
(163, 'US54-2022', 'doctors', '0', '0', '0'),
(164, 'US54-2022', 'dp_doctor', '0', '0', '0'),
(165, 'US54-2022', 'employees', '0', '0', '0'),
(166, 'US54-2022', 'exam_catagory', '0', '0', '0'),
(167, 'US54-2022', 'expenses', '0', '0', '0'),
(168, 'US54-2022', 'patients', '0', '0', '0'),
(169, 'US54-2022', 'users', '0', '0', '0'),
(170, 'US57-2022', 'account_numbers', '0', '0', '0'),
(171, 'US57-2022', 'account_transactions', '0', '0', '0'),
(172, 'US57-2022', 'appointments', '0', '0', '0'),
(173, 'US57-2022', 'appointment_view', '0', '0', '0'),
(174, 'US57-2022', 'charge_pay_contributions', '0', '0', '0'),
(175, 'US57-2022', 'charge_pay_salaries', '0', '0', '0'),
(176, 'US57-2022', 'departments', '0', '0', '0'),
(177, 'US57-2022', 'diseases', '0', '0', '0'),
(178, 'US57-2022', 'doctors', '0', '0', '0'),
(179, 'US57-2022', 'dp_doctor', '0', '0', '0'),
(180, 'US57-2022', 'employees', '0', '0', '0'),
(181, 'US57-2022', 'exam_catagory', '0', '0', '0'),
(182, 'US57-2022', 'expenses', '0', '0', '0'),
(183, 'US57-2022', 'patients', '0', '0', '0'),
(184, 'US57-2022', 'users', '0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menus`
--

CREATE TABLE `user_sub_menus` (
  `userSubMenuD` int(11) NOT NULL,
  `userID` varchar(50) NOT NULL,
  `subMenuID` int(11) NOT NULL,
  `subMenuMode` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_sub_menus`
--

INSERT INTO `user_sub_menus` (`userSubMenuD`, `userID`, `subMenuID`, `subMenuMode`) VALUES
(1228, 'US48-2022', 2, '1'),
(1229, 'US48-2022', 5, '1'),
(1230, 'US48-2022', 22, '1'),
(1235, 'US48-2022', 76, '1'),
(1236, 'US48-2022', 86, '1'),
(1237, 'US48-2022', 87, '1'),
(1238, 'US48-2022', 88, '1'),
(1239, 'US48-2022', 89, '1'),
(1240, 'US48-2022', 11, '1'),
(1241, 'US48-2022', 12, '1'),
(1242, 'US48-2022', 13, '1'),
(1243, 'US48-2022', 14, '1'),
(1244, 'US48-2022', 33, '1'),
(1245, 'US48-2022', 34, '1'),
(1246, 'US48-2022', 68, '1'),
(1247, 'US48-2022', 70, '1'),
(1248, 'US48-2022', 71, '1'),
(1249, 'US48-2022', 29, '1'),
(1250, 'US48-2022', 30, '1'),
(1251, 'US48-2022', 50, '1'),
(1252, 'US48-2022', 6, '1'),
(1253, 'US48-2022', 7, '1'),
(1254, 'US48-2022', 8, '1'),
(1255, 'US48-2022', 9, '1'),
(1256, 'US48-2022', 65, '1'),
(1257, 'US48-2022', 66, '1'),
(1258, 'US48-2022', 67, '1'),
(1259, 'US48-2022', 73, '1'),
(1260, 'US48-2022', 95, '1'),
(1261, 'US48-2022', 96, '1'),
(1268, 'US49-2022', 2, '1'),
(1269, 'US49-2022', 5, '1'),
(1270, 'US49-2022', 22, '1'),
(1276, 'US49-2022', 76, '1'),
(1277, 'US49-2022', 86, '1'),
(1278, 'US49-2022', 87, '1'),
(1279, 'US49-2022', 88, '1'),
(1280, 'US49-2022', 89, '1'),
(1281, 'US49-2022', 11, '1'),
(1282, 'US49-2022', 12, '1'),
(1283, 'US49-2022', 13, '1'),
(1284, 'US49-2022', 14, '1'),
(1285, 'US49-2022', 33, '1'),
(1286, 'US49-2022', 34, '1'),
(1287, 'US49-2022', 68, '1'),
(1288, 'US49-2022', 70, '1'),
(1289, 'US49-2022', 71, '1'),
(1290, 'US49-2022', 29, '1'),
(1291, 'US49-2022', 30, '1'),
(1292, 'US49-2022', 50, '1'),
(1293, 'US49-2022', 6, '1'),
(1294, 'US49-2022', 7, '1'),
(1295, 'US49-2022', 8, '1'),
(1296, 'US49-2022', 9, '1'),
(1297, 'US49-2022', 65, '1'),
(1298, 'US49-2022', 66, '1'),
(1299, 'US49-2022', 67, '1'),
(1300, 'US49-2022', 73, '1'),
(1301, 'US49-2022', 95, '1'),
(1302, 'US49-2022', 96, '1'),
(1308, 'US50-2022', 2, '1'),
(1309, 'US50-2022', 5, '1'),
(1310, 'US50-2022', 22, '1'),
(1316, 'US50-2022', 76, '1'),
(1317, 'US50-2022', 86, '1'),
(1318, 'US50-2022', 87, '1'),
(1319, 'US50-2022', 88, '1'),
(1320, 'US50-2022', 89, '1'),
(1321, 'US50-2022', 11, '1'),
(1322, 'US50-2022', 12, '1'),
(1323, 'US50-2022', 13, '1'),
(1324, 'US50-2022', 14, '1'),
(1325, 'US50-2022', 33, '1'),
(1326, 'US50-2022', 34, '1'),
(1327, 'US50-2022', 68, '1'),
(1328, 'US50-2022', 70, '1'),
(1329, 'US50-2022', 71, '1'),
(1330, 'US50-2022', 29, '1'),
(1331, 'US50-2022', 30, '1'),
(1332, 'US50-2022', 50, '1'),
(1333, 'US50-2022', 6, '1'),
(1334, 'US50-2022', 7, '1'),
(1335, 'US50-2022', 8, '1'),
(1336, 'US50-2022', 9, '1'),
(1337, 'US50-2022', 65, '1'),
(1338, 'US50-2022', 66, '1'),
(1339, 'US50-2022', 67, '1'),
(1340, 'US50-2022', 73, '1'),
(1341, 'US50-2022', 95, '1'),
(1342, 'US50-2022', 96, '1'),
(1346, 'US48-2022', 106, '1'),
(1347, 'US49-2022', 106, '1'),
(1348, 'US50-2022', 106, '1'),
(1349, 'US48-2022', 107, '1'),
(1350, 'US49-2022', 107, '1'),
(1351, 'US50-2022', 107, '1'),
(1352, 'US48-2022', 108, '1'),
(1353, 'US49-2022', 108, '1'),
(1354, 'US50-2022', 108, '1'),
(1355, 'US48-2022', 109, '1'),
(1356, 'US49-2022', 109, '1'),
(1357, 'US50-2022', 109, '1'),
(1361, 'US48-2022', 111, '1'),
(1362, 'US49-2022', 111, '1'),
(1363, 'US50-2022', 111, '1'),
(1367, 'US48-2022', 113, '1'),
(1368, 'US49-2022', 113, '1'),
(1369, 'US50-2022', 113, '1'),
(1370, 'US48-2022', 114, '1'),
(1371, 'US49-2022', 114, '1'),
(1372, 'US50-2022', 114, '1'),
(1373, 'US51-2022', 2, '1'),
(1374, 'US51-2022', 5, '1'),
(1375, 'US51-2022', 22, '1'),
(1376, 'US51-2022', 106, '1'),
(1377, 'US51-2022', 107, '1'),
(1378, 'US51-2022', 108, '1'),
(1379, 'US51-2022', 109, '1'),
(1380, 'US51-2022', 113, '1'),
(1381, 'US51-2022', 114, '1'),
(1382, 'US51-2022', 76, '1'),
(1383, 'US51-2022', 86, '1'),
(1384, 'US51-2022', 87, '1'),
(1385, 'US51-2022', 88, '1'),
(1386, 'US51-2022', 89, '1'),
(1387, 'US51-2022', 11, '1'),
(1388, 'US51-2022', 12, '1'),
(1389, 'US51-2022', 13, '1'),
(1390, 'US51-2022', 14, '1'),
(1391, 'US51-2022', 33, '1'),
(1392, 'US51-2022', 34, '1'),
(1393, 'US51-2022', 68, '1'),
(1394, 'US51-2022', 70, '1'),
(1395, 'US51-2022', 71, '1'),
(1396, 'US51-2022', 111, '1'),
(1397, 'US51-2022', 29, '1'),
(1398, 'US51-2022', 30, '1'),
(1399, 'US51-2022', 50, '1'),
(1400, 'US51-2022', 6, '1'),
(1401, 'US51-2022', 7, '1'),
(1402, 'US51-2022', 8, '1'),
(1403, 'US51-2022', 9, '1'),
(1404, 'US51-2022', 65, '1'),
(1405, 'US51-2022', 66, '1'),
(1406, 'US51-2022', 67, '1'),
(1407, 'US51-2022', 73, '1'),
(1408, 'US51-2022', 95, '1'),
(1409, 'US51-2022', 96, '1'),
(1410, 'US54-2022', 2, '1'),
(1411, 'US54-2022', 5, '1'),
(1412, 'US54-2022', 22, '1'),
(1413, 'US54-2022', 106, '1'),
(1414, 'US54-2022', 107, '1'),
(1415, 'US54-2022', 108, '1'),
(1416, 'US54-2022', 109, '1'),
(1417, 'US54-2022', 113, '1'),
(1418, 'US54-2022', 114, '1'),
(1419, 'US54-2022', 76, '1'),
(1420, 'US54-2022', 86, '1'),
(1421, 'US54-2022', 87, '1'),
(1422, 'US54-2022', 88, '1'),
(1423, 'US54-2022', 89, '1'),
(1424, 'US54-2022', 11, '1'),
(1425, 'US54-2022', 12, '1'),
(1426, 'US54-2022', 13, '1'),
(1427, 'US54-2022', 14, '1'),
(1428, 'US54-2022', 33, '1'),
(1429, 'US54-2022', 34, '1'),
(1430, 'US54-2022', 68, '1'),
(1431, 'US54-2022', 70, '1'),
(1432, 'US54-2022', 71, '1'),
(1433, 'US54-2022', 111, '1'),
(1434, 'US54-2022', 29, '1'),
(1435, 'US54-2022', 30, '1'),
(1436, 'US54-2022', 50, '1'),
(1437, 'US54-2022', 6, '1'),
(1438, 'US54-2022', 7, '1'),
(1439, 'US54-2022', 8, '1'),
(1440, 'US54-2022', 9, '1'),
(1441, 'US54-2022', 65, '1'),
(1442, 'US54-2022', 66, '1'),
(1443, 'US54-2022', 67, '1'),
(1444, 'US54-2022', 73, '1'),
(1445, 'US54-2022', 95, '1'),
(1446, 'US54-2022', 96, '1'),
(1447, 'US57-2022', 2, '1'),
(1448, 'US57-2022', 5, '1'),
(1449, 'US57-2022', 22, '1'),
(1450, 'US57-2022', 106, '1'),
(1451, 'US57-2022', 107, '1'),
(1452, 'US57-2022', 108, '1'),
(1453, 'US57-2022', 109, '1'),
(1454, 'US57-2022', 113, '1'),
(1455, 'US57-2022', 114, '1'),
(1456, 'US57-2022', 76, '1'),
(1457, 'US57-2022', 86, '1'),
(1458, 'US57-2022', 87, '1'),
(1459, 'US57-2022', 88, '1'),
(1460, 'US57-2022', 89, '1'),
(1461, 'US57-2022', 11, '1'),
(1462, 'US57-2022', 12, '1'),
(1463, 'US57-2022', 13, '1'),
(1464, 'US57-2022', 14, '1'),
(1465, 'US57-2022', 33, '1'),
(1466, 'US57-2022', 34, '1'),
(1467, 'US57-2022', 68, '1'),
(1468, 'US57-2022', 70, '1'),
(1469, 'US57-2022', 71, '1'),
(1470, 'US57-2022', 111, '1'),
(1471, 'US57-2022', 29, '1'),
(1472, 'US57-2022', 30, '1'),
(1473, 'US57-2022', 50, '1'),
(1474, 'US57-2022', 6, '1'),
(1475, 'US57-2022', 7, '1'),
(1476, 'US57-2022', 8, '1'),
(1477, 'US57-2022', 9, '1'),
(1478, 'US57-2022', 65, '1'),
(1479, 'US57-2022', 66, '1'),
(1480, 'US57-2022', 67, '1'),
(1481, 'US57-2022', 73, '1'),
(1482, 'US57-2022', 95, '1'),
(1483, 'US57-2022', 96, '1');

-- --------------------------------------------------------

--
-- Structure for view `appointment_view`
--
DROP TABLE IF EXISTS `appointment_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `appointment_view`  AS SELECT `appointments`.`rowNo` AS `rowNo`, `appointments`.`appointment_id` AS `appointment_id`, `patients`.`patient_id` AS `patient_id`, `patients`.`patient_name` AS `patient_name`, `patients`.`patient_age` AS `patient_age`, CASE WHEN `patients`.`patient_sex` = 0 THEN 'Male' WHEN `patients`.`patient_sex` = 1 THEN 'Female' END AS `patient_sex`, `doctors`.`doctor_id` AS `doctor_id`, `doctors`.`doctor_name` AS `doctor_name`, `appointments`.`appointment_number` AS `appointment_number`, `appointments`.`charged_appt_fee` AS `charged_appt_fee`, `appointments`.`appt_discount_fee` AS `appt_discount_fee`, `appointments`.`description` AS `description`, CASE WHEN `appointments`.`appointment_status` = 0 THEN 'Pending' WHEN `appointments`.`appointment_status` = 1 THEN 'Accepted' WHEN `appointments`.`appointment_status` = 2 THEN 'Canceled' END AS `Appointment_Status`, `appointments`.`register_date` AS `register_date` FROM ((`appointments` join `patients` on(`patients`.`patient_id` = `appointments`.`patient_id`)) join `doctors` on(`doctors`.`doctor_id` = `appointments`.`doctor_id`))  ;

-- --------------------------------------------------------

--
-- Structure for view `dp_doctor`
--
DROP TABLE IF EXISTS `dp_doctor`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `dp_doctor`  AS SELECT `doctors`.`doctor_photo` AS `doctor_photo`, `doctors`.`rowNo` AS `rowNo`, `doctors`.`doctor_id` AS `doctor_id`, `doctors`.`doctor_name` AS `doctor_name`, CASE WHEN `doctors`.`doctor_sex` = 1 THEN 'Male' WHEN `doctors`.`doctor_sex` = 0 THEN 'Female' END AS `Gender`, `doctors`.`doctor_address` AS `doctor_address`, `doctors`.`doctor_tell` AS `doctor_tell`, `doctors`.`doctor_email` AS `doctor_email`, `departments`.`department_name` AS `department_name` FROM (`departments` join `doctors` on(`departments`.`department_id` = `doctors`.`doctor_department`))  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_numbers`
--
ALTER TABLE `account_numbers`
  ADD PRIMARY KEY (`rowNo`),
  ADD UNIQUE KEY `investmentTypeID` (`accountNoID`),
  ADD UNIQUE KEY `accountNumber` (`accountNumber`);

--
-- Indexes for table `account_transactions`
--
ALTER TABLE `account_transactions`
  ADD PRIMARY KEY (`rowNo`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`rowNo`);

--
-- Indexes for table `charge_pay_contributions`
--
ALTER TABLE `charge_pay_contributions`
  ADD PRIMARY KEY (`rowNo`),
  ADD UNIQUE KEY `chargePayMemberID` (`chargePayMemberID`);

--
-- Indexes for table `charge_pay_salaries`
--
ALTER TABLE `charge_pay_salaries`
  ADD PRIMARY KEY (`rowNo`),
  ADD KEY `empID` (`empID`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`rowNo`);

--
-- Indexes for table `diseases`
--
ALTER TABLE `diseases`
  ADD PRIMARY KEY (`rowNo`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`rowNo`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`rowNo`),
  ADD UNIQUE KEY `empID` (`empID`),
  ADD UNIQUE KEY `empEmail` (`empEmail`);

--
-- Indexes for table `exam_catagory`
--
ALTER TABLE `exam_catagory`
  ADD PRIMARY KEY (`rowNo`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`rowNo`),
  ADD UNIQUE KEY `expenseID` (`expenseID`);

--
-- Indexes for table `main_menus`
--
ALTER TABLE `main_menus`
  ADD PRIMARY KEY (`mainMenuID`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`rowNo`);

--
-- Indexes for table `payment_gateways`
--
ALTER TABLE `payment_gateways`
  ADD PRIMARY KEY (`rowNo`),
  ADD UNIQUE KEY `gatewayID` (`gatewayID`);

--
-- Indexes for table `sub_menus`
--
ALTER TABLE `sub_menus`
  ADD PRIMARY KEY (`subMenuID`);

--
-- Indexes for table `system_configurations`
--
ALTER TABLE `system_configurations`
  ADD PRIMARY KEY (`systemID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`rowNo`),
  ADD UNIQUE KEY `user_id` (`userID`),
  ADD UNIQUE KEY `userName` (`userName`),
  ADD KEY `empID` (`empID`);

--
-- Indexes for table `user_logins`
--
ALTER TABLE `user_logins`
  ADD PRIMARY KEY (`loginID`);

--
-- Indexes for table `user_main_menus`
--
ALTER TABLE `user_main_menus`
  ADD PRIMARY KEY (`userMainMenuID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `mainMenuID` (`mainMenuID`);

--
-- Indexes for table `user_role_privileges`
--
ALTER TABLE `user_role_privileges`
  ADD PRIMARY KEY (`roleID`);

--
-- Indexes for table `user_sub_menus`
--
ALTER TABLE `user_sub_menus`
  ADD PRIMARY KEY (`userSubMenuD`),
  ADD KEY `userID` (`userID`),
  ADD KEY `subMenuID` (`subMenuID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_numbers`
--
ALTER TABLE `account_numbers`
  MODIFY `rowNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `account_transactions`
--
ALTER TABLE `account_transactions`
  MODIFY `rowNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `rowNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `charge_pay_contributions`
--
ALTER TABLE `charge_pay_contributions`
  MODIFY `rowNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `charge_pay_salaries`
--
ALTER TABLE `charge_pay_salaries`
  MODIFY `rowNo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `rowNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `diseases`
--
ALTER TABLE `diseases`
  MODIFY `rowNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `rowNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `rowNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `exam_catagory`
--
ALTER TABLE `exam_catagory`
  MODIFY `rowNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `rowNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `main_menus`
--
ALTER TABLE `main_menus`
  MODIFY `mainMenuID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `rowNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `payment_gateways`
--
ALTER TABLE `payment_gateways`
  MODIFY `rowNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sub_menus`
--
ALTER TABLE `sub_menus`
  MODIFY `subMenuID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `rowNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `user_logins`
--
ALTER TABLE `user_logins`
  MODIFY `loginID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=185;

--
-- AUTO_INCREMENT for table `user_main_menus`
--
ALTER TABLE `user_main_menus`
  MODIFY `userMainMenuID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=364;

--
-- AUTO_INCREMENT for table `user_role_privileges`
--
ALTER TABLE `user_role_privileges`
  MODIFY `roleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=185;

--
-- AUTO_INCREMENT for table `user_sub_menus`
--
ALTER TABLE `user_sub_menus`
  MODIFY `userSubMenuD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1484;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `charge_pay_salaries`
--
ALTER TABLE `charge_pay_salaries`
  ADD CONSTRAINT `charge_pay_salaries_ibfk_1` FOREIGN KEY (`empID`) REFERENCES `employees` (`empID`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`empID`) REFERENCES `employees` (`empID`) ON DELETE CASCADE;

--
-- Constraints for table `user_main_menus`
--
ALTER TABLE `user_main_menus`
  ADD CONSTRAINT `user_main_menus_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_main_menus_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_main_menus_ibfk_3` FOREIGN KEY (`mainMenuID`) REFERENCES `main_menus` (`mainMenuID`) ON DELETE CASCADE;

--
-- Constraints for table `user_sub_menus`
--
ALTER TABLE `user_sub_menus`
  ADD CONSTRAINT `user_sub_menus_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_sub_menus_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_sub_menus_ibfk_3` FOREIGN KEY (`subMenuID`) REFERENCES `sub_menus` (`subMenuID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

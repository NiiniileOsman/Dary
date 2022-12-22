-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2022 at 11:14 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

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
(5, 'APP5-2022', 'PT3-2022', 'DP2-2022', 'DOC2-2022', 1, '10', '0', '10', '33759227', 'yh', '0', 'US2100002', '2022-12-17 12:31:49', '-', '-');

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
-- Table structure for table `contribution_types`
--

CREATE TABLE `contribution_types` (
  `rowNo` int(11) NOT NULL,
  `contributionTypeID` varchar(100) NOT NULL,
  `contributionTypeName` varchar(100) NOT NULL,
  `contributionAmount` varchar(100) NOT NULL,
  `contributionDescription` text NOT NULL,
  `registeredBy` varchar(100) NOT NULL,
  `registerDate` varchar(100) NOT NULL,
  `updatedBy` varchar(200) NOT NULL,
  `updateDate` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contribution_types`
--

INSERT INTO `contribution_types` (`rowNo`, `contributionTypeID`, `contributionTypeName`, `contributionAmount`, `contributionDescription`, `registeredBy`, `registerDate`, `updatedBy`, `updateDate`) VALUES
(1, 'CT1-2022', 'Monthly Contribution ($2)', '2', 'Monthly Contribution Payment Two Dollars', 'US2100002', '2022-08-27 16:11:54', '2022-09-10 09:55:42', '2022-09-10 09:55:42'),
(2, 'CT2-2022', 'Monthly Contribution ($4)', '4', 'Monthly Contribution Payment Four Dollars', 'US2100002', '2022-08-27 16:12:45', '2022-08-31 11:36:26', '2022-08-31 11:36:26');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `rowNo` int(11) NOT NULL,
  `department_id` varchar(250) DEFAULT NULL,
  `department_name` varchar(250) DEFAULT NULL,
  `appointment_fee` int(11) NOT NULL,
  `registered_by` varchar(250) DEFAULT NULL,
  `register_date` varchar(250) DEFAULT NULL,
  `updated_by` varchar(250) DEFAULT NULL,
  `update_date` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`rowNo`, `department_id`, `department_name`, `appointment_fee`, `registered_by`, `register_date`, `updated_by`, `update_date`) VALUES
(3, 'DP2-2022', 'General Diseases', 10, 'US2100002', '2022-10-01 08:54:00', 'US2100002', '2022-10-01 15:18:35'),
(4, 'DP4-2022', 'Qaliinada Guud', 15, 'US2100002', '2022-10-01 09:21:56', '-', '-'),
(7, 'DP5-2022', 'General Surgery', 10, 'US2100002', '2022-10-06 08:49:28', 'US2100002', '2022-10-06 08:50:07'),
(8, 'DP8-2022', 'Cudurada Maqaarka', 5, 'US2100002', '2022-10-09 10:44:26', '-', '-');

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
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `eventID` int(11) NOT NULL,
  `eventTitle` text NOT NULL,
  `eventBody` text NOT NULL,
  `registeredBy` varchar(200) NOT NULL,
  `registerDate` int(200) NOT NULL,
  `updatedBy` int(200) NOT NULL,
  `updateDate` int(200) NOT NULL,
  `eventPhotos` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(4, 'Finance', 'fa fa-dollar', '#', '1', 11),
(5, 'Reports', 'fa fa-file-text-o', '#', '1', 8),
(6, 'Settings', 'fa fa-gear', '#', '1', 10),
(7, 'Logout', 'fa fa-power-off', 'logout', '1', 12),
(8, 'HRM', 'fa fa-user-secret', '#', '1', 6),
(9, 'Cancelled Actions', 'fa fa-times-rectangle', '#', '1', 9),
(11, 'Manage Web Content', 'fa fa-globe', '#', '1', 7),
(12, 'Task Managment', 'fa fa-bars', 'dashboard', '1', 5);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `rowNo` int(11) NOT NULL,
  `memberID` varchar(100) NOT NULL,
  `memberName` varchar(100) NOT NULL,
  `placeOfBirth` varchar(100) NOT NULL,
  `memberDOB` varchar(100) NOT NULL,
  `memberSex` varchar(100) NOT NULL,
  `maritalStatus` varchar(100) NOT NULL,
  `jobStatus` varchar(100) NOT NULL,
  `professionExperience` varchar(250) NOT NULL,
  `teachingSubjects` text NOT NULL,
  `joiningReasons` text NOT NULL,
  `contributionTypeID` varchar(100) NOT NULL,
  `memberAddress` varchar(200) NOT NULL,
  `memberTelephone` varchar(50) NOT NULL,
  `memberEmail` varchar(200) NOT NULL,
  `memberPasscode` varchar(200) NOT NULL,
  `memberStatus` varchar(100) NOT NULL,
  `memberLoginStatus` varchar(100) NOT NULL,
  `registeredBy` varchar(100) NOT NULL,
  `registerDate` varchar(100) NOT NULL,
  `updatedBy` varchar(100) NOT NULL,
  `updateDate` varchar(100) NOT NULL,
  `memberPhoto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`rowNo`, `memberID`, `memberName`, `placeOfBirth`, `memberDOB`, `memberSex`, `maritalStatus`, `jobStatus`, `professionExperience`, `teachingSubjects`, `joiningReasons`, `contributionTypeID`, `memberAddress`, `memberTelephone`, `memberEmail`, `memberPasscode`, `memberStatus`, `memberLoginStatus`, `registeredBy`, `registerDate`, `updatedBy`, `updateDate`, `memberPhoto`) VALUES
(1, '001', 'Mohamud Omar Adam(Saxane)', 'Mogadishu', '2022-10-01', '0', '0', '1', '2', 'Math', '20', 'CT2-2022', 'Mogagishu', '615873046', 'ali@gmail.com', '615873046', '1', '1', 'US48-2022', '', 'US2100002', '2022-10-01 09:56:56', 'uploads/photos/no-image.jpg'),
(2, '002', 'Suldan Abdullahi Ibrahim', '', '', '0', '', '', '', '', '', 'CT2-2022', '', '615554459', '', '615554459', '1', '', 'US48-2022', '', '', '', 'uploads/photos/no-image.jpg'),
(3, '003', 'Abdinasir Sheikh Mohamud Hamud', '', '', '0', '', '', '', '', '', 'CT2-2022', '', '618455405', '', '618455405', '1', '1', 'US48-2022', '', '', '', 'uploads/photos/no-image.jpg'),
(4, '004', 'Ibrahim Omar Ahmed', '', '', '0', '', '', '', '', '', 'CT2-2022', '', '618438870', '', '618438870', '1', '1', 'US48-2022', '', '', '', 'uploads/photos/no-image.jpg'),
(5, '005', 'Abdirirzak Ali Mohamed', '', '', '0', '', '', '', '', '', 'CT2-2022', '', '615830960', '', '615830960', '1', '', 'US48-2022', '', '', '', 'uploads/photos/no-image.jpg'),
(6, '006', 'Abdirizak Mohamed Ali', '', '', '0', '', '', '', '', '', 'CT2-2022', '', '615536100', '', '615536100', '1', '', 'US48-2022', '', '', '', 'uploads/photos/no-image.jpg'),
(7, '007', 'Ismail Sheikh Abdulkadir', '', '', '0', '', '', '', '', '', 'CT2-2022', '', '615003712', '', '615003712', '1', '', 'US48-2022', '', '', '', 'uploads/photos/no-image.jpg'),
(8, '008', 'Hassan Mohamud Fiidow', '', '', '0', '', '', '', '', '', 'CT2-2022', '', '615581716', '', '615581716', '1', '', 'US48-2022', '', '', '', 'uploads/photos/no-image.jpg'),
(9, '009', 'Nuh Dahir Salad', '', '', '0', '', '', '', '', '', 'CT2-2022', '', '615041355', '', '615041355', '1', '1', 'US48-2022', '', '', '', 'uploads/photos/no-image.jpg'),
(10, '010', 'Hussein Ahmed Salad', '', '', '0', '', '', '', '', '', 'CT2-2022', '', '615223142', '', '615223142', '1', '', 'US48-2022', '', '', '', 'uploads/photos/no-image.jpg'),
(11, '011', 'Hassan Tahlil Abdi', '', '', '0', '', '', '', '', '', 'CT2-2022', '', '615590964', '', '615590964', '1', '', 'US48-2022', '', '', '', 'uploads/photos/no-image.jpg'),
(12, '012', 'Mohamed Abukar Xaaji Maxamed', '', '', '0', '', '', '', '', '', 'CT2-2022', '', '615090507', '', '615090507', '1', '', 'US48-2022', '', '', '', 'uploads/photos/no-image.jpg'),
(13, '013', 'Khadar Hassan Haji', '', '', '0', '', '', '', '', '', 'CT2-2022', '', '615350977', '', '615350977', '1', '', 'US48-2022', '', '', '', 'uploads/photos/no-image.jpg'),
(14, '014', 'Abdirahman Ibrahim Abdi', 'Baladweeyn', '1991-02-14', '1', '1', '1', '4', 'Applied Statistics ', 'Asaase', 'CT2-2022', 'Yaqshiid', '615221534', 'mankeey136@gmail.com', '615221534', '1', '1', 'US48-2022', '', 'US48-2022', '2022-09-22 12:59:45', 'uploads/photos/014_0.jpg'),
(15, '015', 'Mohamed Sharif Ibrahim', '', '', '0', '', '', '', '', '', 'CT2-2022', '', '615592419', '', '615592419', '1', '', 'US48-2022', '', '', '', 'uploads/photos/no-image.jpg'),
(16, '016', 'Faduma Mohamed Ali', '', '', '1', '', '', '', '', '', 'CT2-2022', '', '617700110', '', '617700110', '1', '', 'US48-2022', '', '', '', 'uploads/photos/no-image.jpg'),
(17, '017', 'Faduma Sheikh Ali Ahmed', '', '', '1', '', '', '', '', '', 'CT2-2022', '', '615875772', '', '615875772', '1', '', 'US48-2022', '', '', '', 'uploads/photos/no-image.jpg'),
(18, '018', 'Abukar Khalif Mohamed', '', '', '0', '', '', '', '', '', 'CT2-2022', '', '612126656', '', '612126656', '1', '', 'US48-2022', '', '', '', 'uploads/photos/no-image.jpg'),
(19, '019', 'Safiya Abdihafid Hussein', '', '', '1', '', '', '', '', '', 'CT2-2022', '', '615529955', '', '615529955', '1', '', 'US48-2022', '', '', '', 'uploads/photos/no-image.jpg'),
(20, '020', 'Imran Ahmed Abdulkadir', '', '', '0', '', '', '', '', '', 'CT2-2022', '', '617452696', '', '617452696', '1', '', 'US48-2022', '', '', '', 'uploads/photos/no-image.jpg'),
(21, '021', 'Mohamed Abdulkadir Maxamed', '', '', '0', '', '', '', '', '', 'CT2-2022', '', '617464039', '', '617464039', '1', '1', 'US48-2022', '', '', '', 'uploads/photos/no-image.jpg'),
(22, '022', 'Sheikh Abdihayi Sheikh Adam', '', '', '0', '', '', '', '', '', 'CT2-2022', '', '615331330', '', '615331330', '1', '', 'US48-2022', '', '', '', 'uploads/photos/no-image.jpg'),
(23, '023', 'Mohamed Osman Mohamed', '', '', '0', '', '', '', '', '', 'CT2-2022', '', '618209602', '', '618209602', '1', '', 'US48-2022', '', '', '', 'uploads/photos/no-image.jpg'),
(24, '024', 'Mohamed Ahmed Adam', '', '', '0', '', '', '', '', '', 'CT2-2022', '', '615403094', '', '615403094', '1', '', 'US48-2022', '', '', '', 'uploads/photos/no-image.jpg'),
(25, '025', 'Shukri Hassan Osman', '', '', '1', '', '', '', '', '', 'CT2-2022', '', '617666669', '', '617666669', '1', '', 'US48-2022', '', '', '', 'uploads/photos/no-image.jpg'),
(26, '026', 'Hussein Maxamed Abdullalhi', '', '', '0', '', '', '', '', '', 'CT2-2022', '', '615890033', '', '615890033', '1', '', 'US48-2022', '', '', '', 'uploads/photos/no-image.jpg'),
(27, '027', 'Khadar Mohamud Alaki', '', '', '0', '', '', '', '', '', 'CT2-2022', '', '617886471', '', '617886471', '1', '', 'US48-2022', '', '', '', 'uploads/photos/no-image.jpg'),
(28, '028', 'Hassan Mohamed Abdi', '', '', '0', '', '', '', '', '', 'CT2-2022', '', '612740574', '', '612740574', '1', '', 'US48-2022', '', '', '', 'uploads/photos/no-image.jpg'),
(29, '029', 'Farah Abdi Osman', '', '', '0', '', '', '', '', '', 'CT2-2022', '', '616473060', '', '616473060', '1', '', 'US48-2022', '', '', '', 'uploads/photos/no-image.jpg'),
(30, '030', 'Hiba Hassan Haji Ahmed', '', '', '1', '', '', '', '', '', 'CT2-2022', '', '615824023', '', '615824023', '1', '', 'US48-2022', '', '', '', 'uploads/photos/no-image.jpg'),
(31, '031', 'Mustafe Sh.Bashir Mohamed', '', '', '0', '', '', '', '', '', 'CT2-2022', '', '615553636', '', '615553636', '1', '', 'US48-2022', '', '', '', 'uploads/photos/no-image.jpg'),
(32, '032', 'Ali Hassan Mohamud', '', '', '0', '', '', '', '', '', 'CT2-2022', '', '615878705', '', '615878705', '1', '', 'US48-2022', '', '', '', 'uploads/photos/no-image.jpg'),
(33, '033', 'Ali Mohamed Hussein', '', '', '0', '', '', '', '', '', 'CT2-2022', '', '615872603', '', '615872603', '1', '1', 'US48-2022', '', '', '', 'uploads/photos/no-image.jpg'),
(34, '034', 'Abdirahman Abukar Mohamed', '', '', '0', '', '', '', '', '', 'CT2-2022', '', '615415965', '', '615415965', '1', '', 'US48-2022', '', '', '', 'uploads/photos/no-image.jpg'),
(35, '035', 'Mowlid Matan Salad', '', '', '0', '', '', '', '', '', 'CT2-2022', '', '616332646', '', '616332646', '1', '', 'US48-2022', '', '', '', 'uploads/photos/no-image.jpg'),
(36, '036', 'Siham Hassan Mohamed', '', '', '1', '', '', '', '', '', 'CT2-2022', '', '615905305', '', '615905305', '1', '', 'US48-2022', '', '', '', 'uploads/photos/no-image.jpg'),
(37, '037', 'Mohamed Moallim Adam Ahmed', '', '', '0', '', '', '', '', '', 'CT2-2022', '', '616964138', '', '616964138', '1', '', 'US48-2022', '', '', '', 'uploads/photos/no-image.jpg'),
(38, '038', 'Abdirahman Osman Alin', '', '', '0', '', '', '', '', '', 'CT2-2022', '', '619505936', '', '619505936', '1', '', 'US48-2022', '', '', '', 'uploads/photos/no-image.jpg'),
(39, '039', 'Abdinafi Ahmed Ali', '', '', '0', '', '', '', '', '', 'CT2-2022', '', '615038889', '', '615038889', '1', '', 'US48-2022', '', '', '', 'uploads/photos/no-image.jpg'),
(40, '040', 'Ibrahim Mohamud Xeyd', '', '', '0', '', '', '', '', '', 'CT2-2022', '', '615588798', '', '615588798', '1', '', 'US48-2022', '', '', '', 'uploads/photos/no-image.jpg'),
(41, '041', 'Rahma Abdulkadir Mohamed', '', '', '0', '', '', '', '', '', 'CT2-2022', '', '616311186', '', '616311186', '1', '', 'US48-2022', '', '', '', 'uploads/photos/no-image.jpg'),
(42, '042', 'Mohamed Mohamud Omar', '', '', '0', '', '', '', '', '', 'CT1-2022', '', '611000142', '', '611000142', '1', '', 'US48-2022', '', '', '', 'uploads/photos/no-image.jpg'),
(43, '043', 'Mohamed Hashi Ali', '', '', '0', '', '', '', '', '', 'CT2-2022', '', '615119303', '', '615119303', '1', '', 'US48-2022', '', '', '', 'uploads/photos/no-image.jpg'),
(44, '044', 'Mukhtar Omar Sheikh Adam', '', '', '0', '', '', '', '', '', 'CT1-2022', '', '616485878', '', '616485878', '1', '', 'US48-2022', '', '', '', 'uploads/photos/no-image.jpg'),
(45, '045', 'Osman Abdi Jelle', '', '', '0', '', '', '', '', '', 'CT1-2022', '', '615888481', '', '615888481', '1', '', 'US48-2022', '', '', '', 'uploads/photos/no-image.jpg'),
(46, '046', 'Abdifatah sheikh Ibrahim Abdullahi', '', '', '0', '', '', '', '', '', 'CT1-2022', '', '615788080', '', '615788080', '1', '', 'US48-2022', '', '', '', 'uploads/photos/no-image.jpg'),
(47, '047', 'Ahmed Mohamud Jama', '', '', '0', '', '', '', '', '', 'CT1-2022', '', '615195060', '', '615195060', '1', '', 'US48-2022', '', '', '', 'uploads/photos/no-image.jpg'),
(48, '048', 'Mohamed Tahir Abdulkarim Mohamed', '', '', '0', '', '', '', '', '', 'CT1-2022', '', '611015140', '', '611015140', '1', '', 'US48-2022', '', '', '', 'uploads/photos/no-image.jpg'),
(49, '049', 'Abdirizaq Abdi Sh.Rashid', '', '', '0', '', '', '', '', '', 'CT1-2022', '', '615819333', '', '615819333', '1', '', 'US48-2022', '', '', '', 'uploads/photos/no-image.jpg'),
(50, '050', 'Khadar Moallim Mohamed Mohamud', '', '', '0', '', '', '', '', '', 'CT1-2022', '', '615577091', '', '615577091', '1', '', 'US48-2022', '', '', '', 'uploads/photos/no-image.jpg'),
(51, '051', 'Abdrahim Abdullahi Elmi', '', '', '0', '', '', '', '', '', 'CT2-2022', '', '615798884', '', '615798884', '1', '', 'US48-2022', '', '', '', 'uploads/photos/no-image.jpg'),
(52, '052', 'Yusuf ismail Abib', '', '', '0', '', '', '', '', '', 'CT1-2022', '', '612760007', '', '612760007', '1', '', 'US48-2022', '', '', '', 'uploads/photos/no-image.jpg'),
(53, '053', 'Nasrudin Ahmed Ali', 'mogdisho', '1990-12-06', '1', '1', '1', '4', 'Arabic', 'member', 'CT1-2022', 'mogdisho', '615206018', 'mankeey@gmail.com', '615206018', '1', '1', 'US48-2022', '', 'US48-2022', '2022-09-24 19:01:55', 'uploads/photos/no-image.jpg'),
(54, '054', 'Hussein Abdirahman Mohamoud', '', '', '0', '', '', '', '', '', 'CT1-2022', '', '617887891', '', '617887891', '1', '', 'US48-2022', '', '', '', 'uploads/photos/no-image.jpg'),
(55, '055', 'Mohamed Ahmed Tifow', '', '', '0', '', '', '', '', '', 'CT1-2022', '', '617584567', '', '617584567', '1', '', 'US48-2022', '', '', '', 'uploads/photos/no-image.jpg'),
(56, '056', 'Ali Ahmed Hassan', '', '', '0', '', '', '', '', '', 'CT1-2022', '', '615849802', '', '615849802', '1', '', 'US48-2022', '', '', '', 'uploads/photos/no-image.jpg'),
(57, '057', 'Abdirizak Hassan Ibrahim', '', '', '0', '', '', '', '', '', 'CT1-2022', '', '615508730', '', '615508730', '1', '', 'US48-2022', '', '', '', 'uploads/photos/no-image.jpg'),
(58, '058', 'Abdullahi Moallim Ali Amin', '', '', '0', '', '', '', '', '', 'CT1-2022', '', '616555523', '', '616555523', '1', '', 'US48-2022', '', '', '', 'uploads/photos/no-image.jpg'),
(59, '059', 'Hassan Abdullahi Hussein', '', '', '0', '', '', '', '', '', 'CT1-2022', '', '615489335', '', '615489335', '1', '', 'US48-2022', '', '', '', 'uploads/photos/no-image.jpg'),
(60, '060', 'Ismail Hussein Mohamed', '', '', '0', '', '', '', '', '', 'CT1-2022', '', '615597227', '', '615597227', '1', '', 'US48-2022', '', '', '', 'uploads/photos/no-image.jpg'),
(61, '061', 'Ahmed Mohamed Hared', '', '', '0', '', '', '', '', '', 'CT1-2022', '', '616103611', '', '616103611', '1', '', 'US48-2022', '', '', '', 'uploads/photos/no-image.jpg'),
(62, '062', 'Said Alasow Hassan', '', '', '0', '', '', '', '', '', 'CT1-2022', '', '615595785', '', '615595785', '1', '', 'US48-2022', '', '', '', 'uploads/photos/no-image.jpg'),
(63, '063', 'Ali Mohamud Mohamed', '', '', '0', '', '', '', '', '', 'CT1-2022', '', '615929673', '', '615929673', '1', '', 'US48-2022', '', '', '', 'uploads/photos/no-image.jpg'),
(64, '064', 'Osman Abdullahi Ahmed', '', '', '0', '', '', '', '', '', 'CT1-2022', '', '615048420', '', '615048420', '1', '', 'US48-2022', '', '', '', 'uploads/photos/no-image.jpg'),
(65, '065', 'Abdullahi Abdirahman Mohamed', '', '', '0', '', '', '', '', '', 'CT1-2022', '', '619551248', '', '619551248', '1', '', 'US48-2022', '', '', '', 'uploads/photos/no-image.jpg'),
(66, '066', 'Abdirahman mahamud idow', '', '', '0', '', '', '', '', '', 'CT1-2022', '', '615676712', '', '615676712', '1', '', 'US48-2022', '', '', '', 'uploads/photos/no-image.jpg'),
(67, '067', 'Ali dhubow nur', '', '', '0', '', '', '', '', '', 'CT1-2022', '', '618181812', '', '618181812', '1', '', 'US48-2022', '', '', '', 'uploads/photos/no-image.jpg'),
(68, '068', 'Xasan ahmad ibrahim', '', '', '0', '', '', '', '', '', 'CT1-2022', '', '615836586', '', '615836586', '1', '', 'US48-2022', '', '', '', 'uploads/photos/no-image.jpg'),
(69, '069', 'Osman Abdullah jimcaale', '', '', '0', '', '', '', '', '', 'CT1-2022', '', '615109106', '', '615109106', '1', '1', 'US48-2022', '', '', '', 'uploads/photos/no-image.jpg'),
(70, '070', 'Mahamad- amiin Moalim omar', '', '', '0', '', '', '', '', '', 'CT1-2022', '', '615401096', '', '615401096', '1', '', 'US48-2022', '', '', '', 'uploads/photos/no-image.jpg'),
(71, '071', 'Mahamad adan Sheik abdi', '', '', '0', '', '', '', '', '', 'CT1-2022', '', '618330871', '', '618330871', '1', '1', 'US48-2022', '', '', '', 'uploads/photos/no-image.jpg'),
(72, '072', 'Fuad Abdullah shafici', '', '', '0', '', '', '', '', '', 'CT1-2022', '', '615730002', '', '615730002', '1', '', 'US48-2022', '', '', '', 'uploads/photos/no-image.jpg'),
(73, '073', 'MOHAMED ABUKAR SHEIKH MOHAMED ', '', '', '0', '', '', '', '', '', 'CT1-2022', '', '615531738', '', '615531738', '1', '', 'US48-2022', '', '', '', 'uploads/photos/no-image.jpg'),
(74, '074', 'Muuse Cabdi Cali Cumar', '', '', '0', '', '', '', '', '', 'CT1-2022', '', '615614096', '', '615614096', '1', '', 'US48-2022', '', '', '', 'uploads/photos/no-image.jpg'),
(75, '075', 'Cali Axmed xasan', '', '', '0', '', '', '', '', '', 'CT1-2022', '', '615851790', '', '615851790', '1', '', 'US48-2022', '', '', '', 'uploads/photos/no-image.jpg'),
(76, '076', 'ibraahin abuukar xasan', '', '', '0', '', '', '', '', '', 'CT1-2022', '', '615648427', '', '615648427', '1', '', 'US48-2022', '', '', '', 'uploads/photos/no-image.jpg'),
(77, '077', 'Sailia Sacad Ahmed Bare', '', '', '0', '', '', '', '', '', 'CT1-2022', '', '061 6596525', '', '061 6596525', '1', '', 'US48-2022', '', '', '', 'uploads/photos/no-image.jpg'),
(78, '078', 'SULDAN ABDI SIYAD', '', '', '0', '', '', '', '', '', 'CT1-2022', '', '615708405', '', '615708405', '1', '', 'US48-2022', '', '', '', 'uploads/photos/no-image.jpg'),
(79, '079', 'Hasan Mohamad Hasan', '', '', '0', '', '', '', '', '', 'CT1-2022', '', '615839670', '', '615839670', '1', '', 'US48-2022', '', '', '', 'uploads/photos/no-image.jpg'),
(80, '080', 'Mohamed Sheikh abdi Mohamed', '', '', '0', '', '', '', '', '', 'CT1-2022', '', '615167192', '', '615167192', '1', '', 'US48-2022', '', '', '', 'uploads/photos/no-image.jpg'),
(81, '081', 'Ibrahim Omar Abdi', '', '', '0', '', '', '', '', '', 'CT1-2022', '', '615455565', '', '615455565', '1', '', 'US48-2022', '', '', '', 'uploads/photos/no-image.jpg'),
(82, '082', 'Mowlid Sudi Yalaxow', '', '', '0', '', '', '', '', '', 'CT1-2022', '', '615247199', '', '615247199', '1', '', 'US48-2022', '', '', '', 'uploads/photos/no-image.jpg'),
(83, '083', 'Maxamed Cabdi Sulub', '', '', '0', '', '', '', '', '', 'CT1-2022', '', '615562726', '', '615562726', '1', '', 'US48-2022', '', '', '', 'uploads/photos/no-image.jpg'),
(84, '084', 'Xassan Axmad Nuur Ibrahim', '', '', '0', '', '', '', '', '', 'CT1-2022', '', '12345', '', '12345', '1', '', 'US48-2022', '', '', '', 'uploads/photos/no-image.jpg'),
(85, '085', 'Mahamad Abdille Hassan', '', '', '0', '', '', '', '', '', 'CT1-2022', '', '12345', '', '12345', '1', '', 'US48-2022', '', '', '', 'uploads/photos/no-image.jpg'),
(86, '086', 'Mamamud shiq xasan macalim nuur', '', '', '0', '', '', '', '', '', 'CT1-2022', '', '12345', '', '12345', '1', '', 'US48-2022', '', '', '', 'uploads/photos/no-image.jpg'),
(87, '087', 'Osman Abukar egey', '', '', '0', '', '', '', '', '', 'CT1-2022', '', '618772326', '', '618772326', '1', '0', 'US48-2022', '', '', '', 'uploads/photos/no-image.jpg'),
(88, '088', 'Mahdi Abdi Hassan', '', '', '0', '', '', '', '', '', 'CT1-2022', '', '618061814', '', '618061814', '1', '', 'US48-2022', '', '', '', 'uploads/photos/no-image.jpg'),
(89, '089', 'Muhiyadiin Abukar Ali', '', '', '0', '', '', '', '', '', 'CT1-2022', '', '615097719', '', '615097719', '1', '', 'US48-2022', '', '', '', 'uploads/photos/no-image.jpg'),
(90, '090', 'Abdikariim nor elmi', '', '', '0', '', '', '', '', '', 'CT1-2022', '', '616596525', '', '616596525', '1', '', 'US48-2022', '', '', '', 'uploads/photos/no-image.jpg'),
(91, '091', 'Mahamad deeq ali barre', '', '', '0', '', '', '', '', '', 'CT1-2022', '', '12345', '', '12345', '1', '', 'US48-2022', '', '', '', 'uploads/photos/no-image.jpg'),
(92, '092', 'Dr: ismail Ibrahim Mahamed', '', '', '0', '', '', '', '', '', 'CT1-2022', '', '615820021', '', '615820021', '1', '1', 'US48-2022', '', '', '', 'uploads/photos/no-image.jpg'),
(93, '093', 'Ali Adan Adow', '', '', '0', '', '', '', '', '', 'CT1-2022', '', '615675547', '', '615675547', '1', '', 'US48-2022', '', '', '', 'uploads/photos/no-image.jpg'),
(94, '094', 'Idiris  Omar Mahamad', '', '', '0', '', '', '', '', '', 'CT1-2022', '', '615342054', '', '615342054', '1', '', 'US48-2022', '', '', '', 'uploads/photos/no-image.jpg'),
(95, '095', 'Osman Abdulrahman Haji Hassan', '', '', '0', '', '', '', '', '', 'CT1-2022', '', '615115757', '', '615115757', '1', '1', 'US48-2022', '', '', '', 'uploads/photos/no-image.jpg'),
(96, '096', 'Hussein Abubakar Mahamad Adle', '', '', '0', '', '', '', '', '', 'CT1-2022', '', '619861146', '', '619861146', '1', '', 'US48-2022', '', '', '', 'uploads/photos/no-image.jpg'),
(97, '097', 'Abdulahi Moallim Abdirahman', '', '', '0', '', '', '', '', '', 'CT1-2022', '', '615166431', '', '615166431', '1', '', 'US48-2022', '', '', '', 'uploads/photos/no-image.jpg'),
(98, '098', 'Ismail Mohamed Jamal', 'Afgooye', '1991-10-21', '1', '1', '1', '4', 'Computer Sceince', 'Taking part the contribution', 'CT1-2022', 'Ceelasha Biyaha', '619334444', 'engismailmj@gmail.com', '619334444', '1', '0', 'US48-2022', '2022-09-16 06:37:39', '098', '2022-09-22 15:25:51', 'uploads/photos/098_0.png'),
(100, '099', 'Abdullahi Waaberi', 'Baydhabo', '2002-04-02', '1', '0', '1', '2', 'Technology', 'Helping', 'CT1-2022', 'Mogadishu', '65788990', 'waaberi@gmail.com', '65788990', '1', '0', 'US2100002', '2022-10-01 10:43:04', '-', '-', 'uploads/photos/099_0.png');

-- --------------------------------------------------------

--
-- Table structure for table `member_cv`
--

CREATE TABLE `member_cv` (
  `rowNo` int(11) NOT NULL,
  `memberID` varchar(200) NOT NULL,
  `uploadDate` varchar(200) NOT NULL,
  `memberCV` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `member_logins`
--

CREATE TABLE `member_logins` (
  `loginID` int(11) NOT NULL,
  `memberID` varchar(50) NOT NULL,
  `loginDateTime` varchar(200) NOT NULL,
  `logoutDateTime` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member_logins`
--

INSERT INTO `member_logins` (`loginID`, `memberID`, `loginDateTime`, `logoutDateTime`) VALUES
(1, 'MB84-2022', '2022-09-03 00:27:34', ''),
(2, 'MB84-2022', '2022-09-03 00:28:39', ''),
(3, 'MB84-2022', '2022-09-03 00:29:11', ''),
(4, 'MB84-2022', '2022-09-03 00:29:33', ''),
(5, 'MB84-2022', '2022-09-03 00:30:38', '2022-09-03 00:32:03'),
(6, 'MB84-2022', '2022-09-03 00:32:15', '2022-09-03 00:32:17'),
(7, 'MB84-2022', '2022-09-03 00:33:12', '2022-09-03 00:33:13'),
(8, 'MB84-2022', '2022-09-03 00:33:49', '2022-09-03 00:33:51'),
(9, 'MB84-2022', '2022-09-03 00:37:47', '2022-09-03 00:37:49'),
(10, 'MB84-2022', '2022-09-03 00:39:23', ''),
(11, 'MB84-2022', '2022-09-03 07:50:30', ''),
(12, 'MB84-2022', '2022-09-04 14:23:47', ''),
(13, 'MB84-2022', '2022-09-04 14:25:57', ''),
(14, 'MB84-2022', '2022-09-04 14:36:51', '2022-09-04 14:47:25'),
(15, 'MB84-2022', '2022-09-04 14:47:27', '2022-09-04 14:47:31'),
(16, 'MB84-2022', '2022-09-04 14:47:34', '2022-09-04 14:49:23'),
(17, 'MB84-2022', '2022-09-04 14:49:25', '2022-09-04 14:54:26'),
(18, 'MB84-2022', '2022-09-04 14:54:28', '2022-09-04 15:11:24'),
(19, 'MB84-2022', '2022-09-04 15:12:26', '2022-09-04 15:12:38'),
(20, 'MB84-2022', '2022-09-04 15:12:40', ''),
(21, 'MB84-2022', '2022-09-04 15:15:13', '2022-09-04 15:19:11'),
(22, 'MB84-2022', '2022-09-04 15:19:37', '2022-09-04 15:19:41'),
(23, 'MB84-2022', '2022-09-04 15:19:46', '2022-09-04 15:19:52'),
(24, 'MB84-2022', '2022-09-04 15:24:39', '2022-09-04 15:24:43'),
(25, 'MB84-2022', '2022-09-04 15:24:46', '2022-09-04 15:24:51'),
(26, 'MB84-2022', '2022-09-04 15:27:08', ''),
(27, 'MB84-2022', '2022-09-04 16:01:12', '2022-09-04 16:21:40'),
(28, 'MB84-2022', '2022-09-04 16:22:23', '2022-09-04 21:42:16'),
(29, '008', '2022-09-04 21:42:46', '2022-09-04 21:42:46'),
(30, '009', '2022-09-04 21:43:17', '2022-09-04 21:43:17'),
(31, 'MB84-2022', '2022-09-04 21:44:40', '2022-09-05 00:54:27'),
(32, 'MB84-2022', '2022-09-05 01:04:57', '2022-09-05 01:25:18'),
(33, 'MB84-2022', '2022-09-05 09:52:44', '2022-09-05 09:52:45'),
(34, 'MB84-2022', '2022-09-05 09:55:48', '2022-09-05 09:55:54'),
(35, 'MB84-2022', '2022-09-05 09:59:08', '2022-09-05 09:59:11'),
(36, 'MB84-2022', '2022-09-05 12:38:14', '2022-09-05 12:38:17'),
(37, 'MB84-2022', '2022-09-05 12:39:45', '2022-09-05 12:39:58'),
(38, 'MB84-2022', '2022-09-05 12:49:09', '2022-09-05 12:50:37'),
(39, 'MB84-2022', '2022-09-06 15:39:45', '2022-09-06 15:42:29'),
(40, 'MB84-2022', '2022-09-06 16:18:10', ''),
(41, '014', '2022-09-06 16:51:11', '2022-09-06 16:51:13'),
(42, 'MB84-2022', '2022-09-06 16:52:18', '2022-09-07 11:56:11'),
(43, 'MB84-2022', '2022-09-07 15:02:52', '2022-09-07 15:04:02'),
(44, '014', '2022-09-12 10:47:35', '2022-09-12 10:47:36'),
(45, '014', '2022-09-12 10:48:05', '2022-09-12 10:48:06'),
(46, '014', '2022-09-12 14:20:23', '2022-09-12 14:20:25'),
(47, '014', '2022-09-12 14:23:14', '2022-09-12 14:23:16'),
(48, '001', '2022-09-15 13:24:31', ''),
(49, '014', '2022-09-15 13:43:38', ''),
(50, '014', '2022-09-15 15:25:58', ''),
(51, '014', '2022-09-15 18:33:01', ''),
(52, '014', '2022-09-15 20:02:47', ''),
(53, '014', '2022-09-15 20:03:06', ''),
(54, '014', '2022-09-15 20:09:43', ''),
(55, '014', '2022-09-15 20:10:51', ''),
(56, '014', '2022-09-15 20:15:52', ''),
(57, '014', '2022-09-15 20:16:10', ''),
(58, '014', '2022-09-15 20:16:49', ''),
(59, '014', '2022-09-15 20:18:48', ''),
(60, '014', '2022-09-15 20:20:15', ''),
(61, '014', '2022-09-15 20:20:22', ''),
(62, '014', '2022-09-15 20:22:15', ''),
(63, '014', '2022-09-15 20:22:22', ''),
(64, '014', '2022-09-15 20:22:34', ''),
(65, '014', '2022-09-15 20:28:57', '2022-09-15 20:29:41'),
(66, '014', '2022-09-15 20:29:52', '2022-09-16 06:40:28'),
(67, '098', '2022-09-16 06:40:47', ''),
(68, '071', '2022-09-17 05:51:48', ''),
(69, '071', '2022-09-17 06:46:54', ''),
(70, '098', '2022-09-17 08:43:35', ''),
(71, '004', '2022-09-17 18:37:22', '2022-09-17 18:45:20'),
(72, '092', '2022-09-17 18:44:24', ''),
(73, '095', '2022-09-17 18:45:52', ''),
(74, '087', '2022-09-18 09:14:50', '2022-09-18 09:17:04'),
(75, '014', '2022-09-18 18:42:51', ''),
(76, '014', '2022-09-19 11:05:15', '2022-09-19 11:24:28'),
(77, '004', '2022-09-19 11:33:54', '2022-09-19 12:09:17'),
(78, '014', '2022-09-21 08:57:38', ''),
(79, '014', '2022-09-21 12:24:48', '2022-09-21 12:25:44'),
(80, '004', '2022-09-21 17:21:14', ''),
(81, '098', '2022-09-21 21:45:29', '2022-09-21 22:03:55'),
(82, '098', '2022-09-21 22:05:10', '2022-09-21 23:28:49'),
(83, '014', '2022-09-22 06:55:33', '2022-09-22 07:00:42'),
(84, '014', '2022-09-22 12:00:41', ''),
(85, '014', '2022-09-22 12:55:52', '2022-09-22 13:43:18'),
(86, '098', '2022-09-22 13:06:38', '2022-09-22 13:21:50'),
(87, '014', '2022-09-22 13:45:56', '2022-09-22 13:46:17'),
(88, '014', '2022-09-22 13:46:29', ''),
(89, '014', '2022-09-22 13:52:09', '2022-09-22 13:58:16'),
(90, '001', '2022-09-22 13:59:31', ''),
(91, '001', '2022-09-22 14:07:23', ''),
(92, '001', '2022-09-22 14:12:17', ''),
(93, '009', '2022-09-22 14:22:32', ''),
(94, '098', '2022-09-22 14:28:15', ''),
(95, '014', '2022-09-22 14:44:58', ''),
(96, '014', '2022-09-22 14:45:00', ''),
(97, '098', '2022-09-22 15:18:23', '2022-09-22 15:23:09'),
(98, '098', '2022-09-22 15:23:24', '2022-09-22 15:27:32'),
(99, '098', '2022-09-22 15:27:43', '2022-09-22 15:32:48'),
(100, '001', '2022-09-22 15:34:19', '2022-09-22 15:36:57'),
(101, '098', '2022-09-22 15:37:54', '2022-09-22 16:10:37'),
(102, '004', '2022-09-22 16:42:25', ''),
(103, '003', '2022-09-22 16:44:22', ''),
(104, '033', '2022-09-22 17:08:23', ''),
(105, '069', '2022-09-22 17:09:25', ''),
(106, '053', '2022-09-22 17:11:02', ''),
(107, '004', '2022-09-22 17:11:58', ''),
(108, '033', '2022-09-22 17:12:43', ''),
(109, '003', '2022-09-22 17:15:09', ''),
(110, '021', '2022-09-22 20:42:59', ''),
(111, '001', '2022-09-22 20:46:40', '');

-- --------------------------------------------------------

--
-- Table structure for table `member_menus`
--

CREATE TABLE `member_menus` (
  `memberMenuID` int(11) NOT NULL,
  `mainMenuText` varchar(250) NOT NULL,
  `mainMenuIcon` varchar(200) NOT NULL,
  `mainMenuURL` varchar(200) NOT NULL,
  `mainMenuMode` varchar(200) NOT NULL,
  `mainMenuRank` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member_menus`
--

INSERT INTO `member_menus` (`memberMenuID`, `mainMenuText`, `mainMenuIcon`, `mainMenuURL`, `mainMenuMode`, `mainMenuRank`) VALUES
(1, 'Dashboard', 'fa fa-desktop', 'dashboard', '1', 1),
(2, 'My Profile', 'fa fa-vcard', 'member-profile', '1', 2),
(3, 'Contribution Charges', 'fa fa-file-text-o', 'member-charge-history', '1', 3),
(4, 'Member Payments', 'fa fa-file-text-o', 'member-payment-history', '1', 4),
(5, 'Change Password', 'fa fa-lock', '#', '1', 5),
(6, 'Logout', 'fa fa-sign-out', 'member-logout', '1', 6);

-- --------------------------------------------------------

--
-- Table structure for table `member_privileges`
--

CREATE TABLE `member_privileges` (
  `menuID` int(11) NOT NULL,
  `memberID` varchar(50) NOT NULL,
  `memberMenuID` int(11) NOT NULL,
  `mainMenuMode` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member_privileges`
--

INSERT INTO `member_privileges` (`menuID`, `memberID`, `memberMenuID`, `mainMenuMode`) VALUES
(13, '001', 1, '1'),
(14, '001', 2, '1'),
(15, '001', 3, '1'),
(16, '001', 4, '1'),
(17, '001', 5, '1'),
(18, '001', 6, '1'),
(19, '002', 1, '1'),
(20, '002', 2, '1'),
(21, '002', 3, '1'),
(22, '002', 4, '1'),
(23, '002', 5, '1'),
(24, '002', 6, '1'),
(25, '003', 1, '1'),
(26, '003', 2, '1'),
(27, '003', 3, '1'),
(28, '003', 4, '1'),
(29, '003', 5, '1'),
(30, '003', 6, '1'),
(31, '004', 1, '1'),
(32, '004', 2, '1'),
(33, '004', 3, '1'),
(34, '004', 4, '1'),
(35, '004', 5, '1'),
(36, '004', 6, '1'),
(37, '005', 1, '1'),
(38, '005', 2, '1'),
(39, '005', 3, '1'),
(40, '005', 4, '1'),
(41, '005', 5, '1'),
(42, '005', 6, '1'),
(43, '006', 1, '1'),
(44, '006', 2, '1'),
(45, '006', 3, '1'),
(46, '006', 4, '1'),
(47, '006', 5, '1'),
(48, '006', 6, '1'),
(49, '007', 1, '1'),
(50, '007', 2, '1'),
(51, '007', 3, '1'),
(52, '007', 4, '1'),
(53, '007', 5, '1'),
(54, '007', 6, '1'),
(55, '008', 1, '1'),
(56, '008', 2, '1'),
(57, '008', 3, '1'),
(58, '008', 4, '1'),
(59, '008', 5, '1'),
(60, '008', 6, '1'),
(61, '009', 1, '1'),
(62, '009', 2, '1'),
(63, '009', 3, '1'),
(64, '009', 4, '1'),
(65, '009', 5, '1'),
(66, '009', 6, '1'),
(67, '010', 1, '1'),
(68, '010', 2, '1'),
(69, '010', 3, '1'),
(70, '010', 4, '1'),
(71, '010', 5, '1'),
(72, '010', 6, '1'),
(73, '011', 1, '1'),
(74, '011', 2, '1'),
(75, '011', 3, '1'),
(76, '011', 4, '1'),
(77, '011', 5, '1'),
(78, '011', 6, '1'),
(79, '012', 1, '1'),
(80, '012', 2, '1'),
(81, '012', 3, '1'),
(82, '012', 4, '1'),
(83, '012', 5, '1'),
(84, '012', 6, '1'),
(85, '013', 1, '1'),
(86, '013', 2, '1'),
(87, '013', 3, '1'),
(88, '013', 4, '1'),
(89, '013', 5, '1'),
(90, '013', 6, '1'),
(91, '014', 1, '1'),
(92, '014', 2, '1'),
(93, '014', 3, '1'),
(94, '014', 4, '1'),
(95, '014', 5, '1'),
(96, '014', 6, '1'),
(97, '015', 1, '1'),
(98, '015', 2, '1'),
(99, '015', 3, '1'),
(100, '015', 4, '1'),
(101, '015', 5, '1'),
(102, '015', 6, '1'),
(103, '016', 1, '1'),
(104, '016', 2, '1'),
(105, '016', 3, '1'),
(106, '016', 4, '1'),
(107, '016', 5, '1'),
(108, '016', 6, '1'),
(109, '017', 1, '1'),
(110, '017', 2, '1'),
(111, '017', 3, '1'),
(112, '017', 4, '1'),
(113, '017', 5, '1'),
(114, '017', 6, '1'),
(115, '018', 1, '1'),
(116, '018', 2, '1'),
(117, '018', 3, '1'),
(118, '018', 4, '1'),
(119, '018', 5, '1'),
(120, '018', 6, '1'),
(121, '019', 1, '1'),
(122, '019', 2, '1'),
(123, '019', 3, '1'),
(124, '019', 4, '1'),
(125, '019', 5, '1'),
(126, '019', 6, '1'),
(127, '020', 1, '1'),
(128, '020', 2, '1'),
(129, '020', 3, '1'),
(130, '020', 4, '1'),
(131, '020', 5, '1'),
(132, '020', 6, '1'),
(133, '021', 1, '1'),
(134, '021', 2, '1'),
(135, '021', 3, '1'),
(136, '021', 4, '1'),
(137, '021', 5, '1'),
(138, '021', 6, '1'),
(139, '022', 1, '1'),
(140, '022', 2, '1'),
(141, '022', 3, '1'),
(142, '022', 4, '1'),
(143, '022', 5, '1'),
(144, '022', 6, '1'),
(145, '023', 1, '1'),
(146, '023', 2, '1'),
(147, '023', 3, '1'),
(148, '023', 4, '1'),
(149, '023', 5, '1'),
(150, '023', 6, '1'),
(151, '024', 1, '1'),
(152, '024', 2, '1'),
(153, '024', 3, '1'),
(154, '024', 4, '1'),
(155, '024', 5, '1'),
(156, '024', 6, '1'),
(157, '025', 1, '1'),
(158, '025', 2, '1'),
(159, '025', 3, '1'),
(160, '025', 4, '1'),
(161, '025', 5, '1'),
(162, '025', 6, '1'),
(163, '026', 1, '1'),
(164, '026', 2, '1'),
(165, '026', 3, '1'),
(166, '026', 4, '1'),
(167, '026', 5, '1'),
(168, '026', 6, '1'),
(169, '027', 1, '1'),
(170, '027', 2, '1'),
(171, '027', 3, '1'),
(172, '027', 4, '1'),
(173, '027', 5, '1'),
(174, '027', 6, '1'),
(175, '028', 1, '1'),
(176, '028', 2, '1'),
(177, '028', 3, '1'),
(178, '028', 4, '1'),
(179, '028', 5, '1'),
(180, '028', 6, '1'),
(181, '029', 1, '1'),
(182, '029', 2, '1'),
(183, '029', 3, '1'),
(184, '029', 4, '1'),
(185, '029', 5, '1'),
(186, '029', 6, '1'),
(187, '030', 1, '1'),
(188, '030', 2, '1'),
(189, '030', 3, '1'),
(190, '030', 4, '1'),
(191, '030', 5, '1'),
(192, '030', 6, '1'),
(193, '031', 1, '1'),
(194, '031', 2, '1'),
(195, '031', 3, '1'),
(196, '031', 4, '1'),
(197, '031', 5, '1'),
(198, '031', 6, '1'),
(199, '032', 1, '1'),
(200, '032', 2, '1'),
(201, '032', 3, '1'),
(202, '032', 4, '1'),
(203, '032', 5, '1'),
(204, '032', 6, '1'),
(205, '033', 1, '1'),
(206, '033', 2, '1'),
(207, '033', 3, '1'),
(208, '033', 4, '1'),
(209, '033', 5, '1'),
(210, '033', 6, '1'),
(211, '034', 1, '1'),
(212, '034', 2, '1'),
(213, '034', 3, '1'),
(214, '034', 4, '1'),
(215, '034', 5, '1'),
(216, '034', 6, '1'),
(217, '035', 1, '1'),
(218, '035', 2, '1'),
(219, '035', 3, '1'),
(220, '035', 4, '1'),
(221, '035', 5, '1'),
(222, '035', 6, '1'),
(223, '036', 1, '1'),
(224, '036', 2, '1'),
(225, '036', 3, '1'),
(226, '036', 4, '1'),
(227, '036', 5, '1'),
(228, '036', 6, '1'),
(229, '037', 1, '1'),
(230, '037', 2, '1'),
(231, '037', 3, '1'),
(232, '037', 4, '1'),
(233, '037', 5, '1'),
(234, '037', 6, '1'),
(235, '038', 1, '1'),
(236, '038', 2, '1'),
(237, '038', 3, '1'),
(238, '038', 4, '1'),
(239, '038', 5, '1'),
(240, '038', 6, '1'),
(241, '039', 1, '1'),
(242, '039', 2, '1'),
(243, '039', 3, '1'),
(244, '039', 4, '1'),
(245, '039', 5, '1'),
(246, '039', 6, '1'),
(247, '040', 1, '1'),
(248, '040', 2, '1'),
(249, '040', 3, '1'),
(250, '040', 4, '1'),
(251, '040', 5, '1'),
(252, '040', 6, '1'),
(253, '041', 1, '1'),
(254, '041', 2, '1'),
(255, '041', 3, '1'),
(256, '041', 4, '1'),
(257, '041', 5, '1'),
(258, '041', 6, '1'),
(259, '042', 1, '1'),
(260, '042', 2, '1'),
(261, '042', 3, '1'),
(262, '042', 4, '1'),
(263, '042', 5, '1'),
(264, '042', 6, '1'),
(265, '043', 1, '1'),
(266, '043', 2, '1'),
(267, '043', 3, '1'),
(268, '043', 4, '1'),
(269, '043', 5, '1'),
(270, '043', 6, '1'),
(271, '044', 1, '1'),
(272, '044', 2, '1'),
(273, '044', 3, '1'),
(274, '044', 4, '1'),
(275, '044', 5, '1'),
(276, '044', 6, '1'),
(277, '045', 1, '1'),
(278, '045', 2, '1'),
(279, '045', 3, '1'),
(280, '045', 4, '1'),
(281, '045', 5, '1'),
(282, '045', 6, '1'),
(283, '046', 1, '1'),
(284, '046', 2, '1'),
(285, '046', 3, '1'),
(286, '046', 4, '1'),
(287, '046', 5, '1'),
(288, '046', 6, '1'),
(289, '047', 1, '1'),
(290, '047', 2, '1'),
(291, '047', 3, '1'),
(292, '047', 4, '1'),
(293, '047', 5, '1'),
(294, '047', 6, '1'),
(295, '048', 1, '1'),
(296, '048', 2, '1'),
(297, '048', 3, '1'),
(298, '048', 4, '1'),
(299, '048', 5, '1'),
(300, '048', 6, '1'),
(301, '049', 1, '1'),
(302, '049', 2, '1'),
(303, '049', 3, '1'),
(304, '049', 4, '1'),
(305, '049', 5, '1'),
(306, '049', 6, '1'),
(307, '050', 1, '1'),
(308, '050', 2, '1'),
(309, '050', 3, '1'),
(310, '050', 4, '1'),
(311, '050', 5, '1'),
(312, '050', 6, '1'),
(313, '051', 1, '1'),
(314, '051', 2, '1'),
(315, '051', 3, '1'),
(316, '051', 4, '1'),
(317, '051', 5, '1'),
(318, '051', 6, '1'),
(319, '052', 1, '1'),
(320, '052', 2, '1'),
(321, '052', 3, '1'),
(322, '052', 4, '1'),
(323, '052', 5, '1'),
(324, '052', 6, '1'),
(325, '053', 1, '1'),
(326, '053', 2, '1'),
(327, '053', 3, '1'),
(328, '053', 4, '1'),
(329, '053', 5, '1'),
(330, '053', 6, '1'),
(331, '054', 1, '1'),
(332, '054', 2, '1'),
(333, '054', 3, '1'),
(334, '054', 4, '1'),
(335, '054', 5, '1'),
(336, '054', 6, '1'),
(337, '055', 1, '1'),
(338, '055', 2, '1'),
(339, '055', 3, '1'),
(340, '055', 4, '1'),
(341, '055', 5, '1'),
(342, '055', 6, '1'),
(343, '056', 1, '1'),
(344, '056', 2, '1'),
(345, '056', 3, '1'),
(346, '056', 4, '1'),
(347, '056', 5, '1'),
(348, '056', 6, '1'),
(349, '057', 1, '1'),
(350, '057', 2, '1'),
(351, '057', 3, '1'),
(352, '057', 4, '1'),
(353, '057', 5, '1'),
(354, '057', 6, '1'),
(355, '058', 1, '1'),
(356, '058', 2, '1'),
(357, '058', 3, '1'),
(358, '058', 4, '1'),
(359, '058', 5, '1'),
(360, '058', 6, '1'),
(361, '059', 1, '1'),
(362, '059', 2, '1'),
(363, '059', 3, '1'),
(364, '059', 4, '1'),
(365, '059', 5, '1'),
(366, '059', 6, '1'),
(367, '060', 1, '1'),
(368, '060', 2, '1'),
(369, '060', 3, '1'),
(370, '060', 4, '1'),
(371, '060', 5, '1'),
(372, '060', 6, '1'),
(373, '061', 1, '1'),
(374, '061', 2, '1'),
(375, '061', 3, '1'),
(376, '061', 4, '1'),
(377, '061', 5, '1'),
(378, '061', 6, '1'),
(379, '062', 1, '1'),
(380, '062', 2, '1'),
(381, '062', 3, '1'),
(382, '062', 4, '1'),
(383, '062', 5, '1'),
(384, '062', 6, '1'),
(385, '063', 1, '1'),
(386, '063', 2, '1'),
(387, '063', 3, '1'),
(388, '063', 4, '1'),
(389, '063', 5, '1'),
(390, '063', 6, '1'),
(391, '064', 1, '1'),
(392, '064', 2, '1'),
(393, '064', 3, '1'),
(394, '064', 4, '1'),
(395, '064', 5, '1'),
(396, '064', 6, '1'),
(397, '065', 1, '1'),
(398, '065', 2, '1'),
(399, '065', 3, '1'),
(400, '065', 4, '1'),
(401, '065', 5, '1'),
(402, '065', 6, '1'),
(403, '066', 1, '1'),
(404, '066', 2, '1'),
(405, '066', 3, '1'),
(406, '066', 4, '1'),
(407, '066', 5, '1'),
(408, '066', 6, '1'),
(409, '067', 1, '1'),
(410, '067', 2, '1'),
(411, '067', 3, '1'),
(412, '067', 4, '1'),
(413, '067', 5, '1'),
(414, '067', 6, '1'),
(415, '068', 1, '1'),
(416, '068', 2, '1'),
(417, '068', 3, '1'),
(418, '068', 4, '1'),
(419, '068', 5, '1'),
(420, '068', 6, '1'),
(421, '069', 1, '1'),
(422, '069', 2, '1'),
(423, '069', 3, '1'),
(424, '069', 4, '1'),
(425, '069', 5, '1'),
(426, '069', 6, '1'),
(427, '070', 1, '1'),
(428, '070', 2, '1'),
(429, '070', 3, '1'),
(430, '070', 4, '1'),
(431, '070', 5, '1'),
(432, '070', 6, '1'),
(433, '071', 1, '1'),
(434, '071', 2, '1'),
(435, '071', 3, '1'),
(436, '071', 4, '1'),
(437, '071', 5, '1'),
(438, '071', 6, '1'),
(439, '072', 1, '1'),
(440, '072', 2, '1'),
(441, '072', 3, '1'),
(442, '072', 4, '1'),
(443, '072', 5, '1'),
(444, '072', 6, '1'),
(445, '073', 1, '1'),
(446, '073', 2, '1'),
(447, '073', 3, '1'),
(448, '073', 4, '1'),
(449, '073', 5, '1'),
(450, '073', 6, '1'),
(451, '074', 1, '1'),
(452, '074', 2, '1'),
(453, '074', 3, '1'),
(454, '074', 4, '1'),
(455, '074', 5, '1'),
(456, '074', 6, '1'),
(457, '075', 1, '1'),
(458, '075', 2, '1'),
(459, '075', 3, '1'),
(460, '075', 4, '1'),
(461, '075', 5, '1'),
(462, '075', 6, '1'),
(463, '076', 1, '1'),
(464, '076', 2, '1'),
(465, '076', 3, '1'),
(466, '076', 4, '1'),
(467, '076', 5, '1'),
(468, '076', 6, '1'),
(469, '077', 1, '1'),
(470, '077', 2, '1'),
(471, '077', 3, '1'),
(472, '077', 4, '1'),
(473, '077', 5, '1'),
(474, '077', 6, '1'),
(475, '078', 1, '1'),
(476, '078', 2, '1'),
(477, '078', 3, '1'),
(478, '078', 4, '1'),
(479, '078', 5, '1'),
(480, '078', 6, '1'),
(481, '079', 1, '1'),
(482, '079', 2, '1'),
(483, '079', 3, '1'),
(484, '079', 4, '1'),
(485, '079', 5, '1'),
(486, '079', 6, '1'),
(487, '080', 1, '1'),
(488, '080', 2, '1'),
(489, '080', 3, '1'),
(490, '080', 4, '1'),
(491, '080', 5, '1'),
(492, '080', 6, '1'),
(493, '081', 1, '1'),
(494, '081', 2, '1'),
(495, '081', 3, '1'),
(496, '081', 4, '1'),
(497, '081', 5, '1'),
(498, '081', 6, '1'),
(499, '082', 1, '1'),
(500, '082', 2, '1'),
(501, '082', 3, '1'),
(502, '082', 4, '1'),
(503, '082', 5, '1'),
(504, '082', 6, '1'),
(505, '083', 1, '1'),
(506, '083', 2, '1'),
(507, '083', 3, '1'),
(508, '083', 4, '1'),
(509, '083', 5, '1'),
(510, '083', 6, '1'),
(511, '084', 1, '1'),
(512, '084', 2, '1'),
(513, '084', 3, '1'),
(514, '084', 4, '1'),
(515, '084', 5, '1'),
(516, '084', 6, '1'),
(517, '085', 1, '1'),
(518, '085', 2, '1'),
(519, '085', 3, '1'),
(520, '085', 4, '1'),
(521, '085', 5, '1'),
(522, '085', 6, '1'),
(523, '086', 1, '1'),
(524, '086', 2, '1'),
(525, '086', 3, '1'),
(526, '086', 4, '1'),
(527, '086', 5, '1'),
(528, '086', 6, '1'),
(529, '087', 1, '1'),
(530, '087', 2, '1'),
(531, '087', 3, '1'),
(532, '087', 4, '1'),
(533, '087', 5, '1'),
(534, '087', 6, '1'),
(535, '088', 1, '1'),
(536, '088', 2, '1'),
(537, '088', 3, '1'),
(538, '088', 4, '1'),
(539, '088', 5, '1'),
(540, '088', 6, '1'),
(541, '089', 1, '1'),
(542, '089', 2, '1'),
(543, '089', 3, '1'),
(544, '089', 4, '1'),
(545, '089', 5, '1'),
(546, '089', 6, '1'),
(547, '090', 1, '1'),
(548, '090', 2, '1'),
(549, '090', 3, '1'),
(550, '090', 4, '1'),
(551, '090', 5, '1'),
(552, '090', 6, '1'),
(553, '091', 1, '1'),
(554, '091', 2, '1'),
(555, '091', 3, '1'),
(556, '091', 4, '1'),
(557, '091', 5, '1'),
(558, '091', 6, '1'),
(559, '092', 1, '1'),
(560, '092', 2, '1'),
(561, '092', 3, '1'),
(562, '092', 4, '1'),
(563, '092', 5, '1'),
(564, '092', 6, '1'),
(565, '093', 1, '1'),
(566, '093', 2, '1'),
(567, '093', 3, '1'),
(568, '093', 4, '1'),
(569, '093', 5, '1'),
(570, '093', 6, '1'),
(571, '094', 1, '1'),
(572, '094', 2, '1'),
(573, '094', 3, '1'),
(574, '094', 4, '1'),
(575, '094', 5, '1'),
(576, '094', 6, '1'),
(577, '095', 1, '1'),
(578, '095', 2, '1'),
(579, '095', 3, '1'),
(580, '095', 4, '1'),
(581, '095', 5, '1'),
(582, '095', 6, '1'),
(583, '096', 1, '1'),
(584, '096', 2, '1'),
(585, '096', 3, '1'),
(586, '096', 4, '1'),
(587, '096', 5, '1'),
(588, '096', 6, '1'),
(589, '097', 1, '1'),
(590, '097', 2, '1'),
(591, '097', 3, '1'),
(592, '097', 4, '1'),
(593, '097', 5, '1'),
(594, '097', 6, '1'),
(595, '098', 1, '1'),
(596, '098', 2, '1'),
(597, '098', 3, '1'),
(598, '098', 4, '1'),
(599, '098', 5, '1'),
(600, '098', 6, '1'),
(601, '099', 1, '1'),
(602, '099', 2, '1'),
(603, '099', 3, '1'),
(604, '099', 4, '1'),
(605, '099', 5, '1'),
(606, '099', 6, '1'),
(607, '099', 1, '1'),
(608, '099', 2, '1'),
(609, '099', 3, '1'),
(610, '099', 4, '1'),
(611, '099', 5, '1'),
(612, '099', 6, '1');

-- --------------------------------------------------------

--
-- Table structure for table `member_qualifications`
--

CREATE TABLE `member_qualifications` (
  `rowNo` int(11) NOT NULL,
  `qualificationID` varchar(200) NOT NULL,
  `memberID` varchar(200) NOT NULL,
  `qualificationLevel` varchar(200) NOT NULL,
  `institution` varchar(250) NOT NULL,
  `facultyCollege` varchar(250) NOT NULL,
  `qualificationStatus` varchar(200) NOT NULL,
  `graduationDate` varchar(200) NOT NULL,
  `percentage` varchar(200) NOT NULL,
  `regDate` varchar(200) NOT NULL,
  `certificationTestimoni` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member_qualifications`
--

INSERT INTO `member_qualifications` (`rowNo`, `qualificationID`, `memberID`, `qualificationLevel`, `institution`, `facultyCollege`, `qualificationStatus`, `graduationDate`, `percentage`, `regDate`, `certificationTestimoni`) VALUES
(5, 'QUA-0005', 'VOL-0001', 'Bachelor Degree', 'University of Somalia', 'Computer Science', 'Graduated', '2015', '3.79', '2021-10-07 18:57:38', 'uploads/documents/QUA-0005_0.jpg'),
(6, 'QUA-0006', 'VOL-0006', 'Secondary', 'Ibnu Khuzeyma', 'General Secondary', 'Graduated', '2010', '90', '2021-10-08 22:54:18', 'uploads/documents/QUA-0006_0.pdf'),
(7, 'QUA-0007', 'VOL-0006', 'Bachelor Degree', 'University of Somalia', 'Computer Science', 'Graduated', '2015', '3.68', '2021-10-08 22:57:03', 'uploads/documents/QUA-0007_0.pdf'),
(8, 'QUA-0008', 'VOL-0006', 'Master Degree', 'Port City International University', 'Computer Engineering', 'Graduated', '2017', '3.25', '2021-10-08 22:58:08', 'uploads/documents/QUA-0008_0.pdf'),
(9, 'QUA-0009', 'VOL-0007', 'Bachelor Degree', 'Benadir University', 'Agriculture', 'Graduated', '2014', '95', '2021-10-06 01:21:18', 'uploads/documents/QUA-0009_0.jpg'),
(10, 'QUA-0010', 'VOL-0008', 'Master Degree', 'uniso', 'cs', 'Graduated', '2015', '3.1', '2021-10-05 22:02:32', 'uploads/documents/QUA-0010_0.pdf'),
(11, 'QUA-0011', 'VOL-0011', 'Master Degree', 'pciu', 'cs', 'Graduated', '2017', '3.1', '2021-11-11 18:26:38', 'uploads/documents/QUA-0011_0.pdf'),
(12, 'QUA-0012', 'VOL-0001', 'PhD', 'Near East University', 'Software Engineering', 'Continue', 'null', '3.60', '2021-12-05 18:04:46', 'uploads/documents/QUA-0012_0.png'),
(13, 'QUA-0013', 'VOL-0021', 'Master Degree', 'uniso', 'cs', 'Graduated', '2015', '3.1', '2021-12-05 20:51:00', 'uploads/documents/QUA-0013_0.png'),
(15, 'QUA14-2022', '098', 'Bachelor Degree', 'University of Somalia', 'Computer Science', 'Graduated', '2015', '3.79', '2022-09-17 08:43:54', 'uploads/documents/QUA14-2022_0.pdf'),
(16, 'QUA16-2022', '098', 'Master Degree', 'Ondokuz Mayis University', 'Computer Engineering', 'Graduated', '2022', '3.38', '2022-09-17 08:45:35', 'uploads/documents/QUA16-2022_0.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `member_work_experiences`
--

CREATE TABLE `member_work_experiences` (
  `rowNo` int(11) NOT NULL,
  `workExperienceID` varchar(200) NOT NULL,
  `memberID` varchar(200) NOT NULL,
  `workType` varchar(200) NOT NULL,
  `employerName` varchar(250) NOT NULL,
  `titlePosition` varchar(250) NOT NULL,
  `startDate` varchar(200) NOT NULL,
  `workStatus` varchar(200) NOT NULL,
  `workLeftDate` varchar(200) NOT NULL,
  `regDate` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member_work_experiences`
--

INSERT INTO `member_work_experiences` (`rowNo`, `workExperienceID`, `memberID`, `workType`, `employerName`, `titlePosition`, `startDate`, `workStatus`, `workLeftDate`, `regDate`) VALUES
(3, 'WEX1-2022', '014', 'Full Time', 'Simad University ', 'Lecturer ', '2017-03-01', 'Working', '---', '2022-09-19 11:18:57');

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
-- Table structure for table `project_manager`
--

CREATE TABLE `project_manager` (
  `rowNo` int(11) NOT NULL,
  `Pro_id` varchar(20) NOT NULL,
  `proNameList` varchar(100) NOT NULL,
  `proStatusLis` varchar(100) NOT NULL,
  `proStartDateList` varchar(100) NOT NULL,
  `proEndDateList` varchar(100) NOT NULL,
  `ProjectDesc` varchar(40) NOT NULL,
  `registeredBy` varchar(100) NOT NULL,
  `registerDate` varchar(100) NOT NULL,
  `updatedBy` varchar(100) NOT NULL,
  `updateDate` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project_manager`
--

INSERT INTO `project_manager` (`rowNo`, `Pro_id`, `proNameList`, `proStatusLis`, `proStartDateList`, `proEndDateList`, `ProjectDesc`, `registeredBy`, `registerDate`, `updatedBy`, `updateDate`) VALUES
(2, 'BM1-2022', 'Kaafiye School', 'Pending', '2022-09-29', '2022-10-05', 'full stack developer', 'US49-2022', '2022-09-29 10:22:38', '-', '-');

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
(102, 'Events', 'fa fa-angle-double-right', 'events', '11', '1', 1),
(103, 'Member Profiles', 'fa fa-angle-double-right', 'member-profiles', '3', '1', 3),
(104, 'View All Projects', 'fa fa-user', 'project_list', '12', '1', 1),
(105, 'Task Manager', 'fa fa-tasks', 'Task_list', '12', '1', 2),
(106, 'Patients', 'fa fa-angle-double-right', 'patients', '3', '1', 4),
(107, 'Doctors', 'fa fa-angle-double-right', 'doctors', '3', '1', 5),
(108, 'Departments', 'fa fa-angle-double-right', 'departments', '3', '1', 6),
(109, 'Appointments', 'fa fa-angle-double-right', 'appointments', '3', '1', 7),
(110, 'Doctor App', 'fa fa-userfa fa-angle-double-right', 'doctor_appointment', '3', '1', 8),
(111, 'Patients-Report', 'fa fa-angle-double-right', 'patients_report', '5', '1', 17),
(112, 'Diseases', 'fa fa-angle-double-right', 'diseases', '3', '1', 9);

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
('SYS2-2022', 'img/icon.png', 'Adeega Daryeel', 'uploads/photos/smallinst.png', 'img/al-abaadir.png', 'fa fa-ambulance*#*#*#ADEEGA DARYEEL', 'img/reportHeader.png', '<strong>Adeega Daryeel</strong> (Hospital Management System)', 'Version 1.1');

-- --------------------------------------------------------

--
-- Table structure for table `task_list`
--

CREATE TABLE `task_list` (
  `rowNo` int(11) NOT NULL,
  `Task_Id` varchar(30) NOT NULL,
  `Project_Id` varchar(30) NOT NULL,
  `ProjectName` varchar(50) NOT NULL,
  `Task_Name` varchar(30) NOT NULL,
  `Task_Desc` varchar(30) NOT NULL,
  `Task_Status` varchar(30) NOT NULL,
  `taskStartdate` varchar(50) NOT NULL,
  `taskEnddate` varchar(50) NOT NULL,
  `registeredBy` varchar(30) NOT NULL,
  `registerDate` varchar(30) NOT NULL,
  `updatedBy` varchar(30) NOT NULL,
  `updateDate` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `task_list`
--

INSERT INTO `task_list` (`rowNo`, `Task_Id`, `Project_Id`, `ProjectName`, `Task_Name`, `Task_Desc`, `Task_Status`, `taskStartdate`, `taskEnddate`, `registeredBy`, `registerDate`, `updatedBy`, `updateDate`) VALUES
(4, '4', '4', 'dvdvd', 'aaaa', 'sssss', 'panding', '1-20-2021', '5-5-202', '', '', '', '');

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
(50, 'US50-2022', 'EM23-2022', 'ibraahim', '2525', 'Disabled', 'M-23CT6YH7', 'Offline', 'US2100001', '2022-09-28 13:25:04', '-', '-');

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
(143, 'US2100001', '2022-09-28 16:42:45', '2022-09-28 16:43:42'),
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
(172, 'US2100002', '2022-12-17 13:09:42', '');

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
(313, 'US48-2022', 11, '1'),
(314, 'US49-2022', 1, '1'),
(315, 'US49-2022', 2, '1'),
(316, 'US49-2022', 3, '1'),
(317, 'US49-2022', 4, '1'),
(318, 'US49-2022', 5, '1'),
(319, 'US49-2022', 6, '1'),
(320, 'US49-2022', 7, '1'),
(321, 'US49-2022', 8, '1'),
(322, 'US49-2022', 9, '1'),
(323, 'US49-2022', 11, '1'),
(324, 'US48-2022', 12, '1'),
(325, 'US49-2022', 12, '1'),
(326, 'US50-2022', 1, '1'),
(327, 'US50-2022', 2, '1'),
(328, 'US50-2022', 3, '1'),
(329, 'US50-2022', 4, '1'),
(330, 'US50-2022', 5, '1'),
(331, 'US50-2022', 6, '1'),
(332, 'US50-2022', 7, '1'),
(333, 'US50-2022', 8, '1'),
(334, 'US50-2022', 9, '1'),
(335, 'US50-2022', 11, '1'),
(336, 'US50-2022', 12, '1');

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
(139, 'US50-2022', 'users', '0', '0', '0');

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
(1262, 'US48-2022', 102, '1'),
(1267, 'US48-2022', 103, '0'),
(1268, 'US49-2022', 2, '1'),
(1269, 'US49-2022', 5, '1'),
(1270, 'US49-2022', 22, '1'),
(1275, 'US49-2022', 103, '1'),
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
(1303, 'US49-2022', 102, '1'),
(1304, 'US48-2022', 104, '1'),
(1305, 'US49-2022', 104, '1'),
(1306, 'US48-2022', 105, '1'),
(1307, 'US49-2022', 105, '1'),
(1308, 'US50-2022', 2, '1'),
(1309, 'US50-2022', 5, '1'),
(1310, 'US50-2022', 22, '1'),
(1315, 'US50-2022', 103, '1'),
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
(1343, 'US50-2022', 102, '1'),
(1344, 'US50-2022', 104, '1'),
(1345, 'US50-2022', 105, '1'),
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
(1358, 'US48-2022', 110, '1'),
(1359, 'US49-2022', 110, '1'),
(1360, 'US50-2022', 110, '1'),
(1361, 'US48-2022', 111, '1'),
(1362, 'US49-2022', 111, '1'),
(1363, 'US50-2022', 111, '1'),
(1364, 'US48-2022', 112, '1'),
(1365, 'US49-2022', 112, '1'),
(1366, 'US50-2022', 112, '1');

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
-- Indexes for table `contribution_types`
--
ALTER TABLE `contribution_types`
  ADD PRIMARY KEY (`rowNo`),
  ADD UNIQUE KEY `investmentTypeID` (`contributionTypeID`);

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
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`eventID`);

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
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`rowNo`),
  ADD UNIQUE KEY `studentID` (`memberID`);

--
-- Indexes for table `member_cv`
--
ALTER TABLE `member_cv`
  ADD PRIMARY KEY (`rowNo`);

--
-- Indexes for table `member_logins`
--
ALTER TABLE `member_logins`
  ADD PRIMARY KEY (`loginID`),
  ADD KEY `memberID` (`memberID`);

--
-- Indexes for table `member_menus`
--
ALTER TABLE `member_menus`
  ADD PRIMARY KEY (`memberMenuID`);

--
-- Indexes for table `member_privileges`
--
ALTER TABLE `member_privileges`
  ADD PRIMARY KEY (`menuID`);

--
-- Indexes for table `member_qualifications`
--
ALTER TABLE `member_qualifications`
  ADD PRIMARY KEY (`rowNo`),
  ADD UNIQUE KEY `qualificationID` (`qualificationID`);

--
-- Indexes for table `member_work_experiences`
--
ALTER TABLE `member_work_experiences`
  ADD PRIMARY KEY (`rowNo`),
  ADD UNIQUE KEY `workExperienceID` (`workExperienceID`);

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
-- Indexes for table `project_manager`
--
ALTER TABLE `project_manager`
  ADD PRIMARY KEY (`rowNo`),
  ADD UNIQUE KEY `Pro_id` (`Pro_id`);

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
-- Indexes for table `task_list`
--
ALTER TABLE `task_list`
  ADD PRIMARY KEY (`rowNo`),
  ADD UNIQUE KEY `Task_Id` (`Task_Id`);

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
-- AUTO_INCREMENT for table `contribution_types`
--
ALTER TABLE `contribution_types`
  MODIFY `rowNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `rowNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `eventID` int(11) NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `rowNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `member_cv`
--
ALTER TABLE `member_cv`
  MODIFY `rowNo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `member_logins`
--
ALTER TABLE `member_logins`
  MODIFY `loginID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `member_menus`
--
ALTER TABLE `member_menus`
  MODIFY `memberMenuID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `member_privileges`
--
ALTER TABLE `member_privileges`
  MODIFY `menuID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=613;

--
-- AUTO_INCREMENT for table `member_qualifications`
--
ALTER TABLE `member_qualifications`
  MODIFY `rowNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `member_work_experiences`
--
ALTER TABLE `member_work_experiences`
  MODIFY `rowNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
-- AUTO_INCREMENT for table `project_manager`
--
ALTER TABLE `project_manager`
  MODIFY `rowNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sub_menus`
--
ALTER TABLE `sub_menus`
  MODIFY `subMenuID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `task_list`
--
ALTER TABLE `task_list`
  MODIFY `rowNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `rowNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `user_logins`
--
ALTER TABLE `user_logins`
  MODIFY `loginID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=173;

--
-- AUTO_INCREMENT for table `user_main_menus`
--
ALTER TABLE `user_main_menus`
  MODIFY `userMainMenuID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=337;

--
-- AUTO_INCREMENT for table `user_role_privileges`
--
ALTER TABLE `user_role_privileges`
  MODIFY `roleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT for table `user_sub_menus`
--
ALTER TABLE `user_sub_menus`
  MODIFY `userSubMenuD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1367;

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

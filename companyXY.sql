-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2025 at 08:54 AM
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
-- Database: `companyxy`
--

-- --------------------------------------------------------

--
-- Table structure for table `applicant`
--

CREATE TABLE `applicant` (
  `ApplicantID` int(13) NOT NULL,
  `BirthDate` date NOT NULL,
  `NationalID` int(13) NOT NULL,
  `ID_Expiry_Date` date NOT NULL,
  `Name` varchar(100) NOT NULL,
  `age` int(2) NOT NULL,
  `Nationality` varchar(100) NOT NULL,
  `Ethnicity` varchar(50) NOT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Facebook` varchar(100) DEFAULT NULL,
  `Gender` enum('M','F') NOT NULL,
  `Home_phone` varchar(10) DEFAULT NULL,
  `Office_phone` varchar(10) DEFAULT NULL,
  `Mobile` varchar(10) NOT NULL,
  `Military_Status` varchar(20) DEFAULT NULL,
  `Marital_Status` varchar(20) NOT NULL,
  `Height` int(3) DEFAULT NULL,
  `Weight` int(3) DEFAULT NULL,
  `Religion` varchar(100) DEFAULT NULL,
  `Source_Information` varchar(100) DEFAULT NULL,
  `AddressNum` varchar(10) DEFAULT NULL,
  `Street` varchar(100) DEFAULT NULL,
  `Village` varchar(10) DEFAULT NULL,
  `Subdistrict` varchar(50) DEFAULT NULL,
  `District` varchar(50) DEFAULT NULL,
  `Province` varchar(50) DEFAULT NULL,
  `Postal_Code` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `applicant`
--

INSERT INTO `applicant` (`ApplicantID`, `BirthDate`, `NationalID`, `ID_Expiry_Date`, `Name`, `age`, `Nationality`, `Ethnicity`, `Email`, `Facebook`, `Gender`, `Home_phone`, `Office_phone`, `Mobile`, `Military_Status`, `Marital_Status`, `Height`, `Weight`, `Religion`, `Source_Information`, `AddressNum`, `Street`, `Village`, `Subdistrict`, `District`, `Province`, `Postal_Code`) VALUES
(1, '2000-03-01', 2147483647, '2030-03-01', 'สมชาย แสนดี', 25, 'ไทย', 'ไทย', 'somchai@gmail.com', 'facebook.com/somchai', 'M', '027654321', '021234567', '0891234567', 'ได้รับการยกเว้น', 'โสด', 175, 68, 'พุทธ', 'เว็บไซต์บริษัท', '123', 'รามคำแหง', 'บ้านสวนสุข', 'หัวหมาก', 'บางกะปิ', 'กรุงเทพฯ', '10240'),
(2, '1998-07-15', 2147483647, '2028-07-15', 'อารีย์ ใจดี', 27, 'ไทย', 'ไทย', 'aree_jaidee@hotmail.com', 'fb.com/aree.official', 'F', '029998877', '023334455', '0911112222', 'เกณฑ์แล้ว', 'สมรส', 160, 50, 'คริสต์', 'เพื่อนแนะนำ', '45/2', 'ลาดพร้าว', 'บ้านบุญญา', 'จรเข้บัว', 'ลาดพร้าว', 'กรุงเทพฯ', '10230'),
(3, '1995-12-05', 2147483647, '2025-12-05', 'เอกพล น้อยใจดี', 30, 'ไทย', 'ไทย', 'ekapol@gmail.com', 'fb.com/ekapol.cool', 'M', '027777000', '020202020', '0955556666', 'ยังไม่เกณฑ์', 'โสด', 168, 60, 'อิสลาม', 'บูธรับสมัคร', '88/1', 'พหลโยธิน', 'บ้านพัฒนา', 'สายไหม', 'สายไหม', 'กรุงเทพฯ', '10220'),
(4, '2001-09-09', 2147483647, '2031-09-09', 'จิตรา ศรีสง่า', 23, 'ไทย', 'ไทย', 'jittra@yahoo.com', 'facebook.com/jittra', 'F', '026612233', '027799000', '0933334444', 'ได้รับการยกเว้น', 'โสด', 158, 48, 'พุทธ', 'เว็บไซต์บริษัท', '57', 'วิภาวดี', 'บ้านเรือนร', 'จตุจักร', 'จตุจักร', 'กรุงเทพฯ', '10900'),
(5, '1997-05-20', 2147483647, '2027-05-20', 'กิตติพงษ์ มีสุข', 28, 'ไทย', 'ไทย', 'kittipong@gmail.com', 'fb.com/kitti.happy', 'M', '027100200', '021122334', '0888889999', 'เกณฑ์แล้ว', 'หย่า', 172, 70, 'พุทธ', 'โฆษณาออนไลน์', '98/7', 'สุขุมวิท', 'บ้านโชคดี', 'พระโขนง', 'คลองเตย', 'กรุงเทพฯ', '10110');

-- --------------------------------------------------------

--
-- Table structure for table `application_round`
--

CREATE TABLE `application_round` (
  `round` int(3) NOT NULL,
  `Opening_Year` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `application_round`
--

INSERT INTO `application_round` (`round`, `Opening_Year`) VALUES
(1, '2022'),
(2, '2022'),
(3, '2023'),
(4, '2023'),
(5, '2024'),
(6, '2024');

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `BranchID` int(5) NOT NULL,
  `BranchName` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`BranchID`, `BranchName`) VALUES
(1, 'บางบัวทอง'),
(248, 'อยุธยา'),
(256, 'กรุงเทพ'),
(416, 'ปทุมธานี'),
(428, 'สกลนคร');

-- --------------------------------------------------------

--
-- Table structure for table `doc_submission`
--

CREATE TABLE `doc_submission` (
  `ApplicantID` int(6) NOT NULL,
  `DocID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doc_submission`
--

INSERT INTO `doc_submission` (`ApplicantID`, `DocID`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 1),
(2, 4),
(3, 2),
(3, 3),
(4, 1),
(4, 5),
(5, 3);

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `Education_Level` varchar(50) NOT NULL,
  `Institution` varchar(50) NOT NULL,
  `Start_Date` date NOT NULL,
  `End_Date` date NOT NULL,
  `Major` varchar(50) NOT NULL,
  `ApplicantID` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `emergency_contact`
--

CREATE TABLE `emergency_contact` (
  `Contact_Name` varchar(50) NOT NULL,
  `Relationship` varchar(50) DEFAULT NULL,
  `Address` varchar(100) DEFAULT NULL,
  `Phone` varchar(10) NOT NULL,
  `ApplicantID` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `emergency_contact`
--

INSERT INTO `emergency_contact` (`Contact_Name`, `Relationship`, `Address`, `Phone`, `ApplicantID`) VALUES
('ธนพล', 'พี่ชาย', '9/9 ซ.ลาดพร้าว 101', '0923456789', 3),
('พิมพ์ใจ', 'เพื่อนร่วมงาน', '88 อาคาร A ชั้น 3', '0845678912', 4),
('วิไลวรรณ', 'น้องสาว', '67 ซ.สุขุมวิท 49', '0861234567', 5),
('สมศักดิ์', 'พ่อ', '123 หมู่ 5 เชียงใหม่', '0812345678', 1),
('อารีย์', 'แม่', '45/1 ถนนพระราม 2', '0898765432', 2);

-- --------------------------------------------------------

--
-- Table structure for table `employee_recruit`
--

CREATE TABLE `employee_recruit` (
  `Application_Date` date DEFAULT NULL,
  `ApplicantID` int(6) NOT NULL,
  `JobOpening_ID` int(4) NOT NULL,
  `PosID` int(3) NOT NULL,
  `Round` int(2) NOT NULL,
  `BranchID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee_recruit`
--

INSERT INTO `employee_recruit` (`Application_Date`, `ApplicantID`, `JobOpening_ID`, `PosID`, `Round`, `BranchID`) VALUES
('0000-00-00', 1, 2001, 312, 3, 248),
('0000-00-00', 2, 2002, 112, 5, 256),
('0000-00-00', 3, 2003, 415, 2, 428),
('0000-00-00', 4, 2004, 212, 6, 1),
('0000-00-00', 5, 2005, 518, 4, 416);

-- --------------------------------------------------------

--
-- Table structure for table `job_openings`
--

CREATE TABLE `job_openings` (
  `JobOpening_ID` int(4) NOT NULL,
  `Amount` int(3) DEFAULT NULL,
  `Application_Status` enum('Open','Close') DEFAULT NULL,
  `Qualifications` varchar(100) DEFAULT NULL,
  `PosID` int(3) NOT NULL,
  `Round` int(2) NOT NULL,
  `BranchID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `job_openings`
--

INSERT INTO `job_openings` (`JobOpening_ID`, `Amount`, `Application_Status`, `Qualifications`, `PosID`, `Round`, `BranchID`) VALUES
(2001, 2, 'Open', 'ป.ตรี วิศวกรรมโยธา', 312, 3, 248),
(2002, 1, 'Open', 'มีประสบการณ์ด้านบัญชี 1 ปี', 112, 5, 256),
(2003, 3, 'Close', 'ใช้ Photoshop/Illustrator ได้คล่อง', 415, 2, 428),
(2004, 2, 'Open', 'ปวส. หรือ ป.ตรี ด้าน IT, เขียน Java ได้', 212, 6, 1),
(2005, 1, 'Close', 'เคยผ่านงาน HR หรือเอกสารพนักงานมาก่อน', 518, 4, 416);

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `PosID` int(3) NOT NULL,
  `PosName` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`PosID`, `PosName`) VALUES
(112, 'นักบัญชี'),
(212, 'โปรแกรมเมอร์'),
(312, 'วิศวกรโยธา'),
(415, 'นักออกแบบกราฟิก'),
(518, 'เจ้าหน้าที่บุคคล');

-- --------------------------------------------------------

--
-- Table structure for table `relatives`
--

CREATE TABLE `relatives` (
  `Relative_Name` varchar(50) NOT NULL,
  `Phone` int(10) DEFAULT NULL,
  `Age` int(3) DEFAULT NULL,
  `Occupation` varchar(50) DEFAULT NULL,
  `Relationship` varchar(50) DEFAULT NULL,
  `Num_Children` int(2) DEFAULT NULL,
  `Position` varchar(50) DEFAULT NULL,
  `Workplace` varchar(100) DEFAULT NULL,
  `ApplicantID` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `relatives`
--

INSERT INTO `relatives` (`Relative_Name`, `Phone`, `Age`, `Occupation`, `Relationship`, `Num_Children`, `Position`, `Workplace`, `ApplicantID`) VALUES
('ปรเมศวร์', 923456789, 35, 'พนักงานบัญชี', 'พี่ชาย', 1, 'หัวหน้าแผนกบัญชี', 'บ.เจริญสินการเงิน', 3),
('ภูวดล', 861234567, 55, 'ข้าราชการ', 'พ่อ', 4, 'ผู้อำนวยการเขต', 'สำนักงานเขตบางบัวทอง', 5),
('รัตนา', 898765432, 48, 'ครู', 'แม่', 3, 'ครูประถม', 'รร.บ้านคลองห้วย', 2),
('วาสนา', 845678912, 40, 'แพทย์', 'น้องสาว', 0, 'แพทย์ทั่วไป', 'รพ.เมืองสกล', 4),
('สมชาย', 812345678, 52, 'วิศวกร', 'ลุง', 2, 'วิศวกรอาวุโส', 'บ.เทคโนไทย', 1);

-- --------------------------------------------------------

--
-- Table structure for table `siblings`
--

CREATE TABLE `siblings` (
  `Age` int(3) NOT NULL,
  `Occupation` varchar(50) NOT NULL,
  `Sibling_Name` varchar(50) NOT NULL,
  `Sibling_Order` int(2) NOT NULL,
  `Num_Siblings` int(2) NOT NULL,
  `ApplicantID` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `siblings`
--

INSERT INTO `siblings` (`Age`, `Occupation`, `Sibling_Name`, `Sibling_Order`, `Num_Siblings`, `ApplicantID`) VALUES
(21, 'นักเรียน', 'พราว', 2, 2, 4),
(25, 'นักศึกษาปริญญาโท', 'ปวริศา', 2, 3, 1),
(28, 'วิศวกร', 'ศิวกร', 3, 4, 3),
(30, 'ครู', 'ปาริฉัตร', 1, 3, 5),
(32, 'พนักงานบัญชี', 'ชานนท์', 1, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `special_skills`
--

CREATE TABLE `special_skills` (
  `skill_id` int(5) NOT NULL,
  `language` varchar(255) DEFAULT NULL,
  `Computer` enum('Y','N') NOT NULL,
  `driver_license` int(8) DEFAULT NULL,
  `Driving_Ability` enum('Y','N') NOT NULL,
  `office_equipment_skills` varchar(100) DEFAULT NULL,
  `special_knowledge` varchar(100) DEFAULT NULL,
  `favorite_sports` varchar(100) DEFAULT NULL,
  `hobbies` varchar(100) DEFAULT NULL,
  `thai_typing_speed` int(4) DEFAULT NULL,
  `english_typing_speed` int(4) DEFAULT NULL,
  `ApplicantID` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `special_skills`
--

INSERT INTO `special_skills` (`skill_id`, `language`, `Computer`, `driver_license`, `Driving_Ability`, `office_equipment_skills`, `special_knowledge`, `favorite_sports`, `hobbies`, `thai_typing_speed`, `english_typing_speed`, `ApplicantID`) VALUES
(1, 'อังกฤษ, ญี่ปุ่น', 'Y', 12345678, 'Y', 'เครื่องพิมพ์, เครื่องถ่ายเอกสาร', 'Python, Data Analysis', 'แบดมินตัน', 'อ่านหนังสือ, วาดรูป', 45, 35, 1),
(2, 'จีน, อังกฤษ', 'Y', 87654321, 'Y', 'สแกนเนอร์, ปริ้นเตอร์', 'การบัญชีขั้นสูง, Excel Pro', 'วิ่ง', 'ปลูกต้นไม้, ทำอาหาร', 50, 40, 2),
(3, 'อังกฤษ', 'N', NULL, 'N', NULL, 'การวิเคราะห์ตลาด', 'ว่ายน้ำ', 'เล่นบอร์ดเกม', 30, 20, 3),
(4, 'ฝรั่งเศส, อังกฤษ', 'Y', 56781234, 'Y', 'เครื่องถ่ายเอกสาร, โทรศัพท์', 'AI Tools, Adobe Photoshop', 'ฟุตบอล', 'ถ่ายภาพ, อ่านข่าว', 40, 38, 4),
(5, 'เกาหลี, อังกฤษ', 'Y', 99887766, 'Y', 'เครื่องแฟกซ์, คอมพิวเตอร์', 'แปลภาษา, Coding', 'บาสเกตบอล', 'ดูซีรีส์, เขียนนิยาย', 42, 33, 5);

-- --------------------------------------------------------

--
-- Table structure for table `support_doc`
--

CREATE TABLE `support_doc` (
  `DocID` int(5) NOT NULL,
  `DocName` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `support_doc`
--

INSERT INTO `support_doc` (`DocID`, `DocName`) VALUES
(1, 'เอกสารประกอบ'),
(2, 'เอกสารบัตรประชาชน'),
(3, 'รูปภาพ'),
(4, 'เอกสารอื่นๆ'),
(5, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `work_exper`
--

CREATE TABLE `work_exper` (
  `Workplace` varchar(100) NOT NULL,
  `Job_Position` varchar(50) DEFAULT NULL,
  `Salary` int(6) DEFAULT NULL,
  `Job_Description` varchar(100) DEFAULT NULL,
  `Start_Date` date DEFAULT NULL,
  `End_date` date DEFAULT NULL,
  `Reason_Leaving` varchar(100) DEFAULT NULL,
  `ApplicantID` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `work_exper`
--

INSERT INTO `work_exper` (`Workplace`, `Job_Position`, `Salary`, `Job_Description`, `Start_Date`, `End_date`, `Reason_Leaving`, `ApplicantID`) VALUES
('BuildTech Co.', 'วิศวกรโยธา', 35000, 'ควบคุมงานก่อสร้างและบริหารโครงการ', '2022-01-05', '2023-03-30', 'โปรเจกต์จบแล้ว', 4),
('CreativeSoft', 'กราฟิกดีไซน์', 28000, 'ออกแบบสื่อโฆษณาและ UX/UI', '2019-11-15', '2021-10-20', 'ต้องการเปลี่ยนสายงาน', 3),
('FinSmart Co.', 'นักบัญชี', 22000, 'ตรวจสอบงบการเงินและรายงานภาษี', '2020-05-01', '2022-05-30', 'หมดสัญญาจ้าง', 2),
('SmartEdu Ltd.', 'ครูสอนคณิตศาสตร์', 20000, 'สอนระดับมัธยมต้นและจัดทำแผนการสอน', '2020-06-01', '2023-01-31', 'หางานที่ใกล้บ้าน', 5),
('TechVision Co., Ltd.', 'เจ้าหน้าที่ไอที', 25000, 'ดูแลระบบเครือข่ายภายในองค์กร', '2021-01-10', '2022-12-31', 'ย้ายที่อยู่', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applicant`
--
ALTER TABLE `applicant`
  ADD PRIMARY KEY (`ApplicantID`);

--
-- Indexes for table `application_round`
--
ALTER TABLE `application_round`
  ADD PRIMARY KEY (`round`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`BranchID`);

--
-- Indexes for table `doc_submission`
--
ALTER TABLE `doc_submission`
  ADD PRIMARY KEY (`ApplicantID`,`DocID`),
  ADD KEY `DocID` (`DocID`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`Education_Level`,`Institution`,`Start_Date`,`End_Date`,`Major`,`ApplicantID`),
  ADD KEY `ApplicantID` (`ApplicantID`);

--
-- Indexes for table `emergency_contact`
--
ALTER TABLE `emergency_contact`
  ADD PRIMARY KEY (`Contact_Name`,`ApplicantID`),
  ADD KEY `ApplicantID` (`ApplicantID`);

--
-- Indexes for table `employee_recruit`
--
ALTER TABLE `employee_recruit`
  ADD PRIMARY KEY (`ApplicantID`,`JobOpening_ID`,`PosID`,`Round`,`BranchID`),
  ADD KEY `BranchID` (`BranchID`),
  ADD KEY `Round` (`Round`),
  ADD KEY `PosID` (`PosID`);

--
-- Indexes for table `job_openings`
--
ALTER TABLE `job_openings`
  ADD PRIMARY KEY (`JobOpening_ID`,`PosID`,`Round`,`BranchID`),
  ADD KEY `BranchID` (`BranchID`),
  ADD KEY `Round` (`Round`),
  ADD KEY `PosID` (`PosID`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`PosID`);

--
-- Indexes for table `relatives`
--
ALTER TABLE `relatives`
  ADD PRIMARY KEY (`Relative_Name`,`ApplicantID`),
  ADD KEY `ApplicantID` (`ApplicantID`);

--
-- Indexes for table `siblings`
--
ALTER TABLE `siblings`
  ADD PRIMARY KEY (`Age`,`Occupation`,`Sibling_Name`,`Sibling_Order`,`Num_Siblings`,`ApplicantID`),
  ADD KEY `ApplicantID` (`ApplicantID`);

--
-- Indexes for table `special_skills`
--
ALTER TABLE `special_skills`
  ADD PRIMARY KEY (`skill_id`,`ApplicantID`),
  ADD UNIQUE KEY `fk_special_skills_applicant` (`ApplicantID`);

--
-- Indexes for table `support_doc`
--
ALTER TABLE `support_doc`
  ADD PRIMARY KEY (`DocID`);

--
-- Indexes for table `work_exper`
--
ALTER TABLE `work_exper`
  ADD PRIMARY KEY (`Workplace`,`ApplicantID`),
  ADD KEY `ApplicantID` (`ApplicantID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `special_skills`
--
ALTER TABLE `special_skills`
  MODIFY `skill_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `doc_submission`
--
ALTER TABLE `doc_submission`
  ADD CONSTRAINT `doc_submission_ibfk_1` FOREIGN KEY (`DocID`) REFERENCES `support_doc` (`DocID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `doc_submission_ibfk_2` FOREIGN KEY (`ApplicantID`) REFERENCES `applicant` (`ApplicantID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `education`
--
ALTER TABLE `education`
  ADD CONSTRAINT `education_ibfk_1` FOREIGN KEY (`ApplicantID`) REFERENCES `applicant` (`ApplicantID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `emergency_contact`
--
ALTER TABLE `emergency_contact`
  ADD CONSTRAINT `emergency_contact_ibfk_1` FOREIGN KEY (`ApplicantID`) REFERENCES `applicant` (`ApplicantID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employee_recruit`
--
ALTER TABLE `employee_recruit`
  ADD CONSTRAINT `employee_recruit_ibfk_1` FOREIGN KEY (`BranchID`) REFERENCES `branch` (`BranchID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `employee_recruit_ibfk_2` FOREIGN KEY (`Round`) REFERENCES `application_round` (`round`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `employee_recruit_ibfk_3` FOREIGN KEY (`PosID`) REFERENCES `position` (`PosID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `employee_recruit_ibfk_4` FOREIGN KEY (`ApplicantID`) REFERENCES `applicant` (`ApplicantID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `job_openings`
--
ALTER TABLE `job_openings`
  ADD CONSTRAINT `job_openings_ibfk_1` FOREIGN KEY (`BranchID`) REFERENCES `branch` (`BranchID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `job_openings_ibfk_2` FOREIGN KEY (`Round`) REFERENCES `application_round` (`round`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `job_openings_ibfk_3` FOREIGN KEY (`PosID`) REFERENCES `position` (`PosID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `relatives`
--
ALTER TABLE `relatives`
  ADD CONSTRAINT `relatives_ibfk_1` FOREIGN KEY (`ApplicantID`) REFERENCES `applicant` (`ApplicantID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `siblings`
--
ALTER TABLE `siblings`
  ADD CONSTRAINT `siblings_ibfk_1` FOREIGN KEY (`ApplicantID`) REFERENCES `applicant` (`ApplicantID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `special_skills`
--
ALTER TABLE `special_skills`
  ADD CONSTRAINT `special_skills_ibfk_1` FOREIGN KEY (`ApplicantID`) REFERENCES `applicant` (`ApplicantID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `work_exper`
--
ALTER TABLE `work_exper`
  ADD CONSTRAINT `work_exper_ibfk_1` FOREIGN KEY (`ApplicantID`) REFERENCES `applicant` (`ApplicantID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

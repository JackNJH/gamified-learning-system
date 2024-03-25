-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 25, 2024 at 03:19 PM
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
-- Database: `loodle`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

DROP TABLE IF EXISTS `answers`;
CREATE TABLE IF NOT EXISTS `answers` (
  `AnswerID` int NOT NULL AUTO_INCREMENT,
  `QuestionID` int NOT NULL,
  `AnswerText` text NOT NULL,
  `AnswerPic` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`AnswerID`),
  KEY `QuestionID` (`QuestionID`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`AnswerID`, `QuestionID`, `AnswerText`, `AnswerPic`) VALUES
(11, 4, '0', ''),
(12, 4, '1', ''),
(13, 5, '0', ''),
(14, 5, '1', ''),
(15, 6, '0', ''),
(16, 6, '1', ''),
(17, 7, '0', ''),
(18, 7, '1', '');

-- --------------------------------------------------------

--
-- Table structure for table `badges`
--

DROP TABLE IF EXISTS `badges`;
CREATE TABLE IF NOT EXISTS `badges` (
  `BadgeID` int NOT NULL AUTO_INCREMENT,
  `BadgeName` varchar(25) NOT NULL,
  `BadgeReq` text NOT NULL,
  `BadgePic` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `ClassID` int NOT NULL,
  PRIMARY KEY (`BadgeID`),
  KEY `ClassID` (`ClassID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `badges`
--

INSERT INTO `badges` (`BadgeID`, `BadgeName`, `BadgeReq`, `BadgePic`, `ClassID`) VALUES
(1, 'Upside Down Duck', 'complete the class?\r\n', '../uploads/classes/1/a64b4e4845233b1c44e6993a667b9b73 - Copy.jpg', 1),
(3, 'test2', 'sadwqdasd', '../uploads/classes/2/588438128cc558ce11bb218fc760757c.jpg', 2),
(5, 'nice', 'Complete Basic Programming Logic', '../uploads/classes/5/50b469bd-6948-4406-8b58-131d40c4f2a8.png', 5),
(6, 'poppin bottles', 'Complete Cybersecurity for beginners class', '../uploads/classes/6/d4f.jpg', 6);

-- --------------------------------------------------------

--
-- Table structure for table `chapter`
--

DROP TABLE IF EXISTS `chapter`;
CREATE TABLE IF NOT EXISTS `chapter` (
  `ChapterID` int NOT NULL AUTO_INCREMENT,
  `ClassID` int NOT NULL,
  `ChapterName` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`ChapterID`),
  KEY `ClassID` (`ClassID`)
) ENGINE=InnoDB AUTO_INCREMENT=110 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `chapter`
--

INSERT INTO `chapter` (`ChapterID`, `ClassID`, `ChapterName`) VALUES
(105, 5, 'Logic Gates'),
(106, 5, 'Basic Conditions'),
(107, 5, 'Nested Conditions'),
(108, 6, 'Security Risks'),
(109, 6, 'Risk Management');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

DROP TABLE IF EXISTS `class`;
CREATE TABLE IF NOT EXISTS `class` (
  `ClassID` int NOT NULL AUTO_INCREMENT,
  `TeacherID` varchar(30) NOT NULL,
  `ClassName` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `ClassDesc` text NOT NULL,
  `ClassDashboard` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `ClassDiff` varchar(20) NOT NULL,
  `ClassMaxPoints` int NOT NULL,
  `ClassPrivacy` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `ClassCode` int DEFAULT NULL,
  `ClassCreateDate` date NOT NULL,
  PRIMARY KEY (`ClassID`),
  KEY `TeacherID` (`TeacherID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`ClassID`, `TeacherID`, `ClassName`, `ClassDesc`, `ClassDashboard`, `ClassDiff`, `ClassMaxPoints`, `ClassPrivacy`, `ClassCode`, `ClassCreateDate`) VALUES
(1, 'T65d5f96036291', 'Physics', 'test class', '', 'hard', 100, 'private', 1234, '2024-02-28'),
(2, 'T65d5f96036291', 'Calculus II', 'dsadasad', '../images/tech.jpg', 'easy', 100, 'public', NULL, '2024-02-28'),
(5, 'T65d5f96036291', 'Basic Programming Logic', 'learn programming logical problems from simple logic gates to complex nested conditions that make you cry', '../images/istockphoto-1191643368-612x612.jpg', 'medium', 4, 'public', 123, '0000-00-00'),
(6, 'T65d5f96036291', 'Cybersecurity for beginners', 'Learn to protect your system and explore security features', '../images/burglar-using-laptop_13339-15733.jpg', 'easy', 5, 'public', 12345, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `classprogress`
--

DROP TABLE IF EXISTS `classprogress`;
CREATE TABLE IF NOT EXISTS `classprogress` (
  `ProgressID` int NOT NULL AUTO_INCREMENT,
  `StudentID` varchar(30) NOT NULL,
  `ClassID` int NOT NULL,
  `ChapterID` int NOT NULL,
  `ProgressPoints` int NOT NULL,
  PRIMARY KEY (`ProgressID`),
  KEY `ClassID` (`ClassID`),
  KEY `StudentID` (`StudentID`),
  KEY `LevelID` (`ChapterID`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `classprogress`
--

INSERT INTO `classprogress` (`ProgressID`, `StudentID`, `ClassID`, `ChapterID`, `ProgressPoints`) VALUES
(20, 'S65d5f97ecec69', 5, 105, 3),
(21, 'S65e02dc353965', 5, 105, 4);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `CommentID` int NOT NULL AUTO_INCREMENT,
  `ClassID` int NOT NULL,
  `StudentID` varchar(30) NOT NULL,
  `CommentText` text NOT NULL,
  PRIMARY KEY (`CommentID`),
  KEY `ClassID` (`ClassID`),
  KEY `StudentID` (`StudentID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

DROP TABLE IF EXISTS `level`;
CREATE TABLE IF NOT EXISTS `level` (
  `LevelID` int NOT NULL AUTO_INCREMENT,
  `ChapterID` int NOT NULL,
  `LevelContent` text NOT NULL,
  `LevelPic` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `LevelValue` int NOT NULL,
  PRIMARY KEY (`LevelID`),
  KEY `ChapterID` (`ChapterID`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`LevelID`, `ChapterID`, `LevelContent`, `LevelPic`, `LevelValue`) VALUES
(5, 105, 'AND(x): 1 x 1 = 1 | 1 x 0 = 0 \r\n', '../images/Logic-Gate-AND-OR-XOR-NOT-NAND-NOR-XNOR.jpg', 1),
(6, 105, 'OR(+): 1 + 1 = 1 | 1 + 0 = 1 ', '../images/Logic-Gate-AND-OR-XOR-NOT-NAND-NOR-XNOR.jpg', 2),
(7, 105, 'NAND: 1 x 1 = !1 = 0 ', '../images/Logic-Gate-AND-OR-XOR-NOT-NAND-NOR-XNOR.jpg', 3),
(8, 105, 'NOR: 0 + 0 = !0 = 1 ', '../images/Logic-Gate-AND-OR-XOR-NOT-NAND-NOR-XNOR.jpg', 4),
(9, 106, 'IF(){}<br>Happens IF the condition is met', '../images/programcondition.jpeg', 1),
(10, 107, 'IF(){<br>\r\n&nbsp;&nbsp;IF(){}<br>\r\n&nbsp;&nbsp;ELSE{}<br>\r\n}', '../images/nested.png', 1),
(11, 108, 'Here are the common types of cybersecurity threats.', '../images/SecurityThreats.png', 1),
(12, 106, 'ELSE IF(){}<br>\r\nHappens when the IF conditions prior to this are not met', '../images/programcondition.jpeg', 2),
(13, 106, 'ELSE{}<br>Executes when all IF/ELSEIF condition isnt met', '../images/programcondition.jpeg', 3),
(14, 107, 'IF(){<br>\r\n&nbsp; IF(){}<br>\r\n&nbsp; ELSEIF(){}<br>\r\n}<br>\r\nELSE{}', '../images/nested.png', 2),
(15, 109, '<u>1. Identify Risk</u><br>\r\nUncover, recognize and describe risks that might affect your project or its outcomes.<br><br>\r\n<u>2. Analyze the Risk</u><br>\r\nOnce risks are identified you determine the likelihood and consequence of each risk.\r\n<br><br>\r\n<u>3. Evaluate or Rank the Risk</u><br>\r\nYou evaluate or rank the risk by determining the risk magnitude, which is the combination of likelihood and consequence. \r\n<br><br>\r\n<u>4. Treat the Risk</u><br>\r\nAssess your highest ranked risks and set out a plan to treat or modify these risks to achieve acceptable risk levels.\r\n<br><br>\r\n<u>5. Monitor and Review the Risk</u><br>\r\nThis is the step where you take your Project Risk Register and use it to monitor, track and review risks.\r\n', '../images/RiskManagement.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

DROP TABLE IF EXISTS `question`;
CREATE TABLE IF NOT EXISTS `question` (
  `QuestionID` int NOT NULL AUTO_INCREMENT,
  `LevelID` int NOT NULL,
  `QuestionText` text NOT NULL,
  `QuestionPic` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `QuestionPoints` int NOT NULL,
  `CorrectAnswer` int NOT NULL,
  PRIMARY KEY (`QuestionID`),
  KEY `LevelID` (`LevelID`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`QuestionID`, `LevelID`, `QuestionText`, `QuestionPic`, `QuestionPoints`, `CorrectAnswer`) VALUES
(4, 5, '1 AND 1 = ?', '', 1, 12),
(5, 6, '1 OR 0 = ?', '', 1, 14),
(6, 7, '0 NAND 1 = ?', '', 1, 16),
(7, 8, '1 NOR 1 = ?', '', 1, 17);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `StudentID` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `UserID` varchar(30) NOT NULL,
  `SelectedBadge1` int DEFAULT NULL,
  `SelectedBadge2` int DEFAULT NULL,
  `SelectedBadge3` int DEFAULT NULL,
  PRIMARY KEY (`StudentID`),
  KEY `UserID` (`UserID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`StudentID`, `UserID`, `SelectedBadge1`, `SelectedBadge2`, `SelectedBadge3`) VALUES
('S65d5f97ecec69', 'U65d5f97ece763', 1, 3, 1),
('S65e02dc353965', 'U65e02dc3530f3', NULL, NULL, NULL),
('S65e6f8180ce09', 'U65e6f8180c5a1', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `studentbadge`
--

DROP TABLE IF EXISTS `studentbadge`;
CREATE TABLE IF NOT EXISTS `studentbadge` (
  `EarnedBadgeID` int NOT NULL AUTO_INCREMENT,
  `EarnedBadgeDate` date NOT NULL,
  `BadgeID` int NOT NULL,
  `StudentID` varchar(30) NOT NULL,
  PRIMARY KEY (`EarnedBadgeID`),
  KEY `BadgeID` (`BadgeID`),
  KEY `StudentID` (`StudentID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `studentbadge`
--

INSERT INTO `studentbadge` (`EarnedBadgeID`, `EarnedBadgeDate`, `BadgeID`, `StudentID`) VALUES
(1, '2024-02-28', 1, 'S65d5f97ecec69'),
(3, '2024-02-28', 3, 'S65d5f97ecec69');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

DROP TABLE IF EXISTS `teacher`;
CREATE TABLE IF NOT EXISTS `teacher` (
  `TeacherID` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `UserID` varchar(30) NOT NULL,
  PRIMARY KEY (`TeacherID`),
  KEY `UserID` (`UserID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`TeacherID`, `UserID`) VALUES
('T65d5f96036291', 'U65d5f960356df');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

DROP TABLE IF EXISTS `tickets`;
CREATE TABLE IF NOT EXISTS `tickets` (
  `TicketID` int NOT NULL AUTO_INCREMENT,
  `StudentID` varchar(30) NOT NULL,
  `TicketCtgy` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `TicketDesc` text NOT NULL,
  `TicketAttch` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `TicketStat` varchar(10) NOT NULL,
  `TicketDate` date NOT NULL,
  PRIMARY KEY (`TicketID`),
  KEY `StudentID` (`StudentID`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`TicketID`, `StudentID`, `TicketCtgy`, `TicketDesc`, `TicketAttch`, `TicketStat`, `TicketDate`) VALUES
(1, 'S65d5f97ecec69', 'half the site doesnt work', '\r\nUgh, I am utterly frustrated right now! I swear, I\'ve been trying to navigate through this website for what feels like an eternity, and half of it just doesn\'t work! It\'s like they expect us to be mind readers or something. I mean, isn\'t it their job to make sure this thing runs smoothly? I shouldn\'t have to jump through hoops just to get basic information or complete a simple task. This is beyond ridiculous! I demand to speak to someone in charge because this level of incompetence is completely unacceptable. They need to get their act together and fix this mess ASAP!', '../uploads/tickets/1/2d8f2dfd613f960a4cc189b20a6a58163f565c67.png', 'pending', '2024-02-28'),
(2, 'S65e02dc353965', 'mouse aint working', 'hey my mouse isnt working >:(', '../uploads/tickets/2/download.jpeg', 'open', '2024-02-12'),
(9, 'S65d5f97ecec69', 'bruh', 'bruhhhh', '../uploads/tickets/', 'pending', '2024-03-16'),
(10, 'S65d5f97ecec69', 'help me', 'pls help me ;-;', '', 'pending', '2024-03-16'),
(11, 'S65d5f97ecec69', 'just end it', 'pls', '', 'pending', '2024-03-16'),
(12, 'S65e02dc353965', 'Page issue', 'why shit no work', '', 'pending', '2024-03-24');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `UserID` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `UserName` varchar(25) NOT NULL,
  `UserEmail` varchar(250) NOT NULL,
  `UserTel` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `UserPass` varchar(250) NOT NULL,
  `UserType` varchar(10) NOT NULL,
  `UserBio` text NOT NULL,
  `UserPFP` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `UserCreateDate` date NOT NULL,
  `UserStatus` text NOT NULL,
  PRIMARY KEY (`UserID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `UserName`, `UserEmail`, `UserTel`, `UserPass`, `UserType`, `UserBio`, `UserPFP`, `UserCreateDate`, `UserStatus`) VALUES
('Adminidsimulator', 'imadmin', 'imadmin@gmail.com', '12345678', 'imadmin', 'admin', 'I love cats!', '../uploads/profilepic/Adminidsimulator/cat2.jpg', '2024-02-21', 'active'),
('adminnumber2', 'secondadmin', 'secondadmin@gmail.com', '7354437', 'secondadmin', 'admin', 'im the second admin!', '', '2024-03-07', 'active'),
('U65d5f960356df', 'TeacherGarnt', 'teachergarnt@gmail.com', '123123123', 'teachergae', 'teacher', '', '', '2024-02-21', 'active'),
('U65d5f97ece763', 'student123', 'student123@gmail.com', '32132132', 'student123', 'student', 'Hi<br>How\'s life<br><br>', '../uploads/profilepic/U65d5f97ece763/mirage face.jpg', '2024-02-21', 'active'),
('U65e02dc3530f3', 'Bobby', 'student2@gmail.com', '222222333', 'student2', 'student', '', '', '2024-02-29', 'active'),
('U65e6f8180c5a1', 'ban subject', 'bansubject@gmail.com', '90009992', 'ban subject', 'student', 'do i deserve dis ban', '', '2024-03-05', 'banned');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_ibfk_1` FOREIGN KEY (`QuestionID`) REFERENCES `question` (`QuestionID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `badges`
--
ALTER TABLE `badges`
  ADD CONSTRAINT `badges_ibfk_1` FOREIGN KEY (`ClassID`) REFERENCES `class` (`ClassID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `chapter`
--
ALTER TABLE `chapter`
  ADD CONSTRAINT `chapter_ibfk_1` FOREIGN KEY (`ClassID`) REFERENCES `class` (`ClassID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `class`
--
ALTER TABLE `class`
  ADD CONSTRAINT `class_ibfk_1` FOREIGN KEY (`TeacherID`) REFERENCES `teacher` (`TeacherID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `classprogress`
--
ALTER TABLE `classprogress`
  ADD CONSTRAINT `classprogress_ibfk_2` FOREIGN KEY (`ClassID`) REFERENCES `class` (`ClassID`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `classprogress_ibfk_3` FOREIGN KEY (`StudentID`) REFERENCES `student` (`StudentID`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `classprogress_ibfk_4` FOREIGN KEY (`ChapterID`) REFERENCES `chapter` (`ChapterID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`ClassID`) REFERENCES `class` (`ClassID`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`StudentID`) REFERENCES `student` (`StudentID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `level`
--
ALTER TABLE `level`
  ADD CONSTRAINT `level_ibfk_1` FOREIGN KEY (`ChapterID`) REFERENCES `chapter` (`ChapterID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `question_ibfk_1` FOREIGN KEY (`LevelID`) REFERENCES `level` (`LevelID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `studentbadge`
--
ALTER TABLE `studentbadge`
  ADD CONSTRAINT `studentbadge_ibfk_1` FOREIGN KEY (`BadgeID`) REFERENCES `badges` (`BadgeID`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `studentbadge_ibfk_2` FOREIGN KEY (`StudentID`) REFERENCES `student` (`StudentID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `teacher_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_ibfk_1` FOREIGN KEY (`StudentID`) REFERENCES `student` (`StudentID`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 21, 2024 at 02:01 PM
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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `AdminID` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `UserID` varchar(30) NOT NULL,
  PRIMARY KEY (`AdminID`),
  KEY `UserID` (`UserID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  `AnswerValue` int NOT NULL,
  PRIMARY KEY (`AnswerID`),
  KEY `QuestionID` (`QuestionID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chapter`
--

DROP TABLE IF EXISTS `chapter`;
CREATE TABLE IF NOT EXISTS `chapter` (
  `ChapterID` int NOT NULL AUTO_INCREMENT,
  `ClassID` int NOT NULL,
  PRIMARY KEY (`ChapterID`),
  KEY `ClassID` (`ClassID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  `ClassCode` int NOT NULL,
  `ClassCreateDate` date NOT NULL,
  PRIMARY KEY (`ClassID`),
  KEY `TeacherID` (`TeacherID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `classprogress`
--

DROP TABLE IF EXISTS `classprogress`;
CREATE TABLE IF NOT EXISTS `classprogress` (
  `ProgressID` int NOT NULL AUTO_INCREMENT,
  `StudentID` varchar(30) NOT NULL,
  `ClassID` int NOT NULL,
  `ProgressPoints` int NOT NULL,
  PRIMARY KEY (`ProgressID`),
  KEY `ClassID` (`ClassID`),
  KEY `StudentID` (`StudentID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  PRIMARY KEY (`LevelID`),
  KEY `ChapterID` (`ChapterID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  PRIMARY KEY (`QuestionID`),
  KEY `LevelID` (`LevelID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `StudentID` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `UserID` varchar(30) NOT NULL,
  PRIMARY KEY (`StudentID`),
  KEY `UserID` (`UserID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`StudentID`, `UserID`) VALUES
('S65d5f97ecec69', 'U65d5f97ece763');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  `TicketCtgy` varchar(25) NOT NULL,
  `TicketDesc` text NOT NULL,
  `TicketAttch` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `TicketStat` int NOT NULL,
  PRIMARY KEY (`TicketID`),
  KEY `StudentID` (`StudentID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  PRIMARY KEY (`UserID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `UserName`, `UserEmail`, `UserTel`, `UserPass`, `UserType`, `UserBio`, `UserPFP`, `UserCreateDate`) VALUES
('Adminidsimulator', 'imadmin', 'imadmin@gmail.com', '12345678', 'imadmin', 'admin', '', '../uploads/profilepic/Adminidsimulator/71f9cd8213812af6235984e995854923.jpg', '2024-02-21'),
('U65d5f960356df', 'teachergae', 'teachergae@gmail.com', '123123123', 'teachergae', 'teacher', '', '', '2024-02-21'),
('U65d5f97ece763', 'student123', 'student123@gmail.com', '32132132', 'student123', 'student', '', '', '2024-02-21');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

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
  ADD CONSTRAINT `classprogress_ibfk_3` FOREIGN KEY (`StudentID`) REFERENCES `student` (`StudentID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

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

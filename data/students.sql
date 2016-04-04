SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

CREATE DATABASE IF NOT EXISTS `studentdb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `studentdb`;

CREATE TABLE IF NOT EXISTS `program_table` (
  `prog_id` int(11) NOT NULL AUTO_INCREMENT,
  `prog_name` varchar(40) DEFAULT NULL,
  `school_id` int(11) NOT NULL,
  PRIMARY KEY (`prog_id`),
  KEY `school_id` (`school_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

INSERT INTO `program_table` (`prog_id`, `prog_name`, `school_id`) VALUES
(1, 'HVAC Technology', 1),
(2, 'Welding Technology', 1),
(3, 'Accounting', 2),
(4, 'Management', 2),
(5, 'Criminal Justice', 3),
(6, 'Culinary Arts', 4),
(7, 'Hospitality Management Administration', 4),
(8, 'Hotel & Restaurant Management', 4),
(9, 'Travel & Tourism Management', 4),
(10, 'Computer Aided Drafting', 5),
(11, 'Architectural Drafting', 5),
(12, 'Mechanical Drafting', 5),
(13, 'Graphic Design', 5),
(14, 'Video Production', 5),
(15, 'Web Design/Development', 5),
(16, 'Medical Assisting', 6),
(17, 'Medical Coding', 6),
(18, 'Medical Office Administration', 6),
(19, 'Surgical Technology', 6),
(20, 'Therapeutic Massage Practitioner', 6),
(21, 'Practical Nursing', 7),
(22, 'Associate in Science, Nursing', 7),
(23, 'Computer Programming', 8),
(24, 'Information Technology', 8),
(25, 'Network Administration', 8),
(26, 'Network Security & Computer Forensics', 8),
(27, 'Electronics Engineering Technology', 9),
(28, 'Oil & Gas Electronics', 9),
(29, 'Smart Building Technology', 9);

CREATE TABLE IF NOT EXISTS `school_table` (
  `school_id` int(11) NOT NULL AUTO_INCREMENT,
  `school_name` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`school_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

INSERT INTO `school_table` (`school_id`, `school_name`) VALUES
(1, 'Trades Technology'),
(2, 'Business'),
(3, 'Criminal Justice'),
(4, 'Hospitality and Culinary Arts'),
(5, 'Design'),
(6, 'Healthcare'),
(7, 'Nursing'),
(8, 'Information Technology'),
(9, 'Energy and Electronics Technology');

CREATE TABLE IF NOT EXISTS `service_table` (
  `serv_id` int(11) NOT NULL AUTO_INCREMENT,
  `stud_id` int(11) NOT NULL,
  `service_desc` text,
  PRIMARY KEY (`serv_id`),
  KEY `stud_id` (`stud_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

CREATE TABLE IF NOT EXISTS `student_table` (
  `stud_id` int(11) NOT NULL AUTO_INCREMENT,
  `prog_id` int(11) NOT NULL,
  `stud_name` varchar(75) DEFAULT NULL,
  `gender` enum('Male','Female') DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `quarter` varchar(5) DEFAULT NULL,
  `description` text,
  `award` enum('Nominee','Award Recipient','Honorable Mention') DEFAULT NULL,
  PRIMARY KEY (`stud_id`),
  KEY `prog_id` (`prog_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;


ALTER TABLE `program_table`
  ADD CONSTRAINT `program_table_ibfk_1` FOREIGN KEY (`school_id`) REFERENCES `school_table` (`school_id`);

ALTER TABLE `service_table`
  ADD CONSTRAINT `service_table_ibfk_1` FOREIGN KEY (`stud_id`) REFERENCES `student_table` (`stud_id`);

ALTER TABLE `student_table`
  ADD CONSTRAINT `student_table_ibfk_1` FOREIGN KEY (`prog_id`) REFERENCES `program_table` (`prog_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

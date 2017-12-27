-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.28-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for php_course
CREATE DATABASE IF NOT EXISTS `php_course` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `php_course`;

-- Dumping structure for table php_course.courses
CREATE TABLE IF NOT EXISTS `courses` (
  `course_name` varchar(50) DEFAULT NULL,
  `course_id` int(11) NOT NULL,
  PRIMARY KEY (`course_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table php_course.courses: ~2 rows (approximately)
/*!40000 ALTER TABLE `courses` DISABLE KEYS */;
INSERT INTO `courses` (`course_name`, `course_id`) VALUES
	('PHP Fundamentals', 1),
	('JS Core', 2);
/*!40000 ALTER TABLE `courses` ENABLE KEYS */;

-- Dumping structure for procedure php_course.GetData
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetData`()
BEGIN
SELECT CONCAT (first_name, ' ', last_name) AS full_name, number, course_name
FROM students AS st
INNER JOIN student_subscription AS sub ON sub.student_id = st.student_id
INNER JOIN courses ON courses.course_id = sub.course_id;
END//
DELIMITER ;

-- Dumping structure for table php_course.students
CREATE TABLE IF NOT EXISTS `students` (
  `student_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `number` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`student_id`),
  UNIQUE KEY `number` (`number`)
) ENGINE=InnoDB AUTO_INCREMENT=141 DEFAULT CHARSET=latin1;

-- Dumping data for table php_course.students: ~4 rows (approximately)
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
INSERT INTO `students` (`student_id`, `first_name`, `last_name`, `number`) VALUES
	(137, 'Yo', 'En', '17621'),
	(138, 'W', 'Q', '34567'),
	(139, '0', '0', '00000'),
	(140, 'E', 'R', '6789');
/*!40000 ALTER TABLE `students` ENABLE KEYS */;

-- Dumping structure for table php_course.student_subscription
CREATE TABLE IF NOT EXISTS `student_subscription` (
  `student_id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`student_id`),
  KEY `course_ids` (`course_id`),
  CONSTRAINT `course_ids` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `student_subscription_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=141 DEFAULT CHARSET=latin1;

-- Dumping data for table php_course.student_subscription: ~4 rows (approximately)
/*!40000 ALTER TABLE `student_subscription` DISABLE KEYS */;
INSERT INTO `student_subscription` (`student_id`, `course_id`) VALUES
	(137, 1),
	(139, 1),
	(138, 2),
	(140, 2);
/*!40000 ALTER TABLE `student_subscription` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

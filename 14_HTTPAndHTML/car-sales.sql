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


-- Dumping database structure for cars
CREATE DATABASE IF NOT EXISTS `cars` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `cars`;

-- Dumping structure for table cars.cars
CREATE TABLE IF NOT EXISTS `cars` (
  `car_id` int(11) NOT NULL AUTO_INCREMENT,
  `make` varchar(100) DEFAULT NULL,
  `model` varchar(100) DEFAULT NULL,
  `year_production` int(11) DEFAULT NULL,
  PRIMARY KEY (`car_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table cars.cars: ~4 rows (approximately)
/*!40000 ALTER TABLE `cars` DISABLE KEYS */;
INSERT INTO `cars` (`car_id`, `make`, `model`, `year_production`) VALUES
	(1, 'Renault', '19', 1989),
	(2, 'Citroes', 'C4', 1995),
	(3, 'Renault', 'Clio', 2000),
	(4, 'Folkswagen', '4', 1992);
/*!40000 ALTER TABLE `cars` ENABLE KEYS */;

-- Dumping structure for table cars.customers
CREATE TABLE IF NOT EXISTS `customers` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) DEFAULT NULL,
  `family_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table cars.customers: ~4 rows (approximately)
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` (`customer_id`, `first_name`, `family_name`) VALUES
	(1, 'A', 'B'),
	(2, 'Jap', 'An'),
	(3, 'Le', 'France'),
	(4, 'Ger', 'Man');
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;

-- Dumping structure for function cars.getFullName
DELIMITER //
CREATE DEFINER=`root`@`localhost` FUNCTION `getFullName`(first_name VARCHAR(100), family_name VARCHAR(100)) RETURNS varchar(250) CHARSET latin1
BEGIN
	DECLARE full_name VARCHAR(250);
	SET full_name = CONCAT(first_name, ' ', family_name);
	RETURN full_name;
END//
DELIMITER ;

-- Dumping structure for procedure cars.get_sales
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_sales`(
	OUT `amount_total` FLOAT
)
BEGIN
    SELECT SUM(`amount`) INTO amount_total FROM `sales`;
  END//
DELIMITER ;

-- Dumping structure for table cars.sales
CREATE TABLE IF NOT EXISTS `sales` (
  `sale_id` int(11) NOT NULL AUTO_INCREMENT,
  `car_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `sale_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `amount` float DEFAULT NULL,
  PRIMARY KEY (`sale_id`),
  KEY `FK_car_ids` (`car_id`),
  KEY `FK_customer_ids` (`customer_id`),
  CONSTRAINT `FK_car_ids` FOREIGN KEY (`car_id`) REFERENCES `cars` (`car_id`),
  CONSTRAINT `FK_customer_ids` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table cars.sales: ~5 rows (approximately)
/*!40000 ALTER TABLE `sales` DISABLE KEYS */;
INSERT INTO `sales` (`sale_id`, `car_id`, `customer_id`, `sale_date`, `amount`) VALUES
	(1, 1, 1, '2017-12-26 00:00:00', 1500),
	(2, 2, 2, '2017-12-26 00:00:00', 2500),
	(3, 2, 1, '2017-12-26 20:16:23', 1500),
	(4, 3, 3, '2017-12-26 20:37:08', 4000),
	(5, 4, 4, '2017-12-26 20:47:33', 2500);
/*!40000 ALTER TABLE `sales` ENABLE KEYS */;

-- Dumping structure for view cars.salesdata
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `salesdata` (
	`make` VARCHAR(100) NULL COLLATE 'latin1_swedish_ci',
	`model` VARCHAR(100) NULL COLLATE 'latin1_swedish_ci',
	`year_production` INT(11) NULL,
	`sale_date` TIMESTAMP NULL,
	`amount` FLOAT NULL,
	`full_name` VARCHAR(250) NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;

-- Dumping structure for view cars.salesdata
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `salesdata`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` VIEW `salesdata` AS SELECT make, model, year_production, sale_date, amount, getFullName(first_name, family_name) AS full_name
        FROM sales
        INNER JOIN cars ON sales.car_id = cars.car_id
        INNER JOIN customers ON sales.customer_id = customers.customer_id ;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

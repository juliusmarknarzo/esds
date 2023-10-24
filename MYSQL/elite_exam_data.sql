-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.24-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.2.0.6576
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for elite_exam
DROP DATABASE IF EXISTS `elite_exam`;
CREATE DATABASE IF NOT EXISTS `elite_exam` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `elite_exam`;

-- Dumping structure for table elite_exam.t_artists
DROP TABLE IF EXISTS `t_artists`;
CREATE TABLE IF NOT EXISTS `t_artists` (
  `artist_id` int(11) NOT NULL AUTO_INCREMENT,
  `artist` varchar(255) DEFAULT NULL,
  `album` varchar(255) DEFAULT NULL,
  `sales` varchar(255) DEFAULT NULL,
  `date_released` varchar(255) DEFAULT NULL,
  `last_update` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`artist_id`)
) ENGINE=InnoDB AUTO_INCREMENT=120 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table elite_exam.t_artists: ~119 rows (approximately)
DELETE FROM `t_artists`;
INSERT INTO `t_artists` (`artist_id`, `artist`, `album`, `sales`, `date_released`, `last_update`) VALUES
	(1, '﻿AB6IX', 'Complete with You: Special Album', '43058', '220117', '220131'),
	(2, 'aespa', 'Savage', '19629', '211005', '220430'),
	(3, 'Apink', 'Horn', '58641', '220214', '220228'),
	(4, 'ATEEZ', 'Zero: Fever Epilogue', '3578', '211210', '220131'),
	(5, 'BAE173', 'Intersection: Blaze', '16801', '220330', '220430'),
	(6, 'BamBam', 'B', '87540', '220118', '220131'),
	(7, 'Bang Yongguk', '2', '6933', '220302', '220331'),
	(8, 'Billlie', 'The Collective Soul and Unconscious: Chapter One', '66885', '220223', '220430'),
	(9, 'Blitzers', 'Bobbin', '17719', '220103', '220131'),
	(10, 'Bolbbalgan4', 'Seoul', '2596', '220420', '220430'),
	(11, 'Brave Girls', 'Thank You', '33605', '220315', '220331'),
	(12, 'BTOB', 'Be Together', '121528', '220221', '220331'),
	(13, 'Choi Yena', 'Smiley', '84346', '220117', '220331'),
	(14, 'Cravity', 'Liberty: In Our Cosmos Part.2', '123922', '220322', '220430'),
	(15, 'Cherry Bullet', 'Cherry Wish', '20250', '220302', '220331'),
	(16, 'Def.', 'Love', '41148', '220126', '220131'),
	(17, 'DKZ', 'Chase, Ep.2-Maum', '118583', '220412', '220430'),
	(18, 'Dreamcatcher', 'Apocalypse: Save Us', '94706', '220412', '220430'),
	(19, 'Drippin', 'Villian', '37535', '220117', '220430'),
	(20, 'ELAST', 'Roar', '48695', '220427', '220430'),
	(21, 'Enhypen', 'Dimension: Dilemma', '27591', '211012', '220430'),
	(22, 'Enhypen', 'Dimension: Answer', '621425', '220110', '220430'),
	(23, 'Epex', 'Book of Anxiety Chapter1. 21st Century Boys', '71584', '220411', '220430'),
	(24, 'Epik High', 'Epik High is Here', '5382', '220214', '220228'),
	(25, 'Eric Nam', 'There and Back Again', '2183', '220107', '220430'),
	(26, 'Everglow', 'Return of the Girl', '2450', '211201', '220131'),
	(27, 'fromis_9', 'Midnight Guest', '120245', '220117', '220331'),
	(28, '(G)I-dle', 'I Never Die', '198589', '220314', '220430'),
	(29, 'Ghost9', 'Arcade: V', '9311', '220407', '220430'),
	(30, 'Ha Sungwoon', 'You', '18717', '220209', '220228'),
	(31, 'Highlight', 'Daydream', '86293', '220321', '220430'),
	(32, 'ILY:1', 'Love in Bloom', '3181', '220404', '220430'),
	(33, 'IVE', 'Eleven', '37284', '211201', '220430'),
	(34, 'IVE', 'Love Dive', '440067', '220405', '220430'),
	(35, 'Jinjin & Rocky', 'Restore', '57401', '220117', '220228'),
	(36, 'Just B', 'Just Begun', '51504', '220414', '220430'),
	(37, 'Kai', 'Peaches', '5373', '211130', '220131'),
	(38, 'Kang Hyewon', 'Winter Special Album: W', '18305', '220104', '220131'),
	(39, 'Kep1er', 'First Impact', '271048', '220103', '220430'),
	(40, 'Kihyun', 'Voyager', '141407', '220315', '220430'),
	(41, 'Kim Jaehwan', 'The Letter', '9639', '211228', '220131'),
	(42, 'Kim Junsu', 'Dimension', '55470', '220317', '220430'),
	(43, 'Kim Sungkyu', 'Savior', '28082', '220422', '220430'),
	(44, 'Kim Wooseok', 'Reve: 3rd Desire', '67957', '220307', '220331'),
	(45, 'Kim Yohan', 'Illusoin', '51754', '220110', '220131'),
	(46, 'Kingdom', 'History of Kingdom: Pt. 4: Dann', '19450', '220331', '220430'),
	(47, 'Kwon Eunbi', 'Color', '55923', '220404', '220430'),
	(48, 'Kyuhyun', 'Love Story (4 Season Project 季)', '37215', '220125', '220228'),
	(49, 'Lee Seokhoon', 'Same Spot', '7673', '220324', '220331'),
	(50, 'Lee Seungyoon', 'Even if it becomes ruins', '7640', '211124', '220228'),
	(51, 'Lisa', 'Lalisa', '73336', '210910', '220430'),
	(52, 'LUNA', 'Moonlight', '3705', '220117', '220131'),
	(53, 'Max Changmin', 'Devil', '21831', '220113', '220228'),
	(54, 'Mirae', 'Marvelous', '48067', '220112', '220131'),
	(55, 'Miyeon', 'My', '90064', '220427', '220430'),
	(56, 'Monsta X', 'No Limit', '23015', '211119', '220228'),
	(57, 'Monsta X', 'Shape of Love', '284668', '220426', '220430'),
	(58, 'Moonbin & Sanha', 'Refuge', '144205', '220315', '220430'),
	(59, 'Moonbyul', '6equence', '78120', '220119', '220228'),
	(60, 'Moonbyul', 'CITT: Cheese in the Trap', '86508', '220428', '220430'),
	(61, 'NCT 127', 'Sticker', '31194', '210917', '220430'),
	(62, 'NCT 127', 'Favorite', '30331', '211025', '220331'),
	(63, 'NCT 2021', 'Universe', '118633', '211214', '220430'),
	(64, 'NCT Dream', 'Glitch Mode', '1649993', '220328', '220430'),
	(65, 'NINE.i', 'New World', '3618', '220330', '220430'),
	(66, 'NMIXX', 'Ad Mare', '406936', '220222', '220430'),
	(67, 'NUEST', 'Need & Bubble: Nuest the Best Album', '63446', '220315', '220331'),
	(68, 'Oh My Girl', 'Real Love', '66912', '220328', '220430'),
	(69, 'Omega X', 'Love Me Like', '86941', '220105', '220131'),
	(70, 'Onew', 'Dice', '119006', '220411', '220430'),
	(71, 'ONEWE', 'Planet Nine: Voyager', '18075', '220104', '220228'),
	(72, 'ONF', 'Goosebumps', '4396', '211203', '220131'),
	(73, 'OnlyOneOf', 'Instint, Pt.2', '49362', '220114', '220131'),
	(74, 'P1Harmony', 'Disharmony: Find Out', '91969', '220103', '220131'),
	(75, 'Pentagon', 'In:Vite U', '90114', '220124', '220228'),
	(76, 'Purple Kiss', 'Memem', '32266', '220329', '220331'),
	(77, 'Ravi', 'Love & Fight', '10359', '220208', '220228'),
	(78, 'Red Velvet', 'The Reve Festival 2022: Feel My Rhythm', '560838', '220321', '220430'),
	(79, 'Rocket Punch', 'Yellow Punch', '20055', '220228', '220430'),
	(80, 'Seventeen', 'Attacca', '30049', '211022', '220430'),
	(81, 'Solar', 'Face', '43599', '220316', '220430'),
	(82, 'SMTOWN', '2021 Winter SMTOWN: SMCU Express', '56940', '211227', '220131'),
	(83, 'SMTOWN', '2021 Winter SMTOWN: SMCU Express', '12971', '211227', '220331'),
	(84, 'SMTOWN', '2021 Winter SMTOWN: SMCU Express', '5974', '211227', '220331'),
	(85, 'SMTOWN', '2021 Winter SMTOWN: SMCU Express', '74162', '211227', '220331'),
	(86, 'SMTOWN', '2021 Winter SMTOWN: SMCU Express', '74087', '211227', '220331'),
	(87, 'SMTOWN', '2021 Winter SMTOWN: SMCU Express', '41833', '211227', '220331'),
	(88, 'SMTOWN', '2021 Winter SMTOWN: SMCU Express', '5265', '211227', '220131'),
	(89, 'SMTOWN', '2021 Winter SMTOWN: SMCU Express', '62545', '211227', '220331'),
	(90, 'SMTOWN', '2021 Winter SMTOWN: SMCU Express', '14336', '211227', '220131'),
	(91, 'SMTOWN', '2021 Winter SMTOWN: SMCU Express', '2218', '211227', '220131'),
	(92, 'Suho', 'Gray Suit', '186465', '220404', '220430'),
	(93, 'StayC', 'Young-Luv.com', '182131', '220221', '220430'),
	(94, 'Stray Kids', 'Christmas EveL', '14418', '211129', '220430'),
	(95, 'Stray Kids', 'Oddinary', '1000088', '220318', '220430'),
	(96, 'Super Junior', 'The Road: Winter for Spring', '142663', '220228', '220430'),
	(97, 'Super Junior - D&E', 'Countdown Zero (Epilogue)', '8458', '211209', '220131'),
	(98, 'Taeyeon', 'INVU', '179611', '220214', '220430'),
	(99, 'Tempest', 'Its Me, Its We', '82307', '220302', '220430'),
	(100, 'Tan', 'Limited Edition 1TAN', '8870', '220310', '220430'),
	(101, 'The Boyz', 'Maverick', '5566', '211101', '220228'),
	(102, 'The Boyz', 'Webtoon Level Up Alone (OST)', '10573', '220318', '220331'),
	(103, 'Treasure', 'The Second Step: Chapter One', '668539', '220215', '220430'),
	(104, 'Trendz', 'Blue Set Chapter 1. Tracks', '6170', '220105', '220131'),
	(105, 'Twice', 'Formula of Love: OT=<3', '8293', '211217', '220331'),
	(106, 'UP10TION', 'Novella', '31415', '220103', '220430'),
	(107, 'Verivery', 'Serioues O-Round 3: Whole', '97187', '220425', '220430'),
	(108, 'Victon', 'Chronograph', '60959', '220118', '220228'),
	(109, 'Viviz', 'Beam of Prism', '43638', '220210', '220228'),
	(110, 'Weeekly', 'Play Game: Awake', '81537', '220307', '220331'),
	(111, 'WEi', 'Love Pt. 1: First Love', '119853', '220316', '220331'),
	(112, 'Wheein', 'Whee', '69470', '220117', '220131'),
	(113, 'Wonho', 'Obsession', '56627', '220216', '220331'),
	(114, 'Wonpil', 'Pilmography', '33668', '220210', '220228'),
	(115, 'WJSN Chocome', 'Super Yuppers!', '15135', '220105', '220131'),
	(116, 'Younha', 'End Theory Final Ed.', '7001', '220330', '220331'),
	(117, 'Yoon Jisung', 'Miro', '6595', '220427', '220430'),
	(118, 'Younite', 'Youni-Birth', '21927', '220422', '220430'),
	(119, 'Yuju', 'Rec.', '22970', '220121', '220131');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

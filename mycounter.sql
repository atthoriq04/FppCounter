-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 04, 2025 at 05:07 PM
-- Server version: 5.7.24
-- PHP Version: 8.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mycounter`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `Category` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `Category`) VALUES
(1, 'SKE'),
(2, 'STU'),
(3, 'AKBG'),
(4, 'V-Type'),
(5, 'Idols'),
(6, 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `counter`
--

CREATE TABLE `counter` (
  `countId` int(11) NOT NULL,
  `Year_id` int(11) NOT NULL,
  `id_name` int(11) NOT NULL,
  `count` int(11) NOT NULL DEFAULT '1',
  `First_Update` varchar(111) NOT NULL,
  `Last_Update` varchar(111) NOT NULL,
  `Logs` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `counter`
--

INSERT INTO `counter` (`countId`, `Year_id`, `id_name`, `count`, `First_Update`, `Last_Update`, `Logs`) VALUES
(1, 2023, 1, 112, '01 January 2023, 07.30', '31 December 2023, 23.00', 0),
(2, 2023, 2, 35, '01 January 2023, 07.30', '31 December 2023, 23.00', 0),
(3, 2023, 3, 22, '01 January 2023, 07.30', '31 December 2023, 23.00', 0),
(4, 2023, 4, 20, '01 January 2023, 07.30', '31 December 2023, 23.00', 0),
(5, 2023, 5, 15, '01 January 2023, 07.30', '31 December 2023, 23.00', 0),
(6, 2023, 6, 14, '01 January 2023, 07.30', '31 December 2023, 23.00', 0),
(7, 2023, 7, 11, '01 January 2023, 07.30', '31 December 2023, 23.00', 0),
(8, 2023, 8, 11, '01 January 2023, 07.30', '31 December 2023, 23.00', 0),
(9, 2023, 9, 9, '01 January 2023, 07.30', '31 December 2023, 23.00', 0),
(10, 2023, 10, 9, '01 January 2023, 07.30', '31 December 2023, 23.00', 0),
(11, 2023, 11, 8, '01 January 2023, 07.30', '31 December 2023, 23.00', 0),
(15, 2023, 12, 7, '01 January 2023, 07.30', '31 December 2023, 23.00', 0),
(16, 2023, 13, 7, '01 January 2023, 07.30', '31 December 2023, 23.00', 0),
(17, 2023, 14, 7, '01 January 2023, 07.30', '31 December 2023, 23.00', 0),
(18, 2023, 15, 6, '01 January 2023, 07.30', '31 December 2023, 23.00', 0),
(19, 2023, 16, 5, '01 January 2023, 07.30', '31 December 2023, 23.00', 0),
(20, 2023, 17, 5, '01 January 2023, 07.30', '31 December 2023, 23.00', 0),
(21, 2023, 18, 5, '01 January 2023, 07.30', '31 December 2023, 23.00', 0),
(22, 2023, 19, 4, '01 January 2023, 07.30', '31 December 2023, 23.00', 0),
(23, 2023, 20, 4, '01 January 2023, 07.30', '31 December 2023, 23.00', 0),
(24, 2023, 21, 3, '01 January 2023, 07.30', '31 December 2023, 23.00', 0),
(25, 2023, 22, 3, '01 January 2023, 07.30', '31 December 2023, 23.00', 0),
(26, 2023, 23, 3, '01 January 2023, 07.30', '31 December 2023, 23.00', 0),
(27, 2023, 24, 3, '01 January 2023, 07.30', '31 December 2023, 23.00', 0),
(28, 2023, 25, 3, '01 January 2023, 07.30', '31 December 2023, 23.00', 0),
(29, 2023, 26, 3, '01 January 2023, 07.30', '31 December 2023, 23.00', 0),
(30, 2023, 27, 3, '01 January 2023, 07.30', '31 December 2023, 23.00', 0),
(31, 2023, 28, 3, '01 January 2023, 07.30', '31 December 2023, 23.00', 0),
(32, 2023, 29, 2, '01 January 2023, 07.30', '31 December 2023, 23.00', 0),
(33, 2023, 30, 2, '01 January 2023, 07.30', '31 December 2023, 23.00', 0),
(34, 2023, 31, 1, '01 January 2023, 07.30', '31 December 2023, 23.00', 0),
(35, 2023, 32, 1, '01 January 2023, 07.30', '31 December 2023, 23.00', 0),
(36, 2023, 33, 1, '01 January 2023, 07.30', '31 December 2023, 23.00', 0),
(37, 2023, 34, 1, '01 January 2023, 07.30', '31 December 2023, 23.00', 0),
(38, 2023, 37, 33, '01 January 2023, 07.30', '31 December 2023, 23.00', 0),
(39, 2023, 38, 24, '01 January 2023, 07.30', '31 December 2023, 23.00', 0),
(40, 2023, 39, 21, '01 January 2023, 07.30', '31 December 2023, 23.00', 0),
(41, 2023, 40, 21, '01 January 2023, 07.30', '31 December 2023, 23.00', 0),
(42, 2023, 41, 19, '01 January 2023, 07.30', '31 December 2023, 23.00', 0),
(43, 2023, 42, 17, '01 January 2023, 07.30', '31 December 2023, 23.00', 0),
(44, 2023, 43, 16, '01 January 2023, 07.30', '31 December 2023, 23.00', 0),
(45, 2023, 44, 15, '01 January 2023, 07.30', '31 December 2023, 23.00', 0),
(46, 2023, 45, 14, '01 January 2023, 07.30', '31 December 2023, 23.00', 0),
(47, 2023, 46, 13, '01 January 2023, 07.30', '31 December 2023, 23.00', 0),
(48, 2023, 47, 13, '01 January 2023, 07.30', '31 December 2023, 23.00', 0),
(49, 2023, 48, 12, '01 January 2023, 07.30', '31 December 2023, 23.00', 0),
(50, 2023, 49, 12, '01 January 2023, 07.30', '31 December 2023, 23.00', 0),
(51, 2023, 50, 11, '01 January 2023, 07.30', '31 December 2023, 23.00', 0),
(52, 2023, 51, 11, '01 January 2023, 07.30', '31 December 2023, 23.00', 0),
(53, 2023, 52, 10, '01 January 2023, 07.30', '31 December 2023, 23.00', 0),
(54, 2023, 53, 10, '01 January 2023, 07.30', '31 December 2023, 23.00', 0),
(55, 2023, 54, 9, '01 January 2023, 07.30', '31 December 2023, 23.00', 0),
(56, 2023, 55, 6, '01 January 2023, 07.30', '31 December 2023, 23.00', 0),
(57, 2023, 56, 6, '01 January 2023, 07.30', '31 December 2023, 23.00', 0),
(58, 2023, 57, 6, '01 January 2023, 07.30', '31 December 2023, 23.00', 0),
(59, 2023, 58, 5, '01 January 2023, 07.30', '31 December 2023, 23.00', 0),
(60, 2023, 59, 3, '01 January 2023, 07.30', '31 December 2023, 23.00', 0),
(61, 2023, 60, 3, '01 January 2023, 07.30', '31 December 2023, 23.00', 0),
(62, 2023, 61, 3, '01 January 2023, 07.30', '31 December 2023, 23.00', 0),
(63, 2023, 62, 2, '01 January 2023, 07.30', '31 December 2023, 23.00', 0),
(64, 2023, 64, 2, '01 January 2023, 07.30', '31 December 2023, 23.00', 0),
(65, 2023, 65, 1, '01 January 2023, 07.30', '31 December 2023, 23.00', 0),
(66, 2023, 66, 1, '01 January 2023, 07.30', '31 December 2023, 23.00', 0),
(67, 2023, 72, 13, '01 January 2023, 07.30', '31 December 2023, 23.00', 0),
(68, 2023, 73, 12, '01 January 2023, 07.30', '31 December 2023, 23.00', 0),
(69, 2023, 74, 9, '01 January 2023, 07.30', '31 December 2023, 23.00', 0),
(70, 2023, 75, 6, '01 January 2023, 07.30', '31 December 2023, 23.00', 0),
(71, 2023, 76, 6, '01 January 2023, 07.30', '31 December 2023, 23.00', 0),
(72, 2023, 77, 5, '01 January 2023, 07.30', '31 December 2023, 23.00', 0),
(73, 2023, 78, 5, '01 January 2023, 07.30', '31 December 2023, 23.00', 0),
(74, 2023, 79, 5, '01 January 2023, 07.30', '31 December 2023, 23.00', 0),
(75, 2023, 80, 4, '01 January 2023, 07.30', '31 December 2023, 23.00', 0),
(76, 2023, 81, 3, '01 January 2023, 07.30', '31 December 2023, 23.00', 0),
(77, 2023, 82, 3, '01 January 2023, 07.30', '31 December 2023, 23.00', 0),
(78, 2023, 83, 3, '01 January 2023, 07.30', '31 December 2023, 23.00', 0),
(79, 2023, 84, 2, '01 January 2023, 07.30', '31 December 2023, 23.00', 0),
(80, 2023, 85, 2, '01 January 2023, 07.30', '31 December 2023, 23.00', 0),
(81, 2023, 86, 2, '01 January 2023, 07.30', '31 December 2023, 23.00', 0),
(82, 2023, 87, 2, '01 January 2023, 07.30', '31 December 2023, 23.00', 0),
(83, 2023, 88, 2, '01 January 2023, 07.30', '31 December 2023, 23.00', 0),
(84, 2023, 89, 1, '01 January 2023, 07.30', '31 December 2023, 23.00', 0),
(85, 2023, 90, 1, '01 January 2023, 07.30', '31 December 2023, 23.00', 0),
(86, 2023, 91, 1, '01 January 2023, 07.30', '31 December 2023, 23.00', 0),
(87, 2023, 92, 1, '01 January 2023, 07.30', '31 December 2023, 23.00', 0),
(88, 2023, 93, 1, '01 January 2023, 07.30', '31 December 2023, 23.00', 0),
(89, 2023, 94, 1, '01 January 2023, 07.30', '31 December 2023, 23.00', 0),
(90, 2023, 95, 1, '01 January 2023, 07.30', '31 December 2023, 23.00', 0),
(91, 2023, 96, 1, '01 January 2023, 07.30', '31 December 2023, 23.00', 0),
(92, 2023, 99, 6, '01 January 2023, 07.30', '31 December 2023, 23.00', 0),
(93, 2023, 100, 5, '01 January 2023, 07.30', '31 December 2023, 23.00', 0),
(94, 2023, 101, 2, '01 January 2023, 07.30', '31 December 2023, 23.00', 0),
(95, 2023, 102, 2, '01 January 2023, 07.30', '31 December 2023, 23.00', 0),
(96, 2023, 103, 1, '01 January 2023, 07.30', '31 December 2023, 23.00', 0),
(97, 2023, 104, 1, '01 January 2023, 07.30', '31 December 2023, 23.00', 0),
(98, 2023, 105, 1, '01 January 2023, 07.30', '31 December 2023, 23.00', 0),
(99, 2023, 108, 6, '01 January 2023, 07.30', '31 December 2023, 23.00', 0),
(100, 2023, 110, 5, '01 January 2023, 07.30', '31 December 2023, 23.00', 0),
(101, 2023, 109, 5, '01 January 2023, 07.30', '31 December 2023, 23.00', 0),
(102, 2023, 117, 2, '01 January 2023, 07.30', '31 December 2023, 23.00', 0),
(103, 2023, 118, 2, '01 January 2023, 07.30', '31 December 2023, 23.00', 0),
(104, 2023, 111, 2, '01 January 2023, 07.30', '31 December 2023, 23.00', 0),
(105, 2023, 112, 1, '01 January 2023, 07.30', '31 December 2023, 23.00', 0),
(106, 2023, 113, 1, '01 January 2023, 07.30', '31 December 2023, 23.00', 0),
(107, 2023, 114, 1, '01 January 2023, 07.30', '31 December 2023, 23.00', 0),
(108, 2023, 115, 1, '01 January 2023, 07.30', '31 December 2023, 23.00', 0),
(109, 2023, 119, 111, '01 January 2023, 07.30', '31 December 2023, 23.00', 0),
(110, 2023, 126, 38, '01 January 2023, 07.30', '31 December 2023, 23.00', 0),
(111, 2023, 126, 4, '01 January 2023, 07.30', '31 December 2023, 23.00', 0),
(112, 2023, 121, 2, '01 January 2023, 07.30', '31 December 2023, 23.00', 0),
(113, 2023, 122, 2, '01 January 2023, 07.30', '31 December 2023, 23.00', 0),
(114, 2023, 123, 2, '01 January 2023, 07.30', '31 December 2023, 23.00', 0),
(115, 2024, 1, 68, '01 January 2024, 07.30', '31 December 2024, 23.00', 0),
(116, 2024, 2, 30, '01 January 2024, 07.30', '31 December 2024, 23.00', 0),
(117, 2024, 5, 20, '01 January 2024, 07.30', '31 December 2024, 23.00', 0),
(118, 2024, 3, 19, '01 January 2024, 07.30', '31 December 2024, 23.00', 0),
(119, 2024, 6, 15, '01 January 2024, 07.30', '31 December 2024, 23.00', 0),
(120, 2024, 4, 15, '01 January 2024, 07.30', '31 December 2024, 23.00', 0),
(121, 2024, 32, 14, '01 January 2024, 07.30', '31 December 2024, 23.00', 0),
(122, 2024, 21, 14, '01 January 2024, 07.30', '31 December 2024, 23.00', 0),
(123, 2024, 35, 11, '01 January 2024, 07.30', '31 December 2024, 23.00', 0),
(124, 2024, 8, 11, '01 January 2024, 07.30', '31 December 2024, 23.00', 0),
(125, 2024, 24, 10, '01 January 2024, 07.30', '31 December 2024, 23.00', 0),
(126, 2024, 18, 10, '01 January 2024, 07.30', '31 December 2024, 23.00', 0),
(127, 2024, 15, 9, '01 January 2024, 07.30', '31 December 2024, 23.00', 0),
(128, 2024, 12, 9, '01 January 2024, 07.30', '31 December 2024, 23.00', 0),
(129, 2024, 10, 9, '01 January 2024, 07.30', '31 December 2024, 23.00', 0),
(130, 2024, 23, 9, '01 January 2024, 07.30', '31 December 2024, 23.00', 0),
(131, 2024, 16, 9, '01 January 2024, 07.30', '31 December 2024, 23.00', 0),
(132, 2024, 9, 9, '01 January 2024, 07.30', '31 December 2024, 23.00', 0),
(133, 2024, 36, 9, '01 January 2024, 07.30', '31 December 2024, 23.00', 0),
(134, 2024, 7, 8, '01 January 2024, 07.30', '31 December 2024, 23.00', 0),
(135, 2024, 13, 8, '01 January 2024, 07.30', '31 December 2024, 23.00', 0),
(136, 2024, 26, 9, '01 January 2024, 07.30', '31 December 2024, 23.00', 0),
(137, 2024, 20, 8, '01 January 2024, 07.30', '31 December 2024, 23.00', 0),
(138, 2024, 11, 8, '01 January 2024, 07.30', '31 December 2024, 23.00', 0),
(139, 2024, 14, 8, '01 January 2024, 07.30', '31 December 2024, 23.00', 0),
(140, 2024, 38, 56, '01 January 2024, 07.30', '31 December 2024, 23.00', 0),
(141, 2024, 37, 46, '01 January 2024, 07.30', '31 December 2024, 23.00', 0),
(142, 2024, 42, 35, '01 January 2024, 07.30', '31 December 2024, 23.00', 0),
(143, 2024, 43, 23, '01 January 2024, 07.30', '31 December 2024, 23.00', 0),
(144, 2024, 47, 20, '01 January 2024, 07.30', '31 December 2024, 23.00', 0),
(145, 2024, 40, 20, '01 January 2024, 07.30', '31 December 2024, 23.00', 0),
(146, 2024, 39, 19, '01 January 2024, 07.30', '31 December 2024, 23.00', 0),
(147, 2024, 41, 18, '01 January 2024, 07.30', '31 December 2024, 23.00', 0),
(148, 2024, 48, 17, '01 January 2024, 07.30', '31 December 2024, 23.00', 0),
(149, 2024, 46, 17, '01 January 2024, 07.30', '31 December 2024, 23.00', 0),
(150, 2024, 44, 17, '01 January 2024, 07.30', '31 December 2024, 23.00', 0),
(151, 2024, 45, 16, '01 January 2024, 07.30', '31 December 2024, 23.00', 0),
(152, 2024, 51, 14, '01 January 2024, 07.30', '31 December 2024, 23.00', 0),
(153, 2024, 49, 12, '01 January 2024, 07.30', '31 December 2024, 23.00', 0),
(154, 2024, 61, 11, '01 January 2024, 07.30', '31 December 2024, 23.00', 0),
(155, 2024, 67, 11, '01 January 2024, 07.30', '31 December 2024, 23.00', 0),
(156, 2024, 53, 10, '01 January 2024, 07.30', '31 December 2024, 23.00', 0),
(157, 2024, 68, 8, '01 January 2024, 07.30', '31 December 2024, 23.00', 0),
(158, 2024, 52, 8, '01 January 2024, 07.30', '31 December 2024, 23.00', 0),
(159, 2024, 50, 7, '01 January 2024, 07.30', '31 December 2024, 23.00', 0),
(160, 2024, 54, 7, '01 January 2024, 07.30', '31 December 2024, 23.00', 0),
(161, 2024, 69, 7, '01 January 2024, 07.30', '31 December 2024, 23.00', 0),
(162, 2024, 57, 6, '01 January 2024, 07.30', '31 December 2024, 23.00', 0),
(163, 2024, 58, 6, '01 January 2024, 07.30', '31 December 2024, 23.00', 0),
(164, 2024, 55, 5, '01 January 2024, 07.30', '31 December 2024, 23.00', 0),
(165, 2024, 56, 4, '01 January 2024, 07.30', '31 December 2024, 23.00', 0),
(166, 2024, 70, 3, '01 January 2024, 07.30', '31 December 2024, 23.00', 0),
(167, 2024, 62, 3, '01 January 2024, 07.30', '31 December 2024, 23.00', 0),
(168, 2024, 64, 1, '01 January 2024, 07.30', '31 December 2024, 23.00', 0),
(169, 2024, 71, 1, '01 January 2024, 07.30', '31 December 2024, 23.00', 0),
(170, 2024, 72, 11, '01 January 2024, 07.30', '31 December 2024, 23.00', 0),
(171, 2024, 74, 8, '01 January 2024, 07.30', '31 December 2024, 23.00', 0),
(172, 2024, 82, 7, '01 January 2024, 07.30', '31 December 2024, 23.00', 0),
(173, 2024, 78, 6, '01 January 2024, 07.30', '31 December 2024, 23.00', 0),
(174, 2024, 77, 4, '01 January 2024, 07.30', '31 December 2024, 23.00', 0),
(175, 2024, 81, 4, '01 January 2024, 07.30', '31 December 2024, 23.00', 0),
(176, 2024, 76, 3, '01 January 2024, 07.30', '31 December 2024, 23.00', 0),
(177, 2024, 97, 2, '01 January 2024, 07.30', '31 December 2024, 23.00', 0),
(178, 2024, 75, 2, '01 January 2024, 07.30', '31 December 2024, 23.00', 0),
(179, 2024, 75, 2, '01 January 2024, 07.30', '31 December 2024, 23.00', 0),
(180, 2024, 127, 48, '01 January 2024, 07.30', '31 December 2024, 23.00', 0),
(181, 2024, 119, 22, '01 January 2024, 07.30', '31 December 2024, 23.00', 0),
(182, 2024, 109, 6, '01 January 2024, 07.30', '31 December 2024, 23.00', 0),
(183, 2024, 110, 4, '01 January 2024, 07.30', '31 December 2024, 23.00', 0),
(184, 2024, 126, 4, '01 January 2024, 07.30', '31 December 2024, 23.00', 0),
(185, 2024, 106, 3, '01 January 2024, 07.30', '31 December 2024, 23.00', 0),
(186, 2024, 107, 2, '01 January 2024, 07.30', '31 December 2024, 23.00', 0),
(187, 2024, 116, 1, '01 January 2024, 07.30', '31 December 2024, 23.00', 0),
(188, 2024, 124, 1, '01 January 2024, 07.30', '31 December 2024, 23.00', 0),
(189, 2024, 125, 1, '01 January 2024, 07.30', '31 December 2024, 23.00', 0),
(190, 2024, 99, 1, '01 January 2024, 07.30', '31 December 2024, 23.00', 0),
(191, 2025, 72, 1, '03 January 2025, 01.30', '03 January 2025, 01.30', 1),
(192, 2025, 48, 1, '03 January 2025, 03.30', '03 January 2025, 03.30', 1),
(193, 2025, 38, 1, '03 January 2025, 14.30', '03 January 2025, 14.30', 1),
(194, 2025, 1, 2, '04 January 2025, 02.20', '04 January 2025, 11.58 PM', 1),
(195, 2025, 3, 1, '04 January 2025, 13.20', '04 January 2025, 11.59 PM', 1);

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(7) NOT NULL,
  `id_counter` int(7) NOT NULL,
  `count` int(7) NOT NULL,
  `createTime` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `id_counter`, `count`, `createTime`) VALUES
(1, 195, 2, '04 January 2025, 11.59 PM'),
(2, 195, 1, '04 January 2025, 11.59 PM');

-- --------------------------------------------------------

--
-- Table structure for table `name`
--

CREATE TABLE `name` (
  `id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Image` varchar(100) NOT NULL,
  `Cat` int(11) NOT NULL,
  `Sub` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `name`
--

INSERT INTO `name` (`id`, `Name`, `Image`, `Cat`, `Sub`) VALUES
(1, '石黒 友月 ', '石黒-友月.jpg', 1, 1),
(2, '野島 樺乃', '野島-樺乃.jpg', 1, 4),
(3, '藤本 冬香', '藤本-冬香.jpg', 1, 2),
(4, '高畑 祐希', '高畑-祐希.jpg', 1, 4),
(5, '中坂-美祐', '中坂-美祐.jpg', 1, 3),
(6, '伊藤 実希', '伊藤-実希.jpg', 1, 2),
(7, '川嶋 美晴', '川嶋-美晴.jpg', 1, 4),
(8, '北川 愛乃', '北川-愛乃.jpg', 1, 2),
(9, '青木 莉樺', '青木-莉樺.jpg', 1, 3),
(10, '青海 ひな乃', '青海-ひな乃.jpg', 1, 3),
(11, '西井 美桜', '西井-美桜.jpg', 1, 3),
(12, '浅井 裕華', '浅井-裕華.jpg', 1, 3),
(13, '林 美澪', '林-美澪.jpg', 1, 4),
(14, '森本 くるみ', '森本-くるみ.jpg', 1, 3),
(15, '荒野 姫楓', '荒野-姫楓.jpg', 1, 2),
(16, '中野 愛理', '中野-愛理.jpg', 1, 1),
(17, '坂本 真凛', '坂本-真凛.jpg', 1, 1),
(18, '松本 慈子', '松本-慈子.jpg', 1, 2),
(19, '矢作有紀奈', '矢作有紀奈.jpg', 1, 4),
(20, '池田楓', '池田楓.jpg', 1, 2),
(21, '篠原 京香', '篠原-京香.jpg', 1, 2),
(22, '佐藤 佳穂', '佐藤-佳穂.jpg', 1, 2),
(23, '井上 瑠夏', '井上-瑠夏.jpg', 1, 2),
(24, '大村 杏', '大村-杏.jpg', 1, 3),
(25, '入内嶋 涼', '入内嶋-涼.jpg', 1, 1),
(26, '仲村和泉', '仲村和泉.jpg', 1, 3),
(27, '竹内ななみ', '竹内ななみ.jpg', 1, 4),
(28, '鎌田 菜月', '鎌田-菜月.jpg', 1, 2),
(29, '太田 彩夏', '太田-彩夏.jpg', 1, 3),
(30, '水野 愛理', '水野-愛理.jpg', 1, 4),
(31, '熊崎 晴香', '熊崎-晴香.jpg', 1, 1),
(32, '鈴木 愛來', '鈴木-愛來.jpg', 1, 2),
(33, '菅原 茉椰', '菅原-茉椰.jpg', 1, 2),
(34, '谷 真理佳', '谷-真理佳.jpg', 1, 4),
(35, '河村 優愛', '河村-優愛.jpg', 1, 3),
(36, '柿元 礼愛', '柿元-礼愛.jpg', 1, 13),
(37, '小島 愛子', '小島-愛子.jpg', 2, 8),
(38, '兵頭葵', '兵頭葵.jpg', 2, 5),
(39, '今村 美月', '今村-美月.jpg', 2, 8),
(40, '福田 朱里', '福田-朱里.jpg', 2, 5),
(41, '尾崎 世里花', '尾崎-世里花.jpg', 2, 6),
(42, '谷口 茉妃菜', '谷口-茉妃菜.jpg', 2, 5),
(43, '石田 千穂', '石田-千穂.jpg', 2, 5),
(44, '甲斐 心愛', '甲斐-心愛.jpg', 2, 8),
(45, '原田 清花', '原田-清花.jpg', 2, 6),
(46, '宗雪 里香', '宗雪-里香.jpg', 2, 6),
(47, '吉崎 凛子', '吉崎-凛子.jpg', 2, 6),
(48, '中村 舞', '仲村-舞.jpg', 2, 5),
(49, '工藤 理子', '工藤-理子.jpg', 2, 6),
(50, '高雄 さやか', '高雄-さやか.jpg', 2, 6),
(51, '滝野 由美子', '滝野-由美子.jpg', 2, 8),
(52, '渡辺 菜月', '渡辺-菜月.jpg', 2, 6),
(53, '岩田 陽菜', '岩田-陽菜.jpg', 2, 8),
(54, '藤井 里詠', '藤井-里詠.jpg', 2, 8),
(55, '吉田 沙良', '吉田-沙良.jpg', 2, 6),
(56, '田中 美帆', '田中-美帆.jpg', 2, 8),
(57, '矢野 帆夏', '矢野-帆夏.jpg', 2, 8),
(58, '濱田 響', '濱田-響.jpg', 2, 7),
(59, '立仙 百佳', '立仙-百佳.jpg', 2, 8),
(60, '門脇 実優菜', '門脇-実優菜.jpg', 2, 8),
(61, '岡田 あずみ', '岡田-あずみ.jpg', 2, 6),
(62, '奥田 唯菜', '奥田-唯菜.jpg', 2, 7),
(63, '内海 里音', '内海-里音.jpg', 2, 6),
(64, '川又 あん菜', '川又-あん菜.jpg', 2, 8),
(65, '鈴木 彩夏', '鈴木-彩夏.jpg', 2, 8),
(66, '久留島 優香', '久留島-優香.jpg', 2, 6),
(67, '沖 侑果', '沖-侑果.jpg', 2, 8),
(68, '井出 叶', '井出-叶.jpg', 2, 7),
(69, '森末 妃奈', '森末-妃奈.jpg', 2, 7),
(70, '北澤 苺', '北澤-苺.jpg', 2, 7),
(71, '石田 みなみ', '石田-みなみ.jpg', 2, 8),
(72, '川越 紗綾', '川越-紗綾.jpg', 3, 12),
(73, '田中 美久', '田中-美久.jpg', 3, 10),
(74, '山本 望叶', '山本-望叶.jpg', 3, 11),
(75, '鈴木 くるみ', '鈴木-くるみ.jpg', 3, 9),
(76, '田口 愛佳', '田口-愛佳.jpg', 3, 9),
(77, '上西 怜', '上西-怜.jpg', 3, 11),
(78, '込山 春香', '込山-春香.jpg', 3, 9),
(79, '齋藤 陽菜', '齋藤-陽菜.jpg', 3, 9),
(80, '黒田 楓和', '黒田-楓和.jpg', 3, 11),
(81, '三村 妃乃', '三村-妃乃.jpg', 3, 12),
(82, '佐藤 海里', '佐藤-海里.jpg', 3, 12),
(83, '佐藤 美波', '佐藤-美波.jpg', 3, 9),
(84, '安部 若菜', '安部-若菜.jpg', 3, 11),
(85, '石田 優美', '石田-優美.jpg', 3, 11),
(86, '横山 結衣', '横山-結衣.jpg', 3, 9),
(87, '布袋 百椛', '布袋-百椛.jpg', 3, 9),
(88, '谷口 めぐ', '谷口-めぐ.jpg', 3, 9),
(89, '秋吉 優花', '秋吉-優花.jpg', 3, 10),
(90, '兒玉 遥', '兒玉-遥.jpg', 3, 10),
(91, '神志那 結衣', '神志那-結衣.jpg', 3, 10),
(92, '新澤 菜央', '新澤-菜央.jpg', 3, 11),
(93, '上西 恵', '上西-恵.jpg', 3, 11),
(94, '山田 杏華', '山田-杏華.jpg', 3, 9),
(95, '立仙 愛理', '立仙-愛理.jpg', 3, 9),
(96, '岡部 麟', '岡部-麟.jpg', 3, 9),
(97, '左伴 彩佳', '左伴-彩佳.jpg', 3, 9),
(98, '鈴木 優香', '鈴木-優香.jpg', 3, 9),
(99, '菅井 友香', '菅井-友香.jpg', 5, 17),
(100, '大園 玲', '大園-玲.jpg', 5, 17),
(101, '守屋 麗奈', '守屋-麗奈.jpg', 5, 17),
(102, '賀喜 遥香', '賀喜-遥香.jpg', 5, 17),
(103, '河田 陽菜', '河田-陽菜.jpg', 5, 17),
(104, '金村 美玖', '金村-美玖.jpg', 5, 17),
(105, '加藤 史帆', '加藤-史帆.jpg', 5, 17),
(106, '増本 綺良', '増本-綺良.jpg', 5, 17),
(107, '富里 なお', '富里-なお.jpg', 5, 17),
(108, '葵 音琴', '葵-音琴.jpg', 5, 19),
(109, '黒嵜 菜々子', '黒嵜-菜々子.jpg', 5, 19),
(110, '山本 杏奈', '山本-杏奈.jpg', 5, 18),
(111, '篠原 ののか', '篠原-ののか.jpg', 5, 19),
(112, '藤井 優衣', '藤井-優衣.jpg', 5, 19),
(113, '栗本 優音', '栗本-優音.jpg', 5, 19),
(114, '金谷 みひろ', '金谷-みひろ.jpg', 5, 21),
(115, '要 あい ', '要-あい.jpg', 5, 21),
(116, '真島 なおみ', '真島-なおみ.jpg', 5, 21),
(117, '今森 茉耶 ', '今森-茉耶.jpg', 5, 21),
(118, '小日向ゆか', '小日向ゆか.jpg', 5, 21),
(119, 'av', 'av.jpg', 6, 20),
(120, 'ETC', 'default.png', 6, 20),
(121, 'fuwa', 'fuwa.jpg', 6, 22),
(122, 'Raku', 'default.png', 6, 22),
(123, 'Hatsune', 'default.png', 6, 22),
(124, 'Ahoo._.', 'default.png', 6, 20),
(125, 'ムラモト', 'ムラモト.jpg', 6, 22),
(126, 'Livechat', 'default.png', 6, 20),
(127, 'その他Vt', 'その他Vt.jpg', 6, 20);

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `sub_id` int(11) NOT NULL,
  `SubCategory` varchar(50) NOT NULL,
  `id_cat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`sub_id`, `SubCategory`, `id_cat`) VALUES
(1, 'Team S', 1),
(2, 'Team K2', 1),
(3, 'Team E', 1),
(4, 'OG', 1),
(5, '1st Gen', 2),
(6, '2nd Gen', 2),
(7, '3rd Gen ', 2),
(8, 'OG', 2),
(9, 'AKB', 3),
(10, 'HKT', 3),
(11, 'NMB', 3),
(12, 'NGT', 3),
(13, '研究生', 1),
(14, 'Holo', 4),
(15, 'Niji', 4),
(16, 'Spo', 4),
(17, '坂道系アイドル', 5),
(18, 'equal-not-near系', 5),
(19, '他系アイドル', 5),
(20, 'ETC', 6),
(21, 'グラビアアイドル', 5),
(22, 'Fantia/MyFans', 6);

-- --------------------------------------------------------

--
-- Table structure for table `year`
--

CREATE TABLE `year` (
  `Year` int(11) NOT NULL,
  `Total` int(11) NOT NULL DEFAULT '0',
  `Average` float NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `year`
--

INSERT INTO `year` (`Year`, `Total`, `Average`) VALUES
(2023, 964, 2.6411),
(2024, 918, 2.51093),
(2025, 6, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `counter`
--
ALTER TABLE `counter`
  ADD PRIMARY KEY (`countId`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `name`
--
ALTER TABLE `name`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`sub_id`);

--
-- Indexes for table `year`
--
ALTER TABLE `year`
  ADD PRIMARY KEY (`Year`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `counter`
--
ALTER TABLE `counter`
  MODIFY `countId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=196;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `name`
--
ALTER TABLE `name`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

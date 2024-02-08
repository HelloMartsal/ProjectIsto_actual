-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2024 at 09:04 PM
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
-- Database: `mydatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id_ann` int(11) NOT NULL,
  `text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` date NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id_ann`, `text`, `time`, `title`) VALUES
(6, 'Αναμένονται επικίνδυνα καιρικά φαινόμενα από το βράδυ της Κυριακής 21 Ιανουαρίου μέχρι και την Τρίτη.\nΜείνετε σε επιφυλακή', '2024-01-21', 'Βροχόπτωση 21 - 22 Ιανουαρίου'),
(7, 'Αναμένονται επικίνδυνα καιρικά φαινόμενα από το βράδυ της Κυριακής 21 Ιανουαρίου μέχρι και την Τρίτη.\nΜείνετε σε επιφυλακή', '2024-01-21', 'Βροχόπτωση 21 - 22 Ιανουαρίου'),
(8, 'ΤΕΣΤ ΤΕΣΤ', '2024-01-24', 'ΜΑΡΙΟΣ'),
(9, 'Marios', '2024-02-02', 'Test');

-- --------------------------------------------------------

--
-- Table structure for table `announ_product`
--

CREATE TABLE `announ_product` (
  `id_ann_match` int(11) NOT NULL,
  `id_pro_match` int(11) NOT NULL,
  `id_match` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `announ_product`
--

INSERT INTO `announ_product` (`id_ann_match`, `id_pro_match`, `id_match`) VALUES
(9, 18, 5),
(9, 21, 6),
(9, 103, 7);

-- --------------------------------------------------------

--
-- Table structure for table `base`
--

CREATE TABLE `base` (
  `id_base` int(11) NOT NULL,
  `id_item` int(11) NOT NULL,
  `quant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `base`
--

INSERT INTO `base` (`id_base`, `id_item`, `quant`) VALUES
(16, 16, 15),
(17, 17, 26),
(18, 22, 10),
(19, 19, 49);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`) VALUES
(5, 'Food'),
(6, 'Beverages'),
(7, 'Clothing'),
(8, 'Hacker of class'),
(9, '2d hacker'),
(10, ''),
(11, 'Test'),
(13, '-----'),
(14, 'Flood'),
(15, 'new cat'),
(16, 'Medical Supplies'),
(19, 'Shoes'),
(21, 'Personal Hygiene '),
(22, 'Cleaning Supplies'),
(23, 'Tools'),
(24, 'Kitchen Supplies'),
(25, 'Baby Essentials'),
(26, 'Insect Repellents'),
(27, 'Electronic Devices'),
(28, 'Cold weather'),
(29, 'Animal Food'),
(30, 'Financial support'),
(33, 'Cleaning Supplies.'),
(34, 'Hot Weather'),
(35, 'First Aid '),
(39, 'Test_0'),
(40, 'test1'),
(41, 'pet supplies'),
(42, 'Μedicines'),
(43, 'Energy Drinks');

-- --------------------------------------------------------

--
-- Table structure for table `finished_offers`
--

CREATE TABLE `finished_offers` (
  `id_f_off` int(11) NOT NULL,
  `itemquant` text NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_savior` int(11) NOT NULL,
  `time` date NOT NULL,
  `accept_time` date NOT NULL,
  `finish_time` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `finished_offers`
--

INSERT INTO `finished_offers` (`id_f_off`, `itemquant`, `id_user`, `id_savior`, `time`, `accept_time`, `finish_time`) VALUES
(1, '[{\"id_item_l\":16,\"quant\":10},{\"id_item_l\":17,\"quant\":15}]', 11, 3, '2024-01-18', '2024-01-26', '2024-01-26'),
(2, '[{\"id_item_l\":16,\"quant\":15}]', 6, 3, '2024-01-18', '2024-01-26', '2024-01-26'),
(3, '[{\"id_item_l\":20,\"quant\":2},{\"id_item_l\":140,\"quant\":3}]', 30, 3, '2024-01-24', '2024-01-26', '2024-01-26'),
(4, '[{\"id_item_l\":16,\"quant\":10},{\"id_item_l\":17,\"quant\":15}]', 11, 3, '2024-01-18', '2024-01-26', '2024-01-26'),
(5, '[{\"id_item_l\":16,\"quant\":15}]', 6, 3, '2024-01-18', '2024-01-26', '2024-01-26'),
(6, '[{\"id_item_l\":20,\"quant\":2},{\"id_item_l\":140,\"quant\":3}]', 30, 3, '2024-01-24', '2024-01-26', '2024-01-26'),
(7, '[{\"id_item_l\":16,\"quant\":30},{\"id_item_l\":17,\"quant\":30}]', 13, 3, '2024-01-16', '2024-01-28', '2024-01-28');

-- --------------------------------------------------------

--
-- Table structure for table `finished_requests`
--

CREATE TABLE `finished_requests` (
  `id_f_req` int(11) NOT NULL,
  `product_id` text DEFAULT NULL,
  `manypeople` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_savior` int(11) NOT NULL,
  `time` date NOT NULL,
  `accept_time` date NOT NULL,
  `finish_time` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `finished_requests`
--

INSERT INTO `finished_requests` (`id_f_req`, `product_id`, `manypeople`, `id_user`, `id_savior`, `time`, `accept_time`, `finish_time`) VALUES
(26, '\"[{\\\"id_item_l\\\":16},{\\\"id_item_l\\\":17}]\"', 3, 1, 3, '2024-01-27', '2024-01-28', '2024-01-28'),
(27, '\"[{\\\"id_item_l\\\":16},{\\\"id_item_l\\\":17}]\"', 1, 14, 3, '2024-01-23', '2024-01-28', '2024-01-28'),
(28, '\"[{\\\"id_item_l\\\":16}]\"', 2, 20, 3, '2024-01-19', '2024-02-02', '2024-02-02'),
(29, '\"[{\\\"id_item_l\\\":16},{\\\"id_item_l\\\":19}]\"', 1, 15, 3, '2024-01-08', '2024-02-02', '2024-02-02');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`product_id`, `product_name`, `details`, `category`) VALUES
(16, 'Water', '[{\"detail_name\":\"volume\",\"detail_value\":\"1.5l\"},{\"detail_name\":\"pack size\",\"detail_value\":\"6\"}]', 6),
(17, 'Orange juice', '[{\"detail_name\":\"volume\",\"detail_value\":\"250ml\"},{\"detail_name\":\"pack size\",\"detail_value\":\"12\"}]', 6),
(18, 'Sardines', '[{\"detail_name\":\"brand\",\"detail_value\":\"Trata\"},{\"detail_name\":\"weight\",\"detail_value\":\"200g\"}]', 5),
(19, 'Canned corn', '[{\"detail_name\":\"weight\",\"detail_value\":\"500g\"}]', 5),
(20, 'Bread', '[{\"detail_name\":\"weight\",\"detail_value\":\"1kg\"},{\"detail_name\":\"type\",\"detail_value\":\"white\"}]', 5),
(21, 'Chocolate', '[{\"detail_name\":\"weight\",\"detail_value\":\"100g\"},{\"detail_name\":\"type\",\"detail_value\":\"milk chocolate\"},{\"detail_name\":\"brand\",\"detail_value\":\"ION\"}]', 5),
(22, 'Men Sneakers', '[{\"detail_name\":\"size\",\"detail_value\":\"44\"}]', 7),
(23, 'Test Product', '[{\"detail_name\":\"weight\",\"detail_value\":\"500g\"},{\"detail_name\":\"pack size\",\"detail_value\":\"12\"},{\"detail_name\":\"expiry date\",\"detail_value\":\"13\\/12\\/1978\"}]', 9),
(24, 'Test Val', '[{\"detail_name\":\"Details\",\"detail_value\":\"600ml\"}]', 14),
(25, 'Spaghetti', '[{\"detail_name\":\"grams\",\"detail_value\":\"500\"}]', 5),
(26, 'Croissant', '[{\"detail_name\":\"calories\",\"detail_value\":\"200\"}]', 5),
(28, '', '[{\"detail_name\":\"\",\"detail_value\":\"\"}]', 10),
(29, 'Biscuits', '[{\"detail_name\":\"\",\"detail_value\":\"\"}]', 5),
(30, 'Bandages', '[{\"detail_name\":\"\",\"detail_value\":\"25 pcs\"}]', 16),
(31, 'Disposable gloves', '[{\"detail_name\":\"\",\"detail_value\":\"100 pcs\"}]', 16),
(32, 'Gauze', '[{\"detail_name\":\"\",\"detail_value\":\"\"}]', 16),
(33, 'Antiseptic', '[{\"detail_name\":\"\",\"detail_value\":\"250ml\"}]', 16),
(34, 'First Aid Kit', '[{\"detail_name\":\"\",\"detail_value\":\"\"}]', 16),
(35, 'Painkillers', '[{\"detail_name\":\"volume\",\"detail_value\":\"200mg\"}]', 16),
(36, 'Blanket', '[{\"detail_name\":\"size\",\"detail_value\":\"50\\\" x 60\\\"\"}]', 7),
(37, 'Fakes', '[{\"detail_name\":\"\",\"detail_value\":\"\"}]', 5),
(38, 'Menstrual Pads', '[{\"detail_name\":\"stock\",\"detail_value\":\"500\"},{\"detail_name\":\"size\",\"detail_value\":\"3\"},{\"detail_name\":\"\",\"detail_value\":\"\"}]', 21),
(39, 'Tampon', '[{\"detail_name\":\"stock\",\"detail_value\":\"500\"},{\"detail_name\":\"size\",\"detail_value\":\"regular\"}]', 21),
(40, 'Toilet Paper', '[{\"detail_name\":\"stock\",\"detail_value\":\"300\"},{\"detail_name\":\"ply\",\"detail_value\":\"3\"}]', 21),
(41, 'Baby wipes', '[{\"detail_name\":\"volume\",\"detail_value\":\"500gr\"},{\"detail_name\":\"stock \",\"detail_value\":\"500\"},{\"detail_name\":\"scent\",\"detail_value\":\"aloe\"}]', 21),
(42, 'Toothbrush', '[{\"detail_name\":\"stock\",\"detail_value\":\"500\"}]', 21),
(43, 'Toothpaste', '[{\"detail_name\":\"stock\",\"detail_value\":\"250\"}]', 21),
(44, 'Vitamin C', '[{\"detail_name\":\"stock\",\"detail_value\":\"200\"}]', 16),
(45, 'Multivitamines', '[{\"detail_name\":\"stock\",\"detail_value\":\"200\"}]', 16),
(46, 'Paracetamol', '[{\"detail_name\":\"stock\",\"detail_value\":\"2000\"},{\"detail_name\":\"dosage\",\"detail_value\":\"500mg\"}]', 16),
(47, 'Ibuprofen', '[{\"detail_name\":\"stock \",\"detail_value\":\"10\"},{\"detail_name\":\"dosage\",\"detail_value\":\"200mg\"}]', 16),
(51, 'Cleaning rag', '[{\"detail_name\":\"\",\"detail_value\":\"\"}]', 22),
(52, 'Detergent', '[{\"detail_name\":\"\",\"detail_value\":\"\"}]', 22),
(53, 'Disinfectant', '[{\"detail_name\":\"\",\"detail_value\":\"\"}]', 22),
(54, 'Mop', '[{\"detail_name\":\"\",\"detail_value\":\"\"}]', 22),
(55, 'Plastic bucket', '[{\"detail_name\":\"\",\"detail_value\":\"\"}]', 22),
(56, 'Scrub brush', '[{\"detail_name\":\"\",\"detail_value\":\"\"}]', 22),
(57, 'Dust mask', '[{\"detail_name\":\"\",\"detail_value\":\"\"}]', 22),
(58, 'Broom', '[{\"detail_name\":\"\",\"detail_value\":\"\"}]', 22),
(59, 'Hammer', '[{\"detail_name\":\"\",\"detail_value\":\"\"}]', 23),
(60, 'Skillsaw', '[{\"detail_name\":\"\",\"detail_value\":\"\"}]', 23),
(61, 'Prybar', '[{\"detail_name\":\"\",\"detail_value\":\"\"}]', 23),
(62, 'Shovel', '[{\"detail_name\":\"\",\"detail_value\":\"\"}]', 23),
(63, 'Flashlight', '[{\"detail_name\":\"\",\"detail_value\":\"\"}]', 23),
(64, 'Duct tape', '[{\"detail_name\":\"\",\"detail_value\":\"\"}]', 23),
(65, 'Underwear', '[{\"detail_name\":\"\",\"detail_value\":\"\"}]', 7),
(66, 'Socks', '[{\"detail_name\":\"\",\"detail_value\":\"\"}]', 7),
(67, 'Warm Jacket', '[{\"detail_name\":\"\",\"detail_value\":\"\"}]', 7),
(68, 'Raincoat', '[{\"detail_name\":\"\",\"detail_value\":\"\"}]', 7),
(69, 'Gloves', '[{\"detail_name\":\"\",\"detail_value\":\"\"}]', 7),
(70, 'Pants', '[{\"detail_name\":\"\",\"detail_value\":\"\"}]', 7),
(71, 'Boots', '[{\"detail_name\":\"\",\"detail_value\":\"\"}]', 7),
(72, 'Dishes', '[{\"detail_name\":\"\",\"detail_value\":\"\"}]', 24),
(73, 'Pots', '[{\"detail_name\":\"\",\"detail_value\":\"\"}]', 24),
(74, 'Paring knives', '[{\"detail_name\":\"\",\"detail_value\":\"\"}]', 24),
(75, 'Pan', '[{\"detail_name\":\"\",\"detail_value\":\"\"}]', 24),
(76, 'Glass', '[{\"detail_name\":\"\",\"detail_value\":\"\"}]', 24),
(83, 't22', '[{\"detail_name\":\"wtwty\",\"detail_value\":\"wytwty\"}]', 9),
(85, 'Coca Cola', '[{\"detail_name\":\"Volume\",\"detail_value\":\"500ml\"}]', 6),
(86, 'spray', '[{\"detail_name\":\"volume\",\"detail_value\":\"75ml\"}]', 26),
(87, 'Outdoor spiral', '[{\"detail_name\":\"duration\",\"detail_value\":\"7 hours\"}]', 26),
(88, 'Baby bottle', '[{\"detail_name\":\"volume\",\"detail_value\":\"250ml\"}]', 25),
(89, 'Pacifier', '[{\"detail_name\":\"material\",\"detail_value\":\"silicone\"}]', 25),
(90, 'Condensed milk', '[{\"detail_name\":\"weight\",\"detail_value\":\"400gr\"}]', 5),
(91, 'Cereal bar', '[{\"detail_name\":\"weight\",\"detail_value\":\"23,5gr\"}]', 5),
(92, 'Pocket Knife', '[{\"detail_name\":\"Number of different tools\",\"detail_value\":\"3\"},{\"detail_name\":\"Tool\",\"detail_value\":\"Knife\"},{\"detail_name\":\"Tool\",\"detail_value\":\"Screwdriver\"},{\"detail_name\":\"Tool\",\"detail_value\":\"Spoon\"}]', 23),
(93, 'Water Disinfection Tablets', '[{\"detail_name\":\"Basic Ingredients\",\"detail_value\":\"Iodine\"},{\"detail_name\":\"Suggested for\",\"detail_value\":\"Everyone expept pregnant women\"}]', 16),
(94, 'Radio', '[{\"detail_name\":\"Power\",\"detail_value\":\"Batteries\"},{\"detail_name\":\"Frequencies Range\",\"detail_value\":\"3 kHz - 3000 GHz\"}]', 27),
(95, 'Kitchen appliances', '[{\"detail_name\":\"\",\"detail_value\":\"(scrubbers, rubber gloves, kitchen detergent, laundry soap)\"}]', 14),
(96, 'Winter hat', '[{\"detail_name\":\"\",\"detail_value\":\"\"}]', 28),
(97, 'Winter gloves', '[{\"detail_name\":\"\",\"detail_value\":\"\"}]', 28),
(98, 'Scarf', '[{\"detail_name\":\"\",\"detail_value\":\"\"}]', 28),
(99, 'Thermos', '[{\"detail_name\":\"\",\"detail_value\":\"\"}]', 28),
(100, 'Tea', '[{\"detail_name\":\"volume\",\"detail_value\":\"500ml\"}]', 6),
(101, 'Dog Food ', '[{\"detail_name\":\"volume\",\"detail_value\":\"500g\"}]', 29),
(102, 'Cat Food', '[{\"detail_name\":\"volume\",\"detail_value\":\"500g\"}]', 29),
(103, 'Canned', '[{\"detail_name\":\"\",\"detail_value\":\"\"}]', 5),
(104, 'Chlorine', '[{\"detail_name\":\"volume\",\"detail_value\":\"500ml\"}]', 22),
(105, 'Medical gloves', '[{\"detail_name\":\"volume\",\"detail_value\":\"20pieces\"}]', 22),
(106, 'T-Shirt', '[{\"detail_name\":\"size\",\"detail_value\":\"XL\"}]', 7),
(107, 'Cooling Fan', '[{\"detail_name\":\"\",\"detail_value\":\"\"}]', 34),
(108, 'Cool Scarf', '[{\"detail_name\":\"\",\"detail_value\":\"\"}]', 34),
(109, 'Whistle', '[{\"detail_name\":\"\",\"detail_value\":\"\"}]', 23),
(110, 'Blankets', '[{\"detail_name\":\"\",\"detail_value\":\"\"}]', 28),
(111, 'Sleeping Bag', '[{\"detail_name\":\"\",\"detail_value\":\"\"}]', 28),
(114, 'Thermometer', '[{\"detail_name\":\"\",\"detail_value\":\"\"}]', 16),
(115, 'Rice', '[{\"detail_name\":\"\",\"detail_value\":\"\"}]', 5),
(117, 'Towels', '[{\"detail_name\":\"\",\"detail_value\":\"\"}]', 22),
(118, 'Wet Wipes', '[{\"detail_name\":\"\",\"detail_value\":\"\"}]', 22),
(119, 'Fire Extinguisher', '[{\"detail_name\":\"\",\"detail_value\":\"\"}]', 23),
(120, 'Fruits', '[{\"detail_name\":\"\",\"detail_value\":\"\"},{\"detail_name\":\"\",\"detail_value\":\"\"}]', 5),
(123, 'Αθλητικά', '[{\"detail_name\":\"\\u039d\\u03bf 46\",\"detail_value\":\"\"}]', 19),
(124, 'Πασατέμπος', '[{\"detail_name\":\"\",\"detail_value\":\"\"}]', 5),
(126, 'Betadine', '[{\"detail_name\":\"Povidone iodine 10%\",\"detail_value\":\"240 ml\"}]', 35),
(127, 'cotton wool', '[{\"detail_name\":\"100% Hydrofile\",\"detail_value\":\"70gr\"}]', 35),
(128, 'Crackers', '[{\"detail_name\":\"Quantity per package\",\"detail_value\":\"10\"},{\"detail_name\":\"Packages\",\"detail_value\":\"2\"}]', 5),
(129, 'Sanitary Pads', '[{\"detail_name\":\"piece\",\"detail_value\":\"10 pieces\"},{\"detail_name\":\"\",\"detail_value\":\"\"},{\"detail_name\":\"\",\"detail_value\":\"\"}]', 21),
(130, 'Sanitary wipes', '[{\"detail_name\":\"pank\",\"detail_value\":\"10 packs\"}]', 21),
(131, 'Electrolytes', '[{\"detail_name\":\"packet of pills\",\"detail_value\":\"20 pills\"}]', 16),
(132, 'Pain killers', '[{\"detail_name\":\"packet of pills\",\"detail_value\":\"20 pills\"}]', 16),
(134, 'Juice', '[{\"detail_name\":\"volume\",\"detail_value\":\"500ml\"}]', 6),
(136, 'Sterilized Saline', '[{\"detail_name\":\"volume\",\"detail_value\":\"100ml\"}]', 16),
(138, 'Antihistamines', '[{\"detail_name\":\"pills\",\"detail_value\":\"10 pills\"}]', 16),
(139, 'Instant Pancake Mix', '[{\"detail_name\":\"\",\"detail_value\":\"\"}]', 5),
(140, 'Lacta', '[{\"detail_name\":\"weight\",\"detail_value\":\"105g\"}]', 5),
(141, 'Canned Tuna', '[{\"detail_name\":\"\",\"detail_value\":\"\"}]', 5),
(142, 'Batteries', '[{\"detail_name\":\"6 pack\",\"detail_value\":\"\"}]', 23),
(144, 'Can Opener', '[{\"detail_name\":\"1\",\"detail_value\":\"\"}]', 23),
(146, 'Πατατάκια', '[{\"detail_name\":\"weight\",\"detail_value\":\"45g\"}]', 5),
(147, 'Σερβιέτες', '[{\"detail_name\":\"pcs\",\"detail_value\":\"18\"}]', 21),
(148, 'Dry Cranberries', '[{\"detail_name\":\"weight\",\"detail_value\":\"100\"}]', 5),
(149, 'Dry Apricots', '[{\"detail_name\":\"weight\",\"detail_value\":\"100\"}]', 5),
(150, 'Dry Figs', '[{\"detail_name\":\"weight\",\"detail_value\":\"100\"}]', 5),
(151, 'Παξιμάδια', '[{\"detail_name\":\"weight\",\"detail_value\":\"200g\"}]', 5),
(153, 'Test Item', '[{\"detail_name\":\"volume\",\"detail_value\":\"200g\"},{\"detail_name\":\"\",\"detail_value\":\"\"}]', 11),
(155, 'Tampons', '[{\"detail_name\":\"\",\"detail_value\":\"\"}]', 16),
(156, 'plaster set', '[{\"detail_name\":\"1\",\"detail_value\":\"\"},{\"detail_name\":\"\",\"detail_value\":\"\"}]', 41),
(157, 'elastic bandages', '[{\"detail_name\":\"\",\"detail_value\":\"12\"}]', 41),
(158, 'traumaplast', '[{\"detail_name\":\"\",\"detail_value\":\"20\"},{\"detail_name\":\"\",\"detail_value\":\"\"}]', 41),
(159, 'thermal blanket', '[{\"detail_name\":\"\",\"detail_value\":\"2\"}]', 41),
(160, 'burn gel', '[{\"detail_name\":\"ml\",\"detail_value\":\"500\"}]', 41),
(161, 'pet carrier', '[{\"detail_name\":\"\",\"detail_value\":\"2\"}]', 41),
(162, 'pet dishes', '[{\"detail_name\":\"\",\"detail_value\":\"10\"}]', 41),
(163, 'plastic bags', '[{\"detail_name\":\"\",\"detail_value\":\"20\"}]', 41),
(164, 'toys', '[{\"detail_name\":\"\",\"detail_value\":\"5\"}]', 41),
(165, 'burn pads', '[{\"detail_name\":\"\",\"detail_value\":\"5\"}]', 41),
(166, 'cheese', '[{\"detail_name\":\"grams\",\"detail_value\":\"1000\"}]', 5),
(167, 'lettuce', '[{\"detail_name\":\"grams\",\"detail_value\":\"500\"}]', 5),
(168, 'eggs', '[{\"detail_name\":\"pair\",\"detail_value\":\"10\"}]', 5),
(169, 'steaks', '[{\"detail_name\":\"grams\",\"detail_value\":\"1000\"}]', 5),
(170, 'beef burgers', '[{\"detail_name\":\"grams\",\"detail_value\":\"500\"}]', 5),
(171, 'tomatoes', '[{\"detail_name\":\"grams\",\"detail_value\":\"1000\"}]', 5),
(172, 'onions', '[{\"detail_name\":\"grams\",\"detail_value\":\"500\"}]', 5),
(173, 'flour', '[{\"detail_name\":\"grams\",\"detail_value\":\"1000\"}]', 5),
(174, 'pastel', '[{\"detail_name\":\"\",\"detail_value\":\"7\"}]', 5),
(175, 'nuts', '[{\"detail_name\":\"grams\",\"detail_value\":\"500\"}]', 5),
(176, 'dramamines', '[{\"detail_name\":\"\",\"detail_value\":\"5\"}]', 42),
(177, 'nurofen', '[{\"detail_name\":\"\",\"detail_value\":\"10\"}]', 42),
(178, 'imodium', '[{\"detail_name\":\"\",\"detail_value\":\"5\"}]', 42),
(179, 'emetostop', '[{\"detail_name\":\"\",\"detail_value\":\"5\"}]', 42),
(180, 'xanax', '[{\"detail_name\":\"\",\"detail_value\":\"5\"}]', 42),
(181, 'saflutan', '[{\"detail_name\":\"\",\"detail_value\":\"2\"}]', 42),
(182, 'sadolin', '[{\"detail_name\":\"\",\"detail_value\":\"3\"}]', 42),
(183, 'depon', '[{\"detail_name\":\"\",\"detail_value\":\"20\"}]', 42),
(184, 'panadol', '[{\"detail_name\":\"\",\"detail_value\":\"6\"}]', 42),
(185, 'ponstan ', '[{\"detail_name\":\"\",\"detail_value\":\"10\"}]', 42),
(186, 'algofren', '[{\"detail_name\":\"10\",\"detail_value\":\"600ml\"},{\"detail_name\":\"\",\"detail_value\":\"\"}]', 42),
(187, 'effervescent depon', '[{\"detail_name\":\"67\",\"detail_value\":\"1000mg\"}]', 42),
(188, 'cold coffee', '[{\"detail_name\":\"10\",\"detail_value\":\"330ml\"}]', 6),
(189, 'Hell', '[{\"detail_name\":\"22\",\"detail_value\":\"330\"}]', 43),
(190, 'Monster', '[{\"detail_name\":\"31\",\"detail_value\":\"500ml\"}]', 43),
(191, 'Redbull', '[{\"detail_name\":\"40\",\"detail_value\":\"330ml\"}]', 43),
(192, 'Powerade', '[{\"detail_name\":\"23\",\"detail_value\":\"500ml\"}]', 43),
(193, 'PRIME', '[{\"detail_name\":\"15\",\"detail_value\":\"500ml\"}]', 43),
(194, 'Lighter', '[{\"detail_name\":\"16\",\"detail_value\":\"Mini\"}]', 23),
(195, 'isothermally shirts', '[{\"detail_name\":\"5\",\"detail_value\":\"Medium\"},{\"detail_name\":\"6\",\"detail_value\":\"Large\"},{\"detail_name\":\"10\",\"detail_value\":\"Small\"},{\"detail_name\":\"2\",\"detail_value\":\"XL\"}]', 28),
(198, 'Shorts', '[{\"detail_name\":\"20\",\"detail_value\":\"\"},{\"detail_name\":\"\",\"detail_value\":\"\"}]', 34),
(199, 'Chicken', '[{\"detail_name\":\"5\",\"detail_value\":\"1.5kg\"}]', 5),
(202, 'sanitary napkins', '[{\"detail_name\":\"30\",\"detail_value\":\"500g\"}]', 21),
(203, 'COVID-19 Tests', '[{\"detail_name\":\"20\",\"detail_value\":\"\"}]', 16),
(204, 'Club Soda', '[{\"detail_name\":\"volume\",\"detail_value\":\"500ml\"}]', 6),
(205, 'testproduct', '[{\"detail_name\":\"test detail\",\"detail_value\":\"test value\"}]', 5);

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id_off` int(11) NOT NULL,
  `time` date NOT NULL,
  `user` int(11) NOT NULL,
  `savior_id` int(11) DEFAULT NULL,
  `accept_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`id_off`, `time`, `user`, `savior_id`, `accept_date`) VALUES
(10, '2024-01-17', 5, NULL, NULL),
(14, '2024-01-24', 30, NULL, NULL),
(15, '2024-01-24', 30, 3, '2024-02-08'),
(16, '2024-01-24', 30, 3, '2024-02-02');

-- --------------------------------------------------------

--
-- Table structure for table `off_item_link`
--

CREATE TABLE `off_item_link` (
  `id_off_l` int(11) NOT NULL,
  `id_item_l` int(11) NOT NULL,
  `quant` int(11) NOT NULL,
  `id_link_off` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `off_item_link`
--

INSERT INTO `off_item_link` (`id_off_l`, `id_item_l`, `quant`, `id_link_off`) VALUES
(10, 16, 15, 18),
(14, 17, 16, 19),
(15, 19, 23, 20),
(16, 21, 12, 21);

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE `person` (
  `user_id` int(11) NOT NULL,
  `onoma` varchar(255) NOT NULL,
  `epitheto` varchar(255) NOT NULL,
  `phonenum` varchar(255) NOT NULL,
  `usertype` enum('savior','citizen','admin') NOT NULL,
  `Latitude` float NOT NULL,
  `Longitude` float NOT NULL,
  `username` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `salt` varchar(255) NOT NULL,
  `pepper` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`user_id`, `onoma`, `epitheto`, `phonenum`, `usertype`, `Latitude`, `Longitude`, `username`, `pwd`, `salt`, `pepper`) VALUES
(1, 'Marios', 'Tsaltakis', '6971634975', 'citizen', 38.2454, 21.7343, 'mariostsal', '95252cff555f3ab29bc2f3733322cb91ce1cc8da32302335762a4d62ab10ef9b', '3f250b937403e64a87cecc7a05611fa8', 'SuperSecureOrganicPepper'),
(2, 'base', 'mparoutis', '6971634974', 'admin', 38.2476, 21.7285, 'raskal', 'b3bce55160fad23c46d6e0b93c1103faeebccc00278acd376086d8375ae2ea92', 'ac5bfee50fa54124280c94a74027a72d', 'SuperSecureOrganicPepper'),
(3, 'konstantinos', 'basiladiotis', '6971634976', 'savior', 38.2453, 21.7385, 'kostis', 'c01c58d936a26d20d5476e96775ea09e81e1053c3182099c3360ed75bc6d35d4', '0669db551499477a9343d88af24d58d5', 'SuperSecureOrganicPepper'),
(4, 'Γεώργιος', 'Τσαλτάκης', '6934345345', 'citizen', 38.2463, 21.7351, 'TsaltakisGeorgios', 'e585f3d02d977be2d76da81166a6db0d20c4d055fc72bf011561c19ab06e02f7', '6cdc171307b640db9ccde0078516840a', 'SuperSecureOrganicPepper'),
(5, 'Melpo', 'kapsali', '1234123444', 'citizen', 38.2548, 21.7385, 'Melpo', '4bd5a2620642ffebd5701da0dbd1bed1358bd3d509a1669c4a0445934754a368', '57382f94d51ae11468279e4363bd04b1', 'SuperSecureOrganicPepper'),
(6, 'Marios', 'Tsaltakis', '2345235234', 'citizen', 38.2457, 21.7345, 'mariostsal2', 'e1b19db6d44439fcc0a42e3e2e3d2aba995d706589f875b770581e6e82f54859', '523a9ac4aa2caf4a981a2440fb020b67', 'SuperSecureOrganicPepper'),
(11, 'Spi', 'Tri', '2345234523', 'citizen', 38.2463, 21.7351, 'Spyridonia', '717d3991a0a3511dfb3030e26349f5068aedbdbb5e909f61157b47676f3e7700', '795553376467f44792216add5cc12ebf', 'SuperSecureOrganicPepper'),
(13, 'test', 'test', '2345324452', 'citizen', 38.2448, 21.7341, 'test1', '433729f9061f98ab497b4b0b83fdc091c0960a338ef5d64586dd8ab0f8cadbf8', '5732636b631580ca32371df47774a78e', 'SuperSecureOrganicPepper'),
(14, 'test', 'test', '2345245254', 'citizen', 38.2451, 21.7346, 'test3', '0bfcaba8bf9113f84db27b7600aba64ca59bc56a357c2834a74949f27ebf1719', '3972a86e6c37393a682b1e2259f84e6a', 'SuperSecureOrganicPepper'),
(15, 'Alexandros', 'Tsakiridis', '2345325234', 'admin', 38.248, 21.7329, 'pacman', '874d8237cbd4e4fb39d878dfbbd96913fdd283b0bcb0ed76e56a9eda274d7d22', '626c1bfc79df365db0625aa916d44798', 'SuperSecureOrganicPepper'),
(16, 'Μάριος', 'Τσαλτάκης', '1342352345', 'citizen', 38.2441, 21.7346, 'test13', '5e70b67d74cdd1e9fd7ec1001e42c7a33faeff8dc0633a1bf82c95ebd146b1b8', 'fdcadc888aaddec9f4e43090865affd1', 'SuperSecureOrganicPepper'),
(19, 'marios', 'asdaf', '3452345254', 'savior', 38.2451, 21.7343, 'testsavior3', '33589d289690f5f37628530941f98424cf139d5c131a0f5980bd30ee0aa57e46', '3f5b0f28aba911a6bbbb790cfe027a8a', 'SuperSecureOrganicPepper'),
(20, 'test', 'setse', '6977325659', 'citizen', 38.2444, 21.7346, 'testuser4', '15a90f3b1d9b5d383df1d45ecd62290395752b5d916b4e62c2f51228c4b838d6', '7d328874addf451714f2f2369ac2b766', 'SuperSecureOrganicPepper'),
(21, 'test', 'test', '6969696969', 'citizen', 1, 1, 'test', 'f9e1bd50e0047816a32d59e7b61c3bd76a5e63b0f56276bdb9670a7678621a75', 'b2a82a5243471d6aa1676485c4bb8b38', 'SuperSecureOrganicPepper'),
(22, '[{\"user_id\":1,\"onoma\":\"Marios\",\"epitheto\":\"Tsaltakis\",\"phonenum\":\"6971634975\",\"usertype\":\"citizen\",\"Latitude\":38.2454,\"Longitude\":21.7343,\"username\":\"mariostsal\",\"pwd\":\"95252cff555f3ab29bc2f3733322cb91ce1cc8da32302335762a4d62ab10ef9b\",\"salt\":\"3f250b937403', '[{\"user_id\":1,\"onoma\":\"Marios\",\"epitheto\":\"Tsaltakis\",\"phonenum\":\"6971634975\",\"usertype\":\"citizen\",\"Latitude\":38.2454,\"Longitude\":21.7343,\"username\":\"mariostsal\",\"pwd\":\"95252cff555f3ab29bc2f3733322cb91ce1cc8da32302335762a4d62ab10ef9b\",\"salt\":\"3f250b937403', '0', 'citizen', 1, 1, '[{\"user_id\":1,\"onoma\":\"Marios\",\"epitheto\":\"Tsaltakis\",\"phonenum\":\"6971634975\",\"usertype\":\"citizen\",\"Latitude\":38.2454,\"Longitude\":21.7343,\"username\":\"mariostsal\",\"pwd\":\"95252cff555f3ab29bc2f3733322cb91ce1cc8da32302335762a4d62ab10ef9b\",\"salt\":\"3f250b937403', '91c6a6c50f2fd31a7c14203b85ed5b992e5cbda4bc72ad39bc79c5016c01fb52', '3fff22a4e7da0d52246d7c6c5c6c7fca', 'SuperSecureOrganicPepper'),
(23, 'konstantinos', 'vasiladiotis', '6988457345', 'citizen', 38.2479, 21.7403, 'stiko', '6214cda173a6fe19e902cd38ace9a6d98aaec6fdcafcf1f4c18e44359e7951b6', '325bec9271fb530f7135e08063bd621a', 'SuperSecureOrganicPepper'),
(24, 'panagiotis', 'anastasiou', '6988746123', 'citizen', 38.2449, 21.7402, 'panos', 'c19bdc506ac686637b9e47711dc5f41b89b9d1ab656642fa7682a5373790e740', '7c73916179f2eb78984127595bd79ba0', 'SuperSecureOrganicPepper'),
(25, 'giannis', 'stamatiou', '6955890456', 'citizen', 38.248, 21.7424, 'john', '218f7f056579724d177c59566f4285cea67ec0c5636a1d3338034c287daaf2bc', '39ec91249051ab0f64b6a804cac596c8', 'SuperSecureOrganicPepper'),
(26, 'Panagiotis-Michail', 'Lois', '306946517330', 'admin', 38.2401, 21.7282, 'panoslois', 'fbe2d4d9092600c44bfa81529a2b59a5dbf4a82145fa277d0afa9557373d65d4', '722418228f8c2e5118eff61f37374ad4', 'SuperSecureOrganicPepper'),
(27, 'Konstantinos', 'Tsakiridis', '6944967711', 'savior', 38.2449, 21.7399, 'kontsaki', '2c29f7c25e9054381fe2a8d00680300b62973df96aee421a81ef2e08cf0bcaad', 'd913f0debc7d514755ef9c1cb9bc8697', 'SuperSecureOrganicPepper'),
(28, 'MariosTest', 'TestTsalt', '6971634975', 'savior', 38.2448, 21.7326, 'test_tsaki', '9668de201dc6426602fccdf37eb0b2cde0ad89aecec443798d19afa64993130f', '60c9ef8d41c5f1a0540dadeaba61d68d', 'SuperSecureOrganicPepper'),
(29, 'Vasilina', 'Tsakiridi', '6912345678', 'savior', 38.2433, 21.7378, 'vastsaki', '3a906a1d9ec6bfb984787792f03fa1a235af6c90fa28981f5614d7b67ea519bf', 'b9bc8c124a8ce5dbf2aacb7d77ed3e15', 'SuperSecureOrganicPepper'),
(30, 'Marios ', 'asdfas', '6971634975', 'citizen', 38.2455, 21.7395, 'Marios', 'fe6cbb70f6d533109ad8b28a1cde3a5c75818e7ffcf4e993c6133f54499228be', 'c2a7158effc0fc81622fb3c48b5ad016', 'SuperSecureOrganicPepper');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `id_req` int(11) NOT NULL,
  `people` int(11) NOT NULL,
  `time` date NOT NULL,
  `user` int(11) NOT NULL,
  `savior_id` int(11) DEFAULT NULL,
  `accept_date` date DEFAULT NULL,
  `state` enum('accepted','loaded','nothing') NOT NULL DEFAULT 'nothing'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`id_req`, `people`, `time`, `user`, `savior_id`, `accept_date`, `state`) VALUES
(10, 5, '2024-02-02', 1, NULL, NULL, 'nothing'),
(11, 15, '2024-02-02', 1, NULL, NULL, 'nothing');

-- --------------------------------------------------------

--
-- Table structure for table `req_item_link`
--

CREATE TABLE `req_item_link` (
  `id_link_req` int(11) NOT NULL,
  `id_item_l` int(11) NOT NULL,
  `id_req_l` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `req_item_link`
--

INSERT INTO `req_item_link` (`id_link_req`, `id_item_l`, `id_req_l`) VALUES
(16, 20, 10),
(17, 26, 10),
(18, 115, 10),
(19, 26, 11),
(20, 91, 11),
(21, 139, 11),
(22, 146, 11),
(23, 148, 11),
(24, 149, 11);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `id_veh` int(11) NOT NULL,
  `username_veh` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`id_veh`, `username_veh`) VALUES
(3, 'test');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id_ann`);

--
-- Indexes for table `announ_product`
--
ALTER TABLE `announ_product`
  ADD PRIMARY KEY (`id_match`),
  ADD KEY `id_ann_match` (`id_ann_match`),
  ADD KEY `id_pro_match` (`id_pro_match`);

--
-- Indexes for table `base`
--
ALTER TABLE `base`
  ADD PRIMARY KEY (`id_base`),
  ADD UNIQUE KEY `id_item` (`id_item`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `finished_offers`
--
ALTER TABLE `finished_offers`
  ADD PRIMARY KEY (`id_f_off`),
  ADD KEY `Finished_Offers_fk0` (`itemquant`(768)),
  ADD KEY `Finished_Offers_fk1` (`id_user`),
  ADD KEY `Finished_Offers_fk2` (`id_savior`);

--
-- Indexes for table `finished_requests`
--
ALTER TABLE `finished_requests`
  ADD PRIMARY KEY (`id_f_req`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_savior` (`id_savior`),
  ADD KEY `product_id` (`product_id`(768));

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category` (`category`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id_off`),
  ADD KEY `user` (`user`),
  ADD KEY `savior_id` (`savior_id`);

--
-- Indexes for table `off_item_link`
--
ALTER TABLE `off_item_link`
  ADD PRIMARY KEY (`id_link_off`),
  ADD KEY `id_off_l` (`id_off_l`),
  ADD KEY `id_item_l` (`id_item_l`);

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id_req`),
  ADD KEY `user` (`user`),
  ADD KEY `savior_id` (`savior_id`);

--
-- Indexes for table `req_item_link`
--
ALTER TABLE `req_item_link`
  ADD PRIMARY KEY (`id_link_req`),
  ADD KEY `id_item_l` (`id_item_l`),
  ADD KEY `id_req_l` (`id_req_l`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`id_veh`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id_ann` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `announ_product`
--
ALTER TABLE `announ_product`
  MODIFY `id_match` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `base`
--
ALTER TABLE `base`
  MODIFY `id_base` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `finished_offers`
--
ALTER TABLE `finished_offers`
  MODIFY `id_f_off` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `finished_requests`
--
ALTER TABLE `finished_requests`
  MODIFY `id_f_req` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=206;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id_off` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `off_item_link`
--
ALTER TABLE `off_item_link`
  MODIFY `id_link_off` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `person`
--
ALTER TABLE `person`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id_req` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `req_item_link`
--
ALTER TABLE `req_item_link`
  MODIFY `id_link_req` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `id_veh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `announ_product`
--
ALTER TABLE `announ_product`
  ADD CONSTRAINT `announ_product_ibfk_1` FOREIGN KEY (`id_ann_match`) REFERENCES `announcements` (`id_ann`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `announ_product_ibfk_2` FOREIGN KEY (`id_pro_match`) REFERENCES `item` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `base`
--
ALTER TABLE `base`
  ADD CONSTRAINT `base_ibfk_1` FOREIGN KEY (`id_item`) REFERENCES `item` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `finished_offers`
--
ALTER TABLE `finished_offers`
  ADD CONSTRAINT `Finished_Offers_fk1` FOREIGN KEY (`id_user`) REFERENCES `person` (`user_id`),
  ADD CONSTRAINT `Finished_Offers_fk2` FOREIGN KEY (`id_savior`) REFERENCES `person` (`user_id`);

--
-- Constraints for table `finished_requests`
--
ALTER TABLE `finished_requests`
  ADD CONSTRAINT `finished_requests_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `person` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `finished_requests_ibfk_3` FOREIGN KEY (`id_savior`) REFERENCES `person` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_ibfk_1` FOREIGN KEY (`category`) REFERENCES `category` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `offers`
--
ALTER TABLE `offers`
  ADD CONSTRAINT `offers_ibfk_1` FOREIGN KEY (`user`) REFERENCES `person` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `offers_ibfk_2` FOREIGN KEY (`savior_id`) REFERENCES `person` (`user_id`) ON UPDATE CASCADE;

--
-- Constraints for table `off_item_link`
--
ALTER TABLE `off_item_link`
  ADD CONSTRAINT `off_item_link_ibfk_1` FOREIGN KEY (`id_off_l`) REFERENCES `offers` (`id_off`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `off_item_link_ibfk_2` FOREIGN KEY (`id_item_l`) REFERENCES `item` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `request_ibfk_1` FOREIGN KEY (`user`) REFERENCES `person` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `request_ibfk_2` FOREIGN KEY (`savior_id`) REFERENCES `person` (`user_id`) ON UPDATE CASCADE;

--
-- Constraints for table `req_item_link`
--
ALTER TABLE `req_item_link`
  ADD CONSTRAINT `req_item_link_ibfk_1` FOREIGN KEY (`id_item_l`) REFERENCES `item` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `req_item_link_ibfk_2` FOREIGN KEY (`id_req_l`) REFERENCES `request` (`id_req`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD CONSTRAINT `Vehicle_fk0` FOREIGN KEY (`id_veh`) REFERENCES `person` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2017 at 06:21 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `all_india`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL DEFAULT 'Category1',
  `description` varchar(200) NOT NULL,
  `sort_order` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `sort_order`) VALUES
(1, 'Starters', 'Served with salad and mint sauce', 0),
(2, 'House Specials', '', 0),
(3, 'Tandoori Specials', 'These are first marinated in spiced yoghurt, then skewered and cooked in the clay oven. Main Dishes - served with salad and mint sauce', 0),
(4, 'Main Curries', '', 0),
(5, 'Biryani', 'The following dishes are stir-fried in basmati pilau rice and served with a separate mixed vegetable curry', 0),
(6, 'Side Dishes', '', 0),
(7, 'Rice', '', 0),
(8, 'Bread', '', 0),
(9, 'Desserts and Drinks', '', 0),
(10, 'Chutney and Pickle', '', 0),
(11, 'Set Meals', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL DEFAULT 'User',
  `lastname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `telephone` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `firstname`, `lastname`, `email`, `password`, `telephone`) VALUES
(1, 'Jackson', 'Moore', 'j.moore@gmail.com', '482c811da5d5b4bc6d497ffa98491e38', '(111) 111 1111'),
(2, 'Mizan', 'Rahman', 'mizan.rahman@allindia.com', '5ebe2294ecd0e0f08eab7690d2a6ee69', '222-222-2222');

-- --------------------------------------------------------

--
-- Table structure for table `modifiers`
--

CREATE TABLE `modifiers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` varchar(10) NOT NULL DEFAULT '0.00',
  `sort_order` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `modifiers`
--

INSERT INTO `modifiers` (`id`, `name`, `price`, `sort_order`) VALUES
(1, 'Less hot', '0.00', 0),
(2, 'With Mushrooms', '1.00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` varchar(250) NOT NULL,
  `price` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `subcategory_id`, `name`, `description`, `price`) VALUES
(1, 2, 1, 'Chicken Tikka', '<i style="color:#bdb9b9">No Description</i>', '6.95'),
(2, 2, 1, 'Lamb Tikka', '<i style="color:#bdb9b9">No Description</i>', '6.95'),
(3, 2, 1, 'King Prawn', '<i style="color:#bdb9b9">No Description</i>', '9.95'),
(4, 2, 1, 'Fish', '<i style="color:#bdb9b9">No Description</i>', '7.95'),
(5, 2, 2, 'Chicken Tikka', '<i style="color:#bdb9b9">No Description</i>', '6.95'),
(6, 2, 2, 'Chicken Tikka', '<i style="color:#bdb9b9">No Description</i>', '6.95'),
(7, 2, 2, 'Lamb Tikka', '<i style="color:#bdb9b9">No Description</i>', '6.95'),
(8, 2, 2, 'Fish', '<i style="color:#bdb9b9">No Description</i>', '7.95'),
(9, 2, 3, 'Mixed', '<i style="color:#bdb9b9">No Description</i>', '6.95'),
(10, 2, 4, 'Chicken Tikka', '<i style="color:#bdb9b9">No Description</i>', '6.95'),
(11, 2, 4, 'Lamb', '<i style="color:#bdb9b9">No Description</i>', '6.95'),
(12, 2, 4, 'Vegetable', '<i style="color:#bdb9b9">No Description</i>', '6.95'),
(13, 2, 5, 'Chicken Tikka', '<i style="color:#bdb9b9">No Description</i>', '6.95'),
(14, 2, 5, 'Lamb Tikka', '<i style="color:#bdb9b9">No Description</i>', '6.95'),
(15, 2, 6, 'Chicken Tikka', '<i style="color:#bdb9b9">No Description</i>', '6.95'),
(16, 2, 6, 'Lamb', '<i style="color:#bdb9b9">No Description</i>', '6.95'),
(17, 2, 7, 'Chicken Tikka', '<i style="color:#bdb9b9">No Description</i>', '6.95'),
(18, 2, 7, 'Lamb Tikka', '<i style="color:#bdb9b9">No Description</i>', '6.95'),
(19, 2, 8, 'Chicken Tikka', '<i style="color:#bdb9b9">No Description</i>', '6.95'),
(20, 2, 8, 'Lamb Tikka', '<i style="color:#bdb9b9">No Description</i>', ''),
(21, 2, 8, 'Vegetable', '<i style="color:#bdb9b9">No Description</i>', '6.95'),
(22, 2, 9, 'Chicken Tikka', '<i style="color:#bdb9b9">No Description</i>', '6.95'),
(23, 2, 9, 'Lamb Tikka', '<i style="color:#bdb9b9">No Description</i>', '6.95'),
(24, 2, 10, 'Chicken Tikka', '<i style="color:#bdb9b9">No Description</i>', '6.95'),
(25, 2, 10, 'Vegetable', '<i style="color:#bdb9b9">No Description</i>', '6.95'),
(26, 2, 11, 'Chicken Tikka', '<i style="color:#bdb9b9">No Description</i>', '6.95'),
(27, 2, 11, 'Lamb Tikka', '<i style="color:#bdb9b9">No Description</i>', '6.95'),
(28, 2, 11, 'Vegetable', '<i style="color:#bdb9b9">No Description</i>', '6.95'),
(29, 2, 11, 'King Prawn', '<i style="color:#bdb9b9">No Description</i>', '9.95'),
(30, 2, 11, 'FISH', '<i style="color:#bdb9b9">No Description</i>', '7.95'),
(31, 2, 12, 'Chicken Tikka', '<i style="color:#bdb9b9">No Description</i>', '6.95'),
(32, 2, 12, 'Lamb', '<i style="color:#bdb9b9">No Description</i>', '6.95'),
(33, 2, 12, 'Vegetable', '<i style="color:#bdb9b9">No Description</i>', '6.95'),
(34, 2, 12, 'Fish', '<i style="color:#bdb9b9">No Description</i>', '7.95'),
(35, 2, 13, 'Chicken Tikka', '<i style="color:#bdb9b9">No Description</i>', '6.95'),
(36, 2, 13, 'Vegetable', '<i style="color:#bdb9b9">No Description</i>', '6.95'),
(37, 2, 14, 'Chicken Tikka', '<i style="color:#bdb9b9">No Description</i>', '6.95'),
(38, 2, 14, 'Lamb Tikka', '<i style="color:#bdb9b9">No Description</i>', '6.95'),
(39, 2, 14, 'Vegetable', '<i style="color:#bdb9b9">No Description</i>', '6.95'),
(40, 2, 15, 'Chicken', '<i style="color:#bdb9b9">No Description</i>', '6.95'),
(41, 2, 15, 'Lamb', '<i style="color:#bdb9b9">No Description</i>', '6.95'),
(42, 2, 15, 'Chicken Tikka', '<i style="color:#bdb9b9">No Description</i>', '6.95'),
(43, 2, 15, 'Lamb Tikka', '<i style="color:#bdb9b9">No Description</i>', '6.95'),
(44, 2, 15, 'Vegetable', '<i style="color:#bdb9b9">No Description</i>', '6.95'),
(45, 2, 15, 'King Prawn', '<i style="color:#bdb9b9">No Description</i>', '9.95'),
(46, 2, 15, 'Fish', '<i style="color:#bdb9b9">No Description</i>', '7.95'),
(47, 2, 16, 'Chicken Tikka', '<i style="color:#bdb9b9">No Description</i>', '6.95'),
(48, 2, 16, 'Lamb Tikka', '<i style="color:#bdb9b9">No Description</i>', '6.95'),
(49, 2, 16, 'Vegetable', '<i style="color:#bdb9b9">No Description</i>', '6.95'),
(50, 2, 17, 'Chicken', '<i style="color:#bdb9b9">No Description</i>', '6.95'),
(51, 2, 17, 'Lamb', '<i style="color:#bdb9b9">No Description</i>', '6.95'),
(52, 2, 17, 'Vegetable', '<i style="color:#bdb9b9">No Description</i>', '6.95'),
(53, 2, 17, 'King Prawn', '<i style="color:#bdb9b9">No Description</i>', '9.95'),
(54, 2, 17, 'Fish', '<i style="color:#bdb9b9">No Description</i>', '7.95'),
(55, 2, 42, 'Chicken', '<i style="color:#bdb9b9">No Description</i>', '6.95'),
(56, 2, 42, 'Lamb', '<i style="color:#bdb9b9">No Description</i>', '6.95'),
(57, 2, 42, 'Vegetable', '<i style="color:#bdb9b9">No Description</i>', '6.95'),
(58, 2, 18, 'Chicken ', '<i style="color:#bdb9b9">No Description</i>', '6.95'),
(59, 2, 18, 'Lamb', '<i style="color:#bdb9b9">No Description</i>', '6.95'),
(60, 2, 19, 'Chicken', '<i style="color:#bdb9b9">No Description</i>', '6.95'),
(61, 2, 19, 'Chicken', '<i style="color:#bdb9b9">No Description</i>', '6.95'),
(62, 2, 19, 'Chicken Tikka', '<i style="color:#bdb9b9">No Description</i>', '6.95'),
(63, 2, 19, 'Lamb', '<i style="color:#bdb9b9">No Description</i>', '6.95'),
(64, 2, 19, 'Vegetable', '<i style="color:#bdb9b9">No Description</i>', '6.95'),
(65, 2, 19, 'King Prawn', '<i style="color:#bdb9b9">No Description</i>', '9.95'),
(66, 2, 19, 'Fish', '<i style="color:#bdb9b9">No Description</i>', '7.95'),
(67, 2, 20, 'Chicken', '<i style="color:#bdb9b9">No Description</i>', '6.95'),
(68, 2, 20, 'Lamb', '<i style="color:#bdb9b9">No Description</i>', '6.95'),
(69, 1, 0, 'Chicken Pakura', '<i style="color:#bdb9b9">No Description</i>', '3.75'),
(70, 1, 0, 'Vegetable Pakura', '<i style="color:#bdb9b9">No Description</i>', '3.75'),
(71, 1, 0, 'Onion Bhaji', '<i style="color:#bdb9b9">No Description</i>', '2.95'),
(72, 1, 0, 'Tandoori Chicken', '<i style="color:#bdb9b9">No Description</i>', '3.75'),
(73, 1, 0, 'Chicken Tikka', '<i style="color:#bdb9b9">No Description</i>', '3.75'),
(74, 1, 0, 'Lamb Tikka', '<i style="color:#bdb9b9">No Description</i>', '3.75'),
(75, 1, 0, 'Reshmi Kebab', 'Omelette', '2.25'),
(76, 1, 0, 'Sheek Kebab', '<i style="color:#bdb9b9">No Description</i>', '3.75'),
(77, 1, 0, 'Shami Kebab', '<i style="color:#bdb9b9">No Description</i>', '3.75'),
(78, 1, 0, 'Nargis Kebab', '<i style="color:#bdb9b9">No Description</i>', '3.25'),
(79, 1, 0, 'Mixed Kebab', '<i style="color:#bdb9b9">No Description</i>', '4.25'),
(80, 1, 0, 'Chicken Chat', '<i style="color:#bdb9b9">No Description</i>', '3.75'),
(81, 1, 0, 'Meat Somosa', 'Two Piece', '2.60'),
(82, 1, 0, 'Vegetable Somosa', 'Two Piece', '2.60'),
(83, 1, 0, 'Prawn Cocktail', '<i style="color:#bdb9b9">No Description</i>', '2.50'),
(84, 1, 0, 'Prawn Puree', '<i style="color:#bdb9b9">No Description</i>', '4.25'),
(85, 1, 0, 'King Prawn Butterfly', '<i style="color:#bdb9b9">No Description</i>', '4.95'),
(86, 1, 0, 'King Prawn Puree', '<i style="color:#bdb9b9">No Description</i>', '5.25'),
(87, 1, 0, 'Vegetable Puree', '<i style="color:#bdb9b9">No Description</i>', '4.25'),
(88, 1, 0, 'Chicken Tikka Puree', '<i style="color:#bdb9b9">No Description</i>', '4.25'),
(89, 5, 0, 'Special ', '<i style="color:#bdb9b9">No Description</i>', '9.50'),
(90, 5, 0, 'Chicken', '<i style="color:#bdb9b9">No Description</i>', '7.75'),
(91, 5, 0, 'Lamb', '<i style="color:#bdb9b9">No Description</i>', '7.75'),
(92, 5, 0, 'Prawn', '<i style="color:#bdb9b9">No Description</i>', '7.95'),
(93, 5, 0, 'King Prawn', '<i style="color:#bdb9b9">No Description</i>', '9.95'),
(94, 5, 0, 'Chicken Tikka', '<i style="color:#bdb9b9">No Description</i>', '8.50'),
(95, 5, 0, 'Lamb Tikka', '<i style="color:#bdb9b9">No Description</i>', '8.50'),
(96, 5, 0, 'Chicken Sag', '<i style="color:#bdb9b9">No Description</i>', '8.50'),
(97, 5, 0, 'Vegetable', '<i style="color:#bdb9b9">No Description</i>', '6.95'),
(98, 5, 0, 'King Prawn Tikka', '<i style="color:#bdb9b9">No Description</i>', '10.95'),
(99, 5, 0, 'Garlic Chicken Tikka', '<i style="color:#bdb9b9">No Description</i>', '8.50'),
(100, 5, 0, 'Chicken & Keema', '<i style="color:#bdb9b9">No Description</i>', '8.50'),
(101, 5, 0, 'Hot & Spicy Chicken', '<i style="color:#bdb9b9">No Description</i>', '8.95'),
(102, 5, 0, 'Hot & Spicy Lamb', '<i style="color:#bdb9b9">No Description</i>', '8.95'),
(103, 5, 0, 'Hot & Spicy King Prawn', '<i style="color:#bdb9b9">No Description</i>', '10.95'),
(104, 6, 0, 'Onion Bhaji', 'Side', '1.95'),
(105, 6, 0, 'Chana Bhaji', '<i style="color:#bdb9b9">No Description</i>', '2.95'),
(106, 6, 0, 'Vegetable Curry', '<i style="color:#bdb9b9">No Description</i>', '2.95'),
(107, 6, 0, 'Aloo Bhaji', 'Potatoes', '2.95'),
(108, 6, 0, 'Cauliflower Bhaji', '<i style="color:#bdb9b9">No Description</i>', '2.95'),
(109, 6, 0, 'Mushroom Bhaji', '<i style="color:#bdb9b9">No Description</i>', '2.95'),
(110, 6, 0, 'Bombay Aloo', 'Hot', '2.95'),
(111, 6, 0, 'Garlic Fried Mushrooms', '<i style="color:#bdb9b9">No Description</i>', '2.95'),
(112, 6, 0, 'Garlic Potato', '<i style="color:#bdb9b9">No Description</i>', '2.95'),
(113, 6, 0, 'Aloo Ghobi', 'Potato & Cauliflower', '2.95'),
(114, 6, 0, 'Sag Panir', 'Spinach & Indian Cheese', '2.95'),
(115, 6, 0, 'Sag Bhaji', '<i style="color:#bdb9b9">No Description</i>', '2.95'),
(116, 6, 0, 'Sag Aloo', 'Spinach, Potato & Garlic', '2.95'),
(117, 6, 0, 'Brinjal Bhaji', 'Aubergine', '2.95'),
(118, 6, 0, 'Bhindi Bhaji', 'Okra', '2.95'),
(119, 6, 0, 'Tarka Dhall', 'Lentils', '2.95'),
(120, 6, 0, 'Sag Dhall', '<i style="color:#bdb9b9">No Description</i>', '2.95'),
(121, 6, 0, 'Mutter Panir', 'Peas & Indian Cheese', '2.95'),
(122, 6, 0, 'Chana Masala', '<i style="color:#bdb9b9">No Description</i>', '2.95'),
(123, 6, 0, 'Aloo Chana', 'Chick Peas & Potato', '2.95'),
(124, 6, 0, 'Mushroom & Sag Bhaji', '<i style="color:#bdb9b9">No Description</i>', '2.95'),
(125, 6, 0, 'Green Salad', '<i style="color:#bdb9b9">No Description</i>', '1.25'),
(126, 7, 0, 'Boiled Rice', '<i style="color:#bdb9b9">No Description</i>', '2.00'),
(127, 7, 0, 'Pilau Rice', '<i style="color:#bdb9b9">No Description</i>', '2.10'),
(128, 7, 0, 'Special Rice', '<i style="color:#bdb9b9">No Description</i>', '2.95'),
(129, 7, 0, 'Mushroom Rice', '<i style="color:#bdb9b9">No Description</i>', '2.95'),
(130, 7, 0, 'Keema Rice', '<i style="color:#bdb9b9">No Description</i>', '2.95'),
(131, 7, 0, 'Vegetable Rice', '<i style="color:#bdb9b9">No Description</i>', '2.95'),
(132, 7, 0, 'Onion Fried Rice', '<i style="color:#bdb9b9">No Description</i>', '2.95'),
(133, 7, 0, 'Egg Fried Rice', '<i style="color:#bdb9b9">No Description</i>', '2.95'),
(134, 7, 0, 'Garlic Fried Rice', '<i style="color:#bdb9b9">No Description</i>', '2.95'),
(135, 7, 0, 'Lemon Rice', '<i style="color:#bdb9b9">No Description</i>', '2.95'),
(136, 7, 0, 'Coconut Rice', '<i style="color:#bdb9b9">No Description</i>', '2.95'),
(137, 7, 0, 'Peas Fried Rice', '<i style="color:#bdb9b9">No Description</i>', '2.95'),
(138, 7, 0, 'Chilli Rice', '<i style="color:#bdb9b9">No Description</i>', '2.95'),
(139, 7, 0, 'Chicken Fried Rice', '<i style="color:#bdb9b9">No Description</i>', '2.95'),
(140, 7, 0, 'Chips', '<i style="color:#bdb9b9">No Description</i>', '1.95'),
(141, 8, 0, 'Plain Nan', '<i style="color:#bdb9b9">No Description</i>', '2.00'),
(142, 8, 0, 'Chilli Nan', '<i style="color:#bdb9b9">No Description</i>', '2.50'),
(143, 8, 0, 'Cheese Nan', '<i style="color:#bdb9b9">No Description</i>', '2.50'),
(144, 8, 0, 'Peshuari Nan', 'Sweet', '2.50'),
(145, 8, 0, 'Keema Nan', 'Mincemeat', '2.50'),
(146, 8, 0, 'Vegetable Nan', '<i style="color:#bdb9b9">No Description</i>', '2.50'),
(147, 8, 0, 'Garlic Nan', '<i style="color:#bdb9b9">No Description</i>', '2.50'),
(148, 8, 0, 'Chicken Tikka Nan', '<i style="color:#bdb9b9">No Description</i>', '4.75'),
(149, 8, 0, 'Garlic & Cheese Nan', '<i style="color:#bdb9b9">No Description</i>', '2.95'),
(150, 8, 0, 'Poratha', 'Thick, Fried Bread', '2.50'),
(151, 8, 0, 'Egg Poratha', '<i style="color:#bdb9b9">No Description</i>', '2.95'),
(152, 8, 0, 'Stuffed Poratha', 'Vegetable', '2.95'),
(153, 8, 0, 'Puree', 'Thin, Fried Bread', '1.00'),
(154, 8, 0, 'Chapati', 'Thin, Soft Bread', '1.00'),
(155, 8, 0, 'Tandoori Roti', '<i style="color:#bdb9b9">No Description</i>', '1.95'),
(156, 8, 0, 'Buttered Chapati', '<i style="color:#bdb9b9">No Description</i>', '1.50'),
(157, 8, 0, 'Papadom Crisp', '<i style="color:#bdb9b9">No Description</i>', '0.50'),
(158, 8, 0, 'Masala Papadom', '<i style="color:#bdb9b9">No Description</i>', '0.60'),
(159, 9, 0, 'Banana Fritter', '<i style="color:#bdb9b9">No Description</i>', '2.50'),
(160, 9, 0, 'Coke (Can)', '<i style="color:#bdb9b9">No Description</i>', '0.80'),
(161, 9, 0, 'Diet Coke (Can)', '<i style="color:#bdb9b9">No Description</i>', '0.80'),
(162, 9, 0, 'Bottle of Coke', '<i style="color:#bdb9b9">No Description</i>', '2.50'),
(163, 9, 0, 'Bottle of Diet Coke', '<i style="color:#bdb9b9">No Description</i>', '2.50'),
(164, 10, 0, 'Mango Chutney', '<i style="color:#bdb9b9">No Description</i>', '0.75'),
(165, 10, 0, 'Onion Salad', '<i style="color:#bdb9b9">No Description</i>', '0.75'),
(166, 10, 0, 'Mint Sauce', '<i style="color:#bdb9b9">No Description</i>', '0.75'),
(167, 10, 0, 'Chilli Pickle', '<i style="color:#bdb9b9">No Description</i>', '0.75'),
(168, 10, 0, 'Lime Pickle', '<i style="color:#bdb9b9">No Description</i>', '0.75'),
(169, 10, 0, 'Mixed Pickle', '<i style="color:#bdb9b9">No Description</i>', '0.75'),
(170, 10, 0, 'Raitha', '<i style="color:#bdb9b9">No Description</i>', '0.75'),
(171, 10, 0, 'Cucumber Raitha', '<i style="color:#bdb9b9">No Description</i>', '0.75'),
(172, 10, 0, 'Onion Raitha', '<i style="color:#bdb9b9">No Description</i>', '0.75'),
(173, 11, 0, 'Set Meal for 2', '1 Chicken Tikka (st), 1 Onion Bhaji (st), 1 Chicken Madras, 1 Chicken Kurma, 1 Vegetable Curry, 2 Papadoms, 2 Pilau Rice, 1 Nan', '21.95'),
(174, 11, 0, 'Set Meal for 4', '2 Chicken Tikka (st), 2 Onion Bhaji (st), 2 Chicken Madras, 2 Chicken Kurma, 2 Vegetable Curry, 4 Papadoms, 4 Pilau Rice, 2 Nan', '44.95'),
(175, 11, 0, 'Set Meal for 3', '1 Onion Bhaji (st), 1 Chicken Tikka (st), 1 Shami Kebab (st), 1 Chicken Kurma, 1 Lamb Bhuna, 1 Chicken Dhansak, 1 Mushroom Bhaji, 2 Pilau Rice, 3 Papadoms, 1 Garlic Nan', '34.95'),
(176, 11, 0, 'Tandoori Set Meal 2', '1 Chicken Tikka (st), 1 Sheek Kebab (st), 1 Chicken Tikka Masala, 1 Chicken Tikka Madras, 1 Sag Aloo, 1 Special Rice, 2 Papadoms, 1 Peshuari Nan', '25.95'),
(177, 11, 0, 'Tandoori Set Meal 4', '2 Tandoori Chicken (st), 2 Sheek Kebab (st), 1 Chicken Tikka Masala, 1 Chicken Tikka Jalfreyzi, 1 Chicken Tikka Pasanda, 1 Chicken Tikka Balti, 1 Sag Bhaji, 1 Mushroom Bhaji, 4 Pilau Rice, 4 Papdoms, 1 Keema Nan, 1 Plain Nan', '54.95'),
(178, 11, 0, 'Vegetable Set Meal 2', '1 Vegetable Somosa (st), 1 Onion Bhaji (st), 1 Vegetable Kurma, 1 Vegetable Dhansak, 1 Bhindi Bhaji, 1 Vegetable Nan, 2 Mushroom Rice', '19.95'),
(179, 4, 21, 'Chicken', '<i style="color:#bdb9b9">No Description</i>', '5.25'),
(180, 4, 21, 'Lamb', '<i style="color:#bdb9b9">No Description</i>', '5.50'),
(181, 4, 21, 'Prawn', '<i style="color:#bdb9b9">No Description</i>', '5.95'),
(182, 4, 21, 'King Prawn', '<i style="color:#bdb9b9">No Description</i>', '8.95'),
(183, 4, 21, 'Chicken Tikka', '<i style="color:#bdb9b9">No Description</i>', '6.50'),
(184, 4, 21, 'Lamb Tikka', '<i style="color:#bdb9b9">No Description</i>', '6.95'),
(185, 4, 21, 'Vegetable', '<i style="color:#bdb9b9">No Description</i>', '4.95'),
(186, 4, 22, 'Chicken', '<i style="color:#bdb9b9">No Description</i>', '5.25'),
(187, 4, 22, 'Lamb', '<i style="color:#bdb9b9">No Description</i>', '5.50'),
(188, 4, 22, 'Prawn', '<i style="color:#bdb9b9">No Description</i>', '5.95'),
(189, 4, 22, 'King Prawn', '<i style="color:#bdb9b9">No Description</i>', '8.95'),
(190, 4, 22, 'Chicken Tikka', '<i style="color:#bdb9b9">No Description</i>', '6.50'),
(191, 4, 22, 'Lamb Tikka', '<i style="color:#bdb9b9">No Description</i>', '6.95'),
(192, 4, 22, 'Vegetable', '<i style="color:#bdb9b9">No Description</i>', '4.95'),
(193, 4, 22, 'Fish', '<i style="color:#bdb9b9">No Description</i>', '7.95'),
(194, 4, 23, 'Chicken', '<i style="color:#bdb9b9">No Description</i>', '6.25'),
(195, 4, 23, 'Lamb', '<i style="color:#bdb9b9">No Description</i>', '6.50'),
(196, 4, 23, 'Prawn', '<i style="color:#bdb9b9">No Description</i>', '5.95'),
(197, 4, 23, 'King Prawn', '<i style="color:#bdb9b9">No Description</i>', '8.95'),
(198, 4, 23, 'Chicken Tikka', '<i style="color:#bdb9b9">No Description</i>', '6.50'),
(199, 4, 23, 'Lamb Tikka', '<i style="color:#bdb9b9">No Description</i>', '6.95'),
(200, 4, 23, 'Vegetable', '<i style="color:#bdb9b9">No Description</i>', '5.95'),
(201, 4, 24, 'Chicken', '<i style="color:#bdb9b9">No Description</i>', '6.25'),
(202, 4, 24, 'Lamb', '<i style="color:#bdb9b9">No Description</i>', '6.50'),
(203, 4, 24, 'Prawn', '<i style="color:#bdb9b9">No Description</i>', '5.95'),
(204, 4, 24, 'King Prawn', '<i style="color:#bdb9b9">No Description</i>', '8.95'),
(205, 4, 24, 'Chicken Tikka', '<i style="color:#bdb9b9">No Description</i>', '6.50'),
(206, 4, 24, 'Lamb Tikka', '<i style="color:#bdb9b9">No Description</i>', '6.95'),
(207, 4, 24, 'Vegetable', '<i style="color:#bdb9b9">No Description</i>', '5.95'),
(208, 4, 25, 'Chicken', '<i style="color:#bdb9b9">No Description</i>', '5.25'),
(209, 4, 25, 'Lamb', '<i style="color:#bdb9b9">No Description</i>', '5.50'),
(210, 4, 25, 'Prawn', '<i style="color:#bdb9b9">No Description</i>', '5.95'),
(211, 4, 25, 'King Prawn', '<i style="color:#bdb9b9">No Description</i>', '8.95'),
(212, 4, 25, 'Chicken Tikka', '<i style="color:#bdb9b9">No Description</i>', '6.50'),
(213, 4, 25, 'Lamb Tikka', '<i style="color:#bdb9b9">No Description</i>', '6.95'),
(214, 4, 25, 'Vegetable', '<i style="color:#bdb9b9">No Description</i>', '4.95'),
(215, 4, 25, 'Fish', '<i style="color:#bdb9b9">No Description</i>', '7.95'),
(216, 4, 26, 'Chicken', '<i style="color:#bdb9b9">No Description</i>', '5.25'),
(217, 4, 26, 'Lamb', '<i style="color:#bdb9b9">No Description</i>', '5.50'),
(218, 4, 26, 'Prawn', '<i style="color:#bdb9b9">No Description</i>', '5.95'),
(219, 4, 26, 'King Prawn', '<i style="color:#bdb9b9">No Description</i>', '8.95'),
(220, 4, 26, 'Chicken Tikka', '<i style="color:#bdb9b9">No Description</i>', '6.50'),
(221, 4, 26, 'Lamb Tikka', '<i style="color:#bdb9b9">No Description</i>', '6.95'),
(222, 4, 26, 'Vegetable', '<i style="color:#bdb9b9">No Description</i>', '4.95'),
(223, 4, 26, 'Fish', '<i style="color:#bdb9b9">No Description</i>', '7.95'),
(224, 4, 27, 'Chicken', '<i style="color:#bdb9b9">No Description</i>', '5.25'),
(225, 4, 27, 'Lamb', '<i style="color:#bdb9b9">No Description</i>', '5.50'),
(226, 4, 27, 'Prawn', '<i style="color:#bdb9b9">No Description</i>', '5.95'),
(227, 4, 27, 'King Prawn', '<i style="color:#bdb9b9">No Description</i>', '8.95'),
(228, 4, 27, 'Chicken Tikka', '<i style="color:#bdb9b9">No Description</i>', '6.50'),
(229, 4, 27, 'Lamb Tikka', '<i style="color:#bdb9b9">No Description</i>', '6.95'),
(230, 4, 27, 'Vegetable', '<i style="color:#bdb9b9">No Description</i>', '4.95'),
(231, 4, 27, 'Fish', '<i style="color:#bdb9b9">No Description</i>', '7.95'),
(232, 4, 29, 'Chicken', '<i style="color:#bdb9b9">No Description</i>', '5.25'),
(233, 4, 29, 'Lamb', '<i style="color:#bdb9b9">No Description</i>', '5.50'),
(234, 4, 29, 'Prawn', '<i style="color:#bdb9b9">No Description</i>', '5.95'),
(235, 4, 29, 'King Prawn', '<i style="color:#bdb9b9">No Description</i>', '8.95'),
(236, 4, 29, 'Chicken Tikka', '<i style="color:#bdb9b9">No Description</i>', '6.50'),
(237, 4, 29, 'Lamb Tikka', '<i style="color:#bdb9b9">No Description</i>', '6.95'),
(238, 4, 29, 'Vegetable', '<i style="color:#bdb9b9">No Description</i>', '4.95'),
(239, 4, 29, 'Fish', '<i style="color:#bdb9b9">No Description</i>', '7.95'),
(240, 4, 30, 'Chicken', '<i style="color:#bdb9b9">No Description</i>', '5.25'),
(241, 4, 30, 'Lamb', '<i style="color:#bdb9b9">No Description</i>', '5.50'),
(242, 4, 30, 'Prawn', '<i style="color:#bdb9b9">No Description</i>', '5.95'),
(243, 4, 30, 'King Prawn', '<i style="color:#bdb9b9">No Description</i>', '8.95'),
(244, 4, 30, 'Chicken Tikka', '<i style="color:#bdb9b9">No Description</i>', '6.50'),
(245, 4, 30, 'Lamb Tikka', '<i style="color:#bdb9b9">No Description</i>', '6.95'),
(246, 4, 30, 'Vegetable', '<i style="color:#bdb9b9">No Description</i>', '4.95'),
(247, 4, 30, 'Fish', '<i style="color:#bdb9b9">No Description</i>', '7.95'),
(248, 4, 31, 'Chicken', '<i style="color:#bdb9b9">No Description</i>', '6.25'),
(249, 4, 31, 'Lamb', '<i style="color:#bdb9b9">No Description</i>', '6.50'),
(250, 4, 31, 'Prawn', '<i style="color:#bdb9b9">No Description</i>', '5.95'),
(251, 4, 31, 'King Prawn', '<i style="color:#bdb9b9">No Description</i>', '8.95'),
(252, 4, 31, 'Chicken Tikka', '<i style="color:#bdb9b9">No Description</i>', '6.50'),
(253, 4, 31, 'Lamb Tikka', '<i style="color:#bdb9b9">No Description</i>', '6.95'),
(254, 4, 31, 'Vegetable', '<i style="color:#bdb9b9">No Description</i>', '4.95'),
(255, 4, 31, 'Fish', '<i style="color:#bdb9b9">No Description</i>', '7.95'),
(256, 4, 32, 'Chicken', '<i style="color:#bdb9b9">No Description</i>', '6.25'),
(257, 4, 32, 'Lamb', '<i style="color:#bdb9b9">No Description</i>', '6.50'),
(258, 4, 32, 'Prawn', '<i style="color:#bdb9b9">No Description</i>', '6.50'),
(259, 4, 32, 'King Prawn', '<i style="color:#bdb9b9">No Description</i>', '8.95'),
(260, 4, 32, 'Chicken Tikka', '<i style="color:#bdb9b9">No Description</i>', '6.50'),
(261, 4, 32, 'Lamb Tikka', '<i style="color:#bdb9b9">No Description</i>', '6.95'),
(262, 4, 32, 'Vegetable', '<i style="color:#bdb9b9">No Description</i>', '5.95'),
(263, 4, 32, 'Fish', '<i style="color:#bdb9b9">No Description</i>', '7.95'),
(264, 4, 33, 'Chicken', '<i style="color:#bdb9b9">No Description</i>', '6.25'),
(265, 4, 33, 'Lamb', '<i style="color:#bdb9b9">No Description</i>', '6.50'),
(266, 4, 33, 'Prawn', '<i style="color:#bdb9b9">No Description</i>', '5.95'),
(267, 4, 33, 'King Prawn', '<i style="color:#bdb9b9">No Description</i>', '8.95'),
(268, 4, 33, 'Chicken Tikka', '<i style="color:#bdb9b9">No Description</i>', '6.50'),
(269, 4, 33, 'Lamb Tikka', '<i style="color:#bdb9b9">No Description</i>', '6.95'),
(270, 4, 33, 'Vegetable', '<i style="color:#bdb9b9">No Description</i>', '5.95'),
(271, 4, 33, 'Fish', '<i style="color:#bdb9b9">No Description</i>', '7.95'),
(272, 4, 34, 'Chicken', '<i style="color:#bdb9b9">No Description</i>', '5.25'),
(273, 4, 34, 'Lamb', '<i style="color:#bdb9b9">No Description</i>', '5.50'),
(274, 4, 34, 'Prawn', '<i style="color:#bdb9b9">No Description</i>', '5.95'),
(275, 4, 34, 'King Prawn', '<i style="color:#bdb9b9">No Description</i>', '8.95'),
(276, 4, 34, 'Chicken Tikka', '<i style="color:#bdb9b9">No Description</i>', '6.50'),
(277, 4, 34, 'Lamb Tikka', '<i style="color:#bdb9b9">No Description</i>', '6.95'),
(278, 4, 34, 'Vegetable', '<i style="color:#bdb9b9">No Description</i>', '4.95'),
(279, 4, 34, 'Fish', '<i style="color:#bdb9b9">No Description</i>', '7.95'),
(280, 4, 35, 'Chicken', '<i style="color:#bdb9b9">No Description</i>', '5.25'),
(281, 4, 35, 'Lamb', '5.50', ''),
(282, 4, 35, 'Prawn', '<i style="color:#bdb9b9">No Description</i>', '5.95'),
(283, 4, 35, 'King Prawn', '<i style="color:#bdb9b9">No Description</i>', '8.95'),
(284, 4, 35, 'Chicken Tikka', '<i style="color:#bdb9b9">No Description</i>', '6.50'),
(285, 4, 35, 'Lamb Tikka', '<i style="color:#bdb9b9">No Description</i>', '6.95'),
(286, 4, 35, 'Vegetable', '<i style="color:#bdb9b9">No Description</i>', '4.95'),
(287, 4, 35, 'Fish', '<i style="color:#bdb9b9">No Description</i>', '7.95'),
(288, 4, 36, 'Chicken', '<i style="color:#bdb9b9">No Description</i>', '6.95'),
(289, 4, 36, 'Chicken Tikka', '<i style="color:#bdb9b9">No Description</i>', '6.95'),
(290, 4, 36, 'Lamb Tikka', '<i style="color:#bdb9b9">No Description</i>', '6.95'),
(291, 4, 36, 'Mixed', '<i style="color:#bdb9b9">No Description</i>', '7.95'),
(292, 4, 36, 'King Prawn TIkka', '<i style="color:#bdb9b9">No Description</i>', '9.95'),
(293, 4, 36, 'Chilli', '<i style="color:#bdb9b9">No Description</i>', '6.95'),
(294, 4, 36, 'Panir Tikka', '<i style="color:#bdb9b9">No Description</i>', '7.50'),
(295, 4, 36, 'Vegetable', '<i style="color:#bdb9b9">No Description</i>', '5.95'),
(296, 4, 36, 'Fish', '<i style="color:#bdb9b9">No Description</i>', '7.95'),
(297, 4, 37, 'Chicken', '<i style="color:#bdb9b9">No Description</i>', '6.25'),
(298, 4, 37, 'Lamb', '<i style="color:#bdb9b9">No Description</i>', '6.50'),
(299, 4, 37, 'Chicken Tikka', '<i style="color:#bdb9b9">No Description</i>', '6.95'),
(300, 4, 37, 'Lamb Tikka', '<i style="color:#bdb9b9">No Description</i>', '6.95'),
(301, 4, 37, 'King Prawn Tikka', '<i style="color:#bdb9b9">No Description</i>', '9.95'),
(302, 4, 37, 'Vegetable', '<i style="color:#bdb9b9">No Description</i>', '5.95'),
(303, 4, 38, 'Chicken', '<i style="color:#bdb9b9">No Description</i>', '6.25'),
(304, 4, 38, 'Lamb', '<i style="color:#bdb9b9">No Description</i>', '6.50'),
(305, 4, 38, 'Prawn', '<i style="color:#bdb9b9">No Description</i>', '6.50'),
(306, 4, 38, 'King Prawn', '<i style="color:#bdb9b9">No Description</i>', '8.95'),
(307, 4, 38, 'Chicken Tikka', '<i style="color:#bdb9b9">No Description</i>', '6.50'),
(308, 4, 38, 'Lamb Tikka', '<i style="color:#bdb9b9">No Description</i>', '6.95'),
(309, 4, 38, 'Vegetable', '<i style="color:#bdb9b9">No Description</i>', '5.95'),
(310, 4, 38, 'Fish', '<i style="color:#bdb9b9">No Description</i>', '7.95'),
(311, 4, 39, 'Chicken', '<i style="color:#bdb9b9">No Description</i>', '6.25'),
(312, 4, 39, 'Lamb', '<i style="color:#bdb9b9">No Description</i>', '6.50'),
(313, 4, 39, 'Prawn', '<i style="color:#bdb9b9">No Description</i>', '6.50'),
(314, 4, 39, 'King Prawn', '<i style="color:#bdb9b9">No Description</i>', '8.95'),
(315, 4, 39, 'Chicken Tikka', '<i style="color:#bdb9b9">No Description</i>', '6.95'),
(316, 4, 39, 'Lamb Tikka', '<i style="color:#bdb9b9">No Description</i>', '6.95'),
(317, 4, 39, 'Vegetable', '<i style="color:#bdb9b9">No Description</i>', '5.95'),
(318, 4, 39, 'Fish', '<i style="color:#bdb9b9">No Description</i>', '7.95'),
(319, 4, 40, 'Chicken', '<i style="color:#bdb9b9">No Description</i>', '6.25'),
(320, 4, 40, 'Lamb', '<i style="color:#bdb9b9">No Description</i>', '6.50'),
(321, 4, 40, 'Prawn', '<i style="color:#bdb9b9">No Description</i>', '6.95'),
(322, 4, 40, 'King Prawn', '<i style="color:#bdb9b9">No Description</i>', '8.95'),
(323, 4, 40, 'Chicken Tikka', '<i style="color:#bdb9b9">No Description</i>', '6.95'),
(324, 4, 40, 'Lamb Tikka', '<i style="color:#bdb9b9">No Description</i>', '6.95'),
(325, 4, 40, 'Vegetable', '<i style="color:#bdb9b9">No Description</i>', '5.95'),
(326, 4, 40, 'Fish', '<i style="color:#bdb9b9">No Description</i>', '7.95'),
(327, 4, 41, 'Chicken', '<i style="color:#bdb9b9">No Description</i>', '6.25'),
(328, 4, 41, 'Lamb', '<i style="color:#bdb9b9">No Description</i>', '6.50'),
(329, 4, 41, 'Prawn', '<i style="color:#bdb9b9">No Description</i>', '6.95'),
(330, 4, 41, 'King Prawn', '<i style="color:#bdb9b9">No Description</i>', '8.95'),
(331, 4, 41, 'Chicken Tikka', '<i style="color:#bdb9b9">No Description</i>', '6.95'),
(332, 4, 41, 'Lamb Tikka', '<i style="color:#bdb9b9">No Description</i>', '6.95'),
(333, 4, 41, 'Vegetable', '<i style="color:#bdb9b9">No Description</i>', '5.95'),
(334, 4, 41, 'Fish', '<i style="color:#bdb9b9">No Description</i>', '7.95');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL DEFAULT 'SubCategory',
  `description` text NOT NULL,
  `sort_order` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `category_id`, `name`, `description`, `sort_order`) VALUES
(1, 2, 'Murgh Chilli', 'Faily hot with green chillies, special spice and a touch of mosala sauce', 0),
(2, 2, 'Rezala', 'Medium with green chillies, green peppers and tomato', 0),
(3, 2, 'Special Jalfreyzi', '<i>No description</i>', 0),
(4, 2, 'Makhoni', 'Cooked with butter and fresh cream', 0),
(5, 2, 'Royal', '<i>No description</i>', 0),
(6, 2, 'Butter', '<i>No description</i>', 0),
(7, 2, 'Ginger', '<i>No description</i>', 0),
(8, 2, 'Peshuari', 'Sultana and Almonds', 0),
(9, 2, 'Special', '<i>No description</i>', 0),
(10, 2, 'Chat', 'Main', 0),
(11, 2, 'Special Rogan', 'Chef\'s special spice and a touch of mosala sauce', 0),
(12, 2, 'Shalimar', 'Medium topped with spicy mushrooms', 0),
(13, 2, 'Mowchack', 'Mild and creamy', 0),
(14, 2, 'Delight', 'Very mild', 0),
(15, 2, 'Garlic Zool', '<i>No description</i>', 0),
(16, 2, 'Butter Mosala', '<i>No description</i>', 0),
(17, 2, 'Bahar', 'Cooked in Aubergine. Fairly hot.', 0),
(18, 2, 'Bombay', 'Fairly hot.', 0),
(19, 2, 'Bhuna Mosala', '<i>No description</i>', 0),
(20, 2, 'Morisa', '<i>No description</i>', 0),
(21, 4, 'Kurma', 'Very mild and sweet with cocounut', 0),
(22, 4, 'Basic Curry', 'Medium strength in a thick sauce', 0),
(23, 4, 'Malaya', 'Medium strength with pineapple', 0),
(24, 4, 'Kashmir', 'Medium strength with banana', 0),
(25, 4, 'Pathia', 'Fairly hot, sweet and sour (condensed)', 0),
(26, 4, 'Dhansak', 'Fairly hot, sweet and sour (with lentils)', 0),
(27, 4, 'Du-piaza', 'Medium strength with extra onions', 0),
(29, 4, 'Ceylon', 'Fairly hot, sweet and sour (with coconut)', 0),
(30, 4, 'Bhuna', 'Medium strength, well garnished, a little dry', 0),
(31, 4, 'Rogan', 'Fairly hot, topped with tomato and green pepper', 0),
(32, 4, 'Sag', 'Medium strength with spinach', 0),
(33, 4, 'Salli', 'Medium Strength topped with fried potato', 0),
(34, 4, 'Madras', 'Faily hot, thick sauce', 0),
(35, 4, 'Vindaloo', 'Very hot, thick sauce and potatoes', 0),
(36, 4, 'Mosala', 'Cooked in a delicately flavoured rich cream', 0),
(37, 4, 'Pasanda', 'Mild, cooked in a creamy sauce', 0),
(38, 4, 'Korai', 'Medium, with onion, green peppers and tomatoes in a thick sauce', 0),
(39, 4, 'Jalfreyzi', 'Fairly hot with fresh green chilli, green peppers, onions and tomatoes', 0),
(40, 4, 'Achar', 'Slightly hot and sour with Chef\'s special recipe. Fairly dry', 0),
(41, 4, 'Garlic Chilli', 'Fairly hot, marinated in garlic sauce. Subtly flavoured with ginger, green chilli and capsicum.', 0),
(42, 2, 'Methi', 'Medium', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modifiers`
--
ALTER TABLE `modifiers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `modifiers`
--
ALTER TABLE `modifiers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=335;
--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

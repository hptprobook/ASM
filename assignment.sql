-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2023 at 11:19 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assignment`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `email`) VALUES
(1, 'admin', '123456aa', ''),
(2, 'host', '123!@#', '');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `name`) VALUES
(1, 'Item'),
(2, 'Tool');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `order_date` date DEFAULT NULL,
  `total_amount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `order_date`, `total_amount`) VALUES
(8, 16, '2023-07-27', 840),
(9, 22, '2023-07-30', 0),
(11, 25, '2023-08-01', 286);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `rate` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `product_code` varchar(25) DEFAULT NULL,
  `short_desc` varchar(255) DEFAULT NULL,
  `detail` varchar(2500) DEFAULT NULL,
  `cat_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `name`, `rate`, `price`, `image_url`, `product_code`, `short_desc`, `detail`, `cat_id`) VALUES
(1, 'Modern Hat', 4, 41, 'uploads/pr1.jpg', '#1', 'Lorsem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid consequatur vitae magni dicta nostrum officia voluptas dignissimos! Nobis quidem delectus omnis placeat, numquam laudantium molestias velit, corporis, consequuntur culpa ducimus.', '<p><span style=\"color:#c0392b\">SP1:</span></p>\r\n\r\n<p><em>Lorsem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid consequatur vitae magni dicta nostrum officia voluptas dignissimos! Nobis quidem delectus omnis placeat, numquam laudantium molestias velit, corporis, consequuntur culpa ducimus.</em></p>\r\n\r\n<p>Lorsem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid consequatur vitae magni dicta nostrum officia voluptas dignissimos! Nobis quidem delectus omnis placeat, numquam laudantium molestias velit, corporis, consequuntur culpa ducimus.</p>\r\n\r\n<div class=\"ddict_btn\" style=\"left:703.344px; top:45px\"><img src=\"chrome-extension://bpggmmljdiliancllaapiggllnkbjocb/logo/48.png\" /></div>\r\n', 1),
(2, 'Skis', 3, 760, 'uploads/pr2.jpg', '#2', 'Losrem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid consequatur vitae magni dicta nostrum officia voluptas dignissimos! Nobis quidem delectus omnis placeat, numquam laudantium molestias velit, corporis, consequuntur culpa ducimus.', '<p><span style=\"color:#e74c3c\">SP2:</span></p>\r\n\r\n<p>Losrem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid consequatur vitae magni dicta nostrum officia voluptas dignissimos! Nobis quidem delectus omnis placeat, numquam laudantium molestias velit, corporis, consequuntur culpa ducimus.Losrem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid consequatur vitae magni dicta nostrum officia voluptas dignissimos! Nobis quidem delectus omnis placeat, numquam laudantium molestias velit, corporis, consequuntur culpa ducimus.</p>\r\n\r\n<p>Losrem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid consequatur vitae magni dicta nostrum officia voluptas dignissimos! Nobis quidem delectus omnis placeat, numquam laudantium molestias velit, corporis, consequuntur culpa ducimus.Losrem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid consequatur vitae magni dicta nostrum officia voluptas dignissimos! Nobis quidem delectus omnis placeat, numquam laudantium molestias velit, corporis, consequuntur culpa ducimus.</p>\r\n', 2),
(3, 'Camera', 5, 840, 'uploads/pr3.jpg', '#3', 'Losrem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid consequatur vitae magni dicta nostrum officia voluptas dignissimos! Nobis quidem delectus omnis placeat, numquam laudantium molestias velit, corporis, consequuntur culpa ducimus.', '<p><span style=\"color:#e74c3c\">SP3:&nbsp;</span></p>\r\n\r\n<p>Losrem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid consequatur vitae magni dicta nostrum officia voluptas dignissimos! Nobis quidem delectus omnis placeat, numquam laudantium molestias velit, corporis, consequuntur culpa ducimus.Losrem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid consequatur vitae magni dicta nostrum officia voluptas dignissimos! Nobis quidem delectus omnis placeat, numquam laudantium molestias velit, corporis, consequuntur culpa ducimus.</p>\r\n\r\n<p>Losrem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid consequatur vitae magni dicta nostrum officia voluptas dignissimos! Nobis quidem delectus omnis placeat, numquam laudantium molestias velit, corporis, consequuntur culpa ducimus.</p>\r\n', 2),
(4, 'Backpack', 5, 190, 'uploads/pr4.jpg', '#4', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid consequatur vitae magni dicta nostrum officia voluptas dignissimos! Nobis quidem delectus omnis placeat, numquam laudantium molestias velit, corporis, consequuntur culpa ducimus.', '<p><span style=\"color:#e74c3c\">SP4:</span></p>\r\n\r\n<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid consequatur vitae magni dicta nostrum officia voluptas dignissimos! Nobis quidem delectus omnis placeat, numquam laudantium molestias velit, corporis, consequuntur culpa ducimus.Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid consequatur vitae magni dicta nostrum officia voluptas dignissimos! Nobis quidem delectus omnis placeat, numquam laudantium molestias velit, corporis, consequuntur culpa ducimus.</p>\r\n\r\n<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid consequatur vitae magni dicta nostrum officia voluptas dignissimos! Nobis quidem delectus omnis placeat, numquam laudantium molestias velit, corporis, consequuntur culpa ducimus.Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid consequatur vitae magni dicta nostrum officia voluptas dignissimos! Nobis quidem delectus omnis placeat, numquam laudantium molestias velit, corporis, consequuntur culpa ducimus.</p>\r\n', 1),
(5, 'Towel', 3, 50, 'uploads/pr5.jpg', '#5', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid consequatur vitae magni dicta nostrum officia voluptas dignissimos! Nobis quidem delectus omnis placeat, numquam laudantium molestias velit, corporis, consequuntur culpa ducimus.', '<p><span style=\"color:#e74c3c\">SP5:</span></p>\r\n\r\n<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid consequatur vitae magni dicta nostrum officia voluptas dignissimos! Nobis quidem delectus omnis placeat, numquam laudantium molestias velit, corporis, consequuntur culpa ducimus.Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid consequatur vitae magni dicta nostrum officia voluptas dignissimos! Nobis quidem delectus omnis placeat, numquam laudantium molestias velit, corporis, consequuntur culpa ducimus.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid consequatur vitae magni dicta nostrum officia voluptas dignissimos! Nobis quidem delectus omnis placeat, numquam laudantium molestias velit, corporis, consequuntur culpa ducimus.Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid consequatur vitae magni dicta nostrum officia voluptas dignissimos! Nobis quidem delectus omnis placeat, numquam laudantium molestias velit, corporis, consequuntur culpa ducimus.</p>\r\n\r\n<div class=\"ddict_div\" style=\"left:5px; max-width:150px; top:42px\"><img class=\"ddict_audio\" src=\"chrome-extension://bpggmmljdiliancllaapiggllnkbjocb/img/audio.png\" />\r\n<p>SP5:</p>\r\n\r\n<hr />\r\n<p>Did you mean SP5</p>\r\n</div>\r\n', 1),
(6, 'Compass', 5, 240, 'uploads/pr6.jpg', '#6', 'Lorsem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid consequatur vitae magni dicta nostrum officia voluptas dignissimos! Nobis quidem delectus omnis placeat, numquam laudantium molestias velit, corporis, consequuntur culpa ducimus.', '<p><span style=\"color:#e74c3c\">SP6:</span></p>\r\n\r\n<p>Lorsem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid consequatur vitae magni dicta nostrum officia voluptas dignissimos! Nobis quidem delectus omnis placeat, numquam laudantium molestias velit, corporis, consequuntur culpa ducimus.Lorsem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid consequatur vitae magni dicta nostrum officia voluptas dignissimos! Nobis quidem delectus omnis placeat, numquam laudantium molestias velit, corporis, consequuntur culpa ducimus.</p>\r\n\r\n<p>Lorsem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid consequatur vitae magni dicta nostrum officia voluptas dignissimos! Nobis quidem delectus omnis placeat, numquam laudantium molestias velit, corporis, consequuntur culpa ducimus.Lorsem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid consequatur vitae magni dicta nostrum officia voluptas dignissimos! Nobis quidem delectus omnis placeat, numquam laudantium molestias velit, corporis, consequuntur culpa ducimus.</p>\r\n\r\n<div class=\"ddict_div\" style=\"left:5px; max-width:150px; top:42px\"><img class=\"ddict_audio\" src=\"chrome-extension://bpggmmljdiliancllaapiggllnkbjocb/img/audio.png\" />\r\n<p class=\"ddict_sentence\">SP6:</p>\r\n</div>\r\n', 2),
(7, 'Thermos', 4, 100, 'uploads/7.jpg', '#7', 'Lsorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid consequatur vitae magni dicta nostrum officia voluptas dignissimos! Nobis quidem delectus omnis placeat, numquam laudantium molestias velit, corporis, consequuntur culpa ducimus.', '<p><span style=\"color:#e74c3c\">SP7:</span></p>\r\n\r\n<p>Lsorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid consequatur vitae magni dicta nostrum officia voluptas dignissimos! Nobis quidem delectus omnis placeat, numquam laudantium molestias velit, corporis, consequuntur culpa ducimus.Lsorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid consequatur vitae magni dicta nostrum officia voluptas dignissimos! Nobis quidem delectus omnis placeat, numquam laudantium molestias velit, corporis, consequuntur culpa ducimus.</p>\r\n\r\n<p>Lsorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid consequatur vitae magni dicta nostrum officia voluptas dignissimos! Nobis quidem delectus omnis placeat, numquam laudantium molestias velit, corporis, consequuntur culpa ducimus.</p>\r\n', 2),
(8, 'Sunglasses', 4, 120, 'uploads/8.jpg', '#8', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid consequatur vitae magni dicta nostrum officia voluptas dignissimos! Nobis quidem delectus omnis placeat, numquam laudantium molestias velit, corporis, consequuntur culpa ducimus.', '<p><span style=\"color:#e74c3c\">SP8:</span></p>\r\n\r\n<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid consequatur vitae magni dicta nostrum officia voluptas dignissimos! Nobis quidem delectus omnis placeat, numquam laudantium molestias velit, corporis, consequuntur culpa ducimus.Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid consequatur vitae magni dicta nostrum officia voluptas dignissimos! Nobis quidem delectus omnis placeat, numquam laudantium molestias velit, corporis, consequuntur culpa ducimus.</p>\r\n\r\n<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid consequatur vitae magni dicta nostrum officia voluptas dignissimos! Nobis quidem delectus omnis placeat, numquam laudantium molestias velit, corporis, consequuntur culpa ducimus.</p>\r\n\r\n<div class=\"ddict_div\" style=\"left:5px; max-width:150px; top:42px\"><img class=\"ddict_audio\" src=\"chrome-extension://bpggmmljdiliancllaapiggllnkbjocb/img/audio.png\" />\r\n<p class=\"ddict_sentence\">SP8:</p>\r\n</div>\r\n', 1),
(9, 'Summer Hat', 3, 96, 'uploads/9.jpg', '#9', 'Lorsem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid consequatur vitae magni dicta nostrum officia voluptas dignissimos! Nobis quidem delectus omnis placeat, numquam laudantium molestias velit, corporis, consequuntur culpa ducimus.', '<p><span style=\"color:#e74c3c\">SP9:</span></p>\r\n\r\n<p>Lorsem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid consequatur vitae magni dicta nostrum officia voluptas dignissimos! Nobis quidem delectus omnis placeat, numquam laudantium molestias velit, corporis, consequuntur culpa ducimus.Lorsem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid consequatur vitae magni dicta nostrum officia voluptas dignissimos! Nobis quidem delectus omnis placeat, numquam laudantium molestias velit, corporis, consequuntur culpa ducimus.</p>\r\n\r\n<p>Lorsem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid consequatur vitae magni dicta nostrum officia voluptas dignissimos! Nobis quidem delectus omnis placeat, numquam laudantium molestias velit, corporis, consequuntur culpa ducimus.Lorsem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid consequatur vitae magni dicta nostrum officia voluptas dignissimos! Nobis quidem delectus omnis placeat, numquam laudantium molestias velit, corporis, consequuntur culpa ducimus.Lorsem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid consequatur vitae magni dicta nostrum officia voluptas dignissimos! Nobis quidem delectus omnis placeat, numquam laudantium molestias velit, corporis, consequuntur culpa ducimus.</p>\r\n', 1),
(10, 'Star', 5, 109, 'uploads/10.jpg', '#10', 'Losrem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid consequatur vitae magni dicta nostrum officia voluptas dignissimos! Nobis quidem delectus omnis placeat, numquam laudantium molestias velit, corporis, consequuntur culpa ducimus.', '<p><span style=\"color:#e74c3c\">Sp10:&nbsp;</span></p>\r\n\r\n<p>Losrem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid consequatur vitae magni dicta nostrum officia voluptas dignissimos! Nobis quidem delectus omnis placeat, numquam laudantium molestias velit, corporis, consequuntur culpa ducimus.Losrem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid consequatur vitae magni dicta nostrum officia voluptas dignissimos! Nobis quidem delectus omnis placeat, numquam laudantium molestias velit, corporis, consequuntur culpa ducimus.</p>\r\n\r\n<p>Losrem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid consequatur vitae magni dicta nostrum officia voluptas dignissimos! Nobis quidem delectus omnis placeat, numquam laudantium molestias velit, corporis, consequuntur culpa ducimus.Losrem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid consequatur vitae magni dicta nostrum officia voluptas dignissimos! Nobis quidem delectus omnis placeat, numquam laudantium molestias velit, corporis, consequuntur culpa ducimus.Losrem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid consequatur vitae magni dicta nostrum officia voluptas dignissimos! Nobis quidem delectus omnis placeat, numquam laudantium molestias velit, corporis, consequuntur culpa ducimus.Losrem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid consequatur vitae magni dicta nostrum officia voluptas dignissimos! Nobis quidem delectus omnis placeat, numquam laudantium molestias velit, corporis, consequuntur culpa ducimus.</p>\r\n\r\n<div class=\"ddict_btn\" style=\"left:57.5938px; top:35px\"><img src=\"chrome-extension://bpggmmljdiliancllaapiggllnkbjocb/logo/48.png\" /></div>\r\n', 1),
(11, 'Flip-flops', 4, 40, 'uploads/11.jpg', '#11', 'Lsorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid consequatur vitae magni dicta nostrum officia voluptas dignissimos! Nobis quidem delectus omnis placeat, numquam laudantium molestias velit, corporis, consequuntur culpa ducimus.', '<p><span style=\"color:#e74c3c\">SP11:&nbsp;</span></p>\r\n\r\n<p>Lsorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid consequatur vitae magni dicta nostrum officia voluptas dignissimos! Nobis quidem delectus omnis placeat, numquam laudantium molestias velit, corporis, consequuntur culpa ducimus.Lsorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid consequatur vitae magni dicta nostrum officia voluptas dignissimos! Nobis quidem delectus omnis placeat, numquam laudantium molestias velit, corporis, consequuntur culpa ducimus.</p>\r\n\r\n<p>Lsorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid consequatur vitae magni dicta nostrum officia voluptas dignissimos! Nobis quidem delectus omnis placeat, numquam laudantium molestias velit, corporis, consequuntur culpa ducimus.Lsorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid consequatur vitae magni dicta nostrum officia voluptas dignissimos! Nobis quidem delectus omnis placeat, numquam laudantium molestias velit, corporis, consequuntur culpa ducimus.</p>\r\n\r\n<div class=\"ddict_btn\" style=\"left:58.0625px; top:29px\"><img src=\"chrome-extension://bpggmmljdiliancllaapiggllnkbjocb/logo/48.png\" /></div>\r\n', 1),
(12, 'Rope', 5, 70, 'uploads/12.jpg', '#12', 'Losrem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid consequatur vitae magni dicta nostrum officia voluptas dignissimos! Nobis quidem delectus omnis placeat, numquam laudantium molestias velit, corporis, consequuntur culpa ducimus.', '<p><span style=\"color:#e74c3c\">SP12:&nbsp;</span></p>\r\n\r\n<p>Losrem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid consequatur vitae magni dicta nostrum officia voluptas dignissimos! Nobis quidem delectus omnis placeat, numquam laudantium molestias velit, corporis, consequuntur culpa ducimus.Losrem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid consequatur vitae magni dicta nostrum officia voluptas dignissimos! Nobis quidem delectus omnis placeat, numquam laudantium molestias velit, corporis, consequuntur culpa ducimus.</p>\r\n\r\n<p>Losrem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid consequatur vitae magni dicta nostrum officia voluptas dignissimos! Nobis quidem delectus omnis placeat, numquam laudantium molestias velit, corporis, consequuntur culpa ducimus.</p>\r\n', 2),
(13, 'Lamp', 4, 360, 'uploads/13.jpg', '#13', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid consequatur vitae magni dicta nostrum officia voluptas dignissimos! Nobis quidem delectus omnis placeat, numquam laudantium molestias velit, corporis, consequuntur culpa ducimus.', '<p><span style=\"color:#e74c3c\">SP13:&nbsp;</span></p>\r\n\r\n<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid consequatur vitae magni dicta nostrum officia voluptas dignissimos! Nobis quidem delectus omnis placeat, numquam laudantium molestias velit, corporis, consequuntur culpa ducimus.Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid consequatur vitae magni dicta nostrum officia voluptas dignissimos! Nobis quidem delectus omnis placeat, numquam laudantium molestias velit, corporis, consequuntur culpa ducimus.</p>\r\n\r\n<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid consequatur vitae magni dicta nostrum officia voluptas dignissimos! Nobis quidem delectus omnis placeat, numquam laudantium molestias velit, corporis, consequuntur culpa ducimus.Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid consequatur vitae magni dicta nostrum officia voluptas dignissimos! Nobis quidem delectus omnis placeat, numquam laudantium molestias velit, corporis, consequuntur culpa ducimus.</p>\r\n\r\n<div class=\"ddict_div\" style=\"left:5px; max-width:150px; top:42px\"><img class=\"ddict_audio\" src=\"chrome-extension://bpggmmljdiliancllaapiggllnkbjocb/img/audio.png\" />\r\n<p class=\"ddict_sentence\">SP13:</p>\r\n</div>\r\n', 2),
(14, 'Lamp', 4, 360, 'uploads/13.jpg', '#14', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid consequatur vitae magni dicta nostrum officia voluptas dignissimos! Nobis quidem delectus omnis placeat, numquam laudantium molestias velit, corporis, consequuntur culpa ducimus.', '<p><span style=\"color:#e74c3c\">SP13:&nbsp;</span></p>\r\n\r\n<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid consequatur vitae magni dicta nostrum officia voluptas dignissimos! Nobis quidem delectus omnis placeat, numquam laudantium molestias velit, corporis, consequuntur culpa ducimus.Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid consequatur vitae magni dicta nostrum officia voluptas dignissimos! Nobis quidem delectus omnis placeat, numquam laudantium molestias velit, corporis, consequuntur culpa ducimus.</p>\r\n\r\n<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid consequatur vitae magni dicta nostrum officia voluptas dignissimos! Nobis quidem delectus omnis placeat, numquam laudantium molestias velit, corporis, consequuntur culpa ducimus.Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid consequatur vitae magni dicta nostrum officia voluptas dignissimos! Nobis quidem delectus omnis placeat, numquam laudantium molestias velit, corporis, consequuntur culpa ducimus.</p>\r\n\r\n<div class=\"ddict_div\" style=\"left:5px; max-width:150px; top:42px\"><img class=\"ddict_audio\" src=\"chrome-extension://bpggmmljdiliancllaapiggllnkbjocb/img/audio.png\" />\r\n<p class=\"ddict_sentence\">SP13:</p>\r\n</div>\r\n', 2),
(31, 'Lamp', 4, 360, 'uploads/13.jpg', '#14', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid consequatur vitae magni dicta nostrum officia voluptas dignissimos! Nobis quidem delectus omnis placeat, numquam laudantium molestias velit, corporis, consequuntur culpa ducimus.', '<p><span style=\"color:#e74c3c\">SP13:&nbsp;</span></p>\r\n\r\n<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid consequatur vitae magni dicta nostrum officia voluptas dignissimos! Nobis quidem delectus omnis placeat, numquam laudantium molestias velit, corporis, consequuntur culpa ducimus.Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid consequatur vitae magni dicta nostrum officia voluptas dignissimos! Nobis quidem delectus omnis placeat, numquam laudantium molestias velit, corporis, consequuntur culpa ducimus.</p>\r\n\r\n<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid consequatur vitae magni dicta nostrum officia voluptas dignissimos! Nobis quidem delectus omnis placeat, numquam laudantium molestias velit, corporis, consequuntur culpa ducimus.Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid consequatur vitae magni dicta nostrum officia voluptas dignissimos! Nobis quidem delectus omnis placeat, numquam laudantium molestias velit, corporis, consequuntur culpa ducimus.</p>\r\n\r\n<div class=\"ddict_div\" style=\"left:5px; max-width:150px; top:42px\"><img class=\"ddict_audio\" src=\"chrome-extension://bpggmmljdiliancllaapiggllnkbjocb/img/audio.png\" />\r\n<p class=\"ddict_sentence\">SP13:</p>\r\n</div>\r\n', 2),
(32, 'Lamp', 4, 360, 'uploads/13.jpg', '#14', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid consequatur vitae magni dicta nostrum officia voluptas dignissimos! Nobis quidem delectus omnis placeat, numquam laudantium molestias velit, corporis, consequuntur culpa ducimus.', '<p><span style=\"color:#e74c3c\">SP13:&nbsp;</span></p>\r\n\r\n<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid consequatur vitae magni dicta nostrum officia voluptas dignissimos! Nobis quidem delectus omnis placeat, numquam laudantium molestias velit, corporis, consequuntur culpa ducimus.Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid consequatur vitae magni dicta nostrum officia voluptas dignissimos! Nobis quidem delectus omnis placeat, numquam laudantium molestias velit, corporis, consequuntur culpa ducimus.</p>\r\n\r\n<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid consequatur vitae magni dicta nostrum officia voluptas dignissimos! Nobis quidem delectus omnis placeat, numquam laudantium molestias velit, corporis, consequuntur culpa ducimus.Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid consequatur vitae magni dicta nostrum officia voluptas dignissimos! Nobis quidem delectus omnis placeat, numquam laudantium molestias velit, corporis, consequuntur culpa ducimus.</p>\r\n\r\n<div class=\"ddict_div\" style=\"left:5px; max-width:150px; top:42px\"><img class=\"ddict_audio\" src=\"chrome-extension://bpggmmljdiliancllaapiggllnkbjocb/img/audio.png\" />\r\n<p class=\"ddict_sentence\">SP13:</p>\r\n</div>\r\n', 2),
(33, 'Lamp', 4, 360, 'uploads/13.jpg', '#14', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid consequatur vitae magni dicta nostrum officia voluptas dignissimos! Nobis quidem delectus omnis placeat, numquam laudantium molestias velit, corporis, consequuntur culpa ducimus.', '<p><span style=\"color:#e74c3c\">SP13:&nbsp;</span></p>\r\n\r\n<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid consequatur vitae magni dicta nostrum officia voluptas dignissimos! Nobis quidem delectus omnis placeat, numquam laudantium molestias velit, corporis, consequuntur culpa ducimus.Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid consequatur vitae magni dicta nostrum officia voluptas dignissimos! Nobis quidem delectus omnis placeat, numquam laudantium molestias velit, corporis, consequuntur culpa ducimus.</p>\r\n\r\n<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid consequatur vitae magni dicta nostrum officia voluptas dignissimos! Nobis quidem delectus omnis placeat, numquam laudantium molestias velit, corporis, consequuntur culpa ducimus.Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid consequatur vitae magni dicta nostrum officia voluptas dignissimos! Nobis quidem delectus omnis placeat, numquam laudantium molestias velit, corporis, consequuntur culpa ducimus.</p>\r\n\r\n<div class=\"ddict_div\" style=\"left:5px; max-width:150px; top:42px\"><img class=\"ddict_audio\" src=\"chrome-extension://bpggmmljdiliancllaapiggllnkbjocb/img/audio.png\" />\r\n<p class=\"ddict_sentence\">SP13:</p>\r\n</div>\r\n', 2),
(39, 'Modern Hat', 4, 41, 'uploads/7-Copy.jpg', 'ios#1', 'Losrem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid consequatur vitae magni dicta nostrum officia voluptas dignissimos! Nobis quidem delectus omnis placeat, numquam laudantium molestias velit, corporis, consequuntur culpa ducimus.', '&lt;p&gt;Losrem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid consequatur vitae magni dicta nostrum officia voluptas dignissimos! Nobis quidem delectus omnis placeat, numquam laudantium molestias velit, corporis, consequuntur culpa ducimus.&lt;/p&gt;\r\n\r\n&lt;div class=&quot;ddict_btn&quot; style=&quot;left:175.344px; top:25px&quot;&gt;&lt;img src=&quot;chrome-extension://bpggmmljdiliancllaapiggllnkbjocb/logo/48.png&quot; /&gt;&lt;/div&gt;\r\n', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(300) DEFAULT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `address`, `phone`, `name`) VALUES
(16, 'hoaphan14th22', '$2y$10$jU/4qVSJxCLri6w7qLYdG.AKFniuFf8KHcftQHnyO8bVUq2OXdjZy', 'hoaphan14tsadh@gmail.com', '45 Nguyễn Viết Xuân', '0332741249', 'Phan Thanh Hoá'),
(22, 'hoaphan14th', '$2y$10$3cVTq2EUKpdyg18OoXrphuYIthReysQ19EWyb1lZoomUyJ1tqmnly', 'Hoa140420@gmail.com', NULL, NULL, NULL),
(24, 'admin', '$2y$10$Jv6ii8JL4mqZgEU81WTEFudWBwNiHYJxOhU6AHOFFFPvDScS4eAeq', 'hptprobsooks@gmail.com', NULL, NULL, NULL),
(25, 'hoaphan14thss', '$2y$10$5U3x5XqDwkSlX9sYjjrBMut3PsqWnZQK1obaJeYnwbGEx8vtgcGQK', 'hptprobook@gmail.com', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_cart`
--

CREATE TABLE `user_cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `subtotal` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_cart`
--

INSERT INTO `user_cart` (`id`, `user_id`, `product_id`, `subtotal`, `quantity`) VALUES
(101, 16, 3, 840, 1),
(113, 25, 9, 96, 1),
(114, 25, 4, 190, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_cart_comp`
--

CREATE TABLE `user_cart_comp` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `subtotal` int(11) DEFAULT NULL,
  `ship_name` varchar(255) DEFAULT NULL,
  `ship_address` varchar(1000) DEFAULT NULL,
  `ship_phone` varchar(10) DEFAULT NULL,
  `ship_email` varchar(255) DEFAULT NULL,
  `ship_date` date DEFAULT NULL,
  `note` varchar(2500) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `fk_cat_id` (`cat_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_cart`
--
ALTER TABLE `user_cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `user_cart_comp`
--
ALTER TABLE `user_cart_comp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid_fk` (`user_id`),
  ADD KEY `productid_fk` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `user_cart`
--
ALTER TABLE `user_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `user_cart_comp`
--
ALTER TABLE `user_cart_comp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_cat_id` FOREIGN KEY (`cat_id`) REFERENCES `category` (`cat_id`);

--
-- Constraints for table `user_cart`
--
ALTER TABLE `user_cart`
  ADD CONSTRAINT `user_cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `user_cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `user_cart_comp`
--
ALTER TABLE `user_cart_comp`
  ADD CONSTRAINT `productid_fk` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`),
  ADD CONSTRAINT `userid_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

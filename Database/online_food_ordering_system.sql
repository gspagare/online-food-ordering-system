-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2020 at 02:53 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_food_ordering_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `username` varchar(30) NOT NULL,
  `address` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`username`, `address`) VALUES
('user_1', 'IIT Kharagpur'),
('user_1', 'IIT Kharagpur, Kharagpur'),
('user_1', 'IIT Kharagpur, Kharagpur, West'),
('user_1', 'MMM Hall, IIT Kharagpur'),
('user_2', 'IIT Kharagpur'),
('user_3', 'IIT Kharagpur'),
('user_4', 'IIT Kharagpur'),
('user_5', 'IIT Kharagpur'),
('user_6', 'IIT Kharagpur'),
('user_7', 'IIT Kharagpur'),
('user_8', 'IIT Kharagpur'),
('user_test', 'LBS Hall, IIT Kharagpur'),
('user_test', 'MMM Hall, IIT Kharagpur');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 'abhishek');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `username` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `contact_no` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`username`, `name`, `email`, `password`, `contact_no`) VALUES
('user_1', 'user_1', 'user_1@abc.com', 'abhishek', '1234567890'),
('user_2', 'user_2', 'user_2@abc.com', 'abhishek', '1234567890'),
('user_3', 'user_3', 'user_3@abc.com', 'abhishek', '1234567890'),
('user_4', 'user_4', 'user_4@abc.com', 'abhishek', '1234567890'),
('user_5', 'user_5', 'user_5@abc.com', 'abhishek', '1234567890'),
('user_6', 'user_6', 'user_6@abc.com', 'abhishek', '1234567890'),
('user_7', 'user_7', 'user_7@abc.com', 'abhishek', '1234567890'),
('user_8', 'user_8', 'user_8@abc.com', 'abhishek', '1234567890'),
('user_test', 'user_test', 'user_test@gmail.com', 'abhishek', '9932977700');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `username` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `address` varchar(100) NOT NULL,
  `password` varchar(30) NOT NULL,
  `contact_no` varchar(30) NOT NULL,
  `R_ID` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`username`, `name`, `email`, `address`, `password`, `contact_no`, `R_ID`) VALUES
('manager_1', 'manager_1', 'manager_1@abc.com', 'IIT Kharagpur', 'abhishek', '1234567890', 2),
('manager_2', 'manager_2', 'manager_2@abc.com', 'IIT Kharagpur', 'abhishek', '1234567890', 3),
('manager_3', 'manager_3', 'manager_3@abc.com', 'IIT Kharagpur', 'abhishek', '1234567890', 16),
('manager_test', 'manager_test', 'manager_test@gmail.com', 'IIT Kharagpur', 'abhishek', '9987345612', 2);

-- --------------------------------------------------------

--
-- Table structure for table `menu_item`
--

CREATE TABLE `menu_item` (
  `item_ID` int(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `price` int(30) NOT NULL,
  `description` varchar(30) NOT NULL,
  `R_ID` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu_item`
--

INSERT INTO `menu_item` (`item_ID`, `name`, `price`, `description`, `R_ID`) VALUES
(1, 'Paneer Butter Masala ', 150, 'description', 2),
(2, 'Kadhai Paneer ', 125, 'description', 2),
(3, 'Butter Chicken', 132, 'description', 2),
(4, 'Malai Kofta ', 185, 'description', 2),
(11, 'Tandoori Roti', 20, 'description', 2),
(12, 'Chole Bhature', 120, 'description', 3),
(13, 'Kadai Chicken', 180, 'Spicy', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_ID` int(30) NOT NULL,
  `total_price` varchar(30) NOT NULL,
  `order_date` date NOT NULL,
  `order_status` varchar(30) NOT NULL,
  `delivery_address` varchar(70) NOT NULL,
  `username` varchar(30) NOT NULL,
  `R_ID` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_ID`, `total_price`, `order_date`, `order_status`, `delivery_address`, `username`, `R_ID`) VALUES
(1, '150', '2020-03-23', 'DELIVERED', 'IIT Kharagpur', 'user_1', 2),
(2, '400', '2020-03-23', 'DELIVERED', 'IIT Kharagpur', 'user_1', 2),
(3, '230', '2020-03-25', 'DELIVERED', 'IIT Kharagpur', 'user_1', 2),
(4, '120', '2020-03-25', 'DELIVERED', 'IIT Kharagpur', 'user_1', 3),
(5, '450', '2020-03-25', 'DELIVERED', 'IIT Kharagpur', 'user_1', 2),
(8, '400', '2020-03-26', 'DELIVERED', 'IIT Kharagpur', 'user_1', 2),
(9, '380', '2020-03-28', 'DELIVERED', 'IIT Kharagpur', 'user_8', 2),
(10, '150', '2020-03-28', 'DELIVERED', 'IIT Kharagpur, Kharagpur', 'user_1', 2),
(11, '185', '2020-03-28', 'DELIVERED', 'MMM Hall, IIT Kharagpur', 'user_test', 2),
(12, '427', '2020-03-31', 'PLACED', 'IIT Kharagpur, Kharagpur', 'user_1', 2),
(13, '257', '2020-03-31', 'PLACED', 'IIT Kharagpur, Kharagpur', 'user_1', 2),
(14, '660', '2020-03-31', 'PLACED', 'asdadasdadadadadsadddddddddddadassssssssssssssssssssssssssssssssssssss', 'user_1', 2),
(15, '1180', '2020-03-31', 'PLACED', 'ROOM NO 218,SDS BLOCK,MMM HALL,IIT KHARAGPUR', 'user_1', 2),
(16, '272', '2020-03-31', 'PLACED', 'MMM Hall, IIT Kharagpur', 'user_1', 2);

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `order_ID` int(30) NOT NULL,
  `item_ID` int(30) NOT NULL,
  `quantity` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`order_ID`, `item_ID`, `quantity`) VALUES
(1, 1, 1),
(2, 1, 1),
(2, 2, 2),
(3, 1, 1),
(3, 11, 4),
(4, 12, 1),
(5, 4, 2),
(5, 11, 4),
(8, 1, 2),
(8, 11, 5),
(9, 1, 2),
(9, 11, 4),
(10, 1, 1),
(11, 2, 1),
(11, 11, 3),
(12, 1, 1),
(12, 2, 1),
(12, 3, 1),
(12, 11, 1),
(13, 2, 1),
(13, 3, 1),
(14, 1, 1),
(14, 2, 1),
(14, 4, 1),
(14, 11, 1),
(14, 13, 1),
(15, 2, 5),
(15, 4, 3),
(16, 3, 1),
(16, 11, 7);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_ID` int(30) NOT NULL,
  `amount` int(30) NOT NULL,
  `payment_date` date NOT NULL,
  `order_ID` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_ID`, `amount`, `payment_date`, `order_ID`) VALUES
(1, 400, '2020-03-23', 2),
(2, 120, '2020-03-25', 4),
(4, 380, '2020-03-28', 9),
(5, 185, '2020-03-28', 11),
(6, 272, '2020-03-31', 16);

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `R_ID` int(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `location` varchar(30) NOT NULL,
  `phone_number` varchar(30) NOT NULL,
  `rating` float(2,1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`R_ID`, `name`, `location`, `phone_number`, `rating`) VALUES
(2, 'Smart Pind', 'IIT Khargpur', '1234567890', 3.5),
(3, 'Peep Kitchen', 'IIT Khargpur', '1234567890', 3.0),
(16, 'Heritage', 'IIT Khargpur', '09932977700', 3.0),
(18, 'Dakshin', 'IIT Kharagpur', '9912345612', 3.0);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `review_ID` int(30) NOT NULL,
  `rating` int(30) NOT NULL,
  `description` varchar(100) NOT NULL,
  `order_ID` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`review_ID`, `rating`, `description`, `order_ID`) VALUES
(1, 5, 'description', 2),
(2, 5, 'Like it ', 4),
(3, 1, 'ok', 5),
(4, 1, 'bad', 1),
(5, 5, 'fixed rating', 1),
(7, 5, 'Loved it', 9),
(8, 5, 'Liked It', 8),
(9, 1, 'oh Yeah', 2),
(10, 5, 'Loved the Service', 11);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`username`,`address`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`username`),
  ADD KEY `manager_ibfk_1` (`R_ID`);

--
-- Indexes for table `menu_item`
--
ALTER TABLE `menu_item`
  ADD PRIMARY KEY (`item_ID`),
  ADD KEY `menu_item_ibfk_1` (`R_ID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_ID`),
  ADD KEY `username` (`username`),
  ADD KEY `R_ID` (`R_ID`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`order_ID`,`item_ID`),
  ADD KEY `item_ID` (`item_ID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_ID`),
  ADD KEY `order_ID` (`order_ID`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`R_ID`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`review_ID`),
  ADD KEY `order_ID` (`order_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu_item`
--
ALTER TABLE `menu_item`
  MODIFY `item_ID` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_ID` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_ID` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `R_ID` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `review_ID` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `address_ibfk_1` FOREIGN KEY (`username`) REFERENCES `customer` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `manager`
--
ALTER TABLE `manager`
  ADD CONSTRAINT `manager_ibfk_1` FOREIGN KEY (`R_ID`) REFERENCES `restaurant` (`R_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `menu_item`
--
ALTER TABLE `menu_item`
  ADD CONSTRAINT `menu_item_ibfk_1` FOREIGN KEY (`R_ID`) REFERENCES `restaurant` (`R_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`username`) REFERENCES `customer` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`R_ID`) REFERENCES `restaurant` (`R_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_item`
--
ALTER TABLE `order_item`
  ADD CONSTRAINT `order_item_ibfk_1` FOREIGN KEY (`order_ID`) REFERENCES `orders` (`order_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_item_ibfk_2` FOREIGN KEY (`item_ID`) REFERENCES `menu_item` (`item_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`order_ID`) REFERENCES `orders` (`order_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`order_ID`) REFERENCES `orders` (`order_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

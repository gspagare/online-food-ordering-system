-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2022 at 01:13 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
('anu', 'Aloknagri, Pune'),
('anurag', 'anurag'),
('atharvakharat', 'Sunita Nagar, Pune'),
('sakshid', 'Shaniwarwada, Pune'),
('siddheshpatil', 'Pune');

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
('gaurav', 'pagare'),
('sakshi', 'sakshi'),
('sam', 'sam'),
('vivek', 'vikky');

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
('anu', 'Anushka Sandbhor', 'anushkasandbhor@gmail.com', 'panda', '7896456969'),
('anurag', 'Anurag', 'anurag@gmail.com', 'anurag', 'anurag'),
('atharvakharat', 'Atharva Kharat', 'atharvakharat@gmail.com', 'atharva', '7984546521'),
('darshantholiya', 'Darshan', 'darshantholiya036@gmail.com', 'darshan', '5489822636'),
('sakshid', 'Sakshi Divate', 'sakshibabalu@gmail.com', 'babalu', '1692696969'),
('siddheshpatil', 'Siddhesh Vivek Patil', 'siddheshpatil@gmail.com', 'reyna', '8785844525');

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
('aniket', 'aniket', 'aniketiwiri@hotmale.com', 'pune', 'aniket', '9999999999', 3),
('bibek', 'bibek basu', 'vivekpatil@hotmail.com', 'Pune', 'bibek', '000000000', 2),
('goro ', 'goro', 'gauravpagare@gmail.com', 'pune', 'goro', '0000000000', 1),
('palekar', 's palekar', 'sakshipalekar@junglee.com', 'Pune', 'palekar', '9999666666', 4),
('sam', 'samruddhi', 'samnavale@junglee.com', 'Pune', 'sam', '9669696969', 5),
('sonkya', 'chunkey pandey', 'sonkya@gym.com', 'Pune', 'sonkya', '9788675674653', 6);

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
(16, 'Farmhouse', 400, 'Pizza made in farm', 4),
(17, 'Italian Pizza', 300, 'Overloaded with crunchy onions', 4),
(18, 'Frozen Non-veg Pizza', 450, 'A frozen pizza, which is one n', 4),
(19, 'Chicken Dum Biryani', 320, 'a spiced mix of meat and rice,', 5),
(20, 'Butter Chicken', 450, 'A Chicken with Amul Butter, As', 5),
(21, 'Makke di Roti, Sarso da Saag', 300, 'Flavourful Roti made of Corn F', 5),
(22, 'Blue Ocean', 150, 'Chilling drink', 3),
(23, 'meat steak', 800, 'Spicy and juicy', 3),
(24, 'continental combo', 650, 'continental spices and flavour', 3),
(25, 'Masala Dosa', 120, 'Delicious masala dosa', 2),
(26, 'Idli', 200, 'When one thinks of south-India', 2),
(27, 'Uttappams', 500, 'Is it a pancake? Is it a pizza', 2),
(28, 'Veg Cheese Burger', 200, 'The veg patty mixture is stuff', 1),
(29, 'French Fries', 169, 'Ek bar mangaya to pet bhar kha', 1),
(30, 'Choco Lava Cake', 100, 'Taste like choco lava cake.', 1),
(31, 'Cold Coffee', 125, 'Not hot like your girlfriend, ', 6),
(32, 'Paneer Cheese Sandwich', 90, 'Aisa sandwich jis main paneer ', 6),
(33, 'Non veg noodles', 180, 'Curly and  long noodles, just ', 6);

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
(21, '1400', '2022-11-09', 'DELIVERED', 'Aissms Coe Pune', 'atharvakharat', 4),
(22, '1860', '2022-11-10', 'DELIVERED', 'Sadashiv Peth, Pune', 'atharvakharat', 5),
(23, '305', '2022-11-10', 'DELIVERED', 'Aloknagri, Pune', 'anu ', 6);

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
(21, 16, 2),
(21, 17, 2),
(22, 19, 3),
(22, 20, 2),
(23, 31, 1),
(23, 33, 1);

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
(6, 272, '2020-03-31', 16),
(7, 5000, '2022-11-07', 19),
(8, 1400, '2022-11-09', 21),
(9, 1860, '2022-11-10', 22);

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
(1, 'Crazy Cheesy', 'FC road', '999888222', 4.5),
(2, 'Vaishali', 'JM road', '999333222', 5.0),
(3, 'Social', 'Sinhgad road', '7777777', 4.2),
(4, 'Dominos', 'Vimaan Nagar', '44445555', 4.0),
(5, 'Baba ka Dhabha', 'shivaji nagar', '123456789', 4.5),
(6, 'Durga Cafe', 'AISSMS Cafe', '989876543', 2.9);

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
(9, 1, 'oh Yeah', 2),
(10, 5, 'Loved the Service', 11),
(11, 4, 'The food was hot n spicy.', 21);

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
  MODIFY `item_ID` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_ID` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_ID` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `R_ID` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `review_ID` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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

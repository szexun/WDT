-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 14, 2022 at 08:16 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `saltics`
--

-- --------------------------------------------------------

--
-- Table structure for table `comboset`
--

CREATE TABLE `comboset` (
  `combosetID` int(11) NOT NULL,
  `item1` varchar(255) NOT NULL,
  `item2` varchar(255) NOT NULL,
  `item3` varchar(255) NOT NULL,
  `combo_price` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `seller_contact` varchar(12) NOT NULL,
  `picture1` varchar(1000) NOT NULL,
  `picture2` varchar(1000) NOT NULL,
  `picture3` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comboset`
--

INSERT INTO `comboset` (`combosetID`, `item1`, `item2`, `item3`, `combo_price`, `user_id`, `seller_contact`, `picture1`, `picture2`, `picture3`) VALUES
(1, 'squid', 'scallop', 'catfish ', 70, 2, '012-7890404', 'https://i0.wp.com/post.medicalnewstoday.com/wp-content/uploads/sites/3/2020/02/GettyImages-508486981-1024x680.jpg?w=1155&h=3572', 'https://www.onlinepasar.com.my/wp-content/uploads/2020/02/Pink-Half-Shell-Scallop-1.jpg', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRoPl3WcwXbBndIAz00pLbp5rNU_PzAKiWVF8fSSzCU_5IN4jx1cl0ct42cBAVFPWrDenA&usqp=CAU');

-- --------------------------------------------------------

--
-- Table structure for table `fish`
--

CREATE TABLE `fish` (
  `fishID` int(11) NOT NULL,
  `fish_name` varchar(255) NOT NULL,
  `fish_description` varchar(1000) NOT NULL,
  `fish_price` int(10) NOT NULL,
  `fish_picture` varchar(1000) NOT NULL,
  `user_id` int(11) NOT NULL,
  `seller_contact` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fish`
--

INSERT INTO `fish` (`fishID`, `fish_name`, `fish_description`, `fish_price`, `fish_picture`, `user_id`, `seller_contact`) VALUES
(1, 'anabas', 'Anabas is a genus of climbing gouramies native to southern and eastern Asia. In the wild, Anabas species grow up to 30 cm long. They inhabit both brackish and fresh water.', 30, 'https://upload.wikimedia.org/wikipedia/commons/f/f0/Anabas_testudineus.png', 2, '012-7890404'),
(2, 'grouper', 'Groupers are fish of any of a number of genera in the subfamily Epinephelinae of the family Serranidae, in the order Perciformes. Not all serranids are called ', 35, 'https://theoceanmart.com/wp-content/uploads/2018/06/Live-Red-Grouper.jpg', 2, '012-7890404');

-- --------------------------------------------------------

--
-- Table structure for table `shellfish`
--

CREATE TABLE `shellfish` (
  `shellfishID` int(11) NOT NULL,
  `shellfish_name` varchar(255) NOT NULL,
  `shellfish_description` varchar(1000) NOT NULL,
  `shellfish_price` int(11) NOT NULL,
  `shellfish_picture` varchar(1000) NOT NULL,
  `user_id` int(11) NOT NULL,
  `seller_contact` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shellfish`
--

INSERT INTO `shellfish` (`shellfishID`, `shellfish_name`, `shellfish_description`, `shellfish_price`, `shellfish_picture`, `user_id`, `seller_contact`) VALUES
(1, 'scallop', 'Scallop is a common name that is primarily applied to any one of numerous species of saltwater clams or marine bivalve mollusks in the taxonomic family Pectinidae, the scallops.', 15, 'https://www.onlinepasar.com.my/wp-content/uploads/2020/02/Pink-Half-Shell-Scallop-1.jpg', 2, '012-7890404');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_role` int(11) NOT NULL DEFAULT 1,
  `contact_number` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `user_role`, `contact_number`) VALUES
(1, 'admin1', 'admin01', 'admin1@gmail.com', 0, '-'),
(2, 'test', 'pass', 'test@gmail.com', 1, '012-7890404'),
(3, 'john', 'john123', 'john@gmail.com', 1, '012-7710098'),
(4, 'john', 'john', 'john1@gmail.com', 1, '012-7638080'),
(5, 'john', 'john', 'john2@gmail.com', 1, '012-8989090'),
(6, 'john', '123', 'john123@gmail.com', 1, '012-7890404'),
(7, 'test2', 'test1234', 'test2@gmail.com', 1, '012-7328845'),
(8, 'test10', 'test', 'test10@gmail.com', 1, '012-7328845');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comboset`
--
ALTER TABLE `comboset`
  ADD PRIMARY KEY (`combosetID`);

--
-- Indexes for table `fish`
--
ALTER TABLE `fish`
  ADD PRIMARY KEY (`fishID`);

--
-- Indexes for table `shellfish`
--
ALTER TABLE `shellfish`
  ADD PRIMARY KEY (`shellfishID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comboset`
--
ALTER TABLE `comboset`
  MODIFY `combosetID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fish`
--
ALTER TABLE `fish`
  MODIFY `fishID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `shellfish`
--
ALTER TABLE `shellfish`
  MODIFY `shellfishID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

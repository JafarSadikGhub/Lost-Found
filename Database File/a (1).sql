-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2019 at 07:14 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `a`
--

-- --------------------------------------------------------

--
-- Table structure for table `found`
--

CREATE TABLE `found` (
  `foundId` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `age` varchar(20) NOT NULL,
  `height` varchar(100) NOT NULL,
  `father` varchar(100) NOT NULL,
  `mother` varchar(100) NOT NULL,
  `founddt` date NOT NULL,
  `foundlocation` varchar(100) NOT NULL,
  `color` varchar(50) NOT NULL,
  `wearing` varchar(100) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `address` varchar(255) NOT NULL,
  `other` varchar(255) NOT NULL,
  `image_found` varchar(255) NOT NULL,
  `user_id` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `found`
--

INSERT INTO `found` (`foundId`, `name`, `age`, `height`, `father`, `mother`, `founddt`, `foundlocation`, `color`, `wearing`, `contact`, `address`, `other`, `image_found`, `user_id`) VALUES
(1, 'Anindha', '21', '5\'10', 'xyz', 'www', '0001-01-01', 'dhaka', 'White', 'Shirt', '01760379337', 'abc, def, geh, ijk, lmn, opq,', 'n/a', '', 0),
(2, 'Jafar Sadik', '22', '5\'8\"', 'Mohammed Musa', 'Nilufa Chowdhury', '1995-05-27', 'Dhaka', 'Black ', 'Shirts-Pants', '01760379337', 'Dakshinkhan Sardar Para, Dhaka 1230', 'n/a', '', 0),
(3, 'Sheher Jan', '20', '5\'5\"', 'xyxxx', 'yxyyy', '2002-05-05', 'Dhaka', 'white ', 'faaaafddd', '01777777777', 'DHaka', 'other', '', 0),
(5, 'Xyz', '10', '4\'2', 'zzz', 'uuuuu', '2001-01-01', 'dhaka', 'White', 'Shirt', '01760379337', 'Dakshinkhan Sardar Para, Hazimarket', 'n/a', '', 10),
(6, 'Picchi1', '5', '2\'2\"', 'Picchir baap1', 'Picchir Ma1', '2010-02-17', 'Dhaka', 'Black', 'Shirts', '1111111111', 'road-1, house-118, Bashundhara R/A, Dhaka 1230', 'n/a', 'kid1.jpg', 11),
(7, 'Picchi2', '10', '4\'2', 'Picchir baap2', 'Picchir Ma2', '2010-02-17', 'Dhaka', 'White', 'Shirts', '01760379337', 'Dakshinkhan Sardar Para, Hazimarket', 'n/a', 'kid2.jpg', 11);

-- --------------------------------------------------------

--
-- Table structure for table `lost`
--

CREATE TABLE `lost` (
  `LostId` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `age` varchar(20) NOT NULL,
  `height` varchar(100) NOT NULL,
  `father` varchar(100) NOT NULL,
  `mother` varchar(100) NOT NULL,
  `lostdt` date NOT NULL,
  `lostlocation` varchar(100) NOT NULL,
  `color` varchar(50) NOT NULL,
  `wearing` varchar(100) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `address` varchar(255) NOT NULL,
  `other` varchar(255) NOT NULL,
  `image_lost` varchar(255) NOT NULL,
  `user_id` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lost`
--

INSERT INTO `lost` (`LostId`, `name`, `age`, `height`, `father`, `mother`, `lostdt`, `lostlocation`, `color`, `wearing`, `contact`, `address`, `other`, `image_lost`, `user_id`) VALUES
(1, 'Anindha', '21', '5\'10', 'xyz', 'www', '0001-01-01', 'dhaka', 'White', 'Shirt', '01760379337', 'abc, def, geh, ijk, lmn, opq,', 'n/a', '', 0),
(2, 'Jafar Sadik', '22', '5\'8\"', 'Mohammed Musa', 'Nilufa Chowdhury', '1995-05-27', 'Dhaka', 'Black ', 'Shirts-Pants', '01760379337', 'Dakshinkhan Sardar Para, Dhaka 1230', 'n/a', '', 0),
(3, 'Sheher Jan', '20', '5\'5\"', 'xyxxx', 'yxyyy', '2002-05-05', 'Dhaka', 'white ', 'faaaafddd', '01777777777', 'DHaka', 'other', '', 0),
(4, 'Xyz', '10', '4\'2', 'zzz', 'uuuuu', '2001-01-01', 'dhaka', 'White', 'Shirt', '01760379337', 'Dakshinkhan Sardar Para, Hazimarket', 'n/a', '', 10),
(5, 'Xyz', '10', '4\'2', 'zzz', 'uuuuu', '2001-01-01', 'dhaka', 'White', 'Shirt', '01760379337', 'Dakshinkhan Sardar Para, Hazimarket', 'n/a', '', 10),
(6, 'picchi3', '21', '2\'2\"', 'Picchir baap3', 'Picchir Ma3', '2001-01-01', 'dhaka', 'White', 'Shirts', '01760379337', '5800 Cobbs Creek Parkway', 'n/a', 'kid1.jpg', 11),
(7, 'picchi4', '10', '2\'2\"', 'Picchir baap4', 'Picchir Ma4', '2001-01-01', 'dhaka', 'White', 'Shirts', '01760379337', '5800 Cobbs Creek Parkway', 'n/a', 'kid2.jpg', 11);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL DEFAULT 'n/a',
  `house` varchar(15) NOT NULL DEFAULT 'n/a',
  `street` varchar(20) NOT NULL DEFAULT 'n/a',
  `zip` varchar(10) NOT NULL DEFAULT 'n/a',
  `city` varchar(50) NOT NULL DEFAULT 'n/a',
  `state` varchar(50) NOT NULL DEFAULT 'n/a',
  `country` varchar(100) NOT NULL DEFAULT 'n/a',
  `gender` varchar(20) NOT NULL DEFAULT 'n/a',
  `profile` varchar(255) NOT NULL DEFAULT 'n/a'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `username`, `email`, `password`, `phone`, `house`, `street`, `zip`, `city`, `state`, `country`, `gender`, `profile`) VALUES
(1, 'jafar123', 'jafar123', 'jafar123', 'jafar', '$2y$10$RXaOdj8xkeex4f2frKlfyeaSTQXKPDJpnY.BOkWukXpjZwU9o5mh6', '', '', '', '', '', '', '', '', ''),
(2, 'jafar', 'sadik', 'log123', 'log123', '$2y$10$.b.Sv84y2Y9h/SOdTVYcEusbQI38wOu7SB2Qo0YxVI2hFog.7Vf7O', '', '', '', '', '', '', '', '', ''),
(3, 'log1234', 'log1234', 'log1234', 'log1234', '$2y$10$HyGa8tQyeSMB.Zj6D3LjWOXah1Xqhcs64uQlCW2o4HYCJidgCO93G', '', '', '', '', '', '', '', '', ''),
(4, 'log1234', 'log1234', 'log12345', 'jfagagagg', '$2y$10$3AZZFl9/DMKwcrJFBUSPQeOZU9qKMR1b/6Z/VCe0VONnlf9tyOl5C', '', '', '', '', '', '', '', '', ''),
(5, 'jafar123456', 'jafar123456', 'jafar123456', 'jaikaka@naikaka.com', '$2y$10$gVUKrCaarx6BUmidaNCrAOSQvrdOgoAsb5nfo9vLL1gt.XWJyZI4u', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a'),
(6, 'Jafar Sadik', 'Mohammed', 'flash12', 'jaikaka@naikaka.com', '$2y$10$nn/9juGuNREBoW/k6Cf42eM8SmMYH5VexsICguq/TXCqd/Fd734wC', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a'),
(7, 'Jafar', 'Sadik', 'jafar4567', 'jafarsadik@northsouth.edu', '$2y$10$ef/yhQ0iWw.MFVkg5CUIT.3o2T0EJTAUYsVhZWfpKJA3Xmt/ThOBa', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a'),
(8, 'Jafar', 'Sadik', 'jafar45678', 'jafarsadik@northsouth.edu', '$2y$10$ezg9t1hOPJiEQ0q8pkiEa..v0vfDbs9w7pazicXHwdDk5KA62Bqb2', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a'),
(9, 'Mohammed Jafar', 'Sadik', 'jafarxyz', 'jafar.sadik@gmail.com', '$2y$10$Y.k7NQny77fRqoAtxoJGZO.RhRsj6m3WKGX3GAgxOhkp4kPTPk0jG', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a'),
(10, 'Jafar', 'Sadik', 'jafarw', 'jafar.sadik@northsouth.edu', '$2y$10$KomuM8Ir7/99zIZyHYtgL.vkM/Xs402y2x9i8r50cLHBv/jOvmadG', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a'),
(11, 'Sheher  ', 'Jan', 'sheher123', 'sheher123@gmail.com', '$2y$10$yK0njGXio0DlQh4PyoE7tOvdnU7JBrrf7h19yhyjqM5P0c.mRZake', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', '2.jpg'),
(12, 'Anindha', 'Nill', 'anindha123', 'anindha123@gmail.com', '$2y$10$U1ZYq9ZsMvOhWmGdq8FMaeEdEYGXxQz.YjD4FmazSjeDZGoGmGO7.', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', '5.jpg'),
(13, 'Mayesha', 'Islam', 'mayesha123', 'mayesha123@gmail.com', '$2y$10$lOkBvNsQNrUVXCXl4Lhzl.e/MJyX7U2RZjfw9G.q7jOzt/StnC3hi', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', '7.jpg'),
(14, 'Andy', 'Luke', 'luke1234', 'garof@mailhub.top', '$2y$10$0gcuE1NZxUdI80dnDGIHMuqGidFJOaY2ReCWRvwiiDnXdAc9nJDly', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a'),
(15, 'ami', 'ami', 'ami1', 'ami1', '$2y$10$WQdWzK0cb3xgG6TFB4TIhu0drFK/JYDMB7qOTGgOlsp0l90sRNeTy', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `found`
--
ALTER TABLE `found`
  ADD PRIMARY KEY (`foundId`);

--
-- Indexes for table `lost`
--
ALTER TABLE `lost`
  ADD PRIMARY KEY (`LostId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `found`
--
ALTER TABLE `found`
  MODIFY `foundId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `lost`
--
ALTER TABLE `lost`
  MODIFY `LostId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

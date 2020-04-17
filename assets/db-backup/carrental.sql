-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2020 at 04:00 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carrental`
--

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `Id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code_name` varchar(50) NOT NULL,
  `model` varchar(20) NOT NULL,
  `manufacturer` varchar(20) NOT NULL,
  `year` int(4) NOT NULL,
  `plate_number` varchar(10) NOT NULL,
  `RentPerDay` double(18,2) NOT NULL,
  `Capacity` int(2) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `Is_Active` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`Id`, `name`, `code_name`, `model`, `manufacturer`, `year`, `plate_number`, `RentPerDay`, `Capacity`, `file_name`, `Is_Active`) VALUES
(40, 'Toyota Grandia', 'Toyota Grandia Radiant', 'Grandia', 'Toyota', 1990, 'TBS-7634', 5000.00, 4, '1586654715-Capture.PNG', b'1'),
(49, 'Hyundai Tucson (Yellow)', 'Radiant Hyundai', 'Tucson', 'Hyundai', 1990, 'XTR-3425', 4800.00, 4, 'v1starex1.jpg', b'1'),
(50, 'BMW M3 (Silver)', 'BMW M3 Radiant', 'BMW M3', 'BMW', 2013, 'TRX-0987', 10000.00, 7, '1586954874-.jpg', b'1'),
(51, 'BMW Z4 (Silver)', 'BMW Z4 Radiant', 'BMW Z4', 'BMW', 1990, 'TBS-7764', 20000.00, 2, '1586955163-Capture.PNG', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `clientbookings`
--

CREATE TABLE `clientbookings` (
  `BookingId` int(11) NOT NULL,
  `clientId` int(11) NOT NULL,
  `carId` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `pick_up_time` time NOT NULL,
  `number_of_days` int(2) NOT NULL,
  `end_date` date NOT NULL,
  `return_time` time NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_date` datetime NOT NULL,
  `statusId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clientbookings`
--

INSERT INTO `clientbookings` (`BookingId`, `clientId`, `carId`, `start_date`, `pick_up_time`, `number_of_days`, `end_date`, `return_time`, `created_date`, `updated_date`, `statusId`) VALUES
(5, 1, 5, '2020-01-29', '00:00:00', 0, '2020-01-31', '00:00:00', '2020-01-26 19:56:08', '0000-00-00 00:00:00', 2),
(17, 97, 50, '2020-04-16', '00:00:00', 3, '2020-04-19', '00:00:00', '2020-04-16 23:25:09', '0000-00-00 00:00:00', 1),
(18, 97, 50, '2020-04-16', '00:00:00', 3, '2020-04-19', '00:00:00', '2020-04-16 23:26:02', '0000-00-00 00:00:00', 1),
(19, 99, 49, '2020-04-28', '00:00:00', 5, '2020-05-03', '00:00:00', '2020-04-17 00:00:34', '0000-00-00 00:00:00', 2),
(20, 97, 40, '2020-04-25', '00:00:00', 5, '2020-04-30', '00:00:00', '2020-04-17 08:43:53', '0000-00-00 00:00:00', 1),
(21, 97, 40, '2020-04-25', '00:00:00', 5, '2020-04-30', '00:00:00', '2020-04-17 08:44:56', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `clientbookingsphotos`
--

CREATE TABLE `clientbookingsphotos` (
  `Id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `Is_Active` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clientbookingsphotos`
--

INSERT INTO `clientbookingsphotos` (`Id`, `booking_id`, `file_name`, `created_date`, `Is_Active`) VALUES
(1, 18, '1587050762-lbO17hkK_400x400.jpg', '2020-04-16 23:26:02', b'1'),
(2, 19, '1587052834-Capture.PNG', '2020-04-17 00:00:34', b'1'),
(3, 21, '1587084295-CHARM.PNG', '2020-04-17 08:44:56', b'1'),
(4, 21, '1587084295-ESCS_SCMC.PNG', '2020-04-17 08:44:56', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `Id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email_address` varchar(100) NOT NULL,
  `contact_number` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `government_id_1_path` varchar(255) NOT NULL,
  `government_id_2_path` varchar(255) NOT NULL,
  `attachment_1_path` varchar(255) NOT NULL,
  `attachment_2_path` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_date` date NOT NULL,
  `Is_Active` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`Id`, `name`, `email_address`, `contact_number`, `address`, `government_id_1_path`, `government_id_2_path`, `attachment_1_path`, `attachment_2_path`, `created_date`, `updated_date`, `Is_Active`) VALUES
(97, 'Jeffry Manhulad', 'jcmanhulad@up.edu.ph', '09268406884', 'Musuan, Dologon, Maramag, Bukidnon', '', '', '', '', '2020-04-13 10:00:47', '0000-00-00', b'1'),
(98, 'asdsa', 'jbbatedio@up.edu.ph', 'asdsa', 'sadsa', '', '', '', '', '2020-04-13 12:26:00', '0000-00-00', b'1'),
(99, 'Jym Bartolaba Batedio', 'jbbatedio@up.edu.ph', '091231231231', 'Barra Opol Misamis Oriental', '', '', '', '', '2020-04-13 13:24:10', '0000-00-00', b'1'),
(100, 'Mary Jeziel Cavan', 'johndue@gmail.com', '34324242', 'Musuan', '', '', '', '', '2020-04-13 21:54:53', '0000-00-00', b'1'),
(101, 'MJ Cavan', 'admin@webdamn.com', '34534534', 'Address', '', '', '', '', '2020-04-15 19:13:12', '0000-00-00', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `clientsphotos`
--

CREATE TABLE `clientsphotos` (
  `Id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `Is_Active` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clientsphotos`
--

INSERT INTO `clientsphotos` (`Id`, `client_id`, `file_name`, `created_date`, `Is_Active`) VALUES
(73, 97, '1586743247-Capture.PNG', '2020-04-13 10:00:47', b'1'),
(75, 99, '1586755450-pngtree-happy-birthday-background-of-stereo-creative-image_104875.jpg', '2020-04-13 13:24:10', b'1'),
(76, 99, '1586755450-smoke-spreading-blue-background_23-2147785936.jpg', '2020-04-13 13:24:10', b'1'),
(77, 99, '1586755450-unnamed.jpg', '2020-04-13 13:24:10', b'1'),
(78, 100, '1586786092-MVIMG_20191117_163234.jpg', '2020-04-13 21:54:53', b'1'),
(79, 100, '1586786092-100_1991.JPG', '2020-04-13 21:54:53', b'1'),
(80, 100, '1586786092-MVIMG_20200215_105930_1.jpg', '2020-04-13 21:54:53', b'1'),
(81, 100, '1586786092-00100lrPORTRAIT_00100_BURST20200215105941635_COVER.jpg', '2020-04-13 21:54:54', b'1'),
(82, 101, '1586949192-starex.jpg', '2020-04-15 19:13:12', b'1'),
(83, 101, '1586949192-v1starex.jpg', '2020-04-15 19:13:13', b'1'),
(84, 103, '1586966723-SAM_0745.JPG', '2020-04-16 00:05:23', b'1'),
(85, 103, '1586966723-lbO17hkK_400x400.jpg', '2020-04-16 00:05:23', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `Id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` text NOT NULL,
  `type` varchar(20) NOT NULL,
  `Is_Active` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`Id`, `name`, `value`, `type`, `Is_Active`) VALUES
(6, 'Driver_Per_Day', '1000', 'system', b'1'),
(7, 'telephone', '+63 917 638 1707', 'contact', b'1'),
(8, 'Email Address', 'inquiry@carrental.com / customer@carrental.com', 'contact', b'1'),
(9, 'Address', 'Poblacion Hagkol Sayre Highway (infront of new bus terminal), Valencia City, Bukidnon 8709', 'contact', b'1'),
(10, 'Do I need to register before I can reserve a vehicle?', 'No. Registration is not required before making a reservation. However, information such as name, address, contact details and valid ID will be required upon reservation.', 'faq', b'1'),
(11, 'Mobile phone', '09268406884', 'contact', b'1'),
(12, 'Year founded', '2016', 'other', b'0'),
(13, 'What is the process of reservation?', '<b>Step 1</b> Select the desired vehicle in our portal.\r\n\r\n<b>Step 2</b> Contact VRS and inform your preferred vehicle and number of days of reservation.\r\n\r\n<b>Step 3</b> Provide the required details to VRS Support.\r\n\r\n<b>Step 4</b> Wait for the email confirmation.', 'faq', b'1'),
(14, 'Is it possible to extend the duration of reservation?', 'Depending on the availability of the vehicle, you can extend the reservation by calling our VRS support.', 'faq', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `Id` int(11) NOT NULL,
  `label` varchar(50) NOT NULL,
  `bootstrap_bg_color` varchar(100) NOT NULL,
  `Is_Active` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`Id`, `label`, `bootstrap_bg_color`, `Is_Active`) VALUES
(1, 'Reserved', 'warning', b'1'),
(2, 'In Progress', 'danger', b'1'),
(8, 'Returned', 'secondary', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(150) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(5) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `Is_Active` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `fullname`, `email`, `username`, `password`, `user_type`, `created_at`, `Is_Active`) VALUES
(4, 'Enzo', 'Cerbas', 'Enzo Cerbas', 'bvcerbas@up.edu.ph', 'enzo', 'd41d8cd98f00b204e9800998ecf8427e', 'user', '2020-02-01 05:18:35', b'1'),
(11, 'Jeffry', 'Manhulad', 'Jeffry Manhulad', 'jeff.manhulad@gmail.com', 'jeffman', 'd41d8cd98f00b204e9800998ecf8427e', 'user', '2020-04-12 14:37:28', b'1'),
(12, 'Arvin', 'Reyes', 'Arvin Reyes', 'arvin@gmail.com', 'arvinreyes', '5f4dcc3b5aa765d61d8327deb882cf99', 'admin', '2020-04-14 15:38:23', b'1'),
(13, 'Admin', 'Carrental', 'Admin Carrental', 'johndue@gmail.com', 'admin', '25d55ad283aa400af464c76d713c07ad', 'admin', '2020-04-14 15:45:03', b'1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `clientbookings`
--
ALTER TABLE `clientbookings`
  ADD PRIMARY KEY (`BookingId`);

--
-- Indexes for table `clientbookingsphotos`
--
ALTER TABLE `clientbookingsphotos`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `clientsphotos`
--
ALTER TABLE `clientsphotos`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `clientbookings`
--
ALTER TABLE `clientbookings`
  MODIFY `BookingId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `clientbookingsphotos`
--
ALTER TABLE `clientbookingsphotos`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `clientsphotos`
--
ALTER TABLE `clientsphotos`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2022 at 09:39 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `urisse`
--

-- --------------------------------------------------------

--
-- Table structure for table `car_type`
--

CREATE TABLE `car_type` (
  `car_type_id` int(11) NOT NULL,
  `type_name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `car_type`
--

INSERT INTO `car_type` (`car_type_id`, `type_name`) VALUES
(1, 'Toyota'),
(2, 'Hundai'),
(3, 'Benz'),
(4, 'BMW'),
(5, 'Honda'),
(6, 'Scania'),
(7, 'Bajaj'),
(8, 'TVS'),
(9, 'Hoyane');

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `genre` int(11) NOT NULL,
  `genre_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`genre`, `genre_name`) VALUES
(1, 'Voiture'),
(2, 'Jeep'),
(3, 'Camionette'),
(4, 'Camoin'),
(5, 'Moto'),
(6, 'Minibus'),
(7, 'Bus'),
(8, 'School bus'),
(9, 'Truck/Camion'),
(10, 'Tractor'),
(11, 'Trailer');

-- --------------------------------------------------------

--
-- Table structure for table `insurances`
--

CREATE TABLE `insurances` (
  `insurance_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `email_address` varchar(100) NOT NULL,
  `tin_number` varchar(20) NOT NULL,
  `id_number` varchar(20) NOT NULL,
  `plate_number` varchar(10) NOT NULL,
  `chassis` varchar(20) NOT NULL,
  `insurance_company` varchar(50) NOT NULL,
  `insurance_type` varchar(20) NOT NULL,
  `use_type` varchar(10) NOT NULL,
  `Genre` varchar(30) NOT NULL,
  `car_type` varchar(30) NOT NULL,
  `Period` int(20) NOT NULL,
  `anne` int(10) NOT NULL,
  `carte_joune` varchar(100) NOT NULL,
  `seat` int(4) NOT NULL,
  `Value` int(12) NOT NULL,
  `assurance_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `insurance_company`
--

CREATE TABLE `insurance_company` (
  `company_id` int(11) NOT NULL,
  `company_name` varchar(40) NOT NULL,
  `company_code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `insurance_company`
--

INSERT INTO `insurance_company` (`company_id`, `company_name`, `company_code`) VALUES
(1, 'RADIANT', '040703'),
(2, 'MUA', '004466'),
(4, 'PRIME', '017788'),
(5, 'BRITAM', '008509'),
(6, 'SANLAM', '026061');

-- --------------------------------------------------------

--
-- Table structure for table `tarrif`
--

CREATE TABLE `tarrif` (
  `id` int(11) NOT NULL,
  `Genre` varchar(50) NOT NULL,
  `use_type` varchar(20) NOT NULL,
  `payment` int(10) NOT NULL,
  `dmvi` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tarrif`
--

INSERT INTO `tarrif` (`id`, `Genre`, `use_type`, `payment`, `dmvi`) VALUES
(1, 'Voiture', 'Private', 38400, 0.0422),
(2, 'Jeep', 'Private', 50800, 0.0422),
(3, 'Camionete', 'Private', 57400, 0.035),
(4, 'Minibus', 'Private', 86400, 0.035),
(5, 'Bus', 'Private', 138000, 0.037),
(6, 'Voiture', 'Taxi', 87600, 0.0434),
(7, 'Camionete', 'Taxi', 100600, 0.035),
(8, 'Minibus', 'Taxi', 102400, 4.54),
(9, 'Bus', 'Taxi', 312400, 4.54),
(11, 'School bus', 'Taxi', 102400, 4.54),
(12, 'Truck/Camion', 'Taxi', 151200, 3.5),
(13, 'Tractor', 'Taxi', 64000, 3.62),
(14, 'Trailer', 'Taxi', 86400, 3.5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `car_type`
--
ALTER TABLE `car_type`
  ADD PRIMARY KEY (`car_type_id`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`genre`);

--
-- Indexes for table `insurances`
--
ALTER TABLE `insurances`
  ADD PRIMARY KEY (`insurance_id`);

--
-- Indexes for table `insurance_company`
--
ALTER TABLE `insurance_company`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `tarrif`
--
ALTER TABLE `tarrif`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `car_type`
--
ALTER TABLE `car_type`
  MODIFY `car_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `genre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `insurances`
--
ALTER TABLE `insurances`
  MODIFY `insurance_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `insurance_company`
--
ALTER TABLE `insurance_company`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tarrif`
--
ALTER TABLE `tarrif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

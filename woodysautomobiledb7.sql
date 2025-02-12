-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2023 at 06:08 AM
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
-- Database: `woodysautomobiledb`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Cust_Id` int(11) NOT NULL,
  `FName` varchar(50) NOT NULL,
  `LName` varchar(50) NOT NULL,
  `Cust_Email_Id` varchar(50) NOT NULL,
  `Street` varchar(15) NOT NULL,
  `City` varchar(15) NOT NULL,
  `State` varchar(15) NOT NULL,
  `Country` varchar(15) NOT NULL,
  `Cust_Phone` char(10) NOT NULL,
  `Credit_Card` varchar(16) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`Cust_Id`, `FName`, `LName`, `Cust_Email_Id`, `Street`, `City`, `State`, `Country`, `Cust_Phone`, `Credit_Card`, `Password`) VALUES
(1, 'Krisha', 'Shah', 'krs@njit.edu', '250 Central Ave', 'Newark', 'New Jersey', 'United States', '9733971857', '1234123412341234', '12345678'),
(3, 'Karthik', 'Yeluripati', 'sy493@njit.edu', '250 Central Ave', 'Newark', 'New Jersey', 'United States', '8505673687', '7890789078907090', '12345678'),
(4, 'Manan', 'Maroo', 'mm321@njit.edu', 'Unit 503, 250 C', 'Newark', 'NJ', 'United States', '8622792156', '3452345768907654', '12345678'),
(5, 'Naitika', 'Goenka', 'ng123@njit.edu', '250 Warren St.', 'Newark', 'New Jersey', 'United States', '3452341234', '7986053746215644', '12345678'),
(6, 'Nidhi', 'Singh', 'ns123@njit.edu', '250 Warren St.', 'Newark', 'New Jersey', 'United States', '2147835993', '5674321234592133', '12345678'),
(7, 'Jill', 'Shah', 'js123@njit.edu', '204, Gauri Shan', 'West Orange', 'NJ', 'United States', '8482565919', '3212234456559877', '12345678'),
(8, 'Rupal', 'Shah', 'rs123@njit.edu', '17 Central Ave', 'Springfield', 'New Jersey', 'USA', '9322303086', '8788352430912232', '12345678'),
(9, 'Hemal', 'Merchant', 'hm123@njit.edu', '16 Ave Field', 'Millburn', 'New Jersey', 'United States', '1236765422', '3422567865775666', '12345678'),
(10, 'Nick', 'Jonas', 'nj123@njit.edu', 'Helms Street', 'Newark', 'NJ', 'United States', '9893234587', '2799876769981112', '12345678'),
(11, 'Sherlock', 'Holmes', 'sh123@gmail.com', '112 Qesco Centr', 'West Orange', 'NJ', 'United States', '2829897171', '7844376511114590', '12345678');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `SSN` char(9) NOT NULL,
  `Job_Type` varchar(15) DEFAULT NULL,
  `FName` varchar(50) DEFAULT NULL,
  `LName` varchar(50) DEFAULT NULL,
  `Start_Date` varchar(15) DEFAULT NULL,
  `Location_Id` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`SSN`, `Job_Type`, `FName`, `LName`, `Start_Date`, `Location_Id`) VALUES
('102938475', 'TECHNICIAN', 'Sai', 'Reddy', '2022-04-08', 40404),
('124489008', 'TECHNICIAN', 'Ajay', 'Desai', '2022-01-15', 20202),
('136578968', 'TECHNICIAN', 'Ruchi', 'Gada', '2023-01-03', 20202),
('212113341', 'TECHNICIAN', 'Nilesh', 'Mehta', '2021-01-15', 40404),
('212376898', 'TECHNICIAN', 'Dipen', 'Solanki', '2023-01-02', 10101),
('222341893', 'TECHNICIAN', 'Bansi', 'Lole', '2023-02-21', 10101),
('222349083', 'TECHNICIAN', 'Carol', 'Dzouza', '2023-02-20', 20202),
('345212786', 'MANAGER', 'Calvin', 'Silvera', '2021-03-15', 10101),
('354345654', 'TECHNICIAN', 'Kim', 'Chulmin', '2023-01-01', 50505),
('382110989', 'MANAGER', 'Dion', 'Castellino', '2021-01-01', 30303),
('414236767', 'TECHNICIAN', 'Alex', 'Lobo', '2021-01-15', 50505),
('453134218', 'TECHNICIAN', 'Nirav', 'Doshi', '2023-01-04', 30303),
('453387978', 'TECHNICIAN', 'Aakash', 'Gupta', '2021-02-10', 50505),
('562376008', 'TECHNICIAN', 'Anuj', 'Nair', '2022-03-15', 10101),
('569890998', 'TECHNICIAN', 'Dheeraj', 'Gaba', '2022-02-15', 50505),
('671134218', 'TECHNICIAN', 'Ramina', 'Ronaldo', '2023-01-14', 20202),
('672376891', 'TECHNICIAN', 'Jash', 'Kahar', '2023-06-14', 10101),
('734908113', 'TECHNICIAN', 'Cris', 'Coutinho', '2023-03-20', 30303),
('736575968', 'TECHNICIAN', 'Om', 'Bhedha', '2023-01-08', 30303),
('767439988', 'TECHNICIAN', 'Viraj', 'Ghelani', '2022-02-05', 50505),
('768576857', 'TECHNICIAN', 'Venkat', 'Krishna', '2022-02-10', 40404),
('812396812', 'TECHNICIAN', 'Rocky', 'Lobo', '2023-02-10', 20202),
('909890998', 'TECHNICIAN', 'Mani', 'Kumar', '2023-02-05', 40404),
('912396899', 'TECHNICIAN', 'Deep', 'Shah', '2023-04-12', 10101),
('936332545', 'MANAGER', 'Aditya', 'Baxi', '2022-01-07', 50505),
('954489008', 'TECHNICIAN', 'Amrut', 'Patel', '2022-02-15', 30303),
('982345186', 'MANAGER', 'Dhruvik', 'Shah', '2021-04-21', 20202),
('989111325', 'TECHNICIAN', 'Supriya', 'Singh', '2021-03-05', 50505),
('989262404', 'MANAGER', 'Mansi', 'Chopada', '2022-01-15', 40404);

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `Invoice_Id` int(11) NOT NULL,
  `Total_Amount` int(11) NOT NULL,
  `Date_Paid` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`Invoice_Id`, `Total_Amount`, `Date_Paid`) VALUES
(1, 138, '2023-04-21 04:35:58'),
(2, 138, '2023-04-21 03:48:00'),
(3, 138, '2023-04-21 22:34:22'),
(4, 156, '2023-04-23 23:04:49'),
(5, 249, '2023-04-23 23:01:22'),
(6, 147, '2023-04-23 23:05:00'),
(7, 138, '2023-04-23 23:03:42'),
(9, 73, '2023-04-23 23:07:32'),
(11, 249, '2023-04-23 23:04:00'),
(13, 278, '2023-04-23 23:04:11'),
(14, 278, '2023-04-23 23:06:50'),
(16, 73, '2023-04-23 23:05:53'),
(17, 249, '2023-04-23 23:06:02'),
(18, 226, '2023-04-23 23:06:13'),
(19, 349, '2023-04-23 23:02:26'),
(20, 206, '2023-04-23 23:02:50'),
(22, 313, '2023-04-25 04:06:35'),
(23, 349, '2023-04-25 04:06:46'),
(25, 369, '2023-04-25 04:07:50');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_details`
--

CREATE TABLE `invoice_details` (
  `Service_Appt_Id` int(11) NOT NULL,
  `V_Number` char(17) DEFAULT NULL,
  `Technician_Name` varchar(50) DEFAULT NULL,
  `Appt_Date` timestamp NULL DEFAULT current_timestamp(),
  `Cust_Id` int(11) DEFAULT NULL,
  `Location_Id` int(11) DEFAULT NULL,
  `Labor_Charge` int(11) NOT NULL,
  `Parts_Price` int(11) NOT NULL,
  `Invoice_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `invoice_details`
--

INSERT INTO `invoice_details` (`Service_Appt_Id`, `V_Number`, `Technician_Name`, `Appt_Date`, `Cust_Id`, `Location_Id`, `Labor_Charge`, `Parts_Price`, `Invoice_Id`) VALUES
(5, '12345678901234567', 'Bansi', '2023-04-20 02:32:32', 1, 10101, 82, 56, 1),
(7, '12345678901234567', 'Jash', '2023-04-20 03:16:22', 1, 10101, 82, 56, 2),
(8, '34340909879574638', 'Carol', '2023-04-21 22:33:38', 11, 20202, 82, 56, 3),
(27, '12125656343478789', 'Anuj', '2023-04-23 22:02:37', 6, 10101, 100, 56, 4),
(39, '12345678909876543', 'Bansi', '2023-04-23 22:18:49', 3, 10101, 200, 49, 5),
(28, '23234545676789899', 'Dipen', '2023-04-23 22:20:15', 6, 10101, 100, 47, 6),
(29, '10293847561029384', 'Deep', '2023-04-23 22:20:34', 5, 10101, 82, 56, 7),
(38, '12345678909876543', 'Anuj', '2023-04-23 22:21:19', 3, 10101, 65, 7, 8),
(9, '89876768762121223', 'Ruchi', '2023-04-23 22:26:09', 11, 20202, 65, 8, 9),
(10, '34340909879574638', 'Carol', '2023-04-23 22:26:29', 11, 20202, 80, 249, 10),
(30, '23456789012345678', 'Ramina', '2023-04-23 22:29:34', 5, 20202, 200, 49, 11),
(32, '56789012345678900', 'Rocky', '2023-04-23 22:32:28', 5, 20202, 80, 249, 12),
(33, '56789012345678900', 'Ajay', '2023-04-23 22:33:59', 5, 20202, 75, 203, 13),
(11, '77867652343432123', 'Nirav', '2023-04-23 22:42:32', 10, 30303, 75, 203, 14),
(12, '55464532123467890', 'Nirav', '2023-04-23 22:42:48', 10, 30303, 160, 203, 15),
(16, '21213232434354540', 'Cris', '2023-04-23 22:43:13', 8, 30303, 65, 8, 16),
(18, '90898972635123764', 'Om', '2023-04-23 22:43:46', 8, 30303, 200, 49, 17),
(20, '90898972635123764', 'Om', '2023-04-23 22:44:01', 8, 30303, 75, 151, 18),
(34, '13579246801234567', 'Om', '2023-04-23 22:44:19', 4, 30303, 300, 49, 19),
(35, '98765432109876543', 'Nirav', '2023-04-23 22:44:38', 4, 30303, 150, 56, 20),
(36, '98765432109876543', 'Cris', '2023-04-23 22:45:18', 4, 30303, 100, 47, 21),
(13, '89089089089078654', 'Sai', '2023-04-25 04:00:00', 9, 40404, 110, 203, 22),
(14, '89089089089078654', 'Nilesh', '2023-04-25 04:00:14', 9, 40404, 300, 49, 23),
(19, '21213232434354540', 'Venkat', '2023-04-25 04:00:31', 8, 40404, 80, 249, 24),
(21, '38475657009821274', 'Mani', '2023-04-25 04:00:50', 8, 40404, 120, 249, 25),
(22, '12341234567898765', 'Kim', '2023-04-25 04:02:28', 7, 50505, 82, 56, 26),
(23, '12341234567898765', 'Kim', '2023-04-25 04:02:39', 7, 50505, 200, 49, 27),
(24, '49586743275849384', 'Alex', '2023-04-25 04:02:56', 7, 50505, 80, 249, 28);

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `Location_Id` int(5) NOT NULL,
  `Street` varchar(30) DEFAULT NULL,
  `City` varchar(15) DEFAULT NULL,
  `State` varchar(15) DEFAULT NULL,
  `Zip_Code` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`Location_Id`, `Street`, `City`, `State`, `Zip_Code`) VALUES
(10101, '467 Valley Rd,', 'West Orange,', 'New Jersey,', '07052'),
(20202, '174 Mountain Ave,', 'Springfield,', 'New Jersey,', '07081'),
(30303, '6 Park Ave,', 'Caldwell,', 'New Jersey,', '07006'),
(40404, '18 W Chedar St,', 'Livingston,', 'New Jersey,', '07039'),
(50505, '250 Bloomfield Ave,', 'Verona,', 'New Jersey,', '07044');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `SSN` char(9) NOT NULL,
  `Salary` int(11) DEFAULT NULL,
  `User_Name` varchar(15) DEFAULT NULL,
  `Pass` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`SSN`, `Salary`, `User_Name`, `Pass`) VALUES
('345212786', 150000, 'admin1', 'admin1'),
('382110989', 150000, 'admin3', 'admin3'),
('936332545', 150000, 'admin5', 'admin5'),
('982345186', 150000, 'admin2', 'admin2'),
('989262404', 150000, 'admin4', 'admin4');

-- --------------------------------------------------------

--
-- Table structure for table `parts_inventory`
--

CREATE TABLE `parts_inventory` (
  `Parts_Num` int(11) NOT NULL,
  `Parts_Name` varchar(50) DEFAULT NULL,
  `Price` int(11) DEFAULT NULL,
  `Location_Id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `parts_inventory`
--

INSERT INTO `parts_inventory` (`Parts_Num`, `Parts_Name`, `Price`, `Location_Id`) VALUES
(1, 'Longacre Deluxe Front End Alignment Kit', 203, 10101),
(1, 'Longacre Deluxe Front End Alignment Kit', 203, 20202),
(1, 'Longacre Deluxe Front End Alignment Kit', 203, 30303),
(1, 'Longacre Deluxe Front End Alignment Kit', 203, 40404),
(1, 'Longacre Deluxe Front End Alignment Kit', 203, 50505),
(2, 'Funnel', 7, 10101),
(2, 'Funnel', 8, 20202),
(2, 'Funnel', 8, 30303),
(2, 'Funnel', 8, 40404),
(2, 'Funnel', 8, 50505),
(3, 'Castrol Oil', 28, 10101),
(3, 'Castrol Oil', 29, 20202),
(3, 'Castrol Oil', 29, 30303),
(3, 'Castrol Oil', 29, 40404),
(3, 'Castrol Oil', 29, 50505),
(4, 'Rotors', 56, 10101),
(4, 'Rotors', 56, 20202),
(4, 'Rotors', 56, 30303),
(4, 'Rotors', 56, 40404),
(4, 'Rotors', 56, 50505),
(5, 'Calipers', 30, 10101),
(5, 'Calipers', 30, 20202),
(5, 'Calipers', 30, 30303),
(5, 'Calipers', 30, 40404),
(5, 'Calipers', 30, 50505),
(6, 'Tires', 249, 10101),
(6, 'Tires', 249, 20202),
(6, 'Tires', 249, 30303),
(6, 'Tires', 249, 40404),
(6, 'Tires', 249, 50505),
(7, 'Ignition Tune-up kit', 49, 10101),
(7, 'Ignition Tune-up kit', 49, 20202),
(7, 'Ignition Tune-up kit', 49, 30303),
(7, 'Ignition Tune-up kit', 49, 40404),
(7, 'Ignition Tune-up kit', 49, 50505),
(8, 'Air filter', 36, 10101),
(8, 'Air filter', 36, 20202),
(8, 'Air filter', 36, 30303),
(8, 'Air filter', 36, 40404),
(8, 'Air filter', 36, 50505),
(9, 'Diagnostic Gauge', 151, 10101),
(9, 'Diagnostic Gauge', 151, 20202),
(9, 'Diagnostic Gauge', 151, 30303),
(9, 'Diagnostic Gauge', 151, 40404),
(9, 'Diagnostic Gauge', 151, 50505),
(10, 'Compression Tester', 47, 10101),
(10, 'Compression Tester', 47, 20202),
(10, 'Compression Tester', 47, 30303),
(10, 'Compression Tester', 47, 40404),
(10, 'Compression Tester', 47, 50505);

-- --------------------------------------------------------

--
-- Table structure for table `parts_used`
--

CREATE TABLE `parts_used` (
  `Parts_Num` int(11) NOT NULL,
  `Service_Type` varchar(100) NOT NULL,
  `Vehicle_Type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `parts_used`
--

INSERT INTO `parts_used` (`Parts_Num`, `Service_Type`, `Vehicle_Type`) VALUES
(1, 'Front End Alignments', 'Sedan'),
(1, 'Front End Alignments', 'Sports Car'),
(1, 'Front End Alignments', 'SUV'),
(1, 'Front End Alignments', 'Truck'),
(2, 'Oil Changes', 'Sedan'),
(2, 'Oil Changes', 'Sports Car'),
(2, 'Oil Changes', 'SUV'),
(2, 'Oil Changes', 'Truck'),
(3, 'Oil Changes', 'Sedan'),
(3, 'Oil Changes', 'Sports Car'),
(3, 'Oil Changes', 'SUV'),
(3, 'Oil Changes', 'Truck'),
(4, 'Brakes', 'Sedan'),
(4, 'Brakes', 'Sports Car'),
(4, 'Brakes', 'SUV'),
(4, 'Brakes', 'Truck'),
(5, 'Brakes', 'Sedan'),
(5, 'Brakes', 'Sports Car'),
(5, 'Brakes', 'SUV'),
(5, 'Brakes', 'Truck'),
(6, 'Tire repairs and replacements', 'Sedan'),
(6, 'Tire repairs and replacements', 'Sports Car'),
(6, 'Tire repairs and replacements', 'SUV'),
(6, 'Tire repairs and replacements', 'Truck'),
(7, 'Engine tune-ups', 'Sedan'),
(7, 'Engine tune-ups', 'Sports Car'),
(7, 'Engine tune-ups', 'SUV'),
(7, 'Engine tune-ups', 'Truck'),
(9, 'Vehicle Computer diagnostics', 'Sedan'),
(9, 'Vehicle Computer diagnostics', 'Sports Car'),
(9, 'Vehicle Computer diagnostics', 'SUV'),
(9, 'Vehicle Computer diagnostics', 'Truck'),
(10, 'State Vehicle Inspections', 'Sedan'),
(10, 'State Vehicle Inspections', 'Sports Car'),
(10, 'State Vehicle Inspections', 'SUV'),
(10, 'State Vehicle Inspections', 'Truck');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `Service_Type` varchar(100) NOT NULL,
  `Vehicle_Type` varchar(30) NOT NULL,
  `Labor_Charge` int(11) DEFAULT NULL,
  `Skill_Id` char(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`Service_Type`, `Vehicle_Type`, `Labor_Charge`, `Skill_Id`) VALUES
('Brakes', 'Sedan', 70, '703211603'),
('Brakes', 'Sports Car', 150, '703211603'),
('Brakes', 'SUV', 82, '703211603'),
('Brakes', 'Truck', 120, '703211603'),
('Engine tune-ups', 'Sedan', 200, '703211604'),
('Engine tune-ups', 'Sports Car', 400, '703211604'),
('Engine tune-ups', 'SUV', 200, '703211604'),
('Engine tune-ups', 'Truck', 300, '703211604'),
('Front End Alignments', 'Sedan', 75, '703211602'),
('Front End Alignments', 'Sports Car', 160, '703211602'),
('Front End Alignments', 'SUV', 75, '703211602'),
('Front End Alignments', 'Truck', 110, '703211602'),
('Oil Changes', 'Sedan', 65, '703211601'),
('Oil Changes', 'Sports Car', 125, '703211601'),
('Oil Changes', 'SUV', 65, '703211601'),
('Oil Changes', 'Truck', 100, '703211601'),
('State Vehicle Inspections', 'Sedan', 50, '703211606'),
('State Vehicle Inspections', 'Sports Car', 100, '703211606'),
('State Vehicle Inspections', 'SUV', 50, '703211606'),
('State Vehicle Inspections', 'Truck', 75, '703211606'),
('Tire repairs and replacements', 'Sedan', 80, '703211603'),
('Tire repairs and replacements', 'Sports Car', 120, '703211603'),
('Tire repairs and replacements', 'SUV', 80, '703211603'),
('Tire repairs and replacements', 'Truck', 100, '703211603'),
('Vehicle Computer diagnostics', 'Sedan', 75, '703211605'),
('Vehicle Computer diagnostics', 'Sports Car', 120, '703211605'),
('Vehicle Computer diagnostics', 'SUV', 80, '703211605'),
('Vehicle Computer diagnostics', 'Truck', 100, '703211605');

-- --------------------------------------------------------

--
-- Table structure for table `service_appointment`
--

CREATE TABLE `service_appointment` (
  `Service_Appt_Id` int(11) NOT NULL,
  `Appt_Date` varchar(15) NOT NULL,
  `Cust_Id` int(11) NOT NULL,
  `V_Number` char(17) NOT NULL,
  `Location_Id` int(11) NOT NULL,
  `Status` varchar(30) NOT NULL DEFAULT 'pending',
  `Service_Type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `service_appointment`
--

INSERT INTO `service_appointment` (`Service_Appt_Id`, `Appt_Date`, `Cust_Id`, `V_Number`, `Location_Id`, `Status`, `Service_Type`) VALUES
(5, '2023-04-17', 1, '12345678901234567', 10101, 'closed', 'Oil Changes'),
(7, '2023-04-20', 1, '12345678901234567', 10101, 'closed', 'Vehicle Computer diagnostics'),
(8, '2023-04-14', 11, '34340909879574638', 20202, 'closed', 'Brakes'),
(9, '2023-04-16', 11, '89876768762121223', 20202, 'closed', 'Oil Changes'),
(10, '2023-04-14', 11, '34340909879574638', 20202, 'in progress', 'Tire repairs and replacements'),
(11, '2023-04-18', 10, '77867652343432123', 30303, 'closed', 'Front End Alignments'),
(12, '2023-04-19', 10, '55464532123467890', 30303, 'waiting for parts', 'Front End Alignments'),
(13, '2023-04-13', 9, '89089089089078654', 40404, 'closed', 'Front End Alignments'),
(14, '2023-04-13', 9, '89089089089078654', 40404, 'closed', 'Engine tune-ups'),
(15, '2023-04-17', 9, '45645645378273645', 40404, 'pending', 'Vehicle Computer diagnostics'),
(16, '2023-04-22', 8, '21213232434354540', 30303, 'closed', 'Oil Changes'),
(17, '2023-04-20', 8, '38475657009821274', 30303, 'pending', 'State Vehicle Inspections'),
(18, '2023-04-22', 8, '90898972635123764', 30303, 'closed', 'Engine tune-ups'),
(19, '2023-04-15', 8, '21213232434354540', 40404, 'waiting for parts', 'Tire repairs and replacements'),
(20, '2023-04-19', 8, '90898972635123764', 30303, 'closed', 'Vehicle Computer diagnostics'),
(21, '2023-04-16', 8, '38475657009821274', 40404, 'closed', 'Tire repairs and replacements'),
(22, '2023-04-19', 7, '12341234567898765', 50505, 'complete', 'Brakes'),
(23, '2023-04-22', 7, '12341234567898765', 50505, 'complete', 'Engine tune-ups'),
(24, '2023-04-22', 7, '49586743275849384', 50505, 'in progress', 'Tire repairs and replacements'),
(25, '2023-04-22', 7, '49586743275849384', 50505, 'pending', 'Front End Alignments'),
(26, '2023-04-22', 6, '12125656343478789', 10101, 'pending', 'Vehicle Computer diagnostics'),
(27, '2023-04-22', 6, '12125656343478789', 10101, 'closed', 'Tire repairs and replacements'),
(28, '2023-04-23', 6, '23234545676789899', 10101, 'closed', 'State Vehicle Inspections'),
(29, '2023-04-17', 5, '10293847561029384', 10101, 'closed', 'Brakes'),
(30, '2023-04-14', 5, '23456789012345678', 20202, 'closed', 'Engine tune-ups'),
(31, '2023-04-19', 5, '23456789012345678', 20202, 'pending', 'Oil Changes'),
(32, '2023-04-15', 5, '56789012345678900', 20202, 'complete', 'Tire repairs and replacements'),
(33, '2023-04-19', 5, '56789012345678900', 20202, 'closed', 'Front End Alignments'),
(34, '2023-04-22', 4, '13579246801234567', 30303, 'closed', 'Engine tune-ups'),
(35, '2023-04-13', 4, '98765432109876543', 30303, 'closed', 'Brakes'),
(36, '2023-04-17', 4, '98765432109876543', 30303, 'complete', 'State Vehicle Inspections'),
(37, '2023-04-25', 3, '12345678901234568', 40404, 'pending', 'Vehicle Computer diagnostics'),
(38, '2023-04-23', 3, '12345678909876543', 10101, 'complete', 'Oil Changes'),
(39, '2023-04-23', 3, '12345678909876543', 10101, 'closed', 'Engine tune-ups');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `Skill_Id` char(9) NOT NULL,
  `Skill_Name` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`Skill_Id`, `Skill_Name`) VALUES
('703211601', 'Oil Change'),
('703211602', 'Alignment Specialist'),
('703211603', 'Brake Tire Specialist'),
('703211604', 'Engine Performance Technician'),
('703211605', 'Diagnostic Specialist'),
('703211606', 'Vehicle Inspector');

-- --------------------------------------------------------

--
-- Table structure for table `techinician_skill`
--

CREATE TABLE `techinician_skill` (
  `Skill_Id` char(9) NOT NULL,
  `SSN` char(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `techinician_skill`
--

INSERT INTO `techinician_skill` (`Skill_Id`, `SSN`) VALUES
('703211601', '136578968'),
('703211601', '212376898'),
('703211601', '354345654'),
('703211601', '736575968'),
('703211601', '768576857'),
('703211601', '909890998'),
('703211602', '124489008'),
('703211602', '414236767'),
('703211602', '562376008'),
('703211602', '768576857'),
('703211602', '909890998'),
('703211602', '954489008'),
('703211603', '124489008'),
('703211603', '212113341'),
('703211603', '222341893'),
('703211603', '453387978'),
('703211603', '734908113'),
('703211603', '912396899'),
('703211604', '102938475'),
('703211604', '222349083'),
('703211604', '453134218'),
('703211604', '569890998'),
('703211604', '672376891'),
('703211605', '102938475'),
('703211605', '671134218'),
('703211605', '767439988'),
('703211605', '912396899'),
('703211605', '954489008'),
('703211606', '102938475'),
('703211606', '212376898'),
('703211606', '736575968'),
('703211606', '812396812'),
('703211606', '989111325');

-- --------------------------------------------------------

--
-- Table structure for table `technician`
--

CREATE TABLE `technician` (
  `SSN` char(9) NOT NULL,
  `Hourly_wage` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `technician`
--

INSERT INTO `technician` (`SSN`, `Hourly_wage`) VALUES
('102938475', 47),
('124489008', 56),
('136578968', 55),
('212113341', 67),
('212376898', 64),
('222341893', 62),
('222349083', 65),
('354345654', 40),
('414236767', 75),
('453134218', 56),
('453387978', 47),
('562376008', 64),
('569890998', 64),
('671134218', 47),
('672376891', 67),
('734908113', 64),
('736575968', 56),
('767439988', 56),
('768576857', 64),
('812396812', 55),
('909890998', 44),
('912396899', 47),
('954489008', 55),
('989111325', 64);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `V_Number` char(17) NOT NULL,
  `V_Type` varchar(50) DEFAULT NULL,
  `Model` varchar(50) DEFAULT NULL,
  `Manufacturer` varchar(50) DEFAULT NULL,
  `Color` varchar(15) DEFAULT NULL,
  `Purchase_Year` char(4) DEFAULT NULL,
  `Cust_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`V_Number`, `V_Type`, `Model`, `Manufacturer`, `Color`, `Purchase_Year`, `Cust_Id`) VALUES
('10293847561029384', 'SUV', 'BMW X2', 'BMW', 'White', '2020', 5),
('12117897654323443', 'Sedan', 'Aston Martin Vantage', 'Aston martin', 'Grey', '2015', 11),
('12125656343478789', 'Truck', 'GMC Sierra', 'GMC', 'Grey', '2018', 6),
('12341234567898765', 'SUV', 'Maruti Ertiga', 'Maruti', 'Grey', '2021', 7),
('12345678900987654', 'Sedan', 'Vernaa', 'Hyundai', 'Black', '2010', 1),
('12345678901234567', 'Sports', 'Spyder', 'Ferrarii', 'Red', '2020', 1),
('12345678901234568', 'SUV', 'Mercedes Benz GLC Class', 'Toyota Motor Manufacturer', 'Black', '2018', 3),
('12345678909876543', 'SUV', 'MG Hector', 'Toyota Motor Manufacturer', 'Grey', '2021', 3),
('13579246801234567', 'Truck', 'Honda Ridgeline', 'Honda', 'Red', '2022', 4),
('21213232434354540', 'SUV', 'Honda Pilot', 'Honda', 'Red', '2019', 8),
('23234545676789899', 'Sports Car', 'Audi R8', 'Audi', 'Black', '2021', 6),
('23456789012345678', 'Sedan', 'Verna', 'Honda', 'Grey', '2013', 5),
('34340909879574638', 'Sedan', 'Chevrolet Corvette', 'Chevrolet', 'Red', '2015', 11),
('38475657009821274', 'Sports Car', 'Ford Mustang', 'Ford', 'Black', '2018', 8),
('45645645378273645', 'Truck', 'Chevrolet Colorado', 'Chevrolet', 'Black', '2015', 9),
('49586743275849384', 'Sedan', 'Kia Rio', 'Kia', 'Black', '2018', 7),
('55464532123467890', 'Sports Car', 'Porsche 911', 'Porsche', 'Red', '2018', 10),
('56789012345678900', 'Sedan', 'Lexus RX 350', 'Hyundai', 'Black', '2019', 5),
('77867652343432123', 'Sedan', 'Bentley Flying Spur', 'Bentley', 'Blue', '2019', 10),
('89089089089078654', 'Truck', 'Ford F-150', 'Ford', 'White', '2013', 9),
('89876768762121223', 'SUV', 'Chevrolet Suburban', 'Chevrolet', 'Black', '2016', 11),
('90898972635123764', 'Sedan', 'Honda Civic', 'Honda', 'White', '2019', 8),
('98765432109876543', 'Sports Car', 'Ferrari', 'Ferrarii', 'Black', '2019', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Cust_Id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`SSN`),
  ADD KEY `Location_Id` (`Location_Id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`Invoice_Id`);

--
-- Indexes for table `invoice_details`
--
ALTER TABLE `invoice_details`
  ADD PRIMARY KEY (`Invoice_Id`) USING BTREE;

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`Location_Id`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`SSN`);

--
-- Indexes for table `parts_inventory`
--
ALTER TABLE `parts_inventory`
  ADD PRIMARY KEY (`Parts_Num`,`Location_Id`),
  ADD KEY `Location_Id` (`Location_Id`);

--
-- Indexes for table `parts_used`
--
ALTER TABLE `parts_used`
  ADD PRIMARY KEY (`Parts_Num`,`Service_Type`,`Vehicle_Type`),
  ADD KEY `Service_Type` (`Service_Type`,`Vehicle_Type`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`Service_Type`,`Vehicle_Type`),
  ADD KEY `Skill_Id` (`Skill_Id`);

--
-- Indexes for table `service_appointment`
--
ALTER TABLE `service_appointment`
  ADD PRIMARY KEY (`Service_Appt_Id`),
  ADD KEY `Cust_Id` (`Cust_Id`),
  ADD KEY `V_Number` (`V_Number`),
  ADD KEY `Location_Id` (`Location_Id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`Skill_Id`);

--
-- Indexes for table `techinician_skill`
--
ALTER TABLE `techinician_skill`
  ADD PRIMARY KEY (`Skill_Id`,`SSN`),
  ADD KEY `SSN` (`SSN`);

--
-- Indexes for table `technician`
--
ALTER TABLE `technician`
  ADD PRIMARY KEY (`SSN`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`V_Number`),
  ADD KEY `Cust_Id` (`Cust_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `Cust_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `invoice_details`
--
ALTER TABLE `invoice_details`
  MODIFY `Invoice_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `service_appointment`
--
ALTER TABLE `service_appointment`
  MODIFY `Service_Appt_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`Location_Id`) REFERENCES `location` (`Location_Id`);

--
-- Constraints for table `manager`
--
ALTER TABLE `manager`
  ADD CONSTRAINT `manager_ibfk_1` FOREIGN KEY (`SSN`) REFERENCES `employee` (`SSN`);

--
-- Constraints for table `parts_inventory`
--
ALTER TABLE `parts_inventory`
  ADD CONSTRAINT `parts_inventory_ibfk_1` FOREIGN KEY (`Location_Id`) REFERENCES `location` (`Location_Id`);

--
-- Constraints for table `parts_used`
--
ALTER TABLE `parts_used`
  ADD CONSTRAINT `parts_used_ibfk_1` FOREIGN KEY (`Parts_Num`) REFERENCES `parts_inventory` (`Parts_Num`),
  ADD CONSTRAINT `parts_used_ibfk_2` FOREIGN KEY (`Service_Type`,`Vehicle_Type`) REFERENCES `services` (`Service_Type`, `Vehicle_Type`);

--
-- Constraints for table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_ibfk_1` FOREIGN KEY (`Skill_Id`) REFERENCES `skills` (`Skill_Id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `service_appointment`
--
ALTER TABLE `service_appointment`
  ADD CONSTRAINT `service_appointment_ibfk_1` FOREIGN KEY (`Cust_Id`) REFERENCES `customer` (`Cust_Id`),
  ADD CONSTRAINT `service_appointment_ibfk_2` FOREIGN KEY (`V_Number`) REFERENCES `vehicle` (`V_Number`),
  ADD CONSTRAINT `service_appointment_ibfk_3` FOREIGN KEY (`Location_Id`) REFERENCES `location` (`Location_Id`);

--
-- Constraints for table `techinician_skill`
--
ALTER TABLE `techinician_skill`
  ADD CONSTRAINT `techinician_skill_ibfk_1` FOREIGN KEY (`Skill_Id`) REFERENCES `skills` (`Skill_Id`),
  ADD CONSTRAINT `techinician_skill_ibfk_2` FOREIGN KEY (`SSN`) REFERENCES `technician` (`SSN`);

--
-- Constraints for table `technician`
--
ALTER TABLE `technician`
  ADD CONSTRAINT `technician_ibfk_1` FOREIGN KEY (`SSN`) REFERENCES `employee` (`SSN`);

--
-- Constraints for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD CONSTRAINT `vehicle_ibfk_1` FOREIGN KEY (`Cust_Id`) REFERENCES `customer` (`Cust_Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2024 at 07:38 AM
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
-- Database: `sales_inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `category_list`
--

CREATE TABLE `category_list` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category_list`
--

INSERT INTO `category_list` (`id`, `name`) VALUES
(1, 'Can Goods'),
(2, 'Shampoo'),
(3, 'Hygiene'),
(4, 'Snacks'),
(5, 'Drinks'),
(6, 'Rice'),
(10, 'Dishwashing Liquid'),
(11, 'Beverages');

-- --------------------------------------------------------

--
-- Table structure for table `customer_list`
--

CREATE TABLE `customer_list` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `contact` varchar(30) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer_list`
--

INSERT INTO `customer_list` (`id`, `name`, `contact`, `address`) VALUES
(1, 'John Smith', '8747808787', 'Sample Only'),
(3, 'John Brian Abalos', '09122385601', 'Manatad, Sibonga, Cebu'),
(4, 'Mil Jay Peresores', '09154738403', 'Magcagong, Sibonga, Cebu'),
(5, 'Gerold Caballes', '0935401236', 'Candaguit, Sibonga, Cebu'),
(6, 'Jason Ordeniza', '09412364545', 'Bae, Sibonga, Cebu');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` int(30) NOT NULL,
  `product_id` int(30) NOT NULL,
  `qty` int(30) NOT NULL,
  `type` tinyint(1) NOT NULL COMMENT '1= stockin , 2 = stockout',
  `stock_from` varchar(100) NOT NULL COMMENT 'sales/receiving',
  `form_id` int(30) NOT NULL,
  `other_details` text NOT NULL,
  `remarks` text NOT NULL,
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `product_id`, `qty`, `type`, `stock_from`, `form_id`, `other_details`, `remarks`, `date_updated`) VALUES
(18, 1, 2, 2, 'Sales', 0, '{\"price\":\"75\",\"qty\":\"2\"}', 'Stock out from Sales-00000000\r\n', '2020-09-22 15:19:22'),
(19, 1, 2, 2, 'Sales', 0, '{\"price\":\"75\",\"qty\":\"2\"}', 'Stock out from Sales-00000000\r\n', '2020-09-22 15:20:03'),
(26, 6, 120, 1, 'receiving', 3, '{\"price\":\"2300\",\"qty\":\"120\"}', 'Stock from Receiving-00000000\n', '2023-07-17 13:04:02'),
(27, 6, 6, 2, 'Sales', 8, '{\"price\":\"2500\",\"qty\":\"6\"}', 'Stock out from Sales-17627402\n', '2023-07-17 13:12:58'),
(28, 7, 200, 1, 'receiving', 4, '{\"price\":\"20\",\"qty\":\"200\"}', 'Stock from Receiving-73230554\n', '2023-07-17 13:21:29'),
(29, 8, 300, 1, 'receiving', 5, '{\"price\":\"5\",\"qty\":\"300\"}', 'Stock from Receiving-54797315\n', '2023-07-17 14:41:01'),
(30, 7, 5, 2, 'Sales', 9, '{\"price\":\"25\",\"qty\":\"5\"}', 'Stock out from Sales-66197219\n', '2023-07-18 06:00:02'),
(33, 6, 1, 2, 'Sales', 11, '{\"price\":\"2500\",\"qty\":\"1\"}', 'Stock out from Sales-52275316\r\n', '2023-08-19 18:40:22'),
(34, 7, 3, 2, 'Sales', 11, '{\"price\":\"25\",\"qty\":\"3\"}', 'Stock out from Sales-52275316\r\n', '2023-08-19 18:40:22'),
(35, 6, 1, 2, 'Sales', 12, '{\"price\":\"2500\",\"qty\":\"1\"}', 'Stock out from Sales-11041321\r\n', '2023-09-04 10:55:51'),
(37, 1, 9, 1, 'receiving', 7, '{\"price\":\"9\",\"qty\":\"9\"}', 'Stock from Receiving-60202462\n', '2023-09-07 15:16:32'),
(38, 6, 6, 2, 'Sales', 14, '{\"price\":\"2500\",\"qty\":\"6\"}', 'Stock out from Sales-91713865\r\n', '2023-09-28 16:41:27'),
(39, 21, 20, 1, 'receiving', 8, '{\"price\":\"30\",\"qty\":\"20\"}', 'Stock from Receiving-76332331\r\n', '2023-09-28 16:38:56'),
(48, 21, 3, 1, 'receiving', 9, '{\"price\":\"20\",\"qty\":\"3\"}', 'Stock from Receiving-60590286\n', '2023-12-13 08:32:05'),
(49, 21, 2, 2, 'Sales', 23, '{\"price\":\"35\",\"qty\":\"2\"}', 'Stock out from Sales-00000000\n', '2024-01-02 21:19:24'),
(55, 21, 1, 2, 'Sales', 29, '{\"price\":\"35\",\"qty\":\"1\"}', 'Stock out from Sales-41488250\n', '2024-01-03 06:24:27'),
(57, 8, 1, 2, 'Sales', 31, '{\"price\":\"10\",\"qty\":\"1\"}', 'Stock out from Sales-95623022\r\n', '2024-01-03 14:10:35');

-- --------------------------------------------------------

--
-- Table structure for table `product_list`
--

CREATE TABLE `product_list` (
  `id` int(30) NOT NULL,
  `category_id` int(30) NOT NULL,
  `sku` varchar(50) NOT NULL,
  `price` double NOT NULL,
  `name` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `manufacture_date` date NOT NULL,
  `expire_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_list`
--

INSERT INTO `product_list` (`id`, `category_id`, `sku`, `price`, `name`, `description`, `manufacture_date`, `expire_date`) VALUES
(6, 6, '43737878', 2500, 'Ivory', 'Ivory Rice 50 kg', '2023-09-27', '2025-10-11'),
(7, 1, '73331461', 30, 'Argentina', 'Argentina beef Loaf', '2022-05-03', '2024-01-27'),
(8, 10, '99930797', 10, 'Joy', 'Joy Dish-washing Liquid', '2023-05-16', '2025-05-16'),
(16, 11, '70317782', 100, 'Red Horse', 'Red Horse Beer', '2023-08-27', '2025-09-27'),
(21, 5, '79765483', 35, 'Coca-cola', 'Coca-Cola: Taste the Feeling 1L', '2023-09-28', '2025-05-28'),
(25, 11, '78834081', 40, 'Sprite', 'Sprite Lemon Flavor', '2023-10-02', '2025-10-18');

-- --------------------------------------------------------

--
-- Table structure for table `receiving_list`
--

CREATE TABLE `receiving_list` (
  `id` int(30) NOT NULL,
  `ref_no` varchar(100) NOT NULL,
  `supplier_id` int(30) NOT NULL,
  `total_amount` double NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `receiving_list`
--

INSERT INTO `receiving_list` (`id`, `ref_no`, `supplier_id`, `total_amount`, `date_added`) VALUES
(3, '00000000\n', 3, 276000, '2023-07-17 13:04:02'),
(4, '73230554\n', 4, 4000, '2023-07-17 13:21:29'),
(5, '54797315\n', 4, 1500, '2023-07-17 14:41:01'),
(7, '60202462\n', 5, 81, '2023-09-07 15:16:32'),
(8, '76332331\n', 6, 600, '2023-09-28 16:38:12'),
(9, '60590286\n', 4, 60, '2023-12-13 08:32:05');

-- --------------------------------------------------------

--
-- Table structure for table `sales_list`
--

CREATE TABLE `sales_list` (
  `id` int(30) NOT NULL,
  `ref_no` varchar(30) NOT NULL,
  `customer_id` int(30) NOT NULL,
  `customer_type` varchar(100) NOT NULL,
  `total_amount` double NOT NULL,
  `amount_tendered` double NOT NULL,
  `amount_change` double NOT NULL,
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales_list`
--

INSERT INTO `sales_list` (`id`, `ref_no`, `customer_id`, `customer_type`, `total_amount`, `amount_tendered`, `amount_change`, `date_updated`) VALUES
(8, '17627402\n', 5, '', 15000, 15000, 0, '2023-07-17 13:12:58'),
(9, '66197219\n', 0, '', 125, 200, 75, '2023-07-18 06:00:02'),
(11, '52275316\n', 0, '', 2575, 3000, 425, '2023-08-19 18:40:22'),
(12, '11041321\n', 3, '', 2500, 3000, 500, '2023-09-04 10:57:29'),
(14, '91713865\n', 0, '', 15000, 15000, 0, '2023-09-28 16:41:27'),
(23, '00000000\n', 5, '', 70, 70, 0, '2024-01-02 21:19:24'),
(29, '41488250\n', 6, 'Retailer', 35, 40, 5, '2024-01-03 06:24:27'),
(31, '95623022\n', 0, 'Retailer', 10, 10, 0, '2024-01-03 14:10:35');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_list`
--

CREATE TABLE `supplier_list` (
  `id` int(30) NOT NULL,
  `supplier_name` text NOT NULL,
  `contact` varchar(30) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supplier_list`
--

INSERT INTO `supplier_list` (`id`, `supplier_name`, `contact`, `address`) VALUES
(1, 'Supplier 1', '65524556', 'Sample Address'),
(3, 'Supplier 2', '6546531', 'Supplier2 Address'),
(4, 'Nesfer Merchandise', '09123546576', 'Sibonga, Cebu'),
(5, 'Pure Foods Corporation', '09126789876', 'Cebu City'),
(6, 'WL Foods Corporation', '09075677890', 'Cebu City');

-- --------------------------------------------------------

--
-- Table structure for table `system_settings`
--

CREATE TABLE `system_settings` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `cover_img` text NOT NULL,
  `about_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `system_settings`
--

INSERT INTO `system_settings` (`id`, `name`, `email`, `contact`, `cover_img`, `about_content`) VALUES
(1, 'Online Food Ordering System', 'info@sample.com', '+6948 8542 623', '1600654680_photo-1504674900247-0877df9cc836.jpg', '&lt;p style=&quot;text-align: center; background: transparent; position: relative;&quot;&gt;&lt;span style=&quot;font-size:28px;background: transparent; position: relative;&quot;&gt;ABOUT US&lt;/span&gt;&lt;/b&gt;&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center; background: transparent; position: relative;&quot;&gt;&lt;span style=&quot;background: transparent; position: relative; font-size: 14px;&quot;&gt;&lt;span style=&quot;font-size:28px;background: transparent; position: relative;&quot;&gt;&lt;b style=&quot;margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; text-align: justify;&quot;&gt;Lorem Ipsum&lt;/b&gt;&lt;span style=&quot;color: rgb(0, 0, 0); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; font-weight: 400; text-align: justify;&quot;&gt;&amp;nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&amp;#x2019;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/span&gt;&lt;br&gt;&lt;/span&gt;&lt;/b&gt;&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center; background: transparent; position: relative;&quot;&gt;&lt;span style=&quot;background: transparent; position: relative; font-size: 14px;&quot;&gt;&lt;span style=&quot;font-size:28px;background: transparent; position: relative;&quot;&gt;&lt;span style=&quot;color: rgb(0, 0, 0); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; font-weight: 400; text-align: justify;&quot;&gt;&lt;br&gt;&lt;/span&gt;&lt;/b&gt;&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center; background: transparent; position: relative;&quot;&gt;&lt;span style=&quot;background: transparent; position: relative; font-size: 14px;&quot;&gt;&lt;span style=&quot;font-size:28px;background: transparent; position: relative;&quot;&gt;&lt;h2 style=&quot;font-size:28px;background: transparent; position: relative;&quot;&gt;Where does it come from?&lt;/h2&gt;&lt;p style=&quot;text-align: center; margin-bottom: 15px; padding: 0px; color: rgb(0, 0, 0); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; font-weight: 400;&quot;&gt;Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.&lt;/p&gt;&lt;/span&gt;&lt;/b&gt;&lt;/span&gt;&lt;/p&gt;');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(30) NOT NULL,
  `name` varchar(200) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 2 COMMENT '1=admin , 2 = cashier'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `type`) VALUES
(1, 'JC Cudera', 'Administrator', 'admin01', 1),
(3, 'John Brian Abalos', 'Cashier', 'johnbrian01', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category_list`
--
ALTER TABLE `category_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_list`
--
ALTER TABLE `customer_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_list`
--
ALTER TABLE `product_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receiving_list`
--
ALTER TABLE `receiving_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_list`
--
ALTER TABLE `sales_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier_list`
--
ALTER TABLE `supplier_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_settings`
--
ALTER TABLE `system_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category_list`
--
ALTER TABLE `category_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `customer_list`
--
ALTER TABLE `customer_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `product_list`
--
ALTER TABLE `product_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `receiving_list`
--
ALTER TABLE `receiving_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sales_list`
--
ALTER TABLE `sales_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `supplier_list`
--
ALTER TABLE `supplier_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `system_settings`
--
ALTER TABLE `system_settings`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

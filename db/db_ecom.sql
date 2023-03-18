-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2022 at 08:43 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_category`
--

CREATE TABLE `tb_category` (
  `cat_id` int(11) NOT NULL COMMENT 'id ประเภทสินค้า',
  `cat_name` varchar(100) NOT NULL COMMENT 'ประเภทสินค้า',
  `created_at` datetime NOT NULL,
  `update_at` datetime NOT NULL,
  `del_status` int(11) NOT NULL,
  `del_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_category`
--

INSERT INTO `tb_category` (`cat_id`, `cat_name`, `created_at`, `update_at`, `del_status`, `del_at`) VALUES
(1, '1', '2022-10-23 10:38:16', '2022-10-23 10:38:16', 1, '2022-10-23 10:38:16');

-- --------------------------------------------------------

--
-- Table structure for table `tb_employee`
--

CREATE TABLE `tb_employee` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_order`
--

CREATE TABLE `tb_order` (
  `order_id` int(11) NOT NULL COMMENT 'id order ',
  `user_id` int(11) NOT NULL COMMENT 'id ผู้ใช้งานที่สั่งซื้อ',
  `order_amount` int(11) NOT NULL COMMENT 'จำนวนสินค้าที่ซื้อทั้งหมด',
  `order_total` double NOT NULL COMMENT 'ราคารวม',
  `order_status` int(11) NOT NULL COMMENT 'สถานะ',
  `pay_total` double NOT NULL COMMENT 'จำนวนเงินที่จ่าย',
  `pay_date` text NOT NULL COMMENT 'วันที่จ่าย',
  `pay_time` time NOT NULL COMMENT 'เวลาที่จ่าย',
  `pay_pic` text CHARACTER SET utf8 NOT NULL COMMENT 'รูปสลิป',
  `pay_status` int(11) NOT NULL COMMENT 'สถานะการตรวจสอบ',
  `created_at` datetime NOT NULL,
  `update_at` datetime NOT NULL,
  `del_status` int(11) NOT NULL,
  `del_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_order`
--

INSERT INTO `tb_order` (`order_id`, `user_id`, `order_amount`, `order_total`, `order_status`, `pay_total`, `pay_date`, `pay_time`, `pay_pic`, `pay_status`, `created_at`, `update_at`, `del_status`, `del_at`) VALUES
(1, 0, 0, 0, 0, 0, '', '00:00:00', '', 0, '2022-10-18 17:11:51', '2022-10-18 17:11:51', 0, '2022-10-18 17:11:51');

-- --------------------------------------------------------

--
-- Table structure for table `tb_orderitem`
--

CREATE TABLE `tb_orderitem` (
  `item_id` int(11) NOT NULL COMMENT 'id item ของ order',
  `order_id` int(11) NOT NULL COMMENT 'id order',
  `pro_id` int(11) NOT NULL COMMENT 'id สินค้า',
  `pro_amount` int(11) NOT NULL COMMENT 'จำนวนสินค้าที่สั่ง',
  `pro_price_now` double NOT NULL COMMENT 'ราคาสินค้าตอนซื้อ',
  `pro_total` double NOT NULL COMMENT 'ราคารวมสินค้า',
  `created_at` datetime NOT NULL,
  `update_at` datetime NOT NULL,
  `del_status` int(11) NOT NULL,
  `del_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_product`
--

CREATE TABLE `tb_product` (
  `pro_id` int(11) NOT NULL COMMENT 'id สินค้า',
  `cat_id` int(11) NOT NULL COMMENT 'id ประเภทสินค้า',
  `pro_name` varchar(100) NOT NULL COMMENT 'ชื่อสินค้า',
  `pro_detail` text NOT NULL COMMENT 'รายละเอียดสินค้า',
  `pro_amount` int(11) NOT NULL COMMENT 'จำนวนสินค้า',
  `pro_price` double NOT NULL COMMENT 'ราคาสินค้า',
  `pro_sale` int(11) NOT NULL COMMENT 'จำนวนยอดขาย',
  `pro_status` int(11) NOT NULL COMMENT 'สถานะสินค้า ',
  `pro_pic` text NOT NULL COMMENT 'รูปสินค้า',
  `pro_costprice` double NOT NULL COMMENT 'ราคาทุน',
  `pro_low` double NOT NULL COMMENT 'จำนวนสินค้าต่ำสุด',
  `created_at` datetime NOT NULL,
  `update_at` datetime NOT NULL,
  `del_status` int(11) NOT NULL,
  `del_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_product`
--

INSERT INTO `tb_product` (`pro_id`, `cat_id`, `pro_name`, `pro_detail`, `pro_amount`, `pro_price`, `pro_sale`, `pro_status`, `pro_pic`, `pro_costprice`, `pro_low`, `created_at`, `update_at`, `del_status`, `del_at`) VALUES
(1, 1, 'test', 'Simply dummy text of the printingggggggggggggggbbbbbbbbbbbccc.', 1, 26, 1, 1, '11.jpg', 1, 1, '2022-10-18 17:55:40', '2022-10-18 17:55:40', 0, '2022-10-18 17:55:40'),
(2, 1, 'test1', 'Simply dummy text of the printing.', 1, 36, 1, 1, '11.jpg', 1, 1, '2022-10-18 18:16:28', '2022-10-18 18:16:28', 0, '2022-10-18 18:16:28');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `user_id` int(11) NOT NULL COMMENT 'id user',
  `role_id` int(11) NOT NULL COMMENT 'id ของประเภทผู้ใช้งาน',
  `fname` varchar(100) NOT NULL COMMENT 'ชื่อ',
  `lname` varchar(100) NOT NULL COMMENT 'สกุล',
  `username` varchar(100) NOT NULL COMMENT 'username',
  `password` varchar(100) NOT NULL COMMENT 'รหัส',
  `phone` varchar(13) NOT NULL COMMENT 'เบอร์',
  `email` varchar(255) NOT NULL COMMENT 'email',
  `address` text NOT NULL COMMENT 'ที่อยู่',
  `zipcode` varchar(5) NOT NULL COMMENT 'รหัสไปรษณย์',
  `created_at` datetime NOT NULL,
  `last_login` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`user_id`, `role_id`, `fname`, `lname`, `username`, `password`, `phone`, `email`, `address`, `zipcode`, `created_at`, `last_login`) VALUES
(4, 1, 'admin', 'admin', '1111', 'b59c67bf196a4758191e42f76670ceba', '111111111', '', '', '', '2022-08-29 23:04:28', '2022-08-29 23:56:15'),
(5, 2, 'Topsan', 'Srichum', '1234', '81dc9bdb52d04dc20036dbd8313ed055', '0648756897', '', '', '', '2022-08-29 23:06:16', '2022-08-29 23:28:37');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `role_id` int(11) NOT NULL COMMENT 'id ประเภทผู้ใช้',
  `role_name` varchar(255) NOT NULL COMMENT 'ชื่อประเภทผู้ใช้',
  `created_at` datetime NOT NULL,
  `update_at` datetime NOT NULL,
  `del_status` int(11) NOT NULL,
  `del_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_category`
--
ALTER TABLE `tb_category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `tb_order`
--
ALTER TABLE `tb_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `tb_orderitem`
--
ALTER TABLE `tb_orderitem`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `tb_product`
--
ALTER TABLE `tb_product`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_category`
--
ALTER TABLE `tb_category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id ประเภทสินค้า', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_order`
--
ALTER TABLE `tb_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id order ', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_orderitem`
--
ALTER TABLE `tb_orderitem`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id item ของ order';

--
-- AUTO_INCREMENT for table `tb_product`
--
ALTER TABLE `tb_product`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id สินค้า', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id user', AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id ประเภทผู้ใช้';
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

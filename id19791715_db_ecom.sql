-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 18 มี.ค. 2023 เมื่อ 05:04 PM
-- เวอร์ชันของเซิร์ฟเวอร์: 10.5.16-MariaDB
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id19791715_db_ecom`
--

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `tb_category`
--

CREATE TABLE `tb_category` (
  `cat_id` int(11) NOT NULL COMMENT 'id ประเภทสินค้า',
  `cat_name` varchar(100) NOT NULL COMMENT 'ประเภทสินค้า',
  `del_status` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- dump ตาราง `tb_category`
--

INSERT INTO `tb_category` (`cat_id`, `cat_name`, `del_status`) VALUES
(1, 'สมุนไพรแก้ไอ🤪', 0),
(2, 'สมุนไพรแก้เจ็บคอ', 0),
(8, 'สมุนไพรไม้เถา ไม้เลื้อย', 0),
(9, 'สมุนไพรไม้ล้มลุก', 0),
(10, 'สมุนไพรไม้พุ่ม', 0),
(11, 'ทดสอบ', 1),
(12, 'ทดสอบ2222', 1),
(13, 'ทดสอบ', 1);

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `tb_employee`
--

CREATE TABLE `tb_employee` (
  `emp_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `del_status` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- dump ตาราง `tb_employee`
--

INSERT INTO `tb_employee` (`emp_id`, `role_id`, `fname`, `lname`, `email`, `pwd`, `phone`, `del_status`) VALUES
(1, 3, 'emp1111', 'emp111', 'emp01@e.c', '81dc9bdb52d04dc20036dbd8313ed055', '1234', 0),
(2, 3, 'dsf', 'fdsaf', 'a@a.c', '59b466fd93164953e56bdd1358dc0044', 'sda', 1),
(3, 1, 'admin', 'admin', 'admin@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '1234', 0),
(4, 3, 'ทดสอบ11', 'ทดสอบ111', 'tt@e.ecc', '81dc9bdb52d04dc20036dbd8313ed055', '12345', 1);

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `tb_forget`
--

CREATE TABLE `tb_forget` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- dump ตาราง `tb_forget`
--

INSERT INTO `tb_forget` (`id`, `email`, `token`) VALUES
(0, 'thanawat.220222@gmail.com', 'e075ff7a1f1b79f5ed1fa200ba44ef78635c02c8e2536'),
(0, 'tospan@gmail.com', 'd5ac6ce378787bd7df453c6b94e633cf635c057fa11ed'),
(0, 'thanawat.220222@gmail.com', '500404953b298ec1b478c865462f7006635cfffcdacb1'),
(0, 'thanawat.220222@gmail.com', 'c3c034dea2b77ccf3876aabbe598b583635d03b399ea5');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `tb_order`
--

CREATE TABLE `tb_order` (
  `order_id` int(11) NOT NULL COMMENT 'id order ',
  `user_id` int(11) DEFAULT NULL COMMENT 'id ผู้ใช้งานที่สั่งซื้อ',
  `emy_id` int(11) DEFAULT NULL,
  `order_status` int(11) DEFAULT NULL COMMENT 'สถานะ',
  `pay_total` double DEFAULT NULL COMMENT 'จำนวนเงินที่จ่าย',
  `pay_date` text DEFAULT NULL COMMENT 'วันที่จ่าย',
  `pay_time` time DEFAULT NULL COMMENT 'เวลาที่จ่าย',
  `pay_pic` text CHARACTER SET utf8 DEFAULT NULL COMMENT 'รูปสลิป',
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- dump ตาราง `tb_order`
--

INSERT INTO `tb_order` (`order_id`, `user_id`, `emy_id`, `order_status`, `pay_total`, `pay_date`, `pay_time`, `pay_pic`, `created_at`) VALUES
(1, 18, 3, 1, 40, '2022-10-31', '22:20:00', 'pay-1.jpg', '2022-10-31 15:20:16'),
(2, 18, NULL, 0, 23, '2022-10-31', '22:41:00', 'pay-2.jpg', '2022-10-31 15:42:05'),
(3, 18, 3, 3, 40, '2022-10-31', '23:47:00', 'pay-3.pdf', '2022-10-31 16:47:27'),
(4, 26, 3, 3, 123, '2022-11-01', '09:25:00', 'pay-4.jpg', '2022-11-01 02:25:19');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `tb_orderitem`
--

CREATE TABLE `tb_orderitem` (
  `item_id` int(11) NOT NULL COMMENT 'id item ของ order',
  `order_id` int(11) NOT NULL COMMENT 'id order',
  `pro_id` int(11) NOT NULL COMMENT 'id สินค้า',
  `pro_amount` int(11) NOT NULL COMMENT 'จำนวนสินค้าที่สั่ง',
  `pro_price_now` double NOT NULL COMMENT 'ราคาสินค้าตอนซื้อ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- dump ตาราง `tb_orderitem`
--

INSERT INTO `tb_orderitem` (`item_id`, `order_id`, `pro_id`, `pro_amount`, `pro_price_now`) VALUES
(1, 1, 13, 1, 40),
(2, 2, 2, 1, 23),
(3, 3, 10, 1, 40),
(4, 4, 4, 1, 3),
(5, 4, 6, 2, 60);

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `tb_product`
--

CREATE TABLE `tb_product` (
  `pro_id` int(11) NOT NULL COMMENT 'id สินค้า',
  `cat_id` int(11) DEFAULT NULL COMMENT 'id ประเภทสินค้า',
  `pro_name` varchar(100) DEFAULT '9999' COMMENT 'ชื่อสินค้า',
  `pro_detail` text DEFAULT NULL COMMENT 'รายละเอียดสินค้า',
  `pro_amount` int(11) DEFAULT NULL COMMENT 'จำนวนสินค้า',
  `pro_price` double DEFAULT NULL COMMENT 'ราคาสินค้า',
  `pro_sale` int(11) DEFAULT NULL COMMENT 'จำนวนยอดขาย',
  `pro_status` int(11) DEFAULT NULL COMMENT 'สถานะสินค้า ',
  `pro_pic` text DEFAULT NULL COMMENT 'รูปสินค้า',
  `pro_costprice` double DEFAULT NULL COMMENT 'ราคาทุน',
  `pro_low` double DEFAULT NULL COMMENT 'จำนวนสินค้าต่ำสุด',
  `del_status` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- dump ตาราง `tb_product`
--

INSERT INTO `tb_product` (`pro_id`, `cat_id`, `pro_name`, `pro_detail`, `pro_amount`, `pro_price`, `pro_sale`, `pro_status`, `pro_pic`, `pro_costprice`, `pro_low`, `del_status`) VALUES
(1, 8, 'ตำลึง ', 'มีวิตามินบำรุงร่างกาย ช่วยต้านอนุมูลอิสระ ป้องกันหัวใจขาดเลือด บำรุงสายตา มีกากใยช่วยให้การขับถ่ายดีขึ้น ลดความเสี่ยงจากมะเร็ง ทั้งยังใช้รักษาโรคเบาหวานและแก้งูสวัดได้ด้วย\" \" \" ', 1, 15, NULL, NULL, 'pic-1.jpg', 10, 5, 0),
(2, 1, 'ขิง', 'ขิง เป็นพืชล้มลุก มีเหง้าใต้ดิน เปลือกนอกสีน้ำตาลแกมเหลือง เนื้อในสีนวลมีกลิ่นหอมเฉพาะ แทงหน่อหรือลำต้นเทียมขึ้นเป็นกอประกอบด้วยกาบหรือโคนใบหุ้มซ้อนกัน ใบ เป็นชนิดใบเดี่ยว นำขิงแก่ 1-2 หัวมาตีให้แตก แล้วต้มกับน้ำเดือด เติมเกลือเล็กน้อย ดื่มวันละ 2-3 ครั้ง จะช่วยให้หลอดลมขยาย เสมหะที่ติดอยู่กับหลอดลมจะอ่อนตัวและหลุดออกมาง่าย\" \" ', 49, 23, NULL, NULL, 'pic-2.jfif', 15, 10, 0),
(3, 1, '21321', 'กเ', 1, 1000, NULL, NULL, 'pic-3.jfif', 20, 1, 1),
(4, 1, 'มะนาว', 'มะนาว เป็นพืชชนิดหนึ่ง ผลมีรสเปรี้ยวจัด จัดอยู่ในสกุลส้ม (Citrus) ผลสีเขียว เมื่อสุกจัดจะเป็นสีเหลือง เปลือกบาง ภายในมีเนื้อแบ่งเป็นกลีบ ๆ ชุ่มน้ำมาก นำมะนาว หั่นฝานบางๆ หรือหั่นเป็นลูกเต๋าจิ้มเกลือ อมทิ้งไว้ซักครู่ หรือคั้นน้ำมะนาวผสมกับน้ำอุ่น ใส่เกลือเล็กน้อย จิบบ่อยๆ จะช่วยล้างเสมหะที่อยู่ในหลอดลม\" ', 499, 3, NULL, NULL, 'pic-4.jpg', 1, 5, 0),
(5, 10, 'กัญชา', 'ประโยชน์ของกัญชานอกจากช่วยเจริญอาหาร ทำให้รู้สึกผ่อนคลาย และต้านอาการซึมเศร้าและ สรรพคุณของกัญชายังสามารถช่วยคลายกล้ามเนื้อ และบรรเทาอาการปวดได้อีกด้วย สารในกัญชาทั้ง Tetrahydrocannabinol และ Cannabinoids นั้นมีส่วนช่วยบรรเทาอาการต่าง ๆ ที่เกี่ยวกับการบาดเจ็บกล้ามเนื้อทั้งการผ่อนคลายเนื้อเยื่อกล้ามเนื้อ \" ', 35, 100, NULL, NULL, 'pic-5.jpg', 80, 20, 0),
(6, 1, 'มะขาม', 'มะขาม เป็นพันธุ์ไม้มงคลพระราชทานและต้นไม้ประจำจังหวัดเพชรบูรณ์ มะขามในไทยมีสองชนิดคือมะขามเปรี้ยวและมะขามหวาน ใช้มะขามเปียก 1 ปั้น นำมาต้มกับน้ำเดือด เติมน้ำตาลและเกลือเล็กน้อย ช่วยขับเสมหะได้อย่างดี แต่ไม่ควรทานมากเกินไปอาจทำให้ท้องเสียได้', 98, 60, NULL, NULL, 'pic-6.jfif', 55, 5, 0),
(7, 9, 'ข่า', 'เป็นยาแก้ท้องขึ้น ท้องอืดเฟ้อ ขับลมแก้อาหารเป็นพิษเป็นยาแก้ลมพิษเป็นยารักษากลากเกลื้อน โรคผิวหนัง ติดเชื้อแบคทีเรีย เชื้อรา\r\n', 20, 20, NULL, NULL, 'pic-7.jpg', 15, 5, 0),
(8, 2, 'กระเทียม', ' กระเทียมเป็นสมุนไพรในครัวที่มีฤทธิ์กระตุ้นระบบภูมิคุ้มกันได้เช่นเดียวกับยาต้านจุลชีพที่ใช้ในทางการแพทย์เลยทีเดียว อีกทั้งยังมีคุณสมบัติในการต้านเชื้อแบคทีเรียได้อีกด้วย โดย Michael Finkelstein แพทย์องค์รวมในย่านเวสต์เชสเตอร์ เคาท์ตี้ เมืองนิวยอร์ก ได้เปิดเผยว่า กระเทียมเป็นสมุนไพรที่สามารถรักษาอาการเจ็บคอเนื่องจากการติดเชื้อได้ อีกทั้งยังช่วยต่อสู้กับเชื้อโรคที่ทำให้เกิดอาการเจ็บคอได้อีกด้วย ทั้งนี้ก็เพราะสารอัลลิซิน (Allicin) ที่อยู่ในกระเทียมสดนั่นเอง โดย Finkelstein ก็ยังได้แนะนำอีกว่าถ้าหากอยากจะใช้กระเทียมรักษาอาการเจ็บคอแต่ไม่ชอบความฉุนของกระเทียมก็ให้นำกระเทียมทั้งหัวไปอุ่นในไมโครเวฟ 10-15 วินาทีแล้วค่อยนำมารับประทาน จะช่วยให้กลิ่นฉุนของกระเทียมลดลงได้', 100, 58, NULL, NULL, 'pic-8.jpg', 45, 5, 0),
(9, 2, 'ขมิ้น', ' เจ้าสมุนไพรชนิดนี้มักจะนิยมนำมาแต่งกลิ่น หรือแต่งสีอาหารเท่านั้น แต่สรรพคุณของขมิ้นก็ถือว่าดีใช่ย่อยเลยนะ เพราะเจ้าสารเคอร์คูมิน (Curcumin) ในขมิ้นมีฤทธิ์ในการต้านการอักเสบได้ เหมาะจะนำมาใช้รักษาอาการเจ็บคอที่เกิดจากการอักเสบของเยื่อบุคออย่างยิ่ง แถมยังช่วยลดอาการไอได้อีกด้วย แค่เพียงนำขมิ้นผงมาชงกับน้ำอุ่นและเติมน้ำผึ้งลงไปเล็กน้อย จิบขณะที่อุ่น ๆ ก็จะช่วยให้ชุ่มคอและหายเจ็บคอได้เร็วขึ้นค่ะ', 100, 30, NULL, NULL, 'pic-9.jfif', 15, 5, 0),
(10, 8, 'พริกไทย', 'ช่วยบรรเทาอาการปวด ขับลมในกระเพาะ กระตุ้นระบบย่อยอาหารให้ทำงานได้ดีขึ้น และป้องกันการเกิดอัลไซเมอร์', 59, 40, NULL, NULL, 'pic-10.jpg', 20, 25, 0),
(11, 2, 'หัวหอม', ' นอกจากกระเทียมแล้ว ญาติอย่างหัวหอมก็สามารถรักษาอาการเจ็บคอได้เช่นกัน เพราะหัวหอมมีสารต้านอาการอักเสบที่ทรงประสิทธิภาพเช่นเดียวกัน อีกทั้งยังช่วยต้านเชื้อไวรัสและเชื้อแบคทีเรียบางชนิดได้ ไม่เพียงเท่านั้น หัวหอมยังขึ้นชื่อว่าเป็นยาปฏิชีวนะจากธรรมชาติที่ปลอดภัยอีกด้วย วิธีการใช้เพื่อรักษาอาการเจ็บคอก็ไม่ยาก เพียงนำหัวหอมมาสับพอหยาบ ผสมกับน้ำผึ้ง 6 ออนซ์ (ประมาณ 177 มิลลิลิตร) เคี่ยวในหม้อสองชั้นด้วยไฟเบา ๆ ประมาณ 2 ชั่วโมง จากนั้นนำมาชงน้ำอุ่น จิบระหว่างวันจะช่วยให้อาการบรรเทาลงได้', 100, 26, NULL, NULL, 'pic-11.jpg', 20, 5, 0),
(12, 9, 'แมงลัก', 'เป็นยาแก้หวัด แก้หลอดลมอักเสบ แก้โรคท้องร่วง หรือใช้กากใบที่ตำทาแก้โรคผิวหนังทุกชนิด และ ลดความอ้วน ช่วยดูดซึมน้ำตาลในเส้นเลือด ขับเหงื่อ และช่วยเพิ่มปริมาณ ของอุจจาระเป็นเมือกกลืนในลำไส้', 80, 55, NULL, NULL, 'pic-12.jpg', 45, 40, 0),
(13, 10, 'กระเพรา', 'เป็นยาแก้ขับลม ท้องอืด ท้องเฟ้อ ปวดท้อง บำรุงธาตุ ขับผายลม แก้อาการจุกเสียดในท้อง ให้ใช้ใบสด หรือยอดอ่อนสด 1 กำมือ มาต้มให้เดือดแล้วกรองน้ำดื่ม แต่ถ้าใช้กับเด็กทารกให้เอามาตำให้ละเอียดคั้นเอาน้ำมาผสมกับน้ำยามหาหิงคุ์แล้วใช้ทาบริเวณรอบ ๆ สะดือ และทาที่ฝ่าเท้า แก้อาการปวดท้องของเด็กได้ และน้ำที่เราเอามาคั้นออกจากใบยังใช้ขับเสมหะ ขับเหงื่อ', 99, 40, NULL, NULL, 'pic-13.jpg', 20, 60, 0),
(14, 1, 'ทดสอบ2222222', 'ทอสอบอทดสอดกาหวอาดกสวห่อสวก่ดหอสาวก่หดสอา่กหสาวอ่กวส่อ\" 222222222', 50, 199, NULL, NULL, 'pic-14.jpg', 100, 3, 1),
(15, 1, 'ทดสอบ', 'อออแ', 11, 99, NULL, NULL, 'pic-15.jpg', 10, 5, 1);

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `tb_user`
--

CREATE TABLE `tb_user` (
  `user_id` int(11) NOT NULL COMMENT 'id user',
  `role_id` int(11) DEFAULT NULL COMMENT 'id ของประเภทผู้ใช้งาน',
  `fname` varchar(100) DEFAULT NULL COMMENT 'ชื่อ',
  `lname` varchar(100) DEFAULT NULL COMMENT 'สกุล',
  `password` varchar(100) DEFAULT NULL COMMENT 'รหัส',
  `phone` varchar(13) DEFAULT NULL COMMENT 'เบอร์',
  `email` varchar(255) DEFAULT NULL COMMENT 'email',
  `address` text DEFAULT NULL COMMENT 'ที่อยู่',
  `created_at` datetime DEFAULT NULL,
  `last_login` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- dump ตาราง `tb_user`
--

INSERT INTO `tb_user` (`user_id`, `role_id`, `fname`, `lname`, `password`, `phone`, `email`, `address`, `created_at`, `last_login`) VALUES
(5, 2, 'Topsan', 'Srichum', '81dc9bdb52d04dc20036dbd8313ed055', '0648756897', '', '', '2022-08-29 23:06:16', '2022-08-29 23:28:37'),
(14, 2, '777', '777', 'f1c1592588411002af340cbaedd6fc33', '777', '999', '', '2022-10-28 18:12:46', '0000-00-00 00:00:00'),
(15, 2, 'dsa', 'dsa', '5f039b4ef0058a1d652f13d612375a5b', 'dsa', 'dsadsa', '', '2022-10-28 18:13:17', '2022-10-28 18:42:02'),
(16, 2, 'c', 'cc', 'e0323a9039add2978bf5b49550572c7c', 'ccc', 'c', '', '2022-10-28 18:35:03', '0000-00-00 00:00:00'),
(17, 2, 'd', 'ddddddddddddd', 'a41cbbdedf8543de3d8a6bca31f59f54', 'ddddddddddddd', 'ddddddddddd', '', '2022-10-28 18:35:29', '0000-00-00 00:00:00'),
(18, 2, 'ธนาวัตร', 'ยอดทรง', '2ecc80bdf434ef72cd208f99e5faa592', '0972933844', 'thanawat.220222@gmail.com', '32/5 บ้านมีสุข เนินหอม 17150', '2022-10-28 18:44:41', '2022-10-31 17:23:32'),
(19, 2, 'Topsan', 'Topsan', '81dc9bdb52d04dc20036dbd8313ed055', '0648756897', 'tospan@gmail.com', '', '2022-10-28 20:08:37', '2022-10-28 20:09:39'),
(20, 2, 'นายคมสัน', 'ศรีฉ่ำ', '81dc9bdb52d04dc20036dbd8313ed055', '0648756897', 'topp0262@gmail.com', '', '2022-10-30 00:21:00', '2022-10-31 17:14:57'),
(21, 2, 'นายคมสัน', 'ศรีฉ่ำ', '81dc9bdb52d04dc20036dbd8313ed055', '0648756897', 'topsan2002@gmail.com', NULL, '2022-10-31 11:12:18', '2022-11-01 01:48:26'),
(22, 2, 'ธิติกา', 'ระลึก', 'a42686028e468d6e6becadd028f4e70d', '0617933301', 'thitikaraluk17@gmail.com', NULL, '2022-10-31 12:21:08', '2022-10-31 12:22:28'),
(23, 2, 'พรี่ปอม', 'สุดหล่อ', 'e10adc3949ba59abbe56e057f20f883e', '091234567', 'pom@gmail.com', NULL, '2022-10-31 12:21:55', NULL),
(24, 2, 'Topsan', 'Srichum', '81dc9bdb52d04dc20036dbd8313ed055', '0648756897', 'test@email.com', NULL, '2022-11-01 02:19:28', '2022-11-01 02:19:53'),
(25, 2, 'ทดสอบ', 'ทดสอบ', '827ccb0eea8a706c4c34a16891f84e7b', '0000000', 'test02@email.com', NULL, '2022-11-01 02:21:35', NULL),
(26, 2, 'นายคมสัน', 'ศรีฉ่ำ', '81dc9bdb52d04dc20036dbd8313ed055', '0648756897', 't@t.c', '21/10 ซอยมังกรทอง ต.เนินหอม ', '2022-11-01 02:22:48', '2022-11-01 02:23:00');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `user_role`
--

CREATE TABLE `user_role` (
  `role_id` int(11) NOT NULL COMMENT 'id ประเภทผู้ใช้',
  `role_name` varchar(255) NOT NULL COMMENT 'ชื่อประเภทผู้ใช้'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- dump ตาราง `user_role`
--

INSERT INTO `user_role` (`role_id`, `role_name`) VALUES
(1, 'Admin'),
(2, 'ลูกค้า'),
(3, 'พนักงาน');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_category`
--
ALTER TABLE `tb_category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `tb_employee`
--
ALTER TABLE `tb_employee`
  ADD PRIMARY KEY (`emp_id`);

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
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id ประเภทสินค้า', AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_employee`
--
ALTER TABLE `tb_employee`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_order`
--
ALTER TABLE `tb_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id order ', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_orderitem`
--
ALTER TABLE `tb_orderitem`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id item ของ order', AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_product`
--
ALTER TABLE `tb_product`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id สินค้า', AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id user', AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id ประเภทผู้ใช้', AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

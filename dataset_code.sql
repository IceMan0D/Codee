-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2024 at 09:20 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dataset_code`
--

-- --------------------------------------------------------

--
-- Table structure for table `basket`
--

CREATE TABLE `basket` (
  `basket_id` int(5) NOT NULL,
  `user_id` int(5) NOT NULL,
  `course_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `basket`
--

INSERT INTO `basket` (`basket_id`, `user_id`, `course_id`) VALUES
(1, 1, 3),
(2, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(5) NOT NULL,
  `course_name` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `course_price` varchar(7) NOT NULL,
  `course_promotion` varchar(7) DEFAULT NULL,
  `user_promotion` int(1) NOT NULL,
  `course_detail` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `course_example` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `rate_id` int(5) NOT NULL,
  `course_seller` int(5) NOT NULL,
  `course_notsell` int(1) NOT NULL,
  `course_certificate` varchar(70) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `type_id` int(5) NOT NULL,
  `requirements` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `description` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `suitable_for` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_name`, `course_price`, `course_promotion`, `user_promotion`, `course_detail`, `course_example`, `rate_id`, `course_seller`, `course_notsell`, `course_certificate`, `type_id`, `requirements`, `description`, `suitable_for`) VALUES
(2, 'พัฒนาเว็บด้วยภาษา PHP | สำหรับผู้เริ่มต้น ', '1000', '700', 1, 'ภาษาในตำนาน ที่ใคร ๆ ก็พูดถึง (เมื่อก่อน 5555) ตอนนี้มาย้อนความหลัง และ มาดูความง่ายในการเขียนกัน ถ้าถามว่า PHP ยังน่าสนใจอยู่ไหม ทางเราก็ต้องตอบว่า \"มันยังพอไปได้อยู่นะ !\"', 'https://youtu.be/IFhboIz8Ap4', 1, 9, 0, 'certificate1.pdf', 2, 'ผู้เรียนต้องมีพื้นฐาน HTML5 , CSS3 , JavaScript แล', 'คอร์สนี้ผู้เรียนจะได้เรียนรู้การพัฒนาเว็บแอพพลิเคชั่นด้วย React ตั้งแต่เริ่มต้นจนใช้งานได้จริงแบบ Step by Step', 'ผู้สนใจเรียนรู้การพัฒนาเว็บแอพพลิเคชั่นด้วย React'),
(3, 'UX/UI แบบไว ๆ บน Figma (ฉบับดูจบทำตามได้)', '1000', NULL, 0, 'อะไรนะ !? ใครอยากทำ UX/UI ยกมือขึ้นนนน วันนี้เรามาลองให้ทุกคนดูแบบไว ๆ ที่แบบว่าดูคลิปจนพอจะทำตามกันได้เลย หากใครพร้อมแล้วลุยยย', 'https://www.youtube.com/watch?v=VceDwcENoBc', 2, 10, 0, 'certificate2.pdf', 4, 'ผู้เรียนต้องมีพื้นฐาน canva', 'คอร์สนี้ผู้เรียนจะได้เรียนรู้การพัฒนาเว็บแอพพลิเคชั่นด้วย Figma ตั้งแต่เริ่มต้นจนใช้งานได้จริงแบบ Step by Step', 'ผู้สนใจเรียนรู้การพัฒนาเว็บแอพพลิเคชั่นด้วย Figma');

-- --------------------------------------------------------

--
-- Table structure for table `course_content`
--

CREATE TABLE `course_content` (
  `course_content_id` int(5) NOT NULL,
  `type_content_id` int(5) NOT NULL,
  `display_order` int(2) NOT NULL,
  `course_content_name` varchar(60) NOT NULL,
  `course_id` int(5) NOT NULL,
  `link_content` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course_content`
--

INSERT INTO `course_content` (`course_content_id`, `type_content_id`, `display_order`, `course_content_name`, `course_id`, `link_content`) VALUES
(1, 1, 1, 'PHP แบบไว ๆ ใน 3 นาที', 2, 'https://www.youtube.com/watch?v=IFhboIz8Ap4'),
(2, 1, 2, 'มัดรวมให้แล้ว ! 14 คำสั่ง PHP ', 2, 'https://youtu.be/-r7dyqvXcEI'),
(3, 2, 1, 'การติดตั้ง XAMPP บน Windows', 2, 'https://youtu.be/jvMwiQDtk9k'),
(4, 3, 1, 'บทที่ 1 : สอน PHP จัดการฐานข้อมูลด้วย My sql', 2, 'https://youtu.be/K3XYF7-gDG8'),
(5, 3, 2, 'บทที่ 2 : สอน PHP ทำระบบ Register + Login', 2, 'https://youtu.be/yZrp8RpWVXU'),
(6, 1, 1, 'ทำความรู้จัก Figma', 3, 'https://youtu.be/oUv-dtdWjMU'),
(7, 2, 1, 'How to สมัครใช้งาน Figma', 3, 'https://youtu.be/R-xMBCZiuBM'),
(8, 3, 1, 'รวม บทที่1-21 : การใช้งานโปรแกรม Figma เนื้อหาเต็ม 21 บท ', 3, 'https://youtu.be/wfyKQfVYkZE');

-- --------------------------------------------------------

--
-- Table structure for table `notify`
--

CREATE TABLE `notify` (
  `notify_id` int(5) NOT NULL,
  `notify_topic` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `notify_detail` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notify`
--

INSERT INTO `notify` (`notify_id`, `notify_topic`, `notify_detail`) VALUES
(1, 'แจ้งเตือนปิดปรับปรุง ครั้ง1', 'ปัดปรับปรุงฟหกฟหกฟหกฟหกฟหก'),
(2, 'แจ้งเตือนปิดปรับปรุง ครั้ง2', 'ฟหกฟหกฟหกผปแผปแผปแผปแฟไำๆำไๆไำๆไ');

-- --------------------------------------------------------

--
-- Table structure for table `payment_status`
--

CREATE TABLE `payment_status` (
  `payment_status_id` int(5) NOT NULL,
  `payment_status_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment_status`
--

INSERT INTO `payment_status` (`payment_status_id`, `payment_status_name`) VALUES
(1, 'รอชำระเงิน'),
(2, 'รอยืนยันจากผู้ขาย'),
(3, 'ชำระเงินเรียนร้อย');

-- --------------------------------------------------------

--
-- Table structure for table `rate`
--

CREATE TABLE `rate` (
  `rate_id` int(5) NOT NULL,
  `course_id` int(5) NOT NULL,
  `total_score` varchar(7) NOT NULL,
  `user_voting` varchar(5) NOT NULL,
  `average_score` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rate`
--

INSERT INTO `rate` (`rate_id`, `course_id`, `total_score`, `user_voting`, `average_score`) VALUES
(1, 2, '4', '1', 4),
(2, 3, '3', '1', 3);

-- --------------------------------------------------------

--
-- Table structure for table `sale`
--

CREATE TABLE `sale` (
  `sale_id` int(5) NOT NULL,
  `user_id` int(5) NOT NULL,
  `coures_id` int(5) NOT NULL,
  `sale_paid` varchar(7) NOT NULL,
  `insert_img` int(1) NOT NULL,
  `name_img` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `review` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `rate` varchar(1) NOT NULL,
  `finished_studying` int(1) NOT NULL,
  `name_in_certificate` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `payment_status_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sale`
--

INSERT INTO `sale` (`sale_id`, `user_id`, `coures_id`, `sale_paid`, `insert_img`, `name_img`, `review`, `rate`, `finished_studying`, `name_in_certificate`, `payment_status_id`) VALUES
(1, 1, 2, '700', 1, 'slipbanking.png', 'ดีมากๆเลยงับ รู้เรื่องมากเลย', '4', 1, 'นาย นนทก ที่ล้างเท้านางสีดา', 3),
(2, 2, 3, '1000', 1, 'slipbanking2.png', 'ดีคร้าบบบ แต่สอนยาวไปหน่อย รวมไฟล์ด้วยเลยแยกเรียนไม่ค่อยสะดวก', '3', 1, 'นาง สีดา พยานาคราช', 3);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `status_id` int(5) NOT NULL,
  `status_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`status_id`, `status_name`) VALUES
(1, 'ผู้ดูแลระบบ'),
(2, 'คนขายคอร์ส'),
(3, 'ผู้ใช้งานทั่วไป'),
(4, 'เมทเทอร์');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `type_id` int(5) NOT NULL,
  `type_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`type_id`, `type_name`) VALUES
(1, 'Full Stack Developer'),
(2, 'Back End Developer'),
(3, 'Front-End Developer'),
(4, 'UX/UI Design'),
(5, 'Free Course');

-- --------------------------------------------------------

--
-- Table structure for table `type_course_content`
--

CREATE TABLE `type_course_content` (
  `type_content_id` int(5) NOT NULL,
  `type_content_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `type_course_content`
--

INSERT INTO `type_course_content` (`type_content_id`, `type_content_name`) VALUES
(1, 'บทนำ'),
(2, 'ติดตั้งเครื่องมือพื้นฐาน'),
(3, 'เนื้อหา');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(5) NOT NULL,
  `user_username` varchar(20) NOT NULL,
  `user_password` varchar(20) NOT NULL,
  `user_fullname` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_address` varchar(100) NOT NULL,
  `tel` varchar(10) NOT NULL,
  `img_banking` varchar(50) DEFAULT NULL,
  `number_banking` varchar(15) DEFAULT NULL,
  `status_id` int(5) NOT NULL,
  `occupation` varchar(20) DEFAULT NULL,
  `detail` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_username`, `user_password`, `user_fullname`, `user_email`, `user_address`, `tel`, `img_banking`, `number_banking`, `status_id`, `occupation`, `detail`) VALUES
(1, 'user', '1234', 'Test User', 'Test@email.com', '31 หมู่ 6 ต.มะขามเตี้ย อ.เมือง จ.สุราษฎร์ธานี 84000', '0884566211', NULL, NULL, 3, NULL, NULL),
(2, 'test', '1234', 'User TestNo.2', 'Test2@email.com', '75 หมู่ 8 ต.มะขามเตี้ย อ.เมือง จ.สุราษฎร์ธานี 84100', '0996322588', NULL, NULL, 3, NULL, NULL),
(3, 'pp', '1234', 'Nonthanan Sirikanon', '6540011027@email.psu.ac.th', '93/7, ถ.กระโรม, ต.โพธิ์เสด็จ อ.เมือง จ.นครศรีธรรมราช, 80000', '0884565877', NULL, NULL, 1, NULL, NULL),
(4, 'adam', '1234', 'Adam Awae ', '6540011053@email.psu.ac.th', '637-639 Vongsawang Road Bangsue,Bangsu,Bangkok,10800', '0845688210', NULL, NULL, 1, NULL, NULL),
(5, 'game', '1234', 'Nanthawat Nurod', '6540011030@email.psu.ac.th', '3 Soi Chidlom Ploenchit Road Lumpini Pathumwan,Pathumwan,Bangkok 10330', '0990211744', NULL, NULL, 1, NULL, NULL),
(6, 'jang', '1234', 'Noppon Angchoun', '6540011028@email.psu.ac.th', '23th FL, Thai CC, Bldg.,Yannawa,Bangkok 10120', '0996322132', NULL, NULL, 1, NULL, NULL),
(7, 'new', '1234', 'ชลิต ถนอมนวล', '6540011010@email.psu.ac.th', '3/43 Moo 10 Nongpo,Nong Khae,Saraburi 18140', '0987744123', NULL, NULL, 1, NULL, NULL),
(8, 'peat', '1234', 'Peat NaJa', '6540011063@email.psu.ac.th', '454 Charansanitwong Road, Bang-O, Bang Phlat, Bangkok 10700', '0996335789', NULL, NULL, 1, NULL, NULL),
(9, 'sell1', '1234', 'Test Sell1', 'Sell@email.com', '73/88 Krungthep-Nonth Bang Kaen Mueang, Nonthaburi 11000', '0823211562', 'slip1.png', '123-456-7890', 2, 'พนักงานราชการ', 'มีประสบการณ์การทำงานมากกว่า บลาๆ'),
(10, 'sell2', '1234', 'Sell2 Test', 'Sell2@email.com', '367 Sukothai Suan Chitlada Dusit, Dusit, Bangkok 10300', '0823655232', 'slip2.png', '321-654-9870', 2, 'Dev.', 'นักพัฒนนาระบบระดับโลก บลาๆ');

-- --------------------------------------------------------

--
-- Table structure for table `will_be_learned`
--

CREATE TABLE `will_be_learned` (
  `will_be_learned_id` int(5) NOT NULL,
  `course_id` int(5) NOT NULL,
  `detail` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `will_be_learned`
--

INSERT INTO `will_be_learned` (`will_be_learned_id`, `course_id`, `detail`) VALUES
(1, 2, 'เรียนรู้พื้นฐานการใช้งาน React'),
(2, 2, 'เรียนรู้การใช้งาน States & Props ใน React'),
(3, 2, 'เข้าใจหลักการแชร์ข้อมูล ใน React ด้วย Context'),
(4, 2, 'จัดการ URL ด้วย React Router V6 (Routing)'),
(5, 3, 'How to begin working as a UX Designer using Figma.'),
(6, 3, 'How to make fully interactive prototypes.'),
(7, 3, 'How to work with a UX personas.'),
(8, 3, 'You will be able to add UX designer to your CV.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`basket_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `course_content`
--
ALTER TABLE `course_content`
  ADD PRIMARY KEY (`course_content_id`);

--
-- Indexes for table `notify`
--
ALTER TABLE `notify`
  ADD PRIMARY KEY (`notify_id`);

--
-- Indexes for table `payment_status`
--
ALTER TABLE `payment_status`
  ADD PRIMARY KEY (`payment_status_id`);

--
-- Indexes for table `rate`
--
ALTER TABLE `rate`
  ADD PRIMARY KEY (`rate_id`);

--
-- Indexes for table `sale`
--
ALTER TABLE `sale`
  ADD PRIMARY KEY (`sale_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `type_course_content`
--
ALTER TABLE `type_course_content`
  ADD PRIMARY KEY (`type_content_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `will_be_learned`
--
ALTER TABLE `will_be_learned`
  ADD PRIMARY KEY (`will_be_learned_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `basket`
--
ALTER TABLE `basket`
  MODIFY `basket_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `course_content`
--
ALTER TABLE `course_content`
  MODIFY `course_content_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `notify`
--
ALTER TABLE `notify`
  MODIFY `notify_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payment_status`
--
ALTER TABLE `payment_status`
  MODIFY `payment_status_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rate`
--
ALTER TABLE `rate`
  MODIFY `rate_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sale`
--
ALTER TABLE `sale`
  MODIFY `sale_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `status_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `type_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `type_course_content`
--
ALTER TABLE `type_course_content`
  MODIFY `type_content_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `will_be_learned`
--
ALTER TABLE `will_be_learned`
  MODIFY `will_be_learned_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： localhost
-- 產生時間： 2024 年 09 月 02 日 16:21
-- 伺服器版本： 8.0.39-0ubuntu0.22.04.1
-- PHP 版本： 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `testdb`
--

-- --------------------------------------------------------

--
-- 資料表結構 `member`
--

CREATE TABLE `member` (
  `ID` int NOT NULL,
  `Username` varchar(32) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `Seq` tinyint NOT NULL DEFAULT '1' COMMENT '會員等級(1~100)\r\n等級越高權限越高',
  `Password` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `Email` varchar(32) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `Birthday` date DEFAULT NULL,
  `Uid01` varchar(32) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL COMMENT 'UID',
  `State` tinyint NOT NULL DEFAULT '1' COMMENT '狀態(1:啟用/0:停用)',
  `Level` int NOT NULL DEFAULT '0' COMMENT '會員等級',
  `Created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- 傾印資料表的資料 `member`
--

INSERT INTO `member` (`ID`, `Username`, `Seq`, `Password`, `Email`, `Birthday`, `Uid01`, `State`, `Level`, `Created_at`) VALUES
(2, 'xxx', 1, 'xxx', 'xxx', NULL, NULL, 1, 0, '2024-08-08 01:28:34'),
(3, 'xxx', 1, 'xxx', 'xxx', NULL, NULL, 1, 0, '2024-08-08 01:29:57'),
(4, 'xxx', 1, 'xxx', 'xxx', '1997-02-25', NULL, 1, 0, '2024-08-08 01:30:42'),
(5, 'xxx', 1, 'xxx', 'test05@gmail.com', '2024-08-16', NULL, 1, 0, '2024-08-08 01:30:45'),
(14, 'owner01', 100, '$2y$10$3aRgm5ObLP8WHnD9bAfI8.vnfU/QK5ujX01bLGFTBmbr9YOIctS2m', 'owner@test.com', '2012-05-20', '48cc0b95e44ca84e5fb546fa845e', 1, 900, '2024-08-08 03:21:44'),
(16, 'owner02', 1, '$2y$10$UDuQjg3tPnrjga1xB8Du9OFRp9tKxSI81R9VOwfCrVsc3gMjyvoYy', '123456', '2024-08-07', 'a2cdc8ff0f173e3f2730bba9fa5d', 1, 0, '2024-08-08 07:32:59'),
(17, 'owner03', 1, '$2y$10$3cxJgp2FOKJW2kO4bnnyS.ynsa9/eT1VBv3FbfznZWeOXm24pzTyy', '123456', '2024-08-08', '4dfea243431fd329d7677e700b7d', 1, 200, '2024-08-08 07:44:25'),
(18, 'owner05', 1, '$2y$10$F2IAj/H/n52IZw1b1UPsqe1HglLp4b6WXdPMsXxz/VENs.hQ2HWSO', '12334', '2024-08-07', '62b781fcd9a77201b3358b172e38', 0, 0, '2024-08-13 01:56:24'),
(19, 'owner06', 1, '$2y$10$xzHHzfCZV.Xtps7eOVp5JOqVVPSwcCbDFAbzQqOtFShjPB5dtFRa6', '12345@gmail.com', '2024-08-15', 'abfc31e364a5e9079aa50420101f', 1, 100, '2024-08-20 02:47:14'),
(21, 'owner07', 2, '$2y$10$/nMFI3k0SBA/pozLhXVJYOcPuapS64WmT/dkS3Njm.L8zsiu7NfTy', '123456@gmail.com', '2024-08-16', NULL, 1, 200, '2024-08-20 02:48:05'),
(22, 'owner08', 2, '$2y$10$llcLWF3ml3KZ5Vpl1ZUHJeOXENfCd5hHJuBTx6lGyviEadgG13FPm', '1234567@gmail.com', '2024-08-08', NULL, 1, 0, '2024-08-20 02:49:39'),
(23, 'owner09', 2, '$2y$10$pqgNv34LEPk/jEw6ctom3Oy0FTZBEdjmLFSfpx748w1J6ZrGk1Wfe', '123456789@gmail.com', '2024-08-08', NULL, 0, 0, '2024-08-20 02:50:49'),
(24, 'owner10', 2, '$2y$10$l4i8GPLBFmLAVYk9J9Yd6Odi4EUT10PZ.QowSnGxvcjc97yzTZyd6', '1234567890@gmail.com', '2024-08-16', NULL, 1, 200, '2024-08-20 02:51:28'),
(25, 'owner11', 1, '$2y$10$.gs1NRjCqJqmzfJrdA4L1e4fQR1HhlcbEEVb4uWVBZb1FukzoDX5G', '12345678901@gmail.com', '2024-08-08', NULL, 0, 0, '2024-08-20 03:21:15'),
(26, 'owner12', 3, '$2y$10$JYcDlwdj04pCT2s5phQSHenH6Fk6MfWHO5tva6BLHL5qPDf0jaAbu', '123456789013@gmail.com', '2024-08-23', NULL, 1, 0, '2024-08-20 03:39:52'),
(27, 'owner13', 3, '$2y$10$QNhTN3qXRD7aMUJ7THSLFetPJ0igLrS76bA/pf0CpAKvuqqDnWrpy', '13@gmai.com', '2024-08-12', NULL, 0, 0, '2024-08-20 07:57:59'),
(28, 'owner14', 3, '$2y$10$irsJ.HDaGuEQnz6AZVOoJO1yVCgPV/XY3JnomEHsaVwgwX4KhmYaa', '14@gmail.com', '2024-08-20', NULL, 1, 0, '2024-08-20 07:58:36'),
(29, 'owner15', 3, '$2y$10$CswlCosxTVIuYmp0.vd2Ku/PnqJ89vI2xTPx1dRxkqFz5H0VsB85u', '15@gmail.com', '2024-08-20', NULL, 1, 100, '2024-08-20 07:59:00'),
(30, 'owner16', 3, '$2y$10$3oM9F06muS/XMoQ2428tpu/KbB7RQh.RmMhNh6s/6.9JPqK65SSe.', '16@gmail.com', '2024-08-12', NULL, 1, 100, '2024-08-20 07:59:20'),
(31, 'owner17', 1, '$2y$10$gr5B3bbBZmFuTFGf.czqUuH7VBpQvLMSmXCPGC94VBAh.mChXWwsq', '16@gmail.com', '2024-08-13', NULL, 1, 0, '2024-08-20 07:59:55'),
(32, 'owner18', 1, '$2y$10$V08IlazhYwmR7MQlO/OLLObljEv1qQIiGv7RrYH/oDrImRCj/r3fO', '18@gmail.com', '2024-08-15', NULL, 1, 0, '2024-08-20 08:00:17'),
(33, 'owner19', 1, '$2y$10$XgLJyifZLRFyQzZ2GHC81ejCWSOAsDCZ//TNCb.tUXEZJyeoQh3g6', '19@gmail.com', '2024-08-20', NULL, 0, 0, '2024-08-20 08:00:40'),
(34, 'owner20', 1, '$2y$10$iPE1By6WtetcBpkScBh3l.E7A5xJ9gk4uWV/yOEuQmoLsGLw0Zzfi', '20@gmail.com', '2024-08-14', NULL, 1, 900, '2024-08-20 08:01:00'),
(35, '1111', 1, '$2y$10$cP7370/9mKEJfb77MpCGBu1BgvXTJnLiR8xy3OrmM9Ki07VkOmbJW', '125666@gmail.com', '2024-08-22', '83b1d33005f6fe3ef6309d47739a', 1, 0, '2024-08-23 05:12:58'),
(36, '1234', 1, '$2y$10$wlfI7UPi2q8QIfPyedoqreAEmI/Ve3NLRNQW9maih/zopWxEFzjBW', '123@123564566.com', '2024-08-23', '37a9747933ed599ce91ae718dee6', 1, 200, '2024-08-23 06:17:31');

-- --------------------------------------------------------

--
-- 資料表結構 `product`
--

CREATE TABLE `product` (
  `ID` int NOT NULL COMMENT '產品編號',
  `Name` varchar(32) COLLATE utf8mb4_unicode_520_ci NOT NULL COMMENT '產品名稱',
  `Price` int NOT NULL COMMENT '產品價格',
  `Num` int NOT NULL COMMENT '產品數量',
  `Remark` varchar(128) COLLATE utf8mb4_unicode_520_ci NOT NULL COMMENT '產品備註',
  `Created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '產品建檔時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- 傾印資料表的資料 `product`
--

INSERT INTO `product` (`ID`, `Name`, `Price`, `Num`, `Remark`, `Created_at`) VALUES
(1, '美式咖啡', 45, 10, '美式咖啡很好喝~~~~', '2024-07-16 00:58:30'),
(2, '濃縮', 50, 10, '濃縮~~~~~~~', '2024-07-16 01:00:07'),
(3, '拿鐵', 50, 20, '拿鐵~~~~~~', '2024-07-16 01:00:23'),
(4, '藍山', 40, 20, '藍山-------------------', '2024-07-16 01:00:43'),
(5, '黑咖啡', 40, 50, '黑咖啡********-//*/', '2024-07-16 01:01:10'),
(7, '雞腿飯', 100, 2, '雞腿飯!雞腿飯!!雞腿飯!!!', '2024-07-16 03:48:31'),
(8, '雞腿飯', 100, 2, '雞腿飯!雞腿飯!!雞腿飯!!!', '2024-07-16 05:20:03'),
(9, '雞腿飯', 100, 2, '好吃', '2024-07-16 05:48:18'),
(10, 'G腿', 50, 2, '好吃', '2024-07-16 06:09:53'),
(11, 'G', 100, 2, '好吃', '2024-07-18 01:36:20'),
(12, '美式', 123, 50, '美式美式美式', '2024-07-18 03:52:54');

-- --------------------------------------------------------

--
-- 資料表結構 `product_all`
--

CREATE TABLE `product_all` (
  `ID` int NOT NULL,
  `ProductName` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL COMMENT '產品名稱',
  `ProductType` tinyint NOT NULL COMMENT '1:沙發/椅子\r\n2:辦公桌/辦公椅\r\n3:床組/寢具\r\n4:衛浴用品\r\n5:廚具/餐具\r\n6:燈具/照明\r\n7:窗簾/地毯',
  `Introduce` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci DEFAULT NULL COMMENT '產品介紹',
  `Price` int DEFAULT NULL COMMENT '售價',
  `Discount` int DEFAULT NULL COMMENT '打折',
  `Discount_show` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否出現在首頁優惠欄中\r\n0:否',
  `Created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- 傾印資料表的資料 `product_all`
--

INSERT INTO `product_all` (`ID`, `ProductName`, `ProductType`, `Introduce`, `Price`, `Discount`, `Discount_show`, `Created_at`) VALUES
(1, 'Arc 休閒椅', 1, '單人座椅, Arc 淺藍色', 599, NULL, 0, '2024-09-02 08:14:23');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`ID`);

--
-- 資料表索引 `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ID`);

--
-- 資料表索引 `product_all`
--
ALTER TABLE `product_all`
  ADD PRIMARY KEY (`ID`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `member`
--
ALTER TABLE `member`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `product`
--
ALTER TABLE `product`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT COMMENT '產品編號', AUTO_INCREMENT=26;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `product_all`
--
ALTER TABLE `product_all`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

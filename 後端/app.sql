-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2021-11-28 22:34:34
-- 伺服器版本： 10.4.18-MariaDB
-- PHP 版本： 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `erp`
--

-- --------------------------------------------------------

--
-- 資料表結構 `dept`
--

CREATE TABLE `dept` (
  `deptID` int(11) NOT NULL,
  `deptName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `dept`
--

INSERT INTO `dept` (`deptID`, `deptName`) VALUES
(5, '林香香	'),
(7, '溥儀	'),
(1, '盧翊翔'),
(6, '陳薄芮	'),
(3, '高苡庭');

-- --------------------------------------------------------

--
-- 資料表結構 `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `workdate` date NOT NULL,
  `address` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `employees`
--

INSERT INTO `employees` (`id`, `name`, `password`, `workdate`, `address`, `email`, `phone`) VALUES
(1, '林香香', '00000000', '2021-11-01', '高雄市岡山區156號', 'abc001@gmail.com', '0911111111'),
(4, '陳薄芮', '00000000', '2021-11-06', '台北市大安區仁愛路三段53號', 'abc022@gmail.com', '0911113336'),
(5, '溥儀', '00000000', '2021-01-14', '嘉義縣民雄鄉', 'diss12345@gmail.com', '0911108536'),
(7, '12', '00000001', '2021-11-06', '台北市大安區仁愛路三段53號', 'unih57jj6@gmail.com', '0911108536');

-- --------------------------------------------------------

--
-- 資料表結構 `products`
--

CREATE TABLE `products` (
  `productID` int(11) NOT NULL,
  `productName` varchar(20) NOT NULL,
  `productCost` int(11) NOT NULL,
  `unitprice` int(11) NOT NULL,
  `productCount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `products`
--

INSERT INTO `products` (`productID`, `productName`, `productCost`, `unitprice`, `productCount`) VALUES
(1, '牛奶冰棒', 10, 30, 1000),
(2, '沐浴乳', 50, 300, 4300);

-- --------------------------------------------------------

--
-- 資料表結構 `supplier`
--

CREATE TABLE `supplier` (
  `supplierID` int(11) NOT NULL,
  `supplierName` varchar(30) NOT NULL,
  `contactPerson` varchar(20) NOT NULL,
  `phoneNumber` varchar(15) NOT NULL,
  `address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `supplier`
--

INSERT INTO `supplier` (`supplierID`, `supplierName`, `contactPerson`, `phoneNumber`, `address`) VALUES
(1, '清潔用品工廠', '王大仁', '0900000001', '台南市永康區15號'),
(4, '冰棒工廠', '陳添基', '0900000002', '高雄市左營區82號');

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE `user` (
  `id` varchar(10) NOT NULL,
  `password` varchar(15) NOT NULL,
  `email` varchar(20) NOT NULL,
  `phone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `user`
--

INSERT INTO `user` (`id`, `password`, `email`, `phone`) VALUES
('A01', '123', 'A01@gmail.com', '0900000001');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `dept`
--
ALTER TABLE `dept`
  ADD PRIMARY KEY (`deptID`),
  ADD UNIQUE KEY `deptName` (`deptName`);

--
-- 資料表索引 `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productID`);

--
-- 資料表索引 `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplierID`),
  ADD UNIQUE KEY `address` (`address`);

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `dept`
--
ALTER TABLE `dept`
  MODIFY `deptID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `products`
--
ALTER TABLE `products`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplierID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
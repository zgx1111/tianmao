-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- 主机： localhost
-- 生成日期： 2020-08-03 09:32:02
-- 服务器版本： 5.7.26
-- PHP 版本： 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `yx`
--

-- --------------------------------------------------------

--
-- 表的结构 `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL COMMENT '主键id',
  `username` varchar(50) NOT NULL COMMENT '账号',
  `password` varchar(50) NOT NULL COMMENT '密码'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '123');

-- --------------------------------------------------------

--
-- 表的结构 `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL COMMENT '主键id',
  `name` varchar(50) NOT NULL COMMENT '市名字',
  `create_time` varchar(50) NOT NULL COMMENT '创建时间',
  `update_time` varchar(50) NOT NULL COMMENT '更新时间',
  `delete_time` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `city`
--

INSERT INTO `city` (`id`, `name`, `create_time`, `update_time`, `delete_time`) VALUES
(1, '北京', '1596360153', '1596360153', NULL),
(2, '上海啊', '1596360153', '1596361333', NULL),
(3, '武汉', '1596360153', '1596360153', NULL),
(4, '天津', '1596360553', '1596361314', NULL),
(5, '江苏', '1596361344', '1596361344', NULL),
(6, '椰子', '1596362996', '1596362996', NULL);

-- --------------------------------------------------------

--
-- 表的结构 `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL COMMENT '主键id',
  `name` varchar(50) NOT NULL COMMENT '县名字',
  `city_id` int(11) NOT NULL COMMENT '关联市id',
  `create_time` varchar(50) NOT NULL COMMENT '创建时间',
  `update_time` varchar(50) NOT NULL COMMENT '更新时间',
  `delete_time` varchar(50) DEFAULT NULL COMMENT '删除时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `country`
--

INSERT INTO `country` (`id`, `name`, `city_id`, `create_time`, `update_time`, `delete_time`) VALUES
(1, '北京', 1, '1596361344', '1596361344', NULL),
(2, '上海', 2, '1596361344', '1596361344', NULL),
(3, '开鲁', 1, '1596365034', '1596365034', NULL),
(4, '椰子去', 1, '1596365042', '1596366681', NULL),
(5, '测试1', 5, '1596365090', '1596365090', NULL),
(6, '测试2', 2, '1596365209', '1596366806', NULL);

-- --------------------------------------------------------

--
-- 表的结构 `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL COMMENT '主键id',
  `order_no` varchar(50) NOT NULL COMMENT '订单号',
  `snap_items` text NOT NULL COMMENT '订单内容',
  `snap_address` varchar(500) NOT NULL COMMENT '订单地址',
  `contacts` varchar(50) NOT NULL COMMENT '联系人',
  `phone` varchar(11) NOT NULL COMMENT '电话',
  `country_id` int(11) NOT NULL COMMENT '关联县id',
  `status` varchar(11) NOT NULL COMMENT '订单状态',
  `create_time` varchar(50) NOT NULL COMMENT '创建时间',
  `update_time` varchar(50) NOT NULL COMMENT '更新时间',
  `delete_time` varchar(50) DEFAULT NULL COMMENT '删除时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `orders`
--

INSERT INTO `orders` (`id`, `order_no`, `snap_items`, `snap_address`, `contacts`, `phone`, `country_id`, `status`, `create_time`, `update_time`, `delete_time`) VALUES
(1, 'AC27378364077773', '内容', '北京', '张三', '12345678911', 1, '1', '1577437836', '1590548372', NULL),
(2, '33', '1', 's', '里斯', '123', 2, '1', '1596278366', '1596339999', NULL),
(3, '12', '1', 's', '', '', 1, '1', '1596278633', '1596278633', NULL),
(4, '123', '123', '123', '', '', 1, '1', '1596278828', '1596278828', NULL),
(5, '123', '123', '123', '', '', 1, '1', '1596278881', '1596278881', NULL),
(6, '22', '1', 's', '', '', 1, '1', '1596281195', '1596281195', NULL),
(7, '22', '1', 's', '', '', 1, '1', '1596281345', '1596281345', NULL),
(8, '22', '1', 's', '', '', 1, '1', '1596281366', '1596281366', NULL),
(9, '22', '1', 's', '', '', 1, '1', '1596281550', '1596281550', NULL),
(10, '33', '1', 's', '', '', 1, '1', '1596281559', '1596281559', NULL),
(11, '33', '1', 's', '12', '123', 1, '1', '1596282293', '1596282293', NULL),
(12, '44', '44', '44', '44', '44', 2, '1', '1596282425', '1596282425', NULL),
(13, '44', '44', '44', '44', '44', 2, '2', '1596282473', '1596282473', NULL),
(14, '44', '33', '33', '33', '33', 1, '1', '1596282521', '1596282521', NULL),
(15, '123', '44', '中国', '中国', '18747830783', 1, '1', '1596282605', '1596282605', NULL);

-- --------------------------------------------------------

--
-- 表的结构 `remind`
--

CREATE TABLE `remind` (
  `id` int(11) NOT NULL COMMENT '主键id',
  `order_id` int(11) NOT NULL COMMENT '订单关联id',
  `country_id` int(11) NOT NULL COMMENT '关联城市id',
  `create_time` int(50) NOT NULL COMMENT '创建时间',
  `update_time` int(50) NOT NULL COMMENT '更新时间',
  `delete_time` int(50) DEFAULT NULL COMMENT '删除时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `remind`
--

INSERT INTO `remind` (`id`, `order_id`, `country_id`, `create_time`, `update_time`, `delete_time`) VALUES
(1, 8, 1, 1596281366, 1596281366, NULL),
(2, 9, 1, 1596281550, 1596281550, NULL),
(3, 10, 1, 1596281559, 1596281559, NULL),
(4, 11, 1, 1596282293, 1596282293, NULL),
(5, 12, 2, 1596282425, 1596282425, NULL),
(6, 13, 2, 1596282473, 1596282473, NULL),
(7, 14, 1, 1596282521, 1596282521, NULL),
(8, 15, 1, 1596282605, 1596282605, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL COMMENT '账号',
  `password` varchar(50) NOT NULL COMMENT '密码',
  `country_id` int(11) NOT NULL COMMENT '关联县id',
  `true_name` varchar(50) NOT NULL COMMENT '名字',
  `phone` varchar(11) NOT NULL COMMENT '手机号',
  `create_time` int(50) NOT NULL COMMENT '创建时间',
  `update_time` int(50) NOT NULL COMMENT '修改时间',
  `delete_time` int(50) DEFAULT NULL COMMENT '删除时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `country_id`, `true_name`, `phone`, `create_time`, `update_time`, `delete_time`) VALUES
(1, '33', '1', 2, '', '121312111', 1577437836, 1596335924, NULL),
(2, '33', '1', 2, '章', '121312111', 1596289438, 1596335717, NULL),
(3, '33', '1', 2, '', '121312111', 1596289526, 1596335962, NULL),
(4, '33', '1', 1, '1', '121312111', 1596289567, 1596289567, NULL),
(5, 'md001', '123', 1, '里斯', '13039592624', 1596289833, 1596289833, NULL),
(6, 'user1', '123', 1, '测试', '12345678911', 1596334786, 1596336251, NULL),
(7, 'user1', '1232', 1, '', '12345678911', 1596334793, 1596334793, NULL),
(8, 'user1', '123', 2, '', '12345678911', 1596334805, 1596334805, NULL),
(9, '33', '1', 2, '', '121312111', 1596334820, 1596334820, NULL);

--
-- 转储表的索引
--

--
-- 表的索引 `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `remind`
--
ALTER TABLE `remind`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键id', AUTO_INCREMENT=2;

--
-- 使用表AUTO_INCREMENT `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键id', AUTO_INCREMENT=7;

--
-- 使用表AUTO_INCREMENT `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键id', AUTO_INCREMENT=7;

--
-- 使用表AUTO_INCREMENT `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键id', AUTO_INCREMENT=16;

--
-- 使用表AUTO_INCREMENT `remind`
--
ALTER TABLE `remind`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键id', AUTO_INCREMENT=9;

--
-- 使用表AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

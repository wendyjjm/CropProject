-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2016-04-10 10:32:36
-- 服务器版本： 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `DroughtResistingDB`
--

-- --------------------------------------------------------

--
-- 表的结构 `metadata`
--

CREATE TABLE `metadata` (
  `id` int(11) NOT NULL,
  `cn` varchar(50) CHARACTER SET utf8 NOT NULL,
  `eng` varchar(50) NOT NULL,
  `tablename` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `metadata`
--

INSERT INTO `metadata` (`id`, `cn`, `eng`, `tablename`) VALUES
(1, '种质名称', 'germplasm', 'shuidao'),
(2, '相对芽长', 'relativesproutlangth', 'shuidao'),
(3, '用相对芽长分级划分的抗旱级别', 'levelbaseonsproutlength', 'shuidao'),
(4, '相对芽鞘长', 'relativesprout', 'shuidao'),
(5, '用相对芽鞘长划分的抗旱级别', 'levelbaseonsprout', 'shuidao'),
(6, '相对根长', 'relativerootlength', 'shuidao'),
(7, '用相对根长划分的抗旱级别', 'levelbaseonrootlength', 'shuidao'),
(8, '相对根数', 'relativerootno', 'shuidao'),
(9, '用相对根数划分的抗旱级别', 'levelbaseonrootno', 'shuidao'),
(10, '相对发芽率', 'relativegerminationrate', 'shuidao'),
(11, '用相对发芽率%划分的抗旱级别', 'levelbaseongerminationrate', 'shuidao'),
(12, '相对芽干重', 'relativesproutweight', 'shuidao'),
(13, '用相对芽干重划分的抗旱级别', 'levelbaseonsproutweight', 'shuidao'),
(14, '相对根干重', 'relativerootweight', 'shuidao'),
(15, '用相对根干重划分的抗旱级别', 'levelbaseonrootweight', 'shuidao'),
(16, '总级别1', 'level', 'shuidao'),
(17, '用总级别HR划分的抗旱级别', 'levelbaseonlevel', 'shuidao'),
(18, '序号', 'xuhao', 'youcai'),
(19, '参试材料编号', 'biaohao', 'youcai'),
(20, '干旱处理时期', 'processtime', 'youcai'),
(21, '鉴定时间', 'time', 'youcai'),
(22, '抗旱指数', 'kanghanindex', 'youcai'),
(23, '抗旱指数评价的抗旱性', 'levelbaseonindex', 'youcai'),
(24, '平均隶属函数值/灰色关联系数', 'huiseguanlianxishu', 'youcai'),
(25, '隶属函数值/关联系数评价的抗旱性', 'guanlianxishu', 'youcai'),
(26, '抗旱性综合评价', 'zonghepingjia', 'youcai'),
(27, '抗旱系数', 'ratio', 'youcai'),
(28, '产量干旱', 'droughtproduce', 'youcai'),
(29, '产量对照', 'contrastproduce', 'youcai'),
(30, '株高干旱cm', 'zhugaoganhan', 'youcai'),
(31, '株高对照cm', 'zhugaoduizhao', 'youcai'),
(32, '分枝数干旱', 'fenzhishuganhan', 'youcai'),
(33, '分枝数对照', 'fenzhishuduizhao', 'youcai'),
(34, '主花序长干旱cm', 'zhuhuaxuganhan', 'youcai'),
(35, '主花序长对照cm', 'zhuhuaxuduizhao', 'youcai'),
(36, '主花序有效角果数干旱', 'youxiaojiaoguoshuganhan', 'youcai'),
(37, '主花序有效角果数对照', 'youxiaojiaoguoshuduizhao', 'youcai'),
(38, '全株有效角果数干旱', 'quanzhuyouxiaoganhan', 'youcai'),
(39, '全株有效角果数对照', 'quanzhuyouxiaoduizhao', 'youcai'),
(40, '主茎角果密度个/cm干旱', 'zhujingjiaoguoganhan', 'youcai'),
(41, '主茎角果密度个/cm对照', 'zhujingjiaoguoduizhao', 'youcai'),
(42, '角粒数干旱', 'jiaolishuganhan', 'youcai'),
(43, '角粒数对照', 'jiaolishuduizhao', 'youcai'),
(44, '千粒重干旱g', 'qianlizhongganhan', 'youcai'),
(45, '千粒重对照g', 'qianlizhongduizhao', 'youcai'),
(46, '主根长处理cm', 'zhugenchangceli', 'youcai'),
(47, '主根长对照cm', 'zhugenchangduizhao', 'youcai'),
(48, '侧根数处理', 'cegenshuchuli', 'youcai'),
(49, '侧根数对照', 'cegenshuduizhao', 'youcai'),
(50, '植株总鲜重处理g', 'zongxianzhongceli', 'youcai'),
(51, '植株总鲜重对照g', 'zhongxianzhongduizhao', 'youcai'),
(52, '根鲜重处理g', 'genxiaozhongceli', 'youcai'),
(53, '根鲜重对照g', 'genxianzhongduizhao', 'youcai'),
(54, '地上部分鲜重处理g', 'dishangxianzhongceli', 'youcai'),
(55, '地上部分鲜重对照g', 'dishangxianzhongduizhong', 'youcai'),
(56, '根冠比处理', 'genguanbiceli', 'youcai'),
(57, '根冠比对照', 'genguanbiduizhao', 'youcai'),
(58, '备注', 'beizhu', 'youcai'),
(59, '种质名称', 'zhongzhi', 'handao'),
(60, '抗旱系数', 'xishu', 'handao'),
(61, '抗旱指数', 'zhishu', 'handao'),
(62, '用抗旱指数划分的全生育期抗旱性级别', 'levelbaseonradio', 'handao'),
(63, '相对发芽势', 'relativegerminability', 'handao'),
(64, '用相对发芽势划分的抗旱级别', 'levelbaseongerminability', 'handao'),
(65, '相对发芽率', 'relativegerminationrate', 'handao'),
(66, '用相对发芽率划分的抗旱级别', 'levelbaseongerminationrate', 'handao'),
(67, '相对根数', 'relativerootno', 'handao'),
(68, '用相对根数划分的抗旱级别', 'levelbaseonrootno', 'handao'),
(69, '相对根长', 'relativerootlength', 'handao'),
(70, '用相对根长划分的抗旱级别', 'levelbaseonrootlength', 'handao'),
(71, '相对芽鞘', 'relativesprout', 'handao'),
(72, '用相对芽鞘划分的抗旱级别', 'levelbaseonsprout', 'handao'),
(73, '相对芽长', 'relativesproutlangth', 'handao'),
(74, '用相对芽长划分的抗旱级别', 'levelbaseonsproutlength', 'handao');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `metadata`
--
ALTER TABLE `metadata`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `metadata`
--
ALTER TABLE `metadata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

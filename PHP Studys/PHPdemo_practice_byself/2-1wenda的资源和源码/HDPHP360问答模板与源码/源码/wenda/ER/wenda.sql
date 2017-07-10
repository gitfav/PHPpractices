-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2013 年 09 月 03 日 00:10
-- 服务器版本: 5.1.69
-- PHP 版本: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

DROP SCHEMA IF EXISTS `wenda` ;
CREATE SCHEMA IF NOT EXISTS `wenda` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `wenda` ;
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `wenda`
--

-- --------------------------------------------------------

--
-- 表的结构 `hd_admin`
--

DROP TABLE IF EXISTS `hd_admin`;
CREATE TABLE IF NOT EXISTS `hd_admin` (
  `aid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL DEFAULT '' COMMENT '用户名',
  `passwd` char(32) NOT NULL DEFAULT '' COMMENT '密码',
  `logintime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '登录时间',
  `loginip` char(20) NOT NULL DEFAULT '',
  `lock` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '0为没有锁定，1为锁定',
  PRIMARY KEY (`aid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='后台用户表' AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `hd_admin`
--

INSERT INTO `hd_admin` (`aid`, `username`, `passwd`, `logintime`, `loginip`, `lock`) VALUES
(1, 'admin', 'bf320fa3295cf4770c58db4db5a8ef04', 1378135459, '101.38.41.193', 0),
(2, 'houdunwang', '21232f297a57a5a743894a0e4a801fc3', 1378116526, '124.205.157.210', 0),
(3, 'admin01', 'admin888', 0, '', 0),
(4, 'admin02', '7fef6171469e80d32c0559f88b377245', 1377755792, '127.0.0.1', 0);

-- --------------------------------------------------------

--
-- 表的结构 `hd_answer`
--

DROP TABLE IF EXISTS `hd_answer`;
CREATE TABLE IF NOT EXISTS `hd_answer` (
  `anid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `content` varchar(255) NOT NULL DEFAULT '' COMMENT '回答内容',
  `time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '回答时间',
  `accept` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '0为没有被采纳，1为已经采纳',
  `uid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '所属用户ID',
  `asid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '所属问题ID',
  PRIMARY KEY (`anid`),
  KEY `fk_hd_answer_hd_user_idx` (`uid`),
  KEY `fk_hd_answer_hd_ask1_idx` (`asid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='回答表' AUTO_INCREMENT=33 ;

--
-- 转存表中的数据 `hd_answer`
--

INSERT INTO `hd_answer` (`anid`, `content`, `time`, `accept`, `uid`, `asid`) VALUES
(1, 'www.houdunwang.com', 1377152799, 0, 0, 1),
(2, 'www.houdunwang.com', 1377152871, 0, 2, 1),
(3, 'www.houdunwang.com ', 1377156096, 0, 2, 1),
(4, 'www.houdunwang.com ', 1377156100, 0, 2, 1),
(5, 'www.houdunwang.com ', 1377156103, 0, 2, 1),
(6, 'httt://www.houdunwang.com', 1377156957, 0, 2, 1),
(7, 'http://www.houdunwang.com', 1377156986, 1, 2, 1),
(8, '非常的负责任！', 1377166536, 1, 2, 6),
(11, '每一个人都可以独立完成！', 1377168403, 1, 2, 9),
(15, '有开设远程班！', 1377177419, 0, 2, 8),
(16, '有的！', 1377177773, 0, 2, 7),
(17, '有的！', 1377180996, 0, 2, 4),
(18, '有的！！！向军老师开发的！', 1377260593, 0, 2, 5),
(19, '就业普遍在5000以上吧，可以去后盾官网去看下。', 1378112653, 0, 2, 3),
(20, '讲啊，而且前端学完之后，学员作品都十分强大！', 1378115583, 0, 2, 24),
(21, '当然好找了，有些没有毕业就被就业单位招走了。', 1378115617, 1, 2, 21),
(22, '住宿挺方便，离上课也不远，而且房租挺便宜的。', 1378115697, 0, 2, 16),
(23, '当然可以，而且免费视频教程就有非常大的知识含量！', 1378115820, 0, 2, 15),
(24, '讲的非常的细致，而且进度把握的比较好。尤其是向军老师。', 1378115869, 0, 2, 14),
(25, 'www.houdunwang.com', 1378115896, 0, 2, 23),
(26, 'bbs.houdunwang.com', 1378115912, 0, 2, 23),
(27, 'www.houdunwang.com', 1378115954, 0, 2, 22),
(28, '小班制，绝不做大锅饭！', 1378115978, 0, 2, 20),
(29, '没有见过比后盾网老师还要负责任的老师。', 1378116004, 0, 2, 19),
(30, '有的，而且讲的非常之细！', 1378116047, 0, 2, 18),
(31, '可以办理0学费入学！', 1378116063, 0, 2, 17),
(32, '有的，而且有好的整站开发的实战视频，可以到bbs.houdunwang.com看一下。', 1378116121, 0, 1, 13);

-- --------------------------------------------------------

--
-- 表的结构 `hd_ask`
--

DROP TABLE IF EXISTS `hd_ask`;
CREATE TABLE IF NOT EXISTS `hd_ask` (
  `asid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `content` varchar(255) NOT NULL DEFAULT '' COMMENT '提问内容',
  `time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '提问时间',
  `solve` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '0为没有解决，1为已经解决',
  `answer` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '回答数',
  `reward` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '悬赏金币',
  `uid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '所属用户ID',
  `cid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '所属分类ID',
  PRIMARY KEY (`asid`),
  KEY `fk_hd_ask_hd_user1_idx` (`uid`),
  KEY `fk_hd_ask_hd_category1_idx` (`cid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='提问表' AUTO_INCREMENT=25 ;

--
-- 转存表中的数据 `hd_ask`
--

INSERT INTO `hd_ask` (`asid`, `content`, `time`, `solve`, `answer`, `reward`, `uid`, `cid`) VALUES
(1, '后盾网的网址是什么？', 1377128653, 1, 7, 30, 1, 206),
(3, '后盾学员就业怎么样？', 1377129568, 0, 1, 100, 1, 1),
(4, '后盾网有实战视频吗？', 1377129609, 0, 1, 0, 1, 1),
(5, '后盾网有自主研发的框架吗？', 1377129683, 0, 1, 30, 1, 1),
(6, '后盾网的老师负责任吗？', 1377129709, 1, 1, 30, 1, 1),
(7, '后盾网有实体培训班吗？', 1377129744, 0, 1, 20, 1, 1),
(8, '后盾网有远程班吗？', 1377129868, 0, 1, 0, 1, 1),
(9, '在后盾培训完，独立可以开发出项目吗？', 1377129947, 1, 1, 5, 1, 1),
(13, '后盾网有免费高清视频教程吗？', 1378112715, 0, 1, 50, 2, 206),
(14, '后盾网老师讲的怎么样呀？', 1378112864, 0, 1, 10, 1, 206),
(15, '到后盾网可以学到真正的东西吗？', 1378112904, 0, 1, 20, 1, 20),
(16, '去后盾网学习住宿方便吗？', 1378112939, 0, 1, 20, 1, 206),
(17, '后盾网可以0学费入学吗？', 1378113110, 0, 1, 50, 1, 206),
(18, '后盾网有基础视频教程吗？', 1378113218, 0, 1, 50, 1, 206),
(19, '后盾网的老师负责任吗？', 1378113293, 0, 1, 50, 1, 206),
(20, '后盾网是小班制吗？', 1378113344, 0, 1, 30, 1, 206),
(21, '从后盾网学完之后工作好找吗？', 1378113422, 1, 1, 15, 1, 206),
(22, '后盾网的网址是什么？', 1378113465, 0, 1, 50, 1, 206),
(23, '后盾网的论坛网址是什么？', 1378113501, 0, 2, 50, 1, 15),
(24, '后盾网讲前端课程吗？', 1378113549, 0, 1, 10, 1, 15);

-- --------------------------------------------------------

--
-- 表的结构 `hd_category`
--

DROP TABLE IF EXISTS `hd_category`;
CREATE TABLE IF NOT EXISTS `hd_category` (
  `cid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(20) NOT NULL DEFAULT '' COMMENT '分类名称',
  `pid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '父级ID',
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='分类表' AUTO_INCREMENT=214 ;

--
-- 转存表中的数据 `hd_category`
--

INSERT INTO `hd_category` (`cid`, `title`, `pid`) VALUES
(1, '电脑/网络', 0),
(2, '手机/数码', 0),
(3, '生活', 0),
(4, '游戏', 0),
(5, '体育/运动', 0),
(6, '娱乐明星', 0),
(7, '休闲爱好', 0),
(8, '文化/艺术', 0),
(9, '社会民生', 0),
(10, '教育/科学', 0),
(11, '健康/医疗', 0),
(12, '商业/理财', 0),
(13, '情感/家庭', 0),
(15, '电脑知识', 1),
(16, '互联网', 1),
(17, '操作系统', 1),
(18, '软件', 1),
(19, '硬件', 1),
(20, '编程开发', 1),
(21, '电脑安全', 1),
(22, '资源分享', 1),
(23, '笔记本电脑', 1),
(24, '手机/通讯', 2),
(25, '平板', 2),
(26, 'MP3/MP4', 2),
(27, '手机品牌', 2),
(28, '其他数码', 2),
(29, '手机系统', 2),
(30, '照相机/摄像机', 2),
(31, '数码品牌', 2),
(32, '购物时尚', 3),
(33, '美容塑身', 3),
(34, '美食', 3),
(35, '生活知识', 3),
(36, '品牌服装', 3),
(37, '出行旅游', 3),
(38, '交通', 3),
(39, '购车保养', 3),
(40, '购房置业', 3),
(41, '房屋装饰', 3),
(42, '风水', 3),
(43, '家电用品', 3),
(44, '烹饪', 3),
(45, '网游', 4),
(46, '单机游戏', 4),
(47, '网页游戏', 4),
(48, '盛大游戏', 4),
(49, '网易', 4),
(50, '九城游戏', 4),
(51, '腾讯游戏', 4),
(52, '完美游戏', 4),
(53, '久游游戏', 4),
(54, '巨人游戏', 4),
(55, '金山游戏', 4),
(56, '网龙游戏', 4),
(57, '电视游戏', 4),
(58, '足球', 5),
(59, '篮球', 5),
(60, '体育明星', 5),
(61, '综合赛事', 5),
(62, '田径', 5),
(63, '跳水游泳', 5),
(64, '小球运动', 5),
(65, '赛车赛事', 5),
(66, '强身健体', 5),
(67, '运动品牌', 5),
(68, '电影电视', 6),
(69, '明星', 6),
(70, '音乐', 6),
(71, '动漫', 6),
(72, '星座', 6),
(73, '摄影摄像', 7),
(74, '收藏', 7),
(75, '宠物', 7),
(76, '脑筋急转弯', 7),
(77, '谜语', 7),
(78, '幽默搞笑', 7),
(79, '起名', 7),
(80, '园艺艺术', 7),
(81, '花鸟鱼虫', 7),
(82, '茶艺', 7),
(83, '国内外文学', 8),
(84, '美术', 8),
(85, '舞蹈', 8),
(86, '散文/小说', 8),
(87, '图书音像', 8),
(88, '器乐/声乐', 8),
(89, '小品相声', 8),
(90, '戏剧戏曲', 8),
(91, '时事政治', 9),
(92, '舆论', 9),
(93, '就业/职场', 9),
(94, '历史话题', 9),
(95, '军事国防', 9),
(96, '节日假期', 9),
(97, '民族风情', 9),
(98, '法律知识', 9),
(99, '宗教', 9),
(100, '礼仪', 9),
(101, '学习辅助', 10),
(102, '考研/考证', 10),
(103, '外语', 10),
(104, '菁菁校园', 10),
(105, '人文学', 10),
(106, '理工学', 10),
(107, '公务员', 10),
(108, '留学/出国', 10),
(109, '健康知识', 11),
(110, '孕育/家教', 11),
(111, '内科', 11),
(112, '心理健康', 11),
(113, '外科', 11),
(114, '妇产科', 11),
(115, '儿科', 11),
(116, '皮肤科', 11),
(117, '五官科', 11),
(118, '男科', 11),
(119, '美容整形', 11),
(120, '中医', 11),
(121, '药品', 11),
(122, '心血管科', 11),
(123, '传染科', 11),
(124, '其它疾病', 11),
(125, '健康体检', 11),
(126, '医院', 11),
(127, '创业', 12),
(128, '企业管理', 12),
(129, '财务税务', 12),
(130, '银行', 12),
(131, '股票', 12),
(132, '金融/期货', 12),
(133, '基金债券', 12),
(134, '保险', 12),
(135, '贸易', 12),
(136, '外贸', 12),
(137, '商务文书', 12),
(138, '国民经济', 12),
(139, '个人理财', 12),
(140, '恋爱', 13),
(141, '朋友', 13),
(142, '婚嫁', 13),
(143, '两性', 13),
(144, '家庭', 13),
(145, '孩子教育', 13),
(181, '电脑配置', 15),
(182, '电脑日常维护', 15),
(183, '上网问题', 16),
(184, '新浪', 16),
(185, '腾讯', 16),
(186, 'Windows XP', 17),
(187, 'windows 7', 17),
(188, 'Windows Vista', 17),
(189, 'Windows 8', 17),
(190, '办公软件', 18),
(191, '网络软件', 18),
(192, '图像处理', 18),
(193, '系统软件', 18),
(194, '多媒体软件', 18),
(195, '硬盘', 19),
(196, '显示设备', 19),
(197, 'CPU', 19),
(198, '显卡', 19),
(199, '内存', 19),
(200, '主板', 19),
(201, '键盘/鼠标', 19),
(202, 'HTML', 20),
(203, 'DIV+CSS', 20),
(204, 'JavaScript', 20),
(205, 'jQuery', 20),
(206, 'PHP', 20),
(207, 'MySQL', 20),
(208, 'Linux', 20),
(209, 'Objective-C', 20),
(210, 'Java', 20),
(211, 'C/C++', 20),
(212, '网络防火墙', 1);

-- --------------------------------------------------------

--
-- 表的结构 `hd_user`
--

DROP TABLE IF EXISTS `hd_user`;
CREATE TABLE IF NOT EXISTS `hd_user` (
  `uid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL DEFAULT '' COMMENT '用户名',
  `passwd` char(32) NOT NULL DEFAULT '' COMMENT '密码',
  `ask` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '提问数',
  `answer` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '回答数',
  `accept` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '采纳数',
  `point` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '金币',
  `exp` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '经验',
  `restime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '注册时间',
  `logintime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '登录时间',
  `loginip` char(20) NOT NULL DEFAULT '' COMMENT '登录IP',
  `lock` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '0为没有锁定，1为锁定',
  `face` varchar(100) NOT NULL DEFAULT '' COMMENT 'å¤´åƒ',
  PRIMARY KEY (`uid`),
  UNIQUE KEY `username_UNIQUE` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='前台用户表' AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `hd_user`
--

INSERT INTO `hd_user` (`uid`, `username`, `passwd`, `ask`, `answer`, `accept`, `point`, `exp`, `restime`, `logintime`, `loginip`, `lock`, `face`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 24, 1, 0, 629, 63, 0, 1378116089, '124.205.157.210', 0, ''),
(2, 'houdunwang', '7fef6171469e80d32c0559f88b377245', 2, 30, 9, 145, 127, 1377048366, 1378115529, '124.205.157.210', 0, ''),
(3, 'houdun', '7fef6171469e80d32c0559f88b377245', 0, 0, 0, 0, 0, 1377746148, 0, '', 0, '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

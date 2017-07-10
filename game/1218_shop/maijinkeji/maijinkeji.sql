-- phpMyAdmin SQL Dump
-- version 3.3.7
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2015 年 12 月 18 日 23:01
-- 服务器版本: 5.1.63
-- PHP 版本: 5.2.17p1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `maijinkeji`
--

-- --------------------------------------------------------

--
-- 表的结构 `gameuser`
--

CREATE TABLE IF NOT EXISTS `gameuser` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `openid` varchar(100) NOT NULL COMMENT '玩家在微信中的唯一ID',
  `name` varchar(200) NOT NULL COMMENT '名称',
  `image` varchar(200) NOT NULL COMMENT '头像地址',
  `rtime` int(11) NOT NULL DEFAULT '0' COMMENT '注册时间',
  `score` float NOT NULL DEFAULT '0' COMMENT '最高分',
  `count` int(11) NOT NULL DEFAULT '0',
  `sharecount` int(11) NOT NULL COMMENT '分享次数',
  `sharepyq` int(11) NOT NULL COMMENT '分享到朋友圈次数',
  `sharepy` int(11) NOT NULL COMMENT '分享给朋友次数',
  `ltime` int(11) NOT NULL DEFAULT '0',
  `phone` bigint(20) NOT NULL DEFAULT '0' COMMENT '手机号',
  `rname` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- 转存表中的数据 `gameuser`
--

INSERT INTO `gameuser` (`id`, `openid`, `name`, `image`, `rtime`, `score`, `count`, `sharecount`, `sharepyq`, `sharepy`, `ltime`, `phone`, `rname`) VALUES
(1, 'oNepzv6isAybg_NmAgf9zucHDvMQ', '卢司洋', 'http://wx.qlogo.cn/mmopen/TAkTP02XHSV93JSplAL1tX414NoRdX1eeIb27tBzcDQm1OiatvJyGFbazR5T5kWBqiaAiaR7vxz1VwHZe5ibacLibPa3sOaLEEBFW/0', 1450144408, 410, 12, 0, 0, 0, 1450418095, 0, ''),
(2, 'oNepzvzBK9tbQKLikOvliyUEjWsA', '　何海涛', 'http://wx.qlogo.cn/mmopen/ibzl1D5eCfxDnAxahFJicmOkGsLh4Ur62eMID9y5EicSp0zczbEzz9Oyen3b2YJJjVAZ2juZmDGiaXsWs6JxedDTFLYK8klqecIz/0', 1450144464, 110, 2, 0, 0, 0, 1450144556, 0, ''),
(3, 'oNepzvxC-S1_4B29eXVwjUKyMUTY', 'apple', 'http://wx.qlogo.cn/mmopen/87U9mEjd3z1gdLbJVUaiaxB9ibEUwaxpHjQibYF5FgbOE0yqwf40Sf4kDlblWxPctmLzNQrkraPwDtTqtmvkibPbpA1uMcslEJXZ/0', 1450145829, 145, 3, 1, 0, 1, 1450146281, 0, ''),
(4, 'oNepzv34oBQPjfjVtLwFgy_1uSqo', '琼琼卯兔', 'http://wx.qlogo.cn/mmopen/ibzl1D5eCfxDnAxahFJicmOhyekwlQwqMWhKgG67WkIa9CwicicuqdQjjibRxspxj4ZaX3D2hnECKsP12ENL1hlUqBkqjEbAQZiaEr/0', 1450146507, 40, 1, 0, 0, 0, 1450417420, 0, ''),
(5, 'oNepzv-3CMwoQZETkCDXGm_zt4u8', '军', 'http://wx.qlogo.cn/mmopen/AjNcSVBJSiciaUBC2hpdZXZzWVCwpa0LeYqdBN5EeFHwK2ddxoQCJCa98rttszVPVeiajv3Rqs9Tm0lDlsWdSLg13S6H1r4A43M/0', 1450146868, 110, 1, 0, 0, 0, 1450146906, 0, ''),
(6, 'oNepzv0ntGFBfGR-gZRLFYSDap1s', '华仔', 'http://wx.qlogo.cn/mmopen/ajNVdqHZLLDAFiaq5LZzthTZLNEMUh6S9OI78DAS9T5U7ZQowsFc4kznMePY5D1d5ahwshuJBeic2pZx71onOhuw/0', 1450147446, 210, 7, 5, 0, 5, 1450418253, 0, ''),
(7, 'oNepzv3KWK6jH4RFQDhVoz62ahuU', '九九', 'http://wx.qlogo.cn/mmopen/LXqicVqwJiatqfUhGBhtdKsiaKcbNTjHIQoGpLTf5cqXHKdQZMianGtI4A3kW2WCeRswg6ss29BxonMxLqXyKasqhA/0', 1450147734, 470, 30, 2, 0, 2, 1450422324, 0, ''),
(8, 'oNepzv_fGaqJXvcnyzEgGowYxXJg', 'chris', 'http://wx.qlogo.cn/mmopen/Q3auHgzwzM4f2TsZuIyoBbMZeicBqTFPEr7SpHTSudNsAJHfeGicHeRMwXany6KqamLdW5kkCQUXBaaT3iaH4glSg/0', 1450148055, 200, 4, 0, 0, 0, 1450419212, 0, ''),
(9, 'oNepzvwE7KWj63g3oed8flaOhT6s', '波波先生', 'http://wx.qlogo.cn/mmopen/LXqicVqwJiatpibSLgDH7BniatIJvrpANRBWYOo9FRejPwaCKJ3OOU4AoBOcVuAUKMovqzkk4hRyiagKx9rjqg6hVsVk7WtNQpELF/0', 1450148074, 185, 10, 1, 0, 1, 1450148543, 0, ''),
(10, 'oNepzv3odqC8io0NuP4d3oSbG5qA', 'fly', 'http://wx.qlogo.cn/mmopen/ibzl1D5eCfxC7jpnJ5D2gRrJBYJp1icQHUGHKNphuL9gTLIibGZvuSEziaNHADfYGMvhZEBMnx1ssiaPPLfgzOgjuHibKo8mvicVPsD/0', 1450148190, 420, 6, 0, 0, 0, 1450246994, 0, ''),
(11, 'oNepzvx05JtRoYXmaNh3ktxdQZQ8', '岑小 妞‍微信超級會員', 'http://wx.qlogo.cn/mmopen/87U9mEjd3z1gdLbJVUaiaxNNWmuvAIuEX0NZcricBeKNzPWFnKJMrMx6fCZXibfFzjt8gTiaibe5ES4FftEup6PeHT4klGkIQs3Lc/0', 1450148683, 80, 2, 1, 0, 1, 1450237654, 0, ''),
(12, 'oNepzv7txida3FrEPniG6oQmuQ64', '你知道，我知道', 'http://wx.qlogo.cn/mmopen/ibzl1D5eCfxDnAxahFJicmOpNib9DEDyAsk3picfsZ1OVGoibmQRicricHVX9aVWMcEqrhlnEZw6avRdnVic8Ex4ZL8L9KdOO7x5FhkT/0', 1450241884, 110, 2, 0, 0, 0, 1450420235, 0, ''),
(13, 'oNepzv_SjIKBhk9K3eIsOs1Z_2yc', '华彦张', '', 1450418966, 0, 0, 0, 0, 0, 0, 0, '');

-- --------------------------------------------------------

--
-- 表的结构 `sharelog`
--

CREATE TABLE IF NOT EXISTS `sharelog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `openid` varchar(50) DEFAULT NULL,
  `nicheng` varchar(200) CHARACTER SET utf8 NOT NULL,
  `type` text CHARACTER SET utf8,
  `name` text CHARACTER SET utf8,
  `time` int(11) DEFAULT NULL,
  `time2` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- 转存表中的数据 `sharelog`
--

INSERT INTO `sharelog` (`id`, `openid`, `nicheng`, `type`, `name`, `time`, `time2`) VALUES
(1, 'oNepzvxC-S1_4B29eXVwjUKyMUTY', '', '好友', 'apple', 1450146281, NULL),
(2, 'oNepzv0ntGFBfGR-gZRLFYSDap1s', '', '好友', '华仔', 1450147723, NULL),
(3, 'oNepzv3KWK6jH4RFQDhVoz62ahuU', '', '好友', '九九', 1450148249, NULL),
(4, 'oNepzvwE7KWj63g3oed8flaOhT6s', '', '好友', '波波先生', 1450148543, NULL),
(5, 'oNepzv0ntGFBfGR-gZRLFYSDap1s', '', '好友', '华仔', 1450164230, NULL),
(6, 'oNepzvx05JtRoYXmaNh3ktxdQZQ8', '', '好友', '岑小 妞‍微信超級會員', 1450237654, NULL),
(7, 'oNepzv3KWK6jH4RFQDhVoz62ahuU', '', '好友', '九九', 1450240418, NULL),
(8, 'oNepzv0ntGFBfGR-gZRLFYSDap1s', '', '好友', '华仔', 1450417484, NULL),
(9, 'oNepzv0ntGFBfGR-gZRLFYSDap1s', '', '好友', '华仔', 1450418130, NULL),
(10, 'oNepzv0ntGFBfGR-gZRLFYSDap1s', '', '好友', '华仔', 1450418253, NULL);

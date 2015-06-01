-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- 主机: localhost
-- 生成日期: 2015 年 06 月 01 日 11:53
-- 服务器版本: 5.0.51
-- PHP 版本: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- 数据库: `shopimooc`
-- 

-- --------------------------------------------------------

-- 
-- 表的结构 `imooc_admin`
-- 

CREATE TABLE `imooc_admin` (
  `id` tinyint(3) unsigned NOT NULL auto_increment COMMENT '主键',
  `username` varchar(30) NOT NULL COMMENT '管理员名称，唯一',
  `password` varchar(32) NOT NULL COMMENT '管理员密码',
  `email` varchar(50) NOT NULL COMMENT '邮箱',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='管理员表' AUTO_INCREMENT=20 ;

-- 
-- 导出表中的数据 `imooc_admin`
-- 

INSERT INTO `imooc_admin` VALUES (1, 'Young', '125478', 'yangjunalns@qq.com');
INSERT INTO `imooc_admin` VALUES (2, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'admin@qq.com');
INSERT INTO `imooc_admin` VALUES (18, '杨军 ', ' 81dc9bdb52d04dc20036dbd8313ed05', ' 1@1.com');
INSERT INTO `imooc_admin` VALUES (19, '12213 ', ' 550a141f12de6341fba65b0ad043350', ' 4421');

-- --------------------------------------------------------

-- 
-- 表的结构 `imooc_album`
-- 

CREATE TABLE `imooc_album` (
  `id` int(10) unsigned NOT NULL auto_increment COMMENT '主键',
  `Pid` int(10) unsigned NOT NULL COMMENT '对应商品id',
  `albumPath` varchar(50) NOT NULL COMMENT '商品图片',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='相册表' AUTO_INCREMENT=6 ;

-- 
-- 导出表中的数据 `imooc_album`
-- 

INSERT INTO `imooc_album` VALUES (1, 3, ' 43eb187f698bd01a24751c271c7a9b0d.png');
INSERT INTO `imooc_album` VALUES (2, 4, ' 4514152680203c72fd30a7f03ef36a13.png');
INSERT INTO `imooc_album` VALUES (3, 6, ' cded2ee7e3aa95c0748d7b4fc1dfca0a.png');
INSERT INTO `imooc_album` VALUES (4, 7, ' 204df53aa28cda4edabfa3dcd89db156.png');
INSERT INTO `imooc_album` VALUES (5, 8, ' c31085f1d4e1a7b1e6893876e8279676.png');

-- --------------------------------------------------------

-- 
-- 表的结构 `imooc_cate`
-- 

CREATE TABLE `imooc_cate` (
  `id` int(10) unsigned NOT NULL auto_increment COMMENT '主键',
  `cName` varchar(30) NOT NULL COMMENT '分类名称',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='分类表' AUTO_INCREMENT=4 ;

-- 
-- 导出表中的数据 `imooc_cate`
-- 

INSERT INTO `imooc_cate` VALUES (1, '精美家居');
INSERT INTO `imooc_cate` VALUES (3, '数码产品');

-- --------------------------------------------------------

-- 
-- 表的结构 `imooc_pro`
-- 

CREATE TABLE `imooc_pro` (
  `id` smallint(5) unsigned NOT NULL auto_increment COMMENT '主键',
  `pName` varchar(50) NOT NULL COMMENT '商品名称',
  `cId` int(10) unsigned NOT NULL COMMENT '所属分类ID',
  `pSn` varchar(50) NOT NULL COMMENT '商品货号',
  `pNum` int(10) unsigned NOT NULL default '0' COMMENT '商品库存',
  `mPrice` decimal(10,2) NOT NULL COMMENT '市场价',
  `iPrice` double NOT NULL COMMENT '网站价',
  `pDesc` text COMMENT '商品简介',
  `pubTime` int(10) unsigned NOT NULL COMMENT '商品上架时间',
  `isShow` tinyint(1) NOT NULL default '1' COMMENT '商品是否上架',
  `isHot` tinyint(1) NOT NULL default '0' COMMENT '商品是否热卖',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `pName` (`pName`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='商品表' AUTO_INCREMENT=9 ;

-- 
-- 导出表中的数据 `imooc_pro`
-- 

INSERT INTO `imooc_pro` VALUES (2, 'ipphone ', 1, ' 0010 ', 3124, 4000.00, 0, ' iphone ', 1432369058, 1, 0);
INSERT INTO `imooc_pro` VALUES (4, 'moto360 ', 3, ' 3214 ', 123, 1222.00, 0, ' /uploads/dqwrqw<strong>wdbqdwqwqwdsad<em>asfsfsaf</em>d</strong>fsafsfas ', 1432369421, 1, 0);
INSERT INTO `imooc_pro` VALUES (6, 'hero ', 3, ' 123001 ', 213, 10002.00, 0, ' 1234 ', 1432373178, 1, 0);
INSERT INTO `imooc_pro` VALUES (7, 'yyyasd ', 3, ' 23142421 ', 52154124, 223.00, 0, ' <span style="color:#CCCCCC;font-family:''Microsoft YaHei'';font-size:14px;line-height:26px;background-color:#000000;">中国网络</span><a href="http://news.haiwainet.cn/" target="_blank" class="keylink">资讯</a><span style="color:#CCCCCC;font-family:''Microsoft YaHei'';font-size:14px;line-height:26px;background-color:#000000;">台江苏连云港频道5月23日电，今日7时，G15沈海高速连云港段新沂河特大桥上，发生数10余辆车连环追尾事故。事故现场惨烈，其中一辆运送轮胎的货车着火。连云港派出多辆救护车赶往现场施救，目前具体伤亡人数不祥。</span> ', 1432394365, 1, 0);
INSERT INTO `imooc_pro` VALUES (8, 'this is a phone ', 3, ' 12241 ', 421215, 212.20, 210.2, ' ee12314rwqrwq ', 1432394770, 1, 0);

-- --------------------------------------------------------

-- 
-- 表的结构 `imooc_user`
-- 

CREATE TABLE `imooc_user` (
  `id` int(10) unsigned NOT NULL auto_increment COMMENT '主键',
  `username` varchar(30) NOT NULL COMMENT '会员名称',
  `password` char(32) NOT NULL COMMENT '密码',
  `sex` enum('男','女','保密') NOT NULL default '保密' COMMENT '性别',
  `email` varchar(60) NOT NULL COMMENT '邮箱',
  `face` varchar(50) NOT NULL COMMENT '用户头像',
  `regTime` int(10) unsigned NOT NULL COMMENT '注册时间',
  `activeFlag` tinyint(1) NOT NULL default '0' COMMENT '是否激活',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='会员表' AUTO_INCREMENT=5 ;

-- 
-- 导出表中的数据 `imooc_user`
-- 

INSERT INTO `imooc_user` VALUES (1, '1234', 'e10adc3949ba59abbe56e057f20f883e', '男', 'yang@11.com', 'df1cf4ce03be518427928ff603e507a5.png', 1432284705, 0);
INSERT INTO `imooc_user` VALUES (2, '1231', '8595d6443eeec147699633649de37c6a', '男', '321321', 'b0f80d132ac77e3e2df02e4239e8068a.png', 1432396590, 0);
INSERT INTO `imooc_user` VALUES (3, '231ewqewq', 'd064f3519426dcd30114b900431fc044', '男', '421421421@qq', 'ed9ca1106a6bb0a5f69f6f133cc4f7ad.png', 1432396628, 0);
INSERT INTO `imooc_user` VALUES (4, '21421 ', ' 21bf80943748e9af0fc0712c3fe0660', '男', ' 3213123 ', ' e66039c989624b540375606f2e8bb4b3.png', 1432396677, 0);

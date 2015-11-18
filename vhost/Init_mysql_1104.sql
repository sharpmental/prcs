# ************************************************************
# Sequel Pro SQL dump
# Version 4499
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: localhost (MySQL 5.5.33)
# Database: PRCS
# Generation Time: 2015-10-18 02:25:59 +0000
# ************************************************************

use prcs;

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table tb_member
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tb_member`;

CREATE TABLE `tb_member` (
  `user_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `username` char(100) NOT NULL,
  `password` char(32) NOT NULL,
  `email` char(50) NOT NULL,
  `group_id` tinyint(3) unsigned DEFAULT '0',
  `is_choose_type` tinyint(1) unsigned DEFAULT '0',
  `open_id` varchar(100) DEFAULT NULL,
  `avatar` varchar(50) DEFAULT NULL,
  `reg_ip` char(15) DEFAULT NULL,
  `reg_time` int(10) unsigned DEFAULT '0',
  `last_login_ip` char(15) DEFAULT NULL,
  `last_login_time` int(10) unsigned DEFAULT '0',
  `encrypt` varchar(50) DEFAULT NULL,
  `is_lock` tinyint(1) DEFAULT '0',
  `fullname` varchar(50) DEFAULT NULL,
  `qq` varchar(50) DEFAULT NULL,
  `weixin` varchar(50) DEFAULT NULL,
  `is_seller` tinyint(1) DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `is_email_validate` tinyint(1) DEFAULT '0',
  `is_mobile_validate` tinyint(1) DEFAULT '0',
  `mobile` varchar(50) DEFAULT NULL,
  `sex` varchar(2) DEFAULT '0',
  `birthday` date DEFAULT NULL,
  `province_code` varchar(10) DEFAULT NULL,
  `city_code` varchar(10) DEFAULT NULL,
  `district_code` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`(15)),
  KEY `email` (`email`),
  KEY `groupID` (`group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `tb_member` WRITE;
/*!40000 ALTER TABLE `tb_member` DISABLE KEYS */;

INSERT INTO `tb_member` (`user_id`, `username`, `password`, `email`, `group_id`, `is_choose_type`, `open_id`, `avatar`, `reg_ip`, `reg_time`, `last_login_ip`, `last_login_time`, `encrypt`, `is_lock`, `fullname`, `qq`, `weixin`, `is_seller`, `created`, `modified`, `is_email_validate`, `is_mobile_validate`, `mobile`, `sex`, `birthday`, `province_code`, `city_code`, `district_code`)
VALUES
	(1,'test','fb469d7ef430b0baf0cab6c436e70375','hubinjie@live.cn',1,0,NULL,'aci.jpg',NULL,0,'127.0.0.1',1445133268,NULL,0,'WSM','5516448','dawang',1,'2015-03-05 18:12:00','2015-03-10 22:31:19',1,1,'13046697138','男','1985-10-21','310000','310100','310118'),
	(2,'xiaoer','b5d3c7db5ec308deb8e79621c7f69055','lyhuc@163.com',2,0,NULL,'nopic.gif','::1',2015,'::1',1444385734,'wOxmG',0,'小二',NULL,NULL,0,NULL,NULL,0,0,'13046697138','0',NULL,NULL,NULL,NULL);

/*!40000 ALTER TABLE `tb_member` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tb_member_role
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tb_member_role`;

CREATE TABLE `tb_member_role` (
  `role_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '组ID',
  `role_name` varchar(45) NOT NULL DEFAULT '' COMMENT '组名',
  `type_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '保留',
  `listorder` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `description` varchar(200) DEFAULT NULL COMMENT '描述',
  `parent_id` smallint(4) DEFAULT '0',
  `arr_childid` varchar(255) DEFAULT NULL,
  `auto_choose` tinyint(1) NOT NULL DEFAULT '1',
  `arr_userid` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED;

LOCK TABLES `tb_member_role` WRITE;
/*!40000 ALTER TABLE `tb_member_role` DISABLE KEYS */;

INSERT INTO `tb_member_role` (`role_id`, `role_name`, `type_id`, `listorder`, `description`, `parent_id`, `arr_childid`, `auto_choose`, `arr_userid`)
VALUES
	(1,'超级管理员',0,0,'超级管理员',0,NULL,1,NULL),
	(2,'普通管理员',0,0,'普通管理员',0,NULL,1,NULL);

/*!40000 ALTER TABLE `tb_member_role` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tb_member_role_priv
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tb_member_role_priv`;

CREATE TABLE `tb_member_role_priv` (
  `role_id` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `folder` varchar(50) NOT NULL DEFAULT '',
  `controller` varchar(50) NOT NULL DEFAULT '',
  `method` varchar(50) NOT NULL DEFAULT '',
  `data` varchar(50) NOT NULL DEFAULT '',
  `priv_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) DEFAULT '0',
  PRIMARY KEY (`priv_id`),
  KEY `role_id` (`role_id`,`folder`,`controller`,`method`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `tb_member_role_priv` WRITE;
/*!40000 ALTER TABLE `tb_member_role_priv` DISABLE KEYS */;

INSERT INTO `tb_member_role_priv` (`role_id`, `folder`, `controller`, `method`, `data`, `priv_id`, `menu_id`)
VALUES
	(2,'adminpanel','helloWorld','index','',60,38),
	(2,'adminpanel','manage','go_15','',59,15),
	(2,'adminpanel','manage','logout','',58,8),
	(2,'adminpanel','profile','change_pwd','',57,7),
	(2,'adminpanel','manage','index','',56,6),
	(2,'adminpanel','manage','go_5','',55,5),
	(2,'adminpanel','manage','go_4','',54,4),
	(2,'adminpanel','manage','go_1','',53,1);

/*!40000 ALTER TABLE `tb_member_role_priv` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tb_module_menu
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tb_module_menu`;

CREATE TABLE `tb_module_menu` (
  `menu_id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `menu_name` char(40) NOT NULL DEFAULT '',
  `parent_id` smallint(6) NOT NULL DEFAULT '0',
  `list_order` smallint(6) unsigned NOT NULL DEFAULT '0',
  `is_display` tinyint(1) NOT NULL DEFAULT '1',
  `controller` varchar(50) DEFAULT NULL,
  `folder` varchar(50) DEFAULT NULL,
  `method` varchar(50) DEFAULT NULL,
  `flag_id` varchar(50) NOT NULL DEFAULT '0',
  `is_side_menu` tinyint(1) DEFAULT '0',
  `is_system` tinyint(1) DEFAULT '0',
  `is_works` tinyint(1) DEFAULT '0',
  `user_id` int(11) NOT NULL DEFAULT '0',
  `css_icon` varchar(50) DEFAULT NULL,
  `arr_parentid` varchar(250) DEFAULT NULL,
  `arr_childid` varchar(250) DEFAULT NULL,
  `is_parent` tinyint(1) DEFAULT '0',
  `show_where` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`menu_id`) USING BTREE,
  KEY `list_order` (`list_order`),
  KEY `parent_id` (`parent_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `tb_module_menu` WRITE;
/*!40000 ALTER TABLE `tb_module_menu` DISABLE KEYS */;

INSERT INTO `tb_module_menu` (`menu_id`, `menu_name`, `parent_id`, `list_order`, `is_display`, `controller`, `folder`, `method`, `flag_id`, `is_side_menu`, `is_system`, `is_works`, `user_id`, `css_icon`, `arr_parentid`, `arr_childid`, `is_parent`, `show_where`)
VALUES
	(1,'首页',0,1,1,'manage','adminpanel','index','0',1,0,1,1,'home','0','1,5,40,41,6,7,8',1,1),
	(2,'用户管理',0,2,1,'manage','adminpanel','go_2','0',1,0,1,1,'street-view','0','2,9,31,32,33,34,35,36,37,10,26,27,28,29,30',1,1),
	(3,'栏目管理',0,3,1,'manage','adminpanel','go_3','0',1,0,1,1,'list-ol','0','3,11,16,17,18,19,20,12,13,14,21,22,23,24,25,39',1,1),
	(4,'扩展模块',0,4,1,'manage','adminpanel','go_4','0',1,0,1,1,'dropbox','0','4,15,38',1,1),
	(5,'我的',1,5,1,'manage','adminpanel','go_5','0',1,0,1,1,'','0,1','5,40,41,6,7,8',1,1),
	(6,'控制面板',5,6,1,'manage','adminpanel','controlpanel','0',1,0,1,1,'','0,1,5','6',0,1),
	(7,'修改密码',5,7,1,'profile','adminpanel','change_pwd','0',1,0,1,1,'','0,1,5','7',0,1),
	(8,'注销',5,8,1,'manage','adminpanel','logout','0',1,0,1,1,'','0,1,5','8',0,1),
	(9,'管理用户',2,9,1,'manage','adminpanel','go_9','0',1,0,1,1,'','0,2','9,31,32,33,34,35,36,37',1,1),
	(10,'管理用户组',2,10,1,'manage','adminpanel','go_10','0',1,0,1,1,'','0,2','10,26,27,28,29,30',1,1),
	(11,'管理栏目',3,11,1,'manage','adminpanel','go_11','0',1,0,1,1,'','0,3','11,16,17,18,19,20',1,1),
	(12,'管理模块',3,12,1,'manage','adminpanel','go_12','0',1,0,1,1,'','0,3','12,13,14,21,22,23,24,25,39',1,1),
	(13,'已安装模块列表',12,13,1,'moduleManage','adminpanel','index','0',1,0,1,1,'','0,3,12','13',0,1),
	(14,'安装新模块',12,14,1,'moduleInstall','adminpanel','index','0',1,0,1,1,'','0,3,12','14,21,22,23,24,25,39',1,1),
	(15,'模块列表',4,15,1,'manage','adminpanel','go_15','0',1,0,1,1,'','0,4','15,38',1,1),
	(16,'栏目列表',11,16,1,'moduleMenu','adminpanel','index','0',1,0,1,1,'','0,3,11','16,17,18,19,20',1,1),
	(17,'新增',16,17,1,'moduleMenu','adminpanel','add','0',1,0,1,1,'','0,3,11,16','17',0,1),
	(18,'修改',16,18,1,'moduleMenu','adminpanel','edit','0',1,0,1,1,'','0,3,11,16','18',0,1),
	(19,'删除',16,19,1,'moduleMenu','adminpanel','delete','0',1,0,1,1,'','0,3,11,16','19',0,1),
	(20,'设置左侧菜单',16,20,1,'moduleMenu','adminpanel','set_menu','0',1,0,1,1,'','0,3,11,16','20',0,1),
	(21,'安装',14,21,1,'moduleInstall','adminpanel','setup','0',1,0,1,1,'','0,3,12,14','21',0,1),
	(22,'检查',14,22,1,'moduleInstall','adminpanel','check','0',1,0,1,1,'','0,3,12,14','22',0,1),
	(23,'重装',14,23,1,'moduleInstall','adminpanel','reinstall','0',1,0,1,1,'','0,3,12,14','23',0,1),
	(24,'卸载',14,24,1,'moduleInstall','adminpanel','uninstall','0',1,0,1,1,'','0,3,12,14','24',0,1),
	(25,'删除',14,25,1,'moduleInstall','adminpanel','delete','0',1,0,1,1,'','0,3,12,14','25',0,1),
	(26,'用户组列表',10,26,1,'role','adminpanel','index','0',1,0,1,1,'','0,2,10','26,27,28,29,30',1,1),
	(27,'新增',26,27,1,'role','adminpanel','add','0',1,0,1,1,'','0,2,10,26','27',0,1),
	(28,'编辑',26,28,1,'role','adminpanel','edit','0',1,0,1,1,'','0,2,10,26','28',0,1),
	(29,'删除',26,29,1,'role','adminpanel','delete_one','0',1,0,1,1,'','0,2,10,26','29',0,1),
	(30,'设置权限',26,30,1,'role','adminpanel','setting','0',1,0,1,1,'','0,2,10,26','30',0,1),
	(31,'用户列表',9,31,1,'user','adminpanel','index','0',1,0,1,1,'','0,2,9','31,32,33,34,35,36,37',1,1),
	(32,'新增',31,32,1,'user','adminpanel','add','0',1,0,1,1,'','0,2,9,31','32',0,1),
	(33,'编辑',31,33,1,'user','adminpanel','edit','0',1,0,1,1,'','0,2,9,31','33',0,1),
	(34,'检测用户名',31,34,1,'user','adminpanel','check_username','0',1,0,1,1,'','0,2,9,31','34',0,1),
	(35,'删除',31,35,1,'user','adminpanel','delete','0',1,0,1,1,'','0,2,9,31','35',0,1),
	(36,'锁定/解锁',31,36,1,'user','adminpanel','lock','0',1,0,1,1,'','0,2,9,31','36',0,1),
	(37,'上传头像',31,37,1,'user','adminpanel','upload','0',1,0,1,1,'','0,2,9,31','37',0,1),
	(38,'Hello Word',15,38,1,'helloWorld','adminpanel','index','0',1,0,1,1,'','0,4,15','38',0,1),
	(39,'上传安装包',14,39,1,'moduleInstall','adminpanel','index','0',1,0,1,1,'','0,3,12,14','39',0,1),
	(40,'全局缓存',5,40,1,'manage','adminpanel','cache','0',1,0,1,1,'','0,1,5','40',0,1),
	(41,'详细信息', 40, 41, 1, 'manage', 'adminpanel', 'detailinfo', '0', 1, 0, 1, 1, '', '0,1,5,40', '41', 0, 1),
	(42,'外出', 40, 42, 1, 'manage', 'adminpanel', 'leave', '0', 1, 0, 1, 1, '', '0,1,5,40', '42', 0, 1),
	(43,'轨迹', 40, 43, 1, 'manage', 'adminpanel', 'trace', '0', 1, 0, 1, 1, '', '0,1,5,40', '43', 0, 1);

/*!40000 ALTER TABLE `tb_module_menu` ENABLE KEYS */;
UNLOCK TABLES;

# Dump of table tb_sessions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tb_sessions`;

CREATE TABLE `tb_sessions` (
  `id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `data` text NOT NULL,
  `timestamp` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table tb_times
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tb_times`;

CREATE TABLE `tb_times` (
  `times_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(45) DEFAULT NULL,
  `login_ip` char(15) DEFAULT NULL COMMENT 'ip',
  `login_time` int(10) unsigned DEFAULT NULL,
  `group_id` int(10) unsigned DEFAULT NULL,
  `failure_times` int(10) unsigned DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`times_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


#----------------------------------------------------------------

-- 
-- 表的结构 `tb_attention_flow`
-- 

drop table if exists `tb_attention_flow`;

create table `tb_attention_flow` (
  `atten_id` int(11) not null,
  `monarear_id` int(11) not null,
  `monarear_name` varchar(64) default null,
  `people_id` int(11) not null,
  `people_name` varchar(64) default null,
  `watch_id` int(11) not null,
  `watch_status` int(11) not null,
  `first_time` datetime default null,
  `last_time` datetime default null,
  `flag` int(11) default null,
  `update_timestamp` datetime default null,
  primary key  (`atten_id`)
) engine=myisam default charset=utf8 comment='重点关注表。记录重点关注人员？';

-- 
-- 导出表中的数据 `tb_attention_flow`
-- 

-- --------------------------------------------------------

-- 
-- 表的结构 `tb_department_info`
-- 
drop table if exists `tb_department_info`;

create table `tb_department_info` (
  `dep_id` int(11) not null,
  `dep_name` varchar(64) not null,
  `update_timestamp` datetime not null,
  primary key  (`dep_id`)
) engine=myisam default charset=utf8 comment='部门信息表';

-- 
-- 导出表中的数据 `tb_department_info`
-- 

insert into `tb_department_info` values (1, '一中队', '0000-00-00 00:00:00');
insert into `tb_department_info` values (2, '二中队', '0000-00-00 00:00:00');
insert into `tb_department_info` values (3, '三中队', '0000-00-00 00:00:00');
insert into `tb_department_info` values (4, '四中队', '0000-00-00 00:00:00');

-- --------------------------------------------------------

-- 
-- 表的结构 `tb_locarea_info`
-- 
drop table if exists `tb_locarea_info`;

create table `tb_locarea_info` (
  `locarea_id` int(11) not null,
  `locarea_name` varchar(64) not null,
  `coor_id` int(11) not null,
  `cent_x` int(11) not null,
  `cent_y` int(11) not null,
  `size_x` int(11) not null,
  `size_y` int(11) not null,
  `update_timestamp` datetime not null,
  primary key  (`locarea_id`)
) engine=myisam default charset=utf8 comment='定位区域表';

-- 
-- 导出表中的数据 `tb_locarea_info`
-- 

insert into `tb_locarea_info` values (1, '工厂一区', 0, 0, 0, 0, 0, '2015-10-22 14:24:00');
insert into `tb_locarea_info` values (2, '工厂二区', 0, 0, 0, 0, 0, '2015-10-22 14:24:27');

-- --------------------------------------------------------

-- 
-- 表的结构 `tb_logging`
-- 
drop table if exists `tb_logging`;

create table `tb_logging` (
  `log_id` int(11) not null,
  `operator_id` int(11) not null,
  `name` varchar(64) default null,
  `user` varchar(64) default null,
  `action` varchar(64) default null,
  `content` varchar(100) default null,
  `ip` varchar(20) not null,
  `login_time` datetime default null,
  `logout_time` datetime default null,
  `update_timestamp` datetime default null
) engine=myisam default charset=utf8 comment='登录记录表';

-- 
-- 导出表中的数据 `tb_logging`
-- 

insert into `tb_logging` values (1, 1, '所长', '0001', '登录', '登录成功', '127.0.0.1', '2014-10-22 11:24:21', null, null);
insert into `tb_logging` values (2, 2, '民警', '0002', '增加', '添加帐号流水为466', '192.168.1.125', '2014-10-27 09:30:19', null, null);

-- --------------------------------------------------------

-- 
-- 表的结构 `tb_monarea_info`
-- 

drop table if exists `tb_monarea_info`;

create table `tb_monarea_info` (
  `monarea_id` int(11) not null,
  `monarea_name` varchar(64) character set utf8 not null default '未定义',
  `update_timestamp` datetime not null,
  primary key  (`monarea_id`)
) engine=myisam default charset=utf8 comment='监控区域表';

-- 
-- 导出表中的数据 `tb_monarea_info`
-- 

insert into `tb_monarea_info` values (1111, '厕所', '2015-10-22 14:26:00');
insert into `tb_monarea_info` values (1112, '走道', '2015-10-22 14:26:04');

-- --------------------------------------------------------

-- 
-- 表的结构 `tb_operator_info`
-- 

drop table if exists `tb_operator_info`;

create table `tb_operator_info` (
  `operator_id` int(11) not null auto_increment, #内部ID，自增
  `operator_name` varchar(64) not null, #用户昵称？
  `operator_user` varchar(64) not null, #用户名称
  `operator_pwd` varchar(64) not null, #密码
  `operator_power` varchar(16) not null, #用户组别
  `reg_ip` varchar(64),  #注册时使用的IP地址
  `reg_time` datetime not null, #注册时间
  `encrypt` varchar(64), #加密 现在不使用
  `last_login_ip` varchar(64), #最近一次登录使用的ip地址
  `last_login_time` datetime not null, #最近一次登录的时间
  `update_timestamp` datetime not null, #最近一次修改的时间
  primary key  (`operator_id`)
) engine=myisam default charset=utf8 comment='操作人员信息表';

-- 
-- 导出表中的数据 `tb_operator_info`
-- 

insert into `tb_operator_info` values 
	(1, '所长', '0001', '0001', '1',  '127.0.0.1', '2011-01-01 12:30:30', '',  '127.0.0.1', '2011-01-01 12:30:30', '2015-10-22 14:29:35'),
	(2, '警员a', '0002', '0002', '1', '127.0.0.1', '2011-01-01 12:30:30', '',  '127.0.0.1', '2011-01-01 12:30:30', '2015-10-22 14:30:28'),
	(3, 'admin', 'admin', '0002', '1', '127.0.0.1', '2011-01-01 12:30:30', '',  '127.0.0.1', '2011-01-01 12:30:30', '2015-10-22 14:30:28'),
	(9, '系统管理员', '9999', '9999', '1', '127.0.0.1', '2011-01-01 12:30:30', '',  '127.0.0.1', '2011-01-01 12:30:30', '2015-10-22 14:31:11');

-- --------------------------------------------------------

-- 
-- 表的结构 `tb_people_detail`
-- 

drop table if exists `tb_people_detail`;

create table `tb_people_detail` (
  `people_id` int(11) not null,
  `no` varchar(64) not null,
  `name` varchar(64) not null,
  `birthday` datetime default null,
  `gender` varchar(10) default null,
  `education` varchar(30) default null,
  `jobcareer` varchar(30) default null,
  `arear_code` varchar(20) default null,
  `regaddress` varchar(100) default null,
  `address` varchar(100) default null,
  `charge` varchar(128) default null,
  `term` varchar(30) default null,
  `term_begin` datetime default null,
  `term_end` datetime default null,
  `arrival_day` datetime default null,
  `level` varchar(30) default null,
  `multicrime` varchar(10) default null,
  `samecharge` varchar(100) default null,
  `cause` text,
  `nationality` varchar(30) default null,
  `status` smallint,
  `update_timestamp` datetime default null,
  primary key  (`people_id`)
) engine=myisam default charset=utf8 comment='人员详情表';

-- 
-- 导出表中的数据 `tb_people_detail`
-- 

insert into `tb_people_detail` values (1, '001', '测试员', '1984-05-05 00:00:00', '男', '小学', '无业', '1', '四川省  资中县', '四川省  资中县狮子镇双朝门村6组41号', '盗窃', '010200', '2014-04-21 00:00:00', '2015-06-20 00:00:00', '2014-10-16 00:00:00', '新犯', '团伙', '3', '2014年4月3日至4月21日期间，该犯以非法占有为目的，入户窃取他人财物，数额较大。', '汉族', 1, null);
insert into `tb_people_detail` values (2, '3308070716', '韦吉明', '1986-12-03 00:00:00', '男', '初中', '农民', '1', '贵州省  榕江县', '贵州省  榕江县三江乡长岭村长岭组', '贩卖毒品', '030600', '2014-12-12 00:00:00', '2018-05-11 00:00:00', '2015-02-12 00:00:00', '重犯', '0', '0', '2014年2月18日，该犯违反国家毒品管理法规，明知是毒品而予以贩卖。', '壮族', 1, null);

-- --------------------------------------------------------

-- 
-- 表的结构 `tb_people_inout`
-- 

drop table if exists `tb_people_inout`;

create table `tb_people_inout` (
  `inout_id` int(11) not null,
  `people_id` int(11) not null,
  `name` varchar(64) default null,
  `watch_id` int(11) default null,
  `arear_id` int(11) default null,
  `intime` datetime default null,
  `outtime` datetime default null,
  `memo` varchar(200) default null,
  `update_timestamp` datetime default null,
  primary key  (`inout_id`)
) engine=myisam default charset=utf8 comment='人员出入记录表';

-- 
-- 导出表中的数据 `tb_people_inout`
-- 


-- --------------------------------------------------------

-- 
-- 表的结构 `tb_record_flow`
-- 

drop table if exists `tb_record_flow`;

create table `tb_record_flow` (
  `rec_id` int(11) not null,
  `rec_time` datetime not null,
  `watch_id` int(11) not null,
  `watch_status` varchar(16) not null,
  `people_id` int(11) not null,
  `area_id` int(11) not null,
  `flag` int(11) default null,
  `update_timestamp` datetime default null,
  primary key  (`rec_id`)
) engine=myisam default charset=utf8 comment='全部记录表';

-- 
-- 导出表中的数据 `tb_record_flow`
-- 


-- --------------------------------------------------------

-- 
-- 表的结构 `tb_watch_area_info`
-- 

drop table if exists `tb_watch_area_info`;

create table `tb_watch_area_info` (
  `watch_id` int(11) not null,
  `alarm_type` int(11) not null default '0',
  `locarea_id` int(11) not null,
  `monarea_id` int(11) not null,
  `update_timestamp` datetime not null
) engine=myisam default charset=utf8 comment='腕带位置表';

-- 
-- 导出表中的数据 `tb_watch_area_info`
-- 

insert into `tb_watch_area_info` values (1, 0, 1, 1111, '2015-10-22 14:45:21');
insert into `tb_watch_area_info` values (2, 0, 2, 1112, '2015-10-22 14:45:43');

-- --------------------------------------------------------

-- 
-- 表的结构 `tb_watch_info`
-- 

drop table if exists `tb_watch_info`;

create table `tb_watch_info` (
  `watch_id` int(11) not null auto_increment,
  `watch_status` int(11) not null default '0',
  `update_timestamp` datetime not null,
  primary key  (`watch_id`)
) engine=myisam default charset=utf8 comment='腕带表' auto_increment=7 ;

-- 
-- 导出表中的数据 `tb_watch_info`
-- 

insert into `tb_watch_info` values (1, 0, '2015-10-22 14:42:22');
insert into `tb_watch_info` values (2, 0, '2015-10-22 14:42:32');
insert into `tb_watch_info` values (3, 0, '2015-10-22 14:43:22');
insert into `tb_watch_info` values (4, 0, '2015-10-22 14:43:33');
insert into `tb_watch_info` values (5, 0, '2015-10-22 14:43:55');
insert into `tb_watch_info` values (6, 0, '2015-10-22 14:44:03');


# dump of table person_info 人员信息表
# ------------------------------------------------------------

drop table if exists `tb_people_info`;

create table `tb_people_info` (
`people_id` int not null comment '人员标识，全局唯一',
`people_name` varchar(64) not null comment '人员名称',
`dep_id` int not null comment '人员所属部门标识',
`watch_id` int not null comment '人员配带腕带标识',
`init_locarea_id` int null not null default '0' comment '人员的初始位置, 如果id=0 就是初始位置不定，对应定区域的 id',
`update_timestamp` datetime not null default '2011-01-01' on update current_timestamp comment '记录更新时间',
primary key (`people_id`)
)charset=utf8 comment='人员表 人员 id 是键值';

insert into `tb_people_info` (`people_id`, `people_name`, `dep_id`, `watch_id`, `init_locarea_id`, `update_timestamp`)
values
	(1, 'aaa', 1, 1, 1, '2011-01-01'),
	(2, 'bbb', 1, 2, 1, '2011-01-02'),
	(3, 'ccc', 1, 3, 1, '2011-01-03'),
	(4, '阿凡提', 1, 4, 1, '2011-01-04');


/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

DROP view IF EXISTS `people_view`;

create view people_view as
select 
	people_id,
	people_name,
	dep_id,
	a.watch_id,
	init_locarea_id,
	b.watch_status,
	b.update_timestamp
from tb_people_info a
left join tb_watch_info b
on a.watch_id = b.watch_id;


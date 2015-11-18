# ************************************************************
# Sequel Pro SQL dump
# Version 4499
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: localhost (MySQL 5.5.33)
# Database: ACI
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
	(2,'操作员管理',0,2,1,'manage','adminpanel','go_2','0',1,0,1,1,'user','0','2,9,31,32,33,34,35,36,37,10,26,27,28,29,30',1,1),
	(3,'栏目管理',0,3,1,'manage','adminpanel','go_3','0',1,0,1,1,'list-ol','0','3,11,16,17,18,19,20,12,13,14,21,22,23,24,25,39',1,1),
	(4,'数据管理',0,4,1,'manage','adminpanel','go_4','0',1,0,1,1,'database','0','4,15,38',1,1),
	(5,'管理员',1,5,1,'manage','adminpanel','go_5','0',1,0,1,1,'','0,1','5,40,41,6,7,8',1,1),
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
	(41,'详细信息', 4, 41, 1, 'manage', 'adminpanel', 'detailinfo', '0', 1, 0, 1, 1, '', '0,4,41', '41', 0, 1),
	(42,'外出', 4, 42, 1, 'manage', 'adminpanel', 'leave', '0', 1, 0, 1, 1, '', '0,4,42', '42', 0, 1),
	(43,'轨迹', 4, 43, 1, 'manage', 'adminpanel', 'trace', '0', 1, 0, 1, 1, '', '0,4,43', '43', 0, 1),
	(44,'系统管理',0,44,1,'manage','adminpanel','go_9','0',1,0,1,1,'server','0','44',1,1);

/*!40000 ALTER TABLE `tb_module_menu` ENABLE KEYS */;
UNLOCK TABLES;

# Dump of table tb_sessions
# ------------------------------------------------------------
#保存用户会话

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

# Dump of table tb_times
# ------------------------------------------------------------
# 保存用户密码尝试次数

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
# 关注区域
# 功能目前未知
-- 
-- 表的结构 `tb_attention_flow`
-- 

drop table if exists `tb_attention_flow`;

create table `tb_attention_flow` (
  `atten_id` int(11) not null,
  `monarea_id` int(11) not null,
  #`monarea_name` varchar(64) default null,
  #不需要，需要时应该到monarea_info表里查找或创建视图，否则和monarea_id可能产生不一致的问题
  `people_id` int(11) not null,
  #`people_name` varchar(64) default null,
  #不需要，需要时应该到people_detail_info表里查找或创建视图，否则和id可能产生不一致的问题
  `watch_id` int(11) not null,
  #`watch_status` int(11) not null,
  #类似问题
  `first_time` datetime default null,
   #含义未知
  `last_time` datetime default null,
   #含义未知
  `flag` int(11) default null,
  #含义未知
  `update_timestamp` datetime default null,
  primary key  (`atten_id`)
) engine=myisam default charset=utf8 comment='重点关注表。';

-- 
-- 导出表中的数据 `tb_attention_flow`
-- 

-- --------------------------------------------------------

-- 
-- 表的结构 `tb_department_info`
-- 
#用来标识不同的部门。其中的部门ID，会在很多地方被引用。
#比如人员表中每条人员的信息都会包含部门ID，表示人员与部门的从属关系。没有地方显示
#定义接收单元的功能。？？？

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
#统计各个区域人数使用？

drop table if exists `tb_locarea_info`;

create table `tb_locarea_info` (
  `locarea_id` int(11) not null,
  `locarea_name` varchar(64) not null,
  `coor_id` int(11) not null,
  #含义未知
  `cent_x` int(11) not null,
   #含义未知
  `cent_y` int(11) not null,
   #含义未知
  `size_x` int(11) not null,
   #含义未知
  `size_y` int(11) not null,
   #含义未知
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
#需要记录哪些操作？

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
#统计各个区域人数使用？monarea和locarea什么差别？是否监控区域必须属于区域表？

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
  `operator_id` int(11) not null auto_increment, 
  #内部ID，自增
  `operator_name` varchar(64) not null, 
  #用户昵称
  `operator_user` varchar(64) not null, 
  #用户名称，和上面那个什么差别？
  `operator_pwd` varchar(64) not null, 
  #密码
  `operator_power` varchar(16) not null, 
  #用户组别
  `reg_ip` varchar(64),  
  #注册时使用的IP地址
  `reg_time` datetime not null, 
  #注册时间
  `encrypt` varchar(64), 
  #加密 现在不使用
  `last_login_ip` varchar(64), 
  #最近一次登录使用的ip地址
  `last_login_time` datetime not null, 
  #最近一次登录的时间
  `update_timestamp` datetime not null, 
  #最近一次修改的时间
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
#罪犯详细信息表

drop table if exists `tb_people_detail`;

create table `tb_people_detail` (
  `people_id` int(11) not null,
  `no` varchar(64) not null,
  `name` varchar(64) not null,
  `birthday` datetime default null,
  `gender` varchar(10) default null,
  `education` varchar(30) default null,
  `jobcareer` varchar(30) default null,
  `area_code` varchar(20) default null,
  #area_code必须属于locarea?
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
  #0=刑满 1=在监 2=死亡 3=其他
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
#记录犯人的外出和返回
#问题，犯人A外出后返回，再外出，覆盖前一条记录还是新增一条记录？
#覆盖表示每个犯人最多一条记录，新增则表示查找状态的时候要遍历此犯人全部状态

drop table if exists `tb_people_inout`;

create table `tb_people_inout` (
  `inout_id` int(11) not null,
  `people_id` int(11) not null,
  `watch_id` int(11) default null,
  `area_id` int(11) default null,
  `intime` datetime default null,
  `outtime` datetime default null,
  `memo` varchar(200) default null,
  `status` smallint default 0,
  #0=返回 1=外出
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
#如果每个犯人的踪迹都要记录，假设1000个犯人，5秒记录一次，记录一个小时的踪迹，则总共有720000条记录
#建议比如说按照watch_id划分，比如tb_record_flow_1记录1-100号腕表的踪迹

drop table if exists `tb_record_flow`;

create table `tb_record_flow` (
  `rec_id` int(11) not null,
  #如果id表示条目，并且是循环覆盖的，不适合用作索引。可以用watch_id和area_id做索引
  `rec_time` datetime not null,
  `watch_id` int(11) not null,
#  `watch_status` varchar(16) not null,
#既然在记录，表示应该正常。非正常状态应该到watch_info表里面查找。
  `people_id` int(11) not null,
  `area_id` int(11) not null,
  `flag` int(11) default null,
  `update_timestamp` datetime default null,
  `start_id` smallint default 0,
  #表示现在最新的一条记录的rec_id是多少号
  primary key  (`rec_id`)
) engine=myisam default charset=utf8 comment='全部记录表';

-- 
-- 导出表中的数据 `tb_record_flow`
-- 


-- --------------------------------------------------------

-- 
-- 表的结构 `tb_watch_area_info`
-- 
#主要信息表
#以腕带位置表tb_watch_area_info为主，腕带在哪个区域，是否进入监控区，是否要报警，全按腕带位置表tb_watch_area_info的情况来处理
#表里面除了watch_id外，还有报警类型alarm_type,区域编号locarea_id,监控区域编号monarea_id等字段来区分在什么位置，是否要报警，是否进入监控区域

drop table if exists `tb_watch_area_info`;

create table `tb_watch_area_info` (
  `watch_id` int(11) not null,
  `alarm_type` int(11) not null default '0',
  #0=? 1=? 匹配到watch_info中的status=2?
  `locarea_id` int(11) not null,
  #当前处于的区域
  `monarea_id` int(11) not null,
  #当前处于的监控区域？
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
  #0=未启用 1=正常工作 2=工作不正常(失联)
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
#和tb_department_info一致
`watch_id` int not null comment '人员配带腕带标识',
#和watch_info一致
`init_locarea_id` int null not null default '0' comment '人员的初始位置, 如果id=0 就是初始位置不定，对应定区域的 id',
#和locarea_info一致
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

# dump of table receive_unit_info 接收天线表
# ------------------------------------------------------------
drop table if exists `tb_recvunit_info`;

create table `tb_recvunit_info` (
`ru_id` int not null comment '接收单元标识，全局唯一',
`receiver_ip` varchar(64) not null comment '接收机ip地址',
`receiver_index` tinyint not null comment '接收天线index，数据包中体现',
`locarea_id` int not null comment '接收单元所属定位区域标识 参见定位区域表',
`coor_id` int not null comment '天线安装位置所属的定位坐标系标识，参见定位坐标系表',
`pos_x` int not null comment '天线安装位置坐标 x 值',
`pos_y` int not null comment '天线安装位置坐标 y 值',
`weight` int not null default '100' comment '天线定位权重，可以区分天线信号的强弱',
`update_timestamp` datetime not null default '2011-01-01' on update current_timestamp comment '记录更新时间',
primary key (`ru_id`)
)
comment='接收单元信息表 接收单元是一对唯一的 接收机 ip 地址和接收天线 index';

insert into `tb_recvunit_info` (`ru_id`, `receiver_ip`,`receiver_index`, `locarea_id`, `coor_id`, `pos_x`, `pos_y`, `weight`, `update_timestamp`)
value 
	(1, '192.168.0.1', 1, 1, 100, 1, 1, 100, '2011-01-01'),
        (2, '192.168.0.2', 2,.1, 100, 1, 1, 100, '2011-01-01'),
        (3, '192.168.0.3', 3, 1, 100, 1, 1, 100, '2011-01-01'),
	(4, '192.168.0.4', 4, 1, 100, 1, 1, 100, '2011-01-01');

# dump of table location_coordinate_info 定位坐标系表
# ------------------------------------------------------------
drop table if exists `tb_loccoor_info`;

create table `tb_loccoor_info` (
`coor_id` int not null comment '定位坐标系标识, 定位坐标系键值',
`coor_name` varchar(64) not null default 'unknown' comment '定位坐标系名称',
`ori_x` int not null default 0 comment '坐标系原点的全局 x 坐标',
`ori_y` int not null default 0 comment '坐标系原点的全局 y 坐标',
`ori_z` int not null default 0 comment '坐标系原点的全局 z 坐标',
`angle_h` int not null default 0 comment '坐标系原点的全局水平夹角',
`angle_v` int not null default 0 comment '坐标系原点的全局垂直夹角',
`update_timestamp` datetime not null default '2011-01-01' on update current_timestamp comment '记录更新时间',
primary key (`coor_id`)
)
comment='定位坐标系表，定义了每个坐标系的全局中的位置。 ';

insert into `tb_loccoor_info` (`coor_id`, `coor_name`, `ori_x`, `ori_y`, `ori_z`, `angle_h`, `angle_v`, `update_timestamp`)
value
	(1, 'mingchen', 100, 101, 102, 30, 30, '2011-01-01'),
	(2, 'mingchen', 103, 104, 105, 30, 30, '2011-01-01'),
	(3, 'mingchen', 106, 107, 108, 30, 30, '2011-01-01');

## dump of table server_info 服务器信息表
## ------------------------------------------------------------
#drop table if exists `tb_server_info`;
#
#create table `tb_server_info` (
#`server_id` int not null comment '服务器标识，全局唯一',
#`server_type` tinyint not null comment '服务器类型:1 dt server, 2 dm server ',
#`server_name` varchar(64) not null comment '服务器名称',
#`server_ip` varchar(64) not null comment '服务器允许的 ip 地址',
#`powerlow_times` int not null default '2' comment 'dt server 低电压报警判定次数(单位次)',
#`location_decision_interval` int not null default '5' comment 'dt server 定位模块做用几个时序的信号来计算',
#`location_lost_ms` int not null default '5000' comment 'dt server 定位模块使用的离线判定时间 (单位毫秒)',
#`monitor_lost_ms` int not null default '5000' comment 'dt server 监控模块使用的离线判定时间 (单位毫秒)',
#`prohibit_lost` int not null default '1' comment 'dt server 警戒模块使用的报警判定次数 (单位次)',
#`update_timestamp` datetime not null default '2011-01-01' on update current_timestamp comment '记录更新时间',
#primary key (`server_id`)
#)
#comment='服务器信息表';
#
#insert into `tb_server_info` (`server_id`, `server_type`, `server_name`, `server_ip`, `powerlow_times`, `location_decision_interval`, `location_lost_ms`, `monitor_lost_ms`, `prohibit_lost`, `update_timestamp`)
#value
#	(1, 1, 'servera', '192.168.1.1', 2, 5, 5000, 5000, 1, '2011-01-01'),
#    (2, 1, 'serverb', '192.168.1.2', 2, 5, 5000, 5000, 1, '2011-01-01'),
#    (3, 2, 'serverc', '192.168.1.3', 2, 5, 5000, 5000, 1, '2011-01-01');
#    
## dump of table system_parameter_info 系统运行参数表
## ------------------------------------------------------------
#drop table if exists `tb_sysparam_info`;
#
#create table `tb_sysparam_info` (
#`param_name` varchar(64) not null comment '参数名称',
#`param_value` int not null comment '参数值',
#`update_timestamp` datetime not null default '2011-01-01' on update current_timestamp comment '记录更新时间'
#)
#comment='系统参数表';
#
#insert into `tb_sysparam_info` (`param_name`, `param_value`, `update_timestamp`)
#value
#	('param-a', 1, '2011-01-01'),
#    ('param-b', 10, '2011-01-01'),
#    ('param-c', 100, '2011-01-01');
#
## dump of table typeid_info 基础信息表
## ------------------------------------------------------------
#drop table if exists `tb_typeid_info`;
#
#create table `tb_typeid_info` (
#`param_name` varchar(64) not null comment '参数名称',
#`param_value` int not null comment '参数值',
#`update_timestamp` datetime not null default '2011-01-01' on update current_timestamp comment '记录更新时间'
#)
#comment='服务器信息表';
#
#insert into `tb_typeid_info` (`param_name`, `param_value`, `update_timestamp`)
#value
#	('param-a', 1, '2011-01-01'),
#    ('param-b', 10, '2011-01-01'),
#    ('param-c', 100, '2011-01-01');
#
## dump of deparment_receive_unit _info 部门定位天线表
## ------------------------------------------------------------
drop table if exists `tb_dep_ru_location`;

create table `tb_dep_ru_location` (
`dep_id` int not null comment '部门标识',
`ru_id` int not null comment '接收天线标识，全局唯一',
`weight` int not null default 100 comment '定位信号系数值',
`rssi_weight` int not null default 100 comment '定位信号 rssi 强度系数值',
`update_timestamp` datetime not null default '2011-01-01' on update current_timestamp comment '记录更新时间'
)
comment=' ';

insert into `tb_dep_ru_location` (`dep_id`, `ru_id`, `weight`, `rssi_weight`, `update_timestamp`)
value 
    (1, 1001, 100, 100, '2011-01-01'),
    (1, 1002, 100, 100, '2011-01-01'),
    (1, 1003, 100, 100, '2011-01-01'),
    (3, 1004, 100, 100, '2011-01-01');
    
## dump of deparment_location_area_info 部门定位区域参数表 
## ------------------------------------------------------------
#drop table if exists `tb_dep_locarea_param`;
#
#create table `tb_dep_locarea_param` (
#`dep_id` int not null comment '部门标识',
#`locarea_id` int not null comment '定位区域标识',
#`delay_ratio` int not null default 100 comment '部门在该区域的定位信号, 信号丢失延迟报告系数值',
#`night_delay_ratio` int not null default 100 comment '部门在该区域的定位信号, 夜间信号丢失延迟报告系数值',
#`update_timestamp` datetime not null default '2011-01-01' on update current_timestamp comment '记录更新时间'
#)
#comment=' ';
#
#insert into `tb_dep_locarea_param` (`dep_id`, `locarea_id`, `delay_ratio`, `night_delay_ratio`, `update_timestamp`)
#value
#	(1, 2,  100,  100, '2011-01-01'),
#	(1, 3,  110,  120, '2011-01-01'),
#	(1, 4,  110,  150, '2011-01-01');
#
## dump of receiver_deparment_monitor_info 部门监控天线表
## ------------------------------------------------------------
#drop table if exists `tb_ru_dep_monitor`;
#
#create table `tb_ru_dep_monitor` (
#`dep_id` int not null comment '部门标识',
#`ru_id` int not null comment '接收天线标识，全局唯一',
#`monarea_id` int not null comment '监控天线对应的监控区域标识',
#`update_timestamp` datetime not null default '2011-01-01' on update current_timestamp comment '记录更新时间'
#)
#comment=' ';
#
#insert into `tb_ru_dep_monitor` (`dep_id`, `ru_id`, `monarea_id`, `update_timestamp`)
#value 
#	(1, 1, 3, '2011-01-01'),
#	(1, 2, 5, '2011-01-01'),
#	(1, 3, 6, '2011-01-01'),
#	(2, 4, 19, '2011-01-01');
#
## dump of receiver_deparment_door_info 部门门禁天线表
## ------------------------------------------------------------
#drop table if exists `tb_ru_dep_door`;
#
#create table `tb_ru_dep_door` (
#`dep_id` int not null comment '部门标识',
#`ru_id` int not null comment '接收天线标识，全局唯一',
#`monarea_id` int not null comment '门禁天线报警解除对应的监控区域标识',
#`update_timestamp` datetime not null default '2011-01-01' on update current_timestamp comment '记录更新时间'
#)
#comment=' ';
#
#insert into `tb_ru_dep_door` (`dep_id`, `ru_id`, `monarea_id`, `update_timestamp`)
#value
#	(1, 1, 3, '2011-01-01'),
#	(1, 2, 5, '2011-01-01'),
#	(1, 3, 6, '2011-01-01'),
#	(2, 4, 19, '2011-01-01');
#
## dump of receiver_deparment_location_info 部门警戒天线表
## ------------------------------------------------------------
#drop table if exists `tb_ru_dep_prohibit`;
#
#create table `tb_ru_dep_prohibit` (
#`dep_id` int not null comment '部门标识',
#`ru_id` int not null comment '接收天线标识，全局唯一',
#`update_timestamp` datetime not null default '2011-01-01' on update current_timestamp comment '记录更新时间'
#)
#comment=' ';
#
#insert into `tb_ru_dep_prohibit` (`dep_id`, `ru_id`, `update_timestamp`)
#value
#	(1, 1, '2011-01-01'),
#	(1, 2, '2011-01-01'),
#	(1, 3, '2011-01-01'),
#	(2, 4, '2011-01-01');
#
## dump of receiver_deparment_enter_info 部门进入天线表 
## ------------------------------------------------------------
#drop table if exists `tb_ru_dep_enter`;
#
#create table `tb_ru_dep_enter` (
#`dep_id` int not null comment '部门标识',
#`ru_id` int not null comment '接收天线标识，全局唯一',
#`monarea_id` int not null comment '进入天线对应的监控区域标识',
#`update_timestamp` datetime not null default '2011-01-01' on update current_timestamp comment '记录更新时间'
#)
#comment=' ';
#
#insert into `tb_ru_dep_enter` (`dep_id`, `ru_id`, `monarea_id`, `update_timestamp`)
#value 
#	(1, 1, 3, '2011-01-01'),
#	(1, 2, 5, '2011-01-01'),
#	(1, 3, 6, '2011-01-01'),
#	(2, 4, 19, '2011-01-01');
#
## dump of drop table if exists `tb_area_items`;
## ------------------------------------------------------------
#
#/*!40101 set @saved_cs_client     = @@character_set_client */;
#/*!40101 set character_set_client = utf8 */;
#drop table if exists `tb_area_items`;
#create table `tb_area_items` (
#  `area_id` int(10) not null auto_increment comment '区域id',
#  `receiver_ip` varchar(15) not null,
#  `receiver_type` tinyint(3) not null default '0' comment '接收机类型',
#  `area_name` varchar(50) not null default '未命名' comment '区域名称',
#  `z_index` int(10) not null comment '楼层',
#  `cent_x` int(10) not null,
#  `cent_y` int(10) not null,
#  `size_x` int(10) not null,
#  `size_y` int(10) not null,
#  `threshold_5s` int(10) not null default '16',
#  `r1_x` int(10) not null default '0',
#  `r1_y` int(10) not null default '0',
#  `r1_weight` int(10) not null default '0',
#  `r2_x` int(10) not null default '0',
#  `r2_y` int(10) not null default '0',
#  `r2_weight` int(10) not null default '0',
#  `r3_x` int(10) not null default '0',
#  `r3_y` int(10) not null default '0',
#  `r3_weight` int(10) not null default '0',
#  `r4_x` int(10) not null default '0',
#  `r4_y` int(10) not null default '0',
#  `r4_weight` int(10) not null default '0',
#  `r5_x` int(10) not null default '0',
#  `r5_y` int(10) not null default '0',
#  `r5_weight` int(10) not null default '0',
#  `update_timestamp` timestamp not null default current_timestamp,
#  primary key (`area_id`)
#) auto_increment=61 default charset=utf8 comment='区域数据表';
#/*!40101 set character_set_client = @saved_cs_client */;
#
#--
#-- dumping data for table `tb_area_items`
#--
#
#lock tables `tb_area_items` write;
#/*!40000 alter table `tb_area_items` disable keys */;
#insert into `tb_area_items` 
#	values 
#	(1,'192.168.0.101',0,'二组',1,19920,12000,3600,7000,16,19920,15000,100,19920,15000,100,18240,12000,100,19920,8700,100,21600,12000,100,'2014-01-19 03:50:00'),
#	(2,'192.168.0.102',0,'三组',1,23520,12000,3600,7000,16,23520,15000,100,23520,15000,100,21840,12000,100,23520,8700,100,25200,12000,100,'2014-01-19 03:50:00'),
#        (3,'192.168.0.103',0,'四组',1,27120,12000,3600,7000,16,27120,15000,100,27120,15000,100,25440,12000,100,27120,8700,100,28800,12000,100,'2014-01-19 03:50:00'),
#        (4,'192.168.0.104',0,'五组',1,30720,12000,3600,7000,16,30720,15000,100,30720,15000,100,29040,12000,100,30720,8700,100,32400,12000,100,'2014-01-19 03:50:00'),
#        (5,'192.168.0.206',0,'六组',1,34320,12000,3600,7000,16,34320,15000,100,34320,15000,100,36000,12000,100,32640,12000,100,34320,8700,100,'2014-03-06 05:38:00'),
#        (6,'192.168.0.208',0,'七组',1,37920,12000,3600,7000,16,37920,15000,100,37920,15000,100,39600,12000,100,36240,12000,100,37920,8700,100,'2014-04-08 06:56:00'),
#        (7,'192.168.0.192',0,'八组',1,41520,12000,3600,7000,16,41520,15000,100,41520,15000,100,43200,12000,100,39840,12000,100,41520,8700,100,'2014-04-08 06:59:00'),
#        (8,'192.168.0.189',0,'九组',1,27120,3120,3600,5500,16,27120,3120,100,27120,370,100,25440,3120,100,28800,3120,100,27120,5500,100,'2014-04-08 07:32:00'),
#        (9,'192.168.0.207',0,'十组',1,30720,3120,3600,5500,16,30720,3120,100,30720,370,100,29040,3120,100,32400,3120,100,30720,5500,100,'2014-04-08 07:35:00'),
#        (10,'192.168.0.186',0,'十一组',1,34320,3120,3600,5500,16,34320,3120,100,34320,370,100,32640,3120,100,36000,3120,100,34320,5500,100,'2014-04-08 07:54:00'),
#        (11,'192.168.0.190',0,'十二组',1,37920,3120,3600,5500,16,37920,3120,100,37920,370,100,36240,3120,100,39600,3120,100,37920,5500,100,'2014-04-08 07:59:00'),
#        (12,'192.168.0.105',0,'走廊1',1,24100,7185,19200,2630,16,0,0,0,14640,6820,80,21500,6820,80,28000,6820,80,28000,6820,0,'2014-01-19 03:50:00'),
#        (13,'192.168.0.113',0,'走廊2',1,43300,7185,19200,2630,16,0,0,0,52700,6820,100,43300,6820,100,35770,6820,100,0,0,0,'2014-01-22 13:09:00'),
#        (14,'192.168.0.114',0,'卫生间',1,46020,3120,12600,5500,16,0,0,0,43830,5500,100,41450,5500,100,47000,5500,100,50180,5500,100,'2014-01-22 13:01:00'),
#        (15,'192.168.0.188',0,'图书馆',1,16320,3120,3600,5500,16,0,0,0,16320,370,100,14640,3120,100,18000,3120,100,16320,5500,100,'2014-04-08 07:07:00'),
#        (16,'192.168.0.197',0,'阅览室',1,21720,3120,7200,5500,16,0,0,0,21600,370,100,18120,3120,100,25200,3120,100,21600,5500,100,'2014-04-08 07:29:00'),
#        (17,'192.168.0.202',0,'大厅1',1,9060,3120,10920,7000,16,0,0,0,8300,370,100,14400,3120,100,8300,5600,100,3840,3120,100,'2014-01-19 03:50:00'),
#        (18,'192.168.0.130',0,'大厅2',1,9060,12000,10920,7000,16,0,0,0,8300,15000,100,3840,12000,100,8300,8700,100,14400,12000,40,'2014-01-19 03:50:00'),
#        (19,'192.168.0.196',1,'楼梯',1,1800,12000,3600,5020,16,1800,13000,100,1020,15000,100,240,13400,100,3600,12500,100,3600,14000,100,'2014-01-19 03:50:00'),
#        (20,'192.168.0.136',0,'一组',1,16320,12000,3600,7000,16,16320,15000,100,16320,15000,100,14640,12000,100,18000,12000,100,16320,8700,100,'2014-04-08 08:03:00'),
#        (21,'192.168.0.183',0,'二组',2,19920,12000,3600,7000,16,19920,15000,100,19920,15000,100,18240,12000,100,19920,8700,100,21600,12000,100,'2014-01-19 03:50:00'),
#        (22,'192.168.0.199',0,'三组',2,23520,12000,3600,7000,16,23520,15000,100,23520,15000,100,21840,12000,100,25200,12000,100,23520,8700,100,'2014-04-08 08:09:00'),
#        (23,'192.168.0.191',0,'四组',2,27120,12000,3600,7000,16,27120,15000,100,27120,15000,100,25440,12000,100,28800,12000,100,27120,8700,100,'2014-04-08 08:11:00'),
#        (24,'192.168.0.201',0,'五组',2,30720,12000,3600,7000,16,30720,15000,100,30720,15000,100,29040,12000,100,32400,12000,100,30720,8700,100,'2014-04-09 01:10:00'),
#        (25,'192.168.0.184',0,'六组',2,34320,12000,3600,7000,16,34320,15000,100,34320,15000,100,32640,12000,100,36000,12000,100,34320,8700,100,'2014-04-09 01:14:00'),
#        (26,'192.168.0.200',0,'七组',2,37920,12000,3600,7000,16,37920,15000,100,37920,15000,100,36240,12000,100,39600,12000,100,37920,8700,100,'2014-04-09 01:14:00'),
#        (27,'192.168.0.193',0,'八组',2,41520,12000,3600,7000,16,41520,15000,100,41520,15000,100,39840,12000,100,43200,12000,100,41520,8700,100,'2014-04-09 01:16:00'),
#        (28,'192.168.0.181',0,'九组',2,19920,3120,3600,5500,16,19920,370,100,19920,370,100,18240,3120,100,21600,3120,100,19920,5500,100,'2014-04-09 02:34:00'),
#        (29,'192.168.0.209',0,'十组',2,23520,3120,3600,5500,16,23520,370,100,23520,370,100,21840,3120,100,25200,3120,100,23520,5500,100,'2014-04-09 02:41:00'),
#        (30,'192.168.0.180',0,'十三组',2,34320,3120,3600,5500,16,34320,370,100,34320,370,100,32640,3120,100,36000,3120,100,34320,5500,100,'2014-04-09 02:41:00'),
#        (31,'192.168.0.182',0,'十四组',2,37920,3120,3600,5500,16,37920,370,100,37920,370,100,36240,3120,100,39600,3120,100,37920,5500,100,'2014-04-09 02:41:00'),
#        (32,'192.168.0.111',0,'走廊1',2,24100,7185,19200,2630,16,0,0,0,14640,6820,100,21500,6820,100,28000,6820,100,28000,6820,0,'2014-01-19 03:50:00'),
#        (33,'192.168.0.116',0,'走廊2',2,43300,7185,19200,2630,16,0,0,0,52700,6820,200,43300,6820,200,35770,6820,200,0,0,0,'2014-01-22 13:05:00'),
#        (34,'192.168.0.117',0,'卫生间',2,46020,3120,12600,5500,16,0,0,0,43830,5500,100,41450,5500,100,47000,5500,100,50180,5500,100,'2014-01-22 13:03:00'),
#        (35,'192.168.0.198',0,'统计室',2,16320,3120,3600,5500,16,0,0,0,16320,370,100,14250,3120,100,12094,9300,100,0,0,0,'2014-04-09 01:56:00'),
#        (36,'192.168.0.203',0,'大厅1',2,9060,3120,10920,7000,16,8618,15000,100,8618,15000,100,14400,8700,100,8300,5600,100,3840,3120,100,'2014-01-22 13:07:00'),
#        (37,'172.24.111.185',0,'厂房1',3,40000,10000,40000,20000,16,0,0,0,0,0,0,4000,4240,100,4120,240,100,4000,1240,100,'2014-04-18 06:11:00'),
#        (38,'172.24.111.112',0,'厂房2',3,10000,10000,20000,20000,16,240,10200,100,240,10200,100,240,13200,100,240,15000,100,240,10200,100,'2014-04-18 06:14:00'),
#        (39,'172.24.111.142',0,'厂房3',3,70000,10000,20000,20000,16,80000,2000,100,80000,20000,100,80000,5000,100,80000,10000,100,80000,15000,100,'2014-04-18 06:16:00'),
#        (40,'192.168.0.131',0,'大厅2',2,9060,12000,10920,7000,16,4080,3060,100,7230,3760,100,9060,240,100,9060,5200,100,14120,3060,100,'2014-06-10 06:27:00'),
#        (41,'192.168.0.135',0,'大厅3',2,9060,7400,10560,2260,16,4760,10680,100,9180,10680,100,7970,12210,100,5710,12210,100,8300,12210,100,'2014-06-10 01:03:00'),
#        (42,'192.168.0.132',0,'晾衣间',2,51620,12000,5760,7000,16,46947,15000,100,51620,15000,100,52424,12000,100,51645,8240,100,0,0,0,'2014-06-10 01:47:00'),
#        (43,'192.168.0.100',0,'一组',1,16320,12000,3600,7000,16,16320,15000,100,16320,15000,100,14640,12000,100,16320,8700,100,18000,12000,100,'2014-01-19 03:50:00'),
#        (44,'192.168.0.134',0,'大厅3',1,9060,7400,10560,7000,16,4760,10680,100,9180,10680,100,7970,12210,100,12220,5710,100,12000,5400,100,'2014-06-12 07:46:00'),
#        (45,'192.168.0.107',0,'晾衣间',1,51620,12000,5760,7000,16,46947,12000,100,51620,15000,100,52424,12000,100,51645,8240,100,0,0,0,'2014-06-12 07:51:00'),
#        (46,'192.168.0.187',0,'大厅4',1,9060,4300,10920,7000,16,8300,5600,100,8300,8700,100,8300,5600,100,8300,9000,100,8300,8700,100,'2014-06-13 01:40:00'),
#        (47,'172.24.111.145',0,'厂房4',3,50000,10000,20000,20000,16,500240,240,100,50000,240,100,45000,240,100,55000,240,100,55000,240,100,'2014-06-14 00:05:00'),
#        (48,'192.168.0.128',0,'卫生间1',1,46020,3120,12600,5500,16,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'2014-06-23 01:58:00'),
#        (49,'172.24.111.140',2,'厂房大门',3,50000,10000,20000,20000,16,45000,10200,100,50000,10200,100,500240,10200,100,55000,10200,100,500240,10200,100,'2014-06-24 01:35:00'),
#        (50,'192.168.0.146',0,'教育室大门',1,1,1,1,1,16,1,1,100,12,2,100,2,3,100,3,4,100,4,5,100,'2014-09-16 08:38:00'),
#        (51,'172.24.111.126',2,'厂房5',3,0,0,0,0,16,0,0,100,0,0,100,0,0,100,0,0,100,0,0,100,'2014-10-29 00:57:00'),
#        (59,'172.24.111.121',0,'厂房6',3,1,1,1,1,16,0,0,100,0,0,100,0,0,100,0,0,100,0,0,100,'2014-10-29 01:39:42'),
#        (60,'172.24.111.164',0,'厕所',3,1,1,1,1,16,0,0,100,0,0,100,0,0,100,0,0,100,0,0,100,'2014-10-29 01:41:18');
 
#部门警戒天线

drop table if exists `tb_dep_ru_prohibit`;

create table `tb_dep_ru_prohibit` (
`dep_id` int(11) not null comment '部门标识',
`ru_id` int(11) not null comment '接收天线标识，全局唯一',
`monarea_id` int(11) not null comment '警戒天线对应的监控区域标识',
`update_timestamp` datetime not null default current_timestamp on update current_timestamp comment '记录更新时间'
)
comment='部门警戒天线表';

#部门进入天线表
drop table if exists `tb_dep_ru_enter`;

create table `tb_dep_ru_enter` (
`dep_id` int(11) not null comment '部门标识',
`ru_id` int(11) not null comment '接收天线标识，全局唯一',
`monarea_id` int(11) not null comment '进入天线对应的监控区域标识',
`update_timestamp` datetime not null default current_timestamp on update current_timestamp comment '记录更新时间'
)
comment='部门进入天线表';

#部门门禁天线表
drop table if exists `tb_dep_ru_door`;

create table `tb_dep_ru_door` (
`dep_id` int(11) not null comment '部门标识',
`ru_id` int(11) not null comment '接收天线标识，全局唯一',
`monarea_id` int(11) not null comment '门禁天线报警解除对应的监控区域标识',
`update_timestamp` datetime not null default current_timestamp on update current_timestamp comment '记录更新时间'
)
comment='部门门禁天线表';

#部门监控天线表
drop table if exists `tb_dep_ru_monitor`;

create table `tb_dep_ru_monitor` (
`dep_id` int(11) not null comment '部门标识',
`ru_id` int(11) not null comment '接收天线标识，全局唯一',
`monarea_id` int(11) not null comment '监控天线对应的监控区域标识',
`update_timestamp` datetime not null default current_timestamp on update current_timestamp comment '记录更新时间'
)
comment='部门监控天线表';

#腕带定位表
drop table if exists `tb_alarm_loc`;

create table `tb_alarm_loc` (
`watch_id` int(11) not null comment '腕带标识，腕带表键值',
`alarm_type` int(11) not null default '0' comment '腕带报警状态: 0是正常, 其它报警类开型',
`locarea_id` int(11) not null default '0' comment '腕带所在定位区域id, 如果id=0就是区域位置未知',
`monarea_id` int(11) not null default '0' comment '腕带所在监控区域id, 门禁天线报警会带监控区域id',
`update_timestamp` datetime not null default current_timestamp on update current_timestamp comment '记录更新时间',
primary key (`watch_id`),
index `watch_id` (`watch_id`)
)
comment='腕带定位表';

#腕带警戒告警表
drop table if exists `tb_alarm_prohibit`;

create table `tb_alarm_prohibit` (
`watch_id` int(11) not null comment '腕带标识，腕带表键值',
`alarm_state` tinyint(4) not null default '0' comment '腕带报警状态: 0是正常, 1:是报警',
`monarea_id` int(11) not null default '0' comment '腕带所在监控区域id, 门禁天线报警会带监控区域id',
`update_timestamp` datetime not null default current_timestamp on update current_timestamp comment '记录更新时间',
primary key (`watch_id`),
index `watch_id` (`watch_id`)
)
comment='腕带警戒告警表';

#腕带进入告警表
drop table if exists `tb_alarm_enter`;

create table `tb_alarm_enter` (
`watch_id` int(11) not null comment '腕带标识，腕带表键值',
`alarm_state` tinyint(4) not null default '0' comment '腕带报警状态: 0是正常, 1:是进入报警',
`monarea_id` int(11) not null default '0' comment '腕带所在监控区域id',
`update_timestamp` datetime not null default current_timestamp on update current_timestamp comment '记录更新时间',
primary key (`watch_id`),
index `watch_id` (`watch_id`)
)
comment='腕带进入告警表';

#腕带监控告警表
drop table if exists `tb_alarm_mon`;

create table `tb_alarm_mon` (
`watch_id` int(11) not null comment '腕带标识，腕带表键值',
`alarm_state` tinyint(4) not null default '0' comment '腕带报警状态: 0是正常, 1:是进入监控区,2:是报警',
`monarea_id` int(11) not null default '0' comment '腕带所在监控区域id, 门禁天线报警会带监控区域id',
`update_timestamp` datetime not null default current_timestamp on update current_timestamp comment '记录更新时间',
primary key (`watch_id`),
index `watch_id` (`watch_id`)
)
comment='腕带监控告警表';

#腕带告警表
drop table if exists `tb_alarm_general`;

create table `tb_alarm_general` (
`watch_id` int(11) not null comment '腕带标识，腕带表键值',
`alarm_state` tinyint(4) not null default '0' comment '腕带报警状态: 0是正常, 1:是丢失',
`watch_working_state` int(11) not null default '0' comment '腕带工作状态: 0是正常, 0x11:是呼救, 0x12:是断裂, 0x13:是低电压',
`update_timestamp` datetime not null default current_timestamp on update current_timestamp comment '记录更新时间',
primary key (`watch_id`),
index `watch_id` (`watch_id`)
)	
comment='腕带告警表';

#

DROP view IF EXISTS `people_view`;

create view people_view as
select 
	a.people_id,
	a.people_name,
	a.dep_id,
	a.watch_id,
	a.init_locarea_id,
	b.watch_status,
	b.update_timestamp,
	c.status 
from tb_people_info a
inner join tb_watch_info b
on a.watch_id = b.watch_id
left join tb_people_inout c
on a.people_id = c.people_id;
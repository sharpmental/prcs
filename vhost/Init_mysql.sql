# ************************************************************
# Sequel Pro SQL dump
# Version 4499
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: localhost (MySQL 5.5.33)
# Database: prcs
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
  `last_login_time` datetime default null, 
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

/*!40000 ALTER TABLE `tb_module_menu` DISABLE KEYS */;

INSERT INTO `tb_module_menu` (`menu_id`, `menu_name`, `parent_id`, `list_order`, `is_display`, `controller`, `folder`, `method`, `flag_id`, `is_side_menu`, `is_system`, `is_works`, `user_id`, `css_icon`, `arr_parentid`, `arr_childid`, `is_parent`, `show_where`)
VALUES
	(1,'首页',0,1,1,'manage','adminpanel','index','0',1,0,1,1,'home','0','1,5,40,41,6,7,8',1,1),
	(2,'用户设置',0,2,1,'manage','adminpanel','go_2','0',1,0,1,1,'user','0','2,9,16,31,32,33,34,35,36,37,26,27,28,29,30',1,1),
	(3,'设备信息',0,3,1,'manage','adminpanel','go_3','0',1,0,1,1,'suitcase','0','3',1,1),
	(4,'报警信息',0,4,1,'manage','adminpanel','go_4','0',1,0,1,1,'warning','0','4,15,38',1,1),
	(5,'管理员',1,5,1,'manage','adminpanel','go_5','0',1,0,1,1,'','0,1','5,40,41,6,7,8',1,1),
	(6,'控制面板',5,6,1,'manage','adminpanel','controlpanel','0',1,0,1,1,'','0,1,5','6',0,1),
	(7,'修改密码',5,7,1,'profile','adminpanel','change_pwd','0',1,0,1,1,'','0,1,5','7',0,1),
	(8,'注销',5,8,1,'manage','adminpanel','logout','0',1,0,1,1,'','0,1,5','8',0,1),
	(9,'网页用户设置',2,9,1,'manage','adminpanel','go_9','0',1,0,1,1,'','0,2','9,26,31,32,33,34,35,36,37',1,1),
	(10,'服务器管理',0,10,1,'manage','adminpanel','go_10','0',1,0,1,1,'server','0','10,51,49,50',1,1),
	(11,'人员信息',0,11,1,'manage','adminpanel','go_11','0',1,0,1,1,'user-times','0','11',1,1),
	(12,'区域信息',0,12,1,'manage','adminpanel','go_12','0',1,0,1,1,'map-marker','0','12',1,1),
	(13,'其他功能',0,13,1,'manage','adminpanel','go_13','0',1,0,1,1,'gears','0','13',1,1),
	(14,'监狱地图',0,14,1,'manage','adminpanel','go_14','0',1,0,1,1,'photo','0','14',1,1),
	(16,'栏目列表',9,16,1,'moduleMenu','adminpanel','index','0',1,0,1,1,'','0,2,9','16,17,18,19,20',1,1),
	(17,'数据表',3,17,1,'edittable','adminpanel','index/0','0',1,0,1,1,'','0,3','',1,1),
	(18,'数据表',4,18,1,'edittable','adminpanel','index/1','0',1,0,1,1,'','0,4','',1,1),
	(19,'数据表',11,19,1,'edittable','adminpanel','index/3','0',1,0,1,1,'','0,11','',1,1),
	(20,'数据表',12,20,1,'edittable','adminpanel','index/4','0',1,0,1,1,'','0,12','',1,1),
	(26,'用户组列表',9,26,1,'role','adminpanel','index','0',1,0,1,1,'','0,2,9','26,27,28,29,30',1,1),
	(27,'新增',26,27,1,'role','adminpanel','add','0',1,0,1,1,'','0,2,9,26','27',0,1),
	(28,'编辑',26,28,1,'role','adminpanel','edit','0',1,0,1,1,'','0,2,9,26','28',0,1),
	(29,'删除',26,29,1,'role','adminpanel','delete_one','0',1,0,1,1,'','0,2,9,26','29',0,1),
	(30,'设置权限',26,30,1,'role','adminpanel','setting','0',1,0,1,1,'','0,2,9,26','30',0,1),
	(31,'用户列表',9,31,1,'user','adminpanel','index','0',1,0,1,1,'','0,2,9','31,32,33,34,35,36,37',1,1),
	(32,'新增',31,32,1,'user','adminpanel','add','0',1,0,1,1,'','0,2,9,31','32',0,1),
	(33,'编辑',31,33,1,'user','adminpanel','edit','0',1,0,1,1,'','0,2,9,31','33',0,1),
	(34,'检测用户名',31,34,1,'user','adminpanel','check_username','0',1,0,1,1,'','0,2,9,31','34',0,1),
	(35,'删除',31,35,1,'user','adminpanel','delete','0',1,0,1,1,'','0,2,9,31','35',0,1),
	(36,'锁定/解锁',31,36,1,'user','adminpanel','lock','0',1,0,1,1,'','0,2,9,31','36',0,1),
	(37,'上传头像',31,37,1,'user','adminpanel','upload','0',1,0,1,1,'','0,2,9,31','37',0,1),
	(38,'其他功能',13,38,1,'manage','adminpanel','go_38','0',1,0,1,1,'','0,13','38',0,1),
	(40,'全局缓存',5,40,1,'manage','adminpanel','cache','0',1,0,1,1,'','0,1,5','40',0,1),
	(41,'详细信息', 4, 41, 0, 'manage', 'adminpanel', 'detailinfo', '0', 1, 0, 1, 1, '', '0,4,41', '41', 0, 1),
	(42,'外出', 4, 42, 0, 'manage', 'adminpanel', 'leave', '0', 1, 0, 1, 1, '', '0,4,42', '42', 0, 1),
	(43,'轨迹', 4, 43, 0, 'manage', 'adminpanel', 'trace', '0', 1, 0, 1, 1, '', '0,4,43', '43', 0, 1),
	(44,'显示数据表', 19, 44, 0, 'edittable', 'adminpanel', 'viewtable', '0', 1, 0, 1, 1, '', '0,4,19', '44', 0, 1),
	(45,'添加People_info', 19, 45, 0, 'people_info', 'adminpanel', 'add', '0', 1, 0, 1, 1, '', '0,4,19', '45', 0, 1),
	(46,'修改People_info', 19, 46, 0, 'people_info', 'adminpanel', 'modify', '0', 1, 0, 1, 1, '', '0,4,19', '46', 0, 1),
	(47,'添加People_detail', 19, 47, 0, 'people_detail', 'adminpanel', 'add', '0', 1, 0, 1, 1, '', '0,4,19', '47', 0, 1),
	(48,'修改People_detail', 19, 48, 0, 'people_detail', 'adminpanel', 'modify', '0', 1, 0, 1, 1, '', '0,4,19', '48', 0, 1),
	(49,'服务器相关设置', 10, 49, 1, 'manage', 'adminpanel', 'go_49', '0', 1, 0, 1, 1, '', '0,10', '50,51', 0, 1),
	(50,'服务器设置', 49, 50, 1, 'server_info', 'adminpanel', 'index', '0', 1, 0, 1, 1, '', '0,10,49', '50', 0, 1),
	(51,'日志', 49, 51, 1, 'logging_info', 'adminpanel', 'index', '0', 1, 0, 1, 1, '', '0,10,49', '51', 1, 1),
	(52,'主地图',14,52,1,'showmap','adminpanel','index','0',1,0,1,1,'','0,14','52',0,1),
	(53,'出入记录查询',38,53,1,'people_inout','adminpanel','index','0',1,0,1,1,'','0,13,38','53',0,1),
	(54,'登录记录查询',49,54,1,'Logging_info','adminpanel','search','0',1,0,1,1,'','0,10,49','54',0,1)
	;

/*!40000 ALTER TABLE `tb_module_menu` ENABLE KEYS */;

#Dump of all ediatble tables
#
#所有需要显示，修改，添加，删除的表

drop table if exists `tb_table_edit_list`;

create table `tb_table_edit_list` (
	`id` smallint(6) unsigned not null auto_increment,
	`table_name` varchar(40) not null,
	`editable` smallint(1) not null, # 0=只显示 1=显示+添加+删除 2=显示+添加+删除+修改
	`actionaddurl` varchar(128) default '#',
	`actionaddtext` varchar(64) default 'Add',
	`actionmodifyurl` varchar(128) default '#',
	`actionmodifytext` varchar(64) default 'Modify',
	`actiondeleteurl` varchar(128) default '#',
	`actiondeletetext` varchar(64) default 'Delete',
	`comments` varchar(128),
	`icon` varchar(40),
	`color` varchar(40),
	`type` smallint, # 0=设备信息,1=报警信息,2=服务器信息,3=人员信息,4=区域信息,5=其他信息
    PRIMARY KEY (`id`)
)engine=myisam default charset=utf8;

insert into `tb_table_edit_list` values
	(1, 'tb_people_info', 2, 'people_info/add', '增加', 'people_info/modify', '修改', 'people_info/delete', '删除', '人员和对应腕表', 'fa-user', '#0AC0FC',3),
	(2, 'tb_people_detail', 2, 'people_detail/add', '增加', 'people_detail/modify', '修改', 'people_detail/delete', '删除', '人员详细信息', 'fa-user-plus', '#0AC0FC',3),
	(3, 'tb_watch_info', 2, 'watch_info/add', '增加', 'watch_info/modify', '修改', 'watch_info/delete',  '删除', '腕表启用信息', 'fa-circle-o-notch', '#0AC0FC',0),
	(4, 'tb_department_info', 2, 'department_info/add', '增加', 'department_info/modify', '修改', 'department_info/delete',  '删除', '部门信息表', 'fa-building', '#0AC0FC',4),
	(5, 'tb_locarea_info', 2, 'locarea_info/add', '增加', 'locarea_info/modify', '修改', 'locarea_info/delete',  '删除', '定位区域信息表', 'fa-crosshairs', '#0AC0FC',4),
	(6, 'tb_recvunit_info', 2, 'recvunit_info/add', '增加', 'recvunit_info/modify', '修改', 'recvunit_info/delete',  '删除', '接收单元信息表', 'fa-cubes', '#0AC0FC',0),
	(7, 'tb_loccoor_info', 2, 'loccoor_info/add', '增加', 'loccoor_info/modify', '修改', 'loccoor_info/delete',  '删除', '定位坐标信息表', 'fa-area-chart', '#0AC0FC',4),
	(8, 'tb_monarea_info', 2, 'monarea_info/add', '增加', 'monarea_info/modify', '修改', 'monarea_info/delete',  '删除', '监控区域信息', 'fa-crosshairs', '#0AC0FC',4),
	(9, 'tb_watch_area_info', 2, 'watch_area_info/add', '增加', 'watch_area_info/modify', '修改', 'watch_area_info/delete',  '删除', '重点区域信息', 'fa-crosshairs', '#0AC0FC',4),
	(10, 'tb_people_inout_detail', 0, '#', '无', '#', '无', '#',  '无', '人员出入信息', 'fa-user', '#0AC0FC',3),
	(11, 'tb_dep_locarea_param', 2, 'dep_locarea_param/add', '增加', 'dep_locarea_param/modify', '修改', 'dep_locarea_param/delete',  '删除', '部门定位参数表', 'fa-database', '#0AC0FC',4),
	(12, 'tb_alarm_general', 0,  '#', '无', '#', '无', 'alarm_general/clear',  '清除报警', '腕表基础状态', 'fa-warning', '#DF0101',1),
	(13, 'tb_alarm_loc', 0, '#', '无', '#', '无', 'alarm_loc/clear', '清除报警',  '腕表定位信息表', 'fa-warning', '#DF0101',1),
	(14, 'tb_alarm_prohibit', 0, '#', '无', '#', '无', 'alarm_prohibit/clear', '清除报警',  '腕表警戒信息表', 'fa-warning', '#DF0101',1),
	(15, 'tb_alarm_enter', 0, '#', '无', '#', '无', 'alarm_enter/clear', '清除报警',  '腕表进入信息表', 'fa-warning', '#DF0101',1),
	(16, 'tb_alarm_mon', 0, '#', '无', '#', '无', 'alarm_mon/clear',  '清除报警', '腕表监控信息表', 'fa-warning', '#DF0101',1),
	(17, 'tb_dep_ru_location', 2, 'dep_ru_location/add', '增加', 'dep_ru_location/modify', '修改', 'dep_ru_location/delete',  '删除', '接收单元定位信息', 'fa-wifi', '#0B610B',0),
	(18, 'tb_dep_ru_prohibit', 2, 'dep_ru_prohibit/add', '增加', 'dep_ru_prohibit/modify', '修改', 'dep_ru_prohibit/delete',  '删除', '接收单元警戒信息', 'fa-wifi', '#0B610B',0),
	(19, 'tb_dep_ru_enter', 2, 'dep_ru_enter/add', '增加', 'dep_ru_enter/modify', '修改', 'dep_ru_enter/delete',  '删除', '接收单元进入信息', 'fa-wifi', '#0B610B',0),
	(20, 'tb_dep_ru_door', 2, 'dep_ru_door/add', '增加', 'dep_ru_door/modify', '修改', 'dep_ru_door/delete',  '删除', '接收单元门禁信息', 'fa-wifi', '#0B610B',0),
	(21, 'tb_dep_ru_monitor', 2, 'dep_ru_monitor/add', '增加', 'dep_ru_monitor/modify', '修改', 'dep_ru_monitor/delete',  '删除', '接收单元监控信息', 'fa-wifi', '#0B610B',0);

# Dump of table tb_sessions
# ------------------------------------------------------------
#保存用户会话

DROP TABLE IF EXISTS `tb_sessions`;

CREATE TABLE `tb_sessions` (
  `id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) default '' NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `data` text NOT NULL,
  `timestamp` int(10) unsigned DEFAULT 0 NOT NULL,
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

-- --------------------------------------------------------

-- 
-- 表的结构 `tb_logging`
-- 
#需要记录哪些操作？

drop table if exists `tb_logging`;

create table `tb_logging` (
  `log_id` int(11) not null auto_increment,
  #日志编号
  `operator_id` int(11) not null,
  #操作员编号
  `name` varchar(64) default null,
  #操作员名称
  `user` varchar(64) default null,
  #操作员名称
  `action` varchar(64) default null,
  #动作
  `content` varchar(100) default null,
  #内容
  `ip` varchar(20) not null,
  #IP地址
  `login_time` datetime default null,
  #登录时间
  `logout_time` datetime default null,
  #登出时间
  `update_timestamp` datetime default null,
  #更新时间
  primary key (`log_id`)
) engine=myisam default charset=utf8 comment='登录记录表';

-- 
-- 导出表中的数据 `tb_logging`
-- 

insert into `tb_logging` values (1, 1, '所长', '0001', '登录', '登录成功', '127.0.0.1', '2014-10-22 11:24:21', null, null);
insert into `tb_logging` values (2, 2, '民警', '0002', '增加', '添加帐号流水为466', '192.168.1.125', '2014-10-27 09:30:19', null, null);





# dump of table person_info 人员信息表
# ------------------------------------------------------------

drop table if exists `tb_people_info`;

create table `tb_people_info` (
`people_id` int not null comment '人员标识，全局唯一',
#`people_name` varchar(64) not null comment '人员名称',
`dep_id` int not null comment '人员所属部门标识',
#和tb_department_info一致
`watch_id` int not null comment '人员配带腕带标识',
#和watch_info一致
`init_locarea_id` int null not null default '0' comment '人员的初始位置, 如果id=0 就是初始位置不定，对应定区域的 id',
#和locarea_info一致
`update_timestamp` datetime not null default '2011-01-01' on update current_timestamp comment '记录更新时间',
primary key (`people_id`)
)charset=utf8 comment='人员表 人员 id 是键值';

insert into `tb_people_info` (`people_id`, `dep_id`, `watch_id`, `init_locarea_id`, `update_timestamp`)
values
	(1, 1, 1, 1, '2011-01-01'),
	(2, 1, 2, 1, '2011-01-02'),
	(3, 1, 3, 1, '2011-01-03'),
	(4, 1, 4, 1, '2011-01-04');

-- --------------------------------------------------------

-- 
-- 表的结构 `tb_people_detail`
-- 
#罪犯详细信息表

drop table if exists `tb_people_detail`;

create table `tb_people_detail` (
  `people_id` int(11) not null,
#人员ID
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
insert into `tb_people_detail` values (2, '3308070716', '韦吉明2', '1986-12-03 00:00:00', '男', '初中', '农民', '1', '贵州省  榕江县', '贵州省  榕江县三江乡长岭村长岭组', '贩卖毒品', '030600', '2014-12-12 00:00:00', '2018-05-11 00:00:00', '2015-02-12 00:00:00', '重犯', '0', '0', '2014年2月18日，该犯违反国家毒品管理法规，明知是毒品而予以贩卖。', '壮族', 1, null);
insert into `tb_people_detail` values (3, '3308070716', '韦吉明3', '1986-12-03 00:00:00', '男', '初中', '农民', '1', '贵州省  榕江县', '贵州省  榕江县三江乡长岭村长岭组', '贩卖毒品', '030600', '2014-12-12 00:00:00', '2018-05-11 00:00:00', '2015-02-12 00:00:00', '重犯', '0', '0', '2014年2月18日，该犯违反国家毒品管理法规，明知是毒品而予以贩卖。', '壮族', 1, null);
insert into `tb_people_detail` values (4, '3308070716', '韦吉明4', '1986-12-03 00:00:00', '男', '初中', '农民', '1', '贵州省  榕江县', '贵州省  榕江县三江乡长岭村长岭组', '贩卖毒品', '030600', '2014-12-12 00:00:00', '2018-05-11 00:00:00', '2015-02-12 00:00:00', '重犯', '0', '0', '2014年2月18日，该犯违反国家毒品管理法规，明知是毒品而予以贩卖。', '壮族', 1, null);
insert into `tb_people_detail` values (5, '3308070716', '韦吉明5', '1986-12-03 00:00:00', '男', '初中', '农民', '1', '贵州省  榕江县', '贵州省  榕江县三江乡长岭村长岭组', '贩卖毒品', '030600', '2014-12-12 00:00:00', '2018-05-11 00:00:00', '2015-02-12 00:00:00', '重犯', '0', '0', '2014年2月18日，该犯违反国家毒品管理法规，明知是毒品而予以贩卖。', '壮族', 1, null);
insert into `tb_people_detail` values (6, '3308070716', '韦吉明6', '1986-12-03 00:00:00', '男', '初中', '农民', '1', '贵州省  榕江县', '贵州省  榕江县三江乡长岭村长岭组', '贩卖毒品', '030600', '2014-12-12 00:00:00', '2018-05-11 00:00:00', '2015-02-12 00:00:00', '重犯', '0', '0', '2014年2月18日，该犯违反国家毒品管理法规，明知是毒品而予以贩卖。', '壮族', 1, null);
insert into `tb_people_detail` values (7, '3308070716', '韦吉明7', '1986-12-03 00:00:00', '男', '初中', '农民', '1', '贵州省  榕江县', '贵州省  榕江县三江乡长岭村长岭组', '贩卖毒品', '030600', '2014-12-12 00:00:00', '2018-05-11 00:00:00', '2015-02-12 00:00:00', '重犯', '0', '0', '2014年2月18日，该犯违反国家毒品管理法规，明知是毒品而予以贩卖。', '壮族', 1, null);
insert into `tb_people_detail` values (8, '3308070716', '韦吉明8', '1986-12-03 00:00:00', '男', '初中', '农民', '1', '贵州省  榕江县', '贵州省  榕江县三江乡长岭村长岭组', '贩卖毒品', '030600', '2014-12-12 00:00:00', '2018-05-11 00:00:00', '2015-02-12 00:00:00', '重犯', '0', '0', '2014年2月18日，该犯违反国家毒品管理法规，明知是毒品而予以贩卖。', '壮族', 1, null);
insert into `tb_people_detail` values (9, '3308070716', '韦吉明9', '1986-12-03 00:00:00', '男', '初中', '农民', '1', '贵州省  榕江县', '贵州省  榕江县三江乡长岭村长岭组', '贩卖毒品', '030600', '2014-12-12 00:00:00', '2018-05-11 00:00:00', '2015-02-12 00:00:00', '重犯', '0', '0', '2014年2月18日，该犯违反国家毒品管理法规，明知是毒品而予以贩卖。', '壮族', 1, null);
insert into `tb_people_detail` values (10, '3308070716', '韦吉明10', '1986-12-03 00:00:00', '男', '初中', '农民', '1', '贵州省  榕江县', '贵州省  榕江县三江乡长岭村长岭组', '贩卖毒品', '030600', '2014-12-12 00:00:00', '2018-05-11 00:00:00', '2015-02-12 00:00:00', '重犯', '0', '0', '2014年2月18日，该犯违反国家毒品管理法规，明知是毒品而予以贩卖。', '壮族', 1, null);
insert into `tb_people_detail` values (11, '3308070716', '韦吉明11', '1986-12-03 00:00:00', '男', '初中', '农民', '1', '贵州省  榕江县', '贵州省  榕江县三江乡长岭村长岭组', '贩卖毒品', '030600', '2014-12-12 00:00:00', '2018-05-11 00:00:00', '2015-02-12 00:00:00', '重犯', '0', '0', '2014年2月18日，该犯违反国家毒品管理法规，明知是毒品而予以贩卖。', '壮族', 1, null);

-- --------------------------------------------------------

-- 
-- 表的结构 `tb_people_inout`
-- 
#记录犯人的外出和返回

drop table if exists `tb_people_inout`;

create table `tb_people_inout` (
  `inout_id` int(11) not null auto_increment,
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
-- 表的结构 `tb_people_inout_detail`
-- 
#记录犯人的外出和返回

drop table if exists `tb_people_inout_detail`;

create table `tb_people_inout_detail` (
  `inout_id` int(11) not null auto_increment,
  `people_id` int(11) not null, #人员编号
  `watch_id` int(11) default null,#腕表编号
  `area_id` int(11) default null,#区域号码
  `intime` datetime default null,#返回时间
  `outtime` datetime default null,#离开时间
  `memo` varchar(200) default null,#备注
  `status` smallint default 0,#状态
  #0=返回 1=外出
  `update_timestamp` datetime default null,#更新时间
  primary key  (`inout_id`)
) engine=myisam default charset=utf8 comment='人员出入历史记录表';


insert into tb_people_inout_detail values (1, 1, 1, 1, '2011-01-01', '', 'memeo',1, "2011-01-10");

-- --------------------------------------------------------

-- 
-- 表的结构 `tb_watch_info`
-- 

drop table if exists `tb_watch_info`;

create table `tb_watch_info` (
  `watch_id` int(11) not null auto_increment,
  `watch_status` int(11) not null default '0',
  #0=未启用 1=启用 2=工作不正常(这里应该只有0或者1)
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

insert into `tb_alarm_general` values
	(1, 0, 11, '2011-11-11 01:01:01'),
	(2, 0, 11, '2011-11-11 01:01:01'),
	(3, 0, 12, '2011-11-11 01:01:01'),
	(4, 1, 12, '2011-11-11 01:01:01'),
	(5, 1, 11, '2011-11-11 01:01:01'),
	(6, 1, 13, '2011-11-11 01:01:01'),
	(7, 1, 13, '2011-11-11 01:01:01'),
	(8, 0, 13, '2011-11-11 01:01:01'),
	(9, 0, 13, '2011-11-11 01:01:01');


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

insert into `tb_alarm_loc` values
	(1, 0, 100, 101, '2011-11-11 01:01:01'),
	(2, 0, 100, 101, '2011-11-11 01:01:01'),
	(4, 1, 100, 101, '2011-11-11 01:01:01'),
	(5, 1, 100, 101, '2011-11-11 01:01:01'),
	(6, 0, 100, 101, '2011-11-11 01:01:01'),
	(7, 0, 100, 101, '2011-11-11 01:01:01'),
	(8, 1, 100, 101, '2011-11-11 01:01:01'),
	(9, 1, 100, 101, '2011-11-11 01:01:01'),
	(10, 0, 100, 101, '2011-11-11 01:01:01'),
	(11, 0, 100, 101, '2011-11-11 01:01:01'),
	(12, 1, 100, 101, '2011-11-11 01:01:01'),
	(13, 1, 100, 101, '2011-11-11 01:01:01'),
	(14, 0, 100, 101, '2011-11-11 01:01:01'),
	(15, 0, 100, 101, '2011-11-11 01:01:01'),
	(16, 1, 100, 101, '2011-11-11 01:01:01'),
	(17, 1, 100, 101, '2011-11-11 01:01:01'),
	(18, 0, 100, 101, '2011-11-11 01:01:01'),
	(19, 0, 100, 101, '2011-11-11 01:01:01'),
	(20, 1, 100, 101, '2011-11-11 01:01:01'),
	(21, 1, 100, 101, '2011-11-11 01:01:01'),
	(22, 0, 100, 101, '2011-11-11 01:01:01'),
	(23, 0, 100, 101, '2011-11-11 01:01:01'),
	(24, 1, 100, 101, '2011-11-11 01:01:01'),
	(25, 1, 100, 101, '2011-11-11 01:01:01'),
	(26, 0, 100, 101, '2011-11-11 01:01:01'),
	(27, 0, 100, 101, '2011-11-11 01:01:01'),
	(28, 1, 100, 101, '2011-11-11 01:01:01'),
	(29, 1, 100, 101, '2011-11-11 01:01:01'),
	(30, 0, 100, 101, '2011-11-11 01:01:01'),
	(31, 0, 100, 101, '2011-11-11 01:01:01'),
	(32, 1, 100, 101, '2011-11-11 01:01:01'),
	(33, 1, 100, 101, '2011-11-11 01:01:01');

-- --------------------------------------------------------

-- 
-- 表的结构 `tb_record_flow`
-- 
#如果每个犯人的踪迹都要记录，假设1000个犯人，5秒记录一次，记录一个小时的踪迹，则总共有720000条记录
#建议比如说按照watch_id划分，比如tb_record_flow_1记录1-100号腕表的踪迹

drop table if exists `tb_record_flow`;

create table `tb_record_flow` (
  `rec_id` int(11) not null auto_increment,
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

insert into `tb_alarm_prohibit` values
	(3, 0, 101, '2011-11-11 01:01:01'),
	(4, 0, 101, '2011-11-11 01:01:01'),
	(14, 0, 101, '2011-11-11 01:01:01'),
	(15, 1, 101, '2011-11-11 01:01:01'),
	(34, 1, 101, '2011-11-11 01:01:01'),
	(44, 1, 101, '2011-11-11 01:01:01'),
	(54, 1, 101, '2011-11-11 01:01:01'),
	(64, 1, 101, '2011-11-11 01:01:01'),
	(74, 1, 101, '2011-11-11 01:01:01'),
	(84, 1, 101, '2011-11-11 01:01:01');

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

insert into `tb_alarm_enter` values
	(5, 0, 103, '2011-11-11 01:01:01'),
	(6, 1, 101, '2011-11-11 01:01:01'),
	(16, 1, 101, '2011-11-11 01:01:01'),
	(26, 1, 101, '2011-11-11 01:01:01'),
	(36, 1, 101, '2011-11-11 01:01:01'),
	(46, 1, 101, '2011-11-11 01:01:01'),
	(56, 1, 101, '2011-11-11 01:01:01'),
	(66, 1, 101, '2011-11-11 01:01:01'),
	(76, 1, 101, '2011-11-11 01:01:01'),
	(86, 1, 101, '2011-11-11 01:01:01'),
	(96, 1, 101, '2011-11-11 01:01:01');


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

insert into `tb_alarm_mon` values
	(7, 0, 103, '2011-11-11  01:01:01'),
	(8, 0, 103, '2011-11-11  01:01:01'),
	(18, 0, 103, '2011-11-11  01:01:01'),
	(28, 0, 103, '2011-11-11  01:01:01'),
	(38, 1, 103, '2011-11-11  01:01:01'),
	(48, 1, 103, '2011-11-11  01:01:01'),
	(58, 1, 103, '2011-11-11  01:01:01'),
	(68, 1, 103, '2011-11-11  01:01:01'),
	(78, 1, 103, '2011-11-11  01:01:01'),
	(88, 1, 103, '2011-11-11  01:01:01'),
	(98, 1, 103, '2011-11-11  01:01:01'),
	(108, 1, 103, '2011-11-11  01:01:01');




-- 
-- 表的结构 `tb_department_info`
-- 
#用来标识不同的部门。其中的部门ID，会在很多地方被引用。

drop table if exists `tb_department_info`;

create table `tb_department_info` (
  `dep_id` int(11) not null auto_increment,
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
  `show` int(11) default 0,
  `parentid` int(11) default 0,
  `update_timestamp` datetime not null,
  primary key  (`locarea_id`)
) engine=myisam default charset=utf8 comment='定位区域表';

-- 
-- 导出表中的数据 `tb_locarea_info`
-- 

insert into `tb_locarea_info` values (2010000, '监舍区', 0, 0, 0, 0, 0, 1, 0, '2015-10-22 14:24:27');
insert into `tb_locarea_info` values (2010001, '监舍区中的1号监舍', 0, 0, 0, 0, 0, 0, 2010000, '2015-10-22 14:24:27');
insert into `tb_locarea_info` values (2010002, '监舍区中的3号监舍', 0, 0, 0, 0, 0,  0, 2010000, '2015-10-22 14:24:27');
insert into `tb_locarea_info` values (2010003, '监舍区中的3号监舍', 0, 0, 0, 0, 0,  0, 2010000, '2015-10-22 14:24:27');
insert into `tb_locarea_info` values (2010004, '监舍区中的4号监舍', 0, 0, 0, 0, 0,  0, 2010000, '2015-10-22 14:24:27');
insert into `tb_locarea_info` values (2010005, '监舍区中的5号监舍', 0, 0, 0, 0, 0,  0, 2010000, '2015-10-22 14:24:27');
insert into `tb_locarea_info` values (2010006, '监舍区中的6号监舍', 0, 0, 0, 0, 0,  0, 2010000, '2015-10-22 14:24:27');
insert into `tb_locarea_info` values (2010007, '监舍区中的7号监舍', 0, 0, 0, 0, 0,  0, 2010000, '2015-10-22 14:24:27');
insert into `tb_locarea_info` values (2010008, '监舍区中的8号监舍', 0, 0, 0, 0, 0,  0, 2010000, '2015-10-22 14:24:27');
insert into `tb_locarea_info` values (2010009, '监舍区中的9号监舍', 0, 0, 0, 0, 0,  0, 2010000, '2015-10-22 14:24:27');
insert into `tb_locarea_info` values (2010010, '监舍区中的晒衣间', 0, 0, 0, 0, 0,  0, 2010000, '2015-10-22 14:24:27');
insert into `tb_locarea_info` values (2010011, '监舍区中的储藏室', 0, 0, 0, 0, 0,  0, 2010000, '2015-10-22 14:24:27');
insert into `tb_locarea_info` values (2010012, '监舍区中的淋浴间', 0, 0, 0, 0, 0,  0, 2010000, '2015-10-22 14:24:27');
insert into `tb_locarea_info` values (2010013, '监舍区中的活动室', 0, 0, 0, 0, 0,  0, 2010000, '2015-10-22 14:24:27');
insert into `tb_locarea_info` values (2010014, '监舍区中的阅览室', 0, 0, 0, 0, 0,  0, 2010000, '2015-10-22 14:24:27');
insert into `tb_locarea_info` values (2010015, '监舍区中的谈话室', 0, 0, 0, 0, 0,  0, 2010000, '2015-10-22 14:24:27');
insert into `tb_locarea_info` values (2010016, '监舍区中的反省室', 0, 0, 0, 0, 0,  0, 2010000, '2015-10-22 14:24:27');
insert into `tb_locarea_info` values (2010017, '监舍区中的宣泄室', 0, 0, 0, 0, 0,  0, 2010000, '2015-10-22 14:24:27');

insert into `tb_locarea_info` values (2010400, '伙房', 0, 0, 0, 0, 0, 1, 0, '2015-10-22 14:24:27');
insert into `tb_locarea_info` values (2010500, '教育中心', 0, 0, 0, 0, 0, 1, 0, '2015-10-22 14:24:27');
insert into `tb_locarea_info` values (2010600, '医院', 0, 0, 0, 0, 0, 1, 0, '2015-10-22 14:24:27');
insert into `tb_locarea_info` values (2010700, '会见室', 0, 0, 0, 0, 0, 1, 0, '2015-10-22 14:24:27');

insert into `tb_locarea_info` values (2010800, '工厂区', 0, 0, 0, 0, 0, 1, 0, '2015-10-22 14:24:27');
insert into `tb_locarea_info` values (2010801, '厂房内', 0, 0, 0, 0, 0, 0, 2010800, '2015-10-22 14:24:27');
insert into `tb_locarea_info` values (2010802, '厂区大门内', 0, 0, 0, 0, 0, 0, 2010800, '2015-10-22 14:24:27');
insert into `tb_locarea_info` values (2010803, '厂区大门外', 0, 0, 0, 0, 0, 0, 2010800,  '2015-10-22 14:24:27');

insert into `tb_locarea_info` values (2010900, '严管中心', 0, 0, 0, 0, 0, 1, 0, '2015-10-22 14:24:27');
insert into `tb_locarea_info` values (2010901, '严管区', 0, 0, 0, 0, 0, 0, 2010900, '2015-10-22 14:24:27');
insert into `tb_locarea_info` values (2010902, '监管区', 0, 0, 0, 0, 0,  0, 2010900, '2015-10-22 14:24:27');
insert into `tb_locarea_info` values (2010903, '洗涮区', 0, 0, 0, 0, 0,  0, 2010900, '2015-10-22 14:24:27');

insert into `tb_locarea_info` values (2010905, 'TESTTEST', 0, 0, 0, 0, 0, 1, 0, '2015-10-22 14:24:27');

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
`rssi_diff` int(11) default 0,
`ru_type` int(11) default 0,
`update_timestamp` datetime not null default '2011-01-01' on update current_timestamp comment '记录更新时间',
primary key (`ru_id`)
)
comment='接收单元信息表 接收单元是一对唯一的 接收机 ip 地址和接收天线 index';

insert into `tb_recvunit_info` (`ru_id`, `receiver_ip`,`receiver_index`, `locarea_id`, `coor_id`, `pos_x`, `pos_y`, `weight`, `rssi_diff`, `ru_type`, `update_timestamp`)
value 
	(1, '192.168.0.1', 1, 1, 100, 1, 1, 100, 0, 0, '2011-01-01'),
        (2, '192.168.0.2', 2,.1, 100, 1, 1, 100, 0, 0,  '2011-01-01'),
        (3, '192.168.0.3', 3, 1, 100, 1, 1, 100, 0, 0,  '2011-01-01'),
	(4, '192.168.0.4', 4, 1, 100, 1, 1, 100, 0, 0,  '2011-01-01');

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

#
## dump of deparment_receive_unit _info 部门定位天线表
## ------------------------------------------------------------
drop table if exists `tb_dep_ru_location`;

create table `tb_dep_ru_location` (
`ru_id` int not null comment '接收天线标识，全局唯一',
`dep_id` int not null comment '部门标识',
`weight` int not null default 100 comment '定位信号系数值',
`rssi_weight` int not null default 100 comment '定位信号 rssi 强度系数值',
`update_timestamp` datetime not null default '2011-01-01' on update current_timestamp comment '记录更新时间'
)
comment=' ';

insert into `tb_dep_ru_location` (`dep_id`, `ru_id`, `weight`, `rssi_weight`, `update_timestamp`)
value 
    (1, 1001, 100, 100, '2011-01-01'),
    (2, 1002, 100, 100, '2011-01-01'),
    (3, 1003, 100, 100, '2011-01-01'),
    (3, 1004, 100, 100, '2011-01-01');
 
#部门警戒天线

drop table if exists `tb_dep_ru_prohibit`;

create table `tb_dep_ru_prohibit` (
`ru_id` int(11) not null comment '接收天线标识，全局唯一',
`dep_id` int(11) not null comment '部门标识',
`monarea_id` int(11) not null comment '警戒天线对应的监控区域标识',
`update_timestamp` datetime not null default current_timestamp on update current_timestamp comment '记录更新时间'
)
comment='部门警戒天线表';

#部门进入天线表
drop table if exists `tb_dep_ru_enter`;

create table `tb_dep_ru_enter` (
`ru_id` int(11) not null comment '接收天线标识，全局唯一',
`dep_id` int(11) not null comment '部门标识',
`monarea_id` int(11) not null comment '进入天线对应的监控区域标识',
`update_timestamp` datetime not null default current_timestamp on update current_timestamp comment '记录更新时间'
)
comment='部门进入天线表';

#部门门禁天线表
drop table if exists `tb_dep_ru_door`;

create table `tb_dep_ru_door` (
`ru_id` int(11) not null comment '接收天线标识，全局唯一',
`dep_id` int(11) not null comment '部门标识',
`monarea_id` int(11) not null comment '门禁天线报警解除对应的监控区域标识',
`update_timestamp` datetime not null default current_timestamp on update current_timestamp comment '记录更新时间'
)
comment='部门门禁天线表';

#部门监控天线表
drop table if exists `tb_dep_ru_monitor`;

create table `tb_dep_ru_monitor` (
`ru_id` int(11) not null comment '接收天线标识，全局唯一',
`dep_id` int(11) not null comment '部门标识',
`monarea_id` int(11) not null comment '监控天线对应的监控区域标识',
`update_timestamp` datetime not null default current_timestamp on update current_timestamp comment '记录更新时间'
)
comment='部门监控天线表';

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
-- 表的结构 `tb_dep_locarea_param`
--
drop table if exists `tb_dep_locarea_param` ;

create table `tb_dep_locarea_param` (
  `param_id` int(11) Not Null auto_increment,
  `dep_id` Int(11) Not Null,
  `locarea_id` Int(11) Not Null,
  `delay_ratio` Int(11) Not Null Default '100',
  `night_delay_ratio` Int(11) Not Null Default '100',
  `update_timestamp` Datetime Not Null Default Current_timestamp On Update Current_timestamp,
 primary key  (`param_id`)
) engine=Myisam Default Charset=utf8 Comment='部门定位参数表';

-- --------------------------------------------------------

--
-- 表的结构 `tb_server_info`
--
drop table if exists `tb_server_info`;

create table `tb_server_info` (
  `server_id` int(11) not null,
  #服务器ID
  `server_type` tinyint(4) not null,
  #服务器类型
  `server_name` varchar(64) not null,
  #服务器名称
  `server_ip` varchar(64) not null,
  #IP地址
  `powerlow_times` int(11) not null default '2',
  #低电压次数
  `location_decision_interval` int(11) not null default '5',
  #定位间隔
  `location_lost_ms` int(11) not null default '5000',
  #失位时间
  `monitor_lost_ms` int(11) not null default '5000',
  #失联时间
  `prohibit_lost` int(11) not null default '1',
  #监控丢失时间
  `update_timestamp` datetime not null default current_timestamp on update current_timestamp
) engine=myisam default charset=utf8;


drop table if exists `tb_mapdraw_info`;

create table `tb_mapdraw_info` (
`locarea_id`  int(11) not null,
`pos_x` int default 0 not null,
`pos_y` int default 0 not null,
`width` int default 100 not null,
`height` int default 100 not null,
`level` int default 10 not null, #=1 will be shown in main map
`link` varchar(128) not null, #link to its next page
`filename` varchar(64) not null,
`bgcolor` varchar(12) not null default '#4FA0FF'
) engine=myisam default charset=utf8 comment='';

insert into `tb_mapdraw_info` values (2010000, 705, 225, 150, 50, 1, 'showmap/submap/2010000', 'mainmap.jpg', '#808080');
insert into `tb_mapdraw_info` values (2010400, 680, 125, 150, 50, 1, 'people_info/localarm/2010400', 'mainmap.jpg', '#808080');
insert into `tb_mapdraw_info` values (2010500, 750, 125, 150, 50, 1, 'people_info/localarm/2010500', 'mainmap.jpg', '#808080');
insert into `tb_mapdraw_info` values (2010600, 825, 150, 150, 50, 1, 'people_info/localarm/2010600', 'mainmap.jpg', '#808080');
insert into `tb_mapdraw_info` values (2010700, 825, 300, 150, 50, 1, 'people_info/localarm/2010700', 'mainmap.jpg', '#808080');
insert into `tb_mapdraw_info` values (2010800, 500, 225, 150, 50, 1, 'showmap/submap/2010800', 'mainmap.jpg', '#808080');
insert into `tb_mapdraw_info` values (2010900, 680, 300, 150, 50, 1, 'showmap/submap/2010900', 'mainmap.jpg', '#808080');

insert into `tb_mapdraw_info` values (2010001, 825, 150, 50, 50, 0, 'people_info/localarm/2010001', '2010000.jpg', '#808080');
insert into `tb_mapdraw_info` values (2010002, 680, 125, 50, 50, 0, 'people_info/localarm/2010002', '2010000.jpg', '#808080');
insert into `tb_mapdraw_info` values (2010003, 750, 125, 50, 50, 0, 'people_info/localarm/2010003', '2010000.jpg', '#808080');
insert into `tb_mapdraw_info` values (2010004, 825, 150, 50, 50, 0, 'people_info/localarm/2010004', '2010000.jpg', '#808080');
insert into `tb_mapdraw_info` values (2010005, 825, 300, 50, 50, 0, 'people_info/localarm/2010005', '2010000.jpg', '#808080');
insert into `tb_mapdraw_info` values (2010006, 500, 225, 50, 50, 0, 'people_info/localarm/2010006', '2010000.jpg', '#808080');
insert into `tb_mapdraw_info` values (2010007, 680, 300, 50, 50, 0, 'people_info/localarm/2010007', '2010000.jpg', '#808080');
insert into `tb_mapdraw_info` values (2010008, 825, 150, 50, 50, 0, 'people_info/localarm/2010008', '2010000.jpg', '#808080');
insert into `tb_mapdraw_info` values (2010009, 680, 125, 50, 50, 0, 'people_info/localarm/2010009', '2010000.jpg', '#808080');
insert into `tb_mapdraw_info` values (2010010, 750, 125, 50, 50, 0, 'people_info/localarm/2010010', '2010000.jpg', '#808080');
insert into `tb_mapdraw_info` values (2010011, 825, 150, 50, 50, 0, 'people_info/localarm/2010011', '2010000.jpg', '#808080');
insert into `tb_mapdraw_info` values (2010012, 825, 300, 50, 50, 0, 'people_info/localarm/2010012', '2010000.jpg', '#808080');
insert into `tb_mapdraw_info` values (2010013, 500, 225, 50, 50, 0, 'people_info/localarm/2010013', '2010000.jpg', '#808080');
insert into `tb_mapdraw_info` values (2010014, 680, 300, 50, 50, 0, 'people_info/localarm/2010014', '2010000.jpg', '#808080');
insert into `tb_mapdraw_info` values (2010015, 825, 150, 50, 50, 0, 'people_info/localarm/2010015', '2010000.jpg', '#808080');
insert into `tb_mapdraw_info` values (2010016, 825, 300, 50, 50, 0, 'people_info/localarm/2010016', '2010000.jpg', '#808080');
insert into `tb_mapdraw_info` values (2010017, 500, 225, 50, 50, 0, 'people_info/localarm/2010017', '2010000.jpg', '#808080');

insert into `tb_mapdraw_info` values (2010801, 825, 150, 50, 50, 0, 'people_info/localarm/2010801', '2010800.jpg', '#808080');
insert into `tb_mapdraw_info` values (2010802, 825, 300, 50, 50, 0, 'people_info/localarm/2010802', '2010800.jpg', '#808080');
insert into `tb_mapdraw_info` values (2010803, 500, 225, 50, 50, 0, 'people_info/localarm/2010803', '2010800.jpg', '#808080');

insert into `tb_mapdraw_info` values (2010901, 825, 150, 50, 50, 0, 'people_info/localarm/2010901', '2010900.jpg', '#808080');
insert into `tb_mapdraw_info` values (2010902, 825, 300, 50, 50, 0, 'people_info/localarm/2010902', '2010900.jpg', '#808080');
insert into `tb_mapdraw_info` values (2010903, 500, 225, 50, 50, 0, 'people_info/localarm/2010903', '2010900.jpg', '#808080');

/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

#CREATE VIEWS

drop view if exists `people_view`;

create view people_view as 
select 
	a.people_id,
	e.name as people_name,
	a.dep_id,
	a.watch_id,
	a.init_locarea_id,
	b.watch_status,
	d.update_timestamp,
	c.status,
	d.locarea_id,
	d.monarea_id
from tb_people_info a
left join tb_watch_info b
on a.watch_id = b.watch_id
left join tb_people_inout c
on a.people_id = c.people_id
left join tb_alarm_loc d
on a.watch_id = d.watch_id
left join tb_people_detail e
on a.people_id = e.people_id
left join tb_alarm_general f
on a.watch_id = f.watch_id;

drop view if exists `people_count_view`;

create view people_count_view as
select
	(select count(people_id) from tb_people_detail) as all_people_count,
	(select count(people_id) from tb_people_detail where status = 1) as people_reg_count,
	(select count(people_id) from tb_people_inout where status <> 0) as people_out,
	(select count(people_id) from tb_people_info ) as people_withwatch_count,
	(select count(watch_id) from tb_watch_info ) as watch_count,
	(select count(watch_id) from tb_watch_info where watch_status = 1) as watch_inuse,
	(select count(watch_id) from tb_alarm_general where alarm_state <> 0 or watch_working_state <> 0) as watch_alarm;

drop view if exists `alarm_count_view`;

create view alarm_count_view as
select 
	(select count(watch_id) from tb_alarm_general where alarm_state <> 0 ) as gen_count,
	(select count(watch_id) from tb_alarm_loc where alarm_type <> 0 ) as loc_count,
	(select count(watch_id) from tb_alarm_prohibit where alarm_state <> 0 ) as prohibit_count,
	(select count(watch_id) from tb_alarm_enter where alarm_state <> 0 ) as enter_count,
	(select count(watch_id) from tb_alarm_mon where alarm_state <> 0 ) as mon_count;

drop view if exists `view_active_watch`;

create view `view_active_watch` as
select 
	a.watch_id,
	a.watch_status,
	b.dep_id
from tb_watch_info a
left join tb_people_info b
on a.watch_id = b.watch_id;

drop procedure Init_alarm_info;

DELIMITER //
create procedure Init_alarm_info()
begin
TRUNCATE TABLE tb_alarm_general;
insert into tb_alarm_general (WATCH_ID) select WATCH_ID from view_active_watch;
TRUNCATE TABLE tb_alarm_loc;
insert into tb_alarm_loc (WATCH_ID) select WATCH_ID from view_active_watch;
TRUNCATE TABLE tb_alarm_prohibit;
insert into tb_alarm_prohibit (WATCH_ID) select WATCH_ID from view_active_watch;
TRUNCATE TABLE tb_alarm_enter;
insert into tb_alarm_enter (WATCH_ID) select WATCH_ID from view_active_watch;
TRUNCATE TABLE tb_alarm_mon;
insert into tb_alarm_mon (WATCH_ID) select WATCH_ID from view_active_watch;
end;
//
DELIMITER ;

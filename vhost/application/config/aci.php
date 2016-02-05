<?php

if (! defined('BASEPATH'))
    exit('No direct script access allowed');
$config['aci_status'] = array(
    'systemVersion' => '1.0.0',
    'installED' => true
) // 初始安装，请在这里修改
;
$config['aci_module'] = array(
    'welcome' => array(
        'version' => '1',
        'charset' => 'utf-8',
        'lastUpdate' => '2015-10-09 20:10:10',
        'moduleName' => 'welcome',
        'modulePath' => '',
        'moduleCaption' => '首页',
        'description' => '系统的模块',
        'fileList' => NULL,
        'works' => true,
        'moduleUrl' => '',
        'system' => true,
        'coder' => 'WSM',
        'website' => 'http://',
        'moduleDetails' => array(
            0 => array(
                'folder' => '',
                'controller' => 'welcome',
                'method' => '',
                'caption' => '欢迎界面'
            )
        )
    ),
    'adminpanel' => array(
        'version' => '1',
        'charset' => 'utf-8',
        'lastUpdate' => '2015-10-09 20:10:10',
        'moduleName' => 'user',
        'modulePath' => 'adminpanel',
        'moduleCaption' => '后台管理中心',
        'description' => '由autoCodeigniter 系统的模块',
        'fileList' => NULL,
        'works' => true,
        'moduleUrl' => 'adminpanel/user',
        'system' => true,
        'coder' => 'WSM',
        'website' => 'http://',
        'moduleDetails' => array(
            0 => array(
                'folder' => 'adminpanel',
                'controller' => 'manage',
                'method' => 'index',
                'caption' => '管理中心-首页'
            ),
            1 => array(
                'folder' => 'adminpanel',
                'controller' => 'manage',
                'method' => 'login',
                'caption' => '管理中心-登录'
            ),
            2 => array(
                'folder' => 'adminpanel',
                'controller' => 'manage',
                'method' => 'logout',
                'caption' => '管理中心-注销'
            ),
            3 => array(
                'folder' => 'adminpanel',
                'controller' => 'profile',
                'method' => 'change_pwd',
                'caption' => '管理中心-修改密码'
            ),
            4 => array(
                'folder' => 'adminpanel',
                'controller' => 'manage',
                'method' => 'login',
                'caption' => '管理中心-登录'
            ),
            5 => array(
                'folder' => 'adminpanel',
                'controller' => 'manage',
                'method' => 'go',
                'caption' => '管理中心-URL转向'
            ),
            6 => array(
                'folder' => 'adminpanel',
                'controller' => 'manage',
                'method' => 'cache',
                'caption' => '管理中心-全局缓存'
            )
        )
    ),
    'user' => array(
        'version' => '1',
        'charset' => 'utf-8',
        'lastUpdate' => '2015-10-09 20:10:10',
        'moduleName' => 'user',
        'modulePath' => 'adminpanel',
        'moduleCaption' => '用户 / 用户组管理',
        'description' => '由autoCodeigniter 系统的模块',
        'fileList' => NULL,
        'works' => true,
        'moduleUrl' => 'adminpanel/user',
        'system' => true,
        'coder' => 'WSM',
        'website' => 'http://',
        'moduleDetails' => array(
            0 => array(
                'folder' => 'adminpanel',
                'controller' => 'user',
                'method' => 'index',
                'caption' => '用户管理-列表'
            ),
            1 => array(
                'folder' => 'adminpanel',
                'controller' => 'user',
                'method' => 'check_username',
                'caption' => '用户管理-检测用户名'
            ),
            2 => array(
                'folder' => 'adminpanel',
                'controller' => 'user',
                'method' => 'delete',
                'caption' => '用户管理-删除'
            ),
            3 => array(
                'folder' => 'adminpanel',
                'controller' => 'user',
                'method' => 'lock',
                'caption' => '用户管理-锁定'
            ),
            4 => array(
                'folder' => 'adminpanel',
                'controller' => 'user',
                'method' => 'edit',
                'caption' => '用户管理-编辑'
            ),
            5 => array(
                'folder' => 'adminpanel',
                'controller' => 'user',
                'method' => 'add',
                'caption' => '用户管理-新增'
            ),
            6 => array(
                'folder' => 'adminpanel',
                'controller' => 'user',
                'method' => 'upload',
                'caption' => '用户管理-上传图像'
            ),
            7 => array(
                'folder' => 'adminpanel',
                'controller' => 'role',
                'method' => 'index',
                'caption' => '用户组管理-列表'
            ),
            8 => array(
                'folder' => 'adminpanel',
                'controller' => 'role',
                'method' => 'setting',
                'caption' => '用户组管理-权限设置'
            ),
            9 => array(
                'folder' => 'adminpanel',
                'controller' => 'role',
                'method' => 'add',
                'caption' => '用户组管理-新增'
            ),
            10 => array(
                'folder' => 'adminpanel',
                'controller' => 'role',
                'method' => 'edit',
                'caption' => '用户组管理-编辑'
            ),
            11 => array(
                'folder' => 'adminpanel',
                'controller' => 'role',
                'method' => 'delete_one',
                'caption' => '用户组管理-删除'
            )
        )
    ),
    'member' => array(
        'version' => '1',
        'charset' => 'utf-8',
        'lastUpdate' => '2015-10-09 20:10:10',
        'moduleName' => 'user',
        'modulePath' => 'member',
        'moduleCaption' => '用户中心',
        'description' => '由autoCodeigniter 系统的模块',
        'fileList' => NULL,
        'works' => true,
        'moduleUrl' => 'member/manage',
        'system' => true,
        'coder' => 'WSM',
        'website' => 'http://',
        'moduleDetails' => array(
            0 => array(
                'folder' => 'member',
                'controller' => 'manage',
                'method' => 'index',
                'caption' => '用户中心-首页'
            ),
            1 => array(
                'folder' => 'member',
                'controller' => 'manage',
                'method' => 'login',
                'caption' => '用户中心-登录'
            ),
            2 => array(
                'folder' => 'member',
                'controller' => 'manage',
                'method' => 'logout',
                'caption' => '用户中心-注销'
            ),
            3 => array(
                'folder' => 'member',
                'controller' => 'profile',
                'method' => 'change_pwd',
                'caption' => '用户中心-修改密码'
            ),
            4 => array(
                'folder' => 'member',
                'controller' => 'manage',
                'method' => 'public_go_[0-9+]',
                'caption' => '管理中心-URL转向'
            )
        )
    ),
    'moduleMenu' => array(
        'version' => '1',
        'charset' => 'utf-8',
        'lastUpdate' => '2015-10-09 20:10:10',
        'moduleName' => 'moduleMenu',
        'modulePath' => 'adminpanel',
        'moduleCaption' => '菜单管理',
        'description' => '由autoCodeigniter 系统的模块',
        'fileList' => NULL,
        'works' => true,
        'moduleUrl' => 'adminpanel/moduleMenu',
        'system' => true,
        'coder' => 'WSM',
        'website' => 'http://',
        'moduleDetails' => array(
            0 => array(
                'folder' => 'adminpanel',
                'controller' => 'moduleMenu',
                'method' => 'index',
                'caption' => '菜单管理-列表'
            ),
            1 => array(
                'folder' => 'adminpanel',
                'controller' => 'moduleMenu',
                'method' => 'add',
                'caption' => '菜单管理-新增'
            ),
            2 => array(
                'folder' => 'adminpanel',
                'controller' => 'moduleMenu',
                'method' => 'edit',
                'caption' => '菜单管理-编辑'
            ),
            3 => array(
                'folder' => 'adminpanel',
                'controller' => 'moduleMenu',
                'method' => 'delete',
                'caption' => '菜单管理-删除'
            ),
            4 => array(
                'folder' => 'adminpanel',
                'controller' => 'moduleMenu',
                'method' => 'set_menu',
                'caption' => '菜单管理-设置菜单'
            )
        )
    ),
    'moduleManage' => array(
        'version' => '1',
        'charset' => 'utf-8',
        'lastUpdate' => '2015-10-09 20:10:10',
        'moduleName' => 'module',
        'modulePath' => 'adminpanel',
        'moduleCaption' => '模块安装管理',
        'description' => '由autoCodeigniter 系统的模块',
        'fileList' => NULL,
        'works' => true,
        'moduleUrl' => 'adminpanel/moduleManage',
        'system' => true,
        'coder' => 'WSM',
        'website' => 'http://',
        'moduleDetails' => array(
            0 => array(
                'folder' => 'adminpanel',
                'controller' => 'moduleManage',
                'method' => 'index',
                'caption' => '模块管理'
            ),
            1 => array(
                'folder' => 'adminpanel',
                'controller' => 'moduleInstall',
                'method' => 'index',
                'caption' => '模块管理-开始'
            ),
            2 => array(
                'folder' => 'adminpanel',
                'controller' => 'moduleInstall',
                'method' => 'check',
                'caption' => '模块管理-检查'
            ),
            3 => array(
                'folder' => 'adminpanel',
                'controller' => 'moduleInstall',
                'method' => 'setup',
                'caption' => '模块管理-安装'
            ),
            4 => array(
                'folder' => 'adminpanel',
                'controller' => 'moduleInstall',
                'method' => 'uninstall',
                'caption' => '模块管理-卸载'
            ),
            5 => array(
                'folder' => 'adminpanel',
                'controller' => 'moduleInstall',
                'method' => 'reinstall',
                'caption' => '模块管理-重新安装'
            ),
            6 => array(
                'folder' => 'adminpanel',
                'controller' => 'moduleInstall',
                'method' => 'delete',
                'caption' => '模块管理-删除'
            )
        )
    ),
    'helloWorld' => array(
        'version' => '1',
        'charset' => 'utf-8',
        'lastUpdate' => '2015-10-09 20:10:10',
        'moduleName' => 'helloWorld',
        'modulePath' => 'adminpanel',
        'moduleCaption' => 'Hello World',
        'description' => '这里一个演示模块',
        'fileList' => NULL,
        'works' => true,
        'moduleUrl' => 'adminpanel/helloWorld',
        'system' => false,
        'coder' => 'WSM',
        'website' => 'http://',
        'moduleDetails' => array(
            0 => array(
                'folder' => 'adminpanel',
                'controller' => 'helloWorld',
                'method' => 'index',
                'menu_name' => NULL,
                'caption' => NULL
            )
        )
    )
);

$config['menu_notify'] = array(
    'device_count' => array(
        'title' => '设备统计',
        'url1' => array(
             base_url().'adminpanel/edittable/viewalarm/12',
             '腕带异常',
             'prison_watch_error' => '0'),
        'url2' => array(
             base_url() . 'adminpanel/edittable/viewalarm/13',
            '定位模块报警',
            'loc_alarm' => '0'),
        'url3' => array(
             base_url() . 'adminpanel/edittable/viewalarm/14',
            '警戒模块报警',
            'prohibit_alarm' => '0'),
        'url4' => array(
             base_url() . 'adminpanel/edittable/viewalarm/15',
            '进入模块报警',
            'enter_alarm' => '0'),
        'url5' => array(
             base_url() . 'adminpanel/edittable/viewalarm/16',
            '监控模块报警',
            'mon_alarm' => '0')
    ),
    'person_count' => array(
        'title' => '人数统计',
        'allregpeple' => array(
            '#',
            '在册人数',
            'prison_totalnumber' => '0'
        ),
        'lostpeople' => array(
            base_url() . 'adminpanel/people_info/lostpeople/',
            '失联人数',
            'prison_lostconnection' => '0'
        ),
        'outpeople' => array(
            base_url() . 'adminpanel/people_info/outpeople/',
            '外出人数',
            'prison_outer' => '0'
        ),
        'insidepeople' => array(
            base_url() . 'adminpanel/people_info/insidepeople/',
            '实到人数',
            'prison_avaliable' => '0'
        )
    )
);

$config['watch_status'] = array(
    '正常工作',
    '断线',
    '电量低',
    '外出'
);

$config['prisonerdetail_status'] = array(
    "释放",
    "在监"
);

/* End of file aci.php */
/* Location: ./application/config/aci.php */

<?php
return array(


    //在页面显示追踪信息
    "SHOW_PAGE_TRACE" => true,


    /* 数据库设置 */
    'DB_TYPE'           => 'MySQL', // 数据库类型
    'DB_HOST'           => 'localhost', // 服务器地址
    'DB_NAME'           => 'car_market', // 数据库名
    'DB_USER'           => 'root', // 用户名
    'DB_PWD'            => '123456', // 密码
    'DB_PORT'           => '3306', // 端口
    'DB_PREFIX'         => '', // 数据库表前缀
    'DB_PARAMS'         => array(), // 数据库连接参数
    'DB_DEBUG'          => TRUE, // 数据库调试模式 开启后可以记录SQL日志
    'DB_FIELDS_CACHE'   => true, // 启用字段缓存
    'DB_CHARSET'        => 'utf8', // 数据库编码默认采用utf8
    'PAGE_NUM'          => '2', //文件分页每显示数
    'NUM'               => '1',       //验证码个数
    'URL_CASE_INSENSITIVE' =>true,//URL访问不再区分大小写了

    'TMPL_PARSE_STRING' => array(
        '__IMAGES__'    => __ROOT__ . '/Public/',
        '__UPLOADS__'   => __ROOT__ . '/Public/Uploads/',
        '__JS__'        => __ROOT__ . '/Public/Js/',
        '__CSS__'       => __ROOT__ . '/Public/Css/',
        '__PLUGINS__'   => __ROOT__ . '/Public/Plugins/',
    ),


    define("CSS", __ROOT__ . "/Public/Css/"), //定义css路径
    define("JS", __ROOT__ . "/Public/Js/"), //定义js路径
    define("IMAGES", __ROOT__ . "/Public/IMAGES/"), //定义IMAGES路径
    define("PLUGINS", __ROOT__ . "/Public/Plugins/"), //定义插件路径

);
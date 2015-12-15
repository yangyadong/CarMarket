<?php
namespace Home\Model;

use Think\Model;

class UserInfoModel extends Model
{
    protected $trueTableName = 'user_info';
    protected $_validate = array(
        array('email', '', '帐号名称已经存在！', 0, 'unique', 1), // 在新增的时候验证username字段是否唯一
        array('email', 'email', '账户不合法', 3, regex),
        array('email', '/^\w{3,11}\@\w{2,4}\.\w{2,3}$/i', '账户名3~11位', 3, regex),
    );
    
    protected $_auto = array(
        array('status', '1'), // 新增的时候把status字段设置为1
        array('password', 'md5', 3, 'function'), //对password字段在新增和编辑的时候使md5函数处理
    );

}

?>
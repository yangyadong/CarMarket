<?php
namespace Admin\Model;
use Think\Model;
/**
 * 连接数据表administrator
 * 登录验证
 */
class UserInfoModel extends Model{

    /**
     * 登录验证
     * 根据工号及密码查找验证
     */
    public function yz_login($job_num, $password,$status){
        $User = M("administrator");
        $where['job_num'] = array('eq', $job_num);
        $where['password'] = array('eq', md5($password));
        $name_status = $User->where($where)->field('name,status')->find();
        if (empty($name_status)) {
            return '账户或密码错误';
        } else {
            if(empty($name_status['status'])){
                session('ad_name', $name_status['name']);
                session('job_num', $job_num);
            }else{
                return '该账号已被禁用';
            }
            if(!empty($status)){
                cookie('job_num',$job_num,3600*24);
                cookie('password',$password,3600*24);
            }else{
                cookie('job_num',null);
                cookie('password',null);
            }
            return 'ok';
        }
    }
}
?>
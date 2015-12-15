<?php
namespace Admin\Controller;
use Think\Controller;
/**
 * 登录(页面)
 * 登录验证
 * 注销登录
 * 验证码
 */
class UserController extends Controller{

    /**
     * 登录页面显示
     */
    public function login(){
        $job_num = cookie('job_num');
        $password = cookie('password');
        if(!(empty($job_num)||empty($password))){
            $this -> assign('automatic','yes');
        }
        $this->display();
    }

    /**
     * 获得前台传输的数据
     * 验证验证码
     * 验证账号密码(yz_login)
     */
    public function yz(){
        $verify = new \Think\Verify();
        if ($verify->check($_POST["verify"])) {
            $job_num = $_POST["name"];
            $password = $_POST["password"];
            $status = I('post.status');
            $user = D("UserInfo");
            $res = $user->yz_login($job_num, $password,$status);
            echo $res;
        } else {
            echo "验证码错误";
        }
    }

    /**
     * 注销登录
     * 清空session
     */
    public function logout(){
        session(null);
        S('nav',null);
        $this->redirect('login');
    }
    
    /**
     * 验证码设置
     */
    function verify(){
        $config = array(
            'useImgBg' => false,    // 使用背景图片
            'fontSize' => 15,       // 验证码字体大小(px)
            'useCurve' => false,    // 是否画混淆曲线
            'useNoise' => false,    // 是否添加杂点
            'imageH'   => 30,       // 验证码图片高度
            'imageW'   => 130,      // 验证码图片宽度
            'length'   => C('NUM'), // 验证码位数
            //字体样式有1.ttf   2.ttf   3.ttf   4.ttf   5.ttf   6.ttf  共六种
            'fontttf'  => '',       // 验证码字体，不设置随机获取
            'bg'       => array(243, 251, 254), // 背景颜色
            'reset'    => true,     // 验证成功后是否重置
        );
        $Verify = new \Think\Verify($config);
        $Verify->entry();
    }

    public function _empty(){
        echo "<img src='" . IMAGES . '404.gif' . "' style='margin:10% 28%;' />";
    }
}

?>
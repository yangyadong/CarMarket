<?php

namespace Home\Controller;

use Admin\Model;use Think\Controller;

header("Content-Type:text/html; charset=utf-8");

class UserController extends Controller
{

    public function login()
    {
        $email = $_POST["email"];
        if (!empty($_POST)) {
            $verify = new \Think\Verify();
            if ($verify->check($_POST["auth"])) { //判断验证结果
                $User = M("user_info");
                $email = $_POST["email"];
                $new = $User->getByemail($email); //查询用户是否存在
                if (!empty($new)) {
                    $map['email'] = $email;
                    $new = $User->field("password")->where($map)->find();
                    foreach ($new as $value) {
                        if ($value == md5($_POST['password'])) {
                            $_SESSION['name'] = $email;
                            $this->redirect("/Home/index/index");
                            break;
                        } else {
                            $this->assign('result', "密码或账户错误");
                            $this->display();
                            break;
                        }
                    }
                } else {
                    $this->assign('result', "账户不存在");
                    $this->display();
                }
            } else {
                $this->assign('result', "验证码错误");
                $this->display();
            }
        } else {
            $this->display();
        }

    }

    function register()
    {
        // 	if(!empty($_POST)){
        // 		$User = M("user_info");
        // 		$email = $_POST["email"];
        // 		if(empty($email)||empty($_POST["password"])){
        // 			$this->assign("result","密码或账号为空");
        // 			$this->display();
        // 		}else{
        // $new = $User -> getByemail($email);					//查询用户是否存在
        // if(empty($new)){
        //   		if($_POST["password"]==$_POST["password1"]){
        //   			$User -> create();
        //   			$result = $User->add();
        //   			if($result){
        // 			$this->success('注册成功','login',3);
        // 		}else{
        // 			$this->error('注册失败','register',3);
        // 		};
        //   		}else{
        //   			$this->assign('result',"密码不一致");
        //   			$this -> display();
        //   		}
        //   	}else{
        //   		$this->assign('result',"账户已存在");
        //   		$this -> display();
        //   	}
        //   }
        // 	}else{
        // $user = D('UserInfo');
        //   	$data = $user->create();
        // if (!empty($data)) {
        // 	$res = $user -> reg($email,$pwd);
        // 	echo $res;
        // }
        $this->display();
        // }
    }

    public function save()
    {
        $user = D('UserInfo');
        $data = $user->create();
        if ($data == false) {
            $error = $user->getError();
            $this->ajaxReturn($error);
        } else {
            $user->add();
            $this->ajaxReturn('yes');
        }
    }

    //注销方法
    public function logout()
    {
        session(null);
        $this->redirect("login");
    }

    function verify()
    {
        $config = array(
            'useImgBg' => false, // 使用背景图片
            'fontSize' => 15, // 验证码字体大小(px)
            'useCurve' => false, // 是否画混淆曲线
            'useNoise' => false, // 是否添加杂点
            'imageH' => 30, // 验证码图片高度
            'imageW' => 130, // 验证码图片宽度
            'length' => 1, // 验证码位数
            //字体样式有1.ttf   2.ttf   3.ttf   4.ttf   5.ttf   6.ttf  共六种
            'fontttf' => '', // 验证码字体，不设置随机获取
            'bg' => array(243, 251, 254), // 背景颜色
            'reset' => true, // 验证成功后是否重置
        );
        $Verify = new \Think\Verify($config);
        $Verify->entry();


    }

    public function show404()
    {

        $this->display();

    }

    public function _empty()
    { //用来设置空操作(方法)提示信息
        // echo "<img src='".IMAGES.'404.gif'."' style='margin:10% 28%;' />";
        $this->display("show404");
    }

}

?>
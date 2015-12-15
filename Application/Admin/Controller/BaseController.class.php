<?php
namespace Admin\Controller;
use Think\Controller;
use Admin\Model;
/**
 * 主控制器
 * 判断是否登录
 * 导航根据工号显示
 */
class BaseController extends Controller{

    function _initialize(){
        /**
         * 判断是否登录
         * 若无则跳到登录页面
         */
        if (!session('?ad_name')) {
            $this->redirect("/Admin/User/login");
        } else {
            $ad_name = session('ad_name');
            $this->assign("adname_log", $ad_name);
        }
        /**
         * 导航
         * 根据工号获取数据库中的权限(调用competence)
         * 将权限数据编译(tran方法)
         */
        if (session('?job_num')) {
            $job_num = session('job_num');
            $competence = D("Competence");
            $compe = $competence->competence($job_num);
            $comp = $this->tran($compe);
            $this->assign("comp", $comp);
        } else {
            $this->redirect("/Admin/User/login");
        }
    }
    
    /**
     *编译权限数据
     *编译为二维数组形式并返回
     */
    public function tran($data){
        foreach ($data as $value) {
            $competence = explode(",", $value["competence"]);
            $a = 0;
            $b = 0;
            $c = 0;
            $d = 0;
            $e = 0;
            for ($i = 0; $i < 15; $i++) {
                $competence[$i] = explode("-", $competence[$i]);
                switch ($competence[$i][0]) {
                    case 1:
                        $a++;
                        $comp[1][$a] = $competence[$i][1];
                        break;
                    case 2:
                        $b++;
                        $comp[2][$b] = $competence[$i][1];
                        break;
                    case 3:
                        $c++;
                        $comp[3][$c] = $competence[$i][1];
                        break;
                    case 4:
                        $d++;
                        $comp[4][$d] = $competence[$i][1];
                        break;
                    case 5:
                        $e++;
                        $comp[5][$e] = $competence[$i][1];
                        break;
                }
            }
        }
        return $comp;
    }
    
    /**
     * 空方法
     * 访问不存在方法显示404图片
     */
    public function _empty()
    {
        echo "<img src='" . IMAGES . '404.gif' . "' style='margin:10% 28%;' />";
    }
}

?>
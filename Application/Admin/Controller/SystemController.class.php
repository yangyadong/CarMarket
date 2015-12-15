<?php
namespace Admin\Controller;
use Think\Controller;
/**
 * 职员管理(页面)
 * 权限分配(页面)
 * 已有权限选中
 * 职员添加或权限修改
 */
class SystemController extends BaseController{

    /**
     * 职员管理(页面)
     * 职员分页显示或禁用\开启(show_staff)
     */
    function staff(){
        $this->assign('title', '职员管理');
        $com = D('competence');
        $res = $com -> show_staff();
        $this->assign("position", $res[0]);
        $this->assign("show_page", $res[1]);
        $this->assign("per",$res[2]);
        $this->assign('num',C('PAGE_NUM'));
        $job_num = I("post.job_num");
        $status = intval(I("post.status"));
        if (!(empty($job_num))) {
            $res = $com->show_staff($job_num,$status);
            if (!empty($res)) {
                echo "ok";
                exit;
            } else {
                echo "false";
                exit;
            }
        } else {
           if(!empty($_GET["p"])){
                $this -> ajaxReturn($res);
            }else{
                $this->display();             
            }
        }
    }
    
    /**
     * 权限管理(页面)
     * 权限修改(已有权限选中trun_on)
     * 职员添加
     */
    function jurisdiction(){
        $this->assign('title', '权限分配');
        if (!(empty($_GET["name"]) || empty($_GET["job_num"]))) {
            $name = I('get.name');
            $job_num = I('get.job_num');
            $this->assign('job_num', $job_num);
            $this->assign("name", $name);
            $find = D("Competence");
            $res = $find->competence($job_num);
            $tran = $this->tran($res);
            $this->trun_on($tran);
        }
        $this->display();
    }

    /**
     * 已有权限选中(对应复选框赋值)
     */
    public function trun_on($data){
        foreach ($data as $key => $value) {
            switch ($key) {
                case 1:
                    $this->assign("goods", "goods");
                    foreach ($value as $val) {
                        switch ($val) {
                            case "1":
                                $this->assign("upload", "upload");
                                break;
                            case "2":
                                $this->assign("sold", "sold");
                                break;
                            case "3":
                                $this->assign("alter", "alter");
                                break;
                        }
                    }
                    break;
                case 2:
                    $this->assign("market1", "market1");
                    foreach ($value as $val) {
                        switch ($val) {
                            case "1":
                                $this->assign("plan", "plan");
                                break;
                            case "2":
                                $this->assign("market", "market");
                                break;
                            case "3":
                                $this->assign("profit", "profit");
                                break;
                        }
                    }
                    break;
                case 3:
                    $this->assign("Glad", "Glad");
                    foreach ($value as $val) {
                        switch ($val) {
                            case "1":
                                $this->assign("time", "time");
                                break;
                            case "2":
                                $this->assign("activity", "activity");
                                break;
                            case "3":
                                $this->assign("type", "type");
                                break;
                        }
                    }
                    break;
                case 4:
                    $this->assign("afertSale", "afertSale");
                    foreach ($value as $val) {
                        switch ($val) {
                            case "1":
                                $this->assign("client", "client");
                                break;
                            case "2":
                                $this->assign("maintain", "maintain");
                                break;
                            case "3":
                                $this->assign("statistics", "statistics");
                                break;
                        }
                    }
                    break;
                case 5:
                    $this->assign('systems', 'systems');
                    foreach ($value as $val) {
                        switch ($val) {
                            case "1":
                                $this->assign("staff", "staff");
                                break;
                            case "2":
                                $this->assign("jurisdiction", "jurisdiction");
                                break;
                        }
                    }
                    break;
            }
        }
    }

    /**
     * 职员添加或权限修改
     */
    public function add_save(){
        $com_data = I('post.id');
        $name = I('name');
        $position = I('position');
        $job_num = I('num');
        $add_save = D('Competence');
        $res = $add_save->find($name, $position, $com_data, $job_num);
        $this->ajaxReturn($res);
    }
}

?>
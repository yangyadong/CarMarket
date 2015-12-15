<?php
namespace Home\Controller;

use Home\Model;
use Think\Controller;

header("Content-Type:text/html; charset=utf-8");

class IndexController extends Controller
{


    //缓存
    // public function hc(){
    //     $Show = M("show_car");
    //     $db_baoma = $Show -> where("effect='宝马'")->limit(5)->order('id desc')->select();
    //     S('S_baoma',$db_baoma,10);
    //     $db_benchi = $Show -> where("effect='奔驰'")->limit(5)->order('id desc')->select();
    //     S('S_benchi',$db_benchi,10);
    //     $db_laoshilaishi = $Show -> where("effect='劳斯莱斯'")->limit(5)->order('id desc')->select();
    //     S('S_laoshilaishi',$db_laoshilaishi,10);
    // }

    //主页
    public function index()
    {


        $Homeshow = A("Home/Homeshow");
        $result = $Homeshow->show();
        //       $Show = M("show_car");
        //       $show_img = $Show -> Field("id,image")->where("effect='showList'")->select();
        //       $baoma = S("S_baoma");
        //       $benchi = S("S_benchi");
        // $laoshilaishi = S("S_laoshilaishi");
        $this->assign('show_img', $result["show_img"]);
        $this->assign('baoma', $result["baoma"]);
        $this->assign('benchi', $result["benchi"]);
        $this->assign('laoshilaishi', $result["laoshilaishi"]);
        if (empty($_SESSION["name"])) {
            $this->assign('user_login', "登录");
        } else {
            $this->assign('user_login', $_SESSION['name']);
        }
        $this->display();

    }


    //尾部
    public function stern()
    {
        $this->display();
    }


    //查找
    public function find()
    {
        if (empty($_SESSION["name"])) {
            $this->assign('user_login', "登录");
        } else {
            $this->assign('user_login', $_SESSION['name']);
        }
        $type = I('type');
        $find = I('name');
        $num1 = I('name1');
        $num2 = I('name2');
        $Find = A("Home/Find");
        // $Car = M("show_car");
        if ($type == "type") {
            if (!empty($find)) {
                // $info = $Car -> where("type like '%$find%'")->order('id desc')->select();
                $criteria = "type like '%$find%'";
            }
        } else if ($type == "effect") {
            if (!empty($find)) {
                // $info = $Car -> where("effect like '%$find%'")->order('id desc')->select();
                $criteria = "effect like '%$find%'";
            }
        } else if ($type == "price") {
            if (!empty($num1)) {
                // $info = $Car -> where()->order('id desc')->select();
                $criteria = "price>'$num1'";
            }
            if (!empty($num2)) {
                // $info = $Car -> where()->order('id desc')->select();
                $criteria = "price<'$num2'";
            }
            if (!empty($num1) && !empty($num2)) {
                // $info = $Car -> where()->order('id desc')->select();
                $criteria = "price>'$num1'&&price<'$num2'";
            }
        } else {
            if (!empty($num1)) {
                // $info = $Car -> where()->order('id desc')->select();
                $criteria = "car_num>'$num1'";
            }
            if (!empty($num2)) {
                // $info = $Car -> where()->order('id desc')->select();
                $criteria = "car_num<'$num2'";
            }
            if (!empty($num1) && !empty($num2)) {
                // $info = $Car->where()->order('id desc')->select();
                $criteria = "car_num>'$num1'&&car_num<'$num2'";
            }
        }
        if (!empty($criteria)) {
            $info = $Find->find($criteria);
        }
        if (!empty($info)) {
            $this->assign('info', $info);
        } else {
            $this->assign('result', '搜索结果无');
        }
        $this->display();
    }


    //详细信息
    public function info()
    {
        $id = I("id");
        $effect = I("effect");
        $type = I("type");
        if ($effect == "宝马") {
            $baoma_info = S("S_baomaAll");
            $S_baomaAll = "S_baomaAll";
            $result = $this->info_all($baoma_info, $S_baomaAll, $type, $effect);
        } else if ($effect == "奔驰") {
            $benchi_info = S("S_benchiAll");
            $S_benchiAll = "S_benchiAll";
            $result = $this->info_all($benchi_info, $S_benchiAll, $type, $effect);
        } else {
            $laoshilaish_info = S("S_laoshilaishiAll");
            $S_laoshilaishiAll = "S_laoshilaishiAll";
            $result = $this->info_all($laoshilaish_info, $S_laoshilaishiAll, $type, $effect);
        }
        $comShow = new \Home\Model\CommentModel();
        $res_show = $comShow->com_show($type);
        if (!empty($res_show)) {
            $this->assign('comShow', $res_show);

        } else {
            $this->assign('comShow', "尚无任何评价");
        }
        $this->assign('name', $_SESSION["name"]);
        $this->assign('info', $result);
        $this->display();
    }


    //匹配信息
    public function info_all($date1, $date2, $date3, $date4)
    {
        if (!empty($date1)) {
            $res = true;
            foreach ($date1 as $value) {
                if ($date3 == $value["type"]) {
                    return $value;
                    $res = false;
                    break;
                }
            }
            if ($res) {
                $Car = M("show_car");
                $car_info = $Car->where("effect='$date4'")->order('id desc')->select();
                S($date2, $car_info, 10);
                $date1 = S($date2);
                foreach ($date1 as $value) {
                    if ($date3 == $value["type"]) {
                        return $value;
                        break;
                    }
                }
            }
        } else {
            $Car = M("show_car");
            $car_info = $Car->where("effect='$date4'")->order('id desc')->select();
            S($date2, $car_info, 10);
            $date1 = S($date2);
            foreach ($date1 as $value) {
                if ($date3 == $value['type']) {
                    return $value;
                    break;
                }
            }
        }
    }

    //用户购买方法
    public function buy()
    {
        if ($_SESSION["name"]) {
            $num = (int)I("num");
            $car_num = (int)I("car_num");
            $id = I("id");
            $buy_car = M("show_car");
            $car_num = $car_num + $num;
            $data['car_num'] = $car_num;
            $res_save = $buy_car->where("id = '$id'")->save($data);
            if ($res_save != 0) {
                $this->success("购买成功");
            } else {
                $this->error("购买失败");
            }
        } else {
            $this->redirect("/Home/user/login");
        }
    }


    //用户评论方法
    public function comment()
    {
        $comment = I("comment");
        $car_type = I("type");
        if (!empty($comment)) {
            if ($_SESSION["name"]) {
                $com = new \Home\Model\CommentModel();
                $res_com = $com->comModel($comment, $car_type);
                if ($res_com > 1) {
                    //返回上一页
                    $this->success('感谢你的评价', 'javascript:history.go(-1)');
                } else {
                    $this->error('评价失败', 'javascript:history.go(-1)');
                }
            } else {
                $this->redirect("/Home/user/login");
            }
        } else {
            $this->error('请输入评价信息', 'javascript:history.go(-1)');
        }
    }

    //删除评论方法
    public function delete()
    {
        $id = I("delete");
        $com = M("comment");
        $res_delete = $com->where("id='$id'")->delete();
        if ($res_delete != 0) {
            $this->success('删除成功', 'javascript:history.go(-1)');
        }
    }

    //用来设置空操作(方法)提示信息
    public function _empty()
    {

        echo "<img src='" . IMAGES . '404.gif' . "' style='margin:10% 28%;'/>";

    }

}
<?php
namespace Admin\Controller;
use Think\Controller;
/**
 * 上传
 * 下架
 * 修改
 */
class GoodsController extends BaseController{

    /**
     * 上传(页面)
     * 上传设置
     */
    public function upload(){
        $this->assign("title", '上传物品');
        if (!empty($_FILES)) {
            $upload = new \Think\Upload();
            $upload->maxSize = 3145728;
            $upload->exts = array('jpg', 'gif', 'png', 'jpeg');
            $upload->rootPath = './Public/Uploads/';
            $info = $upload->upload();
            if (!$info) {
                $this->error($upload->getError());
            } else {
                foreach ($info as $file) {
                    $data["image"] = "Uploads/" . $file['savepath'] . $file['savename'];
                }
                $data["effect"] = I("post.effect");
                $data["type"] = I("post.type");
                $data["intro"] = I("post.intro");
                $data["price"] = I("post.price");
                $upload = M("show_car");
                $result = $upload->add($data);
                if (!empty($result)) {
                    $this->assign("result", "上传成功");
                    
                } else {
                    $this->assign("result", "上传失败");
                }
                $this->display();
            }
        } else {
            $this->display();
        }
    }
    
    /**
     * 下架物品(页面)
     * @author 下架(根据id)
     */
    public function sold(){
        $this->assign('title', '下架物品');
        $id = I("post.id");
        if (empty($id)) {
            $car = D("ShowCar");
            $new = $car->show_car();
            $this->assign('show_car', $new[0]);
            $this->assign('show_page', $new[1]);
            $this->assign('num',C('PAGE_NUM'));
            if(!empty($_GET["p"])){
                $this -> ajaxReturn($new);
            }else{
                $this->display();             
            }
        } else {
            $sold = M("show_car");
            $where['id'] = $id;
            $map['status'] = 1;
            $result = $sold->where($where)->save($map);
            if (empty($result)) {
                echo 'false';
            } else {
                echo 'ok';
            }
        }
    }
    
    /**
     * 修改物品(页面)
     * 修改信息
     */
    public function alter(){
        $this->assign('title', '修改物品');
        $id = I('post.id');
        if (empty($id)) {
            $car = D("ShowCar");
            $new = $car->show_car();
            $this->assign('show_car', $new[0]);
            $this->assign('show_page', $new[1]);
            $this->assign('num',C('PAGE_NUM'));
            if(!empty($_GET["p"])){
                $this -> ajaxReturn($new);
            }else{
                $this->display();             
            }
        } else {
            $alter = M("show_car");
            $data["effect"] = I('post.effect');
            $data["type"] = I('post.type');
            $data["price"] = I('post.price');
            $data["intro"] = I('post.intro');
            $result = $alter->where("id=$id")->save($data);
            if (empty($result)) {
                echo 'false';
            } else {
                echo 'ok';
            }
        }
    }

    /**
     *物品分页展示
     */
    public function plan(){
        $this->assign("title", "物品展示");
        $car = D("ShowCar");
        $new = $car->show_car();
        $this->assign('show_car', $new[0]);
        $this->assign('show_page', $new[1]);
        $this->assign('num',C('PAGE_NUM'));
        if(!empty($_GET["p"])){
            $this -> ajaxReturn($new);
        }else{
            $this->display();
        }
    }

    /**
     *物品恢复上架
     */
    public function market(){
        $this->assign("title", "物品恢复");
        $id = I('post.id');
        $market = 'market';
       if (empty($id)) {
            $car = D("ShowCar");
            $new = $car->show_car($market);
            $this->assign('show_car', $new[0]);
            $this->assign('show_page', $new[1]);
            $this->assign('num',C('PAGE_NUM'));
            if(!empty($_GET["p"])){
                $this -> ajaxReturn($new);
            }else{
                $this->display();
            }
        }else{
            $sold = M("show_car");
            $where['id'] = $id;
            $map['status'] = 0;
            $result = $sold->where($where)->save($map);
            if (empty($result)) {
                echo 'false';
            } else {
                echo 'ok';
            }
        }
    }

    /**
     *物品按品牌分类显示
     */
    public function profit(){
        $this->assign("title", "物品统计");
        $car = D("ShowCar");
        $new = $car->type();
        $this->assign('show_car', $new[0]);
        $this->assign('show_page', $new[1]);
        $this->assign('num',C('PAGE_NUM'));
        if(!empty($_GET["p"])){
            $this -> ajaxReturn($new);
        }else{
            $this->display();
        }
    }

    public function time(){

        $this->display();
    }
}

?>
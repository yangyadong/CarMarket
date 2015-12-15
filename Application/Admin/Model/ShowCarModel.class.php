<?php
namespace Admin\Model;
use Think\Model;
/**
 * 产品数据表show_car
 * 产品展示
 */
class ShowCarModel extends Model{

    /**
     * 产品(分页)展示
    */
    public function show_car($sold_add){
        $car = M("show_car");
        $where['id'] = array('gt',5);
        
        //判断上架还是下架
        if(empty($sold_add)){
            $where['status'] = array('eq',0);
        }else{
            $where['status'] = array('eq',1);
        }

        $total = $car->where($where)->count();
        $per = C('PAGE_NUM');
        $Page = new  \Think\Page($total, $per);
        $Page->setConfig('last','尾页');//最后一页显示"尾页"
        $show = $Page->show();
        $info = $car -> where($where) -> limit($Page->firstRow.','.$Page->listRows) -> order('id desc')->select();
        return array($info, $show);
    }
    
    /**
     *分类查找数据
     */
    public function type(){
        $car = M("show_car");
        $where['id'] = array('gt',5);
        $total = $car->where($where)->group("effect")->count();
        $per = C('PAGE_NUM');
        $Page = new  \Think\Page($total, $per);
        $Page->setConfig('last','尾页');//最后一页显示"尾页"
        $show = $Page->show();
        $info = $car 
                ->where($where)
                -> field("sum(car_num),count(type),effect")
                ->group("effect")
                ->limit($Page->firstRow.','.$Page->listRows)
                -> select();
        return array($info, $show);
    }
}

?>
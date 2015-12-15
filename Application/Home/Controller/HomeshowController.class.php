<?php
namespace Home\Controller;

use Think\Controller;

class HomeshowController extends Controller
{
    public function show()
    {
        $this->hc();
        $Show = M("show_car");
        $show_img = $Show->Field("id,image")->where("effect='showList'")->select();
        $baoma = S("S_baoma");
        $benchi = S("S_benchi");
        $laoshilaishi = S("S_laoshilaishi");
        return array('show_img' => $show_img, 'baoma' => $baoma, 'benchi' => $benchi, 'laoshilaishi' => $laoshilaishi);
    }

    //缓存
    public function hc()
    {
        $Show = M("show_car");
        $db_baoma = $Show->where("effect='宝马'")->limit(5)->order('id desc')->select();
        S('S_baoma', $db_baoma, 10);
        $db_benchi = $Show->where("effect='奔驰'")->limit(5)->order('id desc')->select();
        S('S_benchi', $db_benchi, 10);
        $db_laoshilaishi = $Show->where("effect='劳斯莱斯'")->limit(5)->order('id desc')->select();
        S('S_laoshilaishi', $db_laoshilaishi, 10);
    }
}

?>
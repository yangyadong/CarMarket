<?php

/*---------控制器不存在的信息提醒设置---------*/

namespace Home\Controller; //Home分组
use Think\Controller;

class EmptyController extends Controller
{
    function _empty()
    {
        echo "<img src='" . IMAGES . '404.gif' . "' style='margin:10% 28%;'/>";
    }
}

?>
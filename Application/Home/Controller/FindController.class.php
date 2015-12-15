<?php
namespace Home\Controller;

use Think\Controller;

class FindController extends Controller
{
    public function find($data)
    {
        $Car = M("show_car");
        $info = $Car->where("$data")->order('id desc')->select();
        return $info;
    }
}

?>
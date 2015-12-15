<?php
namespace Admin\Controller;
use Think\Controller;
/**
 * 首页
 */
class IndexController extends BaseController{

    /**
     * 首页
     */
    public function index(){
        $this->assign("title", "后台");
        $this->display();
    }
}
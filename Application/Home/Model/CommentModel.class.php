<?php
namespace Home\Model;

use Think\Model;

class CommentModel extends Model
{
    public function comModel($data1, $data2)
    {
        $com = M("comment");
        $data["pre"] = $_SESSION['name'];
        $data["comment"] = $data1;
        $data["car"] = $data2;
        $time = time();
        $data["time"] = $time;
        $res = $com->add($data);
        return $res;
    }

    public function com_show($data)
    {
        $com_show = M("comment");
        $res_show = $com_show->where("car='$data'")->order('id desc')->select();
        return $res_show;
    }
}

?>
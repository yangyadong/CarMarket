<?php
namespace Admin\Model;
use Think\Model;
/**
 *competence数据表的数据处理
 * 获取权限
 * 职员分页显示及删除
 * 职员添加或权限修改
 */
class CompetenceModel extends Model{
    
    /**
     * 根据工号获得权限并返回结果
    */
    function competence($job_num){
        /**
         *判断是否有缓存
         *缓存不为空则返回值
         */
        if(empty($job_num)){        // 判断是否为按工号查权限
            $result = S('nav');
            if(!empty($result)){
                return $result;
            }
        }

        $position = M("competence");
        $where['job_num'] = array('eq' ,$job_num);
        $result = $position->field("competence")->where($where)->select();
        S('nav',$result);           //将权限缓存起来
        return $result;
    }

    /**
     * 职员分页返回结果及删除
     */
    public function show_staff($data,$data1){
        if (empty($data)) {
            $staff = M("administrator");
            $total = $staff->count();
            $per = C('PAGE_NUM');
            $Page = new  \Think\Page($total, $per);
            $Page->setConfig('last','末页');//最后一页显示"末页"
            $show = $Page->show();
            $position = $staff -> limit($Page->firstRow.','.$Page->listRows)->select();
            return array($position,$show,$per);
        } else {
            $where['job_num'] = $data;
            if($data1 == 0){
                $map['status'] = 1;
            }else{
                $map['status'] = 0;
            }
            $res = M('administrator')->where($where)->save($map);
            return $res;
        }
    }

    /**
     * 职员添加或修改权限
     */
    public function find($data, $data1, $data2, $data3){
        $add = M("administrator");
        $add1 = M("competence");
        $add_data['name'] = $data;
        $add_data['position'] = $data1;
        if (empty($data3)) {
            $job_number = $add_data['job_num'] = time();
            $res = $add->add($add_data);
            $add_data['competence'] = $data2;
            $res1 = $add1->add($add_data);
            if (!empty($res) && !empty($res1)) {
                return $job_number;
            } else {
                return 'false';
            }
        } else {
            $res = $add->where("job_num='$data3'")->save($add_data);
            $add_data['competence'] = $data2;
            $res1 = $add1->where("job_num='$data3'")->save($add_data);
            if (!empty($res) && !empty($res1)) {
                return 'save';
            } else {
                return 'false';
            }
        }
    }
}
?>
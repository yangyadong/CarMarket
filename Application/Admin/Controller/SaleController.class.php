<?php
	namespace Admin\Controller;
	use Admin\Controller;
	/**
	* 
	*/
	class SaleController extends BaseController{
		/**
		 *添加新职位
		 *修改职位权限
		 */
		function client(){
			$this -> assign("title","职位管理");
			$competence_new = M("competence_new");
			//判断是否为添加或修改操作
			if($competence_new -> create() != ''){
				//判断是否为修改操作
				$PostPosition = I("post.position");
				$resturn = $competence_new -> where("position='$PostPosition'") -> count();
				if(!empty($resturn)){
					//修改权限
					$map["competence"] = I("post.competence");
					$res = $competence_new -> where("position='$PostPosition'") -> save($map);
					if(empty($res)){
						$this -> ajaxReturn("false");
					}else{
						$this -> ajaxReturn("save");
					}
				}else{
					//添加新职位
					$res = $competence_new -> add();
					if(empty($res)){
						$this -> ajaxReturn("false");
					}else{
						$this -> ajaxReturn("add");
					}
				}				
			}else{
				$this -> display();
			}
		}
		/**
		 *添加新员工
		 */
		function maintain(){
			$this -> assign("title","添加员工");
			$position = M("competence_new");
			$position_info = $position->field("id,position")->select();
			$this->assign('position',$position_info);
			//判断是否为添加操作
			$position_or = D("CompetenceNew");
			if ($position_or -> create()){    
				$res = $position_or->add();
				if (!empty($res)) {
					$job_num = S('job_num');
					$this -> ajaxReturn($job_num);
				}else{
					$this -> ajaxReturn('false');
				}
			}
			$this->display();
		}
		/**
		 *员工列表
		 */
		function statistics(){
			$this -> assign("title","员工列表");
			$info = M("administrator_new")
			-> join('competence_new on administrator_new.position=competence_new.id')
			-> field("administrator_new.name,administrator_new.job_num,competence_new.position,competence_new.competence")
			-> select();
			$this -> assign("per",$info);
			$this -> display();
		}
	}
?>
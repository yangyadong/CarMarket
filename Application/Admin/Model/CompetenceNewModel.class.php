<?php
	namespace Admin\Model;
	use Think\Model;
	/**
	* 自动添加新员工
	*/
	class CompetenceNewModel extends Model{
		protected $trueTableName = 'administrator_new';
	    protected $_auto = array(
	        array('status', '0'), 
	        array('job_num','job_num',1,'callback'), 
	    );
	    public function job_num(){
	    	$job_num = time();
	    	S('job_num',$job_num);
	    	return $job_num;
	    }
	}
?>
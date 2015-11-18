<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Manage extends Admin_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->load->model(array('Times_model'));
	}

	function cache(){
		$this->reload_all_cache();
		$this->showmessage('全局缓存成功');
	}

	function go($id=0){
		if($id==0) 
			exit();
// 		if(isset($this->current_role_priv_arr[$id])){

			$arr = $this->cache_module_menu_arr[$id];
			if(!isset($arr))
				exit();
			$arr_parentid = explode(",",$arr['arr_parentid']);

			if(count($arr_parentid)>2) 
				redirect( base_url($arr['folder'].'/'.$arr['controller'].'/'.$arr['method']));
			else{
				foreach($this->cache_module_menu_arr as $k=>$v){
					if($v['parent_id']==$id){
						if(isset($this->current_role_priv_arr[$v['menu_id']])){
							redirect(base_url($v['folder'].'/'.$v['controller'].'/'.$v['method']));
							break;
						}
					}
				}
			}
// 		}
// 		exit();
	}
	
	function index($startnum='0')
	{
// 		$data = $this->Prisonerinfo_model->getall();
		if (isset($_GET['keyword'])){
			$keyword=$_GET['keyword'];
			$data = $this->Prisonerinfo_model->getfromkeyword($keyword);
		}
		else
			$data = $this->Prisonerinfo_model->getfromview($startnum, 20);
		
		$this->load->library('table');
		$template = array(
			'table_open' => '<table class="table table-hover dataTable">'
		);
		$this->table->set_template($template);
		$this->table->set_heading('编号','姓名', '操作','部门号码', '腕带编号', '腕带状态', '更新时间', '详情', '活动轨迹');
		
		$data_t = array();
		foreach ($data->result_array() as $k => $v){
			if ($v['status'] == '1')
				$btn_out = '<a class="btn btn-info btn-sm" href="'.base_url().'adminpanel/manage/leave/'.$v['people_id'].'" role="button">返回</a>';
			else 
				$btn_out = '<a class="btn btn-info btn-sm" href="'.base_url().'adminpanel/manage/leave/'.$v['people_id'].'" role="button">外出</a>';
				
			$temp = array(
					$v['people_id'],
					$v['people_name'],
					$btn_out,
					$v['dep_id'],
					$v['watch_id'],
					$this->config->item('watch_status')[$v['watch_status']],
					$v['update_timestamp'],
					'<a class="btn btn-info btn-sm" href="'.base_url().'adminpanel/manage/detailinfo/'.$v['people_id'].'" role="button">详情</a>',
					'<a class="btn btn-info btn-sm" href="'.base_url().'adminpanel/manage/trace/'.$v['people_id'].'" role="button">活动轨迹</a>'
			);
			array_push($data_t, $temp);
		}
			
		$table_data = $this->table->generate($data_t);
		
		//create pageination
		$this->load->library('pagination');
		
		$pconfig['base_url'] = base_url().'adminpanel/manage/index';
		$pconfig['total_rows'] = $data->num_rows();
		$pconfig['per_page'] = 20;
		
		$this->pagination->initialize($pconfig);
		
		$pageslink = $this->pagination->create_links();
		
		$this->view('index', array(
				'require_js'=>true, 
				'table_data'=>$table_data,
				'pagelink' =>$pageslink
				)
		);
		
	}
	
	public function detailinfo($id='0'){
		
		$this->load->model('Prisonerdetailinfo_model');
		$data_i = $this->Prisonerdetailinfo_model->getbyid($id);
		
		if($data_i->num_rows()){
			$this->view('detail', array(
					'detail' => $data_i->result_array()[0])
					);
		}
		else
			$this->view('detail', array(
					'detail' => array(
							'Error' => 'Can not find the detial information about this people')
						)
					);
	}

	public function leave($id='0'){
		$this->Prisonerinout_model->togglestatusbyid($id);
// 		$this->load->helper('url'); already loaded
		redirect(base_url().'adminpanel/manage/index');
	}
	
	public function trace($id='0'){
		$this->view('leave');
	}
	
	public function controlpanel()
	{
		$this->view('controlpanel',array('require_js'=>true));
	}
	
	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('adminpanel'));
	}
	
	function login()
	{
		if(isset($_POST['username'])) {
			$username = isset($_POST['username']) ? trim($_POST['username']) : exit(json_encode(array('status'=>false,'tips'=>' 用户名不能为空')));
			if($username=="")
				exit(json_encode(array('status'=>false,'tips'=>' 用户名不能为空')));
			
			$this->load->model('Times_model');
			//密码错误剩余重试次数
			$rtime = $this->Times_model->get_one(array('username'=>$username,'is_admin'=>1));
			$maxloginfailedtimes = 500000;
			if($rtime)
			{
				if($rtime['failure_times'] > $maxloginfailedtimes) {
					$minute = 60-floor((SYS_TIME-$rtime['logintime'])/60);
					exit(json_encode(array('status'=>false,'tips'=>' 密码尝试次数过多，被锁定一个小时')));
				}
			}

			//查询帐号，默认组1为超级管理员
			$r = $this->Member_model->get_one(array('operator_user'=>$username));
			if(!$r) 
				exit(json_encode(array('status'=>false,'tips'=>' 用户名或密码不正确')));
			
// 			$password = md5(md5(trim($_POST['password']).$r['encrypt']));
			$password = trim($_POST['password']);
			
			$ip = $this->input->ip_address();
			if(isset($r['operator_pwd']) && $r['operator_pwd']!= $password) {
				if($rtime && $rtime['failure_times'] < $maxloginfailedtimes) {
					$times = $maxloginfailedtimes-intval($rtime['failure_times']);
					$this->Times_model->update(array('login_ip'=>$ip,'is_admin'=>1,'failure_times'=>' +1'),array('username'=>$username));
				} else {
					$this->Times_model->delete(array('username'=>$username,'is_admin'=>1));
					$this->Times_model->insert(array('username'=>$username,'login_ip'=>$ip,'is_admin'=>1,'login_time'=>SYS_TIME,'failure_times'=>1));
					$times = $maxloginfailedtimes;
				}

				exit(json_encode(array('status'=>false,'tips'=>' 密码错误您还有'.$times.'机会')));
			}

			$this->Times_model->delete(array('username'=>$username));
// 			if($r['is_lock'])
// 				exit(json_encode(array('status'=>false,'tips'=>' 您的帐号已被锁定，暂时无法登录')));

			$this->Member_model->update(array('last_login_ip'=>$ip,'last_login_time'=>SYS_TIME),array('operator_id'=>$r['operator_id']));
			$this->session->set_userdata('user_id',$r['operator_id']);
			$this->session->set_userdata('user_fullname',$r['operator_name']);
			$this->session->set_userdata('user_name',$username);
			$this->session->set_userdata('group_id',$r['operator_power']);

			exit(json_encode(array('status'=>true,'tips'=>' 登录成功','next_url'=>site_url($this->page_data['folder_name']))));

		}else {

			$this->admin_tpl('login',array('require_js'=>true));
		}
	}

	public function edittable($id = 0){
		
	}
}
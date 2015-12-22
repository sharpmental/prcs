<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Logging_info extends Admin_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->load->model("Logging_info_model");
	}
	
	function index($startnum='0')
	{
		if (isset($_GET['keyword'])){
			$keyword=$_GET['keyword'];
			$data = $this->Logging_info_model->getfromkeyword($keyword);
		}
		else
			$data = $this->Logging_info_model->getfromview($startnum, 20);
		
		$this->load->library('table');
		$template = array(
			'table_open' => '<table class="table table-hover dataTable">'
		);
		$this->table->set_template($template);
		$this->table->set_heading('日志编号','操作员编号', '操作员名称','操作员名称', '动作', '内容', 'IP地址', '登录时间', '登出时间', '更新时间');
		
		$table_data = $this->table->generate($data);
		
		//create pageination
		$this->load->library('pagination');
		
		$pconfig['base_url'] = base_url().'adminpanel/logging_info/index';
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
}
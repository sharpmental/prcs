<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Server_info extends Admin_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->load->model("Server_info_model");
	}
	
	function index($startnum='0')
	{
		if (isset($_GET['keyword'])){
			$keyword=$_GET['keyword'];
			$data = $this->Server_info_model->getfromkeyword($keyword);
		}
		else
			$data = $this->Server_info_model->getfromview($startnum, 20);
		
		$this->load->library('table');
		$template = array(
			'table_open' => '<table class="table table-hover dataTable">'
		);
		$this->table->set_template($template);
		$this->table->set_heading('服务器ID','服务器类型', '服务器名称','IP地址', '低电压次数', '定位间隔', '失位时间', '失联时间', '监控丢失时间', '更新时间');
		
		$table_data = $this->table->generate($data);
		
		//create pageination
		$this->load->library('pagination');
		
		$pconfig['base_url'] = base_url().'adminpanel/server_info/index';
		$pconfig['total_rows'] = $data->num_rows();
		$pconfig['per_page'] = 20;
		$pconfig['full_tag_open'] = '<ul class="pagination">';
		$pconfig['full_tag_close'] = '</ul>';
		$pconfig['first_tag_open'] = '<li>';
		$pconfig['first_tag_close'] = '</li>';
		$pconfig['last_tag_open'] = '<li>';
		$pconfig['last_tag_close'] = '</li>';
		$pconfig['next_tag_open'] = '<li>';
		$pconfig['next_tag_close'] = '</li>';
		$pconfig['prev_tag_open'] = '<li>';
		$pconfig['prev_tag_close'] = '</li>';
		$pconfig['cur_tag_open'] = '<li><a href="#" class="pagination">';
		$pconfig['cur_tag_close'] = '</a></li>';
		$pconfig['num_tag_open'] = '<li>';
		$pconfig['num_tag_close'] = '</li>';
		
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
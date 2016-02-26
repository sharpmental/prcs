<?php

if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class Logging_info extends Admin_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model("Logging_info_model");
    }

    function index($startnum = '0')
    {
        if (isset($_GET['keyword'])) {
            $keyword = $_GET['keyword'];
            $data = $this->Logging_info_model->getfromkeyword($keyword);
        } else
            $data = $this->Logging_info_model->getfromview($startnum, 2000);
        
        $this->load->library('table');
        $template = array(
            'table_open' => '<table class="table table-hover dataTable">'
        );
        $this->table->set_template($template);
        $this->table->set_heading('日志编号', '操作员编号', '操作员名称', '操作员名称', '动作', '内容', 'IP地址', '登录时间', '登出时间', '更新时间');
        
        $table_data = $this->table->generate($data);
        
        // create pageination
        $this->load->library('pagination');
        
        $pconfig['base_url'] = base_url() . 'adminpanel/logging_info/index';
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
            'require_js' => true,
            'table_data' => $table_data,
            'pagelink' => $pageslink
        ));
    }

    public function search()
    {
        if (isset($_GET['keyword']) && isset($_GET['startdate']) && isset($_GET['enddate'])) {
        
            $key = ($_GET['keyword']) ? $_GET['keyword'] : "%";
            $start = ($_GET['startdate']) ? $_GET['startdate'] : "1900-01-01";
            $end = ($_GET['enddate']) ? $_GET['enddate'] : SYS_DATE;
        
            $data = $this->Logging_info_model->getbyKeyandDate($key, $start, $end);
            $str = "search line is: key = ".$key.", startday = ".$start.", end = ".$end;
        } else {
            $data = $this->Logging_info_model->getfromview(0, 2000);
            $str = "default page";
        }
        
        
        $this->load->library('table');
        $template = array(
            'table_open' => '<table class="table table-hover dataTable">'
        );
        $this->table->set_template($template);
        $this->table->set_heading('日志编号', '操作员编号', '操作员名称', '操作员名称', '动作', '内容', 'IP地址', '登录时间', '登出时间', '更新时间');
        
        $table_data = $this->table->generate($data);
        
        // create pageination
        $this->load->library('pagination');
        
        $pconfig['base_url'] = base_url() . 'adminpanel/logging_info/search';
        $pconfig['total_rows'] = count($data);
        $pconfig['per_page'] = 20;
        
        $this->pagination->initialize($pconfig);
        
        $pageslink = $this->pagination->create_links();
        $this->view('search', array(
            'require_js' => true,
            'table_data' => $table_data,
            'pagelink' => $pageslink,
            'debug' => ""
        ));
    }
}
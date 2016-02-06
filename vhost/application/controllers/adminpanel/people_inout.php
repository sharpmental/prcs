<?php

if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class People_inout extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("People_inout_detail_model");
    }

    public function index()
    {
        $data = $this->People_inout_detail_model->getwithlimit(0, 2000);
        $this->load->library('table');
        $template = array(
            'table_open' => '<table class="table table-hover dataTable">'
        );
        $this->table->set_template($template);
        $this->table->set_heading('编号', '人员编号', '腕表编号', '区域号码', '返回时间', '离开时间', '备注', '状态', '更新时间');
        
        $table_data = $this->table->generate($data);
        
        // create pageination
        $this->load->library('pagination');
        
        $pconfig['base_url'] = base_url() . 'adminpanel/people_inout/index';
        $pconfig['total_rows'] = $data->num_rows();
        $pconfig['per_page'] = 20;
        
        $this->pagination->initialize($pconfig);
        
        $pageslink = $this->pagination->create_links();
        $this->view('index', array(
            'require_js' => true,
            'table_data' => $table_data,
            'pagelink' => $pageslink
        ));
    }
}

?>
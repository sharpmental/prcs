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
        if (isset($_GET['keyword']) && isset($_GET['startdate']) && isset($_GET['enddate'])) {
            
            $key = ($_GET['keyword']) ? $_GET['keyword'] : "%";
            $start = ($_GET['startdate']) ? $_GET['startdate'] : "1900-01-01";
            $end = ($_GET['enddate']) ? $_GET['enddate'] : SYS_DATE;
            
            $data = $this->People_inout_detail_model->getbyKeyandDate($key, $start, $end);
            $str = "search line is: key = ".$key.", startday = ".$start.", end = ".$end;
        } else {
            $data = $this->People_inout_detail_model->getwithlimit(0, 2000);
            $str = "default page";
        }
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
        $pconfig['total_rows'] = count($data);
        $pconfig['per_page'] = 20;
        $pconfig['attributes'] = array('class' => 'pagination');
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
            'pagelink' => $pageslink,
            'debug' => $str
        ));
    }
}

?>
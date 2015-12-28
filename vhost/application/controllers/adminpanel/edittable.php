<?php

if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class Edittable extends Admin_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Tablelist_model');
    }

    public function index()
    {
        $data = $this->Tablelist_model->getall();
        // create pageination
        $this->load->library('pagination');
        
        $pconfig['base_url'] = base_url() . 'adminpanel/edittable/index';
        $pconfig['total_rows'] = $data->num_rows();
        $pconfig['per_page'] = 20;
        
        $this->pagination->initialize($pconfig);
        
        $pageslink = $this->pagination->create_links();
        
        if (isset($data)) {
            $this->view('index', array(
                'require_js' => true,
                'table_data' => $data->result_array(),
                'pagelink' => $pageslink
            ));
        } else {
            $this->view('index', array(
                'require_js' => true,
                'table_data' => null,
                'pagelink' => null
            ));
        }
    }

    public function viewtable($id = '1', $start = '0')
    {
        $table_row = $this->Tablelist_model->getbyid($id);
        
        if (! isset($table_row))
            exit("Can not find the table. Check your database!");
        
        $table_name = $table_row->row_array()['table_name'];
        $table_actiona = ($table_row->row_array()['actionmodifyurl'] == '#') ? '#' : base_url($this->page_data['folder_name'] . '/' . $table_row->row_array()['actionmodifyurl'] . '/');
        $table_texta = $table_row->row_array()['actionmodifytext'];
        $table_actionb = ($table_row->row_array()['actiondeleteurl'] == '#') ? '#' : base_url($this->page_data['folder_name'] . '/' . $table_row->row_array()['actiondeleteurl'] . '/');
        $table_textb = $table_row->row_array()['actiondeletetext'];
        $table_actionc = ($table_row->row_array()['actionaddurl'] == '#') ? '#' : base_url($this->page_data['folder_name'] . '/' . $table_row->row_array()['actionaddurl'] . '/');
        $table_textc = $table_row->row_array()['actionaddtext'];
        
        $data = $this->Tablelist_model->gettablelimit($table_name, $start, 20);
        if (! isset($data)) {
            exit("Can not find the table." . $table_name . "Check your database!");
        }
        
        $this->load->library('table');
        $template = array(
            'table_open' => '<table class="table table-hover dataTable">'
        );
        $this->table->set_template($template);
        
        $fields = $data->list_fields();
        if (! isset($fields))
            exit("Can not get the table data from: " . $table_name . ". Check your database!");
        array_push($fields, '修改', '删除');
        $this->table->set_heading($fields);
        
        $data_t = array();
        //assume the 1st column data is the index of the table!!!
        if ($data->result_array()) {
            foreach ($data->result_array() as $k => $v) {
                array_push($v, '<a class="btn btn-info btn-sm" href="' . $table_actiona . '/' . $v[reset($fields)] . '" role="button">' . $table_texta . '</a>');
                if ($table_actionb == '#')
                    $href_delete = '#';
                else
                    $href_delete = sprintf("href=\"javascript:if(confirm('确定要删除吗')) window.location.href='%s';\"", $table_actionb . '/' . $v[reset($fields)]);
                array_push($v, '<a class="btn btn-info btn-sm" ' . $href_delete . ' role="button">' . $table_textb . '</a>');
                array_push($data_t, $v);
            }
        } else {
            array_push($data_t, array(
                "无对应数据."
            ));
        }
        
        $table_data = $this->table->generate($data_t);
        
        // create pageination
        $this->load->library('pagination');
        
        $pconfig['base_url'] = current_url();
        $pconfig['total_rows'] = $data->num_rows();
        $pconfig['per_page'] = 20;
        
        $this->pagination->initialize($pconfig);
        
        $pageslink = $this->pagination->create_links();
        
        $this->view('viewtable', array(
            'require_js' => true,
            'table_data' => $table_data,
            'pagelink' => $pageslink,
            'add_action' => $table_actionc,
            'table_name' => $table_name
        ));
    }

    public function viewalarm($id = '1')
    {
        $table_row = $this->Tablelist_model->getbyid($id);
        
        if (! isset($table_row))
            exit("Can not find the table. Check your database!");
        
        $table_name = $table_row->row_array()['table_name'];
        $table_actiona = ($table_row->row_array()['actionmodifyurl'] == '#') ? '#' : base_url($this->page_data['folder_name'] . '/' . $table_row->row_array()['actionmodifyurl'] . '/');
        $table_texta = $table_row->row_array()['actionmodifytext'];
        $table_actionb = ($table_row->row_array()['actiondeleteurl'] == '#') ? '#' : base_url($this->page_data['folder_name'] . '/' . $table_row->row_array()['actiondeleteurl'] . '/');
        $table_textb = $table_row->row_array()['actiondeletetext'];
        $table_actionc = ($table_row->row_array()['actionaddurl'] == '#') ? '#' : base_url($this->page_data['folder_name'] . '/' . $table_row->row_array()['actionaddurl'] . '/');
        $table_textc = $table_row->row_array()['actionaddtext'];
        
        if ($table_name == "tb_alarm_loc")
            $data = $this->Tablelist_model->gettablestatus($table_name, "alarm_type != 0");
        else 
            if ($table_name == "tb_alarm_general")
                $data = $this->Tablelist_model->gettablestatus($table_name, "alarm_state != 0 or watch_working_state != 0");
            else
                $data = $this->Tablelist_model->gettablestatus($table_name, "alarm_state != 0");
        
        if (! isset($data)) {
            exit("Can not find the table." . $table_name . "Check your database!");
        }
        
        $this->load->library('table');
        $template = array(
            'table_open' => '<table class="table table-hover dataTable">'
        );
        $this->table->set_template($template);
        
        $fields = $data->list_fields();
        if (! isset($fields))
            exit("Can not get the table data from: " . $table_name . ". Check your database!");
        array_push($fields, '修改', '删除');
        $this->table->set_heading($fields);
        
        $data_t = array();
        if ($data->result_array()) {
            foreach ($data->result_array() as $k => $v) {
                array_push($v, '<a class="btn btn-info btn-sm" href="' . $table_actiona . '/' . $v[reset($fields)] . '" role="button">' . $table_texta . '</a>');
                $href_delete = sprintf("href=\"javascript:if(confirm('确定要删除吗')) window.location.href='%s';\"", $table_actionb . '/' . $v[reset($fields)]);
                array_push($v, '<a class="btn btn-info btn-sm" ' . $href_delete . ' role="button">' . $table_textb . '</a>');
                array_push($data_t, $v);
            }
        } else {
            array_push($data_t, array(
                "无对应数据."
            ));
        }
        
        $table_data = $this->table->generate($data_t);
        
        // create pageination
        $this->load->library('pagination');
        
        $pconfig['base_url'] = current_url();
        $pconfig['total_rows'] = $data->num_rows();
        $pconfig['per_page'] = 20;
        
        $this->pagination->initialize($pconfig);
        
        $pageslink = $this->pagination->create_links();
        
        $this->view('viewtable', array(
            'require_js' => true,
            'table_data' => $table_data,
            'pagelink' => $pageslink,
            'add_action' => $table_actionc,
            'table_name' => $table_name
        ));
    }
}
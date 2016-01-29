<?php

if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class Showmap extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("Mapdraw_info_model");
        $this->load->model("Locarea_info_model");
    }

    public function index()
    {
        $data = $this->Mapdraw_info_model->select("level = 1");
        $div_list = array();
        
        if ($data) {
            foreach ($data as $k => $v) {
                array_push($div_list, $v);
            }
        }
        // get people count
        $this->view('index', array(
            'require_js' => true,
            'div_list' => $div_list
        ));
    }
}

?>
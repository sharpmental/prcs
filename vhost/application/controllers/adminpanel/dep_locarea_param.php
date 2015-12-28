<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class Dep_locarea_param extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("Dep_locarea_param_model");
    }

    public function add()
    {
        if ($this->input->is_ajax_request()) {
            
            $arr['locarea_id'] = "";
            if (isset($_POST['locarea_id']))
                $arr['locarea_id'] = $_POST['locarea_id'];
            
            if ($arr['locarea_id'] == '')
                exit(json_encode(array(
                    'status' => false,
                    'tips' => '信息新增失败, no ID'
                )));
            
            $arr['dep_id'] = isset($_POST['dep_id']) ? $_POST['dep_id'] : "";
            $arr['delay_ratio'] = isset($_POST['delay_ratio']) ? $_POST['delay_ratio'] : "";
            $arr['night_delay_ratio'] = isset($_POST['night_delay_ratio']) ? $_POST['night_delay_ratio'] : "";
            $arr['update_timestamp'] = date('Y-m-d H:i:s');
            
            $new_id = $this->Dep_locarea_param_model->insert($arr);
            if ($new_id) {
                exit(json_encode(array(
                    'status' => true,
                    'tips' => '信息新增成功',
                    'new_id' => $new_id
                )));
            } else {
                exit(json_encode(array(
                    'status' => false,
                    'tips' => '信息新增失败, DB failure',
                    'new_id' => 0
                )));
            }
        } else {
            $this->load->model('Department_info_model');
            $dep_list = $this->Department_info_model->getlist();
            
            $this->load->model('Locarea_info_model');
            $locarea_list = $this->Locarea_info_model->getlist();
            
            $this->view("add", array(
                "require_js" => true,
                "dep_list" => $dep_list,
                "locarea_list" => $locarea_list
            ));
        }
    }

    public function modify($id)
    {
        if ($this->input->is_ajax_request()) {

            $arr['dep_id'] = isset($_POST['dep_id']) ? $_POST['dep_id'] : "";
            $arr['locarea_id'] = isset($_POST['locarea_id']) ? $_POST['locarea_id'] : "";
            $arr['delay_ratio'] = isset($_POST['delay_ratio']) ? $_POST['delay_ratio'] : "";
            $arr['night_delay_ratio'] = isset($_POST['night_delay_ratio']) ? $_POST['night_delay_ratio'] : "";
            $arr['update_timestamp'] = date('Y-m-d H:i:s');
            
            $new_id = $this->Dep_locarea_param_model->update($arr, 'param_id = ' . $id);
            if ($new_id) {
                exit(json_encode(array(
                    'status' => true,
                    'tips' => '信息新增成功',
                    'new_id' => $new_id
                )));
            } else {
                exit(json_encode(array(
                    'status' => false,
                    'tips' => '信息新增失败',
                    'new_id' => 0
                )));
            }
        } else {
            $this->load->model('Department_info_model');
            $dep_list = $this->Department_info_model->getlist();
            
            $this->load->model('Locarea_info_model');
            $locarea_list = $this->Locarea_info_model->getlist();
            
            $data = $this->Dep_locarea_param_model->get_one(array(
                'param_id' => intval($id)
            ));
            if (isset($data)) {
                $this->view("modify", array(
                    "require_js" => true,
                    "data_info" => $data,
                    "dep_list" => $dep_list,
                    "locarea_list" => $locarea_list
                ));
            } else {
                $this->showmessage('找不到对应的数据！');
            }
        }
    }

    public function delete($id)
    {
              
        $data_info = $this->Dep_locarea_param_model->get_one(array(
            'param_id' => intval($id)
        ));
        
        if (! $data_info)
            $this->showmessage('信息不存在');
        
        $status = $this->Dep_locarea_param_model->delete(array(
            'param_id' => intval($id)
        ));
        
        if ($status) {
            $this->showmessage('删除成功');
        } else
            $this->showmessage('删除失败');
    }
}

?>
<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class Monarea_info extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("Monarea_info_model");
    }

    public function add()
    {
        if ($this->input->is_ajax_request()) {
            $arr['monarea_id'] = "";
            if (isset($_POST['monarea_id']))
                $arr['monarea_id'] = $_POST['monarea_id'];
            
            if ($arr['monarea_id'] == '')
                exit(json_encode(array(
                    'status' => false,
                    'tips' => '信息新增失败, no ID'
                )));
            
            $arr['monarea_name'] = isset($_POST['monarea_name'])?$_POST['monarea_name']:"";
            $arr['update_timestamp'] = date('Y-m-d H:i:s');
            
            $new_id = $this->Monarea_info_model->insert($arr);
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
            $this->view("add", array(
                "require_js" => true
            ));
        }
    }

    public function modify($id)
    {
        if ($this->input->is_ajax_request()) {
            
            $arr['monarea_name'] = isset($_POST['monarea_name'])?$_POST['monarea_name']:"";
            $arr['update_timestamp'] = date('Y-m-d H:i:s');
            
            $new_id = $this->Monarea_info_model->update($arr, 'monarea_id = ' . $id);
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
            $data = $this->Monarea_info_model->get_one(array(
                'monarea_id' => intval($id)
            ));
            if (isset($data)) {
                
                $this->view("modify", array(
                    "require_js" => true,
                    "data_info" => $data
                ));
            } else {
                $this->showmessage('找不到对应的数据！');
            }
        }
    }

    public function delete($id)
    {
        $data_info = $this->monarea_info_model->get_one(array(
            'moncarea_id' => $id
        ));
        
        if (! $data_info)
            $this->showmessage('信息不存在');
        
        $status = $this->Monarea_info_model->delete(array(
            'monarea_id' => $id
        ));
        
        if ($status) {
            $this->showmessage('删除成功');
        } else
            $this->showmessage('删除失败');
    }
}

?>
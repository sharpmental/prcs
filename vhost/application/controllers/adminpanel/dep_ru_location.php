<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class Dep_ru_location extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("Dep_ru_location_model");
    }

    public function add()
    {
        if ($this->input->is_ajax_request()) {
            $arr['ru_id'] = "";
            if (isset($_POST['ru_id']))
                $arr['ru_id'] = $_POST['ru_id'];
            
            if ($arr['ru_id'] == '')
                exit(json_encode(array(
                    'status' => false,
                    'tips' => '信息新增失败, No ID find.'
                )));
            
            $arr['dep_id'] = isset($_POST['dep_id']) ? $_POST['dep_id'] : 0;
            $arr['weight'] = isset($_POST['weight']) ? $_POST['weight'] : 0;
            $arr['rssi_weight'] = isset($_POST['rssi_weight']) ? $_POST['rssi_weight'] : 0;
            $arr['update_timestamp'] = date('Y-m-d H:i:s');
            
            $new_id = $this->Dep_ru_location_model->insert($arr);
            if ($new_id) {
                exit(json_encode(array(
                    'status' => true,
                    'tips' => '信息新增成功',
                    'new_id' => $new_id
                )));
            } else {
                exit(json_encode(array(
                    'status' => false,
                    'tips' => '信息新增失败, DB failure.',
                    'new_id' => $new_id
                )));
            }
        } else {
            $this->load->model('Department_info_model');
            $dep_list = $this->Department_info_model->getlist();
            
            $this->load->model('Recvunit_info_model');
            $recvunit_list = $this->Recvunit_info_model->getlist();
            
            $this->load->model('Tablelist_model');
            $data = $this->Tablelist_model->gettypebyname("tb_dep_ru_location");
            if ($data)
                $type = $data->row_array()['type'];
            else
                $type = 0;
            
            $this->view("add", array(
                "require_js" => true,
                "dep_list" => $dep_list,
                "recvunit_list" => $recvunit_list,
                "type" => $type
            ));
        }
    }

    public function modify($id)
    {
        if ($this->input->is_ajax_request()) {
            
            $arr['dep_id'] = isset($_POST['dep_id']) ? $_POST['dep_id'] : 0;
            $arr['weight'] = isset($_POST['weight']) ? $_POST['weight'] : 0;
            $arr['rssi_weight'] = isset($_POST['rssi_weight']) ? $_POST['rssi_weight'] : 0;
            $arr['update_timestamp'] = date('Y-m-d H:i:s');
            
            $new_id = $this->Dep_ru_location_model->update($arr, 'ru_id = ' . $id);
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
            $data = $this->Dep_ru_location_model->get_one(array(
                'ru_id' => intval($id)
            ));
            if (isset($data)) {
                
                $this->load->model('Department_info_model');
                $dep_list = $this->Department_info_model->getlist();
                
                $this->load->model('Recvunit_info_model');
                $recvunit_list = $this->Recvunit_info_model->getlist();
                
                $this->load->model('Tablelist_model');
                $datat = $this->Tablelist_model->gettypebyname("tb_dep_ru_location");
                if ($datat)
                    $type = $datat->row_array()['type'];
                else
                    $type = 0;
                
                $this->view("modify", array(
                    "require_js" => true,
                    "data_info" => $data,
                    "dep_list" => $dep_list,
                    "recvunit_list" => $recvunit_list,
                    "type" => $type
                ));
            } else {
                $this->showmessage('找不到对应的数据！');
            }
        }
    }

    public function delete($id)
    {
        $data_info = $this->Dep_ru_location_model->get_one(array(
            'ru_id' => $id
        ));
        
        if (! $data_info)
            $this->showmessage('信息不存在');
        
        $status = $this->Dep_ru_location_model->delete(array(
            'ru_id' => $id
        ));
        
        if ($status) {
            $this->showmessage('删除成功');
        } else
            $this->showmessage('删除失败');
    }
}

?>
<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class Locarea_info extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("Locarea_info_model");
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
                    'tips' => 's'
                )));
            
            $arr['locarea_name'] = $_POST['locarea_name'];
            $arr['coor_id'] = $_POST['locarea_name'];
            $arr['cent_x'] = $_POST['locarea_name'];
            $arr['cent_y'] = $_POST['locarea_name'];
            $arr['size_x'] = $_POST['locarea_name'];
            $arr['size_y'] = $_POST['locarea_name'];
            $arr['update_timestamp'] = date('Y-m-d H:i:s');
            
            $new_id = $this->Locarea_info_model->insert($arr);
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
            $this->load->model("Loccoor_info_model");
            $loccoor_list = $this->Loccoor_info_model->getlist();
            
            $this->view("add", array(
                "require_js" => true,
                "loccoor_list" => $loccoor_list
            ));
        }
    }

    public function modify($id)
    {
        if ($this->input->is_ajax_request()) {
            
            // $arr['people_id'] = "";
            // if (isset($_POST['people_id']))
            // $arr['people_id'] = $_POST['people_id'];
            
            // if ($arr['people_id'] == '')
            // exit(json_encode(array(
            // 'status' => false,
            // 'tips' => 's'
            // )));
            
            $arr['locarea_name'] = $_POST['locarea_name'];
            $arr['coor_id'] = $_POST['locarea_name'];
            $arr['cent_x'] = $_POST['locarea_name'];
            $arr['cent_y'] = $_POST['locarea_name'];
            $arr['size_x'] = $_POST['locarea_name'];
            $arr['size_y'] = $_POST['locarea_name'];
            $arr['update_timestamp'] = date('Y-m-d H:i:s');
            
            $new_id = $this->Locarea_info_model->update($arr, 'locarea_id = ' . $id);
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
            $data = $this->Locarea_info_model->get_one(array(
                'locarea_id' => intval($id)
            ));
            if (isset($data)) {
                $this->load->model("Loccoor_info_model");
                $loccoor_list = $this->Loccoor_info_model->getlist();
                
                $this->view("modify", array(
                    "require_js" => true,
                    "data_info" => $data,
                    "loccoor_list" => $loccoor_list
                ));
            } else {
                $this->showmessage('找不到对应的数据！');
            }
        }
    }

    public function delete($id)
    {
        $data_info = $this->Locarea_info_model->get_one(array(
            'locarea_id' => $id
        ));
        
        if (! $data_info)
            $this->showmessage('信息不存在');
        
        $status = $this->Locarea_info_model->delete(array(
            'locarea_id' => $id
        ));
        
        if ($status) {
            $this->showmessage('删除成功');
        } else
            $this->showmessage('删除失败');
    }
}

?>
<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class Recvunit_info extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("Recvunit_info_model");
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
            
            $arr['receiver_ip'] = isset($_POST['receiver_ip']) ? $_POST['receiver_ip'] : "";
            $arr['receiver_index'] = isset($_POST['receiver_index']) ? $_POST['receiver_index'] : 0;
            $arr['locarea_id'] = isset($_POST['locarea_id']) ? $_POST['locarea_id'] : 0;
            $arr['coor_id'] = isset($_POST['coor_id']) ? $_POST['coor_id'] : 0;
            $arr['pos_x'] = isset($_POST['pos_x']) ? $_POST['pos_x'] : 0;
            $arr['pos_y'] = isset($_POST['pos_y']) ? $_POST['pos_y'] : 0;
            $arr['weight'] = isset($_POST['weight']) ? $_POST['weight'] : 0;
            $arr['update_timestamp'] = date('Y-m-d H:i:s');
            
            $new_id = $this->Recvunit_info_model->insert($arr);
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
            $this->load->model('Locarea_info_model');
            $locarea_list = $this->Locarea_info_model->getlist();
            
            $this->load->model('Loccoor_info_model');
            $loccoor_list = $this->Loccoor_info_model->getlist();
            
            $this->load->model('Tablelist_model');
            $data = $this->Tablelist_model->gettypebyname("tb_recvunit_info");
            if ($data)
                $type = $data->row_array()['type'];
                else
                    $type = 0;
            
                    
            $this->view("add", array(
                "require_js" => true,
                "locarea_list" => $locarea_list,
                "loccoor_list" => $loccoor_list,
                "type" => $type
            ));
        }
    }

    public function modify($id)
    {
        if ($this->input->is_ajax_request()) {
            
            $arr['receiver_ip'] = isset($_POST['receiver_ip']) ? $_POST['receiver_ip'] : "";
            $arr['receiver_index'] = isset($_POST['receiver_index']) ? $_POST['receiver_index'] : 0;
            $arr['locarea_id'] = isset($_POST['locarea_id']) ? $_POST['locarea_id'] : 0;
            $arr['coor_id'] = isset($_POST['coor_id']) ? $_POST['coor_id'] : 0;
            $arr['pos_x'] = isset($_POST['pos_x']) ? $_POST['pos_x'] : 0;
            $arr['pos_y'] = isset($_POST['pos_y']) ? $_POST['pos_y'] : 0;
            $arr['weight'] = isset($_POST['weight']) ? $_POST['weight'] : 0;
            $arr['update_timestamp'] = date('Y-m-d H:i:s');
            
            $new_id = $this->Recvunit_info_model->update($arr, 'ru_id = ' . $id);
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
            $data = $this->Recvunit_info_model->get_one(array(
                'ru_id' => intval($id)
            ));
            if (isset($data)) {
                $this->load->model('Locarea_info_model');
                $locarea_list = $this->Locarea_info_model->getlist();
                
                $this->load->model('Loccoor_info_model');
                $loccoor_list = $this->Loccoor_info_model->getlist();
                
                $this->load->model('Tablelist_model');
                $data = $this->Tablelist_model->gettypebyname("tb_recvunit_info");
                if ($data)
                    $type = $data->row_array()['type'];
                    else
                        $type = 0;
                    
                $this->view("modify", array(
                    "require_js" => true,
                    "data_info" => $data,
                    "locarea_list" => $locarea_list,
                    "loccoor_list" => $loccoor_list,
                    "type" => $type
                ));
            } else {
                $this->showmessage('找不到对应的数据！');
            }
        }
    }

    public function delete($id)
    {
        $data_info = $this->Recvunit_info_model->get_one(array(
            'ru_id' => $id
        ));
        
        if (! $data_info)
            $this->showmessage('信息不存在');
        
        $status = $this->Recvunit_info_model->delete(array(
            'ru_id' => $id
        ));
        
        if ($status) {
            $this->showmessage('删除成功');
        } else
            $this->showmessage('删除失败');
    }
}

?>
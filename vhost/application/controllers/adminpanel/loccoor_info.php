<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class Loccoor_info extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("Loccoor_info_model");
    }

    public function add()
    {
        if ($this->input->is_ajax_request()) {
            $arr['coor_id'] = "";
            if (isset($_POST['coor_id']))
                $arr['coor_id'] = $_POST['coor_id'];
            
            if ($arr['coor_id'] == '')
                exit(json_encode(array(
                    'status' => false,
                    'tips' => '信息新增失败, No ID find.'
                )));
            
            $arr['coor_name'] = isset($_POST['coor_name']) ? $_POST['coor_name'] : "";
            $arr['ori_x'] = isset($_POST['ori_x']) ? $_POST['ori_x'] : 0;
            $arr['ori_y'] = isset($_POST['ori_y']) ? $_POST['ori_y'] : 0;
            $arr['ori_z'] = isset($_POST['ori_z']) ? $_POST['ori_z'] : 0;
            $arr['angle_h'] = isset($_POST['angle_h']) ? $_POST['angle_h'] : 0;
            $arr['angle_v'] = isset($_POST['angle_v']) ? $_POST['angle_v'] : 0;
            $arr['update_timestamp'] = date('Y-m-d H:i:s');
            
            $new_id = $this->Loccoor_info_model->insert($arr);
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
            
            $this->load->model('Tablelist_model');
            $data = $this->Tablelist_model->gettypebyname("tb_loccoor_info");
            if ($data)
                $type = $data->row_array()['type'];
            else
                $type = 0;
            
            $this->view("add", array(
                "require_js" => true,
                "type" => $type
            ));
        }
    }

    public function modify($id)
    {
        if ($this->input->is_ajax_request()) {
            
            $arr['coor_name'] = isset($_POST['coor_name']) ? $_POST['coor_name'] : "";
            $arr['ori_x'] = isset($_POST['ori_x']) ? $_POST['ori_x'] : 0;
            $arr['ori_y'] = isset($_POST['ori_y']) ? $_POST['ori_y'] : 0;
            $arr['ori_z'] = isset($_POST['ori_z']) ? $_POST['ori_z'] : 0;
            $arr['angle_h'] = isset($_POST['angle_h']) ? $_POST['angle_h'] : 0;
            $arr['angle_v'] = isset($_POST['angle_v']) ? $_POST['angle_v'] : 0;
            $arr['update_timestamp'] = date('Y-m-d H:i:s');
            
            $new_id = $this->Loccoor_info_model->update($arr, 'coor_id = ' . $id);
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
            $data = $this->Loccoor_info_model->get_one(array(
                'coor_id' => intval($id)
            ));
            if (isset($data)) {
                
                $this->load->model('Tablelist_model');
                $datat = $this->Tablelist_model->gettypebyname("tb_loccoor_info");
                if ($datat)
                    $type = $datat->row_array()['type'];
                else
                    $type = 0;
                
                $this->view("modify", array(
                    "require_js" => true,
                    "data_info" => $data,
                    "type" => $type
                ));
            } else {
                $this->showmessage('找不到对应的数据！');
            }
        }
    }

    public function delete($id)
    {
        $data_info = $this->Loccoor_info_model->get_one(array(
            'coor_id' => $id
        ));
        
        if (! $data_info)
            $this->showmessage('信息不存在');
        
        $status = $this->Loccoor_info_model->delete(array(
            'coor_id' => $id
        ));
        
        if ($status) {
            $this->showmessage('删除成功');
        } else
            $this->showmessage('删除失败');
    }
}

?>
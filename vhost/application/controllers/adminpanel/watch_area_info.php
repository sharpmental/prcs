<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class Watch_area_info extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("Watch_area_info_model");
    }

    public function add()
    {
        if ($this->input->is_ajax_request()) {
            $arr['watch_id'] = "";
            if (isset($_POST['watch_id']))
                $arr['watch_id'] = $_POST['watch_id'];
            
            if ($arr['watch_id'] == '')
                exit(json_encode(array(
                    'status' => false,
                    'tips' => '信息新增失败, No ID find.'
                )));
            
            $arr['alarm_type'] = isset($_POST['alarm_type']) ? $_POST['alarm_type'] : 0;
            $arr['locarea_id'] = isset($_POST['locarea_id']) ? $_POST['locarea_id'] : 0;
            $arr['monarea_id'] = isset($_POST['monarea_id']) ? $_POST['monarea_id'] : 0;
            $arr['update_timestamp'] = date('Y-m-d H:i:s');
            
            $new_id = $this->Watch_area_info_model->insert($arr);
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
            $this->load->model('Watchinfo_model');
            $watch_list = $this->Watchinfo_model->getlist();
            
            $this->load->model('Locarea_info_model');
            $locarea_list = $this->Locarea_info_model->getlist();
            
            $this->load->model('Monarea_info_model');
            $monarea_list = $this->Monarea_info_model->getlist();
            
            $this->load->model('Tablelist_model');
            $data = $this->Tablelist_model->gettypebyname("tb_watch_area_info");
            if ($data)
                $type = $data->row_array()['type'];
            else
                $type = 0;
            
            $this->view("add", array(
                "require_js" => true,
                "watch_list" => $watch_list,
                "locarea_list" => $locarea_list,
                "monarea_list" => $monarea_list,
                "type" => $type
            ));
        }
    }

    public function modify($id)
    {
        if ($this->input->is_ajax_request()) {
            
            $arr['alarm_type'] = isset($_POST['alarm_type']) ? $_POST['alarm_type'] : 0;
            $arr['locarea_id'] = isset($_POST['locarea_id']) ? $_POST['locarea_id'] : 0;
            $arr['monarea_id'] = isset($_POST['monarea_id']) ? $_POST['monarea_id'] : 0;
            $arr['update_timestamp'] = date('Y-m-d H:i:s');
            
            $new_id = $this->Watch_area_info_model->update($arr, ' watch_id = ' . $id);
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
            $data = $this->Watch_area_info_model->get_one(array(
                'watch_id' => intval($id)
            ));
            if (isset($data)) {
                
                $this->load->model('Watchinfo_model');
                $watch_list = $this->Watchinfo_model->getlist();
                
                $this->load->model('Locarea_info_model');
                $locarea_list = $this->Locarea_info_model->getlist();
                
                $this->load->model('Monarea_info_model');
                $monarea_list = $this->Monarea_info_model->getlist();
                
                $this->load->model('Tablelist_model');
                $datat = $this->Tablelist_model->gettypebyname("tb_watch_area_info");
                if ($datat)
                    $type = $datat->row_array()['type'];
                else
                    $type = 0;
                
                $this->view("modify", array(
                    "require_js" => true,
                    "data_info" => $data,
                    "watch_list" => $watch_list,
                    "locarea_list" => $locarea_list,
                    "monarea_list" => $monarea_list,
                    "type" => $type
                ));
            } else {
                $this->showmessage('找不到对应的数据！');
            }
        }
    }

    public function delete($id)
    {
        $data_info = $this->Watch_area_info_model->get_one(array(
            'watch_id' => $id
        ));
        
        if (! $data_info)
            $this->showmessage('信息不存在');
        
        $status = $this->Watch_area_info_model->delete(array(
            'watch_id' => $id
        ));
        
        if ($status) {
            $this->showmessage('删除成功');
        } else
            $this->showmessage('删除失败');
    }
}

?>
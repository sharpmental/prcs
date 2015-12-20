<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class People_info extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("People_info_model");
    }

    public function add()
    {
        if ($this->input->is_ajax_request()) {
            $arr['people_id'] = "";
            if (isset($_POST['people_id']))
                $arr['people_id'] = $_POST['people_id'];
            
            if ($arr['person_id'] == '')
                exit(json_encode(array(
                    'status' => false,
                    'tips' => 's'
                )));
            
            $arr['people_name'] = $_POST['people_name'];
            $arr['dep_id'] = $_POST['people_deparment'];
            $arr['watch_id'] = $_POST['watch_id'];
            $arr['init_locarea_id'] = $_POST['initloc'];
            
            $new_id = $this->People_info_model->insert($arr);
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
            
            $this->load->model('Watchinfo_model');
            $watch_list = $this->Watchinfo_model->getlist();
            
            $this->view("add", array(
                "require_js" => true,
                "dep_list" => $dep_list,
                "watch_list" => $watch_list
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
            
            $arr['people_name'] = $_POST['people_name'];
            $arr['dep_id'] = $_POST['people_deparment'];
            $arr['watch_id'] = $_POST['watch_id'];
            $arr['init_locarea_id'] = $_POST['initloc'];
            
            $new_id = $this->People_info_model->update($arr, 'people_id = ' . $id);
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
            $data = $this->People_info_model->get_one(array(
                'people_id' => intval($id)
            ));
            if (isset($data)) {
                $this->load->model('Department_info_model');
                $dep_list = $this->Department_info_model->getlist();
                
                $this->load->model('Watchinfo_model');
                $watch_list = $this->Watchinfo_model->getlist();
                
                $this->view("modify", array(
                    "require_js" => true,
                    "data_info" => $data,
                    "dep_list" => $dep_list,
                    "watch_list" => $watch_list
                ));
            } else {
                $this->showmessage('找不到对应的数据！');
            }
        }
    }

    public function delete($id)
    {
        $data_info = $this->People_info_model->get_one(array(
            'people_id' => $id
        ));
        
        if (! $data_info)
            $this->showmessage('信息不存在');
        
        $status = $this->People_info_model->delete(array(
            'people_id' => $id
        ));
        
        if ($status) {
            $this->showmessage('删除成功');
        } else
            $this->showmessage('删除失败');
    }
}

?>
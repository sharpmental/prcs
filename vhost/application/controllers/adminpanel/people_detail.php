<?php

if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class People_detail extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("People_detail_model");
    }

    public function add()
    {
        if ($this->input->is_ajax_request()) {
            $arr['people_id'] = "";
            if (isset($_POST['people_id']))
                $arr['people_id'] = $_POST['people_id'];
            
            if ($arr['people_id'] == '')
                exit(json_encode(array(
                    'status' => false,
                    'tips' => '信息新增失败, No people ID'
                )));
            
            $arr['no'] = isset($_POST['people_no'])?$_POST['people_no']:0;
            $arr['name'] = isset($_POST['people_name'])?$_POST['people_name']:"";
            $arr['birthday'] = isset($_POST['birthday'])?$_POST['birthday']:"";
            $arr['gender'] = isset($_POST['gender'])?$_POST['gender']:"";
            $arr['education'] = isset($_POST['education'])?$_POST['education']:"";
            $arr['jobcareer'] = isset($_POST['job'])?$_POST['job']:"";
            $arr['area_code'] = isset($_POST['zipcode'])?$_POST['zipcode']:"";
            $arr['regaddress'] = isset($_POST['homeland'])?$_POST['homeland']:"";
            $arr['address'] = isset($_POST['liveland'])?$_POST['liveland']:"";
            $arr['charge'] = isset($_POST['crime'])?$_POST['crime']:"";
            $arr['term_begin'] = isset($_POST['start'])?$_POST['start']:"";
            $arr['term'] = isset($_POST['sentence'])?$_POST['sentence']:"";
            $arr['term_end'] = isset($_POST['end'])?$_POST['end']:"";
            $arr['arrival_day'] = isset($_POST['entertime'])?$_POST['entertime']:"";
            $arr['level'] = isset($_POST['level'])?$_POST['level']:0;
            $arr['multicrime'] = isset($_POST['multiple'])?$_POST['multiple']:"";
            $arr['samecharge'] = isset($_POST['simcrime'])?$_POST['simcrime']:"";
            $arr['cause'] = isset($_POST['cause'])?$_POST['cause']:"";
            $arr['nationality'] = isset($_POST['national'])?$_POST['national']:"";
            $arr['status'] = isset($_POST['status'])?$_POST['status']:0;
            $arr['update_timestamp'] = date('Y-m-d H:i:s');
            
            $new_id = $this->People_detail_model->insert($arr);
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
            $this->load->model('Tablelist_model');
            $data = $this->Tablelist_model->gettypebyname("tb_people_detail");
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

    public function modify($id = '0')
    {
        if ($this->input->is_ajax_request()) {
            
            $arr['no'] = isset($_POST['people_no'])?$_POST['people_no']:0;
            $arr['name'] = isset($_POST['people_name'])?$_POST['people_name']:"";
            $arr['birthday'] = isset($_POST['birthday'])?$_POST['birthday']:"";
            $arr['gender'] = isset($_POST['gender'])?$_POST['gender']:"";
            $arr['education'] = isset($_POST['education'])?$_POST['education']:"";
            $arr['jobcareer'] = isset($_POST['job'])?$_POST['job']:"";
            $arr['area_code'] = isset($_POST['zipcode'])?$_POST['zipcode']:"";
            $arr['regaddress'] = isset($_POST['homeland'])?$_POST['homeland']:"";
            $arr['address'] = isset($_POST['liveland'])?$_POST['liveland']:"";
            $arr['charge'] = isset($_POST['crime'])?$_POST['crime']:"";
            $arr['term_begin'] = isset($_POST['start'])?$_POST['start']:"";
            $arr['term'] = isset($_POST['sentence'])?$_POST['sentence']:"";
            $arr['term_end'] = isset($_POST['end'])?$_POST['end']:"";
            $arr['arrival_day'] = isset($_POST['entertime'])?$_POST['entertime']:"";
            $arr['level'] = isset($_POST['level'])?$_POST['level']:0;
            $arr['multicrime'] = isset($_POST['multiple'])?$_POST['multiple']:"";
            $arr['samecharge'] = isset($_POST['simcrime'])?$_POST['simcrime']:"";
            $arr['cause'] = isset($_POST['cause'])?$_POST['cause']:"";
            $arr['nationality'] = isset($_POST['national'])?$_POST['national']:"";
            $arr['status'] = isset($_POST['status'])?$_POST['status']:0;
            $arr['update_timestamp'] = date('Y-m-d H:i:s');
            
            $new_id = $this->People_detail_model->update($arr, 'people_id = '.$id);
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
            $data = $this->People_detail_model->get_one(array('people_id' => intval($id)));
            if(isset($data)){
                $this->load->model('Tablelist_model');
                $datat = $this->Tablelist_model->gettypebyname("tb_people_detail");
                if ($datat)
                    $type = $datat->row_array()['type'];
                    else
                        $type = 0;
                    
                $this->view("modify", array(
                    "require_js" => true, 
                    "data_info" => $data,
                    "type" => $type
                ));
            }
            else{
                $this->showmessage('找不到对应的数据！');
            }
        }
    }

    public function delete($id)
    {
        $data_info = $this->People_detail_model->get_one(array(
            'people_id' => $id
        ));
        
        if (! $data_info)
            $this->showmessage('信息不存在');
        
        $status = $this->People_detail_model->delete(array(
            'people_id' => $id
        ));
        
        if ($status) {
            $this->showmessage('删除成功');
        } else
            $this->showmessage('删除失败');
        $this->showmessage('删除失败');
    }
}

?>
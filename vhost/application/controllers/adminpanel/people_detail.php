<?php

if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class People_detail extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function add()
    {
        if ($this->input->is_ajax_request()) {
            $arr['person_id'] = "";
            if (isset($_POST['person_id']))
                $arr['person_id'] = $_POST['person_id'];
            
            if ($arr['person_id'] == '')
                exit(json_encode(array(
                    'status' => false,
                    'tips' => 's'
                )));
            
            $arr['no'] = $_POST['person_no'];
            $arr['name'] = $_POST['person_name'];
            $arr['birthday'] = $_POST['birthday'];
            $arr['gender'] = $_POST['gender'];
            $arr['education'] = $_POST['education'];
            $arr['jobcareer'] = $_POST['job'];
            $arr['area_code'] = $_POST['zipcode'];
            $arr['regaddress'] = $_POST['homeland'];
            $arr['address'] = $_POST['liveland'];
            $arr['charge'] = $_POST['crime'];
            $arr['term_begin'] = $_POST['start'];
            $arr['term'] = $_POST['sentence'];
            $arr['term_end'] = $_POST['end'];
            $arr['arrival_day'] = $_POST['entertime'];
            $arr['level'] = $_POST['level'];
            $arr['multicrime'] = $_POST['multiple'];
            $arr['samecharge'] = $_POST['simcrime'];
            $arr['cause'] = $_POST['cause'];
            $arr['nationality'] = $_POST['national'];
            $arr['status'] = $_POST['status'];
            
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
                    'tips' => '信息新增失败',
                    'new_id' => 0
                )));
            }
        } else {
            $this->view("add");
        }
    }

    public function modify($id = '0')
    {
        if ($this->input->is_ajax_request()) {
            
            $arr['person_id'] = "";
            if (isset($_POST['person_id']))
                $arr['person_id'] = $_POST['person_id'];
            
            if ($arr['person_id'] == '')
                exit(json_encode(array(
                    'status' => false,
                    'tips' => 's'
                )));
            
            $arr['no'] = $_POST['person_no'];
            $arr['name'] = $_POST['person_name'];
            $arr['birthday'] = $_POST['birthday'];
            $arr['gender'] = $_POST['gender'];
            $arr['education'] = $_POST['education'];
            $arr['jobcareer'] = $_POST['job'];
            $arr['area_code'] = $_POST['zipcode'];
            $arr['regaddress'] = $_POST['homeland'];
            $arr['address'] = $_POST['liveland'];
            $arr['charge'] = $_POST['crime'];
            $arr['term_begin'] = $_POST['start'];
            $arr['term'] = $_POST['sentence'];
            $arr['term_end'] = $_POST['end'];
            $arr['arrival_day'] = $_POST['entertime'];
            $arr['level'] = $_POST['level'];
            $arr['multicrime'] = $_POST['multiple'];
            $arr['samecharge'] = $_POST['simcrime'];
            $arr['cause'] = $_POST['cause'];
            $arr['nationality'] = $_POST['national'];
            $arr['status'] = $_POST['status'];
            
            $new_id = $this->People_detail_model->update($arr);
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
            $data = $this->People_detail_model->getone(array('people_id' => intval($id)));
            if(isset($data)){
                
                $this->view("modify", array("require_js" => true, "data_info" => $data));
            }
            else{
                $this->showmessage('找不到对应的数据！');
            }
        }
    }

    public function delete($id)
    {}
}

?>
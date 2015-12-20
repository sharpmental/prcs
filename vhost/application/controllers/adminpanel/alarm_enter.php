<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Alarm_enter extends Admin_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->model("Alarm_enter_model");
    }
    
    public function clear ($id='0'){
        $status = $this->Alarm_enter_model->update(array('alarm_state'=> '0'), array('watch_id'=>$id));
        if($status)
        {
            $this->showmessage('删除成功');
        }else
            $this->showmessage('删除失败');
    }
}

?>
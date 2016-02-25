<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class Showmap extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("Mapdraw_info_model");
        $this->load->model("Alarm_loc_model");
        $this->load->model("Locarea_info_model");
    }

    public function index()
    {
        $data = $this->Mapdraw_info_model->select("level = 1");
        $div_list = array();
        
        if ($data) {
            foreach ($data as $k => $v) {
                
                $v['locarea_name'] = $this->Locarea_info_model->getname($v['locarea_id'])['locarea_name'];
                $v['count'] = 0;
                
                // get people count
//                 $v['count'] += $this->Alarm_loc_model->count('locarea_id = ' . $v['locarea_id'] . ' and alarm_type <> 0');
                $v['count'] += $this->Alarm_loc_model->count('locarea_id = ' . $v['locarea_id'] );
                
                $locarea_list = $this->Locarea_info_model->getbyparentid($v['locarea_id']);
                foreach ($locarea_list as $kk => $vv) {
//                     $v['count'] += $this->Alarm_loc_model->count('locarea_id = ' . $vv['locarea_id'] . ' and alarm_type <> 0');
                    $v['count'] += $this->Alarm_loc_model->count('locarea_id = ' . $vv['locarea_id'] );
                }
                
                array_push($div_list, $v);
            }
        }
        
        $this->view('index', array(
            'require_js' => true,
            'div_list' => $div_list
        ));
    }

    public function submap($id = 0)
    {
        $locarea_list = $this->Locarea_info_model->select("parentid = " . $id);
        $div_list = array();
        $mapname = "";
        
        if ($locarea_list) {
            foreach ($locarea_list as $k => $v) {
                $data = $this->Mapdraw_info_model->get_one("locarea_id = " . $v['locarea_id']);
                if ($data) {
                    $tmp = $data;
                    $mapname = $data['filename'];
                    $tmp['locarea_name'] = $v['locarea_name'];
                    $tmp['count'] = 0;
                    
                    // get people count
//                     $tmp['count'] += $this->Alarm_loc_model->count('locarea_id = ' . $v['locarea_id'] . ' and alarm_type <> 0');
                    $tmp['count'] += $this->Alarm_loc_model->count('locarea_id = ' . $v['locarea_id'] );
                    array_push($div_list, $tmp);
                }
            }
        }
        
        $this->view('submap', array(
            'require_js' => true,
            'div_list' => $div_list,
            'mapname' => $mapname
        ));
    }
}

?>
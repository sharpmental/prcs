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
            
            if ($arr['people_id'] == '')
                exit(json_encode(array(
                    'status' => false,
                    'tips' => '信息新增失败, No ID find.'
                )));
                
                // $arr['people_name'] = isset($_POST['people_name'])?$_POST['people_name']:"";
            $arr['dep_id'] = isset($_POST['dep_id']) ? $_POST['dep_id'] : 0;
            $arr['watch_id'] = isset($_POST['watch_id']) ? $_POST['watch_id'] : 0;
            $arr['init_locarea_id'] = isset($_POST['initloc']) ? $_POST['initloc'] : 0;
            $arr['update_timestamp'] = date('Y-m-d H:i:s');
            
            $new_id = $this->People_info_model->insert($arr);
            
            $this->load->model("Watchinfo_model");
            $this->Watchinfo_model->setstatus($arr['watch_id']);
            
            if ($new_id) {
                exit(json_encode(array(
                    'status' => true,
                    'tips' => 'Success',
                    'new_id' => $new_id
                )));
            } else {
                exit(json_encode(array(
                    'status' => false,
                    'tips' => 'DB failure.',
                    'new_id' => $new_id
                )));
            }
        } else {
            
            $used_watch_list = $this->People_info_model->getwatchlist();
            
            $this->load->model('Department_info_model');
            $dep_list = $this->Department_info_model->getlist();
            
            $this->load->model('Watchinfo_model');
            $all_watch_list = $this->Watchinfo_model->getlist();
            
            $watch_list = array();
            foreach($all_watch_list as $k => $v ){
                if (!in_array($v['watch_id'], $used_watch_list)){
                    array_push($watch_list, $v);
                }
            }
                
            $this->load->model('Locarea_info_model');
            $locarea_list = $this->Locarea_info_model->getlist();
            
            $this->load->model('People_detail_model');
            $all_people_list = $this->People_detail_model->getlist();
            $used_people_list = $this->People_info_model->getpeoplelist();
            
            $people_list = array();
            foreach($all_people_list as $k => $v ){
                if (!in_array($v['people_id'], $used_people_list)){
                    array_push($people_list, $v);
                }
            }
            
            $this->load->model('Tablelist_model');
            $data = $this->Tablelist_model->gettypebyname("tb_people_info");
            if ($data)
                $type = $data->row_array()['type'];
            else
                $type = 0;
            
            $this->view("add", array(
                "require_js" => true,
                "dep_list" => $dep_list,
                "watch_list" => $watch_list,
                "locarea_list" => $locarea_list,
                "people_list" => $people_list,
                "type" => $type
            ));
        }
    }

    public function modify($id)
    {
        if ($this->input->is_ajax_request()) {
            
            // $arr['people_name'] = isset($_POST['people_name'])?$_POST['people_name']:"";
            $arr['dep_id'] = isset($_POST['dep_id']) ? $_POST['dep_id'] : 0;
            $arr['watch_id'] = isset($_POST['watch_id']) ? $_POST['watch_id'] : 0;
            $arr['init_locarea_id'] = isset($_POST['init_locarea_id']) ? $_POST['init_locarea_id'] : 0;
            $arr['update_timestamp'] = date('Y-m-d H:i:s');
            
            $data = $this->People_info_model->get_one("people_id = ".$id);
            if(!$data){
                exit(json_encode(array(
                    'status' => false,
                    'tips' => 'Can not find this Person!',
                    'new_id' => 0
                )));
            }
            $old_watch_id = $data['watch_id'];
            
            $new_id = $this->People_info_model->update($arr, 'people_id = ' . $id);
            
            $this->load->model("Watchinfo_model");
            $this->Watchinfo_model->setstatus($arr['watch_id']);
            $this->Watchinfo_model->unsetstatus($old_watch_id);
            
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
                
                $this->load->model('Locarea_info_model');
                $locarea_list = $this->Locarea_info_model->getlist();
                
                $this->load->model('People_detail_model');
                $people_list = $this->People_detail_model->getlist();
                
                $this->load->model('Tablelist_model');
                $datat = $this->Tablelist_model->gettypebyname("tb_people_info");
                if ($datat)
                    $type = $datat->row_array()['type'];
                else
                    $type = 0;
                
                $this->view("modify", array(
                    "require_js" => true,
                    "data_info" => $data,
                    "dep_list" => $dep_list,
                    "watch_list" => $watch_list,
                    "locarea_list" => $locarea_list,
                    "people_list" => $people_list,
                    "type" => $type
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

    public function allregpeople()
    {
        $this->load->model('People_info_model');
        $this->load->model('People_detail_model');
        
        $data = array();
        
        $data1 = $this->People_detail_model->getallreg();
        
        foreach ($data1 as $k => $v) {
            $data2 = $this->People_info_model->get_one("people_id = " . $v['people_id']);
            
            if ($data2) {
                array_push($data, array(
                    $v['people_id'],
                    $v['name'],
                    $data2['dep_id'],
                    $data2['watch_id']
                ));
            }
        }
        
        $this->load->library('table');
        $template = array(
            'table_open' => '<table class="table table-hover dataTable">'
        );
        $this->table->set_template($template);
        $this->table->set_heading('编号', '姓名', '部门号码', '腕带编号');
        
        $table_data = $this->table->generate($data);
        
        // create pageination
        $this->load->library('pagination');
        
        $pconfig['base_url'] = base_url() . 'adminpanel/people_info/allregpeople';
        $pconfig['total_rows'] = count($data);
        $pconfig['per_page'] = 20;
        $pconfig['full_tag_open'] = '<ul class="pagination">';
        $pconfig['full_tag_close'] = '</ul>';
        $pconfig['first_tag_open'] = '<li>';
        $pconfig['first_tag_close'] = '</li>';
        $pconfig['last_tag_open'] = '<li>';
        $pconfig['last_tag_close'] = '</li>';
        $pconfig['next_tag_open'] = '<li>';
        $pconfig['next_tag_close'] = '</li>';
        $pconfig['prev_tag_open'] = '<li>';
        $pconfig['prev_tag_close'] = '</li>';
        $pconfig['cur_tag_open'] = '<li><a href="#" class="pagination">';
        $pconfig['cur_tag_close'] = '</a></li>';
        $pconfig['num_tag_open'] = '<li>';
        $pconfig['num_tag_close'] = '</li>';
        
        $this->pagination->initialize($pconfig);
        
        $pageslink = $this->pagination->create_links();
        
        $this->view('index', array(
            'require_js' => true,
            'table_data' => $table_data,
            'pagelink' => $pageslink
        ));
    }

    public function outpeople()
    {
        $this->load->model('People_info_model');
        $this->load->model('Prisonerinout_model');
        
        $data = array();
        
        $data1 = $this->Prisonerinout_model->select("status <> 0");
        
        foreach ($data1 as $k => $v) {
            $data2 = $this->People_info_model->get_one("people_id = " . $v['people_id']);
            
            if ($data2) {
                $data3 = $this->Prisonerinfo_model->get_one('people_id = '.$data2['people_id']);
                array_push($data, array(
                    $v['people_id'],
                    isset($data3['people_name'])?$data3['people_name']:"",
                    "外出",
                    $data2['watch_id'],
                    $v['outtime']
                ));
            }
        }
        
        $this->load->library('table');
        $template = array(
            'table_open' => '<table class="table table-hover dataTable">'
        );
        $this->table->set_template($template);
        $this->table->set_heading('编号', '姓名', '状态', '腕带编号', '时间');
        
        $table_data = $this->table->generate($data);
        
        // create pageination
        $this->load->library('pagination');
        
        $pconfig['base_url'] = base_url() . 'adminpanel/people_info/outpeople';
        $pconfig['total_rows'] = count($data);
        $pconfig['per_page'] = 20;
        $pconfig['full_tag_open'] = '<ul class="pagination">';
        $pconfig['full_tag_close'] = '</ul>';
        $pconfig['first_tag_open'] = '<li>';
        $pconfig['first_tag_close'] = '</li>';
        $pconfig['last_tag_open'] = '<li>';
        $pconfig['last_tag_close'] = '</li>';
        $pconfig['next_tag_open'] = '<li>';
        $pconfig['next_tag_close'] = '</li>';
        $pconfig['prev_tag_open'] = '<li>';
        $pconfig['prev_tag_close'] = '</li>';
        $pconfig['cur_tag_open'] = '<li><a href="#" class="pagination">';
        $pconfig['cur_tag_close'] = '</a></li>';
        $pconfig['num_tag_open'] = '<li>';
        $pconfig['num_tag_close'] = '</li>';
        
        $this->pagination->initialize($pconfig);
        
        $pageslink = $this->pagination->create_links();
        
        $this->view('index', array(
            'require_js' => true,
            'table_data' => $table_data,
            'pagelink' => $pageslink
        ));
    }

    public function lostpeople()
    {
        $this->load->model('People_info_model');
        $this->load->model('Alarm_general_model');
        
        $data = array();
        
        $data1 = $this->Alarm_general_model->select("alarm_state = 1  and watch_working_state <> 0");
        
        foreach ($data1 as $k => $v) {
            $data2 = $this->People_info_model->get_one("watch_id = " . $v['watch_id']);
            
            if ($data2) {
                
                $data3 = $this->Prisonerinfo_model->get_one('people_id = '.$data2['people_id']);
                
                array_push($data, array(
                    $data2['people_id'],
                    isset($data3['people_name'])?$data3['people_name']:"",
                    $data2['watch_id'],
                    $v['alarm_state'],
                    $v['watch_working_state']
                ));
            }
        }
        
        $this->load->library('table');
        $template = array(
            'table_open' => '<table class="table table-hover dataTable">'
        );
        $this->table->set_template($template);
        $this->table->set_heading('编号', '姓名', '腕带编号', '腕表状态', '工作状态');
        
        $table_data = $this->table->generate($data);
        
        // create pageination
        $this->load->library('pagination');
        
        $pconfig['base_url'] = base_url() . 'adminpanel/people_info/lostpeople';
        $pconfig['total_rows'] = count($data);
        $pconfig['per_page'] = 20;
        $pconfig['full_tag_open'] = '<ul class="pagination">';
        $pconfig['full_tag_close'] = '</ul>';
        $pconfig['first_tag_open'] = '<li>';
        $pconfig['first_tag_close'] = '</li>';
        $pconfig['last_tag_open'] = '<li>';
        $pconfig['last_tag_close'] = '</li>';
        $pconfig['next_tag_open'] = '<li>';
        $pconfig['next_tag_close'] = '</li>';
        $pconfig['prev_tag_open'] = '<li>';
        $pconfig['prev_tag_close'] = '</li>';
        $pconfig['cur_tag_open'] = '<li><a href="#" class="pagination">';
        $pconfig['cur_tag_close'] = '</a></li>';
        $pconfig['num_tag_open'] = '<li>';
        $pconfig['num_tag_close'] = '</li>';
        
        $this->pagination->initialize($pconfig);
        
        $pageslink = $this->pagination->create_links();
        
        $this->view('index', array(
            'require_js' => true,
            'table_data' => $table_data,
            'pagelink' => $pageslink
        ));
    }

    public function insidepeople()
    {
        $this->load->model('People_info_model');
        
        $data = array();
        
        $data1 = $this->People_info_model->select();
        
        foreach ($data1 as $k => $v) {
            
            $data3 = $this->Prisonerinfo_model->get_one('people_id = '.$v['people_id']);
            
            array_push($data, array(
                $v['people_id'],
                isset($data3['people_name'])?$data3['people_name']:"",
                $v['watch_id'],
                $v['dep_id']
            ));
        }
        
        $this->load->library('table');
        $template = array(
            'table_open' => '<table class="table table-hover dataTable">'
        );
        $this->table->set_template($template);
        $this->table->set_heading('编号', '姓名', '腕带编号', '部门号码' );
        
        $table_data = $this->table->generate($data);
        
        // create pageination
        $this->load->library('pagination');
        
        $pconfig['base_url'] = base_url() . 'adminpanel/people_info/insidepeople';
        $pconfig['total_rows'] = count($data);
        $pconfig['per_page'] = 20;
        $pconfig['full_tag_open'] = '<ul class="pagination">';
        $pconfig['full_tag_close'] = '</ul>';
        $pconfig['first_tag_open'] = '<li>';
        $pconfig['first_tag_close'] = '</li>';
        $pconfig['last_tag_open'] = '<li>';
        $pconfig['last_tag_close'] = '</li>';
        $pconfig['next_tag_open'] = '<li>';
        $pconfig['next_tag_close'] = '</li>';
        $pconfig['prev_tag_open'] = '<li>';
        $pconfig['prev_tag_close'] = '</li>';
        $pconfig['cur_tag_open'] = '<li><a href="#" class="pagination">';
        $pconfig['cur_tag_close'] = '</a></li>';
        $pconfig['num_tag_open'] = '<li>';
        $pconfig['num_tag_close'] = '</li>';
        
        $this->pagination->initialize($pconfig);
        
        $pageslink = $this->pagination->create_links();
        
        $this->view('index', array(
            'require_js' => true,
            'table_data' => $table_data,
            'pagelink' => $pageslink
        ));
    }

    public function monalarm($id = 0)
    {
        $this->load->model('People_info_model');
        $this->load->model('Monarea_info_model');
        $this->load->model('Alarm_mon_model');
        
        $data = array();
        
        $data1 = $this->People_info_model->select();
        
        foreach ($data1 as $k => $v) {
            array_push($data, array(
                $v['people_id'],
                $v['watch_id'],
                $v['dep_id']
            ));
        }
        
        $this->load->library('table');
        $template = array(
            'table_open' => '<table class="table table-hover dataTable">'
        );
        $this->table->set_template($template);
        $this->table->set_heading('编号', '部门号码', '腕带编号');
        
        $table_data = $this->table->generate($data);
        
        // create pageination
        $this->load->library('pagination');
        
        $pconfig['base_url'] = base_url() . 'adminpanel/people_info/monalarmpeople';
        $pconfig['total_rows'] = count($data);
        $pconfig['per_page'] = 20;
        $pconfig['full_tag_open'] = '<ul class="pagination">';
        $pconfig['full_tag_close'] = '</ul>';
        $pconfig['first_tag_open'] = '<li>';
        $pconfig['first_tag_close'] = '</li>';
        $pconfig['last_tag_open'] = '<li>';
        $pconfig['last_tag_close'] = '</li>';
        $pconfig['next_tag_open'] = '<li>';
        $pconfig['next_tag_close'] = '</li>';
        $pconfig['prev_tag_open'] = '<li>';
        $pconfig['prev_tag_close'] = '</li>';
        $pconfig['cur_tag_open'] = '<li><a href="#" class="pagination">';
        $pconfig['cur_tag_close'] = '</a></li>';
        $pconfig['num_tag_open'] = '<li>';
        $pconfig['num_tag_close'] = '</li>';
        
        $this->pagination->initialize($pconfig);
        
        $pageslink = $this->pagination->create_links();
        
        $this->view('index', array(
            'require_js' => true,
            'table_data' => $table_data,
            'pagelink' => $pageslink
        ));
    }
    
    public function localarm($id=0){
        
//         $this->load->model('People_info_model');
        $this->load->model('Locarea_info_model');
        $this->load->model('Alarm_loc_model');
        
        $data = array();
        
        $data1 = $this->Locarea_info_model->select("locarea_id = ".$id." or parentid = ".$id);
        
        foreach ($data1 as $k => $v){
            $data2 = $this->Alarm_loc_model->select("locarea_id = ".$v['locarea_id']);
            if($data2){
                foreach($data2 as $kk => $vv){
                    $data3 = $this->Prisonerinfo_model->get_one("watch_id = ".$vv['watch_id']);
                    
                    if ($data3){
                        array_push($data, array(
                            $data3['people_id'],
                            $data3['people_name'],
                            $data3['watch_id'],
                            $data3['dep_id'],
                            $v['locarea_id']
                        ));
                    }
                }
            }
        }
        
        
        $this->load->library('table');
        $template = array(
            'table_open' => '<table class="table table-hover dataTable">'
        );
        $this->table->set_template($template);
        $this->table->set_heading('编号', '姓名', '腕带编号', '部门号码', '区域号码');
        
        $table_data = $this->table->generate($data);
        
        // create pageination
        $this->load->library('pagination');
        
        $pconfig['base_url'] = base_url() . 'adminpanel/people_info/localarm/'.$id;
        $pconfig['total_rows'] = count($data);
        $pconfig['per_page'] = 20;
        $pconfig['full_tag_open'] = '<ul class="pagination">';
        $pconfig['full_tag_close'] = '</ul>';
        $pconfig['first_tag_open'] = '<li>';
        $pconfig['first_tag_close'] = '</li>';
        $pconfig['last_tag_open'] = '<li>';
        $pconfig['last_tag_close'] = '</li>';
        $pconfig['next_tag_open'] = '<li>';
        $pconfig['next_tag_close'] = '</li>';
        $pconfig['prev_tag_open'] = '<li>';
        $pconfig['prev_tag_close'] = '</li>';
        $pconfig['cur_tag_open'] = '<li><a href="#" class="pagination">';
        $pconfig['cur_tag_close'] = '</a></li>';
        $pconfig['num_tag_open'] = '<li>';
        $pconfig['num_tag_close'] = '</li>';
        
        $this->pagination->initialize($pconfig);
        
        $pageslink = $this->pagination->create_links();
        
        $this->view('index', array(
            'require_js' => true,
            'table_data' => $table_data,
            'pagelink' => $pageslink
        ));
    }
}

?>
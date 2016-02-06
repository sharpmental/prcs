<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class People_detail_model extends Base_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->table_name = "tb_people_detail";
    }

    public function getlist()
    {
        $data = $this->query("select people_id, name from " . $this->table_name);
        
        if ($data)
            return $data->result_array();
        else
            return null;
    }

    public function getallreg()
    {
        $data = $this->query("select * from " . $this->table_name . ' where  status = 1');
        
        if ($data)
            return $data->result_array();
        else
            return null;
    }
    
    public function getbyid($id){
        $data = $this->query('select * from '.$this->table_name.' where people_id = '.$id);
        return $data;
    }
}

?>
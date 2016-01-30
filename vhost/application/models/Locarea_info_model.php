<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class Locarea_info_model extends Base_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->table_name = "tb_locarea_info";
    }

    public function getall()
    {
        $data = $this->query("select * from tb_locarea_info");
        return $data;
    }

    public function getlist()
    {
        $data = $this->db->query("select locarea_id, locarea_name from " . $this->table_name);
        
        if ($data)
            return $data->result_array();
        else
            return null;
    }

    public function getbyparentid($id = 0)
    {
        $data = $this->db->query("select locarea_id from " . $this->table_name . " where parentid = " . $id);
        if ($data)
            return $data->result_array();
        else
            return null;
    }

    public function getname($id = 0)
    {
        $data = $this->db->query("select locarea_name from " . $this->table_name . " where locarea_id = " . $id);
        if ($data)
            return $data->row_array();
        else
            return null;
    }
}

?>
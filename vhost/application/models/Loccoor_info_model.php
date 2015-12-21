<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Loccoor_info_model extends Base_Model
{
    public function __construct() {
        parent::__construct();
        $this->table_name = "tb_loccoor_info";
    }
    
    public function getlist(){
        $data = $this->db->query("select coor_id, coor_name from ".$this->table_name);
        
        if($data)
            return $data->result_array();
        else
            return null;
    }
}

?>
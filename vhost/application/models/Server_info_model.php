<?php

class Server_info_model extends \Base_Model
{
    public function __construct(){
        parent::__construct();
        $this->table_name="tb_server_info";
    }
    
    public function getfromview($offset='0', $limit='20'){
        $data = $this->db->get($this->table_name, intval($limit), intval($offset));
        return $data;
    }
    
    public function getfromkeyword($keyword){
        if($keyword)
            $data = $this->query("select * from ".$this->table_name." where server_name like '%".$keyword."%' or server_id like '%".$keyword."%'");
            else
                $data = $this->query("select * from ".$this->table_name);
    
        return $data;
    }
    
}

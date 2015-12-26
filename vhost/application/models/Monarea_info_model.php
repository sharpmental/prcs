<?php
class Monarea_info_model extends Base_model{
	public function __construct() {
		parent::__construct();
		$this->table_name = 'tb_monarea_info';
	}
	
	public function getall() {
		$data = $this->query("select * from tb_monarea_info");
		return $data;
	}
	
	public function getlist(){
	    $data = $this->db->query("select monarea_id, monarea_name from ".$this->table_name);
	
	    if($data)
	        return $data->result_array();
	        else
	            return null;
	}
}
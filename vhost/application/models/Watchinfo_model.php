<?php
class Watchinfo_model extends Base_model{
	public function __construct() {
		parent::__construct();
		$this->table_name = 'tb_watch_info';
	}
	
	public function getall() {
		$data = $this->query("select * from tb_watch_info");
		return $data;
	}
	
	public function getlist(){
	    $data = $this->query("select watch_id from ".$this->table_name);
	    
	    if($data)
	        return $data->result_array();
	    else
	        return null;
	}
}
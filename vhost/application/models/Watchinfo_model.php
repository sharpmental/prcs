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
	    $data = $this->query("select watch_id from ".$this->table_name.' where watch_status = 0');
	    
	    if($data)
	        return $data->result_array();
	    else
	        return null;
	}
	
	public function setstatus($id=0){
	    $data = $this->update(array(
	        'watch_status' => 1
	    ),
	        'watch_id = '.$id);
	    
	    return $data;
	}
	
	public function unsetstatus($id=0){
	    $data = $this->update(array(
	        'watch_status' => 0
	    ),
	        'watch_id = '.$id);
	     
	    return $data;
	}
}
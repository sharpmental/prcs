<?php
class Prisonerinfo_model extends Base_model{
	public function __construct() {
		parent::__construct();
		$this->table_name = 'people_view';
	}
	
	public function getall() {
		$data = $this->query("select * from people_view");
		return $data;
	}
	
	public function getfromview($offset='0', $limit='20'){
		$data = $this->db->get('people_view', intval($limit), intval($offset));
		return $data;
	}
	
	public function getfromkeyword($keyword){
		if($keyword)
			$data = $this->query("select * from people_view where people_name like '%".$keyword."%' or people_id like '%".$keyword."%'");
		else 
			$data = $this->query("select * from people_view");
		
		return $data;
	}
	
	public function getoutpeople(){
	    $data = $this->query("select * from people_view where status <> 0 ");
	    return $data;
	}

	public function getlostpeople(){
	    $data = $this->query("select * from people_view where status <> 0 or watch_status <> 0");
	    return $data;
	}
	
	public function getinsidepeople(){
	    $data = $this->query("select * from people_view where status = 0 and watch_status = 0");
	    return $data;
	}
}
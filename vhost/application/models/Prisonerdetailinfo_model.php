<?php
class Prisonerdetailinfo_model extends Base_model{
	public function __construct() {
		parent::__construct();
		$this->table_name = 'tb_people_detail';
	}
	
	public function getbyid($id){
		$data = $this->query('select * from tb_people_detail where people_id = '.$id);
		return $data;
	}
	
	public function getbystatus($status){
		$data = $this->query('select * from tb_people_detail where status = '.$status);
		return $data;
	}
}
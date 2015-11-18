<?php
class Peoplecountview_model extends Base_model{
	public function __construct() {
		parent::__construct();
		$this->table_name = 'people_count_view';
	}
	
	public function getall() {
		$data = $this->query("select * from ".$this->table_name);
		return $data;
	}
}
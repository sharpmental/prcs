<?php
class Monarea_model extends Base_model{
	public function __construct() {
		parent::__construct();
		$this->table_name = 'tb_monarea_info';
	}
	
	public function getall() {
		$data = $this->query("select * from tb_monarea_info");
		return $data;
	}
	
}
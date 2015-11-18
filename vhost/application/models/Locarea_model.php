<?php
class Locarea_model extends Base_model{
	public function __construct() {
		parent::__construct();
		$this->table_name = 'tb_locarea_info';
	}
	
	public function getall() {
		$data = $this->query("select * from tb_locarea_info");
		return $data;
	}
}
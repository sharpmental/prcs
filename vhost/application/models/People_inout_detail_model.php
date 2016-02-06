<?php
class People_inout_detail_model extends Base_model{
	public function __construct() {
		parent::__construct();
		$this->table_name = 'tb_people_inout_detail';
	}
	
	public function getwithlimit($offset = '0', $limit = '2000')
	{
	    $data = $this->db->get($this->table_name, intval($limit), intval($offset));
	    return $data;
	}
}
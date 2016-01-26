<?php
class Tablelist_model extends Base_model{
	public function __construct() {
		parent::__construct();
		$this->table_name = 'tb_table_edit_list';
	}
	
	public function getall() {
		$data = $this->query("select * from ".$this->table_name);
		return $data;
	}
	
	public function getbytype($type){
	    $data = $this->query("select * from ".$this->table_name." where type = ".intval($type));
	    return $data;
	}
	
	public function gettable($table_name){
		$data = $this->query("select * from ".$table_name);
		return $data;
	}
	
	public function gettablelimit($table_name, $start='0', $limit='20'){
		$data = $this->db->get($table_name, intval($start), intval($limit));
		return $data;
	}
	
	public function getbyid ($id){
		$data = $this->query('select * from '.$this->table_name.' where id = '.intval($id));
		return $data;
	}
	
	public function gettablefields ($table_name){
		$fields = $this->db->list_fields($table_name);
		return $fields;
	}
	
	public function gettablestatus($table_name, $where){
		$data = $this->query("select * from ".$table_name." where ".$where);
		return $data;
	}
	
	public function gettypebyname($table_name){
	    $data = $this->query("select type from ".$this->table_name." where table_name = '".$table_name."'");
	    return $data;
	}
}
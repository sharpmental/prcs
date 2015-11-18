<?php
class Prisonerinout_model extends Base_model{
	public function __construct() {
		parent::__construct();
		$this->table_name = 'tb_people_inout';
	}
	
	public function togglestatusbyid($id){
		$data = $this->get_one("people_id = ".$id);
		if (!isset($data) || !isset($data['status'])){
			$result = array(
					"people_id" => $id,
// 					"name" => 'NA',
					"watch_id" => '0',
					"area_id" => '0',
					"outtime" => date("Y-m-d h:i:s"),
					"memo" => 'approved by admin',
					"status" => '1',
					"update_timestamp" => date("Y-m-d h:i:s")
					);
			$this->insert($result);
		}
		else if($data['status'] == 0){
			$data['outtime'] = date("Y-m-d h:i:s");
			$data['status'] = 1;
			$data['update_timestamp'] = date("Y-m-d h:i:s");
			$data['memo'] = 'approved by admin';
			$this->update($data, 'people_id ='.$id);
		}
		else{
			$data['intime'] = date("Y-m-d h:i:s");
			$data['status'] = 0;
			$data['update_timestamp'] = date("Y-m-d h:i:s");
			$data['memo'] = 'back checked by admin';
			$this->update($data, 'people_id ='.$id);
		}
	}
}
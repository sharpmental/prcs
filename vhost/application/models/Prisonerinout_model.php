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
			$this->query("insert into tb_people_inout_detail (people_id, watch_id, area_id, outtime, status, update_timestamp) "." values (".$id.", 0, 0, '".date("Y-m-d h:i:s")."', 1,'".date("Y-m-d h:i:s")."')");
		}
		else if($data['status'] == 0){
			$data['outtime'] = date("Y-m-d h:i:s");
			$data['status'] = 1;
			$data['update_timestamp'] = date("Y-m-d h:i:s");
			$data['memo'] = 'approved by admin';
			$this->update($data, 'people_id ='.$id);
			$this->query("insert into tb_people_inout_detail (people_id, watch_id, area_id, outtime, status, update_timestamp) "." values (".$id.", ".$data['watch_id'].", ".$data['area_id'].", '".date("Y-m-d h:i:s")."', 1, '".date("Y-m-d h:i:s")."')");
		}
		else{
			$data['intime'] = date("Y-m-d h:i:s");
			$data['status'] = 0;
			$data['update_timestamp'] = date("Y-m-d h:i:s");
			$data['memo'] = 'back checked by admin';
			$this->update($data, 'people_id ='.$id);
			$this->query("insert into tb_people_inout_detail (people_id, watch_id, area_id, outtime, status, update_timestamp) "." values (".$id.", ".$data['watch_id'].", ".$data['area_id'].", '".date("Y-m-d h:i:s")."', 0, '".date("Y-m-d h:i:s")."')");
		}
	}
}
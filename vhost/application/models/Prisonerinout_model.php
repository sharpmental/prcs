<?php

class Prisonerinout_model extends Base_model
{

    public function __construct()
    {
        parent::__construct();
        $this->table_name = 'tb_people_inout';
    }

    public function togglestatusbyid($id)
    {
        $data = $this->get_one("people_id = " . $id);
        if (! isset($data) || ! isset($data['status'])) {
            $result = array(
                "people_id" => $id,
                // "name" => 'NA',
                "watch_id" => '0',
                "area_id" => '0',
                "outtime" => date("Y-m-d h:i:s"),
                "memo" => 'approved by admin',
                "status" => '1',
                "update_timestamp" => date("Y-m-d h:i:s")
            );
            $this->insert($result);
            $this->query("insert into tb_people_inout_detail (people_id, watch_id, area_id, outtime, status, update_timestamp) " . " values (" . $id . ", 0, 0, '" . date("Y-m-d h:i:s") . "', 1,'" . date("Y-m-d h:i:s") . "')");
        } else 
            if ($data['status'] == 0) {
                $data['outtime'] = date("Y-m-d h:i:s");
                $data['status'] = 1;
                $data['update_timestamp'] = date("Y-m-d h:i:s");
                $data['memo'] = 'approved by admin';
                $this->update($data, 'people_id =' . $id);
                $this->query("insert into tb_people_inout_detail (people_id, watch_id, area_id, outtime, status, update_timestamp) " . " values (" . $id . ", " . $data['watch_id'] . ", " . $data['area_id'] . ", '" . date("Y-m-d h:i:s") . "', 1, '" . date("Y-m-d h:i:s") . "')");
            } else {
                $data['intime'] = date("Y-m-d h:i:s");
                $data['status'] = 0;
                $data['update_timestamp'] = date("Y-m-d h:i:s");
                $data['memo'] = 'back checked by admin';
                $this->update($data, 'people_id =' . $id);
                $this->query("insert into tb_people_inout_detail (people_id, watch_id, area_id, intime, status, update_timestamp) " . " values (" . $id . ", " . $data['watch_id'] . ", " . $data['area_id'] . ", '" . date("Y-m-d h:i:s") . "', 0, '" . date("Y-m-d h:i:s") . "')");
            }
    }

    public function setstatusout($id)
    {
        if (intval($id) == 0)
            return;
        
        $data = $this->get_one("people_id = " . $id);
        if ($data) {
            if (($data['status'] == '0')) {
                
                $data1['outtime'] = date("Y-m-d h:i:s");
                $data1['status'] = 1;
                $data1['update_timestamp'] = date("Y-m-d h:i:s");
                $data1['memo'] = 'approved by admin';
                $this->update($data1, 'people_id =' . $id);
                $this->query("insert into tb_people_inout_detail (people_id, watch_id, area_id, outtime, status, update_timestamp) " . " values (" . $id . ", " . $data['watch_id'] . ", " . $data['area_id'] . ", '" . date("Y-m-d h:i:s") . "', 1, '" . date("Y-m-d h:i:s") . "')");
            }
        } else {
            $this->load->model("People_info_model");
            
            $data2 = $this->People_info_model->get_one("people_id = " . $id);
            if ($data2) {
                $watch_id = $data2['watch_id'];
            } else
                $watch_id = '0';
            
            $result = array(
                "people_id" => $id,
                "watch_id" => $watch_id,
                "area_id" => '0',
                "outtime" => date("Y-m-d h:i:s"),
                "memo" => 'approved by admin',
                "status" => '1',
                "update_timestamp" => date("Y-m-d h:i:s")
            );
            $this->insert($result);
            $this->query("insert into tb_people_inout_detail (people_id, watch_id, area_id, outtime, status, update_timestamp) " . " values (" . $id . ", " . $watch_id . ", 0, '" . date("Y-m-d h:i:s") . "', 1,'" . date("Y-m-d h:i:s") . "')");
        }
    }

    public function setstatusin($id)
    {
        if (intval($id) == 0)
            return;
        
        $data = $this->get_one("people_id = " . $id);
        if ($data) {
            if (($data['status'] == '1')) {
                
                $data1['intime'] = date("Y-m-d h:i:s");
                $data1['status'] = '0';
                $data1['update_timestamp'] = date("Y-m-d h:i:s");
                $data1['memo'] = 'approved by admin';
                $this->update($data1, 'people_id =' . $id);
                $this->query("insert into tb_people_inout_detail (people_id, watch_id, area_id, intime, status, update_timestamp) " . " values (" . $id . ", " . $data['watch_id'] . ", " . $data['area_id'] . ", '" . date("Y-m-d h:i:s") . "', 0, '" . date("Y-m-d h:i:s") . "')");
            }
        } else {
            $this->load->model("People_info_model");
            
            $data2 = $this->People_info_model->get_one("people_id = " . $id);
            if ($data2) {
                $watch_id = $data2['watch_id'];
            } else
                $watch_id = '0';
            
            $result = array(
                "people_id" => $id,
                "watch_id" => $watch_id,
                "area_id" => '0',
                "intime" => date("Y-m-d h:i:s"),
                "memo" => 'approved by admin',
                "status" => '0',
                "update_timestamp" => date("Y-m-d h:i:s")
            );
            $this->insert($result);
            $this->query("insert into tb_people_inout_detail (people_id, watch_id, area_id, intime, status, update_timestamp) " . " values (" . $id . ", " . $watch_id . ", 0, '" . date("Y-m-d h:i:s") . "', 0,'" . date("Y-m-d h:i:s") . "')");
        }
    }

    public function getwithlimit($offset = '0', $limit = '2000')
    {
        $data = $this->db->get($this->table_name, intval($limit), intval($offset));
        return $data;
    }
}
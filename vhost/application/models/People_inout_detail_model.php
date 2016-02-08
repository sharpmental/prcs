<?php

class People_inout_detail_model extends Base_model
{

    public function __construct()
    {
        parent::__construct();
        $this->table_name = 'tb_people_inout_detail';
    }

    public function getwithlimit($offset = '0', $limit = '2000')
    {
        $data = $this->db->get($this->table_name, intval($limit), intval($offset));
        if ($data)
            return $data->result_array();
        else
            return null;
    }

    public function getbyKeyandDate($key, $start, $end, $limit = 2000)
    {
        $res = array();
        $s = strtotime($start);
        $e = strtotime($end);
        
        $data = $this->select("people_id like '" . $key."' or watch_id like '".$key."'", '*', $limit);
        if ($data) {
            foreach ($data as $k => $v) {
                $i = strtotime($v['intime']);
                $j = strtotime($v['outtime']);
                if (($i >= $s) && ($i <= $e)) {
                    array_push($res, $v);
                } elseif (($j >= $s) && ($j <= $e)) {
                    array_push($res, $v);
                } else;
            }
        }
        
        return $res;
    }
}
<?php

class Logging_info_model extends \Base_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->table_name = "tb_logging";
    }

    public function getfromview($offset = '0', $limit = '20')
    {
        $data = $this->db->get($this->table_name, intval($limit), intval($offset));
        return $data;
    }

    public function getfromkeyword($keyword)
    {
        if ($keyword)
            $data = $this->query("select * from " . $this->table_name . " where operator_id like '%" . $keyword . "%' or name like '%" . $keyword . "%'");
        else
            $data = $this->query("select * from " . $this->table_name);
        
        return $data;
    }
    
    public function getbyKeyandDate($key, $start, $end, $limit = 2000)
    {
        $res = array();
        $s = strtotime($start);
        $e = strtotime($end);
    
        $data = $this->select("operator_id like '" . $key."' or name like '".$key."'", '*', $limit);
        if ($data) {
            foreach ($data as $k => $v) {
                $i = strtotime($v['login_time']);
                $j = strtotime($v['logout_time']);
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

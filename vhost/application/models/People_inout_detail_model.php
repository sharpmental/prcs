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
        $this->db->order_by("inout_id", "ASC");
        $data = $this->db->get($this->table_name, intval($limit), intval($offset));
        if ($data)
            return $data->result_array();
        else
            return null;
    }

    public function getbyKeyandDate($key, $start, $end, $limit = 2000)
    {
        $res = array();
        
        $s=date_create($start);
        $e=date_create($end);
        
        $this->db->order_by("inout_id", "ASC");
        $data = $this->select("people_id like '" . $key."' or watch_id like '".$key."'", '*', $limit);
        if ($data) {
            foreach ($data as $k => $v) {
                $i = date_create($v['intime']);
                $j = date_create($v['outtime']);
                
                if ($i && ($i >= $s) && ($i <= $e)) {
                    array_push($res, $v);
//                     array_push($res, array(
//                         $v['inout_id'],
//                         'this is the intime items!',
//                         'start time stamp'.($s->format("Y-m-d H:i:s")),
//                         'end time stamp'.($e->format("Y-m-d H:i:s")),
//                         $v['intime'],
//                         $v['outtime'],
//                         'intime stamp'.($i->format("Y-m-d H:i:s")),
//                         'outtime stamp'.($j->format("Y-m-d H:i:s"))
//                     ));
                    
                } elseif ($j && ($j >= $s) && ($j <= $e)) {
                    array_push($res, $v);
//                     array_push($res, array(
//                         $v['inout_id'],
//                         'this is the outtime items!',
//                         'start time stamp'.($s->format("Y-m-d H:i:s")),
//                         'end time stamp'.($e->format("Y-m-d H:i:s")),
//                         $v['intime'],
//                         $v['outtime'],
//                         'intime stamp'.($i->format("Y-m-d H:i:s")),
//                         'outtime stamp'.($j->format("Y-m-d H:i:s"))
//                     ));
                    
                    
                } else{//Debug only
//                         array_push($res, array(
//                         $v['inout_id'],
//                         'this is the removed items!',
//                         'start time stamp'.($s->format("Y-m-d H:i:s")),
//                         'end time stamp'.($e->format("Y-m-d H:i:s")),
//                         $v['intime'],
//                         $v['outtime'],
//                         'intime stamp'.($i->format("Y-m-d H:i:s")),
//                         'outtime stamp'.($j->format("Y-m-d H:i:s"))
//                         ));
                }
            }
        }
        else{
            array_push($res, array(
                'failed to get data',
                'failed to get data',
                'Not Added!',
                'Not Added!',
                'failed to get data',
                'failed to get data',
                'Not Added!',
                'Not Added!'
            ));
        }
        
        return $res;
    }
}
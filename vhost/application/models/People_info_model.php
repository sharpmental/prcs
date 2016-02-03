<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class People_info_model extends Base_Model
{
    public function __construct() {
        parent::__construct();
        $this->table_name = "tb_people_info";
    }
    
    public function getwatchlist(){
        $data = $this->select("", "watch_id");
        if($data){
            $l = array();
            foreach($data as $k => $v){
                array_push($l, $v['watch_id']);            }
            return $l;
        }
        else
            return null;
    }
    
    public function getpeoplelist(){
        $data = $this->select("", "people_id");
        if($data){
            $l = array();
            foreach($data as $k => $v){
                array_push($l, $v['people_id']);            }
                return $l;
        }
        else
            return null;
    }
}

?>
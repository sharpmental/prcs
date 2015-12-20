<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Locarea_info_model extends Base_Model
{
    public function __construct() {
        parent::__construct();
        $this->table_name = "tb_locarea_info";
    }
    
    public function getall() {
        $data = $this->query("select * from tb_locarea_info");
        return $data;
    }
}

?>
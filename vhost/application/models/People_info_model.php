<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class People_info_model extends Base_Model
{
    public function __construct() {
        parent::__construct();
        $this->table_name = "tb_people_info";
    }
}

?>
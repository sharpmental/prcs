<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dep_ru_location_model extends Base_Model
{
    public function __construct() {
        parent::__construct();
        $this->table_name = "tb_dep_ru_location";
    }
    
}

?>
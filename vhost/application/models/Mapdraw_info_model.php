<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mapdraw_info_model extends Base_Model
{
    public function __construct() {
        parent::__construct();
        $this->table_name = "tb_mapdraw_info";
    }
    
}

?>
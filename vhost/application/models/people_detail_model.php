<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class People_detail_model extends \Base_Model
{
    public function __construct() {
        parent::__construct();
        $this->table_name = "tb_people_detail";
    }
}

?>
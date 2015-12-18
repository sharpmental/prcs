<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class People_info extends Admin_Controller
{
    public function __construct(){
        parent::__construct();
    }
    
    public function add(){
        if($this->input->is_ajax_request())
        {
        
        }
        else{
            $this->view("add");
        }
    }
    
    public function modify($id){
        
    }
    
    public function delete($id){
        
    }
}

?>
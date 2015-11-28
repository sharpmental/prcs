<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Member_model extends Base_Model {

	var $page_size = 10;
	public function __construct() {
		$this->table_name = 'operator_info';
		parent::__construct();
	}
	
	function check_username_exists($username)
	{
		$c = $this->count("operator_user ='".$username."' or operator_name = '".$username."'");
		return $c;
	}
	
	function quick_register($username,$password,$encrypt='',$mobileno='')
	{
		if(!$this->check_username_exists($username))
		{
// 			$password = md5(md5($password.$encrypt));
			$password = $password.$encrypt;
			$newid = $this->insert(
					array(  'operator_name'=>$username,
							'operator_user'=>$username,
							'operator_pwd'=>$password,
							'operator_power'=>1,
							'reg_ip'=>$this->input->ip_address(),
							'reg_time'=>SYS_DATETIME,
							'encrypt'=>$encrypt,
							'last_login_ip'=>$this->input->ip_address(),
							'last_login_time'=>SYS_DATETIME,
							'update_timestamp'=>date('Y-m-d H:i:s')));
			
			return $newid;
		}
		return 0;
	}
	
	function quick_changpwd($username,$password,$encrypt='',$mobileno='')
	{
		if($this->check_username_exists($username))
		{
// 			$password = md5(md5($password.$encrypt));
			$password = $password.$encrypt;
			$status = $this->update(
					array('encrypt'=>$encrypt,
						  	'operator_pwd'=>$password,
							'update_timestamp'=>date('Y-m-d H:i:s')),
					array('operator_name'=>$username));
			
			return $status;
		}
		return 0;
	}
	
	function default_info(){
		return array(
					'user_id'=>0,
					'username'=>'',
					'email'=>'',
					'password'=>'',
					'mobile'=>'',
					'fullname'=>'',
					'avatar'=>'nopic.gif',
					'group_id'=>0,
					'operator_name' => '',
					'operator_user' => '',
					'is_lock'=>false,
					);
	}
	
	public function getall()
	{
		$data = $this->query("select * from tb_operator_info");
		
		return $data;
	}
	
}

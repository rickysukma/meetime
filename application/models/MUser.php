<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Supono | @soepono
 * Description: Login model class
 */
class MUser extends CI_Model{
	var $tuser = "user";
	
	function __construct(){
		parent::__construct();
		//åsession_start();
	}
	
	public function validate(){
		$username = $this->security->xss_clean($this->input->post('username'));
		$password = $this->security->xss_clean($this->input->post('password'));
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		//$this->db->where('status', 1);
		$this->db->limit(1);
		$query = $this->db->get($this->tuser);
		// Let's check if there are any results		
		if($query->num_rows() == 1){
			// If there is a user, then create session data
			$row = $query->row();
			$data = array(
					'user_id'=>$row->id,
					'username'=>$row->username,
					'name'=>$row->name,
					'email'=>$row->email,
					'level'=>$row->level,
					'last_login'=>$row->last_login,
					'isLogin'=>true,
					'typeaccount'=>$row->typeaccount
					);
			$this->session->set_userdata($data);
			// print_r($this->session->userdata());die;
			$this->db->where('username', $username);
			// update last login and IP Adress where he is login
			$this->db->update($this->tuser, array(
											'last_login'=>date('Y-m-d H:i:s'),
											'ip_address'=>$this->getIpAdress()
											));
			return true;
		}
		// If the previous process did not validate, then return false.
		return false;
	}
	
	public function edit($username,$name,$email){
		$this->db->where('username', $username);
		$result = $this->db->update($this->tuser, array('name'=>$name,'email'=>$email));
		return $result;		
	}
	
	public function getDetail(){
		$condition = array("username"=>$this->session->userdata('username'));
		$query = $this->db->get_where($this->tuser,$condition);
		return $query->result();
	}
	
	public function changePassword($password){
		$this->db->where('username', $this->session->userdata('username'));
		$result = $this->db->update($this->tuser, array('password'=>md5($password)));
		return $result;
	}
	
	// checking password for change password identification
	public function checkPassword($password){
		$condition = array("password"=>md5($password));
		$query = $this->db->get_where($this->tuser,$condition);
		if ($query->result()){
			return true;
		} else {
			return false;
		}
	}
	
	public function getIpAdress(){
		if (!empty($_SERVER["HTTP_CLIENT_IP"])){
			//check for ip from share internet
			$ip = $_SERVER["HTTP_CLIENT_IP"];
		} elseif (!empty($_SERVER["HTTP_X_FORWARDED_FOR"])) {
			// Check for the Proxy User
			$ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
		} else {
			$ip = $_SERVER["REMOTE_ADDR"];
		}
		// This will print user's real IP Address
		// does't matter if user using proxy or not.
		return $ip;
	}
	
	public function getAff($id=''){
	    $this->db->select('name, phone');
	    $this->db->where('id', $id);
	    $data = $this->db->get('user');
	    return $data->result();
	}
	
	public function getNameById($id){
		$condition = array("id"=>$id);
		$query = $this->db->get_where($this->tuser,$condition);
		$row = $query->result();
		//print_r($row); exit;
		return $row[0]->name;	
	}
}
?>
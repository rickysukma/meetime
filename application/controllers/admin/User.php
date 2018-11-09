<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Supono | @soepono
 * Description: User controller class
 * User asses to admin area: update profile, change password
 */
 class User extends CI_Controller{
	function __construct(){
		parent::__construct();
		if (!$this->session->userdata('isLogin') and (!$this->session->userdata('level')=='A')){
			redirect('admin/login');
		}
		$this->load->model('MUser');
	}
	
	public function index(){
		$data['active'] = "home";
		$data['profile'] = $this->MUser->getDetail();
		$this->load->view('backend/user/profile', $data);
	}
	
	public function edit(){
		$data['active'] = "edit";
		$data['profile'] = $this->MUser->getDetail();
		$this->load->view('backend/user/edit', $data);
	}
	
	public function do_edit(){
		$name = $this->security->xss_clean($this->input->post('name'));
		$email = $this->security->xss_clean($this->input->post('email'));
		$result = $this->MUser->edit($this->session->userdata('username'), $name, $email);
		if ($result){
			$this->session->set_flashdata('update_profile', true);
			redirect('admin/user');
		} else {
			redirect('admin/user/edit');
		}
	}
	
	public function password(){
		$data['active'] = "passwd";
		$this->load->view('backend/user/password', $data);
	}
	
	public function do_password(){
		$old_password = $this->security->xss_clean($this->input->post('old_password'));
		$check_passwd = $this->MUser->checkPassword($old_password);
		if ($check_passwd){
			$new_password = $this->security->xss_clean($this->input->post('repassword'));
			$this->MUser->changePassword($new_password);
			$this->session->set_flashdata('pwd_true', true);
		} else {
			$this->session->set_flashdata('pwd_failed', true);
		}
		redirect('admin/user/password');
	}
		
 }
 ?>
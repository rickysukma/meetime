<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Supono | @soepono
 * Description: Home controller class
 * This is only viewable to those members that are logged in
 */
 class Home extends CI_Controller{
	function __construct(){
		parent::__construct();
		if (!$this->session->userdata('isLogin') and (!$this->session->userdata('level')=='A')){
			redirect('admin/login');
		} 
	}
	
	public function index(){
		$data['main_menu'] = "dash";
		$this->load->view('backend/home', $data);
	}
		
	public function do_logout(){
		$this->session->sess_destroy();
		redirect('admin/login');
	}
 }
 ?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Supono | @soepono
 * Description: Pages controller class
 * User asses to admin area: CRUD
 */
class General extends CI_Controller{
	 
	function __construct(){
		parent::__construct();
		if (!$this->session->userdata('isLogin') and (!$this->session->userdata('level')=='A')){
			redirect('admin/login');
		}
		$this->load->model(array('MGeneral','MUser'));
	}
	
	public function index(){
		$data['main_menu'] = "general";
		$data['result'] = $this->MGeneral->getList();
		$this->load->view('backend/general/list', $data);
	}
	
	public function edit($id=NULL){
		$data['main_menu'] = "general";
		$this->load->library('form_validation');
		$submit = $this->input->post('submit');
		if ($submit){
			$value = $this->input->post('value');
			$id = $this->input->post('id');
			$this->form_validation->set_rules('value', 'Judul', 'required');
			if ($this->form_validation->run()==FALSE){
				$data['errors'] = TRUE;
			} else {
				$this->MGeneral->setData($value);
				$this->MGeneral->edit($id);
				$this->session->set_flashdata('success', true);
				redirect('admin/general');
			}
		} else {
			$data['detail'] = $this->MGeneral->detail($id);
		}
		$this->load->view('backend/general/edit', $data);
	}
	
 }
 ?>
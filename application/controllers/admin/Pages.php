<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Agus Merdeko | agus.merdeko@gmail.com
 * Description: Pages controller class
 * User asses to admin area: CRUD
 */
class Pages extends CI_Controller{
	 
	function __construct(){
		parent::__construct();
		if (!$this->session->userdata('isLogin') and (!$this->session->userdata('level')=='A')){
			redirect('admin/login');
		}
		$this->load->model(array('MPages','MUser'));
	}
	
	public function index(){
		$data['main_menu'] = "pages";
		$data['result'] = $this->MPages->getList();
		$this->load->view('backend/pages/list', $data);
	}
	
	public function add($id=NULL){
		$data['main_menu'] = "pages";
		$this->load->library('form_validation');
		$submit = $this->input->post('submit');
		if ($submit){
			$title = $this->input->post('title');
			$menu_name = $this->input->post('menu_name');
			$position = $this->input->post('position');
			$order_seq = $this->input->post('order_seq');
			$description = $this->input->post('description');
			$id = $this->input->post('id');
			$this->form_validation->set_rules('title', 'Judul Halaman', 'required');
			$this->form_validation->set_rules('menu_name', 'Nama Menu', 'required');
			$this->form_validation->set_rules('position', 'Menu', 'required');
			$this->form_validation->set_rules('order_seq', 'Menu Order', 'integer|required');
			$this->form_validation->set_rules('description', 'Deskripsi Halaman', 'required');
			if ($this->form_validation->run()==FALSE){
				$data['errors'] = TRUE;
			} else {
				if ($id){
					$data['detail'] = $this->MPages->detail($id);
				}
				$this->MPages->setData($title,$menu_name,$position,$order_seq,$description,$this->session->userdata('user_id'));
				if ($id){
					$client_id = $this->MPages->edit($id);
					$this->session->set_flashdata('success', true);
					redirect('admin/pages/add/'.$id);
				} else {
					$client_id = $this->MPages->add();
				}
				$this->session->set_flashdata('success', true);
				redirect('admin/pages/add/'.$client_id);
			}
		} else {
			$data['detail'] = $this->MPages->detail($id);
		}
		$this->load->view('backend/pages/add', $data);
	}
	
	public function detail($id){
		$data['main_menu'] = "pages";
		$data['detail'] = $this->MPages->detail($id);
		$this->load->view('backend/pages/detail', $data);
	}

	public function delete($id){
		$result = $this->MPages->detail($id);
		if ($result){	
			$this->MPages->delete($id);
		}
		$this->session->set_flashdata('success', true);
		redirect('admin/pages');
	}
		
 }
 ?>
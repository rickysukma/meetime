<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Supono | @soepono
 * Description: Slideshow controller class
 * User asses to admin area: CRUD
 */
 class Slideshow extends CI_Controller{

    var $thumbnail_main_pic = 200;
    var $medium_main_pic = 1170;
    var $path_main_pic = "assets/images/slideshow/";  
	 
	function __construct(){
		parent::__construct();
		if (!$this->session->userdata('isLogin') and (!$this->session->userdata('level')=='A')){
			redirect('admin/login');
		}
		$this->load->model('MSlideShow');
	}
	
	public function index(){
		$data['menu'] = "slideshow-all";
		$data['main_menu'] = "slideshow";
		
		$this->load->library('pagination');
		$config['base_url'] = base_url().'admin/slideshow/index/';
		$config['total_rows'] = $this->MSlideShow->getTotal();
		$config['per_page'] = '15';
		$config['uri_segment'] = '4';
		$this->pagination->initialize($config);
		$data['result'] = $this->MSlideShow->getList($config['per_page'],$this->uri->segment(4));
		$array_param = $this->uri->ruri_to_assoc();
		if (empty($array_param)){
			$startlist = "0";
			$currentPage = "1";
		} else {
			$startlist = (key($array_param));
			$currentPage = ($startlist/$config['per_page'])+1;
		}		
		$data['page_info'] = array(
			"record"=>$config['total_rows'],
			"startlist"=>$startlist,
			"current"=>$currentPage,			
			"total"=>ceil($config['total_rows']/$config['per_page']),
			"pagination"=>$this->pagination->create_links()
		);				
		$this->load->view('backend/slideshow/list', $data);
	}
	
	public function add($id=NULL){
		$data['main_menu'] = "slideshow";
		$data['menu'] = "slideshow-add";
		$this->load->library('form_validation');
		$submit = $this->input->post('submit');
		if ($submit){
			$name = $this->input->post('name');
			$description = $this->input->post('description');
			$id = $this->input->post('id');
			$this->form_validation->set_rules('name', 'Nama Slideshow', 'required');
			$this->form_validation->set_rules('description', 'Deskripsi Slideshow', 'required');
			
			if ($this->form_validation->run()==FALSE){
				$data['errors'] = TRUE;
			} else {
				if ($id){
					$data['detail'] = $this->MSlideShow->detail($id);
				}
				if (@$_FILES['picture']['name']!=""){
					$this->load->helper(array('file','do_upload'));
					$result = execute_upload('picture',$this->path_main_pic,$this->thumbnail_main_pic,$this->medium_main_pic);
					if (@$result['upload_data']['is_error']){
						$data['error_upload'] = $result['upload_data']['error_msg'];
						print_r($data['error_upload']);
						echo "Ada masalah dalam penambahan gambar ke server"; exit;
					} else {
						@unlink($this->path_main_pic."main/".$data['detail']->picture);
						@unlink($this->path_main_pic."thumbnail/".$data['detail']->picture);
					}
				} else {
					$result['upload_data']['file_name'] = @$data['detail']->picture;
				}
				$this->MSlideShow->setData($name,$description,$result['upload_data']['file_name']);
				if ($id){
					$slideshow_id = $this->MSlideShow->edit($id);
					$this->session->set_flashdata('success', true);
					redirect('admin/slideshow/add/'.$id);
				} else {
					$slideshow_id = $this->MSlideShow->add();
				}
				$this->session->set_flashdata('success', true);
				redirect('admin/slideshow/add/'.$slideshow_id);
			}
		} else {
			if ($id){
				$data['detail'] = $this->MSlideShow->detail($id);
			}
		}
		$this->load->view('backend/slideshow/add', $data);
	}
	
	public function detail($id){
		$data['main_menu'] = "slideshow";
		$data['detail'] = $this->MSlideShow->detail($id);
		$this->load->view('backend/slideshow/detail', $data);
		
	}
	
	public function delete($id){
		$result = $this->MSlideShow->detail($id);
		if ($result){
			@unlink($this->path_main_pic."main/".$result->picture);
			@unlink($this->path_main_pic."thumbnail/".$result->picture);	
			$this->MSlideShow->delete($id);
		}
		$this->session->set_flashdata('success', true);
		redirect('admin/slideshow');
	}
		
 }
 ?>
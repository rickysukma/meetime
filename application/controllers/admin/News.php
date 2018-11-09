<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Supono | @soepono
 * Description: News controller class
 * User asses to admin area: CRUD
 */
 class News extends CI_Controller{

    var $thumbnail_main_pic = 150;
    var $medium_main_pic = 540;
    var $path_main_pic = "assets/images/news/";  
	 
	function __construct(){
		parent::__construct();
		if (!$this->session->userdata('isLogin') and (!$this->session->userdata('level')=='A')){
			redirect('admin/login');
		}
		$this->load->model('MNews');
		$this->load->model('MUser');
	}
	
	public function index(){
		$data['menu'] = "news-all";
		$data['main_menu'] = "news";
		
		$this->load->library('pagination');
		$config['base_url'] = base_url().'admin/news/index/';
		$config['total_rows'] = $this->MNews->getTotal('Berita');
		$config['per_page'] = '15';
		$config['uri_segment'] = '4';
		$this->pagination->initialize($config);
		$data['result'] = $this->MNews->getList($config['per_page'],$this->uri->segment(4),'Berita');
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

		
		//$data['result'] = $this->MNews->getList();
		$this->load->view('backend/news/list', $data);
	}
	
	public function add($id=NULL){
		$data['main_menu'] = "news";
		$data['menu'] = "news-add";
		$this->load->library('form_validation');
		$submit = $this->input->post('submit');
		if ($submit){
			$title = $this->input->post('title');
			$description = $this->input->post('description');
			$chapter_id = $this->input->post('chapter_id');
			$id = $this->input->post('id');
			$this->form_validation->set_rules('title', 'Judul Berita', 'required');
			$this->form_validation->set_rules('description', 'Deskripsi Berita', 'required');
			
			if ($this->form_validation->run()==FALSE){
				$data['errors'] = TRUE;
			} else {
				if ($id){
					$data['detail'] = $this->MNews->detail($id);
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
				$this->MNews->setData($title,$description,$this->session->userdata('user_id'),$result['upload_data']['file_name'],'Berita');
				if ($id){
					$news_id = $this->MNews->edit($id);
					$this->session->set_flashdata('success', true);
					redirect('admin/news/add/'.$id);
				} else {
					$news_id = $this->MNews->add();
				}
				$this->session->set_flashdata('success', true);
				redirect('admin/news/add/'.$news_id);
			}
		} else {
			if ($id){
				$data['detail'] = $this->MNews->detail($id);
			}
		}
		$this->load->view('backend/news/add', $data);
	}
	
	public function detail($id){
		$data['main_menu'] = "news";
		$data['detail'] = $this->MNews->detail($id);
		$this->load->view('backend/news/detail', $data);
		
	}
	
	public function delete($id){
		$result = $this->MNews->detail($id);
		if ($result){
			@unlink($this->path_main_pic."main/".$result->picture);
			@unlink($this->path_main_pic."thumbnail/".$result->picture);	
			$this->MNews->delete($id);
		}
		$this->session->set_flashdata('success', true);
		redirect('admin/news');
	}
		
 }
 ?>
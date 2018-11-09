<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Easyui extends CI_Controller {

	public function __construct()
	{

		parent::__construct();
		if (!$this->session->userdata('isLogin') and (!$this->session->userdata('level')=='A')){
			redirect('admin/login');
		} 
		unset($_POST['ci_csrf_token']);
		$this->load->model('Easyui_crud');
	}

	public function lists($id)
	{
		$limit = $this->input->get('rows');
		$page = $this->input->get('page');

		$result['total'] = $this->Easyui_crud->get_total($id);
		$result['rows'] = $this->Easyui_crud->get_list($limit,$page,$id);
		$result['ref'] = $this->Easyui_crud->combo_referal($id);
		echo json_encode($result);
	}

	public function do_delete()
	{
		$id = $this->input->post('id');

		if ($this->Easyui_crud->delete_user($id)) {
			echo json_encode(array(
				'success' => true,
				'message' => 'User dengan ID ' . $id . ' telah dihapus!' 
			));
		} else {
			$this->output->set_status_header(401);
		}
	}

	public function form($mode,$type='')
	{
		$data['mode'] = $mode;
		$data['typeaccount'] = $type;
		$this->load->view('backend/easyui/form', $data);
	}

	public function do_save()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('username', 'Username', 'required');

        if ($this->form_validation->run() == FALSE)
        {
            echo json_encode(array(
				'success' => false,
				'message' => 'Username wajib di isi!' 
			));
        }
        else
        {
        	$data = $this->input->post();
    		unset($data['id']);
        	if ($this->input->post('id') == 0) {
        		if ($this->db->insert('user', $data)) {
        			//print_r($data);
        			echo json_encode(array(
						'success' => true,
						'message' => 'data Berhasil Ditambah!' 
					));
        		} else {
        			
        			echo json_encode(array(
						'success' => false,
						'message' => 'Terjadi Kesalahan' 
					));
        		}
        		
        	} else {
        		if ($this->db->where('id', $this->input->post('id'))->update('user', $data)) {
        			echo json_encode(array(
						'success' => true,
						'message' => 'data Berhasil Diubah!' 
					));
        		} else {
        			
        			echo json_encode(array(
						'success' => false,
						'message' => 'Terjadi Kesalahan' 
					));
        		}
        	}

            
        }
	}

	public function edit($id)
	{
		$data = $this->Easyui_crud->find_user($id);
		echo json_encode($data);
	}

}

/* End of file Easyui.php */
/* Location: ./application/controllers/admin/Easyui.php */
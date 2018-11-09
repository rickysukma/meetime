<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Easyui_crud extends CI_Model {

	protected $table = 'user';


	public function __construct()
	{
		parent::__construct();
	}

	public function get_list($limit = 10, $page = 1, $id)
	{
		$offset = ($page -1) * $limit;
		$this->db->where('typeaccount', $id); 
		if($this->session->userdata('user_id')!=1){
			$this->db->where('idsponsor', $this->session->userdata('user_id'));
		}
		$result = $this->db->get('user', $limit, $offset)->result();

		// hapus password dari grid list
		// jika ingin properti di ikutkan tinggal komen kode dibawah
		$result = array_map(function($res) {
			unset($res->password);
			return $res;
		}, $result);

		return $result;
	}

	public function get_total($id)
	{
		$this->db->where('typeaccount', $id); 
		if($this->session->userdata('user_id')!=1){
			$this->db->where('idsponsor', $this->session->userdata('user_id'));
		}
		$result = $this->db->get('user')->num_rows();

		return $result;
	}

	public function combo_referal($id)
	{
		$this->db->where('typeaccount', $id); 
		if($this->session->userdata('user_id')!=1){
			$this->db->where('idsponsor', $this->session->userdata('user_id'));
		}
		$result = $this->db->select('id,username')
				->get('user')->result();

		return $result;
	}

	public function delete_user($id)
	{
		$this->db->where('id', $id);

		return $this->db->delete('user');
	}

	public function find_user($id)
	{
		$this->db->where('id', $id);

		return $this->db->get('user')->row();
	}

}

/* End of file Easyui_crud.php */
/* Location: ./application/models/Easyui_crud.php */
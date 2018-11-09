<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Morder extends CI_Model {

	protected $table = 'order';


	public function __construct()
	{
		parent::__construct();
	}

	public function get_list($limit = 10, $page = 1, $id)
	{
		$offset = ($page -1) * $limit;
		$this->db->where('id_user', $id); 
		$result = $this->db->get('order', $limit, $offset)->result();

		return $result;
	}
    
	public function get_total($id)
	{
		$this->db->where('id_user', $id); 
		$result = $this->db->get('order')->num_rows();
		return $result;
	}
	public function get_list_all($limit = 10, $page = 1, $id)
	{
		$offset = ($page -1) * $limit;
		$this->db->where('id_user', $id); 
		$result = $this->db->get('order_main', $limit, $offset)->result();

		return $result;
	}
	public function get_all_total($id)
	{
		$this->db->where('id_user', $id); 
		$result = $this->db->get('order_main')->num_rows();
		return $result;
	}
	
	public function sum_total($id)
	{
		$this->db->where('id_user', $id);
		$this->db->select_sum('total');
		$result = $this->db->get('order')->result();
		return $result;
	}
	
	public function delete_order($id)
	{
		$this->db->where('id', $id);

		return $this->db->delete('order');
	}
	public function delete_order_all($id_user)
	{
		$this->db->where('id_user', $id_user);

		return $this->db->delete('order');
	}

	public function find_order($id)
	{
		$this->db->where('id', $id);

		return $this->db->get('order')->row();
	}
	public function find_produk($id_produk, $id_user)
	{
		$this->db->where('id_produk', $id_produk);
        $this->db->where('id_user', $id_user);
		return $this->db->get('order')->result();
	}
	public function find_produk_by_user($id_user)
	{
        $this->db->where('id_user', $id_user);
        $query = $this->db->get('order')->result();
        $result = array();
        $i = 0;
        foreach ($query as $row)
        {
                $result[$i]['product_id'] = $row->id_produk;
                $result[$i]['quantity']   = $row->qty;
                $i++;
        }
		return $result;
	}


}

/* End of file Easyui_crud.php */
/* Location: ./application/models/Easyui_crud.php */
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Supono | @soepono
 * Description: News model class
 */
class MPesanan extends CI_Model{
	var $table = "pesanan";
	
	function __construct(){
		parent::__construct();
	}
	
	public function setData($nama,$no_telp,$email,$alamat,$produk,$qty){
		$this->nama = $nama;
		$this->no_telp = $no_telp;
		$this->email = $email;
		$this->produk = $produk;
		$this->qty = $qty;
		$this->alamat = $alamat;
	}
	
	public function add(){
		$arrayData = array(
			'nama'=>$this->nama,
			'no_telp'=>$this->no_telp,
			'email'=>$this->email,
			'produk'=>$this->produk,
			'qty'=>$this->qty,
			'alamat'=>$this->alamat,
		);
		$this->db->insert($this->table, $arrayData); 
		return $this->db->insert_id();
	}
	
	public function edit($id){
		$arrayData = array(
			'nama'=>$this->nama,
			'no_telp'=>$this->no_telp,
			'email'=>$this->email,
			'produk'=>$this->produk,
			'qty'=>$this->qty,
		);
		$this->db->where('id', $id);
		return $this->db->update($this->table, $arrayData); 
	}	
	
	public function getList($num=NULL, $offset=NULL){
		if ($num){
			$this->db->order_by("id", "DESC");
			$this->db->limit($num, $offset);
		}
		$query = $this->db->get($this->table);
		return $query->result();
	}
	
	function getChapterName($id){
		$condition = array("id"=>$id);
		$query = $this->db->get_where($this->table,$condition);
		$row = $query->result();
		return $row[0]->nama;
	}
	
	public function delete($id){
		return $this->db->delete($this->table, array('id'=>$id));
	}
	
	function detail($id){
		$condition = array("id"=>$id);
		$query = $this->db->get_where($this->table,$condition);	
		if($query->num_rows() > 0){
			return $query->row();
		} else {
			return false;
		}
	}	
	
	public function getNameById($id){
		$condition = array("id"=>$id);
		$query = $this->db->get_where($this->table,$condition);
		$row = $query->result();
		return $row[0]->nama;	
	}
}
?>
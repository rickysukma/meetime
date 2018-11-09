<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Supono | @soepono
 * Description: Slideshow model class
 */
class MSlideshow extends CI_Model{
	var $tslide = "slideshow";
	
	function __construct(){
		parent::__construct();
	}
	
	public function setData($name,$description,$picture){
		$this->name = $name;
		$this->description = $description;
		$this->picture = $picture;
	}
	
	public function add(){
		$arrayData = array(
			'name'=>$this->name,
			'description'=>$this->description,
			'picture'=>$this->picture,
			'post_date'=>date('Y-m-d H:i:s'),
		);
		$this->db->insert($this->tslide, $arrayData); 
		return $this->db->insert_id();
	}
	
	public function edit($id){
		$arrayData = array(
			'name'=>$this->name,
			'description'=>$this->description,
			'picture'=>$this->picture,
		);
		$this->db->where('id', $id);
		return $this->db->update($this->tslide, $arrayData); 
	}	
	
	public function getList($num=NULL, $offset=NULL){
		if ($num){
			$this->db->order_by("id", "DESC");
			$this->db->limit($num, $offset);
		}
		$query = $this->db->get($this->tslide);
		return $query->result();
	}
	
	public function delete($id){
		return $this->db->delete($this->tslide, array('id'=>$id));
	}
	
	function detail($id){
		$condition = array("id"=>$id);
		$query = $this->db->get_where($this->tslide,$condition);	
		if($query->num_rows() > 0){
			return $query->row();
		} else {
			return false;
		}
	}	

	public function getTotal(){
		return $this->db->count_all_results($this->tslide);
	}
	
}
?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Supono | @soepono
 * Description: Pages model class
 */
class MGeneral extends CI_Model{
	var $tmain = "general";
	
	function __construct(){
		parent::__construct();
	}

   function setData($value){
		$this->value = $value;
    }

    function edit($id){
		$arrayData = array(
			'value'=>$this->value,
		);
		$this->db->where('id', $id);
		return $this->db->update($this->tmain,$arrayData); 
    }

    function getList(){
		$query = $this->db->get($this->tmain);
		return $query->result();
    }

    function getNameByCode($code){
    	$condition = array("code"=>$code);
    	$query = $this->db->get_where($this->tmain,$condition);
    	if($query->num_rows() > 0){
			$result = $query->row();
			return $result->value;
		} else {
			return false;
		}
    }

    function detail($id){
		$condition = array("id"=>$id);
		$query = $this->db->get_where($this->tmain,$condition);	
		if($query->num_rows() > 0){
			return $query->row();
		} else {
			return false;
		}
    }
	
}
?>
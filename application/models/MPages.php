<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Agus Merdeko | agus.merdeko@gmail.com
 * Description: Pages model class
 */
class MPages extends CI_Model{
	var $tmain = "pages";
	
	function __construct(){
		parent::__construct();
	}

   function setData($title,$menu_name,$position,$order_seq,$description,$user_id){
		$this->title = $title;
		$this->menu_name = $menu_name;
		$this->position = $position;
		$this->order_seq = $order_seq;
		$this->description = $description;
		$this->user_id = $user_id;
    }

	public function add(){
		$arrayData = array(
      'title'=>$this->title,
			'menu_name'=>$this->menu_name,
			'position'=>$this->position,
			'order_seq'=>$this->order_seq,
			'description'=>$this->description,
      'post_date'=>date('Y-m-d H:i:s'),
      'last_update'=>date('Y-m-d H:i:s'),
      'user_id'=>$this->user_id,
		);
		$this->db->insert($this->tmain, $arrayData); 
		return $this->db->insert_id();
	}

    function edit($id){
		$arrayData = array(
			'title'=>$this->title,
			'menu_name'=>$this->menu_name,
			'position'=>$this->position,
			'order_seq'=>$this->order_seq,
			'description'=>$this->description,
			'last_update'=>date('Y-m-d H:i:s'),
			'user_id'=>$this->user_id,
		);
		$this->db->where('id', $id);
		return $this->db->update($this->tmain,$arrayData); 
    }

    function getList(){
		$query = $this->db->get($this->tmain);
		return $query->result();
		}
		
    function getListTop(){
        $sql 	= 'SELECT id, menu_name FROM pages WHERE position = 1 OR position = 3 ORDER BY order_seq ASC';
        $query 	= $this->db->query($sql);
        $return = $query->result();
        return $return;
		}
		
    function getListBottom(){
        $sql 	= 'SELECT id, menu_name FROM pages WHERE position = 2 OR position = 3 ORDER BY order_seq ASC';
        $query 	= $this->db->query($sql);
        $return = $query->result();

        $this->db->close();
        $this->db->initialize();

        return $return;
		}
		
    function getAboutPage(){
        $sql 	= 'SELECT id, menu_name, title, description FROM pages WHERE id = 9';
        $query 	= $this->db->query($sql);
        $return = $query->row();

        $this->db->close();
        $this->db->initialize();

        return $return;
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

    public function delete($id){
      return $this->db->delete($this->tmain, array('id'=>$id));
    }

    function menuPosition($id){
      $position = '';

      if($id == 0){
         $position = 'Tidak ditampilkan.';
      }
      if($id == 1){
         $position = 'Ditampilkan diatas.';
      }
      if($id == 2){
         $position = 'Ditampilkan dibawah.';
      }
      if($id == 3){
         $position = 'Ditampilkan dikeduanya.';
      }

      return $position;

    }
	
}
?>
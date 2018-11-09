<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/* Author: Supono | @soepono
 * Description: News model class
 */

class MNews extends CI_Model {

    var $tnews = "news";

    function __construct() {
        parent::__construct();
    }

    public function setData($title, $description, $user_id, $picture = NULL, $category) {
        $this->title = $title;
        $this->description = $description;
        $this->picture = $picture;
        $this->user_id = $user_id;
        $this->category = $category;
    }

    public function add() {
        $arrayData = array(
            'title' => $this->title,
            'description' => $this->description,
            'picture' => $this->picture,
            'user_id' => $this->user_id,
            'category' => $this->category,
            'post_date' => date('Y-m-d H:i:s'),
        );
        $this->db->insert($this->tnews, $arrayData);
        return $this->db->insert_id();
    }

    public function edit($id) {
        $arrayData = array(
            'title' => $this->title,
            'description' => $this->description,
            'picture' => $this->picture,
            'user_id' => $this->user_id,
        );
        $this->db->where('id', $id);
        return $this->db->update($this->tnews, $arrayData);
    }

    public function getList($num = NULL, $offset = NULL, $category = NULL) {
        if ($num) {
            $this->db->order_by("id", "DESC");
            $this->db->limit($num, $offset);
        }
        $query = $this->db->get($this->tnews);
        return $query->result();
    }

    public function getLists($num = NULL, $offset = NULL, $category = NULL) {
        if ($num) {
            $this->db->order_by("id", "DESC");
            $this->db->limit($num, $offset);
        }
        if ($category) {
            $this->db->where('category', $category);
        }
        $query = $this->db->get($this->tnews);
        return $query->result();
    }

    public function delete($id) {
        return $this->db->delete($this->tnews, array('id' => $id));
    }

    function detail($id) {
        $condition = array("id" => $id);
        $query = $this->db->get_where($this->tnews, $condition);
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

    // get total record
    public function getTotal($category = NULL) {
        if ($category) {
            $this->db->where('category', $category);
        }
        return $this->db->count_all_results($this->tnews);
    }

}

?>
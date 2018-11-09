<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Page extends CI_Controller {

    /**
     * Author by Supono | @soepono
     */
    public function __construct() {
        parent::__construct();
        $this->load->model('MPages');
        $this->load->model('MGeneral');
    }

    public function index($id) {
        $data['menu'] = $this->uri->segment(4);
        $data['detail'] = $this->MPages->detail($id);
        $this->load->view('about', $data);
    }

}

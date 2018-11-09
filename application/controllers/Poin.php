<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Poin extends CI_Controller {

	function __construct()
	{
		parent:: __construct();

		$this->load->model('Model_bonus');

	}

	public function index()
	{
		$data['list'] = $this->Model_bonus->data();
		$this->load->view('poin', $data);
	}
}

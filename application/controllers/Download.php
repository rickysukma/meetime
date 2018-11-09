<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Download extends CI_Controller {

	/**
	 * Author by Supono | @soepono
	 */
	
	public function __construct()
    {
    	parent::__construct();
		$this->load->model('MDownload');
    } 
	
	public function index()
	{
		$data['menu'] = 'download';
		$this->load->model(array('MPages'));
		$data['listdownload'] = $this->MDownload->listdownload();
		$this->load->view('download', $data);
	}
	
}
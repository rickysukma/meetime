<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$data['menu'] = 'contact';
		$submit = $this->input->post('name');
		if ($submit){
			$email_to = $this->MGeneral->getNameByCode('EMAIL');
			$dari = $this->input->post('name');
			$email = $this->input->post('email');
			//$subjek = $this->input->post('message');
			$isi = $this->input->post('message');
			$this->load->library('email');
			$this->email->from($email, $dari);
			$this->email->to($email_to);
			$this->email->bcc('pono_thea@yahoo.com'); 
			$this->email->subject('Ada Message dari Web Peternakan');
			$this->email->message('Dari '.$dari.', <br>Email.'.$email.', <br><br>Isi Pesan:'.$isi);		
			$this->email->send();	
			$data['success'] = true;
		}
		$this->load->view('contact',$data);
	}
}

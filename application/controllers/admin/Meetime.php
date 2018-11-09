<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Agus Merdeko | agus.merdeko@gmail.com
 * Description: Pages controller class
 * User asses to admin area: CRUD
 */
    require_once( APPPATH.'libraries/woolib/HttpClient/BasicAuth.php');
    require_once( APPPATH.'libraries/woolib/HttpClient/HttpClient.php');
    require_once( APPPATH.'libraries/woolib/HttpClient/HttpClientException.php');
    require_once( APPPATH.'libraries/woolib/HttpClient/OAuth.php');
    require_once( APPPATH.'libraries/woolib/HttpClient/Options.php');
    require_once( APPPATH.'libraries/woolib/HttpClient/Request.php');
    require_once( APPPATH.'libraries/woolib/HttpClient/Response.php');

    require_once( APPPATH.'libraries/woolib/Client.php');

    use Automattic\WooCommerce\Client;
    
class Meetime extends CI_Controller{
    
    private $woocommerce;
	 
	function __construct(){
		parent::__construct();
		if (!$this->session->userdata('isLogin') and (!$this->session->userdata('level')=='A')){
			redirect('admin/login');
		}
		$this->load->model(array('MPages','MUser'));
		$this->load->model('Morder');
		$this->load->model('Model_bonus');
		$this->woocommerce = new Client(
            'http://metime.1itmedia.co.id/wp/', 
            'ck_60d2c0408f3fd20191b3ff5c5bfa00b7a80aa298', 
            'cs_7930ad0d653e4357122cd1d15411fdddfa6b3c1c',
            [
                'wp_api' => true,
                'version' => 'wc/v1',
            ]
        );
	}
	
	public function index(){
		echo 'xxx';
		print_r($this->session->userdata());
	}
	
	public function kordinator(){
		$data['main_menu'] = "me";
		$data['menu'] = "me-kor";
		$data['id'] = 1;
		$this->load->view('backend/metime/crud_members.php', $data);
	}
	
	public function korwil(){
		$data['main_menu'] = "me";
		$data['menu'] = "me-korwil";
		$data['id'] = 2;
		$this->load->view('backend/metime/crud_members.php', $data);
	}
	
	public function reseller(){
		$data['main_menu'] = "me";
		$data['menu'] = "me-res";
		$data['id'] = 3;
		$this->load->view('backend/metime/crud_members.php', $data);
	}
	public function input_order(){
		$data['main_menu'] = "me";
		$data['menu'] = "me-ord";
		$data['total_order'] = $this->Morder->sum_total($this->session->userdata('user_id'));
		$data['id'] = 1;
		$this->load->view('backend/order/crud_order.php', $data);
	}
	public function order(){
		$data['main_menu'] = "me";
		$data['menu'] = "me-ord";
		$data['id'] = 1;
		$this->load->view('backend/order/list_order.php', $data);
	}
	public function poin(){
	    $this->Model_bonus->auto_cekbonus();
	    $data['list'] = $this->Model_bonus->data();
		$data['main_menu'] = "me";
		$data['menu'] = "me-poin";
		$data['id'] = 1;
		$this->load->view('backend/metime/poin.php', $data);
	}
	public function royalti(){
	    $this->Model_bonus->auto_cekbonus();
	    $data['list'] = $this->Model_bonus->data();
		$data['main_menu'] = "me";
		$data['menu'] = "me-roy";
		$data['id'] = 1;
		$this->load->view('backend/metime/royalti.php', $data);
	}
		
 }
 ?>
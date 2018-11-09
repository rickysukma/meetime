<?php defined('BASEPATH') OR exit('No direct script access allowed');

    require_once( APPPATH.'libraries/woolib/HttpClient/BasicAuth.php');
    require_once( APPPATH.'libraries/woolib/HttpClient/HttpClient.php');
    require_once( APPPATH.'libraries/woolib/HttpClient/HttpClientException.php');
    require_once( APPPATH.'libraries/woolib/HttpClient/OAuth.php');
    require_once( APPPATH.'libraries/woolib/HttpClient/Options.php');
    require_once( APPPATH.'libraries/woolib/HttpClient/Request.php');
    require_once( APPPATH.'libraries/woolib/HttpClient/Response.php');

    require_once( APPPATH.'libraries/woolib/Client.php');

    use Automattic\WooCommerce\Client;

class Order extends CI_Controller {
    
    private $woocommerce;

	public function __construct()
	{

		parent::__construct();
		if (!$this->session->userdata('isLogin') and (!$this->session->userdata('level')=='A')){
			redirect('admin/login');
		} 
		unset($_POST['ci_csrf_token']);
		$this->load->model('Morder');
		$this->woocommerce = new Client(
            'http://metime.1itmedia.co.id/wp/', 
            'ck_60d2c0408f3fd20191b3ff5c5bfa00b7a80aa298', 
            'cs_7930ad0d653e4357122cd1d15411fdddfa6b3c1c',
            [
                'wp_api' => true,
                'version' => 'wc/v2',
            ]
        );
	}
    public function index(){
        echo 'xxx';
    }
    public function shipping()
	{
	    print_r($this->session->userdata());
	    echo '<pre>' . print_r($this->woocommerce->get('orders/106'), true) .'</pre>'; 
	}
	public function lists($id)
	{
		$limit = $this->input->get('rows');
		$page = $this->input->get('page');

		$result['total'] = $this->Morder->get_total($id);
		$result['rows'] = $this->Morder->get_list($limit,$page,$id);
		
		echo json_encode($result);
	}
	public function lists_order($id)
	{
		$limit = $this->input->get('rows');
		$page = $this->input->get('page');
		$result['total'] = $this->Morder->get_all_total($id);
		$result['rows'] = $this->Morder->get_list_all($limit,$page,$id);
		
		echo json_encode($result);
	}
	
	public function listsproduk()
	{
	    $result['total'] = count($this->woocommerce->get('products'));
		$result['rows'] = $this->woocommerce->get('products');
		echo json_encode($result);
	}

	public function do_delete()
	{
		$id = $this->input->post('id');

		if ($this->Morder->delete_order($id)) {
			echo json_encode(array(
				'success' => true,
				'message' => 'Data dengan ID ' . $id . ' telah dihapus!',
				'total'   => $this->Morder->sum_total($this->session->userdata('user_id'))
			));
		} else {
			$this->output->set_status_header(401);
		}
	}

	public function form($mode,$type='')
	{
		$data['mode'] = $mode;
		$data['typeaccount'] = $type;
		$this->load->view('backend/order/form', $data);
	}

	public function do_save()
	{
	    
		$this->load->library('form_validation');

		$this->form_validation->set_rules('qty', 'Jumlah', 'required');

        if ($this->form_validation->run() == FALSE)
        {
            echo json_encode(array(
				'success' => false,
				'message' => 'Jumlah wajib di isi!' 
			));
        }
        else
        {
        	$data = $this->input->post();
        	$produks = $this->woocommerce->get('products/'.$data['id_produk']);
        	$data1['id_produk'] = $data['id_produk'];
        	$data1['nama_produk'] = $produks->name;
        	$data1['harga_produk'] = $produks->price;
        	$data1['qty'] = $data['qty'];
        	$data1['total'] = $data['qty']*$produks->price;
        	$data1['id_user'] = $this->session->userdata('user_id');
    		unset($data['id']);
        	if ($this->input->post('id') == 0) {
        	    $data_produk = $this->Morder->find_produk('43',$this->session->userdata('user_id'));
        	    if($data_produk){
        	        $data2['qty'] = $data_produk[0]->qty+$data['qty'];
        	        $data2['total'] = $data2['qty']*$produks->price;
        	        if ($this->db->where('id_produk', $data['id_produk'])->update('order', $data2)) {
            			echo json_encode(array(
    						'success' => true,
    						'message' => 'data Berhasil Diubah!',
    						'total'   => $this->Morder->sum_total($this->session->userdata('user_id'))
    					));
            		} else {
            			
            			echo json_encode(array(
    						'success' => false,
    						'message' => 'Terjadi Kesalahan' 
    					));
            		}
        	    }else{
            		if ($this->db->insert('order', $data1)) {
            			//print_r($data);
            			echo json_encode(array(
    						'success' => true,
    						'message' => 'data Berhasil Ditambah!',
    						'total'   => $this->Morder->sum_total($this->session->userdata('user_id'))
    					));
            		} else {
            			
            			echo json_encode(array(
    						'success' => false,
    						'message' => 'Terjadi Kesalahan' 
    					));
            		}
        	        
        	    }
        		
        	} else {
        		if ($this->db->where('id', $this->input->post('id'))->update('order', $data1)) {
        			echo json_encode(array(
						'success' => true,
						'message' => 'data Berhasil Diubah!',
						'total'   => $this->Morder->sum_total($this->session->userdata('user_id'))
					));
        		} else {
        			
        			echo json_encode(array(
						'success' => false,
						'message' => 'Terjadi Kesalahan' 
					));
        		}
        	}

            
        }
	}

	public function edit($id)
	{
		$data = $this->Morder->find_order($id);
		echo json_encode($data);
	}
	public function cancel_order()
	{
	    if ($this->Morder->delete_order_all($this->session->userdata('user_id'))) {
			echo json_encode(array(
				'success' => true,
				'message' => 'Data telah dihapus!',
			));
		} else {
			$this->output->set_status_header(401);
		}
	}
	public function save_order()
	{
        $dataItem = $this->Morder->find_produk_by_user($this->session->userdata('user_id'));
        $data = [
            'payment_method' => 'bacs',
            'payment_method_title' => 'Direct Bank Transfer',
            'set_paid' => true,
            'billing' => [
                'first_name' => $this->input->post('atas_nama'),
                'last_name' => $this->input->post('atas_nama'),
                'address_1' => $this->input->post('alamat'),
                'address_2' => $this->input->post('kecamatan'),
                'city' => $this->input->post('kabupaten'),
                'state' => $this->input->post('provinsi'),
                'postcode' => $this->input->post('kodepos'),
                'country' => 'ID',
                'email' => $this->input->post('email'),
                'phone' => $this->input->post('no_telp')
            ],
            'shipping' => [
                'first_name' => $this->input->post('atas_nama'),
                'last_name' => $this->input->post('atas_nama'),
                'address_1' => $this->input->post('alamat'),
                'address_2' => $this->input->post('kecamatan'),
                'city' => $this->input->post('kabupaten'),
                'state' => $this->input->post('provinsi'),
                'postcode' => $this->input->post('kodepos'),
                'country' => 'ID',
            ],
            'line_items' => $dataItem,
            'shipping_lines' => [
                [
                    'method_id' => 'woongkir',
                    'method_title' => $this->input->post('kirim_via'),
                    'total' => $this->input->post('ongkir')
                ]
            ]
        ];
	    $hasil = $this->woocommerce->post('orders', $data);
	    if($hasil){
	        $result['id_order'] = $hasil->id;
    		$result['id_user'] = $this->session->userdata('user_id');
	        if ($this->db->insert('order_main', $result)) {
    			
    			echo json_encode(array(
					'success' => true,
					'message' => 'data Berhasil Ditambah!',
				));
    		} else {
    			
    			echo json_encode(array(
					'success' => false,
					'message' => 'Terjadi Kesalahan' 
				));
    		}
    		$this->Morder->delete_order_all($this->session->userdata('user_id'));
	        
	    }else{}
	}

}

/* End of file Easyui.php */
/* Location: ./application/controllers/admin/Easyui.php */
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
        $this->load->model('MSlideShow');
        $this->load->model(array('MNews', 'MPages','MGeneral','MUser'));
        $this->load->helper('text');
        
        if(!empty($_GET['aff'])){
            //$_SESSION['affCode'] = $_GET['aff'];
            $data = $this->MUser->getAff($_GET['aff']);
            $_SESSION['affCode'] = $_GET['aff'];
            $_SESSION['affNameAgent'] = $data[0]->name;
            $_SESSION['affPhoneAgent'] = $data[0]->phone;
            //print_r($data); 
        }
        $data['controller'] = $this;
        $data['result'] = $this->MNews->getList($num = 6);
        // print_r($data);die;
        $data['menu'] = 'home';
        $this->load->view('frontend/index-page', $data);
	}

	public function bulan($bulan){
		switch ($bulan) {
			case '01':
					echo "JAN";
				break;
			case '02':
					echo "FEB";
				break;
			case '03':
					echo "MAR";
				break;
			case '04':
					echo "APR";
				break;
			case '05':
					echo "MEI";
				break;
			case '06':
					echo "JUN";
				break;
			case '07':
					echo "JUL";
				break;
			case '08':
					echo "AUG";
				break;
			case '09':
					echo "SEP";
				break;
			case '10':
					echo "OKT";
				break;
			case '11':
					echo "NOV";
				break;
			
			default:
				echo "DES";
				break;
		}
	}	

}

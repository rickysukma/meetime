<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index() {
        $this->load->model(array('MNews', 'MPages','MGeneral'));
        $this->load->helper('text');
        $data['controller'] = $this;
        $data['result'] = $this->MNews->getList();
        $data['menu'] = 'news';
        $this->load->view('frontend/berita', $data);
    }

    function detail($id) {
        $this->load->model(array('MNews', 'MPages','MGeneral'));
        $data['detail'] = $this->MNews->detail($id);
        $data['menu'] = 'news';
        $this->load->view('frontend/berita-detail', $data);
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

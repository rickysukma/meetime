<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(array('MPesanan', 'MClient'));
    }

    public function index() {
        $submit = $this->input->post('name');
        if ($submit) {
            $nama = $this->input->post('name');
            $no_telp = $this->input->post('phone');
            $email = $this->input->post('email');
            $alamat = $this->input->post('alamat');
            $produk = $this->input->post('produk');
            $qty = $this->input->post('qty');
            $this->MPesanan->setData($nama, $no_telp, $email, $alamat, $produk, $qty);
            $this->MPesanan->add();

            $email_to = $this->MGeneral->getNameByCode('EMAIL');
            $this->email->from($email, $nama);
            $this->email->to($email_to);
            $this->email->bcc('pono_thea@yahoo.com');
            $this->email->subject('Ada Order dari Web NKM HAMASA');
            $this->email->message('Dari ' . $nama . ', Email.' . $email . ', Memesan:' . $produk . ' sebanyak ' . $qty);
            $this->email->send();

            $data['success'] = true;
        }
        $data['produk_list'] = $this->MClient->getList();
        $data['menu'] = 'order';
        $this->load->view('order', $data);
    }

}

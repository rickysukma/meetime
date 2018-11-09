<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_bonus extends CI_Model {

	public function data()
	{
		$this->db->select('bonus.*, user.username, user.name, order.total');
		$this->db->from('bonus');
		$this->db->join('user', 'user.id = bonus.id_user');
		$this->db->join('order', 'order.id = bonus.id_order');
		$query = $this->db->get();
		$data  = $query->result();
		return $data;
	}
	
	public function cari_user($id_user)
	{

		$query = $this->db->where('id', $idsponsor)->get('bonus');
		$data  = $query->result();
		return $data;
	}

	public function validasi_bonus($idorder)
	{
		//generate bonus
		//cek total
		$cektotal = $this->db->where('id', $idorder)->get('order');
		$data  = $cektotal->result();
		$total = $data[0]->total;

		//cek produk
		$id_produk = $data[0]->id_produk;
		$cekproduk = $this->db->where('idproduct', $id_produk)->get('product');
		$datapd = $cekproduk->result();

		//pembagian royalti
		$royalti_user = 0;
		$royalti_g1 = 0;
		$royalti_g2 = 0;

		if($datapd[0]->tipe == 1)
		{
			$royalti_user = ($datapd[0]->royalti*$total)/100;
			$royalti_g1 = ($datapd[0]->royaltig1*$total)/100;
			$royalti_g2 = ($datapd[0]->royaltig2*$total)/100;
		}
		if($datapd[0]->tipe == 0)
		{
			$royalti_user = $datapd[0]->royalti;
			$royalti_g1 = $datapd[0]->royaltig1;
			$royalti_g2 = $datapd[0]->royaltig2;
		}

		//pembagian poin
		$poin_user = $datapd[0]->poin;
		$poin_g1 = $datapd[0]->poing1;
		$poin_g2 = $datapd[0]->poing2;

		//get data user g0, g1, g2
		$id_user_g0    = $data[0]->id_user;
		$datag0 	   = $this->cek_user($id_user_g0);
		$id_sponsor_g0 = isset($datag0[0]->idsponsor)?$datag0[0]->idsponsor:'0';

		$id_user_g1    = $id_sponsor_g0;
		$datag1 	   = $this->cek_user($id_user_g1);
		$id_sponsor_g1 = isset($datag1[0]->idsponsor)?$datag1[0]->idsponsor:'0';

		$id_user_g2    = $id_sponsor_g1;

		//rapikan sesuai kebutuhann cek
		//index 0 adalah user, 1 adalah g1, 2 adalah g2
		$data['id_user'][0] = $id_user_g0;
		$data['id_user'][1] = $id_user_g1;
		$data['id_user'][2] = $id_user_g2;

		$data['royalti'][0] = $royalti_user;
		$data['royalti'][1] = $royalti_g1;
		$data['royalti'][2] = $royalti_g2;

		$data['poin'][0] = $poin_user;
		$data['poin'][1] = $poin_g1;
		$data['poin'][2] = $poin_g2;

		//selesai
		return $data; //cek data query dengan manual
	}

	public function cek_user($iduser)
	{
		$query = $this->db->where('id', $iduser)->get('user');
		$data  = $query->result();
		return $data;
	}


	public function auto_cekbonus()
	{
		$array = array('stsbonus' => '0', 'status' => '1');
		$query = $this->db->where($array)->get('order_main');
		$cek   = $query->num_rows();

		if($cek > 0)
		{
			$data  = $query->result();
			foreach ($data as $row) {
				$this->validasi($row->id_order);
				$data = array('stsbonus' => 1);

				$this->db->where('id_order', $row->id_order);
				$this->db->update('order_main', $data);
			}
		}
		return true;
	}


	public function validasi($idorder)
	{
		$data = array(
		        'status' => 1
		);
		$this->db->where('id_order', $idorder);
		$this->db->update('order_main', $data);

		//generate bonus
		//cek total
		$cektotal = $this->db->where('id', $idorder)->get('order');
		$data  = $cektotal->result();
		$total = $data[0]->total;

		//cek produk
		$id_produk = $data[0]->id_produk;
		$cekproduk = $this->db->where('idproduct', $id_produk)->get('product');
		$datapd = $cekproduk->result();

		//pembagian royalti
		$royalti_user = 0;
		$royalti_g1 = 0;
		$royalti_g2 = 0;

		if($datapd[0]->tipe == 1)
		{
			$royalti_user = ($datapd[0]->royalti*$total)/100;
			$royalti_g1 = ($datapd[0]->royaltig1*$total)/100;
			$royalti_g2 = ($datapd[0]->royaltig2*$total)/100;
		}
		if($datapd[0]->tipe == 0)
		{
			$royalti_user = $datapd[0]->royalti;
			$royalti_g1 = $datapd[0]->royaltig1;
			$royalti_g2 = $datapd[0]->royaltig2;
		}

		//pembagian poin
		$poin_user = $datapd[0]->poin;
		$poin_g1 = $datapd[0]->poing1;
		$poin_g2 = $datapd[0]->poing2;

		//get data user g0, g1, g2
		$id_user_g0    = $data[0]->id_user;
		$datag0 	   = $this->cek_user($id_user_g0);
		$id_sponsor_g0 = isset($datag0[0]->idsponsor)?$datag0[0]->idsponsor:'0';

		$id_user_g1    = $id_sponsor_g0;
		$datag1 	   = $this->cek_user($id_user_g1);
		$id_sponsor_g1 = isset($datag1[0]->idsponsor)?$datag1[0]->idsponsor:'0';

		$id_user_g2    = $id_sponsor_g1;

		//insertkan masing-masing ke tabel bonus
		//insert user
			$data = array(
			'id_user' => $id_user_g0,
			'id_order' => $idorder,
			'bonusroyalti' => $royalti_user,
			'bonuspoin' => $poin_user,
			'tglbonus' => date("Y-m-d"),
			'jambonus' => date("H:i:s"),
			'downline' => 0
			);
			$this->db->insert('bonus', $data);

		//insert g1
		if($id_user_g1 != 0)
		{
			$data = array(
			'id_user' => $id_user_g1,
			'id_order' => $idorder,
			'bonusroyalti' => $royalti_g1,
			'bonuspoin' => $poin_g1,
			'tglbonus' => date("Y-m-d"),
			'jambonus' => date("H:i:s"),
			'downline' => $id_user_g0
			);
			$this->db->insert('bonus', $data);
		}
		//insert g2
		if($id_user_g2 != 0)
		{
			$data = array(
			'id_user' => $id_user_g2,
			'id_order' => $idorder,
			'bonusroyalti' => $royalti_g2,
			'bonuspoin' => $poin_g2,
			'tglbonus' => date("Y-m-d"),
			'jambonus' => date("H:i:s"),
			'downline' => "$id_user_g1, $id_user_g0"
			);
			$this->db->insert('bonus', $data);
		}
		//selesai
		return true;
	}

}

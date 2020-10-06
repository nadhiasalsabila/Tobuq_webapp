<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M extends CI_Model {
	public function __construct(){
		parent::__construct();
	}

	public function getDetailObat($kode){
		$this->db->select('*');
		$this->db->from('obat');
		$this->db->join('kategori', 'kategori.id_kategori = obat.id_kategori');
		$this->db->where('kode', $kode);
		return $this->db->get();
	}

	public function editStok($kode,	$qty){
		$this->db->set('jumlah', $qty);
		$this->db->where('kode', $kode);
		return $this->db->update('obat');
	}

	public function editJumPembelian($kode,	$jum){
		$this->db->set('jum_pembelian', $jum);
		$this->db->where('kode', $kode);
		return $this->db->update('obat');
	}

	public function getObatByKategori($id, $number, $offset){
		$this->db->select('*');
		$this->db->from('obat');
		$this->db->join('kategori', 'kategori.id_kategori = obat.id_kategori');
		$this->db->where('obat.id_kategori', $id);
		$this->db->limit($number, $offset);
		return $this->db->get();
	}

	public function getTotalObatKategori($id){
		$this->db->select('*');
		$this->db->from('obat');
		$this->db->join('kategori', 'kategori.id_kategori = obat.id_kategori');
		$this->db->where('obat.id_kategori', $id);
		return $this->db->get()->num_rows();
	}

	public function searchObat($q, $number, $offset){
		$this->db->select('*');
		$this->db->from('obat');
		$this->db->join('kategori', 'kategori.id_kategori = obat.id_kategori');
		$this->db->like('nama', $q);
		$this->db->limit($number, $offset);
		return $this->db->get();
	}

	public function searchObatRows($q){
		$this->db->select('*');
		$this->db->from('obat');
		$this->db->join('kategori', 'kategori.id_kategori = obat.id_kategori');
		$this->db->like('obat', $q);
		return $this->db->get()->num_rows();
	}

	public function getKategori(){
		$this->db->order_by('nama_kategori', 'asc');
		return $this->db->get('kategori');
	}

	public function getObatLaris(){
		$this->db->select('*');
		$this->db->from('obat');
		$this->db->join('kategori', 'kategori.id_kategori = obat.id_kategori');
		$this->db->order_by('jum_pembelian', 'DESC');
		$this->db->limit(8);
		return $this->db->get();
	}

	public function getSinglePembeli($email){
		$this->db->where('email', $email);
		return $this->db->get('pembeli');
	}

	public function insert_detailTransaksi($data){
		return $this->db->insert('detail_transaksi', $data);
	}

	public function insert_transaksi($data){
		return $this->db->insert('transaksi', $data);
	}

	public function register($data){
		$validit = $this->db->get_where('pembeli','email = "'.$data['email'].'"');
		if($validit->num_rows() > 0){
			return false;
		} else {
			return $this->db->insert('pembeli', $data);
		}
	}

	public function login($c){
		$validate = $this->db->get_where('pembeli','email = "'.$c['email'].'" AND password = "'.$c['password'].'"');
		if($validate->num_rows() > 0){
			return true;
		} else {
			return false;
		}
	}
}

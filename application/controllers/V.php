<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class V extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('m');
		$this->load->library('cart');
	}

	public function index(){
		$data['kategori'] = $this->m->getKategori();
		$data['laris'] = $this->m->getObatLaris();

		$this->load->view('components/Head', $data);
		$this->load->view('pages/Homepage');
		$this->load->view('components/Footer');
	}

	public function search(){
	    $search = (trim($this->input->post('q',true)))? trim($this->input->post('q',true)) : '';
		$search = ($this->uri->segment(3)) ? $this->uri->segment(3) : $search;
		$from = $this->uri->segment(4);
		$data['q'] = $search;

		if(empty($search) AND empty($this->uri->segment(3))){
			redirect('/');
		}

		$this->load->library('pagination');

		$config['full_tag_open'] = "<ul class='pagination text-center'>";
		$config['full_tag_close'] ="</ul>";
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
		$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
		$config['next_tag_open'] = "<li>";
		$config['next_tagl_close'] = "</li>";
		$config['prev_tag_open'] = "<li>";
		$config['prev_tagl_close'] = "</li>";
		$config['first_tag_open'] = "<li>";
		$config['first_tagl_close'] = "</li>";
		$config['last_tag_open'] = "<li>";
		$config['last_tagl_close'] = "</li>";

		$config['base_url'] = base_url().'v/search/'.$search;
		$config['total_rows'] = $this->m->searchObatRows($search);
		$config['per_page'] = 12;
		
		$this->pagination->initialize($config);	

		$data['obat'] = $this->m->searchObat($search, $config['per_page'], $from);	
		$data['kategori'] = $this->m->getKategori();

		$this->load->view('components/Head', $data);
		$this->load->view('pages/Search');
		$this->load->view('components/Footer');
	}	

	public function kategori($id){
		$data['id'] = $id;
		$data['kategori'] = $this->m->getKategori();

		$this->load->library('pagination');

		$config['full_tag_open'] = "<ul class='pagination text-center'>";
		$config['full_tag_close'] ="</ul>";
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
		$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
		$config['next_tag_open'] = "<li>";
		$config['next_tagl_close'] = "</li>";
		$config['prev_tag_open'] = "<li>";
		$config['prev_tagl_close'] = "</li>";
		$config['first_tag_open'] = "<li>";
		$config['first_tagl_close'] = "</li>";
		$config['last_tag_open'] = "<li>";
		$config['last_tagl_close'] = "</li>";

		$config['uri_segment'] = 4;
		$config['base_url'] = base_url().'v/kategori/'.$id.'/';
		$config['total_rows'] = $this->m->getTotalObatKategori($id);
		$config['per_page'] = 12;

		$from = $this->uri->segment(4);
		$this->pagination->initialize($config);	

		$data['obat'] = $this->m->getObatByKategori($id, $config['per_page'], $from);	

		$this->load->view('components/Head', $data);
		$this->load->view('pages/BasedOn_kategori');
		$this->load->view('components/Footer');	
	}

	public function detail($kode){
		$data['obat'] = $this->m->getDetailObat($kode)->result()[0];
		
		$this->load->view('components/Head', $data);
		$this->load->view('pages/Detail');
		$this->load->view('components/Footer');		
	}

	public function tambah_keranjang(){
		$order = $this->m->getDetailObat($this->input->post('kode'))->result()[0];
		if($order->jumlah >= $this->input->post('qty')){
			$data = array(
				'id'	=>	$order->kode,
				'qty' => $this->input->post('qty'),
				'price' => $order->harga,
				'name' => $order->judul,
				'options' => ''
			);

			$this->cart->insert($data);
			redirect('/v/keranjang');
		} else {
			$this->session->set_flashdata('msg_stok', '<div class="alert alert-warning text-center">Stok obat tidak mencukupi</div><br>');
			redirect('/v/detail/'.$order->kode);
		}
	}

	public function hapus_keranjang($id){
		$this->cart->remove($id);
		redirect('/v/keranjang');
	}

	public function update_keranjang(){
		$data = [];
		for($i=1; $i<=$this->input->post('totalItemCart'); $i++){
			$data[$i]['rowid'] = $this->input->post('rowid'.$i); 
			$data[$i]['qty'] = $this->input->post('qty'.$i); 
		}
		
		if($this->cart->update($data)){
			$this->session->set_flashdata('msg', '<div class="alert alert-success">Berhasil memperbarui keranjang</div><br>');
			redirect('/v/keranjang');
		}
	}

	public function keranjang(){
		if($this->session->userdata('status') != 'pembeli'){
			$this->session->set_flashdata('msg', '<div class="alert alert-warning text-center">Silahkan login terlebih dahulu</div>');
			redirect('/v/login');
		}

		$this->load->view('components/Head');
		$this->load->view('pages/Keranjang');
		$this->load->view('components/Footer');			
	}

	public function checkout(){
		$data['totalHarga'] = 0;

		foreach ($this->cart->contents() as $d){
			$data['totalHarga'] = $data['totalHarga'] + $d['subtotal'];
		}

		$this->load->view('components/Head', $data);
		$this->load->view('pages/Checkout');
		$this->load->view('components/Footer');
	}

	public function checkout_process(){

		$data['no_transaksi'] = strtoupper(substr(md5(microtime()),rand(0,26),6));
		$data['id_pembeli'] = $this->m->getSinglePembeli($this->session->userdata('email'))->result()[0]->id_pembeli;
		$data['tgl_transaksi'] = date("d/m/Y");
		$data['total_harga'] = 0;

		foreach ($this->cart->contents() as $d){

			$detail['no_transaksi'] = $data['no_transaksi'];
			$detail['kode_obat'] = $d['id'];
			$detail['qty'] = $d['qty'];
			$detail['sub_total'] = $d['qty'] * $d['price'];
			$data['total_harga'] = $data['total_harga'] + $d['subtotal'];

			$jum_pembelian = $this->m->getDetailObat($d['id'])->result()[0]->jum_pembelian + $d['qty'];

			$setok = $this->m->getDetailObat($d['id'])->result()[0]->jumlah_obat - $d['qty'];

			$this->m->editJumPembelian($d['id'], $jum_pembelian);
			$this->m->editStok($d['id'], $setok);
			$this->m->insert_detailTransaksi($detail);
		}

		$data['alamat_pengiriman'] = $this->input->post('alamat');

		if($this->m->insert_transaksi($data)){
			$this->session->set_flashdata('totalHarga', $data['total_harga']);
			redirect('v/payment');
		}
	}

	public function payment(){
		if($this->session->flashdata('totalHarga') != ''){
			$this->load->view('pages/Payment');		
			$this->cart->destroy();
		} else {
			redirect('/');
		}
	}

	public function register(){
		$this->load->view('pages/Register');
	}

	public function register_process(){
		if(!empty($_REQUEST)){
			$data['id_pembeli'] = strtoupper(substr(md5(microtime()),rand(0,26),6));
			$data['nama_pembeli'] = $this->input->post('nama');
			$data['email'] = $this->input->post('email');
			$data['password'] = $this->input->post('password');
			$data['no_telp'] = $this->input->post('no_telp');
			$data['alamat'] = $this->input->post('alamat');
			$data['jk'] = $this->input->post('jk');

			if($this->m->register($data)){
				$this->session->set_flashdata('msg', '<div class="alert alert-success">Berhasil melakukan registrasi, silahkan login</div><br>');
				redirect('/v/login');
			} else {
				$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Gagal registrasi, email telah digunakan!</div>');
				redirect('/v/login');
			}
		} else {
			redirect('/v/register');
		}
	}

	public function login(){
		$this->load->view('pages/Login');
	}

	public function login_auth(){
		if(!empty($_REQUEST)){
			$credentials = array(
				'email' => $this->input->post('email'),
				'password' => $this->input->post('password'),
				'status' => 'pembeli'
			);

			if($this->m->login($credentials)){
				$this->session->set_userdata($credentials);
				redirect('/');
			} else {
				$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Username atau password anda salah</div>');
				redirect('/v/login');
			}
		} else {
			redirect('/v/login');
		}
	}

	public function logout(){
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('password');
		$this->session->unset_userdata('status');
		$this->session->sess_destroy();
	    redirect('/');
	}

}

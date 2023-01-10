<?php 

	/**
	 * 
	 */
	class Index extends CI_Controller{

		function __construct()
		{
			parent::__construct();
			if ($this->session->username == null) {
				redirect('login/');
			}
		} 

		function index(){

			$this->load->view('template/header');
			$this->load->view('utama/index');
			$this->load->view('template/footer');
		}

		function data_produk(){
			$data['produk'] = $this->db->get('tbl_produk')->result_array();
			$data['kode'] = "kode-".rand(0, 10000);
			$data['kategori'] = $this->db->get('tbl_kategori')->result_array();

			$this->load->view('template/header');
			$this->load->view('utama/data_barang', $data);
			$this->load->view('template/footer');
		}

		function tambah_produk(){

			$data = [
				'kode_produk' => $this->input->post('kode_produk'),
				'kode_kategori' => $this->input->post('kategori'),
				'produk' => $this->input->post('produk'),
				'harga' => $this->input->post('harga'),
				'unit_harga' => $this->input->post('unit_harga'),
				'stok' => $this->input->post('stok'),
				'unit_stok' => $this->input->post('unit_stok')
			];

			$this->db->insert('tbl_produk', $data);
			$this->session->set_flashdata('message', 'swal("Good Job", "Barang berhasil di tambah", "success" );');
			redirect('index/barang_masuk');

		}

		function edit_produk(){
			$id = $this->input->post('id');

			$data = [
				'kode_produk' => $this->input->post('kode_produk'),
				'kode_kategori' => $this->input->post('kategori'),
				'produk' => $this->input->post('produk'),
				'harga' => $this->input->post('harga'),
				'unit_harga' => $this->input->post('unit_harga'),
				'stok' => $this->input->post('stok'),
				'unit_stok' => $this->input->post('unit_stok')
			];

			$this->db->where('id', $id);
			$this->db->update('tbl_produk', $data);

			$this->session->set_flashdata('message', 'swal("Good Job", "Produk berhasil di edit", "success" );');
			redirect('index/data_produk');

		}

		function hapus_produk(){
			$id = $this->input->post('id');
			$this->db->delete('tbl_produk', ['id' => $id]);
			$this->session->set_flashdata('message', 'swal("Good Job", "Produk berhasil di hapus", "success" );');
			redirect('index/data_produk');
		}

		function data_kategori(){
			$data['kode'] = "kategori-".rand(0,10000);
			$data['kategori'] = $this->db->get('tbl_kategori')->result_array();
			$this->load->view('template/header');
			$this->load->view('utama/data_kategori', $data);
			$this->load->view('template/footer');
		}

		function tambah_kategori(){

			$data = [
				'kode_kategori' => $this->input->post('kode_kategori'),
				'nama_kategori' => $this->input->post('nama_kategori'),
				'ket' => $this->input->post('ket')
			];

			$this->db->insert('tbl_kategori', $data);
			$this->session->set_flashdata('message', 'swal("Good Job", "Kategori berhasil di tambah", "success" );');
			redirect('index/data_produk');
		}

		function edit_kategori(){
			$id = $this->input->post('id');

			$data = [
				'kode_kategori' => $this->input->post('kode_kategori'),
				'nama_kategori' => $this->input->post('nama_kategori'),
				'ket' => $this->input->post('ket')
			];

			$this->db->where('id', $id);
			$this->db->update('tbl_kategori',$data);
			$this->session->set_flashdata('message', 'swal("Good Job", "Kategori berhasil di edit", "success" );');
			redirect('index/data_kategori');

		}

		function hapus_kategori(){
			$id = $this->input->post('id');
			$this->db->delete('tbl_kategori', ['id' => $id]);
			$this->session->set_flashdata('message', 'swal("Good Job", "Kategori berhasil di hapus", "success" );');
			redirect('index/data_kategori');
		}
		
		function barang_masuk(){
			$data['kode'] = "kode-".rand(0, 10000);
			$data['kategori'] = $this->db->get('tbl_kategori')->result_array();

			$this->load->view('template/header');
			$this->load->view('utama/barang_masuk', $data);
			$this->load->view('template/footer');
		}

		function barang_keluar(){

			$data['kode'] = "BK-".rand(0,100000);
			$data['barang'] = $this->db->get('tbl_produk')->result_array();
			$this->load->view('template/header');
			$this->load->view('utama/barang_keluar', $data);
			$this->load->view('template/footer');
		}

		function act_barang_keluar(){

			$data = [
				'kode_barang_keluar' => $this->input->post('kode'),
				'kode_produk' => $this->input->post('kode_produk'),
				'harga_produk' => $this->input->post('harga'),
				'harga_jual' => $this->input->post('harga_jual'),
				'qty' => $this->input->post('qty'),
				'unit' => $this->input->post('unit'),
				'pembeli' => $this->input->post('pembeli'),
				'total_harga' => $this->input->post('harga_jual') *  $this->input->post('qty'),
				'date' => date('d-m-Y'),
			];

			$update_stok = $this->db->get_where('tbl_produk',['kode_produk' => $this->input->post('kode_produk')])->row_array();

			$data2 = [
				'stok' => $update_stok['stok'] - $this->input->post('qty')
			];

			$this->db->where('kode_produk', $this->input->post('kode_produk'));
			$this->db->update('tbl_produk', $data2);

			$this->db->insert('tbl_barang_keluar', $data);
			$kode =$this->input->post('kode');
			redirect("index/cetak_faktur?kode=$kode");


			// $this->session->set_flashdata('message', 'swal("Good Job", "Barang berhasil dikeluar", "success" );');
			// redirect('index/barang_keluar');
		}


		function data_barang_keluar(){
			$data['keluar'] = $this->db->get('tbl_barang_keluar')->result_array();

			$this->load->view('template/header');
			$this->load->view('utama/data_barang_keluar', $data);
			$this->load->view('template/footer');
		}

		function edit_barang_keluar(){

			$kode = $this->input->post('kode');
			$data = [
				'harga_produk' => $this->input->post('harga'),
				'harga_jual' => $this->input->post('harga_jual'),
				'qty' => $this->input->post('qty'),
			];

			$this->db->where('kode_barang_keluar', $kode);
			$this->db->update('tbl_barang_keluar', $data);
			$this->session->set_flashdata('message', 'swal("Good Job", "Barang kelluar barhasil di update", "success" );');
			redirect('index/data_barang_keluar');
		}

		function cetak_faktur(){
			$kode = $this->input->get('kode');
			$data['barang'] = $this->db->get_where('tbl_barang_keluar',['kode_barang_keluar' => $kode])->row_array();

			$this->load->view('utama/cetak_faktur', $data);
		}

		function barang_keluar2(){
			$data['barang'] = $this->db->get('tbl_produk')->result_array();
			$this->load->view('template/header');
			$this->load->view('utama/barang_keluar2', $data);
			$this->load->view('template/footer');
		}

		function add_kasir(){
			$kode = $this->input->get('kode');
			$qty = $this->input->get('qty');
			$harga = $this->input->get('harga');



			$kode_kasir = 'order-'.rand(0, 10000);
			$data = [
				'kode_order' => $kode_kasir,
				'kode_produk' => $kode,
				'harga_jual' => $harga,
				'qty' => $qty,
				'total_harga' => $harga * $qty,
				'date' => date('Y-m-d'),
			];

			$input = $this->db->insert('tbl_order', $data);

			$data['list'] = $this->db->get_where('tbl_order',['kode_order' => $kode_kasir])->result_array();

			$this->db->select_sum('total_harga');
			$data['total'] = $this->db->get_where('tbl_order',['kode_order' => $kode_kasir])->row_array();

			$this->load->view('index/list_kasir', $data);
		}

		function data_admin(){
			$data['admin'] = $this->db->get('tbl_admin')->result_array();
			$this->load->view('template/header');
			$this->load->view('utama/data_admin', $data);
			$this->load->view('template/footer');
		}

		function tambah_admin(){

			$data = [
				'username' => $this->input->post('username'),
				'role' => $this->input->post('role'),
				'pass' => password_hash($this->input->post('pass'), PASSWORD_DEFAULT),
			];

			$this->db->insert('tbl_admin', $data);
			$this->session->set_flashdata('message', 'swal("Good Job", "Admin berhasil di tambah", "success" );');
			redirect('index/data_admin');
		}

		function hapus_admin(){
			$id = $this->input->post('id');
			$this->db->where('id', $id);
			$this->db->delete('tbl_admin');
			$this->session->set_flashdata('message', 'swal("Good Job", "Admin berhasil di hapus", "success" );');
			redirect('index/data_admin');
		}




	}

?>
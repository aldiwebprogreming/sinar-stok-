<?php 

	/**
	 * 
	 */
	class Utama extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();

			if ($this->session->username == null) {
				
				redirect('login/');
			}
		}

		function index(){

			$data['kontak'] = $this->db->get('tbl_kontak')->num_rows();
			$data['admin'] = $this->db->get('tbl_admin')->num_rows();
			$data['terkirim'] = $this->db->get('tbl_pesanterkirim')->num_rows();
			$data['device'] = $this->db->get('tbl_device')->num_rows();
			$data['text'] = $this->db->get('tbl_pesan')->num_rows();

			$this->load->view('template/header');
			$this->load->view('utama/index', $data);
			$this->load->view('template/footer');
		}

		function data_kontak(){
			$data['nohp'] = $this->db->get('tbl_kontak')->result_array();
			$this->load->view('template/header');
			$this->load->view('utama/data_kontak', $data);
			$this->load->view('template/footer');
		}

		function tambah_kontak(){
			$data = [
				'status' => 0,
				'nohp' => $this->input->post('nohp')
			];

			$this->db->insert('tbl_kontak', $data);
			$this->session->set_flashdata('message', 'swal("Yess", "Kontak berhasil ditambah", "success" );');
			redirect('utama/data_kontak');
		}

		function hapus_kontak(){
			$id = $this->input->post('id');
			$this->db->where('id', $id);
			$this->db->delete('tbl_kontak');

			$this->session->set_flashdata('message', 'swal("Yess", "Kontak berhasil dihapus", "success" );');
			redirect('utama/data_kontak');
		}

		function edit_kontak(){
			$id = $this->input->post('id');
			$this->db->where('id', $id);
			$this->db->update('tbl_kontak',['nohp' => $this->input->post('nohp')]);
			$this->session->set_flashdata('message', 'swal("Yess", "Kontak berhasil diubah", "success" );');
			redirect('utama/data_kontak');
		}

		function data_pesan(){
			$data['pesan'] = $this->db->get('tbl_pesan')->result_array();
			$this->load->view('template/header');
			$this->load->view('utama/data_pesan', $data);
			$this->load->view('template/footer');
		}

		function tambah_pesan(){
			$data = [
				'pesan' => $this->input->post('text'),
			];

			$this->db->insert('tbl_pesan', $data);
			$this->session->set_flashdata('message', 'swal("Yess", "Pesan berhasil ditambah", "success" );');
			redirect('utama/data_pesan');
		}

		function hapus_pesan(){
			$id = $this->input->post('id');
			$this->db->where('id', $id);
			$this->db->delete('tbl_pesan');

			$this->session->set_flashdata('message', 'swal("Yess", "Pesan berhasil dihapus", "success" );');
			redirect('utama/data_pesan');
		}

		function edit_pesan(){
			$id = $this->input->post('id');
			$this->db->where('id', $id);
			$this->db->update('tbl_pesan',['pesan' => $this->input->post('pesan')]);
			$this->session->set_flashdata('message', 'swal("Yess", "Kontak berhasil diubah", "success" );');
			redirect('utama/data_pesan');
		}

		function data_device(){
			$data['device'] = $this->db->get('tbl_device')->result_array();
			$this->load->view('template/header');
			$this->load->view('utama/data_device', $data);
			$this->load->view('template/footer');
		}

		function tambah_device(){
			$data = [
				'kode_device' => $this->input->post('kode_device'),
				'key' => $this->input->post('key')
			];

			$this->db->insert('tbl_device', $data);
			$this->session->set_flashdata('message', 'swal("Yess", "Device berhasil ditambah", "success" );');
			redirect('utama/data_device');
		}

		function hapus_device(){

			$id = $this->input->post('id');
			$this->db->where('id', $id);
			$this->db->delete('tbl_device');

			$this->session->set_flashdata('message', 'swal("Yess", "Device berhasil dihapus", "success" );');
			redirect('utama/data_device');
		}

		function edit_device(){
			$data = [
				'kode_device' => $this->input->post('kode_device'),
				'key' => $this->input->post('key')
			];
			$id = $this->input->post('id');
			$this->db->where('id', $id);
			$this->db->update('tbl_device', $data);
			$this->session->set_flashdata('message', 'swal("Yess", "Kontak berhasil diubah", "success" );');
			redirect('utama/data_device');
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
				'pass' => password_hash($this->input->post('pass'), PASSWORD_DEFAULT)
			];

			$this->db->insert('tbl_admin', $data);
			$this->session->set_flashdata('message', 'swal("Yess", "Admin berhasil ditambah", "success" );');
			redirect('utama/data_admin');
		}

		function hapus_admin(){

			$id = $this->input->post('id');
			$this->db->where('id', $id);
			$this->db->delete('tbl_admin');

			$this->session->set_flashdata('message', 'swal("Yess", "Admin berhasil dihapus", "success" );');
			redirect('utama/data_admin');
		}

		

		function data_pesanterkirim(){
			$data['terkirim'] = $this->db->get('tbl_pesanterkirim')->result_array();
			$this->load->view('template/header');
			$this->load->view('utama/data_pesanterkirim', $data);
			$this->load->view('template/footer');
		}

		function kirimpesan(){

			$data['kontak'] = $this->db->get('tbl_kontak')->result_array();

			$this->db->where('status', 1);
			$data['pesan'] = $this->db->get('tbl_pesan')->row_array();

			$this->db->where('status', 1);
			$data['key'] = $this->db->get('tbl_device')->row_array();

			$this->load->view('template/header');
			$this->load->view('utama/kirimpesan', $data);
			$this->load->view('template/footer');
		}

		function act_kirimpesan(){

			$jumlah = $this->input->post('jml');
			$pesan = $this->input->post('pesan');

			$this->db->where('status', 0);
			$kontak = $this->db->get('tbl_kontak', $jumlah)->result_array();

			$lop = 0; 

			foreach ($kontak as $send) {

				echo $send['nohp']."<br>";

				$lop++;
				// $this->wa_api($pesan, $send['nohp']);

				$data = [
					'nohp' => $send['nohp'],
					'pesan' => $pesan
				];

				$this->db->insert('tbl_pesanterkirim', $data);

				$this->update_kontak($send['id']);
			}

			// echo $lop;

			if ($lop == $jumlah) {
				$this->session->set_flashdata('message', 'swal("Yess", "Blash whatsapp selesai", "success" );');
				redirect('utama/kirimpesan');
			}
		}

		function wa_api($pesan, $nohp){
			$this->db->where('status', 1);
			$api = $this->db->get('tbl_device')->row_array();
		$api_key   = $api['key']; // API KEY Anda
		$id_device = $api['kode_device']; // ID DEVICE yang di SCAN (Sebagai pengirim)
		$url   = 'https://api.watsap.id/send-message'; // URL API
		$no_hp = $nohp; // No.HP yang dikirim (No.HP Penerima)
		$pesan = $pesan; // Pesan yang dikirim

		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_HEADER, 0);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($curl, CURLOPT_MAXREDIRS, 10);
		curl_setopt($curl, CURLOPT_TIMEOUT, 0); // batas waktu response
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($curl, CURLOPT_POST, 1);

		$data_post = [
			'id_device' => $id_device,
			'api-key' => $api_key,
			'no_hp'   => $no_hp,
			'pesan'   => $pesan
		];
		curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data_post));
		curl_setopt($curl, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
		$response = curl_exec($curl);
		curl_close($curl);
		echo $response;
	}

	function update_kontak($id){

		$this->db->where('id', $id);
		$this->db->update('tbl_kontak', ['status' => 1]);

	}

	function resetkontak() {
		$this->db->where('status', 1);
		$this->db->update('tbl_kontak', ['status' => 0]);
		$this->session->set_flashdata('message', 'swal("Yess", "Kontak berhasil di reset", "success" );');
		redirect('utama/data_kontak');
	}

	function list(){

		$kontak = $this->db->get('tbl_kontak', 3)->row_array();
		echo $kontak['id'];
	}

	function delet(){
		$this->db->where('pesan', 'Hello');
		$this->db->delete('tbl_pesanterkirim');
	}


	function status_pesan(){
		$id = $this->input->post('id');
		$status = $this->db->get_where('tbl_pesan', ['id' => $id])->row_array();
		if ($status['status'] == 0) {

			$cek_status = $this->db->get_where('tbl_pesan',['status' => 1])->row_array();
			if ($cek_status == true) {
				
				$this->session->set_flashdata('message', 'swal("Oops", "Anda tidak dapat mengaktifkan pesan lebih dari satu", "error" );');
				redirect('utama/data_pesan');
			}else{

				$this->db->where('id', $id);
				$this->db->update('tbl_pesan',['status' => 1]);

				$this->session->set_flashdata('message', 'swal("Yess", "Pesan anda di aktifkan", "success" );');
				redirect('utama/data_pesan');
			}
		}else{

			$this->db->where('id', $id);
			$this->db->update('tbl_pesan',['status' => 0]);

			$this->session->set_flashdata('message', 'swal("Yess", "Pesan anda di tidak di aktifkan", "success" );');
			redirect('utama/data_pesan');
		}
	}

	function status_key(){
		
		$id = $this->input->post('id');
		$status = $this->db->get_where('tbl_device', ['id' => $id])->row_array();
		if ($status['status'] == 0) {

			$cek_status = $this->db->get_where('tbl_device',['status' => 1])->row_array();
			if ($cek_status == true) {
				
				$this->session->set_flashdata('message', 'swal("Oops", "Anda tidak dapat mengaktifkan device key lebih dari satu", "error" );');
				redirect('utama/data_device');
			}else{

				$this->db->where('id', $id);
				$this->db->update('tbl_device',['status' => 1]);

				$this->session->set_flashdata('message', 'swal("Yess", "Device key anda di aktifkan", "success" );');
				redirect('utama/data_device');
			}
		}else{

			$this->db->where('id', $id);
			$this->db->update('tbl_device',['status' => 0]);

			$this->session->set_flashdata('message', 'swal("Yess", "Device key anda di tidak di aktifkan", "success" );');
			redirect('utama/data_device');
		}

	}


	function update_status_kontak(){

		$this->db->where('status', 1);
		$this->db->update('tbl_kontak',['status' => 0]);
	}


	function form(){

		$this->load->view('utama/form');

	}



}
?>
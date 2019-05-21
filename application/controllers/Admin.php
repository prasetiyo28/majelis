<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('MMajelis');

	}

	public function index()	
	{
		$data['laki'] = $this->MMajelis->get_user_laki();
		$data['perempuan'] = $this->MMajelis->get_user_perempuan();
		$data['nu'] = $this->MMajelis->get_nu();
		$data['mu'] = $this->MMajelis->get_mu();
		$data['content'] = $this->load->view('pages/dashboard',$data,true);
		$this->load->view('default',$data);
	}

	public function majelis()
	{
		$data2['majelis'] =$this->MMajelis->get_majelis_all();
		$data2['kategori'] =$this->MMajelis->get_kategori();
		$data['content'] = $this->load->view('pages/data_majelis',$data2,true);
		$this->load->view('default',$data);
	}

	public function save_majelis(){

		$new_name = 'majelis_'.time();

		$nama_file = $_FILES["foto"]['name'];
		$ext = pathinfo($nama_file, PATHINFO_EXTENSION);
		$nama_upload = $new_name.".".$ext;


		$data['nama_majelis'] = $_POST['nama'];
		$data['ketua'] = $_POST['ketua'];
		$data['id_kategori'] = $_POST['kategori'];
		$data['kontak'] = $_POST['kontak'];
		$data['alamat'] = $_POST['alamat'];
		$data['logo']=$nama_upload;

		$config['upload_path']          = './foto_majelis/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 5000;
		$config['file_name']             = $new_name;


		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('foto')){
// $error = array('error' => $this->upload->display_errors());
			$this->session->set_flashdata('alert','gagal');
			// redirect('guru/indonesia_apetizer');
			redirect($_SERVER['HTTP_REFERER']);

// echo json_encode($error);
		}else{
			$datas = array('upload_data' => $this->upload->data());
			$tabel = 'majelis';
			$this->MMajelis->tambah_data($tabel,$data);
			$this->session->set_flashdata('alert','berhasil');
			redirect($_SERVER['HTTP_REFERER']);

		}



	}

	public function user()
	{
		$data2['users'] =$this->MMajelis->get_users_all();
		$data['content'] = $this->load->view('pages/data_user',$data2,true);
		$this->load->view('default',$data);

		// echo json_encode($data2);
	}

	public function laporan()
	{
		echo "laporan";
		// $data['content'] = $this->load->view('pages/data_user','',true);
		// $this->load->view('default',$data);
	}
}

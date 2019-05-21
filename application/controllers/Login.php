<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('MMajelis');

	}

	public function index()	
	{
		
		$this->load->view('login');
	}

	public function login()
	{
		$data['email'] = $_POST['email'];
		$data['password'] = md5($_POST['password']);

		$cek_login = $this->MMajelis->cek_login($data);
		if (!isset($cek_login))	 {
			$this->session->set_flashdata('alert','gagal');
			redirect('login');
		}else{

			$datauser = array(
				'user_id' => $cek_login->id_admin,
				'nama' => $cek_login->nama,
				'email' => $cek_login->email,
			);



			$this->session->set_userdata($datauser);

			redirect('admin');

		}


	}

	public function logout(){
		$this->session->sess_destroy();
		redirect ('frontend');
	}
}

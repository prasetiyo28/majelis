<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;
class Api extends REST_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('MMajelis');

	}

	public function index_get(){
// testing response
		$response['status']=200;
		$response['error']=false;
		$response['message']='Hai from response';
// tampilkan response
		$this->response($response);
	}
	public function majelis_get()
	{
		$response['status']=true;
		$response['error']=false;
		$response['message']='all majelis found';
		$response['data'] =$this->MMajelis->get_majelis_all();
		// $data2['kategori'] =$this->MMajelis->get_kategori();
		
		$this->response($response);
	}

	public function register_post(){
		$data['nama'] = $_POST['nama'];
		$data['jenis_kelamin'] = $_POST['jenis_kelamin'];
		$data['email'] = $_POST['email'];
		$data['password'] = md5($_POST['password']);
		$data['verif'] = '1';

		$data2['email'] = $_POST['email'];
		$tabel = 'users';
		$cek_email = $this->MMajelis->cek_email($data2);

		if ($cek_email < 1) {
			$register = $this->MMajelis->tambah_data($tabel,$data);

			if ($register) {
				$response['status']=true;
				$response['error']=false;
				$response['message']='register sucessfully';


			}else{
				$response['error']=true;
				$response['message']='register failed contact your administrator :(';			
			}
		}else{
			$response['error']=true;
			$response['message']='email is already in use';
		}

		$this->response($response);

	}

	public function login_post(){
		$data['email'] = $_POST['email'];
		$data['password'] = md5($_POST['password']);
		$data['verif'] = '1';
		$data['blocked'] = '0';

		$login = $this->MMajelis->cek_login_users($data);
		if ($login) {
			$response['status']=true;			
			$response['error']=false;
			$response['message']='welcome';			
			$response['data']=$login;

		}else{

			$response['status']=false;			
			$response['error']=true;
			$response['message']='users not found 404 :(';			
			

		}

		$this->response($response);

	}
}
/* End of file Api */
/* Location: ./application/controllers/Api */
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;
class Api extends REST_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('MMajelis');

	}



	public function index_get($id=''){
		if ($id=='') {
	// testing response
			$data = $this->MMajelis->get_majelis_all();

			foreach ($data as $d) {
				$d->id_majelis = (int)$d->id_majelis;
				// echo $d->id_majelis;
			}
			$response['status']=true;
			$response['error']=false;
			$response['message']='all majelis found';
			$response['data'] =$data;
// tampilkan response

		}else{
			$data = $this->MMajelis->get_majelis_by_id($id);	
			foreach ($data as $d) {
				$d->id_majelis = (int)$d->id_majelis;
				// echo $d->id_majelis;
			}
			$response['status']=true;
			$response['error']=false;
			$response['message']='all majelis found';
			$response['data'] = $data;
		}

		$this->response($response);
	}

	public function streaming_get($id=''){
		if ($id=='') {
	// testing response
			$data = $this->MMajelis->get_streaming_all();

			foreach ($data as $d) {
				$d->id_streaming = (int)$d->id_streaming;
				$d->id_majelis = (int)$d->id_majelis;
				// echo $d->id_majelis;
			}
			$response['status']=true;
			$response['error']=false;
			$response['message']='all streaming found';
			$response['data'] =$data;
// tampilkan response

		}else{
			$data = $this->MMajelis->get_streaming_by_id($id);	
			foreach ($data as $d) {
				$d->id_majelis = (int)$d->id_majelis;
				$d->id_streaming = (int)$d->id_streaming;
				// echo $d->id_majelis;
			}
			$response['status']=true;
			$response['error']=false;
			$response['message']='all majelis found';
			$response['data'] = $data;
		}

		$this->response($response);
	}
	public function token_get()
	{
		$token = openssl_random_pseudo_bytes(10);

//Convert the binary data into hexadecimal representation.
		$token = bin2hex($token);

//Print it out for example purposes.
		echo $token;
	}
	public function majelis_get($id='')
	{


		if ($id == '') {
			$response['status']=true;
			$response['error']=false;
			$response['message']='all majelis found';
			$response['data'] =$this->MMajelis->get_majelis_all();	
			
		}else if ($id=='nu'){
			$response['status']=true;
			$response['error']=false;
			$response['message']='all majelis found';
			$response['data'] =$this->MMajelis->get_majelis_by_kategori('1');	
		}else if ($id=='mu'){
			$response['status']=true;
			$response['error']=false;
			$response['message']='all majelis found';
			$response['data'] =$this->MMajelis->get_majelis_by_kategori('2');	
		}
		else{


			$response['status']=true;
			$response['error']=false;
			$response['message']='all majelis found';
			$response['data'] =$this->MMajelis->get_majelis_by_id($id);	

		}
		// $data2['kategori'] =$this->MMajelis->get_kategori();

		$this->response($response);
	}

	public function nu_get($id=''){
		if ($id==''){

			$data = $this->MMajelis->get_majelis_by_kategori('1');

			foreach ($data as $d) {
				$d->id_majelis = (int)$d->id_majelis;

				// echo $d->id_majelis;
			}
			$response['status']=true;
			$response['error']=false;
			$response['message']='all majelis found';
			$response['data'] =$data;	
		}else{
			$data = $this->MMajelis->get_majelis_by_id($id);
			$data->id_majelis = (int)$data->id_majelis;
			
			$response['status']=true;
			$response['error']=false;
			$response['message']='all majelis found';
			$response['data'] =$data;
			$response['data']->kegiatan = $this->MMajelis->get_kegiatan_by_majelis($id);

		}


		$this->response($response);
	}

	public function mu_get($id=''){
		if ($id==''){
			$data = $this->MMajelis->get_majelis_by_kategori('2');

			foreach ($data as $d) {
				$d->id_majelis = (int)$d->id_majelis;
				// echo $d->id_majelis;
			}
			$response['status']=true;
			$response['error']=false;
			$response['message']='all majelis found';
			$response['data'] = $data;	

		}else{
			$data = $this->MMajelis->get_majelis_by_id($id);
			$data->id_majelis = (int)$data->id_majelis;
				// echo $d->id_majelis;
			
			$response['status']=true;
			$response['error']=false;
			$response['message']='all majelis found';
			$response['data'] =$data;
			$response['data']->kegiatan = $this->MMajelis->get_kegiatan_by_majelis($id);

		}

		$this->response($response);

	}

	public function kategori_get($id='')
	{


		if ($id == '') {

			$data = $this->MMajelis->get_majelis_by_kategori('2');

			foreach ($data as $d) {
				$d->id_majelis = (int)$d->id_majelis;
				// echo $d->id_majelis;
			}
			$response['status']=true;
			$response['error']=false;
			$response['message']='all majelis found';
			$response['data'] =$this->MMajelis->get_majelis_all();	

		}else{
			$response['status']=true;
			$response['error']=false;
			$response['message']='all majelis found';
			$response['data'] =$this->MMajelis->get_majelis_by_kategori($id);	

		}
		// $data2['kategori'] =$this->MMajelis->get_kategori();

		$this->response($response);
	}

	public function pesan_post(){
		$data['dari'] = $this->input->post('id_user');
		$data['untuk'] = $this->input->post('id_majelis');
		$data['pesan'] = $this->input->post('pesan');

		$this->MMajelis->tambah_data('pesan',$data);

		$response['data']->id_majelis = $data['untuk'];
		$response['data']->id_user = $data['dari'];
		$response['data']->pesan = $data['pesan'];
		$response['status']=true;
		$response['error']=false;
		$response['message']='your message is sucessfully sent';

		$this->response($response);

	}

	public function register_post(){
		$token = openssl_random_pseudo_bytes(10);

//Convert the binary data into hexadecimal representation.
		$token = bin2hex($token);

//Print it out for example purposes.

		$data['nama'] = $_POST['nama'];
		// $data['jenis_kelamin'] = $_POST['jenis_kelamin'];
		$data['email'] = $_POST['email'];
		$data['password'] = md5($_POST['password']);
		$data['api_token'] = $token;
		$data['verif'] = '1';

		$data2['email'] = $_POST['email'];
		$tabel = 'users';
		$cek_email = $this->MMajelis->cek_email($data2);

		if ($cek_email < 1) {
			$register = $this->MMajelis->tambah_data($tabel,$data);

			if ($register) {
				$response['status']=true;
				$response['error']=false;
				$response['data']=$this->MMajelis->get_register();
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

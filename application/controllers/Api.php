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
			$response['data']->pesan = $this->MMajelis->get_pesan_by_majelis($id);

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
			$response['data']->pesan = $this->MMajelis->get_pesan_by_majelis($id);

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
		$response['status']=true;
		$response['error']=false;
		$response['message']='your message is sucessfully sent';
		$response['data']->id_majelis = $data['untuk'];
		$response['data']->id_user = $data['dari'];
		$response['data']->pesan = $data['pesan'];
		
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
		$data['token'] = $token;
		$data['verif'] = '0';

		$data2['email'] = $_POST['email'];
		$tabel = 'users';
		$cek_email = $this->MMajelis->cek_email($data2);

		if ($cek_email < 1) {
			$register = $this->MMajelis->tambah_data($tabel,$data);

			if ($register) {
				$register = $this->MMajelis->get_register();
				
				
				$register->api_token = $register->token;
				
				$this->send($register->id_user,$register->email);
				$response['status']=true;
				$response['error']=false;
				$response['data']= $register;
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

	public function send($id,$email){
		$htmlContent = '<h1>Klik Link di bawah ini untuk memverifikasi akun anda</h1>';
		$htmlContent .= '<a href='.base_url().'login/verifikasi/'.$id.'>Verifikasi</a>';


		$ci = get_instance();
		$ci->load->library('email');
		$config['protocol'] = "smtp";
		$config['smtp_host'] = "ssl://mail.plug-in.id";
		$config['smtp_port'] = "465";
		$config['smtp_user'] = "majelis@plug-in.id";
		$config['smtp_pass'] = "M_ajelis12345";
		$config['charset'] = "utf-8";
		$config['mailtype'] = "html";
		$config['newline'] = "\r\n";
		$config['crlf'] = "\r\n";
		$ci->email->initialize($config);
		$ci->email->from('majelis@plug-in.id', 'Verif majelis');
		$list = array($email);
		$ci->email->to($list);
		$ci->email->subject('Verifikasi Majelis');


		$ci->email->message($htmlContent);
		if ($this->email->send()) {
			echo 'Email sent.';
		} else {
			show_error($this->email->print_debugger());
		}
	}

	public function login_post(){
		$data['email'] = $_POST['email'];
		$data['password'] = md5($_POST['password']);
		$data['verif'] = '1';
		$data['blocked'] = '0';

		$login = $this->MMajelis->cek_login_users($data);
		$login->api_token = $login->token;
		$login->firebase_token = $_POST['firebase_token'];
		$update['firebase_token'] =  $_POST['firebase_token'];
		$this->MMajelis->update_data('users',$update,$login->id_user,'id_user');
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


	public function fcm_post(){
		$data['api_token'] = $_POST['api_token'];
		$data['firebase_token'] = $_POST['firebase_token'];
		
		// $login = $this->MMajelis->cek_login_users($data);
		// $login->api_token = $login->token;
		
		

		$response['status']=true;			
		$response['error']=false;
		$response['message']='token received';			
		$response['data']=$data;			



		$this->response($response);

	}

	public function pencarian_post(){

		$cari = $this->input->post('cari');
		$kegiatan = $this->MMajelis->get_kegiatan_by_cari($cari);
		// foreach ($kegiatan as $r ) {
		// 	$data['id'] = $kegiatan->nama_kegiatan;
		// 	$data['nama_kegiatan'] = $kegiatan->nama_kegiatan;
		// 	$data['tempat'] = $kegiatan->nama_majelis;
		
		// }

		if (empty($kegiatan)) {
			$response['status']=false;
			$response['error']=true;
			$response['message']='kegiatan not found';
			
		}else{
			$response['status']=true;
			$response['error']=false;
			$response['message']='all majelis found';
			$response['data'] =$kegiatan;	

		}

		$this->response($response);


	}
}
/* End of file Api */
/* Location: ./application/controllers/Api */

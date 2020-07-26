<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Majelis extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('MMajelis');


		if ($this->session->userdata('majelis_id')=='') {
			redirect('login','refresh');
		}
	}

	public function index()
	{
		$data['content'] = $this->load->view('majelis/pages/dashboard', '', true);
		$this->load->view('majelis/default', $data);
	}

	public function data_majelis(){
		$id = $this->session->userdata('majelis_id');

		$data2['majelis'] = $this->MMajelis->get_majelis_by_user($id);
		$data['content'] = $this->load->view('majelis/pages/data_majelis',$data2, true);
		$this->load->view('majelis/default',$data);

		// echo json_encode($data2);
	}

	public function data_infaq(){
		$id = $this->session->userdata('majelis_id');

		$data2['majelis'] = $this->MMajelis->get_majelis_by_user($id);
		$data2['infaq'] = $this->MMajelis->get_infaq_by_id($id);
		$data['content'] = $this->load->view('majelis/pages/data_infaq',$data2, true);
		$this->load->view('majelis/default',$data);
		
		// echo json_encode($data2);
	}

	public function pesan_majelis(){
		$id = $this->session->userdata('majelis_id');

		$data2['pesan'] = $this->MMajelis->get_pesan_by_majelis($id);
		$data['content'] = $this->load->view('majelis/pages/data_pesan',$data2, true);
		$this->load->view('majelis/default',$data);

		// echo json_encode($data2);
	}

	public function kegiatan(){
		$id = $this->session->userdata('majelis_id');

		$data2['kegiatan'] = $this->MMajelis->get_kegiatan_by_majelis($id);
		$data['content'] = $this->load->view('majelis/pages/data_kegiatan',$data2, true);
		$this->load->view('majelis/default',$data);

		// echo json_encode($data2);
	}

	public function streaming(){
		$id = $this->session->userdata('majelis_id');

		$data2['streaming'] = $this->MMajelis->get_streaming_by_majelis($id);
		$data['content'] = $this->load->view('majelis/pages/data_streaming',$data2, true);
		$this->load->view('majelis/default',$data);

		// echo json_encode($data2);
	}

	public function update_majelis(){

		$id = $this->session->userdata('majelis_id');
		$data['nama_majelis'] = $this->input->post('nama');
		$data['ketua'] = $this->input->post('ketua');
		$data['alamat'] = $this->input->post('alamat');
		$data['kontak'] = $this->input->post('kontak');
		
		$password = $this->input->post('password');
		if($password != ''){
			$data2['password'] = md5($password);
			$this->MMajelis->update_data('users_majelis',$data2,$id,'id_majelis');
		}
		
		$table = 'majelis';
		$param = 'id_majelis';
		$this->MMajelis->update_data($table,$data,$id,$param);
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function save_infaq(){

		$data['id_majelis'] = $this->session->userdata('majelis_id');
		$data['nama'] = $this->input->post('nama');
		$data['infaq'] = $this->input->post('jumlah');
		
		$table = 'infaq';
		$this->MMajelis->tambah_data($table,$data);
		
		$id = $data['id_majelis'];
		$data2['infaq'] = $this->MMajelis->get_infaq_sum_by_id($id)->infaq;
		$table2 = 'majelis';
		$param2 = 'id_majelis';
	
		$this->MMajelis->update_data($table2,$data2,$id,$param2);
		
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function update_infaq(){

		$id = $this->session->userdata('majelis_id');
		$data['infaq'] = $this->input->post('infaq');
		$table = 'majelis';
		$param = 'id_majelis';
		$this->MMajelis->update_data($table,$data,$id,$param);
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function save_kegiatan()
	{
		$data['id_majelis'] = $this->session->userdata('majelis_id');
		$data['nama_kegiatan'] = $this->input->post('nama');
		$data['tempat'] = $this->input->post('tempat');
		$data['tanggal'] = $this->input->post('tanggal');

		$this->MMajelis->tambah_data('kegiatan',$data);
		redirect('majelis/kegiatan');
	}

	public function save_streaming()
	{
		$data['id_majelis'] = $this->session->userdata('majelis_id');
		$data['judul'] = $this->input->post('judul');
		$data['link'] = $this->input->post('link');
		$data['deskripsi'] = $this->input->post('deskripsi');

		$this->MMajelis->tambah_data('streaming',$data);
		define( 'API_ACCESS_KEY', 'AAAAwBXlyeY:APA91bEKoXlizXHDqXVOju1L_Nnjz67cIKTtN54e2XILztdh1uuEkBX8-Qj2Ltn5ycrW42L2bD_lZuXH6-RnvGah0gS6jo4vAaXnPAW79j5NGnjyHIUiBpp-ggxTjKnEIUucuQBpSgeb');
 //   $registrationIds = ;
#prep the bundle
		$msg = array
		(
			'body' 	=> 'Ada Streaming Baru',
			'title'	=> 'Aplikasi Majelis Taklim',

		);
		$id_fcm = $this->MMajelis->get_users_all();
		// echo  json_encode($id_fcm);
		foreach ($id_fcm as $id ) {
			if ($id->firebase_token != null) {
				$fields = array
				(
					'to'		=> $id->firebase_token,
					'notification'	=> $msg
				);


				$headers = array
				(
					'Authorization: key=' . API_ACCESS_KEY,
					'Content-Type: application/json'
				);
#Send Reponse To FireBase Server	
				$ch = curl_init();
				curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
				curl_setopt( $ch,CURLOPT_POST, true );
				curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
				curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
				curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
				curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
				$result = curl_exec($ch );
				echo $result;
				curl_close( $ch );
			}
		}
		redirect('majelis/streaming');
	}

	public function coba_fcm()
	{
		// $data['id_majelis'] = $this->session->userdata('majelis_id');
		// $data['judul'] = $this->input->post('judul');
		// $data['link'] = $this->input->post('link');
		// $data['deskripsi'] = $this->input->post('deskripsi');

		// $this->MMajelis->tambah_data('streaming',$data);
		define( 'API_ACCESS_KEY', 'AAAAwBXlyeY:APA91bEKoXlizXHDqXVOju1L_Nnjz67cIKTtN54e2XILztdh1uuEkBX8-Qj2Ltn5ycrW42L2bD_lZuXH6-RnvGah0gS6jo4vAaXnPAW79j5NGnjyHIUiBpp-ggxTjKnEIUucuQBpSgeb');
 //   $registrationIds = ;
#prep the bundle
		$msg = array
		(
			'body' 	=> 'Ada Streaming Baru',
			'title'	=> 'Aplikasi Majelis Taklim',

		);

		$id_fcm = $this->MMajelis->get_users_all();
		// echo  json_encode($id_fcm);
		foreach ($id_fcm as $id ) {
			if ($id->firebase_token != null) {
				$fields = array
				(
					'to'		=> $id->firebase_token,
					'notification'	=> $msg
				);


				$headers = array
				(
					'Authorization: key=' . API_ACCESS_KEY,
					'Content-Type: application/json'
				);
#Send Reponse To FireBase Server	
				$ch = curl_init();
				curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
				curl_setopt( $ch,CURLOPT_POST, true );
				curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
				curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
				curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
				curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
				$result = curl_exec($ch );
				echo $result;
				curl_close( $ch );
			}
		}
		
		// redirect('majelis/streaming');
	}

	public function selesai($id)
	{
		$this->MMajelis->selesai($id);
		redirect('majelis/streaming');
	}

	public function hapus_infaq($id)
	{
		$this->MMajelis->hapus_infaq($id);

		$id_majelis = $this->session->userdata('majelis_id');
		$data2['infaq'] = $this->MMajelis->get_infaq_sum_by_id($id)->infaq;
		$table2 = 'majelis';
		$param2 = 'id_majelis';
	
		$this->MMajelis->update_data($table2,$data2,$id_majelis,$param2);
		
		redirect('majelis/data_infaq');
	}



}

/* End of file Majelis.php */
/* Location: ./application/controllers/Majelis.php */

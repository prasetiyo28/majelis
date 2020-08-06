<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library(array('googlemaps'));
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

		$config['map_div_id'] = "map-add";
		$config['map_height'] = "250px";
		$config['center'] = '-6.880029,109.124192';
		$config['zoom'] = '12';
		$config['map_height'] = '300px;';
		$this->googlemaps->initialize($config);

		$marker = array();
		$marker['position'] = '-6.880029,109.124192';
		$marker['draggable'] = true;
		$marker['ondragend'] = 'setMapToForm(event.latLng.lat(), event.latLng.lng());';
		$this->googlemaps->add_marker($marker);
		$data['map'] = $this->googlemaps->create_map();
		$data2['map'] = $this->googlemaps->create_map();

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
		
		$validasi_phone = $this->MMajelis->get_number_phone($data['kontak']);
		if (count($validasi_phone) > 0) {
			echo '<script language="javascript">' .
			'alert("Nomor Sudah Digunakan");' .
			'setTimeout(function(){ window.location.href = "/admin/majelis"; });' .
			'</script>';
			// redirect($_SERVER['HTTP_REFERER']);
		}else{
			$data['alamat'] = $_POST['alamat'];
		$data['longitude'] = $_POST['longitude'];
		$data['latitude'] = $_POST['latitude'];
		
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


			$users['email'] = $_POST['email'];
			$users['password'] = md5('majelis12345');
			$users['id_majelis'] = $this->MMajelis->get_id_majelis()->id_majelis;
			$register = $this->MMajelis->tambah_data('users_majelis',$users);
// $this->send($register->id_majelis,$register->email);
if ($register) {
	$register = $this->MMajelis->get_register_majelis();
	$this->send($register->id_majelis,$register->email);
}
			redirect($_SERVER['HTTP_REFERER']);
			// echo json_encode($register);

		}
		}
		
		



	}

	public function save_kategori(){
		$data['kategori'] = $_POST['kategori'];
			$this->MMajelis->tambah_data('kategori',$data);
			redirect($_SERVER['HTTP_REFERER']);
	
	}

	public function get_id($value='')
	{
		$users['id_majelis'] = $this->MMajelis->get_id_majelis()->id_majelis;
		echo json_encode($users);
	}

	public function update_majelis(){

		$data['nama_majelis'] = $_POST['nama'];
		$data['ketua'] = $_POST['ketua'];
		$id_majelis = $_POST['id_majelis'];
		$data['kontak'] = $_POST['kontak'];
		$data['alamat'] = $_POST['alamat'];
		$tabel = 'majelis';
		$param='id_majelis';
		$this->MMajelis->update_data($tabel,$data,$id_majelis,$param);
		$this->session->set_flashdata('alert','berhasil');
		redirect($_SERVER['HTTP_REFERER']);
		// echo json_encode($data);
	}

	public function update_kategori(){
		$id = $_POST['id'];
		$data['kategori'] = $_POST['kategori'];
		$tabel = 'kategori';
		$param='id_kategori';
		$this->MMajelis->update_data($tabel,$data,$id,$param);
		$this->session->set_flashdata('alert','berhasil');
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function block_majelis($id){
		$this->MMajelis->block_majelis($id);
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function unblock($id){
		$this->MMajelis->unblock_majelis($id);
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function hapus_majelis($id){
		$this->MMajelis->hapus_majelis($id);
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function reset_password($id){
		$this->MMajelis->reset_password($id);
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function detail(){
		$id = $_POST['id_majelis'];
		// $id = 1;
		// $table = 'ruang';
		$data = $this->MMajelis->get_majelis_by_id($id);


		echo '
		<table class="table table-striped">
		<tr>
		<td colspan="3"><img style="text-align: center;" class="img-thumbnail" src="'. base_url().'foto_ruang/'. $data->nama.'"></td>
		</tr>
		<tr>
		<td>Nama Ruangan</td>
		<td>:</td>
		<td>'.$data->nama_ruangan.'</td>
		</tr>
		<td>Nama Mitra</td>
		<td>:</td>
		<td>'.$data->nama_mitra.'</td>
		</tr>
		<tr>
		<td>Kapasitas</td>
		<td>:</td>
		<td>'.$data->keterangan.'</td>
		</tr>
		<tr>
		<td>Harga</td>
		<td>:</td>
		<td>Rp.'.$data->harga.'/Jam</td>
		</tr>
		<tr>
		<td>Keterangan</td>
		<td>:</td>
		<td>'.$ket.'</td>
		</tr>
		</table>';


	}

	public function user()
	{
		$data2['users'] =$this->MMajelis->get_users_all();
		$data['content'] = $this->load->view('pages/data_user',$data2,true);
		$this->load->view('default',$data);

		// echo json_encode($data2);
	}

	public function kategori()
	{
		$data2['kategori'] =$this->MMajelis->get_kategori_all();
		$data['content'] = $this->load->view('pages/data_kategori',$data2,true);
		$this->load->view('default',$data);

		// echo json_encode($data2);
	}

	public function hapus_kategori($id){
		$data = $this->MMajelis->get_majelis_by_id_kategori($id);
		if (count($data) > 0) {
			$this->session->set_flashdata('alert','gagal');
			redirect($_SERVER['HTTP_REFERER']);
		}else{
			$this->MMajelis->hapus_kategori($id);
			redirect($_SERVER['HTTP_REFERER']);
		}
		
	}



	public function cetak_laporan()
	{
		$data2['majelis'] =$this->MMajelis->get_majelis_all();
		// echo "laporan";
		// $data['content'] = $this->load->view('pages/data_user','',true);
		$this->load->view('pages/cetak_laporan',$data2);
	}

	public function laporan()
	{
		$data['content'] = $this->load->view('pages/laporan','',true);
		$this->load->view('default',$data);

	}

	public function laporan_infaq()
	{
		$data2['kategori'] =$this->MMajelis->get_kategori();
		$data['content'] = $this->load->view('pages/laporan_infaq',$data2,true);
		$this->load->view('default',$data);

	}

	public function cetak_laporan_infaq()
	{
		$params['bulan'] = $_POST['bulan'];
		$params['id_kategori'] = $_POST['kategori'];
		$data2['infaq'] =$this->MMajelis->get_laporan_infaq_majelis($params);
		$data2['kategori'] =$this->MMajelis->get_kategori_by_id($_POST['kategori'])->kategori;
		// echo "laporan";
		
		if (count($data2['infaq']) > 0) {
			$data2['bulan_tahun'] = $data2['infaq'][0]->bulantahun;
		}else{
			$data2['bulan_tahun'] =  $_POST['bulan'];
		}

		// echo json_encode($data2);

		$this->load->view('pages/cetak_laporan_infaq',$data2);
	}

	public function send($id,$email){
		$htmlContent = '<h1>Klik Link di bawah ini untuk memverifikasi akun anda</h1>';
		$htmlContent .= '<a href='.base_url().'majelis/verifikasi/'.$id.'>Verifikasi</a>';


		$ci = get_instance();
		$ci->load->library('email');
		$config['protocol'] = "smtp";
		$config['smtp_host'] = "ssl://mail.odxiety.com";
		$config['smtp_port'] = "465";
		$config['smtp_user'] = "majelis@odxiety.com";
		$config['smtp_pass'] = "12345majelis";
		$config['charset'] = "utf-8";
		$config['mailtype'] = "html";
		$config['newline'] = "\r\n";
		$config['crlf'] = "\r\n";
		$ci->email->initialize($config);
		$ci->email->from('majelis@odxiety.com', 'Verif majelis');
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
}

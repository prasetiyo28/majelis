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
		$data['content'] = $this->load->view('majelis/pages/data_infaq',$data2, true);
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

	public function update_majelis(){

		$id = $this->session->userdata('majelis_id');
		$data['nama_majelis'] = $this->input->post('nama');
		$data['ketua'] = $this->input->post('ketua');
		$data['alamat'] = $this->input->post('alamat');
		$data['kontak'] = $this->input->post('kontak');
		$table = 'majelis';
		$param = 'id_majelis';
		$this->MMajelis->update_data($table,$data,$id,$param);
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
	
}

/* End of file Majelis.php */
/* Location: ./application/controllers/Majelis.php */

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

}

/* End of file Api */
/* Location: ./application/controllers/Api */
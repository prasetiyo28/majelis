<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MMajelis extends CI_Model{

	function tambah_data($table,$data){
		$this->db->insert($table,$data);
		return "success";
	}

	function cek_login($data){
		$this->db->where($data);
		$query = $this->db->get('admin');
		
		return $query->row();
	}

	function cek_login_users($data){
		$this->db->where($data);
		$query = $this->db->get('users');
		
		return $query->row();
	}

	function cek_email($data){
		$this->db->where($data);
		$query = $this->db->get('users');
		
		return $query->num_rows();
	}

	function get_kategori(){
		$query = $this->db->get('kategori');
		return $query->result();
	}

	function get_majelis_all(){
		$this->db->select('majelis.*, kategori.kategori');
		$this->db->from('majelis');
		$this->db->join('kategori','majelis.id_kategori = kategori.id_kategori');
		$this->db->where('majelis.deleted','0');
		$query = $this->db->get();
		return $query->result();
	}

	function get_users_all(){
		$this->db->select('users.*, majelis.nama_majelis as nama_majelis');
		$this->db->from('users');
		$this->db->join('majelis','majelis.id_majelis = users.id_majelis');
		$this->db->where('users.deleted','0');
		$query = $this->db->get();
		return $query->result();
	}

	function get_nu(){
		$this->db->where('id_kategori','1');
		$query = $this->db->get('majelis');
		return $query->result();
	}

	function get_mu(){
		$this->db->where('id_kategori','2');
		$query = $this->db->get('majelis');
		return $query->result();
	}

	function get_user_laki()
	{
		$this->db->where('jenis_kelamin','Laki-Laki');
		$query = $this->db->get('users');
		return $query->result();	
	}

	function get_user_perempuan()
	{
		$this->db->where('jenis_kelamin','Perempuan');
		$query = $this->db->get('users');
		return $query->result();	
	}




	

	function hapus($table,$id,$param){
		$this->db->set('deleted','1');
		$this->db->where($param,$id);
		$this->db->update($table);
	}

	function verifikasi($table,$id,$param){
		$this->db->set('verif','1');
		$this->db->where($param,$id);
		$this->db->update($table);
	}
}
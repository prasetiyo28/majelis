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


	function cek_majelis($data){
		$this->db->where($data);
		$query = $this->db->get('users_majelis');
		
		return $query->row();
	}

	function get_register(){
		// $this->db->where($data);
		$this->db->limit(1);
		$this->db->order_by('id_user','desc');
		$query = $this->db->get('users');
		
		return $query->row();
	}

	function get_id_majelis(){
		$this->db->order_by('id_majelis','DESC');
		$this->db->limit(1);
		$query = $this->db->get('majelis');
		
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
	function get_kegiatan_by_majelis($id){
		$this->db->where('id_majelis',$id);
		$query = $this->db->get('kegiatan');
		return $query->result();
	}
	
	function get_infaq_by_id($id){
		$this->db->where('id_majelis',$id);
		$query = $this->db->get('infaq');
		return $query->result();
	}

	function get_infaq_sum_by_id($id){
		$this->db->where('id_majelis',$id);
		$this->db->select_sum('infaq');
		$query = $this->db->get('infaq');
		return $query->row();
	}


	

	function get_kegiatan_by_cari($cari){
		$this->db->select('kegiatan.id,kegiatan.nama_kegiatan,kegiatan.tempat,kegiatan.tanggal,kategori.kategori,majelis.nama_majelis');
		$this->db->or_like('kegiatan.tempat',$cari);
		$this->db->or_like('majelis.nama_majelis',$cari);
		$this->db->or_like('kategori.kategori',$cari);
		$this->db->or_like('kegiatan.nama_kegiatan',$cari);
		$this->db->join('majelis','majelis.id_majelis = kegiatan.id_majelis');
		$this->db->join('kategori','majelis.id_kategori = kategori.id_kategori');
		$query = $this->db->get('kegiatan');
		return $query->result();
	}

	function get_streaming_by_majelis($id){
		$this->db->where('selesai','0');
		$this->db->where('id_majelis',$id);
		$query = $this->db->get('streaming');
		return $query->result();
	}

	function get_pesan_by_majelis($id){
		$this->db->select('users.nama, pesan.pesan');
		$this->db->where('pesan.untuk',$id);
		$this->db->join('users','pesan.dari = users.id_user');
		$query = $this->db->get('pesan');
		return $query->result();
	}

	function get_number_phone($phone){
		$this->db->where('kontak',$phone);
		$query = $this->db->get('majelis');
		return $query->result();
	}

	function get_streaming_all(){
		$this->db->join('majelis','streaming.id_majelis = majelis.id_majelis');
		$this->db->where('streaming.selesai','0');
		$query = $this->db->get('streaming');
		return $query->result();
	}

	function get_streaming_by_id($id){
		$this->db->join('majelis','streaming.id_majelis = majelis.id_majelis');
		$this->db->where('streaming.id_streaming',$id);
		$this->db->where('streaming.selesai','0');
		$query = $this->db->get('streaming');
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

	function get_majelis_by_id($id){
		$this->db->select('majelis.*, kategori.kategori');
		$this->db->from('majelis');
		$this->db->join('kategori','majelis.id_kategori = kategori.id_kategori');
		$this->db->where('majelis.id_majelis',$id);
		$query = $this->db->get();
		return $query->row();
	}

	function get_majelis_by_user($id){
		$this->db->select('majelis.*, kategori.kategori');
		$this->db->from('majelis');
		$this->db->join('kategori','majelis.id_kategori = kategori.id_kategori');
		$this->db->where('majelis.id_majelis',$id);
		$query = $this->db->get();
		return $query->row();
	}

	function get_majelis_by_kategori($id){
		$this->db->select('majelis.*, kategori.kategori');
		$this->db->from('majelis');
		$this->db->join('kategori','majelis.id_kategori = kategori.id_kategori');
		$this->db->where('majelis.id_kategori',$id);
		$this->db->where('majelis.deleted','0');
		$query = $this->db->get();
		return $query->result();
	}

	function get_majelis_user()
	{	
		$id = $this->session->userdata('user_id');
		$this->db->where('users_majelis.id_users',$id);
		$this->db->join('majelis','users_majelis.id_majelis = majelis.id_majelis');
		$query = $this->db->get('users_mjelis');
		return $query->row();
	}

	function get_users_all(){
		$this->db->select('users.*');
		$this->db->from('users');
		// $this->db->join('majelis','majelis.id_majelis = users.id_majelis');
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

	function hapus_infaq($id){
		$this->db->where('id_infaq',$id);
		$this->db->delete('infaq');
	}

	function hapus_kegiatan($id){
		$this->db->where('id',$id);
		$this->db->delete('kegiatan');
	}


	function selesai($id){
		$this->db->set('selesai','1');
		$this->db->where('id_streaming',$id);
		$this->db->update('streaming');
	}

	function update_data($table,$data,$id,$param){
		$this->db->set($data);
		$this->db->where($param,$id);
		$this->db->update($table);
	}

	function verifikasi($table,$id,$param){
		$this->db->set('verif','1');
		$this->db->where($param,$id);
		$this->db->update($table);
	}

	function block_majelis($id){
		$this->db->set('block','1');
		$this->db->where('id_majelis',$id);
		$this->db->update('majelis');
	}

	function unblock_majelis($id){
		$this->db->set('block','0');
		$this->db->where('id_majelis',$id);
		$this->db->update('majelis');
	}

	function hapus_majelis($id){
		$this->db->set('deleted','1');
		$this->db->where('id_majelis',$id);
		$this->db->update('majelis');
	}

	function reset_password($id){
		
		$this->db->set('password',md5('majelis12345'));
		$this->db->where('id_majelis',$id);
		$this->db->update('users_majelis');
	}
}
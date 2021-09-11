<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai_m extends CI_Model
{
	public function list(){
		return $this->db->get('pegawai');
	}
	public function insert(){
    // NOTE : buat id_pegawai primary
    $this->db->select_max('id_pegawai');
    $query = $this->db->get('pegawai');
    $val=$query->result();
    $datadb = substr($val[0]->id_pegawai,0,6);
		$tgl    = date('ymd');
    if($datadb == $tgl){
      $q3     = (int) substr($val[0]->id_pegawai,6,4);
      $q3++;
    }else{
      $q3 = '1';
    }
		$id_pegawai = $tgl. sprintf("%04s",$q3);

		$this->db->set('id_pegawai', $id_pegawai);
		$this->db->set('nama_pegawai', $this->input->post('nama_pegawai'));
		$this->db->set('jabatan', $this->input->post('jabatan'));
		$this->db->set('alamat', $this->input->post('alamat'));
		$this->db->set('no_telp', $this->input->post('no_telp'));
		$this->db->set('email', $this->input->post('email'));
		$this->db->set('username', $this->input->post('username'));
		$this->db->set('password', md5($this->input->post('password')));
		$this->db->insert('pegawai');
	}
	public function update ($id){
		$this->db->where('id_pegawai', $id);
		return $this->db->get('pegawai');
	}
	public function edit_data()
	{
		$this->db->set('nama_pegawai', $this->input->post('nama_pegawai'));
		$this->db->set('jabatan', $this->input->post('jabatan'));
		$this->db->set('alamat', $this->input->post('alamat'));
		$this->db->set('no_telp', $this->input->post('no_telp'));
		$this->db->set('email', $this->input->post('email'));
		$this->db->set('username', $this->input->post('username'));
    if($this->input->post('password') != $this->input->post('password_old')){
      $this->db->set('password', md5($this->input->post('password')));
    }
		$this->db->where('id_pegawai', $this->input->post('id_pegawai'));
		$this->db->update('pegawai');
	}
	public function delete($id){
		$this->db->where('id_pegawai', $id);
		$this->db->delete('pegawai');
	}
	public function pegawai_dash(){
		$q = $this->db->get('pegawai'); 
		return $q->num_rows();
	}
}
?>
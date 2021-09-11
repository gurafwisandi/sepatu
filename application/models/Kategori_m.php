<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_m extends CI_Model
{
	public function list(){
		$this->db->select('*')
              ->from('kategori');
		return $this->db->get();
	}
	public function insert(){
    // NOTE : buat id_pegawai primary
    $this->db->select_max('id_kategori');
    $query = $this->db->get('kategori');
    $val=$query->result();
    $datadb = substr($val[0]->id_kategori,0,6);
		$tgl    = date('ymd');
    if($datadb == $tgl){
      $q3     = (int) substr($val[0]->id_kategori,6,4);
      $q3++;
    }else{
      $q3 = '1';
    }
		$id_kategori = $tgl. sprintf("%04s",$q3);
		
		$this->db->set('id_kategori', $id_kategori);
		$this->db->set('nama_kategori', $this->input->post('kategori'));
		$this->db->insert('kategori');
	}
	public function update ($id){
		$this->db->select('*')
              ->where('id_kategori',$id);
		return $this->db->get('kategori');
	}
	public function edit_data()
	{
		$this->db->set('nama_kategori', $this->input->post('nama_kategori'));
		$this->db->where('id_kategori', $this->input->post('id_kategori'));
		$this->db->update('kategori');
	}
	public function delete($id){
		$this->db->where('id_kategori', $id);
		$this->db->delete('kategori');
	}
}
?>
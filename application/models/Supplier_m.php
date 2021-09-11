<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier_m extends CI_Model
{
	public function list(){
		return $this->db->get('supplier');
	}
	public function insert(){
    // NOTE : buat id_supplier primary
    $this->db->select_max('id_supplier');
    $query = $this->db->get('supplier');
    $val=$query->result();
    $datadb = substr($val[0]->id_supplier,0,6);
		$tgl    = date('ymd');
    if($datadb == $tgl){
      $q3     = (int) substr($val[0]->id_supplier,6,4);
      $q3++;
    }else{
      $q3 = '1';
    }
		$id_supplier = $tgl. sprintf("%04s",$q3);

		$this->db->set('id_supplier', $id_supplier);
		$this->db->set('nama_supplier', $this->input->post('nama_supplier'));
		$this->db->set('no_telp', $this->input->post('no_telp'));
		$this->db->set('kota', $this->input->post('kota'));
		$this->db->set('alamat', $this->input->post('alamat'));
		$this->db->insert('supplier');
	}
	public function update ($id){
		$this->db->where('id_supplier', $id);
		return $this->db->get('supplier');
	}
	public function edit_data(){
		$this->db->set('nama_supplier', $this->input->post('nama_supplier'));
		$this->db->set('no_telp', $this->input->post('no_telp'));
		$this->db->set('kota', $this->input->post('kota'));
		$this->db->set('alamat', $this->input->post('alamat'));
		$this->db->where('id_supplier', $this->input->post('id_supplier'));
		$this->db->update('supplier');
	}
	public function delete($id){
		$this->db->where('id_supplier', $id);
		$this->db->delete('supplier');
	}
	public function supplier_dash(){
		$q = $this->db->get('supplier'); 
		return $q->num_rows();
	}
}
?>
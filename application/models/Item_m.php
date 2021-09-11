<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item_m extends CI_Model
{
	public function list(){
		$this->db->select('item.*, nama_supplier,nama_kategori')
              ->from('item')
              ->join('supplier', 'supplier.id_supplier = item.id_supplier')
              ->join('kategori', 'kategori.id_kategori = item.kategori');
		return $this->db->get();
	}
	public function insert(){
    // NOTE : buat id_item primary
    $this->db->select_max('id_item');
    $query = $this->db->get('item');
    $val=$query->result();
    $datadb = substr($val[0]->id_item,0,6);
		$tgl    = date('ymd');
    if($datadb == $tgl){
      $q3     = (int) substr($val[0]->id_item,6,4);
      $q3++;
    }else{
      $q3 = '1';
    }
		$id_item = $tgl. sprintf("%04s",$q3);
		
		$this->db->set('id_item', $id_item);
		$this->db->set('nama_item', $this->input->post('nama_item'));
		$this->db->set('kategori', $this->input->post('kategori'));
		$this->db->set('ukuran', $this->input->post('ukuran'));
		$this->db->set('warna', $this->input->post('warna'));
		$this->db->set('deskripsi', $this->input->post('deskripsi'));
		$this->db->set('harga_beli', $this->input->post('harga_beli'));
		$this->db->set('harga_jual', $this->input->post('harga_jual'));
		$this->db->set('stok', $this->input->post('stok'));
		$this->db->set('id_supplier', $this->input->post('id_supplier'));
		$this->db->insert('item');
	}
	public function update ($id){
		$this->db->select('item.*, nama_supplier')
              ->join('supplier', 'supplier.id_supplier = item.id_supplier')
              ->where('id_item',$id);
		return $this->db->get('item');
	}
	public function edit_data()
	{
		$this->db->set('nama_item', $this->input->post('nama_item'));
		$this->db->set('kategori', $this->input->post('kategori'));
		$this->db->set('ukuran', $this->input->post('ukuran'));
		$this->db->set('warna', $this->input->post('warna'));
		$this->db->set('deskripsi', $this->input->post('deskripsi'));
		$this->db->set('harga_beli', $this->input->post('harga_beli'));
		$this->db->set('harga_jual', $this->input->post('harga_jual'));
		$this->db->set('stok', $this->input->post('stok'));
		$this->db->set('id_supplier', $this->input->post('id_supplier'));
		$this->db->where('id_item', $this->input->post('id_item'));
		$this->db->update('item');
	}
	public function delete($id){
		$this->db->where('id_item', $id);
		$this->db->delete('item');
	}
	public function item_dash(){
		$q = $this->db->get('item'); 
		return $q->num_rows();
	}
}
?>
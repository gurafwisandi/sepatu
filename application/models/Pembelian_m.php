<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pembelian_m extends CI_Model
{
	public function list(){
		// NOTE : menampilkan data list keseluruhan pembelian dan di join dengan supplier
		$this->db->select('*')
              ->from('pembelian')
              ->join('supplier', 'supplier.id_supplier=pembelian.id_supplier');
		return $this->db->get();
	}
	public function insert(){
    // NOTE : buat id_pembelian primary
    $this->db->select_max('id_pembelian');
    $query = $this->db->get('pembelian');
    $val=$query->result();
    $datadb = substr($val[0]->id_pembelian,0,6);
		$tgl    = date('ymd');
    if($datadb == $tgl){
      $q3     = (int) substr($val[0]->id_pembelian,6,4);
      $q3++;
    }else{
      $q3 = '1';
    }
		$id_pembelian = $tgl. sprintf("%04s",$q3);

		$this->db->set('id_pembelian', $id_pembelian);
		$this->db->set('tanggal_pembelian', $this->input->post('tanggal_pembelian'));
		$this->db->set('jam_pembelian', $this->input->post('jam_pembelian'));
		$this->db->set('id_supplier', $this->input->post('id_supplier'));
		$this->db->set('status', 'Proses');
		$this->db->insert('pembelian');
	}
	public function pembelian($id){
		// NOTE : menampilkan data pembelian untuk header form detail transaksi_pembelian
		$this->db->select('*')
              ->from('pembelian')
              ->join('supplier', 'supplier.id_supplier=pembelian.id_supplier')
							->where('id_pembelian',$id);
		return $this->db->get();
	}
	public function list_item($id){
		// NOTE : menampilkan detail pembelian di join dengan supplier, detail transaksi_pembelian, item
		$this->db->select('*')
              ->from('pembelian')
              ->join('supplier', 'supplier.id_supplier=pembelian.id_supplier')
              ->join('transaksi_pembelian', 'transaksi_pembelian.id_pembelian=pembelian.id_pembelian')
              ->join('item', 'item.id_item=transaksi_pembelian.id_item')
							->where('pembelian.id_pembelian',$id);
		return $this->db->get();
	}
	public function edit_data()
	{
		// NOTE : cek jumlah grand total detail pembelian
		$this->db->select_sum('total')
              ->from('transaksi_pembelian')
							->where('id_pembelian',$this->input->post('id_pembelian'));
		$query = $this->db->get();
    $val=$query->result();

		// NOTE : update ke tabel pembelian
		if($this->input->post('tanggal_pembelian') != '' AND $this->input->post('tanggal_pembelian') != '0000-00-00'){
			$this->db->set('tanggal_pembelian', $this->input->post('tanggal_pembelian'));
		}
		if($this->input->post('jam_pembelian') != '' AND $this->input->post('jam_pembelian') != '00:00:00'){
			$this->db->set('jam_pembelian', $this->input->post('jam_pembelian'));
		}
		$this->db->set('status', $this->input->post('status'));
		$this->db->set('grand_total', $val[0]->total);
		$this->db->where('id_pembelian', $this->input->post('id_pembelian'));
		$this->db->update('pembelian');

		// NOTE : cek jika status pembelian nya dipilih "DONE" akan update ke stok di tabel item
		if($this->input->post('status') == 'Done'){
			$this->db->select('*')
								->from('transaksi_pembelian')
								->where('id_pembelian',$this->input->post('id_pembelian'));
			$query = $this->db->get();
			foreach ($query->result() as $row)
			{
				// NOTE : cek stok di tabel item sebelumnya berapa
				$this->db->select('stok');
				$this->db->from('item');                            
				$this->db->where('id_item',$row->id_item);
				$queryitem = $this->db->get();  
				$valitem=$queryitem->result();

				// NOTE : update stok ke tabel item
				$this->db->set('stok', $valitem[0]->stok + $row->qty);
				$this->db->where('id_item', $row->id_item);
				$this->db->update('item');
			}
		}
	}
	public function insert_item(){
		// NOTE : cek id item di tabel detail pembelian sudah ada tau belum jika ada update, kosong insert
    // NOTE : buat id_pembelian primary
    $this->db->select_max('id_detail_pembelian');
    $query = $this->db->get('transaksi_pembelian');
    $val=$query->result();
    $datadb = substr($val[0]->id_detail_pembelian,0,6);
		$tgl    = date('ymd');
    if($datadb == $tgl){
      $q3     = (int) substr($val[0]->id_detail_pembelian,6,4);
      $q3++;
    }else{
      $q3 = '1';
    }
		$id_detail_pembelian = $tgl. sprintf("%04s",$q3);

		// NOTE : cek harga ke tabel item
		$this->db->select('harga_beli');
		$this->db->from('item');                            
		$this->db->where('id_item',$this->input->post('id_item'));
		$queryitem = $this->db->get();  
    $valitem=$queryitem->result();
    $total = $valitem[0]->harga_beli * $this->input->post('qty');

		// NOTE : simpan ke tabel detail pembelian
		$this->db->set('id_detail_pembelian', $id_detail_pembelian);
		$this->db->set('id_item', $this->input->post('id_item'));
		$this->db->set('harga', $valitem[0]->harga_beli);
		$this->db->set('qty', $this->input->post('qty'));
		$this->db->set('total', $total);
		$this->db->set('id_pembelian', $this->input->post('id_pembelian'));
		$this->db->insert('transaksi_pembelian');
		
		// NOTE : cek jumlah grand total detail pembelian
		$this->db->select_sum('total')
              ->from('transaksi_pembelian')
							->where('id_pembelian',$this->input->post('id_pembelian'));
		$query = $this->db->get();
    $val=$query->result();

		// NOTE : update grand total ke tabel pembelian
		$this->db->set('grand_total', $val[0]->total);
		$this->db->where('id_pembelian', $this->input->post('id_pembelian'));
		$this->db->update('pembelian');
	}
	public function update ($id){
		// NOTE : menampilkan datan untuk di edit di detail transaksi pembelian
		$this->db->where('id_detail_pembelian', $id);
		return $this->db->get('transaksi_pembelian');
	}
	public function edit_item (){
		// NOTE : update data transaksi pembelian
    $total = $this->input->post('harga') * $this->input->post('qty');
		$this->db->set('qty', $this->input->post('qty'));
		$this->db->set('total', $total);
		$this->db->where('id_detail_pembelian', $this->input->post('id_detail_pembelian'));
		$this->db->update('transaksi_pembelian');
		
		// NOTE : cek jumlah grand total detail pembelian
		$this->db->select_sum('total')
              ->from('transaksi_pembelian')
							->where('id_pembelian',$this->input->post('id_pembelian'));
		$query = $this->db->get();
    $val=$query->result();

		// NOTE : update ke tabel pembelian
		$this->db->set('grand_total', $val[0]->total);
		$this->db->where('id_pembelian', $this->input->post('id_pembelian'));
		$this->db->update('pembelian');
	}
	public function delete_item($id,$id_pembelian){
		// NOTE : delete item detail transaksi pembelian
		$this->db->where('id_detail_pembelian', $id);
		$this->db->delete('transaksi_pembelian');
		
		// NOTE : cek jumlah grand total detail pembelian
		$this->db->select_sum('total')
              ->from('transaksi_pembelian')
							->where('id_pembelian',$id_pembelian);
		$query = $this->db->get();
    $val=$query->result();

		// NOTE : update ke tabel pembelian
		$this->db->set('grand_total', $val[0]->total);
		$this->db->where('id_pembelian', $id_pembelian);
		$this->db->update('pembelian');
	}
	public function delete($id){
		// NOTE : delete di tabel pembelian
		$this->db->where('id_pembelian', $id);
		$this->db->delete('pembelian');

		// NOTE : delete di tabel detail pembelian
		$this->db->where('id_pembelian', $id);
		$this->db->delete('transaksi_pembelian');
	}
	public function pembelian_dash(){
		// NOTE : query menghitung jumlah transaksi untuk di dashboard
		$this->db->select('count(tanggal_pembelian) as jml, sum(grand_total) as grand_total')
              ->from('pembelian')
							->where('tanggal_pembelian',date('Y-m-d'));
		return $this->db->get()->result();
	}
	public function list_lap($dari,$sampai){
		// NOTE : menampilkan data laporan
		$this->db->select(" pembelian.id_pembelian,tanggal_pembelian,grand_total,nama_supplier,
												GROUP_CONCAT(nama_item SEPARATOR ', ') as item,
												GROUP_CONCAT(qty ORDER BY nama_item SEPARATOR ', ') as qty ")
              ->from('pembelian')
              ->join('supplier', 'supplier.id_supplier=pembelian.id_supplier')
              ->join('transaksi_pembelian', 'transaksi_pembelian.id_pembelian=pembelian.id_pembelian')
              ->join('item', 'item.id_item=transaksi_pembelian.id_item')
							->where('status', 'Done')
							->where('tanggal_pembelian >=', $dari)
							->where('tanggal_pembelian <=', $sampai)
							->group_by('transaksi_pembelian.id_pembelian')
							->order_by('pembelian.id_pembelian','ASC');
		return $this->db->get();
	}
}
?>
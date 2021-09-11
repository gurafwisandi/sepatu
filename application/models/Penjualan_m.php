<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan_m extends CI_Model
{

	public function list(){
		// NOTE : menampilkan data list keseluruhan penjualan
		$this->db->select('*')
              ->from('penjualan')
							->order_by('tanggal_penjualan','desc');
		return $this->db->get();
	}
	public function insert(){
    // NOTE : buat id_penjualan primary
    $this->db->select_max('id_penjualan');
    $query = $this->db->get('penjualan');
    $val=$query->result();
    $datadb = substr($val[0]->id_penjualan,0,6);
		$tgl    = date('ymd');
    if($datadb == $tgl){
      $q3     = (int) substr($val[0]->id_penjualan,6,4);
      $q3++;
    }else{
      $q3 = '1';
    }
		$id_penjualan = $tgl. sprintf("%04s",$q3);

		$this->db->set('id_penjualan', $id_penjualan);
		$this->db->set('tanggal_penjualan', date('Y-m-d'));
		$this->db->set('jam_penjualan', date('H:i:s'));
		$this->db->set('status', 'Proses');
		$this->db->insert('penjualan');
	}
	public function penjualan($id){
		// NOTE : menampilkan data pembelian untuk header form detail transaksi_pembelian
		$this->db->select('*,penjualan.id_penjualan as id_penjualan')
              ->from('penjualan')
							->where('penjualan.id_penjualan',$id);
		return $this->db->get();
	}
	public function list_item($id){
		// NOTE : menampilkan detail penjualan di join dengan detail transaksi_penjualan, item
		$this->db->select('*')
              ->from('penjualan')
              ->join('transaksi_penjualan', 'transaksi_penjualan.id_penjualan=penjualan.id_penjualan')
              ->join('item', 'item.id_item=transaksi_penjualan.id_item')
							->where('penjualan.id_penjualan',$id);
		return $this->db->get();
	}
	public function edit_data()
	{
		// NOTE : cek jumlah grand total detail pembelian
		$this->db->select_sum('total')
              ->from('transaksi_penjualan')
							->where('id_penjualan', $this->input->post('id_penjualan'));
		$query = $this->db->get();
    $val=$query->result();
		if(isset($val[0]->total)){
			$tot=$val[0]->total;
		}else{
			$tot=0;
		}

		// NOTE : edit data transaksi penjualan
		if($this->input->post('tanggal_penjualan') != '' AND $this->input->post('tanggal_penjualan') != '0000-00-00'){
			$this->db->set('tanggal_penjualan', $this->input->post('tanggal_penjualan'));
		}
		if($this->input->post('jam_penjualan') != '' AND $this->input->post('jam_penjualan') != '00:00:00'){
			$this->db->set('jam_penjualan', $this->input->post('jam_penjualan'));
		}
		$this->db->set('status', $this->input->post('status'));
		$this->db->set('grand_total', $tot);
		$this->db->where('id_penjualan', $this->input->post('id_penjualan'));
		$this->db->update('penjualan');

		// NOTE : cek jika status penjualan nya dipilih "DONE" akan update ke stok di tabel item
		if($this->input->post('status') == 'Done'){
			$this->db->select('*')
								->from('transaksi_penjualan')
								->where('id_penjualan',$this->input->post('id_penjualan'));
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
				$this->db->set('stok', $valitem[0]->stok - $row->qty);
				$this->db->where('id_item', $row->id_item);
				$this->db->update('item');
			}
		}
	}
	public function insert_item(){
		// NOTE : cek id item di tabel detail pembelian sudah ada tau belum jika ada update, kosong insert
    // NOTE : buat id_pembelian primary
    $this->db->select_max('id_detail_penjualan');
    $query = $this->db->get('transaksi_penjualan');
    $val=$query->result();
    $datadb = substr($val[0]->id_detail_penjualan,0,6);
		$tgl    = date('ymd');
    if($datadb == $tgl){
      $q3     = (int) substr($val[0]->id_detail_penjualan,6,4);
      $q3++;
    }else{
      $q3 = '1';
    }
		$id_detail_penjualan = $tgl. sprintf("%04s",$q3);

		// NOTE : cek harga ke tabel item
		$this->db->select('harga_jual');
		$this->db->from('item');                            
		$this->db->where('id_item',$this->input->post('id_item'));
		$queryitem = $this->db->get();  
    $valitem=$queryitem->result();
    $total = $valitem[0]->harga_jual * $this->input->post('qty');

		// NOTE : simpan ke tabel detail pembelian
		$this->db->set('id_detail_penjualan', $id_detail_penjualan);
		$this->db->set('id_item', $this->input->post('id_item'));
		$this->db->set('harga', $valitem[0]->harga_jual);
		$this->db->set('qty', $this->input->post('qty'));
		$this->db->set('diskon', $this->input->post('diskon'));
		$tot_sudah_disk = ($this->input->post('diskon')/100)*$total;
		$this->db->set('total', $total - $tot_sudah_disk);
		$this->db->set('id_penjualan', $this->input->post('id_penjualan'));
		$this->db->set('status_penjualan', 'Proses');
		$this->db->insert('transaksi_penjualan');
		
		// NOTE : cek jumlah grand total detail pembelian
		$this->db->select_sum('total')
              ->from('transaksi_penjualan')
							->where('id_penjualan',$this->input->post('id_penjualan'));
		$query = $this->db->get();
    $val=$query->result();
		if(isset($val[0]->total)){
			$tot=$val[0]->total;
		}else{
			$tot=0;
		}
		// NOTE : update grand total ke tabel pembelian
		$this->db->set('grand_total', $tot);
		$this->db->where('id_penjualan', $this->input->post('id_penjualan'));
		$this->db->update('penjualan');
	}
	public function delete_item($id,$id_penjualan){
		// NOTE : delete item detail transaksi pembelian
		$this->db->where('id_detail_penjualan', $id);
		$this->db->delete('transaksi_penjualan');
		
		// NOTE : cek jumlah grand total detail pembelian
		$this->db->select_sum('total')
              ->from('transaksi_penjualan')
							->where('id_penjualan',$id_penjualan);
		$query = $this->db->get();
    $val=$query->result();
		if(isset($val[0]->total)){
			$tot=$val[0]->total;
		}else{
			$tot=0;
		}

		// NOTE : update ke tabel pembelian
		$this->db->set('grand_total', $tot);
		$this->db->where('id_penjualan', $id_penjualan);
		$this->db->update('penjualan');
	}
	public function update ($id){
		// NOTE : menampilkan data get date edit item di modal 
		$this->db->where('id_detail_penjualan', $id);
		return $this->db->get('transaksi_penjualan');
	}
	public function edit_item (){
		// NOTE : update data transaksi pembelian
    $total = $this->input->post('harga') * $this->input->post('qty');
		$this->db->set('qty', $this->input->post('qty'));
		$this->db->set('diskon', $this->input->post('diskon'));
		$tot_sudah_disk = ($this->input->post('diskon')/100)*$total;
		$this->db->set('total', $total - $tot_sudah_disk);
		// $this->db->set('total', $total);
		$this->db->where('id_detail_penjualan', $this->input->post('id_detail_penjualan'));
		$this->db->update('transaksi_penjualan');
		
		// NOTE : cek jumlah grand total detail pembelian
		$this->db->select_sum('total')
              ->from('transaksi_penjualan')
							->where('id_penjualan',$this->input->post('id_penjualan'));
		$query = $this->db->get();
    $val=$query->result();
		if(isset($val[0]->total)){
			$tot=$val[0]->total;
		}else{
			$tot=0;
		}

		// NOTE : update ke tabel pembelian
		$this->db->set('grand_total', $tot);
		$this->db->where('id_penjualan', $this->input->post('id_penjualan'));
		$this->db->update('penjualan');
	}
	public function delete($id){
		// NOTE : delete di tabel penjualan
		$this->db->where('id_penjualan', $id);
		$this->db->delete('penjualan');

		// NOTE : delete di tabel detail penjualan
		$this->db->where('id_penjualan', $id);
		$this->db->delete('transaksi_penjualan');
	}
	public function penjualan_dash(){
		$this->db->select('count(tanggal_penjualan) as jml, sum(grand_total) as grand_total')
              ->from('penjualan')
							->where('tanggal_penjualan',date('Y-m-d'));
		return $this->db->get()->result();
	}
	public function list_lap($dari,$sampai){
		// NOTE : menampilkan data laporan
		$this->db->select(" transaksi_penjualan.id_penjualan, tanggal_penjualan, 
												grand_total, GROUP_CONCAT(nama_item ORDER BY nama_item SEPARATOR ', ') as item,
												, GROUP_CONCAT(qty ORDER BY nama_item SEPARATOR ', ') as qty ")
              ->from('penjualan')
              ->join('transaksi_penjualan', 'transaksi_penjualan.id_penjualan=penjualan.id_penjualan')
              ->join('item', 'item.id_item=transaksi_penjualan.id_item')
							->where('status', 'Done')
							->where('tanggal_penjualan >=', $dari)
							->where('tanggal_penjualan <=', $sampai)
							->group_by('transaksi_penjualan.id_penjualan')
							->order_by('transaksi_penjualan.id_penjualan','ASC');
		return $this->db->get();
	}
}
?>
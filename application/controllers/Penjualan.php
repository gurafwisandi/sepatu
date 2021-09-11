<?php defined('BASEPATH') OR exit('No direct script access allowed');

class penjualan extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('penjualan_m');
	}

	public function index()
	{
		if($this->input->post('submit') == "edit"){
			$this->penjualan_m->edit_data();
			echo '<input type="hidden" id="myText" value="'.$this->input->post('id_penjualan').'">
						<script type="text/JavaScript"> 
							var idx=document.getElementById("myText").value;
							window.open("penjualan/print/"+ idx);
							window.location.href = "penjualan";
						</script>';
		}
		
		$data['data'] = $this->penjualan_m->list()->result();
		$this->template->load('template','penjualan/penjualan_data',$data);
	}

	public function list_item($id=false){
		if(isset($id) AND $id != '' AND $id != null){
			redirect('/penjualan/item/'.$id);
		}else{
			$this->penjualan_m->insert();
			$id=$this->db->insert_id();
			redirect('/penjualan/list_item/'.$id);
		}
	}

	public function item($id)
	{
		if($this->input->post('submit') == "submit"){
			$this->penjualan_m->insert_item();
			redirect('/penjualan/item/'.$this->input->post('id_penjualan'));
		}

		if($this->input->post('submit') == "edit"){
			$this->penjualan_m->edit_item();
			redirect('/penjualan/item/'.$this->input->post('id_penjualan'));
		}
			
		$data['header'] = $this->penjualan_m->penjualan($id)->result();
		$data['data'] = $this->penjualan_m->list_item($id)->result();
		$this->template->load('template','penjualan/list_item_penjualan',$data);
	}

	public function delete_item($id,$id_penjualan)
	{
		$this->penjualan_m->delete_item($id,$id_penjualan);
		redirect('/penjualan/item/'.$id_penjualan);
	}

	public function get_conten($id)
	{
		$data['data'] = $this->penjualan_m->update($id)->result();
		$this->load->view('penjualan/get_penjualan',$data);
	}

	public function delete($id)
	{
		$this->penjualan_m->delete($id);
		redirect('/penjualan');
	}

	public function print($id)
	{
		$data['header'] = $this->penjualan_m->penjualan($id)->result();
		$data['data'] = $this->penjualan_m->list_item($id)->result();
		$this->load->view('penjualan/print',$data);
	}
}

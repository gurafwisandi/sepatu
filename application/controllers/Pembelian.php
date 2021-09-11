<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pembelian extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('pembelian_m');
	}

	public function index()
	{
		if($this->input->post('submit') == "submit"){
			$this->pembelian_m->insert();
			redirect('/pembelian');
		}

		if($this->input->post('submit') == "edit"){
			$this->pembelian_m->edit_data();
			if($this->input->post('status') =='Done'){
				redirect('/pembelian');
			}else{
				redirect('/pembelian/item/'.$this->input->post('id_pembelian'));
			}
		}
		
		$data['data'] = $this->pembelian_m->list()->result();
		$this->template->load('template','pembelian/pembelian_data',$data);
	}

	public function item($id)
	{
		if($this->input->post('submit') == "submit"){
			$this->pembelian_m->insert_item();
			redirect('/pembelian/item/'.$this->input->post('id_pembelian'));
		}

		if($this->input->post('submit') == "edit"){
			$this->pembelian_m->edit_item();
			redirect('/pembelian/item/'.$this->input->post('id_pembelian'));
		}

		$data['header'] = $this->pembelian_m->pembelian($id)->result();
		$data['data'] = $this->pembelian_m->list_item($id)->result();
		$this->template->load('template','pembelian/list_item',$data);
	}

	public function get_conten($id)
	{
		$data['data'] = $this->pembelian_m->update($id)->result();
		$this->load->view('pembelian/get_pembelian',$data);
	}

	public function delete_item($id,$id_pembelian)
	{
		$this->pembelian_m->delete_item($id,$id_pembelian);
		redirect('/pembelian/item/'.$id_pembelian);
	}

	public function delete($id)
	{
		$this->pembelian_m->delete($id);
		redirect('/pembelian');
	}

	public function print($id)
	{
		$data['header'] = $this->pembelian_m->pembelian($id)->result();
		$data['data'] = $this->pembelian_m->list_item($id)->result();
		$this->load->view('pembelian/print',$data);
	}
}

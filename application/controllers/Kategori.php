<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('kategori_m');
	}

	public function index()
	{
		if($this->input->post('submit') == "submit"){
			$this->kategori_m->insert();
			redirect('/kategori');
		}

		if($this->input->post('submit') == "edit"){
			$this->kategori_m->edit_data();
			redirect('/kategori');
		}
		
		$data['data'] = $this->kategori_m->list()->result();
		$this->template->load('template','kategori/kategori_data',$data);
	}

	public function get_conten($id)
	{
		$data['data'] = $this->kategori_m->update($id)->result();
		$this->load->view('kategori/get_kategori',$data);
	}

	public function delete($id)
	{
		$this->kategori_m->delete($id);
		redirect('/kategori');
	}
}

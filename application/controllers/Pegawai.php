<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('pegawai_m');
	}

	public function index()
	{
		if($this->input->post('submit') == "submit"){
			$this->pegawai_m->insert();
			redirect('/pegawai');
		}

		if($this->input->post('submit') == "edit"){
			$this->pegawai_m->edit_data();
			redirect('/pegawai');
		}
		
		$data['data'] = $this->pegawai_m->list()->result();
		$this->template->load('template','pegawai/pegawai_data',$data);
	}

	public function get_conten($id)
	{
		$data['data'] = $this->pegawai_m->update($id)->result();
		$this->load->view('pegawai/get_pegawai',$data);
	}

	public function delete($id)
	{
		$this->pegawai_m->delete($id);
		redirect('/pegawai');
	}
}

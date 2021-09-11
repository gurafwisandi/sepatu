<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('supplier_m');
	}

	public function index()
	{
		if($this->input->post('submit') == "submit"){
			$this->supplier_m->insert();
			redirect('/supplier');
		}

		if($this->input->post('submit') == "edit"){
			$this->supplier_m->edit_data();
			redirect('/supplier');
		}
		
		$data['data'] = $this->supplier_m->list()->result();
		$this->template->load('template','supplier/supplier_data',$data);
	}

	public function get_conten($id)
	{
		$data['data'] = $this->supplier_m->update($id)->result();
		$this->load->view('supplier/get_supplier',$data);
	}

	public function delete($id)
	{
		$this->supplier_m->delete($id);
		redirect('/supplier');
	}
}

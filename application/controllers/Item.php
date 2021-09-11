<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Item extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('item_m');
	}

	public function index()
	{
		if($this->input->post('submit') == "submit"){
			$this->item_m->insert();
			redirect('/item');
		}

		if($this->input->post('submit') == "edit"){
			$this->item_m->edit_data();
			redirect('/item');
		}
		
		$data['data'] = $this->item_m->list()->result();
		$this->template->load('template','item/item_data',$data);
	}

	public function get_conten($id)
	{
		$data['data'] = $this->item_m->update($id)->result();
		$this->load->view('item/get_item',$data);
	}

	public function delete($id)
	{
		$this->item_m->delete($id);
		redirect('/item');
	}
}

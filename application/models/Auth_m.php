<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_m extends CI_Model
{

	public function login(){
    
    $this->db->select('id_pegawai,nama_pegawai,username');
		$this->db->where('username', $this->input->post('username'));
		$this->db->where('password', md5($this->input->post('password')));
    $query = $this->db->get('pegawai');
    $val=$query->result();
    $jml=$query->num_rows();
    if($jml > 0){
      $data_session = array(
        'id_pegawai' => $val[0]->id_pegawai,
        'nama_pegawai' => $val[0]->nama_pegawai,
        'username' => $val[0]->username
      );
      $this->session->set_userdata($data_session);
      $data='1';
    }else{
      $data='0';
    }
    return $data;
	}
}
?>
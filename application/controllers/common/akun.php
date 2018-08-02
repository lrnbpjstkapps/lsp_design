<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class akun extends CI_Controller {

	// Common		
	public function __construct()
		{
			parent::__construct();
			$this->load->model("common/m_globalval", "m_globalval");
		}
	
	public function index()
		{		
			$data	= $this->m_globalval->getAllData();
			$this->load->view("common/v_login", $data);
		}
		
	public function logout()
		{		
			redirect('');
		}
		
	public function login(){
		$username		= $this->input->post('username');
		$password		= md5($this->input->post('password'));
		
		/*$condition		= array(
			'EMAIL'		=> $email,
			'PASSWORD'	=> $password);
		$data["listSkema"]		= $this->M_User->get_entry($condition);
		
		$result		= $this->User->login($loginId, $password);*/
		
		/*if($result->num_rows()>0){
			$res = $result->row();
			$this->session->set_userdata('sdd_email',$loginId);
			$this->session->set_userdata('sdd_nama',$res->NAMA);
			$this->session->set_userdata('sdd_role',$res->ROLE_NAME);
			$this->session->set_userdata('sdd_roleId',$res->ROLE_ID);
			redirect('asesi/fr_mak_03');
		}*/
		if($username == "ADMIN_LSP")
			{
				redirect('lsp/kriteria_unjuk_kerja');
			}
		else if($username == "ASESOR")
			{
				redirect('asesor/fr_mma');
			}
		else 
			{
				redirect('asesi/fr_mak_03');
			}		
	}
}

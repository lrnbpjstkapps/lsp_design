<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class akun extends CI_Controller {

	// Common		
	public function __construct()
		{
			parent::__construct();
			$this->load->model("common/m_globalval", "m_globalval");
			$this->load->model("table/M_user", "M_user");
			$this->load->model("table/M_user_role", "M_user_role");
		}
	
	public function index()
		{		
			$data	= $this->m_globalval->getAllData();
			
			if($this->session->userdata('lsp_bpjstk_login_id') != null){
				$role_code = $this->session->userdata('lsp_bpjstk_role_code');
				$this->switchInterface($role_code);
			}else{
				$this->load->view("common/v_login", $data);
			}		
		}
		
	public function logout()
		{	
			$login_id	= $this->session->userdata('lsp_bpjstk_login_id');
			$uuid_user	= $this->session->userdata('lsp_bpjstk_uuid_user');			
			$user_name	= $this->session->userdata('lsp_bpjstk_user_name');
			$role_name	= $this->session->userdata('lsp_bpjstk_role_name');
			$role_code	= $this->session->userdata('lsp_bpjstk_role_code');
			
			$this->session->unset_userdata('lsp_bpjstk_login_id', $login_id);
			$this->session->unset_userdata('lsp_bpjstk_uuid_user', $uuid_user);
			$this->session->unset_userdata('lsp_bpjstk_user_name', $user_name);
			$this->session->unset_userdata('lsp_bpjstk_role_name', $role_name);
			$this->session->unset_userdata('lsp_bpjstk_role_code', $role_code);
			
			redirect('');
		}
		
	public function login(){
		$login_id	= $this->input->post('login_id');
		$password	= md5($this->input->post('password'));
				
		$condition	= array(
			'USR.LOGIN_ID'	=> $login_id,
			'UR.IS_ACTIVE'	=> '1',
			'USR.IS_ACTIVE'	=> '1',
			'ROLE.IS_ACTIVE'=> '1',
			'USR.PWD'		=> $password);
		$result		= $this->M_user_role->get_detail_entry($condition);
		
		if($result->num_rows()>0){
			$val 	= $result->row();
			$this->session->set_userdata('lsp_bpjstk_login_id', $login_id);
			$this->session->set_userdata('lsp_bpjstk_uuid_user', $val->UUID_USER);
			$this->session->set_userdata('lsp_bpjstk_user_name', $val->USER_NAME);
			$this->session->set_userdata('lsp_bpjstk_role_name', $val->ROLE_NAME);
			$this->session->set_userdata('lsp_bpjstk_role_code', $val->ROLE_CODE);
			
			$this->switchInterface($val->ROLE_CODE);
		}			
	}
	
	public function switchInterface($role_code){
		if($role_code == "ASESI")
			{
				redirect('asesi/fr_apl_01');
			}
		else if($role_code == "ASESOR")
			{
				redirect('asesor/fr_mma');
			}
		else if($role_code == "ADMIN_LSP")
			{
				redirect('admin_lsp/kriteria_unjuk_kerja');
			}
		else if($role_code == "KOORDINATOR_TUK")
			{
				redirect('koordinator_tuk/fr_mma');
			}
		else if($role_code == "MANAJER_SERTIFIKASI")
			{
				redirect('manajer_sertifikasi/fr_mak_03');
			}	
	}
	
	public function cekPassword(){
		$login_id 	= $this->input->post('login_id');
		$password 	= md5($this->input->post('password'));
		
		$condition	= array(
			'USR.LOGIN_ID'	=> $login_id,
			'UR.IS_ACTIVE'	=> '1',
			'USR.IS_ACTIVE'	=> '1',
			'ROLE.IS_ACTIVE'=> '1',
			'USR.PWD'		=> $password);
		$result		= $this->M_user_role->get_detail_entry($condition);
		
		if($result->num_rows()>0){
			echo "true";
		}else{
			echo "false";
		}
	}
}

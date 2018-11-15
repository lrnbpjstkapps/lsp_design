<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pengelola_user extends CI_Controller {
	// Admin LSP		
	public function __construct()
		{
			parent::__construct();
			if($this->session->userdata('lsp_bpjstk_login_id') == null){
				redirect('');
			}
			if($this->session->userdata('lsp_bpjstk_role_code') != "ADMIN_LSP"){
				$role_code = $this->session->userdata('lsp_bpjstk_role_code');
				redirect('common/akun/switchInterface/'.$role_code);
			}
		}
	
	public function index()
		{		
			$data					= $this->m_globalval->getAllData();
			$layout					= $data['layout'];
			$view					= $data['view'];
			
			$data["dviewEvent"]		= "admin_lsp/v_pengelola_user_event";
			$data["dlayoutMenu"]	= "common/v_menu_admin_lsp";
			$this->load->view("common/v_layout", $data);
		}
}
?>
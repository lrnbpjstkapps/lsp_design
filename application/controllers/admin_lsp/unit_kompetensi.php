<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Admin LSP
class unit_kompetensi extends CI_Controller {
		
	public function __construct(){
		parent::__construct();
		
		//Check Login Status
		if($this->session->userdata('lsp_bpjstk_login_id') == null){
			redirect('');
		}
		
		//Check Permissions
		if($this->session->userdata('lsp_bpjstk_role_code') != "ADMIN_LSP"){
			$role_code = $this->session->userdata('lsp_bpjstk_role_code');
			redirect('common/akun/switchInterface/'.$role_code);
		}
	}
	
	//Default Function
	public function index(){		
		//Set layout for Unit Kompetensi
		$data["dview"]			= "admin_lsp/v_unit_kompetensi";
		$data["dviewEvent"]		= "admin_lsp/v_unit_kompetensi_event";
		$data["dlayoutMenu"]	= "common/v_layout_menu_admin_lsp";
		
		$this->load->view("common/v_layout", $data);
	}
	
}

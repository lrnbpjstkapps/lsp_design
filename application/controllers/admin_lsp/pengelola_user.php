<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//ADMIN_LSP
class pengelola_user extends CI_Controller {
	
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
		// Set layout for Pengelola User
		$data["dview"]			= "admin_lsp/v_pengelola_user";
		$data["dviewEvent"]		= "admin_lsp/v_pengelola_user_event";
		$data["dlayoutMenu"]	= "common/v_layout_menu_admin_lsp";
		
		// Set list of role of user
		//Condition 
		$kondisi	= array('IS_ACTIVE' => '1');
		$data["daftarJenisAkun"] = $this->tabel_role->ambil_data($kondisi);
		
		$this->load->view("common/v_layout", $data);
	}		
	
}
?>
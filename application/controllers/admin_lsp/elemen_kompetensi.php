<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// ADMIN_LSP
class elemen_kompetensi extends CI_Controller {
		
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
		//Get data from UNIT_KOMPETENSI table 
		$kondisi				= array('IS_ACTIVE' => '1');
		$lis_uk					= $this->tabel_uk->ambil_data($kondisi);
		$data["lis_uk"]			= $lis_uk;
		
		// Set layout for Pengelola User
		$data["dview"]			= "admin_lsp/v_elemen_kompetensi_search";
		$data["dviewEvent"]		= "admin_lsp/v_elemen_kompetensi_search_event";
		$data["dlayoutMenu"]	= "common/v_layout_menu_admin_lsp";
		
		$this->load->view("common/v_layout", $data);
	}
	
	public function hasil_pencarian(){							
		$kondisi				= array('UUID_UK' => $this->input->post('uk_uuid'));
		$data_uk				= $this->tabel_uk->ambil_satu_data($kondisi);
			
		$data['uk_uuid']		= $data_uk->UUID_UK;
		$data['uk_kode']		= $data_uk->KODE_UK;	
		$data['uk_judul']		= $data_uk->JUDUL_UK;				
		
		$this->load->view("admin_lsp/v_elemen_kompetensi", $data);
		$this->load->view("admin_lsp/v_elemen_kompetensi_event");
	}

}

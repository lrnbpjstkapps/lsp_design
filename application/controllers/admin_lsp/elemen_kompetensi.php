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
	
	/*
	// CREATE
	public function saveDt()
		{
			$data	= $this->m_globalval->getAllData();		
			
			$param	= $this->m_param->saveDt($data);
			echo $this->m_crud->insertDt("ELEMEN_KOMPETENSI", $param);
		}
		
	// READ
	public function getADt($uuid)
		{
			$addtionalParam	= $this->m_param->getADt($uuid);
			$result			= $this->m_crud->selectDt("ELEMEN_KOMPETENSI",  $addtionalParam);
			echo json_encode($result->row());
		}
		
	public function getListPage()
		{				
			$data			= $this->m_globalval->getAllData();		
			$view			= $data['view'];
			$form_name		= $data["form_name"];
			
			$data['uuid']	= $this->input->post($form_name[105]);

			$addtionalParam	= $this->m_param->getADt_UK($data);
			$result			= $this->m_crud->selectDt("UNIT_KOMPETENSI",  $addtionalParam)->row();
				
			$data['param1']	= $result->KODE_UK;	
			$data['param2']	= $result->JUDUL_UK;				
			$this->load->view($view[104], $data);
			$this->load->view($view[105], $data);
		}
	
	public function getList($uuid)
		{				
			$result				= $this->m_list_ek->get_datatables($uuid);
			$recordsTotal		= $this->m_list_ek->count_all($uuid);
			$recordsFiltered	= $this->m_list_ek->count_filtered($uuid);		
			$output				= $this->m_param->getDt_list($result, $recordsTotal, $recordsFiltered);
			echo json_encode($output);
		}
	
	// UPDATE
	public function updateDt()
		{
			$data			= $this->m_globalval->getAllData();		
			
			$addtionalParam	= $this->m_param->updateDt($data);
			echo $this->m_crud->updateDt("ELEMEN_KOMPETENSI", $addtionalParam);
		}
	
	// DELETE
	public function deleteDt($uuid)
		{
			$data			= $this->m_globalval->getAllData();		
			
			$addtionalParam	= $this->m_param->deleteDt($data, $uuid);
			echo $this->m_crud->deleteDt("ELEMEN_KOMPETENSI", $addtionalParam);
		}
		
	*/
}

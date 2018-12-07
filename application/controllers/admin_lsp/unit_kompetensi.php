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
	
	/*
	// SAVE 
	public function saveDt()
		{
			$data			= $this->m_globalval->getAllData();	
			
			$application	= $data['application'];
			$paramArr		= array();
				
			$param			= $this->m_param->saveDt_UK($data);
			$this->m_crud->insertDt("UNIT_KOMPETENSI", $param);
			
			$addtionalParam = $this->m_param->getADt_UK($data);			
			$result			= $this->m_crud->selectDt("UNIT_KOMPETENSI",  $addtionalParam);
			
			$paramArr		= $this->m_param->saveDt_SKE_UK($data, $result->row()->UUID_UK);
			echo $this->m_crud->insertArrDt("SKEMA_UK", $paramArr);
		}
	
	// GET
	public function getADt_SKE_UK($uuid)
		{			
			$result	= $this->m_custom->getADt_SKE_UK($uuid);
			$output	= $this->m_param->getADt_SKE_UK($result);			
			echo json_encode($output);
		}
		
	public function getList_UK()
		{				
			$result				= $this->m_list_uk->get_datatables();
			$recordsTotal		= $this->m_list_uk->count_all();
			$recordsFiltered	= $this->m_list_uk->count_filtered();		
			$output				= $this->m_param->getDt_list_uk($result, $recordsTotal, $recordsFiltered);
			echo json_encode($output);
		}
	
	public function getList_SKE($uuid)
		{				
			$result				= $this->m_list_ske->get_datatables($uuid);
			$recordsTotal		= $this->m_list_ske->count_all($uuid);
			$recordsFiltered	= $this->m_list_ske->count_filtered($uuid);		
			$output				= $this->m_param->getDt_list_ske($result, $recordsTotal, $recordsFiltered);
			echo json_encode($output);
		}
		
	// UPDATE
	public function updateDt()
		{
			$data			= $this->m_globalval->getAllData();		
			$form_name		= $data["form_name"];
			
			$addtionalParam	= $this->m_param->updateDt_UK($data);
			$this->m_crud->updateDt("UNIT_KOMPETENSI", $addtionalParam);
			
			$addtionalParam	= $this->m_param->deleteDt($this->input->post($form_name[105]));			
			$this->m_crud->deleteDt("SKEMA_UK", $addtionalParam);
			
			$paramArr		= $this->m_param->saveDt_SKE_UK($data, $this->input->post($form_name[105]));
			echo $this->m_crud->insertArrDt("SKEMA_UK", $paramArr);
		}
	
	// DELETE 
	public function deleteDt($uuid)
		{
			$data			= $this->m_globalval->getAllData();		
			$form_name		= $data["form_name"];
			
			try {
				$addtionalParam	= $this->m_param->deleteDt($uuid);			
				$this->m_crud->deleteDt("SKEMA_UK", $addtionalParam);
				
				$addtionalParam	= $this->m_param->deleteDt($uuid);			
				echo $this->m_crud->deleteDt("UNIT_KOMPETENSI", $addtionalParam);
			} catch (Exception $e) {
				echo var_dump($e->getMessage());
			}
		}
	*/
}

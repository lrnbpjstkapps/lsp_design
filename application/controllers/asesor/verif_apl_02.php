<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class verif_apl_02 extends CI_Controller {

	// ASESOR		
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
			
			$data["dview"]			= '';
			$data["dviewEvent"]		= $view[156];
			$data["dlayoutMenu"]	= $layout[106];
			$this->load->view($layout[100], $data);
		}
	
	// PAGING
	public function pagingList()
		{
			$data	= $this->m_globalval->getAllData();
			$view	= $data['view'];
			
			$this->load->view($view[151], $data);
			$this->load->view($view[152], $data);
		}
			
	public function pagingVerif($uuid)
		{
			$data					= $this->m_globalval->getAllData();		
			$form_name 				= $data['form_name'];
			$view					= $data['view'];

			$condition				= array(
				'UUID_ADM' 			=> $uuid);
			$uuid_apl02				= $this->M_administrasi->get_entry($condition)->row()->UUID_APL02;	
			
			$condition 				= array(
				'APL02.UUID_APL02'	=> $uuid_apl02);
			$result					= $this->M_apl_02->get_detail_entry($condition)->row();
			$uuid_apl01				= $result->UUID_APL01;		
			
			$condition 				= array(
				'UR.IS_ACTIVE'		=> '1',
				'ROLE.ROLE_CODE'	=> 'ASESOR');
			$data["listAsesor"]		= $this->M_user_role->get_detail_entry($condition);
			
			$condition 				= array(
				'UR.IS_ACTIVE'		=> '1',
				'ROLE.ROLE_CODE'	=> 'KOORDINATOR_TUK');
			$data["listKoorTUK"]	= $this->M_user_role->get_detail_entry($condition);
			
			$condition 				= array(
				'UR.IS_ACTIVE'		=> '1',
				'ROLE.ROLE_CODE'	=> 'MANAJER_SERTIFIKASI');
			$data["listManajSert"]	= $this->M_user_role->get_detail_entry($condition);
			
			$condition				= array(
				'ANS_APL_02.UUID_APL02'	=> $uuid_apl02);
			$listKUK				= $this->M_ans_apl02->get_detail_entry($condition);
			$data["listKUK"]		= $listKUK;			
			$i = 0;
			foreach($listKUK->result() as $row)
				{
					$data[$form_name[173]][$i] 	= $row->IS_KOMPETEN;
					$data[$form_name[136]][$i]	= explode(';', $row->UUID_BUKTI);
					$i++;
				}
			
			$condition 				= array(
				'apl01bukti.UUID_APL01'	=> $uuid_apl01,
				'apl01bukti.IS_ACTIVE'	=> '1');
			$data["listBukti"]		= $this->M_apl01_bukti->get_detail_entry($condition);
				
			$data 					= $this->M_form_apl_02->form_edit($data, $form_name, $result);
			
			$data[$form_name[149]]	= $uuid;
			
			$this->load->view($view[154], $data);
			$this->load->view($view[155], $data);
		}
		
	// VERIFIKASI	
	public function verifDt_apl_02()
		{
			$data					= $this->m_globalval->getAllData();		
			$form_name				= $data["form_name"];
			$qResult_apl_02_upd		= 1;
			$qResult_adm_upd		= 1;
			$qResult_adm_ins		= 1;
			
			// BEGIN Update FR-APL-02
			$condition				= array(
				'UUID_APL02'		=> $this->input->post($form_name[146]));
			$data_apl_02			= $this->M_apl_02->get_entry($condition);
			
			$condition				= array(
				'UUID_APL02'		=> $this->input->post($form_name[146]));
			$qResult_apl_02_upd		= $this->M_apl_02->update_entry($form_name, $data_apl_02->row(), $condition);	
			// END
					
			// BEGIN Update & Insert ADM
			$condition				= array(
				'SA_CODE' 			=> 'ALS040');
			$_POST[$form_name[251]]	= $this->M_sa->get_entry($condition)->row()->UUID_SA;
			$_POST[$form_name[259]]	= $this->session->userdata('lsp_bpjstk_uuid_user');
			
			if($qResult_apl_02_upd == 1){
				$condition			= array(
					'UUID_ADM'		=> $this->input->post($form_name[149]));
				$qResult_adm_upd	= $this->M_administrasi->update_entry_as_done($condition);
				
				if($qResult_adm_upd == 1){
					$qResult_adm_ins= $this->M_administrasi->insert_entry($form_name);
				}
			}
			//END 
			
			
			if($qResult_apl_02_upd != 1|| $qResult_adm_ins != 1)
				{
					echo -1;
				}
			else
				{			
					echo 1;
				}			
		}
		
	// DATATABLES
	public function getList_verif_apl_02()
		{				
			$result				= $this->M_list_verif_apl02_sso->get_datatables();
			$recordsTotal		= $this->M_list_verif_apl02_sso->count_all();
			$recordsFiltered	= $this->M_list_verif_apl02_sso->count_filtered();

			$output				= $this->M_list_verif_apl02_sso->get_json($result, $recordsTotal, $recordsFiltered);
			
			echo json_encode($output);
		}
}

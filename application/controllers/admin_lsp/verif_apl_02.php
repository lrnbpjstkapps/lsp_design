<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class verif_apl_02 extends CI_Controller {

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
			$this->load->model("common/m_globalval", "m_globalval");
			$this->load->model("datatables/M_list_verif_apl02", "M_list_verif_apl02");
			$this->load->model("form/M_form_apl_02", "M_form_apl_02");
			$this->load->model("table/M_administrasi", "M_administrasi");
			$this->load->model("table/M_answer_apl_02", "M_ans_apl02");
			$this->load->model("table/M_fr_apl_02", "M_apl_02");			
			
			$this->load->model("form/M_form_apl_01", "M_form_apl_01");
			$this->load->model("table/M_apl01_uk", "M_apl01_uk");
			$this->load->model("table/M_apl01_bukti", "M_apl01_bukti");
			$this->load->model("table/M_bukti", "M_bukti");
			$this->load->model("table/M_fr_apl_01", "M_apl_01");
			$this->load->model("table/M_unit_kompetensi", "M_uk");
			$this->load->model("table/M_skema", "M_skema");
			$this->load->model("table/M_skema_uk", "M_skema_uk");
			$this->load->model("table/M_status_administrasi", "M_sa");
		}
	
	public function index()
		{		
			$data					= $this->m_globalval->getAllData();
			$layout					= $data['layout'];
			$view					= $data['view'];
			
			$data["dview"]			= '';
			$data["dviewEvent"]		= $view[153];
			$data["dlayoutMenu"]	= $layout[102];
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
			
			$data 					= $this->M_form_apl_02->form_edit($data, $form_name, $result);
			
			$data[$form_name[149]]	= $uuid;
			
			$this->load->view($view[154], $data);
			$this->load->view($view[155], $data);
		}
		
	public function pagingChild($uuidApl01, $uuidSkema, $saveMethod, 
		$uuidApl02, $uuidAdm, $noAsesmen)
		{
			$data								= $this->m_globalval->getAllData();
			$data['saveMethod']					= $saveMethod;
			$form_name							= $data['form_name'];
			$view								= $data['view'];	
			
			$condition 							= array(
				'apl01bukti.UUID_APL01'			=> $uuidApl01,
				'apl01bukti.IS_ACTIVE'			=> '1');
			$data["listBukti"]					= $this->M_apl01_bukti->get_detail_entry($condition);
			
			if($saveMethod == 'add')
				{
					$condition					= array(
						'APL01.UUID_APL01'		=> $uuidApl01,
						'SKE.UUID_SKEMA'		=> $uuidSkema,
						'APL01.IS_ACTIVE'		=> '1');
				
					$order						= array(
						'UK.KODE_UK'			=> 'ASC',
						'EK.NOMOR_EK'			=> 'ASC',
						'KUK.NOMOR_KUK'			=> 'ASC');
					$data["listKUK"]			= $this->M_query->get_KUK_by_APL01($condition, $order);
				}
			else
				{
					$condition					= array(
						'ANS_APL_02.UUID_APL02'	=> $uuidApl02);
					$listKUK					= $this->M_ans_apl02->get_detail_entry($condition);
					$data["listKUK"]			= $listKUK;
					
					$i = 0;
					foreach($listKUK->result() as $row)
						{
							$data[$form_name[173]][$i] 	= $row->IS_KOMPETEN;
							$data[$form_name[136]][$i]	= explode(';', $row->UUID_BUKTI);
							$i++;
						}
				}
			
			$data[$form_name[134]]				= $uuidApl01;
			$data[$form_name[102]]				= $uuidSkema;
			$data[$form_name[146]]				= $uuidApl02;
			$data[$form_name[150]]				= $noAsesmen;
			$data[$form_name[149]]				= $uuidAdm;
			
			$this->load->view($view[156], $data);
		}
		
	// VERIFIKASI	
	public function verifDt_apl_01()
		{
			$data					= $this->m_globalval->getAllData();		
			$form_name				= $data["form_name"];
			$qResult_apl_01_upd		= 1;
			$qResult_adm_upd		= 1;
			$qResult_adm_ins		= 1;
			
			$condition				= array(
				'UUID_APL01'		=> $this->input->post($form_name[134]));
			$data_apl_01			= $this->M_apl_01->get_entry($condition);
			
			$condition					= array(
				'SA_CODE' => 'ALS020');
			$_POST[$form_name[251]]	= $this->M_sa->get_entry($condition)->row()->UUID_SA;
			$_POST[$form_name[150]]	= $data_apl_01->row()->NO_ASESMEN;
			$_POST[$form_name[259]]	= $this->session->userdata('lsp_bpjstk_uuid_user');
			
			$condition				= array(
				'UUID_APL01'		=> $this->input->post($form_name[134]));
			$qResult_apl_01_upd		= $this->M_apl_01->update_entry($form_name, $data_apl_01->row(), $condition);	
				
			if($qResult_apl_01_upd == 1){
				$condition				= array(
					'UUID_ADM'			=> $this->input->post($form_name[149]));
				$qResult_adm_upd		= $this->M_administrasi->update_entry_as_done($condition);
				
				if($qResult_adm_upd == 1){
					$qResult_adm_ins		= $this->M_administrasi->insert_entry($form_name);
				}
			}
			
			if($qResult_apl_01_upd != 1|| $qResult_adm_ins != 1)
				{
					echo -1;
				}
			else
				{			
					echo 1;
				}
			
		}
		
	// DELETE
		
	// READ	
	public function getOneDt_apl01()
		{
			$data			= $this->m_globalval->getAllData();
			$form_name		= $data["form_name"];
			
			$condition		= array(
				'apl01.UUID_APL01'=> $this->input->post($form_name[134]));
			$result			= $this->M_apl_01->get_detail_entry($condition);
			
			echo json_encode($result->row());
		}	
		
	// DATATABLES
	public function getList_verif_apl_02()
		{				
			$result				= $this->M_list_verif_apl02->get_datatables();
			$recordsTotal		= $this->M_list_verif_apl02->count_all();
			$recordsFiltered	= $this->M_list_verif_apl02->count_filtered();

			$output				= $this->M_list_verif_apl02->get_json($result, $recordsTotal, $recordsFiltered);
			
			echo json_encode($output);
		}
}

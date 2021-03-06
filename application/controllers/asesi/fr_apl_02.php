<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class fr_apl_02 extends CI_Controller {

	// Asesi		
	public function __construct()
		{
			parent::__construct();
		}
	
	public function index()
		{		
			$data					= $this->m_globalval->getAllData();
			$layout					= $data['layout'];
			$view					= $data['view'];
			
			$data["dview"]			= "";
			$data["dviewEvent"]		= $view[128];
			$data["dlayoutMenu"]	= $layout[105];
			$this->load->view($layout[100], $data);
		}
	
	//PAGING
	public function pagingList()
		{
			$data	= $this->m_globalval->getAllData();
			$view	= $data['view'];
			
			$this->load->view($view[124], $data);
			$this->load->view($view[125], $data);
		}
		
	public function pagingAddApl02($uuid)
		{
			$data					= $this->m_globalval->getAllData();
			$form_name 				= $data['form_name'];
			$view					= $data['view'];			
			
			$data 					= $this->M_form_apl_02->form_add($data, $form_name);
			
			// HEADER
			$condition				= array(
				'UUID_ADM' 			=> $uuid);
			$uuid_apl01				= $this->M_administrasi->get_entry($condition)->row()->UUID_APL01;	
			
			$condition				= array(
				'apl01.UUID_APL01'	=> $uuid_apl01);
			$result					= $this->M_apl_01->get_detail_entry($condition);
			
			$data[$form_name[115]]	= $result->row()->NAMA_LENGKAP;
			$data[$form_name[100]]	= $result->row()->NAMA_SKEMA;
			$data[$form_name[101]]	= $result->row()->NOMOR_SKEMA;
			$data[$form_name[148]]	= "-";
			$data[$form_name[134]]	= $uuid_apl01;
			$data[$form_name[150]]	= $result->row()->NO_ASESMEN;
			$data[$form_name[149]]	= $uuid;
			
			$condition				= array(
				'apl01.IS_ACTIVE'	=> '1');
			$data['listApl01']		= $this->M_apl_01->get_detail_entry($condition);
		
			$condition 				= array(
				'UUID_USER'			=> 'd8c702c5-4e7f-11e8-bf00-00ff0b0c062f',
				'IS_ACTIVE'			=> '1');
			$data["listBukti"]		= $this->M_bukti->get_entry($condition);
			
			$this->load->view($view[126], $data);
			$this->load->view($view[127], $data);
		}
		
	public function pagingUpload($uuid)
		{
			$data					= $this->m_globalval->getAllData();
			$view					= $data['view'];
			$data["saveMethod"]		= "add";
			
			$this->load->view($view[120], $data);
			$this->load->view($view[121], $data);
		}
		
	public function pagingEdit($uuid)
		{
			$data					= $this->m_globalval->getAllData();		
			$form_name 				= $data['form_name'];
			$view					= $data['view'];	
					
			$condition				= array(
				'apl01.UUID_USER'	=> 'd8c702c5-4e7f-11e8-bf00-00ff0b0c062f',
				'apl01.IS_ACTIVE'	=> '1');
			$data["listApl01"]		= $this->M_apl_01->get_detail_entry($condition);

			$condition 				= array(
				'apl02.UUID_APL02'	=> $uuid);
			$result					= $this->M_apl_02->get_detail_entry($condition)->row();
			
			$data 					= $this->M_form_apl_02->form_edit($data, $form_name, $result);
			
			$this->load->view($view[126], $data);
			$this->load->view($view[127], $data);
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
							$data[$form_name[169]][$i] 	= $row->IS_KOMPETEN;
							$data[$form_name[136]][$i]	= explode(';', $row->UUID_BUKTI);
							$i++;
						}
				}
			
			$data[$form_name[134]]				= $uuidApl01;
			$data[$form_name[102]]				= $uuidSkema;
			$data[$form_name[146]]				= $uuidApl02;
			$data[$form_name[150]]				= $noAsesmen;
			$data[$form_name[149]]				= $uuidAdm;
			
			$this->load->view($view[120], $data);
		}
		
	// CREATE		
	public function saveDt_apl_02()
		{
			$data							= $this->m_globalval->getAllData();		
			$form_name						= $data["form_name"];
			$qResult_apl02_ins				= 1;
			$qResult_ans_apl02_ins			= 1;
			$qResult_adm_upd				= 1;
			$qResult_adm_ins				= 1;
			
			$_POST[$form_name[146]]			= $this->uuid->v4();
			$qResult_apl02_ins				= $this->M_apl_02->insert_entry($form_name);
			
			if($qResult_apl02_ins == 1)
				{
					for($i = 0; $i < count($this->input->post($form_name[178])); $i++)
						{
							$qResult		= $this->M_ans_apl02->insert_multiple_entry($form_name, $i);
							if($qResult != 1)
								{
									$qResult_ans_apl02_ins = -1;
								}
						}
						
					if($qResult_ans_apl02_ins == 1){
						$condition					= array(
							'SA_CODE' => 'ASI030');
						$_POST[$form_name[251]]	= $this->M_sa->get_entry($condition)->row()->UUID_SA;
						$_POST[$form_name[257]]	= $this->session->userdata('lsp_bpjstk_uuid_user');
					
						$condition				= array(
							'UUID_ADM'			=> $this->input->post($form_name[149]));
						$qResult_adm_upd		= $this->M_administrasi->update_entry_as_done($condition);
						
						if($qResult_adm_upd == 1){
							$qResult_adm_ins		= $this->M_administrasi->insert_entry($form_name);
						}
					}
				}
				
			if($qResult_apl02_ins != 1 || $qResult_ans_apl02_ins != 1 || 
				$qResult_adm_upd != 1 || $qResult_adm_ins != 1)
				{
					echo -1;
				}
			else
				{
					echo 1;
				}
		}
	
	// UPDATE		
	public function updateDt_apl_02()
		{
			$data					= $this->m_globalval->getAllData();		
			$form_name				= $data["form_name"];
			$qResult_ans_apl02_ins	= 1;
			
			$condition				= array(
				'UUID_APL02'		=> $this->input->post($form_name[146]));
			$qResult_ans_apl02_del	= $this->M_ans_apl02->delete_entry($condition);
	
			for($i = 0; $i < count($this->input->post($form_name[178])); $i++)
				{
					$qResult		= $this->M_ans_apl02->insert_multiple_entry($form_name, $i);
					if($qResult != 1)
						{
							$qResult_ans_apl02_ins = -1;
						}
				}
				
			if($qResult_ans_apl02_ins != 1)
				{
					echo -1;
				}
			else	
				{
					echo 1;
				}
		}
	
	// DELETE
	public function deleteDt_apl_02($uuid)
		{
			$data				= $this->m_globalval->getAllData();		
		
			$condition			= array(
				'UUID_APL02'	=> $uuid);
			$qResult_ans_apl02	= $this->M_ans_apl02->delete_entry($condition);		
			$qResult_apl02		= $this->M_apl_02->delete_entry($condition);
					
			if($qResult_ans_apl02 != 1 || $qResult_apl02 != 1)
				{
					echo -1;
				}
			else{			
					echo 1;
				}
		}
		
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
	public function getList_apl02()
		{				
			$result				= $this->M_list_apl02->get_datatables();
			$recordsTotal		= $this->M_list_apl02->count_all();
			$recordsFiltered	= $this->M_list_apl02->count_filtered();

			$output				= $this->M_list_apl02->get_json($result, $recordsTotal, $recordsFiltered);
			
			echo json_encode($output);
		}
}

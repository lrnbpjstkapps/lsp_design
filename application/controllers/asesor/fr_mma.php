<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class fr_mma extends CI_Controller {

	// Asesor		
	public function __construct()
		{
			parent::__construct();
			$this->load->model("common/m_globalval", "m_globalval");
			$this->load->model("datatables/M_list_mma", "M_list_mma");
			$this->load->model("form/M_form_global", "M_form_global");
			$this->load->model("form/M_form_mma", "M_form_mma");
			$this->load->model("form/M_form_mma_kuk", "M_form_mma_kuk");
			$this->load->model("table/M_answer_apl_02", "M_ans_apl02");
			$this->load->model("table/M_fr_apl_02", "M_fr_apl_02");
			$this->load->model("table/M_fr_mma", "M_fr_mma");
			$this->load->model("table/M_mma_kuk", "M_mma_kuk");
		}
	
	public function index()
		{		
			$data					= $this->m_globalval->getAllData();		
			
			$layout					= $data['layout'];
			$data["dlayoutMenu"]	= $layout[106];
			
			$view					= $data['view'];
			$data["dview"]			= "";
			$data["dviewEvent"]		= $view[134];
			
			$this->load->view($layout[100], $data);
		}
	
	//PAGING		
	public function pagingList()
		{
			$data	= $this->m_globalval->getAllData();
			$view	= $data['view'];
			
			$this->load->view($view[129], $data);
			$this->load->view($view[130], $data);
		}
		
	public function pagingEdit($uuidMMA, $uuidApl01, $uuidApl02)
		{
			$data					= $this->m_globalval->getAllData();
			$view					= $data['view'];	
			
			$form_name 				= $data['form_name'];			
			$data[$form_name[145]]	= $uuidMMA;
			$data[$form_name[134]]	= $uuidApl01;
			$data[$form_name[146]]	= $uuidApl02;			
			
			$condition				= array(
				'ANS_APL_02.UUID_APL01'	=> $uuidApl01,
				'ANS_APL_02.UUID_APL02'	=> $uuidApl02);
			$data['listAnswer']		= $this->M_ans_apl02->get_detail_entry($condition);
			
			$condition	 			= array(
				'APL02.UUID_APL02'	=> $uuidApl02);
			$result					= $this->M_fr_apl_02->get_detail_entry($condition);			
			$data					= $this->M_form_global->form_header_1($data, $form_name, $result);
						
			$condition 				= array(
				'UUID_MMA'	=> $uuidMMA);
			$result					= $this->M_fr_mma->get_entry($condition)->row();			
			$data 					= $this->M_form_mma->form_edit($data, $form_name, $result);	

			$condition				= array(
				'MMA_KUK.UUID_MMA'	=> $uuidMMA);
			$result					= $this->M_mma_kuk->get_detail_entry($condition);			
			$data 					= $this->M_form_mma_kuk->form_edit($data, $form_name, $result);
			
			$this->load->view($view[131], $data);
			$this->load->view($view[132], $data);
		}
	
	// UPDATE		
	public function updateDt_mma()
		{				
			$data					= $this->m_globalval->getAllData();		
			$form_name				= $data["form_name"];
			$qResult_mma_upd		= 1;
			$qResult_mma_kuk_ins	= 1;
			$qResult_mma_kuk_del	= 1;
			
			$condition				= array(
				'UUID_MMA'			=> $this->input->post($form_name[145]));
			$data_mma				= $this->M_fr_mma->get_entry($condition)->row();
			
			$condition				= array(
				'UUID_MMA'			=> $this->input->post($form_name[145]));
			$qResult_mma_upd		= $this->M_fr_mma->update_entry($form_name, $data_mma, $condition);

			$qResult_mma_kuk_del	= $this->M_mma_kuk->delete_entry($condition);
			for($i = 0; $i < count($this->input->post($form_name[178])); $i++)
				{
					$qResult_mma_kuk_ins = $this->M_mma_kuk->insert_multiple_entry($form_name, $i);
				}
				
			if($qResult_mma_upd != 1 || $qResult_mma_kuk_ins != 1 || $qResult_mma_kuk_del != 1)
				{
					echo -1;
				}
			else	
				{
					echo 1;
				} 
		}
			
	//DATATABLES
	public function getList_mma()
		{				
			$result				= $this->M_list_mma->get_datatables();
			$recordsTotal		= $this->M_list_mma->count_all();
			$recordsFiltered	= $this->M_list_mma->count_filtered();
			$output				= $this->M_list_mma->get_json($result, $recordsTotal, $recordsFiltered);
			echo json_encode($output);
		}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class verif_apl_01 extends CI_Controller {

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
			$this->load->model("datatables/M_list_verif_apl01", "M_list_verif_apl01");
			$this->load->model("table/M_administrasi", "M_administrasi");
			
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
			$data["dviewEvent"]		= $view[148];
			$data["dlayoutMenu"]	= $layout[102];
			$this->load->view($layout[100], $data);
		}
	
	// PAGING
	public function pagingList()
		{
			$data	= $this->m_globalval->getAllData();
			$view	= $data['view'];
			
			$this->load->view($view[146], $data);
			$this->load->view($view[147], $data);
		}
			
	public function pagingVerif($uuid)
		{
			$data					= $this->m_globalval->getAllData();		
			$form_name 				= $data['form_name'];
			$view					= $data['view'];
			
			$condition				= array(
				'UUID_ADM' 			=> $uuid);
			$uuid_apl01				= $this->M_administrasi->get_entry($condition)->row()->UUID_APL01;	
			
			$condition				= array(
				'UUID_APL01'		=> $uuid_apl01);
			$result					= $this->M_apl_01->get_detail_entry($condition)->row();
			$data					= $this->M_form_apl_01->form_edit($data, $form_name, $result);
					
			$condition				= array(
				'IS_ACTIVE' 		=> '1');
			$data["listSkema"]		= $this->M_skema->get_entry($condition);			
			
			$this->load->view($view[149], $data);
			$this->load->view($view[150], $data);
		}
		
	// VERIFIKASI	
	public function verifDt_apl_01()
		{
			/*$data						= $this->m_globalval->getAllData();		
			$form_name					= $data["form_name"];
			
			$condition				= array(
				'UUID_APL01'		=> $this->input->post($form_name[134]));
			if($this->input->post($form_name[162])=='Berdasarkan ketentuan persyaratan dasar pemohon, maka pemohon diterima sebagai peserta sertifikasi')
				{
					$this->M_apl_01->update_entry($form_name, $data, $condition);
				}
				
			$this->M_administrasi->insert_entry($form_name, $data, $condition);*/
			
		}
		
	// DELETE
		
	// READ	
	public function getOneDt_nomorSkema()
		{
			$data			= $this->m_globalval->getAllData();	
			$form_name		= $data['form_name'];
			
			$condition		= array(
				'UUID_SKEMA'=> $this->input->post($form_name[102]));
			$result			= $this->M_skema->get_entry($condition);
			
			echo $result->row()->NOMOR_SKEMA;
		}
		
	public function getAllDt_skema_uk()
		{			
			$data					= $this->m_globalval->getAllData();
			$form_name				= $data["form_name"];
			
			$condition				= array(
				'skemauk.UUID_SKEMA'=> $this->input->post($form_name[102]),
				'skemauk.IS_ACTIVE'	=> '1');
			$listUK					= $this->M_skema_uk->get_detail_entry($condition);

			$listUK_selected_temp	= array();
			$listUK_selected		= array();
			if($this->input->post($form_name[134])!="")
				{					
					$condition					= array(
						'apl01uk.UUID_APL01'	=> $this->input->post($form_name[134]),
						'apl01uk.IS_ACTIVE'		=> '1');
					$listUK_selected_temp 		= $this->M_apl01_uk->get_detail_entry($condition);
					
					$i = 0;
					foreach($listUK_selected_temp->result() as $row)
						{
							$listUK_selected[$i]= $row->UUID_UK;	
							$i++;
						}					
				}
				
			if($listUK->num_rows()>0){
				echo '<div class="card">
						<div class="card-body">
							<h6 class = "float-right">('.count($listUK_selected).' dari '.$listUK->num_rows().')</h6>
							<table class="table table-hover dataTable" cellspacing="0" width="100%">';
				$i = 1;
				foreach($listUK->result() as $row){
					if(in_array($row->UUID_UK, $listUK_selected))
						{
							if($i == 1){
								echo "<tr><td>".$row->KODE_UK." - ".$row->JUDUL_UK."</td>";
							}else if($i%4!=0){
								echo "<td>".$row->KODE_UK." - ".$row->JUDUL_UK."</td>";
							}else{
								echo "</tr>";
							}		
							$i++;
						}
					
				}
				echo "</table>
						</div>
							</div>";
			}
			
			exit;				
		}
		
	public function getAllDt_bukti()
		{			
			$data						= $this->m_globalval->getAllData();
			$form_name					= $data["form_name"];
			
			$condition					= array(
				'UUID_USER'				=> $this->input->post($form_name[140]),
				'IS_ACTIVE'				=> '1');
			$listBukti					= $this->M_bukti->get_entry($condition);

			$listBukti_selected_temp	= array();
			$listBukti_selected			= array();
			if($this->input->post($form_name[134])!="")
				{
					$condition					= array(
						'apl01bukti.UUID_APL01'	=> $this->input->post($form_name[134]));
					$listBukti_selected_temp	= $this->M_apl01_bukti->get_detail_entry($condition);	
				
					$i = 0;
					if($listBukti_selected_temp!=""){
						foreach($listBukti_selected_temp->result() as $row)
							{
								$listBukti_selected[$i]	= $row->UUID_BUKTI;	
								$i++;
							}	
					}
				}
				
			if($listBukti->num_rows()>0){
				echo '<div class="card">
						<div class="card-body">
							<table class="table table-hover dataTable" cellspacing="0" width="100%">';
				$i = 1;
				foreach($listBukti->result() as $row){
					if(in_array($row->UUID_BUKTI, $listBukti_selected))
						{
							//echo "<option value='".$row->UUID_BUKTI."' selected> ".$row->KETERANGAN."</option>";
							
							if($i == 1){
								echo "<tr><td>".'<a href="'.base_url().$row->URL.'" target="_blank"><i class="fa fa-file-pdf-o"></i> '.$row->KETERANGAN.'</a>'."</td>";								
							}else if($i%6!=0){
								echo "<td>".'<a href="'.base_url().$row->URL.'" target="_blank"><i class="fa fa-file-pdf-o"></i> '.$row->KETERANGAN.'</a>'."</td>";								
							}else{
								echo "</tr>";
							}		
							$i++;
						}				
				}
				
				echo "</table>
						</div>
							</div>";
			}

			exit;				
		}
		
	// DATATABLES
	public function getList_verif_apl_01()
		{				
			$result				= $this->M_list_verif_apl01->get_datatables();
			$recordsTotal		= $this->M_list_verif_apl01->count_all();
			$recordsFiltered	= $this->M_list_verif_apl01->count_filtered();

			$output				= $this->M_list_verif_apl01->get_json($result, $recordsTotal, $recordsFiltered);
			
			echo json_encode($output);
		}
}

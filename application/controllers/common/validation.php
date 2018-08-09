<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class validation extends CI_Controller {

	public function __construct()
		{
			parent::__construct();
			$this->load->model("common/m_globalval", "m_globalval");
			$this->load->model("table/M_bukti", "M_bukti");
			$this->load->model("table/M_ek", "M_ek");
			$this->load->model("table/M_kuk", "M_kuk");
			$this->load->model("table/M_uk", "M_uk");
			$this->load->model("table/M_skema", "M_skema");
		}
	
	// IS_EXIST
	public function isBuktiKeteranganExist()
		{
			$data				= $this->m_globalval->getAllData();			
			$form_name			= $data["form_name"];
			
			$condition			= array(
				'UUID_BUKTI <>'	=> $this->input->post($form_name[136]),
				'KETERANGAN'	=> $this->input->post($form_name[138]));
			$result				= $this->M_bukti->get_entry($condition);
			
			if($result->num_rows()>0){
				echo "false";
			}else{
				echo "true";
			}
		}
		
	public function isEkNomorExist()
		{
			$data			= $this->m_globalval->getAllData();			
			$form_name		= $data["form_name"];
			
			$condition		= array(
				'UUID_EK <>'=> $this->input->post($form_name[109]),
				'NOMOR_EK'	=> $this->input->post($form_name[108]));
			$result			= $this->M_ek->get_entry($condition);
			
			if($result->num_rows()>0){
				echo "false";
			}else{
				echo "true";
			}
		}
		
	public function isKukNomorExist()
		{
			$data			= $this->m_globalval->getAllData();			
			$form_name		= $data["form_name"];
			
			$condition		= array(
				'UUID_KUK <>'=> $this->input->post($form_name[113]),
				'NOMOR_KUK'	=> $this->input->post($form_name[112]));
			$result			= $this->M_kuk->get_entry($condition);
			
			if($result->num_rows()>0){
				echo "false";
			}else{
				echo "true";
			}
		}
		
	public function isSkemaNomorExist()
		{
			$data				= $this->m_globalval->getAllData();			
			$form_name			= $data["form_name"];
			
			$condition			= array(
				'UUID_SKEMA <>'	=> $this->input->post($form_name[102]),
				'NOMOR_SKEMA'	=> $this->input->post($form_name[101]));
			$result				= $this->M_skema->get_entry($condition);
			
			if($result->num_rows()>0){
				echo "false";
			}else{
				echo "true";
			}
		}
	
	public function isUkKodeExist()
		{
			$data			= $this->m_globalval->getAllData();			
			$form_name		= $data["form_name"];
			
			$condition		= array(
				'UUID_UK <>'=> $this->input->post($form_name[105]),
				'KODE_UK'	=> $this->input->post($form_name[104]));
			$result			= $this->M_uk->get_entry($condition);
			
			if($result->num_rows()>0){
				echo "false";
			}else{
				echo "true";
			}
		}		
	
}

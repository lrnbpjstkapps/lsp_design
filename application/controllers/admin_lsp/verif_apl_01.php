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
			
			$this->load->model("form/M_form_apl_01", "M_form_apl_01");
			$this->load->model("table/M_administrasi", "M_administrasi");
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
			$data["dviewEvent"]		= $view[119];
			$data["dlayoutMenu"]	= $layout[105];
			$this->load->view($layout[100], $data);
		}
		
	function uniqidReal($lenght) {
			if (function_exists("random_bytes")) {
				$bytes = random_bytes(ceil($lenght / 2));
			} elseif (function_exists("openssl_random_pseudo_bytes")) {
				$bytes = openssl_random_pseudo_bytes(ceil($lenght / 2));
			} else {
				throw new Exception("no cryptographically secure random function available");
			}
			return strtoupper(substr(bin2hex($bytes), 0, $lenght));
		}
	
	// PAGING
	public function pagingList()
		{
			$data	= $this->m_globalval->getAllData();
			$view	= $data['view'];
			
			$this->load->view($view[115], $data);
			$this->load->view($view[116], $data);
		}
		
	// CREATE		
	
	// UPDATE		
	
	// DELETE
		
	// READ	
		
	// DATATABLES
	public function getList_apl_01()
		{				
			$result				= $this->M_list_apl01->get_datatables();
			$recordsTotal		= $this->M_list_apl01->count_all();
			$recordsFiltered	= $this->M_list_apl01->count_filtered();

			$output				= $this->M_list_apl01->get_json($result, $recordsTotal, $recordsFiltered);
			
			echo json_encode($output);
		}
}

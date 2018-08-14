<?php
	class M_status_administrasi extends CI_Model{
		public $UUID_SA;
		public $SA_ORDER;
		public $SA_CODE;
		public $FORM;
		public $KETERANGAN;
		public $USR_CRT;
		public $DTM_CRT;
		public $USR_UPD;
		public $DTM_UPD;
		public $IS_ACTIVE;
		
		public function get_entry($condition)
			{
				return $this->db->get_where('STATUS_ADMINISTRASI', $condition);
			}
			
		public function insert_entry($form_name)
			{
				$this->UUID_SA		= (!$this->input->post($form_name[251]) ? $this->uuid->v4() : $this->input->post($form_name[251]));
				$this->SA_ORDER		= (!$this->input->post($form_name[252]) ? null : $this->input->post($form_name[252]));
				$this->SA_CODE		= (!$this->input->post($form_name[253]) ? null : $this->input->post($form_name[253]));
				$this->FORM			= (!$this->input->post($form_name[254]) ? null : $this->input->post($form_name[254]));
				$this->KETERANGAN	= (!$this->input->post($form_name[255]) ? null : $this->input->post($form_name[255]));
				$this->USR_CRT		= $this->session->userdata('lsp_bpjstk_user_name');
				$this->DTM_CRT		= date('Y-m-d H:i:s');
				$this->USR_UPD		= null;
				$this->DTM_UPD		= null;
				$this->IS_ACTIVE	= '1';
				
				return $this->db->insert('STATUS_ADMINISTRASI', $this);
			}
			
		public function update_entry($form_name, $data, $condition)
			{
				$this->UUID_SA		= (!$this->input->post($form_name[251]) ? $data->UUID_SA : $this->input->post($form_name[251]));
				$this->SA_ORDER		= (!$this->input->post($form_name[252]) ? $data->SA_ORDER : $this->input->post($form_name[252]));
				$this->SA_CODE		= (!$this->input->post($form_name[253]) ? $data->SA_CODE : $this->input->post($form_name[253]));
				$this->FORM			= (!$this->input->post($form_name[254]) ? $data->FORM : $this->input->post($form_name[254]));
				$this->KETERANGAN	= (!$this->input->post($form_name[255]) ? $data->KETERANGAN : $this->input->post($form_name[255]));
				$this->USR_CRT		= $data->USR_CRT;
				$this->DTM_CRT		= $data->DTM_CRT;
				$this->USR_UPD		= $this->session->userdata('lsp_bpjstk_user_name');
				$this->DTM_UPD		= date('Y-m-d H:i:s');
				$this->IS_ACTIVE	= (!$this->input->post($form_name[256]) ? $data->IS_ACTIVE : $this->input->post($form_name[256]));
					
				return $this->db->update('STATUS_ADMINISTRASI', $this, $condition);
			}
			
		public function delete_entry($condition)
			{
				return $this->db->delete('STATUS_ADMINISTRASI', $condition);
			}
		
	}
?>
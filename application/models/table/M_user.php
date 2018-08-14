<?php
	class M_user extends CI_Model{
		public $UUID_USER;
		public $LOGIN_ID;
		public $USER_NAME;
		public $EMAIL;
		public $PWD;
		public $PHONE;
		public $IS_ONLINE;
		public $USR_CRT;
		public $DTM_CRT;
		public $USR_UPD;
		public $DTM_UPD;
		public $IS_ACTIVE;
		
		public function get_entry($condition)
			{
				return $this->db->get_where('USR', $condition);
			}
			
		public function insert_entry($form_name)
			{
				$this->UUID_USER	= (!$this->input->post($form_name[237]) ? $this->uuid->v4() : $this->input->post($form_name[237]));
				$this->LOGIN_ID		= (!$this->input->post($form_name[238]) ? null : $this->input->post($form_name[238]));
				$this->USER_NAME	= (!$this->input->post($form_name[239]) ? null : $this->input->post($form_name[239]));
				$this->EMAIL		= (!$this->input->post($form_name[240]) ? null : $this->input->post($form_name[240]));
				$this->PWD		= (!$this->input->post($form_name[241]) ? null : $this->input->post($form_name[241]));
				$this->PHONE		= (!$this->input->post($form_name[242]) ? null : $this->input->post($form_name[242]));
				$this->IS_ONLINE	= '0';
				$this->USR_CRT		= $this->session->userdata('lsp_bpjstk_user_name');
				$this->DTM_CRT		= date('Y-m-d H:i:s');
				$this->USR_UPD		= null;
				$this->DTM_UPD		= null;
				$this->IS_ACTIVE	= '1';
				
				return $this->db->insert('USR', $this);
			}
			
		public function update_entry($form_name, $data, $condition)
			{
				$this->UUID_USER	= (!$this->input->post($form_name[237]) ? $data->UUID_USER : $this->input->post($form_name[237]));
				$this->LOGIN_ID		= (!$this->input->post($form_name[238]) ? $data->LOGIN_ID : $this->input->post($form_name[238]));
				$this->USER_NAME	= (!$this->input->post($form_name[239]) ? $data->USER_NAME : $this->input->post($form_name[239]));
				$this->EMAIL		= (!$this->input->post($form_name[240]) ? $data->EMAIL : $this->input->post($form_name[240]));
				$this->PWD		= (!$this->input->post($form_name[241]) ? $data->PWD : $this->input->post($form_name[241]));
				$this->PHONE		= (!$this->input->post($form_name[242]) ? $data->PHONE : $this->input->post($form_name[242]));
				$this->IS_ONLINE	= (!$this->input->post($form_name[243]) ? $data->IS_ONLINE : $this->input->post($form_name[243]));
				$this->USR_CRT		= $data->USR_CRT;
				$this->DTM_CRT		= $data->DTM_CRT;
				$this->USR_UPD		= $this->session->userdata('lsp_bpjstk_user_name');
				$this->DTM_UPD		= date('Y-m-d H:i:s');
				$this->IS_ACTIVE	= (!$this->input->post($form_name[244]) ? $data->IS_ACTIVE : $this->input->post($form_name[244]));
					
				return $this->db->update('USR', $this, $condition);
			}
			
		public function delete_entry($condition)
			{
				return $this->db->delete('USR', $condition);
			}
		
	}
?>
<?php
	class M_user_role extends CI_Model{
		public $UUID_USER_ROLE;
		public $UUID_USER;
		public $UUID_ROLE;
		public $USR_CRT;
		public $DTM_CRT;
		public $USR_UPD;
		public $DTM_UPD;
		public $IS_ACTIVE;
		
		public function get_entry($condition)
			{
				return $this->db->get_where('USER_ROLE', $condition);
			}
			
		public function get_detail_entry($condition)
			{
				$this->db->select('UR.UUID_USER_ROLE, UR.UUID_USER, UR.UUID_ROLE, UR.IS_ACTIVE,
					USR.LOGIN_ID, USR.USER_NAME, USR.PWD, USR.IS_ACTIVE, ROLE.ROLE_NAME, ROLE.ROLE_CODE, ROLE.IS_ACTIVE');
				$this->db->from("USER_ROLE AS UR");
				$this->db->join("USR", "UR.UUID_USER = USR.UUID_USER", "LEFT");
				$this->db->join("ROLE", "UR.UUID_ROLE = ROLE.UUID_ROLE", "LEFT");
				$this->db->where($condition);
				return $this->db->get();
			}
			
		public function insert_entry($form_name)
			{
				$this->UUID_USER_ROLE	= (!$this->input->post($form_name[249]) ? $this->uuid->v4() : $this->input->post($form_name[249]));
				$this->UUID_USER		= (!$this->input->post($form_name[237]) ? null : $this->input->post($form_name[237]));
				$this->UUID_ROLE		= (!$this->input->post($form_name[245]) ? null : $this->input->post($form_name[245]));
				$this->USR_CRT			= $this->session->userdata('lsp_bpjstk_user_name');
				$this->DTM_CRT			= date('Y-m-d H:i:s');
				$this->USR_UPD			= null;
				$this->DTM_UPD			= null;
				$this->IS_ACTIVE		= '1';
				
				return $this->db->insert('USER_ROLE', $this);
			}
			
		public function update_entry($form_name, $data, $condition)
			{
				$this->UUID_USER_ROLE	= (!$this->input->post($form_name[249]) ? $data->UUID_USER_ROLE : $this->input->post($form_name[249]));
				$this->UUID_USER		= (!$this->input->post($form_name[237]) ? $data->UUID_USER : $this->input->post($form_name[237]));
				$this->UUID_ROLE		= (!$this->input->post($form_name[245]) ? $data->UUID_ROLE : $this->input->post($form_name[245]));
				$this->USR_CRT			= $data->USR_CRT;
				$this->DTM_CRT			= $data->DTM_CRT;
				$this->USR_UPD			= $this->session->userdata('lsp_bpjstk_user_name');
				$this->DTM_UPD			= date('Y-m-d H:i:s');
				$this->IS_ACTIVE		= (!$this->input->post($form_name[250]) ? $data->IS_ACTIVE : $this->input->post($form_name[250]));
					
				return $this->db->update('USER_ROLE', $this, $condition);
			}
			
		public function delete_entry($condition)
			{
				return $this->db->delete('USER_ROLE', $condition);
			}
		
	}
?>
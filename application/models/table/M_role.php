<?php
	class M_role extends CI_Model{
		public $UUID_ROLE;
		public $ROLE_NAME;
		public $ROLE_CODE;
		public $USR_CRT;
		public $DTM_CRT;
		public $USR_UPD;
		public $DTM_UPD;
		public $IS_ACTIVE;
		
		public function get_entry($condition)
			{
				return $this->db->get_where('ROLE', $condition);
			}
			
		public function insert_entry($form_name)
			{
				$this->UUID_ROLE	= (!$this->input->post($form_name[245]) ? $this->uuid->v4() : $this->input->post($form_name[245]));
				$this->ROLE_NAME	= (!$this->input->post($form_name[246]) ? null : $this->input->post($form_name[246]));
				$this->ROLE_CODE	= (!$this->input->post($form_name[247]) ? null : $this->input->post($form_name[247]));
				$this->USR_CRT		= 'SUPER ADMIN';
				$this->DTM_CRT		= date('Y-m-d H:i:s');
				$this->USR_UPD		= null;
				$this->DTM_UPD		= null;
				$this->IS_ACTIVE	= '1';
				
				return $this->db->insert('ROLE', $this);
			}
			
		public function update_entry($form_name, $data, $condition)
			{
				$this->UUID_ROLE	= (!$this->input->post($form_name[245]) ? $data->UUID_ROLE : $this->input->post($form_name[245]));
				$this->ROLE_NAME	= (!$this->input->post($form_name[246]) ? $data->ROLE_NAME : $this->input->post($form_name[246]));
				$this->ROLE_CODE	= (!$this->input->post($form_name[247]) ? $data->ROLE_CODE : $this->input->post($form_name[247]));
				$this->USR_CRT		= $data->USR_CRT;
				$this->DTM_CRT		= $data->DTM_CRT;
				$this->USR_UPD		= 'SUPER ADMIN';
				$this->DTM_UPD		= date('Y-m-d H:i:s');
				$this->IS_ACTIVE	= (!$this->input->post($form_name[248]) ? $data->IS_ACTIVE : $this->input->post($form_name[248]));
					
				return $this->db->update('ROLE', $this, $condition);
			}
			
		public function delete_entry($condition)
			{
				return $this->db->delete('ROLE', $condition);
			}
		
	}
?>
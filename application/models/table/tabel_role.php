<?php
	class tabel_role extends CI_Model{
		//All table fields
		public $UUID_ROLE;
		public $ROLE_NAME;
		public $ROLE_CODE;
		public $USR_CRT;
		public $DTM_CRT;
		public $USR_UPD;
		public $DTM_UPD;
		public $IS_ACTIVE;
		
		//Get data from database
		public function ambil_data($kondisi)
			{
				return $this->db->get_where('ROLE', $kondisi);
			}
			
		//Add one data
		public function tambah_satu_data($data)
			{
				$this->UUID_ROLE	= $data["role_uuid"];
				$this->ROLE_NAME	= $data["role_name"];
				$this->ROLE_CODE	= $data["role_code"];
				$this->USR_CRT		= $this->session->userdata('lsp_bpjstk_user_name');
				$this->DTM_CRT		= date('Y-m-d H:i:s');
				$this->USR_UPD		= null;
				$this->DTM_UPD		= null;
				$this->IS_ACTIVE	= $data["user_is_active"];
				
				return $this->db->insert('ROLE', $this);
			}
			
		//Update data
		public function update_satu_data($data_lama, $data_baru, $kondisi)
			{
				$this->UUID_ROLE	= $data_lama->UUID_ROLE;
				$this->ROLE_NAME	= $data_baru["role_name"];
				$this->ROLE_CODE	= $data_baru["role_code"];
				$this->USR_CRT		= $data_lama->USR_CRT;
				$this->DTM_CRT		= $data_lama->DTM_CRT;
				$this->USR_UPD		= $this->session->userdata('lsp_bpjstk_user_name');
				$this->DTM_UPD		= date('Y-m-d H:i:s');
				$this->IS_ACTIVE	= $data_baru["user_is_active"];
					
				return $this->db->update('ROLE', $this, $kondisi);
			}
		
		//Delete data
		public function hapus_data($kondisi)
			{
				return $this->db->delete('ROLE', $kondisi);
			}
		
	}
?>
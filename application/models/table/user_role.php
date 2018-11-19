<?php
	class user_role extends CI_Model{
		//All table fields
		public $UUID_USER_ROLE;
		public $UUID_USER;
		public $UUID_ROLE;
		public $USR_CRT;
		public $DTM_CRT;
		public $USR_UPD;
		public $DTM_UPD;
		public $IS_ACTIVE;
		
		//Get data from database
		public function ambil_data($kondisi)
			{
				return $this->db->get_where('USER_ROLE', $kondisi);
			}
			
			
		public function get_detail_entry($kondisi)
			{
				$this->db->select('UR.UUID_USER_ROLE, UR.UUID_USER, UR.UUID_ROLE, UR.IS_ACTIVE,
					USR.LOGIN_ID, USR.USER_NAME, USR.PWD, USR.IS_ACTIVE, ROLE.ROLE_NAME, ROLE.ROLE_CODE, ROLE.IS_ACTIVE');
				$this->db->from("USER_ROLE AS UR");
				$this->db->join("USR", "UR.UUID_USER = USR.UUID_USER", "LEFT");
				$this->db->join("ROLE", "UR.UUID_ROLE = ROLE.UUID_ROLE", "LEFT");
				$this->db->where($kondisi);
				return $this->db->get();
			}
			
		//Add one data
		public function tambah_satu_data($data)
			{
				$this->UUID_USER_ROLE	= $data["user_role_uuid"];
				$this->UUID_USER		= $data["user_uuid"];
				$this->UUID_ROLE		= $data["role_uuid"];
				$this->USR_CRT			= $this->session->userdata('lsp_bpjstk_user_name');
				$this->DTM_CRT			= date('Y-m-d H:i:s');
				$this->USR_UPD			= null;
				$this->DTM_UPD			= null;
				$this->IS_ACTIVE		= $data["user_role_is_active"];
				
				return $this->db->insert('USER_ROLE', $this);
			}
			
		//Delete data
		public function hapus_data($kondisi)
			{
				return $this->db->delete('USER_ROLE', $kondisi);
			}
		
	}
?>
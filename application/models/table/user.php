<?php
	class user extends CI_Model{
		//All table fields 
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
		
		//Get one data from database
		public function ambil_satu_data($kondisi)
			{
				return $this->db->get_where('USR', $kondisi)->row(1);
			}
			
		//Get data from database
		public function ambil_data($kondisi)
			{
				return $this->db->get_where('USR', $kondisi);
			}
			
		//Add one data
		public function tambah_satu_data($data)
			{
				$this->UUID_USER	= $data["user_uuid"];
				$this->LOGIN_ID		= $data["user_login_id"];
				$this->USER_NAME	= $data["user_full_name"];
				$this->EMAIL		= $data["user_email"];
				$this->PWD			= $data["user_pwd"];
				$this->PHONE		= $data["user_phone"];
				$this->IS_ONLINE	= $data["user_is_online"];
				$this->USR_CRT		= $this->session->userdata('lsp_bpjstk_user_name');
				$this->DTM_CRT		= date('Y-m-d H:i:s');
				$this->USR_UPD		= null;
				$this->DTM_UPD		= null;
				$this->IS_ACTIVE	= $data["user_is_active"];
				
				return $this->db->insert('USR', $this);
			}
			
		//Update data
		public function update_satu_data($data_lama, $data_baru, $kondisi)
			{
				$this->UUID_USER	= $data_lama->UUID_USER;
				$this->LOGIN_ID		= $data_baru["user_login_id"];
				$this->USER_NAME	= $data_baru["user_full_name"];
				$this->EMAIL		= $data_baru["user_email"];
				$this->PWD			= $data_baru["user_pwd"];
				$this->PHONE		= $data_baru["user_phone"];
				$this->IS_ONLINE	= $data_baru["user_is_online"];
				$this->USR_CRT		= $data_lama->USR_CRT;
				$this->DTM_CRT		= $data_lama->DTM_CRT;
				$this->USR_UPD		= $this->session->userdata('lsp_bpjstk_user_name');
				$this->DTM_UPD		= date('Y-m-d H:i:s');
				$this->IS_ACTIVE	= $data_baru["user_is_active"];
					
				return $this->db->update('USR', $this, $kondisi);
			}
			
		//Delete data
		public function hapus_data($kondisi)
			{
				return $this->db->delete('USR', $kondisi);
			}
		
	}
?>
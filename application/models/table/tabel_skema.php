<?php
	class tabel_skema extends CI_Model{
		//All table fields
		public $UUID_SKEMA;
		public $NAMA_SKEMA;
		public $NOMOR_SKEMA;
		public $USR_CRT;
		public $DTM_CRT;
		public $USR_UPD;
		public $DTM_UPD;
		public $IS_ACTIVE;
		
		//Get one data from database
		public function ambil_satu_data($kondisi){
			return $this->db->get_where('SKEMA', $kondisi)->row(1);
		}
		
		//Get data from database
		public function ambil_data($kondisi){
			return $this->db->get_where('SKEMA', $kondisi);
		}
		
		//Add one data
		public function tambah_satu_data($data){
				$this->UUID_SKEMA	= $data["ss_uuid"];
				$this->NAMA_SKEMA	= $data["ss_nama"];
				$this->NOMOR_SKEMA	= $data["ss_nomor"];
				$this->USR_CRT		= $this->session->userdata('lsp_bpjstk_user_name');
				$this->DTM_CRT		= date('Y-m-d H:i:s');
				$this->USR_UPD		= null;
				$this->DTM_UPD		= null;
				$this->IS_ACTIVE	= $data["ss_is_active"];
				
				return $this->db->insert('SKEMA', $this);
			}
			
		//Update data
		public function update_satu_data($data_lama, $data_baru, $kondisi)
			{
				$this->UUID_SKEMA	= $data_lama->UUID_SKEMA;
				$this->NAMA_SKEMA	= $data_baru["ss_nama"];
				$this->NOMOR_SKEMA	= $data_baru["ss_nomor"];
				$this->USR_CRT		= $data_lama->USR_CRT;
				$this->DTM_CRT		= $data_lama->DTM_CRT;
				$this->USR_UPD		= $this->session->userdata('lsp_bpjstk_user_name');
				$this->DTM_UPD		= date('Y-m-d H:i:s');
				$this->IS_ACTIVE	= $data_baru["ss_is_active"];
					
				return $this->db->update('SKEMA', $this, $kondisi);
			}
		
	}
?>
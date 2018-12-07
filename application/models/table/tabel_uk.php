<?php
	class tabel_uk extends CI_Model{
		public $UUID_UK;
		public $JUDUL_UK;
		public $KODE_UK;
		public $USR_CRT;
		public $DTM_CRT;
		public $USR_UPD;
		public $DTM_UPD;
		public $IS_ACTIVE;
		
		//Get one data from database
		public function ambil_satu_data($kondisi){
			return $this->db->get_where('UNIT_KOMPETENSI', $kondisi)->row(1);
		}
			
		//Get data from database
		public function ambil_data($kondisi){
			return $this->db->get_where('UNIT_KOMPETENSI', $kondisi);
		}
		
		//Add one data
		public function tambah_satu_data($data)
			{
				$this->UUID_UK		= $data["uk_uuid"];
				$this->JUDUL_UK		= $data["uk_judul"];
				$this->KODE_UK		= $data["uk_kode"];
				$this->USR_CRT		= $this->session->userdata('lsp_bpjstk_user_name');
				$this->DTM_CRT		= date('Y-m-d H:i:s');
				$this->USR_UPD		= null;
				$this->DTM_UPD		= null;
				$this->IS_ACTIVE	= $data["uk_is_active"];
				
				return $this->db->insert('UNIT_KOMPETENSI', $this);
			}
		
		//Update data
		public function update_satu_data($data_lama, $data_baru, $kondisi)
			{
				$this->UUID_UK		= $data_lama->UUID_UK;
				$this->JUDUL_UK		= $data_baru["uk_judul"];
				$this->KODE_UK		= $data_baru["uk_kode"];
				$this->USR_CRT		= $data_lama->USR_CRT;
				$this->DTM_CRT		= $data_lama->DTM_CRT;
				$this->USR_UPD		= $this->session->userdata('lsp_bpjstk_user_name');
				$this->DTM_UPD		= date('Y-m-d H:i:s');
				$this->IS_ACTIVE	= $data_baru["uk_is_active"];
					
				return $this->db->update('UNIT_KOMPETENSI', $this, $kondisi);
			}
			
		//Delete data
		public function hapus_data($kondisi)
			{
				return $this->db->delete('UK', $kondisi);
			}
		
	}
?>
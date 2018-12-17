<?php
	class tabel_kuk extends CI_Model{
		public $UUID_KUK;
		public $UUID_EK;
		public $NOMOR_KUK;
		public $PERNYATAAN;
		public $PERTANYAAN;
		public $USR_CRT;
		public $DTM_CRT;
		public $USR_UPD;
		public $DTM_UPD;
		public $IS_ACTIVE;
		
		//Get one data from database
		public function ambil_satu_data($kondisi){
			return $this->db->get_where('KRITERIA_UNJUK_KERJA', $kondisi)->row(1);
		}
			
		//Get data from database
		public function ambil_data($kondisi){
			return $this->db->get_where('KRITERIA_UNJUK_KERJA', $kondisi);
		}
		
		//Add one data
		public function tambah_satu_data($data){
			$this->UUID_KUK		= $data['kuk_uuid'];
			$this->UUID_EK		= $data['ek_uuid'];
			$this->NOMOR_KUK	= $data['kuk_nomor'];
			$this->PERNYATAAN	= $data['kuk_pernyataan'];
			$this->PERTANYAAN	= $data['kuk_pertanyaan'];
			$this->USR_CRT		= $this->session->userdata('lsp_bpjstk_user_name');
			$this->DTM_CRT		= date('Y-m-d H:i:s');
			$this->USR_UPD		= null;
			$this->DTM_UPD		= null;
			$this->IS_ACTIVE	= $data['kuk_is_active'];
			
			return $this->db->insert('KRITERIA_UNJUK_KERJA', $this);
		}
			
		public function update_satu_data($data_lama, $data_baru, $kondisi){
			$this->UUID_KUK		= $data_lama->UUID_KUK;
			$this->UUID_EK		= $data_baru['ek_uuid'];
			$this->NOMOR_KUK	= $data_baru['kuk_nomor'];
			$this->PERNYATAAN	= $data_baru['kuk_pernyataan'];
			$this->PERTANYAAN	= $data_baru['kuk_pertanyaan'];
			$this->USR_CRT		= $data_lama->USR_CRT;
			$this->DTM_CRT		= $data_lama->DTM_CRT;
			$this->USR_UPD		= $this->session->userdata('lsp_bpjstk_user_name');
			$this->DTM_UPD		= date('Y-m-d H:i:s');
			$this->IS_ACTIVE	= $data_baru['kuk_is_active'];
				
			return $this->db->update('KRITERIA_UNJUK_KERJA', $this, $kondisi);
		}		
	}
?>
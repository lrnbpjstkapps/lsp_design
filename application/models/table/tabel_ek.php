<?php
	class tabel_ek extends CI_Model{
		public $UUID_EK;
		public $UUID_UK;
		public $NOMOR_EK;
		public $NAMA_EK;
		public $USR_CRT;
		public $DTM_CRT;
		public $USR_UPD;
		public $DTM_UPD;
		public $IS_ACTIVE;
		
		//Get one data from database
		public function ambil_satu_data($kondisi){
			return $this->db->get_where('ELEMEN_KOMPETENSI', $kondisi)->row(1);
		}
			
		//Get data from database
		public function ambil_data($kondisi){
			return $this->db->get_where('ELEMEN_KOMPETENSI', $kondisi);
		}
		
		//Add one data
		public function tambah_satu_data($data){
			$this->UUID_EK		= $data['ek_uuid'];
			$this->UUID_UK		= $data['uk_uuid'];
			$this->NOMOR_EK		= $data['ek_nomor'];
			$this->NAMA_EK		= $data['ek_nama'];
			$this->USR_CRT		= $this->session->userdata('lsp_bpjstk_user_name');
			$this->DTM_CRT		= date('Y-m-d H:i:s');
			$this->USR_UPD		= null;
			$this->DTM_UPD		= null;
			$this->IS_ACTIVE	= $data['ek_is_active'];
			
			return $this->db->insert('ELEMEN_KOMPETENSI', $this);
		}
		
		//Update data
		public function update_satu_data($data_lama, $data_baru, $kondisi){
			$this->UUID_EK		= $data_lama->UUID_EK;
			$this->UUID_UK		= $data_baru['uk_uuid'];
			$this->NOMOR_EK		= $data_baru['ek_nomor'];
			$this->NAMA_EK		= $data_baru['ek_nama'];;
			$this->USR_CRT		= $data_lama->USR_CRT;
			$this->DTM_CRT		= $data_lama->DTM_CRT;
			$this->USR_UPD		= $this->session->userdata('lsp_bpjstk_user_name');
			$this->DTM_UPD		= date('Y-m-d H:i:s');
			$this->IS_ACTIVE	= $data_baru['ek_is_active'];
				
			return $this->db->update('ELEMEN_KOMPETENSI', $this, $kondisi);
		}
	}
?>
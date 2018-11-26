<?php
	class skema_uk extends CI_Model{
		//All table fields
		public $UUID_SKEMA_UK;
		public $UUID_SKEMA;
		public $UUID_UK;
		public $URUTAN;
		public $USR_CRT;
		public $DTM_CRT;
		public $USR_UPD;
		public $DTM_UPD;
		public $IS_ACTIVE;
		
		//Get one data from database
		public function ambil_satu_data($kondisi){
			return $this->db->get_where('SKEMA_UK', $kondisi)->row(1);
		}
		
		//Get data from database
		public function ambil_data($kondisi){
			return $this->db->get_where('SKEMA_UK', $kondisi);
		}
		
		/*public function ambil_data($condition)
			{
				$this->db->select('skemauk.UUID_SKEMA_UK, skemauk.UUID_SKEMA, skemauk.UUID_UK,
					skemauk.USR_CRT, skemauk.DTM_CRT, skemauk.USR_UPD, skemauk.DTM_UPD, skemauk.IS_ACTIVE,
					skema.NAMA_SKEMA, skema.NOMOR_SKEMA, uk.JUDUL_UK, uk.KODE_UK');
				$this->db->from("SKEMA_UK skemauk");
				$this->db->join("SKEMA AS skema", "skemauk.UUID_SKEMA = skema.UUID_SKEMA", "LEFT");
				$this->db->join("UNIT_KOMPETENSI AS uk", "skemauk.UUID_UK = uk.UUID_UK", "LEFT");
				$this->db->where($condition);
				return $this->db->get();
				
				/*
					SELECT SKEMA_UK.UUID_SKEMA_UK, SKEMA.NOMOR_SKEMA, SKEMA.NAMA_SKEMA, UK.KODE_UK, UK.JUDUL_UK, EK.NOMOR_EK, EK.NAMA_EK, KUK.NOMOR_KUK, KUK.PERNYATAAN, KUK.PERTANYAAN
FROM SKEMA_UK
LEFT JOIN SKEMA ON SKEMA_UK.UUID_SKEMA = SKEMA.UUID_SKEMA
LEFT JOIN UNIT_KOMPETENSI AS UK ON SKEMA_UK.UUID_UK = UK.UUID_UK
LEFT JOIN ELEMEN_KOMPETENSI AS EK ON UK.UUID_UK = EK.UUID_UK
LEFT JOIN KRITERIA_UNJUK_KERJA AS KUK ON EK.UUID_EK = KUK.UUID_EK
ORDER BY SKEMA.NOMOR_SKEMA, UK.KODE_UK, EK.NOMOR_EK, KUK.NOMOR_KUK
				
			}*/
		
		//Add one data
		public function tambah_satu_data($data)
			{
				$this->UUID_SKEMA_UK	= $data["suk_uuid"];
				$this->UUID_SKEMA		= $data["suk_uuid_skema"];
				$this->UUID_UK			= $data["suk_uuid_uk"];
				$this->URUTAN			= $data["suk_urutan"];
				$this->USR_CRT			= $this->session->userdata('lsp_bpjstk_user_name');
				$this->DTM_CRT			= date('Y-m-d H:i:s');
				$this->USR_UPD			= null;
				$this->DTM_UPD			= null;
				$this->IS_ACTIVE		= $data["suk_is_active"];
				
				return $this->db->insert('SKEMA_UK', $this);
			}
			
		//Update data
		public function update_satu_data($data_lama, $urutan, $kondisi)
			{
				$this->UUID_SKEMA_UK	= $data_lama->UUID_SKEMA_UK;
				$this->UUID_SKEMA		= $data_lama->UUID_SKEMA;
				$this->UUID_UK			= $data_lama->UUID_UK;
				$this->URUTAN			= $urutan;
				$this->USR_CRT			= $data_lama->USR_CRT;
				$this->DTM_CRT			= $data_lama->DTM_CRT;
				$this->USR_UPD			= $this->session->userdata('lsp_bpjstk_user_name');
				$this->DTM_UPD			= date('Y-m-d H:i:s');
				$this->IS_ACTIVE		= $data_lama->IS_ACTIVE;
					
				return $this->db->update('SKEMA_UK', $this, $kondisi);
			}
		
		//Delete data
		public function hapus_data($kondisi)
			{
				return $this->db->delete('SKEMA_UK', $kondisi);
			}
		
	}
?>
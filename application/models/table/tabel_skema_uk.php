<?php
	class tabel_skema_uk extends CI_Model{
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
		
		public function ambil_data_detail($kondisi){
			$this->db->select('SKE.UUID_SKEMA, SKE.NOMOR_SKEMA, SKE.NAMA_SKEMA,
				UK.UUID_UK, UK.KODE_UK, UK.JUDUL_UK');
			$this->db->from("SKEMA_UK AS SKE_UK");
			$this->db->join("SKEMA AS SKE", "SKE_UK.UUID_SKEMA = SKE.UUID_SKEMA", "LEFT");
			$this->db->join("UNIT_KOMPETENSI AS UK", "SKE_UK.UUID_UK = UK.UUID_UK", "LEFT");
			$this->db->where($kondisi);
			return $this->db->get();					
		}
		
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
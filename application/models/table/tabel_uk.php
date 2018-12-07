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
				
				return $this->db->insert('USR', $this);
			}
		
		//Update data
		public function update_entry($form_name, $data, $condition)
			{
				$this->UUID_UK		= (!$this->input->post($form_name[105]) ? $data->UUID_UK : $this->input->post($form_name[105]));
				$this->JUDUL_UK		= (!$this->input->post($form_name[103]) ? $data->JUDUL_UK : $this->input->post($form_name[103]));
				$this->KODE_UK		= (!$this->input->post($form_name[104]) ? $data->KODE_UK : $this->input->post($form_name[104]));
				$this->USR_CRT		= $data->USR_CRT;
				$this->DTM_CRT		= $data->DTM_CRT;
				$this->USR_UPD		= $this->session->userdata('lsp_bpjstk_user_name');
				$this->DTM_UPD		= date('Y-m-d H:i:s');
				$this->IS_ACTIVE	= (!$this->input->post($form_name[156]) ? $data->IS_ACTIVE : $this->input->post($form_name[156]));
					
				return $this->db->update('UNIT_KOMPETENSI', $this, $condition);
			}
			
		//Delete data
		public function hapus_data($kondisi)
			{
				return $this->db->delete('UK', $kondisi);
			}
		
	}
?>
<?php
	class M_fr_apl_02 extends CI_Model{
		public $UUID_APL02;
		public $UUID_USER;
		public $UUID_APL01;
		public $NO_ASESMEN;
		public $TUK;
		public $REKOM_1;
		public $REKOM_2;
		public $REKOM_3;
		public $CATATAN;
		public $USR_CRT;
		public $DTM_CRT;
		public $USR_UPD;
		public $DTM_UPD;
		public $IS_ACTIVE;
		
		public function get_entry($condition)
			{
				return $this->db->get_where('FR_APL_02', $condition);
			}
			
		public function get_detail_entry($condition)
			{
				$this->db->select('APL02.UUID_APL02, APL02.UUID_USER, APL02.UUID_APL01, APL02.NO_ASESMEN, APL02.TUK, APL02.REKOM_1, APL02.REKOM_2, APL02.REKOM_3, APL02.CATATAN, APL01.NAMA_LENGKAP, SKE.NOMOR_SKEMA, SKE.NAMA_SKEMA');
				$this->db->from("FR_APL_02 AS APL02");
				$this->db->join("FR_APL_01 AS APL01", "APL02.UUID_APL01 = APL01.UUID_APL01", "LEFT");
				$this->db->join("SKEMA AS SKE", "APL01.UUID_SKEMA = SKE.UUID_SKEMA", "LEFT");
				$this->db->where($condition);
				return $this->db->get();
			}
			
		public function insert_entry($form_name)
			{
				$this->UUID_APL02			= (!$this->input->post($form_name[146]) ? null : $this->input->post($form_name[146]));
				$this->UUID_USER			= $this->session->userdata('lsp_bpjstk_uuid_user');
				$this->UUID_APL01			= (!$this->input->post($form_name[134]) ? null : $this->input->post($form_name[134]));
				$this->NO_ASESMEN			= $this->input->post($form_name[150]);
				$this->TUK					= (!$this->input->post($form_name[148]) ? null : $this->input->post($form_name[148]));
				$this->REKOM_1				= (!$this->input->post($form_name[169]) ? null : $this->input->post($form_name[169]));
				$this->REKOM_2				= (!$this->input->post($form_name[170]) ? null : $this->input->post($form_name[170]));
				$this->REKOM_3				= (!$this->input->post($form_name[171]) ? null : $this->input->post($form_name[171]));
				$this->CATATAN				= (!$this->input->post($form_name[172]) ? null : $this->input->post($form_name[172]));
				$this->USR_CRT				= $this->session->userdata('lsp_bpjstk_user_name');
				$this->DTM_CRT				= date('Y-m-d H:i:s');
				$this->USR_UPD				= null;
				$this->DTM_UPD				= null;
				$this->IS_ACTIVE			= '1';
				
				return $this->db->insert('FR_APL_02', $this);
			}
			
		public function update_entry($form_name, $data, $condition)
			{
				$this->UUID_APL02			= $data->UUID_APL02;
				$this->UUID_USER			= $data->UUID_USER;
				$this->UUID_APL01			= (!$this->input->post($form_name[134]) ? $data->UUID_APL01 : $this->input->post($form_name[134]));
				$this->NO_ASESMEN			= $data->NO_ASESMEN;
				$this->TUK					= (!$this->input->post($form_name[148]) ? $data->TUK : $this->input->post($form_name[148]));
				$this->REKOM_1				= (!$this->input->post($form_name[169]) ? $data->REKOM_1 : $this->input->post($form_name[169]));
				$this->REKOM_2				= (!$this->input->post($form_name[170]) ? $data->REKOM_2 : $this->input->post($form_name[170]));
				$this->REKOM_3				= (!$this->input->post($form_name[171]) ? $data->REKOM_3 : $this->input->post($form_name[171]));
				$this->CATATAN				= (!$this->input->post($form_name[172]) ? $data->CATATAN : $this->input->post($form_name[172]));
				$this->USR_CRT				= $data->USR_CRT;
				$this->DTM_CRT				= $data->DTM_CRT;
				$this->USR_UPD				= $this->session->userdata('lsp_bpjstk_user_name');
				$this->DTM_UPD				= date('Y-m-d H:i:s');
				$this->IS_ACTIVE			= (!$this->input->post($form_name[174]) ? $data->IS_ACTIVE : $this->input->post($form_name[174]));;
					
				return $this->db->update('FR_APL_02', $this, $condition);
			}
			
		public function delete_entry($condition)
			{
				return $this->db->delete('FR_APL_02', $condition);
			}
		
	}
?>
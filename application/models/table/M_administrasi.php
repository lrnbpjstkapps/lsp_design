<?php
	class M_administrasi extends CI_Model{
		public $UUID_ADM;
		public $NO_ASESMEN;
		public $UUID_APL01;
		public $UUID_APL02;
		public $UUID_MMA;
		public $UUID_MAK02;
		public $UUID_MAK03;
		public $UUID_SA;
		public $UUID_ASESI;
		public $UUID_ASESOR;
		public $UUID_ADMIN_LSP;
		public $UUID_KOORDINATOR_TUK;
		public $UUID_MANAJER_SERTIFIKASI;
		public $UUID_SUPERVISOR;
		public $CATATAN;
		public $USR_CRT;
		public $DTM_CRT;
		public $USR_UPD;
		public $DTM_UPD;
		public $IS_ACTIVE;
		
		function uniqidReal($lenght) {
			if (function_exists("random_bytes")) {
				$bytes = random_bytes(ceil($lenght / 2));
			} elseif (function_exists("openssl_random_pseudo_bytes")) {
				$bytes = openssl_random_pseudo_bytes(ceil($lenght / 2));
			} else {
				throw new Exception("no cryptographically secure random function available");
			}
			return strtoupper(substr(bin2hex($bytes), 0, $lenght));
		}
		
		public function get_entry($condition)
			{
				return $this->db->get_where('ADMINISTRASI', $condition);
			}
			
		public function get_total_entry($uuid_sa)
			{
				return $this->db->query("SELECT CAST(RIGHT(NO_ASESMEN, 3) AS  INT) AS TOTAL 
					FROM ADMINISTRASI
					WHERE UUID_SA = '".$uuid_sa."'
					AND DTM_CRT LIKE '".date('Y-m-d')."%' 
					ORDER BY DTM_CRT DESC
					LIMIT 1");
			}
			
		public function insert_entry($form_name)
			{
				$this->UUID_ADM			= (!$this->input->post($form_name[149]) ? $this->uuid->v4() : $this->input->post($form_name[149]));
				$this->NO_ASESMEN		= (!$this->input->post($form_name[150]) ? null : $this->input->post($form_name[150]));
				$this->UUID_APL01		= (!$this->input->post($form_name[134]) ? null : $this->input->post($form_name[134]));
				$this->UUID_APL02		= (!$this->input->post($form_name[146]) ? null : $this->input->post($form_name[146]));
				$this->UUID_MMA			= (!$this->input->post($form_name[145]) ? null : $this->input->post($form_name[145]));
				$this->UUID_MAK02		= (!$this->input->post($form_name[152]) ? null : $this->input->post($form_name[152]));
				$this->UUID_MAK03		= (!$this->input->post($form_name[237]) ? null : $this->input->post($form_name[237]));
				$this->UUID_SA			= (!$this->input->post($form_name[251]) ? null : $this->input->post($form_name[251]));
				$this->UUID_ASESI		= (!$this->input->post($form_name[257]) ? null : $this->input->post($form_name[257]));
				$this->UUID_ASESOR		= (!$this->input->post($form_name[258]) ? null : $this->input->post($form_name[258]));
				$this->UUID_ADMIN_LSP	= (!$this->input->post($form_name[259]) ? null : $this->input->post($form_name[259]));
				$this->UUID_KOORDINATOR_TUK	= (!$this->input->post($form_name[260]) ? null : $this->input->post($form_name[260]));
				$this->UUID_MANAJER_SERTIFIKASI	= (!$this->input->post($form_name[261]) ? null : $this->input->post($form_name[261]));
				$this->UUID_SUPERVISOR	= (!$this->input->post($form_name[262]) ? null : $this->input->post($form_name[262]));
				$this->CATATAN			= (!$this->input->post($form_name[264]) ? null : $this->input->post($form_name[264]));
				$this->USR_CRT			= 'SUPER ADMIN';
				$this->DTM_CRT			= date('Y-m-d H:i:s');
				$this->USR_UPD			= null;
				$this->DTM_UPD			= null;
				$this->IS_ACTIVE		= '1';
				
				return $this->db->insert('ADMINISTRASI', $this);
			}
			
		public function update_entry($form_name, $data, $condition)
			{
				$this->UUID_ADM			= (!$this->input->post($form_name[149]) ? $data->UUID_ADM : $this->input->post($form_name[149]));
				$this->NO_ASESMEN		= (!$this->input->post($form_name[150]) ? $data->NO_ASESMEN : $this->input->post($form_name[150]));
				$this->UUID_APL01		= (!$this->input->post($form_name[134]) ? $data->UUID_APL01 : $this->input->post($form_name[134]));
				$this->UUID_APL02		= (!$this->input->post($form_name[146]) ? $data->UUID_APL02 : $this->input->post($form_name[146]));
				$this->UUID_MMA			= (!$this->input->post($form_name[145]) ? $data->UUID_MMA : $this->input->post($form_name[145]));
				$this->UUID_MAK02		= (!$this->input->post($form_name[152]) ? $data->UUID_MAK02 : $this->input->post($form_name[152]));
				$this->UUID_MAK03		= (!$this->input->post($form_name[237]) ? $data->UUID_MAK03 : $this->input->post($form_name[237]));
				$this->UUID_SA			= (!$this->input->post($form_name[251]) ? $data->UUID_SA : $this->input->post($form_name[251]));
				$this->UUID_ASESI		= (!$this->input->post($form_name[257]) ? $data->UUID_ASESI : $this->input->post($form_name[257]));
				$this->UUID_ASESOR		= (!$this->input->post($form_name[258]) ? $data->UUID_ASESOR : $this->input->post($form_name[258]));
				$this->UUID_ADMIN_LSP	= (!$this->input->post($form_name[259]) ? $data->UUID_ADMIN_LSP : $this->input->post($form_name[259]));
				$this->UUID_KOORDINATOR_TUK	= (!$this->input->post($form_name[260]) ? $data->UUID_KOORDINATOR_TUK : $this->input->post($form_name[260]));
				$this->UUID_MANAJER_SERTIFIKASI	= (!$this->input->post($form_name[261]) ? $data->UUID_MANAJER_SERTIFIKASI : $this->input->post($form_name[261]));
				$this->UUID_SUPERVISOR	= (!$this->input->post($form_name[262]) ? $data->UUID_SUPERVISOR : $this->input->post($form_name[262]));
				$this->CATATAN			= (!$this->input->post($form_name[264]) ? $data->CATATAN : $this->input->post($form_name[264]));
				$this->USR_CRT			= $data->USR_CRT;
				$this->DTM_CRT			= $data->DTM_CRT;
				$this->USR_UPD			= 'SUPER ADMIN';
				$this->DTM_UPD			= date('Y-m-d H:i:s');
				$this->IS_ACTIVE		= (!$this->input->post($form_name[263]) ? $data->IS_ACTIVE : $this->input->post($form_name[263]));
					
				return $this->db->update('ADMINISTRASI', $this, $condition);
			}
			
		public function delete_entry($condition)
			{
				return $this->db->delete('ADMINISTRASI', $condition);
			}
		
	}
?>
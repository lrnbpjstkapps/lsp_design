<?php
	class M_fr_apl_01 extends CI_Model{
		public $UUID_APL01;
		public $UUID_USER;
		public $NO_ASESMEN;
		public $NAMA_LENGKAP;
		public $TEMPAT_LAHIR;
		public $TGL_LAHIR;
		public $JENIS_KELAMIN;
		public $KEBANGSAAN;
		public $ALAMAT_RUMAH;
		public $KODE_POS_RUMAH;
		public $NO_TLP_RUMAH;
		public $NO_TLP_HP;
		public $NO_TLP_KANTOR;
		public $EMAIL;
		public $PENDIDIKAN_TERAKHIR;
		public $NAMA_PERUSAHAAN;
		public $JABATAN;
		public $ALAMAT_KANTOR;
		public $KODE_POS_PERUSAHAAN;
		public $EMAIL_KANTOR;
		public $FAX_KANTOR;
		public $TUJUAN_ASESMEN;
		public $TUJUAN_ASESMEN_LAINNYA_KETERANGAN;
		public $UUID_SKEMA;
		public $IS_DIREKOMENDASIKAN;
		public $CATATAN;
		public $USR_CRT;
		public $DTM_CRT;
		public $USR_UPD;
		public $DTM_UPD;
		public $IS_ACTIVE;
		
		public function get_entry($condition)
			{
				return $this->db->get_where('FR_APL_01', $condition);
			}
			
		public function get_detail_entry($condition)
			{
				$this->db->select('apl01.UUID_APL01, apl01.UUID_USER, apl01.NO_ASESMEN, apl01.NAMA_LENGKAP, 
					apl01.TEMPAT_LAHIR, apl01.TGL_LAHIR, apl01.JENIS_KELAMIN, apl01.KEBANGSAAN, apl01.ALAMAT_RUMAH,
					apl01.KODE_POS_RUMAH, apl01.NO_TLP_RUMAH, apl01.NO_TLP_HP, apl01.NO_TLP_KANTOR, apl01.EMAIL, 
					apl01.PENDIDIKAN_TERAKHIR, apl01.NAMA_PERUSAHAAN, apl01.JABATAN, apl01.ALAMAT_KANTOR, 
					apl01.KODE_POS_PERUSAHAAN, apl01.EMAIL_KANTOR, apl01.FAX_KANTOR, apl01.TUJUAN_ASESMEN, apl01.TUJUAN_ASESMEN_LAINNYA_KETERANGAN,
					apl01.UUID_SKEMA, apl01.IS_DIREKOMENDASIKAN, apl01.CATATAN,
					apl01.USR_CRT, apl01.DTM_CRT, apl01.USR_UPD, apl01.DTM_UPD, apl01.IS_ACTIVE,
					skema.NAMA_SKEMA, skema.NOMOR_SKEMA');
				$this->db->from("FR_APL_01 AS apl01");
				$this->db->join("SKEMA AS skema", "apl01.UUID_SKEMA = skema.UUID_SKEMA", "LEFT");
				$this->db->where($condition);			
				return $this->db->get();
			}
			
		public function insert_entry($form_name)
			{
				$this->UUID_APL01			= (!$this->input->post($form_name[134]) ? $this->uuid->v4() : $this->input->post($form_name[134]));
				$this->UUID_USER			= $this->session->userdata('lsp_bpjstk_uuid_user');
				$this->NO_ASESMEN			= $this->input->post($form_name[150]);
				$this->NAMA_LENGKAP			= (!$this->input->post($form_name[115]) ? null : $this->input->post($form_name[115]));
				$this->TEMPAT_LAHIR			= (!$this->input->post($form_name[116]) ? null : $this->input->post($form_name[116]));
				$this->TGL_LAHIR			= (!$this->input->post($form_name[117]) ? null : $this->input->post($form_name[117]));
				$this->JENIS_KELAMIN		= (!$this->input->post($form_name[118]) ? null : $this->input->post($form_name[118]));
				$this->KEBANGSAAN			= (!$this->input->post($form_name[119]) ? null : $this->input->post($form_name[119]));
				$this->ALAMAT_RUMAH			= (!$this->input->post($form_name[120]) ? null : $this->input->post($form_name[120]));
				$this->KODE_POS_RUMAH		= (!$this->input->post($form_name[121]) ? null : $this->input->post($form_name[121]));
				$this->NO_TLP_RUMAH			= (!$this->input->post($form_name[122]) ? null : $this->input->post($form_name[122]));
				$this->NO_TLP_HP			= (!$this->input->post($form_name[123]) ? null : $this->input->post($form_name[123]));
				$this->NO_TLP_KANTOR		= (!$this->input->post($form_name[130]) ? null : $this->input->post($form_name[130]));
				$this->EMAIL				= (!$this->input->post($form_name[124]) ? null : $this->input->post($form_name[124]));
				$this->PENDIDIKAN_TERAKHIR	= (!$this->input->post($form_name[125]) ? null : $this->input->post($form_name[125]));
				$this->NAMA_PERUSAHAAN		= (!$this->input->post($form_name[126]) ? null : $this->input->post($form_name[126]));
				$this->JABATAN				= (!$this->input->post($form_name[127]) ? null : $this->input->post($form_name[127]));
				$this->ALAMAT_KANTOR		= (!$this->input->post($form_name[128]) ? null : $this->input->post($form_name[128]));
				$this->KODE_POS_PERUSAHAAN	= (!$this->input->post($form_name[129]) ? null : $this->input->post($form_name[129]));
				$this->EMAIL_KANTOR			= (!$this->input->post($form_name[132]) ? null : $this->input->post($form_name[132]));
				$this->FAX_KANTOR			= (!$this->input->post($form_name[131]) ? null : $this->input->post($form_name[131]));
				$this->TUJUAN_ASESMEN		= (!$this->input->post($form_name[133]) ? null : $this->input->post($form_name[133]));
				$this->TUJUAN_ASESMEN_LAINNYA_KETERANGAN = (!$this->input->post($form_name[141]) ? null : $this->input->post($form_name[141]));
				$this->UUID_SKEMA			= (!$this->input->post($form_name[102]) ? null : $this->input->post($form_name[102]));
				$this->IS_DIREKOMENDASIKAN	= (!$this->input->post($form_name[162]) ? null : $this->input->post($form_name[162]));
				$this->CATATAN				= (!$this->input->post($form_name[160]) ? null : $this->input->post($form_name[160]));
				$this->USR_CRT				= $this->session->userdata('lsp_bpjstk_user_name');
				$this->DTM_CRT				= date('Y-m-d H:i:s');
				$this->USR_UPD				= null;
				$this->DTM_UPD				= null;
				$this->IS_ACTIVE			= '1';
				
				return $this->db->insert('FR_APL_01', $this);
			}
			
		public function update_entry($form_name, $data, $condition)
			{
				$this->UUID_APL01			= $data->UUID_APL01;
				$this->UUID_USER			= $data->UUID_USER;
				$this->NO_ASESMEN			= $data->NO_ASESMEN;
				$this->NAMA_LENGKAP			= (!$this->input->post($form_name[115]) ? $data->NAMA_LENGKAP : $this->input->post($form_name[115]));
				$this->TEMPAT_LAHIR			= (!$this->input->post($form_name[116]) ? $data->TEMPAT_LAHIR : $this->input->post($form_name[116]));
				$this->TGL_LAHIR			= (!$this->input->post($form_name[117]) ? $data->TGL_LAHIR : $this->input->post($form_name[117]));
				$this->JENIS_KELAMIN		= (!$this->input->post($form_name[118]) ? $data->JENIS_KELAMIN : $this->input->post($form_name[118]));
				$this->KEBANGSAAN			= (!$this->input->post($form_name[119]) ? $data->KEBANGSAAN : $this->input->post($form_name[119]));
				$this->ALAMAT_RUMAH			= (!$this->input->post($form_name[120]) ? $data->ALAMAT_RUMAH : $this->input->post($form_name[120]));
				$this->KODE_POS_RUMAH		= (!$this->input->post($form_name[121]) ? $data->KODE_POS_RUMAH : $this->input->post($form_name[121]));
				$this->NO_TLP_RUMAH			= (!$this->input->post($form_name[122]) ? $data->NO_TLP_RUMAH : $this->input->post($form_name[122]));
				$this->NO_TLP_HP			= (!$this->input->post($form_name[123]) ? $data->NO_TLP_HP : $this->input->post($form_name[123]));
				$this->NO_TLP_KANTOR		= (!$this->input->post($form_name[130]) ? $data->NO_TLP_KANTOR : $this->input->post($form_name[130]));
				$this->EMAIL				= (!$this->input->post($form_name[124]) ? $data->EMAIL : $this->input->post($form_name[124]));
				$this->PENDIDIKAN_TERAKHIR	= (!$this->input->post($form_name[125]) ? $data->PENDIDIKAN_TERAKHIR : $this->input->post($form_name[125]));
				$this->NAMA_PERUSAHAAN		= (!$this->input->post($form_name[126]) ? $data->NAMA_PERUSAHAAN : $this->input->post($form_name[126]));
				$this->JABATAN				= (!$this->input->post($form_name[127]) ? $data->JABATAN : $this->input->post($form_name[127]));
				$this->ALAMAT_KANTOR		= (!$this->input->post($form_name[128]) ? $data->ALAMAT_KANTOR : $this->input->post($form_name[128]));
				$this->KODE_POS_PERUSAHAAN	= (!$this->input->post($form_name[129]) ? $data->KODE_POS_PERUSAHAAN : $this->input->post($form_name[129]));
				$this->EMAIL_KANTOR			= (!$this->input->post($form_name[132]) ? $data->EMAIL_KANTOR : $this->input->post($form_name[132]));
				$this->FAX_KANTOR			= (!$this->input->post($form_name[131]) ? $data->FAX_KANTOR : $this->input->post($form_name[131]));
				$this->TUJUAN_ASESMEN		= (!$this->input->post($form_name[133]) ? $data->TUJUAN_ASESMEN : $this->input->post($form_name[133]));
				$this->TUJUAN_ASESMEN_LAINNYA_KETERANGAN = (!$this->input->post($form_name[141]) ? $data->TUJUAN_ASESMEN_LAINNYA_KETERANGAN : $this->input->post($form_name[141]));
				$this->UUID_SKEMA			= (!$this->input->post($form_name[102]) ? $data->UUID_SKEMA : $this->input->post($form_name[102]));
				$this->IS_DIREKOMENDASIKAN	= (!$this->input->post($form_name[162]) ? $data->IS_DIREKOMENDASIKAN : $this->input->post($form_name[162]));
				$this->CATATAN				= (!$this->input->post($form_name[160]) ? $data->CATATAN : $this->input->post($form_name[160]));
				$this->USR_CRT				= $data->USR_CRT;
				$this->DTM_CRT				= $data->DTM_CRT;
				$this->USR_UPD				= $this->session->userdata('lsp_bpjstk_user_name');
				$this->DTM_UPD				= date('Y-m-d H:i:s');
				$this->IS_ACTIVE			= (!$this->input->post($form_name[159]) ? $data->IS_ACTIVE : $this->input->post($form_name[159]));
					
				return $this->db->update('FR_APL_01', $this, $condition);
			}
			
		public function delete_entry($condition)
			{
				return $this->db->delete('FR_APL_01', $condition);
			}
		
	}
?>
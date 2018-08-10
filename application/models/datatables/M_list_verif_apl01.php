<?php
	class m_list_verif_apl01 extends CI_Model{
		var $table			= "ADMINISTRASI AS adm";
		var $column_order	= array(
			null, null, null, null, null, null, null, null, null); 
		var $column_search	= array(
			'adm.NO_ASESMEN', 'apl01.NAMA_LENGKAP', 'apl01.JABATAN', 'skema.NAMA_SKEMA', 
			'apl01.TUJUAN_ASESMEN', 'adm.DTM_CRT', 'sa.SA_CODE', 'sa.KETERANGAN');
		
		// Method yang berisi syntax - syntax untuk mengambil sejumlah data.
		public function _get_datatables_query(){
			$this->db->select('adm.UUID_ADM, adm.NO_ASESMEN, apl01.NAMA_LENGKAP, apl01.JABATAN, skema.NAMA_SKEMA, apl01.TUJUAN_ASESMEN, adm.DTM_CRT, CONCAT(sa.SA_CODE, " - ",sa.KETERANGAN) AS STATUS_PENGAJUAN, sa.SA_CODE, sa.KETERANGAN');
			$this->db->from($this->table);
			$this->db->join("FR_APL_01 AS apl01", "adm.UUID_APL01 = apl01.UUID_APL01", "LEFT");
			$this->db->join("SKEMA AS skema", "apl01.UUID_SKEMA = skema.UUID_SKEMA", "LEFT");
			$this->db->join("STATUS_ADMINISTRASI AS sa", "adm.UUID_SA = sa.UUID_SA", "LEFT");
			$this->db->where('adm.IS_ACTIVE', '1');
			
			$i = 0;
			foreach ($this->column_search as $item){
				if($_POST['search']['value']){					
					if($i===0)
						{
							$this->db->group_start(); 
							$this->db->like($item, $_POST['search']['value']);
						}
					else
						{
							$this->db->or_like($item, $_POST['search']['value']);
						}
					if(count($this->column_search) - 1 == $i) 
						$this->db->group_end(); 
				}
				$i++;
			}		
			
			if(isset($_POST['order'])){
				$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
			} 
			else{
				$this->db->order_by('adm.DTM_CRT', 'ASC');
				$this->db->order_by('apl01.NAMA_LENGKAP', 'ASC');
				$this->db->order_by('skema.NAMA_SKEMA', 'ASC');
			}
		}

		// Mengambil sebagian data berdasarkan filternya.
		public function get_datatables(){
			$this->_get_datatables_query();
			
			if($_POST['length'] != -1)
				$this->db->limit($_POST['length'], $_POST['start']);
			
			return $this->db->get()->result();
		}

		// Menghitung jumlah data yang ditampilkan.
		public function count_filtered(){
			$this->_get_datatables_query();
			
			return $this->db->get()->num_rows();
		}

		// Menghitung jumlah seluruh data tanpa filter.
		public function count_all(){
			$this->_get_datatables_query();
			
			return $this->db->count_all_results();
		}
		
		// Mengirim data sebagai JSON.
		public function get_json($result, $recordsTotal, $recordsFiltered)
			{			
				$data 		= array();
				$no			= $_POST['start'];
				
				foreach ($result as $values) 
					{
						$no++;
						$row	= array();
						$row[]	= $no;
						$row[] 	= $values->NO_ASESMEN;
						$row[] 	= $values->NAMA_LENGKAP;
						$row[] 	= $values->JABATAN;
						$row[] 	= $values->NAMA_SKEMA;
						$row[] 	= $values->TUJUAN_ASESMEN;
						$row[] 	= date('d-M-y H.i', strtotime($values->DTM_CRT));
						$row[] 	= $values->STATUS_PENGAJUAN;
						$row[] 	= '<a href="javascript:void(0)" onclick="pagingVerif('."'".$values->UUID_ADM."'".')"><i class="fa fa-check-square-o"></i> Verifikasi</a>';
						$data[]	= $row;
					}
		
				$output 	= array
					(
						"draw" => $_POST['draw'],
						"recordsTotal" => $recordsTotal, 
						"recordsFiltered" => $recordsFiltered,
						"data" => $data
					);
				return $output;
			}			
	}
?>
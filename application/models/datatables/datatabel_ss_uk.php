<?php
	class datatabel_ss_uk extends CI_Model{
		var $table			= "SKEMA_UK AS SUK";
		var $order			= array('SKE.NOMOR_SKEMA' => 'ASC'); 
		var $column_order	= array(null, 'SKE.NOMOR_SKEMA', 'SKE.NAMA_SKEMA', 'JUMLAH', 'SKE.IS_ACTIVE', null); 
		var $column_search	= array('SKE.NOMOR_SKEMA', 'SKE.NAMA_SKEMA', 'UK.KODE_UK', 'SKE.IS_ACTIVE');
		
		// Fungsi yang berisi syntax - syntax untuk mengambil sejumlah data.
		public function _get_datatables_query(){
			$this->db->select('SUK.UUID_SKEMA, SKE.NOMOR_SKEMA, SKE.NAMA_SKEMA, COUNT(*) AS JUMLAH, SKE.IS_ACTIVE, UK.KODE_UK');
			$this->db->from($this->table);
			$this->db->join("SKEMA AS SKE", "SUK.UUID_SKEMA = SKE.UUID_SKEMA", "LEFT");
			$this->db->join("UNIT_KOMPETENSI AS UK", "SUK.UUID_UK = UK.UUID_UK", "LEFT");
			$this->db->group_by('SUK.UUID_SKEMA'); 
			
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
			else if(isset($this->order)){
				$order = $this->order;
				$this->db->order_by(key($order), $order[key($order)]);
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
			$this->db->select('SUK.UUID_SKEMA, SKE.NOMOR_SKEMA, SKE.NAMA_SKEMA, COUNT(*) AS JUMLAH, SKE.IS_ACTIVE');
			$this->db->from($this->table);
			$this->db->join("SKEMA AS SKE", "SUK.UUID_SKEMA = SKE.UUID_SKEMA", "LEFT");
			$this->db->join("UNIT_KOMPETENSI AS UK", "SUK.UUID_UK = UK.UUID_UK", "LEFT");
			$this->db->group_by('SUK.UUID_SKEMA');
			
			return $this->db->count_all_results();
		}
		
		// Mengirim data sebagai JSON.
		public function get_json($result, $recordsTotal, $recordsFiltered){			
			$data 		= array();
			$no			= $_POST['start'];
			
			foreach ($result as $values) 
				{
					$no++;
					$row	= array();
					$row[]	= $no;						
					$row[] 	= $values->NOMOR_SKEMA;
					$row[] 	= $values->NAMA_SKEMA;
					if($values->JUMLAH == '1'){
						$row[] 	= $values->KODE_UK;
					}else{
						$row[] 	= '<a href="javascript:void(0)" onclick="modal_tabel_uk('."'".$values->UUID_SKEMA."'".','."'".$values->NOMOR_SKEMA."'".','."'".$values->NAMA_SKEMA."'".')">('.$values->JUMLAH.' unit kompetensi)';
					}
					
					if($values->IS_ACTIVE == '1'){
						$row[] 	= '<font color="green">Aktif</font>';
					}else{
						$row[] 	= '<font color="red">Nonaktif</font>';
					}
					$row[] 	= '<a href="javascript:void(0)" onclick="modal_form_urutan_uk('."'".$values->UUID_SKEMA."'".','."'".$values->NOMOR_SKEMA."'".','."'".$values->NAMA_SKEMA."'".')"><i class="fa fa-edit"></i>';
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
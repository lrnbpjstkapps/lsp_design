<?php
	class datatabel_kuk extends CI_Model{
		var $table			= "KRITERIA_UNJUK_KERJA AS KUK";
		var $order			= array('KUK.NOMOR_KUK' => 'ASC', 'KUK.PERNYATAAN' => 'ASC'); 
		var $column_order	= array(
			null, 'KUK.NOMOR_KUK', 'KUK.PERNYATAAN', 'KUK.PERTANYAAN', 'KUK.IS_ACTIVE', null); 
		var $column_search	= array('KUK.NOMOR_KUK', 'KUK.PERNYATAAN', 'KUK.PERTANYAAN');
		
		// Fungsi yang berisi syntax - syntax untuk mengambil sejumlah data.
		public function _get_datatables_query(){
			$this->db->select('KUK.UUID_KUK, KUK.UUID_EK, KUK.NOMOR_KUK, KUK.PERNYATAAN, KUK.PERTANYAAN, KUK.IS_ACTIVE');
			$this->db->from($this->table);
			$this->db->where('KUK.UUID_EK', $this->input->post('ek_uuid'));
			
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
			$this->db->select('KUK.UUID_KUK');
			$this->db->from($this->table);
			$this->db->where('KUK.UUID_EK', $this->input->post('ek_uuid'));
			
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
					$row[] 	= $values->NOMOR_KUK;
					$row[] 	= $values->PERNYATAAN;
					$row[] 	= $values->PERTANYAAN;
					if($values->IS_ACTIVE == '1'){
						$row[] 	= '<font color="green">Aktif</font>';
					}else{
						$row[] 	= '<font color="red">Nonaktif</font>';
					}
					$row[] 	= '<a href="javascript:void(0)" onclick="modal_update('."'".$values->UUID_KUK."'".')"><i class="fa fa-edit"></i></a>';
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
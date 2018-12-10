<?php
	class datatabel_ek extends CI_Model{
		var $table			= "ELEMEN_KOMPETENSI AS EK";
		var $order			= array('EK.NOMOR_EK' => 'ASC', 'EK.NAMA_EK' => 'ASC'); 
		var $column_order	= array(
			null, 'EK.NOMOR_EK', 'EK.NAMA_EK', null, 'EK.IS_ACTIVE', null); 
		var $column_search	= array('EK.NOMOR_EK', 'EK.NAMA_EK');
		
		// Fungsi yang berisi syntax - syntax untuk mengambil sejumlah data.
		public function _get_datatables_query(){
			$this->db->select('EK.UUID_EK, EK.UUID_UK, EK.NOMOR_EK, EK.NAMA_EK, EK.IS_ACTIVE');
			$this->db->from($this->table);
			$this->db->where('EK.UUID_UK', $this->input->post('uk_uuid'));
			
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
			$this->db->select('EK.UUID_EK');
			$this->db->from($this->table);
			$this->db->where('EK.UUID_UK', $this->input->post('uk_uuid'));
			
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
					$row[] 	= $values->NOMOR_EK;
					$row[] 	= $values->NAMA_EK;
					if($values->IS_ACTIVE == '1'){
						$row[] 	= '<font color="green">Aktif</font>';
					}else{
						$row[] 	= '<font color="red">Nonaktif</font>';
					}
					$row[] 	= '<a href="javascript:void(0)" onclick="modal_update('."'".$values->UUID_EK."'".')"><i class="fa fa-edit"></i></a>';
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
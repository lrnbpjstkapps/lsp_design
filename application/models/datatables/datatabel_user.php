<?php
	class datatabel_user extends CI_Model{
		var $table			= "USR AS USR";
		var $order			= array('USR.USER_NAME' => 'ASC', 'ROLE.ROLE_NAME' => 'ASC'); 
		var $column_order	= array(
			null, 'USR.NO_KTP', 'USR.USER_NAME', 'USR.LOGIN_ID', 'USR.PHONE', 'USR.EMAIL', null, 'USR.IS_ACTIVE', null); 
		var $column_search	= array(
			'USR.NO_KTP', 'ROLE.ROLE_NAME', 'USR.USER_NAME', 'USR.LOGIN_ID', 'USR.PHONE', 'USR.EMAIL', 'USR.IS_ACTIVE');
		
		// Fungsi yang berisi syntax - syntax untuk mengambil sejumlah data.
		public function _get_datatables_query(){
			$this->db->select('USR.UUID_USER, ROLE.ROLE_NAME, USR.NO_KTP, USR.LOGIN_ID, USR.USER_NAME, USR.EMAIL,
				USR.PHONE, USR.IS_ACTIVE, COUNT(*) AS JUMLAH');
			$this->db->from($this->table);
			$this->db->join("USER_ROLE AS UR", "USR.UUID_USER = UR.UUID_USER", "LEFT");
			$this->db->join("ROLE AS ROLE", "UR.UUID_ROLE = ROLE.UUID_ROLE", "LEFT");
			$this->db->group_by('USR.UUID_USER'); 
			
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
			$this->db->select('USR.UUID_USER');
			$this->db->from($this->table);
			
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
					$row[] 	= $values->NO_KTP;
					$row[] 	= $values->USER_NAME;
					$row[] 	= $values->LOGIN_ID;
					$row[] 	= $values->PHONE;
					$row[] 	= $values->EMAIL;
					if($values->JUMLAH == '1'){
						$row[] 	= $values->ROLE_NAME;
					}else{
						$row[] 	= '<a href="javascript:void(0)" onclick="modal_role('."'".$values->UUID_USER."'".','."'".$values->USER_NAME."'".','."'".$values->EMAIL."'".')">('.$values->JUMLAH.' jenis akun)';
					}
					
					if($values->IS_ACTIVE == '1'){
						$row[] 	= '<font color="green">Aktif</font>';
					}else{
						$row[] 	= '<font color="red">Nonaktif</font>';
					}
					$row[] 	= '<a href="javascript:void(0)" onclick="modal_update('."'".$values->UUID_USER."'".')"><i class="fa fa-edit"></i></a>';
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
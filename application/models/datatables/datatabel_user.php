<?php
	class datatabel_user extends CI_Model{
		var $table			= "USR AS usr";
		var $order			= array('usr.DTM_CRT' => 'DESC'); 
		var $column_order	= array(
			null, 'usr.USER_NAME', 'usr.LOGIN_ID', 'usr.PHONE', 'usr.EMAIL', 'usr.IS_ONLINE', null, null); 
		var $column_search	= array(
			'usr.USER_NAME', 'usr.LOGIN_ID', 'usr.PHONE', 'usr.EMAIL', 'usr.IS_ONLINE');
		
		// Fungsi yang berisi syntax - syntax untuk mengambil sejumlah data.
		public function _get_datatables_query(){
			$this->db->select('usr.UUID_USER, usr.LOGIN_ID, usr.USER_NAME, usr.EMAIL,
				usr.PWD, usr.PHONE, usr.IS_ONLINE, usr.DTM_CRT, usr.IS_ACTIVE');
			$this->db->from($this->table);
			$this->db->where('usr.IS_ACTIVE', '1');
			
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
			$this->db->select('usr.UUID_USER, usr.LOGIN_ID, usr.USER_NAME, usr.EMAIL
				usr.PWD, usr.PHONE, usr.IS_ONLINE, usr.DTM_CRT, usr.IS_ACTIVE');
			$this->db->from($this->table);
			$this->db->where('usr.IS_ACTIVE', '1');
			
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
						$row[] 	= $values->USER_NAME;
						$row[] 	= $values->LOGIN_ID;
						$row[] 	= $values->PHONE;
						$row[] 	= $values->EMAIL;
						$row[] 	= $values->IS_ONLINE;
						$row[] 	= '<a href="javascript:void(0)" onclick="editDt('."'".$values->UUID_USER."'".')"><i class="fa fa-edit"></i></a>';
						$row[] 	= '<a href="javascript:void(0)" onclick="deleteDt('."'".$values->UUID_USER."'".')"><i class="fa fa-trash"></i></a>';
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
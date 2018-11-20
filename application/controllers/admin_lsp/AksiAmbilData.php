<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	//Get Data from Database
	class AksiAmbilData extends CI_Controller {
		
		//Get one data from USER table
		public function satuData_user($uuid){
			//Condition 
			$kondisi		= array('UUID_USER' => $uuid);
			
			//Get data from USER table
			$data_user		= $this->tabel_user->ambil_data($kondisi);
			
			//Initialitation of array data
			$data			= array();
			$data["data_user"] = $data_user->row();
			
			//Get data from USER ROLE table
			$data_user_role	= $this->tabel_user_role->ambil_data($kondisi);
			
			//Set the array of UUID_ROLE 
			$i				= 0;
			foreach($data_user_role->result() as $row){
				$role_uuid[$i++] = $row->UUID_ROLE;
			}
			
			$data["role_uuid"] = $role_uuid;
			
			//Compile arrays
			$data_out		= array_values($data);
			
			echo json_encode($data_out);
		}
		
		// Datatables for USER table
		public function datatabel_user(){				
				$result				= $this->datatabel_user->get_datatables();				
				$recordsFiltered	= $this->datatabel_user->count_filtered();
				$recordsTotal		= $this->datatabel_user->count_all();

				$data				= $this->datatabel_user->get_json($result, $recordsTotal, $recordsFiltered);
				
				echo json_encode($data);
			}
			
		//Get list of user role		
		public function multipleSelect_role(){
			//Condition 
			$kondisi	= array('IS_ACTIVE' => '1');
			
			//Get data from database
			$data 		= $this->tabel_role->ambil_data($kondisi);
			
			//Set multipleSelect role
			foreach($data->result() as $row){
				echo "<option value='".$row->UUID_ROLE."'> ".$row->ROLE_NAME."</option>";
			}
		}
	}
?>
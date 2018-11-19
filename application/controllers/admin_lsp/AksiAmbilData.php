<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	//Get Data from Database
	class AksiAmbilData extends CI_Controller {
		
		//Get one data from USER table
		public function satuData_user($uuid){
			//Condition 
			$kondisi	= array('UUID_USER' => $uuid);
			
			//Get data from database
			$data		= $this->tabel_user->ambil_data($kondisi);
			
			echo json_encode($data->row());
		}
		
		// Datatables for USER table
		public function datatabel_user()
			{				
				$result				= $this->datatabel_user->get_datatables();				
				$recordsFiltered	= $this->datatabel_user->count_filtered();
				$recordsTotal		= $this->datatabel_user->count_all();

				$data				= $this->datatabel_user->get_json($result, $recordsTotal, $recordsFiltered);
				
				echo json_encode($data);
			}
	}
?>
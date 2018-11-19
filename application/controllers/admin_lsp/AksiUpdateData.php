<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	//Update Data from Database
	class AksiUpdateData extends CI_Controller {
		
		//Update one data in USER table & USER_ROLE table
		public function satuData_user(){			
			//Get previous data from USER table
			$kondisi	= array('UUID_USER' => $this->input->post('user_uuid'));
			$data_lama_user	= $this->tabel_user->ambil_satu_data($kondisi);
			
			//Get previous data from USER_ROLE table
			$kondisi	= array('UUID_USER_ROLE' => $this->input->post('user_role_uuid'));
			$data_lama_user_role = $this->tabel_user_role->ambil_satu_data($kondisi);
			s
			//Get new data
			$data_baru	= $this->form_pengelola_user->baca_inputan();
			
			//Update USER table
			$kondisi 	= array('UUID_USER' => $this->input->post('user_uuid'));
			$result_user =  $this->tabel_user->update_satu_data($data_lama, $data_baru, $kondisi);
			
			if($result_user == "1"){
				echo $this->tabel_user_role->update_satu_data($data_lama, $data_baru, $kondisi);
			}
		}
	}
?>
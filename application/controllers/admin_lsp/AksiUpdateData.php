<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	//Update Data from Database
	class AksiUpdateData extends CI_Controller {
		
		//Update one data in USER table
		public function updateSatuData_user(){			
			//Get previous data
			$kondisi	= array('UUID_USER' => $this->input->post('user_uuid'));
			$data_lama	= $this->tabel_user->ambil_data($kondisi);
			
			//Get new data
			$data_baru	= $this->form_pengelola_user->baca_inputan();
			
			//Condition
			$kondisi 	= array('UUID_USER' => $this->input->post('user_uuid'));
			
			//Update database
			echo $this->tabel_user->update_satu_data($data_lama, $data_baru, $kondisi);
		}
	}
?>
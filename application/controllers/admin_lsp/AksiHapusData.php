<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	//Delete Data from Database
	class AksiHapusData extends CI_Controller {
		
		//Delete data from USER table 
		public function hapusData_user(){
			//Condition
			$kondisi = array('UUID_USER' => $this->input->post('user_uuid'));
				
			//Return result
			echo $this->tabel_user->hapus_data($kondisi);
		}
	}
?>
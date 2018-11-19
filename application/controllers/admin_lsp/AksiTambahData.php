<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	//Add Data into Database
	class AksiTambahData extends CI_Controller {
		
		//Add one data into USER table & USER_ROLE table	 
		public function satuData_user(){
			//Read data input
			$data = $this->form_pengelola_user->baca_inputan();
			
			//Insert into database
			$result_tabel_user = $this->tabel_user->tambah_satu_data($data);
			if($result_tabel_user == '1'){
				echo $this->tabel_user_role->tambah_satu_data($data);
			}else{
				echo $result_tabel_user ;
			}
		}
	}
?>
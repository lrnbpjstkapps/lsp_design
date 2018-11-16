<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	//Add Data into Database
	class AksiTambahData extends CI_Controller {
		
		//Add one data into USER table 
		public function tambahSatuData_user(){
			//Read data input
			$data = $this->form_pengelola_user->baca_inputan();
			
			//Insert into database
			echo $this->tabel_user->tambah_satu_data($data);
		}
	}
?>
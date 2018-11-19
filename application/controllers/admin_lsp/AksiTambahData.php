<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	//Add Data into Database
	class AksiTambahData extends CI_Controller {
		
		//Add one data into USER table & USER_ROLE table	 
		public function satuData_user(){
			//Read data input
			$data = $this->form_pengelola_user->baca_inputan();
			
			//Insert into USER table
			$result_tabel_user = $this->tabel_user->tambah_satu_data($data);
			
			//USER ROLE table
			if($result_tabel_user == TRUE){
				$result_tabel_user_role = '1';
				for($i=0; $i<count($data["role_uuid[]"]); $i++){
					//Set each ROLE_UUID
					$data["role_uuid"]		= $data["role_uuid[]"][$i];
					
					//Insert into USER_ROLE table
					$result_tabel_user_role	= $this->tabel_user_role->tambah_satu_data($data);
				}
				
				if($result_tabel_user_role == TRUE){
					$data["hasil"]	= "sukses";
					$data["pesan"]	= "Data berhasil ditambahkan";
					echo json_encode($data);
				}else{
					$data["hasil"]	= "gagal";
					$data["pesan"]	= "Data gagal ditambahkan [USER_ROLE]";
					echo json_encode($data);
				}
			}else{
				$data["hasil"]	= "gagal";
				$data["pesan"]	= "Data gagal ditambahkan [USER]";
				echo json_encode($data);
			}
		}
	}
?>
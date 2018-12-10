<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	//Add Data into Database
	class AksiTambahData extends CI_Controller {
		
		//Add one data into USER table & USER_ROLE table	 
		public function satuData_user(){
			//Read data input
			$data = $this->form_user->baca_inputan();
			
			//#1 Insert into USER table
			$result_tabel_user = $this->tabel_user->tambah_satu_data($data);
			
			//#2 Insert into USER_ROLE table
			if($result_tabel_user == TRUE){
				$result_tabel_user_role = '1';
				for($i=0; $i<count($data["role_uuid[]"]); $i++){
					//Set each USER_ROLE
					$data["user_role_uuid"]	= $this->uuid->v4();
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
					$data["pesan"]	= "Data gagal ditambahkan [#2 Insert into USER_ROLE table]";
					echo json_encode($data);
				}
			}else{
				$data["hasil"]	= "gagal";
				$data["pesan"]	= "Data gagal ditambahkan [#1 Insert into USER table]";
				echo json_encode($data);
			}
		}
		
		//Add one data into SKEMA table	 
		public function satuData_ss(){
			//Read data input
			$data = $this->form_ss->baca_inputan();
			
			//Insert into SKEMA table
			$result_tabel_ss = $this->tabel_skema->tambah_satu_data($data);
											
			if($result_tabel_ss == TRUE){
				$data["hasil"]	= "sukses";
				$data["pesan"]	= "Data berhasil ditambahkan";
				echo json_encode($data);
			}else{
				$data["hasil"]	= "gagal";
				$data["pesan"]	= "Data gagal ditambahkan";
				echo json_encode($data);
			}
		}
		
		//Add one data into UK table & SKEMA_UK table	 
		public function satuData_uk(){
			//Read data input
			$data = $this->form_uk->baca_inputan();
			
			//#1 Insert into UK table
			$result_tabel_uk = $this->tabel_uk->tambah_satu_data($data);
			
			//#2 Insert into SKEMA_UK table
			if($result_tabel_uk == TRUE){
				$result_tabel_ss_uk = '1';
				for($i=0; $i<count($data["ss_uuid[]"]); $i++){
					//Set each SKEMA_UK
					$data["suk_uuid"]	= $this->uuid->v4();
					//Set each SKEMA_UUID
					$data["suk_uuid_skema"]	= $data["ss_uuid[]"][$i];
					//Insert into SKEMA_UK table
					$result_tabel_ss_uk	= $this->tabel_ss_uk->tambah_satu_data($data);
				}
								
				if($result_tabel_ss_uk == TRUE){
					$data["hasil"]	= "sukses";
					$data["pesan"]	= "Data berhasil ditambahkan";
					echo json_encode($data);
				}else{
					$data["hasil"]	= "gagal";
					$data["pesan"]	= "Data gagal ditambahkan [#2 Insert into SKEMA_UK table]";
					echo json_encode($data);
				}
			}else{
				$data["hasil"]	= "gagal";
				$data["pesan"]	= "Data gagal ditambahkan [#1 Insert into UNIT_KOMPETENSI table]";
				echo json_encode($data);
			}
		}
		
		//Add one data into EK table	 
		public function satuData_ek(){
			//Read data input
			$data = $this->form_ek->baca_inputan();
			
			//Insert into EK table
			$result_tabel_ek = $this->tabel_ek->tambah_satu_data($data);
											
			if($result_tabel_ek == TRUE){
				$data["hasil"]	= "sukses";
				$data["pesan"]	= "Data berhasil ditambahkan";
				echo json_encode($data);
			}else{
				$data["hasil"]	= "gagal";
				$data["pesan"]	= "Data gagal ditambahkan";
				echo json_encode($data);
			}
		}
	}
?>
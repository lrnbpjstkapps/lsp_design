<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	//Update Data from Database
	class AksiUpdateData extends CI_Controller {
		
		//Update one data in USER table & USER_ROLE table
		public function satuData_user(){				
			//#1 Update data in USER table
			$kondisi		= array('UUID_USER' => $this->input->post('user_uuid'));
			$data_lama_user	= $this->tabel_user->ambil_satu_data($kondisi);
			$data_baru_user	= $this->form_pengelola_user->baca_inputan();
			$result_user_upd=  $this->tabel_user->update_satu_data($data_lama_user, $data_baru_user, $kondisi);
			
			//#2 Delete previous data from USER_ROLE table
			if($result_user_upd == TRUE){
				$kondisi				= array('UUID_USER' => $this->input->post('user_uuid'));
				$result_userRole_del	= $this->tabel_user_role->hapus_data($kondisi);
				
				//#3 Insert into USER_ROLE table
				if($result_userRole_del == TRUE){
					for($i=0; $i<count($data_baru_user["role_uuid[]"]); $i++){
						//Set each USER_ROLE
						$data_baru_user["user_role_uuid"]	= $this->uuid->v4();
						//Set each ROLE_UUID
						$data_baru_user["role_uuid"]		= $data_baru_user["role_uuid[]"][$i];
						//Insert into USER_ROLE table
						$result_tabel_user_role				= $this->tabel_user_role->tambah_satu_data($data_baru_user);
					}

					if($result_tabel_user_role == TRUE){
						$data["hasil"]	= "sukses";
						$data["pesan"]	= "Data berhasil diupdate";
						echo json_encode($data);
					}else{
						$data["hasil"]	= "gagal";
						$data["pesan"]	= "Data gagal diupdate [#3 Insert into USER_ROLE table]";
						echo json_encode($data);
					}					
				}else{
					$data["hasil"]	= "gagal";
					$data["pesan"]	= "Data gagal diupdate [#2 Delete previous data from USER_ROLE table]";
					echo json_encode($data);
				}	
			}else{
				$data["hasil"]	= "gagal";
				$data["pesan"]	= "Data gagal diupdate [#1 Update data in USER table]";
				echo json_encode($data);
			}
		}
	}
?>
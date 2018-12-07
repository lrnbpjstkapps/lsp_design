<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	//Update Data from Database
	class AksiUpdateData extends CI_Controller {
		
		//Update one data in USER table & USER_ROLE table
		public function satuData_user(){				
			//#1 Update data in USER table
			$kondisi		= array('UUID_USER' => $this->input->post('user_uuid'));
			$data_lama_user	= $this->tabel_user->ambil_satu_data($kondisi);
			$data_baru_user	= $this->form_user->baca_inputan();
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
		
		//Update one data in UK table & SKEMA_UK table
		public function satuData_uk(){				
			//#1 Update data in UK table
			$kondisi			= array('UUID_UK' => $this->input->post('uk_uuid'));
			$data_lama_uk		= $this->tabel_uk->ambil_satu_data($kondisi);
			$_POST['uk_uuid']	= $data_lama_uk->UUID_UK;
			$data_baru_uk		= $this->form_uk->baca_inputan();
			$result_uk_upd		=  $this->tabel_uk->update_satu_data($data_lama_uk, $data_baru_uk, $kondisi);
			
			//#2 Delete previous data from SKEMA_UK table
			if($result_uk_upd == TRUE){
				$kondisi				= array('UUID_UK' => $this->input->post('uk_uuid'));
				$result_ss_uk_del		= $this->tabel_ss_uk->hapus_data($kondisi);
				
				//#3 Insert into SKEMA_UK table
				if($result_ss_uk_del == TRUE){
					for($i=0; $i<count($data_baru_uk["ss_uuid[]"]); $i++){
						//Set each SKEMA_UK
						$data["suk_uuid"]		= $this->uuid->v4();
						//Set each SKEMA_UUID
						$data["suk_uuid_skema"]	= $data_baru_uk["ss_uuid[]"][$i];
						//Set UUID_UK
						$data["suk_uuid_uk"] 		= $data_baru_uk['uk_uuid'];
						$data["suk_urutan"] 		= $data_baru_uk['suk_urutan'];
						$data["suk_is_active"] 		= $data_baru_uk['suk_is_active'];
						//Insert into SKEMA_UK table
						$result_tabel_ss_uk		= $this->tabel_ss_uk->tambah_satu_data($data);
					}

					if($result_tabel_ss_uk == TRUE){
						$data["hasil"]	= "sukses";
						$data["pesan"]	= "Data berhasil diupdate";
						echo json_encode($data);
					}else{
						$data["hasil"]	= "gagal";
						$data["pesan"]	= "Data gagal diupdate [#3 Insert into SKEMA_UK table]";
						echo json_encode($data);
					}					
				}else{
					$data["hasil"]	= "gagal";
					$data["pesan"]	= "Data gagal diupdate [#2 Delete previous data from SKEMA_UK table]";
					echo json_encode($data);
				}	
			}else{
				$data["hasil"]	= "gagal";
				$data["pesan"]	= "Data gagal diupdate [#1 Update data in UK table]";
				echo json_encode($data);
			}
		}
		
		//Update one data in SKEMA table
		public function satuData_ss(){				
			//#1 Update data in SKEMA table
			$kondisi		= array('UUID_SKEMA' => $this->input->post('ss_uuid'));
			$data_lama		= $this->tabel_skema->ambil_satu_data($kondisi);
			$data_baru		= $this->form_ss->baca_inputan();
			$result			= $this->tabel_skema->update_satu_data($data_lama, $data_baru, $kondisi);

			if($result == TRUE){
				$data["hasil"]	= "sukses";
				$data["pesan"]	= "Data berhasil diupdate";
				echo json_encode($data);
			}else{
				$data["hasil"]	= "gagal";
				$data["pesan"]	= "Data gagal diupdate";
				echo json_encode($data);
			}									
		}
		
		//Update data in SKEMA_UK table
		public function data_ss_uk(){	
			//Convert JSON data into array
			$data_input = json_decode(file_get_contents('php://input'), true);
			$uuid_ss_uk = array_keys($data_input);
			$values_ss_uk = array_values($data_input);
			
			//Update data in SS_UK table
			$result_sukses 	= 0;
			$result_gagal 	= 0;
			for($i=0; $i<count($uuid_ss_uk); $i++){			
				$kondisi		= array('UUID_SKEMA_UK' => $uuid_ss_uk[$i]);
				$data_lama		= $this->tabel_skema_uk->ambil_satu_data($kondisi);
				$result_upd		= $this->tabel_skema_uk->update_satu_data($data_lama, $values_ss_uk[$i], $kondisi);
				
				//Count failed update transaction
				if($result_upd == TRUE){
					$result_sukses++;
				}else{
					$result_gagal++;
				}
			}
			
			if($result_sukses == count($uuid_ss_uk)){
				$data["hasil"]	= "sukses";
				$data["pesan"]	= "Data berhasil diupdate.";
				echo json_encode($data);
			}else{
				$data["hasil"]	= "gagal";
				$data["pesan"]	= $result_gagal." dari ".count($uuid_ss_uk)." data gagal diupdate.";
				echo json_encode($data);
			}
			
			
		}
	}
?>
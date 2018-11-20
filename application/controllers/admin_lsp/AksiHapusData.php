<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	//Delete Data from Database
	class AksiHapusData extends CI_Controller {
		
		//Delete data from USER table && USER_ROLE table
		public function data_user($uuid){
			//#1 Delete from USER_ROLE table
			$kondisi			= array('UUID_USER' => $uuid);
			$result_user_role	= $this->tabel_user_role->hapus_data($kondisi);
			
			//#2 Delete from USER table
			if($result_user_role == TRUE){	
				$kondisi 		= array('UUID_USER' => $uuid);
				$result_user	= $this->tabel_user->hapus_data($kondisi);
				
				if($result_user == TRUE){
					$data["hasil"]	= "sukses";
					$data["pesan"]	= "Data berhasil dihapus";
					echo json_encode($data);
				}else{
					$data["hasil"]	= "gagal";
					$data["pesan"]	= "Data gagal dihapus [#2 Delete from USER table]";
					echo json_encode($data);
				}
			}else{
				$data["hasil"]	= "gagal";
				$data["pesan"]	= "Data gagal dihapus [#1 Delete from USER_ROLE table]";
				echo json_encode($data);
			}
		}
	}
?>